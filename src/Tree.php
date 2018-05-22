<?php
/**
 * Created by PhpStorm.
 * User: jiang
 * Date: 2018/5/22
 * Time: 21:36
 */

namespace liketools;

class Tree
{
    //当前实例
    private static $instance;

    //树结构缩进前缀
    private $icons = ['&nbsp;&nbsp;│', '&nbsp;&nbsp;├ ', '&nbsp;&nbsp;└ '];

    //数组字段对应关系
    private $fieldNames = ['id', 'pid', 'name', 'full_name'];

    //缩进好的树结构
    private $treeList = [];

    /**
     * 获取当前实例
     * @param array $field_names 数组字段对应关系
     * @return static
     */
    public static function getInstance($field_names = [])
    {
        if (!self::$instance instanceof self) {
            self::$instance = new static($field_names);
        }
        return self::$instance;
    }

    /**
     * 构造
     * Tree constructor.
     * @param array $field_names 字段对应数组
     */
    private function __construct($field_names = [])
    {
        $this->fieldNames = $field_names + $this->fieldNames;
    }

    /**
     * 配置前缀
     * @param array $icons
     * @return $this
     */
    public function icons($icons = [])
    {
        $this->icons = $icons + $this->icons;
        return $this;
    }

    /**
     * 获取children结构树
     * @param $list
     * @param int $pid
     * @param string $children_field
     * @return array
     */
    public function getChildren($list, $pid = 0, $children_field = 'children')
    {
        $array = [];
        foreach ($list as $key => $value) {
            if ($value[$this->fieldNames[1]] == $pid) {
                $children = $this->getChildren($list, $value[$this->fieldNames[0]], $children_field);
                if (!empty($children)) {
                    $value[$children_field] = $children;
                }
                $array[] = $value;
                unset($list[$key]);
            }
        }
        return $array;
    }

    /**
     * 获取子节点集合（一级）
     * @param $list
     * @param int $pid
     * @return array
     */
    public function getChild($list, $pid = 0)
    {
        $array = [];
        foreach ($list as $key => $value) {
            if ($value[$this->fieldNames[1]] == $pid) {
                $array[] = $value;
                unset($list[$key]);
            }
        }
        return $array;
    }

    /**
     * 获取所有子孙的id集合
     * @param $list
     * @param int $pid
     * @return array
     */
    public function getChildIds($list, $pid = 0)
    {
        $array = [];
        foreach ($list as $key => $value) {
            if ($value[$this->fieldNames[1]] == $pid) {
                $array[] = $value[$this->fieldNames[0]];
                unset($list[$key]);
                $array = array_merge($array, $this->getChildIds($list, $value[$this->fieldNames[0]]));
            }
        }
        return $array;
    }

    /**
     * 用于递归获取树形结构集合
     * @param $list
     * @param int $id
     * @param string $space
     * @return array
     */
    private function getTreeList($list, $id = 0, $space = '')
    {
        $array_child = $this->getChild($list, $id);
        if (!($count = count($array_child))) {
            return [];
        }
        $num = 1;
        for ($i = 0; $i < $count; $i++) {
            if ($count == $num) {
                $prefix = $this->icons[2];
                $icon = '';
            } else {
                $prefix = $this->icons[1];
                $icon = '' != $space ? $this->icons[0] : '';
            }
            $array_child[$i][$this->fieldNames[3]] = ('' != $space ? $space . $prefix : "") . $array_child[$i][$this->fieldNames[2]];
            $this->treeList[] = $array_child[$i];
            $this->getTreeList($list, $array_child[$i][$this->fieldNames[0]], $space . $icon . "&nbsp;&nbsp;");
            $num++;
        }
    }

    /**
     * 获取树形结构集合（格式化=缩进字段）
     * @param $list
     * @param int $id
     * @return array
     */
    public function getTree($list, $id = 0)
    {
        $this->treeList = [];
        $this->getTreeList($list, $id);
        return $this->treeList;
    }

    /**
     * 获取所有的父级数据集合（含自己）
     * @param $list
     * @param $id
     * @return array
     */
    public function getParents($list, $id)
    {
        $array = [];
        foreach ($list as $key => $value) {
            if ($value[$this->fieldNames[0]] == $id) {
                $array[] = $value;
                unset($list[$key]);
                $array = array_merge($this->getParents($list, $value[$this->fieldNames[1]]), $array);
            }
        }
        return $array;
    }

    /**
     * 获取所有父级的id集合（不含自己）
     * @param $list
     * @param $id
     * @return array
     */
    public function getParentsIds($list, $id)
    {
        $array = [];
        foreach ($list as $key => $value) {
            if ($value[$this->fieldNames[0]] == $id) {
                if ($value[$this->fieldNames[1]]) {
                    $array[] = $value[$this->fieldNames[1]];
                    unset($list[$key]);
                    $array = array_merge($array, $this->getParentsIds($list, $value[$this->fieldNames[1]]));
                }
            }
        }
        return $array;
    }
}