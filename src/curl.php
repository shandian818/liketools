<?php
/**
 * Created by PhpStorm.
 * Author: jiangxijun
 * Datetime: 2018/2/6 10:05
 */

namespace LikeTools;

class Curl {

    private $_ch;
    //默认curl设置
    private $_options = [
        'CURLOPT_HEADER' => true,//是否获取头部信息(true:是|false:否)
        'CURLOPT_RETURNTRANSFER' => true,//是否将curl_exec结果直接显示(true:否|false:是)
        'CURLOPT_TIMEOUT' => 120,//允许curl函数执行的最长秒数
        'CURLOPT_CONNECTTIMEOUT' => 0,//在尝试连接时等待的秒数。设置为0，则无限等待
        /*以下ssl相关*/
        'CURLOPT_SSL_VERIFYPEER' => false,//是否检测服务器的证书是否由正规浏览器认证过的授权CA颁发的(true:是|false:否)
        'CURLOPT_SSL_VERIFYHOST' => false,//是否检测服务器的域名与证书上的是否一致(true:是|false:否)
        'CURLOPT_SSLCERTTYPE' => 'PEM',//证书类型
        'CURLOPT_CAPATH' => '',//CA根证书路径（用来验证的服务器证书是否是根证书颁布的）这个参数仅仅在和CURLOPT_SSL_VERIFYPEER一起使用时才有意义
        'CURLOPT_SSLCERT' => '',//证书文件路径
        'CURLOPT_SSLCERTPASSWD' => '',//证书密码
        'CURLOPT_SSLKEYTYPE' => '',//私钥类型
        'CURLOPT_SSLKEY' => '',//私钥文件路径
    ];
    //默认头部设置
    private $_header = [];
    //是否为json格式(true:是|false:否)
    private $_is_json = false;
    //curl请求的url
    private $_ch_url;
    //curl请求的data
    private $_ch_data;

    public function __construct($options = []) {
        $this->_ch = curl_init();
        $this->options($options);
    }

    public function options($options = []) {
        $this->_options = array_merge($this->_options, $options);
        foreach ($this->_options as $key => $val) {
            if (is_string($key)) {
                $key = constant(strtoupper($key));
            }
            curl_setopt($this->_ch, $key, $val);
        }
        return $this;
    }

    public function header($header = []) {
        $this->_header = array_merge($this->_header, $header);
        //设置header
        curl_setopt($this->_ch, CURLOPT_HTTPHEADER, $this->_header);
        return $this;
    }

    public function json() {
        $this->_is_json = true;
        return $this;
    }

    public function url($url = '') {
        $this->_ch_url = $url;
        return $this;
    }

    public function data($data) {
        $this->_data = $data;
        return $this;
    }

    public function request($type = '') {
        if (empty($this->_ch_url)) {
            throw new \Exception('请求的url不能为空');
        }
        $u_type = strtoupper($type);
        if (!in_array($u_type, ['GET', 'POST', 'PUT', 'DELETE'])) {
            throw new \Exception('不合法的类型:' . $type);
        }
        switch ($u_type) {
            case 'GET':
                curl_setopt($this->_ch, CURLOPT_HTTPGET, true);
                if (!empty($this->_ch_data) && is_array($this->_ch_data)) {
                    if (false === stripos($this->_ch_url, "?")) {
                        $this->_ch_url .= '?';
                    }
                    $this->_ch_url .= http_build_query($this->_ch_data);
                }
                break;
            case 'POST':
                curl_setopt($this->_ch, CURLOPT_POST, true);
                if (!empty($this->_ch_data) && is_array($this->_ch_data)) {
                    if ($this->_is_json) {
                        $this->_ch_data = json_encode($this->_ch_data);
                        $this->header(['Content-Type:application/json']);
                    }
                }
                curl_setopt($this->_ch, CURLOPT_POSTFIELDS, $this->_ch_data);
                break;
        }
        curl_setopt($this->_ch, CURLOPT_URL, $this->_ch_url);
        $response = curl_exec($this->_ch);
        $info = curl_getinfo($this->_ch);
        $errno = curl_errno($this->_ch);
        $error = curl_error($this->_ch);
        curl_close($this->_ch);
        if (false === $response || 0 !== $errno || !empty($error)) {
            //error
            $header = '';
            $body = '';
        } else {
            //success
            $header = substr($response, 0, $info['header_size']);
            $body = substr($response, $info['header_size']);
        }
        return [
            'body' => $body,
            'header' => $header,
            'info' => $info,
            'errno' => $errno,
            'error' => $error,
        ];
    }

    public function __destruct() {
        unset($this->_options);
        unset($this->_header);
        unset($this->_ch_data);
        unset($this->_ch_url);
        unset($this->_is_json);
    }

    public function post($url = null, $data = null) {
        if (!is_null($url)) {
            $this->_ch_url = $url;
        }
        if (!is_null($data)) {
            $this->_ch_data = $data;
        }
        return $this->request('post');
    }

    public function get($url = null, $data = null) {
        if (!is_null($url)) {
            $this->_ch_url = $url;
        }
        if (!is_null($data)) {
            $this->_ch_data = $data;
        }
        return $this->request('get');
    }
}