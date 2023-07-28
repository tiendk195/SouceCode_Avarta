<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');



$hopqua=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='331'"));
$hopqua2=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE   `id`='{$hopqua['id_shop']}'"));




if(isset($_POST['moruong'])) {

    if ($hopqua['soluong']<=0) {
			                  		    echo'<script>alert("Bạn không có đủ '.$hopqua2['tenvatpham'].' ");</script>';
    } else  {
        $rand=rand(1,5);
        $pin = rand(100000000,999999999);


										if ($rand==1){
		    		     echo'<script>alert("Bạn nhận được Viền Tình Nhân Hayate   ");</script>';

			  mysql_query("UPDATE `khokhung` SET `soluong`='1' WHERE `user_id`='".$user_id."' AND `id_shop` = '18'");
   
		}
												if ($rand==2){
		    		     echo'<script>alert("Bạn nhận được Viền Tình Nhân Airi   ");</script>';

			  mysql_query("UPDATE `khokhung` SET `soluong`='1' WHERE `user_id`='".$user_id."' AND `id_shop` = '19'");
   
		}
														if ($rand==3){
		    		     echo'<script>alert("Bạn nhận được Khung hắc ám   ");</script>';

			  mysql_query("UPDATE `khokhung` SET `soluong`='1' WHERE `user_id`='".$user_id."' AND `id_shop` = '16'");
   
		}						
														if ($rand==4){
		    		     echo'<script>alert("Bạn nhận được Khung phượng hoàng  ");</script>';

			  mysql_query("UPDATE `khokhung` SET `soluong`='1' WHERE `user_id`='".$user_id."' AND `id_shop` = '9'");
   
		}	
																if ($rand==5){
									echo'<script>alert("Bạn nhận được Thẻ 1STPay Mệnh Giá 20.000 VND  ");</script>';


		$text2 = '<div class="pmenu"><center><font size="1"> Thẻ 1STPay mệnh giá 20,000 VNĐ</br>
	Mã Pin: '.$pin.' </br>
	</font></center></div>';
$time = time()+10;


mysql_query("INSERT INTO `1STPay` SET
`pin`='".$pin."',
`user_tao`= '".$user_id."',
`timetao` = '".time()."',
`menhgia`='20000'");
mysql_query("INSERT INTO `thongbao` SET
                `id` = '".$user_id."',
                `user` = '".$user_id."',
                `text` = '$text2',
                `ok` = '1',
                `time` = '" . time() . "'
            ");
																}
			  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '{$hopqua2['id']}'");



    }
}
	 


?>