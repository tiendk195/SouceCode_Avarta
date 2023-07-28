<?php

define('_IN_JOHNCMS',1);

require('../incfiles/core.php');

if(!$user_id){ echo '<div class="menu">Hãy đăng nhập để sử dụng</div>';
require('../incfiles/end.php'); exit; }

$set_mail = unserialize($user['set_mail']);
$out = '';
$total = 0;
$ch = 0;
$mod = isset($_REQUEST['mod']) ? $_REQUEST['mod'] : '';

if(!$id){ echo '<div class="menu">Hãy Chat với một người nào đó. Hiện tại ID đang trống</div>';
require('../incfiles/end.php'); exit; }

if ($id) {
    $req = mysql_query("SELECT * FROM `users` WHERE `id` = '$id' LIMIT 1");
    if (mysql_num_rows($req) == 0) {
  echo '<div class="menu">Thành viên này không tồn tại</div>';
    }
    $qs = mysql_fetch_assoc($req);
   
}

if (empty($_SESSION['error'])) {
    $_SESSION['error'] = '';
}


if (isset($_POST['msg']) && empty($ban['1']) && empty($ban['3']) && !functions::is_ignor($id)) {
 
    $text = addslashes(isset($_POST['msg'])) ? trim($_POST['msg']) : '';
    $newfile = '';
    $sizefile = 0;
    $do_file = FALSE;
    $do_file_mini = FALSE;

    $error = array();

    if (!$id && empty($name))
        $error[] = $lng_mail['indicate_login_grantee'];
    if (empty($text))
        $error[] = $lng_mail['message_not_empty'];
    elseif (mb_strlen($text) < 2 || mb_strlen($text) > 5000)
        $error[] = $lng_mail['error_long_message'];
    if (($id && $id == $user_id) || !$id && $datauser['name_lat'] == $name)
        $error[] = $lng_mail['impossible_add_message'];
    $flood = functions::antiflood();
    if ($flood)
        $error[] = $lng['error_flood'] . ' ' . $flood . $lng['sec'];
    if (empty($error)) {
        if (!$id) {
            $query = mysql_query("SELECT * FROM `users` WHERE `name_lat`='" . mysql_real_escape_string($name) . "' LIMIT 1");
            if (mysql_num_rows($query) == 0) {
                $error[] = $lng['error_user_not_exist'];
            } else {
                $user = mysql_fetch_assoc($query);
                $id = $user['id'];
                $set_mail = unserialize($user['set_mail']);
            }
        } else {
            $set_mail = unserialize($qs['set_mail']);
        }

        if (empty($error)) {
            if ($set_mail) {
                if ($rights < 1) {
                    if ($set_mail['access']) {
                        if ($set_mail['access'] == 1) {
                            $query = mysql_query("SELECT * FROM `cms_contact` WHERE `user_id`='" . $id . "' AND `from_id`='" . $user_id . "' LIMIT 1");
                            if (mysql_num_rows($query) == 0) {
                                $error[] = $lng_mail['write_contacts'];
                            }
                        } else if ($set_mail['access'] == 2) {
                            $query = mysql_query("SELECT * FROM `cms_contact` WHERE `user_id`='" . $id . "' AND `from_id`='" . $user_id . "' AND `friends`='1' LIMIT 1");
                            if (mysql_num_rows($query) == 0) {
                                $error[] = $lng_mail['write_friends'];
                            }
                        }
                    }
                }
            }
        }
    }

  

    $info = array();
    if (empty($error)) {
        $ignor = mysql_result(mysql_query("SELECT COUNT(*) FROM `cms_contact`
		WHERE `user_id`='" . $user_id . "'
		AND `from_id`='" . $id . "'
		AND `ban`='1';"), 0);
        if ($ignor)
            $error[] = $lng_mail['error_user_ignor_in'];
        if (empty($error)) {
            $ignor_m = mysql_result(mysql_query("SELECT COUNT(*) FROM `cms_contact`
			WHERE `user_id`='" . $id . "'
			AND `from_id`='" . $user_id . "'
			AND `ban`='1';"), 0);
            if ($ignor_m)
                $error[] = $lng_mail['error_user_ignor_out'];
        }
    }

    if (empty($error)) {
        $q = mysql_query("SELECT * FROM `cms_contact`
		WHERE `user_id`='" . $user_id . "' AND `from_id`='" . $id . "';");
        if (mysql_num_rows($q) == 0) {
            mysql_query("INSERT INTO `cms_contact` SET
			`user_id` = '" . $user_id . "',
			`from_id` = '" . $id . "',
			`time` = '" . time() . "'");
            $ch = 1;
        }
        $q1 = mysql_query("SELECT * FROM `cms_contact`
		WHERE `user_id`='" . $id . "' AND `from_id`='" . $user_id . "';");
        if (mysql_num_rows($q1) == 0) {
            mysql_query("INSERT INTO `cms_contact` SET
			`user_id` = '" . $id . "',
			`from_id` = '" . $user_id . "',
			`time` = '" . time() . "'");
            $ch = 1;
        }

    }


   
    // Проверяем на повтор сообщения
    if (empty($error)) {
        $rq = mysql_query("SELECT * FROM `cms_mail`
        WHERE `user_id` = $user_id
        AND `from_id` = $id
        ORDER BY `id` DESC
        LIMIT 1
        ") or die(mysql_error());
        $rres = mysql_fetch_assoc($rq);
        if ($rres['text'] == $text) {
            $error[] = $lng['error_message_exists'];
        }
    }


    if (empty($error)) {
$check = preg_replace("/http://|www/is", "***", $check);// 
$check = functions::checkout($text, 1, 0); 
$url = $check;
if(preg_match('|http://|',$url)||preg_match('|.ga|',$url)||preg_match('|.cf|',$url)||preg_match('|.tk|',$url)||preg_match('|.ml|',$url)||preg_match('|.gq|',$url)||
preg_match('|www|',$url) AND !preg_match('|http://i.imgur.com|',$url) AND !preg_match('|http://mteen.me|',$url)
AND !preg_match('|http:/facebook.com|',$url) AND !preg_match('|https:/facebook.com|',$url) AND !preg_match('|http://fb.com|',$url)




) { 
      } else {
        mysql_query("INSERT INTO `cms_mail` SET
		`user_id` = '" . $user_id . "',
		`from_id` = '" . mysql_real_escape_string(intval($id)) . "',
		`text` = '" . mysql_real_escape_string($text) . "',
		`time` = '" . time() . "',
		`file_name` = '" . mysql_real_escape_string($newfile) . "',
		`size` = '10'");
$kti = mysql_query("SELECT * FROM `cms_mail`
        WHERE `user_id` = $user_id
        AND `from_id` = $id
        ORDER BY `id` DESC
        LIMIT 1
        ") or die(mysql_error());
        $ktid = mysql_fetch_assoc($kti);

mysql_query("UPDATE `users` SET `tb_mail`='".$login."' WHERE `id` = '" . mysql_real_escape_string(intval($id)) . "'");
mysql_query("UPDATE `users` SET `id_mail`='".$ktid['id']."' WHERE `id` = '" . mysql_real_escape_string(intval($id)) . "'");        
}
        if ($ch == 0) {
            mysql_query("UPDATE `cms_contact` SET `time` = '" . time() . "' WHERE `user_id` = '" . $user_id . "' AND
			`from_id` = '" . intval($id) . "';");
            mysql_query("UPDATE `cms_contact` SET `time` = '" . time() . "' WHERE `user_id` = '" . intval($id) . "' AND
			`from_id` = '" . $user_id . "';");
        }
      
    } else {
        $out .= '<div class="rmenu">' . implode('<br />', $error) . '</div>';
    }
}

if (!functions::is_ignor($id) && empty($ban['1']) && empty($ban['3'])) {

    $out .= isset($_SESSION['error']) ? $_SESSION['error'] : '';
  
}

if ($id) {
                  $item_onl .= (time() > $qs['lastdate'] + 300 ? '<img style="vertical-align:middle;" title="' . $user['from'] . ' is offline" src="/images/off.png" alt="offline"/> (Hoạt động '.functions::thoigian($qs['lastdate']).')' : ' <img style="vertical-align:middle;" title="' . $user['from'] . ' is online" src="/images/on.png" alt="online"/> (Đang hoạt động)'); 
                  $out .= '<div class="rmenu">Chat với <b>'.$qs['name'].'</b> '.$item_onl.'</div>';
mysql_query("UPDATE `users` SET $sql `total_on_site` = '$totalonsite', `lastdate` = ". time() . " WHERE `id` = '".$user_id."'");
    $total = mysql_result(mysql_query("SELECT COUNT(*) FROM `cms_mail` WHERE ((`user_id`='$id' AND `from_id`='$user_id') OR (`user_id`='$user_id' AND `from_id`='$id')) AND `sys`!='1' AND `delete`!='$user_id' AND `spam`='0'"), 0);

    if ($total) {
        $req = mysql_query("SELECT `cms_mail`.*, `cms_mail`.`id` as `mid`, `cms_mail`.`time` as `mtime`,`users`.*
            FROM `cms_mail`
            LEFT JOIN `users` ON `cms_mail`.`user_id`=`users`.`id`
            WHERE ((`cms_mail`.`user_id`='$id' AND `cms_mail`.`from_id`='$user_id') OR (`cms_mail`.`user_id`='$user_id' AND `cms_mail`.`from_id`='$id'))
            AND `cms_mail`.`delete`!='$user_id'
            AND `cms_mail`.`sys`!='1'
            AND `cms_mail`.`spam`='0'
            ORDER BY `cms_mail`.`time` DESC
            LIMIT " . $start . "," . $kmess);
        $i = 1;
        $mass_read = array();
        while (($row = mysql_fetch_assoc($req)) !== FALSE) {
            if (!$row['read']) {
                $out .= '<div class="menu">';
                $item = '<i class="fa fa-share"></i>';
            } else {
                   $item = '';
                if ($row['from_id'] == $user_id) {
                    $out .= '<div class="menu">';
                } else {
                    $out .= '<div class="menu">';
                }
            }
            if ($row['read'] == 0 && $row['from_id'] == $user_id)
                $mass_read[] = $row['mid'];
            $post = $row['text'];
            $time = $row['mtime'];
            $post = functions::checkout($post, 1, 1);
            if ($set_user['smileys'])
                $post = functions::smileys($post, $row['rights'] >= 1 ? 1 : 0);
         
            //$subtext = '<a href="index.php?act=delete&amp;id=' . $row['mid'] . '">' . $lng['delete'] . '</a>';


     
$pkoolvn = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id = '$row[user_id]'"),0);
$rights = array(
0 => '<b><font color="#013481">',
2 => '<b><font color="bule">',
3 => '<b><font color="blue">',
6 => '<b><font color="gold">',
7 => '<b><font color="green">',
9 => '<b><font color="red">',
10 => '<b><font color="red">',
);
$chuc = array(
2 => '<img src="/img/trialmod.png">',
3 => '<img src="/img/mod.png">',
6 => '<img src="/img/gm.png">',
7 => '<img src="/img/smod.png">',
9 => '<img src="/img/admin.png">',
10 => '<img src="/img/admin.png">',
);
if($row['read'] == 0){
$view = '<br><i><span style="font-size:9px;color:#777;float:right"> '.($row['user_id'] == $user_id ? '√ Đã gửi' : '').' (' . functions::thoigian($time) . ')<br></i></span><br>';
} else if($row['read'] == 1){
$view = '<br><i><span style="font-size:9px;color:#777;float:right"> '.($row['user_id'] == $user_id ? '√ Đã nhận' : '').' (' . functions::thoigian($time) . ')<br></i></span><br>';
} else {
$view = '<br><i><span style="font-size:9px;color:#777;float:right"> '.($row['user_id'] == $user_id ? '√ Đã xem' : '').'  (' . functions::thoigian($time) . ')</i></span><br>';
}

            $out .= ''.($row['user_id'] == $user_id ? '<b>'.nick($pkoolvn['id']).'</b>': '<a href="/member/'.$row['user_id'].'.html" ><b>'.nick($pkoolvn['id']).'</a></b>').': '.$post.' '.$view.'</div>';
               
            ++$i;
        }
if ($total > $kmess) $out .= '<div class="topmenu">' . functions::display_pagination(''.$home.'/mail/mail.php?id=' . $id . '&amp;page=', $start, $total, $kmess) . '</div>';
        //Ставим метку о прочтении
        
            mysql_query("UPDATE `cms_mail` SET `read`='2' WHERE `from_id`='$user_id' AND `user_id` = '" . mysql_real_escape_string(intval($id)) . "'");
mysql_query("UPDATE `users` SET `tb_mail`='0' WHERE `id` = '".$user_id."'");
        
    } else {
        $out .= '<div class="menu"><p>' . $lng['list_empty'] . '</p></div>';
    }

  

echo $out;
}


unset($_SESSION['error']);