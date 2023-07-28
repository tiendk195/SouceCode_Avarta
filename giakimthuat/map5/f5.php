<?php

define('_IN_JOHNCMS', 1);
$rootpath='../../';

require_once ("../../incfiles/core.php");
    $gkt=mysql_fetch_array(mysql_query("SELECT * FROM `giakimthuat_user` WHERE  `user_id`='".$user_id."' "));
    if ($gkt['time']<time()){
            mysql_query("UPDATE `giakimthuat_user` SET `boss`='0' WHERE `user_id`='".$user_id."' ");

        header('location: index.php');

}
echo''.thoigiantinh(floor($gkt['time'])).'';
    if ($gkt['thuoc_time']>=time()){
        echo'</br>Thời gian sử dụng dược thạch: '.thoigiantinh(floor($gkt['thuoc_time'])).'';
    } 
?>