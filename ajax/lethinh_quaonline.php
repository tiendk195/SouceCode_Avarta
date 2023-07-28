<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');

?>
<style>
.lt {
    border-radius: 25px;
    padding: 8px;
    border: 2px solid #FF1493;
    word-wrap: break-word;
}
</style>
<?php

if (isset($_POST['quaonline'])) {



   if (time()>$datauser['timehopqua']+60*60) {
	   $r = rand(1,10);

$randxu = rand(1000,50000);
$luong = rand(10,30);
$vequay = rand(1,2);
if ($datauser['naptichluy'] <10000) {
	
$diem = rand(0,0);
}
if ($datauser['diemnapthe'] >=10000) {
	
$diem = rand(10,50);
}
$manh1 = rand(1,2);
$manh2 = rand(1,2);
$manh3 = rand(1,2);
$manh4 = rand(1,2);
$hopqua15 = rand(1,2);


$exp = rand(1000,1500);


  		    echo'<script>alert("Bạn nhận được ngọc rồng 7 sao");</script>';
     mysql_query("UPDATE `vatpham` SET `soluong`=`soluong` +'1' WHERE `user_id`='{$user_id}' AND `id_shop`='275'");



mysql_query("UPDATE `users` SET `nhanhhoavang`=`nhanhhoavang`+'1',`phongbaodo`=`phongbaodo`+'1',`xu` = `xu` + '".$randxu."', `diemnapthe`=`diemnapthe`+'".$diem."' , `luong`=`luong`+{$luong},`exp`=`exp`+'".$exp."',`timehopqua` = '".time()."' WHERE `id` = '".$user_id."'");
echo '<div class="pmenu">Bạn nhận được '.$vequay.' vé quay báu vật, 1<img src="https://i.imgur.com/BIl190L.png">, 1 <img src="https://i.imgur.com/ifXCsww.png">, '.$diem.' điểm nạp thẻ,   '.$randxu.' xu, '.$luong.' lượng, '.$exp.' exp , 1 hộp quà mảnh ghép từ hộp quà</br>
</div>';
     mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$vequay."' WHERE `user_id`='".$user_id."' AND `id_shop` = '251'");

     mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '97'");
	 /*
	 $randsn=rand(1,1);
	if ($datauser['gioihanbaodanh']<10){
		if ($randsn==1){
		    echo' Bạn nhận được 1 số 1 yêu thương <img src="/images/vatpham/158.png"></br>';
mysql_query("UPDATE `users` SET `gioihanbaodanh` =`gioihanbaodanh` + '1'  WHERE `id` = '{$user_id}'");
  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '158'");

	}
	}
	*/
/*
  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '242'");

		  $text='Bạn đã nhận được 1 Bóng thường  từ Báo danh online ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");

*/
$checknv3=mysql_num_rows(mysql_query("SELECT * FROM `nhiemvu_user` WHERE `user_id`='".$user_id."' AND `id_nv`='20'"));
if ($checknv3>0) {
mysql_query("UPDATE `nhiemvu_user` SET `tiendo`=`tiendo`+'1' WHERE `user_id`='".$user_id."' AND `id_nv`='20'");
}

if ($datauser['kichhoatvip']>0) {
mysql_query("UPDATE `users` SET `diemtinhtuy`=`diemtinhtuy`+'1'  WHERE `id` = '".$user_id."'");
     mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'10' WHERE `user_id`='".$user_id."' AND `id_shop` = '122'");
	echo'<div class="lt">Bạn nhận được 1 Điểm tinh túy và 10 Thẻ VIP <img src="/images/vatpham/122.png"> !</div>';
   }


//echo'<div class="omenu">Bạn nhận được '.$hopqua15.' <img src="/images/vatpham/105.png"> Hộp quà 1.5</div>   ';


  //mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$hopqua15."' WHERE `user_id`='".$user_id."' AND `id_shop` = '105'");

}

 else {
     echo'<div class="omenu"><font color="red">Lỗi bạn đã nhận quà rồi</font> </div>';
 }
   
}