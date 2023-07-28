<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');
$headmod='Item ẩn'; 
$textl='Item ẩn';
require('../incfiles/head.php');
if(!$user_id){
header('location: /dangnhap.html');
exit;
}
if ($rights<9) {
header('Location: /');
exit;
}

switch ($act){
case 'tang':
echo '<div class="phdr">Tặng item</div>';
 $id=$_GET[id];
    $xyz=mysql_num_rows(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$id."'"));
if($xyz<=0){header('location: /');}
if($id && $datauser['rights'] >= 9){
$shop = mysql_fetch_assoc(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$id."'"));
if($shop['hienthi'] == 0){
header('location: index.php');
}
echo'<div class="omenu"><center> <img src="/images/shop/'.$shop['id'].'.png"> <br>Bạn có muốn tặng item này không ?<br><form method="post"> <input type="number" placeholder="Nhập ID người nhận" name="nguoinhan"> <input type="submit" value="Xác Nhận" name="submit"></form></center></div>';
if(isset($_POST['submit'])){
if($shop['timesudung']){
$shop['timesudung'] = $shop['timesudung'] + time();
}

$nguoinhan = $_POST['nguoinhan'];

$check = mysql_num_rows(mysql_query("SELECT * FROM `users` WHERE `id`='".$nguoinhan."'"));
if($check < 1){
echo'<div class="omenu">Người dùng không tồn tại.</div>';
require('../incfiles/end.php');
exit;
}
$nguoinhan1=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$nguoinhan."'"));
$tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$nguoinhan."'");
$checktongruong=mysql_num_rows($tongruong);
	if ($checktongruong>=$nguoinhan1['tongruong']) {
    echo'<div class="omenu">Giao dịch không thành công, rương của người ta đã đầy !!</div>';
	require('../incfiles/end.php');
exit;
} 
	    			$query=mysql_query("SELECT * FROM `khodo` WHERE `id_shop`='".$shop['id']."' AND `user_id`='".$nguoinhan."'");
$checkdo=mysql_num_rows($query);
if ($checkdo>=1) {
    echo'<div class="omenu">Giao dịch không thành công, Người ta đã sở hữu  <b>'.$shop['tenvatpham'].'</b> !!</div>';
require('../incfiles/end.php');
exit;
} 

mysql_query("INSERT INTO `khodo` SET
`user_id`='".$nguoinhan."',
`loai`='".$shop['loai']."',
`id_loai`='".$shop['id_loai']."',
`tenvatpham`='".$shop['tenvatpham']."',
`id_shop`='".$shop['id']."',
`timesudung`='".$shop['timesudung']."'
");
$text='<b><font color="003366">'.$login.'</font></b><font color="000000"> vừa gửi <img src="/images/shop/'.$shop['id'].'.png"> ['.$shop['tenvatpham'].'] cho bạn</font>';
$text2='<b><font color="003366">'.$login.'</font></b><font color="000000"> vừa gửi <img src="/images/shop/'.$shop['id'].'.png"> ['.$shop['tenvatpham'].'] </font>';
mysql_query("INSERT INTO `thongbao` SET
`id`='".$user_id."',
`user`='".$nguoinhan."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
//lịch sử chuyển
mysql_query("INSERT INTO `ls_tangvp` SET
`id`='".$user_id."',
`user`='".$nguoinhan."',
`text`='$text2',
`time`='".time()."'
");
echo'<div class="omenu">Bạn đã tặng thành công: <b><font color="red"> '.$shop['tenvatpham'].'</font></b> cho '.nick($nguoinhan).'</div>';
}

}
break;
case 'edit': //Sửa đồ
    $id=$_GET[id];
    $xyz=mysql_num_rows(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$id."'"));
if($xyz<=0){header('location: /');}
$res=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$_GET[id]."'"));

echo '<div class="phdr"><b>'.$res[tenvatpham].'</b></div>';
if (isset($_POST[submit])) {
@mysql_query("UPDATE `shopdo` SET
`tenvatpham`='".$_POST[vatpham]."',
`loaitien`='".$_POST[loaitien]."',
`gia`='".$_POST[gia]."',
`gioitinh`='".$_POST[gioitinh]."',
`premium`='".$_POST[premium]."',
`hienthi`='".$_POST[hienthi]."'
WHERE `id`='".$id."'
");
echo '<div class="omenu">Edit thành công! </div>';
}
echo '<img src="/images/shop/'.$id.'.png">';
echo '<form method="post">';
echo 'Tên vật phẩm: <input type="text" name="vatpham" value="'.$res[tenvatpham].'"><br/>';
echo 'Loại tiền: <select name="loaitien">
<option value="xu" '.($res[loaitien]==xu?'selected="selected"':'').'> Xu</option>
<option value="vnd" '.($res[loaitien]==vnd?'selected="selected"':'').'> Lượng</option>
</select><br/>';
echo 'Giá: <input type="text" name="gia" size="3" value="'.$res[gia].'"><br/>';
echo 'Giới tính: <select name="gioitinh">
<option value="" '.($res[gioitinh]==''?'selected="selected"':'').'> Dùng chung</option>
<option value="nam" '.($res[gioitinh]==nam?'selected="selected"':'').'> Nam</option>
<option value="nu" '.($res[gioitinh]==nu?'selected="selected"':'').'> Nữ</option>
</select><br/>';
echo 'Shop cao cấp: <select name="premium">
<option value="" '.($res[premium]==''?'selected="selected"':'').'>Không cho vào</option>
<option value="1" '.($res[premium]==1?'selected="selected"':'').'> Cho vào</option>

</select><br/>';
echo 'Hiển thị: <select name="hienthi">
<option value="0" '.($res[hienthi]==0?'selected="selected"':'').'> Hiển thị</option>
<option value="1" '.($res[hienthi]==1?'selected="selected"':'').'> Ẩn</option>
</select><br/>';
echo '<input type="submit" name="submit" value="Lưu">';
echo '</form>';
break;

case 'xoa': //Xóa đồ
Echo '<div class="phdr">Xóa vật phẩm</div>';
$id=$_GET[id];
 $xyz=mysql_num_rows(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$id."'"));
if($xyz<=0){header('location: /');}
$res=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$_GET[id]."'"));


echo'<center>';

Echo'<div class="omenu"><img src="/images/shop/'.$res['id'].'.png"></br><b>Bạn có muốn xóa vật phẩm <font color="red">'.$res['tenvatpham'].'</font> không ??</b>';
echo '<form method="post"><input type="submit" name="submit" value="Xóa"></form></div>';
if (isset($_POST[submit])) {
Echo'<div class="omenu">Bạn đã xóa thành công vật phẩm <font color="red">'.$res['tenvatpham'].'</font> !!<a href="iteman.php">Return</a></a></div>';
echo'</center>';

mysql_query("DELETE FROM `shopdo` WHERE `id`='".$res[id]."'");

}



break;
case 'lay';

  $id=$_GET[id];
    $xyz=mysql_num_rows(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$id."'"));
if($xyz<=0){header('location: /');}
if($datauser['rights']>=9 ){

$res=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$_GET[id]."'"));
$post = mysql_fetch_array(mysql_query("select * from `shopdo` WHERE  `id` = '$id'  LIMIT 1"));

	
echo '<div class="phdr"><b>'.$res[tenvatpham].'</b></div>';
$tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."'");
$checktongruong=mysql_num_rows($tongruong);
	if ($checktongruong>=$datauser['tongruong']) {
    echo'<div class="omenu">Giao dịch không thành công, rương của bạn đã đầy !!</div>';
} else {
    			$query=mysql_query("SELECT * FROM `khodo` WHERE `id_shop`='".$post['id']."' AND `user_id`='".$user_id."'");
$checkdo=mysql_num_rows($query);
if ($checkdo>=1) {
    echo'<div class="omenu">Giao dịch không thành công, Bạn đã sở hữu  <b>'.$post['tenvatpham'].'</b> !!</div>';
} else {

@mysql_query("INSERT INTO `khodo` SET
 `id_shop`='".$post['id']."',
 `user_id`='".$user_id."',
 `id_loai`='".$post['id_loai']."',
 `tenvatpham` ='".$post['tenvatpham']."',
 `loai`='".$post['loai']."'");
 echo'<center>';
echo '<div class="omenu"><font color ="red">Lấy thành công</font></br>';
echo '<img src="/images/shop/'.$post['id'].'.png" alt="*" /></br>';
echo ' Tên Vật Phẩm: '.$post[tenvatpham].'</br>';
echo ' Loại: '.$post[loai].'</br>';

echo ' ID Shop: '.$post[id].' </div>';
echo'</center>';
}
}
}
break;


default:
echo '<div class="phdr">Item ẩn</div>';
if ($datauser['id']==1) {
    echo'<div class="omenu"><a href="?act=lichsu">Xem lịch sử tặng vật phẩm</a></div>';

}
$req=mysql_query("SELECT * FROM `shopdo` WHERE `hienthi`='1' AND `id`!='0' ORDER BY `id` DESC LIMIT $start,$kmess");
while($res=mysql_fetch_array($req)) {
	echo'  <table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info"><tbody><tr><td class="left-info"><img src="/images/shop/'.$res['id'].'.png"></td><td class="right-info"><span>
<font color="ff007f">Vật phẩm:</font>   '.$res[tenvatpham].'  </font> ('.($res['timesudung'] ? thoigiantinh(floor($res['timesudung'])).'' : 'Vĩnh viễn').')</br>
          <font color="ff007f">ID:</font> '.$res['id'].'</font><br>
		  <font color="ff007f">Loại:</font> '.$res['loai'].'</font><br>
          </span>';
if($datauser['rights']>=9 ){
    echo' <a href="?act=lay&id='.$res[id].'"><input type="submit" name="submit" value="Lấy"></a>';
        echo' <a href="?act=tang&id='.$res[id].'"><input type="submit" name="submit" value="Tặng"></a>';
    } 
       echo' <a href="?act=edit&id='.$res[id].'"><input type="submit" name="submit" value="Sửa"></a>';
        echo' <a href="?act=xoa&id='.$res[id].'"><input type="submit" name="submit" value="Xóa"></a>';

          echo'</td></tr></tbody></table>';
}
$total=mysql_result(mysql_query("SELECT COUNT(*) FROM `shopdo` WHERE `hienthi`='1'"),0);
if ($total > $kmess) {
echo '<div class="topmenu">' . functions::pages('?page=', $start, $total, $kmess) . '</div>';
}
break;
break;
case 'lichsu':
if ($datauser['rights']<9 ) {
header('Location: /index.php');
}
echo'<div class="phdr">Lịch sử</div>';

$res=mysql_query("SELECT * FROM `ls_tangvp` WHERE `id1`!='0' ORDER BY `id1` DESC LIMIT $start,$kmess");



while ($post = mysql_fetch_array($res)){
    	$t2= mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` where  `id`= '" . $post[id_shop] . "'"));

    echo'<div class="omenu">';
echo'<b>Người gửi: </b><a href="/member/'.$post[id].'.html" >'.nick($post['id']).' </a></br>
<b>Người nhận: </b><a href="/member/'.$post[user].'.html" >'.nick($post['user']).' </a></br>
<b>Nội dung : '.$post['text'].'</b></br>
<b>Thời gian:  '.date("d/m/Y - H:i", $post['time']).'</b></br></div>';
}
$total=mysql_result(mysql_query("SELECT COUNT(*) FROM `ls_tangvp` WHERE `id1`!=0"), 0);
IF($total > $kmess){
Echo'<div class="phdr">'.functions::pages('?act=lichsu&page=', $start, $total, $kmess).'</div>';
}

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