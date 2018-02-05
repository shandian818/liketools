<?php
/**
 * 打印数据
 * 可在控制台打印
 * Created by PhpStorm.
 * Author: jiangxijun
 * Datetime: 2018/2/5 16:39
 */

namespace LikeTools;

class Dump {

    /**
     * 直接把结果输出到html
     * Author: jiangxijun
     * Datetime: 2018/2/5 17:15
     * @param $data
     * @param int $depth
     * @throws \ReflectionException
     */
    static public function toHtml($data, $depth = 1) {
        echo self::getHtml($data, $depth);
    }

    /**
     * 直接把结果打印到控制台
     * Author: jiangxijun
     * Datetime: 2018/2/5 17:15
     * @param $data
     * @param int $depth
     * @throws \ReflectionException
     */
    static public function toConsole($data, $depth = 1) {
        echo self::getConsole($data, $depth);
    }

    /**
     * 获取要打印的字符串
     * Author: jiangxijun
     * Datetime: 2018/2/5 17:15
     * @param $data
     * @param int $depth
     * @return string
     * @throws \ReflectionException
     */
    static public function getHtml($data, $depth = 1) {
        $info = self::_getDebugFileInfo($depth);
        $string = "\n";
        $string .= "<div>\n";
        $string .= "	<p style=\"color: red;margin: 0\">" . $info . "</p>\n";
        $string .= "	<p style=\"color: green;line-height: 16px; font-size: 14px;margin: 5px;white-space: nowrap;\">\n";
        $string .= self::_dump($data);
        $string .= "	</p>\n";
        $string .= "</div>\n";
        return $string;
    }

    /**
     * 获取用于打印在控制台的字符串
     * Author: jiangxijun
     * Datetime: 2018/2/5 17:11
     * @param $data
     * @param int $depth
     * @return string
     * @throws \ReflectionException
     */
    static public function getConsole($data, $depth = 1) {
        $info = self::_getDebugFileInfo($depth);
        $string = "\n";
        $string .= "<script>\n";
        $string .= "//调试\n";
        $string .= "console.log('%cfile:" . addslashes($info) . "','color:red');\n";
        $result = self::_dump($data, true);
        $string .= "console.log('%c" . $result . "','color:green');\n";;
        $string .= "</script>\n";
        return $string;
    }

    /**
     * 获取打印数据
     * 递归获取下级
     * Author: jiangxijun
     * Datetime: 2018/2/5 17:11
     * @param $data
     * @param bool $is_console
     * @param null $field_name
     * @param int $level
     * @param null $prop_string
     * @return string
     * @throws \ReflectionException
     */
    static private function _dump($data, $is_console = false, $field_name = null, $level = 0, $prop_string = null) {
        $rn = $is_console ? '\n' : "<br />\n";
        $space = $is_console ? "|    " : "|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        $string = "";
        $repeat_space = str_repeat($space, $level);
        $string .= $repeat_space;
        $type = ucfirst(gettype($data));
        $real_type = $type === 'Double' ? 'Float' : $type;
        $count = 0;//数组或对象的key个数
        $field_string = (!is_null($field_name)) ? (is_null($prop_string) ? "[\"$field_name\"] => " : "[\"$field_name\" : $prop_string] => ") : "";
        if (is_array($data)) {
            $count += count($data);
            $string .= $field_string;
            $string .= $real_type . " ($count)" . $rn;
            $level++;
            $string .= $repeat_space . "(" . $rn;
            foreach ($data as $field_name => $value) {
                $string .= self::_dump($value, $is_console, $field_name, $level);
            }
            $string .= $repeat_space . ")" . $rn;
        } else if (is_object($data)) {
            $ref = new \ReflectionClass($data);
            $class_name = $ref->name;
            $obj_prop_strings = '';
            $level++;
            if ('stdClass' != $class_name) {
                $props = $ref->getProperties();
                $count += count($props);
                if (!empty($count)) {
                    foreach ($props as $prop) {
                        $obj_prop_name = $prop->name;
                        $pro = $ref->getProperty($obj_prop_name);
                        $pro->setAccessible(true);
                        $obj_prop_value = $pro->getValue($data);
                        $prop_string = $pro->isStatic() ? 'Static ' : '';
                        $prop_string .= $pro->isPublic() ? 'Public' : '';
                        $prop_string .= $pro->isProtected() ? 'Protected' : '';
                        $prop_string .= $pro->isPrivate() ? 'Private' : '';
                        $obj_prop_strings .= self::_dump($obj_prop_value, $is_console, $obj_prop_name, $level, $prop_string);
                    }
                }
            } else {
                $count += count((array)$data);
                foreach ($data as $field_name => $value) {
                    $obj_prop_strings .= self::_dump($value, $is_console, $field_name, $level);
                }
            }
            $string .= $field_string;
            $string .= $class_name . ' ' . $real_type . " ($count)" . $rn;
            $string .= $repeat_space . "(" . $rn;
            $string .= $obj_prop_strings;
            $string .= $repeat_space . ")" . $rn;
        } else {
            $count += strlen($data);
            $string .= $field_string;
            if (is_null($data)) {
                $real_data = 'null';
            } else if (is_bool($data)) {
                $real_data = $data ? 'TRUE' : 'FALSE';
            } else if (is_string($data)) {
                $str = $is_console ? addslashes($data) : $data;
                $real_data = '"' . $str . '"';
            } else {
                $real_data = $data;
            }
            $string .= $real_type . " ($count) " . $real_data . $rn;
        }
        return $string;
    }

    /**
     * 按深度获取debug文件信息
     * Author: jiangxijun
     * Datetime: 2018/2/5 17:11
     * @param $depth
     * @return string
     */
    static private function _getDebugFileInfo($depth) {
        $debug = debug_backtrace();
        while (!isset($debug[$depth])) {
            $depth--;
        }
        unset($debug[$depth]['args']);
        $info = $debug[$depth]['file'] . ":" . $debug[$depth]['line'];
        return $info;
    }
}