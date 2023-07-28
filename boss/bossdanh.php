<?php
define('_IN_JOHNCMS', 1);
require_once('../incfiles/core.php');
if($user_id){
$randxc = rand(10,80);
$timebossdanh = $post[time_boss]+$randxc;
if($post[sucmanh_boss] >= 100){
if($timebossdanh <= time()){
$randboss = rand(1,4);
$chuphong = mysql_fetch_array(mysql_query("SELECT `hp` FROM `users` WHERE `id` = '$post[chuphong]' LIMIT 1"));
$nguoichoi1 = mysql_fetch_array(mysql_query("SELECT `hp` FROM `users` WHERE `id` = '$post[nguoichoi1]' LIMIT 1"));
$nguoichoi2 = mysql_fetch_array(mysql_query("SELECT `hp` FROM `users` WHERE `id` = '$post[nguoichoi2]' LIMIT 1"));
$nguoichoi3 = mysql_fetch_array(mysql_query("SELECT `hp` FROM `users` WHERE `id` = '$post[nguoichoi3]' LIMIT 1"));
$nguoichoism = array($chuphong,$nguoichoi1,$nguoichoi2,$nguoichoi3);
$min = 0;
if($post[sucmanh_boss] <= $post[sucmanh_boss]/2){
	for($i = 0; $i < 4; $i++){
		if($nguoichoism[$i] > $nguoichoism[$min]){
			$min = $i;
		}
	}
	$randboss = $min+1;
}
if($randboss == 1){
	$kiemtratv = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '$post[chuphong]' LIMIT 1"));
	if($kiemtratv[hp] >= 100 && $post[chuphong] != 0){
		$randdanh = rand(100,$kiemtratv[hp]/2);
		$tieuhaosm_boss = 5;
		mysql_query("UPDATE `users` SET `hp` = `hp` - '$randdanh' WHERE `id` = '$post[chuphong]' LIMIT 1");
		mysql_query("INSERT INTO `gamemini_boss_tb` SET `sophong` = '$int', `loinhan` = '14', `danh_sm` = '$randdanh', `users` = '$post[chuphong]'");
		mysql_query("UPDATE `gamemini_boss_phong` SET `time_boss` = '".time()."', `sucmanh_boss` = `sucmanh_boss` - '$tieuhaosm_boss' WHERE `id` = '$int'");
	}else{
		$kiemtratv = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '$post[nguoichoi1]' LIMIT 1"));
		if($kiemtratv[hp] >= 100 && $post[nguoichoi1] != 0){
			$randdanh = rand(100,$kiemtratv[hp]/2);
			$tieuhaosm_boss = 5;
			mysql_query("UPDATE `users` SET `hp` = `hp` - '$randdanh' WHERE `id` = '$post[nguoichoi1]' LIMIT 1");
			mysql_query("INSERT INTO `gamemini_boss_tb` SET `sophong` = '$int', `loinhan` = '14', `danh_sm` = '$randdanh', `users` = '$post[nguoichoi1]'");
			mysql_query("UPDATE `gamemini_boss_phong` SET `time_boss` = '".time()."', `sucmanh_boss` = `sucmanh_boss` - '$tieuhaosm_boss' WHERE `id` = '$int'");
		}else{
			$kiemtratv = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '$post[nguoichoi2]' LIMIT 1"));
			if($kiemtratv[hp] >= 100 && $post[nguoichoi2] != 0){
				$randdanh = rand(100,$kiemtratv[sucmanh2]/2);
				$tieuhaosm_boss = 5;
				mysql_query("UPDATE `users` SET `hp` = `hp` - '$randdanh' WHERE `id` = '$post[nguoichoi2]' LIMIT 1");
				mysql_query("INSERT INTO `gamemini_boss_tb` SET `sophong` = '$int', `loinhan` = '14', `danh_sm` = '$randdanh', `users` = '$post[nguoichoi2]'");
				mysql_query("UPDATE `gamemini_boss_phong` SET `time_boss` = '".time()."', `sucmanh_boss` = `sucmanh_boss` - '$tieuhaosm_boss' WHERE `id` = '$int'");
			}else{
				$kiemtratv = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '$post[nguoichoi3]' LIMIT 1"));
				if($kiemtratv[hp] >= 100 && $post[nguoichoi3] != 0){
					$randdanh = rand(100,$kiemtratv[hp]/2);
					$tieuhaosm_boss = 5;
					mysql_query("UPDATE `users` SET `hp` = `hp` - '$randdanh' WHERE `id` = '$post[nguoichoi3]' LIMIT 1");
					mysql_query("INSERT INTO `gamemini_boss_tb` SET `sophong` = '$int', `loinhan` = '14', `danh_sm` = '$randdanh', `users` = '$post[nguoichoi3]'");
					mysql_query("UPDATE `gamemini_boss_phong` SET `time_boss` = '".time()."', `sucmanh_boss` = `sucmanh_boss` - '$tieuhaosm_boss' WHERE `id` = '$int'");

				}
			}
		}
	}
}
if($randboss == 2){
	$kiemtratv = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '$post[nguoichoi1]' LIMIT 1"));
	if($kiemtratv[hp] >= 100 && $post[nguoichoi1] != 0){
		$randdanh = rand(1,$kiemtratv[hp]/2);
		$tieuhaosm_boss = 5;
		mysql_query("UPDATE `users` SET `hp` = `hp` - '$randdanh' WHERE `id` = '$post[nguoichoi1]' LIMIT 1");
		mysql_query("INSERT INTO `gamemini_boss_tb` SET `sophong` = '$int', `loinhan` = '14', `danh_sm` = '$randdanh', `users` = '$post[nguoichoi1]'");
		mysql_query("UPDATE `gamemini_boss_phong` SET `time_boss` = '".time()."', `sucmanh_boss` = `sucmanh_boss` - '$tieuhaosm_boss' WHERE `id` = '$int'");
	}else{
		$kiemtratv = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '$post[chuphong]' LIMIT 1"));
		if($kiemtratv[hp] >= 100 && $post[chuphong] != 0){
			$randdanh = rand(100,$kiemtratv[hp]/2);
			$tieuhaosm_boss = 5;
			mysql_query("UPDATE `users` SET `hp` = `hp` - '$randdanh' WHERE `id` = '$post[chuphong]' LIMIT 1");
			mysql_query("INSERT INTO `gamemini_boss_tb` SET `sophong` = '$int', `loinhan` = '14', `danh_sm` = '$randdanh', `users` = '$post[chuphong]'");
			mysql_query("UPDATE `gamemini_boss_phong` SET `time_boss` = '".time()."', `sucmanh_boss` = `sucmanh_boss` - '$tieuhaosm_boss' WHERE `id` = '$int'");
			
		}else{
			$kiemtratv = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '$post[nguoichoi2]' LIMIT 1"));
			if($kiemtratv[hp] >= 100 && $post[nguoichoi2] != 0){
				$randdanh = rand(100,$kiemtratv[hp]/2);
				$tieuhaosm_boss = 5;
				mysql_query("UPDATE `users` SET `hp` = `hp` - '$randdanh' WHERE `id` = '$post[nguoichoi2]' LIMIT 1");
				mysql_query("INSERT INTO `gamemini_boss_tb` SET `sophong` = '$int', `loinhan` = '14', `danh_sm` = '$randdanh', `users` = '$post[nguoichoi2]'");
				mysql_query("UPDATE `gamemini_boss_phong` SET `time_boss` = '".time()."', `sucmanh_boss` = `sucmanh_boss` - '$tieuhaosm_boss' WHERE `id` = '$int'");
				
			}else{
				$kiemtratv = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '$post[nguoichoi3]' LIMIT 1"));
				if($kiemtratv[hp] >= 100 && $post[nguoichoi3] != 0){
					$randdanh = rand(100,$kiemtratv[hp]/2);
					$tieuhaosm_boss = 5;
					mysql_query("UPDATE `users` SET `hp` = `hp` - '$randdanh' WHERE `id` = '$post[nguoichoi3]' LIMIT 1");
					mysql_query("INSERT INTO `gamemini_boss_tb` SET `sophong` = '$int', `loinhan` = '14', `danh_sm` = '$randdanh', `users` = '$post[nguoichoi3]'");
					mysql_query("UPDATE `gamemini_boss_phong` SET `time_boss` = '".time()."', `sucmanh_boss` = `sucmanh_boss` - '$tieuhaosm_boss' WHERE `id` = '$int'");

				}
			}
		}
	}
}
if($randboss == 3){
	$kiemtratv = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '$post[nguoichoi3]' LIMIT 1"));
	if($kiemtratv[hp] >= 100 && $post[nguoichoi3] != 0){
		$randdanh = rand(100,$kiemtratv[hp]/2);
		$tieuhaosm_boss = 5;
		mysql_query("UPDATE `users` SET `hp` = `hp` - '$randdanh' WHERE `id` = '$post[nguoichoi3]' LIMIT 1");
		mysql_query("INSERT INTO `gamemini_boss_tb` SET `sophong` = '$int', `loinhan` = '14', `danh_sm` = '$randdanh', `users` = '$post[nguoichoi3]'");
		mysql_query("UPDATE `gamemini_boss_phong` SET `time_boss` = '".time()."', `sucmanh_boss` = `sucmanh_boss` - '$tieuhaosm_boss' WHERE `id` = '$int'");
		
	}else{
		$kiemtratv = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '$post[chuphong]' LIMIT 1"));
		if($kiemtratv[hp] >= 100 && $post[chuphong] != 0){
			$randdanh = rand(100,$kiemtratv[hp]/2);
			$tieuhaosm_boss = 5;
			mysql_query("UPDATE `users` SET `hp` = `hp` - '$randdanh' WHERE `id` = '$post[chuphong]' LIMIT 1");
			mysql_query("INSERT INTO `gamemini_boss_tb` SET `sophong` = '$int', `loinhan` = '14', `danh_sm` = '$randdanh', `users` = '$post[chuphong]'");
			mysql_query("UPDATE `gamemini_boss_phong` SET `time_boss` = '".time()."', `sucmanh_boss` = `sucmanh_boss` - '$tieuhaosm_boss' WHERE `id` = '$int'");
			
		}else{
			$kiemtratv = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '$post[nguoichoi2]' LIMIT 1"));
			if($kiemtratv[sucmanh2] >= 100 && $post[nguoichoi2] != 0){
				$randdanh = rand(100,$kiemtratv[hp]/2);
				$tieuhaosm_boss = 5;
				mysql_query("UPDATE `users` SET `hp` = `hp` - '$randdanh' WHERE `id` = '$post[nguoichoi2]' LIMIT 1");
				mysql_query("INSERT INTO `gamemini_boss_tb` SET `sophong` = '$int', `loinhan` = '14', `danh_sm` = '$randdanh', `users` = '$post[nguoichoi2]'");
				mysql_query("UPDATE `gamemini_boss_phong` SET `time_boss` = '".time()."', `sucmanh_boss` = `sucmanh_boss` - '$tieuhaosm_boss' WHERE `id` = '$int'");
				
			}else{
				$kiemtratv = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '$post[nguoichoi1]' LIMIT 1"));
				if($kiemtratv[hp] >= 100 && $post[nguoichoi1] != 0){
					$randdanh = rand(100,$kiemtratv[hp]/2);
					$tieuhaosm_boss = 5;
					mysql_query("UPDATE `users` SET `hp` = `hp` - '$randdanh' WHERE `id` = '$post[nguoichoi1]' LIMIT 1");
					mysql_query("INSERT INTO `gamemini_boss_tb` SET `sophong` = '$int', `loinhan` = '14', `danh_sm` = '$randdanh', `users` = '$post[nguoichoi1]'");
					mysql_query("UPDATE `gamemini_boss_phong` SET `time_boss` = '".time()."', `sucmanh_boss` = `sucmanh_boss` - '$tieuhaosm_boss' WHERE `id` = '$int'");

				}
			}
		}
	}
}
if($randboss == 3){
	$kiemtratv = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '$post[nguoichoi2]' LIMIT 1"));
	if($kiemtratv[hp] >= 100 && $post[nguoichoi2] != 0){
		$randdanh = rand(100,$kiemtratv[hp]/2);
		$tieuhaosm_boss = 5;
		mysql_query("UPDATE `users` SET `hp` = `hp` - '$randdanh' WHERE `id` = '$post[nguoichoi2]' LIMIT 1");
		mysql_query("INSERT INTO `gamemini_boss_tb` SET `sophong` = '$int', `loinhan` = '14', `danh_sm` = '$randdanh', `users` = '$post[nguoichoi2]'");
		mysql_query("UPDATE `gamemini_boss_phong` SET `time_boss` = '".time()."', `sucmanh_boss` = `sucmanh_boss` - '$tieuhaosm_boss' WHERE `id` = '$int'");
		
	}else{
		$kiemtratv = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '$post[nguoichoi1]' LIMIT 1"));
		if($kiemtratv[hp] >= 100 && $post[nguoichoi1] != 0){
			$randdanh = rand(100,$kiemtratv[hp]/2);
			$tieuhaosm_boss = 5;
			mysql_query("UPDATE `users` SET `hp` = `hp` - '$randdanh' WHERE `id` = '$post[nguoichoi1]' LIMIT 1");
			mysql_query("INSERT INTO `gamemini_boss_tb` SET `sophong` = '$int', `loinhan` = '14', `danh_sm` = '$randdanh', `users` = '$post[nguoichoi1]'");
			mysql_query("UPDATE `gamemini_boss_phong` SET `time_boss` = '".time()."', `sucmanh_boss` = `sucmanh_boss` - '$tieuhaosm_boss' WHERE `id` = '$int'");
			
		}else{
			$kiemtratv = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '$post[nguoichoi3]' LIMIT 1"));
			if($kiemtratv[hp] >= 100 && $post[nguoichoi3] != 0){
				$randdanh = rand(100,$kiemtratv[hp]/2);
				$tieuhaosm_boss = 5;
				mysql_query("UPDATE `users` SET `hp` = `hp` - '$randdanh' WHERE `id` = '$post[nguoichoi3]' LIMIT 1");
				mysql_query("INSERT INTO `gamemini_boss_tb` SET `sophong` = '$int', `loinhan` = '14', `danh_sm` = '$randdanh', `users` = '$post[nguoichoi3]'");
				mysql_query("UPDATE `gamemini_boss_phong` SET `time_boss` = '".time()."', `sucmanh_boss` = `sucmanh_boss` - '$tieuhaosm_boss' WHERE `id` = '$int'");
				
		}else{
				$kiemtratv = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '$post[chuphong]' LIMIT 1"));
				if($kiemtratv[hp] >= 100 && $post[chuphong] != 0){
					$randdanh = rand(100,$kiemtratv[hp]/2);
					$tieuhaosm_boss = 5;
					mysql_query("UPDATE `users` SET `hp` = `hp` - '$randdanh' WHERE `id` = '$post[chuphong]' LIMIT 1");
					mysql_query("INSERT INTO `gamemini_boss_tb` SET `sophong` = '$int', `loinhan` = '14', `danh_sm` = '$randdanh', `users` = '$post[chuphong]'");
					mysql_query("UPDATE `gamemini_boss_phong` SET `time_boss` = '".time()."', `sucmanh_boss` = `sucmanh_boss` - '$tieuhaosm_boss' WHERE `id` = '$int'");

				}
			}
		}
	}
}
}
}
}
?>