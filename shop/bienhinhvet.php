<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');
$textl='Biến hình Vẹt';
require('../incfiles/head.php');
if (!$user_id) {
header('Location: /login.php');
exit;
}
echo '<div class="phdr"><center>'.$textl.' </center></div>';
$check1=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='46' AND `timesudung`='0'"));
$check2=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='47' AND `timesudung`='0'"));
$check3=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='48' AND `timesudung`='0'"));
$check4=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='49' AND `timesudung`='0'"));
$check5=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='54' AND `timesudung`='0'"));
$check6=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='55' AND `timesudung`='0'"));
$check7=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='16' AND `timesudung`='0'"));
if ($check1<1&&$check2<1&&$check3<1&&$check4<1&&$check5<1&&$check6<1&&$check7<1) {
echo '<div class="omenu"><font color="red"><b>Lỗi!!</font></b> Bạn không có vẹt hoặc vẹt của bạn không vĩnh viễn...</div>';
} else {
$vet=array(46,47,48,49,54,55,16);
if (isset($_POST['submit'])) {
if ($datauser['luongkhoa']<200) {
echo '<div class="omenu"><font color="red"><b>Lỗi!!</font></b> Bạn không đủ tiền để biến hình vẹt</div>';
} else {
$randbien=rand(0,6);
$bienhinh=$vet[$randbien];
$name=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `loai`='thucung' AND `id_loai`='".$bienhinh."'"));
//Xóa vật phẩm củ
if ($check1>=1) {
mysql_query("DELETE FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='46'");
} else if ($check2>=1) {
mysql_query("DELETE FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='47'");
} else if ($check3>=1) {
mysql_query("DELETE FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='48'");
} else if ($check4>=1) {
mysql_query("DELETE FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='49'");
} else if ($check5>=1) {
mysql_query("DELETE FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='54'");
} else if ($check6>=1) {
mysql_query("DELETE FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='55'");
} else if ($check7>=1) {
mysql_query("DELETE FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='16'");
}
//Trừ tiền
mysql_query("UPDATE `users` SET `luongkhoa`=`luongkhoa`-'200' WHERE `id`='".$user_id."'");
//Add kirby mới
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`tenvatpham`='".$name['tenvatpham']."',
`loai`='thucung',
`id_loai`='".$bienhinh."',
`id_shop`='".$name[id]."'
");
$bot='Chúc mừng [b]'.$login.'[/b] vừa biến hình thành công [red]'.$name['tenvatpham'].'[/red]!';
mysql_query("INSERT INTO `guest` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
echo '<div class="omenu">Vẹt của bạn đã biến thành <b>'.$name['tenvatpham'].' <img src="/images/shop/'.$name['id'].'.png"></b></div>';
}
}
echo '<center>';
echo'<div class="omenu">';
for ($i=0; $i<count($vet);$i++) {
$xxx=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `loai`='thucung' AND `id_loai`='".$vet[$i]."'"));
echo '<img src="/images/shop/'.$xxx[id].'.png">';
}
echo'</br>Xác nhận biến hình vẹt với 200 lượng khóa? Khi biến hình sẽ mất vẹt cũ và bạn nhận ngẫu nhiên vẹt mới!';



echo '<form method="post"><input type="submit" name="submit" value="Biến hình"></form>';
echo'</div>';
echo '</center>';
}
require('../incfiles/end.php');
?>
<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');
$textl='Biến hình Kirby';
require('../incfiles/head.php');
if (!$user_id) {
header('Location: /login.php');
exit;
}
echo '<div class="phdr"><center>'.$textl.' </center></div>';
$check1=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='31' AND `timesudung`='0'"));
$check2=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='32' AND `timesudung`='0'"));
$check3=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='33' AND `timesudung`='0'"));
$check4=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='34' AND `timesudung`='0'"));
$check5=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='35' AND `timesudung`='0'"));
$check6=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='36' AND `timesudung`='0'"));
$check7=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='37' AND `timesudung`='0'"));
$check8=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='38' AND `timesudung`='0'"));
$check9=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='39' AND `timesudung`='0'"));
$check10=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='27' AND `timesudung`='0'"));
$check11=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='151' AND `timesudung`='0'"));
$check12=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='159' AND `timesudung`='0'"));
$check13=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='160' AND `timesudung`='0'"));
$check14=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='161' AND `timesudung`='0'"));
$check15=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='162' AND `timesudung`='0'"));
$check16=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='163' AND `timesudung`='0'"));
$check17=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='165' AND `timesudung`='0'"));
$check18=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='167' AND `timesudung`='0'"));
$check19=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='168' AND `timesudung`='0'"));

if ($check1<1&&$check2<1&&$check3<1&&$check4<1&&$check5<1&&$check6<1&&$check7<1&&$check8<1&&$check9<1&&$check10<1&&$check11<1&&$check12<1&&$check13<1&&$check14<1&&$check15<1&&$check16<1&&$check17<1&&$check18<1&&$check19<1) {
echo '<div class="omenu"><font color="red"><b>Lỗi!!</font></b> Bạn không có kirby hoặc kirby của bạn không vĩnh viễn...</div>';
} else {
$vet=array(31,32,33,34,35,36,37,38,39,27,151,159,160,161,162,163,165,167,168);
if (isset($_POST['submit'])) {
if ($datauser['luongkhoa']<200) {
echo '<div class="omenu"><font color="red"><b>Lỗi!!</font></b> Bạn không đủ tiền để biến hình vẹt</div>';
} else {
$randbien=rand(0,18);
$bienhinh=$vet[$randbien];
$name=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `loai`='thucung' AND `id_loai`='".$bienhinh."'"));
//Xóa vật phẩm củ
if ($check1>=1) {
mysql_query("DELETE FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='31'");
} else if ($check2>=1) {
mysql_query("DELETE FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='32'");
} else if ($check3>=1) {
mysql_query("DELETE FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='33'");
} else if ($check4>=1) {
mysql_query("DELETE FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='34'");
} else if ($check5>=1) {
mysql_query("DELETE FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='35'");
} else if ($check6>=1) {
mysql_query("DELETE FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='36'");
} else if ($check7>=1) {
mysql_query("DELETE FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='37'");
} else if ($check8>=1) {
mysql_query("DELETE FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='38'");
}else if ($check9>=1) {
mysql_query("DELETE FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='39'");
}else if ($check10>=1) {
mysql_query("DELETE FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='27'");
}else if ($check11>=1) {
mysql_query("DELETE FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='151'");
}else if ($check12>=1) {
mysql_query("DELETE FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='159'");
}else if ($check13>=1) {
mysql_query("DELETE FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='160'");
}else if ($check14>=1) {
mysql_query("DELETE FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='161'");
}else if ($check15>=1) {
mysql_query("DELETE FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='162'");
}else if ($check16>=1) {
mysql_query("DELETE FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='163'");
}else if ($check17>=1) {
mysql_query("DELETE FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='165'");
}else if ($check18>=1) {
mysql_query("DELETE FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='166'");
}else if ($check19>=1) {
mysql_query("DELETE FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='thucung' AND `id_loai`='167'");
}
//Trừ tiền
mysql_query("UPDATE `users` SET `luongkhoa`=`luongkhoa`-'200' WHERE `id`='".$user_id."'");
//Add kirby mới
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`tenvatpham`='".$name['tenvatpham']."',
`loai`='thucung',
`id_loai`='".$bienhinh."',
`id_shop`='".$name['id']."'
");
echo '<div class="omenu">Kirby của bạn đã biến thành <b>'.$name['tenvatpham'].' <img src="/images/shop/'.$name['id'].'.png"></b></div>';
}
}
echo '<center>';
echo'<div class="omenu">';
for ($i=0; $i<count($vet);$i++) {
$xxx=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `loai`='thucung' AND `id_loai`='".$vet[$i]."'"));
echo '<img src="/images/shop/'.$xxx[id].'.png">';
}
echo'</br>Xác nhận biến hình kirby với 200 lượng khóa? Khi biến hình sẽ mất kirby cũ và bạn nhận ngẫu nhiên kirby mới!';



echo '<form method="post"><input type="submit" name="submit" value="Biến hình"></form>';
echo'</div>';
echo '</center>';
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