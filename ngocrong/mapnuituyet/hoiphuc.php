<?php

define('_IN_JOHNCMS', 1);
$rootpath='../../';

require_once ("../../incfiles/core.php");

$checkin = mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='{$user_id}' AND `id_shop`='276'"));
$bh = mysql_fetch_array(mysql_query("SELECT * FROM `ngocrong_chucnang` WHERE `user_id`='{$user_id}' AND `loai`='280'"));


if ($checkin['soluong'] >=1) {
     mysql_query("UPDATE `vatpham` SET `soluong`=`soluong` -'1' WHERE `user_id`='{$user_id}' AND `id_shop`='276'");
      if ($bh['sudung']==1) {
          $hp=$datauser['hpfull']*2;
mysql_query("UPDATE `ngocrong_chucnang` SET `hp`='$hp' WHERE `user_id`='{$user_id}' AND `loai`='{$bh['loai']}'");
}else {
 mysql_query("UPDATE `users` SET `hp`=`hpfull` WHERE `id`='{$user_id}'");
} 

		    echo'<script>alert("Sử dụng đậu thần thành công!!");</script>';

    
} else if ($checkin['soluong'] <=0) {
		    echo'<script>alert("Bạn không có đủ đậu thần!!");</script>';
}



    
  
?>
