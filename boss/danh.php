<?php
define('_IN_JOHNCMS', 1);
require_once('../incfiles/core.php');
$textl = 'Đấu boss';
require('../incfiles/head.php');
echo '
<div class="phdr">Đấu boss</div>
<div class="gmenu">';
if($user_id){
$rand_vantu = rand(1,9);
if(isset($_GET[id])){
$int = intval($_GET[id]);
$ktphong = mysql_result(mysql_query("SELECT COUNT(*) FROM `gamemini_boss_phong` WHERE `id` = '$int' LIMIT 1"), 0);
if($ktphong != 0){
	$post = mysql_fetch_array(mysql_query("SELECT * FROM `gamemini_boss_phong` WHERE `id` = '$int' LIMIT 1"));
	if($datauser[hp] >= 100){
	if($post[sucmanh_boss] > 0){
	if($post['chuphong'] == $user_id || $post[nguoichoi1] == $user_id || $post[nguoichoi2] == $user_id || $post[nguoichoi3] == $user_id){
			if($post['sansang'] == 1){
				$settrandanh = mysql_fetch_array(mysql_query("SELECT * FROM `gamemini_boss_trandanh` WHERE `sophong` = '$int'"));
				if($post['chuphong'] == $user_id){
					$tinhtime = $settrandanh[timechuphong]+30;
					if($tinhtime <= time()){
						$sucmanh = $datauser['sucmanh'];
						$sucmanhdanh = floor($sucmanh/2);
						if($sucmanh >= 100){
							$rand = rand(1,$sucmanhdanh);
							mysql_query("UPDATE `gamemini_boss_phong` SET `sucmanh_boss` = `sucmanh_boss` - '$rand' WHERE `id` = '$int' LIMIT 1");
							mysql_query("UPDATE `gamemini_boss_trandanh` SET `timechuphong` = '".time()."' WHERE `sophong` = '$int' LIMIT 1");
							$rand_mat_sucmanh = rand(1,$rand);
							mysql_query("UPDATE `users` SET `hp` = `hp` - '$rand_mat_sucmanh' WHERE `id` = '$user_id' LIMIT 1");
							if($post[sucmanh_boss] <= $rand) 
							{
								$rand_vantu = 10;
								
							}
							mysql_query("INSERT INTO `gamemini_boss_tb` SET `sophong` = '$int', `loinhan` = '$rand_vantu', `danh_sm` = '$rand', `mat_sm` = '$rand_mat_sucmanh', `users` = '$user_id'");
								//echo ' '.$post[sucmanh_boss].' ';
							header('Location: phong.php?id='.$int.'');
						}else{
							header('Location: phong.php?id='.$int.'&quayeu');
						}
					}else{
					header('Location: phong.php?id='.$int.'&doi_giay');
				}					
				}
				if($post['nguoichoi1'] == $user_id){
					$tinhtime = $settrandanh[timenguoichoi1]+30;
					if($tinhtime <= time()){
						$sucmanh = $datauser['sucmanh'];
						$sucmanhdanh = floor($sucmanh/2);
						if($sucmanh >= 100){
							$rand = rand(1,$sucmanhdanh);
							mysql_query("UPDATE `gamemini_boss_phong` SET `sucmanh_boss` = `sucmanh_boss` - '$rand' WHERE `id` = '$int' LIMIT 1");
							mysql_query("UPDATE `gamemini_boss_trandanh` SET `timenguoichoi1` = '".time()."' WHERE `sophong` = '$int' LIMIT 1");
							$rand_mat_sucmanh = rand(1,$rand);
							mysql_query("UPDATE `users` SET `hp` = `hp` - '$rand_mat_sucmanh' WHERE `id` = '$user_id' LIMIT 1");
							if($post[sucmanh_boss] <= $rand) 
							{
								$rand_vantu = 10;
								
							}
							
							mysql_query("INSERT INTO `gamemini_boss_tb` SET `sophong` = '$int', `loinhan` = '$rand_vantu', `danh_sm` = '$rand', `mat_sm` = '$rand_mat_sucmanh', `users` = '$user_id'");
							header('Location: phong.php?id='.$int.'');
						}else{
							header('Location: phong.php?id='.$int.'&quayeu');
						}
					}else{
					header('Location: phong.php?id='.$int.'&doi_giay');
				}					
				}
				if($post['nguoichoi2'] == $user_id){
					$tinhtime = $settrandanh[timenguoichoi2]+30;
					if($tinhtime <= time()){
						$sucmanh = $datauser['sucmanh'];
						$sucmanhdanh = floor($sucmanh/2);
						if($sucmanh >= 100){
							$rand = rand(1,$sucmanhdanh);
							mysql_query("UPDATE `gamemini_boss_phong` SET `sucmanh_boss` = `sucmanh_boss` - '$rand' WHERE `id` = '$int' LIMIT 1");
							mysql_query("UPDATE `gamemini_boss_trandanh` SET `timenguoichoi2` = '".time()."' WHERE `sophong` = '$int' LIMIT 1");
							$rand_mat_sucmanh = rand(1,$rand);
							mysql_query("UPDATE `users` SET `hp` = `hp` - '$rand_mat_sucmanh' WHERE `id` = '$user_id' LIMIT 1");
							if($post[sucmanh_boss] <= $rand) 
							{
								$rand_vantu = 10;
								
							}
							mysql_query("INSERT INTO `gamemini_boss_tb` SET `sophong` = '$int', `loinhan` = '$rand_vantu', `danh_sm` = '$rand', `mat_sm` = '$rand_mat_sucmanh', `users` = '$user_id'");
							header('Location: phong.php?id='.$int.'');
						}else{
							header('Location: phong.php?id='.$int.'&quayeu');
						}
					}else{
					header('Location: phong.php?id='.$int.'&doi_giay');
				}				
				}
				if($post['nguoichoi3'] == $user_id){
					$tinhtime = $settrandanh[timenguoichoi3]+30;
					if($tinhtime <= time()){
						$sucmanh = $datauser['sucmanh'];
						$sucmanhdanh = floor($sucmanh/2);
						if($sucmanh >= 100){
							$rand = rand(1,$sucmanhdanh);
							mysql_query("UPDATE `gamemini_boss_phong` SET `sucmanh_boss` = `sucmanh_boss` - '$rand' WHERE `id` = '$int' LIMIT 1");
							mysql_query("UPDATE `gamemini_boss_trandanh` SET `timenguoichoi3` = '".time()."' WHERE `sophong` = '$int' LIMIT 1");
							$rand_mat_sucmanh = rand(1,$rand);
							mysql_query("UPDATE `users` SET `hp` = `hp` - '$rand_mat_sucmanh' WHERE `id` = '$user_id' LIMIT 1");
							if($post[sucmanh_boss] <= $rand) 
							{
								$rand_vantu = 10;
								
							}
							mysql_query("INSERT INTO `gamemini_boss_tb` SET `sophong` = '$int', `loinhan` = '$rand_vantu', `danh_sm` = '$rand', `mat_sm` = '$rand_mat_sucmanh', `users` = '$user_id'");
							header('Location: phong.php?id='.$int.'');
						}else{
							header('Location: phong.php?id='.$int.'&quayeu');
						}
					}else{
					header('Location: phong.php?id='.$int.'&doi_giay');
				}				
				}
			}else echo 'Trận đấu chưa sẵn sàng..';
			}else{
				echo 'Bạn làm gì có chơi phòng này';
			}
}else{
	echo 'BOT đã chết sao bạn còn muốn thích sát tuyệt chủng nó thế :D';
}
}else echo 'Bạn đã chết ùi :D';
}else{
	echo 'Bạn có chơi phòng này đâu';
}
}

echo '<div class="rmenu"><center>Cộng Đồng Mteen.Me</center><b></b></div>';

}else{
	echo '<div class="rmenu">- Hãy đăng nhập để sử dụng chức năng này nhé!</div>';
}
echo'</div>';
require('../incfiles/end.php');
?>