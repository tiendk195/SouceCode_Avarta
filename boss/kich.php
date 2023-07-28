<?php
define('_IN_JOHNCMS', 1);
require_once('../incfiles/core.php');
$textl = 'Đấu boss';
require('../incfiles/head.php');
echo '
<div class="phdr">Đấu boss</div>
<div class="gmenu"><div class="list5">';
if($user_id){
if(isset($_GET['id'])){
	$int = intval($_GET['id']);
	$cophong = mysql_result(mysql_query("SELECT COUNT(*) FROM `gamemini_boss_phong` WHERE `id` = '$int' LIMIT 1"), 0);
	$ktphong = mysql_fetch_array(mysql_query("SELECT * FROM `gamemini_boss_phong` WHERE `id` = '$int' LIMIT 1"));
	if($cophong == 1){
	if($ktphong[sansang] == 0 && $ktphong[chuphong] == $user_id){
		if(isset($_GET[nguoichoi1])){
			mysql_query("UPDATE `gamemini_boss_phong` SET `nguoichoi1` = '0' WHERE `id` = '$int' LIMIT 1");
			header('Location: phong.php?id='.$int.'&kich_yes');
		}else{
			header('Location: phong.php?id='.$int.'&kich_no');
		}
		if(isset($_GET[nguoichoi2])){
			mysql_query("UPDATE `gamemini_boss_phong` SET `nguoichoi2` = '0' WHERE `id` = '$int' LIMIT 1");
			header('Location: phong.php?id='.$int.'&kich_yes');
		}else{
			header('Location: phong.php?id='.$int.'&kich_no');
		}
		if(isset($_GET[nguoichoi3])){
			mysql_query("UPDATE `gamemini_boss_phong` SET `nguoichoi3` = '0' WHERE `id` = '$int' LIMIT 1");
			header('Location: phong.php?id='.$int.'&kich_yes');
		}else{
			header('Location: phong.php?id='.$int.'&kich_no');
		}
	}else{
		header('Location: phong.php?id='.$int.'&kich_no');
	}
	}else{
		echo 'Không có phòng này để kích';
	}
}
echo '</div>';
echo '<div class="rmenu"><center>Mod by pkoolvn </center><b></b></div>';


}else{
	echo '<div class="list1">- Hãy đăng nhập để sử dụng chức năng này nhé!</div>';
}
require('../incfiles/end.php');
?>