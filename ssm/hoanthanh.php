<?php

define('_IN_JOHNCMS', 1);

require_once ("../incfiles/core.php");

$p=mysql_fetch_array(mysql_query("SELECT * FROM `ssm_nhiemvu_user` WHERE `user_id`='".$user_id."' AND `id`='".$id."' "));
$checkin = mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='{$user_id}' AND `id_shop`='284'"));
$res=mysql_fetch_array(mysql_query("SELECT * FROM `ssm_nhiemvu` WHERE `id`='".$p['id_shop']."' "));

if ($p['tiendo']<$res['hoanthanh']){
if ($checkin['soluong']>=$res['vemayman']){
    
     mysql_query("UPDATE `vatpham` SET `soluong`=`soluong` -'".$res['vemayman']."' WHERE `user_id`='{$user_id}' AND `id_shop`='284'");
	 	 mysql_query("UPDATE `ssm_nhiemvu_user` SET `tiendo`='".$res['hoanthanh']."' WHERE `user_id`='{$user_id}' AND `id`='{$id}'");
        
    Header('location: ?reload');


    
}
else {
   		    echo'<script>alert("Bạn cần '.$res['vemayman'].' Phiếu may mắn mới có thể hoàn thành nhanh nhiệm vụ này!");</script>';

}
} else {
        		    echo'<script>alert("Nhiệm vụ này không cần dùng Phiếu may mắn!");</script>';

}

?>