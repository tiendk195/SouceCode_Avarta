<?php

define('_IN_JOHNCMS', 1);
$headmod = 'id_user';
$rootpath='../../';

require_once ("../../incfiles/core.php");
require_once ("../../incfiles/head.php");
echo'<div class="phdr">Phục hồi</div>';
echo'<center>';
if (isset($_POST['hoiphuc'])) {

if ($datauser['suckhoe'] >0) {
echo'<div class="omenu"><font color="red">Lỗi!</font>Bạn không cần phải hồi phục</div>';
} else 
if ($datauser['xu'] >=50000) {
    
mysql_query("UPDATE `users` SET `suckhoe`='100',`xu`=`xu`-'50000'  WHERE `id`='{$user_id}'");
header('Location: map.php');
} else{
  echo'<div class="omenu"><font color="red">Lỗi!</font>Bạn không đủ 50.000 xu để hồi phục</div>';  
}
}
echo'<div class="omenu"><font color="red">Phục hồi máu! 50.000 xu/lần!</font><br><form  method="post"><input type="submit" name="hoiphuc" value="Hồi phục"></form></div>';
echo'</center>';
require_once ("../../incfiles/end.php");
?>