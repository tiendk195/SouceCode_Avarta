<?php
define('_IN_JOHNCMS', 1);
$textl = 'Nông trại/Trang trại';
require_once('../incfiles/core.php');
require('../incfiles/head.php');


if (!$user_id){
echo'<div class="menu">Chỉ dành cho thành viên diễn đàn! Hãy đăng ký để tham gia nhé</div>';
require('../incfiles/end.php');
exit;
}
echo'<div class="phdr">Thu hoạch khế</div>';
switch ($act) {
default:
echo'<div class="omenu">';
echo"<center>";
if ($datauser['lvkhe'] >=20) {
  $randkhe=$datauser['lvkhe']*30;
}
if ($datauser['lvkhe'] <20) {

  $randkhe=$datauser['lvkhe']*15;
}
    
$remils = mysql_result(mysql_query("SELECT COUNT(*) FROM `fermer_sclad` WHERE `semen` = '18' AND `id_user` = '".$user_id."' "),0);
$hoiphuc = $datauser['timethuhoachkhe'] + 3600 - time();
$timehoiphuc1 = date('H', $hoiphuc);
$timehoiphuc2 = date('i', $hoiphuc);
$timehoiphuc3 = date('s', $hoiphuc);

if (($datauser[timethuhoachkhe] + 3600 ) > time()) {

echo '<b><font color="red"> LV: '.$datauser['lvkhe'].' (sản lượng: '.$randkhe.') </b><br></font><img src="/icon/caykhe.png" alt="icon"/><br/>Bạn còn '.(($hoiphuc>0) < time() ? '':''.($timehoiphuc2 == 0 ? '' : ''.$timehoiphuc2.' phút ').''.$timehoiphuc3.' giây').' nữa để thu hoạch khế !';
} else {

echo '<b><font color="red"> LV: '.$datauser['lvkhe'].' (Sản lượng: '.$randkhe.') </b></font></br><img src="/icon/caykhechin.png" alt="icon"><br/>Bạn vừa hái được '.$randkhe.' trái khế xin chúc mừng !';
	$checknv=mysql_num_rows(mysql_query("SELECT * FROM `nhiemvu_user` WHERE `user_id`='".$user_id."' AND `id_nv`='2'"));
if ($checknv>0) {
mysql_query("UPDATE `nhiemvu_user` SET `tiendo`=`tiendo`+'1' WHERE `user_id`='".$user_id."' AND `id_nv`='2'");
}
$checknv2=mysql_num_rows(mysql_query("SELECT * FROM `nhiemvu_user` WHERE `user_id`='".$user_id."' AND `id_nv`='4'"));
if ($checknv2>0) {
mysql_query("UPDATE `nhiemvu_user` SET `tiendo`=`tiendo`+'1' WHERE `user_id`='".$user_id."' AND `id_nv`='4'");
}
if($remils > 0) {
mysql_query("UPDATE `fermer_sclad` SET `kol` = `kol`+'".$randkhe."' WHERE `semen` = '18' AND `id_user` = '".$user_id."'");
} else {
mysql_query("INSERT INTO `fermer_sclad` (`kol`,`semen`, `id_user`) VALUES  ( '".$randkhe."', '18', '".$user_id."') ");
}
mysql_query("UPDATE `users` SET `timethuhoachkhe` = '".time()."' WHERE `id` = $user_id");
} 
echo'</center>';
echo'</div>';

echo'<div class="phdr">Chức năng</div>';
echo'<div class="menu"><a href="?act=nangcap"><b> Nâng cấp khế</b></a> | <a href="/nongtrai"><b>Về Nông trại</b></a> | <a href="/"><b>Thoát</b></a></div>';
break;

case 'nangcap';
echo'<center>';
echo'<form method="post" ';

$nanglv= $datauser['lvkhe']+'1';
if ($datauser['lvkhe'] >=20) {
	    $gialv= ($datauser['lvkhe']+'1')*220000;
}
if ($datauser['lvkhe'] <20) {

    $gialv= ($datauser['lvkhe']+'1')*120000;
}


echo '<b><font color="red"> LV: '.$datauser['lvkhe'].' </font></b></br><img src="/icon/caykhe.png"><br/>';
if ($datauser['lvkhe']<50) {
echo'Bạn có muốn nâng cấp khế lên lever '.$nanglv.' với giá là '.number_format($gialv).' xu Không ? </br>';
echo'<input type="submit" name="nc" value="Nâng">';
} else {
    echo'Bạn đã đạt cấp tối đa';
}
echo'</form>';
if (isset($_POST['nc'])) {
    if ($datauser['xu']<$gialv) {
        echo'<div class="omenu"><b><font color="red">Bạn không đủ xu!!</b></font></div>';
    } else 
    if ($datauser['lvkhe']>=50) {
          echo'<div class="omenu"><b><font color="red">Bạn đã đạt cấp tối đa!!</b></font></div>'; 
    } else {
            echo'<div class="omenu"><b><font color="red">Bạn đã nâng cấp thành công!!
</b></font></div>';
mysql_query("UPDATE `users` SET `lvkhe` = `lvkhe`+'1',`xu`=`xu`-'$gialv' WHERE `id` = $user_id");

    }
}
echo'</center>';
break;


}
require('../incfiles/end.php');

?>