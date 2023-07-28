<?php
define('_IN_JOHNCMS',1);	
include('../incfiles/core.php');
$textl='Shop Bang hội';
include('../incfiles/head.php');
echo'<div class="phdr">Shop Bang Hội ';
if($datauser['id']==5 or $user_id==263)
	echo' ||<a href="../panel/clan.php?act=set">Vật phẩm chưa đặt giá</a>';
echo'</div>';
$sql=mysql_query("select * from `nhom` where `user_id`='".$user_id."' limit 1")or die( mysql_error());
if(!mysql_num_rows($sql)){
	echo functions::display_error('Bạn không phải là bang chủ của bất cứ bang nào');
	include('../incfiles/end.php');
	exit;
}
$clan=mysql_fetch_array($sql);
switch($_GET['act']){
	case 'buy':
		if(!$_POST['submit']){
			echo'<div class="menu"><p>Bạn chắc chắn muốn mua vật phẩm này không?</p><p align="center"><form method="post"><input type="submit" value="Xác nhận" name="submit"></form></div>';
			include('../incfiles/end.php');
			exit;
		}
		$id=intval($_GET['id']);
		$sql1=mysql_query("select * from `shop_clan` where `id`='$id' limit 1")or die( mysql_error());
		if(!mysql_num_rows($sql1)){
			echo functions::display_error('Không tìm thấy vật phẩm này!');
			include('../incfiles/end.php');
			exit;
		}
		$vp=mysql_fetch_array($sql1);
		if(($clan['xu']<$vp['xu']) or ($clan['luong']<$vp['luong'])){
			echo functions::display_error('Bang hội không đủ quỹ để mua vật phẩm này');
			include('../incfiles/end.php');
			exit;	
		}
if(($clan['lv']<$vp['lv'])){
			echo functions::display_error('Bang hội không đủ cấp độ để mua vật phẩm này');
			include('../incfiles/end.php');
			exit;	
		}
		$xu=$clan['xu']-$vp['xu'];
		$luong=$clan['luong']-$vp['luong'];
		mysql_query("UPDATE `nhom` SET `xu`='{$xu}'  WHERE `user_id` = '$user_id' LIMIT 1");
                mysql_query("UPDATE `nhom` SET `luong`='{$luong}'  WHERE `user_id` = '$user_id' LIMIT 1");
		mysql_query("insert into `clan_kho` set `clan`='".$clan['id']."',`vp`='".$id."'")or die( mysql_error());
		echo'<div class="label-success">Mua Thành công!!</div>';
	break;
	default:
		$tong=mysql_num_rows(mysql_query("select `id` from `shop_clan` where `xu`>='0' or `luong`>='0' and `hienthi`='1'"));
		if(!$tong){
			echo functions::display_error('Shop Bang hội hiện không có vật phẩm nào');
			include('../incfiles/end.php');
			exit;
			
		}
		$sql2=mysql_query("select * from `shop_clan` where `xu`!='0' or `luong`!='0' and `hienthi`='1' limit $start,$kmess")or die( mysql_error());
		while($a=mysql_fetch_array($sql2)){
			echo'<div class="list1">';
			echo'<p><img src="'.$home.'/vpclan.php?id='.$a['id'].'"> '.$a['name'].'</p>';
			echo'<p>Giá: '.$a['xu'].' xu và '.$a['luong'].' lượng<br>Yêu cầu: level clans >= '.$a['lv'].' level</p>';
			echo'<p><a href="shop.php?act=buy&id='.$a['id'].'"><button>Mua ngay</button></a>';
			echo'</div>';
		}
	if($tong > $kmess)
			echo '<div class="menu">'.functions::display_pagination('shop.php?page=', $start, $tong, $kmess).'</div>';
	break;
}
include('../incfiles/end.php');
?>