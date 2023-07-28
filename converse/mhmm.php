<?php
$idbot=256;

if(preg_match('|Mùa Hè Mát Mẻ Vl|',$msg)) {   
    $ktip = mysql_result(mysql_query("SELECT COUNT(`ip`) FROM `users` WHERE `ip`='" . core::$ip . "' and `lastdate` >'".(time()-300)."'"), 0);

if (time() > $datauser['timeskmm'] + 3600*24 ){
$bot ='Chúng mừng @'.$user_id.' nhận được '.$shop['tenvatpham'].' [img]http://cuibapv2.tk/images/'.$shop['loai'].'/'.$shop['img'].'.png[/img]'
}
if($ktip <= 1){
$tong =mysql_result(mysql_query("SELECT COUNT(*) FROM `sukien` "),0);
$rand = rand(1,$tong);
$rand=mysql_fetch_array(mysql_query("SELECT * FROM `sukien` WHERE `id`='".$rand."'"));
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$rand[idshop]."'"));
mysql_query("UPDATE `users` SET `timeskmm` = " .time(). " WHERE `id` = '{$user_id}'");

$ktruong=(mysql_query("INSERT INTO `kho` SET `idnick`='".$user_id."',`ten`='".$shop['img']."', `loai`='".$shop['loai']."'"));

} else {
	
$bot = "@$login bạn đã nhận xu,48h sau khi nhận mới nhận được tiếp";
}

$bot=html_entity_decode($bot,ENT_QUOTES,'UTF-8');
$time = time()+10;
mysql_query("INSERT INTO `guest` SET
`adm` = '0',
`time` = '$time',
`user_id` = '$idbot',
`name` = 'BOT',
`text` = '" . mysql_real_escape_string($bot) . "',
`ip` = '0000',
`browser` = 'IPHONE'
");
}
?>