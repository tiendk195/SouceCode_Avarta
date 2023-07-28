<?php
define('_IN_JOHNCMS', 1);
require_once('../incfiles/core.php');
require_once('ruongbian.php');
if($user_id){
if($_POST[quatang]){
$nguoichoi = $post[chuphong];
$type = 'phanthuongphongchu';
$type2 = $post[phanthuongphongchu];
if($post[nguoichoi1] == $user_id) {
$nguoichoi = $post[nguoichoi1];
$type = 'phanthuongnguoichoi1';
$type2 = $post[phanthuongnguoichoi1];
}
if($post[nguoichoi2] == $user_id) {
$nguoichoi = $post[nguoichoi2];
$type = 'phanthuongnguoichoi2';
$type2 = $post[phanthuongnguoichoi2];
}
if($post[nguoichoi3] == $user_id) {
$nguoichoi = $post[nguoichoi3];
$type = 'phanthuongnguoichoi3';
$type2 = $post[phanthuongnguoichoi3];
}
if($type2 == 0){
if($nguoichoi == $user_id){
	$rand = rand(0,99);
	if($rand > 94){
		//mod qua tang luong
		// ,`diem_even` = `diem_even` + 1 //
		$randluong = rand(1,$timkiemboss['luong']);
		if($timkiemboss[luong] != 0){
		mysql_query("UPDATE `users` SET `luong` = `luong` + '$randluong' WHERE `id` = '$user_id' LIMIT 1");
		mysql_query("INSERT INTO `gamemini_boss_tb` SET `sophong` = '$int', `loinhan` = '11', `danh_sm` = '$randluong', `users` = '$user_id'");
		if($nguoichoi == $user_id){
		mysql_query("UPDATE `gamemini_boss_phong` SET `$type` = '1' WHERE `id` = '$int' LIMIT 1");
		}
		}else{
			$randxu = rand(1,$timkiemboss['xu']);
			mysql_query("UPDATE `users` SET `xu` = `xu` + '$randxu' WHERE `id` = '$user_id' LIMIT 1");
			$q="UPDATE `users` SET `xu` = `xu` + '$randxu' WHERE `id` = '$user_id' LIMIT 1";
		
			mysql_query("INSERT INTO `gamemini_boss_tb` SET `sophong` = '$int', `loinhan` = '13', `danh_sm` = '$randxu', `users` = '$user_id'");
			if($nguoichoi == $user_id){
			mysql_query("UPDATE `gamemini_boss_phong` SET `$type` = '1' WHERE `id` = '$int' LIMIT 1");
			}
		}
		
	}
	if($rand >= 80 && $rand <= 94){
		if($timkiemboss[name_id] != 0 && $timkiemboss[loaisp] != ""){
		mysql_query("UPDATE `users` SET `ruongbian` = `ruongbian`+".$ruongbian." WHERE `id` = '{$user_id}' LIMIT 1");
		mysql_query("INSERT INTO `gamemini_boss_tb` SET `sophong` = '$int', `loinhan` = '12', `tenvatpham` = '$timkiemboss[name_vp]', `users` = '$user_id'");
		if($nguoichoi == $user_id){
		mysql_query("UPDATE `gamemini_boss_phong` SET `$type` = '1' WHERE `id` = '$int' LIMIT 1");
		}
		}else{
			$randxu = rand(1,$timkiemboss['xu']);
			mysql_query("UPDATE `users` SET `xu` = `xu` + '$randxu' WHERE `id` = '$user_id' LIMIT 1");
			$q="UPDATE `users` SET `xu` = `xu` + '$randxu' WHERE `id` = '$user_id' LIMIT 1";
	
			mysql_query("INSERT INTO `gamemini_boss_tb` SET `sophong` = '$int', `loinhan` = '13', `danh_sm` = '$randxu', `users` = '$user_id'");
			if($nguoichoi == $user_id){
			mysql_query("UPDATE `gamemini_boss_phong` SET `$type` = '1' WHERE `id` = '$int' LIMIT 1");
			}
		}
	}
	if($rand < 80){
		$chiaxu = floor($timkiemboss['xu']/2);
		$randxu = rand($chiaxu,$timkiemboss['xu']);
		mysql_query("UPDATE `users` SET `xu` = `xu` + '$randxu' WHERE `id` = '$user_id' LIMIT 1");
		$q="UPDATE `users` SET `xu` = `xu` + '$randxu' WHERE `id` = '$user_id' LIMIT 1";
		
		mysql_query("INSERT INTO `gamemini_boss_tb` SET `sophong` = '$int', `loinhan` = '13', `danh_sm` = '$randxu', `users` = '$user_id'");
		if($nguoichoi == $user_id){
		mysql_query("UPDATE `gamemini_boss_phong` SET `$type` = '1' WHERE `id` = '$int' LIMIT 1");
		}
	}
}
}
}
}
?>