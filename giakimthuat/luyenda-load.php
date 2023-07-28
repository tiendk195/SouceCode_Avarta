<?php

define('_IN_JOHNCMS', 1);

include'../incfiles/core.php';
if (isset($_GET['ttvp'])) {

$vatpham = $id;
if(empty($vatpham)){
header('location: /');
}
$check=mysql_num_rows(mysql_query("SELECT * FROM `giakimthuat_shopbatu_luyenda` WHERE `id`='".$vatpham."' "));

if($check < 1){
                		    echo'<script>alert("Lỗi không có vật phẩm này!!");</script>';
}else{
        $info = mysql_fetch_array(mysql_query("SELECT * FROM `giakimthuat_shopbatu_luyenda` WHERE `id`='".$vatpham."'"));

    $gkt=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE  `id`='{$info['id_shop']}'"));
     $cui=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE  `id`='323'"));

    echo'<div class="pmenu"><center><font color="green">'.$gkt['tenvatpham'].'</font>
<br><font size="1"><i>Luyện <font color="red">1 '.$gkt['tenvatpham'].'</font> cần '.$info['soluongcui'].' <img src="/images/vatpham/323.png"> và '.$info['soluongda'].' <img src="/images/vatpham/'.$info['dacan'].'.png"> </br>
</br>
Tỉ lệ thành công: '.((10-$info['tile'])*10).' %</br>
Bạn có chắc chắn muốn luyện không?</i></font></br>


<input type="submit" value="Luyện" onclick="luyen('.$id.')">
</center></div>';
    



}
}

//



if (isset($_GET['luyen'])) {

$vatpham = $id;
if(empty($vatpham)){
header('location: /');
}
$check=mysql_num_rows(mysql_query("SELECT * FROM `giakimthuat_shopbatu_luyenda` WHERE `id`='".$vatpham."'"));

if($check < 1){
                		    echo'<script>alert("Lỗi không có vật phẩm này!!");</script>';
}


else{


     $info = mysql_fetch_array(mysql_query("SELECT * FROM `giakimthuat_shopbatu_luyenda` WHERE `id`='".$vatpham."'"));
    $cui=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE  `id_shop`='323' AND `user_id`='".$user_id."' "));
        $dacan=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE  `id_shop`='{$info['dacan']}' AND `user_id`='".$user_id."' "));
        $shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE  `id`='{$info['id_shop']}' "));


       if ($cui['soluong']< ($info['soluongcui']) || $dacan['soluong']< ($info['soluongda'])  ) {
                                   		    echo'<script>alert("Bạn không có đủ vật phẩm để luyện  !!");</script>';

    } else {
        $rand=rand(1,$info['tile']);
            mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$info['soluongcui']."' WHERE `user_id`='".$user_id."' AND `id_shop`='323' ");
            mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$info['soluongda']."' WHERE `user_id`='".$user_id."' AND `id_shop`='{$info['dacan']}' ");

        if ($rand==1){
        
        
         echo'<div class="pmenu">Chúc mừng bạn đã luyện thành công  '.$shop['tenvatpham'].'!</div>';

    mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop`='{$info['id_shop']}' ");
}
else {
             echo'<div class="pmenu">Luyện thất bại!!</div>';

}
}


}
}


//


?>