<?php

define('_IN_JOHNCMS', 1);
$rootpath='../../';

require_once ("../../incfiles/core.php");
$wboss = mysql_fetch_array(mysql_query("SELECT * FROM `wboss` WHERE `id` = '2019'"));

if(isset($_POST['hoiphuc'])) {
    if ($datauser['suckhoe'] >0) {
echo'<center></center></<br> <font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><b><img src="/icon/hp.png"> '.$datauser['suckhoe'].' </br>Bạn không cần hồi phục</font></b></center>';
} else 
if ($datauser['xu'] >=50000) {
    
 mysql_query("UPDATE `users` SET `suckhoe`='100',`xu`=`xu` -'50000' WHERE `id`='{$user_id}'");

echo'<center></center></<br> <font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><b><img src="/icon/hp.png"> '.$datauser['suckhoe'].' </br>Hồi phuc thành công</font></b></center>';
} else {
echo'<center></center></<br> <font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><b><img src="/icon/hp.png"> '.$datauser['suckhoe'].' </br>Bạn cần 50.000 xu để hồi phục</font></b></center>';
}
}
?>