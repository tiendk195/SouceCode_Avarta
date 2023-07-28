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
$textl = 'Báo cáo vi phạm';
require('../incfiles/head.php');
/*
-----------------------------------------------------------------
Проверяем права доступа
-----------------------------------------------------------------
*/

    /*
-----------------------------------------------------------------
xu ly vi pam
-----------------------------------------------------------------
*/
if(isset($_POST['submit'])){
			$ten = mysql_query("SELECT * FROM `users` WHERE `id` = '" . $user['id'] . "'");
			$xuly = mysql_fetch_array($ten);
			$guiden = mysql_query("SELECT * FROM `users` WHERE `rights` = '9'");
			$admin = mysql_fetch_array($guiden);
			
    $msg = isset($_POST['msg']) ? functions::check($_POST['msg']) : false;
    if (isset($_POST['msgtrans'])) {
        $msg = functions::trans($msg);
    }
	$msg1 = 'Nguoi bi vi pham <a href="profile.php?user=' . $xuly['id'] . '">' . $xuly['name'] . '</a> ly do ' . $msg . '';
					mysql_query("insert into `privat` values(0,'" . $admin['name'] . "','" . $msg1 . "','" . $realtime . "','" . $login . "','in','no','Bao Cao Vi Phạm','0','','','','');");
			echo '<div class="phdr"><b>Gửi báo cáo vi phạm</b></div>';
			echo '<div class="menu">Cảm ơn bạn đã gửi "Báo cáo vi phạm" của thành viên đến <b>BQT</b> chúng tôi sẽ xử lý thành viên vi phạm "Nội quy" diễn đàn ngay lập tức. Chúc bạn vui vẻ</div>';
		}else{
echo '<div class="phdr"><b>Gửi báo cáo vi phạm</b></div>';


echo '<div class="omenu">' .
                     'Bạn muốn gửi báo cáo vi phạm của thành viên <b>' . $user['name'] . '</b>' .
                     '<br/>Hãy cho chúng tôi một lý do' .
                     '</div>' .
                     '<form name="form" action="profile.php?act=violation&amp;user=' . $user['id'] . '" method="post">' .
                     '<div class="menu">' .
                     '<textarea rows="' . $set_user['field_h'] . '" name="msg"></textarea></p>' .
                     '<p><input type="submit" name="submit" value="Gửi"/></p>' .
                     '</form>';
            
        

		}
echo '</div>';

?>