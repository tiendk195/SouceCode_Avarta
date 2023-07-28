<?php

/**
 * @package     LeVanThinh
 * @link        http://vui1st.tk
 * @copyright   Copyright (C) 2017 Vui1st Community
 * @license     LICENSE.txt (see attached file)
 * @version     VERSION.txt (see attached file)
 * @author      Lê Văn Thịnh
 */

define('_IN_JOHNCMS', 1);
$active6 = 'id="selected"';

$rootpath = '';
$headmod = 'login';
require('incfiles/core.php');
require('incfiles/head.php');

echo'<div class="bg-content">
            <div class="title">
                <h4>Đăng nhập</h4>
            </div></div>';

if ($user_id) {
	echo '<div class="romenu">Vui lòng thoát trước khi đăng nhập lại</div>';
	
	require('incfiles/end.php');
	exit;
}
echo'<div class="phdrbox">';
$error = array();
$captcha = FALSE;
$display_form = 1;
$user_login = isset($_POST['n']) ? functions::check($_POST['n']) : NULL;
$user_pass = isset($_REQUEST['p']) ? functions::check($_REQUEST['p']) : NULL;
$user_mem = isset($_POST['mem']) ? 1 : 0;
$user_code = isset($_POST['code']) ? trim($_POST['code']) : NULL;
if ($user_pass && !$user_login && !$id)
$error[] = $lng['error_login_empty'];
if (($user_login || $id) && !$user_pass)
$error[] = $lng['error_empty_password'];
if ($user_login && (mb_strlen($user_login) < 2 || mb_strlen($user_login) > 20))
$error[] = $lng['nick'] . ': ' . $lng['error_wrong_lenght'];
if ($user_pass && (mb_strlen($user_pass) < 3 || mb_strlen($user_pass) > 15))
$error[] = $lng['password'] . ': ' . $lng['error_wrong_lenght'];
if (!$error && $user_pass && ($user_login || $id)) {
// Запрос в базу на юзера
$sql = $id ? "`id` = '$id'" : "`name_lat`='" . functions::rus_lat(mb_strtolower($user_login)) . "'";
$req = mysql_query("SELECT * FROM `users` WHERE $sql LIMIT 1");
if (mysql_num_rows($req)) {
$user = mysql_fetch_assoc($req);

if ($user['failed_login'] > 2) {
if ($user_code) {
if (mb_strlen($user_code) > 3 && $user_code == $_SESSION['code']) {
// Если введен правильный проверочный код
unset($_SESSION['code']);
$captcha = TRUE;
} else {
// Если проверочный код указан неверно
unset($_SESSION['code']);
$error[] = $lng['error_wrong_captcha'];
}
} else {
// Показываем CAPTCHA
$display_form = 0;
echo '<form action="dangnhap.html' . ($id ? '?id=' . $id : '') . '" method="post">' .

'<div class="omenu"><p><img src="captcha.php?r=' . rand(1000, 9999) . '" alt="' . $lng['verifying_code'] . '"/><br />' .
$lng['enter_code'] . ':<br/><input type="text" size="5" maxlength="5"  name="code"/>' .

'<input type="hidden" name="n" value="' . $user_login . '"/>' .
'<input type="hidden" name="p" value="' . $user_pass . '"/>' .
'<input type="hidden" name="mem" value="' . $user_mem . '"/>' .
'<input type="submit" name="submit" value="' . $lng['continue'] . '"/></p></div></form>';
}
}
if ($user['failed_login'] < 3 || $captcha) {
if (md5(md5($user_pass)) == $user['password']) {
// Если логин удачный
$display_form = 0;
mysql_query("UPDATE `users` SET `failed_login` = '0' WHERE `id` = '" . $user['id'] . "'");
if (!$user['preg']) {
// Если регистрация не подтверждена
echo '<div class="omenu"><p>' . $lng['registration_not_approved'] . '</p></div>';
} else {
// Если все проверки прошли удачно, подготавливаем вход на сайт
if (isset($_POST['mem'])) {
// Установка данных COOKIE
$cuid = base64_encode($user['id']);
$cups = md5($user_pass);
setcookie("cuid", $cuid, time() + 3600 * 24 * 365);
setcookie("cups", $cups, time() + 3600 * 24 * 365);
}
// Установка данных сессии
$_SESSION['uid'] = $user['id'];
$_SESSION['ups'] = md5(md5($user_pass));
mysql_query("UPDATE `users` SET `sestime` = '" . time() . "' WHERE `id` = '" . $user['id'] . "'");



$set_user = unserialize($user['set_user']);
if ($user['lastdate'] < (time() - 3600) && $set_user['digest'])
header('Location: ' . $set['homeurl'] . '/index.php?act=digest&last=' . $user['lastdate']);
else
header('Location: ' . $set['homeurl'] . '/index.php');
$text = '<b><center><font size=4" color="red">Cảnh Báo Đăng Nhập</b></center></font><b>- Tài khoản của bạn gần đây đã được đăng nhập trên trình duyệt: <font color="red"/> '.mysql_real_escape_string($agn).'</font> IP: <font color="red"/>'.long2ip(core::$ip).'</font></b>';
mysql_query("INSERT INTO `thongbao` SET
                `id` = '".$user['id']."',
                `user` = '".$user['id']."',
                `text` = '$text',
                `ok` = '1',
                `time` = '" . time() . "'
            ");

echo '<div class="gomenu"><p><b><a href="index.php?act=digest">' . $lng['enter_on_site'] . '</a></b></p></div>';
}
} else {
    /*
// Если логин неудачный
if ($user['failed_login'] < 3) {
// Прибавляем к счетчику неудачных логинов
mysql_query("UPDATE `users` SET `failed_login` = '" . ($user['failed_login'] + 1) . "' WHERE `id` = '" . $user['id'] . "'");

                } 
                */
                		    echo'<script>alert("Thông tin đăng nhập không chính xác!");</script>';
}
}
} else {
                		    echo'<script>alert("Thông tin đăng nhập không chính xác!");</script>';
}
}
if ($display_form) {
if ($error)
echo functions::display_error($error);



echo $info;
echo'<div class="menu" style="background: #edf7ff">
<center>
<div style="font-size:10px;"><b>Sử dụng tài khoản Werfamily để đăng nhập.</b></div><br>
<form action="dangnhap.html" method="post">
<span style="margin-left:-85px; font-family: AVO, Arial !important;">Tên tài khoản</span>
                    <br>
                    <input name="n" type="text" style="margin-top:3px; margin-bottom:5px">
                    <br>
                    <span style="margin-left:-105px;font-family: AVO, Arial !important;"> Mật khẩu </span>
                    <br>
                    <input name="p" type="password" style="margin-top:3px; margin-bottom:5px"><br>
Lưu tài khoản để đăng nhập lần sau : <input type="checkbox" name="mem" value="1" checked="checked"><input type="hidden" name="next" value="">
<p>
<input type="submit" value="Đăng nhập">
</p>
<div style="font-size:10px;">
								Nếu bạn chưa có tài khoản, vui lòng <a href="dangki.php">đăng ký</a></div></br>
</form>
</center>
</div>';

}
echo'</div>';


require('incfiles/end.php');