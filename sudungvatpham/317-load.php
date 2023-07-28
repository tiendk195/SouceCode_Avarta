<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');



$hopqua=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='317'"));
$hopqua2=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE   `id`='{$hopqua['id_shop']}'"));




if(isset($_POST['moruong'])) {
     

    if ($hopqua['soluong']<=0) {
			                  		    echo'<script>alert("Bạn không có đủ '.$hopqua2['tenvatpham'].' ");</script>';
    } else  {
                			  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '317'");

		$rand=rand(1,3);
	
	
	
		    			                  		    echo'<script>alert("Bạn nhận được '.number_format($rand).' mảnh trang phục  ");</script>';

			  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'{$rand}' WHERE `user_id`='".$user_id."' AND `id_shop` = '313'");
   
		
		
}
}
	 


?>