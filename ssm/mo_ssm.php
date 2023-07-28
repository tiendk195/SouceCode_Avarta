<?php

define('_IN_JOHNCMS', 1);

require_once ("../incfiles/core.php");
$p=mysql_fetch_array(mysql_query("SELECT * FROM `ssm_user` WHERE `user_id`='".$user_id."'"));
if ($p['kichhoat']==0){

if ($datauser['luongkhoa']>=3500){
                		    echo'<script>alert("Kích hoạt thành công SSM !!");</script>';

	 mysql_query("UPDATE `users` SET `luongkhoa`=`luongkhoa`-'3500' WHERE `id`='{$user_id}'");
	 	 mysql_query("UPDATE `ssm_user` SET `kichhoat`='1' WHERE `user_id`='{$user_id}'");

}
else {
                    		    echo'<script>alert("Kích hoạt thất bại SSM !!");</script>';

}
} else {
                    		    echo'<script>alert("Kích hoạt thất bại SSM !!");</script>';

}


?>