<?php


define('_IN_JOHNCMS', 1);
$rootpath = '';

require('incfiles/core.php');
switch($act){
case'ghim':
    $vatpham = $id;
if(empty($vatpham)){
header('location: /');
}
if($datauser['rights']<9){
header('location: /');
}
$check=mysql_num_rows(mysql_query("SELECT * FROM `guest` WHERE `time`='".$vatpham."' "));

if($check < 1){
                		    echo'<script>alert("Lỗi không có đoạn chat này!!");</script>';
                		    header('location: /');

} else {
        $info = mysql_fetch_array(mysql_query("SELECT * FROM `guest` WHERE `time`='".$vatpham."'"));
            mysql_query("UPDATE `ghim_chatbox` SET `time`='".$info['time']."', `text`='".$info['text']."',`user_id`='".$info['user_id']."' WHERE `id`='1'");
                		    echo'<script>alert("Ghim thành công!!");</script>';
                		    header('location: /');


}
break;
case'huyghim':
if($datauser['rights']<9){
header('location: /');
}
 
            mysql_query("UPDATE `ghim_chatbox` SET `time`='0', `text`='0',`user_id`='0' WHERE `id`='1'");
                		    echo'<script>alert("Hủy Ghim thành công!!");</script>';
                		    header('location: /');



}

?>