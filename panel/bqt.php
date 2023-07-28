<?php 

define('_IN_JOHNCMS', 1); 
$textl = 'Khu vực Ban Quản Trị'; 
require_once ("../incfiles/core.php"); 
require_once ("../incfiles/head.php");
echo '<div class="rmenu"><b><font color="brown"><marquee behavior="alternate" scrollamount="2" position: absolute; width: 500px;" onmouseover="this.stop();" onmouseout="this.start();"><b>Đây là khu vực dành cho Ban Quản Trị</b></marquee></font></b></div>';
if($datauser['rights'] < 2){
echo'<div class="rmenu">Bạn không đủ thẩm quyền để vào khu vực này</div>';
} else {
mysql_query("DELETE FROM `cms_ban_users` WHERE `user_id`=''");
echo'<div class="phdr">Chức năng</div>';
echo'<div class="menu"><b>Chú Ý: <a href="/mod/noiquy.php">Nội Quy Ban Quản Trị (Phải Đọc)</b></a></div>';

echo'<div class="menu"><a href="
/panel/index.php?act=usr"><i class="fa fa-hand-o-right" style="color:#3c763d"></i> <b>Danh sách thành viên</b></a></div>';
echo'<div class="menu"><a href="
/panel/index.php?act=usr_adm"><i class="fa fa-hand-o-right" style="color:#3c763d"></i> <b>Danh sách Ban Quản Trị</b></a></div>';
echo'<div class="menu"><a href="
/panel/index.php?act=ban_panel"><i class="fa fa-hand-o-right" style="color:#3c763d"></i> <b>Danh sách thành viên vi phạm</b></a></div>';
echo'<div class="menu"><a href="
/users/search.php"><i class="fa fa-hand-o-right" style="color:#3c763d"></i> <b>Tìm kiếm tài khoản</b></a></div>';
echo'<div class="menu"><a href="
/panel/index.php?act=search_ip"><i class="fa fa-hand-o-right" style="color:#3c763d"></i> <b>Tìm kiếm IP</b></a></div>';

echo'<div class="menu"><a href="
/panel/upitem.php"><i class="fa fa-hand-o-right" style="color:#3c763d"></i> <b>Upload ITem</b></a></div>';
echo'<div class="menu"><a href="
/panel/additeman.php"><i class="fa fa-hand-o-right" style="color:#3c763d"></i> <b>Add ITem Ẩn</b></a></div>';
echo'<div class="menu"><a href="
/panel/icon.php"><i class="fa fa-hand-o-right" style="color:#3c763d"></i> <b>Send Icon</b></a></div>';
echo'<div class="menu"><a href="
/panel/sendit.php"><i class="fa fa-hand-o-right" style="color:#3c763d"></i> <b>Send ITem</b></a></div>';

echo'<div class="menu"><a href="
/panel/senditemthucong.php"><i class="fa fa-hand-o-right" style="color:#3c763d"></i> <b>Send ITem Thủ Công</b></a></div>';
echo'<div class="menu">Đang update thêm chức năng...</div>';
}
require_once ("../incfiles/end.php"); 
?>