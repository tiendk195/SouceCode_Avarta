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
$textl = 'Khu Sự Kiện';
require('../incfiles/head.php');
echo'<div class="phdr">'.$textl.'</div>';
echo'<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Hiện tại không có sự kiện nào đang diễn ra</div>';
//header('Location: pokemon');


require('../incfiles/end.php');
?>