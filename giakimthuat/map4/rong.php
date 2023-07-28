<?php

define('_IN_JOHNCMS', 1);
$rootpath='../../';

require_once ("../../incfiles/core.php");



if (isset($_GET['uocnguyen'])) {

$vatpham = $id;
if(empty($vatpham)){
header('location: /');
}
$check=mysql_num_rows(mysql_query("SELECT * FROM `users` WHERE `id`='".$vatpham."'  "));
if($check < 1){
                		    echo'<script>alert("Lỗi không có nhân vật này!!");</script>';
                		    exit;
}
    $gkt=mysql_fetch_array(mysql_query("SELECT * FROM `giakimthuat_user` WHERE  `user_id`='".$user_id."' "));

    $daun=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE  `id_shop`='319' AND `user_id`='".$user_id."' "));

if($daun['soluong'] < 1){
                		    echo'<script>alert("Lỗi không có đá ước nguyện!!");</script>';
                		    exit;
}
if ($gkt['uocnguyen_time']>time()){
    $time=$gkt['uocnguyen_time']-time();
       echo'<script>alert("Vui lòng đợi '.$time.'s nữa để ước nguyện");</script>';
                		    exit; 
    
}
if ($gkt['uocnguyen']>=100){
  echo'<div class="lethinh"><center>Bạn đã vượt qua 100 ước nguyện, vui lòng nhận Rương đồ long thần để tiếp tục</br>
  <input  type="submit" id="submit" onclick ="nhanruong('.$user_id.')" value="Nhận"></center></div>';

    exit;
}  


$rand=rand(1,8);
$randxu=rand(10000,200000);
$randluong=rand(10,100);
$randexp=rand(1000,20000);
$randda=rand(10,50);


$timeun=time()+10;
                          mysql_query("UPDATE `giakimthuat_user` SET `uocnguyen`=`uocnguyen`+'1',`uocnguyen_time`='{$timeun}' WHERE `user_id`='".$user_id."'  ");

                        mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop`='319' ");

if ($rand==1) {
echo'<div class="lethinh"><center>Đánh thức Rồng ngàn tuổi thành công! Bạn nhận được 1 Rương rồng ngàn tuổi!</center></div>';



                          mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop`='321' ");
           }
           
           
    if ($rand==2) {
echo'<div class="lethinh"><center>Đánh thức Rồng ngàn tuổi thành công! Bạn nhận được '.$randexp.' kinh nghiệm!</center></div>';



                          mysql_query("UPDATE `users` SET `exp`=`exp`+'{$randexp}' WHERE `id`='".$user_id."' ");
           }
                  
if ($rand==3) {
echo'<div class="lethinh"><center>Đánh thức Rồng ngàn tuổi thành công! Bạn nhận được '.$randxu.' xu!</center></div>';
                        mysql_query("UPDATE `users` SET `xu`=`xu`+'{$randxu}' WHERE `id`='".$user_id."'");



  
           }
           if ($rand==4) {
echo'<div class="lethinh"><center>Đánh thức Rồng ngàn tuổi thành công! Bạn nhận được '.$randluong.' lượng!</center></div>';
                        mysql_query("UPDATE `users` SET `luong`=`luong`+'{$randluong}' WHERE `id`='".$user_id."'");



  
           }
                      if ($rand==5) {
echo'<div class="lethinh"><center>Đánh thức Rồng ngàn tuổi thành công! Bạn nhận được '.$randluong.' lượng khóa!</center></div>';
                        mysql_query("UPDATE `users` SET `luongkhoa`=`luongkhoa`+'{$randluong}' WHERE `id`='".$user_id."'");



  
           }
                                 if ($rand==6) {
echo'<div class="lethinh"><center>Đánh thức Rồng ngàn tuổi thành công! Bạn nhận được '.$randda.' đá nâng cấp!</center></div>';
                          mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'{$randda}' WHERE `user_id`='".$user_id."' AND `id_shop`='60' ");



  
           }
                                            if ($rand==7) {
echo'<div class="lethinh"><center>Đánh thức Rồng ngàn tuổi thành công! Bạn nhận được '.$randda.' cuốc!</center></div>';
                          mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'{$randda}' WHERE `user_id`='".$user_id."' AND `id_shop`='322' ");



  
           }
                                                       if ($rand==8) {
echo'<div class="lethinh"><center>Đánh thức Rồng ngàn tuổi thành công! Bạn nhận được 1 rương ngọc rồng</center></div>';
                          mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop`='267' ");



  
           }



}


//

if (isset($_GET['nhanruong'])) {

$vatpham = $id;
if(empty($vatpham)){
header('location: /');
}
$check=mysql_num_rows(mysql_query("SELECT * FROM `users` WHERE `id`='".$vatpham."'  "));
if($check < 1){
                		    echo'<script>alert("Lỗi không có nhân vật này!!");</script>';
                		    exit;
}
    $gkt=mysql_fetch_array(mysql_query("SELECT * FROM `giakimthuat_user` WHERE  `user_id`='".$user_id."' "));

if ($gkt['uocnguyen']<100){
                		    echo'<script>alert("Lỗi hệ thống");</script>';


    exit;
}  

                          mysql_query("UPDATE `giakimthuat_user` SET `uocnguyen`='0' WHERE `user_id`='".$user_id."'  ");


                        mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop`='331' ");

                  		    echo'<script>alert("Bạn nhận được 1 Rương đồ long thần");</script>';

           


}


//

?>