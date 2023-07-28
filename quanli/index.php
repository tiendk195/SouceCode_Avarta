<?php 

define('_IN_JOHNCMS', 1); 
$textl = 'Khu vực Ban Quản Trị'; 
require_once ("../incfiles/core.php"); 
require_once ("../incfiles/head.php");
if($datauser['rights'] < 2){
echo'<div class="romenu">Bạn không đủ thẩm quyền để vào khu vực này</div>';
} else {
echo'<div class="phdr">Chức năng</div>';
echo'<div class="omenu">Chú Ý: <a href="/mod/noiquy.php">Nội Quy Ban Quản Trị (Phải Đọc)</a></div>';
if($datauser['rights'] >= 5){

echo'<div class="omenu"><a href="
/panel/upitem.php"><img src="/icon/vao.png"> Up Item</a></div>';
echo'<div class="omenu"><a href="
itemdaup.php"><img src="/icon/vao.png"> Item đã úp của bạn</a></div>';
}
if($datauser['rights'] >= 9){
        echo'<div class="omenu"><a href="
khokhung.php"><img src="/icon/vao.png"> Kho khung</a></div>';
    echo'<div class="omenu"><a href="
bank.php"><img src="/icon/vao.png"> Chuyển tiền</a></div>';
echo'<div class="omenu"><a href="
/panel/vatpham.php"><img src="/icon/vao.png"> Chuyển vật phẩm</a></div>';
echo'<div class="omenu"><a href="
/quanli/t.php"><img src="/icon/vao.png"> Item Ẩn</a></div>';
echo'<div class="omenu"><a href="
/quanli/h.php"><img src="/icon/vao.png"> Item Thường</a></div>';


}
echo'<div class="omenu"><a href="
/panel/index.php?act=usr"><img src="/icon/vao.png"> Danh sách thành viên</a></div>';
echo'<div class="omenu"><a href="
/panel/index.php?act=usr_adm"><img src="/icon/vao.png"> Danh sách Ban Quản Trị</a></div>';
echo'<div class="omenu"><a href="
/panel/index.php?act=ban_panel"><img src="/icon/vao.png"> Danh sách thành viên vi phạm</a></div>';
echo'<div class="omenu"><a href="
/users/search.php"><img src="/icon/vao.png"> Tìm kiếm tài khoản</a></div>';
echo'<div class="omenu"><a href="
/panel/index.php?act=search_ip"><img src="/icon/vao.png"> Tìm kiếm IP</a></div>';


}
require_once ("../incfiles/end.php"); 
?>