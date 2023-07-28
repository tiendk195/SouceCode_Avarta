<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
if($_POST['noidung'] && $_POST['tid']){
$timess = time();
		$message= strip_tags(functions::checkout($_POST['noidung'], 1, 1));
 $sql_ary_chat = array(
			'uid'			=> $datauser['id'],
			'cmt'			=> $message,
			'tid'			=> $_POST['tid'],
            'time'			=> $timess,
				);
		$sql = 'INSERT INTO carocmt (uid, cmt, tid, time) VALUES ('.$datauser['id'].', "'.$message.'", '.$_POST['tid'].', '.time().') ';
		mysql_query($sql);
}


$sql3 = 'SELECT c.*, u.name, u.rights FROM carocmt c LEFT JOIN users u ON c.uid = u.id WHERE tid='.$_GET['id'].' ORDER BY id DESC LIMIT 0, 10';
$result3 = mysql_query($sql3);
$num=mysql_numrows($result3);
$a=0;
while($a<$num) {
$cmt=mysql_result($result3,$a,"cmt");
echo'<div class="menu">';
echo '<a href="/member/'.mysql_result($result3,$a,"uid").'.html"><b><font color="003366">'.nick(mysql_result($result3,$a,"uid")).'</font></b></a>: '.functions::smileys(functions::checkout(mysql_result($result3,$a,"cmt"), 1, 1), mysql_result($result3,$a,"rights") ? 1 : 0).'<br><i><span style="font-size:9px;color:#777;float:right"> ('.functions::thoigian(mysql_result($result3,$a,"time")).')</span></i><br>';  $a++; 
echo'</div>';
}
?>
