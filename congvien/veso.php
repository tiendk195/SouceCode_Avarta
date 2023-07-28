<?php
//////---- Game vé số ----//////
////----- Mod by pkoolvn ------////
//-Vui lòng không xóa dòng này-//
define('_IN_JOHNCMS', 1);
$textl = 'Vé Số';
$headmod = 'id_user';
require_once ("../incfiles/core.php");
require_once ("../incfiles/head.php");
echo'<div class="phdr">Vé số - MTeen.Net</div>';

if($times != 17 and $times != 18 and  $times != 19 and  $times != 20 and  $times != 21 and  $times != 22 and  $times != 23){
if (isset($_POST['ok'])) {
$so = (int)$_POST['so'];
if ($datauser['xu'] < 1000000) {
			echo '<div class="rmenu">Lỗi... Bạn không đủ xu</div>';
} else if($so < 1 || $so > 99){
echo '<div class="rmenu">Lỗi... Số đề không hợp lệ</div>';
} else {
mysql_query("UPDATE `users` SET `xu`=`xu`-'1000000' WHERE `id` = '".$user_id."'");
mysql_query("INSERT INTO `veso` SET
`user_id`='".$user_id."',
`so`='".$so."'");
}

}


echo'<div class="pmenu"><img src="/congvien/vs.gif"/>Vé số đê ^^</div>';
$tong = mysql_result(mysql_query("select count(*) from `veso` where `user_id` = '".$user_id."'"),0);
if($tong){
echo'<div class="rmenu">Số bạn đã mua:';
$req=mysql_query("SELECT * FROM `veso` WHERE `user_id` = '".$user_id."' ORDER BY `id` DESC LIMIT 100000");
while($res=mysql_fetch_array($req)){
echo ' <b>'.$res['so'].'</b>, ';
}
echo'</div>';
}
echo'<div class="pmenu">
<b>Nhập vé số muốn mua (1-99):<br><form method="post">
<input type="number" name="so" value="1" size="6" maxLength="2"><br>
	<input class="nut" type="submit" name="ok" value="Mua"> </form></div>';
echo'<div class="omenu"><b>Hướng dẫn</b>:<br>- Nhập vé số bạn muốn từ (1-99)<br>- 17h chiều hàng ngày sẽ có kết quả<br>- Ai mua chúng giải đặc biệt sẽ được 10.000.000xu <br>- P/S: Giá 1M xu 1 vé, mua càng nhiều nếu chúng sẽ được càng nhiều xu</div>';
} else {
$vs = mysql_result(mysql_query("select count(*) from `veso_cn` where `id` = '1'"));
echo'<div class="pmenu"><img src="/congvien/vs.gif"/><b>Số đặc biệt hôm nay là: <font color="red">'.$vs['so'].'</font></b></div>';
$tong = mysql_result(mysql_query("select count(*) from `veso` where `user_id` = '".$user_id."' and `so`='".$vs['so']."'"),0);
if($tong > 0){
$xu = 10000000 * $tong;
echo'<div class="rmenu">Chúc mừng bạn chúng giải đặc biệt Bạn đang có: <b>'.$tong.'</b> vé số trúng giải và bạn nhận được <b>'.$xu.'</b></div>';
}
}
echo'<div class="menu"><a href="/congvien"/><b>◀ Quay lại</a></div>';
require_once ("../incfiles/end.php");
?>