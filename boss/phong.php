<?php
define('_IN_JOHNCMS', 1);
require_once('../incfiles/core.php');
$textl = 'Đấu boss';
require('../incfiles/head.php');
if($user_id){
if(isset($_GET['no_chuphong'])) echo '<div class="rmenu" style="text-align: center; font-size: 16px;">Bạn không phải là chủ phòng không thể bắt đầu trận</div>';
if(isset($_GET['dathamgia'])) echo '<div class="rmenu" style="text-align: center; font-size: 16px;">Bạn đã tham gia ở phòng này rồi</div>';
if(isset($_GET['dalachuphong'])) echo '<div class="rmenu" style="text-align: center; font-size: 16px;">Bạn đang là chủ phòng rồi gia nhập gì nữa</div>';
if(isset($_GET['thoattran_no'])) echo '<div class="rmenu" style="text-align: center; font-size: 16px;">Bạn là chủ phòng không thể rời bỏ mọi người khi bot chưa chết</div>';
if(isset($_GET['quayeu'])) echo '<div class="rmenu" style="text-align: center; font-size: 16px;">Bạn còn quá yếu không thể đánh tiếp</div>';
if(isset($_GET['doi_giay'])) echo '<div class="rmenu" style="text-align: center; font-size: 16px;">Bạn hãy đợi 60 giây để nhân vật phục hồi tuyệt chiêu</div>';
if(isset($_GET['chuadu'])) echo '<div class="rmenu" style="text-align: center; font-size: 16px;">Phòng cần hai người trở lên mới có thể bắt đầu</div>';
if(isset($_GET['hetsm'])) echo '<div class="rmenu" style="text-align: center; font-size: 16px;">Bạn không còn hp để tham gia cùng mọi người hoặc hp của bạn lớn hơn sức mạnh của boss nhé!</div>';
if(isset($_GET['kich_no'])) echo '<div class="rmenu" style="text-align: center; font-size: 16px;">Kích người chơi không thành công</div>';
if(isset($_GET['kich_yes'])) echo '<div class="rmenu" style="text-align: center; font-size: 16px;">Kích người chơi thành công</div>';
if(isset($_GET[id])){
	$int = intval($_GET[id]);
	$post = mysql_fetch_array(mysql_query("SELECT * FROM `gamemini_boss_phong` WHERE `id` = '$int' LIMIT 1"));
	$timkiemboss = mysql_fetch_array(mysql_query("SELECT * FROM `gamemini_boss_name` WHERE `id` = '$post[loaiboss]' LIMIT 1"));
	echo '
	<div class="phdr">Đấu boss phòng '.$int.'</div>
	<div class="gmenu">';
	$ktphong = mysql_result(mysql_query("SELECT COUNT(*) FROM `gamemini_boss_phong` WHERE `id` = '$int' LIMIT 1"), 0);
	if($ktphong != 0){
	//San sang chien dau
	//ket thuc
	echo '
	<div class="omenu"><table><tr><td><img src="img/'.$timkiemboss['id'].'.png"/></td><td>'.$timkiemboss['name'].'';
	if($post['sucmanh_boss'] <= 0){
	echo '<div style="color: red;"><b>Boss đã bị đánh bại</b></div>';
	echo '<div>- Khá khen cho các ngươi, đã đánh bại được ta, từ trước giờ ta là vô định thiên hạ mà giờ bại dưới tay mấy người, ta không phục <img src="http://forumviet.mobi/images/smileys/user/Zalo/19.gif"/></div>';
	if($post['chuphong'] == $user_id || $post[nguoichoi1] == $user_id || $post[nguoichoi2] == $user_id || $post[nguoichoi3] == $user_id){
	echo '<div><center>
	<form method="post">
	<input type="hidden" value="'.$int.'" name="quatang">
	<input type="submit" value="Nhận Quà Ngẫu Nhiên"/>
	</form></center></div>
	';
	require('quatang.php');
	}
	//mod randum even
	
	}else{
		echo '<div>Sức mạnh: <b style="color: red">'.$post['sucmanh_boss'].'</b>/'.$timkiemboss['sucmanh'].'</div>';
	}	//Bạn đã thua :D
	$sm_chuphong = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '$post[chuphong]' LIMIT 1"));
	$sm_nguoichoi1 = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '$post[nguoichoi1]' LIMIT 1"));
	$sm_nguoichoi2 = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '$post[nguoichoi2]' LIMIT 1"));
	$sm_nguoichoi3 = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '$post[nguoichoi3]' LIMIT 1"));
	if($post[sucmanh_boss] > 0){
		if($sm_chuphong[hp] <= 100 && $sm_nguoichoi1[hp] <= 100 && $sm_nguoichoi2[hp] <= 100 && $sm_nguoichoi3[hp] <= 100){
		echo '- Kha kha, Các người trình độ gì mà đòi thắng được ta cơ chứ <img src="http://forumviet.mobi/images/smileys/user/Zalo/72.gif"/>';
		echo '<div style="color: red;"><img src="/icon/next.png"> BOT đã chiến thắng</div> ';
		}
	}
	//KẾt thúc
	echo '</div>';
	echo '</td></tr></table></div>';
	require('loinhan.php');
	echo '<div class="omenu"><table><tr>';
	if($post['chuphong'] != 0){
	     $xxxx=mysql_query("SELECT * FROM `users` WHERE `id` ='".$post['chuphong']."' ");

    $ducnghia_user =  mysql_fetch_array($xxxx);
	echo '<td style="text-align: center;">'.($ducnghia_user[hopthe]=='0'?'
<img class="avatar_b" src="../avatar/'.$ducnghia_user['id'].'.png" width="45" height="48"/>':'<img class="avatar_b" src="../detu/ducnghia/'.$ducnghia_user['hopthe'].'.gif" width="45" height="48""/>').'
	
	
	
	<br/>';
		if($sm_chuphong[hp] > 100){
			echo '<b>HP: '.$sm_chuphong[hp].'</b>';
		}else{
			echo '<b style="color: red">DIE</b>';
		}
		echo '</td>';
	}
	$x1=mysql_query("SELECT * FROM `users` WHERE `id` ='".$post['nguoichoi1']."' ");
 $ducnghia_user1 =  mysql_fetch_array($x1);
 
 $x2=mysql_query("SELECT * FROM `users` WHERE `id` ='".$post['nguoichoi2']."' ");
 $ducnghia_user2 =  mysql_fetch_array($x2);
 
 
 $x3=mysql_query("SELECT * FROM `users` WHERE `id` ='".$post['nguoichoi3']."' ");
 $ducnghia_user3 =  mysql_fetch_array($x3);
 
	if($post['nguoichoi1'] != 0){
	     

	echo '<td style="text-align: center;">
		'.($ducnghia_user1[hopthe]=='0'?'
<img class="avatar_b" src="../avatar/'.$ducnghia_user1['id'].'.png" width="45" height="48"/>':'<img class="avatar_b" src="../detu/ducnghia/'.$ducnghia_user1['hopthe'].'.gif" width="45" height="48""/>').'
		
		
		<br/>';
		if($sm_nguoichoi1[hp] > 100){
			echo '<b>HP: '.$sm_nguoichoi1[hp].'</b>';
		}else{
			echo '<b style="color: red">DIE</b>';
		}
		echo '<br/>';
		if($post[chuphong] == $user_id){
			echo '<b>[ <a href="kich.php?id='.$post['id'].'&nguoichoi1">Kích</a> ]</b>';
		}
		echo '</td>';
	}
	if($post['nguoichoi2'] != 0){
		echo '<td style="text-align: center;">	'.($ducnghia_user2[hopthe]=='0'?'
<img class="avatar_b" src="../avatar/'.$ducnghia_user2['id'].'.png" width="45" height="48"/>':'<img class="avatar_b" src="../detu/ducnghia/'.$ducnghia_user2['hopthe'].'.gif" width="45" height="48""/>').'<br/>';
		if($sm_nguoichoi2[hp] > 100){
			echo '<b>HP: '.$sm_nguoichoi2[hp].'</b>';
		}else{
			echo '<b style="color: red">DIE</b>';
		}
		echo '<br/>';
			if($post[chuphong] == $user_id){
				echo '<b>[ <a href="kich.php?id='.$post['id'].'&nguoichoi2">Kích</a> ]</b>';
		}
		echo '</td>';
	}
	if($post['nguoichoi3'] != 0){
		echo '<td style="text-align: center;"	'.($ducnghia_user3[hopthe]=='0'?'
<img class="avatar_b" src="../avatar/'.$ducnghia_user3['id'].'.png" width="45" height="48"/>':'<img class="avatar_b" src="../detu/ducnghia/'.$ducnghia_user3['hopthe'].'.gif" width="45" height="48""/>').'<br/>';
		if($sm_nguoichoi2[hp] > 100){
			echo '<b>HP: '.$sm_nguoichoi3[sucmanh2].'</b>';
		}else{
			echo '<b style="color: red">DIE</b>';
		}
			echo '<br/>';
			if($post[chuphong] == $user_id){
				echo '<b>[ <a href="kich.php?id='.$post['id'].'&nguoichoi3">Kích</a> ]</b>';
			}
		echo '</td>';
	}
	echo '</tr></table>';
		if($post[sansang] == 0){
			if($post['chuphong']  != $user_id && $post['nguoichoi1']  != $user_id && $post['nguoichoi2']  != $user_id && $post['nguoichoi3']  != $user_id){
				if($post[nguoichoi1] == 0 || $post[nguoichoi2] == 0 || $post[nguoichoi3] == 0){
					echo '<br/><a id="nut" href="gianhap.php?id='.$post['id'].'"> [Sãn Sàng] </a>';
				}
			}
			if($post[nguoichoi1] == $user_id || $post[nguoichoi2] == $user_id || $post[nguoichoi3] == $user_id){
					echo '<a id="nut" href="roitran.php?id='.$post['id'].'"> [Rời trận] </a>';
			}
			if($post[chuphong] == $user_id){
					echo '<a id="nut" href="roitran.php?huyphong='.$post['id'].'"> [Hủy Phòng]</a>';
			}
			if($post['chuphong'] == $user_id){
				if($post['sansang'] == 0)
				echo '<a id="nut" href="gianhap.php?batdau='.$post['id'].'"> [Vào Trận Chiến]</a>';
			}
		}else{
			require('bossdanh.php');
			echo '<br/><a id="nut" href="phong.php?id='.$int.'">[Tải Lại]</a>';
			if($post['chuphong'] == $user_id || $post[nguoichoi1] == $user_id || $post[nguoichoi2] == $user_id || $post[nguoichoi3] == $user_id){
				if($post['sucmanh_boss'] > 0){
				$settrandanh = mysql_fetch_array(mysql_query("SELECT * FROM `gamemini_boss_trandanh` WHERE `sophong` = '$int'"));
				if($post['chuphong'] == $user_id){
					$tinhtime = $settrandanh[timechuphong]+30;
					$sucmanh = $datauser['hp'];
					if($sucmanh >= 100){
						if($tinhtime <= time()){
							echo '<a id="nut" href="danh.php?id='.$post[id].'"> [Đánh] </a>';
						}else{
							$time = $tinhtime-time();
							echo 'Bạn còn '.$time.' giây nữa mới có thế tấn công tiếp, hiện tại nhân vật bạn đang phục hồi các tuyệt chiêu';
						}
					}else{
						if($sm_chuphong[hp] <= 100 && $sm_nguoichoi1[hp] <= 100 && $sm_nguoichoi2[hp] <= 100 && $sm_nguoichoi3[hp] <= 100){
							echo 'Đội của bạn đã thất bại, hãy thoát ra và làm trân khác nhé!';
						}else{
							echo 'Bạn còn quá yếu hãy đợi đồng đội đánh chú boss này thắng nhé!';
						}
					}
				}
				if($post['nguoichoi1'] == $user_id){
					$tinhtime = $settrandanh[timenguoichoi1]+30;
					$sucmanh = $datauser['hp'];
					if($sucmanh >= 100){
						if($tinhtime <= time()){
							echo '<a id="nut" href="danh.php?id='.$post[id].'"> [Đánh] </a>';
						}else{
							$time = $tinhtime-time();
							echo 'Bạn còn '.$time.' giây nữa mới có thế tấn công tiếp, hiện tại nhân vật bạn đang phục hồi các tuyệt chiêu';
						}
					}else{
						echo 'Bạn còn quá yếu hãy đợi đồng đội đánh chú boss này thắng nhé!';
					}					
				}
				if($post['nguoichoi2'] == $user_id){
					$tinhtime = $settrandanh[timenguoichoi2]+30;
					$sucmanh = $datauser['hp'];
					if($sucmanh >= 100){
						if($tinhtime <= time()){
							echo '<a id="nut" href="danh.php?id='.$post[id].'"> [Đánh] </a>';
						}else{
							$time = $tinhtime-time();
							echo 'Bạn còn '.$time.' giây nữa mới có thế tấn công tiếp, hiện tại nhân vật bạn đang phục hồi các tuyệt chiêu';
						}
					}else{
						echo 'Bạn còn quá yếu hãy đợi đồng đội đánh chú boss này thắng nhé!';
					}				
				}
				if($post['nguoichoi3'] == $user_id){
					$tinhtime = $settrandanh[timenguoichoi3]+30;
					$sucmanh = $datauser['hp'];
					if($sucmanh >= 100){
						if($tinhtime <= time()){
							echo '<a id="nut" href="danh.php?id='.$post[id].'"> [Đánh] </a>';
						}else{
							$time = $tinhtime-time();
							echo 'Bạn còn '.$time.' giây nữa mới có thế tấn công tiếp, hiện tại nhân vật bạn đang phục hồi các tuyệt chiêu';
						}
					}else{
						echo 'Bạn còn quá yếu hãy đợi đồng đội đánh chú boss này thắng nhé!';
					}
				}
			}
				if($post[sansang] == 1 && $post[sucmanh_boss] > 0){
					echo '<br/><br/><a id="nut" href="roitran.php?roi='.$int.'"> [Rời Trận Chiến] </a>';
				}else{
					echo '<br/><br/><a id="nut" href="roitran.php?id='.$int.'"> [Rời Trận Chiến] </a>';
				}
			}
		}
echo'<div class="omenu"><img src="/congvien/ya.gif"><a href="hoiphuc.php">Hồi phục </a></div>';
	echo '</div></div><div class="phdr">Chát với nhau</div><div class="gmenu">
	<form action="chat.php" method="post">
	<input type="hidden" value="'.$int.'" name="tid">
	<input type="text" name="noidung">
	<input type="submit" value="Chat"/>
	</form>
	';
		$chat = mysql_query("SELECT * FROM `gamemini_boss_chat` WHERE `sophong` = '$int' AND `id` ORDER BY `id` DESC LIMIT 8");
		while($baichat = mysql_fetch_array($chat)){
			$user_n = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '$baichat[user_id]' LIMIT 1"));
			echo '
			<div class="gmenu_bv">
			<table width="100%"><tr>
			<td width="35px">
			<img class="avatarfr" src="/avatar/'.$user_n['id'].'.png">
			</td><td width="90%"><div class="omenu">
			<a href="/users/'.$user_n['name'].'_'.$user_n['id'].'.html">'.$user_n['name'].'</a>
			<div><span class="sub">
			'.bbcode::notags(functions::checkout($baichat[text])).'</span></div></td></div>';
			echo '</tr></table></div>';
		}
	}else{
		echo '<div class="omenu">Không có phòng này</div>';
	}
}

echo '</div><div class="phdr">Bản quyền by Lethinh<b></b></div>';
echo '';

}else{
	echo '<div class="omenu">- Hãy đăng nhập để sử dụng chức năng này nhé!</div>';
}
require('../incfiles/end.php');
?>