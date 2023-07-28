<?php
           // Code by Shiro // 
 // Không xóa nếu bạn là người có học ! //
 
if (preg_match_all('|http://|',$msg) || preg_match_all('|sieuhot|',$msg) || preg_match_all('|.xyz|',$msg) || preg_match_all('|thitranxiteen|',$msg) || preg_match_all('|ThiTranXiTeen|',$msg) || preg_match_all('|THITRANXITEEN|',$msg) || preg_match_all('|tuoitre9u|',$msg) || preg_match_all('|.me|',$msg) || preg_match_all('|.ga|',$msg) || preg_match_all('|.ml|',$msg)) {
    if ($datauser['id'] == 1 || $datauser['id'] == 2 || $datauser['id'] == 3) {
		$bot = 'Tuy là chủ web nhưng quảng cáo là không tốt nhé !,lần này bot sẽ bỏ qua.';
		mysql_query("UPDATE `users` SET `ban_shiro`='1' WHERE `id`='" .$user_id. "'");
	} else if ($datauser['ban_shiro'] == 0) {
		$bot = 'QC lần nữa là bot cho ra đảo nhá !';
		mysql_query("UPDATE `users` SET `ban_shiro`='1' WHERE `id`='" .$user_id. "'");
	} else {
		$time = 1;
		$thoigian = ($time * 60 * 60 * 24 * 365 * 10);
		$bot = '@'.$user_id.' đã bị band lý do qc !';
		mysql_query("UPDATE `users` SET `ban_shiro`='0' WHERE `id`= '" .$user_id."'");
		mysql_query("UPDATE `users` SET `timeban`='" .$thoigian. "' WHERE `id`= '" .$user_id."'");
		 mysql_query("INSERT INTO `cms_ban_users` SET
                    `user_id` = '" . $user_id . "',
                    `ban_time` = '" . (time() + $thoigian) . "',
                    `ban_while` = '" . time() . "',
                    `ban_type` = '1',
                    `ban_who` = '".$login."',
                    `ban_reason` = 'Auto Band Qc(Shirodz)'
                ");
	}
	        $time = time();
        mysql_query("INSERT INTO `guest` SET
            `adm` = '0',
            `time` = '$time',
            `user_id` = '256',
            `name` = 'BOT',
            `text` = '" . mysql_real_escape_string($bot) . "',
            `ip` = '0000',
            `browser` = 'IPHONE'
        ");
}
?>