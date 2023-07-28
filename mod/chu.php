<?php



define('_IN_JOHNCMS', 1);



$headmod = 'mod';



require('../incfiles/core.php');



if(!$user_id){



require('../incfiles/head.php');


echo
functions::display_error($lng['access_guest_forbidden']);


exit;



}



$textl = 'Mua Chữ Chạy';



require('../incfiles/head.php');



echo '<div class="phdr"><b>Mua Chữ Chạy</b></div>';

if(isset($_POST['submit'])){



$msg=functions::checkout(htmlspecialchars($_POST['msg']));



if(empty($msg)){



echo 'Bạn chưa nhập Chữ của bạn.<br/><a href="chuchay.php">Làm lại</a>';



}elseif(strlen($msg) > 40){



echo 'Chữ của bạn quá dài,nó không thể nhiều hơn 40 kí tự.<br/><a href="">Làm lại</a>';



}else{



if ($datauser['xu'] >= 500000000)



{



mysql_query("UPDATE `users` SET `chuchay`='".$msg."',



`xu`=`xu` -500000000 WHERE `id`='".$user_id."'");



echo 'Chữ chạy của bạn đã Mua thành công.';



} else {


echo 'Bạn không đủ vàng để đổi Chử, yêu cầu phải có 500M xu mới đổi tên được nha!';



}



}



}else{



echo '' .



'<div class="gmenu">Giá: 500M xu<br/> <b><br/>Chúc các bạn vui vẻ!<br/>Có thể bỏ dấu và không quá 40 ký tự nhé!<br/><br/><form method="post">' .



'Nội dung Chữ:<br/><textarea cols="' . $set_user['field_w'] . '" rows="' . $set_user['field_h'] . '" name="msg"> </textarea>' .



'<br/>' .



'<input type="submit" value="Lưu lại" name="submit" /><br />' .



'</form></div>' .



'';



}






require_once('../incfiles/end.php');



?>