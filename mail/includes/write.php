<?php

/**
 * @package     JohnCMS
 * @link        http://johncms.com
 * @copyright   Copyright (C) 2008-2011 JohnCMS Community
 * @license     LICENSE.txt (see attached file)
 * @version     VERSION.txt (see attached file)
 * @author      http://johncms.com/about
 */

defined('_IN_JOHNCMS') or die('Error: restricted access');
$set_mail = unserialize($user['set_mail']);
$out = '';
$total = 0;
$ch = 0;
$mod = isset($_REQUEST['mod']) ? $_REQUEST['mod'] : '';
if ($id) {
    $req = mysql_query("SELECT * FROM `users` WHERE `id` = '$id' LIMIT 1");
    if (mysql_num_rows($req) == 0) {
        $textl = $lng['mail'];
        require_once('../incfiles/head.php');
        echo functions::display_error($lng['error_user_not_exist']);
        require_once("../incfiles/end.php");
        exit;
    }
    $qs = mysql_fetch_assoc($req);
    if ($mod == 'clear') {
        $textl = $lng['mail'];
        require_once('../incfiles/head.php');

        if (isset($_POST['clear'])) {
            $count_message = mysql_result(mysql_query("SELECT COUNT(*) FROM `cms_mail` WHERE ((`user_id`='$id' AND `from_id`='$user_id') OR (`user_id`='$user_id' AND `from_id`='$id')) AND `delete`!='$user_id'"), 0);
            if ($count_message) {
                $req = mysql_query("SELECT `cms_mail`.* FROM `cms_mail` WHERE ((`cms_mail`.`user_id`='$id' AND `cms_mail`.`from_id`='$user_id') OR (`cms_mail`.`user_id`='$user_id' AND `cms_mail`.`from_id`='$id')) AND `cms_mail`.`delete`!='$user_id' LIMIT " . $count_message);
                while (($row = mysql_fetch_assoc($req)) !== FALSE) {
                    if ($row['delete']) {
                        if ($row['file_name']) {
                            if (file_exists('../files/mail/' . $row['file_name']) !== FALSE)
                                @unlink('../files/mail/' . $row['file_name']);
                        }
                        mysql_query("DELETE FROM `cms_mail` WHERE `id`='{$row['id']}' LIMIT 1");
                    } else {
                        if ($row['read'] == 0 && $row['user_id'] == $user_id) {
                            if ($row['file_name']) {
                                if (file_exists('../files/mail/' . $row['file_name']) !== FALSE)
                                    @unlink('../files/mail/' . $row['file_name']);
                            }
                            mysql_query("DELETE FROM `cms_mail` WHERE `id`='{$row['id']}' LIMIT 1");
                        } else {
                            mysql_query("UPDATE `cms_mail` SET `delete` = '" . $user_id . "' WHERE `id` = '" . $row['id'] . "' LIMIT 1");
                        }
                    }
                }
            }
            echo '<div class="gmenu"><p>' . $lng_mail['messages_are_removed'] . '</p></div>';
        } else {
            echo '<div class="rmenu">
			<form action="/main/' . $id . '" method="post">
			<p>' . $lng_mail['really_messages_removed'] . '</p>
			<p><input type="submit" name="clear" value="' . $lng['delete'] . '"/></p>
			</form>
			</div>';
        }
       
        require_once('../incfiles/end.php');
        exit;
    }
}

if (empty($_SESSION['error'])) {
    $_SESSION['error'] = '';
}



if (isset($_POST['submit']) && empty($ban['1']) && empty($ban['3'])  && !functions::is_ignor($id)) {
    if (!$id) {
        $name = isset($_POST['nick']) ? functions::rus_lat(mb_strtolower(trim($_POST['nick']))) : '';
    }
    $text = isset($_POST['text']) ? trim($_POST['text']) : '';
    if ($set_user['translit'] && isset($_POST['msgtrans']))
        $text = functions::trans($text);
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

    function parseFileName($var = '')
    {
        if (empty($var))
            return FALSE;
        $file_ext = pathinfo($var, PATHINFO_EXTENSION);
        $file_body = mb_substr($var, 0, mb_strripos($var, '.'));
        $info['filename'] = mb_strtolower(mb_substr(str_replace('.', '_', $file_body), 0, 38));
        $info['fileext'] = mb_strtolower($file_ext);

        return $info;
    }

    $info = array();
    if (isset($_FILES['fail']['size']) && $_FILES['fail']['size'] > 0) {
        $do_file = TRUE;
        $fname = $_FILES['fail']['name'];
        $fsize = $_FILES['fail']['size'];
        if (!empty($_FILES['fail']['error']))
            $error[] = $lng['error_load_file'];

    } else if (isset($_POST['fail']) && mb_strlen($_POST['fail']) > 0) {
        $do_file_mini = TRUE;
        $array = explode('file=', $_POST['fail']);
        $fname = mb_strtolower($array[0]);
        $filebase64 = $array[1];
        $fsize = strlen(base64_decode($filebase64));
        if (empty($fsize))
            $error[] = $lng['error_load_file'];
    }

    if (empty($error) && ($do_file || $do_file_mini)) {
        // Файлы Windows
        $ext_win = array(
            'exe',
            'msi'
        );
        // Файлы Java
        $ext_java = array(
            'jar',
            'jad'
        );
        // Файлы SIS
        $ext_sis = array(
            'sis',
            'sisx'
        );
        // Файлы документов и тексты
        $ext_doc = array(
            'txt',
            'pdf',
            'doc',
            'rtf',
            'djvu',
            'xls'
        );
        // Файлы картинок
        $ext_pic = array(
            'jpg',
            'jpeg',
            'gif',
            'png',
            'bmp',
            'wmf'
        );
        // Файлы архивов
        $ext_zip = array(
            'zip',
            'rar',
            '7z',
            'tar',
            'gz'
        );
        // Файлы видео
        $ext_video = array(
            '3gp',
            'avi',
            'flv',
            'mpeg',
            'mp4'
        );
        // Звуковые файлы
        $ext_audio = array(
            'mp3',
            'amr'
        );
        $ext = array_merge($ext_win, $ext_java, $ext_sis, $ext_doc, $ext_pic, $ext_zip, $ext_video, $ext_audio);
        $info = parseFileName($fname);
        if (empty($info['filename']))
            $error[] = $lng_mail['error_empty_name_file'];
        if (empty($info['fileext']))
            $error[] = $lng_mail['error_empty_ext_file'];
        if ($fsize > (1024 * $set['flsz']))
            $error[] = $lng_mail['error_max_file_size'];
        if (preg_match("/[^a-z0-9.()+_-]/", $info['filename']))
            $error[] = $lng_mail['error_simbol'];
        if (!in_array($info['fileext'], $ext))
            $error[] = $lng_mail['error_ext_type'] . ': ' . implode(', ', $ext);
        $newfile = $info['filename'] . '.' . $info['fileext'];
        $sizefile = $fsize;
    }

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

    // Проверка наличия файла с таким же именем
    if (!empty($newfile) && file_exists('../files/mail/' . $newfile) !== FALSE) {
        $newfile = time() . '_' . $newfile;
    }

    if (empty($error) && $do_file) {
        if ((move_uploaded_file($_FILES['fail']['tmp_name'], '../files/mail/' . $newfile)) === TRUE) {
            @ chmod('../files/mail/' . $newfile, 0666);
            @unlink($_FILES['fail']['tmp_name']);
        } else {
            $error[] = $lng['error_load_file'];
        }
    }

    if (empty($error) && $do_file_mini) {
        if (strlen($filebase64) > 0) {
            $FileName = '../files/mail/' . $newfile;
            $filedata = base64_decode($filebase64);
            $fid = @fopen($FileName, "wb");
            if ($fid) {
                if (flock($fid, LOCK_EX)) {
                    fwrite($fid, $filedata);
                    flock($fid, LOCK_UN);
                }
                fclose($fid);
            }
            if (file_exists($FileName) && filesize($FileName) == strlen($filedata)) {
                @ chmod($FileName, 0666);
                unset($FileName);
            } else {
                $error[] = $lng['error_load_file'];
            }
        } else {
            $error[] = $lng['error_load_file'];
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
        mysql_query("INSERT INTO `cms_mail` SET
		`user_id` = '" . $user_id . "',
		`from_id` = '" . $id . "',
		`text` = '" . mysql_real_escape_string($text) . "',
		`time` = '" . time() . "',
		`file_name` = '" . mysql_real_escape_string($newfile) . "',
		`size` = '" . $sizefile . "'") or die(mysql_error());

        mysql_query("UPDATE `users` SET `lastpost` = '" . time() . "' WHERE `id` = '$user_id';");
        if ($ch == 0) {
            mysql_query("UPDATE `cms_contact` SET `time` = '" . time() . "' WHERE `user_id` = '" . $user_id . "' AND
			`from_id` = '" . $id . "';");
            mysql_query("UPDATE `cms_contact` SET `time` = '" . time() . "' WHERE `user_id` = '" . $id . "' AND
			`from_id` = '" . $user_id . "';");
        }
        Header('Location: /mail/' . ($id ? '' . $id : ''));
        exit;
    } else {
        $out .= '<div class="menu">' . implode('<br />', $error) . '</div>';
    }
}
if (!functions::is_ignor($id) && empty($ban['1']) && empty($ban['3'])) {
    $out .= isset($_SESSION['error']) ? $_SESSION['error'] : '';
    $out .= '<div class="homeforum"><div class="icon-home"><div class="home">Tin nhắn</div></div></div>';
    $out .= '<div class="phdr">Gửi tin nhắn</div>';
    $out .= '<div class="omenu">' .
        '<form name="form" action="/mail/' . ($id ? '' . $id : '') . '" method="post"  enctype="multipart/form-data">' .
        ($id ? '' : '<p><input type="text" name="nick" maxlength="15" value="' . (!empty($_POST['nick']) ? functions::check($_POST['nick']) : '') . '" placeholder="' . $lng_mail['to_whom'] . '?"/></p>') .
        '<p>';

    $out .= '<textarea rows="' . $set_user['field_h'] . '" name="text"></textarea></p>';
    if ($set_user['translit'])
$out .= '<input type="checkbox" name="msgtrans" value="1" ' . (isset($_POST['msgtrans']) ? 'checked="checked" ' : '') . '/> ' . $lng['translit'] . '';
 if($datauser['kichhoat'] >= 0){
$out .= '<div class="news">Bạn chưa kích hoạt tài khoản nên không thể gửi tin nhắn</div>';
}
if($datauser['kichhoat'] == 10){
$out .= '<input type="submit" name="submit" value="Gửi" class="nut"><a href="/upanh"/><b> (Gửi Ảnh)</b></a>';
            '</form></div></div>';
}

}

if ($id) {
    $total = mysql_result(mysql_query("SELECT COUNT(*) FROM `cms_mail` WHERE ((`user_id`='$id' AND `from_id`='$user_id') OR (`user_id`='$user_id' AND `from_id`='$id')) AND `sys`!='1' AND `delete`!='$user_id' AND `spam`='0'"), 0);
    if ($total) {
         $req = mysql_query("SELECT `cms_mail`.*, `cms_mail`.`id` as `mid`, `cms_mail`.`time` as `mtime`, `users`.*
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
                    $out .= '<div class="forumtext">';            } else {
                if ($row['from_id'] == $user_id) {
                    $out .= '<div class="forumtext">';
                } else {
                    $out .= '<div class="forumtext">';
                }
                }
            if ($row['read'] == 0 && $row['from_id'] == $user_id)
                $mass_read[] = $row['mid'];
            $post = $row['text'];
            $post = functions::checkout($post, 1, 1);
            if ($set_user['smileys'])
                $post = functions::smileys($post, $row['rights'] >= 1 ? 1 : 0);
            if ($row['file_name'])
                $post .= '<div class="func">' . $lng_mail['file'] . ': <a href="index.php?act=load&amp;id=' . $row['mid'] . '">' . $row['file_name'] . '</a> (' . formatsize($row['size']) . ')(' . $row['count'] . ')';
            $subtext = '<a href="index.php?act=delete&amp;id=' . $row['mid'] . '"><small><font color="003366">xóa</font></small></a>';
            $arg = array(
                'body'    => $post,
                'sub'     => $subtext,
                'stshide' => 1
            );
            core::$user_set['avatar'] = 0;
            $out .= functions::display_user($row, $arg);
            $out .= '</div>';
            ++$i;
        }
        //Ставим метку о прочтении
        if ($mass_read) {
            $result = implode(',', $mass_read);
            mysql_query("UPDATE `cms_mail` SET `read`='1' WHERE `from_id`='$user_id' AND `id` IN (" . $result . ")");
        }
    } else {
        $out .= '<div class="menu">Không có tin nhắn</div>';
    }
        $out .= '</div>';
    if ($total > $kmess) {
        $out .= '<div class="phantrang">' . functions::display_pagination('/mail/' . $id . '-', $start, $total, $kmess) . '</div>';
    }
}

$textl = $lng['mail'];
require_once('../incfiles/head.php');
echo $out;
if ($total) {
}
unset($_SESSION['error']);