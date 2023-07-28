<?php
/**
 * @package     JohnCMS
 * @link        http://johncms.com
 * @copyright   Copyright (C) 2008-2011 JohnCMS Community
 * @license     LICENSE.txt (see attached file)
 * @version     VERSION.txt (see attached file)
 * @author      http://johncms.com/about
 */

define('_IN_JOHNCMS', 1);
$active5 = 'id="selected"';




$rootpath = '';
require('incfiles/core.php');
$textl = $lng['registration'];
$headmod = 'registration';

require('incfiles/head.php');
echo'</td></tr></table>';
$lng_reg = core::load_lng('registration');

echo'<div class="phdrbox">';
if (core::$deny_registration || !$set['mod_reg']) {
    echo '<p>' . $lng_reg['registration_closed'] . '</p>';
    require('incfiles/end.php');
    exit;
}


echo'<div class="bg-content">
            <div class="title">
                <h4>Đăng ký</h4>
            </div></div>';
if ($user_id) {
	echo '<div class="romenu">Vui lòng thoát trước khi đăng kí</div>';
	echo '</div>';
	require('incfiles/end.php');
	exit;
}
	//Cấm reg nhiều nick
/*
if (!$user_id) {
                		    echo'<script>alert("Vui lòng đợi đến 0H 26/07/2021");</script>';
	echo '</div>';
	require('incfiles/end.php');
	exit;
}
*/

$checknick=mysql_num_rows(mysql_query("SELECT * FROM `users` WHERE `id`='".$id."'"));
if ($checknick==0 && isset($_GET['id'])) {
                		    echo'<script>alert("Mã giới thiệu không chính xác");</script>';
	echo '</div>';
	require('incfiles/end.php');
	exit;
}

$captcha;
$reg_gioithieu = isset($_POST['magioithieu']) ? trim($_POST['magioithieu']) : '';

$reg_nick = isset($_POST['nick']) ? trim($_POST['nick']) : '';
$lat_nick = functions::rus_lat(mb_strtolower($reg_nick));
$reg_pass = isset($_POST['password']) ? trim($_POST['password']) : '';
$reg_live = isset($_POST['live']) ? trim($_POST['live']) : '';
$reg_mibile = isset($_POST['mibile']) ? trim($_POST['mibile']) : '';
$reg_name = isset($_POST['imname']) ? trim($_POST['imname']) : '';
$reg_mail = isset($_POST['mail']) ? trim($_POST['mail']) : '';
$reg_about = isset($_POST['about']) ? trim($_POST['about']) : '';
$reg_sex = isset($_POST['sex']) ? functions::check(mb_substr(trim($_POST['sex']), 0, 2)) : '';

if (isset($_POST['submit'])) {


    //lấy dữ liệu được post lên
    $site_key_post    = $_POST['g-recaptcha-response'];
      
    //lấy IP của khach
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $remoteip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $remoteip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $remoteip = $_SERVER['REMOTE_ADDR'];
    }
     
    //tạo link kết nối
    ////$api_url = $api_url.'?secret='.$secret_key.'&response='.$site_key_post.'&remoteip='.$remoteip;
    //lấy kết quả trả về từ google
    ////$response = file_get_contents($api_url);
    //dữ liệu trả về dạng json
    ////$response = json_decode($response);
  
   
	

    // Принимаем переменные
    $error = array();
	

    // Проверка Логина
	if ($reg_gioithieu !=''){
	        $magioithieu=mysql_result(mysql_query("SELECT `magioithieu` FROM `users` WHERE `magioithieu`='".$reg_gioithieu."'"),0);
if ($reg_gioithieu != $magioithieu){
                    		    echo'<script>alert("Mã giới thiệu không chính xác!");</script>';

echo'</div>';

	require('incfiles/end.php');
	exit;
}
	}
    if (empty($reg_mibile)){
        
                       		    echo'<script>alert("Số điện thoại không chính xác!");</script>';

echo'</div>';

	require('incfiles/end.php');
	exit;
}

    if (empty($reg_nick))
        $error['login'][] = $lng_reg['error_nick_empty'];
    elseif (mb_strlen($reg_nick) < 3 || mb_strlen($reg_nick) > 30)
        $error['login'][] = $lng_reg['error_nick_lenght'];
    if (preg_match('/[^\da-z\-\@\*\(\)\?\!\~\_\=\[\]]+/', $lat_nick))
        $error['login'][] = $lng['error_wrong_symbols'];
    // Проверка пароля
    if (empty($reg_pass)) $error['password'][] = $lng['error_empty_password'];
    elseif (mb_strlen($reg_pass) < 3 || mb_strlen($reg_pass) > 10) $error['password'][] = $lng['error_wrong_lenght'];
    if (preg_match('/[^\dA-Za-z]+/', $reg_pass)) $error['password'][] = $lng['error_wrong_symbols'];
    // Проверка пола
    if ($reg_sex != 'm' && $reg_sex != 'zh') $error['sex'] = $lng_reg['error_sex'];
    // Проверка кода CAPTCHA

    // Проверка переменных
    if (empty($error)) {
        $pass = md5(md5($reg_pass));
        $reg_name = functions::check(mb_substr($reg_name, 0, 20));
        $reg_about = functions::check(mb_substr($reg_about, 0, 500));

        // Проверка, занят ли ник
        $req = mysql_query("SELECT * FROM `users` WHERE `name_lat`='" . mysql_real_escape_string($lat_nick) . "'");
        if (mysql_num_rows($req) != 0) {
            $error['login'][] = $lng_reg['error_nick_occupied'];
        }
    }
    if (empty($error)) {
        $preg = $set['mod_reg'] > 1 ? 1 : 0;
			if ($reg_gioithieu !=''){

			        $magioithieu=mysql_result(mysql_query("SELECT `magioithieu` FROM `users` WHERE `magioithieu`='".$reg_gioithieu."'"),0);
					
$xxx=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `magioithieu`='".$reg_gioithieu."'"));

if ($reg_gioithieu == $magioithieu){

        mysql_query("UPDATE `users` SET `xu`= `xu`+  '500000', `luong`= `luong`+'5' , `luongkhoa`= `luongkhoa`+'10', `gioithieu`= `gioithieu`+'1' , `diemgioithieu`= `diemgioithieu`+'1'   WHERE `id`='".$xxx['id']."'");
        mysql_query("INSERT INTO `users` SET
            `name` = '" . mysql_real_escape_string($reg_nick) . "',
            `name_lat` = '" . mysql_real_escape_string($lat_nick) . "',
            `password` = '" . mysql_real_escape_string($pass) . "',
            `imname` = '$reg_name',
            `live` = '$reg_live',
            `mibile` = '$reg_mibile',
            `about` = '$reg_about',
            `mail` = '$reg_mail',
            `sex` = '$reg_sex',
            `rights` = '0',
            `ip` = '" . core::$ip . "',
            `ip_via_proxy` = '" . core::$ip_via_proxy . "',
            `browser` = '" . mysql_real_escape_string($agn) . "',
            `datereg` = '" . time() . "',
            `lastdate` = '" . time() . "',
            `sestime` = '" . time() . "',
            `preg` = '$preg',
            `set_user` = '',
            `set_forum` = '',
            `xu`='5000000',
            `hpfull`='200',
            `sucmanh`='200',
            `hp`='200',
            `kichhoat`='0',
						            `luongkhoa`='100',

            `luong`='3000'
        ") or exit(__LINE__ . ': ' . mysql_error());
		$xxx2=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `name`='".$reg_nick."'"));

        $bot = 'Chào Mừng @'.$xxx2['id'].' Vừa Được @'.$xxx['id'].' Giới Thiệu Vào MXH';
       
			} }		else {
                mysql_query("INSERT INTO `users` SET
            `name` = '" . mysql_real_escape_string($reg_nick) . "',
            `name_lat` = '" . mysql_real_escape_string($lat_nick) . "',
            `password` = '" . mysql_real_escape_string($pass) . "',
            `imname` = '$reg_name',
            `live` = '$reg_live',
            `mibile` = '$reg_mibile',
            `about` = '$reg_about',
            `mail` = '$reg_mail',
            `sex` = '$reg_sex',
            `rights` = '0',
            `ip` = '" . core::$ip . "',
            `ip_via_proxy` = '" . core::$ip_via_proxy . "',
            `browser` = '" . mysql_real_escape_string($agn) . "',
            `datereg` = '" . time() . "',
            `lastdate` = '" . time() . "',
            `sestime` = '" . time() . "',
            `preg` = '$preg',
            `set_user` = '',
            `set_forum` = '',
            `xu`='5000000',

            `hpfull`='200',
            `sucmanh`='200',
            `hp`='200',
            `kichhoat`='0',
            `luong`='2000'
        ") or exit(__LINE__ . ': ' . mysql_error());

        $bot = ' Chào mừng bạn [b]'.$reg_nick.'[/b]  đã gia nhập ngôi nhà chung Werfamily. Chúc bạn online vui vẻ /-showlove   ';
        }
		
        $usid = mysql_insert_id();
        $time = time();
        mysql_query("INSERT INTO `guest` SET
             `adm` = '0',
             `time` = '$time',
             `user_id` = '2',
             `name` = 'BOT',
             `text` = '" . mysql_real_escape_string($bot) . "',
             `ip` = '0000',
             `browser` = 'IPHONE'
         ");

        // Отправка системного сообщения
        $set_mail = unserialize($set['setting_mail']);
        if (!isset($set_mail['message_include'])) {
            $set_mail['message_include'] = 0;
        }

        if ($set_mail['message_include']) {
            $array = array('{LOGIN}', '{TIME}');
            $array_replace = array($reg_nick, '{TIME=' . time() . '}');

            if (empty($set['them_message']))
                $set['them_message'] = $lng_mail['them_message'];
            if (empty($set['reg_message']))
                $set['reg_message'] = $lng['hi'] . ", {LOGIN}\r\n" . $lng_mail['pleased_see_you'] . "\r\n" . $lng_mail['come_my_site'] . "\r\n" . $lng_mail['respectfully_yours'];
            $theme = str_replace($array, $array_replace, $set['them_message']);
            $system = str_replace($array, $array_replace, $set['reg_message']);
            mysql_query("INSERT INTO `cms_mail` SET
			    `user_id` = '0',
			    `from_id` = '" . $usid . "',
			    `text` = '" . mysql_real_escape_string($system) . "',
			    `time` = '" . time() . "',
			    `sys` = '1',
			    `them` = '" . mysql_real_escape_string($theme) . "'
			");
        }

echo'<div style="font-size:10px;padding-top:3px;"><center><b>Tài khoản đã được đăng ký thành công, thông tin tài khoản.</b></center></div><table><tbody><tr><td></table></tbody></tr></td><form action="/dangnhap.html" method="post"><center><table border="0"  cellpadding="0" cellspacing="0"><tbody><tr><td><label for="user">Tên đăng nhập:</label></td><td><input type="text" name="n" value="'.$reg_nick.'"></td></tr><tr><td><label for="pass">Mật khẩu:</label></td><td><input type="text" name="p" value="'.$reg_pass.'"></p></td></tr></tbody></table><input type="hidden" name="mem" value="1" checked="checked"><input type="hidden" name="next" value="'.$url.'" /><input type="submit"  value="Đăng nhập" /></center></form>';
     
     echo'</div></br></br>';
     require('incfiles/end.php');
        exit;
    }
}

/*
-----------------------------------------------------------------
Форма регистрации
-----------------------------------------------------------------
*/

if ($set['mod_reg'] == 1) echo '<div class="romenu"></div>';
/*
echo'<form method="post"><div class="omenu">' .
'<b>' . $lng_reg['login'] . ' </b><br/>' .
'<input type="text" name="nick" maxlength="15" value="' . htmlspecialchars($reg_nick) . '"' . (isset($error['login']) ? ' style="background-color: #FFCCCC"' : '') . '/><br />' .
'<b>' . $lng_reg['password'] . ' </b><br/>' .
'<input type="text" name="password" maxlength="30" value="' . htmlspecialchars($reg_pass) . '"' . (isset($error['password']) ? ' style="background-color: #FFCCCC"' : '') . '/><br/>' .
'</span>' .
(isset($error['sex']) ? '<span class="red"><small>' . $error['sex'] . '</small></span><br />' : '') .
'</div></div>' .
'<div class="phdrbox">' .
'<div class="omenu">' .
'<p><b> Giới tính</b><br/>' .
'<input type="radio" value="m" name="sex" ' . ($reg_sex == 'm' ? 'checked="checked"' : '') . '/>Nam<br />' .
'<input type="radio" value="zh" name="sex" ' . ($reg_sex == 'zh' ? 'checked="checked"' : '') . '/>Nữ' .
'</select></p>' .
'</span></div>' .
'<div class="omenu">' .
'<p><b>Số Điện Thoại Của Bạn  </b><br/>' .
(isset($error['mibile']) ? '<span style="color:blue">Bạn chưa nhập SĐT của bạn</span><br />' : '') .
'<input type="text" name="mibile" maxlength="30" value="' . htmlspecialchars($reg_mibile) . '"' . (isset($error['mibile']) ? ' style="background-color: #FFCCCC"' : '') . '/><br />' .
'<p><b>Email</b></br>' .
'<input type="text" name="mail" maxlength="30" value=""' . (isset($error['mail']) ? ' style="background-color: #FFCCCC"' : '') . '/></br></br>' .
'<b>Giới thiệu bản thân</b></br>' .
'<input type="text" name="about" maxlength="30" value=""' . (isset($error['about']) ? ' style="background-color: #FFCCCC"' : '') . '/><br/>' .


'<div class="omenu">';
//value="' . htmlspecialchars($reg_nick) . '"' . (isset($error['login']) ? ' style="background-color: #FFCCCC"' : '') . '/>

////'<div class="g-recaptcha" data-sitekey='."$site_key".'></div><br/>';
echo'<p><button type="submit" name="submit" value="' . $lng_reg['registration'] . '"/>Đăng kí</button></p></div></form>';
*/
echo'
<form method="post"><div class="bg-content" style="padding:5px;"><br><table width="100%"><tbody><tr>
</tr></tbody></table><table width="100%">
									<tbody><tr>
										<td width="20%">
										Tên tài khoản
										</td>
										<td>
										<input type="text" name="nick" maxlength="15" value="' . htmlspecialchars($reg_nick) . '"' . (isset($error['login']) ? ' style="background-color: #FFCCCC"' : '') . '/><br>
										<i>Tên tài khoản (account)</i>
										</td>
									</tr><tr>
										<td>
										Mật khẩu 
										</td>
										<td>
										<input type="password" name="password" maxlength="30" value="' . htmlspecialchars($reg_pass) . '"' . (isset($error['password']) ? ' style="background-color: #FFCCCC"' : '') . '/>
										</td>
									</tr><tr>
										<td>
										Mã giới thiệu
										</td>
										<td>
										<input type="text" name="magioithieu" maxlength="30" value="">
										</td>
									</tr>
										<tr>
										<td>
										Chọn giới tính<br>
										
										</td>
										<td>
										<select name="sex">
											<option value="?">Chọn giới tính </option>
											<option value="m">Nam </option>
											<option value="zh">Nữ </option>
										</select>
										</td>
									</tr><tr><td width="20%">
										 Số điện thoại đăng ký
										</td>	<td>
										<input type="text" name="mibile" maxlength="15" value="'.$reg_mibile.'"><br />
										<br><i>Vui lòng nhập đúng Số điện thoại để tham gia MXH</i>
										</td></tr><tr>
										<td colspan="2">- Tài khoản của Werfamily chỉ đăng nhập ở Trang duy nhất Werfamily.tk, không thể đăng nhập ở trang khác ngoài Werfamily.tk<br>- Số điện thoại của bạn sẽ được Hệ thống mã hóa, không hiện ra bất kỳ chỗ nào khác<br>- Bất kỳ ai giữ số điện thoại hoặc email bạn dùng đăng ký đều có thể lấy lại mật khẩu. Do đó đừng dùng SĐT/Email của người khác<br>- Không cung cấp mật khẩu cho bất kỳ ai. Admin không bao giờ hỏi mật khẩu của bạn. Không nên dùng mật khẩu quá dễ đoán như: 12345, abcde, adgjmp...<br><br><center><input type="checkbox" value="1" required="required"> Đồng ý 
										</center></td>
									</tr>
								</tbody></table><center><input type="hidden" name="HIDE" value="851300ee84c2b80ed40f51ed26d866fc"><input type="submit" name="submit" value="Đăng ký"><br><br></center></div></form>';
///

echo'</div>';


require('incfiles/end.php');