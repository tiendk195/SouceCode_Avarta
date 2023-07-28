<?php

define('_IN_JOHNCMS', 1);
$textl = 'Super Broly ';
$headmod = 'id_user';
$rootpath='../';
require_once ("../incfiles/core.php");
require_once ("../incfiles/head.php");
echo'<div class="phdr">Super Broly </DIV>';
/*
if ($datauser['rights']<9) {
    echo'<div class="phdr">Bảo trì</div>';
    require_once ("../incfiles/end.php");
exit;
}
*/
$wboss = mysql_fetch_array(mysql_query("SELECT * FROM `wboss` WHERE `id` = '11'"));

mysql_query("UPDATE `users` SET `vitri` = '1520222' WHERE `id` = '".$user_id."'");





echo '<style type="text/css">
.nenkhaithac2{background:url(https://i.imgur.com/xyGmo75.png) repeat-x}
.nenkhaithac{background:url(https://i.imgur.com/MreO5M3.png) repeat-x}</style>';
echo '<div class="nenkhaithac" style="height:125px; margin:0;"><marquee behavior="scroll" direction="left" scrollamount="1" style="margin-top: 5px"><img src="/img/may1.png"></marquee><marquee behavior="scroll" direction="left" scrollamount="2" style="margin-top: 10px"><img src="/img/may2.png"></marquee></div><div class="cola" style="margin:0px 0px"><div class="nenkhaithac2">';


echo'</div>';
echo'<center>';
//Đánh Boss

echo'<span id="load"></span>';
echo'<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><center><b>'.$wboss['ten'].'</b></font></br>';
echo'<center><div class="ducnghia_"><img src="https://i.imgur.com/tHxAtzE.gif"/><span class="ducnghia_hien">Tránh xa tao ra trước khi ta nổi giận</div></span><br>
<form method="post"><input type="submit" name="danh" id ="danh" value="Đánh" /></form></center>';
echo'</div>';
echo'<div class="buico"></div><div class="cola" style="min-height: 55px;margin:0">';
//-- Online Topic ---//
$online_u = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `lastdate` > " . (time() - 300) . " AND `vitri` = '1520222'"), 0);
$totalonline = $online_u;
$q = @mysql_query("select * from `users` where `lastdate` > " . (time() - 300) . " AND `vitri` = '1520222';");
$count = mysql_num_rows($q);
while ($arr = mysql_fetch_array($q)){
$trinhtrangvip = mysql_query("select `rights` from `users` where id='" . $arr['id'] . "'");
$trinhtrangviphonnua = mysql_fetch_array($trinhtrangvip);
if($arr['id'] != $datauser['id']){
$u_on[]='<a href="/member/' . $arr['id'] . '.html"><img src="/avatar/' . $arr['id'] . '.png"></a>';
}else{
	$u_on[]='<img src="/avatar/' . $arr['id'] . '.png">';
}
}
//Keet thuc topic
if ($online_u > 0){
echo implode(' ',$u_on).'';
}else{
	echo '<img src="/avatar/'.$user_id.'.png"/>';
}
echo'</div>';
require_once ("../incfiles/end.php");
?>
<script type="text/javascript">
$(document).ready(function(){
	$('#danh').click(function(){
		var url = "wboss-load.php";
		var data = {"danh": ""};
		$('#load').load(url, data);
		return false;
	});
});
</script>