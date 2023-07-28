<?php

define('_IN_JOHNCMS', 1);
$rootpath='../../';

require_once ("../../incfiles/core.php");


if (isset($_GET['thongtin'])) {
        $gkt=mysql_fetch_array(mysql_query("SELECT * FROM `giakimthuat_user` WHERE  `user_id`='".$user_id."' "));
    if ($gkt['time']<time()){
        header('location: index.php');

}
    if ($gkt['boss']!=$id){
                		    echo'<script>alert("Lỗi không có boss này!!");</script>';
                		    exit;

}
$vatpham = $id;
if(empty($vatpham)){
header('location: /');
}
$check=mysql_num_rows(mysql_query("SELECT * FROM `giakimthuat_boss` WHERE `id`='".$vatpham."'  "));
if($check < 1){
                		    echo'<script>alert("Lỗi không có boss này!!");</script>';
                		    exit;
}
 $info = mysql_fetch_array(mysql_query("SELECT * FROM `giakimthuat_boss` WHERE `id`='".$vatpham."'"));



echo'<center>
'.$info['mota'].'
<p id="tancong"></p><img src="img/boss/'.$id.'.gif"> <br>';

echo'<input onclick="tancong('.$id.')" type="submit" name="submit" value="Đánh"></center></div>';




}


//
if (isset($_GET['tancong'])) {
        $gkt=mysql_fetch_array(mysql_query("SELECT * FROM `giakimthuat_user` WHERE  `user_id`='".$user_id."' "));
    if ($gkt['time']<time()){
        header('location: index.php');

}
    if ($gkt['boss']!=$id){
                		    echo'<script>alert("Lỗi không có boss này!!");</script>';
                		    exit;

}

$vatpham = $id;
if(empty($vatpham)){
header('location: /');
}
$check=mysql_num_rows(mysql_query("SELECT * FROM `giakimthuat_boss` WHERE `id`='".$vatpham."'  "));
if($check < 1){
                		    echo'<script>alert("Lỗi không có boss này!!");</script>';
                		    exit;
}
if($datauser['suckhoe'] <=0){
                		    echo'<script>alert("Vui lòng hồi phục sức khỏe để tấn công!!");</script>';
                		    exit;
}
 $info = mysql_fetch_array(mysql_query("SELECT * FROM `giakimthuat_boss` WHERE `id`='".$vatpham."'"));
$rand=rand(1,$info['tile']);

echo'<div class="kevach">Tấn công Boss thành công. Bạn bị trừ 5 sức khỏe!</div>';
    if ($gkt['thuoc_time']<time()){

           mysql_query("UPDATE `users` SET `suckhoe`=`suckhoe`-'5' WHERE `id`='".$user_id."' ");
    }
           if ($rand==1){
             echo'<div class="kevach">Bạn nhận được 1 đá ước nguyện!</div>';
                        mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop`='319' ");

  
           }
                      if ($rand==2){
             echo'<div class="kevach">Bạn nhận được 1 Bảo rương hang kim loại !</div>';
                        mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop`='335' ");

  
           }



}


//

if (isset($_GET['dongcua'])) {
           mysql_query("UPDATE `giakimthuat_user` SET `time`='0' WHERE `user_id`='".$user_id."' ");
                		    echo'<script>alert("Đóng cửa thành công");</script>';

  
   
}


//

if (isset($_GET['moruong'])) {
        $gkt=mysql_fetch_array(mysql_query("SELECT * FROM `giakimthuat_user` WHERE  `user_id`='".$user_id."' "));

        $br=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE  `user_id`='".$user_id."' AND `id_shop`='335' "));



if($br['soluong'] <=0){
                		    echo'<script>alert("Bạn không có bảo rương để mở!!");</script>';
                		    exit;
}
                        mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop`='335' ");

 $info = mysql_fetch_array(mysql_query("SELECT * FROM `giakimthuat_user` WHERE `user_id`='".$user_id."'"));
$rand=rand(1,(101-$info['uocnguyen']));

           if ($rand==1){
                               		    echo'<script>alert("Bạn nhận được 1 Cổ kim cốt!");</script>';

                        mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop`='334' ");

  
           }else {
                               		    echo'<script>alert("Hãy ước nguyện để tăng tỉ lệ mở rương bạn nhé!!");</script>';
    
           }
           
                


}


//
?>