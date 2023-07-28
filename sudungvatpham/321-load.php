<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');



$hopqua=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='321'"));
$hopqua2=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE   `id`='{$hopqua['id_shop']}'"));




if(isset($_POST['moruong'])) {

    if ($hopqua['soluong']<=0) {
			                  		    echo'<script>alert("Bạn không có đủ '.$hopqua2['tenvatpham'].' ");</script>';
    } else  {
		$rand=rand(1,4);
		$xu = rand (100000,200000);
				$luongkhoa = rand (50,100);
				$exp = rand (10000,20000);
				$danc = rand (10,50);

		if ($rand==1){
		    			                  		    echo'<script>alert("Bạn nhận được '.number_format($xu).' xu  ");</script>';

		 			  mysql_query("UPDATE `users` SET `xu`=`xu`+'{$xu}' WHERE `id`='".$user_id."'");
   
		}
			if ($rand==2){
 echo'<script>alert("Bạn nhận được '.number_format($luongkhoa).' lượng khóa  ");</script>';

		 			  mysql_query("UPDATE `users` SET `luongkhoa`=`luongkhoa`+'{$luongkhoa}' WHERE `id`='".$user_id."'");
   
		}
				if ($rand==3){
		     echo'<script>alert("Bạn nhận được '.number_format($exp).' kinh nghiệm  ");</script>';

		 			  mysql_query("UPDATE `users` SET `exp`=`exp`+'{$exp}' WHERE `id`='".$user_id."'");
   
		}

						
								if ($rand==4){
		    		     echo'<script>alert("Bạn nhận được '.$danc.' đá nâng cấp  ");</script>';

			  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'{$danc}' WHERE `user_id`='".$user_id."' AND `id_shop` = '60'");
   
		}
								

			  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '{$hopqua2['id']}'");



    }
}
	 


?>