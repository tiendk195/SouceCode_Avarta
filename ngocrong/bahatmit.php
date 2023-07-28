<?php
/*
Code Được Mod Bởi Lê Văn Thịnh
Code Mod By Lê Văn Thịnh
Vui Lòng Ghi Nguồn Nếu Có Sao Chép! 
*/
define('_IN_JOHNCMS',1);
include'../incfiles/core.php';
$textl ='Làng Ngọc Rồng';
include'../incfiles/head.php';
if(!$user_id){
header('location: /login.php');
include'../incfiles/end.php';
exit;
}
if ($datauser['kichhoat']==0){
    Header('location: '.$home.'/users/checkpoint.php');
    exit;
}

echo'<div class="phdr">Làng Ngọc Rồng > NPC > Bà Hạt Mít</div>';
switch($act) {
default:
echo'<div class="gd_"><div class="gd_npc"><center><img src="https://i.imgur.com/xw6IdJt.png"><br>
 Để hóa phép 1 viên ngọc cấp cao hơn, con cần 7 viên ngọc cấp dưới nó 1 bậc và cần phải có mảnh đá vụn <img src="/images/vatpham/285.png"> :</br>
   Ngươi tìm ta có việc gì?</div>
</center>
<div class="pmenu"><a href="?act=muacapsule"><img src="/images/vao.png"> Mua Capsule kì bí</a></div>
<div class="pmenu"><a href="nhapngoc.php"><img src="/images/vao.png"> Nhập Ngọc rồng</a></div>
</center></div>';

break;
case 'muacapsule':
echo'<div class="gd_"><div class="pmenu"><center><img src="/images/vatpham/66.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px"><br>
Bạn có muốn mua <font color="green">Capsule kì bí</font> với giá <font color="red">250 lượng khóa</font> không? Giới hạn mua hôm nay <font color="red">(không giới hạn)</font>
<form method="post"><br><font size="1">Nhập số lượng bạn muốn mua:</font><br>
<input type="number" name="sl" value="1"><br>
<input type="submit" name="submit" value="Mua"></center>
</form></div></div>';
   IF(Isset($_POST['submit'])){
    	$sl=trim($_POST['sl']);
    
    
    	    $giatien=$sl*250;




IF($datauser['luongkhoa'] >= $giatien and $sl >0  ){
mysql_query("UPDATE `users` SET `luongkhoa`=`luongkhoa`-'".$giatien."' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$sl."' WHERE `user_id`='".$user_id."' AND `id_shop`='66'");

Echo'<div class="gd_"><div class="pmenu"><center>Bạn đã mua thành công <font color="green">'.$sl.' Capsule kì bí</font> với giá <font color="red">'.$giatien.' lượng khóa</font>. Hãy kiểm tra ở Rương</b></center></div></div>';

}Else{
Echo'<div class="gd_"><div class="pmenu"><center>Bạn không đủ <font color="red">'.$giatien.' lượng khóa</font> để mua!!</b></center></div></div>';
}


}

    
}
    
include'../incfiles/end.php';


?>
