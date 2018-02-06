<?php
/**
 * 打印数据的demo
 * Created by PhpStorm.
 * Author: jiangxijun
 * Datetime: 2018/2/5 17:00
 */
require_once 'src/dump.php';
$data = [
    'asd' => [
        'gdsfg', 'asd'
    ],
    'ddd' => [
        'aa', 'adf'
    ],
];
//$a = \LikeTools\Dump::getHtml($data);
//echo $a;
//$b = \LikeTools\Dump::getConsole($data);
//echo $b;
require_once 'src/curl.php';
$curl = new \LikeTools\Curl();
$r = $curl->json()->post('http://depp.likephp.com?a=111&b=222',['a'=>'b','asd'=>'www']);
//$r = $curl->get('http://depp.likephp.com?a=111&b=222');
echo '1111111111111' . PHP_EOL;
print_r($r);
