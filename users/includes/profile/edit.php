<?php


defined('_IN_JOHNCMS') or die('Error: restricted access');

$textl = htmlspecialchars($user['name']) . ': ' . $lng_profile['profile_edit'];
require('../incfiles/head.php');

/*
-----------------------------------------------------------------
Code powerby pkoolvn
-----------------------------------------------------------------
*/
if ($user['id'] != $user_id && ($rights < 9 || $user['rights'] > $rights )) {
    echo functions::display_error($lng_profile['error_rights']);
    require('../incfiles/end.php');
    exit;
}

if ($rights >= 99 && $rights > $user['rights'] && $act == 'reset') {
    mysql_query("UPDATE `users` SET `set_user` = '', `set_forum` = '', `set_chat` = '' WHERE `id` = '" . $user['id'] . "'");
    echo '<div class="gmenu"><p>' . $lng['settings_default'] . '<br /><a href="profile.php?user=' . $user['id'] . '">' . $lng['to_form'] . '</a></p></div>';
    require('../incfiles/end.php');
    exit;
}
echo'<table width="100%" border="0" cellspacing="0"><tr class="menu"><td width="50%">';
echo'<a href="' . $set['homeurl'] . '/users/ketban-' . $user['id'] . '.html">Bạn Bè</a>';
echo'</td><td width="50%">';
echo'<a href="' . $set['homeurl'] . '/avatar/index.php">Cửa Hàng</a>';
echo'</td></tr></table><br/>';
echo'<div class="phdrbox">';
if (isset($_GET['delavatar'])) {
    
    echo '<div class="rmenu">' . $lng_profile['avatar_deleted'] . '</div>';
} elseif (isset($_GET['delphoto'])) {
    

    echo '<div class="rmenu">' . $lng_profile['photo_deleted'] . '</div>';
} elseif (isset($_POST['submit'])) {
    /*
    -----------------------------------------------------------------
    Phần set thông tin by pkoolvn
    -----------------------------------------------------------------
    */
    $error = array ();
    $user['imname'] = isset($_POST['imname']) ? functions::check(mb_substr(htmlspecialchars($_POST['imname']), 0, 25)) : '';
    $user['live'] = isset($_POST['live']) ? functions::check(mb_substr(htmlspecialchars($_POST['live']), 0, 50)) : '';
    $user['dayb'] = isset($_POST['dayb']) ? intval(htmlspecialchars($_POST['dayb'])) : 0;
    $user['monthb'] = isset($_POST['monthb']) ? intval(htmlspecialchars($_POST['monthb'])) : 0;
    $user['yearofbirth'] = isset($_POST['yearofbirth']) ? intval(htmlspecialchars($_POST['yearofbirth'])) : 0;
    $user['about'] = isset($_POST['about']) ? functions::check(mb_substr(htmlspecialchars($_POST['about']), 0, 500)) : '';
    $user['mibile'] = isset($_POST['mibile']) ? functions::check(mb_substr(htmlspecialchars($_POST['mibile']), 0, 40)) : '';
    $user['mail'] = isset($_POST['mail']) ? functions::check(mb_substr(htmlspecialchars($_POST['mail']), 0, 40)) : '';

    $user['mailvis'] = isset($_POST['mailvis']) ? 1 : 0;
    $user['icq'] = isset($_POST['icq']) ? intval(htmlspecialchars($_POST['icq'])) : 0;
    $user['skype'] = isset($_POST['skype']) ? functions::check(mb_substr(htmlspecialchars($_POST['skype']), 0, 40)) : '';
    $user['jabber'] = isset($_POST['jabber']) ? functions::check(mb_substr(htmlspecialchars($_POST['jabber']), 0, 40)) : '';
    $user['www'] = isset($_POST['www']) ? functions::check(mb_substr(htmlspecialchars($_POST['www']), 0, 40)) : '';
    $user['karma_off'] = isset($_POST['karma_off']);
    $user['sex'] = isset($_POST['sex']) && $_POST['sex'] == 'm' ? 'm' : 'zh';
    $user['rights'] = isset($_POST['rights']) ? abs(intval(htmlspecialchars($_POST['rights']))) : $user['rights'];

  if($user['rights'] > $rights || $user['rights'] < 0)
        $user['rights'] = 0;
    if ($user['dayb'] || $user['monthb'] || $user['yearofbirth']) {
        if ($user['dayb'] < 1 || $user['dayb'] > 31 || $user['monthb'] < 1 || $user['monthb'] > 12)
            $error[] = $lng_profile['error_birth'];
    }
    if ($user['icq'] && ($user['icq'] < 10000 || $user['icq'] > 999999999))
        $error[] = $lng_profile['error_icq'];
    if (!$error) {
        mysql_query("UPDATE `users` SET
            `imname` = '" . $user['imname'] . "',
            `live` = '" . $user['live'] . "',
            `dayb` = '" . $user['dayb'] . "',
            `monthb` = '" . $user['monthb'] . "',
            `yearofbirth` = '" . $user['yearofbirth'] . "',
            `about` = '" . $user['about'] . "',
            `mibile` = '" . $user['mibile'] . "',
            `mail` = '" . $user['mail'] . "',
            `mailvis` = '" . $user['mailvis'] . "',
            `icq` = '" . $user['icq'] . "',
            `skype` = '" . $user['skype'] . "',
            `jabber` = '" . $user['jabber'] . "',
            `www` = '" . $user['www'] . "'
            WHERE `id` = '" . $user['id'] . "'
        ");







if ($datauser['rights'] >=9 ) {
	if ($_POST['timevip']==7 or $_POST['timevip']==30 or $_POST['timevip']==0 ) {
		
	$timesd= $_POST['timevip']*24*3600+time();
	} else {
				$timesd= $_POST['timevip'];
	}
		
			if ( $_POST['timedanhhieu']==7 or $_POST['timedanhhieu']==30 or $_POST['timedanhhieu']==0 ) {
	$timedh= $_POST['timedanhhieu']*24*3600+time();
			} else {
	$timedh= $_POST['timedanhhieu'];
			}
				
			if ( $_POST['timedanhhieunap']==7 or $_POST['timedanhhieunap']==30 or $_POST['timedanhhieunap']==0 ) {
	$timedhn= $_POST['timedanhhieunap']*24*3600+time();
			} else {
	$timedhn= $_POST['timedanhhieunap'];
			}
mysql_query("UPDATE `users` SET
               `kichhoat` = '" . $_POST['kichhoat']. "',
               `danhhieu` = '" . $_POST['danhhieu']. "',
			                  `danhhieunap` = '" . $_POST['danhhieunap']. "',

			   `chuky` = '" . $_POST['chuky']. "',
			  `sex` = '" . $user['sex'] . "' ,
                `kichhoatvip`='".$_POST['kichhoatvip']."',
                `timevip`='".$timesd."',
				    `timedanhhieu`='".$timedh."',
									    `timedanhhieunap`='".$timedhn."',

                `karma_off` = '" . $user['karma_off'] . "',
                `sex` = '" . $user['sex'] . "',
                `rights` = '" . $user['rights'] . "'
                WHERE `id` = '" . $user['id'] . "'
            ");
        }

        echo '<div class="gmenu">' . $lng_profile['data_saved'] . '</div>';
    } else {
        echo functions::display_error($error);
    }
    header('Location: /member/edit-' . $user['id'].'.html');
    exit;
}


echo '<form action="/member/edit-' . $user['id'] . '.html" method="post">';
echo '<center>';
$link = '';
if ($set_user['avatar']) {
                        if (file_exists(('../files/users/avatar/' . $user['id'] . '.gif')))
                            echo '<img id="avatar-tron" src="../avatar/' . $user['id'] . '.png"  alt="' . $user['from'] . '"/>';
                        else
                            echo '<img id="avatar-tron" src="../avatar/' . $user['id'] . '.png"  alt="' . $user['from'] . '"/>';
                      
                    }
echo '</center>' .
    '<table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info">
        <tr>
            <td class="left-info">ID Tài Khoản:</td>
            <td class="right-info"><span>' . $user['id'] . '</span></td>
        </tr>

		<tr>
            
	
            <td class="left-info">Tên Thật:</td>
            <td class="right-info"><span><input type="text" value="' . $user['imname'] . '" name="imname" /></span></td>
        </tr>';
		if ($datauser['rights']>=9){
		
		echo'

	
<tr>
            <td class="left-info">Giới tính:</td>
            <td class="right-info"><span><select name="sex"' . $lng_profile['specify_sex'] . '>
      <option value="'.$user['sex'].'"/>Mặc định </option>
      <option value="m"' . ($user['sex'] == 'm' ? 'checked="checked"' : '') . '/>' . $lng_profile['sex_m'] . '</option>
      <option value="zh"' . ($user['sex'] == 'zh' ? 'checked="checked"' : '') . '/>' . $lng_profile['sex_w'] . '</option>
        </select></span></td>
        </tr>';
}
		
		echo'
		<tr>
            <td class="left-info">Năm Sinh:</td>
            <td class="right-info"><span><input type="text" value="'.$user['dayb'].'" size="2" maxlength="2" name="dayb" /> <input type="text" value="'.$user['monthb'].'" size="2" maxlength="2" name="monthb" /> <input type="text" value="'.$user['yearofbirth'].'" size="4" maxlength="4" name="yearofbirth" /></span></td>
        </tr>
		<tr>
            <td class="left-info">Sở Thích:</td>
            <td class="right-info"><span><input type="text" value="' . $user['about'] . '" name="about" /></span></td>
        </tr>
<tr>
            <td class="left-info">Nơi Sống:</td>
            <td class="right-info"><span><input type="text" value="' . $user['live'] . '" name="live" /></span></td>
        </tr>		
		<tr>
     </td></tr></table>';





// Phần ban quản trị 
if ($datauser['rights'] >= 9) {

echo '</center>' .

    '<table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info">
<tr>               
             <td class="left-info">Kích Hoạt: </td>
             <td class="right-info"><span><input type="text" value="' . $user['kichhoat'] . '" name="kichhoat" /></span> Nhập <font color="red">0</font>: Để Đóng Kích Hoạt | Nhập <font color="red">1</font>: Để Mở Kích Hoạt</td>
        </tr>';
		echo'<tr>
            <td class="left-info">Danh hiệu nạp:</td>
            <td class="right-info"><span><select name="danhhieunap">
      <option value="'.$user['danhhieunap'].'"/>Mặc định ('.($user['danhhieunap']).')</option>
      <option value=""><b style="color:red"> Không có</b></option>
	        <option value="1ST"><b style="color:red"> [1ST]</b></option>
	        <option value="2ND"><b style="color:red"> [2ND]</b></option>
	        <option value="3RD"><b style="color:red"> [3RD]</b></option>

        </select></span></td>
        </tr>';
				echo'<tr>
            <td class="left-info">Time danh hiệu nạp:</td>
            <td class="right-info"><span><select name="timedanhhieunap">
      <option value="'.$user['timedanhhieunap'].'"/>Mặc định ('.($user['timedanhhieunap'] ? thoigiantinh(floor($user['timedanhhieunap'])).'' : '0 ngày').')</option>
      <option value="0">Không có</option>
      <option value="7">7 Ngày</option>
	        <option value="30">30 Ngày</option>

        </select></span></td>
        </tr>';
		
				echo'<tr>
            <td class="left-info">Danh hiệu:</td>
            <td class="right-info"><span><select name="danhhieu">
      <option value="'.$user['danhhieu'].'"/>Mặc định ('.($user['danhhieu']).')</option>
      <option value=""><b style="color:red"> Không có</b></option>

      <option value="Vua đầu bếp"><b style="color:red"> [Vua đầu bếp]</b></option>

      <option value="VIP"><b style="color:red"> [VIP]</b></option>
      <option value="FARM VIP"><b style="color:#ff3399"> [FARM VIP]</b></option>
      <option value="Thả thính"><b style="color:#ff3399"> [Thả thính]</b></option>

      <option value="FISH VIP"><b style="color:#ff3399"> [Top Câu Cá]</b></option>
	        <option value="BOSS VIP"><b style="color:#FF6633"> [BOSS VIP]</b></option>
				        
<option value="Chém gió"><b style="color:#0088FF"> [Chém gió]</b></option>
<option value="PRO"><b style="color:blue"> [PRO]</b></option>
<option value="TOP"><b style="color:green"> [TOP]</b></option>
<option value="SVIP"><b style="color:#FF3399"> [SVIP]</b></option>


        </select></span></td>
        </tr>';
		/*
		echo'
<tr>               
             <td class="left-info">Danh Hiệu: </td>
             <td class="right-info"><span><input type="text" value="' . $user['danhhieu'] . '" name="danhhieu" /></span></td>
        </tr>';
		*/
		echo'<tr>
            <td class="left-info">Time danh hiệu:</td>
            <td class="right-info"><span><select name="timedanhhieu">
      <option value="'.$user['timedanhhieu'].'"/>Mặc định ('.($user['timedanhhieu'] ? thoigiantinh(floor($user['timedanhhieu'])).'' : '0 ngày').')</option>
      <option value="0">Không có</option>
      <option value="7">7 Ngày</option>
	        <option value="30">30 Ngày</option>

        </select></span></td>
        </tr>';
		/*
		echo '
<tr>
<td class="left-info">Time Danh Hiệu:</td>
<td class="right-info"><span>
<input type="radio" value=" ' . ($user['timedanhhieu']).'"  > Mặc định ('.($user['timedanhhieu'] ? thoigiantinh(floor($user['timedanhhieu'])).'' : '0 ngày').')</br>
<input type="radio" value="0" name="timedanhhieu" ' . ($user['timedanhhieu'] == '0' ? 'checked="checked"' : '') . '/>Không có</br>
<input type="radio" value="7" name="timedanhhieu">7 Ngày</br>
<input type="radio" value="30" name="timedanhhieu">30 Ngày</br>

</span></td>
</tr>
</td></tr>';
/*
		echo'
		<tr>
        <td class="left-info">Time Danh Hiệu: </td>
             <td class="right-info"><span><input type="text" value="' . $user['timedanhhieu'] . '" name="timedanhhieu" />'.($user['timevip'] ? thoigiantinh(floor($user['timevip'])).'' : '0 ngày').'</span></span></td>
        </tr>
		';
		*/
		
		echo'
<tr>
        <td class="left-info">Kích hoạt VIP (0-1) : </td>
             <td class="right-info"><span><input type="text" value="' . $user['kichhoatvip'] . '" name="kichhoatvip" /></span></span></td>
        </tr>';
	
		echo'<tr>
            <td class="left-info">Time thuê vip:</td>
            <td class="right-info"><span><select name="timevip">
      <option value="'.$user['timevip'].'"/>Mặc định ('.($user['timevip'] ? thoigiantinh(floor($user['timevip'])).'' : '0 ngày').')</option>
      <option value="0">Không có</option>
      <option value="7">7 Ngày</option>
	        <option value="30">30 Ngày</option>

        </select></span></td>
        </tr>';
		echo'
</table>';

echo '</center>' .
'<table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info">
<tr>
<td class="left-info">Chức Vụ:</td>
<td class="right-info"><span><select name="rights"><option value="'.$user['rights'].'"/>Mặc định</option>
<option value="0"' . ($user['rights'] == '0' ? 'checked="checked"' : '') . '/>Thành Viên</option>
<option value="2"' . ($user['rights'] == '2' ? 'checked="checked"' : '') . '/>Police MXH</option>
<option value="3"' . ($user['rights'] == '3' ? 'checked="checked"' : '') . '/>Mod</option>
<option value="4"' . ($user['rights'] == '4' ? 'checked="checked"' : '') . '/>Box Radio</option>
<option value="5"' . ($user['rights'] == '5' ? 'checked="checked"' : '') . '/>Box Art</option>
<option value="6"' . ($user['rights'] == '6' ? 'checked="checked"' : '') . '/>Game Master</option>
<option value="7"' . ($user['rights'] == '7' ? 'checked="checked"' : '') . '/>Smod</option>
<option value="8"' . ($user['rights'] == '8' ? 'checked="checked"' : '') . '/>Admin</option>
<option value="9"' . ($user['rights'] == '9' ? 'checked="checked"' : '') . '/>Sáng lập viên</option>';
if ($datauser['rights']>=10) {
echo'
<option value="10"'. ($user['rights'] == '10' ? 'checked="checked"' : '') . '/>Người quản lí</option>';
}
echo'
</select></span></td>
</tr>
</td></tr></table>';

              }



             echo '<center><input type="submit" value="Cập Nhập" name="submit" /></center>' .
        '</form>';

?>