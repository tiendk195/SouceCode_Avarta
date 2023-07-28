<?php
define('_IN_JOHNCMS', 1);
$textl = 'Ai Cập';
$headmod = 'id_user';
$rootpath='../../';
require_once ("../../incfiles/core.php");
require_once ("../../incfiles/head.php");
echo'<style>body{min-width: 700px}</style>';

 ?>
<script type="text/javascript">
$(document).ready(function(){
	$('#btn-danh').click(function(){
		var idvp = $('#idvp').val();
		var url = "danh1-load.php";
		var data = {"danh": "", "idvp": idvp};
		$('#content-load').load(url, data);
		return false;
	});
});
</script>
<script type="text/javascript"> 
setInterval(function(){
 $( "#wnew" ).load( "wnew-load.php" );
 }, 500);
</script>
<?php
if (isset($_COOKIE['the']))
{
$the = $_COOKIE['the'];
}
elseif (!$is_mobile)
{
$the = 'web';
} else {
$the = 'wap';
}


?>
<style>
.bt {
    height: 110px;
    background: url(https://i.imgur.com/foF58F2.png);
    background-repeat: repeat;
}
.cat {
     background: url(https://i.imgur.com/I9NKcfB.png);
    padding: 2px;
}
.nen {
    background: url(https://i.imgur.com/iKDqL8V.png) repeat-x;
}

</style>
<?php
//Keet thuc topic
$vtt = mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id` = '".$user_id."' AND `id_shop`='259' LIMIT 1"));
if ($vtt['soluong']<1){
    echo'<div class="phdr">Lỗi yêu cầu</div>';
    echo'<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn không có vé vào ai cập <img src="/images/vatpham/259.png"></div>';
Require('../../incfiles/end.php');
exit;
}
mysql_query("UPDATE `users` SET `timeaicap`='".time()."' WHERE `id`='{$user_id}'");
mysql_query("UPDATE `users` SET `vitri`='668' WHERE `id`='{$user_id}'");

echo'<div class="phdr"> Ai Cập</div>';

echo'<span id="wnew"></span>';



echo'<div class="omenu"  style="background: #000000"><img src="https://i.imgur.com/vFiRh2X.png" style="float:left"><img src="https://i.imgur.com/vFiRh2X.png" style="float:right" class="xavt"></br></br>';
echo'</br>';
echo'<div class="cat">
<center>';
 echo'<a href="cua3.php"><img src="/images/vao.gif" style="position:absolute;margin: -36px 0 0 -14px;"></a>';
echo'<a href="map.php"><img src="/images/vao.gif" style="position:absolute;margin: 71px 0 0 -303px;"></a>';
echo'<a href="cua2.php"><img src="/images/vao.gif" style="position:absolute;margin: 71px 0 0 275px;"></a>';
echo'<img src="https://i.imgur.com/MvSFoA2.png" style="position:absolute;margin: 140px 0 0 -302px;">';
echo'<img src="https://i.imgur.com/MvSFoA2.png" style="position:absolute;margin: 140px 0 0 279px;">';

//-- Online Topic ---//
$online_u = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `lastdate` > " . (time() - 300) . " AND `vitri` = '668'"), 0);
$totalonline = $online_u;
$q = @mysql_query("select * from `users` where `lastdate` > " . (time() - 300) . " AND `vitri` = '668';");
$count = mysql_num_rows($q);
while ($arr = mysql_fetch_array($q)){
$trinhtrangvip = mysql_query("select `rights` from `users` where id='" . $arr['id'] . "'");
$trinhtrangviphonnua = mysql_fetch_array($trinhtrangvip);
if($arr['id'] != $datauser['id']){
	if ($datauser['zombie']==1 and $arr['zombie']!=1){
$u_on[]='<label style="display: inline-block;text-align: center;"><input type="hidden" id="idvp" name="idvp" value="'.$arr['id'].'"><img src="/avatar/' . $arr['id'] . '.png"><form method="post"><input type="submit" id="btn-danh" name="danh" value="Đánh"></form></label>';
} else {
 $u_on[]='<label style="display: inline-block;text-align: center;"><a href="/member/' . $arr['id'] . '.html"><img src="/avatar/' . $arr['id'] . '.png"></a></label>';   
}
}else{
}
}
//Keet thuc topic


echo'</center></br></br>';
    echo '<div id="content-load">';

if ($online_u > 0){
echo implode(' ',$u_on).'';
}else{
	echo '<label style="display: inline-block;text-align: center;"><b style="font-size: 9px;color:red;font-weight:bold;text-align: center;">'.$datauser['name'].'</b><br><img src="/avatar/' . $datauser['id'] . '.png"></label>';
}
echo'<label style="display: inline-block;text-align: center;"><a href="/member/' . $datauser['id'] . '.html"><img src="/avatar/'.$user_id.'.png"></a></label>';

echo'</div>';

   
/*
} else if($the == 'wap'){
     echo'<a href="cua3.php"><img src="/images/vao.gif" style="position:absolute;margin: -130px 0 0 103px;"></a>';
echo'<a href="map.php"><img src="/images/vao.gif" style="position:absolute;margin: 49px 0 0 -55px;"></a>';
echo'<a href="cua2.php"><img src="/images/vao.gif" style="position:absolute;margin: 49px 0 0 262px;"></a>';
echo'<img src="https://i.imgur.com/MvSFoA2.png" style="position:absolute;margin: 97px 0 0 -50px;">';
echo'<img src="https://i.imgur.com/MvSFoA2.png" style="position:absolute;margin: 97px 0 0 265px;">';
}
*/

echo'</br></br></br></br></br></br></br></br></br><div class="nen"></br>


</div></div>';



echo'</div>';




require('../../incfiles/end.php');
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