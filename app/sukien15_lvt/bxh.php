<?php
define('_IN_JOHNCMS', 1);
$textl = 'Sự Kiện 1/5';
$rootpath='../../';
require_once ("../../incfiles/core.php");
require_once ("../../incfiles/head.php");
if (!$user_id) {
echo '<div class="omenu"><p><b>Lỗi!</b><br>Trang chỉ dành cho thành viên!</p></div>';
require_once ("../../incfiles/end.php");
exit;
}
if ($datauser['kichhoat']==0) {
echo '<div class="omenu"><p><b>Lỗi!</b><br>Trang chỉ dành cho thành viên đã kích hoạt!</p></div>';
require_once ("../../incfiles/end.php");
exit;
}
?>
<!--Edit by Lethinh-->
<?php
echo'
<div class="phdr">TOP Diệt Boss</div>';
$vnviet= mysql_query("SELECT * FROM users WHERE `dietboss15`=`dietboss15` >= 0 AND `rights` < 9 ORDER BY `dietboss15` DESC LIMIT 3");
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
-Đã diệt: '.number_format($res['dietboss15']).' boss</div>';
++$i;
}




require('../../incfiles/end.php');
?>