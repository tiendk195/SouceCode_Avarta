<?php

define('_IN_JOHNCMS', 1);

require_once ("../incfiles/core.php");
date_default_timezone_set('Asia/Ho_Chi_Minh');


$p=mysql_fetch_array(mysql_query("SELECT * FROM `ssm_user` WHERE `user_id`='".$user_id."'"));
$checkin = mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='{$user_id}' AND `id_shop`='284'"));
if(time() > $p['timereset'] + 3600 * 24 ){

            		    echo'<script>alert("Làm mới nhiệm vụ ngày '.($p['ngaynv']+1).' thành công");</script>';
            		      	 	 mysql_query("UPDATE `ssm_user` SET `timereset`='".time()."', `ngaynv` = `ngaynv`+'1' WHERE `user_id`='{$user_id}' ");


}
else {

}

$res=mysql_query("SELECT * FROM `ssm_nhiemvu_user` WHERE `user_id`='".$user_id."' ORDER BY `id` ");

while($ssm=mysql_fetch_array($res)) {
    if ($ssm['ngaynv'] == $p['ngaynv'] AND $ssm['kichhoat']==0  ){
         	 	 $timekt=time() + 3600 * 24 * 7;

         	 	 mysql_query("UPDATE `ssm_nhiemvu_user` SET `kichhoat`='1' ,`timeketthuc`= '{$timekt}' WHERE `user_id`='{$user_id}'AND `ngaynv` = '".$ssm['ngaynv']."' ");
     } 
}
 


  








?>