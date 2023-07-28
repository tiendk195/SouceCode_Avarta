<?php
define('_IN_JOHNCMS', 1);
$textl = 'Sự Kiện Pokemon';
$headmod = 'id_user';
$rootpath='../../';
require_once ("../../incfiles/core.php");
require_once ("../../incfiles/head.php");
?>
<script type="text/javascript">
$(document).ready(function(){
	$('#btn-dap').click(function(){
		var idvp = $('#idvp').val();
		var url = "nangcap-load.php";
		var data = {"dap": "", "idvp": idvp,};
		$('#content-load').load(url, data);
		return false;
	});
});
</script>
<?php
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


	$time = time();

Echo'<div class="phdr"> Sự kiện Pokemon &gt; <a href="npcsukien.php"> Quay về</a></div>';
?>
<!--Edit by Lethinh-->
<?php

switch($act){
case'mua':
$vp=intval($_GET['id']);

IF($vp<1 or $vp>3 ){
Header('Location: /');
Exit;
}

    	if ($vp==1){
    	    $loaitien='xu';
    	        	        	    $lt='Xu';

    	    $gia=20000;
    	    $idvp=242;
    	    $tenvp='Bóng thường';

    	}
    	if ($vp==2){
    	    $loaitien='luong';
    	        	        	    $lt='Lượng';

    	    $gia=2;
    	    $idvp=242;
    	    $tenvp='Bóng thường';

    	}	
    	if ($vp==3){
    	    $loaitien='luongkhoa';
    	        	    $lt='Lượng khóa';

    	    $gia=10;
    	    $idvp=245;
    	    $tenvp='Bóng thần kì';

    	}
    	
IF(Isset($_POST['ok'])){
    	$sl=trim($_POST['sl']);
    	if ($vp==1){
    	   

    	    $giatien=$sl*20000;
    

    	}
    	if ($vp==2){
   
    	    $giatien=$sl*2;
    

    	}	
    	if ($vp==3){
    	   
    	    $giatien=$sl*10;


    	}

IF($datauser[$loaitien] >= $giatien AND $sl >0){
mysql_query("UPDATE `users` SET `$loaitien`=`$loaitien`-'".$giatien."' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$sl."' WHERE `user_id`='".$user_id."' AND `id_shop`='".$idvp."'");

Echo'<div class="omenu"><center><b><font color="red">Bạn đã mua thành công '.$tenvp.' *'.$sl.'</font></b></center></div>';

}Else{
Echo'<div class="omenu"><center><b><font color="red">Giao dịch thất bại !!<br>Bạn không đủ '.$lt.'</font></b></center></div>';
}


}

    

echo'<form method="post"><div class="omenu"><center><div class="ducnghia_item"><img src="/images/vatpham/'.$idvp.'.png" style="position: absolute;verticalalign: 0 px;margin:15px 0 0 -9px;"></div>
<br>Xác nhận mua vật phẩm <font color="green">'.$tenvp.'</font> với giá <font color="red">'.$gia.'   '.$lt.'</font> ?
<br>
<input type="number" name="sl" value="1"><br>
<input class="submit" type="submit" name="ok" value="Mua"> </center>
</div></form>';

break;
case'nangcap':
    echo'<table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info">
<tbody><tr>
<td class="left-info"><center><img src="/images/vatpham/245.png"></center>
</td>
<td class="right-info">
<b><font color="blue">Bóng thần kì</font></b><br>
Tỉ lệ thành công: <font color="red">5%</font> <br>
<center><a href="?act=nc&amp;id=6"><input type="submit" name="quay" value="Nâng cấp"></a></center></td>
</tr></tbody></table>';
echo'
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info">
<tbody><tr>
<td class="left-info"><center><img src="/images/vatpham/244.png"></center>
</td>
<td class="right-info">
<b><font color="blue">Bóng khởi đầu</font></b><br>
Tỉ lệ thành công: <font color="red">15%</font> <br>
<center><a href="?act=nc&amp;id=5"><input type="submit" name="quay" value="Nâng cấp"></a></center></td>
</tr></tbody></table>';
echo'<table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info">
<tbody><tr>
<td class="left-info"><center><img src="/images/vatpham/243.png"></center>
</td>
<td class="right-info">
<b><font color="blue">Bóng hi vọng</font></b><br>
Tỉ lệ thành công: <font color="red">20%</font> <br>
<center><a href="?act=nc&amp;id=4"><input type="submit" name="quay" value="Nâng cấp"></a></center></td>
</tr></tbody></table>';
break;
case'nc':
echo '<div id="content-load">';

    $vp=intval($_GET['id']);

IF($vp<3 or $vp>6 ){
Header('Location: /');
Exit;
}

    	if ($vp==4){
    	    $loaitien='xu';
    	    $lt='Xu';
    	    $tile=20;
    	    $can=3;

    	    $gia=5000;
    	    $idvp=243;
    	    $tenvp='Bóng hi vọng';

    	}
    
    	if ($vp==5){
    	    $loaitien='xu';
    	    $lt='Xu';
    	    $tile=15;
    	    $can=5;

    	    $gia=15000;
    	    $idvp=244;
    	    $tenvp='Bóng khởi đầu';

    	}
    	
    	if ($vp==6){
    	    $loaitien='luong';
    	    $lt='Lượng';
    	    $tile=5;
    	    $can=10;

    	    $gia=5;
    	    $idvp=245;
    	    $tenvp='Bóng thần kì';

    	}
    	$bong=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='242'"));

    	
IF(Isset($_POST['submit'])){
    	if ($vp==4){
    	    		if (($datauser['toc']==374 &&$datauser['ao']==615&&$datauser['quan']==408) or ( $datauser['toc']==375 &&$datauser['ao']==616&&$datauser['quan']==409) ){

    	   	 $rand=rand(1,2);
} else {
    	 $rand=rand(1,5);
    
}
    	}
    	if ($vp==5){
   
    	    		if (($datauser['toc']==374 &&$datauser['ao']==615&&$datauser['quan']==408) or ( $datauser['toc']==375 &&$datauser['ao']==616&&$datauser['quan']==409) ){

    	   	 $rand=rand(1,3);
} else {
    	 $rand=rand(1,7);
    
}
    

    	}	
    	if ($vp==6){
    	   
    	    		if (($datauser['toc']==374 &&$datauser['ao']==615&&$datauser['quan']==408) or ( $datauser['toc']==375 &&$datauser['ao']==616&&$datauser['quan']==409) ){

    	   	 $rand=rand(1,5);
} else {
    	 $rand=rand(1,10);
    
}


    	}

IF($datauser[$loaitien] < $gia || $bong['soluong'] <$can){
    Echo'<div class="omenu"><center><b><font color="red">Lỗi !!</font></b> Bạn không đủ tiền hoặc thiếu nguyên liệu</div>';
} else {
    if ($rand==1){
       Echo'<div class="omenu">Nâng cấp thành công <font color="red">'.$tenvp.'</font></div>';
 mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop`='".$idvp."'");

    } else   if ($rand>1){
       Echo'<div class="omenu">Nâng cấp thất bại</div>';
 
    }
    mysql_query("UPDATE `users` SET `$loaitien`=`$loaitien`-'".$gia."' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$can."' WHERE `user_id`='".$user_id."' AND `id_shop`='242'");
    
}


}

    
echo'<div class="omenu"><center><div class="ducnghia_item"><img src="/images/vatpham/'.$idvp.'.png" style="position: absolute;verticalalign: 0 px;margin:15px 0 0 -9px;"></div>
<br>Bạn có muốn nâng cấp <font color="red">'.$tenvp.'</font> từ <font color="green">'.$can.' Bóng thường <img src="/images/vatpham/242.png"> + '.$gia.'  '.$lt.'</font> 
<br>(tỉ lệ thành công <font color="red">'.$tile.'%</font>) không?<br>

<form method="post">
<input type="hidden" id="idvp" name="idvp" value="'.$id.'">

<input type="submit" id="btn-dap" name="dap" value="Nâng cấp">
</center></div></div></form>';

break;

    
default:
echo'<table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info">
<tbody><tr>
<td class="left-info"><center><img src="/images/vatpham/245.png"></center>
</td>
<td class="right-info">
<b><font color="blue">Bóng thần kì</font></b><br>
Giá bán: <font color="red">10   Lượng khóa</font> <br>
<center><a href="?act=mua&amp;id=3"><input type="submit" name="quay" value="Mua"></a></center></td>
</tr></tbody></table>';
echo'<table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info">
<tbody><tr>
<td class="left-info"><center><img src="/images/vatpham/242.png"></center>
</td>
<td class="right-info">
<b><font color="blue">Bóng thường</font></b><br>
Giá bán: <font color="red">2  Lượng  </font> <br>
<center><a href="?act=mua&amp;id=2"><input type="submit" name="quay" value="Mua"></a></center></td>
</tr></tbody></table>';
echo'<table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info">
<tbody><tr>
<td class="left-info"><center><img src="/images/vatpham/242.png"></center>
</td>
<td class="right-info">
<b><font color="blue">Bóng thường</font></b><br>
Giá bán: <font color="red">20,000 Xu  </font> <br>
<center><a href="?act=mua&amp;id=1"><input type="submit" name="quay" value="Mua"></a></center></td>
</tr></tbody></table>';

}
require('../../incfiles/end.php');?>
<script type="text/JavaScript">
var message="NoRightClicking"; function defeatIE() {if (document.all) {(message);return false;}} function defeatNS(e) {if (document.layers||(document.getElementById&&!document.all)) { if (e.which==2||e.which==3) {(message);return false;}}} if (document.layers) {document.captureEvents(Event.MOUSEDOWN);document.onmousedown=defeatNS;} else{document.onmouseup=defeatNS;document.oncontextmenu=defeatIE;} document.oncontextmenu=new Function("return false")
</script>
<script type='text/javascript'>
//<![CDATA[
//Ctrl+U
shortcut={all_shortcuts:{},add:function(a,b,c){var d={type:"keydown",propagate:!1,disable_in_input:!1,target:document,keycode:!1};if(c)for(var e in d)"undefined"==typeof c[e]&&(c[e]=d[e]);else c=d;d=c.target,"string"==typeof c.target&&(d=document.getElementById(c.target)),a=a.toLowerCase(),e=function(d){d=d||window.event;if(c.disable_in_input){var e;d.target?e=d.target:d.srcElement&&(e=d.srcElement),3==e.nodeType&&(e=e.parentNode);if("INPUT"==e.tagName||"TEXTAREA"==e.tagName)return}d.keyCode?code=d.keyCode:d.which&&(code=d.which),e=String.fromCharCode(code).toLowerCase(),188==code&&(e=","),190==code&&(e=".");var f=a.split("+"),g=0,h={"`":"~",1:"!",2:"@",3:"#",4:"$",5:"%",6:"^",7:"&",8:"*",9:"(",0:")","-":"_","=":"+",";":":","'":'"',",":"<",".":">","/":"?","\\":"|"},i={esc:27,escape:27,tab:9,space:32,"return":13,enter:13,backspace:8,scrolllock:145,scroll_lock:145,scroll:145,capslock:20,caps_lock:20,caps:20,numlock:144,num_lock:144,num:144,pause:19,"break":19,insert:45,home:36,"delete":46,end:35,pageup:33,page_up:33,pu:33,pagedown:34,page_down:34,pd:34,left:37,up:38,right:39,down:40,f1:112,f2:113,f3:114,f4:115,f5:116,f6:117,f7:118,f8:119,f9:120,f10:121,f11:122,f12:123},j=!1,l=!1,m=!1,n=!1,o=!1,p=!1,q=!1,r=!1;d.ctrlKey&&(n=!0),d.shiftKey&&(l=!0),d.altKey&&(p=!0),d.metaKey&&(r=!0);for(var s=0;k=f[s],s<f.length;s++)"ctrl"==k||"control"==k?(g++,m=!0):"shift"==k?(g++,j=!0):"alt"==k?(g++,o=!0):"meta"==k?(g++,q=!0):1<k.length?i[k]==code&&g++:c.keycode?c.keycode==code&&g++:e==k?g++:h[e]&&d.shiftKey&&(e=h[e],e==k&&g++);if(g==f.length&&n==m&&l==j&&p==o&&r==q&&(b(d),!c.propagate))return d.cancelBubble=!0,d.returnValue=!1,d.stopPropagation&&(d.stopPropagation(),d.preventDefault()),!1},this.all_shortcuts[a]={callback:e,target:d,event:c.type},d.addEventListener?d.addEventListener(c.type,e,!1):d.attachEvent?d.attachEvent("on"+c.type,e):d["on"+c.type]=e},remove:function(a){var a=a.toLowerCase(),b=this.all_shortcuts[a];delete this.all_shortcuts[a];if(b){var a=b.event,c=b.target,b=b.callback;c.detachEvent?c.detachEvent("on"+a,b):c.removeEventListener?c.removeEventListener(a,b,!1):c["on"+a]=!1}}},shortcut.add("Ctrl+U",function(){top.location.href="/"});
//]]>
</script>