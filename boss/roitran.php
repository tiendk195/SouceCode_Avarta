<?php
define('_IN_JOHNCMS', 1);
require_once('../incfiles/core.php');
$textl = 'Đấu boss';
require('../incfiles/head.php');
echo '
<div class="phdr">Đấu boss</div>
<div class="gmenu">';
if($user_id){
if(isset($_GET['id'])){
	$int = intval($_GET['id']);
	$ktphong = mysql_result(mysql_query("SELECT COUNT(*) FROM `gamemini_boss_phong` WHERE `id` = '$int' LIMIT 1"), 0);
	if($ktphong != 0){
		$kiemtra = mysql_fetch_array(mysql_query("SELECT * FROM `gamemini_boss_phong` WHERE `id` = '$int' LIMIT 1"));
		$sm_chuphong = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '$kiemtra[chuphong]' LIMIT 1"));
			if($kiemtra[chuphong] == $user_id && $kiemtra[nguoichoi1] != $user_id && $kiemtra[nguoichoi2] != $user_id && $kiemtra[nguoichoi3] != $user_id ){
				mysql_query("UPDATE `gamemini_boss_phong` SET `chuphong` = '0' WHERE `id` = '$int' LIMIT 1");
				if($kiemtra[nguoichoi1] == 0 && $kiemtra[nguoichoi2] == 0 && $kiemtra[nguoichoi3] == 0){
				mysql_query("DELETE FROM `gamemini_boss_phong` WHERE `id` = '$int' LIMIT 1");
				mysql_query("DELETE FROM `gamemini_boss_trandanh` WHERE `sophong` = '$kiemtra[id]' LIMIT 1");
				mysql_query("DELETE FROM `gamemini_boss_tb` WHERE `sophong` = '$kiemtra[id]'");
				}
				header('Location: /boss/');
				exit;
			}
			if($kiemtra[chuphong] != $user_id && $kiemtra[nguoichoi1] == $user_id && $kiemtra[nguoichoi2] != $user_id && $kiemtra[nguoichoi3] != $user_id ){
				mysql_query("UPDATE `gamemini_boss_phong` SET `nguoichoi1` = '0' WHERE `id` = '$int' LIMIT 1");
				if($kiemtra[chuphong] == 0 && $kiemtra[nguoichoi2] == 0 && $kiemtra[nguoichoi3] == 0){
				mysql_query("DELETE FROM `gamemini_boss_phong` WHERE `id` = '$int' LIMIT 1");
				mysql_query("DELETE FROM `gamemini_boss_trandanh` WHERE `sophong` = '$kiemtra[id]' LIMIT 1");
				mysql_query("DELETE FROM `gamemini_boss_tb` WHERE `sophong` = '$kiemtra[id]'");
				}
				header('Location: /boss/');
				exit;
			}
			if($kiemtra[chuphong] != $user_id && $kiemtra[nguoichoi1] != $user_id && $kiemtra[nguoichoi2] == $user_id && $kiemtra[nguoichoi3] != $user_id ){
				mysql_query("UPDATE `gamemini_boss_phong` SET `nguoichoi2` = '0' WHERE `id` = '$int' LIMIT 1");
				if($kiemtra[chuphong] == 0 && $kiemtra[nguoichoi1] == 0 && $kiemtra[nguoichoi3] == 0){
				mysql_query("DELETE FROM `gamemini_boss_phong` WHERE `id` = '$int' LIMIT 1");
				mysql_query("DELETE FROM `gamemini_boss_trandanh` WHERE `sophong` = '$kiemtra[id]' LIMIT 1");
				mysql_query("DELETE FROM `gamemini_boss_tb` WHERE `sophong` = '$kiemtra[id]'");
				}
				header('Location: /boss/');
				exit;
			}
			if($kiemtra[chuphong] != $user_id && $kiemtra[nguoichoi1] != $user_id && $kiemtra[nguoichoi2] != $user_id && $kiemtra[nguoichoi3] == $user_id ){
				mysql_query("UPDATE `gamemini_boss_phong` SET `nguoichoi3` = '0' WHERE `id` = '$int' LIMIT 1");
				if($kiemtra[chuphong] == 0 && $kiemtra[nguoichoi1] == 0 && $kiemtra[nguoichoi2] == 0){
				mysql_query("DELETE FROM `gamemini_boss_phong` WHERE `id` = '$int' LIMIT 1");
				mysql_query("DELETE FROM `gamemini_boss_trandanh` WHERE `sophong` = '$kiemtra[id]' LIMIT 1");
				mysql_query("DELETE FROM `gamemini_boss_tb` WHERE `sophong` = '$kiemtra[id]'");
				}
				header('Location: /boss/');
				exit;
			}
			if($kiemtra[chuphong] != $user_id || $kiemtra[nguoichoi1] != $user_id || $kiemtra[nguoichoi2] != $user_id || $kiemtra[nguoichoi3] != $user_id ){
				
				echo 'Bạn không tham gia bàn này';
			}
	}else{
	echo 'Không có phòng này để bạn rời';
	}
}
if(isset($_GET['huyphong'])){
	$int = intval($_GET['huyphong']);
	$ktphong = mysql_result(mysql_query("SELECT COUNT(*) FROM `gamemini_boss_phong` WHERE `id` = '$int' LIMIT 1"), 0);
	echo 'Bạn có muốn hủy phòng này<br/><br/><a id="nut" href="roitran.php?id='.$int.'&huyphong&yes">[Có] </a>';
	echo '<a id="nut" href="phong.php?id='.$int.'">[Không]</a>';
	if($ktphong != 0){
		$kiemtra = mysql_fetch_array(mysql_query("SELECT * FROM `gamemini_boss_phong` WHERE `id` = '$int' LIMIT 1"));
		$sm_chuphong = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '$kiemtra[chuphong]' LIMIT 1"));
			if(isset($_GET[yes]) && $kiemtra[chuphong] == $user_id){
				mysql_query("UPDATE `gamemini_boss_phong` SET `chuphong` = '0' WHERE `id` = '$int' LIMIT 1");
				mysql_query("DELETE FROM `gamemini_boss_phong` WHERE `id` = '$int' LIMIT 1");
				mysql_query("DELETE FROM `gamemini_boss_trandanh` WHERE `sophong` = '$kiemtra[id]' LIMIT 1");
				mysql_query("DELETE FROM `gamemini_boss_tb` WHERE `sophong` = '$kiemtra[id]'");
				header('Location: /boss/');
				exit;
			}
			if($kiemtra[chuphong] != $user_id){
				
				echo 'Bạn không tham gia bàn này';
			}
	}else{
	echo 'Không có phòng này để bạn hủy';
	}
}
if(isset($_GET['roi'])){
	$int = intval($_GET['roi']);
	$ktphong = mysql_result(mysql_query("SELECT COUNT(*) FROM `gamemini_boss_phong` WHERE `id` = '$int' LIMIT 1"), 0);
	if($ktphong != 0){
		$kiemtra = mysql_fetch_array(mysql_query("SELECT * FROM `gamemini_boss_phong` WHERE `id` = '$int' LIMIT 1"));
			if($kiemtra['sansang'] == 1){
			echo 'Bạn có muốn rời bàn khi trận chiến đã bắt đầu không<br/><br/>
			<a id="nut" href="roitran.php?id='.$int.'">[Có] </a><a id="nut" href="phong.php?id='.$int.'">[Không]</a>';
			}else{
				echo 'Bạn có tham gia trận chiến nào đâu mà rời';
			}
	}else{
		echo 'Không có phòng này để bạn rời';
	}
}
echo '<div class="rmenu"><center></center><b></b></div>';
echo '</div>';


}else{
	echo '<div class="rmenu">- Hãy đăng nhập để sử dụng chức năng này nhé!</div>';
}
require('../incfiles/end.php');
?>