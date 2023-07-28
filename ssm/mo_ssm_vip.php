<?php

define('_IN_JOHNCMS', 1);

require_once ("../incfiles/core.php");

$p=mysql_fetch_array(mysql_query("SELECT * FROM `ssm_user` WHERE `user_id`='".$user_id."'"));
$idkhung=13;
if ($p['kichhoat']==0){
if ($datauser['luongkhoa']>=4300){
            		    echo'<script>alert("Kích hoạt thành công SSM vượt cấp!!");</script>';
@mysql_query("UPDATE `khokhung` SET
`soluong`='1'
WHERE `id_shop`='{$idkhung}' AND `user_id`='".$user_id."'
");
	 mysql_query("UPDATE `users` SET `luongkhoa`=`luongkhoa`-'4300' WHERE `id`='{$user_id}'");
	 	 mysql_query("UPDATE `ssm_user` SET `kichhoat`='1', `level`=`level`+'5' WHERE `user_id`='{$user_id}'");

}
else {
                		    echo'<script>alert("Kích hoạt thất bại SSM vượt cấp!!");</script>';

}
} else {
                  		    echo'<script>alert("Kích hoạt thất bại SSM vượt cấp!!");</script>';

}

?>