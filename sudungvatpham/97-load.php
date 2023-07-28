<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');



$hopqua=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='97'"));




if(isset($_POST['moruong'])) {

    if ($hopqua['soluong']<=0) {
			                  		    echo'<script>alert("Bạn không có đủ hộp quà mảnh ghép ");</script>';
    } else  {
		$randm=rand(1,2);
		
		$all=mysql_fetch_array(mysql_query("SELECT max(id) FROM `shopvatpham`"));  
$rando=rand(1,$all['max(id)']);
$checkrand=mysql_num_rows(mysql_query("SELECT * FROM `shopvatpham` WHERE `id`='".$rando."' AND `loai`='ghepmanh'"));

$cross=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE `id`='".$rando."' AND `loai`='ghepmanh'"));
if ($checkrand>=1){
    			                  		    echo'<script>alert("Bạn nhận được '.$randm.' '.$cross['tenvatpham'].'  ");</script>';

			  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$randm."' WHERE `user_id`='".$user_id."' AND `id_shop` = '".$cross['id']."'");
} else {
	

			                  		    echo'<script>alert("Chúc bạn may mắn lần sau!! ");</script>';
}
			  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '97'");


    }
}
	 


?>