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
$textl = 'Trung Tâm Thể Thao';
require('../incfiles/head.php');
echo '<div class="homeforum"><div class="icon-home"><div class="home">Trung Tâm Thể Thao CDIT</div></div></div>';
echo'<div class="phdr">Rèn Luyện Sức Mạnh</div>';
echo'<div class="omenu"><a href="lv1.php"><b><font color="003366"><img src="/icon/vao.png"> Đẩy Tạ 10KG</font></b></a></div>';
echo'<div class="omenu"><a href="lv2.php"><b><font color="003366"><img src="/icon/vao.png"> Đẩy Tạ 20KG</font></b></a></div>';
echo'<div class="omenu"><a href="lv3.php"><b><font color="003366"><img src="/icon/vao.png"> Đẩy Tạ 30KG</font></b></a></div>';
echo'<div class="omenu"><a href="lv4.php"><b><font color="003366"><img src="/icon/vao.png"> Đẩy Tạ 40KG</font></b></a></div>';
echo'<div class="omenu"><a href="lv5.php"><b><font color="003366"><img src="/icon/vao.png"> Đẩy Tạ 50KG</font></b></a></div>';
echo'<div class="omenu"><a href="lv6.php"><b><font color="003366"><img src="/icon/vao.png"> Đẩy Tạ 60KG</font></b></a></div>';
echo'<div class="omenu"><a href="lv7.php"><b><font color="003366"><img src="/icon/vao.png"> Đẩy Tạ 70KG</font></b></a></div>';
echo'<div class="omenu"><a href="lv8.php"><b><font color="003366"><img src="/icon/vao.png"> Đẩy Tạ 80KG</font></b></a></div>';
echo'<div class="omenu"><a href="lv9.php"><b><font color="003366"><img src="/icon/vao.png"> Đẩy Tạ 90KG</font></b></a></div>';
echo'<div class="omenu"><a href="lv10.php"><b><font color="003366"><img src="/icon/vao.png"> Đẩy Tạ 100KG</font></b></a></div>';
echo'<div class="omenu"><a href="lv11.php"><b><font color="003366"><img src="/icon/vao.png"> Đẩy Tạ 110KG</font></b></a></div>';
echo'<div class="omenu"><a href="lv12.php"><b><font color="003366"><img src="/icon/vao.png"> Đẩy Tạ 120KG</font></b></a></div>';
echo'<div class="phdr">Rèn Luyện Sức Khỏe</div>';
//echo'<div class="omenu"><a href="hoiphuc.php"><b><font color="003366"><img src="/icon/vao.png"> Hồi Phục HP</font></b></a></div>';
//echo'<div class="omenu"><a href="nangcap.php"><b><font color="003366"><img src="/icon/vao.png"> Tăng Cường Thể Lực</font></b></a></div>';
echo'</td></tr></tbody></table></td></tr></tbody></table>';
require('../incfiles/end.php');
?>