<?php

define('_IN_JOHNCMS', 1);
$textl = 'Khu Ngoại Ô';
$headmod = 'id_user';
$rootpath='../';
require_once ("../incfiles/core.php");
require_once ("../incfiles/head.php");
echo'<div class="phdr">Khu Ngoại Ô</div>';

?>
<style>
.map img:hover {
    -moz-transform: rotate(360deg);
    -moz-transition: all 3s ease;
    -webkit-transform: rotate(360deg);
    -webkit-transition: all 3s ease;
    position: relative;
    transform: rotate(360deg);
    transition: all 1s ease;
}
</style>
<script type="text/javascript"> eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('e 0=d;2 9(){0=b.c(\'a\');0.1.f=\'m\';0.1.3=\'8\';0.1.4=\'8\'}2 l(){0.1.3=5(0.1.3)+6+\'7\'}2 k(){0.1.3=5(0.1.3)-6+\'7\'}2 g(){0.1.4=5(0.1.4)-6+\'7\'}2 j(){0.1.4=5(0.1.4)+6+\'7\'}h.i=9;',23,23,'imgObj|style|function|left|top|parseInt|10|px|0px|init|myImage|document|getElementById|null|var|position|Len|window|onload|Xuong|Trai|Phai|relative'.split('|'),0,{}))
</script>
<?php
mysql_query("UPDATE `users` SET `vitri` = '38' WHERE `id` = '".$user_id."'");
//-- Tìm kiếm users ---//
$online_u = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `vitri` = '38'"), 0);
$totalonline = $online_u;
$q = @mysql_query("select * from `users` where `lastdate` > " . (time() - 300) . " AND `vitri` = '38';");
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
//Keet thuc tim kiem
echo'<style type="text/css"> 
.ngoaio{background:url("http://i.imgur.com/3Ai56v9.gif") no-repeat; background-size: 900px 256px;} 
</style>';
echo '<div class="ngoaio" style="min-height:256px"><marquee behavior="scroll" direction="left" scrollamount="1" style="margin-top: 5px"><img src="/icon/iconxoan/dammaynho.png"></marquee><marquee behavior="scroll" direction="left" scrollamount="2" style="margin-top: 10px"><img src="/icon/iconxoan/dammaylon.png"></marquee></div><div class="cola" style="min-height: 100px;margin:0"><div class="buico"></div><a href="npclethinh.php"><img src="/icon/npclethinh.gif"></a><a href="nhatu.php"><img src="/icon/nhatu.png"></a><img src="/icon/cay.png" style="float:right"><center>';
echo'</br></br></br></br><a href="/duathu/npcduathu.php"><img src="/icon/duathu.gif" style="margin-top: -120px;"></a><a href="/duathu/"><img src="/icon/duathu.png" style="margin-top: -120px;"></a>'; 
echo'<br/>';
echo '<a href="bauvat.php"><div class="map"><img src="/congvien/bauvat.gif"></a></div></div><div class="da">';

if ($online_u > 0){
echo implode(' ',$u_on).'';
}
echo'  <a id="myImage" href="/member/'.$user_id.'.html"><label style="display: inline-block;text-align: center;"><b style="font-size: 9px;color:red;font-weight:bold;text-align: center;"></b><br><img src="/avatar/'.$user_id.'.png"></label></a></center>'; 

echo'<br><br><br>';
echo'</center><div class="buico"></div>';
echo'<form>
<center><input type="button" class="nut" name="len" onclick="Len();" value="↑↑"></br><div class="xd"></div>
<input type="button" class="nut" name="trai" onclick="Trai();" value="<<">
<input type="button" class="nut" name="ok" onclick="ok" value="Oki">
<input type="button" class="nut" name="phai" onclick="Phai();" value=">>"><br><div class="xd"></div>
<input type="button" class="nut" name="xuong" onclick="Xuong();" value="↓↓">  
</center>
</form>';
echo'</div>';




require('../incfiles/end.php');