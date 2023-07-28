<?php

define('_IN_JOHNCMS', 1);

include'../incfiles/core.php';
if (isset($_GET['ttvp'])) {

$vatpham = $id;
if(empty($vatpham)){
header('location: /');
}
$check=mysql_num_rows(mysql_query("SELECT * FROM `ngocrong_cadicshop` WHERE `id`='".$vatpham."' "));

if($check < 1){
                		    echo'<script>alert("Lỗi không có vật phẩm này!!");</script>';
}else{
        $info = mysql_fetch_array(mysql_query("SELECT * FROM `ngocrong_cadicshop` WHERE `id`='".$vatpham."'"));

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






if (isset($_GET['muavp'])) {

$vatpham = $id;
if(empty($vatpham)){
header('location: /');
}
$check=mysql_num_rows(mysql_query("SELECT * FROM `ngocrong_cadicshop` WHERE `id`='".$vatpham."'"));

if($check < 1){
                		    echo'<script>alert("Lỗi không có vật phẩm này!!");</script>';
}


else{
        	$sl=trim($_POST['sl']);


     $info = mysql_fetch_array(mysql_query("SELECT * FROM `ngocrong_cadicshop` WHERE `id`='".$vatpham."'"));
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