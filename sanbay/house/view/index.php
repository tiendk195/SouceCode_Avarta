<?php 
define('_IN_JOHNCMS', 1);
$rootpath='../../../';
require_once('../../../incfiles/core.php');
require_once('../inc.php');
$textl = 'Khu Nhà Ở';
?>

<?php
require('../../../incfiles/head.php');
echo '<div class="phdr">Xem Nhà</div>';
if(isset($_GET[id])){
	$int_user = intval($_GET[id]);
?>
<?php
$lerver = "SELECT `lerver` FROM gamemini_house_users WHERE user_id = '{$int_user}'";
	$data->query($lerver);
	$lv_t = $data->fetch_assoc();
	$lever_t = $lv_t['lerver'];
	$ngang = $lv_t['lerver']+13;
	$doc = $lv_t['lerver']+11;
	$doc_2 = $lv_t['lerver']+10;
	$doc_3 = $lv_t['lerver']+9;
	$css = $lv_t['lerver']*24;
	$cuanha1 = floor(($ngang/2)-2);
	$cuanha2 = floor(($ngang/2)-1);
	$cuanha3 = floor(($ngang/2));
	$cuanha4 = floor(($ngang/2)+1);
	$cuanha5 = floor(($ngang/2)+2);

?>
<?php
	$sql_sl = "SELECT user_id FROM gamemini_house_users WHERE user_id = '{$int_user}'";
	$data->query($sql_sl);
	$rows = $data->num_rows();
	if($rows > 0){
		include('hd.php');
	
	}else{
		echo 'Người chơi này chưa mua nhà!';
	}

}
require('../../../incfiles/end.php');
?>