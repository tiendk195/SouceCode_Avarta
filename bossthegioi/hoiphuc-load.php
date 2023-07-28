<?php

define('_IN_JOHNCMS', 1);

require_once ("../incfiles/core.php");
echo'<div class="omenu">';
if(isset($_POST['hoiphuc'])) {
    if ($datauser['suckhoe'] >0) {
echo'<center></center></<br> <font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><b>Bạn không cần hồi phục</font></b></center>';
} else 
if ($datauser['xu'] >=50000) {
    
 mysql_query("UPDATE `users` SET `suckhoe`='100',`xu`=`xu` -'50000' WHERE `id`='{$user_id}'");

echo'<center></center></<br> <font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><b>Hồi phục thành công</font></b></center>';
} else {
echo'<center></center></<br> <font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><b>Bạn cần 50.000 xu để hồi phục</font></b></center>';
}
}
echo'</div>';
?>