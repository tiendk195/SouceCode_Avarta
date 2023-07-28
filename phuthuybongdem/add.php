<?php
define('_IN_JOHNCMS', 1);
Require('../incfiles/core.php');
Require('../incfiles/head.php');
if ($datauser['rights'] >=9) {

switch($act) {
default:
	echo'<div class="phdr">Câu hỏi</div>';
	echo'<div class="omenu"><a href="?act=danhsach">Xem danh sách</a> </div>';
	
if (isset($_POST[add])) {
$cauhoi=$_POST[cauhoi];
$traloi=$_POST[traloi];


if (empty($cauhoi) or empty($traloi) ) {
echo '<div class="news">Không được bỏ trống chỗ nào hết!</div>';
} else {
mysql_query("INSERT INTO `phuthuy_cauhoi` SET
`cauhoi`='".$cauhoi."',
`traloi`='".$traloi."'");

echo '<div class="rmenu">Thêm thành công</div>';
}
}
echo '<form method="post">';
echo 'Câu hỏi: <input type="test" name="cauhoi" size="5"><br/>';


echo 'Trả lời: <input type="test" name="traloi" size="5"><br/>';

echo '<input type="submit" name="add" value="Thêm">';
echo '</form>';


break;
case 'danhsach';
	echo'<div class="phdr">Danh Sách Câu hỏi</div>';
$tong =mysql_result(mysql_query("SELECT COUNT(*) FROM `phuthuy_cauhoi` "),0);
$req=mysql_query("SELECT * FROM `phuthuy_cauhoi` ORDER BY `id` DESC LIMIT $start,$kmess");
while($res=mysql_fetch_array($req)) {


$shop=mysql_fetch_array(mysql_query("SELECT * FROM `phuthuy_cauhoi` WHERE `id`='".$res[id]."'"));
    echo'  <table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info"><tbody><tr><td class="left-info"></td><td class="right-info"><span>
<font color="ff007f">Câu hỏi:</font>
          '.$shop[cauhoi].'';
         
              echo'<br>
          <font color="ff007f">Trả lời:</font> '.($res['traloi']).' </font><br> 
<a href="?act=edit&id='.$res[id].'"><input type="submit" name="submit" value="Sửa"></a>
<a href="?act=xoa&id='.$res[id].'"><input type="submit" name="submit" value="Xóa"></a>

          </span>';
 

          echo'</td></tr></tbody></table>';


}
if ($tong > $kmess){
echo '<div class="topmenu">' . functions::display_pagination('add.php?', $start, $tong, $kmess) . '</div>';
}
break;
case 'edit':
if ($rights>=9) {


$id=$_GET[id];
$item=mysql_fetch_array(mysql_query("SELECT * FROM `phuthuy_cauhoi` WHERE `id`='".$id."'"));
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `phuthuy_cauhoi` WHERE `id`='".$item[id]."'"));
  $xyz=mysql_num_rows(mysql_query("SELECT * FROM `phuthuy_cauhoi` WHERE `id`='".$id."'"));
if($xyz<=0){header('location: /');}


echo '<div class="phdr"><b>'.$shop[cauhoi].'</b></div>';
if (isset($_POST[submit])) {


  
@mysql_query("UPDATE `phuthuy_cauhoi` SET
`cauhoi`='".$_POST[cauhoi]."',
`traloi`='".$_POST[traloi]."'


WHERE `id`='".$id."'
");

echo '<div class="omenu">Edit thành công! </div>';
}
echo '<form method="post">';

echo 'Câu hỏi: <input type="text" name="cauhoi" value="'.$item[cauhoi].'"><br/>';

echo 'Trả lời: <input type="text" name="traloi" value="'.$item[traloi].'"><br/>';

echo '<input type="submit" name="submit" value="Lưu">';
echo '</form>';
}
break;
case 'xoa':
if ($datauser['rights'] >= 9) {
$id = $_GET['id'];
if (isset($_POST['delit'])) {
mysql_query("DELETE FROM `phuthuy_cauhoi` WHERE `id`='".$id."'");
    header ('Location : add.php ');

}
$checkit = mysql_result(mysql_query("select count(*) from `phuthuy_cauhoi` where `id` = '".$id."'"),0);
if ($checkit == 0) {
	echo '<div class="omenu">Không có câu này !</div>';
} else {
echo '<div class="phdr"> Xóa câu hỏi </div>';
echo '<center><div class="omenu">Bạn có chắc muốn xóa câu này khỏi danh sách ?<br/>
<form method="post"><input type="submit" name="delit" value="Xóa"></form></div>';
}
}

break;
}
}


Require('../incfiles/end.php'); 
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