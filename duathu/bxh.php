<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
$textl='Bảng Xếp Hạng';
require('../incfiles/head.php');
echo'
<div class="phdr">TOP Số Hên</div>';
$vnviet= mysql_query("SELECT * FROM users WHERE `sohen`=`sohen` >= 0 AND `rights` < 9 ORDER BY `sohen` DESC LIMIT 5");
$i=1;
while
($res=mysql_fetch_array($vnviet)) {
echo'<div class="list1">-Nhân vật: <img src="/avatar/'.$res['id'].'.png">
<br/>-TOP: '.$i.' ';
if($i == 1)
echo'<img src="/icon/top/no1.png">';
else
if($i == 2)
echo'<img src="/icon/top/no2.png">';
else
if($i == 3)
echo'<img src="/icon/top/no3.png">';
echo'<br/>
<a href="/member/'.$res['id'].'.html">'.nick($res['id']).'</a><br/>
-Đã thắng: '.number_format($res['sohen']).'Đ</div>';
++$i;
}

echo'
<div class="phdr">TOP Số Nhọ</div>';
$vnviet= mysql_query("SELECT * FROM users WHERE `sonho`=`sonho` >= 0 AND `rights` < 9 ORDER BY `sonho` DESC LIMIT 5");
$i=1;
while
($res=mysql_fetch_array($vnviet)) {
echo'<div class="list1">-Nhân vật: <img src="/avatar/'.$res['id'].'.png">
<br/>-TOP: '.$i.' ';
if($i == 1)
echo'<img src="/icon/top/no1.png">';
else
if($i == 2)
echo'<img src="/icon/top/no2.png">';
else
if($i == 3)
echo'<img src="/icon/top/no3.png">';
echo'<br/>
<a href="/member/'.$res['id'].'.html">'.nick($res['id']).'</a><br/>
-Đã thua: '.number_format($res['sonho']).'Đ</div>';
++$i;
}



require('../incfiles/end.php');
?>