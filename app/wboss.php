<?php
define('_IN_JOHNCMS', 1);
$textl = 'Săn Boss';
$headmod = 'id_user';
require_once ("../incfiles/core.php");
require_once ("../incfiles/head.php");
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
<?php
$wboss = mysql_fetch_array(mysql_query("SELECT * FROM `wboss` WHERE `id` = '10'"));


echo'<div class="phdr">Săn Boss > '.$wboss['ten'].'</div>';

switch($act) {
case 'add':
if ($datauser['id'] == 1 || $datauser['id'] == 2) {
if (isset($_POST['add'])) {
$vatpham=(int)$_POST['vatpham'];

if (empty($vatpham)) {
echo '<div class="news">Không được bỏ trống chỗ nào hết!</div>';
} else {
mysql_query("UPDATE `wboss` SET `idshop` = '".$vatpham."' WHERE `id` = '10'");
$tenvatpham=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo`"));

echo '<div class="rmenu">Thay item thành công</div>';
}
}
echo '<form method="post">';
echo '<div class="rmenu">Vật phẩm: <select name="vatpham">';
$qs=mysql_query("SELECT * FROM `shopdo` ORDER BY `id`");
while ($show=mysql_fetch_array($qs)) {
echo '<option value="'.$show['id'].'"> '.$show['id'].': '.$show['tenvatpham'].'</option>';
}
echo '</select><br/>';
echo '<input type="submit" name="add" value="Thay Item"></div>';
echo '</form>';
}

require_once ("../incfiles/end.php");
exit;
break;
}



$wboss = mysql_fetch_array(mysql_query("SELECT * FROM `wboss` WHERE `id` = '10'"));
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$wboss['idshop']."'"));
mysql_query("UPDATE `users` SET `vitri` = '96' WHERE `id` = '".$user_id."'");
//-- Tìm kiếm users ---//
$online_u = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `vitri` = '96'"), 0);
$totalonline = $online_u;
$q = @mysql_query("select * from `users` where `lastdate` > " . (time() - 300) . " AND `vitri` = '96';");
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
//Auto Update HP 

echo '<style type="text/css">
.nenkhaithac2{background:url(http://i.imgur.com/xyGmo75.png) repeat-x}
.nenkhaithac{background:url(http://i.imgur.com/MreO5M3.png) repeat-x}</style>';
echo '<div class="nenkhaithac" style="height:125px; margin:0;"><marquee behavior="scroll" direction="left" scrollamount="1" style="margin-top: 5px"><img src="/img/may1.png"></marquee><marquee behavior="scroll" direction="left" scrollamount="2" style="margin-top: 10px"><img src="/img/may2.png"></marquee></div><div class="cola" style="margin:0px 0px"><div class="nenkhaithac2">';
if ($online_u > 0){
echo implode(' ',$u_on).'';
}
echo'</div>';
echo'<center>';
//Đánh Boss

echo'<span id="load"></span>';
echo'<center>';
	echo'<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><center><b>'.$wboss['ten'].'</b></font></br>';
if ($wboss['loaiboss']==1){

	echo'<img src="https://i.imgur.com/GN0zi6D.gif" width="88" height="88"/>';

}
if ($wboss['loaiboss']==2){

	echo'<img src="https://i.imgur.com/PMPq9BW.gif" width="88" height="88"/>';

}
if ($wboss['loaiboss']==3){

	echo'<img src="https://i.imgur.com/T5hSleC.gif" width="88" height="88"/>';

}
if ($wboss['loaiboss']==4){

	echo'<img src="https://i.imgur.com/SBi5gt9.gif" width="88" height="88"/>';

}
if ($wboss['loaiboss']==5){

	echo'<img src="https://i.imgur.com/LYuf071.gif" width="88" height="88"/>';

}
if ($wboss['loaiboss']==6){

	echo'<img src="https://i.imgur.com/lIqMqMk.gif" width="88" height="88"/>';

}
if ($wboss['loaiboss']==7){

	echo'<img src="https://i.imgur.com/zjbvwDC.gif" width="88" height="88"/>';

}
if ($wboss['loaiboss']==8){

	echo'<img src="https://i.imgur.com/ZrbbwTe.gif" width="88" height="88"/>';

}

if ($wboss['loaiboss']==9){

	echo'<img src="https://i.imgur.com/JbCFGtH.gif" width="88" height="88"/>';

}
if ($wboss['loaiboss']==10){

	echo'<img src="https://i.imgur.com/ng2IRjJ.gif" />';

}
echo'
<form method="post"><input type="submit" name="danh" id ="danh" value="Đánh" /></form></center>';
echo'</div>';


require_once ("../incfiles/end.php");
?>