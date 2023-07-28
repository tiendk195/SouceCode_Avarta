<?php 
define('_IN_JOHNCMS', 1);
$rootpath='../../../';
require_once('../../../incfiles/core.php');
require_once('../inc.php');
$textl = 'Sửa Nhà';
?>
<?php
require('../../../sanbay/house/head.php');
?>
<style>
body{
		min-width: <?php echo 380+$css;?>px;
		text-algin: center;
	}
</style>
<?php
echo '<div class="phdr">Sửa Nhà Của Bạn</div>';
$sql = "SELECT * FROM gamemini_house_users WHERE user_id = '{$user_id}'";
$data->query($sql);
$rows = $data->num_rows();
if($rows > 0){
	if(isset($_GET[no_vp])) echo '<div class="rmenu" style="text-align: center; font-size: 16px;">Không có vật phẩm nào ở đây cả.. </div>';
	if(isset($_GET[no_gt])) echo '<div class="rmenu" style="text-align: center; font-size: 16px;">Giá trị không hợp lệ hãy kiểm tra lại.. </div>';
	if(isset($_GET[no_vitri])) echo '<div class="rmenu" style="text-align: center; font-size: 16px;">Vị trí này không thể đặt đồ.. </div>';
	if(isset($_GET[ngang])){
		if(isset($_GET[doc])){
			include('vatpham.php');
		}
	}else{
		include('hd.php');
	}
	echo '<div class="menu"><a id="nut" href="../">Quay Lại</a> <a id="nut" href="../shop/">Mua Sắm Đồ</a></div>';
}else{
	echo 'Bạn đã có nhà đâu mà sửa';
}
require('../../../incfiles/end.php');
?>