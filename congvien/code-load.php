<?php
header('Content-Type: text/html; charset="utf-8');
define('_IN_JOHNCMS', 1);
require_once('../incfiles/core.php');
if (!$user_id) {
header('Location: /index.php');
exit;
}

///Mod by lethinhpro

if(isset($_POST['submit'])) {
    $ma=($_POST['gift']);
    $req = mysql_query("SELECT * FROM `magift` WHERE `ma`='".$ma."'");
$dem = mysql_num_rows($req);
$res = mysql_fetch_array($req);


if(empty($ma)) {
echo '<center><font color="red"><b>Lỗi!!</b></font> Bạn chưa nhập mã vào ô</center>';
} else if($dem == 0) {
echo '<center><font color="red"><b>Lỗi!!</b></font> Mã gift không tồn tại hoặc đã được sử dụng!</center>';
} else if($res['loaigift'] != 0) {

if ($datauser['giftdungchung']==1){
  echo '<center><font color="red"><b>Lỗi!!</b></font> Bạn chỉ được phép nhập mã này 1 lần!</center>';  
} else {

mysql_query("UPDATE `users` SET `xu`=`xu` + '".$res['xu']."' WHERE `id`='".$user_id."'");

mysql_query("UPDATE `users` SET `luong`=`luong`+'".$res['luong']."' WHERE `id`='".$user_id."'");
	mysql_query("UPDATE `users` SET `giftdungchung`='1' WHERE `id`='".$user_id."'");

echo '<center><div class="omenu"><b>Nhận thưởng thành công công!</b><br>' . 'Với mã gift này bạn sẽ nhận được'.($res['xu'] != 0 ? '<b> '.$res['xu'].' xu</b>':'').' '.($res['xu'] != 0 && $res['luong'] != 0 ? '<b>và </b>':'').''.($res['luong'] != 0 ? '<b>'.$res['luong'].' lượng </b>':'').'cộng vào tài khoản!</div></center>';
	$text='Bạn đã nhận được được'.($res['xu'] != 0 ? '<b> '.$res['xu'].' xu</b>':'').' '.($res['xu'] != 0 && $res['luong'] != 0 ? '<b>và </b>':'').''.($res['luong'] != 0 ? '<b>'.$res['luong'].' lượng </b>':'').' từ mã gif: '.$ma.'  ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
//lịch sử chuyển
mysql_query("INSERT INTO `ls_nhapcode` SET
`user_id`='".$user_id."',
`code`='$ma',
`xu`='".$res['xu']."',
`luong`='".$res['luong']."',
`user_tao`='".$res['user']."',
`loaicode`='".$res['loaigift']."',

`time`='".time()."'
");
}
} else {
mysql_query("UPDATE `users` SET `xu`=`xu` + '".$res['xu']."' WHERE `id`='".$user_id."'");

mysql_query("UPDATE `users` SET `luong`=`luong`+'".$res['luong']."' WHERE `id`='".$user_id."'");

echo '<center><div class="omenu"><b>Nhận thưởng thành công công!</b><br>' . 'Với mã gift này bạn sẽ nhận được'.($res['xu'] != 0 ? '<b> '.$res['xu'].' xu</b>':'').' '.($res['xu'] != 0 && $res['luong'] != 0 ? '<b>và </b>':'').''.($res['luong'] != 0 ? '<b>'.$res['luong'].' lượng </b>':'').'cộng vào tài khoản!</div></center>';
	$text='Bạn đã nhận được được'.($res['xu'] != 0 ? '<b> '.$res['xu'].' xu</b>':'').' '.($res['xu'] != 0 && $res['luong'] != 0 ? '<b>và </b>':'').''.($res['luong'] != 0 ? '<b>'.$res['luong'].' lượng </b>':'').' từ mã gif: '.$ma.'  ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
//lịch sử chuyển
mysql_query("INSERT INTO `ls_nhapcode` SET
`user_id`='".$user_id."',
`code`='$ma',
`xu`='".$res['xu']."',
`luong`='".$res['luong']."',
`user_tao`='".$res['user']."',
`loaicode`='".$res['loaigift']."',

`time`='".time()."'
");


mysql_query("DELETE FROM `magift` WHERE `ma`='".$ma."'");

}
}

echo'<center>';
echo 'Nhập mã:<form method="post"> <input type="text" id="gift" name="gift"></br>';
echo '<input type="submit" name="submit" id="lethinhpro"  value="Nhận quà">';
echo'</form>';
echo'</center>';

echo 'Mã gift gồm 8 kí tự, có thể là chữ hoặc số, không phân biệt hoa thường.<br>';
echo '- Mã gift sẽ được share ở trên diễn đàn, quà tặng của event, người chiến thắng trong wap hay chỉ đơn giản là trả lương cho bạn.' . '<br>Mã có đủ mọi giá trị, ít cũng có mà nhiều cũng có. Phần thưởng bạn có thể nhận là lượng hoặc xu. Để có mã gift hãy tích cực tham gia các hoạt động trên diễn đàn nhé!';
echo '</div>';
