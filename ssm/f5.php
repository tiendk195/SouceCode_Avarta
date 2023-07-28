<?php

define('_IN_JOHNCMS', 1);

require_once ("../incfiles/core.php");



$p=mysql_query("SELECT * FROM `ssm_user` WHERE `user_id`='".$user_id."'");
$p2= mysql_fetch_array(mysql_query("SELECT * FROM `ssm_user` where   `user_id`='".$user_id."'"));
$res=mysql_query("SELECT * FROM `ssm_nhiemvu_user` WHERE `user_id`='".$user_id."' ORDER BY `id` ");

while($ssm=mysql_fetch_array($res)) {
    if ($ssm['ngaynv'] == $p2['ngaynv'] AND $ssm['kichhoat']==0  ){
            $timekt=time() + 3600 * 24 * 7;

         	 	 mysql_query("UPDATE `ssm_nhiemvu_user` SET `kichhoat`='1' ,`timeketthuc`= '{$timekt}' WHERE `user_id`='{$user_id}'AND `ngaynv` = '".$ssm['ngaynv']."' ");
    } 
}


$res=mysql_query("SELECT * FROM `ssm_nhiemvu_user` WHERE `user_id`='".$user_id."' ORDER BY `id` ");

while($ssm=mysql_fetch_array($res)) {
      if (time()>=$ssm['timeketthuc']) {

         	 	 mysql_query("UPDATE `ssm_nhiemvu_user` SET `kichhoat`='0' ,`timeketthuc`= '0' WHERE `id`='{$ssm['id']}' ");
    } 
}



while($s=mysql_fetch_array($p)) {
if ($s['exp']>=50 AND $s['level']<40 ){


    	 	 mysql_query("UPDATE `ssm_user` SET `level`= `level` + '1',`exp`=`exp`-'50' WHERE `user_id`='{$user_id}'");
        		    echo'<script>alert("Chúc mừng bạn đã đạt Level '.($s['level']+1).' trong SSM!!");</script>';


    
}
if ($s['level']>=40 ){
      	 	 mysql_query("UPDATE `ssm_user` SET `level`= '40',`exp`='0' WHERE `user_id`='{$user_id}'");
  
}

}
///Nhiệm vụ SSM

$res2=mysql_query("SELECT * FROM `ssm_nhiemvu_user` WHERE `user_id`='".$user_id."' AND `kichhoat`='1' ORDER BY `id` ");

while($ssm=mysql_fetch_array($res2)) {
    $ssm2 = mysql_fetch_array(mysql_query("SELECT * FROM `ssm_nhiemvu` WHERE `id`='{$ssm['id_shop']}'"));
    if ($ssm2['loai']=='sucmanh'){
            mysql_query("UPDATE `ssm_nhiemvu_user` SET `tiendo`='{$datauser['sucmanh']}' WHERE `user_id`='{$user_id}' AND `id` = '{$ssm['id']}' ");
    }
        if ($ssm2['loai']=='hp'){
            mysql_query("UPDATE `ssm_nhiemvu_user` SET `tiendo`='{$datauser['hpfull']}' WHERE `user_id`='{$user_id}' AND `id` = '{$ssm['id']}' ");
    
    
        }
            if ($ssm2['loai']=='xu'){
            mysql_query("UPDATE `ssm_nhiemvu_user` SET `tiendo`='{$datauser['xu']}' WHERE `user_id`='{$user_id}' AND `id` = '{$ssm['id']}' ");
    
    
        }
            if ($ssm2['loai']=='luongkhoa'){
            mysql_query("UPDATE `ssm_nhiemvu_user` SET `tiendo`='{$datauser['luongkhoa']}' WHERE `user_id`='{$user_id}' AND `id` = '{$ssm['id']}' ");
    
    
        }
    
}
 //Nhiệm vụ SSM 

?>