<?php

define('_IN_JOHNCMS', 1);
$headmod = 'id_user';
$rootpath='../';
require_once ("../incfiles/core.php");
require_once ("../incfiles/head.php");
if ($datauser['suckhoe'] >0) {
echo'<div class="omenu"><font color="red">Lỗi!</font>Bạn không cần phải hồi phục</div>';
} else 
if ($datauser['xu'] >=50000) {
    
mysql_query("UPDATE `users` SET `suckhoe`='100',`xu`=`xu`-'50000'  WHERE `id`='{$user_id}'");
header('Location: index.php');
} else{
  echo'<div class="omenu"><font color="red">Lỗi!</font>Bạn không đủ 50.000 xu để hồi phục</div>';  
}
require_once ("../incfiles/end.php");
?>