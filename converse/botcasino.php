<?php
define('_IN_JOHNCMS', 1);
if(preg_match('|#CL|',$msg) ||preg_match('|#Cl|',$msg) ||preg_match('|#cl|',$msg)) {
$puarudz= explode(" ",$msg);
$puarudz2= $puarudz[1];
$puarudz3= $puarudz[2];
$random= rand(0,3);
$pucheck = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` ='$user_id' LIMIT 1"));
if($puarudz2 == 'chan' || $puarudz2 == 'Chan' || $puarudz2 == 'CHAN'){
$giatridanh= 0;}
if($puarudz2 == 'le' || $puarudz2 == 'Le' || $puarudz2 == 'LE'){
$giatridanh= 1;}
if($random == 0){
$namepu = 'Chẵn';} else { $namepu = 'Lẻ';}
if($puarudz3 > 0){
if($pucheck['xu'] < $puarudz3){
$msg2 = '[b]@'.$login.' [red]Méo Đủ Tiền Mà Đua Đòi Chơi :D Xin $ Ck của tui Chơi đi :p[/b][/red]';}
if($pucheck['xu'] > $puarudz3){
if($giatridanh == $random){
$tiennhan= $puarudz3 * 2;
mysql_query("UPDATE users SET `xu`=`xu`+'$tiennhan' WHERE `id`='$user_id'");
mysql_query("UPDATE users SET `xu`=`xu`-'$puarudz3' WHERE `id`='$user_id'");
$msg2 = '[b][red]'.$login.' Win '.$tiennhan.' Rồi Nhé! ('.$random.') [/b][/red]';
} if($giatridanh != $random){
mysql_query("UPDATE users SET `xu`=`xu`-'$puarudz3' WHERE `id`='$user_id'");
$msg2 = '[b][red]'.$login.'[/b][/red] Ăn Cám Rồi Nhé Thím. Máy Ra '.$namepu.' Rồi Baby Ơi ('.$random.').
 ^^';
}}}
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