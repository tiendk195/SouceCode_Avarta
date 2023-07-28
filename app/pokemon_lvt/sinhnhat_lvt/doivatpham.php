<?php
define('_IN_JOHNCMS', 1);
$textl = 'Sự Kiện Sinh Nhật';
$headmod = 'id_user';
$rootpath='../../';
require_once ("../../incfiles/core.php");
require_once ("../../incfiles/head.php");
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

	$time = time();

Echo'<div class="phdr">Đổi quà sinh nhật</div>';
echo'<div class="omenu"><font color="red"><b>Bạn đang có '.number_format($datauser['diemsinhnhat']).' điểm sự kiện</b></font></div>';
?>
<!--Edit by Lethinh-->
<?php
IF($datauser['rights'] >=9){

echo'<div class="omenu"><b><font color="red"><a href="?act=add">Thêm Đồ</b></a></font></div>';
}
IF($datauser['kichhoat'] == 0){
Echo'<div class="omenu"><center><b><font color="red">Vui lòng kích hoạt tài khoản</font></b></center></div>';
}Else IF($datauser['diemsinhnhat'] < 200){
Echo'<div class="omenu"><center><b><font color="red">Bạn cần ít nhất 200 điểm sự kiện để vào đây</font></b></center></div>';
}Else{
switch($act){
case'mua':
$vp=intval($_GET['id']);
$p=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham16` WHERE `id`='".$vp."'"));
$r=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE `id`='".$p['vatpham']."'"));
IF($r['timesudung']){
$r['timesudung'] = $r['timesudung'] + time();
}
$n=mysql_num_rows(mysql_query("SELECT * FROM `shopvatpham16` WHERE `id`='".$vp."'"));
IF($n<1){
Header('Location: /');
Exit;
} 
IF(Isset($_POST['mua'])){

IF($datauser['diemsinhnhat'] >= $p['gia']){
mysql_query("UPDATE `users` SET `diemsinhnhat`=`diemsinhnhat`-'".$p['gia']."' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop`='".$r['id']."'");

Echo'<div class="omenu"><center><b><font color="red">Bạn đã đổi thành công '.$r['tenvatpham'].'</font></b></center></div>';
require('../../incfiles/end.php');Exit;
}Else{
Echo'<div class="omenu"><center><b><font color="red">Giao dịch thất bại !!<br>Bạn không đủ '.$p['gia'].' điểm sự kiện</font></b></center></div>';
}


require('../../incfiles/end.php');Exit;
}
Echo'<div class="omenu"><center><b><font color="red"><img src="/images/vatpham/'.$r['id'].'.png"><br>Bạn có chắc chắn đổi '.$r['tenvatpham'].' với '.number_format($p['gia']).' Điểm sự kiện không??</font></b><form method="post"><input type="submit" name="mua" value="Đổi"></center></div>';
break;
default:
echo'<div class="lt" style="text-align:center;"><select name="doiqua" input type="submit" onchange="location = this.options[this.selectedIndex].value;">
    Đổi quà: <br>
<option value="doivatpham.php"/>Đổi vật phẩm</option>
<option value="doiqua.php"/>Đổi quà</option>
</select>
</div>';

$e=mysql_query("SELECT * FROM
`shopvatpham16` WHERE `id`!=0 ORDER BY `id` DESC LIMIT $start, $kmess");
while($s=mysql_fetch_array($e)){
$res=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE `id`='".$s['vatpham']."'"));
$res2=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham16` WHERE `id`='".$s['id']."'"));
echo'<table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info">
<tbody><tr>
<td class="left-info"> <img src="/images/vatpham/'.$res['id'].'.png"></div>
</td>
<td class="right-info">
<font color="green">'.$res['tenvatpham'].'</font><br>
Cần: <font color="red">'.number_format($res2['gia']).'</font> điểm sự kiện<br>
<a href="?act=mua&id='.$s['id'].'"><input type="submit" name="submit" value="Đổi"></a>';
if ($datauser['rights'] >=9) {
	echo' <a href="?act=edit&id='.$s['id'].'"><input type="submit" name="submit" value="Sửa"></a>'; 
	echo' <a href="?act=del&id='.$s['id'].'"><input type="submit" name="submit" value="Xóa"></a>'; 
}
echo'</td>
</tr></tbody></table>';


}
$total=mysql_result(mysql_query("SELECT COUNT(*) FROM `shopvatpham16` WHERE `id`!=0"), 0);
IF($total > $kmess){
Echo'<div class="phdr">'.functions::pages('?page=', $start, $total, $kmess).'</div>';
}
break;
case'edit':
$vp=intval($_GET['id']);
$p=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham16` WHERE `id`='".$vp."'"));
$r=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE `id`='".$p['vatpham']."'"));
IF($r['timesudung']){
$r['timesudung'] = $r['timesudung'] + time();
}
$n=mysql_num_rows(mysql_query("SELECT * FROM `shopvatpham16` WHERE `id`='".$vp."'"));
IF($n<1){
Header('Location: /');
Exit;
} 
IF(Isset($_POST['edit'])){
	$gia=trim($_POST['gia']);

IF($datauser['rights'] >= 9){
mysql_query("UPDATE `shopvatpham16` SET `gia`= '".$gia."' WHERE `id`='".$vp."'");
Echo'<div class="omenu"><center><b><font color="red">Bạn đã sửa thành công giá '.$gia.'</font></b></center></div>';
require('../../incfiles/end.php');Exit;
}Else{
Echo'<div class="omenu"><center><b><font color="red">Giao dịch thất bại !!<br>Bạn không có quyền này</font></b></center></div>';
}


require('../../incfiles/end.php');Exit;
}
echo'<div class="omenu"><img src="/images/vatpham/'.$r['id'].'.png">'.$r['tenvatpham'].'</div>';
echo '<form method="post">
<table><tr><input type="number" name="gia" placeholder="Nhập giá muốn đổi..."> </tr><tr><input type="submit" value="Đổi" name="edit" class="nut"></tr></table>
</form>';
/*
break;
case'add':
IF($datauser['rights'] < 9){
Header('Location: /');
}
 
IF(Isset($_POST['add'])){
	$gia=trim($_POST['gia']);
	$idshop=trim($_POST['idshop']);

	if (empty($gia)) {
Echo'<div class="omenu"><center><b><font color="red">Thêm thất bại !!</font></b></center></div>';
	} else 	if (empty($idshop)) {
Echo'<div class="omenu"><center><b><font color="red">Thêm thất bại !!</font></b></center></div>';
	} else {
mysql_query("INSERT `shopvatpham16` SET `gia`= '".$gia."',`vatpham`= '".$idshop."' ");
Echo'<div class="omenu"><center><b><font color="red">Bạn đã thêm thành công</font></b></center></div>';
require('../../incfiles/end.php');Exit;
}




echo'<div class="omenu"><font color="red"><b>Lưu ý: Xem ID shop ở <a href="/quanli/iteman.php">đây</a></br>
Giá cả hợp lý, item phù hợp!</font></b></div>';
echo '<form method="post">
<table><tr><input type="number" name="idshop" placeholder="Nhập ID Shop..."> </tr></br>
<input type="number" name="gia" placeholder="Nhập giá..."> </tr></br><tr><input type="submit" value="Thêm" name="add" class="nut"></tr></table>
</form>';
*/
break;

case'add':
IF($datauser['rights'] < 9){
Header('Location: /');
}
 
IF(Isset($_POST['add'])){
	$gia=trim($_POST['gia']);
	$idshop=trim($_POST['idshop']);

	if (empty($gia)) {
Echo'<div class="omenu"><center><b><font color="red">Thêm thất bại !!</font></b></center></div>';
	} else 	if (empty($idshop)) {
Echo'<div class="omenu"><center><b><font color="red">Thêm thất bại !!</font></b></center></div>';
	} else {
mysql_query("INSERT `shopvatpham16` SET `gia`= '".$gia."',`vatpham`= '".$idshop."' ");
Echo'<div class="omenu"><center><b><font color="red">Bạn đã thêm thành công</font></b></center></div>';
require('../../incfiles/end.php');Exit;
}
}



echo'<div class="omenu"><font color="red"><b>Lưu ý: Xem ID shop ở <a href="/quanli/iteman.php">đây</a></br>
Giá cả hợp lý, item phù hợp!</font></b></div>';
echo '<form method="post">
<table><tr><input type="number" name="idshop" placeholder="Nhập ID Shop..."> </tr></br>
<input type="number" name="gia" placeholder="Nhập giá..."> </tr></br><tr><input type="submit" value="Thêm" name="add" class="nut"></tr></table>
</form>';

break;
case'del':
$vp=intval($_GET['id']);
$p=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham16` WHERE `id`='".$vp."'"));
$r=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE `id`='".$p['vatpham']."'"));
IF($r['timesudung']){
$r['timesudung'] = $r['timesudung'] + time();
}
$n=mysql_num_rows(mysql_query("SELECT * FROM `shopvatpham16` WHERE `id`='".$vp."'"));
IF($n<1){
Header('Location: /');
Exit;
} 
IF(Isset($_POST['del'])){

IF($datauser['rights'] >= 9){
	mysql_query("DELETE FROM `shopvatpham16` WHERE `id`='".$vp."'");

Echo'<div class="omenu"><center><b><font color="red">Bạn đã xóa thành công </font></b></center></div>';
require('../../incfiles/end.php');Exit;
}Else{
Echo'<div class="omenu"><center><b><font color="red">Giao dịch thất bại !!<br>Bạn không có quyền này</font></b></center></div>';
}


require('../../incfiles/end.php');Exit;
}
Echo'<div class="omenu"><center><b><font color="red"><img src="/images/vatpham/'.$r['id'].'.png"><br>Bạn có chắc chắn xóa '.$r['tenvatpham'].' không??</font></b><form method="post"><input type="submit" name="del" value="Xóa"></center></div>';


}
}
require('../../incfiles/end.php');?>
<script type="text/JavaScript">
var message="NoRightClicking"; function defeatIE() {if (document.all) {(message);return false;}} function defeatNS(e) {if (document.layers||(document.getElementById&&!document.all)) { if (e.which==2||e.which==3) {(message);return false;}}} if (document.layers) {document.captureEvents(Event.MOUSEDOWN);document.onmousedown=defeatNS;} else{document.onmouseup=defeatNS;document.oncontextmenu=defeatIE;} document.oncontextmenu=new Function("return false")
</script>
<script type='text/javascript'>
//<![CDATA[
//Ctrl+U
shortcut={all_shortcuts:{},add:function(a,b,c){var d={type:"keydown",propagate:!1,disable_in_input:!1,target:document,keycode:!1};if(c)for(var e in d)"undefined"==typeof c[e]&&(c[e]=d[e]);else c=d;d=c.target,"string"==typeof c.target&&(d=document.getElementById(c.target)),a=a.toLowerCase(),e=function(d){d=d||window.event;if(c.disable_in_input){var e;d.target?e=d.target:d.srcElement&&(e=d.srcElement),3==e.nodeType&&(e=e.parentNode);if("INPUT"==e.tagName||"TEXTAREA"==e.tagName)return}d.keyCode?code=d.keyCode:d.which&&(code=d.which),e=String.fromCharCode(code).toLowerCase(),188==code&&(e=","),190==code&&(e=".");var f=a.split("+"),g=0,h={"`":"~",1:"!",2:"@",3:"#",4:"$",5:"%",6:"^",7:"&",8:"*",9:"(",0:")","-":"_","=":"+",";":":","'":'"',",":"<",".":">","/":"?","\\":"|"},i={esc:27,escape:27,tab:9,space:32,"return":13,enter:13,backspace:8,scrolllock:145,scroll_lock:145,scroll:145,capslock:20,caps_lock:20,caps:20,numlock:144,num_lock:144,num:144,pause:19,"break":19,insert:45,home:36,"delete":46,end:35,pageup:33,page_up:33,pu:33,pagedown:34,page_down:34,pd:34,left:37,up:38,right:39,down:40,f1:112,f2:113,f3:114,f4:115,f5:116,f6:117,f7:118,f8:119,f9:120,f10:121,f11:122,f12:123},j=!1,l=!1,m=!1,n=!1,o=!1,p=!1,q=!1,r=!1;d.ctrlKey&&(n=!0),d.shiftKey&&(l=!0),d.altKey&&(p=!0),d.metaKey&&(r=!0);for(var s=0;k=f[s],s<f.length;s++)"ctrl"==k||"control"==k?(g++,m=!0):"shift"==k?(g++,j=!0):"alt"==k?(g++,o=!0):"meta"==k?(g++,q=!0):1<k.length?i[k]==code&&g++:c.keycode?c.keycode==code&&g++:e==k?g++:h[e]&&d.shiftKey&&(e=h[e],e==k&&g++);if(g==f.length&&n==m&&l==j&&p==o&&r==q&&(b(d),!c.propagate))return d.cancelBubble=!0,d.returnValue=!1,d.stopPropagation&&(d.stopPropagation(),d.preventDefault()),!1},this.all_shortcuts[a]={callback:e,target:d,event:c.type},d.addEventListener?d.addEventListener(c.type,e,!1):d.attachEvent?d.attachEvent("on"+c.type,e):d["on"+c.type]=e},remove:function(a){var a=a.toLowerCase(),b=this.all_shortcuts[a];delete this.all_shortcuts[a];if(b){var a=b.event,c=b.target,b=b.callback;c.detachEvent?c.detachEvent("on"+a,b):c.removeEventListener?c.removeEventListener(a,b,!1):c["on"+a]=!1}}},shortcut.add("Ctrl+U",function(){top.location.href="/"});
//]]>
</script>