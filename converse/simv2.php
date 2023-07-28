<?php
define('_IN_JOHNCMS', 1);
date_default_timezone_set('Asia/Ho_Chi_Minh');
$day = date("d");
$month = date("m");
$year = date("y");
$h=date("H");
if (preg_match("|http://|",$msg) ||preg_match("|Http://|",$msg) || preg_match("|Http://www.|",$msg) ||preg_match("|http://www.|",$msg) || preg_match("|www.|",$msg) || preg_match("|moi anh em ghe tham|",$msg) || preg_match("|mời ae ghé thăm|",$msg)) {
$botvip = array			(
1  => "Cấm quảng cáo wap dưới mọi hình thức!!",
2  => "$login thử phát nữa xem nào. Bot cho đi ra đảo vĩnh viễn luôn nhá :ha:",
3  => "$login muốn đi du lịch hem :ban:",
4  => "Ui Em vào rùi wap cùi lắm!",
);
srand ((double) microtime() * 100000);
$randnum = rand(1,4);
$bot =''. $botvip[$randnum].'';
}

if (preg_match("|tâm vk ai|",$msg) || preg_match("|Tâm vk ai|",$msg) || preg_match("|tam vk ai|",$msg) || preg_match("|Tam vk ai|",$msg)) {
$botvip = "vk anh tiền đẹp troai <3",
$bot =''. $botvip.'';
}

if (preg_match("|iu tien ko|",$msg) || preg_match("|yeu tien khong|",$msg) || preg_match("|yeu tien khong sim|",$msg) || preg_match("|Yêu tien ko|",$msg)) {
$botvip = array       (
1 => "Ck em không iu chả lẽ iu ck hàng xóm à",
2 => "Bé Sim iu ck tiền nhất lun í",
);
srand ((double) microtime() * 100000);
$randnum = rand(1,2);
$bot =''. $botvip[$randnum].'';
}

if(preg_match("|em ơi"|,$msg) || preg_match("|em oi|",$msg) || preg_match("|e oi|",$msg) || preg_match("|e ơi|",$msg)) {
$botvip = "dạ em nghe nà";
$bot =''. $botvip.'';
}

if(preg_match("|tiền gay|",$msg) || preg_match("|tien gay|",$msg) || preg_match("|Tien gay|",$msg))    {
$botvip = " không đâu anh tiền men lì lém :)";
$bot =''. $botvip.''
}

if(preg_match("|Tiền ngu|",$msg) || preg_match("|tiền ngu|",$msg) ||preg_match("|tien ngu|",$msg)) {
$botvip = "Có anh ngu ý :hh";
$bot =''. $botvip.''
}

if(preg_match("|sim oi|",$msg) || preg_match("|Sim ơi|",$msg) preg_match("|SIM ơi|",$msg) preg_match("|Sim oi|",$msg))    {
$botvip = array    (
1 => "Anh thấy bé sim đẹp hơm ^^",
2 => "Dạ bé sim nge nà",
3 => "Ai gọi bé sim đó :^ có bé sim đây :0";
);
srand ((double (microtime() * 100000);
$randnum = rand(1,3);
$bot = $botvip[$randnum];
}

if($msg == "Hiếu gay"){
$botvip = "Anh hiếu hả. Hình như hơi bị gay gay :)";
$bot =''. $botvip.''
}

if($bot){
$time = time();
mysql_query("INSERT INTO `guest` SET
`adm` = '0',
`time` = '$time',
`user_id` = '4056',
`name` = 'BOT',
`text` = '" . mysql_real_escape_string($bot) . "',
`ip` = '0000',
`browser` = 'IPHONE'
");
}
?>