#liketools

1. Dump类-打印变量信息（页面及控制台）

####安装组件
使用 composer 命令进行安装或下载源代码使用。

```shell
composer require shandian818/liketools
```
> 可看demo.php中的示例

###页面打印变量
   
```php
\liketools\Dump::getInstance()->toHtml($any);
```

###控制台打印变量
   
```php
\liketools\Dump::getInstance()->toConsole($any);
```
###页面打印变量演示结果如下
##
<div>
	<p style="color: red;margin: 0">C:\Users\jiang\Desktop\liketools\demo.php:42</p>
	<p style="color: green;line-height: 16px; font-size: 14px;margin: 5px;white-space: nowrap;">
String (12) "原始数据"<br />
	</p>
</div>

<script>
//调试
console.log('%cfile:C:\\Users\\jiang\\Desktop\\liketools\\demo.php:43','color:red');
console.log('%cString (12) "原始数据"\n','color:green');
</script>

<div>
	<p style="color: red;margin: 0">C:\Users\jiang\Desktop\liketools\demo.php:44</p>
	<p style="color: green;line-height: 16px; font-size: 14px;margin: 5px;white-space: nowrap;">
Array (15)<br />
(<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["0"] => Array (3)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["id"] => Integer (1) 1<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["pid"] => Integer (1) 0<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["title"] => String (6) "name_1"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["1"] => Array (3)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["id"] => Integer (1) 2<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["pid"] => Integer (1) 0<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["title"] => String (6) "name_2"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["2"] => Array (3)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["id"] => Integer (1) 3<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["pid"] => Integer (1) 0<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["title"] => String (6) "name_3"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["3"] => Array (3)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["id"] => Integer (1) 4<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["pid"] => Integer (1) 1<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["title"] => String (6) "name_4"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["4"] => Array (3)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["id"] => Integer (1) 5<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["pid"] => Integer (1) 1<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["title"] => String (6) "name_5"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["5"] => Array (3)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["id"] => Integer (1) 6<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["pid"] => Integer (1) 2<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["title"] => String (6) "name_6"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["6"] => Array (3)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["id"] => Integer (1) 7<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["pid"] => Integer (1) 1<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["title"] => String (6) "name_7"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["7"] => Array (3)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["id"] => Integer (1) 8<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["pid"] => Integer (1) 3<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["title"] => String (6) "name_8"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["8"] => Array (3)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["id"] => Integer (1) 9<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["pid"] => Integer (1) 8<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["title"] => String (6) "name_9"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["9"] => Array (3)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["id"] => Integer (2) 10<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["pid"] => Integer (1) 8<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["title"] => String (7) "name_10"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["10"] => Array (3)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["id"] => Integer (2) 11<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["pid"] => Integer (1) 3<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["title"] => String (7) "name_11"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["11"] => Array (3)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["id"] => Integer (2) 12<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["pid"] => Integer (1) 6<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["title"] => String (7) "name_12"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["12"] => Array (3)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["id"] => Integer (2) 13<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["pid"] => Integer (1) 7<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["title"] => String (7) "name_13"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["13"] => Array (3)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["id"] => Integer (2) 14<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["pid"] => Integer (1) 8<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["title"] => String (7) "name_14"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["14"] => Array (3)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["id"] => Integer (2) 15<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["pid"] => Integer (1) 7<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["title"] => String (7) "name_15"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)<br />
)<br />
	</p>
</div>

<script>
//调试
console.log('%cfile:C:\\Users\\jiang\\Desktop\\liketools\\demo.php:45','color:red');
console.log('%cArray (15)\n(\n|    ["0"] => Array (3)\n|    (\n|    |    ["id"] => Integer (1) 1\n|    |    ["pid"] => Integer (1) 0\n|    |    ["title"] => String (6) "name_1"\n|    )\n|    ["1"] => Array (3)\n|    (\n|    |    ["id"] => Integer (1) 2\n|    |    ["pid"] => Integer (1) 0\n|    |    ["title"] => String (6) "name_2"\n|    )\n|    ["2"] => Array (3)\n|    (\n|    |    ["id"] => Integer (1) 3\n|    |    ["pid"] => Integer (1) 0\n|    |    ["title"] => String (6) "name_3"\n|    )\n|    ["3"] => Array (3)\n|    (\n|    |    ["id"] => Integer (1) 4\n|    |    ["pid"] => Integer (1) 1\n|    |    ["title"] => String (6) "name_4"\n|    )\n|    ["4"] => Array (3)\n|    (\n|    |    ["id"] => Integer (1) 5\n|    |    ["pid"] => Integer (1) 1\n|    |    ["title"] => String (6) "name_5"\n|    )\n|    ["5"] => Array (3)\n|    (\n|    |    ["id"] => Integer (1) 6\n|    |    ["pid"] => Integer (1) 2\n|    |    ["title"] => String (6) "name_6"\n|    )\n|    ["6"] => Array (3)\n|    (\n|    |    ["id"] => Integer (1) 7\n|    |    ["pid"] => Integer (1) 1\n|    |    ["title"] => String (6) "name_7"\n|    )\n|    ["7"] => Array (3)\n|    (\n|    |    ["id"] => Integer (1) 8\n|    |    ["pid"] => Integer (1) 3\n|    |    ["title"] => String (6) "name_8"\n|    )\n|    ["8"] => Array (3)\n|    (\n|    |    ["id"] => Integer (1) 9\n|    |    ["pid"] => Integer (1) 8\n|    |    ["title"] => String (6) "name_9"\n|    )\n|    ["9"] => Array (3)\n|    (\n|    |    ["id"] => Integer (2) 10\n|    |    ["pid"] => Integer (1) 8\n|    |    ["title"] => String (7) "name_10"\n|    )\n|    ["10"] => Array (3)\n|    (\n|    |    ["id"] => Integer (2) 11\n|    |    ["pid"] => Integer (1) 3\n|    |    ["title"] => String (7) "name_11"\n|    )\n|    ["11"] => Array (3)\n|    (\n|    |    ["id"] => Integer (2) 12\n|    |    ["pid"] => Integer (1) 6\n|    |    ["title"] => String (7) "name_12"\n|    )\n|    ["12"] => Array (3)\n|    (\n|    |    ["id"] => Integer (2) 13\n|    |    ["pid"] => Integer (1) 7\n|    |    ["title"] => String (7) "name_13"\n|    )\n|    ["13"] => Array (3)\n|    (\n|    |    ["id"] => Integer (2) 14\n|    |    ["pid"] => Integer (1) 8\n|    |    ["title"] => String (7) "name_14"\n|    )\n|    ["14"] => Array (3)\n|    (\n|    |    ["id"] => Integer (2) 15\n|    |    ["pid"] => Integer (1) 7\n|    |    ["title"] => String (7) "name_15"\n|    )\n)\n','color:green');
</script>