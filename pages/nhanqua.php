<?php
error_reporting(0);
date_default_timezone_set('Asia/Ho_Chi_Minh');
$times = date("H");
if($times != 21){
@mysql_query("UPDATE users SET `qua` = '0' WHERE `rights` != '0'");
}
?>