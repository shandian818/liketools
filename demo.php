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
$a = \LikeTools\Dump::getHtml($data);
echo $a;
$b = \LikeTools\Dump::getConsole($data);
echo $b;