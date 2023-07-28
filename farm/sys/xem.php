<?php
if(isset($_GET['xem'])) {
if (!$user_id){
echo'<div class="menu">Bạn phải đăng nhập để chơi game này nhé !</div>';
require('../incfiles/end.php');
exit;
}
?>
<style>
.nen {
    background: url(https://i.imgur.com/TWiOW1S.png) repeat;
    height: 85px;
    margin: auto;
    max-width: 100%;
}
.nendat {
    background: url(https://i.imgur.com/9SJUHJe.png) repeat-x;
    height: 28px;
    max-width: 100%;
}
</style>
<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$kiemtra = date("H");
echo '<div class="dat" style="padding: 0;margin-bottom: 2px;margin-top: 3px;"><div class="main-xmenu"><div class="phdr"><b>Nông trại/Trang trại &raquo;</b></div>
'.(($gio >= 6 && $gio < 18) ? '<div class="nennongtrai">' : '<div class="nennongtrai_toi">').'
<marquee behavior="scroll" direction="left" scrollamount="1" style="margin-top: 5px"><img src="/nongtrai/img/may1.png"></marquee>
<marquee behavior="scroll" direction="left" scrollamount="2" style="margin-top: 10px"><img src="/nongtrai/img/may2.png"></marquee>
</div>';
echo'<div style="margin-top: -70px;text-align: center;"><a href="/nongtrai/laibuon.php"><img src="/nongtrai/icon/laibuon.gif"></a> <a href="/nongtrai/"><img src="sys/farm.gif"></a> <a href="/farm/"><img src="sys/pet.gif"></a> <a href="/mod/banhmi.php"><img src="https://i.imgur.com/6ldzFTx.png"></a></div>';

echo'<div class="cola">';



echo'<center>';


echo'  <a id="myImage" href="/member/'.$user_id.'.html"><label style="display: inline-block;text-align: center;"><b style="font-size: 9px;color:red;font-weight:bold;text-align: center;">'.$datauser['name'].'</b><br><img src="/avatar/'.$user_id.'.png"></label></a></center>'; 





echo'</center>';
echo'</div>';
echo'<div class="nen">';
mysql_query("UPDATE `users` SET `vitri` = '11111' WHERE `id` = '".$user_id."'");
//-- Online Topic ---//
$online_u = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `lastdate` > " . (time() - 300) . " AND `vitri` = '11111'"), 0);
$totalonline = $online_u;
$q = @mysql_query("select * from `users` where `lastdate` > " . (time() - 300) . " AND `vitri` = '11111';");
$count = mysql_num_rows($q);
while ($arr = mysql_fetch_array($q)){
$trinhtrangvip = mysql_query("select `rights` from `users` where id='" . $arr['id'] . "'");
$trinhtrangviphonnua = mysql_fetch_array($trinhtrangvip);
if($arr['id'] != $datauser['id']){
	
$u_on[]='<a href="/member/' . $arr['id'] . '.html"><label style="display: inline-block;text-align: center;"><b style="font-size: 9px;color:red;font-weight:bold;text-align: center;">' . $arr['name'] . '</b><br><img src="/avatar/' . $arr['id'] . '.png"></label></a>';
}else{
}
}
//Keet thuc topic
if ($online_u > 0){
echo implode(' ',$u_on).'';
}else{
	echo '<label style="display: inline-block;text-align: center;"><b style="font-size: 9px;color:red;font-weight:bold;text-align: center;">'.$datauser['name'].'</b><br><img src="/avatar/' . $datauser['id'] . '.png"></label>';
}
echo'


</div>';
echo'<div class="nendat"></div>';
echo'</div>';
echo'</div>';
echo'<form>
<center><input type="button" class="nut" name="len" onclick="Len();" value="↑↑"></br><div class="xd"></div>
<input type="button" class="nut" name="trai" onclick="Trai();" value="<<">
<input type="button" class="nut" name="ok" onclick="ok" value="Oki">
<input type="button" class="nut" name="phai" onclick="Phai();" value=">>"><br><div class="xd"></div>
<input type="button" class="nut" name="xuong" onclick="Xuong();" value="↓↓">  
</center>
</form>';
require('../incfiles/end.php');
exit;
}











?>