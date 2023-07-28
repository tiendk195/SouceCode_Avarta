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

	$time = time();
if ( $datauser['timevip'] < $time and $datauser['vip']>0) {
echo '<div class="omenu">Bạn cần gia hạn VIP để thực hiện</div>';
require('../incfiles/end.php');
exit;
} 

if ($datauser['vip']==0 ) {
echo '<div class="omenu">Chức năng chỉ dành cho VIP</div>';
require('../incfiles/end.php');
exit;
} 

switch($act) {
    default:
if ($datauser['chuchay']!='') {
    echo '<div class="phdr"><b>Cá nhân</b></div>';

    echo'<div class="omenu"><b>Chữ chạy hiện tại: '.$datauser['chuchay'].'</b></br>
    <a href="?act=del"><font color="red"><b>[ Xóa ]</b></font></a>
    
    </div>';
}

echo '<div class="phdr"><b>Mua Chữ Chạy</b></div>';

if(isset($_POST['submit'])){



$msg=functions::checkout(htmlspecialchars($_POST['msg']));



if(empty($msg)){



echo '<div class="omenu">Bạn chưa nhập Chữ của bạn.<br/><a href="chuchay.php">Làm lại</a></div>';



}elseif(strlen($msg) > 100){



echo '<div class="omenu">Chữ của bạn quá dài,nó không thể nhiều hơn 100 kí tự.<br/><a href="">Làm lại</a></div>';



}else{



if ($datauser['diemnapthe'] >= 10000)



{



mysql_query("UPDATE `users` SET `chuchay`='".$msg."',



`diemnapthe`=`diemnapthe` -10000 WHERE `id`='".$user_id."'");



echo '<div class="omenu"><b>Mua thành công</b></div>.';



} else {


echo '<div class="omenu">Bạn không đủ điểm nạp thẻ</div>';;



}



}



}else{



echo '



<div class="omenu">Giá: 10.000 Điểm nạp thẻ<br/> <b><br/>Chúc các bạn vui vẻ!<br/>Không quá 100 kí tự!<br/><br/><form method="post">



Nội dung Chữ:<br/><textarea cols="' . $set_user['field_w'] . '" rows="' . $set_user['field_h'] . '" name="msg"> </textarea>



<br/>



<input type="submit" value="Mua" name="submit" /><br />



</form></div>';



}

break;

    case 'del':

 echo '<div class="phdr"><b>Cá nhân</b></div>';
         if ($datauser['chuchay']=='') {
                  echo'<div class="omenu"><b><font color="red">Bạn chưa có chữ chạy!</font></b></div>';   
         } else {

 if(isset($_POST['xoa'])){

    echo'<div class="omenu"><b><font color="red">Xóa thành công</font></b></div>';
    
mysql_query("UPDATE `users` SET `chuchay`=''  WHERE `id`='".$user_id."'");
    

}

    echo'<div class="omenu"><b>Bạn có chắc chắn muốn xóa chữ chạy:<font color="red"> '.$datauser['chuchay'].' </font>không?</b></br>
    <form method="post"><input type="submit" value="Xóa" name="xoa" /><br />



</form>
    
    </div>';
    break;


}
}

require_once('../incfiles/end.php');



?>