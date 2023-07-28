<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
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
		var url = "262-load.php";
		var data = {"moruong": ""};
		$('#load').load(url, data);
		return false;
	});
});
</script>
<?php

$hopqua=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='262'"));

echo'<div class="phdr">Sử dụng Rương lượng</div>';
echo'<div class="gd_">';

echo'
<div class="pmenu"><br><b><center>• Đang Có : <font color="#FF1493"> '.$hopqua['soluong'].' Rương lượng <img src="/images/vatpham/262.png"></font>

</b></div><form  method="post"><div class="pmenu"><b><br>
<center>Sử dụng để nhận ngẫu nhiên từ 100 đến 500 lượng</b><br>
<br>Xác nhận mở rương?</br>';


echo'<input type="submit" name="moruong" id="moruong"value="Ok"></center></b></div></form>';
echo'<span id="load">';

echo'</span>';
echo'</div>';

require('../incfiles/end.php');
?>