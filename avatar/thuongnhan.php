<?php
$idx = $_GET['id'];

define('_IN_JOHNCMS',1);
require('../incfiles/core.php');
$headmod = 'Cửa hàng';
$textl = 'Cửa hàng';
if($datauser['vip'] == 1){
$giamgia = 1.1;
}else if($datauser['vip'] == 2){
$giamgia = 1.2;
}else if($datauser['vip'] == 3){
$giamgia = 1.3;
}else if($datauser['vip'] == 4){
$giamgia = 1.4;
}else if($datauser['vip'] == 5){
$giamgia = 1.5;
}else if($datauser['vip'] == 6){
$giamgia = 2;
}else{
$giamgia = 1;
}
require('../incfiles/head.php');
if(!$user_id){
header('location: /dangnhap.html');
exit;
}

switch($act){
case'mua':
   
echo '<div class="phdr">Mua item</div>';
echo'<div class="thinhdz">';
if($id){
$xyz=mysql_num_rows(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$idx."'"));
if($xyz<=0){header('location: /');}
$shop = mysql_fetch_assoc(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$idx."'"));
if($shop['premium'] == 0){
header('location: index.php');
}

if(isset($_POST['submit'])){
if($shop['timesudung']){
$shop['timesudung'] = $shop['timesudung'] + time();
}
if($shop['loaitien'] == 'xu'){
	$tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."'");
$checktongruong=mysql_num_rows($tongruong);
	if ($checktongruong>=$datauser['tongruong']) {
    echo'<div class="omenu">Giao dịch không thành công, rương của bạn đã đầy !!</div>';
} else {
    			$query=mysql_query("SELECT * FROM `khodo` WHERE `id_shop`='".$shop['id']."' AND `user_id`='".$user_id."'");
$checkdo=mysql_num_rows($query);
if ($checkdo>=1) {
    echo'<div class="omenu">Giao dịch không thành công, Bạn đã sở hữu  <b>'.$shop['tenvatpham'].'</b> !!</div>';
} else 
if($datauser['xu'] > $shop['gia'] - 1){
mysql_query("UPDATE `users` SET `xu`=`xu`-'".$shop['gia']."' WHERE `id`='".$user_id."'");
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$shop['loai']."',
`id_loai`='".$shop['id_loai']."',
`tenvatpham`='".$shop['tenvatpham']."',
`id_shop`='".$shop['id']."',
`timesudung`='".$shop['timesudung']."'
");
///MOD LỊCH SỬ BY DUCNGHIA
$ducnghia_url = 'http://'.$_SERVER['SERVER_NAME'].''.$_SERVER['REQUEST_URI'];
$ducnghia_noidung = "Mua ".$shop['tenvatpham']." mất ".$shop['gia']." xu. còn ".$datauser['xu']." xu";
$ducnghia_time =date('i-s-h/d/m/Y');
$nguoichoi = $datauser['id'];
mysql_query("INSERT INTO `ducnghia_lichsu` SET
`user_id` = '".$nguoichoi."',
`url` = '".$ducnghia_url."',
`noidung` = '".$ducnghia_noidung."',
`thoigian` = '".$ducnghia_time."'
");
//ket thuc BY DUCNGHIA

echo'<div class="omenu">Bạn đã mua thành công: <b><font color="red"> '.$shop['tenvatpham'].'</font></b></div>';
}else{
echo'<div class="omenu">Giao dịch không thành công !!</div>';
}
}
}
if($shop['loaitien'] == 'vnd'){
	$tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."'");
$checktongruong=mysql_num_rows($tongruong);
	if ($checktongruong>=$datauser['tongruong']) {
    echo'<div class="omenu">Giao dịch không thành công, rương của bạn đã đầy !!</div>';
} else {
        			$query=mysql_query("SELECT * FROM `khodo` WHERE `id_shop`='".$shop['id']."' AND `user_id`='".$user_id."'");
$checkdo=mysql_num_rows($query);
if ($checkdo>=1) {
    echo'<div class="omenu">Giao dịch không thành công, Bạn đã sở hữu  <b>'.$shop['tenvatpham'].'</b> !!</div>';
} else 
if($datauser['luong'] > $shop['gia'] - 1){
mysql_query("UPDATE `users` SET `luong`=`luong`-'".$shop['gia']."' WHERE `id`='".$user_id."'");
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$shop['loai']."',
`id_loai`='".$shop['id_loai']."',
`tenvatpham`='".$shop['tenvatpham']."',
`id_shop`='".$shop['id']."',
`timesudung`='".$shop['timesudung']."'
");
echo'<div class="omenu">Bạn đã mua thành công: <b><font color="red"> '.$shop['tenvatpham'].'</font></b></div>';
}else{
echo'<div class="omenu">Giao dịch không thành công !!</div>';
}
}
}
}

$shop['gia'] = round($shop['gia'] / $giamgia);

echo'<div class="omenu"><center> <img src="/images/shop/'.$shop['id'].'.png"><br>Bạn có muốn mua item này với giá <b>'.number_format($shop['gia']).'  '.($shop['loaitien'] == 'xu' ? 'xu' : 'lượng').' </b>? <br>

 <form method="post">
    <center><input type="submit" name="submit" id="vncitydz" value="Mua" class="button" />


</center></div>';

echo'</div>';
}

break;
case'danhsach':
echo'<div class="phdr">Cửa hàng >> Premium</div>';
if(empty($loai)){
header('location: index.php');
}
if ($loai=='dochoi'){
$req = mysql_query("SELECT `id`, `gia`, `tenvatpham`, `loaitien`,`timesudung` FROM `shopdo` WHERE (`loai`='non' or`loai`='canh' or`loai`='kinh' or`loai`='docamtay'  or`loai`='matna'  or`loai`='thucung') AND `premium`=1 ORDER BY `id` DESC LIMIT $start,$kmess");
} else if ($loai=='lamdep'){
$req = mysql_query("SELECT `id`, `gia`, `tenvatpham`, `loaitien`,`timesudung` FROM `shopdo` WHERE (`loai`='toc' or`loai`='nensau' or`loai`='haoquang' or`loai`='khuonmat' or`loai`='mat') AND `premium`=1 ORDER BY `id` DESC LIMIT $start,$kmess");
} else if ($loai=='aoquan'){
$req = mysql_query("SELECT `id`, `gia`, `tenvatpham`, `loaitien`,`timesudung` FROM `shopdo` WHERE  (`loai`='ao' or`loai`='quan' )AND `premium`=1 ORDER BY `id` DESC LIMIT $start,$kmess");
}
while($res = mysql_fetch_assoc($req)){

$res['gia'] = round($res['gia'] / $giamgia);
echo'<table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info">
<tbody><tr>
<td class="left-info"><img src="/images/shop/'.$res[id].'.png">
</td>
<td class="right-info">
<b><font color="blue">'.$res[tenvatpham].'</font></b> <br>
Giá bán: 
<font color="red">'.number_format($res['gia']).'</font> '.($res['loaitien'] == xu ? 'Xu' : 'Lượng').' 
<br>
<a href="?act=mua&amp;id='.$res[id].'"><input type="submit" name="submit" value="Mua"></a>';
 if ($datauser['rights'] >= 9) {
    echo' <a href="/avatar/del.php?id='.$res[id].'"><input type="submit" name="submit" value="Xóa"></a>';
        echo' <a href="/avatar/edit.php?id='.$res[id].'"><input type="submit" name="submit" value="Sửa"></a>';
    } 
	echo'
</td>
</tr></tbody></table>';


}
if ($loai=='dochoi'){

$total = mysql_result(mysql_query("SELECT COUNT(*) FROM `shopdo` WHERE (`loai`='non' or`loai`='canh' or`loai`='kinh' or`loai`='docamtay'  or`loai`='matna'  or`loai`='thucung')AND `premium`=1"), 0);
} else  if ($loai=='lamdep'){
 $total = mysql_result(mysql_query("SELECT COUNT(*) FROM `shopdo` WHERE (`loai`='toc' or`loai`='nensau' or`loai`='haoquang' or`loai`='khuonmat' or`loai`='mat') AND `premium`=1"), 0);
} else  if ($loai=='aoquan'){

 $total = mysql_result(mysql_query("SELECT COUNT(*) FROM `shopdo` WHERE (`loai`='ao' or`loai`='quan' )AND `premium`=1"), 0);
}
if($total > $kmess){
echo'<div class="topmenu">'.functions::pages('?act=danhsach&loai='.$loai.'&page=', $start, $total, $kmess).'</div>';
}
break;
default:
echo'<div class="phdr">Shop Premium </div>';
echo'<div class="news"><center>Chào mừng! <font color="red">'.$datauser['name'].'</font> đế với Premium<br>
Mời bạn xem hàng!<br>
<img src="/avatar/premium.gif"></center></div>';
echo'<div class="omenu"><a href="?act=danhsach&amp;loai=lamdep"><img src="/icon/next.png"> Làm đẹp</a></div>
<div class="omenu"><a href="?act=danhsach&amp;loai=aoquan"><img src="/icon/next.png"> Quần áo</a></div>
<div class="omenu"><a href="?act=danhsach&amp;loai=dochoi"><img src="/icon/next.png"> Đồ chơi</a></div>
';



//echo'</div></div></td></tr></tbody></table></td></tr></tbody></table>';

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