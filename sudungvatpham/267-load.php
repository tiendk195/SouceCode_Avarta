<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');



$hopqua=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='267'"));
$hopqua2=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE   `id`='{$hopqua['id_shop']}'"));




if(isset($_POST['moruong'])) {

    if ($hopqua['soluong']<=0) {
			                  		    echo'<script>alert("Bạn không có đủ '.$hopqua2['tenvatpham'].' ");</script>';
    } else  {
		$rand=rand(1,7);
			if ($rand==1){
		    $ngoc=269;
		}
		if ($rand==2){
		    $ngoc=270;
		}
			if ($rand==3){
		    $ngoc=271;
		}
				if ($rand==4){
		    $ngoc=272;
		}
				if ($rand==5){
		    $ngoc=273;
		}
				if ($rand==6){
		    $ngoc=274;
		}
				if ($rand==7){
		    $ngoc=275;
		}
		
		

			  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '{$ngoc}'");
			                  		    echo'<script>alert("Bạn nhận được ngọc '.$rand.' sao ");</script>';
			  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '{$hopqua2['id']}'");



    }
}
	 


?>