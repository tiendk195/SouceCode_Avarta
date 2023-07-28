<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
$textl = 'Chặn chat';
if (!$user_id )
{
	header('Location: /');
	exit;
}


require('../incfiles/head.php');
$id = (int)$_GET['id'];

$check  = mysql_num_rows(mysql_query("SELECT * FROM users WHERE id = '$id'"));
$row = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id = '$id'"));
if ($datauser['id']==$row['id']) {
        	header('Location: /');
	exit;


} 

if ($datauser['rights']>=$row['rights']) {



if ($check < 1)
{
	echo '<div class="rmenu">Lỗi...</div>';
}
else
{
    
	if ($row['chanchat'] == 0)
	{
		mysql_query("UPDATE users SET chanchat = '1' WHERE id = '$id'");
		 mysql_query("INSERT INTO `ls_chanchat` SET
                        `user_id` = '" . $row['id']. "',
    
                        `ban_who` = '$login'
                    ");
		header('Location: /member/'.$id.'.html');
	}
	else
	{
		mysql_query("UPDATE users SET chanchat = '0' WHERE id = '$id'");
		       mysql_query("DELETE FROM `ls_chanchat` WHERE `user_id` = '" . $row['id'] . "'");
		header('Location: /member/'.$id.'.html');
	}
}
}
require('../incfiles/end.php');
?>