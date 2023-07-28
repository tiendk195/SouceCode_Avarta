<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');



$hopqua=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='66'"));
$hopqua2=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE   `id`='{$hopqua['id_shop']}'"));




if(isset($_POST['moruong'])) {

    if ($hopqua['soluong']<=0) {
			                  		    echo'<script>alert("Bạn không có đủ '.$hopqua2['tenvatpham'].' ");</script>';
    } else  {
        
        //Nhiệm vụ SSM
    $res2=mysql_query("SELECT * FROM `ssm_nhiemvu_user` WHERE `user_id`='".$user_id."' AND `kichhoat`='1' ORDER BY `id` ");

while($ssm=mysql_fetch_array($res2)) {
    $ssm2 = mysql_fetch_array(mysql_query("SELECT * FROM `ssm_nhiemvu` WHERE `id`='{$ssm['id_shop']}'"));
    if ($ssm2['loai']=='capsule'){
            mysql_query("UPDATE `ssm_nhiemvu_user` SET `tiendo`= `tiendo` + '1' WHERE `user_id`='{$user_id}' AND `id` = '{$ssm['id']}' ");
    }
}
//Nhiệm vụ SSM
        
		$rand=rand(1,4);
		if ($rand==1){
         $ngoc=280;
		}
	if ($rand==2){
         $ngoc=281;
		}
			if ($rand==3){
		    $ngoc=282;
		}
				if ($rand==4){
		    $ngoc=283;
		}
		$qua=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE   `id`='{$ngoc}'"));


			  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '{$ngoc}'");
			                  		    echo'<script>alert("Bạn nhận được 1 '.$qua['tenvatpham'].'  ");</script>';
			  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '{$hopqua2['id']}'");



    }
}
	 


?>