<?php

define('_IN_JOHNCMS', 1);

require_once ("../incfiles/core.php");
date_default_timezone_set('Asia/Ho_Chi_Minh');


$p=mysql_fetch_array(mysql_query("SELECT * FROM `ssm_user` WHERE `user_id`='".$user_id."'"));

$res=mysql_query("SELECT * FROM `ssm_nhiemvu_user` WHERE `user_id`='".$user_id."' ORDER BY `id` ");

while($ssm=mysql_fetch_array($res)) {
    $ssm2 = mysql_fetch_array(mysql_query("SELECT * FROM `ssm_nhiemvu` WHERE `id`='{$ssm['id_shop']}'"));
    if ($ssm2['loai']=='sucmanh'){
              if ($datauser['sucmanh'] >= $ssm2['hoanthanh'] ){
            mysql_query("UPDATE `ssm_nhiemvu_user` SET `tiendo`='{$datauser['sucmanh']}' WHERE `user_id`='{$user_id}' AND `id` = '{$ssm['id']}' ");
    }
        if ($ssm2['loai']=='hp'){
              if ($datauser['hp'] >= $ssm2['hoanthanh'] ){
            mysql_query("UPDATE `ssm_nhiemvu_user` SET `tiendo`='{$datauser['hp']}' WHERE `user_id`='{$user_id}' AND `id` = '{$ssm['id']}' ");
    }
    
        }
    }
}
  








?>