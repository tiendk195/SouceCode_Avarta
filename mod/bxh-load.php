<?php

define('_IN_JOHNCMS', 1);

require_once ("../incfiles/core.php");

if ($id==1){
    echo'<div class="gd_"><div class="pmenu"><table width="100%" border="0" cellspacing="0"><tbody><tr class=""><td width="20%"><div id="tt_get1"><div class="gd_get"><center><img onclick="hien(1)" src="icon/chimuc/1.png"></center></div></div></td><td width="20%"><div id="tt_get2"><div class="gd_not"><center><img onclick="hien(2)" src="icon/chimuc/2.png"></center></div></div></td><td width="20%"><div id="tt_get3"><div class="gd_not"><center><img onclick="hien(3)" src="icon/chimuc/3.png"></center></div></div></td><td width="20%"><div id="tt_get4"><div class="gd_not"><center><img onclick="hien(4)" src="icon/chimuc/4.png"></center></div></div></td><td width="20%"><div id="tt_get5"><div class="gd_not"><center><img onclick="hien(5)" src="icon/chimuc/5.png"></center></div></div></td></tr></tbody></table></div></div>';

$vnviet= mysql_query("SELECT * FROM users WHERE `level`=`level` >= 0 AND `rights` < 9 AND `id`!=2  AND `id`!=1 AND `id`!=256  ORDER BY `level` DESC LIMIT 3");
$i=1;
while
($res=mysql_fetch_array($vnviet)) {
echo'<div class="gd_"><table width="100%" border="0" cellspacing="0">
<tbody><tr><td width="40%"><div class="pmenu">';
if ($i == 1){
echo'
<img src="https://i.imgur.com/7X0RBwO.png align=" left"="">';
}
if ($i == 2){
echo'
<img src="https://i.imgur.com/tkrBSeq.png align=" left"="">';
}
if ($i == 3){
echo'
<img src="https://i.imgur.com/pLiJHlM.png align=" left"="">';
}

echo'
<center><a href="/member/'.$res['id'].'.html">   '.nick($res['id']).'</a><br>';
if ($i==1){
echo'
<img src="https://i.imgur.com/VCVU0En.gif">';
} 
if ($i==2){
echo'
<img src="https://i.imgur.com/DjGfwr4.gif">';
} 
if ($i==3){
echo'
<img src="https://i.imgur.com/75AqX5s.gif">';
} 

echo'<img src="/avatar/'.$res['id'].'.png" style="position: absolute;verticalalign: 0 px;margin:5px 0 0 -50px;"></center></div></td>
<td width="60%"><div class="pmenu"><center>Level: '.number_format($res['level']).' +'.number_format($res['chisolevel']).'% </center></div></td></tr></tbody></table></div>';
$i++;

}
}

//
if ($id==2){

echo'<div class="gd_"><div class="pmenu"><table width="100%" border="0" cellspacing="0"><tbody><tr class=""><td width="20%"><div id="tt_get1"><div class="gd_not"><center><img onclick="hien(1)" src="icon/chimuc/1.png"></center></div></div></td><td width="20%"><div id="tt_get2"><div class="gd_get"><center><img onclick="hien(2)" src="icon/chimuc/2.png"></center></div></div></td><td width="20%"><div id="tt_get3"><div class="gd_not"><center><img onclick="hien(3)" src="icon/chimuc/3.png"></center></div></div></td><td width="20%"><div id="tt_get4"><div class="gd_not"><center><img onclick="hien(4)" src="icon/chimuc/4.png"></center></div></div></td><td width="20%"><div id="tt_get5"><div class="gd_not"><center><img onclick="hien(5)" src="icon/chimuc/5.png"></center></div></div></td></tr></tbody></table></div></div>';
$vnviet= mysql_query("SELECT * FROM users WHERE `luong`=`luong` >= 0 AND `rights` < 9 AND `id`!=2  AND `id`!=1 AND `id`!=256  ORDER BY `luong` DESC LIMIT 3");
$i=1;
while
($res=mysql_fetch_array($vnviet)) {
echo'<div class="gd_"><table width="100%" border="0" cellspacing="0">
<tbody><tr><td width="40%"><div class="pmenu">';
if ($i == 1){
echo'
<img src="https://i.imgur.com/7X0RBwO.png align=" left"="">';
}
if ($i == 2){
echo'
<img src="https://i.imgur.com/tkrBSeq.png align=" left"="">';
}
if ($i == 3){
echo'
<img src="https://i.imgur.com/pLiJHlM.png align=" left"="">';
}

echo'
<center><a href="/member/'.$res['id'].'.html">   '.nick($res['id']).'</a><br>';
if ($i==1){
echo'
<img src="https://i.imgur.com/VCVU0En.gif">';
} 
if ($i==2){
echo'
<img src="https://i.imgur.com/DjGfwr4.gif">';
} 
if ($i==3){
echo'
<img src="https://i.imgur.com/75AqX5s.gif">';
} 

echo'<img src="/avatar/'.$res['id'].'.png" style="position: absolute;verticalalign: 0 px;margin:5px 0 0 -50px;"></center></div></td>
<td width="60%"><div class="pmenu"><center>Lượng: '.number_format($res['luong']).' </center></div></td></tr></tbody></table></div>';
$i++;

}
}
//
if ($id==3){
echo'<div class="gd_"><div class="pmenu"><table width="100%" border="0" cellspacing="0"><tbody><tr class=""><td width="20%"><div id="tt_get1"><div class="gd_not"><center><img onclick="hien(1)" src="icon/chimuc/1.png"></center></div></div></td><td width="20%"><div id="tt_get2"><div class="gd_not"><center><img onclick="hien(2)" src="icon/chimuc/2.png"></center></div></div></td><td width="20%"><div id="tt_get3"><div class="gd_get"><center><img onclick="hien(3)" src="icon/chimuc/3.png"></center></div></div></td><td width="20%"><div id="tt_get4"><div class="gd_not"><center><img onclick="hien(4)" src="icon/chimuc/4.png"></center></div></div></td><td width="20%"><div id="tt_get5"><div class="gd_not"><center><img onclick="hien(5)" src="icon/chimuc/5.png"></center></div></div></td></tr></tbody></table></div></div>';
$vnviet= mysql_query("SELECT * FROM users WHERE `luongkhoa`=`luongkhoa` >= 0 AND `rights` < 9 AND `id`!=2  AND `id`!=1 AND `id`!=256  ORDER BY `luongkhoa` DESC LIMIT 3");
$i=1;
while
($res=mysql_fetch_array($vnviet)) {
echo'<div class="gd_"><table width="100%" border="0" cellspacing="0">
<tbody><tr><td width="40%"><div class="pmenu">';
if ($i == 1){
echo'
<img src="https://i.imgur.com/7X0RBwO.png align=" left"="">';
}
if ($i == 2){
echo'
<img src="https://i.imgur.com/tkrBSeq.png align=" left"="">';
}
if ($i == 3){
echo'
<img src="https://i.imgur.com/pLiJHlM.png align=" left"="">';
}

echo'
<center><a href="/member/'.$res['id'].'.html">   '.nick($res['id']).'</a><br>';
if ($i==1){
echo'
<img src="https://i.imgur.com/VCVU0En.gif">';
} 
if ($i==2){
echo'
<img src="https://i.imgur.com/DjGfwr4.gif">';
} 
if ($i==3){
echo'
<img src="https://i.imgur.com/75AqX5s.gif">';
} 

echo'<img src="/avatar/'.$res['id'].'.png" style="position: absolute;verticalalign: 0 px;margin:5px 0 0 -50px;"></center></div></td>
<td width="60%"><div class="pmenu"><center>Lượng khóa: '.number_format($res['luongkhoa']).' </center></div></td></tr></tbody></table></div>';
$i++;

}
}
//
if ($id==4){
echo'<div class="gd_"><div class="pmenu"><table width="100%" border="0" cellspacing="0"><tbody><tr class=""><td width="20%"><div id="tt_get1"><div class="gd_not"><center><img onclick="hien(1)" src="icon/chimuc/1.png"></center></div></div></td><td width="20%"><div id="tt_get2"><div class="gd_not"><center><img onclick="hien(2)" src="icon/chimuc/2.png"></center></div></div></td><td width="20%"><div id="tt_get3"><div class="gd_not"><center><img onclick="hien(3)" src="icon/chimuc/3.png"></center></div></div></td><td width="20%"><div id="tt_get4"><div class="gd_get"><center><img onclick="hien(4)" src="icon/chimuc/4.png"></center></div></div></td><td width="20%"><div id="tt_get5"><div class="gd_not"><center><img onclick="hien(5)" src="icon/chimuc/5.png"></center></div></div></td></tr></tbody></table></div></div>';
$vnviet= mysql_query("SELECT * FROM users WHERE `xu`=`xu` >= 0 AND `rights` < 9 AND `id`!=2  AND `id`!=1 AND `id`!=256  ORDER BY `xu` DESC LIMIT 3");
$i=1;
while
($res=mysql_fetch_array($vnviet)) {
echo'<div class="gd_"><table width="100%" border="0" cellspacing="0">
<tbody><tr><td width="40%"><div class="pmenu">';
if ($i == 1){
echo'
<img src="https://i.imgur.com/7X0RBwO.png align=" left"="">';
}
if ($i == 2){
echo'
<img src="https://i.imgur.com/tkrBSeq.png align=" left"="">';
}
if ($i == 3){
echo'
<img src="https://i.imgur.com/pLiJHlM.png align=" left"="">';
}

echo'
<center><a href="/member/'.$res['id'].'.html">   '.nick($res['id']).'</a><br>';
if ($i==1){
echo'
<img src="https://i.imgur.com/VCVU0En.gif">';
} 
if ($i==2){
echo'
<img src="https://i.imgur.com/DjGfwr4.gif">';
} 
if ($i==3){
echo'
<img src="https://i.imgur.com/75AqX5s.gif">';
} 

echo'<img src="/avatar/'.$res['id'].'.png" style="position: absolute;verticalalign: 0 px;margin:5px 0 0 -50px;"></center></div></td>
<td width="60%"><div class="pmenu"><center>Xu: '.number_format($res['xu']).' </center></div></td></tr></tbody></table></div>';
$i++;

}
}

if ($id==5){
echo'<div class="gd_"><div class="pmenu"><table width="100%" border="0" cellspacing="0"><tbody><tr class=""><td width="20%"><div id="tt_get1"><div class="gd_not"><center><img onclick="hien(1)" src="icon/chimuc/1.png"></center></div></div></td><td width="20%"><div id="tt_get2"><div class="gd_not"><center><img onclick="hien(2)" src="icon/chimuc/2.png"></center></div></div></td><td width="20%"><div id="tt_get3"><div class="gd_not"><center><img onclick="hien(3)" src="icon/chimuc/3.png"></center></div></div></td><td width="20%"><div id="tt_get4"><div class="gd_not"><center><img onclick="hien(4)" src="icon/chimuc/4.png"></center></div></div></td><td width="20%"><div id="tt_get5"><div class="gd_get"><center><img onclick="hien(5)" src="icon/chimuc/5.png"></center></div></div></td></tr></tbody></table></div></div>';
$vnviet= mysql_query("SELECT * FROM users WHERE `naptuan`=`naptuan` >= 0 AND `rights` < 9 AND `id`!=2  AND `id`!=1 AND `id`!=256  ORDER BY `naptuan` DESC LIMIT 3");
$i=1;
while
($res=mysql_fetch_array($vnviet)) {
echo'<div class="gd_"><table width="100%" border="0" cellspacing="0">
<tbody><tr><td width="40%"><div class="pmenu">';
if ($i == 1){
echo'
<img src="https://i.imgur.com/7X0RBwO.png align=" left"="">';
}
if ($i == 2){
echo'
<img src="https://i.imgur.com/tkrBSeq.png align=" left"="">';
}
if ($i == 3){
echo'
<img src="https://i.imgur.com/pLiJHlM.png align=" left"="">';
}

echo'
<center><a href="/member/'.$res['id'].'.html">   '.nick($res['id']).'</a><br>';
if ($i==1){
echo'
<img src="https://i.imgur.com/VCVU0En.gif">';
} 
if ($i==2){
echo'
<img src="https://i.imgur.com/DjGfwr4.gif">';
} 
if ($i==3){
echo'
<img src="https://i.imgur.com/75AqX5s.gif">';
} 

echo'<img src="/avatar/'.$res['id'].'.png" style="position: absolute;verticalalign: 0 px;margin:5px 0 0 -50px;"></center></div></td>
<td width="60%"><div class="pmenu"><center>Đã nạp: '.number_format($res['naptuan']).' VNĐ</center></div></td></tr></tbody></table></div>';
$i++;

}
}
					

?>