<?php

define('_IN_JOHNCMS', 1);

include'../incfiles/core.php';
if (isset($_GET['ttvp'])) {

$vatpham = $id;
if(empty($vatpham)){
header('location: /');
}
$check=mysql_num_rows(mysql_query("SELECT * FROM `giakimthuat_shopbatu_nangcap` WHERE `id`='".$vatpham."' "));

if($check < 1){
                		    echo'<script>alert("Lỗi không có vật phẩm này!!");</script>';
}else{
        $info = mysql_fetch_array(mysql_query("SELECT * FROM `giakimthuat_shopbatu_nangcap` WHERE `id`='".$vatpham."'"));

    $gkt=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE  `id`='{$info['id_shop']}'"));
        $vpcan=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE  `id`='{$info['vpcan']}'"));

     $cui=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE  `id`='323'"));
          $checkcui=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE  `id_shop`='323' AND `user_id`='{$user_id}'"));

     $dacan=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE  `id`='{$info['dacan']}'"));
     $checkdacan=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE  `id_shop`='{$info['dacan']}' AND `user_id`='{$user_id}'"));
$ktruong=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `loai`='".$vpcan['loai']."' AND `id_loai`='".$vpcan['id_loai']."' AND `user_id`='".$user_id."' AND `timesudung` = '0'"));
    if ($ktruong>0){
        $tinhtrang='Đã có';
    } else {
                $tinhtrang='Chưa có';

    }
    echo'<div class="pmenu"><center><font color="green">'.$gkt['tenvatpham'].'</font>
<br><font size="1"><i>Nâng cấp <font color="red">1 '.$gkt['tenvatpham'].'</font> cần </br>
'.$info['soluongcui'].' <img src="/images/vatpham/323.png"> (Đang có: '.$checkcui['soluong'].')
</br>
'.$info['soluongda'].' <img src="/images/vatpham/'.$info['dacan'].'.png"> (Đang có: '.$checkdacan['soluong'].')</br>
<font color="red">'.$vpcan['tenvatpham'].' </font><img src="/images/shop/'.$info['vpcan'].'.png"> ('.$tinhtrang.')</br>
</br>
Tỉ lệ thành công: '.((10-$info['tile'])*10).' %</br>
Bạn có chắc chắn muốn nâng cấp không?</i></font></br>


<input type="submit" value="Nâng cấp" onclick="nangcap('.$id.')">
</center></div>';
    



}
}

//



if (isset($_GET['nangcap'])) {

$vatpham = $id;
if(empty($vatpham)){
header('location: /');
}
	$tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."'");
$checktongruong=mysql_num_rows($tongruong);

$check=mysql_num_rows(mysql_query("SELECT * FROM `giakimthuat_shopbatu_nangcap` WHERE `id`='".$vatpham."'"));

if($check < 1){
                		    echo'<script>alert("Lỗi không có vật phẩm này!!");</script>';
} else 	if ($checktongruong>=$datauser['tongruong']) {
                    		    echo'<script>alert("Rương đã đầy, vui lòng nâng cấp thêm!!");</script>';
}


else{


     $info = mysql_fetch_array(mysql_query("SELECT * FROM `giakimthuat_shopbatu_nangcap` WHERE `id`='".$vatpham."'"));
         $vpcan=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE  `id`='{$info['vpcan']}'"));

     $cui=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE  `id_shop`='323' AND `user_id`='".$user_id."'"));
     
        $shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE  `id`='{$info['id_shop']}' "));
     $dacan=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE  `id_shop`='{$info['dacan']}'  AND `user_id`='".$user_id."'"));
     $canvp=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$info['vpcan']."'"));

$ruong=mysql_fetch_array(mysql_query("SELECT * FROM `khodo` WHERE `loai`='".$canvp['loai']."' AND `user_id`='".$user_id."' AND `id_loai`='".$canvp['id_loai']."' AND `timesudung` = '0'"));
$ktruong=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `loai`='".$canvp['loai']."' AND `id_loai`='".$canvp['id_loai']."' AND `user_id`='".$user_id."' AND `timesudung` = '0'"));

       if ($cui['soluong']< ($info['soluongcui']) || $dacan['soluong']< ($info['soluongda'])|| $ktruong<1 ) {
                                   		    echo'<script>alert("Bạn không có đủ vật phẩm để nâng cấp  !!");</script>';

    } else {
        $rand=rand(1,$info['tile']);
            mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$info['soluongcui']."' WHERE `user_id`='".$user_id."' AND `id_shop`='323' ");
            mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$info['soluongda']."' WHERE `user_id`='".$user_id."' AND `id_shop`='{$info['dacan']}' ");

        if ($rand==1){
        
        
         echo'<div class="pmenu">Chúc mừng bạn đã nâng cấp thành công  '.$shop['tenvatpham'].'!</div>';
mysql_query("DELETE FROM `khodo` WHERE `id`='".$ruong['id']."' LIMIT 1");
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$shop['loai']."',
`id_loai`='".$shop['id_loai']."',
`timesudung`='0',
`tenvatpham`='".$shop['tenvatpham']."',
`id_shop`='".$shop['id']."'
");

}
else {
             echo'<div class="pmenu">Nâng cấp thất bại!!</div>';

}
}


}
}


//


?>