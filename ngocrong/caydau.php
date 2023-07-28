<?php
define('_IN_JOHNCMS',1);

require('../incfiles/core.php');

$textl='Làng Ngọc Rồng';



    
    $dau=$datauser['leveldauthan']*10;
$timesd=(time()+5*60);

if(time() < $datauser['timethuhoachcaydau']){
echo'<script>alert("Còn '.thoigiantinh(floor($datauser['timethuhoachcaydau'])).' để thu hoạch tiếp tục!");</script>';

}else{
    //Nhiệm vụ SSM
    $res2=mysql_query("SELECT * FROM `ssm_nhiemvu_user` WHERE `user_id`='".$user_id."' AND `kichhoat`='1' ORDER BY `id` ");

while($ssm=mysql_fetch_array($res2)) {
    $ssm2 = mysql_fetch_array(mysql_query("SELECT * FROM `ssm_nhiemvu` WHERE `id`='{$ssm['id_shop']}'"));
    if ($ssm2['loai']=='dauthan'){
            mysql_query("UPDATE `ssm_nhiemvu_user` SET `tiendo`= `tiendo` + '1' WHERE `user_id`='{$user_id}' AND `id` = '{$ssm['id']}' ");
    }
}
//Nhiệm vụ SSM
///ngoc rong
   
    $randnr=rand(1,10);
    
    if ($randnr==1){
       echo'<script>alert("Bạn nhận được ngọc rồng 6 sao");</script>';
     mysql_query("UPDATE `vatpham` SET `soluong`=`soluong` +'1' WHERE `user_id`='{$user_id}' AND `id_shop`='274'");
}
//ngoc rong

mysql_query("UPDATE `users` SET  `timethuhoachcaydau`={$timesd} WHERE `id`='".$user_id."'");
 mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$dau."' WHERE `user_id`='".$user_id."' AND `id_shop` = '276'");
echo'<script>alert("Bạn đã thu hoạch '.$dau.' đậu thành công");</script>';
?>
<script>
   window.location="index.php";</script> 
</script>
<?php
$randsn=rand(1,10);
		if ($randsn==1){
		    echo'<script>alert("Bạn nhận được 1 viên 5 sao");</script>';


 mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '273'");

	}
}





