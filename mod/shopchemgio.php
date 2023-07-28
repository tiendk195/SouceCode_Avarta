<?php



define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
$textl = 'Shop Chém Gió';

if (!$user_id) {
    require('../incfiles/head.php');
echo functions::display_error($lng['access_guest_forbidden']);
require('../incfiles/end.php');
exit;
}
require('../incfiles/head.php');
echo'<div class="phdr">Shop chém gió</div>';
echo'<div class="omenu"><center>Bạn đang có <b> <font color="red">'.number_format($datauser['diemchemgio']).'</font></b> điểm chém gió </center></div>';
if ($datauser['rights']>=9) {
    echo'<div class="omenu"><a href="?act=add">Thêm đồ</a></div>';
}

switch($act) {
default:
$tong =mysql_result(mysql_query("SELECT COUNT(*) FROM `shopchemgio` "),0);
$req=mysql_query("SELECT * FROM `shopchemgio` ORDER BY `id` DESC LIMIT $start,$kmess");
while($res=mysql_fetch_array($req)) {


$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$res[idshop]."'"));
echo'<div class="omenu">
 <img src="/images/khungvien.png"><img src="/images/shop/'.$shop['id'].'.png" style="position: absolute;verticalalign: 0 px;margin:0px 0 0 -45px;">
       <font style="position: absolute;verticalalign: 0 px;margin:10px 0 0 0px;"><font color="ff007f">Vật phẩm:</font>
          '.$shop[tenvatpham].'';
 if ($res['timebd']==0) { 
              echo' (Vĩnh viễn)'; 
              } else {
                             echo' ('.$res['timebd'].' ngày)'; 
              }
			  echo'
          </br><font color="ff007f">Cần:</font> '.number_format($res['diem']).' Điểm chém gió</font>
          <a href="?act=mua&id='.$res[id].'" class="menu" style="float:right"><button type="button">Mua</button></a> 
            ';
			if ($datauser['rights'] >= 9) {
    echo' </br><a href="?act=xoa&id='.$res[id].'"><input type="submit" name="submit" value="Xóa"></a>';
      echo' <a href="?act=edit&id='.$res[id].'"><input type="submit" name="submit" value="Sửa"></a>';
    } 
			ECHO'
           <br></div>';   
  

}
if ($tong > $kmess){
echo '<div class="topmenu">' . functions::display_pagination('shopchemgio.php?', $start, $tong, $kmess) . '</div>';
}
break;
case 'edit':
if ($rights>=9) {


$id=$_GET[id];
$item=mysql_fetch_array(mysql_query("SELECT * FROM `shopchemgio` WHERE `id`='".$id."'"));
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$item[idshop]."'"));
  $xyz=mysql_num_rows(mysql_query("SELECT * FROM `shopchemgio` WHERE `id`='".$id."'"));
if($xyz<=0){header('location: /');}



echo '<div class="phdr"><b>'.$shop[tenvatpham].'</b></div>';
if (isset($_POST[submit])) {
    $timesd=(int)$_POST[timesudung];

  
@mysql_query("UPDATE `shopchemgio` SET
`diem`='".$_POST[diemchemgio]."',
`timebd`='".$_POST[timesudung]."'


WHERE `id`='".$id."'
");

echo '<div class="omenu">Edit thành công! </div>';
}
echo '<img src="/images/shop/'.$shop['id'].'.png">';
echo '<form method="post">';

echo 'Thời hạn(nhập ngày): <input type="number" name="timesudung" value="'.$item[timebd].'"><br/>';

echo 'Nhập điểm: <input type="number" name="diemchemgio" value="'.$item[diem].'"><br/>';

echo '<input type="submit" name="submit" value="Lưu">';
echo '</form>';
}
break;
case 'xoa':
if ($datauser['rights'] >= 9) {
$id = $_GET['id'];
if (isset($_POST['delit'])) {
mysql_query("DELETE FROM `shopchemgio` WHERE `id`='".$id."'");
    header ('Location : shopchemgio.php ');

}
$checkit = mysql_result(mysql_query("select count(*) from `shopchemgio` where `id` = '".$id."'"),0);
if ($checkit == 0) {
	echo '<div class="omenu">Không có Item này !</div>';
} else {
echo '<div class="phdr"> Xóa Item </div>';
echo '<center><div class="omenu">Bạn có chắc muốn xóa item này khỏi shop ?<br/>
<form method="post"><input type="submit" name="delit" value="Xóa"></form></div>';
}
}
break;
case 'add':
if ($datauser['rights'] >=9) {
if (isset($_POST[add])) {
$vatpham=(int)$_POST[vatpham];
$diem=(int)$_POST[diem];
$hsd=(int)$_POST[hsd];
/*
if ($hsd !=0)
{
$timesd= $hsd*24*3600+time();
}
*/
if (empty($vatpham)) {
echo '<div class="news">Không được bỏ trống chỗ nào hết!</div>';
} else {
mysql_query("INSERT INTO `shopchemgio` SET
`idshop`='".$vatpham."',
`diem`='".$diem."',
`timebd`='".$hsd."'");
$tenvatpham=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$vatpham."'"));
$bot='[b]'.$login.' vừa thêm [red]'.$tenvatpham[tenvatpham].' [/red] vào shop chém gió![/b]';
mysql_query("INSERT INTO `guest` SET `user_id`='256', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
echo '<div class="rmenu">Thêm thành công</div>';
}
}
echo '<form method="post">';
echo 'Vật phẩm: <select name="vatpham">';
$qs=mysql_query("SELECT * FROM `shopdo` WHERE `hienthi`='1'");
while ($show=mysql_fetch_array($qs)) {
echo '<option value="'.$show[id].'"> '.$show['id'].': '.$show[tenvatpham].'</option>';
}
echo '</select><br/>';
echo 'Cần điểm: <input type="number" name="diem" size="5"><br/>';
echo 'Hạn sử dụng: <input type="number" name="hsd" size="5"><br/>';

echo '<input type="submit" name="add" value="Thêm">';
echo '</form>';
}
break;
case 'mua':



$id = (int)$_GET['id'];
$check=mysql_num_rows(mysql_query("SELECT * FROM `shopchemgio` WHERE `id`='".$id."'"));
if ($check<1) {
header('Location: shopchemgio.php');
exit;
}

$item=mysql_fetch_array(mysql_query("SELECT * FROM `shopchemgio` WHERE `id`='".$id."'"));
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$item[idshop]."'"));
echo'<div class="omenu"><center> <img src="/images/shop/'.$shop['id'].'.png"><br>Bạn có muốn mua <font color="ff007f">'.$shop['tenvatpham'].' ';
if ($item['timebd']==0) { 
              echo' (Vĩnh viễn)'; 
              } else {
                             echo' ('.$item['timebd'].' ngày)'; 
              }
echo'</font> với <b>'.number_format($item['diem']).' Điểm chém gió không </b>? <br>

 <form method="post">
    <center><input type="submit" name="submit" value="Mua" class="button" />


</center></div>';
 
/*
if($datauser['mattrang'] < $item['mattrang']){
echo'<div class="pmenu"> Lỗi! Bạn không đủ đá mặt trăng</div>';
} else  {
echo'<div class="rmenu"><b>Đổi thành công!</div>';
mysql_query("INSERT INTO `khodo` SET `user_id`='".$user_id."', `id_shop`='".$shop['id']."', `loai`='".$shop['loai']."', `id_loai`='".$shop['id_loai']."', `tenvatpham` = '".$shop['tenvatpham']."', `timesudung`='".$shop['timesudung']."'");

mysql_query("UPDATE `users` SET `mattrang` = `mattrang` - '".$item['mattrang']."' WHERE `id` = '".$user_id."'");
}
}
*/
if(isset($_POST['submit'])){
$tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."'");
$checktongruong=mysql_num_rows($tongruong);
	if ($checktongruong>=$datauser['tongruong']) {
    echo'<div class="omenu">Giao dịch không thành công, rương của bạn đã đầy !!</div>';
} else 

if($datauser['diemchemgio'] >= $item['diem']){
    
    if ($item['timebd'] !=0)
{
$timesd= $item['timebd']*24*3600+time();
}
mysql_query("UPDATE `users` SET `diemchemgio` = `diemchemgio` - '".$item['diem']."' WHERE `id` = '".$user_id."'");
mysql_query("INSERT INTO `khodo` SET `user_id`='".$user_id."', `id_shop`='".$shop['id']."', `loai`='".$shop['loai']."', `id_loai`='".$shop['id_loai']."', `tenvatpham` = '".$shop['tenvatpham']."', `timesudung`='".$timesd."'");


echo'<div class="omenu">Bạn đã mua thành công: <b><font color="red"> '.$shop['tenvatpham'].' ';
 if ($item['timebd']==0) { 
              echo' (Vĩnh viễn)'; 
              } else {
                             echo' ('.$item['timebd'].' ngày)'; 
              }
              echo'</font></b></div>';
}else{
echo'<div class="omenu">Giao dịch không thành công !!</div>';
}
}





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