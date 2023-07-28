<?php
define('_IN_JOHNCMS', 1);
if(preg_match('|NR|',$msg) ||preg_match('|nr|',$msg) ||preg_match('|Nr|',$msg)) {
$puarudz= explode(" ",$msg);
$puarudz2= $puarudz[1];
$name = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `name` ='$puarudz2' LIMIT 1"));
$checkacc = mysql_result(mysql_query("select count(*) from `users` WHERE `name` ='$puarudz2' "),0);
if($checkacc == 0){
$msg2 = '[b][red]Tài Khoản '.$puarudz2.' Có Tồn Tại Đâu Má :D [/b][/red]';} else {
$namepuaru=$name['id'];
$puaru1 = mysql_fetch_array(mysql_query("select * from `puaru_rongthieng` WHERE `iduser`= '$namepuaru' && `loaiitem`= '1sao' LIMIT 1"));
$puaru2 = mysql_fetch_array(mysql_query("select * from `puaru_rongthieng` WHERE `iduser`= '$namepuaru' && `loaiitem`= '2sao' LIMIT 1"));
$puaru3 = mysql_fetch_array(mysql_query("select * from `puaru_rongthieng` WHERE `iduser`= '$namepuaru' && `loaiitem`= '3sao' LIMIT 1"));
$puaru4 = mysql_fetch_array(mysql_query("select * from `puaru_rongthieng` WHERE `iduser`= '$namepuaru' && `loaiitem`= '4sao' LIMIT 1"));
$puaru5 = mysql_fetch_array(mysql_query("select * from `puaru_rongthieng` WHERE `iduser`= '$namepuaru' && `loaiitem`= '5sao' LIMIT 1"));
$puaru6 = mysql_fetch_array(mysql_query("select * from `puaru_rongthieng` WHERE `iduser`= '$namepuaru' && `loaiitem`= '6sao' LIMIT 1"));
$puaru7 = mysql_fetch_array(mysql_query("select * from `puaru_rongthieng` WHERE `iduser`= '$namepuaru' && `loaiitem`= '7sao' LIMIT 1"));
$msg2 = '[b][red]'.$puarudz2.'[/b][/red] Đang Sở Hữu:
[b][red]Ngọc Rồng 1 Sao:[/b][/red] '.$puaru1['soluong'].' Viên
[b][red]Ngọc Rồng 2 Sao:[/b][/red] '.$puaru2['soluong'].' Viên
[b][red]Ngọc Rồng 3 Sao:[/b][/red] '.$puaru3['soluong'].' Viên 
[b][red]Ngọc Rồng 4 Sao:[/b][/red] '.$puaru4['soluong'].' Viên 
[b][red]Ngọc Rồng 5 Sao:[/b][/red] '.$puaru5['soluong'].' Viên
[b][red]Ngọc Rồng 6 Sao:[/b][/red] '.$puaru6['soluong'].' Viên
[b][red]Ngọc Rồng 7 Sao:[/b][/red] '.$puaru7['soluong'].' Viên ';}
$time = time()+10;
     mysql_query("INSERT INTO `guest` SET

                `adm` = '0',

                `time` = '" . $time . "',

                `user_id` = '256',

                `name` = 'NPC Rồng Thần',

                `text` = '" . mysql_real_escape_string($msg2) . "',

                `ip` = '11111',

                `browser` = 'I-Pad'

            ");
mysql_query("INSERT INTO `forum` SET



                `refid` = '2123',



                `type` = 'm' ,



                `time` = '" . time() . "',



                `user_id` = '256',



                `from` = 'NPC Rồng Thần',



                `ip` = '00000',



                `ip_via_proxy` = '" . core::$ip_via_proxy . "',



                `soft` = '" . mysql_real_escape_string($agn1) . "',



                `text` = '" . mysql_real_escape_string($msg2) . "'



            ");



            $fadd = mysql_insert_id();







            mysql_query("UPDATE `forum` SET



                `time` = '" . time() . "'



                WHERE `id` = '256'



            ");}


?>
