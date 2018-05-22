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
	<p style="color: red;margin: 0">C:\Users\jiang\Desktop\liketools\demo.php:47</p>
	<p style="color: green;line-height: 16px; font-size: 14px;margin: 5px;white-space: nowrap;">
String (18) "缩进的树结构"<br />
	</p>
</div>

<div>
	<p style="color: red;margin: 0">C:\Users\jiang\Desktop\liketools\demo.php:49</p>
	<p style="color: green;line-height: 16px; font-size: 14px;margin: 5px;white-space: nowrap;">
Array (15)<br />
(<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["0"] => Array (4)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["id"] => Integer (1) 1<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["pid"] => Integer (1) 0<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["title"] => String (6) "name_1"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["full"] => String (6) "name_1"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["1"] => Array (4)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["id"] => Integer (1) 4<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["pid"] => Integer (1) 1<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["title"] => String (6) "name_4"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["full"] => String (21) "&nbsp;&nbsp;├name_4"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["2"] => Array (4)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["id"] => Integer (1) 5<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["pid"] => Integer (1) 1<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["title"] => String (6) "name_5"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["full"] => String (21) "&nbsp;&nbsp;├name_5"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["3"] => Array (4)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["id"] => Integer (1) 7<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["pid"] => Integer (1) 1<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["title"] => String (6) "name_7"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["full"] => String (21) "&nbsp;&nbsp;└name_7"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["4"] => Array (4)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["id"] => Integer (2) 13<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["pid"] => Integer (1) 7<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["title"] => String (7) "name_13"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["full"] => String (34) "&nbsp;&nbsp;&nbsp;&nbsp;├name_13"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["5"] => Array (4)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["id"] => Integer (2) 15<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["pid"] => Integer (1) 7<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["title"] => String (7) "name_15"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["full"] => String (34) "&nbsp;&nbsp;&nbsp;&nbsp;└name_15"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["6"] => Array (4)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["id"] => Integer (1) 2<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["pid"] => Integer (1) 0<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["title"] => String (6) "name_2"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["full"] => String (6) "name_2"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["7"] => Array (4)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["id"] => Integer (1) 6<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["pid"] => Integer (1) 2<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["title"] => String (6) "name_6"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["full"] => String (21) "&nbsp;&nbsp;└name_6"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["8"] => Array (4)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["id"] => Integer (2) 12<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["pid"] => Integer (1) 6<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["title"] => String (7) "name_12"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["full"] => String (34) "&nbsp;&nbsp;&nbsp;&nbsp;└name_12"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["9"] => Array (4)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["id"] => Integer (1) 3<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["pid"] => Integer (1) 0<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["title"] => String (6) "name_3"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["full"] => String (6) "name_3"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["10"] => Array (4)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["id"] => Integer (1) 8<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["pid"] => Integer (1) 3<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["title"] => String (6) "name_8"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["full"] => String (21) "&nbsp;&nbsp;├name_8"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["11"] => Array (4)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["id"] => Integer (1) 9<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["pid"] => Integer (1) 8<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["title"] => String (6) "name_9"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["full"] => String (36) "&nbsp;&nbsp;│&nbsp;&nbsp;├name_9"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["12"] => Array (4)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["id"] => Integer (2) 10<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["pid"] => Integer (1) 8<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["title"] => String (7) "name_10"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["full"] => String (37) "&nbsp;&nbsp;│&nbsp;&nbsp;├name_10"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["13"] => Array (4)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["id"] => Integer (2) 14<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["pid"] => Integer (1) 8<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["title"] => String (7) "name_14"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["full"] => String (37) "&nbsp;&nbsp;│&nbsp;&nbsp;└name_14"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["14"] => Array (4)<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["id"] => Integer (2) 11<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["pid"] => Integer (1) 3<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["title"] => String (7) "name_11"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;["full"] => String (22) "&nbsp;&nbsp;└name_11"<br />
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)<br />
)<br />
	</p>
</div>

<div>
	<p style="color: red;margin: 0">C:\Users\jiang\Desktop\liketools\demo.php:51</p>
	<p style="color: green;line-height: 16px; font-size: 14px;margin: 5px;white-space: nowrap;">
String (15) "试一下样式"<br />
	</p>
</div>
name_1<br>
&nbsp;&nbsp;├name_4<br>
&nbsp;&nbsp;├name_5<br>
&nbsp;&nbsp;└name_7<br>
&nbsp;&nbsp;&nbsp;&nbsp;├name_13<br>
&nbsp;&nbsp;&nbsp;&nbsp;└name_15<br>
name_2<br>
&nbsp;&nbsp;└name_6<br>
&nbsp;&nbsp;&nbsp;&nbsp;└name_12<br>
name_3<br>
&nbsp;&nbsp;├name_8<br>
&nbsp;&nbsp;│&nbsp;&nbsp;├name_9<br>
&nbsp;&nbsp;│&nbsp;&nbsp;├name_10<br>
&nbsp;&nbsp;│&nbsp;&nbsp;└name_14<br>
&nbsp;&nbsp;└name_11<br>
