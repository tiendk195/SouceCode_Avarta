<?php
define('_IN_JOHNCMS', 1);
require('.././incfiles/core.php');
if($_GET['id']){
$getturn=mysql_query('select turn from carodata where id='.$_GET[id]);
if(mysql_numrows($getturn)>0) echo mysql_result($getturn,0,"turn");
}
?>