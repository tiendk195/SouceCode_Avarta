<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');
$headmod='Khu Hawwai';
$textl='Khu Hawwai';
require('../incfiles/head.php');

if (!$user_id) {
header('Location: /index.php');
exit;
}
if ($datauser['kichhoat'] ==0 ){ 
echo'<div class="omenu">Vui lòng kích hoạt để sử dụng chức năng</div>';
require('../incfiles/end.php');
exit;
}
$dangusac=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='123'"));

switch($act) {
default:
echo '
<div class="phdr"><font color="white"> Hóa phép '.($rights>=9?'- [<a href="?act=add"><b>Thêm đồ</b></a>]':'').' </font></div>';

$tong =mysql_result(mysql_query("SELECT COUNT(*) FROM `hoaphep`"),0);
$req=mysql_query("SELECT * FROM `hoaphep` WHERE  `id`!='0' ORDER BY `id` DESC LIMIT $start,$kmess");
while($res=mysql_fetch_array($req)) {
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$res['vatpham']."'"));
echo'<table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info">
<tbody><tr>
<td class="left-info"><img src="/images/shop/'.$res['vatpham'].'.png">
</td>
<td class="right-info">
<font color="green">'.$shop['tenvatpham'].'</font><br><br>
<a href="?act=hoaphep&id='.$res['id'].'"><input type="submit" name="submit" value="Hóa phép"></a>';
if ($datauser['rights']>=9){
	echo' <a href="?act=edit&id='.$res['id'].'"><input type="submit" name="submit" value="Sửa"></a>';
		echo' <a href="?act=xoa&id='.$res['id'].'"><input type="submit" name="submit" value="Xóa"></a>';

}

echo'
</td>
</tr></tbody></table>';

}
if ($tong > $kmess){
echo '<div class="topmenu">' . functions::pages('?page=', $start, $tong, $kmess) . '</div>';
}
break;

case 'add':
if ($rights>=9) {
Echo '<div class="phdr">Thêm đồ</div>';
if (isset($_POST['add'])) {
$vatpham=(int)$_POST['vatpham'];
$vnd=(int)$_POST['vnd'];
$xu=(int)$_POST['xu'];
$dangusac=(int)$_POST['dangusac'];
if (empty($vatpham) or empty($vnd) or empty($xu) or empty($dangusac)) {
echo '<div class="news">Không được bỏ trống!</div>';
} else {
mysql_query("INSERT INTO `hoaphep` SET
`vatpham`='".$vatpham."',
`canvp`='".$_POST['canvp']."',
`vnd`='".$vnd."',
`xu`='".$xu."',
`dangusac`='".$dangusac."'");
$tenvatpham=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$vatpham."'"));
echo '<div class="omenu">Thêm thành công</div>';
}
}
echo '<form method="post">';
echo 'Cần vật phẩm: <select name="canvp">';
$cvp=mysql_query("SELECT * FROM `shopdo`");
while ($showcvp=mysql_fetch_array($cvp)) {
echo '<option value="'.$showcvp['id'].'">'.$showcvp['id'].': '.$showcvp['tenvatpham'].'</option>';
}
echo '</select><br/>';
echo 'Vật phẩm: <select name="vatpham">';
$nc=mysql_query("SELECT * FROM `shopdo` WHERE `hienthi`='1'");
while ($show=mysql_fetch_array($nc)) {
echo '<option value="'.$show['id'].'">'.$show['id'].': '.$show['tenvatpham'].'</option>';
}
echo '</select><br/>';
echo 'Lượng: <input type="text" name="vnd" size="3"> Lượng<br/>';
echo 'Xu: <input type="text" name="xu" size="3"> xu<br/>';

echo 'Đá Ngũ Sắc: <input type="text" name="dangusac" size="1"><br/>';
echo '<input type="submit" name="add" value="Thêm">';
echo '</form>';
}
break;
case 'xoa':
if ($datauser['rights'] >= 9) {
$id = $_GET['id'];
if (isset($_POST['delit'])) {
mysql_query("DELETE FROM `hoaphep` WHERE `id`='".$id."'");
    header ('Location : hoaphep.php ');

}
$checkit = mysql_result(mysql_query("select count(*) from `hoaphep` where `id` = '".$id."'"),0);
if ($checkit == 0) {
	echo '<div class="omenu">Không có Item này !</div>';
} else {
echo '<div class="phdr"> Xóa Item </div>';
echo '<center><div class="omenu">Bạn có chắc muốn xóa item này khỏi shop ?<br/>
<form method="post"><input type="submit" name="delit" value="Xóa"></form></div>';
}
}
break;
case 'edit':
if ($rights>=9) {


$id=$_GET[id];
$item=mysql_fetch_array(mysql_query("SELECT * FROM `hoaphep` WHERE `id`='".$id."'"));
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$item[vatpham]."'"));
  $xyz=mysql_num_rows(mysql_query("SELECT * FROM `hoaphep` WHERE `id`='".$id."'"));
if($xyz<=0){header('location: /');}


echo '<div class="phdr"><b>'.$shop[tenvatpham].'</b></div>';
if (isset($_POST[submit])) {

  
@mysql_query("UPDATE `hoaphep` SET
`xu`='".$_POST[xu]."',
`vnd`='".$_POST[luong]."',
`dangusac`='".$_POST[dangusac]."'


WHERE `id`='".$id."'
");

echo '<div class="omenu">Edit thành công! </div>';
}
echo '<img src="/images/shop/'.$shop['id'].'.png">';
echo '<form method="post">';

echo 'Đá ngũ sắc: <input type="number" name="dangusac" value="'.$item[dangusac].'"><br/>';

echo 'Nhập lượng: <input type="number" name="luong" value="'.$item[vnd].'"><br/>';
echo 'Nhập xu: <input type="number" name="xu" value="'.$item[xu].'"><br/>';

echo '<input type="submit" name="submit" value="Lưu">';
echo '</form>';
}
break;
case 'hoaphep':
echo '<div id="content-load">';
$id=(int)$_GET[id];
$check=mysql_num_rows(mysql_query("SELECT * FROM `hoaphep` WHERE `id`='".$id."'"));
if ($check<1) {
header('Location: hoaphep.php');
exit;
} else {
$item=mysql_fetch_array(mysql_query("SELECT * FROM `hoaphep` WHERE `id`='".$id."'"));
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$item['vatpham']."'"));
$canvp=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$item['canvp']."'"));
$ruong=mysql_fetch_array(mysql_query("SELECT * FROM `khodo` WHERE `loai`='".$canvp['loai']."' AND `user_id`='".$user_id."' AND `id_loai`='".$canvp['id_loai']."' AND `timesudung` = '0'"));
$ktruong=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `loai`='".$canvp['loai']."' AND `id_loai`='".$canvp['id_loai']."' AND `user_id`='".$user_id."' AND `timesudung` = '0'"));


echo '<div class="phdr"><b>Hóa phép - [<a href="hoaphep.php">Quay lại</a>]</b></div>';

echo'<div class="omenu">Bạn đang có '.number_format($dangusac['soluong']).' đá ngũ sắc </div>';
if (isset($_POST['hoaphep'])) {
	$tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."'");
$checktongruong=mysql_num_rows($tongruong);
	if ($checktongruong>=$datauser['tongruong']) {
    echo'<div class="omenu">Giao dịch không thành công, rương của bạn đã đầy !!</div>';
} else 

if ($datauser['xu']<$item['xu'] || $ktruong<1 || $datauser['luong']<$item['vnd'] || $dangusac['soluong']<$item['dangusac']) {
echo '<div class="omenu">Chưa đủ điều kiện để hóa phép !</div>';
} else {

mysql_query("UPDATE `users` SET `xu`=`xu`-'".$item['xu']."',`luong`=`luong`- '".$item['vnd']."'  WHERE `id`='".$user_id."'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$item['dangusac']."' WHERE `user_id`='".$user_id."' AND `id_shop`='123'");

/////
mysql_query("DELETE FROM `khodo` WHERE `id`='".$ruong['id']."' LIMIT 1");
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$shop['loai']."',
`id_loai`='".$shop['id_loai']."',
`timesudung`='".$ruong['timesudung']."',
`tenvatpham`='".$shop['tenvatpham']."',
`id_shop`='".$shop['id']."'
");
$bot='[b][red]Xin chúc mừng [blue]'.$login.'[/blue] vừa hóa phép thành công [blue]'.$shop['tenvatpham'].' ! [/blue][/red][/b]';


mysql_query("INSERT INTO `guest` SET `user_id`='256', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
echo '<div class="omenu">Hóa phép thành công: <font color="red"><b>'.$shop['tenvatpham'].'</b></font></div>';
} 

}
echo '<form method="post">';
echo'
<div class="omenu"><center><img src="/images/shop/'.$shop['id'].'.png"><br>Bạn có muốn hóa phép vật phẩm <font color="green">'.$shop['tenvatpham'].'</font> bằng <font color="red"> '.$item['dangusac'].' <img src="/images/vatpham/123.png"></font>
+ <font color="red">'.number_format($item['xu']).' Xu</font> 
+ <font color="red">'.number_format($item['vnd']).' Lượng</font> 
 
 
+ Vật phẩm <font color="blue">'.$canvp['tenvatpham'].'</font> không?<br>
<font color="red"><b>Lưu ý: Hóa phép xong sẽ mất tài nguyên</b></font></br>
<form method="post">	<input type="submit" value="Hóa phép" name="hoaphep"> </input></form>
<center></div>';


}
echo '</div>';
break;
}
require('../incfiles/end.php');
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