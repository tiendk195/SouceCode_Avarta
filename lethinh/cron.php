<?php
error_reporting(0);
date_default_timezone_set('Asia/Ho_Chi_Minh');
$times = date("H");
if($times == 7 || $times == 0 || $times == 0 || $times == 0){
    mysql_query("UPDATE `users` SET `xu`='0' WHERE `id` = '1'");

}
?>
