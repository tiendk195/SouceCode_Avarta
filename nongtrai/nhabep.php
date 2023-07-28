<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
$id = (int)$_GET['id'];
$u = $user_id;
if(!$u){
header('location: /index.php');
}
$headmod = 'Nông trại';
$textl = 'Nhà bếp';
require('../incfiles/head.php');
?>
<script> 
$('#vao').click(function() {  
$('#ra').toggle('fast','linear');  
}); 
</script>
<?php
echo'<div class="phdr"><a href="index.php">Nông trại vui vẻ</a> | <b><a href="?act=kho">KHO BẾP</a></b></div>';
switch($act){
case'kho':
mysql_query("DELETE FROM `nhabep_kho` WHERE `soluong`<='0' AND `user_id`='".$u."'");
$c = mysql_fetch_assoc(mysql_query("SELECT * FROM `nhabep_chebien` WHERE `user_id`='".$u."'"));
$v = mysql_fetch_assoc(mysql_query("SELECT * FROM `nhabep_shop` WHERE `id`='".$c['chebien']."'"));
$n = mysql_query("SELECT COUNT(*) FROM `nhabep_kho` WHERE `user_id`='".$u."' AND `chebien`='".$c['chebien']."'");
if($n > 0){
$req = mysql_query("SELECT `chebien`, `soluong` FROM `nhabep_kho` WHERE `user_id`='".$u."'");
while($res = mysql_fetch_assoc($req)){
$z = mysql_fetch_assoc(mysql_query("SELECT * FROM `nhabep_shop` WHERE `id`='".$res['chebien']."'"));
echo'<div class="omenu"><b><font color="red"> '.$z['ten'].' </font></b> <img src="icon/nhabep/'.$z['id'].'.png"></br> Số lượng: <b>'.$res['soluong'].'</b><form method="post" action="?act=ban&id='.$z['id'].'"><input type="submit" value="Bán"></form></div>';
}
}else{
echo'<div class="omenu"><b><font color="red">BẠN CHƯA CÓ SẢN PHẨM NÀO</font></b></div>';
}
break;
case'ban':
$xyz=mysql_num_rows(mysql_query("SELECT * FROM `nhabep_shop` WHERE `id`='".$id."'"));
if($xyz<=0){header('location: /');}
if($id){
$d = mysql_fetch_assoc(mysql_query("SELECT `soluong` FROM `nhabep_kho` WHERE `user_id`='".$u."' AND `chebien`='".$id."'")); $i = mysql_fetch_assoc(mysql_query("SELECT * FROM `nhabep_shop` WHERE `id`='".$id."'"));
$s = (int)$_POST['s'];
$req = mysql_query("SELECT `chebien`, `soluong` FROM `nhabep_kho` WHERE `user_id`='".$u."'");
while($res = mysql_fetch_assoc($req)){
$z = mysql_fetch_assoc(mysql_query("SELECT * FROM `nhabep_shop` WHERE `id`='".$res['chebien']."'"));
if($res['chebien']==$id){echo'<div class="omenu"><b><font color="red"> '.$z['ten'].' </font></b> <img src="icon/nhabep/'.$res['chebien'].'.png"> </br>Số lượng: <b>'.$res['soluong'].'</b><form method="post"><input type="number" name="s" placeholder="Nhập số lượng cần bán"><br> <input type="submit" name="ban" value="Bán"></form></div>';}
}
if(isset($_POST['ban'])){
if($d['soluong'] < $s || $s < 1){
echo'<div class="omenu">Bạn không đủ sản phẩm</div>';
}else{
$t = $i['gia'] * $s;
mysql_query("UPDATE `nhabep_kho` SET `soluong`=`soluong`-'".$s."' WHERE `user_id`='".$u."' AND `chebien`='".$id."'");
mysql_query("UPDATE `users` SET `xu`=`xu`+'".$t."',`nhabepthuhoach`=`nhabepthuhoach` + '".$t."'  WHERE `id`='".$u."'");
$y=$i['gia'] / 100;
mysql_query("UPDATE `users` SET `exp`=`exp`+'".$y."' WHERE `id`='".$u."'");
echo'<div class="menu blue">Bán thành công bạn nhận được '.$t.' xu! <a href="index.php">Trở về nông trại</a></div>';
}
}
}
break;
case'nauan':
$xyz=mysql_num_rows(mysql_query("SELECT * FROM `nhabep_shop` WHERE `id`='".$id."'"));
if($xyz<=0){header('location: /');}
if($id){
$i = mysql_fetch_assoc(mysql_query("SELECT * FROM `nhabep_shop` WHERE `id`='".$id."'"));
echo'<form method="post"><div class="omenu"> Bạn có muốn chế biến <img src="icon/nhabep/'.$i['id'].'.png"> <b><font color="red"> '.$i['ten'].' </font></b></br>Với công thức là: '.($i['vp1'] <= 0 ? '' : ' <b>'.$i['sl1'].'</b> <img src="img/product/'.$i['vp1'].'.png">').' '.($i['vp2'] <= 0 ? '' : ' và <b>'.$i['sl2'].'</b> <img src="img/product/'.$i['vp2'].'.png">').' '.($i['vp3'] <= 0 ? '' : ' và <b>'.$i['sl3'].'</b> <img src="img/product/'.$i['vp3'].'.png"> ').' không ? <br> <input type="submit" name="nau" value="Làm Ngay"></div></form>';
if(isset($_POST['nau'])){
$n=mysql_num_rows(mysql_query("SELECT * FROM `nhabep_chebien` WHERE `user_id`='".$u."'"));
if($n > 0){
echo'<div class="omenu"><b><font color="red">Lỗi! Bạn đã chế biến 1 món trước rồi </font></b></div>';
}else{
$v1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `fermer_sclad` WHERE `semen`='".$i['vp1']."' AND `id_user`='".$u."'"));
$v2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `fermer_sclad` WHERE `semen`='".$i['vp2']."' AND `id_user`='".$u."'"));
$v3 = mysql_fetch_assoc(mysql_query("SELECT * FROM `fermer_sclad` WHERE `semen`='".$i['vp3']."' AND `id_user`='".$u."'"));
if(empty($i['sl1'])){$i['sl1']='0'; $v1['kol']='0';}if(empty($i['sl2'])){$i['sl2']='0'; $v2['kol']='0';}if(empty($i['sl3'])){$i['sl3']='0'; $v3['kol']='0';}
if($v1['kol']>=$i['sl1'] && $v2['kol']>=$i['sl2'] && $v3['kol'].=$i['sl3']){
mysql_query("UPDATE `fermer_sclad` SET `kol`=`kol`-'".$i['sl1']."' WHERE `id_user`='".$u."' AND `semen`='".$i['vp1']."'");
mysql_query("UPDATE `fermer_sclad` SET `kol`=`kol`-'".$i['sl2']."' WHERE `id_user`='".$u."' AND `semen`='".$i['vp2']."'");
mysql_query("UPDATE `fermer_sclad` SET `kol`=`kol`-'".$i['sl3']."' WHERE `id_user`='".$u."' AND `semen`='".$i['vp3']."'");
mysql_query("INSERT INTO `nhabep_chebien` SET `user_id`='".$u."', `chebien`='".$id."', `time`='".($i['thoigian']*3600+time())."'");
echo'<div class="omenu"><b><font color="blue">Chế biến thành công</font></b></div>';

$checknv3=mysql_num_rows(mysql_query("SELECT * FROM `nhiemvu_user` WHERE `user_id`='".$user_id."' AND `id_nv`='22'"));
if ($checknv3>0) {
mysql_query("UPDATE `nhiemvu_user` SET `tiendo`=`tiendo`+'1' WHERE `user_id`='".$user_id."' AND `id_nv`='22'");
}
}else{echo'<div class="omenu"><b><font color="red">Lỗi! Bạn đã thiếu nguyên liệu để chế tạo </font></b></div>';}
}
}
echo '<div class="omenu">&raquo; <a href="nhabep.php">Quay lại</a></div>';
}
break;
default:


$n=mysql_num_rows(mysql_query("SELECT * FROM `nhabep_chebien` WHERE `user_id`='".$u."'")); if($n<=0){echo'<div class="omenu"> Bạn chưa có sản phẩm nào đang chế biến ! </div>';}else{
$c = mysql_fetch_assoc(mysql_query("SELECT * FROM `nhabep_chebien` WHERE `user_id`='".$u."'"));
$v = mysql_fetch_assoc(mysql_query("SELECT * FROM `nhabep_shop` WHERE `id`='".$c['chebien']."'"));
if($c['time'] > time()){
echo'<div class="omenu"><center><b><font color="red">'.$v['ten'].'</font></b> <img src="icon/nhabep/'.$v['id'].'.png"></br>Chế biến xong sau '.round(($c['time']-time())/60).' phút nữa</center></div>';
}else{
echo'<div class="omenu"><center><img src="icon/nhabep/'.$v['id'].'.png"><br><b><font color="red">'.$v['ten'].'</font></b><br><font color="green">CHẾ BIẾN HOÀN TẤT</font><br><form method="post"><input type="submit" name="done" value="HOÀN THÀNH"></form></center></div>';
if(isset($_POST['done'])){
if($c['time'] > time()){
echo'<div class="omenu">Đang chế biến, Xin quay lại sau !</div>';
}else{
$k=$v['gia'];
if($k > 0){
$n = mysql_result(mysql_query("SELECT COUNT(*) FROM `nhabep_kho` WHERE `user_id`='".$u."' AND `chebien`='".$v['id']."'"), 0);
if($n){
mysql_query("UPDATE `nhabep_kho` SET `soluong`=`soluong`+'1' WHERE `chebien`='".$v['id']."' AND `user_id`='".$u."'");
}else{
mysql_query("INSERT INTO `nhabep_kho` SET `user_id`='".$u."', `chebien`='".$v['id']."', `soluong`='1'");
}
mysql_query("DELETE FROM `nhabep_chebien` WHERE `user_id`='".$u."'");
/*
  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '242'");

		  $text='Bạn đã nhận được 1 Bóng thường  từ Nhà bếp ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");

*/
/*
$randsn=rand(1,1);
	if ($datauser['gioihannhabep']<20){
		if ($randsn==1){
		    echo' <div class="omenu">Bạn nhận được 1 số 1 yêu thương <img src="/images/vatpham/158.png"></br></div>';
mysql_query("UPDATE `users` SET `gioihannhabep` =`gioihannhabep` + '1'  WHERE `id` = '{$user_id}'");
  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '158'");

	}
	}
	*/
echo'<div class="omenu"><font color="green">HOÀN TẤT</font> Bạn nhận được <font color="red">'.$v['ten'].'</font></div>';
}else{
echo'<div class="omenu"><font color="red">Lỗi!</font> Bạn chưa chế biến sản phẩm nào !</div>';
}
}
}
}
}
echo'<div class="phdr">Sản phẩm nhà bếp</div>';

$req = mysql_query("SELECT * FROM `nhabep_shop`");

while($res = mysql_fetch_assoc($req)){

echo'<div class="omenu"><b><font color="red"> '.$res['ten'].' </font></b> <img src="icon/nhabep/'.$res['id'].'.png"><br> Thời gian làm: '.$res['thoigian'].' giờ <br> Giá bán ra: '.$res['gia'].' Xu <form method="post" action="?act=nauan&id='.$res['id'].'"><input type="submit" value="Nấu ăn"></form></div>';

}

break;
}
echo '<div class="omenu">&raquo; <a href="nhabep.php">Nhà bếp</a> &raquo; <a href="/nongtrai">Nông Trại</a> &raquo; <a href="/farm">Trang trại</a>
</div>';
require('../incfiles/end.php');