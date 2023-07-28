<?php
define('_IN_JOHNCMS', 1);
$headmod = 'Khu sinh thái';
require ('../incfiles/core.php');
$textl = 'Bảng xếp hạng câu cá';
require ('../incfiles/head.php');

echo'<div class="phdr">Cao thủ Level</div>';
$vnviet= mysql_query("SELECT * FROM users WHERE `levelca`=`levelca` >= 0 AND `rights` < 9 AND `id`!=2  AND `id`!=1 AND `id`!=256  ORDER BY `levelca` DESC LIMIT 3");
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
	<br><a href="/member/'.$res['id'].'.html"><b>'.$res['name'].'</b></a> | Level: '.number_format($res['levelca']).'+'.number_format($res['chisolevelca']).'%</div>';
	
	
	
++$i;
} 
echo'<div class="phdr">Cao thủ Tuần</div>';
$vnviet= mysql_query("SELECT * FROM users WHERE `soca`=`soca` >= 0 AND `rights` < 9 AND `id`!=2  AND `id`!=1 AND `id`!=256  ORDER BY `soca` DESC LIMIT 3");
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
	<br><a href="/member/'.$res['id'].'.html"><b>'.$res['name'].'</b></a> | Đã câu được: '.number_format($res['soca']).' con </div>';
	
	
	
++$i;
} 


require ('../incfiles/end.php');
?>
