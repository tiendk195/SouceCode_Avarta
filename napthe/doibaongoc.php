<?php



define('_IN_JOHNCMS', 1);

require('../incfiles/core.php');
$textl = 'Đổi quà từ bảo ngọc';

require('../incfiles/head.php');
echo'<div class="phdr">Quà Nạp Thẻ Cào</div>';
echo'<div class="news"><center><font color="red"><b>Admin</b></font><br><img src="/avatar/1.png"><br>
<font color="green">Bảo ngọc <img src="/images/vatpham/60.png"> bạn sẽ nhận được từ mỗi lần Nạp thẻ nhé!</font></br>
<font color="red">Bạn đang có <b>'.number_format($datauser['dabaongoc']).'</b> bảo ngọc</font>
    </center></div>';

if ($datauser['rights']>=9) {
echo'<div class="omenu"><a href="?act=add">Thêm đồ</a></div>';
}
switch($act) {
default:
$tong =mysql_result(mysql_query("SELECT COUNT(*) FROM `quanapthe` "),0);
$req=mysql_query("SELECT * FROM `quanapthe` ORDER BY `id` DESC LIMIT $start,$kmess");
while($res=mysql_fetch_array($req)) {
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$res[idshop]."'"));
echo'<table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info">
<tbody><tr>
<td class="left-info"><img src="/images/shop/'.$res['idshop'].'.png">
</td>
<td class="right-info">
<b><font color="blue">'.$shop[tenvatpham].'</font></b><br>
Cần: <font color="red">'.number_format($res['diem']).'</font> Bảo ngọc<br>
<a href="?act=ok&id='.$res[id].'"><input type="submit" name="submit" value="Đổi"></a></td>
</tr></tbody></table>';

}
$total=mysql_result(mysql_query("SELECT COUNT(*) FROM `quanapthe` WHERE `id`!=0"), 0);
IF($total > $kmess){
Echo'<div class="phdr">'.functions::pages('?page=', $start, $total, $kmess).'</div>';
}

break;
case 'add':
if ($datauser['rights'] >= 9) {
echo '<div class="phdr">Thêm đồ</div>';
if (isset($_POST[add])) {
$vatpham=(int)$_POST[vatpham];
$diem=(int)$_POST[diem];

if (empty($vatpham)) {
echo '<div class="news">Không được bỏ trống chỗ nào hết!</div>';
} else {
mysql_query("INSERT INTO `quanapthe` SET
`idshop`='".$vatpham."',
`diem`='".$diem."'");
$tenvatpham=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$vatpham."'"));
$bot='[b]'.$login.' vừa thêm [red]'.$tenvatpham[tenvatpham].' [/red] vào shop cao cấp ![/b]';

echo '<div class="omenu">Thêm thành công</div>';
}
}
echo '<form method="post">';
echo 'Vật phẩm: <select name="vatpham">';
$qs=mysql_query("SELECT * FROM `shopdo` WHERE `hienthi`='1'");
while ($show=mysql_fetch_array($qs)) {
echo '<option value="'.$show[id].'"> '.$show['id'].': '.$show[tenvatpham].'</option>';
}
echo '</select><br/>';

echo 'Cần điểm: <input type="text" name="diem" size="5"><br/>';

echo '<input type="submit" name="add" value="Thêm">';
echo '</form>';
}
break;
case 'ok':
$id = (int)$_GET['id'];
$check=mysql_num_rows(mysql_query("SELECT * FROM `quanapthe` WHERE `id`='".$id."'"));
if ($check<1) {
header('Location: doibaongoc.php');
exit;
} else {
$item=mysql_fetch_array(mysql_query("SELECT * FROM `quanapthe` WHERE `id`='".$id."'"));
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$item[idshop]."'"));
$tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."'");
$checktongruong=mysql_num_rows($tongruong);
	if ($checktongruong>=$datauser['tongruong']) {
    echo'<div class="omenu">Giao dịch không thành công, rương của bạn đã đầy !!</div>';
} 

else 
if($datauser['dabaongoc'] < $item['diem']){
echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn cần <b>'.$item['diem'].'</b> <img src="/images/vatpham/60.png"> mới có thể đổi vật phẩm này <a href="/"> Quay về </a></div>';
} else  {


echo'<div class="omenu"><b>Đổi thành công!</div>';

mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$shop['loai']."',
`id_loai`='".$shop['id_loai']."',
`timesudung`='0',
`tenvatpham`='".$shop['tenvatpham']."',
`id_shop`='".$shop['id']."'
");
mysql_query("UPDATE `users` SET `dabaongoc` = `dabaongoc` - '".$item['diem']."' WHERE `id` = '".$user_id."'");
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