<?php
    $on_cam = strtolower($msg);
    if (preg_match('|#ban|',$on_cam)) {
        if($datauser['rights'] >= 3 || $datauser['id'] == 4963 || $datauser['id'] == 4100){
            $lay = str_replace('#ban_','', $on_cam);
            //$lenh = json_decode($lay);
            $lenh = explode('_', $lay);
            /* #ban_id_time_note */
            $id = $lenh[0];
            $time = $lenh[1];
            $lydo = $lenh[2];
            if(preg_match('|p|',$time)) {
                $thoigian = ($time * 60);
                $err = 0;
                $hien = $time;
            }elseif (preg_match('|h|',$time)) {
                $thoigian = ($time * 60 * 60);
                $err = 0;
                $hien = $time;
            }elseif (preg_match('|d|',$time)) {
                $thoigian = ($time * 60 * 60 * 24);
                $err = 0;
                $hien = $time;
            }elseif (preg_match('|vv2|',$time)) {
                $thoigian = ($time * 60 * 60 * 24 * 365 * 10);
                $err = 0;
                $hien = 'vĩnh viễn';
            }else{
                $err = 1;
            }
            $dem = mysql_result(mysql_query("select count(*) from `users` where `id` = '".$id."'"),0);
            $mem = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id`='".$id."' LIMIT 1"));
            if ($dem == 0){
               $avatar = 'Bạn chưa yêu cầu ban thành viên nào !'; 
} elseif ($id == 1||$id == 3 || $id == 4100){
               $avatar = 'Thím bị gay à :haha:';
} elseif ($datauser['rights'] < $mem['rights']){
               $avatar = 'Bạn chưa đủ tuổi để band người này'; 
} else if($id == $user_id){
$avatar = 'Error 1'; 
            } elseif ($err == 1) {
                $avatar = 'Bạn yêu cầu ban thời gian sai !'; 
            } elseif (!$lydo) {
                $avatar = 'Bạn chưa nhập lý do ban !'.$lay; 
            } else {
                $avatar = 'Thông báo : @'.$mem['id'].' bị ban  :bye: , thời gian '.$hien.' với lý do : '.$lydo;
				mysql_query("UPDATE `users` SET `timeban`='" . (time() + $thoigian) ."' WHERE `id` = '" .$id."'");
                mysql_query("INSERT INTO `cms_ban_users` SET
                    `user_id` = '" . $id . "',
                    `ban_time` = '" . (time() + $thoigian) . "',
                    `ban_while` = '" . time() . "',
                    `ban_type` = '1',
                    `ban_who` = '".$login."',
                    `ban_reason` = '" . mysql_real_escape_string($lydo) . "'
                ");

            }
        }else{
            $avatar = '@'.$user_id.' thým bị gay à :haha:';
        }
        $time = time();
        mysql_query("INSERT INTO `guest` SET
            `adm` = '0',
            `time` = '$time',
            `user_id` = '256',
            `name` = 'BOT',
            `text` = '" . mysql_real_escape_string($avatar) . "',
            `ip` = '0000',
            `browser` = 'IPHONE'
        ");
    }
?>