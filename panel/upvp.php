<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');

if ($rights < 9) {
require('../incfiles/head.php');
header("Location: $home");
require('../incfiles/end.php');
exit;
}
$headmod = 'Thêm đồ';
$textl = 'Thêm đồ';
require('../incfiles/head.php');
require('../incfiles/lib/class.upload.php');
echo'<div class="main-xmenu">';
echo'<div class="phdr">Thêm đồ</div>';
if ($rights >= 3) {
if(isset($_POST['submit'])){
$loai = $_POST['loai'];
$loai = trim($_POST['loai']);
$chedo = $_POST['chedo'];
$chedo = trim($_POST['chedo']);

$gia = $_POST['gia'];
$thongtin = $_POST['thongtin'];

$loaitien = $_POST['loaitien'];
$hienthi = isset($_POST['hienthi']) ? 1 : 0;
$tenvatpham = $_POST['tenvatpham'];
$total = count(array_diff(scandir($_SERVER['DOCUMENT_ROOT'].'/images/vatpham'), array('..', '.')));
$insertid = $total;
mysql_query("INSERT INTO shopvatpham SET
`loai`='".$loai."',
`id`='".$insertid."',
`gia`='".$gia."',
`loaitien`='".$loaitien."',
`tenvatpham`='".$tenvatpham."',
`thongtin`='".$thongtin."',

`hienthi`='".$hienthi."'
");
if ($hienthi==0&&$clan==0) {
$bot='[blue]'.$login.'[/blue] vừa thêm [red]'.$tenvatpham.' [/red] vào shop!';
//mysql_query("INSERT INTO guest SET user_id`='2',text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
}
$file =  $_FILES['imagefile']['tmp_name'];
list($w, $h) = getimagesize($file);
$handle = new upload($_FILES['imagefile']);
if ($handle->uploaded) {
// Обрабатываем фото
$handle->file_new_name_body = $insertid;
//$handle->mime_check = false;
$handle->allowed = array(
'image/jpeg',
'image/gif',
'image/png'
);
$handle->file_max_size = 1024 * $set['flsz'];
$handle->file_overwrite = true;
if($w > 1000) {
$handle->image_resize = true;
$handle->image_x = 800;
$handle->image_y = false;
} else {
$handle->image_resize = false;
}
$handle->image_ratio_y = true;
$handle->image_convert = 'png';
$handle->process('../images/vatpham/'.$chedo.'');
$handle->clean();
}

$file =  $_FILES['imagefile2']['tmp_name'];
list($w, $h) = getimagesize($file);
$handle = new upload($_FILES['imagefile2']);
if ($handle->uploaded) {
// Обрабатываем фото
$handle->file_new_name_body = $insertid;
//$handle->mime_check = false;
$handle->allowed = array(
'image/jpeg',
'image/gif',
'image/png'
);
$handle->file_max_size = 1024 * $set['flsz'];
$handle->file_overwrite = true;
if($w > 1000) {
$handle->image_resize = true;
$handle->image_x = 800;
$handle->image_y = false;
} else {
$handle->image_resize = false;
}
$handle->image_ratio_y = true;
$handle->image_convert = 'png';
$handle->process('../images/vatpham/');
$handle->clean();
}
header("Location: upvp.php");
}else{
echo'<form enctype="multipart/form-data" method="post">';
echo'<div class="omenu">';
echo'<b><font color="red">Lưu ý: Khi up cần phải tách riêng item ra</br>
Nếu ảnh không động thì chỉ cần upload 1 ảnh, bỏ item động</font></b></br>';
echo'Loại: <select name="loai">
<option value = "dacbiet">Đặc biệt</option>
<option value = "danhboss">Đánh boss</option>
<option value = "nangcap">Nâng cấp</option>
<option value = "cauca">Câu cá</option>
<option value = "ghepmanh">Ghép mảnh</option>

</select>';
echo'</div>';
echo'<div class="omenu">';
echo'<input type="hidden" name="MAX_FILE_SIZE" value="' . (1024 * $set['flsz']) . '" />';
echo'Item: <input type="file" name="imagefile" value="" />';
echo'</div>';

echo'<div class="omenu">';
echo'Tên item: <input type="text" name="tenvatpham" /><br/>';
echo'Thông tin: <input type="text" name="thongtin" /><br/>';

echo'Loại tiền: <select name="loaitien">
<option value = "xu"> Xu</option>
<option value = "vnd"> Lượng</option>
<option value = "vndkhoa"> Lượng khóa</option>
</select><br/>';
echo'Giá: <input type="text" name="gia" /><br/>';
echo'</div>';
echo '<div class="omenu"><input type="checkbox" value="1" name="hienthi"> Ko cho hiển thị trong shop<br/></div>';
echo'<div class="omenu"><input type="submit" value="Lưu lại" name="submit" />';
echo'</form></div>';
}
}
echo'</div>';

require_once('../incfiles/end.php');
?>