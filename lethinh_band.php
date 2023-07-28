<?php
function delbbcode($qdn){    
    $sub = explode("[color=", $qdn);
    $sub = explode("]", $sub[1]);
    $qdn = $sub[0];
    return $qdn;
}
function showlink($qdn){
    $qdn = 'chat '.strtolower($qdn).' ';
    $del = '[color='.delbbcode($qdn).']';
    $qdn = str_replace($del,"",$qdn);
    $qdn = str_replace("[/color]","",$qdn);
    if (preg_match('|http|',$qdn)){
        $sub = explode('http', $qdn);
        $qdn = $sub[1];
        $sub = explode(' ', $qdn);
        $qdn = $sub[0];
        if(empty($qdn)){
            $qdn = 0;
        }else{
            $qdn = 1;
        }
    }else{
        $active_cam = ".me|.cf|.ga|.gq|.pw|.top|.pro|.org|.info|.vn|.tv";
        if($active_cam){
            $x = 0;
            $sub_tukhoa = explode('|', $active_cam);
            if($sub_tukhoa[0]){
                if(preg_match("|$sub_tukhoa[0]|",$qdn)){
                    $sub = explode("$sub_tukhoa[0]", $qdn);
                    $qdn = $sub[0];
                    $qdn = substr($qdn,-1).$sub_tukhoa[0];
                    $sub = explode('.', $qdn);
                    $qdn = $sub[0].$sub_tukhoa[0];
                    $sub = explode(' ', $qdn);
                    $qdn = $sub[1];
                    if(empty($qdn)){
                        $qdn = 1;
                    }else{
                        $qdn = 0;
                    }
                }
                do {
                    $x++;
                    if($sub_tukhoa[$x]){
                        if(preg_match("|$sub_tukhoa[$x]|",$qdn)){
                            $sub = explode("$sub_tukhoa[$x]", $qdn);
                            $qdn = $sub[0];
                            $qdn = substr($qdn,-1).$sub_tukhoa[$x];
                            $sub = explode('.', $qdn);
                            $qdn = $sub[0].$sub_tukhoa[$x];
                            $sub = explode(' ', $qdn);
                            $qdn = $sub[1];
                            if(empty($qdn)){
                                $qdn = 1;
                            }else{
                                $qdn = 0;
                            }
                        }
                    }
                } while ($x <= 100);
            }
        }
    }
    return $qdn;
}
$text_cam = showlink($msg);
$on_cam = strtolower($msg);

if ($text_cam == 1) {
	if (!preg_match('|thitran9x.tk|google.com|google.com.vn|facebook.com|imgur.com|',$on_cam)) {
		$showlink = ($datauser['showlink'] + 1);
		if($showlink + 3){
			$avatar = '[b]Thông báo[/b] : @'.$login.' bị khóa vì cố tính show link không phải từ Thitran9x lên phòng chát ';
			$timeval = 600;
			$reason = 'Show link trên phòng chát. !';
                if($users_id != 3){
					// Заносим в базу
                    mysql_query("INSERT INTO `cms_ban_users` SET
                        `user_id` = '" . $user_id . "',
                        `ban_time` = '" . (time() + $timeval) . "',
                        `ban_while` = '" . time() . "',
                        `ban_type` = '1',
                        `ban_who` = 'BOT',
                        `ban_reason` = '" . mysql_real_escape_string($reason) . "'
                    ");
                    if ($set_karma['on']) {
                        $points = $set_karma['karma_points'] * 2;
                        mysql_query("INSERT INTO `karma_users` SET
                            `user_id` = '0',
                            `name` = 'Hệ thống',
                            `karma_user` = '" . $user_id . "',
                            `points` = '$points',
                            `type` = '0',
                            `time` = '" . time() . "',
                            `text` = 'Ban (Blocked)'
                        ");
                        mysql_query("UPDATE `users` SET
                            `karma_minus` = '" . ($datauser['karma_minus'] + $points) . "'
                            WHERE `id` = '" . $user_id . "'
                        ");
                        
                        mysql_query("UPDATE `users` SET `showlink` = '0' WHERE `id` = '$user_id'");
                    }
                }

		}else{
			$avatar = '@'.$user_id.' còn đưa link không phải từ Thitran9x nữa ăn band nhé';
		}
			$time = time();
			mysql_query("INSERT INTO `guest` SET
				`adm` = '0',
				`time` = '$time',
				`user_id` = '2',
				`name` = 'BOT',
				`text` = '" . mysql_real_escape_string($avatar) . "',
				`ip` = '0000',
				`browser` = 'IPHONE'
			");
            if($users_id != 3){
                mysql_query("UPDATE `users` SET `showlink` = `showlink`+'1' WHERE `id` = '$user_id'");
            }
		$cam = 1;
	}
}
//mysql_query("UPDATE `users` SET `showlink` = '0' WHERE `id` = '3'");
?>
