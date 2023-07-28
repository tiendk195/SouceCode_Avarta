<?php
define('_IN_JOHNCMS', 1);
$textl = 'Sự Kiện Sinh Nhật';
$headmod = 'id_user';
$rootpath='../../';
require_once ("../../incfiles/core.php");
require_once ("../../incfiles/head.php");
date_default_timezone_set('Asia/Ho_Chi_Minh');
$gio = date("Hi");

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
if($gio < 1900){
echo'<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Khu tìm quà sinh nhật chỉ mở từ 19h => 23h hàng ngày! Vui lòng quay lại sau</div>';
require_once ("../../incfiles/end.php");
exit;

} 


if($gio > 2300){
echo'<div class="omenu">Khu boss chỉ mở từ 19h => 22h hàng ngày! Vui lòng quay lại sau</div>';
require_once ("../../incfiles/end.php");
exit;

} 

?>
<!--Edit by Lethinh-->
<?php

?>
<style>
.bautroi{
background: url('https://i.imgur.com/H7Yf2gS.png') repeat-x; 
height: 123px;
width: 100%;
}
.co{
background: url('https://i.imgur.com/XFOoc1q.png') repeat; 
height: 100px;
width: 100%;
}
.co2{
background: url('https://i.imgur.com/lkRA6nj.png') repeat; 
height: 200px;
width: 100%;
}
.buicay{
background: url('https://i.imgur.com/onZqEVP.png') repeat-x; 
height: 25px;
width: 100%;
}
.nen{
background: url('https://i.imgur.com/hSIat6a.png') repeat; 
height: 49px;
width: 100%;
}
</style>



<?php


switch($act){
	case'nhanqua':
	echo'<div class="phdr">Sự Kiện Sinh Nhật > Nhận Quà</div>';

	$vp=intval($_GET['id']);
	$p=mysql_fetch_array(mysql_query("SELECT * FROM `khusinhnhat` WHERE `user_id`= '".$user_id."'"));
$n=mysql_num_rows(mysql_query("SELECT * FROM `khusinhnhat` WHERE `khu`= '".$vp."' AND `user_id`= '".$user_id."'"));
if ($p['nhan']==1){
	Header('Location: /');
exit;
}
if ($n<1) {
			Header('Location: /');

echo'<div class="omenu"><font color="red"><b>Lỗi !!</font></b></div>';

} else {
	echo'<center>';
	if (isset($_POST[nhan])) {
		if ($datauser['toc']==292 &&$datauser['ao']==500&&$datauser['quan']==304 ){
			$gioihanqua=70;
		} else if ($datauser['toc']==292 &&$datauser['ao']==500&&$datauser['quan']==304&&$datauser['docamtay']==256 ){
						$gioihanqua=80;

		} else {
			$gioihanqua=50;
		}
$randkhu=rand(1,30);
   $randct=rand(1000000,9999999);

$captcha=(int)$_POST[captcha];
if (empty($captcha)) {
echo'<div class="omenu"><font color="red"><b>Lỗi !!</font></b> Bạn chưa nhập mã captcha</div>';
} else if ($captcha!=$p['captcha']){
	echo'<div class="omenu"><font color="red"><b>Lỗi !!</font></b> Mã captcha chưa chính xác</div>';


	
	} else if ($datauser['sohopqua']>=$gioihanqua) {
echo'<div class="omenu"><font color="red"><b>Lỗi !!</font></b> Bạn đã đạt giới hạn nhận quà</div>';
} else {
$thinh=$datauser['sohopqua']+1;
				echo'<div class="omenu">Bạn nhận được <font color="green"> 1 Hộp quà sinh nhật</font> <img src="/images/vatpham/164.png"> -
Số lượng '.$thinh.'/'.$gioihanqua.'
<a href="/app/sinhnhat/khutimnpc.php?act=khu&amp;id='.$vp.'"> Quay lại</a></div>';
mysql_query("UPDATE `users` SET `sohopqua` =`sohopqua`+  '1' WHERE `id`= '".$user_id."'");
							mysql_query("UPDATE `khusinhnhat` SET `khu`='".$randkhu."', `captcha`= '".$randct."' WHERE `user_id`= '".$user_id."'");

  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '164'");

	}
	}
echo'<div class="omenu"><center> Capcha của hộp quà này là <font color="red">'.$p['captcha'].'</font><br>
<form method="post"><center>
<input type="number" name="captcha" placeholder="Captcha">
<br><input type="submit" name="nhan" value="Nhập"></center>
</form></center></div>';



}
break;



case'khu':
$vp=intval($_GET['id']);
if ($vp>30){
	Header('Location: /');
exit;
} 
$p=mysql_fetch_array(mysql_query("SELECT * FROM `khusinhnhat` WHERE `user_id`= '".$user_id."'"));

$n=mysql_num_rows(mysql_query("SELECT * FROM `khusinhnhat` WHERE `user_id`= '".$user_id."'"));

mysql_query("UPDATE `users` SET `vitri` = '172021' +'".$vp."' WHERE `id` = '".$user_id."'");

echo'<div class="phdr">Sự Kiện Sinh Nhật > Khu Tìm NPC > Khu '.$vp.'</div>';
echo'<div class="bautroi"></div>';
echo'<div class="buicay"></div>';
echo'<div class="co"><center><img src="https://i.imgur.com/MbSrxBQ.png"></br>';


if ($p['khu'] == $vp) {
echo'<img src="https://i.imgur.com/Wt5X3sX.gif"></br>';


echo'<a href="?act=nhanqua&id='.$vp.'"><img src="/images/qua.png"></a>';

}
echo'</center></div>';
echo'<div class="co"></div><div class="nen" style="min-height: 55px;margin:0"><center><img src="img/bong4.png"><img src="img/ghe.png">&ensp;&ensp;&ensp;<img src="img/ghe.png"><img src="img/bong4.png"></center>
</div><div class="nen" style="min-height: 55px;margin:0"><a href="khutimnpc.php"><img src="/app/images/k'.$vp.'.png"></a>';

/*
echo'<div class="nenkhaithac" style="height:125px; margin:0;"><marquee behavior="scroll" direction="left" scrollamount="1" style="margin-top: 5px"><img src="/icon/iconxoan/dammaynho.png"></marquee><marquee behavior="scroll" direction="left" scrollamount="2" style="margin-top: 10px"><img src="/icon/iconxoan/dammaylon.png"></marquee></div><div class="nen" style="height:155px; margin:0;"><center><img src="/icon/hp.png"> 
<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><b>'.$datauser['suckhoe'].'</font></b></br>';
if ($p['boss'] == 0) {
echo'<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><b>Tiếc quá Nezuko không có ở đây</font></b>';
}


if ($p['boss'] == 1) {
echo'<input type="submit" name="hoiphuc" id ="hoiphuc" value="Hồi phục bằng 50.000 xu" /></br>';

echo'<img src="images/nezuko.gif" height="45"></br>';
	echo'<center><span id="load">

<center></center> </span><form method="post"><input type="submit" name="danh" id ="danh" value="Đánh" />
</form>';
}
*/
//-- Online Topic ---//
$online_u = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `lastdate` > " . (time() - 300) . " AND `vitri` = '172021'+'".$vp."'"), 0);
$totalonline = $online_u;
$q = @mysql_query("select * from `users` where `lastdate` > " . (time() - 300) . " AND `vitri` = '172021'+'".$vp."';");
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

break;
default:
echo'<div class="phdr">Sự kiện sinh nhật &gt; Khu tìm NPC &gt; <a href="/"> Thoát </a></div>';
$e=mysql_query("SELECT * FROM `sokhusinhnhat` ORDER BY `id`");

while($s=mysql_fetch_array($e)) {
	echo'<div class="omenu"><a href="khutimnpc.php?act=khu&id='.$s['id'].'"><img src="/images/vao.png"> Khu '.$s['id'].'</a></div>';
	
}
}

require('../../incfiles/end.php');

?>
<script type="text/JavaScript">
var message="NoRightClicking"; function defeatIE() {if (document.all) {(message);return false;}} function defeatNS(e) {if (document.layers||(document.getElementById&&!document.all)) { if (e.which==2||e.which==3) {(message);return false;}}} if (document.layers) {document.captureEvents(Event.MOUSEDOWN);document.onmousedown=defeatNS;} else{document.onmouseup=defeatNS;document.oncontextmenu=defeatIE;} document.oncontextmenu=new Function("return false")
</script>
<script type='text/javascript'>
//<![CDATA[
//Ctrl+U
shortcut={all_shortcuts:{},add:function(a,b,c){var d={type:"keydown",propagate:!1,disable_in_input:!1,target:document,keycode:!1};if(c)for(var e in d)"undefined"==typeof c[e]&&(c[e]=d[e]);else c=d;d=c.target,"string"==typeof c.target&&(d=document.getElementById(c.target)),a=a.toLowerCase(),e=function(d){d=d||window.event;if(c.disable_in_input){var e;d.target?e=d.target:d.srcElement&&(e=d.srcElement),3==e.nodeType&&(e=e.parentNode);if("INPUT"==e.tagName||"TEXTAREA"==e.tagName)return}d.keyCode?code=d.keyCode:d.which&&(code=d.which),e=String.fromCharCode(code).toLowerCase(),188==code&&(e=","),190==code&&(e=".");var f=a.split("+"),g=0,h={"`":"~",1:"!",2:"@",3:"#",4:"$",5:"%",6:"^",7:"&",8:"*",9:"(",0:")","-":"_","=":"+",";":":","'":'"',",":"<",".":">","/":"?","\\":"|"},i={esc:27,escape:27,tab:9,space:32,"return":13,enter:13,backspace:8,scrolllock:145,scroll_lock:145,scroll:145,capslock:20,caps_lock:20,caps:20,numlock:144,num_lock:144,num:144,pause:19,"break":19,insert:45,home:36,"delete":46,end:35,pageup:33,page_up:33,pu:33,pagedown:34,page_down:34,pd:34,left:37,up:38,right:39,down:40,f1:112,f2:113,f3:114,f4:115,f5:116,f6:117,f7:118,f8:119,f9:120,f10:121,f11:122,f12:123},j=!1,l=!1,m=!1,n=!1,o=!1,p=!1,q=!1,r=!1;d.ctrlKey&&(n=!0),d.shiftKey&&(l=!0),d.altKey&&(p=!0),d.metaKey&&(r=!0);for(var s=0;k=f[s],s<f.length;s++)"ctrl"==k||"control"==k?(g++,m=!0):"shift"==k?(g++,j=!0):"alt"==k?(g++,o=!0):"meta"==k?(g++,q=!0):1<k.length?i[k]==code&&g++:c.keycode?c.keycode==code&&g++:e==k?g++:h[e]&&d.shiftKey&&(e=h[e],e==k&&g++);if(g==f.length&&n==m&&l==j&&p==o&&r==q&&(b(d),!c.propagate))return d.cancelBubble=!0,d.returnValue=!1,d.stopPropagation&&(d.stopPropagation(),d.preventDefault()),!1},this.all_shortcuts[a]={callback:e,target:d,event:c.type},d.addEventListener?d.addEventListener(c.type,e,!1):d.attachEvent?d.attachEvent("on"+c.type,e):d["on"+c.type]=e},remove:function(a){var a=a.toLowerCase(),b=this.all_shortcuts[a];delete this.all_shortcuts[a];if(b){var a=b.event,c=b.target,b=b.callback;c.detachEvent?c.detachEvent("on"+a,b):c.removeEventListener?c.removeEventListener(a,b,!1):c["on"+a]=!1}}},shortcut.add("Ctrl+U",function(){top.location.href="/"});
//]]>
</script>