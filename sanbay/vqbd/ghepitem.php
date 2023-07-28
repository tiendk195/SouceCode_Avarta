<?php
define('_IN_JOHNCMS', 1);
$textl = 'Đổi quà đặc biệt';
$headmod = 'id_user';
$rootpath='../../';
require_once ("../../incfiles/core.php");
require_once ("../../incfiles/head.php");

if (!$user_id) {
    require('../incfiles/head.php');
echo functions::display_error($lng['access_guest_forbidden']);
require_once ("../../incfiles/end.php");
exit;
}
echo'<div class="phdr"><center>Đổi quà đặc biệt</center></div>';
if ($datauser['kichhoat'] ==0 ){ 
echo'<div class="omenu">Vui lòng kích hoạt để sử dụng chức năng</div>';
require_once ("../../incfiles/end.php");
exit;
}

$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='3016'"));
$shopvp=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE `id`='".$item['id_shop']."'"));

$canvp=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='3017'"));
$canvp1=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='3018'"));
$canvp2=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='3019'"));
$canvp3=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='3020'"));
$canvp4=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='3021'"));

$ruong=mysql_fetch_array(mysql_query("SELECT * FROM `khodo` WHERE `loai`='".$canvp['loai']."' AND `user_id`='".$user_id."' AND `id_loai`='".$canvp['id_loai']."' AND `timesudung` = '0'"));
$ruong1=mysql_fetch_array(mysql_query("SELECT * FROM `khodo` WHERE `loai`='".$canvp1['loai']."' AND `user_id`='".$user_id."' AND `id_loai`='".$canvp1['id_loai']."' AND `timesudung` = '0'"));
$ruong2=mysql_fetch_array(mysql_query("SELECT * FROM `khodo` WHERE `loai`='".$canvp2['loai']."' AND `user_id`='".$user_id."' AND `id_loai`='".$canvp2['id_loai']."' AND `timesudung` = '0'"));
$ruong3=mysql_fetch_array(mysql_query("SELECT * FROM `khodo` WHERE `loai`='".$canvp3['loai']."' AND `user_id`='".$user_id."' AND `id_loai`='".$canvp3['id_loai']."' AND `timesudung` = '0'"));
$ruong4=mysql_fetch_array(mysql_query("SELECT * FROM `khodo` WHERE `loai`='".$canvp4['loai']."' AND `user_id`='".$user_id."' AND `id_loai`='".$canvp4['id_loai']."' AND `timesudung` = '0'"));

$ktruong=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `loai`='".$canvp['loai']."' AND `id_loai`='".$canvp['id_loai']."' AND `user_id`='".$user_id."' AND `timesudung` = '0'"));
$ktruong1=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `loai`='".$canvp1['loai']."' AND `id_loai`='".$canvp1['id_loai']."' AND `user_id`='".$user_id."' AND `timesudung` = '0'"));
$ktruong2=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `loai`='".$canvp2['loai']."' AND `id_loai`='".$canvp2['id_loai']."' AND `user_id`='".$user_id."' AND `timesudung` = '0'"));
$ktruong3=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `loai`='".$canvp3['loai']."' AND `id_loai`='".$canvp3['id_loai']."' AND `user_id`='".$user_id."' AND `timesudung` = '0'"));
$ktruong4=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `loai`='".$canvp4['loai']."' AND `id_loai`='".$canvp4['id_loai']."' AND `user_id`='".$user_id."' AND `timesudung` = '0'"));




if (isset($_POST['ok'])) {
	$tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."'");
$checktongruong=mysql_num_rows($tongruong);
	if ($checktongruong>=$datauser['tongruong']) {
    echo'<div class="omenu">Giao dịch không thành công, rương của bạn đã đầy !!</div>';
} else     			$query=mysql_query("SELECT * FROM `khodo` WHERE `id_shop`='3016' AND `user_id`='".$user_id."'");
$checkdo=mysql_num_rows($query);
if ($checkdo>=1) {
    echo'<div class="omenu">Giao dịch không thành công, Bạn đã sở hữu  <b>'.$shop['tenvatpham'].'</b> !!</div>';
} else 
	if ( $datauser['luongkhoa']<500|| $ktruong<1 || $ktruong1<1 || $ktruong2<1 || $ktruong3<1  ) {
			echo '<div class="omenu">Chưa đủ điều kiện để ghép . </div>';
		} else {
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$shop['loai']."',
`id_loai`='".$shop['id_loai']."',
`timesudung`='".$ruong['timesudung']."',
`tenvatpham`='".$shop['tenvatpham']."',
`id_shop`='".$shop['id']."'
");
mysql_query("UPDATE `users` SET `luongkhoa`=`luongkhoa`-'500' WHERE `id`='".$user_id."'");

mysql_query("DELETE FROM `khodo` WHERE `id`='".$ruong['id']."' LIMIT 1");
mysql_query("DELETE FROM `khodo` WHERE `id`='".$ruong1['id']."' LIMIT 1");
mysql_query("DELETE FROM `khodo` WHERE `id`='".$ruong2['id']."' LIMIT 1");
mysql_query("DELETE FROM `khodo` WHERE `id`='".$ruong3['id']."' LIMIT 1");
mysql_query("DELETE FROM `khodo` WHERE `id`='".$ruong4['id']."' LIMIT 1");

$bot='[b][red]Xin chúc mừng [blue]'.$login.'[/blue] vừa ghép thành công [blue]'.$shop['tenvatpham'].' ! [/blue][/red][/b]';


mysql_query("INSERT INTO `guest` SET `user_id`='256', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
echo '<div class="omenu">Ghép thành công: <font color="red"><b>'.$shop['tenvatpham'].'</b></font></div>';
		}

}	
echo'<form method="post">';
echo'<div class="omenu"><center><img src="/images/shop/'.$shop['id'].'.png">
<br>Bạn có muốn ghép <font color="green">'.$shop['tenvatpham'].'</font> bằng <font color="red">Lục tỏa sáng </font> ('.($ktruong4>0?'<font color="green"> Đã có </font>':'<font color="red"> Chưa có </font>').') + <font color="red">Đỏ tỏa sáng </font> '.($ktruong3>0?'<font color="green"> Đã có </font>':'<font color="red"> Chưa có </font>').') + <font color="red">Xanh tỏa sáng</font> ('.($ktruong2>0?'<font color="green"> Đã có </font>':'<font color="red"> Chưa có </font>').') + <font color="red">Vàng tỏa sáng</font> ('.($ktruong1>0?'<font color="green"> Đã có </font>':'<font color="red"> Chưa có </font>').') + <font color="red">Tím tỏa sáng</font> ('.($ktruong>0?'<font color="green"> Đã có </font>':'<font color="red"> Chưa có </font>').') + 500 Lượng khóa không ?
<br>
	<input class="submit" type="submit" name="ok" value="Ghép"> </center>
</div>';

echo'</form>';





require_once ("../../incfiles/end.php");
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