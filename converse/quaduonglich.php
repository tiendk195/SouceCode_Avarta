<?php
if($datauser['quaduonglich'] != 0){
echo'';
} else{
$rand = rand(1,5);
$xu = rand(300000000,500000000);
$luong = rand(1000,5000);
if($rand <= 4){
mysql_query("UPDATE `users` SET `quaduonglich`='1',`xu`=`xu`+{$xu},`luong`=`luong`+{$luong} WHERE `id` = '".$datauser['id']."'");
mysql_query("INSERT INTO `kho` SET
`idnick`='".$datauser['id']."',
`loai`='canh',
`ten`='321653',
`imgd`='/images/canh/321653.png',`nick`='".$datauser['id']."',`timesudung`='0'");
$bot = "@$login Chúc mừng bạn nhận được cánh vũ trụ và $xu xu, $luong lượng";
$bot=html_entity_decode($bot,ENT_QUOTES,'UTF-8');
$time = time()+10;
mysql_query("INSERT INTO `guest` SET
`adm` = '$admset',
`time` = '$time',
`user_id` = '$idbot',
`name` = 'Puaru',
`text` = '" . mysql_real_escape_string($bot) . "',
`ip` = '60543201',
`browser` = 'Iphone 4'
");
}

if($rand == 5){
mysql_query("UPDATE `users` SET `quaduonglich`='1',`luong`=`luong`+{$luong},`xu`=`xu`+{$xu} WHERE `id` = '".$datauser['id']."'");
mysql_query("INSERT INTO `kho` SET
`idnick`='".$datauser['id']."',
`loai`='thucung',
`ten`='2012',
`imgd`='/images/thucung/2012.png',`nick`='".$datauser['id']."',`timesudung`='0'");
$bot = "@$login Chúc mừng bạn nhận được pet người tuyết và $luong lượng, $xu xu";
$bot=html_entity_decode($bot,ENT_QUOTES,'UTF-8');
$time = time()+10;
mysql_query("INSERT INTO `guest` SET
`adm` = '$admset',
`time` = '$time',
`user_id` = '$idbot',
`name` = 'Puaru',
`text` = '" . mysql_real_escape_string($bot) . "',
`ip` = '60543201',
`browser` = 'Iphone 4'
");
}
}
?>