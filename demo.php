<?php
/**
 * 打印数据的demo
 * Created by PhpStorm.
 * Author: jiangxijun
 * Datetime: 2018/2/5 17:00
 */
require_once 'src/Dump.php';
require_once 'src/Tree.php';
require_once 'src/Curl.php';

/*--------------------------------*/
function dump($any)
{
    \liketools\Dump::getInstance()->toHtml($any);
}

function dumpc($any)
{
    \liketools\Dump::getInstance()->toConsole($any);
}

/*--------------------------------*/
/*--------------------------------*/
$list = [
    ['id' => 1, 'pid' => 0, 'title' => 'name_1'],
    ['id' => 2, 'pid' => 0, 'title' => 'name_2'],
    ['id' => 3, 'pid' => 0, 'title' => 'name_3'],
    ['id' => 4, 'pid' => 1, 'title' => 'name_4'],
    ['id' => 5, 'pid' => 1, 'title' => 'name_5'],
    ['id' => 6, 'pid' => 2, 'title' => 'name_6'],
    ['id' => 7, 'pid' => 1, 'title' => 'name_7'],
    ['id' => 8, 'pid' => 3, 'title' => 'name_8'],
    ['id' => 9, 'pid' => 8, 'title' => 'name_9'],
    ['id' => 10, 'pid' => 8, 'title' => 'name_10'],
    ['id' => 11, 'pid' => 3, 'title' => 'name_11'],
    ['id' => 12, 'pid' => 6, 'title' => 'name_12'],
    ['id' => 13, 'pid' => 7, 'title' => 'name_13'],
    ['id' => 14, 'pid' => 8, 'title' => 'name_14'],
    ['id' => 15, 'pid' => 7, 'title' => 'name_15'],
];
dump('原始数据');
dumpc('原始数据');
dump($list);
dumpc($list);
$tree_list = \liketools\Tree::getInstance(['id', 'pid', 'title', 'full'])->icons(['│', '├', '└'])->getTree($list);
dump('缩进的树结构');
dumpc('缩进的树结构');
dump($tree_list);
dumpc($tree_list);
dump('试一下样式');
foreach ($tree_list as $value) {
    echo $value['full'] . '<br>' . PHP_EOL;
}
$child = \liketools\Tree::getInstance()->getChild($list, 0);
dump('获取一级子集');
dumpc('获取一级子集');
dump($child);
dumpc($child);
$children = \liketools\Tree::getInstance()->getChildren($list, 0);
dump('获取children结构');
dumpc('获取children结构');
dump($children);
dumpc($children);
$child_ids = \liketools\Tree::getInstance()->getChildIds($list, 0);
dump('获取所有的子集id集合');
dumpc('获取所有的子集id集合');
dump($child_ids);
dumpc($child_ids);
$parents = \liketools\Tree::getInstance()->getParents($list, 13);
dump('获取所有的父集数据');
dumpc('获取所有的父集数据');
dump($parents);
dumpc($parents);
$parents_ids = \liketools\Tree::getInstance()->getParentsIds($list, 14);
dump('获取所有的父集id集合');
dumpc('获取所有的父集id集合');
dump($parents_ids);
dumpc($parents_ids);
/*--------------------------------*/
/*--------------------------------*/
$result = \liketools\Curl::getInstance()->get('https://blog.csdn.net/qq_27682041/phoenix/comment/list/80266706?page=1&tree_type=1');
dump($result['body']);
/*--------------------------------*/