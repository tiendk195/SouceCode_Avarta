<?php
define('_IN_JOHNCMS', 1);
require_once('../incfiles/core.php');
$textl = 'Đấu boss';
require('../incfiles/head.php');
echo '
<div class="phdr">Đấu boss</div>
<div class="gmenu"><div class="list5">';
if($user_id){
if(isset($_GET[batdau])){
$int = intval($_GET[batdau]);
$ktphong = mysql_result(mysql_query("SELECT COUNT(*) FROM `gamemini_boss_phong` WHERE `id` = '$int' LIMIT 1"), 0);
	if($ktphong != 0){
		if($datauser['hp'] > 100){
		$kiemtra = mysql_fetch_array(mysql_query("SELECT * FROM `gamemini_boss_phong` WHERE `id` = '$int' LIMIT 1"));
			if($kiemtra['chuphong'] == $user_id){
				if($kiemtra['nguoichoi1'] != 0 || $kiemtra['nguoichoi2'] != 0 || $kiemtra['nguoichoi3'] != 0){
				if($kiemtra['sansang'] == 0){
				mysql_query("UPDATE `gamemini_boss_phong` SET `sansang` = '1' WHERE `id` = '$int' LIMIT 1");
					mysql_query("INSERT INTO `gamemini_boss_trandanh` SET
					`sophong` = '$int',
					`timechuphong` = '0',
					`timenguoichoi1` = '0',
					`timenguoichoi2` = '0',
					`timenguoichoi3` = '0'
					");
				header('Location: phong.php?id='.$int.'');
				}
				}else{
					header('Location: phong.php?id='.$int.'&chuadu');
				}
			}else{
				header('Location: phong.php?id='.$int.'&no_chuphong');
			}
		}else{
			header('Location: phong.php?id='.$int.'&hetsm');
		}
	}else{
		header('Location: phong.php?id='.$int.'&no_chuphong');
	}
}
if(isset($_GET['id'])){
	$kiemtrachoi1 = mysql_result(mysql_query("SELECT COUNT(*) FROM `gamemini_boss_phong` WHERE `nguoichoi1` = '$user_id'"), 0);
	$kiemtrachoi2 = mysql_result(mysql_query("SELECT COUNT(*) FROM `gamemini_boss_phong` WHERE `nguoichoi2` = '$user_id'"), 0);
	$kiemtrachoi3 = mysql_result(mysql_query("SELECT COUNT(*) FROM `gamemini_boss_phong` WHERE `nguoichoi3` = '$user_id'"), 0);
	$kiemtrachuphong = mysql_result(mysql_query("SELECT COUNT(*) FROM `gamemini_boss_phong` WHERE `chuphong` = '$user_id'"), 0);
	$int = intval($_GET['id']);
	$ktphong = mysql_result(mysql_query("SELECT COUNT(*) FROM `gamemini_boss_phong` WHERE `id` = '$int' LIMIT 1"), 0);
	if($ktphong != 0){
	$kiemtra = mysql_fetch_array(mysql_query("SELECT * FROM `gamemini_boss_phong` WHERE `id` = '$int' LIMIT 1"));
	if($datauser['hp'] > 100 && $kiemtra[sucmanh_boss] >= $datauser[hpfull]){

		if($kiemtra['chuphong'] != $user_id){
		if($kiemtra[nguoichoi1] == 0 || $kiemtra[nguoichoi2] == 0 || $kiemtra[nguoichoi3] == 0){
		if($kiemtrachuphong == 0 && $kiemtrachoi1 == 0 && $kiemtrachoi2 == 0 && $kiemtrachoi3 == 0){
			if($kiemtra['sansang'] != 1){
			if($kiemtra[nguoichoi1] == 0 && $kiemtra[nguoichoi2] != $user_id && $kiemtra[nguoichoi3] != $user_id ){
				mysql_query("UPDATE `gamemini_boss_phong` SET `nguoichoi1` = '$user_id', `kqnguoichoi1` = '1' WHERE `id` = '$int' LIMIT 1");
				header('Location: phong.php?id='.$int.'');
				exit;
			}
			if($kiemtra[nguoichoi1] != $user_id && $kiemtra[nguoichoi2] == 0 && $kiemtra[nguoichoi3] != $user_id ){
				mysql_query("UPDATE `gamemini_boss_phong` SET `nguoichoi2` = '$user_id', `kqnguoichoi2` = '1' WHERE `id` = '$int' LIMIT 1");
				header('Location: phong.php?id='.$int.'');
				exit;
			}
			if($kiemtra[nguoichoi1] != $user_id && $kiemtra[nguoichoi2] != $user_id && $kiemtra[nguoichoi3] == 0 ){
				mysql_query("UPDATE `gamemini_boss_phong` SET `nguoichoi3` = '$user_id', `kqnguoichoi3` = '1' WHERE `id` = '$int' LIMIT 1");
				header('Location: phong.php?id='.$int.'');
				exit;
			}
			if($kiemtra[nguoichoi1] == $user_id || $kiemtra[nguoichoi2] == $user_id || $kiemtra[nguoichoi3] == $user_id){
				header('Location: phong.php?id='.$int.'&dathamgia');
			}
		}else echo 'Trận đấu đang diễn ra không thể tham gia trận chiến';
		}else{
			echo 'Bạn đang tham gia ở một trận đấu khác không thể tham gia tiếp';
		}
		}else{
			header('Location: phong.php?id='.$int.'&dalachuphong');
		}
		}else{
			header('Location: phong.php?id='.$int.'&dalachuphong');
		}
		}else{
			header('Location: phong.php?id='.$int.'&hetsm');
		}
	}else{
	echo 'Không có phòng này để bạn gia nhập';
	}
}
echo '</div>';
echo '<div class="rmenu"><center></center><b></b></div>';


}else{
	echo '<div class="list1">- Hãy đăng nhập để sử dụng chức năng này nhé!</div>';
}
require('../incfiles/end.php');
?>