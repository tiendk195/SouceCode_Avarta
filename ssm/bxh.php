<?php
define('_IN_JOHNCMS', 1);
$headmod = 'mod';
$bhead = 2;

require('../incfiles/core.php');
if(!$user_id){
require('../incfiles/head.php');
echo functions::display_error($lng['access_guest_forbidden']);
require('../incfiles/end.php');
exit;
}
require('../incfiles/head.php');
echo'<div class="nenvip">Bảng xếp hạng SSM S1</div>';

$p=mysql_fetch_array(mysql_query("SELECT * FROM `ssm_user` WHERE `user_id`='".$user_id."'"));

$vnviet= mysql_query("SELECT * FROM ssm_user WHERE `level`=`level` >= 0 AND `kichhoat` ='1' AND `user_id`!=2  AND `user_id`!=1 AND `user_id`!=256  ORDER BY `level` DESC LIMIT 3");
$i=1;
while
($res=mysql_fetch_array($vnviet)) {
    $p=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$res['user_id']."'"));

echo'<div class="gd_"><table width="100%" border="0" cellspacing="0">
<tbody><tr><td width="40%"><div class="pmenu">';
if ($i == 1){
echo'
<img src="https://i.imgur.com/7X0RBwO.png align=" left"="">';
}
if ($i == 2){
echo'
<img src="https://i.imgur.com/tkrBSeq.png align=" left"="">';
}
if ($i == 3){
echo'
<img src="https://i.imgur.com/pLiJHlM.png align=" left"="">';
}

echo'
<center><a href="/member/'. $p['id'].'.html">   '.nick( $p['id']).'</a><br>';
if ($i==1){
echo'
<img src="https://i.imgur.com/VCVU0En.gif">';
} 
if ($i==2){
echo'
<img src="https://i.imgur.com/DjGfwr4.gif">';
} 
if ($i==3){
echo'
<img src="https://i.imgur.com/75AqX5s.gif">';
} 

echo'<img src="/avatar/'. $p['id'].'.png" style="position: absolute;verticalalign: 0 px;margin:5px 0 0 -50px;"></center></div></td>
<td width="60%"><div class="pmenu"><center>Level SSM: '.number_format($res['level']).'  </center></div></td></tr></tbody></table></div>';
$i++;

}


require('../incfiles/end.php');
?>
