<?php
/*///////////////////////
///////////////////////*/
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
$textl= 'Tạo nhóm mới';
require('../incfiles/head.php');
include_once('func.php');
echo '<div class="mainblok"><div class="phdr">Tạo nhóm mới</div>';
echo '<form method="post"><div class="menu"><b>
Tên nhóm:</b><br/>
<input type="text" name="ten" value="" />
</div><div class="menu"><b>Mô tả:</b><br/ >
<textarea rows="3" name="mota"></textarea><br/>Lưu ý: Mô tả phải viết bằng tiếng việt có dấu, không sử dụng ngôn ngữ teen, nghiêm cấm spam và quảng cáo wap nếu không nhóm có thể bị xoá mà không báo trước.</div>
<div class="menu"><b>Quy định sử dụng:</b>
<br/>1. Nhóm sau 1 tuần không có hoạt động gì sẽ bị xoá.
<br/>2. Tăng cường tuyển member và đăng bài cho nhóm.
<br/>3. Nhóm không đường truyền bá văn hoá phẩm trái với pháp luật và thuần phong mĩ tục VN.
<br/>4. Không dùng nhóm để quảng cáo wap. Trưởng nhóm phải quản lí chặt chẽ các bài viết của nhóm!
<br/>5. Bạn có quyền quảng bá nhóm để tuyển member cho nhóm nhưng nghiêm cấm spam.<br/>
<input type="checkbox" name="quydinh" value="1" /> <b>Tôi đã đọc quy định trên</b></div>
<div class="menu">Quản lý riêng tư:
<br/><input type="radio" checked="checked" name="riengtu" value="0" /><b>Mở:</b>
Ai cũng có thể nhìn thấy nhóm, những th&#224;nh viên trong nhóm v&#224; b&#224;i đăng của các th&#224;nh viên.
<br/><input type="radio" name="riengtu" value="1" /><b>Đã đóng:</b> Ai cũng có thể nhìn thấy nhóm v&#224; những th&#224;nh viên trong nhóm. Nhưng chỉ th&#224;nh viên mới có thể thấy các b&#224;i đăng.
<br/><input type="radio" name="riengtu" value="2" /><b>Bí mật:</b> Chỉ th&#224;nh viên mới có thể thấy nhóm, những th&#224;nh viên khác trong nhóm v&#224; b&#224;i đăng của các th&#224;nh viên.<br/></div>
<div class="menu">
<table>
<tbody>';
$i=1;
for($j=1;$j<=136;$j++){
if(getimagesize('../images/clan/'.$j.'.png')!=false) {
if($i%10==1){
if($i!=1) echo'</tr>';
echo'<tr>';
}
echo'<td style="border: 1px solid #AAA"><img src="/images/clan/'.$j.'.png" /><input type="radio" name="clan-icon" value="'.$j.'" ',($i==1)? 'checked':'','/>
</td>';
$i++;
} //tontai

}///for
echo'</tr></tbody>
</table>';
echo'<input type="submit" name="sub" value="Tạo nhóm" /></div></form>';
echo '</div>';
$icon=$_POST['clan-icon'];
$ten = $_POST['ten'];
$mota = $_POST['mota'];
$riengtu = intval($_POST['riengtu']);
$qd = intval($_POST['quydinh']);
$dem = mysql_result(mysql_query("SELECT COUNT(*) FROM `nhom` WHERE `user_id`='$user_id'"),0);
$kt = mysql_result(mysql_query("SELECT COUNT(*) FROM `nhom` WHERE `name`='$ten'"),0);
$dv = mysql_num_rows(mysql_query("SELECT * FROM `nhom_user` WHERE `user_id`='$user_id'"));
if(isset($_POST['sub'])) {
if(!empty($ban)) {
echo '<div class="menu">Tài khoản của bạn đang bị khoá nên không thể tạo nhóm!</div>';
}else if(getimagesize('../images/clan/'.$icon.'.png')==false){
echo'<div class="menu">icon không hợp lệ. vui lòng chọn lại!!!!</div>';
}else if($dem >= 1) {
echo '<div class="menu">Mỗi người chỉ có thể tạo tối đa 2 nhóm!</div>';
} else if($qd == 0) {
echo '<div class="menu">Phải đồng ý với quy định sử dụng!</div>';
} else if(empty($ten)) {
echo '<div class="tb">bạn phải nhập tên nhóm!</div>';
} else if(strlen($ten) > 50) {
echo '<div class="menh">Tên nhóm quá dài!</div>';
} else if($kt > 0) {
echo '<div class="menu">Tên nhóm đã có người dùng!</div>';
} else if(empty($mota)) {
echo '<div class="menu">Bạn phải nhập mô tả về nhóm!</div>';
} else if(strlen($mota) > 300) {
echo '<div class="menu">Mô tả quá dài!</div>';
}else if($dv > 0) {
echo '<div class="menu">Bạn đã có nhóm rồi !</div>';
} else if($datauser['luong'] < 1500) {
echo '<div class="menu">Bạn phải có 1500 lượng để lập nhóm</div>';
} else {
mysql_query("INSERT INTO `nhom` SET `icon`='$icon', `name`='".$ten."', `gt`='".mysql_real_escape_string($mota)."', `set`='".$riengtu."', `user_id`='".$user_id."', `time`='".$time."'");
$rid = mysql_insert_id();
mysql_query("INSERT INTO `nhom_user` SET `id`='$rid', `user_id`='$user_id', `time`='$time', `rights`='2', `duyet`='1'");
mysql_query("UPDATE `users` SET `luong`=`luong`-'1500' WHERE `id`='{$user_id}'");
mysql_query("UPDATE `users` SET `icon`='{$icon}' WHERE `id`='{$user_id}'");

echo '<div class="menu"><b><font color="blue">Tạo  Clan thành công, xin chúc mừng !</font></b> <a href="page.php?id='.$rid.'">Đi tới nhóm </a></div>';
}
}


require('../incfiles/end.php');
?>
