<?php
if(isset($_GET['xem'])) {
echo'<div class="main-xmenu">';
echo'<div class="phdr"><center>Nông Trại</center></div>';
if (!$user_id){
echo'<div class="menu">Bạn phải đăng nhập để chơi game này nhé !</div>';
echo'</div>';
require('../incfiles/end.php');
exit;
}
echo'<style>body{min-width: 500px}</style>';
date_default_timezone_set('Asia/Ho_Chi_Minh');
$kiemtra = date("H");
echo'<div class="cola" style="padding: 0;margin-bottom: 2px;margin-top: 3px;">'.($kiemtra >= 6 && $kiemtra <= 18? '<div class="nennongtrai"><marquee behavior="scroll" direction="left" scrollamount="1" style="margin-top: 5px"><img src="/icon/iconxoan/dammaynho.png"></marquee><marquee behavior="scroll" direction="left" scrollamount="2" style="margin-top: 10px"><img src="/icon/iconxoan/dammaylon.png"></marquee>' :'<div class="nennongtrai_toi">').'</div>';
echo'<div style="margin-top: -70px;text-align: center;">';
echo'<a href="/farm/"><img src="icon/farm.png"></a><a href="/atm/"><img src="icon/atm.png"></a>';
echo'<a href="/farm/shop.php"><img src="../icon/cuahangfarm.png"></a></div>';
echo'<div class="dat">';
echo'<div class="dat">';



echo'<a href="laibuon.php"><img src="icon/laibuon.gif" style="position: absolute;vertical-align: 0px;margin:-45px 0 0 30px;"></a>';
echo'<a href="bangxephang"><img src="icon/bxh.png" style="position: absolute;vertical-align: 0px;margin:-40px 0 0 420px;"></a>';
echo'<a href="/event/trungthu/chucuoi.php"><img src="https://i.imgur.com/RuZLhue.png" style="position: absolute;vertical-align: 0px;margin:-45px 0 0 100px;"></a>';


echo'<center>';

echo '<a href="../member/' . $datauser['id'] . '.html"><img src="/avatar/' . $datauser['id'] . '.png"></a>';

echo'</center>';
echo '<div class="co1"></div><marquee behavior="scroll" direction="left" scrollamount="10"><a href="/"/><img src="/icon/xebuyt.png"></a></marquee>';
echo'</div>';
echo'</div>';
echo'</div>';
echo'</div>';
require('../incfiles/end.php');
exit;
}

?>