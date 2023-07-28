<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');



$hopqua=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='262'"));




if(isset($_POST['moruong'])) {

    if ($hopqua['soluong']<=0) {
			                  		    echo'<script>alert("Bạn không có đủ Rương lượng ");</script>';
    } else  {
		$rand=rand(300,500);

			  mysql_query("UPDATE `users` SET `luong`=`luong`+'{$rand}' WHERE `id`='".$user_id."'");
			                  		    echo'<script>alert("Bạn nhận được '.number_format($rand).' lượng ");</script>';
			  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '262'");



    }
}
	 


?>