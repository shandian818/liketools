<?php
/**
 * Created by PhpStorm.
 * User: jiang
 * Date: 2018/5/22
 * Time: 21:39
 */

namespace liketools;

class Dump
{
    private static $instance;

    /**
     * 获取当前实例
     * @return static
     */
    public static function getInstance()
    {
        if (!self::$instance instanceof self) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    /**
     * 直接把结果输出到html
     * @param $data
     * @throws \ReflectionException
     */
    public function toHtml($data)
    {
        echo $this->getHtml($data);
    }

    /**
     * 直接把结果打印到控制台
     * @param $data
     * @throws \ReflectionException
     */
    public function toConsole($data)
    {
        echo $this->getConsole($data);
    }

    /**
     * 获取要打印的字符串
     * @param $data
     * @return string
     * @throws \ReflectionException
     */
    public function getHtml($data)
    {
        $info = $this->getDebugFileInfo();
        $string = "\n";
        $string .= "<div>\n";
        $string .= "	<p style=\"color: red;margin: 0\">" . $info . "</p>\n";
        $string .= "	<p style=\"color: green;line-height: 16px; font-size: 14px;margin: 5px;white-space: nowrap;\">\n";
        $string .= $this->dump($data);
        $string .= "	</p>\n";
        $string .= "</div>\n";
        return $string;
    }

    /**
     * 获取用于打印在控制台的字符串
     * @param $data
     * @return string
     * @throws \ReflectionException
     */
    public function getConsole($data)
    {
        $info = $this->getDebugFileInfo();
        $string = "\n";
        $string .= "<script>\n";
        $string .= "//调试\n";
        $string .= "console.log('%cfile:" . addslashes($info) . "','color:red');\n";
        $result = $this->dump($data, true);
        $string .= "console.log('%c" . $result . "','color:green');\n";;
        $string .= "</script>\n";
        return $string;
    }

    /**
     * 获取打印数据
     * 递归获取下级
     * @param $data
     * @param bool $is_console
     * @param null $field_name
     * @param int $level
     * @param null $prop_string
     * @return string
     * @throws \ReflectionException
     */
    private function dump($data, $is_console = false, $field_name = null, $level = 0, $prop_string = null)
    {
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
                $string .= $this->dump($value, $is_console, $field_name, $level);
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
                        $obj_prop_strings .= $this->dump($obj_prop_value, $is_console, $obj_prop_name, $level, $prop_string);
                    }
                }
            } else {
                $count += count((array)$data);
                foreach ($data as $field_name => $value) {
                    $obj_prop_strings .= $this->dump($value, $is_console, $field_name, $level);
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
                $html = htmlspecialchars_decode($data);
                $str = $is_console ? (addslashes($html)) : htmlspecialchars($html);
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
     * @return string
     */
    private function getDebugFileInfo()
    {
        $debug = debug_backtrace();
        $count = count($debug);
        $depth = $count > 0 ? $count - 1 : 0;
        unset($debug[$depth]['args']);
        $info = $debug[$depth]['file'] . ":" . $debug[$depth]['line'];
        return $info;
    }
}