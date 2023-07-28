<?php
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
$textl = 'Khu mua sắm';
require('../incfiles/head.php');
?>
<script type="text/javascript"> eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('e 0=d;2 9(){0=b.c(\'a\');0.1.f=\'m\';0.1.3=\'8\';0.1.4=\'8\'}2 l(){0.1.3=5(0.1.3)+6+\'7\'}2 k(){0.1.3=5(0.1.3)-6+\'7\'}2 g(){0.1.4=5(0.1.4)-6+\'7\'}2 j(){0.1.4=5(0.1.4)+6+\'7\'}h.i=9;',23,23,'imgObj|style|function|left|top|parseInt|10|px|0px|init|myImage|document|getElementById|null|var|position|Len|window|onload|Xuong|Trai|Phai|relative'.split('|'),0,{}))
</script>
<?php
echo'<div class="phdr">Khu Mua Sắm </div>

<center>


';


if(date("G")<19 && date("G")>=6) {echo '<div class="nhasang" style="height:120px; margin:0;"><marquee behavior="scroll" direction="left" scrollamount="1" style="margin-top: 5px"><img src="/icon/iconxoan/dammaynho.png"></marquee><marquee behavior="scroll" direction="left" scrollamount="2" style="margin-top: 10px"><img src="/icon/iconxoan/dammaylon.png"></marquee></div>';}
else {echo '<div class="nhatoi"></div>';}

  

//Keet thuc topic
echo '<div class="le"></div>';
echo '<div class="da">';
?>
<a href="/avatar"><img src="/icon/shop.png"></a> 
<a href="/avatar/vatpham.php"><img src="/icon/nangcap.png" style="vertical:align: -1px;"></a> <a href="/avatar/nangcap.php?act=index"><img src="/icon/kimhoan.gif"/></a> <a href="/avatar/premium.php"><img src="https://i.imgur.com/9CET9Tf.png" style="margin-center:-1px"/></a>

<?php
echo '</div>';
echo '<div class="da">';
echo'<img src="/icon/choxebuyt.png" alt="icon" style="position:absolute;margin:14px 0 0 -170px;z-index:0;">';
echo'</br></br></br></br>';
mysql_query("UPDATE `users` SET `vitri` = '66' WHERE `id` = '".$user_id."'");
//-- Online Topic ---//
$online_u = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `lastdate` > " . (time() - 300) . " AND `vitri` = '66'"), 0);
$totalonline = $online_u;
$q = @mysql_query("select * from `users` where `lastdate` > " . (time() - 300) . " AND `vitri` = '66';");
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

echo'  <a id="myImage" href="/member/'.$user_id.'.html"><label style="display: inline-block;text-align: center;"><b style="font-size: 9px;color:red;font-weight:bold;text-align: center;">'.$datauser['name'].'</b><br><img src="/avatar/'.$user_id.'.png"></label></a></center>'; 


echo'<div class="buico"></div>';

echo'<form>
<center><input type="button" class="nut" name="len" onclick="Len();" value="↑↑"></br><div class="xd"></div>
<input type="button" class="nut" name="trai" onclick="Trai();" value="<<">
<input type="button" class="nut" name="ok" onclick="ok" value="Oki">
<input type="button" class="nut" name="phai" onclick="Phai();" value=">>"><br><div class="xd"></div>
<input type="button" class="nut" name="xuong" onclick="Xuong();" value="↓↓">  
</center>
</form>';


//--Kết thúc Phòng Chát//



require('../incfiles/end.php');
?>
<style>
.buico {
    background: url(https://i.imgur.com/7ktVkQp.png) repeat-x;
    height: 25px;
    width: 100%;
}
</style>