<?php

define('_IN_JOHNCMS', 1);

require_once ("../incfiles/core.php");
$vatpham = $id;
if(empty($vatpham)){
header('location: /');
}
$check=mysql_num_rows(mysql_query("SELECT * FROM `ngocrong_shopcadic` WHERE `id`='".$vatpham."' "));
        $info = mysql_fetch_array(mysql_query("SELECT * FROM `ngocrong_shopcadic` WHERE `id`='".$vatpham."'"));

$query=mysql_query("SELECT * FROM `khodo` WHERE `id_shop`='{$info['id_shop']}' AND `user_id`='".$user_id."'");
$checkdo=mysql_num_rows($query);
if ($checkdo>=1) { 
         		    echo'<div style="border: 1px solid #EAF6FC;background-color: #EAF6FC;margin:0px 0;padding:5px;border-radius:5px;width:auto;height:auto;">
<font size="1" color="white" style="text-shadow: 0 0 0.2em #9932CC, 0 0 0.2em #9932CC,  0 0 0.2em #9932CC"><b>
Bạn đã sở hữu vật phẩm này!!
</b></font></div>';

}else
if($check < 1){
                		    echo'<div style="border: 1px solid #EAF6FC;background-color: #EAF6FC;margin:0px 0;padding:5px;border-radius:5px;width:auto;height:auto;">
<font size="1" color="white" style="text-shadow: 0 0 0.2em #9932CC, 0 0 0.2em #9932CC,  0 0 0.2em #9932CC"><b>
Lỗi không có vật phẩm này!!
</b></font></div>';
}else{
        $info = mysql_fetch_array(mysql_query("SELECT * FROM `ngocrong_shopcadic` WHERE `id`='".$vatpham."'"));

        $mtp=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE  `id_shop`='313' AND `user_id`='".$user_id."' "));
    $shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE  `id`='{$info['id_shop']}'"));
      $tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."'");
$checktongruong=mysql_num_rows($tongruong);
	if ($checktongruong>=$datauser['tongruong']) {
echo'<script>alert("Rương của bạn đã đầy, vui lòng nâng cấp thêm!!");</script>';
	} else 

if ($info['manh']<=$mtp['soluong']){
       		    echo'<div style="border: 1px solid #EAF6FC;background-color: #EAF6FC;margin:0px 0;padding:5px;border-radius:5px;width:auto;height:auto;">
<font size="1" color="white" style="text-shadow: 0 0 0.2em #9932CC, 0 0 0.2em #9932CC,  0 0 0.2em #9932CC"><b>
Bạn đã đổi thành công '.$shop['tenvatpham'].' !!
</b></font></div>';
mysql_query("INSERT INTO `khodo` SET `user_id`='".$user_id."', `id_shop`='".$shop['id']."', `loai`='".$shop['loai']."', `id_loai`='".$shop['id_loai']."', `tenvatpham` = '".$shop['tenvatpham']."', `timesudung`='".$shop['timesudung']."'");
    mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$info['manh']."' WHERE `user_id`='".$user_id."' AND `id_shop`='313'");

} else {
    		    echo'<div style="border: 1px solid #EAF6FC;background-color: #EAF6FC;margin:0px 0;padding:5px;border-radius:5px;width:auto;height:auto;">
<font size="1" color="white" style="text-shadow: 0 0 0.2em #9932CC, 0 0 0.2em #9932CC,  0 0 0.2em #9932CC"><b>
Bạn cần '.$info['manh'].' Mảnh trang phục mới có thể đổi '.$shop['tenvatpham'].'!!
</b></font></div>'; 
}
    


}


//


?>