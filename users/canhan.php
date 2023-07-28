<?php

define('_IN_JOHNCMS',1);
require_once('../incfiles/core.php');
$textl='Trang cá nhân';
require_once('../incfiles/head.php');
if(!$user_id){
echo 'Chức năng chỉ dành cho thành viên đăng kí';
require_once('../incfiles/end.php');
exit;
}
echo'
<div class="phdr"><b>Bản thân</b></div><div class="omenu"><div class="lethinh_hethongmenu"><img src="/users/includes/profile/hinhanh/thongbao.png" alt="Lê Thịnh"/><a href="/mail/index.php?act=systems" style="color :#6a6a6a;"> Tin nhắn hệ thống</a>
<br/><i style="font-size:11px;">Những tin nhắn của hệ thống</i>
</div><div class="lethinh_hethongmenu"><img src="/users/includes/profile/hinhanh/doimk.png" alt="Lê Thịnh"/><a href="/users/profile.php?act=matkhau" style="color :#6a6a6a;"> Đổi mật khẩu</a>
<br/><i style="font-size:11px;">Bạn có thể thay đổi mật khẩu tại đây</i>
</div><div class="lethinh_hethongmenu"><img src="/users/includes/profile/hinhanh/tinnhan.png" alt="Lê Thịnh"/><a href="/mail/" style="color :#6a6a6a;"> Nhắn tin</a>
<br/><i style="font-size:11px;">Nhắn tin cho một người nào đó</i>
</div><div class="lethinh_hethongmenu"><img src="/users/includes/profile/hinhanh/banthan.png" alt="Lê Thịnh"/><a href="/member/'.$datauser['id'].'.html" style="color :#6a6a6a;"> Bản thân</a>
<br/><i style="font-size:11px;">Thông tin bản thân của bạn</i>
</div><div class="lethinh_hethongmenu"><img src="/users/includes/profile/hinhanh/quantri.png" alt="Lê Thịnh"/><a href="/users/index.php?act=admlist" style="color :#6a6a6a;"> Ban quản trị</a>
<br/><i style="font-size:11px;">Danh sách ban quản trị trong diễn đàn</i>
</div></div>';

require_once('../incfiles/end.php');
?>