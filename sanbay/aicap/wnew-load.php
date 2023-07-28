<?PHP
Define('_IN_JOHNCMS', 1);
$rootpath='../../';
require_once ("../../incfiles/core.php");
if (!$user_id){
Header("Location: /");
exit;
}






 
   if ($datauser['zombie']==1){

echo'<div class="omenu" style="border:1px solid #3883CC;"><center><font color="red">Bạn đã biến thành Zombie. Hãy lây nhiễm cho người khác để trở thành người</center></div>';
}
$vtt = mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id` = '".$user_id."' AND `id_shop`='259' LIMIT 1"));
$time=$vtt['timesudung']-time();
echo'<div class="omenu" style="border:1px solid #3883CC;"><center><font color="red">Mê cung sẽ đóng cửa sau '.$time.' giây </center></div>';
