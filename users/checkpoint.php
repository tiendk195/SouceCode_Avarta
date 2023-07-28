<?php

/*-----------
* Module: Verify
* Version: final
* Support: fb.com/lethinhpro123
* Coder: lethinhpro123
----------*/

define('_IN_JOHNCMS',1);
$textl = 'Kích hoạt';
require_once ("../incfiles/core.php");
require_once ("../incfiles/head.php");

echo'<div class="phdr">Kích hoạt tài khoản</div>';
if($datauser['kichhoat'] >0  ){
	header('Location: /');

exit;
}
if(isset($_POST['submit'])){


	$number=intval($_POST['mibile']);
	if ($datauser['otp']!=0){
	    		echo'<div class="pmenu"> OTP của bạn là '.$datauser['otp'].'</div>';

	}else
	if (empty($number)) {
		echo'<div class="omenu"><font color ="red"><b>Lỗi !!</b></font> Vui lòng nhập SĐT!</div>';
	}
	else if(strlen($number) > 12) {
		echo'<div class="omenu"><font color ="red"><b>Lỗi !!</b></font> Vui lòng nhập SĐT Hợp Lệ!</div>';
	} 
	else if(strlen($number) < 9) {
		echo'<div class="omenu"><font color ="red"><b>Lỗi !!</b></font> Vui lòng nhập SĐT Hợp Lệ!</div>';
	} else if($number!=$datauser['mibile']) {
	    		echo'<div class="omenu"><font color ="red"><b>Lỗi !!</b></font> Số điện thoại không chính xác!</div>';
} else {
    $rand=rand(100000,999999);
    		mysql_query("UPDATE `users` SET `otp`='" .$rand. "' WHERE `id`='".$user_id."'");
	    		echo'<div class="gd"><div class="pmenu"><center> Cam on ban da tham gia mang xa hoi avatar truc tuyen Werfamily</br>
	    		OTP cua ban la: '.$rand.'</center></div></div>';


}
		


	
}
if(isset($_POST['kichhoat'])){


	$otp=intval($_POST['otp']);
	
	if ($datauser['otp']==0) {
	  
		echo'<div class="omenu"><font color ="red"><b>Lỗi !!</b></font> Vui lòng nhận OTP!</div>';
	} else
	if (empty($otp)) {
		echo'<div class="omenu"><font color ="red"><b>Lỗi !!</b></font> Vui lòng nhập OTP!</div>';
	}
	else if(strlen($otp) > 6) {
		echo'<div class="omenu"><font color ="red"><b>Lỗi !!</b></font> Vui lòng nhập OTP Hợp Lệ!</div>';
	
	} else if($otp!=$datauser['otp']) {
	    		echo'<div class="omenu"><font color ="red"><b>Lỗi !!</b></font> OTP không chính xác!</div>';
} else {
    		mysql_query("UPDATE `users` SET `kichhoat`='1' WHERE `id`='".$user_id."'");

	header('Location: /');


}
		


	
}

echo'<div class="gd_"><div class="pmenu"><font color="red"><b>(*)</b></font> Để lấy được OTP bạn vui lòng dùng nhập số điện thoại đã đăng kí xuống phía dưới, hệ thống sẽ gửi OTP cho bạn.
 Mã OTP gồm<b> 6</b> kí tự . Nếu cần hỗ trợ xin liên hệ <a href="https://www.facebook.com/lethinhpro123"> FB Admin </a> 
</br>
<form method="post"><center><font color="red">Nhập số điện thoại: </font> <br> <a href="https://www.facebook.com/lethinhpro123"><i>Đã nhập số điện thoại nhưng không nhận được OTP?</i></a><br>
<input type="number" name="mibile" placeholder="Nhập số điện thoại">
<br><input type="submit" name="submit" value="Xác thực"></center>
</form>
</div></div>';

echo'<div class="gd_"><div class="pmenu"><form method="post"><center><font color="red">Nhập mã OTP: </font> <br>
<input type="number" name="otp" placeholder="Nhập mã OTP">
<br><input type="submit" name="kichhoat" value="Kích hoạt"></center>
</form></div></div>';





require('../incfiles/end.php');
?>