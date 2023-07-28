<?php
define('_IN_JOHNCMS',1);
$rootpath='../../';

require('../../incfiles/core.php');
$textl=' Vương Quốc Bóng Đêm';
require('../../incfiles/head.php');
if (!$user_id) {
header('Location: /login.php');
exit;
}
?>
<style>
.hangrao {
background: url('/img/hangrao.png');
padding: 30px;
max-width: 100%;
margin: auto;
}
.nenboss{
background: url('https://i.imgur.com/pcksvNJ.png');
text-align: center;
}
</style>
<?php
echo '<div class="phdr"> Vương Quốc Bóng Đêm</div>';
echo'<div class="hangrao"></div>';
echo'<div class="nenboss">
<img src="img/daulau.png">
<a href="phuthuybongdem"><img src="img/zombie.png"></a>
<img src="img/cot-den.png">
<a href="cuahang.php"><img src="img/shop.png"></a>
<img src="img/cot-den.png"><a href="drdoom.html"><img src="img/drdoom.gif"></a>
<a href="/phuthuybongdem"><img src="img/phuthuy.gif"></a>
</div>';


require('../../incfiles/end.php');
?>