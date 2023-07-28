<?php
define('_IN_JOHNCMS', 1);
require_once('../incfiles/core.php');
$textl = 'Đấu boss';
require('../incfiles/head.php');
echo '
<div class="phdr">Đấu boss</div>
<div class="gmenu">';
mysql_query("UPDATE `gamemini_boss_name` SET `xu`='10000',
`luong`='5' WHERE `id`='1'");
mysql_query("UPDATE `gamemini_boss_name` SET `xu`='20000',
`luong`='10' WHERE `id`='2'");
mysql_query("UPDATE `gamemini_boss_name` SET `xu`='30000',
`luong`='15' WHERE `id`='3'");
mysql_query("UPDATE `gamemini_boss_name` SET `xu`='40000',
`luong`='20' WHERE `id`='4'");
mysql_query("UPDATE `gamemini_boss_name` SET `xu`='50000',
`luong`='25' WHERE `id`='5'");
mysql_query("UPDATE `gamemini_boss_name` SET `xu`='60000',
`luong`='50' WHERE `id`='6'");
if($user_id){
$kiemtrachuphong = mysql_result(mysql_query("SELECT COUNT(*) FROM `gamemini_boss_phong` WHERE `chuphong` = '$user_id'"), 0);
$kiemnguoichoi1 = mysql_result(mysql_query("SELECT COUNT(*) FROM `gamemini_boss_phong` WHERE `nguoichoi1` = '$user_id'"), 0);
$kiemnguoichoi2 = mysql_result(mysql_query("SELECT COUNT(*) FROM `gamemini_boss_phong` WHERE `nguoichoi2` = '$user_id'"), 0);
$kiemnguoichoi3 = mysql_result(mysql_query("SELECT COUNT(*) FROM `gamemini_boss_phong` WHERE `nguoichoi3` = '$user_id'"), 0);
if($kiemtrachuphong == 0 && $kiemnguoichoi1 == 0 && $kiemnguoichoi2 == 0 && $kiemnguoichoi3 == 0){
	
echo '<div class="omenu"><a  href="taophong.php"><input type="button" value="Tạo phòng" class="nut"></input></a></div>
';
echo '<div class="omenu">- HP full của bạn: '.$datauser['hpfull'].'<br/>- Sức mạnh của bạn: <b>'.$datauser['hp'].'</b><br/><b>Gợi ý: </b>Chat ở phòng chat nghi <b>PBoss số phòng</b> ví dụ <b>PBoss 112</b> để mời m.n vào phòng của mình!</div>';
}
$kiemchuphong = mysql_fetch_array(mysql_query("SELECT * FROM `gamemini_boss_phong` WHERE `chuphong` = '$user_id'"));
$kiemnguoichoi1 = mysql_fetch_array(mysql_query("SELECT * FROM `gamemini_boss_phong` WHERE `nguoichoi1` = '$user_id'"));
$kiemnguoichoi2 = mysql_fetch_array(mysql_query("SELECT * FROM `gamemini_boss_phong` WHERE `nguoichoi2` = '$user_id'"));
$kiemnguoichoi3 = mysql_fetch_array(mysql_query("SELECT * FROM `gamemini_boss_phong` WHERE `nguoichoi3` = '$user_id'"));
	
	if($kiemchuphong != ""){
	echo '<div class="omenu">';
	echo '<a href="phong.php?id='.$kiemchuphong['id'].'">Bạn là chủ phòng mà chạy đi đâu thế vào trận cùng với mọi người đi kìa</a>';
		echo '</div>';
	}
	if($kiemnguoichoi1 != ""){
	echo '<div class="omenu">';
	echo '<a href="phong.php?id='.$kiemnguoichoi1['id'].'">Đang trong trận đấu bạn đi đâu đó</a>';
		echo '</div>';
	}
	if($kiemnguoichoi2 != ""){
	echo '<div class="omenu">';
	echo '<a href="phong.php?id='.$kiemnguoichoi2['id'].'">Đang trong trận đấu bạn đi đâu đó</a>';
		echo '</div>';
	}
	if($kiemnguoichoi3 != ""){
	echo '<div class="omenu">';
	echo '<a href="phong.php?id='.$kiemnguoichoi3['id'].'">Đang trong trận đấu bạn đi đâu đó</a>';
		echo '</div>';
	}
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `gamemini_boss_phong`"), 0);
$res = mysql_query("SELECT * FROM `gamemini_boss_phong` WHERE `id` ORDER BY `id` DESC LIMIT $start, $kmess");
echo '<div class="omenu">Hiện đang có '.$tong.' phòng đang diễn ra hoạt động</div>';
while($post = mysql_fetch_array($res)){
	$timkiemboss = mysql_fetch_array(mysql_query("SELECT * FROM `gamemini_boss_name` WHERE `id` = '$post[loaiboss]' LIMIT 1"));
	$timkiemchuphong = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '$post[chuphong]' LIMIT 1"));
	echo '
	<div class="omenu">
	<b>[ <a href="phong.php?id='.$post['id'].'">Phòng Số '.$post['id'].' </a> ]</b><br/>
	→ Boss: <img src="img/'.$timkiemboss[id].'.png"><b>'.$timkiemboss[name].'</b><br>
	→ Chủ Phòng: ';
	if($post[chuphong] != 0){
	echo '<a href="/users/'.$timkiemchuphong[name].'_'.$timkiemchuphong[id].'.html"><b>'.$timkiemchuphong[name].'</b></a><br/>';
	}else{
	echo '<b>Đã Thoát</b>';
	}
	$sm_chuphong = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '$post[chuphong]' LIMIT 1"));
	$sm_nguoichoi1 = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '$post[nguoichoi1]' LIMIT 1"));
	$sm_nguoichoi2 = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '$post[nguoichoi2]' LIMIT 1"));
	$sm_nguoichoi3 = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '$post[nguoichoi3]' LIMIT 1"));
	if($post[sansang] == 0){
	if($post[nguoichoi1] != 0 && $post[nguoichoi2] != 0 && $post[nguoichoi3] != 0){
		echo '<div style="color: red;"><b>Phòng đã đầy</b></div>';
	}else{
		echo '<div style="color: green;"><b>Còn [ ';
		if($post[nguoichoi1] == 0 && $post[nguoichoi2] != 0 && $post[nguoichoi3] != 0)
			echo '1';
		if($post[nguoichoi1] != 0 && $post[nguoichoi2] == 0 && $post[nguoichoi3] != 0)
			echo '1';
		if($post[nguoichoi1] != 0 && $post[nguoichoi2] != 0 && $post[nguoichoi3] == 0)
			echo '1';
		if($post[nguoichoi1] == 0 && $post[nguoichoi2] == 0 && $post[nguoichoi3] != 0)
			echo '2';
		if($post[nguoichoi1] == 0 && $post[nguoichoi2] != 0 && $post[nguoichoi3] == 0)
			echo '2';
		if($post[nguoichoi1] != 0 && $post[nguoichoi2] == 0 && $post[nguoichoi3] == 0)
			echo '2';
		if($post[nguoichoi1] == 0 && $post[nguoichoi2] == 0 && $post[nguoichoi3] == 0)
			echo '3';
		
		echo ' ] chỗ trống</b></div>';
	}
	}elseif($post[sucmanh_boss] <= 0){
		echo '<div style="color: blue;"><b>Đã giành thắng lợi</b></div>';
	}elseif($sm_chuphong[sucmanh2] <= 100 && $sm_nguoichoi1[sucmanh2] <= 100 && $sm_nguoichoi2[sucmanh2] <= 100 && $sm_nguoichoi1[sucmanh2] <= 100){
		echo '<div style="color: red;"><b>Thất bại thảm hại</b></div>';
	}else{
	echo '<div style="color: green;"><b>Trận đấu đang diễn ra</b></div>';
	}
	$tinhtimephong = $post[time_tao]+14400;
	if($tinhtimephong <= time()){
			mysql_query("DELETE FROM `gamemini_boss_phong` WHERE `id` = '$post[id]' LIMIT 1");
			mysql_query("DELETE FROM `gamemini_boss_trandanh` WHERE `sophong` = '$post[id]' LIMIT 1");
			mysql_query("DELETE FROM `gamemini_boss_tb` WHERE `sophong` = '$post[id]'");
	}
	echo '</div>';
}
if ($tong > $kmess){ //Phân Trang
echo '<div class="trang">' . functions::display_pagination('?', $start, $tong, $kmess) . '</div>';
}
echo'
<div class="omenu"><a href="hoiphuc.php"><img src="/congvien/ya.gif"></a>

</div>';
echo '<div class="phdr">Bản quyền by Lethinh<b></b></div></div>';


}else{
	echo '<div class="list1">- Hãy đăng nhập để sử dụng chức năng này nhé!</div>';
}
require('../incfiles/end.php');
?>