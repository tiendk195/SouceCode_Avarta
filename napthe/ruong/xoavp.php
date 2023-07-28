<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
$headmod='Rương đồ';
if (!$user_id)
{
	header('Location: /dangnhap.php');
	exit;
}
$textl = 'Xóa vật phẩm';
require('../incfiles/head.php');

echo '<div class="phdr">'.$textl.'</div>';
$result = mysql_query("SELECT * FROM `vatpham` WHERE `id` = '$id' AND `user_id` = '$user_id'");
if (mysql_num_rows($result) < 1)
{
	echo '<div class="rmenu">Bạn không có vật phẩm này!</div>';
}
else
{
	$row = mysql_fetch_array($result);
	if (isset($_POST['submit']))
	{
		mysql_query("DELETE FROM `vatpham` WHERE `id` = '{$row['id']}'");
		header('Location: /ruong');
		exit;
	}
	echo '<div class="menu"><center>
	<form method="post">Bạn có chắc chắn xóa vật phẩm này?<br/><center><img src="/images/vatpham/'.$row['id_shop'].'.png"></center><br/><input type="submit" value="Xóa" name="submit"> <a href="/ruong"><input type="button" value="Quay lại"></a></form></center>
	</div>';
}
mysql_free_result($result);



require('../incfiles/end.php');
?>