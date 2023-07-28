<?php
define('_IN_JOHNCMS', 1);
$textl = 'Sự Kiện 1/6';
$headmod = 'id_user';
$rootpath='../../';
require_once ("../../incfiles/core.php");
require_once ("../../incfiles/head.php");
?>
<script type="text/javascript">
$(document).ready(function(){
	$('#moruong').click(function(){
		var url = "hopqua-load.php";
		var data = {"moruong": ""};
		$('#load').load(url, data);
		return false;
	});
});
</script>
<?php
echo'<div class="phdr"><a href="index.php">Sự kiện</a> | <b><a href="index.php">Quay lại</a></b></div>';


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
require_once ("../../incfiles/end.php");
exit;
}
switch($act) {
default:
echo'<div class="omenu"><center><b><img src="images/npctinhyeu.gif"></b><br>Kiếm xu và Item cực HOT từ hộp quà kì bí! ^^!<br><font color="blue">Bạn đang có :<br> </font><font color="green">'.$datauser['hopquakibi'].' Hộp Quà <img src="images/hopquakibi.png"><br>

</font></center></div>';
echo'<div class="omenu"><center><b><a href="?act=lamhopqua"><font color="red">Làm Hộp Quà Kì Bí</font></a></b></center></div>';
echo'<div class="omenu"><center><b><a href="moqua.php"><font color="red">Mở Hộp Quà Ngay</font></a></b></center></div>';
break;
case 'lamhopqua':
$da1=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='99'"));
$da2=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='100'"));
$da3=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='101'"));
$da4=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='102'"));
$da5=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='103'"));

if (isset($_POST[doi])) {

	if ($da1['soluong']<=0||$da2['soluong']<=0||$da3['soluong']<=0||$da4['soluong']<=0||$da5['soluong']<=0) {
	echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn không đủ nguyên liệu!</div>';
} else  {
	echo '<div class="omenu">Hợp thành thành công 1 hộp quà kì bí</div>';
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop`='99'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop`='100'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop`='101'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop`='102'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop`='103'");

mysql_query("UPDATE `users` SET `hopquakibi` = `hopquakibi` + '1' WHERE `id`= '".$user_id."'");

}
}
echo'<center><form method="post"><div class="omenu"><img src="images/hopquakibi.png"><br> Khi có đủ 5 loại đá,bạn có thể làm hộp quà kì bí tại đây! <br> <input type="submit" name="doi" value="Làm Ngay"></div></form></center>';
break;
case 'mohopqualvt':


$randxu=rand(100000,1000000);
$rand=rand(1,10);

if (isset($_POST[doi])) {


echo'<span id="load">';
if ($datauser['hopquakibi']<=0) {
echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn không đủ hộp quà để mở!</div>';

} else {
	if ($rand>=5){
echo'<div class="omenu"><div class="lt">Bạn nhận được '.number_format($randxu).' xu</div></div>';
mysql_query("UPDATE `users` SET `xu` = `xu` + '".$randxu."' WHERE `id`= '".$user_id."'");
	}
		if ($rand<5){
			echo'<div class="omenu"><div class="lt">Chúc bạn may mắn lần sau!</div></div>';
		}
	

mysql_query("UPDATE `users` SET `hopquakibi` = `hopquakibi` - '1' WHERE `id`= '".$user_id."'");

}
}
echo'</span>';

echo'<center><form method="post"><div class="omenu"><img src="images/hopquakibi.png"><br> Nhanh Tay Mở Hộp Quà Kì Bí Để Nhận Quà Ngay Nào! Bạn sẽ nhận được xu và những ITEM chưa từng xuất hiện từ trước ngay nào!<br> <input type="submit" name="moruong" id="moruong" value="Mở Ngay"></div></form></center>';
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
require('../../incfiles/end.php');