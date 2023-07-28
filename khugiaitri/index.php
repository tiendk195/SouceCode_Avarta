<?php
define('_IN_JOHNCMS', 1);
$headmod = 'mod';
$bhead = 2;
require('../incfiles/core.php');
$khuvuc = 'khugiaitri';
//Keet thuc topic
if(!$user_id){
require('../incfiles/head.php');
echo functions::display_error($lng['access_guest_forbidden']);
require('../incfiles/end.php');
exit;
}
$textl = 'Khu giải trí';
require('../incfiles/head.php');
?>
<script type="text/javascript"> eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('e 0=d;2 9(){0=b.c(\'a\');0.1.f=\'m\';0.1.3=\'8\';0.1.4=\'8\'}2 l(){0.1.3=5(0.1.3)+6+\'7\'}2 k(){0.1.3=5(0.1.3)-6+\'7\'}2 g(){0.1.4=5(0.1.4)-6+\'7\'}2 j(){0.1.4=5(0.1.4)+6+\'7\'}h.i=9;',23,23,'imgObj|style|function|left|top|parseInt|10|px|0px|init|myImage|document|getElementById|null|var|position|Len|window|onload|Xuong|Trai|Phai|relative'.split('|'),0,{}))
</script>
<?php
echo'<div style="max-width:900px;width:auto;"><div class="phdr"><center>Khu Giải Trí </center></div>';
echo'<div class="nencay" style="height:120px; margin:0;"><marquee behavior="scroll" direction="left" scrollamount="1" style="margin-top: 5px"><img src="/icon/iconxoan/dammaynho.png"></marquee><marquee behavior="scroll" direction="left" scrollamount="2" style="margin-top: 10px"><img src="/icon/iconxoan/dammaylon.png"></marquee></div><div class="le"></div><div class="cola" style="height:70px;margin:0;"><img src="/icon/cay.png" alt="icon" style="position:absolute;margin:-35px 0 0 0;z-index:0;">

<a href="/game"><img src="/icon/game.png" alt="icon" style="position:absolute;margin:10px 0 0 10px;z-index:1;"></a>
<a href="anmay.php"><img src="anxin.gif" alt="icon" style="position:absolute;margin:70px 0 0 30px;z-index:1;"></a>
<a href="/avatar/list.php?act=danhsach&amp;loai=thucung"><img src="/icon/iconxoan/cuahangpet.png" alt="icon" style="position:absolute;margin:-10px 0 0 100px;z-index:1;"></a>
<a href="/vip"><img src="/icon/iconxoan/gift.png" alt="icon" style="position:absolute;margin:-15px 0 0 200px;z-index:1;"></a>
<a href="/shop/quayso.php"><img src="/icon/npcquayso.gif"  style="position:absolute;margin:24px 0 0 160px;z-index:1;"></a>
<img src="/icon/choxebuyt.png" alt="icon" style="position:absolute;margin:140px 0 0 100px;z-index:0;"></div><div class="da" style="height:200px;">';
mysql_query("UPDATE `users` SET `vitri` = '120' WHERE `id` = '".$user_id."'");
//-- Online Topic ---//
$online_u = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `lastdate` > " . (time() - 300) . " AND `vitri` = '120'"), 0);
$totalonline = $online_u;
$q = @mysql_query("select * from `users` where `lastdate` > " . (time() - 300) . " AND `vitri` = '120';");
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
echo'<center><a id="myImage" href="/member/'.$user_id.'.html" style="position: relative; left: 0px; top: 0px;"><label style="display: inline-block;text-align: center;"><b style="font-size: 9px;color:red;font-weight:bold;text-align: center;">'.$datauser['name'].'</b><br><img src="/avatar/'.$user_id.'.png"></label></a></center><br></div></div>';







echo'<form>
<center><input type="button" class="nut" name="len" onclick="Len();" value="↑↑"></br><div class="xd"></div>
<input type="button" class="nut" name="trai" onclick="Trai();" value="<<">
<input type="button" class="nut" name="ok" onclick="ok" value="Oki">
<input type="button" class="nut" name="phai" onclick="Phai();" value=">>"><br><div class="xd"></div>
<input type="button" class="nut" name="xuong" onclick="Xuong();" value="↓↓">  
</center>
</form>';


  









$onltime = time() - 200;
$req = mysql_query("SELECT * FROM `users` WHERE `quaysotime` > '".$onltime."' ORDER BY id LIMIT 40");



 






require('../incfiles/end.php');
?>