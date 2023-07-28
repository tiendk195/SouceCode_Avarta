<?php

/*
////////////////////////////////////////////////////////////////////////////////
//                                                                            //
//          Code được viết bởi PkCleals.                                      //
//               Và mod lại bởi Tiềndz.                                       //
//                 không xóa  nếu bạn là người có học !                       //                                                    
//                                                                            //
////////////////////////////////////////////////////////////////////////////////
*/
$idbot = 256; // ID của con bot

if(preg_match('|mua he mat me|',$msg) || preg_match('|Mùa hè mát mẻ|',$msg) || preg_match('|Mua he mat me|',$msg) || preg_match('|mùa hè mát mẻ|',$msg)) {   
if (time() > $datauser['timeskmm'] + 3600*24 ){
$tong =mysql_result(mysql_query("SELECT COUNT(*) FROM `sukien` "),0);
$rand = rand(1,$tong);
$rand=mysql_fetch_array(mysql_query("SELECT * FROM `sukien` WHERE `id`='".$rand."'"));
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$rand[idshop]."'"));
$ktruong=(mysql_query("INSERT INTO `kho` SET `idnick`='".$user_id."',`ten`='".$shop['img']."', `loai`='".$shop['loai']."'"));
  mysql_query("UPDATE `users` SET `timeskmm`='".time()."' WHERE `id` = '$user_id'");
$bot ='Chúng mừng @'.$user_id.' nhận được '.$shop['tenvatpham'].' [img]http://cuibapv2.tk/images/'.$shop['loai'].'/'.$shop['img'].'.png[/img]';
} else {	
$bot = "@$login bạn đã nhận quà hôm nay rồi,24h sau khi nhận mới nhận được tiếp";
}
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

?>