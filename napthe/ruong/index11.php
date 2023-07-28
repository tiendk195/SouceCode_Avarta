<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');
$user=(int)$_GET['user'];
$checku=mysql_num_rows(mysql_query("SELECT * FROM `users` WHERE `id`='".$user."'"));
if ($checku>0) {
$ru=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$user."'"));
}
if ($checku<1) {
$headmod='Rương đồ';
$textl='Rương đồ';
} else {
$textl='Rương đồ của '.$ru['name'].'';
}
$map ='hoimau';
require('../incfiles/head.php');
if(!$user_id){
header('location: /index.html');
}
if ($checku>0) {
$user_id=$ru['id'];
}
if(time() - $datauser['timethuoc1'] < 120 || time() - $datauser['timethuoc2'] < 300){
echo'<div class="menu red">Lỗi !! Bạn không thể xem rương đồ trong trạng thái zombie</div>';
require('../incfiles/end.php');
exit;
}
if(!$loai){
$total =mysql_result(mysql_query("SELECT COUNT(*) FROM `khodo` WHERE `user_id`='".$user_id."'"), 0);
 echo'<div class="phdr">Rương đồ ('.$total.' / '.$datauser['tongruong'].')</div><div class="menu"><a href="?loai=ao"><img src="/images/vao.png"> Rương Áo</a></div><div class="menu"><a href="?loai=quan"><img src="/images/vao.png"> Rương Quần</a></div><div class="menu"><a href="?loai=canh"><img src="/images/vao.png"> Rương Cánh</a></div><div class="menu"><a href="?loai=matna"><img src="/images/vao.png"> Rương Mặt nạ</a></div><div class="menu"><a href="?loai=haoquang"><img src="/images/vao.png"> Rương Hào quang</a></div><div class="menu"><a href="?loai=non"><img src="/images/vao.png"> Rương Mũ</a></div><div class="menu"><a href="?loai=kinh"><img src="/images/vao.png"> Rương Kính</a></div><div class="menu"><a href="?loai=thucung"><img src="/images/vao.png"> Rương Thú cưng</a></div><div class="menu"><a href="?loai=docamtay"><img src="/images/vao.png"> Rương Đồ cầm tay</a></div><div class="menu"><a href="?loai=toc"><img src="/images/vao.png"> Rương Tóc</a></div><div class="menu"><a href="?loai=mat"><img src="/images/vao.png"> Rương Mắt</a></div><div class="menu"><a href="?loai=khuonmat"><img src="/images/vao.png"> Rương Khuôn mặt</a></div><div class="menu"><a href="?loai=nensau"><img src="/images/vao.png"> Rương Nền Sau</a></div><div class="menu"><a href="?loai=cancau"><img src="/images/vao.png"> Rương Cần câu</a></div>
';






}
?> 

<?php
if($loai){
		$total2 =mysql_result(mysql_query("SELECT COUNT(*) FROM `khodo` WHERE `user_id`='".$user_id."'"), 0);

	$total =mysql_result(mysql_query("SELECT COUNT(*) FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='".$loai."'"), 0);

    echo'<div class="phdr">Rương đồ ('.$total.' / '.$datauser['tongruong'].') - <a href="/ruong">Trở lại rương</a></div>';
    include'duphong.php';

include'mac.php';
include'thao.php';
echo'<form method="post">';

$req=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='".$loai."' ORDER BY `id` DESC LIMIT $start, $kmess");
while($res=mysql_fetch_array($req)){
	$shopdo=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$res['id_shop']."'"));

$pro=mysql_fetch_array(mysql_query("SELECT * FROM `dangmac` WHERE `user_id`='".$user_id."' AND `loai`='".$res['loai']."'"));
$pro2=mysql_fetch_array(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='".$user_id."' AND `loai`='".$res['loai']."'"));
echo'
<div class="omenu"> 
<img style="border: 1px solid #5dbef7;" src="/images/shop/'.$res['id_shop'].'.png" alt="do"><br>
Tên vật phẩm :<b><font color="blue"> '.$shopdo['tenvatpham'].'';

echo'</font></b>
<br> Hạn sử dụng : <b><font color="red"> '.($res['timesudung'] ? thoigiantinh(floor($res['timesudung'])).'' : 'Vĩnh viễn').' </font></b>';
if ($res[sucmanh]>0){
echo'<br> Sức mạnh : <b><font color="red"> '.number_format($res[sucmanh]).' [ +'.$res[cong ].' ] </font></b>
';
}
if ($res['hp']>0){

echo'<br> HP: <b><font color="red"> '.number_format($res[hp]).'  [ +'.$res[conghp ].' ] </font></b>';
}
$khodo=mysql_fetch_array(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."' AND `id`='".$res['id']."'"));
$dangmac=mysql_num_rows(mysql_query("SELECT * FROM `dangmac` WHERE `user_id`='".$user_id."' AND `id_ruong`='".$khodo['id']."'"));
echo'<br> 
'.($pro['id_ruong'] == $res['id'] ? '<a href="?loai='.$loai.'&act=thao&id='.$res['id'].'"><input type="button" value="Tháo ra"></a>' : 
'<a href="?loai='.$loai.'&act=mac&id='.$res['id'].'"><input  type="button" value="Sử dụng"></a><a href="del.php?id='.$res['id'].'"> <input id="button" type="button" name="button" value="Bỏ đồ"></a> <a href="/avatar/chotroi.php?act=ban&loai=do&id='.$res['id'].'"><input id="button" type="button" name="button" value="Bán đồ"></a> </br><a href="chuyenhoa.php?act=add&id='.$res['id'].'"><input id="button" type="button" name="button" value="Chuyển hóa"></a>
<a href="nangcap.php?id='.$res['id'].'"><input id="button" type="button" name="button" value="Nâng cấp"></a>  ').'
';
if ($pro2['id_ruong'] != $res['id']){
echo'<a href="?loai='.$loai.'&act=duphong&id='.$res['id'].'"><input id="button" type="button" name="button" value="Dự phòng"></a>';
} else {
  echo'<a href="?loai='.$loai.'&act=duphongthao&id='.$res['id'].'"><input id="button" type="button" name="button" value="Tháo khỏi dự phòng"></a>';
  
}
echo'</div>';





}
$total =mysql_result(mysql_query("SELECT COUNT(*) FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='".$loai."'"), 0);
if($total == 0){
echo'<div class="omenu">Rương đồ của bạn trống!</div>';
}else if($total > $kmess){
echo'<div class="menu">'.functions::pages('?loai='.$loai.'&page=', $start, $total, $kmess).'</div>';

}
echo'</form>';
}
echo'<div class="phdr">Chức năng</div><div class="menu"><a href="ruongduphong.php"><img src="/images/vao.png"> Rương dự phòng</a></div><div class="menu"><a href="ruongvatpham.php"><img src="/images/vao.png"> Rương vật phẩm</a></div><div class="menu"><a href="del.php?act=hsd"><img src="/images/vao.png"> Bỏ tất cả đồ ngày</a></div>';
echo'<div class="menu"><a href="ruongicon.php"><img src="/images/vao.png"> Rương Icon</a></div>';

echo'<div class="menu"><a href="nangcapruong.php"><img src="/images/vao.png"> Nâng cấp</a></div>';

echo'<div class="menu"><a href="thungrac.php"><img src="/images/vao.png"> Thùng rác</a></div>';



//include'vatpham.php';

include'xuli.php';
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