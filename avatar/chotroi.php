<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');
$headmod='Chợ trời';
$textl='Chợ trời';
require('../incfiles/head.php');
if (!$user_id) {
header('Location: /login.php');
exit;
}

 else


if ($datauser['kichhoat']==0){
    Header('location: '.$home.'/users/checkpoint.php');
    exit;
}
switch($act) {
default:
Echo '<div class="phdr">Chợ trời</div>';
$tongdonhang=mysql_num_rows(mysql_query("SELECT * FROM `chotroi` WHERE `duyet`='1'"));

echo'<div class="gd_npc"><center><img src="/avatar/1.png"><br>
<div class="pmenu">Từ 20/06/2021, tất cả trường hợp Mua-Bán từ các Tài khoản cùng IP với bất kì lí do là gì sẽ khóa mà không cần báo trước!</div></center></div>';
echo'<div class="gd_">';


echo'<div class="pmenu"><a href="?act=danhsach"><img src="/images/vao.png"> Danh sách ('.$tongdonhang.')</a></div>';
echo'<div class="pmenu"><a href="?act=lichsu"><img src="/images/vao.png"> Lịch sử chợ trời</a></div>';

echo'<div class="pmenu"><a href="?act=my"><img src="/images/vao.png"> Đơn hàng của tôi</a></div>';
echo'<div class="pmenu"><a href="?act=ve"><img src="/images/vao.png"> Mua vé bán hàng</a></div>';

echo'</div>';

/*
Echo'<table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed;word-wrap: break-word;"><tr><td width="45px;" class="blog-avatar"><img src="https://i.imgur.com/LAMbsvX.gif"/></td><td style="vertical-align: bottom;"><table cellpadding="0" cellspacing="0"><tbody><tr><td class="current-blog" rowspan="2" style=""><div class="blog-bg-left"><img src="/giaodien/images/left-blog.png"></div><img src="/images/on.png" alt="online"/><font color="red"> <b> Lái buôn </b></font>';
echo '<div class="pmenu"><img src="/icon/next.png"><a href="?act=raoban"><b> Rao bán</b></a></div>';
echo '<div class="pmenu"><img src="/icon/next.png"><a href="?act=my"><b> Đơn hàng của tôi</b></a></div>';
echo '<div class="pmenu"><img src="/icon/next.png"><a href="?act=lichsu"><b> Lịch sử chợ trời</b></a></div>';
echo '<div class="pmenu"><img src="/icon/next.png"><a href="?act=duyet"><b> Đơn hàng chờ duyệt</b></a></div>';
Echo'</div></div></td></tr></tbody></table></td></tr></tbody></table>';
*/

break;
case 'buy':
    echo'<div class="phdr">Chợ trời</div>';
$vp=$id;    
$info=mysql_fetch_array(mysql_query("SELECT * FROM `chotroi` WHERE `id`='".$vp."'"));

$num=mysql_num_rows(mysql_query("SELECT * FROM `chotroi` WHERE `id`='".$vp."' AND `duyet`='1'"));
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$info[id_shop]."'"));
$tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."'");
$checktongruong=mysql_num_rows($tongruong);
	if ($checktongruong>=$datauser['tongruong']) {
    echo'<div class="pmenu">Giao dịch không thành công, rương của bạn đã đầy !!</div>';
} else 
if (!$num) {
echo '<div class="pmenu">Vật phẩm chưa được duyệt, không tồn tại hoặc đã bị mua mất</div>';
} else if ($info[nguoinhan]!=$datauser['id'] and $info[nguoinhan]!=0) {
echo '<div class="pmenu">Vật phẩm này không dành cho bạn</div>';
} else if ($info[user_id]==$user_id) {
echo '<div class="pmenu">Không thể mua đồ của bản thân!!</div>';

} else {
if ($info[loaitien]==xu) {
if ($datauser[xu]>=$info[gia]) {
if ($info[loaivp]=='do') {
$text='[red][b]'.$login.'[/b][/red] đã mua vật phẩm [b]'.$info[tenvatpham].'[/b] của bạn. Bạn được cộng [b]'.$info[gia].' '.($info[loaitien]==xu?'Xu':'Lượng').'[/b] vào tài khoản';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$info[user_id]."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");  

mysql_query("UPDATE `users` SET `xu`=`xu`+'".$info[gia]."' WHERE `id`='".$info[user_id]."'");
mysql_query("UPDATE `users` SET `xu`=`xu`-'".$info[gia]."' WHERE `id`='".$user_id."'");
mysql_query("
INSERT INTO `lichsu_chotroi` SET
`user_id`='".$info[user_id]."',
`tenvatpham`='".$info[tenvatpham]."',
`id_loai`='".$info[id_loai]."',
`cong`='".$info[cong]."',
`sao`='".$info[sao]."',

`soluong`='".$info[soluong]."',
`loaivp`='".$info[loaivp]."',
`conghp`='".$info[conghp]."',
`loaitien`='".$info[loaitien]."',
`sucmanh`='".$info[sucmanh]."',
`gia`='".$info[gia]."',
`hp`='".$info[hp]."',
`time`='".time()."',
`id_shop`='".$shop[id]."',
`loai`='".$info[loai]."',
`nguoi_mua`='".$user_id."',
`nguoi_duyet`='".$info[nguoi_duyet]."'
");
mysql_query("
INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`tenvatpham`='".$info[tenvatpham]."',
`id_loai`='".$shop[id_loai]."',
`cong`='".$info[cong]."',
`conghp`='".$info[conghp]."',
`sucmanh`='".$info[sucmanh]."',
`sao`='".$info[sao]."',

`hp`='".$info[hp]."',
`id_shop`='".$shop[id]."',
`loai`='".$shop[loai]."'
");
mysql_query("DELETE FROM `chotroi` WHERE `id`='".$vp."'");
echo '<div class="pmenu">Mua thành công <font color="red"><b>'.$info[tenvatpham].'</b></font></div>';
} else if($info[loaivp]=='vatpham') {
$text='[red][b]'.$login.'[/b][/red] đã mua vật phẩm [b]'.$info[tenvatpham].'[/b] của bạn. Bạn được cộng [b]'.$info[gia].' '.($info[loaitien]==xu?'Xu':'Lượng').'[/b] vào tài khoản';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$info[user_id]."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");  
mysql_query("UPDATE `users` SET `xu`=`xu`+'".$info[gia]."' WHERE `id`='".$info[user_id]."'");
mysql_query("UPDATE `users` SET `xu`=`xu`-'".$info[gia]."' WHERE `id`='".$user_id."'");
mysql_query("
INSERT INTO `lichsu_chotroi` SET
`user_id`='".$info[user_id]."',
`tenvatpham`='".$info[tenvatpham]."',
`id_loai`='".$info[id_loai]."',
`cong`='".$info[cong]."',
`soluong`='".$info[soluong]."',
`loaivp`='".$info[loaivp]."',
`gia`='".$info[gia]."',
`conghp`='".$info[conghp]."',
`sucmanh`='".$info[sucmanh]."',
`loaitien`='".$info[loaitien]."',
`hp`='".$info[hp]."',
`time`='".time()."',
`id_shop`='".$shop[id]."',
`loai`='".$info[loai]."',
`nguoi_mua`='".$user_id."', 
`nguoi_duyet`='".$info[nguoi_duyet]."'
");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$info[soluong]."' WHERE `user_id`='".$user_id."' AND `id_shop`='".$info[id_shop]."'");
mysql_query("DELETE FROM `chotroi` WHERE `id`='".$vp."'");
echo '<div class="pmenu">Mua thành công <font color="red"><b>'.$info[tenvatpham].' * '.$info[soluong].'</b></font></div>';

//header('Location: ?act=danhsach');
}
} else {
echo '<div class="pmenu">Bạn không có đủ tiền để mua '.$info[tenvatpham].'</div>';
}
} else if ($info[loaitien]==vnd) {
if ($datauser[luong]>=$info[gia]) {
if ($info[loaivp]=='do') {
$text='[red][b]'.$login.'[/b][/red] đã mua vật phẩm [b]'.$info[tenvatpham].'[/b] của bạn. Bạn được cộng [b]'.$info[gia].' '.($info[loaitien]==xu?'Xu':'Lượng').'[/b] vào tài khoản';
mysql_query("INSERT INTO `cms_mail` SET
			    `user_id` = '0',
			    `from_id` = '" . $info[user_id] . "',
			    `text` = '" . mysql_real_escape_string($text) . "',
			    `time` = '" . time() . "',
			    `sys` = '1',
			    `them` = 'Đơn hàng'
");
mysql_query("UPDATE `users` SET `luong`=`luong`+'".$info[gia]."' WHERE `id`='".$info[user_id]."'");
mysql_query("UPDATE `users` SET `luong`=`luong`-'".$info[gia]."' WHERE `id`='".$user_id."'");
mysql_query("
INSERT INTO `lichsu_chotroi` SET
`user_id`='".$info[user_id]."',
`tenvatpham`='".$info[tenvatpham]."',
`loaitien`='".$info[loaitien]."',
`id_loai`='".$info[id_loai]."',
`gia`='".$info[gia]."',
`cong`='".$info[cong]."',
`sao`='".$info[sao]."',

`soluong`='".$info[soluong]."',
`loaivp`='".$info[loaivp]."',
`conghp`='".$info[conghp]."',
`sucmanh`='".$info[sucmanh]."',
`hp`='".$info[hp]."',
`time`='".time()."',
`id_shop`='".$shop[id]."',
`loai`='".$info[loai]."',
`nguoi_mua`='".$user_id."', 
`nguoi_duyet`='".$info[nguoi_duyet]."'
");
mysql_query("
INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`tenvatpham`='".$info[tenvatpham]."',
`id_loai`='".$shop[id_loai]."',
`cong`='".$info[cong]."',
`conghp`='".$info[conghp]."',
`sucmanh`='".$info[sucmanh]."',
`hp`='".$info[hp]."',
`sao`='".$info[sao]."',

`id_shop`='".$shop[id]."',
`loai`='".$shop[loai]."'
");
mysql_query("DELETE FROM `chotroi` WHERE `id`='".$vp."'");
header('Location: chotroi.php?ok');
} else if($info[loaivp]=='vatpham') {
$text='[red][b]'.$login.'[/b][/red] đã mua vật phẩm [b]'.$info[tenvatpham].'[/b] của bạn. Bạn được cộng [b]'.$info[gia].' '.($info[loaitien]==xu?'Xu':'Lượng').'[/b] vào tài khoản';
mysql_query("INSERT INTO `cms_mail` SET
			    `user_id` = '0',
			    `from_id` = '" . $info[user_id] . "',
			    `text` = '" . mysql_real_escape_string($text) . "',
			    `time` = '" . time() . "',
			    `sys` = '1',
			    `them` = 'Đơn hàng'
");
mysql_query("UPDATE `users` SET `luong`=`luong`+'".$info[gia]."' WHERE `id`='".$info[user_id]."'");
mysql_query("UPDATE `users` SET `luong`=`luong`-'".$info[gia]."' WHERE `id`='".$user_id."'");
mysql_query("
INSERT INTO `lichsu_chotroi` SET
`user_id`='".$info[user_id]."',
`loaitien`='".$info[loaitien]."',
`tenvatpham`='".$info[tenvatpham]."',
`gia`='".$info[gia]."',
`id_loai`='".$info[id_loai]."',

`cong`='".$info[cong]."',
`soluong`='".$info[soluong]."',
`loaivp`='".$info[loaivp]."',
`conghp`='".$info[conghp]."',
`sucmanh`='".$info[sucmanh]."',
`hp`='".$info[hp]."',
`time`='".time()."',
`id_shop`='".$shop[id]."',
`loai`='".$info[loai]."',
`nguoi_mua`='".$user_id."', 
`nguoi_duyet`='".$info[nguoi_duyet]."'
");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$info[soluong]."' WHERE `user_id`='".$user_id."' AND `id_shop`='".$info[id_shop]."'");
mysql_query("DELETE FROM `chotroi` WHERE `id`='".$vp."'");
echo '<div class="pmenu">Mua hàng thành công</div>';
}
} else {
echo '<div class="pmenu">Bạn không có đủ tiền để mua</div>';
}
}

}









break;
case 'danhsach':
echo '<div class="phdr">Chợ trời</div>';
echo'
<div class="gd_"><div class="pmenu" style="text-align:center;"><select name="chotroi" onchange="location = this.options[this.selectedIndex].value;">
    Thành phố: 
<option value="?act=danhsach">Danh sách item</option>
<option value="?act=listvp">Danh sách vật phẩm</option>
</select>
</div></div>';


$req=mysql_query("SELECT * FROM `chotroi` WHERE `duyet`='1' AND `loaivp`='do'  ORDER BY `time` DESC LIMIT $start,$kmess");

$tong=mysql_result(mysql_query("SELECT COUNT(*) FROM `chotroi` WHERE `duyet`='1' AND `loaivp`='do' "),0);




echo'<div class="gd_">';
while($res=mysql_fetch_array($req)){
  $name=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$res[user_id]."'"));
  
echo'<div class="pmenu"><table width="100%" border="0" cellspacing="0"><tbody><tr class="">
<td width="20%"><center>';


echo'<img src="/images/shop/'.$res[id_shop].'.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px">';

echo'</center></td>
<td width="80%"><font color="red" size="1"><b>';
if ($res[nguoinhan]!=0 AND $res['nguoinhan']!=$user_id){

echo'<i class="fa fa-lock"></i>';
} else {
echo'<i class="fa fa-unlock-alt"></i>';
}
echo'</b></font>
<font color="green">'.$res['tenvatpham'].' </font>';

    if ($res[sao]!=0) {
            echo'<font size="1" color="white" style="text-shadow: 0 0 0.2em #9932CC, 0 0 0.2em #9932CC,  0 0 0.2em #9932CC"><b>[ '.$res[sao].' ✩ ]</b></font>';
}
if ($res[cong]!=0 ) {
echo '<br/>Tăng SM: <font color="blue">'.number_format($res[sucmanh]).' [ +'.$res[conghp].' ] </font>';

}
if ( $res[conghp]!=0) {
echo '<br/>Tăng HP: <font color="red">'.number_format($res[sucmanh]).' [ +'.$res[cong].' ]</font>';


}
echo'
<br>Người bán :   '.nick($name['id']).'
<br>Giá rao bán : <font color="red"> '.number_format($res[gia]).' '.($res[loaitien]==xu?'Xu':'Lượng').' </font>
<br>';
if ($res[nguoinhan]!=0 AND $res[nguoinhan]==$user_id  AND $res[user_id]!=$user_id ){

echo'<a href="?act=buy&amp;id='.$res[id].'"><input type="submit" value="Mua hàng"></a> ';
} else if ($res[nguoinhan]==0 AND $res[user_id]!=$user_id ){
    echo'<a href="?act=buy&amp;id='.$res[id].'"><input type="submit" value="Mua hàng"></a> ';

}
echo'
</td>
</tr></tbody></table></div>';    
    
    
    

}
if ($tong==0) {
echo '<div class="pmenu"><b><font color="red"> Chợ trời trống! </font></b>Hãy rao bán</div>';
}
if ($tong>$kmess) {
echo '<div class="gd_">' . functions::display_pagination('?act=danhsach&', $start, $tong, $kmess) . '</div>';
}
echo'</div>';


break;
case 'listvp':
echo '<div class="phdr">Chợ trời</div>';
echo'
<div class="gd_"><div class="pmenu" style="text-align:center;"><select name="chotroi" onchange="location = this.options[this.selectedIndex].value;">
    Thành phố: 
    <option value="?act=listvp">Danh sách vật phẩm</option>

<option value="?act=danhsach">Danh sách item</option>
</select>
</div></div>';


$req=mysql_query("SELECT * FROM `chotroi` WHERE `duyet`='1' AND `loaivp`='vatpham'  ORDER BY `time` DESC LIMIT $start,$kmess");

$tong=mysql_result(mysql_query("SELECT COUNT(*) FROM `chotroi` WHERE `duyet`='1' AND `loaivp`='vatpham' "),0);




echo'<div class="gd_">';
while($res=mysql_fetch_array($req)){
  $name=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$res[user_id]."'"));
  
echo'<div class="pmenu"><table width="100%" border="0" cellspacing="0"><tbody><tr class="">
<td width="20%"><center>';

echo'<div style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px;width:48px;height:48px;"><img src="/images/vatpham/'.$res[id_shop].'.png">';
echo'</br><font size="1" color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><b>'.$res[soluong].' </b></font>';
echo'</div>';    

echo'</center></td>
<td width="80%"><font color="red" size="1"><b>';
if ($res[nguoinhan]!=0 AND $res['nguoinhan']!=$user_id){

echo'<i class="fa fa-lock"></i>';
} else {
echo'<i class="fa fa-unlock-alt"></i>';
}
echo'</b></font>
<font color="green">'.$res['tenvatpham'].' </font>';

echo'
<br>Người bán :   '.nick($name['id']).'
<br>Giá rao bán : <font color="red"> '.number_format($res[gia]).' '.($res[loaitien]==xu?'Xu':'Lượng').' </font>
<br>';
if ($res[nguoinhan]!=0 AND $res[nguoinhan]==$user_id  AND $res[user_id]!=$user_id ){

echo'<a href="?act=buy&amp;id='.$res[id].'"><input type="submit" value="Mua hàng"></a> ';
} else if ($res[nguoinhan]==0 AND $res[user_id]!=$user_id ){
    echo'<a href="?act=buy&amp;id='.$res[id].'"><input type="submit" value="Mua hàng"></a> ';

}
echo'
</td>
</tr></tbody></table></div>';    
    
    
    

}
if ($tong==0) {
echo '<div class="pmenu"><b><font color="red"> Chợ trời trống! </font></b>Hãy rao bán</div>';
}
if ($tong>$kmess) {
echo '<div class="gd_">' . functions::display_pagination('?act=listvp&', $start, $tong, $kmess) . '</div>';
}
echo'</div>';



break;
case 've':
    Echo'<div class="phdr">Mua thẻ bán hàng</div>';

$kem=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='31'"));
if (isset($_POST[mua])) {
$mg=(int)$_POST[mg];
$mg2=$mg*50;

if (empty($mg)) {
	echo '<div class="pmenu"><font color="red"><b>Lỗi!!</b></font> Bạn chưa nhập số thẻ muốn mua!</div>';
} else 
	if ($mg<0) {
	echo '<div class="pmenu"><font color="red"><b>Lỗi!!</b></font> Bạn chưa nhập số thẻ muốn mua!</div>';
} else 

if ($datauser['luong']< $mg2) {
echo '<div class="pmenu"><font color="red"><b>Lỗi!!</b></font> Bạn không đủ lượng để mua!</div>';

} else {
	echo '<div class="pmenu">Mua thành công '.number_format($mg).'<img src="/images/vatpham/31.png"> thẻ bán hàng - bạn bị - '.number_format($mg2).' Lượng</div>';
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$mg."' WHERE `user_id`='".$user_id."' AND `id_shop`='31'");
mysql_query("UPDATE `users` SET `luong`=`luong`-'".$mg2."' WHERE `id`='".$user_id."'");
}
}
echo'<center><div class="pmenu">Mua 1 thẻ bán hàng <img src="/images/vatpham/31.png"> = 50 Lượng</br>';

		echo '<form method="post">';

echo'Nhập số lượng muốn mua</br>';
echo'<input type="number" name="mg"><br/>
<input type="submit" name="mua" value="Mua" class="nut"></form></div></center>';


break;
case 'ban':
echo '<div class="phdr">Bán vật phẩm</div>';
$tbh=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `id_shop`='31' AND `user_id`='".$user_id."'"));
$loai=functions::checkout($_GET[loai]);
if ($loai=='vatpham') {
$q=mysql_query("SELECT * FROM `vatpham` WHERE `id`='".$id."' AND `soluong`>'0' AND `user_id`='".$user_id."'");
$num=mysql_num_rows($q);
if (!$num) {
echo '<div class="pmenu"><b><font color="red"> Lỗi! </font></b>Vui lòng thao tác lại</div>';

require('../incfiles/end.php');
exit;
}
$xxx=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `id`='".$id."' AND `user_id`='".$user_id."'"));
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE `id`='".$xxx[id_shop]."'"));
	$thebanhang=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='31'"));

if ($shop['loai'] !='dacbiet' and $shop['loai'] !='danhboss' and $shop['loai'] !='ghepmanh'  ) {

echo '<form method="post"><div class="lethinh_pro"></div>
<div class="pmenu"><center> Rao bán vật phẩm <b>'.$shop[tenvatpham].'</b> <img src="/images/vatpham/'.$xxx[id_shop].'.png">  , số lượng còn <b>'.$xxx[soluong].'</b> </center></div>
<div class="pmenu">
<form method="post">
<br><br>Nhập tiền : <input type="number" name="gia">
<br><br>Nhập ID người được mua (có thể bỏ trống) : <input type="number" name="nguoinhan">

<br>Nhập số lượng muốn bán : <input type="number" name="soluong" placeholder="Nhập số lượng 1 - '.$xxx[soluong].' ">
<br>Loại tiền : <select name="loaitien"><option value="xu"> Xu</option><option value="vnd"> Lượng</option></select>
<br><center><input type="submit" name="ban" value="Rao bán"></center>
</form>
</div>
';
} else {
	echo '<div class="pmenu"><b><font color="red"> Lỗi! </font></b>Vui lòng thao tác lại</div>';
}
if (isset($_POST[ban])) {
	
if($datauser['kichhoat'] == 0){
echo '<div class="pmenu"><font color="red">Lỗi!!</font> Bạn phải kích hoạt để sử dụng chức năng này!</div>';
}else if ($thebanhang['soluong']<1) {   
	echo'<div class="pmenu"><font color="red"><b>Lỗi!</b></font> Bạn phải có 1 thẻ bán hàng <img src="/images/vatpham/31.png"> mới có thể rao bán <a href="/">[ Trở về ]</a></div>
';

} else {

$gia=intval($_POST[gia]);
$loaitien=functions::checkout($_POST[loaitien]);
$soluong=(int)$_POST[soluong];
	$nguoinhan=(int)$_POST[nguoinhan];

$checknguoinhan=mysql_num_rows(mysql_query("SELECT * FROM `users` WHERE `id`='".$nguoinhan."'"));
if (!$checknguoinhan AND $nguoinhan !=0 ) {
	    echo '<div class="pmenu">Người mua không tồn tại!</div>';

} else 

if ($gia<1||empty($gia)) {
echo '<div class="pmenu">Giá tiền không hợp lệ!</div>';
} else if($xxx[soluong]<$soluong||$soluong<0||empty($soluong)) {
echo '<div class="pmenu">Số lượng không hợp lệ!</div>';
} else if($loaitien!='vnd'&&$loaitien!='xu') {
echo '<div class="pmenu">Loại tiền không hợp lệ!</div>';

echo '<div class="pmenu"><font color="red">Lỗi!!</font> Bạn phải kích hoạt để sử dụng chức năng này!</div>';
} else if($xxx[hansudung]!=0) {
echo '<div class="pmenu">Không thể bán đồ có hạn sử dụng!</div>';
} else {
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop`='31'");
mysql_query("INSERT INTO `chotroi` SET
`user_id`='".$user_id."',
`nguoinhan`='".$nguoinhan."',

`loai`='vatpham',
`id_shop`='".$shop[id]."',
`loaivp`='vatpham',
`loaitien`='".$loaitien."',
`gia`='".$gia."',
`soluong`='".$soluong."',
`id_loai`='".$shop[id]."',
`time` = '".time()."',
`tenvatpham`='".$shop[tenvatpham]."'
");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$soluong."' WHERE `user_id`='".$user_id."' AND `id_shop`='".$shop[id]."'");

echo '<div class="pmenu">Bán hàng thành công, vui lòng đợi duyệt .<a href="chotroi.php?act=raoban&loai=do"><input type="button" value="Quay lại"></a></div>';
}
}
}
} else if($loai=='do') {
$tong=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."' AND `timesudung`='0' "));
$q=mysql_query("SELECT * FROM `khodo` WHERE `id`='".$id."' AND `timesudung`='0' AND `user_id`='".$user_id."'  ");
$num=mysql_num_rows($q);
if (!$num) {
echo '<div class="pmenu"><b><font color="red"> Lỗi! </font></b>Vui lòng thao tác lại</div>';

require('../incfiles/end.php');
exit;
}
$xxx=mysql_fetch_array(mysql_query("SELECT * FROM `khodo` WHERE `id`='".$id."' AND `user_id`='".$user_id."'"));
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$xxx[id_shop]."' "));
if ($xxx['loaido']!='vip'){

echo'<div class="pmenu">
<center><img src="/images/shop/'.$shop['id'].'.png" style="
border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px" "=""></center>
<form method="post">
<center>Giá rao bán phải phù hợp với giá thực tế, Admin sẽ không duyệt nếu giá không hợp lý. Rao bán bạn cần có <font color="red">Thẻ bán hàng</font> mới có thể Giao dịch</center>
</br><br>Nhập tiền : <input type="number" name="gia">
<br><br>Cài đặt ID người mua (có thể bỏ trống) : <input type="number" name="nguoinhan">

<br>Loại tiền : <select name="loaitien"><option value="xu"> Xu</option><option value="vnd"> Lượng</option>
</select>
<br><center><input type="submit" name="ban" value="Rao bán"></center>
</form>
</div>';
} else {
    	echo '<div class="pmenu"><b><font color="red"> Lỗi! </font></b>Vui lòng thao tác lại</div>';

}
if (isset($_POST[ban])) {

	
if($datauser['kichhoat'] == 0){
echo '<div class="pmenu"><font color="red">Lỗi!!</font> Bạn phải kích hoạt để sử dụng chức năng này!</div>';
}else if ($tbh['soluong']<1) {   
	echo'<div class="pmenu"><font color="red"><b>Lỗi!</b></font> Bạn phải có 1 thẻ bán hàng <img src="/images/vatpham/31.png"> mới có thể rao bán <a href="/">[ Trở về ]</a></div>
';
} else {
$gia=intval($_POST[gia]);
$nguoinhan=(int)$_POST[nguoinhan];

$loaitien=functions::checkout($_POST[loaitien]);
$soluong=(int)$_POST[soluong];
$checknguoinhan=mysql_num_rows(mysql_query("SELECT * FROM `users` WHERE `id`='".$nguoinhan."'"));

if (!$checknguoinhan AND $nguoinhan !=0 ) {
	    echo '<div class="pmenu">Người mua không tồn tại!</div>';

} else 


if ($gia<1||empty($gia)) {
echo '<div class="pmenu">Giá tiền không hợp lệ!</div>';
} else if($loaitien!='vnd'&&$loaitien!='xu') {
echo '<div class="pmenu">Loại tiền không hợp lệ!</div>';
} else if($datauser['level'] < 0) {
echo '<div class="pmenu"><font color="red">Lỗi!!</font> Bạn phải kích hoạt để sử dụng chức năng này!</div>';
} else if($xxx[hansudung]!=0) {
echo '<div class="pmenu">Không thể bán đồ có hạn sử dụng!</div>';
} else {
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop`='31'");
mysql_query("INSERT INTO `chotroi` SET
`user_id`='".$user_id."',
`nguoinhan`='".$nguoinhan."',
`sao`='".$xxx[sao]."',

`loai`='".$shop[loai]."',
`id_shop`='".$shop[id]."',
`loaivp`='do',
`loaitien`='".$loaitien."',
`gia`='".$gia."',
`sucmanh`='".$xxx[sucmanh]."',
`hp`='".$xxx[hp]."',
`id_loai`='".$shop[id_loai]."',
`cong`='".$xxx[cong]."',
`conghp`='".$xxx[conghp]."',
`time`='".time()."',
`tenvatpham`='".$shop[tenvatpham]."'
");
mysql_query("DELETE FROM `khodo` WHERE `id`='".$id."'");
echo '<div class="pmenu">Bán hàng thành công, vui lòng đợi duyệt .<a href="chotroi.php?act=raoban&loai=do"><input type="button" value="Quay lại"></a></div>';
}
}
}
//echo '<form method="post"><table><tr><td><div class="lethinh_pro"><img src="/images/shop/'.$xxx[id_shop].'.png"></div></td><td><b><font color="green">['.$shop[tenvatpham].']</font></b><br/>'.($xxx[conghp]!=0?'<font color="red">Tăng: <b>'.$xxx[hp].'</b> HP (+'.$xxx[conghp].')</b></font><br/>':'').''.($xxx[cong]!=0?'<font color="blue">Tăng: <b>'.$xxx[sucmanh].'</b> SM (+'.$xxx[cong].')</font><br/>':'').'Giá: <input type="text" name="gia" size="4"> <select name="loaitien"><option value="xu"> Xu</option><option value="vnd"> Lượng</option></select><br/><input type="submit" name="ban" value="Bán" class="nut"></td></tr></table></form>';
}
break;
case 'my':
Echo'<div class="phdr">Đơn hàng của tôi</div>';
echo'
<div class="gd_"><div class="pmenu" style="text-align:center;"><select name="chotroi" onchange="location = this.options[this.selectedIndex].value;">
    Thành phố: 
    <option value="?act=my">Danh sách item</option>

<option value="?act=myvp">Danh sách vật phẩm</option>
</select>
</div></div>';

if (isset($_GET[err])) {
echo '<div class="pmenu">Có lỗi xảy ra!</div>';
}
if (isset($_GET[ok])) {
echo '<div class="pmenu">Thu hồi đơn hàng thành công</div>';
}
$req=mysql_query("SELECT * FROM `chotroi` WHERE `user_id`='".$user_id."'  AND `loaivp`='do' LIMIT $start,$kmess");
if (isset($_POST[del])) {
$vp=(int)$_POST[vp];
$bug=mysql_num_rows(mysql_query("SELECT * FROM `chotroi` WHERE `id`='".$vp."' AND `user_id`='".$user_id."'  AND `loaivp`='do'"));
if (!$bug) {
header('Location: chotroi.php?act=my&err');
} else {
$info=mysql_fetch_array(mysql_query("SELECT * FROM `chotroi` WHERE `id`='".$vp."'  AND `loaivp`='do'"));

mysql_query("
INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`tenvatpham`='".$info[tenvatpham]."',
`id_loai`='".$info[id_loai]."',
`cong`='".$info[cong]."',
`sao`='".$info[sao]."',

`conghp`='".$info[conghp]."',
`sucmanh`='".$info[sucmanh]."',
`hp`='".$info[hp]."',
`id_shop`='".$info[id_shop]."',
`loai`='".$info[loai]."'
");

mysql_query("DELETE FROM `chotroi` WHERE `id`='".$vp."'");
header('Location: chotroi.php?act=my&ok');
}
}
if (isset($_POST[edit])) {
$vp=intval($_POST[vp]);
$bug=mysql_num_rows(mysql_query("SELECT * FROM `chotroi` WHERE `id`='".$vp."' AND `user_id`='".$user_id."'  AND `loaivp`='do'"));
if (!$bug) {
header('Location: chotroi.php?act=my&err');
} else {
header('Location: chotroi.php?act=edit&id='.$vp.'');
}
}
echo'<div class="gd">';
echo '<form method="post">';


while($res=mysql_fetch_array($req)) {
if ($res[loaivp]=='do') {
    echo'<div class="pmenu"><table width="100%" border="0" cellspacing="0"><tbody><tr class="">
<td width="20%"><center>';


echo'<img src="/images/shop/'.$res[id_shop].'.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px">';

echo'</center></td>
<td width="80%"><input type="radio" name="vp" value="'.$res[id].'"><font color="red" size="1"><b>';
if ($res[nguoinhan]!=0 ){

echo'<i class="fa fa-lock"></i>';
} else {
echo'<i class="fa fa-unlock-alt"></i>';
}
echo'</b></font>
<font color="green">'.$res['tenvatpham'].' </font>';

    if ($res[sao]!=0) {
            echo'<font size="1" color="white" style="text-shadow: 0 0 0.2em #9932CC, 0 0 0.2em #9932CC,  0 0 0.2em #9932CC"><b>[ '.$res[sao].' ✩ ]</b></font>';
}
if ($res[cong]!=0 ) {
echo '<br/>Tăng SM: <font color="blue">'.number_format($res[sucmanh]).' [ +'.$res[conghp].' ] </font>';

}
if ( $res[conghp]!=0) {
echo '<br/>Tăng HP: <font color="red">'.number_format($res[sucmanh]).' [ +'.$res[cong].' ]</font>';


}

    echo '<br>Thời gian rao bán : '.date("d/m/Y - H:i", $res['time']).'
    <br>Thời gian gỡ : '.date("d/m/Y - H:i", $res['timetreoban']).'
<br/>Giá rao bán: '.number_format($res[gia]).' '.($res[loaitien]==xu?'Xu':'Lượng').'';
if ($res[nguoinhan]!=0 ){
echo'<br>Người được mua : '.nick($res[nguoinhan]).'';
}

echo'</td>
</tr></tbody></table></div>';    

}
}
$tong=mysql_result(mysql_query("SELECT COUNT(*) FROM `chotroi` WHERE `user_id`='".$user_id."'  AND `loaivp`='do'"),0);
if ($tong==0) {
echo '<div class="pmenu">Bạn chưa bán món hàng nào!</div>';
} else {
echo '</br><center><input type="submit" value="Thu hồi" name="del" class="nut"></center>';// - <input type="submit" value="Edit" name="edit" class="nut">';
}
echo '</form>';
if ($tong>$kmess) {
echo '<div class="gd_">' . functions::display_pagination('chotroi.php?act=my&', $start, $tong, $kmess) . '</div>';
}
echo '</div>';



break;
case 'myvp':
Echo'<div class="phdr">Đơn hàng của tôi</div>';
echo'
<div class="gd_"><div class="pmenu" style="text-align:center;"><select name="chotroi" onchange="location = this.options[this.selectedIndex].value;">
    Thành phố: 
    <option value="?act=myvp">Danh sách vật phẩm</option>

<option value="?act=my">Danh sách item</option>
</select>
</div></div>';

if (isset($_GET[err])) {
echo '<div class="pmenu">Có lỗi xảy ra!</div>';
}
if (isset($_GET[ok])) {
echo '<div class="pmenu">Thu hồi đơn hàng thành công</div>';
}
$req=mysql_query("SELECT * FROM `chotroi` WHERE `user_id`='".$user_id."'  AND `loaivp`='vatpham' LIMIT $start,$kmess");
if (isset($_POST[del])) {
$vp=(int)$_POST[vp];
$bug=mysql_num_rows(mysql_query("SELECT * FROM `chotroi` WHERE `id`='".$vp."' AND `user_id`='".$user_id."'  AND `loaivp`='vatpham'"));
if (!$bug) {
header('Location: chotroi.php?act=myvp&err');
} else {
$info=mysql_fetch_array(mysql_query("SELECT * FROM `chotroi` WHERE `id`='".$vp."'  AND `loaivp`='vatpham'"));

mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$info[soluong]."' WHERE `user_id`='".$user_id."' AND `id_shop`='".$info[id_shop]."'");

mysql_query("DELETE FROM `chotroi` WHERE `id`='".$vp."'");
header('Location: chotroi.php?act=myvp&ok');
}
}
if (isset($_POST[edit])) {
$vp=intval($_POST[vp]);
$bug=mysql_num_rows(mysql_query("SELECT * FROM `chotroi` WHERE `id`='".$vp."' AND `user_id`='".$user_id."' AND `loaivp`='vatpham'"));
if (!$bug) {
header('Location: chotroi.php?act=myvp&err');
} else {
header('Location: chotroi.php?act=edit&id='.$vp.'');
}
}
echo'<div class="gd">';
echo '<form method="post">';


while($res=mysql_fetch_array($req)) {

if ($res[loaivp]=='vatpham') {
    echo'<div class="pmenu"><table width="100%" border="0" cellspacing="0"><tbody><tr class="">
<td width="20%"><center><div style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px;width:48px;height:48px;">
<img src="/images/vatpham/'.$res[id_loai].'.png"><br><font size="1" color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><b>'.$res[soluong].' </b></font></div></center></td>
<td width="80%">
<input type="radio" name="vp" value="'.$res[id].'">
<font color="red" size="1"><b>';
if ($res[nguoinhan]!=0 ){

echo'<i class="fa fa-lock"></i>';
} else {
echo'<i class="fa fa-unlock-alt"></i>';
}
echo'</b></font>
<font color="green">'.$res[tenvatpham].' </font>
<br>Thời gian rao bán : '.date("d/m/Y - H:i", $res['time']).'
<br>Thời gian gỡ : '.date("d/m/Y - H:i", $res['timetreoban']).'
<br>Giá rao bán : <font color="red"> '.number_format($res[gia]).' '.($res[loaitien]==xu?'Xu':'Lượng').' </font>
';
if ($res[nguoinhan]!=0 ){
echo'<br>Người được mua : '.nick($res[nguoinhan]).'';
}
echo'
<br>
</td>
</tr></tbody></table></div>';
    

}
}
$tong=mysql_result(mysql_query("SELECT COUNT(*) FROM `chotroi` WHERE `user_id`='".$user_id."' AND `loaivp`='vatpham'"),0);
if ($tong==0) {
echo '<div class="pmenu">Bạn chưa bán món hàng nào!</div>';
} else {
echo '</br><center><input type="submit" value="Thu hồi" name="del" class="nut"></center>';// - <input type="submit" value="Edit" name="edit" class="nut">';
}
echo '</form>';
if ($tong>$kmess) {
echo '<div class="gd_">' . functions::display_pagination('chotroi.php?act=myvp&', $start, $tong, $kmess) . '</div>';
}
echo '</div>';


break;
case 'lichsu':
Echo'<div class="phdr">Lịch sử chợ trời';
?>
<select name="url"size="1"onChange="window.open(this.options [this.selectedIndex].value,'_top')" style="border: 0;">
<?php
echo '<option value="">---Chọn---</option>';
echo '<option value="?act=lichsu&type=all"> Tất cả</option>';
echo '<option value="?act=lichsu&type=tim"> Tìm theo thành viên</option>';
echo '</select>';
echo '</div>';
$type=functions::checkout($_GET[type]);
if ($type=='tim') {
echo '<form method="post"><input type="text" name="tim" placeholder="Nhập ID thành viên"> <input type="submit" name="do" value="Dò" class="nut"></form>';
if (isset($_POST['do'])) {
$tim=intval($_POST[tim]);
$pro=mysql_num_rows(mysql_query("SELECT * FROM `users` WHERE `id`='".$tim."'"));
if (!$pro) {
	echo '<div class="pmenu">Thành viên không tồn tại</div>';
} else {
$tong=mysql_result(mysql_query("SELECT COUNT(*) FROM `lichsu_chotroi` WHERE `user_id`='".$tim."' OR `nguoi_mua`='".$tim."'"),0);
if ($tong==0) {
	echo '<div class="pmenu">Người này chưa thực hiện giao dịch nào trong chợ trời</div>';
}
$req=mysql_query("SELECT * FROM `lichsu_chotroi` WHERE `user_id`='".$tim."' OR `nguoi_mua`='".$tim."'");
echo'<div class="gd">';


while($res=mysql_fetch_array($req)) {
    
    
    echo'<div class="pmenu"><table width="100%" border="0" cellspacing="0"><tbody><tr class="">
<td width="20%"><center>';
if ($res['loaivp']=='vatpham'){
 echo'<div style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px;width:48px;height:48px;">
<img src="/images/vatpham/'.$res[id_loai].'.png"><br><font size="1" color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><b>'.$res[soluong].' </b></font></div>';   
} else {


echo'<img src="/images/shop/'.$res[id_shop].'.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px">';

}
echo'</center></td>
<td width="80%">';

echo'
<font color="green">'.$res['tenvatpham'].' </font>';

    if ($res[sao]!=0) {
            echo'<font size="1" color="white" style="text-shadow: 0 0 0.2em #9932CC, 0 0 0.2em #9932CC,  0 0 0.2em #9932CC"><b>[ '.$res[sao].' ✩ ]</b></font>';
}
if ($res[cong]!=0 ) {
echo '<br/>Tăng SM: <font color="blue">'.number_format($res[sucmanh]).' [ +'.$res[conghp].' ] </font>';

}
if ( $res[conghp]!=0) {
echo '<br/>Tăng HP: <font color="red">'.number_format($res[sucmanh]).' [ +'.$res[cong].' ]</font>';


}

    echo '<br>Thời gian : '.date("d/m/Y - H:i", $res['time']).'
    
<br/>Giá rao bán: '.number_format($res[gia]).' '.($res[loaitien]==xu?'Xu':'Lượng').'';

echo'<br>Người mua : '.nick($res[nguoi_mua]).'';
echo'<br>Người bán : '.nick($res[user_id]).'';


echo'</td>
</tr></tbody></table></div>';    

}
echo '</div>';


}
if ($tong>$kmess) {
echo '<div class="topmenu">' . functions::display_pagination('chotroi.php?act=lichsu&type=tim&', $start, $tong, $kmess) . '</div>';
}
}

} else {
$tong=mysql_result(mysql_query("SELECT COUNT(*) FROM `lichsu_chotroi`"),0);
$req=mysql_query("SELECT * FROM `lichsu_chotroi` ORDER BY `time` DESC LIMIT $start,$kmess");
echo'<div class="gd">';
while($res=mysql_fetch_array($req)) {
    echo'<div class="pmenu"><table width="100%" border="0" cellspacing="0"><tbody><tr class="">
<td width="20%"><center>';
if ($res['loaivp']=='vatpham'){
 echo'<div style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px;width:48px;height:48px;">
<img src="/images/vatpham/'.$res[id_loai].'.png"><br><font size="1" color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><b>'.$res[soluong].' </b></font></div>';   
} else {


echo'<img src="/images/shop/'.$res[id_shop].'.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px">';

}
echo'</center></td>
<td width="80%">';

echo'
<font color="green">'.$res['tenvatpham'].' </font>';

    if ($res[sao]!=0) {
            echo'<font size="1" color="white" style="text-shadow: 0 0 0.2em #9932CC, 0 0 0.2em #9932CC,  0 0 0.2em #9932CC"><b>[ '.$res[sao].' ✩ ]</b></font>';
}
if ($res[cong]!=0 ) {
echo '<br/>Tăng SM: <font color="blue">'.number_format($res[sucmanh]).' [ +'.$res[conghp].' ] </font>';

}
if ( $res[conghp]!=0) {
echo '<br/>Tăng HP: <font color="red">'.number_format($res[sucmanh]).' [ +'.$res[cong].' ]</font>';


}

    echo '<br>Thời gian : '.date("d/m/Y - H:i", $res['time']).'
    
<br/>Giá rao bán: '.number_format($res[gia]).' '.($res[loaitien]==xu?'Xu':'Lượng').'';

echo'<br>Người mua : '.nick($res[nguoi_mua]).'';
echo'<br>Người bán : '.nick($res[user_id]).'';


echo'</td>
</tr></tbody></table></div>';    

}
echo '</div>';
if ($tong>$kmess) {
echo '<div class="topmenu">' . functions::display_pagination('chotroi.php?act=lichsu&type=all&', $start, $tong, $kmess) . '</div>';
}
}
break;
case 'duyet':
$donhang=mysql_num_rows(mysql_query("SELECT * FROM `chotroi` WHERE `duyet`='0'"));
$req=mysql_query("SELECT * FROM `chotroi` WHERE `duyet`='0'");
Echo'<div class="phdr">Duyệt đơn hàng</div>';
if ($donhang) {
	if ( $rights>=6) {
if(isset($_POST[duyetall])){
    	$dg = mysql_query("SELECT * FROM `chotroi` WHERE `duyet` ='0'");
while($check = mysql_fetch_array($dg)){ 
    			$name=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$check[user_id]."'"));
    			$name2=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$check[nguoinhan]."'"));

  	$text='<b><font color="003366">'.$login.'</font></b><font color="000000"> vừa duyệt đơn hàng  ['.$check[tenvatpham].'] của bạn</font>';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$check[user_id]."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");  

	if ($check['nguoinhan']>0) {
	    	$text='Bạn có một đơn hàng  <b>['.$check[tenvatpham].']</b> của <b>'.$name['name'].'</b>  đang đợi bạn mua</font>';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$check[nguoinhan]."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");  
}
 	if ($check['nguoinhan']>0) {

$text = 'Bạn [b]'.$name['name'].'[/b] vừa treo bán [b]'.$check['tenvatpham'].'[/b] cho [b]'.$name2['name'].'[/b]  tại Chợ trời. Mua ngay';
} else {
$text = 'Bạn [b]'.$name['name'].'[/b] vừa treo bán [b]'.$check['tenvatpham'].'[/b] tại Chợ trời. Mua ngay';

}

mysql_query("INSERT INTO `guest` SET `user_id`='256', `text`='" . mysql_real_escape_string($text) . "', `time`='".time()."'");

}
	mysql_query("UPDATE `chotroi` SET `duyet`='1',`nguoi_duyet`='".$user_id."',`timetreoban`= '" .time(). "' + '604800'  WHERE `duyet`='0' ");

    
}
if (isset($_POST[chapthuan])) {
	$vp=intval($_POST[vp]);
	$ccc=mysql_num_rows(mysql_query("SELECT * FROM `chotroi` WHERE `id`='".$vp."'"));
			$info=mysql_fetch_array(mysql_query("SELECT * FROM `chotroi` WHERE `id`='".$vp."'"));
    			$name=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$info[user_id]."'"));
    			$name2=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$info[nguoinhan]."'"));

	if (!$ccc) {
		echo '<div class="pmenu">Vật phẩm không tồn tại</div>';
	} else {
	mysql_query("UPDATE `chotroi` SET `duyet`='1',`nguoi_duyet`='".$user_id."',`timetreoban`= '" .time(). "' + '604800' WHERE `id`='".$vp."' AND  `duyet`='0'");
	$text='<b><font color="003366">'.$login.'</font></b><font color="000000"> vừa duyệt đơn hàng  ['.$info[tenvatpham].'] của bạn</font>';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$info[user_id]."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");  
	if ($info['nguoinhan']>0) {
	    	$text='Bạn có một đơn hàng  <b>['.$info[tenvatpham].']</b> của <b>'.$name['name'].'</b>  đang đợi bạn mua</font>';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$info[nguoinhan]."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");  
}
 	if ($info['nguoinhan']>0) {

$text = 'Bạn [b]'.$name['name'].'[/b] vừa treo bán [b]'.$info['tenvatpham'].'[/b] cho [b]'.$name2['name'].'[/b]  tại Chợ trời. Mua ngay';
} else {
$text = 'Bạn [b]'.$name['name'].'[/b] vừa treo bán [b]'.$info['tenvatpham'].'[/b] tại Chợ trời. Mua ngay';

}
mysql_query("INSERT INTO `guest` SET `user_id`='256', `text`='" . mysql_real_escape_string($text) . "', `time`='".time()."'");

	header('Location: chotroi.php?act=duyet');
	}
}
if (isset($_POST[huybo])) {
	$vp=intval($_POST[vp]);
	$ccc=mysql_num_rows(mysql_query("SELECT * FROM `chotroi` WHERE `id`='".$vp."'"));
		$info=mysql_fetch_array(mysql_query("SELECT * FROM `chotroi` WHERE `id`='".$vp."'"));
	if (!$ccc) {
		echo '<div class="pmenu">Vật phẩm không tồn tại</div>';
	} else {
	if ($info[duyet]==1) {
		echo '<div class="pmenu">Đơn hàng này đã được duyệt rồi!</div>';
	} else {

	mysql_query("DELETE FROM `chotroi` WHERE `id`='".$vp."'");
	if ($info[loaivp]=='do') {
				$text='<b><font color="003366">'.$login.'</font></b><font color="000000"> vừa từ chối đơn hàng <img src="/images/shop/'.$info[id_shop].'.png"> ['.$info[tenvatpham].'] của bạn</font>';
mysql_query("INSERT INTO `thongbao` SET
`id`='".$user_id."',
`user`='".$info[user_id]."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
mysql_query("
INSERT INTO `khodo` SET
`user_id`='".$info[user_id]."',
`tenvatpham`='".$info[tenvatpham]."',
`id_loai`='".$info[id_loai]."',
`cong`='".$info[cong]."',
`conghp`='".$info[conghp]."',
`sao`='".$info[sao]."',

`sucmanh`='".$info[sucmanh]."',
`hp`='".$info[hp]."',
`id_shop`='".$info[id_shop]."',
`loai`='".$info[loai]."'
");
} else if($info[loaivp]=='vatpham') {
			$text='<b><font color="003366">'.$login.'</font></b><font color="000000"> vừa từ chối đơn hàng <img src="/images/vatpham/'.$info[id_shop].'.png"> ['.$info[tenvatpham].'] của bạn</font>';
mysql_query("INSERT INTO `thongbao` SET
`id`='".$user_id."',
`user`='".$info[user_id]."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$info[soluong]."' WHERE `user_id`='".$info[user_id]."' AND `id_shop`='".$info[id_shop]."'");
}
	header('Location: chotroi.php?act=duyet');
	}
	}
}
}
}
echo'<div class="gd">';

echo '<form method="post">';
while($res=mysql_fetch_array($req)) {
if ($res[loaivp]=='do') {
 echo'<div class="pmenu"><table width="100%" border="0" cellspacing="0"><tbody><tr class="">
<td width="20%"><center>';


echo'<img src="/images/shop/'.$res[id_shop].'.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px">';

echo'</center></td>
<td width="80%"><input type="radio" name="vp" value="'.$res[id].'"><font color="red" size="1"><b>';
if ($res[nguoinhan]!=0 ){

echo'<i class="fa fa-lock"></i>';
} else {
echo'<i class="fa fa-unlock-alt"></i>';
}
echo'</b></font>
<font color="green">'.$res['tenvatpham'].' </font>';

    if ($res[sao]!=0) {
            echo'<font size="1" color="white" style="text-shadow: 0 0 0.2em #9932CC, 0 0 0.2em #9932CC,  0 0 0.2em #9932CC"><b>[ '.$res[sao].' ✩ ]</b></font>';
}
if ($res[cong]!=0 ) {
echo '<br/>Tăng SM: <font color="blue">'.number_format($res[sucmanh]).' [ +'.$res[conghp].' ] </font>';

}
if ( $res[conghp]!=0) {
echo '<br/>Tăng HP: <font color="red">'.number_format($res[sucmanh]).' [ +'.$res[cong].' ]</font>';


}

    echo '
<br/>Giá rao bán: '.number_format($res[gia]).' '.($res[loaitien]==xu?'Xu':'Lượng').'';
    echo '
<br/>Người bán: '.nick($res[user_id]).'';
if ($res[nguoinhan]!=0 ){
echo'<br>Người được mua : '.nick($res[nguoinhan]).'';
}

echo'</td>
</tr></tbody></table></div>';    
}
if ($res[loaivp]=='vatpham') {
echo'<div class="pmenu"><table width="100%" border="0" cellspacing="0"><tbody><tr class="">
<td width="20%"><center><div style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px;width:48px;height:48px;">
<img src="/images/vatpham/'.$res[id_loai].'.png"><br><font size="1" color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><b>'.$res[soluong].' </b></font></div></center></td>
<td width="80%">
<input type="radio" name="vp" value="'.$res[id].'">
<font color="red" size="1"><b>';
if ($res[nguoinhan]!=0 ){

echo'<i class="fa fa-lock"></i>';
} else {
echo'<i class="fa fa-unlock-alt"></i>';
}
echo'</b></font>
<font color="green">'.$res[tenvatpham].' </font>

<br>Giá rao bán : '.number_format($res[gia]).' '.($res[loaitien]==xu?'Xu':'Lượng').' 
';
    echo '
<br/>Người bán: '.nick($res[user_id]).'';
if ($res[nguoinhan]!=0 ){
echo'<br>Người được mua : '.nick($res[nguoinhan]).'';
}
echo'
<br>
</td>
</tr></tbody></table></div>';
}
}
$tong=mysql_result(mysql_query("SELECT COUNT(*) FROM `chotroi` WHERE `duyet`='0'"),0);
	if ($tong==0) {
		echo '<div class="pmenu">Không có đơn hàng nào chờ duyệt</div>';
	} else {
		if ($rights>=6 ) {
		echo'<center><input type="submit" value="Duyệt tất cả" name="duyetall" class="nut"> - <input type="submit" value="Chấp thuận" name="chapthuan" class="nut"> - <input type="submit" value="Hủy bỏ" name="huybo" class="nut"></center>';
		}
	}
echo '</form>';
if ($tong>$kmess) {
echo '<div class="phantrang">' . functions::display_pagination('chotroi.php?act=duyet&', $start, $tong, $kmess) . '</div>';
}
echo '</div>';

break;
}

require('../incfiles/end.php');
?>