<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');



$hopqua=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='286'"));
$hopqua2=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE   `id`='{$hopqua['id_shop']}'"));




if(isset($_POST['moruong'])) {

    if ($hopqua['soluong']<=0) {
			                  		    echo'<script>alert("Bạn không có đủ '.$hopqua2['tenvatpham'].' ");</script>';
    } else  {
		$rand=rand(1,7);
		$xu = rand (100000,200000);
				$luongkhoa = rand (50,100);
				$exp = rand (10000,50000);
				$dauthan = rand (5,15);
				$davun = rand (5,20);
				$danc = rand (1,10);
				$nr = rand (1,3);

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
		     echo'<script>alert("Bạn nhận được '.$dauthan.' đậu thần  ");</script>';

			  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'{$dauthan}' WHERE `user_id`='".$user_id."' AND `id_shop` = '276'");
   
		}
						if ($rand==5){
		    		     echo'<script>alert("Bạn nhận được '.$davun.' mảnh đá vụn  ");</script>';

			  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'{$davun}' WHERE `user_id`='".$user_id."' AND `id_shop` = '285'");
   
		}
								if ($rand==6){
		    		     echo'<script>alert("Bạn nhận được '.$danc.' đá nâng cấp  ");</script>';

			  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'{$danc}' WHERE `user_id`='".$user_id."' AND `id_shop` = '60'");
   
		}
									if ($rand==7){
		    		     echo'<script>alert("Bạn nhận được '.$nr.' viên 7 sao  ");</script>';

			  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'{$nr}' WHERE `user_id`='".$user_id."' AND `id_shop` = '275'");
   
		}
		

			  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '{$hopqua2['id']}'");



    }
}
	 


?>