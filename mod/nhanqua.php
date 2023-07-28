<?php
error_reporting(0);
date_default_timezone_set('Asia/Ho_Chi_Minh');
$times = date("H");
if ($times == 21) {
echo '<div class="pmenu"><center><b><font color="0000ff">Sự Kiện Mở Hộp Quà Nhận Quà Liền Tay!</font></b><br>
<img src="/images/qua21h.png"><br>Sự kiện bắt đầu lúc 21h00 hằng ngày<br>Giải thưởng từ 300.000 xu đến 500.000 xu và 1 lượng đến 30 lượng cùng nhiều quà hấp dẫn khác</center></div>';

if($datauser['qua'] == 0){	
echo '<center><div class="pmenu"><b><a href="/mod/hopqua.php">Nhận Quà Ngay</a></b></div></center>'; 
    }
} else {
echo '<div class="pmenu"><center><b><font color="0000ff">Sự Kiện Mở Hộp Quà Nhận Quà Liền Tay!</font></b><br>
<img src="/images/qua21h.png"><br>Sự kiện bắt đầu lúc 21h00 hằng ngày<br>Giải thưởng từ 300.000 xu đến 500.000 xu và 1 lượng đến 30 lượng cùng nhiều quà hấp dẫn khác</center></div>';
@mysql_query("UPDATE `users` SET `qua` = '0' WHERE `id` != '0'");
}

?>