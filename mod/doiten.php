<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');
$textl='Đổi tên';
require('../incfiles/head.php');
if (!$user_id) {
header('Location: /login.php');
exit;
}
$thedoiten=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='121'"));
if ($datauser['solandoiten']<=3) {
	
$canthe = $datauser['solandoiten']+1;
}
	
//$canthe = $datauser['solandoiten']*1;
if ($datauser['solandoiten']>3) {
	
$canthe = $datauser['solandoiten']*2;
}
$thu = $datauser['solandoiten']+'1';
echo'<div class="phdr">MOD &gt; Đổi tên </div>';



if (isset($_GET['done'])) {
echo '<div class="omenu">Tên của bạn đã được đổi thành <b>'.$login.'</b></div>';
}
if (isset($_POST['rename'])) {

if ($thedoiten['soluong']<$canthe) {
echo '<div class="omenu"><b><font color="red">Lỗi!</font></b> Bạn cần '.$canthe.' thẻ đổi tên <img src="/images/vatpham/121.png"><a href="/">Trở về </a> </div>';
} else {
$name=trim($_POST['textbox']);
$nameLower=strtolower($name);
$checkName=mysql_num_rows(mysql_query("SELECT * FROM `users` WHERE LCASE(`name`) = '".$nameLower."'"));
if (empty($name)) {
echo '<div class="omenu">Nhập tên đi chứ...</div>';
} else if(strlen($name)>=25||strlen($name)<=3) {
echo '<div class="rmenu">Tên ít nhất là 3 kí tự và không quá 25 kí tự</div>';
} else if($checkName==1){
echo '<div class="omenu">Tên đã có người sử dụng...</div>';

} else {
mysql_query("UPDATE `users` SET `name`='".mysql_real_escape_string($name)."',`solandoiten`=`solandoiten`+'1' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$canthe."' WHERE `user_id`='".$user_id."' AND `id_shop`='121'");

header('Location: ?done');
exit;
}
}
}
echo'<div class="mainblok"><div class="omenu"><form method="post">
<center>Bạn đã đổi tên <font color="green">'.$datauser['solandoiten'].' lần</font> Lần đổi tên thứ <b>'.$thu.'</b> bạn cần <font color="green">'.$canthe.' Thẻ đổi tên </font><img src="/images/vatpham/121.png"><br>
Bạn đang có : '.$thedoiten['soluong'].' Thẻ đổi tên  <img src="/images/vatpham/121.png">
<br><br><input type="text" name="textbox" placeholder="Nhập tên bạn cần đổi"> <input type="submit" value="Đổi" name="rename" class="nut"></center><table><tbody><tr></tr></tbody></table>
</form>
</div><div class="omenu">
<b><font color="red">Lưu ý khi đổi tên:</font></b>
<br>- Có thể viết tiếng việt có dấu</b> <br>
- Mặc dù khi đổi tên thì tên đăng nhập của bạn vẫn là "<b>'.$datauser['name_lat'].'</b>"
</div></div>';

require('../incfiles/end.php');
?>