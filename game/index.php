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
$textl = 'Games';
require('../incfiles/head.php');
echo'<div class="phdr">Game web</div>';
echo'<div class="omenu"><a href="banca/index.html"><img src="/icon/vao.png"> Bắn cá </a></div>';
echo'<div class="omenu"><a href="2048/index.html"><img src="/icon/vao.png"> 2048 </a></div>';
echo'<div class="omenu"><a href="monster/index.html"><img src="/icon/vao.png"> Nhặt kẹo </a></div>';
echo'<div class="omenu"><a href="tower/index.html"><img src="/icon/vao.png"> Xây tháp </a></div>';
echo'<div class="phdr">Game giải trí</div>';
?>
<div class="omenu"><a href="/game/taixiu.php"><img src="/icon/vao.png"> Tài Xỉu <img src="/images/hot.gif"></a></div>
<div class="omenu"><a href="/khugiaitri/danhde.php"><img src="/icon/vao.png"> Đánh Đề </a></div>
<div class="omenu"><a href="/khungoaio/bauvat.php"><img src="/icon/vao.png"> Vòng xoay may mắn </a></div>
<div class="omenu"><a href="/avatar/nangcap.php"><img src="/icon/vao.png"> Nâng cấp Avatar </a></div>
<div class="omenu"><a href="/shop/quayso.php"><img src="/icon/vao.png"> Quay số Avatar </a></div>
<div class="omenu"><a href="/game/kethon"><img src="/icon/vao.png"> Kết hôn </a></div>
<div class="omenu"><a href="/game/baucua.php"><img src="/icon/vao.png"> Bầu cua tôm cá </a></div>
<div class="omenu"><a href="/caro"><img src="/icon/vao.png"> Caro Online</a></div>

<div class="omenu"><a href="/khugiaitri/maydotinhyeu.php"><img src="/icon/vao.png"> Máy Đo Tình Yêu </a></div>

<?php

require('../incfiles/end.php');
?>