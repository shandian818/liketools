<?php
/**
 * Created by PhpStorm.
 * User: jiang
 * Date: 2018/5/22
 * Time: 21:39
 */

namespace liketools;


class Curl
{
    private static $instance;

    private $ch;

    //本次调用配置（不记录配置）
    private $options = [];

    //本次调用头配置（不记录配置）
    private $header = [];

    //全局调用配置（记录配置）
    private static $setting = [
        CURLOPT_HEADER => true,//是否获取头部信息(true:是|false:否)
        CURLOPT_RETURNTRANSFER => true,//是否将curl_exec结果直接显示(true:否|false:是)
        CURLOPT_TIMEOUT => 30,//允许curl函数执行的最长秒数
        CURLOPT_CONNECTTIMEOUT => 0,//在尝试连接时等待的秒数。设置为0，则无限等待
        /*以下ssl相关*/
        CURLOPT_SSL_VERIFYPEER => false,//是否检测服务器的证书是否由正规浏览器认证过的授权CA颁发的(true:是|false:否)
        CURLOPT_SSL_VERIFYHOST => false,//是否检测服务器的域名与证书上的是否一致(true:是|false:否)
    ];

    private $isJson;
    private $chUrl;
    private $chData;

    /**
     * 获取实例
     * @param array $options
     * @return static
     */
    public static function getInstance($options = [])
    {
        if (!self::$instance instanceof self) {
            self::$instance = new static($options);
        }
        return self::$instance;
    }

    /**
     * 构造
     * Curl constructor.
     * @param array $options
     */
    private function __construct($options = [])
    {
        if (!extension_loaded('curl')) {
            die('未安装curl扩展');
        }
        $this->ch = curl_init();
        $this->options($options);
    }

    /**
     * 设置当次请求的选项
     * @param $options
     * @param null $value
     * @return $this
     */
    public function options($options, $value = null)
    {
        if (is_array($options)) {
            $this->options = $options + $this->options;
        } else if (!empty($options) && !is_null($value)) {
            $this->options[$options] = $value;
        }
        return $this;
    }

    /**
     * 设置CURL实例的配置（设置一次可多次按此配置执行）
     * @param $setting
     * @param null $value
     * @return $this
     */
    public function setting($setting, $value = null)
    {
        if (is_array($setting)) {
            self::$setting = $setting + self::$setting;
        } else if (!empty($setting) && !is_null($value)) {
            self::$setting[$setting] = $value;
        }
        return $this;
    }

    /**
     * 保存options选项配置
     * @return $this
     */
    public function save()
    {
        self::$setting = $this->options;
        return $this;
    }

    /**
     * 设置本次请求的头部信息
     * @param  $header
     * @param null $value
     * @return $this
     */
    public function header($header, $value = null)
    {
        $this->header = $header + $this->header;
        if (is_array($header)) {
            $this->header = $header + $this->header;
        } else if ($header && !is_null($value)) {
            $this->header[$header] = $value;
        }
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, $this->header);
        return $this;
    }

    public function time($time = 30)
    {
        $this->options[CURLOPT_TIMEOUT] = $time;
        return $this;
    }

    /**
     * 是否json格式请求
     * @return $this
     */
    public function json()
    {
        $this->isJson = true;
        return $this;
    }

    /**
     * 设置请求的url
     * @param string $url
     * @return $this
     */
    public function url($url = '')
    {
        $this->chUrl = $url;
        return $this;
    }

    /**
     * 设置请求的数据
     * @param $data
     * @return $this
     */
    public function data($data)
    {
        $this->chData = $data;
        return $this;
    }

    /**
     * post请求
     * @param null $url
     * @param null $data
     * @return array
     */
    public function post($url = null, $data = null)
    {
        if (!is_null($url)) {
            $this->chUrl = $url;
        }
        if (!is_null($data)) {
            $this->chData = $data;
        }
        return $this->request('post');
    }

    /**
     * get请求
     * @param null $url
     * @param null $data
     * @return array
     */
    public function get($url = null, $data = null)
    {
        if (!is_null($url)) {
            $this->chUrl = $url;
        }
        if (!is_null($data)) {
            $this->chData = $data;
        }
        return $this->request('get');
    }

    /**
     * 自定义请求
     * @param string $type
     * @return array
     */
    public function request($type = '')
    {
        $options = $this->options + self::$setting;
        foreach ($options as $key => $val) {
            curl_setopt($this->ch, $key, $val);
        }
        if (empty($this->chUrl)) {
            die('CURL请求的url不能为空');
        }
        $u_type = strtoupper($type);
        if (!in_array($u_type, ['GET', 'POST', 'PUT', 'DELETE'])) {
            die('不合法的CURL类型:' . $type);
        }
        switch ($u_type) {
            case 'GET':
                curl_setopt($this->ch, CURLOPT_HTTPGET, true);
                if (!empty($this->chData) && is_array($this->chData)) {
                    if (false === stripos($this->chUrl, "?")) {
                        $this->chUrl .= '?';
                    }
                    $this->chUrl .= http_build_query($this->chData);
                }
                break;
            case 'POST':
                curl_setopt($this->ch, CURLOPT_POST, true);
                if (!empty($this->chData) && is_array($this->chData)) {
                    if ($this->isJson) {
                        $this->chData = json_encode($this->chData);
                        $this->header(['Content-Type:application/json']);
                    }
                }
                curl_setopt($this->ch, CURLOPT_POSTFIELDS, $this->chData);
                break;
        }
        curl_setopt($this->ch, CURLOPT_URL, $this->chUrl);
        $response = curl_exec($this->ch);
        $info = curl_getinfo($this->ch);
        $errno = curl_errno($this->ch);
        $error = curl_error($this->ch);
        curl_close($this->ch);
        if (false === $response || 0 !== $errno || !empty($error)) {
            $status = false;
            //error
            $header = '';
            $body = '';
        } else {
            $status = true;
            //success
            $header = substr($response, 0, $info['header_size']);
            $body = substr($response, $info['header_size']);
        }
        $this->clear();
        return [
            'status' => $status,
            'body' => $body,
            'header' => $header,
            'info' => $info,
            'errno' => $errno,
            'error' => $error,
        ];
    }

    private function clear()
    {
        unset($this->_options);
        unset($this->_header);
        unset($this->chData);
        unset($this->chUrl);
        unset($this->isJson);
    }
}