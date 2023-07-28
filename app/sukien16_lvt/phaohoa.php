<?php
define('_IN_JOHNCMS', 1);
$textl = 'Sự Kiện 1/6';
$headmod = 'id_user';
$rootpath='../../';
require_once ("../../incfiles/core.php");
require_once ("../../incfiles/head.php");
echo'<div class="phdr">Sự Kiện Mùa Hè 2020</div>';

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
if ($datauser['postforum']<2) {
    echo'<div class="omenu">Bạn cần đạt 2 bài viết để vào đây</div>';
require_once ("../../incfiles/end.php");
exit;
}
switch($act) {
default:
echo'<div class="mainblok"><table width="100%" border="0" cellspacing="0" class="profile-info"><tbody><tr><td class="left-info" width="25%"><center><b>Tên:</b>Bắn Pháo Hoa Xu (Đua TOP)<br>
<b><font color="red"> Giá 30k xu/1 lần Bắn</font></b>
<br><br><img src="https://i.imgur.com/DDv9Fai.png"></center></td><td class="right-info" width="75%"><b> <br>Bắn Pháo Xu<br><a href="?act=phaoxu"> <input type="button" value="Bắn Pháo Xu" class="nut"></a></b></td></tr></tbody></table><table width="100%" border="0" cellspacing="0" class="profile-info"><tbody><tr><td class="left-info" width="25%"><center><b>Tên:</b>Bắn Pháo Hoa Lượng (Đua TOP)<br>
<b><font color="red"> Giá 7 lượng/1 lần bắn</font></b>
<br><br><img src="https://i.imgur.com/DDv9Fai.png"></center></td><td class="right-info" width="75%"><b> <br>Bắn Pháo Lượng <br><a href="?act=phaoluong"> <input type="button" value="Bắn Pháo Lượng" class="nut"></a></b></td></tr></tbody></table><table width="100%" border="0" cellspacing="0" class="profile-info"><tbody><tr><td class="left-info" width="25%"><center><b>Tên:</b>Bắn Pháo Liên Hoàn (Đua TOP)<br>
<b><font color="red"> Giá 7 lượng và 30k xu/1 lần bắn</font></b>
<br><br><img src="https://i.imgur.com/P6aPTVV.png"></center></td><td class="right-info" width="75%"><b> <br>Bắn Pháo Liên Hoàn <br><a href="?act=phaolienhoan"> <input type="button" value="Bắn Pháo Liên Hoàn" class="nut"></a></b></td></tr></tbody></table></div>';
break;
case 'phaoxu':
if (isset($_POST[submit])) {

$rand=rand(1,4);
$rand2=rand(1,3);
if ($datauser['xu']< 300000) {
echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn không đủ xu để bắn!</div>';

} else {
	echo '<div class="omenu">Bắn thành công 10 pháo hoa - bạn bị - 300.000 xu</div>';
	if ($rand==1){
		echo'<div class="omenu">Bạn nhận được '.$rand2.' đá nâng cấp</div>';
		mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$rand2."' WHERE `user_id`='".$user_id."' AND `id_shop`='60'");

	} 
		
	echo'<audio id="audio" autoplay >
  <source src="https://yeualo.com/wp-content/uploads/Tieng-phao-hoa-no-www_yeualo_com.mp3" type="audio/ogg">
   
</audio>';
?>
<script type="text/javascript">
// <![CDATA[
var bits=80;
var speed=40; // Tốc độ như thế nào, càng nhỏ càng nhanh
var bangs=10; // Số pháo hoa có thể xuất hiện cùng lúc (Nhiều quá sẽ có thể gây lag cho trình duyệt)
var colours=new Array("#03f", "#f03", "#0e0", "#93f", "#0cf", "#f93", "#f0c");
//                     Xanh    Đỏ     Xanh lá   Tía  Xanh cyan  Cam   Hồng
var bangheight=new Array();
var intensity=new Array();
var colour=new Array();
var Xpos=new Array();
var Ypos=new Array();
var dX=new Array();
var dY=new Array();
var stars=new Array();
var decay=new Array();
var swide=800;
var shigh=600;
var boddie;
window.onload=function() { if (document.getElementById) {
  var i;
  boddie=document.createElement("div");
  boddie.style.position="fixed";
  boddie.style.top="0px";
  boddie.style.left="0px";
  boddie.style.overflow="visible";
  boddie.style.width="1px";
  boddie.style.height="1px";
  boddie.style.backgroundColor="transparent";
  document.body.appendChild(boddie);
  set_width();
  for (i=0; i<bangs; i++) {
    write_fire(i);
    launch(i);
    setInterval('stepthrough('+i+')', speed);
  }
}}
function write_fire(N) {
  var i, rlef, rdow;
  stars[N+'r']=createDiv('|', 12);
  boddie.appendChild(stars[N+'r']);
  for (i=bits*N; i<bits+bits*N; i++) {
    stars[i]=createDiv('*', 13);
    boddie.appendChild(stars[i]);
  }
}
function createDiv(char, size) {
  var div=document.createElement("div");
  div.style.font=size+"px monospace";
  div.style.position="absolute";
  div.style.backgroundColor="transparent";
  div.appendChild(document.createTextNode(char));
  return (div);
}
function launch(N) {
  colour[N]=Math.floor(Math.random()*colours.length);
  Xpos[N+"r"]=swide*0.5;
  Ypos[N+"r"]=shigh-5;
  bangheight[N]=Math.round((0.5+Math.random())*shigh*0.4);
  dX[N+"r"]=(Math.random()-0.5)*swide/bangheight[N];
  if (dX[N+"r"]>1.25) stars[N+"r"].firstChild.nodeValue="/";
  else if (dX[N+"r"]<-1.25) stars[N+"r"].firstChild.nodeValue="\\";
  else stars[N+"r"].firstChild.nodeValue="|";
  stars[N+"r"].style.color=colours[colour[N]];
}
function bang(N) {
  var i, Z, A=0;
  for (i=bits*N; i<bits+bits*N; i++) {
    Z=stars[i].style;
    Z.left=Xpos[i]+"px";
    Z.top=Ypos[i]+"px";
    if (decay[i]) decay[i]--;
    else A++;
    if (decay[i]==15) Z.fontSize="7px";
    else if (decay[i]==7) Z.fontSize="2px";
    else if (decay[i]==1) Z.visibility="hidden";
    Xpos[i]+=dX[i];
    Ypos[i]+=(dY[i]+=1.25/intensity[N]);
  }
  if (A!=bits) setTimeout("bang("+N+")", speed);
}
function stepthrough(N) {
  var i, M, Z;
  var oldx=Xpos[N+"r"];
  var oldy=Ypos[N+"r"];
  Xpos[N+"r"]+=dX[N+"r"];
  Ypos[N+"r"]-=4;
  if (Ypos[N+"r"]<bangheight[N]) {
    M=Math.floor(Math.random()*3*colours.length);
    intensity[N]=5+Math.random()*4;
    for (i=N*bits; i<bits+bits*N; i++) {
      Xpos[i]=Xpos[N+"r"];
      Ypos[i]=Ypos[N+"r"];
      dY[i]=(Math.random()-0.5)*intensity[N];
      dX[i]=(Math.random()-0.5)*(intensity[N]-Math.abs(dY[i]))*1.25;
      decay[i]=16+Math.floor(Math.random()*16);
      Z=stars[i];
      if (M<colours.length) Z.style.color=colours[i%2?colour[N]:M];
      else if (M<2*colours.length) Z.style.color=colours[colour[N]];
      else Z.style.color=colours[i%colours.length];
      Z.style.fontSize="13px";
      Z.style.visibility="visible";
    }
    bang(N);
    launch(N);
  }
  stars[N+"r"].style.left=oldx+"px";
  stars[N+"r"].style.top=oldy+"px";
}
window.onresize=set_width;
function set_width() {
  var sw_min=999999;
  var sh_min=999999;
  if (document.documentElement && document.documentElement.clientWidth) {
    if (document.documentElement.clientWidth>0) sw_min=document.documentElement.clientWidth;
    if (document.documentElement.clientHeight>0) sh_min=document.documentElement.clientHeight;
  }
  if (typeof(self.innerWidth)!="undefined" && self.innerWidth) {
    if (self.innerWidth>0 && self.innerWidth<sw_min) sw_min=self.innerWidth;
    if (self.innerHeight>0 && self.innerHeight<sh_min) sh_min=self.innerHeight;
  }
  if (document.body.clientWidth) {
    if (document.body.clientWidth>0 && document.body.clientWidth<sw_min) sw_min=document.body.clientWidth;
    if (document.body.clientHeight>0 && document.body.clientHeight<sh_min) sh_min=document.body.clientHeight;
  }
  if (sw_min==999999 || sh_min==999999) {
    sw_min=800;
    sh_min=600;
  }
  swide=sw_min;
  shigh=sh_min;
}
// ]]>
</script> 
<?php
mysql_query("UPDATE `users` SET `xu` = `xu` - '300000',`banphaohoa`=`banphaohoa`+'10' WHERE `id`= '".$user_id."'");

}
}
echo'<div class="mainblok"><center><div class="omenu"><b> Bắn Pháo Xu 30k/1 phát</b><br>
<b><font color="red">Cùng nhau Bắn Pháo và nhận quà khủng ngay nào các bạn !!</font></b><br>
<br><br><div class="map"><img src="https://i.imgur.com/DDv9Fai.png"></div><b> <br> Bạn có '.number_format($datauser['xu']).' xu<br><form action="?act=phaoxu"   method="post"><input type="submit" name="submit" value="Bắn 10 Phát"></form><br><b> Lưu Ý : Bắn 10 Phát</b></b></div></center></div>';
//$dns=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='121'"));


break;
case 'phaoluong':
if (isset($_POST[submit])) {

$rand=rand(1,3);
$rand2=rand(1,6);
if ($datauser['luong']< 70) {
echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn không đủ lượng để bắn!</div>';

} else {
	echo '<div class="omenu">Bắn thành công 10 pháo hoa - bạn bị - 70 lượng</div>';
	if ($rand==1){
		echo'<div class="omenu">Bạn nhận được '.$rand2.' đá nâng cấp</div>';
		mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$rand2."' WHERE `user_id`='".$user_id."' AND `id_shop`='60'");

	} 
		
	echo'<audio id="audio" autoplay >
  <source src="https://yeualo.com/wp-content/uploads/Tieng-phao-hoa-no-www_yeualo_com.mp3" type="audio/ogg">
   
</audio>';
?>
<script type="text/javascript">
// <![CDATA[
var bits=80;
var speed=40; // Tốc độ như thế nào, càng nhỏ càng nhanh
var bangs=10; // Số pháo hoa có thể xuất hiện cùng lúc (Nhiều quá sẽ có thể gây lag cho trình duyệt)
var colours=new Array("#03f", "#f03", "#0e0", "#93f", "#0cf", "#f93", "#f0c");
//                     Xanh    Đỏ     Xanh lá   Tía  Xanh cyan  Cam   Hồng
var bangheight=new Array();
var intensity=new Array();
var colour=new Array();
var Xpos=new Array();
var Ypos=new Array();
var dX=new Array();
var dY=new Array();
var stars=new Array();
var decay=new Array();
var swide=800;
var shigh=600;
var boddie;
window.onload=function() { if (document.getElementById) {
  var i;
  boddie=document.createElement("div");
  boddie.style.position="fixed";
  boddie.style.top="0px";
  boddie.style.left="0px";
  boddie.style.overflow="visible";
  boddie.style.width="1px";
  boddie.style.height="1px";
  boddie.style.backgroundColor="transparent";
  document.body.appendChild(boddie);
  set_width();
  for (i=0; i<bangs; i++) {
    write_fire(i);
    launch(i);
    setInterval('stepthrough('+i+')', speed);
  }
}}
function write_fire(N) {
  var i, rlef, rdow;
  stars[N+'r']=createDiv('|', 12);
  boddie.appendChild(stars[N+'r']);
  for (i=bits*N; i<bits+bits*N; i++) {
    stars[i]=createDiv('*', 13);
    boddie.appendChild(stars[i]);
  }
}
function createDiv(char, size) {
  var div=document.createElement("div");
  div.style.font=size+"px monospace";
  div.style.position="absolute";
  div.style.backgroundColor="transparent";
  div.appendChild(document.createTextNode(char));
  return (div);
}
function launch(N) {
  colour[N]=Math.floor(Math.random()*colours.length);
  Xpos[N+"r"]=swide*0.5;
  Ypos[N+"r"]=shigh-5;
  bangheight[N]=Math.round((0.5+Math.random())*shigh*0.4);
  dX[N+"r"]=(Math.random()-0.5)*swide/bangheight[N];
  if (dX[N+"r"]>1.25) stars[N+"r"].firstChild.nodeValue="/";
  else if (dX[N+"r"]<-1.25) stars[N+"r"].firstChild.nodeValue="\\";
  else stars[N+"r"].firstChild.nodeValue="|";
  stars[N+"r"].style.color=colours[colour[N]];
}
function bang(N) {
  var i, Z, A=0;
  for (i=bits*N; i<bits+bits*N; i++) {
    Z=stars[i].style;
    Z.left=Xpos[i]+"px";
    Z.top=Ypos[i]+"px";
    if (decay[i]) decay[i]--;
    else A++;
    if (decay[i]==15) Z.fontSize="7px";
    else if (decay[i]==7) Z.fontSize="2px";
    else if (decay[i]==1) Z.visibility="hidden";
    Xpos[i]+=dX[i];
    Ypos[i]+=(dY[i]+=1.25/intensity[N]);
  }
  if (A!=bits) setTimeout("bang("+N+")", speed);
}
function stepthrough(N) {
  var i, M, Z;
  var oldx=Xpos[N+"r"];
  var oldy=Ypos[N+"r"];
  Xpos[N+"r"]+=dX[N+"r"];
  Ypos[N+"r"]-=4;
  if (Ypos[N+"r"]<bangheight[N]) {
    M=Math.floor(Math.random()*3*colours.length);
    intensity[N]=5+Math.random()*4;
    for (i=N*bits; i<bits+bits*N; i++) {
      Xpos[i]=Xpos[N+"r"];
      Ypos[i]=Ypos[N+"r"];
      dY[i]=(Math.random()-0.5)*intensity[N];
      dX[i]=(Math.random()-0.5)*(intensity[N]-Math.abs(dY[i]))*1.25;
      decay[i]=16+Math.floor(Math.random()*16);
      Z=stars[i];
      if (M<colours.length) Z.style.color=colours[i%2?colour[N]:M];
      else if (M<2*colours.length) Z.style.color=colours[colour[N]];
      else Z.style.color=colours[i%colours.length];
      Z.style.fontSize="13px";
      Z.style.visibility="visible";
    }
    bang(N);
    launch(N);
  }
  stars[N+"r"].style.left=oldx+"px";
  stars[N+"r"].style.top=oldy+"px";
}
window.onresize=set_width;
function set_width() {
  var sw_min=999999;
  var sh_min=999999;
  if (document.documentElement && document.documentElement.clientWidth) {
    if (document.documentElement.clientWidth>0) sw_min=document.documentElement.clientWidth;
    if (document.documentElement.clientHeight>0) sh_min=document.documentElement.clientHeight;
  }
  if (typeof(self.innerWidth)!="undefined" && self.innerWidth) {
    if (self.innerWidth>0 && self.innerWidth<sw_min) sw_min=self.innerWidth;
    if (self.innerHeight>0 && self.innerHeight<sh_min) sh_min=self.innerHeight;
  }
  if (document.body.clientWidth) {
    if (document.body.clientWidth>0 && document.body.clientWidth<sw_min) sw_min=document.body.clientWidth;
    if (document.body.clientHeight>0 && document.body.clientHeight<sh_min) sh_min=document.body.clientHeight;
  }
  if (sw_min==999999 || sh_min==999999) {
    sw_min=800;
    sh_min=600;
  }
  swide=sw_min;
  shigh=sh_min;
}
// ]]>
</script> 
<?php
mysql_query("UPDATE `users` SET `luong` = `luong` - '70',`banphaohoa`=`banphaohoa`+'10' WHERE `id`= '".$user_id."'");

}
}
echo'<div class="mainblok"><center><div class="omenu"><b> Bắn Pháo Lượng 7 lượng/1 phát</b><br>
<b><font color="red">Cùng nhau Bắn Pháo và nhận quà khủng ngay nào các bạn !!</font></b><br>
<br><br><div class="map"><img src="https://i.imgur.com/DDv9Fai.png"></div><b> <br> Bạn có '.number_format($datauser['luong']).' lượng<br><form action="?act=phaoluong"   method="post"><input type="submit" name="submit" value="Bắn 10 Phát"></form><br><b> Lưu Ý : Bắn 10 Phát</b></b></div></center></div>';
//$dns=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='121'"));

break;
case 'phaolienhoan':
if (isset($_POST[submit])) {

$rand=rand(1,2);
$rand2=rand(1,10);
if ($datauser['luong']< 70 || $datauser['xu']< 300000 ) {
echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn không đủ xu hoặc lượng để bắn!</div>';

} else {
	echo '<div class="omenu">Bắn thành công 10 pháo hoa - bạn bị - 70 lượng và 300.000 xu</div>';
	if ($rand==1){
		echo'<div class="omenu">Bạn nhận được '.$rand2.' đá nâng cấp</div>';
		mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$rand2."' WHERE `user_id`='".$user_id."' AND `id_shop`='60'");

	} 
		
	echo'<audio id="audio" autoplay >
  <source src="https://yeualo.com/wp-content/uploads/Tieng-phao-hoa-no-www_yeualo_com.mp3" type="audio/ogg">
   
</audio>';
?>
<script type="text/javascript">
// <![CDATA[
var bits=80;
var speed=40; // Tốc độ như thế nào, càng nhỏ càng nhanh
var bangs=10; // Số pháo hoa có thể xuất hiện cùng lúc (Nhiều quá sẽ có thể gây lag cho trình duyệt)
var colours=new Array("#03f", "#f03", "#0e0", "#93f", "#0cf", "#f93", "#f0c");
//                     Xanh    Đỏ     Xanh lá   Tía  Xanh cyan  Cam   Hồng
var bangheight=new Array();
var intensity=new Array();
var colour=new Array();
var Xpos=new Array();
var Ypos=new Array();
var dX=new Array();
var dY=new Array();
var stars=new Array();
var decay=new Array();
var swide=800;
var shigh=600;
var boddie;
window.onload=function() { if (document.getElementById) {
  var i;
  boddie=document.createElement("div");
  boddie.style.position="fixed";
  boddie.style.top="0px";
  boddie.style.left="0px";
  boddie.style.overflow="visible";
  boddie.style.width="1px";
  boddie.style.height="1px";
  boddie.style.backgroundColor="transparent";
  document.body.appendChild(boddie);
  set_width();
  for (i=0; i<bangs; i++) {
    write_fire(i);
    launch(i);
    setInterval('stepthrough('+i+')', speed);
  }
}}
function write_fire(N) {
  var i, rlef, rdow;
  stars[N+'r']=createDiv('|', 12);
  boddie.appendChild(stars[N+'r']);
  for (i=bits*N; i<bits+bits*N; i++) {
    stars[i]=createDiv('*', 13);
    boddie.appendChild(stars[i]);
  }
}
function createDiv(char, size) {
  var div=document.createElement("div");
  div.style.font=size+"px monospace";
  div.style.position="absolute";
  div.style.backgroundColor="transparent";
  div.appendChild(document.createTextNode(char));
  return (div);
}
function launch(N) {
  colour[N]=Math.floor(Math.random()*colours.length);
  Xpos[N+"r"]=swide*0.5;
  Ypos[N+"r"]=shigh-5;
  bangheight[N]=Math.round((0.5+Math.random())*shigh*0.4);
  dX[N+"r"]=(Math.random()-0.5)*swide/bangheight[N];
  if (dX[N+"r"]>1.25) stars[N+"r"].firstChild.nodeValue="/";
  else if (dX[N+"r"]<-1.25) stars[N+"r"].firstChild.nodeValue="\\";
  else stars[N+"r"].firstChild.nodeValue="|";
  stars[N+"r"].style.color=colours[colour[N]];
}
function bang(N) {
  var i, Z, A=0;
  for (i=bits*N; i<bits+bits*N; i++) {
    Z=stars[i].style;
    Z.left=Xpos[i]+"px";
    Z.top=Ypos[i]+"px";
    if (decay[i]) decay[i]--;
    else A++;
    if (decay[i]==15) Z.fontSize="7px";
    else if (decay[i]==7) Z.fontSize="2px";
    else if (decay[i]==1) Z.visibility="hidden";
    Xpos[i]+=dX[i];
    Ypos[i]+=(dY[i]+=1.25/intensity[N]);
  }
  if (A!=bits) setTimeout("bang("+N+")", speed);
}
function stepthrough(N) {
  var i, M, Z;
  var oldx=Xpos[N+"r"];
  var oldy=Ypos[N+"r"];
  Xpos[N+"r"]+=dX[N+"r"];
  Ypos[N+"r"]-=4;
  if (Ypos[N+"r"]<bangheight[N]) {
    M=Math.floor(Math.random()*3*colours.length);
    intensity[N]=5+Math.random()*4;
    for (i=N*bits; i<bits+bits*N; i++) {
      Xpos[i]=Xpos[N+"r"];
      Ypos[i]=Ypos[N+"r"];
      dY[i]=(Math.random()-0.5)*intensity[N];
      dX[i]=(Math.random()-0.5)*(intensity[N]-Math.abs(dY[i]))*1.25;
      decay[i]=16+Math.floor(Math.random()*16);
      Z=stars[i];
      if (M<colours.length) Z.style.color=colours[i%2?colour[N]:M];
      else if (M<2*colours.length) Z.style.color=colours[colour[N]];
      else Z.style.color=colours[i%colours.length];
      Z.style.fontSize="13px";
      Z.style.visibility="visible";
    }
    bang(N);
    launch(N);
  }
  stars[N+"r"].style.left=oldx+"px";
  stars[N+"r"].style.top=oldy+"px";
}
window.onresize=set_width;
function set_width() {
  var sw_min=999999;
  var sh_min=999999;
  if (document.documentElement && document.documentElement.clientWidth) {
    if (document.documentElement.clientWidth>0) sw_min=document.documentElement.clientWidth;
    if (document.documentElement.clientHeight>0) sh_min=document.documentElement.clientHeight;
  }
  if (typeof(self.innerWidth)!="undefined" && self.innerWidth) {
    if (self.innerWidth>0 && self.innerWidth<sw_min) sw_min=self.innerWidth;
    if (self.innerHeight>0 && self.innerHeight<sh_min) sh_min=self.innerHeight;
  }
  if (document.body.clientWidth) {
    if (document.body.clientWidth>0 && document.body.clientWidth<sw_min) sw_min=document.body.clientWidth;
    if (document.body.clientHeight>0 && document.body.clientHeight<sh_min) sh_min=document.body.clientHeight;
  }
  if (sw_min==999999 || sh_min==999999) {
    sw_min=800;
    sh_min=600;
  }
  swide=sw_min;
  shigh=sh_min;
}
// ]]>
</script> 
<?php
mysql_query("UPDATE `users` SET `luong` = `luong` - '70',`xu`=`xu`-'300000',`banphaohoa`=`banphaohoa`+'20' WHERE `id`= '".$user_id."'");

}
}
echo'<div class="mainblok"><center><div class="omenu"><b> Bắn Pháo Xu & Lượng 30000 xu & 7 lượng/1 phát</b><br>
<b><font color="red">Cùng nhau Bắn Pháo và nhận quà khủng ngay nào các bạn !!</font></b><br>
<br><br><div class="map"><img src="https://i.imgur.com/P6aPTVV.png"></div><b> <br> Bạn có '.number_format($datauser['luong']).' lượng - '.number_format($datauser['xu']).' xu<br><form action="?act=phaolienhoan"   method="post"><input type="submit" name="submit" value="Bắn 10 Phát"></form><br><b> Lưu Ý : Bắn 10 Phát</b></b></div></center></div>';
//$dns=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='121'"));


break;

}
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
<?php
require('../../incfiles/end.php');