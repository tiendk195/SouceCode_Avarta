<?php

define('_IN_JOHNCMS', 1);

require_once ("../incfiles/core.php");

$p=mysql_fetch_array(mysql_query("SELECT * FROM `ssm_nhiemvu_user` WHERE `user_id`='".$user_id."' AND `id`='".$id."' "));
$checkin = mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='{$user_id}' AND `id_shop`='284'"));
$res=mysql_fetch_array(mysql_query("SELECT * FROM `ssm_nhiemvu` WHERE `id`='".$p['id_shop']."'"));

if ($p['tiendo']>=$res['hoanthanh'] and $p['nhanthuong']==0){

	 	 mysql_query("UPDATE `ssm_nhiemvu_user` SET `nhanthuong`='1' WHERE `user_id`='{$user_id}' AND `id`='{$id}' ");
                	 	 mysql_query("UPDATE `ssm_user` SET `exp`= `exp`+ '{$res['exp']}' WHERE `user_id`='{$user_id}'  ");

    Header('location: ?reload');


    


} else {
        		    echo'<script>alert("Bạn đã nhận nhiệm vụ này hoặc chưa đủ điều kiện để nhận!!");</script>';

}

?>