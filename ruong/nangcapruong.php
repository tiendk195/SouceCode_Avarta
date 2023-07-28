<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
$headmod='Rương đồ';
if (!$user_id)
{
	header('Location: /dangnhap.php');
	exit;
}
require('../incfiles/head.php');

echo'<div class="phdr"><a href="index.php">Rương đồ</a> &gt; Nâng cấp rương</div>';
$capruong=$datauser['capruong']+1;
$tien= $datauser['capruong']*1000000;
echo'<div class="menu"><b><font color="blue">Bạn có muốn nâng cấp Rương lên Cấp '.$capruong.' với giá <b>'.number_format($tien).'</b> xu không ?<form method="post"><input type="submit" name="n" value="Nâng cấp"></form></div>';
if (isset($_POST[n])) {
	if ($datauser['xu'] < $tien ){
		echo'Bạn không đủ tiền!';
	} else { 
		echo'Nâng cấp thành công Rương cấp '.$capruong.' ';
		mysql_query("UPDATE `users` SET `xu`=`xu`-'".$tien."',`capruong`=`capruong`+'1' ,`tongruong`=`tongruong`+'100' WHERE `id`='".$user_id."'");

	}
}
echo'</b></font>';

require('../incfiles/end.php');
?>