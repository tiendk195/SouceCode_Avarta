<?php
define('_IN_JOHNCMS', 1);
$textl = 'Sự Kiện 1/6';
$headmod = 'id_user';
$rootpath='../../';
require_once ("../../incfiles/core.php");
require_once ("../../incfiles/head.php");
echo'<div class="phdr">Sự Kiện Mùa Hè 2020</div>';
mysql_query("UPDATE `users` SET `vitri` = '162020' WHERE `id` = '".$user_id."'");

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
echo'<div class="cola" style="min-height: 100px;margin:0"><div class="buico"></div><div class="cola" style="min-height: 100px;margin:0">
<div class="lucifer"><center><br>
<img src="/logo.png"><br><font color="red"><b>Mùa Hè 2020 Mát Lạnh cùng Lethinh2003.xyz!</b></font></center></div><div class="lucifer"><center><a href="map.php"><img src="images/npclua.gif"><br><font color="red"><b>Boss Nóng Nực</b></font></a></center></div><table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed;word-wrap: break-word;"><tbody><tr><td width="60px;" class="blog-avatar"><label style="display: inline-block;text-align: center;"><br>
<img src="images/npctinhyeu.gif"></label></td><td style="vertical-align: bottom;"><table cellpadding="0" cellspacing="0"><tbody><tr><td class="current-blog" rowspan="2" style=""><div class="blog-bg-left"><img src="/giaodien/images/left-blog.png"></div><img src="/images/on.png" alt="online"><font color="red"><b>NPC.Mùa Hè </b></font><span style="font-size:11px;color:#777;"></span><span style="float:right;"></span><div class="text"><div class="omenu"><b><a href="?act=doikem"><font color="blue">⇨ Đổi Kem Giải Nhiệt Lấy Điểm Sự Kiện</font></a></b></div>


<div class="omenu"><b><a href="hopqua.php"><font color="red">⇨ Hộp Quà Kì Bí </font></a></b></div>


<div class="omenu"><b><a href="shop.php"><font color="blue">⇨ Đổi Item Sự Kiện</font></a> </b></div>
<div class="omenu"><b><a href="doivatpham.php"><font color="blue">⇨ Đổi Vật Phẩm Sự Kiện</font></a> </b></div>


<div class="omenu"><b><a href="phaohoa.php"><font color="red">⇨ Bắn pháo hoa </font></a> </b></div>



<div class="omenu"><b><a href="bxh.php"><font color="blue">⇨ Bảng Xếp Hạng</font></a></b></div>
<div class="omenu"><a href="http://lethinh2003.xyz/forum/180.html"><font color="red"><b>⇨ Hướng Dẫn Sự Kiện </b></font></a></div>
</div></td></tr></tbody></table></td></tr></tbody></table></div></div>';

echo'<div class="dat" style="min-height: 100px;margin:0"><center>';
//-- Online Topic ---//
$online_u = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `lastdate` > " . (time() - 300) . " AND `vitri` = '162020'"), 0);
$totalonline = $online_u;
$q = @mysql_query("select * from `users` where `lastdate` > " . (time() - 300) . " AND `vitri` = '162020';");
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
echo'<div class="buico"></div></div>';
break;
case 'doidns':
//$dns=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='121'"));
if (isset($_POST[doi])) {
$dns=(int)$_POST[dns];
$dns2 = $dns*100;
if (empty($dns)) {
	echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn chưa nhập số đá ngũ sắc muốn đổi!</div>';
} else 
	if ($dns<0) {
	echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn chưa nhập số đá ngũ sắc muốn đổi!</div>';
} else 

if ($datauser['diemsk16']< $dns2) {
echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn không đủ điểm sự kiện để đổi!</div>';

} else {
	echo '<div class="omenu">Đổi thành công '.number_format($dns).' đá ngũ sắc - bạn bị - '.number_format($dns2).' điểm sự kiện</div>';
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$dns."' WHERE `user_id`='".$user_id."' AND `id_shop`='123'");
mysql_query("UPDATE `users` SET `diemsk16` = `diemsk16` - '".$dns2."' WHERE `id`= '".$user_id."'");

}
}
echo'<center><div class="omenu">Đổi 100 điểm sự kiện lấy <img src="/images/vatpham/123.png"> 1 Đá ngũ sắc</div>';

		echo '<form method="post">';

echo'<div class="omenu">Nhập số đá muốn đổi</br>';
echo'<input type="number" name="dns"><br/>
<input type="submit" name="doi" value="Đổi" class="nut"></form></div></center>';
break;
case 'doimanhghep':
//$dns=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='121'"));
if (isset($_POST[doi])) {
$mg=(int)$_POST[mg];
$mg2 = $mg*100;
if (empty($mg)) {
	echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn chưa nhập số hộp quà mảnh ghép muốn đổi!</div>';
} else 
	if ($mg<0) {
	echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn chưa nhập số hộp quà mảnh ghép muốn đổi!</div>';
} else 

if ($datauser['diemsk16']< $mg2) {
echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn không đủ điểm sự kiện để đổi!</div>';

} else {
	echo '<div class="omenu">Đổi thành công '.number_format($mg).' hộp quà mảnh ghép - bạn bị - '.number_format($mg2).' điểm sự kiện</div>';
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$mg."' WHERE `user_id`='".$user_id."' AND `id_shop`='97'");
mysql_query("UPDATE `users` SET `diemsk16` = `diemsk16` - '".$mg2."' WHERE `id`= '".$user_id."'");

}
}
echo'<center><div class="omenu">Đổi 100 điểm sự kiện lấy <img src="/images/vatpham/97.png"> 1 hộp quà mảnh ghép</div>';

		echo '<form method="post">';

echo'<div class="omenu">Nhập số hộp quà muốn đổi</br>';
echo'<input type="number" name="mg"><br/>
<input type="submit" name="doi" value="Đổi" class="nut"></form></div></center>';
break;
case 'doithedoiten':
//$dns=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='121'"));
if (isset($_POST[doi])) {
$mg=(int)$_POST[mg];
$mg2 = $mg*1000;
if (empty($mg)) {
	echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn chưa nhập số thẻ đổi tên muốn đổi!</div>';
} else 
	if ($mg<0) {
	echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn chưa nhập số thẻ đổi tên muốn đổi!</div>';
} else 

if ($datauser['diemsk16']< $mg2) {
echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn không đủ điểm sự kiện để đổi!</div>';

} else {
	echo '<div class="omenu">Đổi thành công '.number_format($mg).' thẻ đổi tên - bạn bị - '.number_format($mg2).' điểm sự kiện</div>';
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$mg."' WHERE `user_id`='".$user_id."' AND `id_shop`='121'");
mysql_query("UPDATE `users` SET `diemsk16` = `diemsk16` - '".$mg2."' WHERE `id`= '".$user_id."'");

}
}
echo'<center><div class="omenu">Đổi 1000 điểm sự kiện lấy <img src="/images/vatpham/121.png"> 1 thẻ đổi tên</div>';

		echo '<form method="post">';

echo'<div class="omenu">Nhập số thẻ đổi tên muốn đổi</br>';
echo'<input type="number" name="mg"><br/>
<input type="submit" name="doi" value="Đổi" class="nut"></form></div></center>';
break;
case 'doikem':
$kem=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='104'"));
if (isset($_POST[doi])) {
$mg=(int)$_POST[mg];
if (empty($mg)) {
	echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn chưa nhập số điểm muốn đổi!</div>';
} else 
	if ($mg<0) {
	echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn chưa nhập số điểm muốn đổi!</div>';
} else 

if ($kem['soluong']< $mg) {
echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn không đủ kem để đổi!</div>';

} else {
	echo '<div class="omenu">Đổi thành công '.number_format($mg).' điểm sự kiện - bạn bị - '.number_format($mg).' kem giải nhiệt</div>';
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$mg."' WHERE `user_id`='".$user_id."' AND `id_shop`='104'");
mysql_query("UPDATE `users` SET `diemsk16` = `diemsk16` + '".$mg."' WHERE `id`= '".$user_id."'");

}
}
echo'<center><div class="omenu">Đổi 1 <img src="/images/vatpham/104.png"> kem giải nhiệt lấy 1 điểm sự kiện</div>';

		echo '<form method="post">';

echo'<div class="omenu">Nhập số điểm muốn đổi</br>';
echo'<input type="number" name="mg"><br/>
<input type="submit" name="doi" value="Đổi" class="nut"></form></div></center>';
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