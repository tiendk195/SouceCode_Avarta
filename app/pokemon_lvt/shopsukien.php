<?php
define('_IN_JOHNCMS', 1);
$textl = 'Sự Kiện Pokemon';
$headmod = 'id_user';
$rootpath='../../';
require_once ("../../incfiles/core.php");
require_once ("../../incfiles/head.php");
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
	$thiennhien=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='248'"));
	$nuoc=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='250'"));
	$lua=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='246'"));
	$thienthan=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='249'"));
	$loi=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='247'"));


	$time = time();

Echo'<div class="phdr">Shop quà sự kiện > <a href="index.php">Quay về</a></div>';
?>
<!--Edit by Lethinh-->
<?php
IF($datauser['rights'] >=9){

echo'<div class="omenu"><b><font color="red"><a href="?act=add">Thêm Đồ</b></a></font></div>';
}

switch($act){
case'doi':
$vp=intval($_GET['id']);
$p=mysql_fetch_array(mysql_query("SELECT * FROM `shoppokemon` WHERE `id`='".$vp."'"));
$r=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$p['vatpham']."'"));
IF($r['timesudung']){
$r['timesudung'] = $r['timesudung'] + time();
}
$n=mysql_num_rows(mysql_query("SELECT * FROM `shoppokemon` WHERE `id`='".$vp."'"));
IF($n<1){
Header('Location: /');
Exit;
} 
IF(Isset($_POST['doi'])){
$tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."'");
$checktongruong=mysql_num_rows($tongruong);
	if ($checktongruong>=$datauser['tongruong']) {
    echo'<div class="omenu">Giao dịch không thành công, rương của bạn đã đầy !!</div>';
} else
if ( $thiennhien['soluong']<$p['thiennhien'] || $lua['soluong']<$p['lua'] ||$nuoc['soluong']<$p['nuoc'] ||$thienthan['soluong']<$p['thienthan'] ||$loi['soluong']<$p['loi']) {

	echo '<div class="omenu"><font color="red"><b>Lỗi!</b></font> Chưa đủ điều kiện để đổi</div>';
} else {


	mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$p['thiennhien']."' WHERE `user_id`='".$user_id."' AND `id_shop`='248'");


		mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$p['lua']."' WHERE `user_id`='".$user_id."' AND `id_shop`='246'");
	

	mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$p['nuoc']."' WHERE `user_id`='".$user_id."' AND `id_shop`='250'");
	

	mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$p['thienthan']."' WHERE `user_id`='".$user_id."' AND `id_shop`='249'");
			

	mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$p['loi']."' WHERE `user_id`='".$user_id."' AND `id_shop`='247'");
								
mysql_query("INSERT INTO `khodo` SET `user_id`='".$user_id."', `id_shop`='".$r['id']."', `loai`='".$r['loai']."', `id_loai`='".$r['id_loai']."', `tenvatpham` = '".$r['tenvatpham']."', `timesudung`='".$r['timesudung']."'");
Echo'<div class="omenu"><center><b><font color="red">Bạn đã đổi thành công '.$r['tenvatpham'].'</font></b></center></div>';

}




}
echo'<div class="omenu"><center><img src="/images/shop/'.$r['id'].'.png"><br>
Bạn có muốn đổi vật phẩm <font color="ff007f">'.$r['tenvatpham'].'</font> bằng';



  if ($p['thiennhien']>0){
			  
		  echo' '.number_format($p['thiennhien']).' Huy hiệu thiên nhiên <img src="/images/vatpham/248.png">';
		  } 
            if ($p['nuoc']>0){
			  
		  echo' '.number_format($p['nuoc']).' Huy hiệu nước <img src="/images/vatpham/250.png">';
		  } 
                if ($p['lua']>0){
			  
		  echo' '.number_format($p['lua']).' Huy hiệu lửa <img src="/images/vatpham/246.png">';
		  } 
		             if ($p['thienthan']>0){
			  
		  echo' '.number_format($p['thienthan']).' Huy hiệu thiên thần <img src="/images/vatpham/249.png">';
		  }
             if ($p['loi']>0){
			  
		  echo' '.number_format($p['loi']).' Huy hiệu lôi <img src="/images/vatpham/247.png">';
		  } 		  
echo'		  không??<form method="post"><input type="submit" name="doi" value="Đổi"></center></div>';
break;
default:
echo'<div class="lt" style="text-align:center;"><select name="doiqua" input type="submit" onchange="location = this.options[this.selectedIndex].value;">
    Đổi quà: <br>
<option value="shopsukien.php"/>Đổi quà</option>
<option value="doivatpham.php"/>Đổi vật phẩm</option>
<option value="icon.php"/>Đổi icon nick</option>

</select>
</div>';

$e=mysql_query("SELECT * FROM
`shoppokemon` WHERE `id`!=0 ORDER BY `id` DESC LIMIT $start, $kmess");
while($s=mysql_fetch_array($e)){
$res=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$s['vatpham']."'"));
$res2=mysql_fetch_array(mysql_query("SELECT * FROM `shoppokemon` WHERE `id`='".$s['id']."'"));
echo'<table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info"><tbody><tr><td class="left-info"><img src="/images/shop/'.$res['id'].'.png"></td><td class="right-info"><span>
<font color="ff007f">Vật phẩm:</font>
           '.$res['tenvatpham'].' '.($r['timesudung'] ? thoigiantinh(floor($r['timesudung'])).'' : ' <font color="red">(Vĩnh viễn)</font>').'<br>
          <font color="ff007f">Cần:</font> ';
		  if ($res2['thiennhien']>0){
			  
		  echo' '.number_format($res2['thiennhien']).' Huy hiệu thiên nhiên <img src="/images/vatpham/248.png">';
		  } 
            if ($res2['nuoc']>0){
			  
		  echo' '.number_format($res2['nuoc']).' Huy hiệu nước <img src="/images/vatpham/250.png">';
		  } 
                if ($res2['lua']>0){
			  
		  echo' '.number_format($res2['lua']).' Huy hiệu lửa <img src="/images/vatpham/246.png">';
		  } 
		             if ($res2['thienthan']>0){
			  
		  echo' '.number_format($res2['thienthan']).' Huy hiệu thiên thần <img src="/images/vatpham/249.png">';
		  }
             if ($res2['loi']>0){
			  
		  echo' '.number_format($res2['loi']).' Huy hiệu lôi <img src="/images/vatpham/247.png">';
		  } 		  
         echo'
          </font><br>
<a href="?act=doi&id='.$s['id'].'"><input type="submit" name="submit" value="Đổi"></a>';
if ($datauser['rights'] >=9) {
	echo' <a href="?act=edit&id='.$s['id'].'"><input type="submit" name="submit" value="Sửa"></a>'; 
	echo' <a href="?act=del&id='.$s['id'].'"><input type="submit" name="submit" value="Xóa"></a>'; 
}
echo'
          </span></td></tr></tbody></table>';


}
$total=mysql_result(mysql_query("SELECT COUNT(*) FROM `shoppokemon` WHERE `id`!=0"), 0);
IF($total > $kmess){
Echo'<div class="phdr">'.functions::pages('?page=', $start, $total, $kmess).'</div>';
}
break;
case'edit':
$vp=intval($_GET['id']);
$p=mysql_fetch_array(mysql_query("SELECT * FROM `shoppokemon` WHERE `id`='".$vp."'"));
$r=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$p['vatpham']."'"));
IF($r['timesudung']){
$r['timesudung'] = $r['timesudung'] + time();
}
$n=mysql_num_rows(mysql_query("SELECT * FROM `shoppokemon` WHERE `id`='".$vp."'"));
IF($n<1){
Header('Location: /');
Exit;
} 
IF(Isset($_POST['edit'])){
	$lua=trim($_POST['lua']);
	$nuoc=trim($_POST['nuoc']);
	$thienthan=trim($_POST['thienthan']);
	$loi=trim($_POST['loi']);

	$thiennhien=trim($_POST['thiennhien']);
IF($datauser['rights'] >= 9){
mysql_query("UPDATE `shoppokemon` SET `thiennhien`= '".$thiennhien."',`lua`= '".$lua."',`nuoc`= '".$nuoc."',`thienthan`= '".$thienthan."',`loi`= '".$loi."' WHERE `id`='".$vp."'");
Echo'<div class="omenu"><center><b><font color="red">Bạn đã sửa thành công </font></b></center></div>';
}Else{
Echo'<div class="omenu"><center><b><font color="red">Giao dịch thất bại !!<br>Bạn không có quyền này</font></b></center></div>';
}


}
echo'<div class="omenu"><img src="/images/shop/'.$r['id'].'.png">'.$r['tenvatpham'].'</div>';
echo '<form method="post">
<input type="number" name="thiennhien"  placeholder="Nhập thiên nhiên('.$p[thiennhien].')"></br>
<input type="number" name="lua"    placeholder="Nhập lửa('.$p[lua].')"></br>

<input type="number" name="nuoc"    placeholder="Nhập nước('.$p[nuoc].')"></br>

<input type="number" name="thienthan"   placeholder="Nhập thiên thần('.$p[thienthan].')"></br>
<input type="number" name="loi"  placeholder="Nhập lôi('.$p[loi].')"></br><input type="submit" value="Đổi" name="edit" class="nut"></tr></table>
</form>';
/*
break;
case'add':
IF($datauser['rights'] < 9){
Header('Location: /');
}
 
IF(Isset($_POST['add'])){
	$gia=trim($_POST['gia']);
	$idshop=trim($_POST['idshop']);

	if (empty($gia)) {
Echo'<div class="omenu"><center><b><font color="red">Thêm thất bại !!</font></b></center></div>';
	} else 	if (empty($idshop)) {
Echo'<div class="omenu"><center><b><font color="red">Thêm thất bại !!</font></b></center></div>';
	} else {
mysql_query("INSERT `shopsinhnhat` SET `gia`= '".$gia."',`vatpham`= '".$idshop."' ");
Echo'<div class="omenu"><center><b><font color="red">Bạn đã thêm thành công</font></b></center></div>';
require('../../incfiles/end.php');Exit;
}




echo'<div class="omenu"><font color="red"><b>Lưu ý: Xem ID shop ở <a href="/quanli/iteman.php">đây</a></br>
Giá cả hợp lý, item phù hợp!</font></b></div>';
echo '<form method="post">
<table><tr><input type="number" name="idshop" placeholder="Nhập ID Shop..."> </tr></br>
<input type="number" name="gia" placeholder="Nhập giá..."> </tr></br><tr><input type="submit" value="Thêm" name="add" class="nut"></tr></table>
</form>';
*/
break;

case'add':
IF($datauser['rights'] < 9){
Header('Location: /');
}
 
IF(Isset($_POST['add'])){
		$lua=trim($_POST['lua']);
	$nuoc=trim($_POST['nuoc']);
	$thienthan=trim($_POST['thienthan']);
	$loi=trim($_POST['loi']);

	$thiennhien=trim($_POST['thiennhien']);
	$idshop=trim($_POST['idshop']);

 	if (empty($idshop)) {
Echo'<div class="omenu"><center><b><font color="red">Thêm thất bại !!</font></b></center></div>';
	} else {
mysql_query("INSERT `shoppokemon` SET `thiennhien`= '".$thiennhien."',`lua`= '".$lua."',`nuoc`= '".$nuoc."',`thienthan`= '".$thienthan."',`loi`= '".$loi."',`vatpham`= '".$idshop."' ");
Echo'<div class="omenu"><center><b><font color="red">Bạn đã thêm thành công</font></b></center></div>';
require('../../incfiles/end.php');Exit;
}
}




echo '<form method="post">';
echo 'Vật phẩm: <select name="idshop">';
$qs=mysql_query("SELECT * FROM `shopdo` WHERE `hienthi`='1'");
while ($show=mysql_fetch_array($qs)) {
echo '<option value="'.$show[id].'">'.$show[id].'  '.$show[tenvatpham].'</option>';
}
echo '</select><br/>';
echo'
<input type="number" name="thiennhien" placeholder="Nhập huy hiệu thiên nhiên..."></br>
<input type="number" name="lua" placeholder="Nhập huy hiệu lửa..."></br>

<input type="number" name="nuoc" placeholder="Nhập huy hiệu nước..."></br>

<input type="number" name="thienthan" placeholder="Nhập huy hiệu thiên thần..."></br>
<input type="number" name="loi" placeholder="Nhập huy hiệu lôi..."></br>

</br><tr><input type="submit" value="Thêm" name="add" class="nut">
</form>';

break;
case'del':
$vp=intval($_GET['id']);
$p=mysql_fetch_array(mysql_query("SELECT * FROM `shoppokemon` WHERE `id`='".$vp."'"));
$r=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$p['vatpham']."'"));
IF($r['timesudung']){
$r['timesudung'] = $r['timesudung'] + time();
}
$n=mysql_num_rows(mysql_query("SELECT * FROM `shoppokemon` WHERE `id`='".$vp."'"));
IF($n<1){
Header('Location: /');
Exit;
} 
IF(Isset($_POST['del'])){

IF($datauser['rights'] >= 9){
	mysql_query("DELETE FROM `shoppokemon` WHERE `id`='".$vp."'");

Echo'<div class="omenu"><center><b><font color="red">Bạn đã xóa thành công </font></b></center></div>';

}Else{
Echo'<div class="omenu"><center><b><font color="red">Giao dịch thất bại !!<br>Bạn không có quyền này</font></b></center></div>';
}



}
Echo'<div class="omenu"><center><b><font color="red"><img src="/images/shop/'.$r['id'].'.png"><br>Bạn có chắc chắn xóa '.$r['tenvatpham'].' không??</font></b><form method="post"><input type="submit" name="del" value="Xóa"></center></div>';


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