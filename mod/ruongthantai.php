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
$textl ='Rương Thần Tài';
require('../incfiles/head.php');


echo'<div class="phdr"><a href="ruongthantai.php">Rương Thần Tài</a></div>';
switch($act) {
default:


echo'<div class="omenu"><center><b><img src="/avatar/1.png"></b><br>Chức Năng Rương Thần Tài Nhận Những Món Đồ Cực HOT Chưa Từng Xuất Hiện!<font color="blue"><br> </font>';
echo'<font color="green">'.$datauser['phongbaodo'].' <img src="https://i.imgur.com/BIl190L.png">||
'.$datauser['nhanhhoavang'].'<img src="https://i.imgur.com/ifXCsww.png">||
'.$datauser['canhdaohong'].' <img src="https://i.imgur.com/62jIi4t.png"></font></center>
<center><b><font color="red">'.$datauser['ruongthantai'].' <img src="https://i.imgur.com/gh0mMAp.png"></font></b></center></div>
<table align="center" border="3" style="width:100%">
	<tbody>
		<tr>
			<th>
			<p><img src="https://i.imgur.com/BIl190L.png"> Phong bao đỏ</p>
			</th>
			<th>
			<p><img src="https://i.imgur.com/ifXCsww.png"> Nhánh mai vàng</p>
			</th>
			<th>
			<p><img src="https://i.imgur.com/62jIi4t.png"> Cành đào hồng</p>
			</th>
		</tr>
		<tr>
			<td>Chat <strong>nhanqua</strong> tại Chatbox Nhận 5 Phong Bao(6h/1 Lần)</td>
			<td>Nhận 10 Nhánh Mai Quà 21h Tối hàng ngày tại Chức Năng!</td>
			<td>Báo Danh Hàng Ngày tại NPC.Lái Buôn ở Nông Trại nhận 10 Nhánh Đào</td>
		</tr>
		<tr>
			<td>Hộp Quà 15 phút Tại Trang Chủ <img src="/icon/qua.png"> Nhận 1 Phong Bao</td>
			<td>Nhận Quà Online 15 phút Tại Trang Chủ (1 Nhánh Mai)</td>
			<td>Câu Cá Tại Khu Sinh Thái Tỉ Lệ Rất Thấp(1 Nhánh Đào)</td>
		</tr>

		
	</tbody>
</table>';
echo'
<div class="omenu"><center><b><a href="?act=ghepruong"><font color="red">Ghép Rương Thần Tài</font></a></b></center></div>
<div class="omenu"><center><b><a href="doiruong.php"><font color="red">Đổi Rương Thần Tài</font></a></b></center></div>';
break;

case 'ghepruong':
if(isset($_POST['doi'])) {
	if($datauser['phongbaodo'] >=500 and $datauser['nhanhhoavang'] >=500 and $datauser['canhdaohong'] >=500 ) {
echo'<center><b><div class="omenu">Ghép thành công</b></center>';

mysql_query("UPDATE `users` SET `phongbaodo`=`phongbaodo`-'500', `nhanhhoavang`=`nhanhhoavang`-'500', `canhdaohong`=`canhdaohong`-'500',



`ruongthantai`=`ruongthantai` +'1' WHERE `id`='".$user_id."'");


	} else {
		echo'<center><b><div class="omenu">Bạn chưa đủ nguyên liệu</b></center>';

}
}
echo'<center><form method="post"><div class="omenu"> Bạn muốn ghép 1 <img src="https://i.imgur.com/gh0mMAp.png"> Rương Thần Tài với:<br>500 Phong Bao,500 Nhánh Mai,500 Nhánh Đào Không ? <br> <input type="submit" name="doi" value="Ghép Ngay"></div></form></center>';
break;



}
require('../incfiles/end.php');
?>