<?php
error_reporting(0);
define('_IN_JOHNCMS', 1);
$headmod = 'mod';
$bhead = 2;
require('../incfiles/core.php');
if(!$user_id){
require('../incfiles/head.php');
echo functions::display_error($lng['access_guest_forbidden']);
require('../incfiles/end.php');
exit;
}
$textl = 'Boss';
require('../incfiles/head.php');
echo'<div class="phdr"> Hướng dẫn </div>';
echo'<div class="omenu">';

echo'<b><font color="red">Để vào khu boss, bạn cần phải mua Cổ lệnh <img src="/images/vatpham/127.png"> tại Cửa hàng. Khi đánh boss, bạn sẽ được nhận ngẫu nhiên Đá Ngũ Sắc, Lượng, Đá Cường Hóa tùy theo độ may mắn của mình, đặc biệt bạn sẽ nhận được Công thức chế tác <img src="/images/vatpham/129.png"> và Huy hiệu bóng tổi  <img src="/images/vatpham/89.png"> để đổi các phần thưởng có giá trị!</font></b><br>';

echo'Đánh boss thế giới không dùng HP, chỉ sử dụng Sức khỏe và Sức Mạnh của bản thân! Mỗi lần đánh sẽ bị trừ 5 sức khỏe, khi hết có thể hồi phục. </br><b>Tuy nhiên, nếu bị boss phản dame, bạn sẽ bị trừ tận 25 sức khỏe </b></font></br>Chúc các bạn có một trải nghiệm vui vẻ</div>';

require('../incfiles/end.php');
?>