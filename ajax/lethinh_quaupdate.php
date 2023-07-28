<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');



if (isset($_POST['quaupdate'])) {
   if ($datauser['quaupdate']==0) {

$vequay = rand(1,5);
mysql_query("UPDATE `users` SET `xu` = `xu` + '1000000',`luong`=`luong`+'100',`quaupdate` = '1',`vequaybv`=`vequaybv`+'".$vequay."' WHERE `id` = '".$user_id."'");
echo '<div class="omenu"><font color="red">Bạn nhận được 1 Capsule kì bí, 1.000.000 xu, 100 lượng, '.$vequay.' vé quay kho báu từ hộp quà update</font></div>';
                   mysql_query("UPDATE `vatpham` SET `soluong` = '1',`dakhoa` = '1' WHERE `id_shop` = '66' AND `user_id`='".$user_id."'");

}
 else {
     echo'<div class="omenu">Lỗi bạn đã nhận quà rồi </div>';
 }

}