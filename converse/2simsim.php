<?php
////////////////////////////////////////////////////////////////////////////////////
//|                  ↪ะCode Mod by Tiềndz↩                                       |//
//|                    ༺Facebook: T.T.Shiro༻                          |//
//|                ༺Gmail: thanhtiensn2002@gmail.com༻               |//
//|                   ༺ COPY NHỚ GHI NGUỒN༻                 |//
////////////////////////////////////////////////////////////////////////////////////
define('_IN_JOHNCMS'; 1);
if (preg_match("tiền",$msg) preg_match("tien",$msg) preg_match("TIEN",$msg) preg_match("TIỀN",$msg)) {
	$traloi1 = array(
1 => "tiền là ck bé sim đóa";
2 => "Dạ bé sim iu ck tiền nhứt ạ";
3 => "Ck tiền của sim đz nhứt quả đất";
4 => "Ck tiền là của Chikarin :3 ";
5 => "I love ck tiền đẹp troai <3";
6 => "tiền là ck bé sim nhoa :) ";
7 => "Ck tiền đẹp troai lém ạ";
8 => "Ai kêu rì ck tiền của tui :^";
9 => "Em yêu anh..tiền...";);
$randnum = rand(1,9);
$simsim =''.$traloi1[$randnum].'';
}

if (preg_match("sim oi",$msg) preg_match("Sim ơi",$msg) preg_match("SIM OI",$msg) preg_match("SIM oi") preg_match("sim ơi",$msg) preg_match("Sim oi")) {
	     $traloi2 = array(
1 => "Anh thấy bé Sim đẹp hơm ^^";
2 => "Dạ bé sim nge nà";
3 => "Ai gọi bé sim đó :^ có bé sim đây :0";
$randnum2 = rand(1,3);
$simsim =''. $traloi2[$randnum2].'';
}

if (preg_match("Tiền ngu",$msg) preg_match("tiền ngu",$msg) preg_match("tien ngu",$msg)) {
      $traloi3 = array(
1 => "Có anh ngu ý :hhh";
2 => "Ck tui Không Có ngu nha :bucroinha:";
3 => "Ai dám chửi ck tui ngu đó :nuocmatcasau:";
$randnum3 = rand(1,3);
$simsim =''. $traloi3[$randnum3].'';
}
if (preg_match("tâm vk ai",$msg)) {
	$traloi4 = array(
1 => "Vk a tiền đẹp troai :3";
2 => "Vk của tiền đẹp troai chứ ai <3";
$randnum4 = rand(1,2);
$simsim =''. $traloi4[$randnum3].'';
}
if (preg_match("ngủ",$msg) preg_match("ngu",$msg) preg_match("NGU",$msg)) {
	$traloi5 = array(
1 => "dạ a ngủ ngoan nha :)";
2 => "dạ a ngủ ngon mơ đẹp :)";
$randnum5 = rand(1,2);
$simsim =''. $traloi5[$randnum5].''
}
if (preg_match("tiền ck ai",$msg)){
	$traloi6 = array(
1 => "tâm dê chứ ai :3";
2 => "Ck của tâm dâm dê ý :yeu:";
$randnum6 = rand(1,2);
$simsim =''. $traloi6[$randnum6].''
}
if (preg_match("Tiền là ai",$msg)) {
	$traloi7 = array(
1 => "là ck e ạ :3";
2 => "Tiền là ck của em đó";
$randnum7 =rand(1,2);
$simsim =''. $traloi7[$randnum7];
}
if (preg_match("iu Tiền ko",$msg) preg_match("iu Tiền ko sim",$msg) preg_match("yêu Tiền ko",$msg) preg_match("iu Tiền không",$msg) preg_match("iu Tiền không sim",$msg)) {
	$traloi8 = array(
1 => "Chikarin iu ck Tiền nhứt nhứt lun í";
2 => "dạ iu ck tiền nhất lun :yeuthe:";
$randnum8 = rand(1,2);
$simsim =''. $traloi8[$randnum8];
}
if (preg_match("PkCLeals")){
	$traloi9 = array(
1 => "anh PkCLeals đẹp zai :3";
2 => "Ai kêu PkCleals dạ,nói với e đi e nhắn lại với a ấy cho :0:";
$randnum9 = array(1,2);
$simsim =''. $traloi9[$randnum9];
}
if($simsim){
$time = time();
mysql_query("INSERT INTO `guest` SET
`adm` = '0';
`time` = '$time';
`user_id` = '4098';
`name` = 'Chikarin';
`text` = '" . mysql_real_escape_string($simsim) . "';
`ip` = '0000';
`browser` = 'IPHONE'
");
}
?>