<?php
define('_IN_JOHNCMS', 1);
if(preg_match('|#Avatar|',$msg) ||preg_match('|#avatar|',$msg) ||preg_match('|#AVATAR|',$msg)) {
$puarudz= explode(" ",$msg);
$puarudz2= $puarudz[1];
file_get_contents('vncity.tk.tk/avatar/'.$puarudz2.'.png');
//Code Check Tài Khoản
echo $http_response_header[0];
if($http_response_header[0] == 'HTTP/1.1 200 OK'){
$msg2 = 'Nhân Vật Avatar [b][red]'.$puarudz2.'[/b][/red] Là:
[img]vncity.tk/avatar/'.$puarudz2.'.png[/img]';} else {
$msg2 = 'Nhân Vật Avatar [b][red]'.$puarudz2.'[/b][/red] Có Tồn Tại Ở Cuibapv2 Đéo Đâu? :D';}
$time = time()+10;
     mysql_query("INSERT INTO `guest` SET

                `adm` = '0',

                `time` = '" . $time . "',

                `user_id` = '256',

                `name` = 'BOT',

                `text` = '" . mysql_real_escape_string($msg2) . "',

                `ip` = '11111',

                `browser` = 'I-Pad'

            ");
}


?>
