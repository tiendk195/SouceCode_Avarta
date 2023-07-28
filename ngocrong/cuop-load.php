<?php
/*
Code Được Mod Bởi Lê Văn Thịnh
Code Mod By Lê Văn Thịnh
Vui Lòng Ghi Nguồn Nếu Có Sao Chép! 
*/
define('_IN_JOHNCMS', 1);

require_once ("../incfiles/core.php");


$nr = mysql_fetch_array(mysql_query("SELECT * FROM `ngocrong_uoc` WHERE `time`>'0' "));
 $tr=mysql_query("SELECT * FROM `ngocrong_uoc`");
$checktr=mysql_num_rows($tr);
$users = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$nr['user_id']."' "));

       if (time()>=$nr['time']+5*60) {
            echo'<script>alert("Rồng thần đã hết thời gian!");</script>';
           mysql_query("DELETE FROM `ngocrong_uoc` ");
       } else
    
if ($checktr<1) {
            echo'<script>alert("Lỗi!!");</script>';
} else if ($nr['user_id']==$user_id){
            echo'<script>alert("Lỗi!!");</script>';
} else {
$rand=rand(1,100);
$randngoc=rand(1,7);
if ($randngoc==1){
    $idngoc=269;
}
if ($randngoc==2){
    $idngoc=270;
}if ($randngoc==3){
    $idngoc=271;
}if ($randngoc==4){
    $idngoc=272;
}if ($randngoc==5){
    $idngoc=273;
}if ($randngoc==6){
    $idngoc=274;
}
if ($randngoc==7){
    $idngoc=275;
}
if ($rand==1){
        //Nhiệm vụ SSM
    $res2=mysql_query("SELECT * FROM `ssm_nhiemvu_user` WHERE `user_id`='".$user_id."' AND `kichhoat`='1' ORDER BY `id` ");

while($ssm=mysql_fetch_array($res2)) {
    $ssm2 = mysql_fetch_array(mysql_query("SELECT * FROM `ssm_nhiemvu` WHERE `id`='{$ssm['id_shop']}'"));
    if ($ssm2['loai']=='cuoprong'){
            mysql_query("UPDATE `ssm_nhiemvu_user` SET `tiendo`= `tiendo` + '1' WHERE `user_id`='{$user_id}' AND `id` = '{$ssm['id']}' ");
    }
}
//Nhiệm vụ SSM
                echo'<script>alert("Cướp thành công Rồng thần của '.$users['name'].', bạn nhận được ngọc '.$randngoc.' sao ");</script>';

    $text='Bạn nhận được <b>ngọc rồng '.$randngoc.' sao </b> từ cướp rồng thần của <b>'.$users['name'].'</b>' ;
                mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '".$idngoc."'");

mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
$text = ''.$login.' vừa cướp được ngọc rồng của '.$users['name'].' thành công hahahha';

mysql_query("INSERT INTO `wnew` SET
`user` = '256',
`time` = '".time()."',
`text` = '".$text."'
");
mysql_query("INSERT INTO `guest` SET `user_id`='256', `text`='" . mysql_real_escape_string($text) . "', `time`='".time()."'");
mysql_query("DELETE FROM `ngocrong_uoc` ");


    
} else {
            echo'<script>alert("Cướp thất bại, vui lòng thử lại");</script>';

}
    
    
    


}

?>