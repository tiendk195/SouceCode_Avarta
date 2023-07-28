<?php
//mod by pkoolvn
define('_IN_JOHNCMS', 1);
$rootpath = '';
$headmod = 'login';
$textl = 'Lẩy Mật Khẩu Qua Email';
require('incfiles/core.php');
require('incfiles/head.php');
echo '<div class="phdr"><center> Lấy Mật Khẩu Tài Khoản Qua Email </center></div>';

switch($_GET['act'])
{
case 'ok':
$email = htmlspecialchars(trim($_POST['email']));
$check= mysql_result(mysql_query("select count(*) from `users` where `email` = '".$email."'"),0);
if($email == Null){
echo'<div class="rmenu">Vui lòng nhập email</div>';
require('incfiles/end.php');
exit;
}
if($check <= 0){
echo'<div class="rmenu">Email bạn vừa nhập không tồn tại trên hệ thống hoặc chưa xác nhận</div>';
require('incfiles/end.php');
exit;
}

if($check >= 2){
echo'<div class="rmenu">Lỗi vui lòng liên hệ admin Shiro</div>';
require('incfiles/end.php');
exit;
}
$code = rand(100000,999999);
$check= mysql_result(mysql_query("select count(*) from `users` where `code` = '".$code."'"),0);
$nick= mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `email`='".$email."'"));
if($check >= 1){
echo'<div class="rmenu">Ồ! Thật không may đã xảy ra lỗi vui lòng thử lại</div>';
require('incfiles/end.php');
exit;
}
mysql_query("UPDATE users SET `code`='{$code}' WHERE `email`='".$email."'");
function mail_utf8($to, $subject = 'Lấy Lại Mật Khẩu', $message = '', $header = '') {
    $header_ = 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/html; charset=UTF-8' . "\r\nFrom: no-reply@cuibapv2.tk\r\nReply-To: thanhtiensn2002@gmail.com";
    if(mail($to, "=?UTF-8?B?".base64_encode($subject).'?=', $message, $header_ . $header))
        return true;
    return false;
}
$guitoi = $email;
$tieude="Lấy Lại Mật Khẩu";
$noidung="<img src='http://cuibapv2.tk/icon/logo.png'><br><b>Hi $nick[name]!</b><br>Có người đã yêu cầu đặt lại mật khẩu qua email này.<br>Nếu là bạn hãy nhấn vào link dưới đây để lấy lại mật khẩu<br><a href='http://cuibapv2.tk/verify/pass.php?email=$email&code=$code'/><b>http://cuibapv2.tk/verify/pass.php?email=$email&code=$code</b></a><br><font color='green'>Nếu bạn không yêu cầu này vui lòng bỏ qua email này!</font><br><font color='red'><b>Shiro™</b></font>";

if(mail_utf8($guitoi,$tieude,$noidung))
    echo "<div class='rmenu'/>Hệ thống đã gửi cho bạn một email vào <b>$email</b> vui lòng làm theo nội dung email<br><b>Chú Ý: Nếu không thấy email hãy kiểm tra hòm thư spam, thư rác...</b></div>";
else
    echo "<div class='pmenu'/>Gửi email thất bại,hãy liên hệ với SLV <a href='http://fb.com/T.T.Shiro'><font color='red'>Shiro</a></font></div>";
require('incfiles/end.php');
exit;
break;
}
echo'<div class="pmenu">Nhập Địa Chỉ Email Của Bạn:<br><form action="?act=ok" name="but" method="post">';
echo'<input name="email"/><br/>
<input type="submit" class="nut" name="submit" value="Gửi"/></form></div>';
require('incfiles/end.php');
?>