<?php
define('_IN_JOHNCMS',1);
include('../incfiles/core.php');
$check=mysql_query("select `id` from `nhom_user` where `user_id`='$user_id' and `duyet`='1' limit 1");
if(!mysql_num_rows($check)){
	mysql_query("update `users` set `check`=1 where `id`='$user_id' limit 1");
	header('location: '.$home);
	exit;
}
$c=mysql_fetch_array($check);
$f=fopen('log.txt',a);
$clan=mysql_fetch_array(mysql_query("select * from `nhom` where `id`='".$c['id']."' limit 1"));
if($datauser['check']==0)
	fwrite($f,'
'.$user_id.'-'.$c['id'].'-'.$clan['id']);
mysql_query("update `users` set `check`=1 where `id`='$user_id' limit 1");
	header('location: '.$home);
?>