<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
require('../incfiles/head.php');
if (!$user_id) {
header('Location: /login.php');
exit;
}

$pin = rand(100000000,999999999);
$seri = rand(100000000,999999999);
$datinhanh=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='112'"));
$rxu = rand(10000,500000);

$randthe = rand(1,8);
$rdns = rand (1,5);
$r = rand(1,50);
$da = rand(5,20);

echo'
<div class="phdr">Rút Thẻ Bài </div>';

if ($datauser['kichhoat']==0){
		echo'<div class="omenu"><b><font color="red">Lỗi!</font></b>Bạn cần kích hoạt tài khoản</div>';
require('../incfiles/end.php');
exit;
} 
if ($datinhanh['soluong']<1) {

		echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn không có Đá tinh anh <img src="/images/vatpham/112.png"> hãy tham gia thêm nhiều hoạt động để sở hữu <a href="/"> Quay về Trang chủ</a></div>';
require('../incfiles/end.php');
exit;
}
echo'<div class="omenu"><center>
Bạn đang có: <b>'.$datinhanh['soluong'].'</b> Đá tinh anh <img src="/images/vatpham/112.png"><br><br>
<i> Nhấp vào để rút thẻ bài ngẫu nhiên</i><br>
<form method="post">
<input type="submit" name="submit" value="Rút thẻ bài">
</form>
</center>
</div>';

if (isset($_POST['submit'])) {

	if ($datinhanh['soluong']<1) {

		echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn không có Đá tinh anh <img src="/images/vatpham/112.png"> hãy tham gia thêm nhiều hoạt động để sở hữu <a href="/"> Quay về Trang chủ</a></div>';
	} else {
	
			echo'<div class="omenu"><center><img src="img/the'.$randthe.'.png"><br>';
			echo'
Ái chà chà, bạn đã rút trúng lá bài này, ';
if ($r==50) {
	echo'bạn nhận được thẻ 1STPay 10k';
$text = 'Chúc mừng '.$login.' đã rút thành công thẻ bài [img]'.$home.'/khungoaio/img/the'.$randthe.'.png[/img] và nhận được thẻ 1STPay 10k tại Ngoại ô ';
$text2 = '<center><img src="http://i.imgur.com/UUNSdhi.png"><br><font color="green">Thẻ 1STPay Mệnh Giá 10.000 VND</font></br><font color="red">Mã Pin: '.$pin.' </font></center>';

mysql_query("INSERT INTO `guest` SET
`user` = '256',
`time` = '".time()."',
`text` = '".$text."'
");
mysql_query("INSERT INTO `1STPay` SET
`pin`='".$pin."',
`user_tao`= '".$user_id."',
`timetao` = '".time()."',
`menhgia`='10000'");
mysql_query("INSERT INTO `thongbao` SET
                `id` = '".$user_id."',
                `user` = '".$user_id."',
                `text` = '$text2',
                `ok` = '1',
                `time` = '" . time() . "'
            ");
}
else if ($r==1){

echo'bạn nhận được '.$rdns.' <img src="/images/vatpham/123.png"> đá ngũ sắc';
  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$rdns."' WHERE `user_id`='".$user_id."' AND `id_shop` = '123'");

} else  if ($r==2){
	echo'bạn nhận được '.$rdns.' <img src="/images/vatpham/12.png"> thẻ quay số free';
  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$rdns."' WHERE `user_id`='".$user_id."' AND `id_shop` = '12'");

} else  if ($r==3){
		echo'bạn nhận được '.$rdns.' <img src="/images/vatpham/124.png"> thẻ x5 nâng cấp';
  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$rdns."' WHERE `user_id`='".$user_id."' AND `id_shop` = '124'");

} else  if ($r==4){
		echo'bạn nhận được '.$rdns.' <img src="/images/vatpham/126.png"> thẻ x5 quay số';
  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$rdns."' WHERE `user_id`='".$user_id."' AND `id_shop` = '126'");
} else  if ($r==5){
		echo'bạn nhận được '.$rdns.' lượng khóa';
  mysql_query("UPDATE `users` SET `luongkhoa`=`luongkhoa`+'".$rdns."' WHERE `id`='".$user_id."' ");

} else  if ($r>=6 and $r<50){
			echo'bạn nhận được '.$rxu.' xu';
  mysql_query("UPDATE `users` SET `xu`=`xu`+'".$rxu."' WHERE `id`='".$user_id."' ");
}
	
echo' <a href="/"> Tiếp tục </a></center></div>';

		
	  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '112'");
	

}
}


require('../incfiles/end.php');
?>