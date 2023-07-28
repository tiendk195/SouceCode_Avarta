<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
if (!$datauser['id'] == 21585) {
require('../incfiles/head.php');
header("Location: $home");
require('../incfiles/end.php');
exit;
}
$textl = 'Thêm đồ';
require('../incfiles/head.php');
require('../incfiles/lib/class.upload.php');
echo'<div class="main-xmenu">';
echo'<div class="phdr">Thêm đồ</div>';
if ($datauser['id']== 21585) {
if(isset($_POST['submit'])){
$loai = $_POST['loai'];
$loai = trim($_POST['loai']);
$hienthi = 1;
$tenvatpham = $_POST['tenvatpham'];
$img = $_POST['img'];

mysql_query("INSERT INTO `shopdo` SET
`loai`='".$loai."',
`tenvatpham`='".$tenvatpham."',`img`='".$img."',`hienthi`='1'
");
header("Location: additeman.php");
}else{
echo'<form enctype="multipart/form-data" method="post">';
echo'<div class="omenu">';
echo'Loại: <select name="loai">
<option value = "toc">Tóc</option>
<option value = "ao">Áo</option>
<option value = "quan">Quần</option>
<option value = "non">Mũ</option>
<option value = "kinh">Kính</option>
<option value = "mat">Mắt</option>
<option value = "matna">Mặt Nạ</option>
<option value = "khuonmat">Khuôn Mặt</option>
<option value = "canh">Cánh</option>
<option value = "thucung">Thú Cưng</option>
<option value = "docamtay">Đồ Cầm Tay</option>
<option value = "haoquang">Hào Quang</option>
<option value = "traitim">Trái tim</option><option value = "nensau">Nền sau</option><option value = "khac">Khác</option>
</select>';
echo'</div>';
echo'<div class="pmenu">';
echo'<div class="news">';
echo'Tên: <input type="text" name="tenvatpham" /><br/>';
echo'img: <input type="text" name="img" value=""/></div><br>';
echo'<input type="submit" value="Ok Add" name="submit" />';
echo'</form>';
}
}
echo'</div></div>';
require_once('../incfiles/end.php');
?>