<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');
$textl='Thêm Item';
require('../incfiles/head.php');
if($datauser['id']!=5){
echo functions::display_error('Truy cập bị từ chối!');
require('../incfiles/end.php');
exit;
}
echo'<div class="phdr">Thêm item </div>';
if(isset($_POST['submit'])){
$file=$_FILES['file']['tmp_name'];
if(!filesize($file)){
echo'<div class="loi">Bạn chưa chọn file upload</div>';}elseif(exif_imagetype($file) != IMAGETYPE_PNG  && exif_imagetype($file) != IMAGETYPE_GIF) {
echo'<div class="loi">Định dạng không hợp lệ</div>';
}else{
$loai=$_POST['loai'];
$checkfile=getimagesize('../images/'.$loai.'/'.$_POST['hinh'].'.png');
if($checkfile==false){
$i=$_POST['hinh'];
}else{
die('hình đã tồn tại, vui lòng nhập tên khác');
}
$name=$_POST['name'];
$xu=$_POST['xu'];
$luong=$_POST['luong'];
$url='../images/'.$loai.'/'.$i.'.png';
if(move_uploaded_file($file,$url)){
echo'<div class="thanhcong"> thành công! '.$i.'</div>';
mysql_query("insert into `shop_clan` set `vp`='$i',`loai`='$loai',`name`='$name',`xu`='$xu',`luong`='$luong'")or die(mysql_error());
}else{ echo'<div class="loi">Thất bại</div>';
} ////thành công, thất bại
}//////ko lỗi
$file1=$_FILES['file1']['tmp_name'];
if(filesize($file1)){
if(exif_imagetype($file1) != IMAGETYPE_PNG && exif_imagetype($file1) != IMAGETYPE_GIF) {
echo'<div class="loi">Định dạng không hợp lệ</div>';
}else{
$url='../images/'.$loai.'/n-'.$i.'.png';
if(move_uploaded_file($file1,$url)){
echo'<div class="thanhcong"> thành công! '.$i.'</div>';
}else{ echo'<div class="loi">Thất bại</div>';
} ////thành công, thất bại
}//////ko lỗi
}////có chọn file động
}/////submit
$array1=array('Áo','Cánh','Đồ Cầm Tay','Hào Quang','Khuôn Mặt','Kính','Mắt','Mặt Nạ','Mũ','Quần','Thú Cưng','Tóc');
$array2=array('ao','canh','docamtay','haoquang','khuonmat','kinh','mat','matna','non','quan','thucung','toc');
echo'<form method="post" enctype="multipart/form-data">';
echo'<div class="gmenu">';
echo'<p>Loại:</p><p><select name="loai">';
for($i=0;$i<=11;$i++){
echo'<option value="'.$array2[$i].'"',($_POST['loai']==$array2[$i])?'selected': '',' >'.$array1[$i].'</option>';
}
echo'</p></select>';
echo'<p>Tên hình (vd: 10002 - không thể bỏ trống hãy chắc chắn chưa có file này) :</br> <input type="text" name="hinh"></p>';
echo'<p>Tên (có thể bỏ trống) :</br> <input type="text" name="name"></p>';
echo'<p>Xu :</br> <input type="number" name="xu"></p>';
echo'<p>Lương :</br> <input type="number" name="luong"></p>';
echo'<p>Chọn file: <input type="file" name="file"></p><p>File động:<input type="file" name="file1"></p><p><input type="submit" name="submit" value="Thêm"></p></form>';
echo'</div>';
require('../incfiles/end.php');
?>
