<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
$textl='Cặp Đôi Yêu Thương';
require('../incfiles/head.php');


echo'<div class="phdr">Top cặp đôi</div>';
$vnviet= mysql_query("SELECT * FROM users WHERE `nhan`=`nhan` >= 0 ORDER BY `nhan` DESC LIMIT 5");
$i=1;
while
($res=mysql_fetch_array($vnviet)) {
	$xxx=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$res['nguoiyeu']."'"));

	echo'<div class="omenu">TOP<b> '.$i.' </b>'.$res['name'].'&nbsp; &nbsp;
<img src="/images/nhancuoi/'.$res['nhan'].'.png"> &nbsp; &nbsp;
'.$xxx['name'].' - Lever nhẫn <font color="blue"><b>'.$res['nhan'].'</b></font><br></div>';

	
++$i;
}


require('../incfiles/end.php');
?>