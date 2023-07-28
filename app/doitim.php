<?php
define('_IN_JOHNCMS', 1);
$textl = 'Đổi Tim';
$headmod = 'id_user';
require_once ("../incfiles/core.php");
require_once ("../incfiles/head.php");

$pin = rand(100000000,999999999);
echo'<div class="nenvip"> Đổi tim</div>';

if (!$user_id) {
echo '<div class="omenu"><p><b>Lỗi!</b><br>Trang chỉ dành cho thành viên!</p></div>';
require_once ("../incfiles/end.php");
exit;
}
if ($datauser['kichhoat']==0) {
echo '<div class="omenu"><p><b>Lỗi!</b><br>Trang chỉ dành cho thành viên đã kích hoạt!</p></div>';
require_once ("../incfiles/end.php");
exit;
}

switch($act) {
default:
echo'<div class="omenu"><form method="post"> <center>Bạn đang có '.number_format($datauser['tim1st']).' Tim <img src="https://i.imgur.com/ZL9ehAx.gif"></div> ';
echo'<div class="omenu"><img src="/icon/vao.png"> <a href="?act=doithe"> Đổi tim lấy thẻ 1STPay</a></div>';
echo'<div class="omenu"><img src="/icon/vao.png"> <a href="?act=huongdan"> Cách kiếm tim</a></div>';


break;
case 'doithe':

if (isset($_POST['submit'])) {
if ($datauser['tim1st']<10000){
	echo'<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn không đủ 10000 Tim <img src="https://i.imgur.com/ZL9ehAx.gif"></div>';
} else {
		echo'<div class="omenu">Đổi thành công thẻ 1STPay 10.000VNĐ  </div>';
						mysql_query("UPDATE `users` SET `tim1st` = `tim1st`- '10000' WHERE `id` = '".$user_id."'");
$text = '<center><img src="http://i.imgur.com/UUNSdhi.png"><br><font color="green">Thẻ 1STPay 10.000VNĐ</font></br><font color="red">Pin: '.$pin.' </br> </font></center>';

mysql_query("INSERT INTO `1STPay` SET
`pin`='".$pin."',
`user_tao`='".$user_id."',
	`timetao`= '" . time() . "',
	`menhgia`='10000'");
mysql_query("INSERT INTO `thongbao` SET
                `id` = '".$user_id."',
                `user` = '".$user_id."',
                `text` = '$text',
                `ok` = '1',
                `time` = '" . time() . "'
            ");

}
}
echo'<div class="omenu"><form method="post"> <center>Bạn đang có '.number_format($datauser['tim1st']).' Tim <img src="https://i.imgur.com/ZL9ehAx.gif"> </br>Bạn có muốn đổi 10000 Tim <img src="https://i.imgur.com/ZL9ehAx.gif"> lấy thẻ 1STPay 10.000VNĐ? </br><input type="submit" name="submit" value="Đổi"></center></form></div>';



break;
case 'huongdan':
?>

<script type='text/javascript' charset='UTF-8' src='http://muabannick.vn/wapvip.js'></script><link rel="stylesheet" href="http://muabannick.vn/js/bootstrap.min.css">
<script src="http://muabannick.vn/js/jquery.min.js"></script>
<script src="http://muabannick.vn/js/bootstrap.min.js"></script>

<?php
echo'


<table
border="1" align=center style="width:100%;"><tr><th
bgcolor="#FFCC33"><center>Tim</center></th><th
bgcolor="#FFCC33"><center>Thông tin</center></th></tr>
<tr><td><center>100 <img src="https://i.imgur.com/ZL9ehAx.gif"></center></td><td><center>Lên level</center></td>
<tr><td><center>200 <img src="https://i.imgur.com/ZL9ehAx.gif"></center></td><td><center>Đăng bài trên diễn đàn</center></td>
<tr><td><center>10 <img src="https://i.imgur.com/ZL9ehAx.gif"></center></td><td><center>Bình luận trên diễn đàn</center></td>
<tr><td><center>10 <img src="https://i.imgur.com/ZL9ehAx.gif"></center></td><td><center>Câu cá</center></td>
</tr></table><br>
';

break;
}

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

<?php

require_once ("../incfiles/end.php");
