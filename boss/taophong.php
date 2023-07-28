<?php
define('_IN_JOHNCMS', 1);
require_once('../incfiles/core.php');
$textl = 'Đấu boss';
require('../incfiles/head.php');
echo '
<div class="phdr">Đấu boss</div>
<div class="gmenu">';
if($user_id){
if(isset($_GET[id])){
	$int = intval($_GET[id]);
	if($datauser['sucmanh'] >= 1000){
	$kiemtratao = mysql_result(mysql_query("SELECT COUNT(*) FROM `gamemini_boss_phong` WHERE `chuphong` = '$user_id'"), 0);
	$kiemtraboss = mysql_fetch_array(mysql_query("SELECT * FROM `gamemini_boss_name` WHERE `id` = '$int'"));
	if($kiemtratao == 0 && $datauser[luutrusm] <= $kiemtraboss[sucmanh]){
	mysql_query("INSERT INTO `gamemini_boss_phong` SET
	`chuphong` = '$user_id',
	`loaiboss` = '$int',
	`sucmanh_boss` = '$kiemtraboss[sucmanh]',
	`kqchuphong` = '1',
	`time_tao` = '".time()."'
	");
	$kiemphong = mysql_fetch_array(mysql_query("SELECT * FROM `gamemini_boss_phong` WHERE `chuphong` = '$user_id'"));
$avatar = '@'.$login.' vừa tạo phòng boss [url='.$home.'/boss/phong.php?id='.$kiemphong['id'].'][b]Bấm Vào Đây[/b][/url] để tham gia';
        $time = time();
        mysql_query("INSERT INTO `guest` SET
            `adm` = '0',
            `time` = '$time',
            `user_id` = '256',
            `name` = 'BOT',
            `text` = '" . mysql_real_escape_string($avatar) . "',
            `ip` = '0000',
            `browser` = 'IPHONE'
        ");
	echo '
	<div class="list4">Tạo phòng thành công</div>
	';
	header('Location: phong.php?id='.$kiemphong[id].'');
	exit;
	}else{
	$kiemphong = mysql_fetch_array(mysql_query("SELECT * FROM `gamemini_boss_phong` WHERE `chuphong` = '$user_id'"));
	echo 'Bạn đã tạo phòng rồi hãy vào phòng của bạn đi, hoặc sức mạnh bạn quá cao không thể đánh nhau với boss này';
	}
	}else{
		echo 'Bạn còn quá yếu không thể tạo được phòng đấu boss';
	}
	echo '</div>';
	require('../incfiles/end.php');
	exit;
}
$kiemtrachuphong = mysql_result(mysql_query("SELECT COUNT(*) FROM `gamemini_boss_phong` WHERE `chuphong` = '$user_id'"), 0);
$kiemnguoichoi1 = mysql_result(mysql_query("SELECT COUNT(*) FROM `gamemini_boss_phong` WHERE `nguoichoi1` = '$user_id'"), 0);
$kiemnguoichoi2 = mysql_result(mysql_query("SELECT COUNT(*) FROM `gamemini_boss_phong` WHERE `nguoichoi2` = '$user_id'"), 0);
$kiemnguoichoi3 = mysql_result(mysql_query("SELECT COUNT(*) FROM `gamemini_boss_phong` WHERE `nguoichoi3` = '$user_id'"), 0);
if($kiemtrachuphong == 0 && $kiemnguoichoi1 == 0 && $kiemnguoichoi2 == 0 && $kiemnguoichoi3 == 0){
$res = mysql_query("SELECT * FROM `gamemini_boss_name` WHERE `id` ORDER BY `id` DESC");
while($post = mysql_fetch_array($res)){
	
	echo '<div class="omenu">
	<table cellpadding="0" cellspacing="0" width="100%" border="0" style="table-layout:fixed;word-wrap: break-word;"><tbody><tr><td align="center" width="90">';
       echo' <center><label style="display: inline-block;text-align: center;"><b style="font-size: 9px;color:red;font-weight:bold;text-align: center;"></b>';
echo'<img src="img/'.$post['id'].'.png"/></td><td>
	Boss: <b>'.$post['name'].'</b><br/>
	Sức mạnh: '.$post['sucmanh'].'<br/>
	Đôi lời: '.$post['thongtin'].'<br/>
	Vật phẩm Khi Thắng: <b>';
	if($post[xu] != 0){
		echo 'Xu ';
	}
	if($post[luong] != 0){
		echo '<span style="color: red"> Lượng </span>';
	}
	if($post[name_id] != 0){
		echo '<span style="color: blue">Vật phẩm</span> ';
	}
	echo '<br/></b>';
	echo '[ <a href="taophong.php?id='.$post[id].'"><b>Tạo Phòng</b></a> ]</td><tr/></table>
	</div>
	';
}
}
echo '<div class="phdr">Bản quyền by Lethinh<b></b></div></div>';
}else{
	echo '<div class="omenu">- Hãy đăng nhập để sử dụng chức năng này nhé!</div>';
}
require('../incfiles/end.php');
?>