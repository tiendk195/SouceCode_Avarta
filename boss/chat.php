<?php
define('_IN_JOHNCMS', 1);
require_once('../incfiles/core.php');
$rootpath = '';
if($_POST['noidung'] && $_POST['tid'] && empty($ban)){
	$tinnhan = isset($_POST['noidung']) ? mb_substr(trim($_POST['noidung']), 0, 40) : '';
	$chars=str_split($tinnhan);
	$count=0;
	foreach($chars as &$chars)
	{
		if($chars==':' || $chars=='/' || $chars==';' || $chars == '-' || $chars == '*'  || $chars == '^')
		{
			$count++;
		}
	}
	if($count >= 4){
		$tinnhan = str_replace(array_keys($timkiem2), $timkiem2,$tinnhan);
	}
	mysql_query("INSERT INTO `gamemini_boss_chat` SET
	 `sophong` = '$_POST[tid]',
	 `text` = '$tinnhan',
	 `user_id` = '$datauser[id]'
	");
}
header('Location: phong.php?id='.$_POST['tid'].'');
?>