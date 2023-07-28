<?php

define('_IN_JOHNCMS', 1);
require_once('../incfiles/core.php');
include_once('func.php');
$textl = 'NPC Lái Buôn';
require('../incfiles/head.php');
echo'<div class="phdr">Lái buôn</div>';
echo'<table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed;word-wrap: break-word;">
<tr><td width="50px;" class="blog-avatar">';
echo '<img src="icon/laibuon.gif"/>';
echo'</td><td style="vertical-align: bottom;"><table cellpadding="0" cellspacing="0"><tbody>
<tr><td class="current-blog" rowspan="2" style=""><div class="blog-bg-left">';
echo'<img src="/giaodien/images/left-blog.png"></div>';
echo '<img src="/images/on.png" alt="online"/>';
echo '<font color="red"> <b> Lái Buôn</b></font>';
echo'<div class="text">';
switch($act) {
    case 'vett':
        $timesd=time()+24*60*60;
        if(isset($_POST['vett'])) {
            if ($datauser['luongkhoa']<20){
                echo'<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn không đủ tiền</div>';
                
            } else {
                echo'<div class="omenu">Mua thành công</div>';
                mysql_query("UPDATE `users` SET `luongkhoa`=`luongkhoa`-'20' WHERE `id`='{$user_id}'");
                mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1',`timesudung`='".$timesd."' WHERE `user_id`='".$user_id."' AND `id_shop`='257'");

            }
        }

        echo '<div class="omenu"><font color="red">Mua vé truyền tống <img src="/images/vatpham/257.png"> (1 ngày) bằng 20 lượng khóa!</font></div>';
        echo '<form method="post"><input type="submit" name="vett" value="Mua" /></form>';
break;


case 'bd':
if(time() > $datauser['tgiannhanqua'] + 3600 * 24 ){

echo '<div class="omenu"><font color="red">Báo danh hằng ngày. Cách 24h bạn sẽ báo danh được 1 lần, mỗi lần báo danh bạn sẽ nhận được 30 điểm chuyên cần và 5 lượng khóa. </font></div>';
echo '<div class="omenu">';
if(isset($_POST['submit'])) {
    ///ngoc rong
       echo'<script>alert("Bạn nhận được ngọc rồng 7 sao");</script>';
     mysql_query("UPDATE `vatpham` SET `soluong`=`soluong` +'1' WHERE `user_id`='{$user_id}' AND `id_shop`='269'");
//ngoc rong
	echo '<font color="green">Bạn nhận được 30 điểm chuyên cần, 10 <img src="https://i.imgur.com/62jIi4t.png"> nhánh đào, 5 lượng khóa, 1 thẻ bán hàng và 1 thẻ quay số free! </font><br>';
$checknv2=mysql_num_rows(mysql_query("SELECT * FROM `nhiemvu_user` WHERE `user_id`='".$user_id."' AND `id_nv`='12'"));
if ($checknv2>0) {
mysql_query("UPDATE `nhiemvu_user` SET `tiendo`=`tiendo`+'1' WHERE `user_id`='".$user_id."' AND `id_nv`='12'");
}
mysql_query("UPDATE `users` SET `chuyencan`=`chuyencan`+'30',`canhdaohong`=`canhdaohong`+'10', `luongkhoa`=`luongkhoa`+'5',`tgiannhanqua` = '".time()."' WHERE `id`='{$user_id}'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop`='12'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop`='31'");

}
echo '<form method="post"><input type="submit" name="submit" value="Báo danh" /></form>';
} else {
echo '<div class="omenu"><b><font color="red"> Lỗi </font></b>Bạn đã báo danh rồi nhé xin quay lại vào ngày hôm sau!</div>';
}
echo '</div>';
/*
break;
case 'lamkem':
$v1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `fermer_sclad` WHERE `semen`='1' AND `id_user`='".$user_id."'"));
$kem=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='104'"));
if (isset($_POST[doi])) {
$mg=(int)$_POST[mg];
$mg2=$mg*20;

if (empty($mg)) {
	echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn chưa nhập số kem muốn làm!</div>';
} else 
	if ($mg<0) {
	echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn chưa nhập số kem muốn làm!</div>';
} else 

if ($v1['kol']< $mg2) {
echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn không đủ nguyên liệu để làm!</div>';

} else {
	echo '<div class="omenu">Làm thành công '.number_format($mg).'<img src="/images/vatpham/104.png"> kem giải nhiệt - bạn bị - '.number_format($mg2).' <img src="img/product/1.png"> Đào</div>';
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$mg."' WHERE `user_id`='".$user_id."' AND `id_shop`='104'");
mysql_query("UPDATE `fermer_sclad` SET `kol`=`kol`-'".$mg2."' WHERE `id_user`='".$user_id."' AND `semen`='1'");
}
}
echo'<center><div class="omenu">Đổi 20 <img src="img/product/1.png"> Đào lấy 1 kem giải nhiệt</div>';

		echo '<form method="post">';

echo'<div class="omenu">Nhập số kem muốn đổi</br>';
echo'<input type="number" name="mg"><br/>
<input type="submit" name="doi" value="Đổi" class="nut"></form></div></center>';
*/
break;
case 'ttcc':
echo '<div class="menu"><b>Hiện tại bạn có '.$datauser['chuyencan'].' điểm chuyên cần!!</b></div>';
break;
case 'doiqua':
echo '<a href="/quatang/doiquachuyencan.php">+ Đổi quà chuyên cần</a><br/>';
echo '<div style="text-align:center"><a href="/nongtrai/laibuon.php"><input type="button" value="Quay lại"/></a>';
echo '</div></div>';
break;

default;
//echo '<div class="omenu"><img src="/icon/vao.png"> <a href="/nongtrai/laibuon.php?act=lamkem"> Làm kem giải nhiệt</a></div>';
echo '<div class="omenu"><img src="/icon/vao.png"> <a href="?act=vett">Mua vé truyền tống</a></div>';
echo '<div class="omenu"><img src="/icon/vao.png"> <a href="/nongtrai/laibuon.php?act=bd"> Báo danh hằng ngày</a></div>';
echo '<div class="omenu"><img src="/icon/vao.png"><a href="/nongtrai/doiqua.php"> Đổi quà</a></div>';
echo '<div class="omenu"><img src="/icon/vao.png"><a href="/nongtrai/doimonan.php"> Đổi món ăn đặc biệt</a></div>';
echo '<div class="omenu"><img src="/icon/vao.png"><a href="/nongtrai/doidiem.php"> Đổi điểm tích lũy</a></div>';

//echo '<div class="omenu"><a href="/nongtrai/doixu.php"> Đổi Điểm Tích Luỹ Lấy Xu<a/></div>';
//echo '<div class="omenu"><a href="/nongtrai/doiluong.php"> Đổi Điểm Tích Luỹ Lấy Lượng<a/></div>';

}

echo'</div></div></td></tr></tbody></table></td></tr></tbody></table>';
//echo '<div class="omenu">&raquo; <a href="index.php"><b>Quay lại</b></a>  &raquo; <a href="index.php"><b>Nông trại</b></a>  &raquo; <a href="/farm"><b>Trang trại</b></a></div>';

require("../incfiles/end.php");
?>