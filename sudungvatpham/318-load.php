<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');



$hopqua=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='318'"));
$hopqua2=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE   `id`='{$hopqua['id_shop']}'"));




if(isset($_POST['moruong'])) {
     

    if ($hopqua['soluong']<=0) {
			                  		    echo'<script>alert("Bạn không có đủ '.$hopqua2['tenvatpham'].' ");</script>';
    } else  {
        			  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '318'");

		$rand=rand(1,5);
		if ($rand==1){
		   echo'<script>alert("Bạn nhận được 1 Hồng ngọc I  ");</script>';

			  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '288'");
   
		  
		}
			if ($rand==2){
		   echo'<script>alert("Bạn nhận được 1 Lam ngọc I  ");</script>';

			  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '289'");
   
		  
		}
				if ($rand==3){
		   echo'<script>alert("Bạn nhận được 1 Hoàng ngọc I  ");</script>';

			  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '290'");
   
		  
		}
				if ($rand==4){
		   echo'<script>alert("Bạn nhận được 1 Lục bảo ngọc I  ");</script>';

			  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '291'");
   
		  
		}
				if ($rand==5){
		   echo'<script>alert("Bạn nhận được 1  Thạch anh tím I  ");</script>';

			  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '292'");
   
		  
		}
	
	
		    			                  		   
		
}
}
	 


?>