<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
$textl = 'Sử dụng hộp quà mảnh ghép';
if (!$user_id )
{
	header('Location: /login.php');
	exit;
}
require('../incfiles/head.php');
?>
<script type="text/javascript">
$(document).ready(function(){
	$('#moruong').click(function(){
		var url = "97-load.php";
		var data = {"moruong": ""};
		$('#load').load(url, data);
		return false;
	});
});
</script>
<?php

$hopqua=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='97'"));

echo'<div class="phdr">Sử dụng hộp quà mảnh ghép</div>';
echo'<div class="gd_">';

echo'
<div class="pmenu"><br><b><center>• Đang Có : <font color="#FF1493"> '.$hopqua['soluong'].' hộp quà mảnh ghép <img src="/images/vatpham/97.png"></font>

</b></div><form  method="post"><div class="pmenu"><b><br>
<center>Khi sử dụng sẽ có cơ hội nhận ngẫu nhiên mảnh ghép</b><br>
<br>Xác nhận mở hộp?</br>';


echo'<input type="submit" name="moruong" id="moruong"value="Dùng"></center></b></div></form>';
echo'<span id="load">';

echo'</span>';
echo'</div>';

require('../incfiles/end.php');
?>