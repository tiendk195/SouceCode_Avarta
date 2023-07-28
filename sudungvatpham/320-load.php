<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');



$hopqua=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='320'"));
$hopqua2=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE   `id`='{$hopqua['id_shop']}'"));




if(isset($_POST['moruong'])) {
     

    if ($hopqua['soluong']<=0) {
			                  		    echo'<script>alert("Bạn không có đủ '.$hopqua2['tenvatpham'].' ");</script>';
    } else  {
        			  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '320'");

		$time=time()+30*60;
		$randboss=rand(1,3);
	        			  mysql_query("UPDATE `giakimthuat_user` SET `time`= '{$time}', `boss`='{$randboss}'  WHERE `user_id`='".$user_id."'");
			                  		    echo'<script>alert("Sử dụng thành công '.$hopqua2['tenvatpham'].', bạn có 30 phút để khám phá hang động ");</script>';

		    			                  		   
		
}
}
	 


?>