<?php
define('_IN_JOHNCMS',1);
$headmod = 'Khu sinh thái';
$textl = 'Khu sinh thái';
require('../incfiles/core.php');
if (!$user_id) {
header('Location: /login.php');
exit;
}
require('../incfiles/head.php');
echo '<div class="mainblok">';
echo '<div class="phdr"><a href="/cauca">Khu sinh thái</a> &gt; NPC Lái Buôn</div>';

switch($act) {
default:
echo'<table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed;word-wrap: break-word;">
<tbody><tr><td width="50px;" class="blog-avatar"><img src="/nongtrai/icon/laibuon.gif"></td><td style="vertical-align: bottom;"><table cellpadding="0" cellspacing="0"><tbody>
<tr><td class="current-blog" rowspan="2" style=""><div class="blog-bg-left"><img src="/giaodien/images/left-blog.png"></div><img src="/images/on.png" alt="online"><font color="red"> <b> Lái Buôn </b></font><div class="text"><div class="omenu"><a href="laibuon.php?act=khoca"><img src="/images/vao.png"> Kho cá</a></div>
    
    </div></td></tr></tbody></table></td></tr></tbody></table>';
	break;
case 'khoca':
$req=mysql_query("SELECT * FROM `ca_ruong` WHERE `user_id`='".$user_id."' AND `soluong`>'0'");
$dem=mysql_num_rows($req);
if ($dem==0) {
echo '<div class="omenu">Chưa có gì trong kho!</div>';
}
while($res=mysql_fetch_array($req)) {
$info=mysql_fetch_array(mysql_query("SELECT * FROM `ca_r` WHERE `id`='".$res[id_ca]."'"));
echo'<div class="omenu">Tên cá: <b>'.$info[name].'</b> <img src="idca/'.$res[id_ca].'.png"> <font color="blue"></font><br> Số lượng: <b>'.$res[soluong].'</b> <a href="?act=ban&id='.$info[id].'">[ Bán ]</a></div>';

}
break;
case 'ban':
$id=(int)$_GET[id];
$q=mysql_query("SELECT * FROM `ca_ruong` WHERE `user_id`='".$user_id."' AND `id_ca`='".$id."' AND `soluong`>'0'");
$check=mysql_num_rows($q);
if ($check<1) {
echo '<div class="phdr">Lỗi!</div>';
echo '<div class="omenu">Không thể bán</div>';
} else {
$ca=mysql_fetch_array($q);
$pro=mysql_fetch_array(mysql_query("SELECT * FROM `ca_r` WHERE `id`='".$ca[id_ca]."'"));
if (isset($_POST[ban])) {
$sl=(int)$_POST[soluong];
$tien=$sl*$pro[cena];
if ($sl<=0||empty($sl)) {
echo '<div class="omenu">Bạn vui lòng xem lại số lượng!</div>';
} else if($ca[soluong]<$sl) {
echo '<div class="omenu">Bạn không đủ cá để bán!</div>';
} else {
mysql_query("UPDATE `ca_ruong` SET `soluong`=`soluong`-'".$sl."' WHERE `user_id`='".$user_id."' AND `id_ca`='".$pro[id]."'");
mysql_query("UPDATE `users` SET `xu`=`xu`+'".$tien."' WHERE `id`='".$user_id."'");
echo '<div class="omenu">Bán thành công <b>'.$ca[soluong].' '.$pro[name].'</b>, bạn thu về <b>'.$tien.' xu</b></div>';
}
}
echo'<div class="omenu">Số <img src="idca/'.$pro[id].'.png"> trong KHO bạn đang có:  <b>'.$ca[soluong].'</b> - Giá bán: <b>'.$pro[cena].' Xu</b> / 1 con<center>
<form method="post"><input type="number" name="soluong" placeholder="Nhập số lượng cần bán"><br> <input type="submit" name="ban" value="Bán"></form></center></div>';

}
break;
}
echo '</div>';
require('../incfiles/end.php');
?>