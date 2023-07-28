<?php
define('_IN_JOHNCMS', 1);
$headmod = 'mod';
$active1 = 'id="selected"';

$bhead = 2;
require('../incfiles/core.php');
if(!$user_id){
require('../incfiles/head.php');
echo functions::display_error($lng['access_guest_forbidden']);
require('../incfiles/end.php');
exit;
}
$textl = 'Khu Tiện Ích';
require('../incfiles/head.php');

echo'<div class="phdr">Nhận quà hằng ngày</div>';
echo'<div class="gd_">';
include 'nhanqua.php';
echo'</div>';
?>
<div class="phdr"> Quà ưu đãi</div>
<div class="gd_">

<?php
if ($datauser['quatanthu'] <=0) {
echo'<div class="pmenu"><a href="tanthu.php"><b><font color="red"><img src="/icon/vao.png">  Nhận quà tân thủ</font></b></a><br>Quà tân thủ cho thành viên mới</div>';

}
?>

<div class="pmenu"><img src="/icon/next.png"><a href="gioithieu.html"> Đổi quà giới thiệu 
<img src="/images/hot.gif"></a><br>Giới thiệu bạn bè tham gia MXH nhận quà HOT </div>
<div class="pmenu"><img src="/icon/next.png"><a href="thantai.html"> Rương thần tài</a><br>Đổi quà hot tại đây</div>
<div class="pmenu"><img src="/icon/next.png"><a href="/khugiaitri/bauvat.php"> Vòng quay báu vật</a><br>Tích lũy quay tay nhận ngay quà HOT </div>
<div class="pmenu"><img src="/icon/next.png"><a href="quadangnhap"> Quà đăng nhập</a><br>Tích lũy đăng nhập nhận quà HOT </div>
<div class="pmenu"><img src="/icon/next.png"><a href="qua-online.html"> Quà online </a><br>Nhận quà online tích lũy </div>
<div class="pmenu"><img src="/icon/next.png"><a href="chemgio.html"> Shop chém gió </a><br>Đổi quà từ điểm chém gió </div>
</div>
<div class="phdr"> Chức Năng Tiền Tệ</div>
<div class="gd_">

<div class="pmenu"><img src="/icon/next.png"><a href="ketsat.html"> Két sắt </a><br>Nới cất giữ của cải tài sản của bạn</div>
<div class="pmenu"><img src="/icon/next.png"><a href="vongquaymayman.html"> Vòng quay may mắn </a><br>Hên thì ăn tất, đen thì quên đi</div>
<div class="pmenu"><img src="/icon/next.png"><a href="xeng.html"> Đổi Xu sang Xèng </a><br>Bạn thiếu Xèng ? Hãy vào đây</div>
</div>
<div class="phdr"> Trạm ATM</div>
<div class="gd_">

<div class="pmenu"><img src="/icon/next.png"><a href="/napthe/"> Nạp Thẻ </a><br> Nạp xu và lượng LT23 </div>
<div class="pmenu"><img src="/icon/next.png"><a href="/napthe/?act=menhgia"> Bảng Giá</a><br> Xem bảng giá nạp thẻ trước khi nạp nào.</div>
<div class="pmenu"><img src="/icon/next.png"><a href="/napthe/?act=nhanqua"> Nhận Quà</a><br> Nhận quà khi bạn nạp tiền.</div>
<div class="pmenu"><img src="/icon/next.png"><a href="/napthe/?act=quatang"> Quà Tặng</a><br> Xem quà tặng mà VIP nhận được.</div>
</div>
<div class="phdr"> Chức Năng Chung</div>
<div class="gd_">

<div class="pmenu"><img src="/icon/next.png"><a href="maunick.html"> Mua màu nick </a><br> Tạo điểm nhấn riêng cho bản thân</div>
<div class="pmenu"><img src="/icon/next.png"><a href="muastatus.html"> Mua Status chém gió </a><br> Giới thiệu bản thân tại chatbox ngay nào</div>

<div class="pmenu"><img src="/icon/next.png"><a href="muachuki.html"> Mua chữ kí forum </a><br> Giới thiệu bản thân tại diễn đàn ngay nào</div>
<div class="pmenu"><img src="/icon/next.png"><a href="doiten.html"> Đổi tên <img src="/images/new.gif"></a><br> Chức năng hoàn toàn mới và miễn phí với thẻ đổi tên</div>
<div class="pmenu"><img src="/icon/next.png"><a href="/game"> Game Tổng Hợp</a><br> Bạn có thể xem thêm tại đây.</div>
<div class="pmenu"><img src="/icon/next.png"><a href="/congvien/code.php"> Gift Code </a><br> Nơi nhận quà hot từ gift code sự kiện.</div>
<div class="pmenu"><img src="/icon/next.png"><a href="magioithieu.html"> Mã Giới Thiệu</a><br> Lấy mã giới thiệu Cùng mời bạn bè tham gia Mxh nào.</div>
<div class="pmenu"><img src="/icon/next.png"><a href="/users/profile.php?act=matkhau"> Đổi Mật Khẩu</a><br> Đổi mật khẩu để tăng bảo mật.</div>
<div class="pmenu"><img src="/icon/next.png"><a href="/upanh"> Upload Ảnh</a><br> Bạn đang cần up ảnh ? Hãy vào đây.</div>
<div class="pmenu"><img src="/icon/next.png"><a href="/avatar/chotroi.php"> Chợ Trời</a><br> Nơi có thể trao đổi vật phẩm qua lại.</div>
</div>
<div class="phdr"> Bảng Xếp Hạng</div>
<div class="gd_">

<div class="pmenu"><img src="/icon/next.png"><a href="topvip.html"> TOP V.I.P</a><br> Danh sách cao thủ VIP.</div>


<div class="pmenu"><img src="/icon/next.png"><a href="bangxephang.html"> Bảng Xếp Hạng</a><br> TOP Mxh xem tại đây.</div>



</div>




<?php



require('../incfiles/end.php');
?>