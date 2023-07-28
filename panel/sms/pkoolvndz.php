<?php
error_reporting(0);
$db_host = 'localhost';
$db_name = 'zokiml_sql';
$db_username = 'zokiml_sql';
$db_password = 'l@@';
$baotri = '0|Dang bao tri !';
$conn = @mysql_connect("{$db_host}", "{$db_username}", "{$db_password}") or die("$baotri");
@mysql_select_db("{$db_name}") or die("$baotri");
mysql_query("SET character_set_results=utf8", $conn);
mb_internal_encoding('UTF-8');
mysql_query("set names 'utf8'",$conn);

date_default_timezone_set('Asia/Ho_Chi_Minh');
?>