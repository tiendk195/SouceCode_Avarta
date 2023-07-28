<?php

function tagnick($qdn){

$qdn = str_replace('
','-/- ', $qdn);
$laynick = explode('@', $qdn);
$nick = explode(' ', $laynick['1']);
$conick = $nick[0];
$taikhoan = @mysql_fetch_array(mysql_query("SELECT * FROM users WHERE name='{$conick}'"));
$demnick = mysql_result(mysql_query("select count(*) from `users` where `name` = '".$conick."'"),0);
if(!empty($conick)){
if($demnick != 0){
$idtag = $taikhoan['id'];
$noidung = '<b><font color="003366"><span style="color:#2c5170;">'.$login.'</font></font></b><font color="000000">nhắc đến bạn tại </font><a href="/"><font color="003366">ChatBox</font></a>';
//mysql_query("INSERT INTO `thongbao` SET `id` = '0', `time` = '$time', `user_id` = '256', `name` = 'BOT', `text` = '" . $moqua . "', `ip` = '0000', `browser` = 'IPHONE'");
$qdn = str_replace('@'.$conick.'','@[user='.$idtag.'][color=#2c5170]'.$conick.'[/color][/user]',$qdn); } }

//nick 2
$nick2 = explode(' ', $laynick['2']);
$conick2 = $nick2[0];
$taikhoan2 = @mysql_fetch_array(mysql_query("SELECT * FROM users WHERE name='{$conick2}'"));
$demnick2 = mysql_result(mysql_query("select count(*) from `users` where `name` = '".$conick2."'"),0);
if(!empty($conick2) ){
if($demnick2 != 0){
$idtag2 = $taikhoan2['id'];
$qdn = str_replace('@'.$conick2.'','@[user='.$idtag2.'][color=#2c5170]'.$conick2.'[/color][/user]',$qdn); } }

//nick 3
$nick3 = explode(' ', $laynick['3']);
$conick3 = $nick3[0];
$taikhoan3 = @mysql_fetch_array(mysql_query("SELECT * FROM users WHERE name='{$conick3}'"));
$demnick3 = mysql_result(mysql_query("select count(*) from `users` where `name` = '".$conick3."'"),0);
if(!empty($conick3)){
if($demnick3 != 0){
$idtag3 = $taikhoan3['id'];
$qdn = str_replace('@'.$conick3.'','@[user='.$idtag3.'.html][color=#2c5170]'.$conick3.'[/color][/user]',$qdn); } }
//$qdn = str_replace(' -/- ','',$qdn);
return $qdn;
}
?>
