<?php
define('_IN_JOHNCMS',1);
header('Content-Type: text/html; charset=utf-8');
require('../incfiles/core.php');

if (isset($_POST['ok'])) {
$so = (int)$_POST['so'];
$xu = (int)$_POST['xu'];
$check2 = mysql_result(mysql_query("SELECT COUNT(*) FROM `danhde` WHERE `so`='".$so."' AND `user_id`='".$user_id."'"), 0);

if ( (empty($xu)) || (empty($so)) ){
				echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn chưa nhập số đề hoặc xu </div>';
} else 
if ($datauser['xu'] < $xu || $xu <1) {
			echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn không đủ xu</div>';
} else if ($xu>=10000000) {
				echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Tiền cược quá lớn</div>';

		} else if($so < 1 || $so > 99){
echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Số đề không hợp lệ</div>';
} else if($check2 >= 1){
echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn đã đánh con này rồi mà</div>';
} else if($check >= 3){
echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn đã đánh 3 con rồi không thể đánh thêm vui lòng đợi ngày mai mới được đánh tiếp</div>';
}  else {
echo'<div class="omenu">Đánh thành công số đề: <b><font color="green">'.$so.' - '.$xu.'xu</font></b></div>';
mysql_query("INSERT INTO `danhde` SET
`so`='".$so."',`xu`='".$xu."',
`user_id`='".$user_id."'");
mysql_query("UPDATE `users` SET `xu` = `xu`-'{$xu}' WHERE `id` = '{$user_id}'");
$text = '[b][green]'.$login.' vừa chơi con đề:[/green] [red]'.$so.'[/red] [green]với mức cược [/green] [red]'.number_format($xu).'xu[/red] [blue]ae hóng nào  [/blue][/b]';
mysql_query("INSERT INTO `guest` SET `user_id`='256', `text`='" . mysql_real_escape_string($text) . "', `time`='".time()."'");
}
}
echo'<div class="pmenu"><b>Hãy nhập số đề muốn đánh từ 1 đến 99. Vào lúc 18h mỗi ngày hệ thống sẽ trả về kết quả xổ số giải đặc biệt miền bắc, người có con số trùng với kết quả sẽ nhận được tiền thưởng x20
</b></div>';

echo'<div class="pmenu">Nhập số đề:<br><form method="post">
<input type="text" name="so" id ="so" value="" size="15" maxLength="2"><br>
Nhập số xu muốn đánh:<br><form method="post">
<input type="text" name="xu" id="xu" value="" size="15"><br>

	<input class="nut" type="submit" id="ducnghiadz" name="ok" value="Đánh"> </form></div>';


echo '<div class="phdr"><b>Lịch Sử Đánh Đề</b></div>';
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `danhde` "), 0);
$req=mysql_query("SELECT * FROM `danhde` WHERE `id` > '0' ORDER BY `id` DESC LIMIT $start,100");
$i = 1;
while($res=mysql_fetch_array($req)) {
    $ducnghia_usr =  mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` ='".$res['user_id']."'"));

echo '<div class="menu">';
echo '<b>'.$i.'. <a href="/users/profile.php?user='.$res['user_id'].'">
'.nick($ducnghia_usr['id']).'</a></b> đã đánh con: <b>'.$res['so'].' - '.number_format($res['xu']).' xu</b>';
echo '</div>';
++$i;
}
if($tong == 0){
echo'<div class="menu">Hiện tại chưa có ai đánh</div>';
}