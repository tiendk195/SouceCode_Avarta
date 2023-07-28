<?php
define('_IN_JOHNCMS', 1);
$textl = 'Sự Kiện 1/5';
$headmod = 'id_user';
$rootpath='../../';
require_once ("../../incfiles/core.php");
require_once ("../../incfiles/head.php");
if (!$user_id) {
echo '<div class="omenu"><p><b>Lỗi!</b><br>Trang chỉ dành cho thành viên!</p></div>';
require_once ("../../incfiles/end.php");
exit;
}
if ($datauser['kichhoat']==0) {
echo '<div class="omenu"><p><b>Lỗi!</b><br>Trang chỉ dành cho thành viên đã kích hoạt!</p></div>';
require_once ("../../incfiles/end.php");
exit;
}
if ($datauser['postforum']<2) {
    echo'<div class="omenu">Bạn cần đạt 2 bài viết để vào đây</div>';
    require('../incfiles/end.php');
exit;
}
?>
<!--Edit by Lethinh-->
<?php
Switch($act){
Case 'doidiem':
echo'<div class="phdr">Đổi điểm sự kiện</div>';
if (isset($_POST[submit])) {
$sl=(int)$_POST[sl];
$slt=$sl*10;
if ($datauser['diemsk15']< 10) {
echo '<div class="omenu">Bạn cần cón 10 điểm sự kiện để đổi!</div>';
} else if($sl > 100) {
echo '<div class="omenu">Không vượt quá 100 hộp </div>';
} else if (empty($sl)) {
echo '<div class="omenu">Bạn chưa nhập số lượng</div>';
} else {
	echo '<div class="omenu">Đổi thành công '.$sl.' hộp quà 1.5, bạn bị trừ '.number_format($slt).' điểm sự kiện</div>';

mysql_query("UPDATE `users` SET `diemsk15` = `diemsk15` - '".$slt."' WHERE `id`= '".$user_id."'");
  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$sl."' WHERE `user_id`='".$user_id."' AND `id_shop` = '105'");

}
}
echo '<form method ="post">';
echo'<div class="omenu"><center><b>Bạn đang có <font color ="red">'.number_format($datauser['diemsk15']).' điểm sự kiện</font>.</br> Bạn có muốn đổi 10 điểm sự kiện lấy 1 hộp quà 1.5 không</br> </b>';
echo'<div class="omenu">Nhập số lượng muốn đổi</br>';
echo'<input type="number" name="sl"><br/>';
echo'<input type ="submit" name = "submit" value ="Đổi"></form></center></div>';
require_once ("../../incfiles/end.php");

exit;
Break;
}
?>
<style>
.ngoaio {
    background: url(http://i.imgur.com/3Ai56v9.gif) no-repeat;
    background-size: 900px 256px;
}
.nen{
margin: 10px 0px;
background: url('https://i.imgur.com/hSIat6a.png'); 
padding: 0px;
}

</style>
<?php
//Keet thuc topic
mysql_query("UPDATE `users` SET `vitri` = '152020' WHERE `id` = '".$user_id."'");
?>
<style>
.nenkhaithac2{background:url(http://i.imgur.com/xyGmo75.png) repeat-x}
.nenkhaithac{background:url(http://i.imgur.com/MreO5M3.png) repeat-x}
</style>
<div class="phdr">Sự kiện 1.5</div><div class="nenkhaithac" style="height:125px; margin:0;"><marquee behavior="scroll" direction="left" scrollamount="1" style="margin-top: 5px"><img src="/icon/iconxoan/dammaynho.png"></marquee><marquee behavior="scroll" direction="left" scrollamount="2" style="margin-top: 10px"><img src="/icon/iconxoan/dammaylon.png"></marquee></div><div class="cola" style="height:310px; margin:0;"><div class="nenkhaithac2" style="height:29px;"></div>
<img src="https://i.imgur.com/IUDYAK6.png"><br>
<a href="index.php"><img src="/images/vao.gif"></a>
<center><img src="images/caytk.png"><br>
<a href="nezuko.php"><img src="https://i.imgur.com/Gvw1FFQ.gif" alt="NPC Nezuko" style="float: left;verticalalign: 0 px;margin:-91px 0 0 0px;"></a>

<a href="?act=doidiem"><input type="submit" value="Đổi điểm sự kiện"></a>
</center>
<?php
//-- Online Topic ---//
$online_u = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `lastdate` > " . (time() - 300) . " AND `vitri` = '152020'"), 0);
$totalonline = $online_u;
$q = @mysql_query("select * from `users` where `lastdate` > " . (time() - 300) . " AND `vitri` = '152020';");
$count = mysql_num_rows($q);
while ($arr = mysql_fetch_array($q)){
$trinhtrangvip = mysql_query("select `rights` from `users` where id='" . $arr['id'] . "'");
$trinhtrangviphonnua = mysql_fetch_array($trinhtrangvip);
if($arr['id'] != $datauser['id']){
$u_on[]='<a href="../member/' . $arr['id'] . '.html"><img src="/avatar/' . $arr['id'] . '.png"></a>';
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
echo'</div><div class="nenkhaithac2" style="min-height: 29px;margin:0"></div>';
?>
<?php

require('../../incfiles/end.php');