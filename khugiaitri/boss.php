<?php
define('_IN_JOHNCMS', 1);
require ('../incfiles/core.php');
$textl = 'Đánh Boss Thế Giới';
require ('../incfiles/head.php');
if (!$user_id) {
header('Location: '.$home.'');
require('../incfiles/end.php');
exit;
} else {

?>
<div class="phdr">Đánh Boss Thế Giới</div>
<div class="omenu"><a href="/app/wboss.php"><img src="/icon/vao.png"> Boss Naruto</a> Cùng nhau đánh bại boss và nhận đá ngũ sắc và item giá trị.</div>
<div class="omenu"><a href="/nhom/boss"><img src="/icon/vao.png"> Boss Clan</a> Cùng nhau đánh bại boss và nhận đá ngũ sắc.</div>
<div class="omenu"><a href="wboss.php"><img src="/icon/vao.png"> Boss Super Broly</a> Săn xu lượng, những item có giá trị khác.</div>
<div class="omenu"><a href="/boss"><img src="/icon/vao.png"> Boss Thế Giới</a> Tạo phòng và cùng nhau đánh boss nhé !!</div>
<div class="omenu"><a href="/bossthegioi/npc.php"><img src="/icon/vao.png"> Boss Thế Giới 2</a> Săn đá ngũ sắc tại đây!!</div>

<?php

}
require ('../incfiles/end.php');