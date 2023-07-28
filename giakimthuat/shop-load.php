<?php

define('_IN_JOHNCMS', 1);

include'../incfiles/core.php';
if (isset($_GET['ttvp'])) {

$vatpham = $id;
if(empty($vatpham)){
header('location: /');
}
$check=mysql_num_rows(mysql_query("SELECT * FROM `giakimthuat_shopbatu` WHERE `id`='".$vatpham."' "));

if($check < 1){
                		    echo'<script>alert("Lỗi không có vật phẩm này!!");</script>';
}else{
        $info = mysql_fetch_array(mysql_query("SELECT * FROM `giakimthuat_shopbatu` WHERE `id`='".$vatpham."'"));

    $gkt=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE  `id`='{$info['id_shop']}'"));
  if ($info['loai']==1){
      $loaitien='xu';
  }    
  if ($info['loai']==2){
      $loaitien='lượng';
  } 
    if ($info['loai']==3){
      $loaitien='lượng khóa';
  } 

    echo'<div class="pmenu"><center><font color="green">'.$gkt['tenvatpham'].'</font>
<br><font size="1"><i>'.$gkt['thongtin'].' </br>
Giá: '.$info['gia'].' '.$loaitien.'</i></font></br>
<input value="1" type="number" id="sl"><br>

<input type="submit" value="Mua" onclick="muavp('.$id.')">
</center></div>';
    



}
}

//

if (isset($_GET['ttdoiqua'])) {

$vatpham = $id;
if(empty($vatpham)){
header('location: /');
}
$check=mysql_num_rows(mysql_query("SELECT * FROM `giakimthuat_shopbatu_doiqua` WHERE `id`='".$vatpham."' "));

if($check < 1){
                		    echo'<script>alert("Lỗi không có vật phẩm này!!");</script>';
}else{
        $info = mysql_fetch_array(mysql_query("SELECT * FROM `giakimthuat_shopbatu_doiqua` WHERE `id`='".$vatpham."'"));

    $gkt=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE  `id`='{$info['id_shop']}'"));
 
    echo'<div class="pmenu"><center><font color="green">'.$gkt['tenvatpham'].'</font>
<br><font size="1"><i> Cần: '.$info['gia'].'  Cổ kim cốt </i></font></br>

<input type="submit" value="Đổi quà" onclick="doiqua('.$id.')">
</center></div>';
    



}
}

//

if (isset($_GET['doiqua'])) {

$vatpham = $id;
if(empty($vatpham)){
header('location: /');
}
$check=mysql_num_rows(mysql_query("SELECT * FROM `giakimthuat_shopbatu_doiqua` WHERE `id`='".$vatpham."'"));

if($check < 1){
                		    echo'<script>alert("Lỗi không có vật phẩm này!!");</script>';
}


else{


     $info = mysql_fetch_array(mysql_query("SELECT * FROM `giakimthuat_shopbatu_doiqua` WHERE `id`='".$vatpham."'"));
    $ckc=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE  `id_shop`='334' AND `user_id`='".$user_id."' "));
    $shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE  `id`='{$info['id_shop']}'"));

   $tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."'");
$checktongruong=mysql_num_rows($tongruong);
	if ($checktongruong>=$datauser['tongruong']) {
echo'<script>alert("Rương của bạn đã đầy, vui lòng nâng cấp thêm!!");</script>';
	} else 

       if ($ckc['soluong']< ($info['gia'])) {
                                   		    echo'<script>alert("Bạn không có đủ vật phẩm để đổi  !!");</script>';

    } else {
         echo'<div class="pmenu">Chúc mừng bạn đã đổi thành công  '.$shop['tenvatpham'].'!</div>';
mysql_query("INSERT INTO `khodo` SET `user_id`='".$user_id."', `id_shop`='".$shop['id']."', `loai`='".$shop['loai']."', `id_loai`='".$shop['id_loai']."', `tenvatpham` = '".$shop['tenvatpham']."', `timesudung`='".$shop['timesudung']."'");

    mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$info['gia']."' WHERE `user_id`='".$user_id."' AND `id_shop`='334' ");
}


}
}

//



if (isset($_GET['muavp'])) {

$vatpham = $id;
if(empty($vatpham)){
header('location: /');
}
$check=mysql_num_rows(mysql_query("SELECT * FROM `giakimthuat_shopbatu` WHERE `id`='".$vatpham."'"));

if($check < 1){
                		    echo'<script>alert("Lỗi không có vật phẩm này!!");</script>';
}


else{
        	$sl=trim($_POST['sl']);


     $info = mysql_fetch_array(mysql_query("SELECT * FROM `giakimthuat_shopbatu` WHERE `id`='".$vatpham."'"));
    $daghep=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE  `id`='{$info['id_shop']}'"));
    $daghep_u=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE  `id_shop`='{$info['id_shop']}' AND `user_id`='".$user_id."' "));

    if ($info['loai']=='1'){
       if ($datauser['xu']< ($info['gia']*$sl) || $sl <1) {
                                   		    echo'<script>alert("Bạn không có đủ tiền để mua  !!");</script>';

    } else {
         echo'<div class="pmenu">Chúc mừng bạn đã mua thành công '.$sl.' '.$daghep['tenvatpham'].'!</div>';
    mysql_query("UPDATE `users` SET `xu`=`xu`-'".($info['gia']*$sl)."' WHERE `id`='".$user_id."'");
    mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$sl."' WHERE `user_id`='".$user_id."' AND `id_shop`='{$info['id_shop']}' ");
}
}
    if ($info['loai']=='2'){
       if ($datauser['luong']< ($info['gia']*$sl) || $sl <1) {
                                   		    echo'<script>alert("Bạn không có đủ tiền để mua  !!");</script>';

    } else {
         echo'<div class="pmenu">Chúc mừng bạn đã mua thành công '.$sl.' '.$daghep['tenvatpham'].'!</div>';
    mysql_query("UPDATE `users` SET `luong`=`luong`-'".($info['gia']*$sl)."' WHERE `id`='".$user_id."'");
    mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$sl."' WHERE `user_id`='".$user_id."' AND `id_shop`='{$info['id_shop']}' ");
}
}
       if ($info['loai']=='3'){
       if ($datauser['luongkhoa']< ($info['gia']*$sl) || $sl <1) {
                                   		    echo'<script>alert("Bạn không có đủ tiền để mua  !!");</script>';

    } else {
         echo'<div class="pmenu">Chúc mừng bạn đã mua thành công '.$sl.' '.$daghep['tenvatpham'].'!</div>';
    mysql_query("UPDATE `users` SET `luongkhoa`=`luongkhoa`-'".($info['gia']*$sl)."' WHERE `id`='".$user_id."'");
    mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$sl."' WHERE `user_id`='".$user_id."' AND `id_shop`='{$info['id_shop']}' ");
}
}


}
}

//


?>