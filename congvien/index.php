<?php
error_reporting(0);
define('_IN_JOHNCMS', 1);
$headmod = 'mod';
$bhead = 2;
require('../incfiles/core.php');
if(!$user_id){
require('../incfiles/head.php');
echo functions::display_error($lng['access_guest_forbidden']);
require('../incfiles/end.php');
exit;
}
$textl = 'Công Viên';
require('../incfiles/head.php');

echo'<div class="phdr">Công Viên</div>';
echo'<div id="test">';

//Keet thuc topic




//Keet thuc topic

$kiemtra = date("H");

echo '<div class="nencay" style="min-height:140px"><marquee behavior="scroll" direction="left" scrollamount="1" style="margin-top: 5px"><img src="/icon/iconxoan/dammaynho.png"></marquee><marquee behavior="scroll" direction="left" scrollamount="2" style="margin-top: 10px"><img src="/icon/iconxoan/dammaylon.png"></marquee></div><div class="buico"></div>';



echo'<div class="cola"><img src="/congvien/ghe.png"/><img src="/congvien/ghe.png"/><a href="/game/kethon/"/><img src="/congvien/chuhon.gif" alt="hôn nhân"></a><img src="/congvien/ghe.png" alt="ghế" style="float:right;margin-right; -10px"><img src="/congvien/ghe.png" alt="ghế" style="float:right;margin-right; -10px"><br>';
echo '<img src="/congvien/13.png"/>';
$total = mysql_result(mysql_query("SELECT COUNT(*) FROM `daugia` WHERE `site` = 1"),0);
if($total < 1){

echo'<a href="/game/daugia/"><img src="/game/daugia/img/npc.gif" style="float:right"></a>';
} else {
echo'<a href="/game/daugia/"><img src="/game/daugia/img/npcdaugia2.gif" style="float:right"></a>';
}
echo'<a href="/khungoaio/thitruong.php"><img src="/images/thitruong.gif" style="position:absolute;margin: 15px 0 0 55px"></a>';
echo '<a href="code.php"><img src="/icon/gc.gif" alt="icon" style="vertical:align: -5px;"></a>';

echo'<center><a id="myImage" href="/member/'.$user_id.'.html" style="position: relative; left: 0px; top: 0px;"><label style="display: inline-block;text-align: center;"><b style="font-size: 9px;color:red;font-weight:bold;text-align: center;">'.$datauser['name'].'</b><br><img src="/avatar/'.$user_id.'.png"></label></a></center>';

mysql_query("UPDATE `users` SET `vitri` = '100' WHERE `id` = '".$user_id."'");
//-- Online Topic ---//
$online_u = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `lastdate` > " . (time() - 300) . " AND `vitri` = '100'"), 0);
$totalonline = $online_u;
$q = @mysql_query("select * from `users` where `lastdate` > " . (time() - 300) . " AND `vitri` = '100';");
$count = mysql_num_rows($q);
while ($arr = mysql_fetch_array($q)){
$trinhtrangvip = mysql_query("select `rights` from `users` where id='" . $arr['id'] . "'");
$trinhtrangviphonnua = mysql_fetch_array($trinhtrangvip);
if($arr['id'] != $datauser['id']){

$u_on[]='<a href="/member/' . $arr['id'] . '.html"><label style="display: inline-block;text-align: center;"><b style="font-size: 9px;color:red;font-weight:bold;text-align: center;">' . $arr['name'] . '</b><br><img src="/avatar/' . $arr['id'] . '.png"></label></a>';
}else{
}
}
if ($online_u > 0){
echo implode(' ',$u_on).'';
}else{
	echo '<label style="display: inline-block;text-align: center;"><b style="font-size: 9px;color:red;font-weight:bold;text-align: center;">'.$datauser['name'].'</b><br><img src="/avatar/' . $datauser['id'] . '.png"></label>';
}


echo'</br><center><img src="/icon/choxebuyt.png"/></center>';


echo '</div>';
echo'<div class="co1"></div>';
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
?>
<style type="text/css"> 
.nenda{
background: url('/cauca/img/nenngoai.png');
padding: 50px;
max-width: 100%;
margin: auto;
height: 80px;
border-bottom: 2px solid #e7e7e7;
}
.co1 {
background: url('/giaodien/images/buico.png') repeat-x;
margin-bottom: 0px;
height: 24px;
}
.nencay {
    background: url(/icon/iconxoan/nencanh1.png) repeat-x;
    height: 96px;
    width: 100%;
    max-width: 900px;
    width: 100%;
}
</style>
<style type="text/css">
        #test{
            width:auto;
            height:auto;
            overflow-y:auto;
        }
    </style>