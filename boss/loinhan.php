<?php
define('_IN_JOHNCMS', 1);
require_once('../incfiles/core.php');
require_once('ruongbian.php');
if($user_id){
$res = mysql_query("SELECT * FROM `gamemini_boss_tb` WHERE `sophong` = '$int' ORDER BY `id` DESC LIMIT 5");
	while($loinhan = mysql_fetch_array($res)){
		$user_n = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '$loinhan[users]' LIMIT 1"));
		echo '<div class="list5">';
		if($loinhan[loinhan] == 1){
			echo '<b>'.$user_n[name].'</b> nhìn thấy bot như nhìn thấy một đống mồi ngon điên loạn cắn xé con bot khiến con bot tiêu hao đi '.$loinhan[danh_sm].' sức mạnh và bị bot bật lại mất '.$loinhan[mat_sm].' hp...';
		}
		if($loinhan[loinhan] == 2){
			echo '<b>'.$user_n[name].'</b> đập điên dép tông đất huyền thoại vào mặt bot khiên bot mất đi '.$loinhan[danh_sm].' sức mạnh và bị bot bật lại mất '.$loinhan[mat_sm].' hp...';
		}
		if($loinhan[loinhan] == 3){
			echo '<b>'.$user_n[name].'</b> do quá nóng nảy mà <b>'.$user_n[name].'</b> đã đá một phát vào chỗ *** khiến mặt bot rất thốn và tiêu hao đi '.$loinhan[danh_sm].' sức mạnh, nhưng bạn không may bị bot cắn lén một cái khiến <b>'.$user_n[name].'</b> mất đi '.$loinhan[mat_sm].' hp...';
		}
		if($loinhan[loinhan] == 4){
			echo 'Những pha đập tát tới tấp của <b>'.$user_n[name].'</b> đã làm bot không tránh khỏi sự đau đớn và gục ngã '.$loinhan[danh_sm].' sức mạnh trong lúc sơ ý <b>'.$user_n[name].'</b> để bot phản công vì bị tiêu hao đi '.$loinhan[mat_sm].' hp...';
		}
		if($loinhan[loinhan] == 5){
			echo '<b>'.$user_n[name].'</b> tất liên tiếp 8 tát, thụi 8 thụi , toàn thân thâm tím, một hậu quả mà bot đã phải gánh chịu '.$loinhan[danh_sm].' sức mạnh, bot không ưa vẫn quay lại đập cho <b>'.$user_n[name].'</b> 1 phát tí xỉu và khiến <b>'.$user_n[name].'</b> mất đi '.$loinhan[mat_sm].' hp...';
		}
		if($loinhan[loinhan] == 6){
			echo '<b>'.$user_n[name].'</b> nhìn thấy bot như nhìn thấy một đống mồi ngon điên loạn cắn xé con bot khiến con bot tiêu hao đi '.$loinhan[danh_sm].' sức mạnh và bị bot bật lại mất '.$loinhan[mat_sm].' hp...';
		}
		if($loinhan[loinhan] == 7){
echo 'Những pha đập tát tới tấp của <b>'.$user_n[name].'</b> đã làm bot không tránh khỏi sự đau đớn và gục ngã '.$loinhan[danh_sm].' sức mạnh trong lúc sơ ý <b>'.$user_n[name].'</b> để bot phản công vì bị tiêu hao đi '.$loinhan[mat_sm].' hp...';
		}
		if($loinhan[loinhan] == 8){
			echo '<b>'.$user_n[name].'</b> nhìn thấy bot như nhìn thấy một đống mồi ngon điên loạn cắn xé con bot khiến con bot tiêu hao đi '.$loinhan[danh_sm].' sức mạnh và bị bot bật lại mất '.$loinhan[mat_sm].' hp...';
		}
		if($loinhan[loinhan] == 9){
			echo '<b>'.$user_n[name].'</b> đập điên dép tông đất huyền thoại vào mặt bot khiên bot mất đi '.$loinhan[danh_sm].' sức mạnh và bị bot bật lại mất '.$loinhan[mat_sm].' hp...';
		}
		if($loinhan[loinhan] == 10){
			echo '<b>'.$user_n[name].'</b> Đã đánh gục ngã con bot. Chúc mừng cả đội';
		}
		if($loinhan[loinhan] == 11){
			echo '<b>'.$user_n[name].'</b> mở túi quà của bot rơi nhận được <b>'.$loinhan[danh_sm].'</b> lượng, Xin chúc mừng :) .';
		}
		if($loinhan[loinhan] == 12){
			echo '<b>'.$user_n[name].'</b> mở túi quà của bot rơi nhận được vật phẩm là <b>'.$ruongbian.'</b>. Xin chúc mừng :) .';
		}
		if($loinhan[loinhan] == 13){
			echo '<b>'.$user_n[name].'</b> mở túi quà của bot rơi nhận được <b>'.$loinhan[danh_sm].'</b> xu.';
		}
		if($loinhan[loinhan] == 14){
			echo '<b>'.$user_n[name].'</b> bị bot đáp trả mãnh liệt khiến trấn thương sọ não tiêu hao mất '.$loinhan[danh_sm].' hp</b>';
		}
		
		
		echo '</div>';
}

}
?>