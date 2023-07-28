<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
$textl='Cao thủ vip';
require('../incfiles/head.php');


echo'<div class="phdr">Cao thủ VIP</div>';
$vnviet= mysql_query("SELECT * FROM users WHERE `naptichluy`=`naptichluy` >= 0 AND `rights` < 9 AND `id`!=2  AND `id`!=1 AND `id`!=256  ORDER BY `naptichluy` DESC LIMIT 5");
$i=1;
while
($res=mysql_fetch_array($vnviet)) {
	echo'<div class="list1"><img src="/avatar/'.$res['id'].'.png"><br>
	TOP '.$i.' ';
	if($i == 1)
		
	echo'<b><font color="red">ST</font></b>';
	else 
			if($i == 2)
		
	echo'<b><font color="blue">ND</font></b>';
		else 
			if($i == 3)
		
	echo'<b><font color="green">RD</font></b>';
	
	echo'
	<br><a href="/member/'.$res['id'].'.html"><b>'.$res['name'].'</b></a> | Đã nạp: 
'.number_format($res['naptichluy']).' VNĐ </div>';
	
	
	
++$i;
}


require('../incfiles/end.php');
?>