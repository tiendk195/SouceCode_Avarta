<?php

define('_IN_JOHNCMS', 1);

require_once ("../incfiles/core.php");
if (isset($_GET['ktg'])) {
   

$vatpham = $id;
if(empty($vatpham) or $vatpham!=1){
                		    echo'<script>alert("Lỗi không có vật phẩm này!!");</script>';

    
} else {
$check=mysql_num_rows(mysql_query("SELECT * FROM `giakimthuat_khaithac` WHERE `id`='".$vatpham."' "));

if($check < 1){
                		    echo'<script>alert("Lỗi không có vật phẩm này!!");</script>';
}else{
        $info = mysql_fetch_array(mysql_query("SELECT * FROM `giakimthuat_khaithac` WHERE `id`='".$vatpham."'"));

    $cuoc=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE  `id_shop`='322' AND `user_id`='".$user_id."' "));

if ($cuoc['soluong']<1){
                    		    echo'<script>alert("Lỗi không có cuốc!!");</script>';
exit;
}
if ($info['soluong']<1){
                        		    echo'<script>alert("Củi đã hết lượt khai thác, vui lòng đợi phục hồi!");</script>';
    mysql_query("UPDATE `giakimthuat_khaithac` SET `soluong`='1000' WHERE `id`='".$vatpham."'");

exit;


}
                        		    echo'<script>alert("Khai thác củi thành công!!");</script>';
    mysql_query("UPDATE `giakimthuat_khaithac` SET `soluong`= `soluong`-'1' WHERE `id`='".$vatpham."'");
    mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop`='323'");
    mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop`='322'");


}
}
}

///
if (isset($_GET['ktd'])) {
   

$vatpham = $id;
if(empty($vatpham) or $vatpham!=2){
                		    echo'<script>alert("Lỗi không có vật phẩm này!!");</script>';
exit;
    
} else{
$check=mysql_num_rows(mysql_query("SELECT * FROM `giakimthuat_khaithac` WHERE `id`='".$vatpham."' "));

if($check < 1){
                		    echo'<script>alert("Lỗi không có vật phẩm này!!");</script>';
}else{
        $info = mysql_fetch_array(mysql_query("SELECT * FROM `giakimthuat_khaithac` WHERE `id`='".$vatpham."'"));

    $cuoc=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE  `id_shop`='322' AND `user_id`='".$user_id."' "));

if ($cuoc['soluong']<1){
                    		    echo'<script>alert("Lỗi không có cuốc!!");</script>';
exit;
}
if ($info['soluong']<1){
                        		    echo'<script>alert("Củi đã hết lượt khai thác, vui lòng đợi phục hồi!");</script>';
    mysql_query("UPDATE `giakimthuat_khaithac` SET `soluong`='1000' WHERE `id`='".$vatpham."'");

exit;


}
$rand=rand(1,5);
if ($rand==1){
                        		    echo'<script>alert("Khai thác đá thành công!!");</script>';
    mysql_query("UPDATE `giakimthuat_khaithac` SET `soluong`= `soluong`-'1' WHERE `id`='".$vatpham."'");
    mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop`='324'");
    mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop`='322'");
} else {
                            		    echo'<script>alert("Đá cứng quá, cuốc gãy rồi!!");</script>';
    mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop`='322'");

}

}
}
}
?>