<?php

define('_IN_JOHNCMS', 1);

require_once ("../incfiles/core.php");
$vatpham = $id;
if(empty($vatpham)){
header('location: /');
}
$check=mysql_num_rows(mysql_query("SELECT * FROM `shopvatpham` WHERE `id`='".$vatpham."' AND `loai`='ghepmanh'"));

if($check < 1){
                		    echo'<script>alert("Lỗi không có vật phẩm này!!");</script>';
}else{
        	$sl=trim($_POST['sl']);

    $hopqua=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='260'"));

    $info = mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE `id`='".$vatpham."'"));
    if ($hopqua['soluong']<$sl or $sl<1) {
                        		    echo'<script>alert("Bạn không có đủ '.$sl.' Rương mảnh ghép!!");</script>';

}
else {
    echo'<div class="pmenu">Chúc mừng bạn đã đổi được '.$sl.' '.$info['tenvatpham'].'!</div>';
    mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$sl."' WHERE `user_id`='".$user_id."' AND `id_shop`='260'");
    mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$sl."' WHERE `user_id`='".$user_id."' AND `id_shop`='{$info['id']}' ");

    
    	
}


}


//


?>