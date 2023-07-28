<?php

define('_IN_JOHNCMS', 1);

require_once ("../incfiles/core.php");

$vatpham = $id;
if(empty($vatpham)){
                		    echo'<script>alert("Vật phẩm không tồn tại!!");</script>';
exit;
    
}
$check = mysql_num_rows(mysql_query("SELECT * FROM `ssm_quathuong` WHERE `id`='".$vatpham."'"));
if($check < 1){
                		    echo'<script>alert("Vật phẩm không tồn tại!!");</script>';
                		    exit;
}
$tt=mysql_fetch_array(mysql_query("SELECT * FROM `ssm_user` WHERE `user_id`='".$user_id."'"));

if ($tt['level']<$vatpham ){
        echo'<script>alert("Bạn chưa đủ điều kiện để nhận!!");</script>';
                		    exit;
    
}
$tt2=mysql_fetch_array(mysql_query("SELECT * FROM `ssm_thuong_user` WHERE `user_id`='".$user_id."' AND `level` = '".$vatpham."' "));
if ($tt2['nhanthuong']==1 ){
    
                   		    echo'<script>alert("Bạn đã nhận thưởng quà này rồi!!");</script>';
                		    exit;
} 


$p=mysql_fetch_array(mysql_query("SELECT * FROM `ssm_quathuong` WHERE `id`='".$vatpham."'"));
if ($p['id_loai']!='0'){
if ($p['loai']=='vatpham'){
$ssm=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE `id`='".$p['id_loai']."'"));

	 	 mysql_query("UPDATE `ssm_thuong_user` SET `nhanthuong`= '1' WHERE `user_id`='{$user_id}' AND `level`='{$p['id']}' ");

	 	 mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+ '{$p['soluong']}' WHERE `user_id`='{$user_id}' AND `id_shop`='{$p['id_loai']}' ");
	 	                 		    echo'<script>alert("Nhận thành công '.$p['soluong'].' '.$ssm['tenvatpham'].' ");</script>';



} 
if ($p['loai']=='do'){
        $tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."'");
$checktongruong=mysql_num_rows($tongruong);
	if ($checktongruong>=$datauser['tongruong']) {
	 	                 		    echo'<script>alert("Rương của bạn đã đầy, vui lòng nâng cấp thêm ");</script>';
exit;	 	                 		    
}
  $ssm=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$p['id_loai']."'"));


	 	 mysql_query("UPDATE `ssm_thuong_user` SET `nhanthuong`= '1' WHERE `user_id`='{$user_id}' AND `level`='{$p['id']}' ");

mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='{$p['id_loai']}', 
 `loai`='{$ssm['loai']}',
 `id_loai`='{$ssm['id_loai']}',
 `tenvatpham` = '{$ssm['tenvatpham']}', 
 `timesudung`='0'");
	 	                 		    echo'<script>alert("Nhận thành công '.$ssm['tenvatpham'].' ");</script>';

}  
} else {
  	 	                 		    echo'<script>alert("Lỗi hệ thống!!");</script>';
  
}












?>