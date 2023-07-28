<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
$msg=functions::checkout($_POST['msg']);
if(empty($msg)){
echo 1;
exit;
}elseif(strlen($msg) > 100 || strlen($msg) < 1){
echo 2; exit;
}else
{
if ($datauser['luong'] >= 50 and $datauser['xu'] >=500000)
{
mysql_query("UPDATE `users` SET `status`='".$msg."',
`luong`=`luong`-50,`xu`=`xu`-50000 WHERE `id`='".$user_id."'");
echo 3; exit;
} else {
echo 4;
}
}