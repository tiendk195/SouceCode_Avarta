<?php
 define('_IN_JOHNCMS', 1);
 require_once('../incfiles/core.php'); 
$textl = 'Quả Trứng';
 require_once('../incfiles/head.php');
 echo '<div class="phdr">Quả Trứng!</div>';
 $ducnghia=mysql_fetch_array(mysql_query("SELECT * FROM `wboss` WHERE `id`='3'"));


 if ($ducnghia['hp'] >= 1) {
header('Location: /detu/danh.php');
} else


 echo '<div class="omenu"><font color="blue"><b><img src="http://tuoitre4u.xyz/game/img/rong/trung.gif">Oe Oe Oe ! Oe Oe Oe !</b></font>';
 if ($ducnghia['hp'] <= 0) {
      if ($datauser['khac'] <= 0) {

if(isset($_POST['submit'])) {
 $exp = rand(100000000,500000000);
  $lathinh = rand(1,10); 
$ngay=rand(1,1);
$time=$ngay*24*3600+time();
echo '</br><font color="red">Con Đây nè Sưu Phụ</font>';
mysql_query("INSERT INTO `tuipkm` SET `user_id`='" . $user_id. "',
`hp`='3500',`sm`='2500',`time`='1501856541',`img`='http://tuoitre4u.xyz/detu/img/trai.png',`name`='boy'
,`hpfull`='3500',`idpkm`='{$id}'");
mysql_query("UPDATE `users` SET `khac`='1' ,`xu`=`xu`- '1000' WHERE `id`='{$user_id}'");

							$bot='Chúc Mừng [b]'.$datauser[name].'[/b] vừa nhặt được Quả Trứng!';
mysql_query("INSERT INTO `guest` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
mysql_query("UPDATE `wboss` SET `hp`= '99999999' WHERE `id`='3' LIMIT 1");


}
 echo '<form method="post"><input type="submit" name="submit" value="Mở" /></form> ';
      }
else 
{
 echo '</br><b><font color="red">Lỗi </font> Bạn đã có đệ rồi</b>'; 
}
}
echo '</div>';
 require_once('../incfiles/end.php');
 ?>