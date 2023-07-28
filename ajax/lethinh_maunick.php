<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
$msg=functions::checkout($_POST['msg']);
if(empty($msg)){
echo 1;
exit;
}elseif(strlen($msg) > 7 || strlen($msg) < 1){
echo 2; exit;
}else
{
if ($datauser['luong'] > 500)
{
mysql_query("UPDATE `users` SET `color`='".$msg."',
`luong`=`luong`-500 WHERE `id`='".$user_id."'");
echo 3; exit;
} else {
echo 4;
}
}