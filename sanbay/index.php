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
$textl = 'Sân Bay';
require('../incfiles/head.php');
echo'<div class="phdr">Sân Bay</div>';
echo'<center><img src="/icon/npc1.png"><br><font color="black"><b> Xin chào quý khách đến với chuyến bay 1 đi không trở lại <img src="/images/smileys/simply/3.png"></b></font></center>';
echo'<div class="omenu"><a href="/sanbay/aicap"><b><font color="003366"><img src="/icon/vao.png"> Ai Cập <img src="/images/hot.gif"></font></b></a></div>';
echo'<div class="omenu"><a href="/hawaii"><b><font color="003366"><img src="/icon/vao.png"> Đảo Hawaii</font></b></a></div>';
echo'<div class="omenu"><a href="vqbd"><b><font color="003366"><img src="/icon/vao.png"> Vương quốc bóng đêm</font></b></a></div>';
echo'<div class="omenu"><a href="/bossthegioi/npc.php"><b><font color="003366"><img src="/icon/vao.png"> Boss Thế Giới </font></b></a></div>';
echo'<div class="omenu"><a href="/congvien/khucogiao/tienganh.php"><b><font color="003366"><img src="/icon/vao.png"> Khu Cô Giáo</font></b></a></div>';
echo'<div class="omenu"><a href="/sanbay/house"><b><font color="003366"><img src="/icon/vao.png"> Khu Dân Cư</font></b></a></div>';






echo'</td></tr></tbody></table></td></tr></tbody></table>';
require('../incfiles/end.php');
?>