<?php
/**
CARO ONLINE BY HOI8.MOBI
 */

define('_IN_JOHNCMS', 1);

require('../incfiles/core.php');
if($_GET['id']){
	$sql='SELECT c.*, x.name AS xname, x.rights AS xrights, o.name AS oname, o.rights AS orights FROM carodata c
		LEFT JOIN users x ON c.px = x.id
		LEFT JOIN users o ON c.po = o.id
		WHERE c.id='.$_GET['id'];
	$result=mysql_query($sql);
	if(mysql_numrows($result)>0) {
		if($_POST['cn'] && mysql_result($result,0,'turn')==0 && mysql_result($result,0,'tinhtrang')==0 && mysql_result($result,0,'px')==$datauser['id'] && $datauser['id'] != ANONYMOUS){
			$sql='DELETE FROM carodata WHERE `id`='.$_GET['id'];
			mysql_query($sql);
                        header('Location: '.$home.'/caro/');
		}
	elseif(mysql_result($result,0,'turn')==0 && mysql_result($result,0,'tinhtrang')==0 && mysql_result($result,0,'po')==$datauser['id']) {
		if($_POST['dn']){
			$sql='DELETE FROM carodata WHERE `id`='.$_GET['id'];
			mysql_query($sql);
			header('Location: '.$home.'/caro/');
		}}
}
header('Location: '.$home.'/caro/?id='.$_GET['id'].'');
}
header('Location: '.$home.'/caro/');

?>
