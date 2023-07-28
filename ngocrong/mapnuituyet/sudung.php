<?php

define('_IN_JOHNCMS', 1);
$rootpath='../../';

require_once ("../../incfiles/core.php");

$checkin = mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='{$user_id}' AND `id_shop`='$id'"));
$checkin3 = mysql_fetch_array(mysql_query("SELECT * FROM `ngocrong_chucnang` WHERE `user_id`='{$user_id}' AND `loai`='$id'"));
$checkin2 = mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE `id`='$id'"));

$timesd=(time()+15*60);
   if (time()>=$checkin3['timesudung']) {
    mysql_query("UPDATE `ngocrong_chucnang` SET `sudung`='0' WHERE `user_id`='{$user_id}' AND `loai`={$id}");
   }

if ($checkin['soluong'] >=1) {
    
    
    
     mysql_query("UPDATE `vatpham` SET `soluong`=`soluong` -'1' WHERE `user_id`='{$user_id}' AND `id_shop`='$id'");
                      mysql_query("UPDATE `ngocrong_chucnang` SET `sudung`='1',`timesudung`= {$timesd} WHERE `user_id`='{$user_id}' AND `loai`={$id}");

     if ($id ==280){
         $hp = $datauser['hpfull']*2;
                 mysql_query("UPDATE `ngocrong_chucnang` SET `hp`='{$hp}' ,`timesudung`= {$timesd}  WHERE `user_id`='{$user_id}' AND `loai`={$id}");

     }
        if ($id ==282){
         $sm = $datauser['sucmanh']*2;
                 mysql_query("UPDATE `ngocrong_chucnang` SET `sucmanh`='{$sm}' ,`timesudung`= {$timesd}  WHERE `user_id`='{$user_id}' AND `loai`={$id}");

     }
  		    echo'<script>alert("Sử dụng '.$checkin2['tenvatpham'].' thành công");</script>';

 

     }
 else if ($checkin['soluong'] <=0) {
  		    echo'<script>alert("Bạn không có đủ '.$checkin2['tenvatpham'].' để sử dụng!!");</script>';

}



    
  
?>
