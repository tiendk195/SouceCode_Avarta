<?php

/*
////////////////////////////////////////////////////////////////////////////////
// JohnCMS                Mobile Content Management System                    //
// Project site:          http://johncms.com                                  //
// Support site:          http://gazenwagen.com                               //
////////////////////////////////////////////////////////////////////////////////
// Lead Developer:        Oleg Kasyanov   (AlkatraZ)  alkatraz@gazenwagen.com //
// Development Team:      Eugene Ryabinin (john77)    john77@gazenwagen.com   //
//                        Dmitry Liseenko (FlySelf)   flyself@johncms.com     //
////////////////////////////////////////////////////////////////////////////////
*/

defined('_IN_JOHNCMS') or die('Error: restricted access');
/*
-----------------------------------------------------------------
Проверяем права доступа
-----------------------------------------------------------------
*/
if ($user['id'] != $user_id && ($rights < 9 || $user['rights'] > $rights)) {
    echo functions::display_error($lng['access_forbidden']);
    require('../incfiles/end.php');
    exit;
}
$lng_pass = core::load_lng('pass');
$textl = htmlspecialchars($user['name']) . ': ' . $lng_pass['change_password'];
require('../incfiles/head.php');

switch ($mod) {
    case 'change':
        /*
        -----------------------------------------------------------------
        Меняем пароль
        -----------------------------------------------------------------
        */
        $error = array ();
        $oldpass = isset($_POST['oldpass']) ? htmlspecialchars($_POST['oldpass']) : '';
        $newpass = isset($_POST['newpass']) ? htmlspecialchars($_POST['newpass']) : '';
        $newconf = isset($_POST['newconf']) ? htmlspecialchars($_POST['newconf']) : '';
        $autologin = isset($_POST['autologin']) ? 1 : 0;
        if ($user['id'] != $user_id) {
            if (!$newpass || !$newconf)
                $error[] = $lng_pass['error_fields'];
        } else {
            if (!$oldpass || !$newpass || !$newconf)
                $error[] = $lng_pass['error_fields'];
        }
        if (!$error && $user['id'] == $user_id && md5(md5($oldpass)) !== $user['password_2'])
            $error[] = $lng_pass['error_old_password'];
        if ($newpass != $newconf)
            $error[] = $lng_pass['error_new_password'];
        if (preg_match("/[^\da-zA-Z_]+/", $newpass) && !$error)
            $error[] = $lng['error_wrong_symbols'];
        if (!$error && (strlen($newpass) < 3 || strlen($newpass) > 15))
            $error[] = $lng_pass['error_lenght'];
        if (!$error) {
            // Записываем в базу
            mysql_query("UPDATE `users` SET `password_2` = '" . mysql_real_escape_string(md5(md5($newpass))) . "' WHERE `id` = '" . $user['id'] . "'");
            echo'<div class="rmenu">Đổi thành công!</div>';
        } else {
            echo functions::display_error($error, '<a href="profile.php?act=matkhau2&amp;user=' . $user['id'] . '">' . $lng['repeat'] . '</a>');
        }
echo'<div class="ggg">';
        break;

    default:
        /*
        -----------------------------------------------------------------
        Форма смены пароля
        -----------------------------------------------------------------
        */
        echo '<div class="phdr"><b>Đổi mật khẩu cấp 2</b></div>';
        echo '<form action="profile.php?act=matkhau2&amp;mod=change&amp;user=' . $user['id'] . '" method="post">';
        if ($user['id'] == $user_id)
            echo '<div class="menu"><p>' . $lng_pass['input_old_password'] . ':<br /><input type="password" name="oldpass" /></p></div>';
        echo '<div class="gmenu"><p>' . $lng_pass['input_new_password'] . ':<br />' .
            '<input type="password" name="newpass" /><br />' . $lng_pass['repeat_password'] . ':<br />' .
            '<input type="password" name="newconf" /><p><input type="submit" value="' . $lng['save'] . '" name="submit" />' .
            '</p></form>' .
            '<div class="menu"><font color="red">Mật khẩu dài tối đa 3 - 15 ký tự được phép dùng chữ cái và số.</font></div>';
}
?>