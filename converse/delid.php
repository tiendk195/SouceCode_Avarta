<?php

/*
////////////////////////////////////////////////////////////////////////////////
//                                                                            //
//          Code được viết bởi Shiro.                                         //
//              fb.com/T.T.Shiro.                                             //
//                 không xóa  nếu bạn là người có học !                       //
//                                                                            //
////////////////////////////////////////////////////////////////////////////////
*/

$shiro = strtolower($msg);
if(preg_match('|#delid|',$shiro)) {
	if($datauser['id'] = 1) {
        $lay = str_replace('#delid_','', $shiro);
        $lenh = explode('_', $lay);
        $id = $lenh[0];
        $dem = mysql_result(mysql_query("select count(*) from `users` where `id` = '".$id."'"),0);
        $mem = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id`='".$id."' LIMIT 1"));
               if ($dem == 0){
            $bot = 'Bạn chưa yêu cầu xóa id thành viên nào !'; 
		} else if($id == 1 || $id == 3) {
			$bot = 'Bạn chưa đủ tuổi để xóa id người này !';
		} else if($id == $user_id) {
			$bot = 'Error 1';
		} else {
			$bot = 'Thông báo : Thành viên đã bị xóa id !';
		mysql_query("DELETE FROM `users` WHERE `id`= '" .$id. "'");
		}
	} else {
		$bot = 'Chỉ những người được chọn mới có thể sử dụng chức năng này !';
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