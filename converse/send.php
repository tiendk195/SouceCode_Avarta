<?php

/*
////////////////////////////////////////////////////////////////////////////////
//                                                                            //
//          Code được viết bởi Shiro.                                         //
//             Và Hỗ Trợ By Tienkie.                                          //
//                 không xóa  nếu bạn là người có học !                       //                                                    
//                                                                            //
////////////////////////////////////////////////////////////////////////////////
*/

$shiro = strtolower($msg);
if(preg_match('|#send|',$shiro)) {
               if ($datauser['id'] = 1) {
        $lay = str_replace('#send_','', $shiro);
        $lenh = explode('_', $lay);
        $id = $lenh[0];
		$soxu = $lenh[1];
		$soluong = $lenh[2];
        $dem = mysql_result(mysql_query("select count(*) from `users` where `id` = '".$id."'"),0);
        $mem = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id`='".$id."' LIMIT 1"));
               if ($dem == 0){
            $bot = 'Bạn chưa yêu cầu send cho thành viên nào !'; 
		} else	{
			$bot = 'Send cho @'.$id.' '.$soxu.' xu Và '.$soluong.' lượng thành  công !';
		mysql_query("UPDATE `users` SET `xu`=`xu`+'".$soxu."', `luong`=`luong`+'".$soluong."' WHERE `id`='".$id."'");
		}
	}  else {
		$bot = 'Bạn không đủ tuổi để sử dụng chức năng này !';
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
