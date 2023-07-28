<?php 

define('_IN_JOHNCMS', 1); 
$textl = 'Test'; 
require_once ("../incfiles/core.php"); 
require_once ("../incfiles/head.php"); 
$time = time() + 30 * 24 * 3600;
$ok = '/users/profile.php?act=ban&mod=delhist&user=4849';
$check = mysql_result(mysql_query("select count(*) from `counter` where `user` = '20184' and "),0);

echo '<div class="phdr">Lịch sử truy cập</div>';

$req=mysql_query("SELECT * FROM `counter` WHERE `user`='20184'");
$i = 1;
while ($res = mysql_fetch_array($req)) {
echo '<div class="menu">User: <br>URL Truy Cập 1: '.$res['ref'].'<br>URL Truy Cập 2: '.$res['pop'].'<br>IP: '.$res['ip'].'<br>Tên trình duyệt:
'.$res['browser'].'<br> Time '.functions::thoigian($res['date']).' <br>Hành động: Set xu</div>';
++$i;
}

$den = $_SERVER['HTTP_REFERER'];
$ht = $_SERVER['REQUEST_URI'];
$trinhduyet = $_SERVER['HTTP_USER_AGENT'];


$infolog = "Đến: ".$den.", Url: ".$ht.", Trình duyệt: ".$trinhduyet.", Thời gian: ".date("H:i d/m/Y");
$file = "20184.txt";
	$fh = fopen($file,'a') or die("cant open file");
	fwrite($fh,"".$user_id.", ".$infolog);
	fwrite($fh,"\r\n");
	fclose($fh);




require_once ("../incfiles/end.php"); 
?>