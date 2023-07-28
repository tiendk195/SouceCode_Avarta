<?php

/*
////////////////////////////////////////////////////////////////////////////////
//                                                                            //
//          Code được viết bởi Shiro.                                         //
//              Hỗ trợ tại Cuibapv2.tk.                                       //
//                 không xóa  nếu bạn là người có học !                       //
//                                                                            //
////////////////////////////////////////////////////////////////////////////////
*/

define('_IN_JOHNCMS', 1);
$shiro = strtolower($msg);
if(preg_match('|#Avatar|',$shiro) ||preg_match('|#avatar|',$shiro) ||preg_match('|#AVATAR|',$shiro)) {
$lay = str_replace('#avatar ','', $shiro);
$lenh = explode(' ', $lay);
$id = $lenh[0];
$dem = mysql_result(mysql_query("select count(*) from `users` where `id` = '".$id."'"),0);
	   if($dem == 0) {
$msg2 = 'Bạn chưa yêu cầu xem avatar thành viên nào !';
} else if($datauser['rights'] = 10){
$msg2 = 'Nhân Vật Avatar [b][red]@'.$id.'[/b][/red] Là:
[img]http://cuibapv2.tk/avatar/'.$id.'.png[/img]';
} else {
$msg2 = 'Chỉ có Sáng Lập Viên Mới Có Thể Dùng Chức Năng Này !';
}	
$time = time()+10;
     mysql_query("INSERT INTO `guest` SET

                `adm` = '0',

                `time` = '" . $time . "',

                `user_id` = '256',

                `name` = 'BOT',

                `text` = '" . mysql_real_escape_string($msg2) . "',

                `ip` = '0000',

                `browser` = 'IPHONE'

            ");
}


?>
