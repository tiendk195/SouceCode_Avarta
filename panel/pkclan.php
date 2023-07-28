<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');
$textl='Panel clan';
require('../incfiles/head.php');
if($datauser['id']==5 and $user_id!=5){
	require_once($rootpath.'incfiles/head.php');
	echo functions::display_error('Bạn không có quyền để vào đây');
	require_once($rootpath.'incfiles/end.php');
}
switch($_GET['act']){
	case'set':
		if(isset($_GET['id'])){
			$id=intval($_GET['id']);
			$sql=mysql_query("select * from `shop_clan` where `id`='$id' limit 1");
			if(!mysql_num_rows($sql)){
				echo functions::display_error('Không tìm thấy vật phẩm này trong shop!');
				require('../incfiles/end.php');
				exit;
			}
		$a=mysql_fetch_array($sql);
		if(isset($_POST['submit'])){
			mysql_query("update `shop_clan` set `name`='".$_POST['name']."',`xu`='".$_POST['xu']."',`luong`='".$_POST['luong']."',`lv`='".$_POST['lv']."',`vp`='".$_POST['vp']."',`loai`='".$_POST['loai']."' where `id`='$id' limit 1")or die(mysql_error());
			echo'<div class="lable-success">Đã xong!!!</div>';
			$a['xu']=$_POST['xu'];
			$a['luong']=$_POST['luong'];
			$a['lv']=$_POST['lv'];
			$a['vp']=$_POST['vp'];
			$a['loai']=$_POST['loai'];
			$a['name']=$_POST['name'];
		}/////submit
		echo'<div class="menu"><img src="../images/'.$a['loai'].'/'.$a['vp'].'.png"><form method="post">';
		echo'<p>tên: <input type="text" name="name" value="'.$a['name'].'"></p>';
		echo'<p>Vật phẩm: <input type="text" name="vp" value="'.$a['vp'].'"></p>';
		echo'<p>Xu: <input type="text" name="xu" value="'.$a['xu'].'"></p>';
		echo'<p>Loại: <input type="text" name="loai" value="'.$a['loai'].'"></p>';
		echo'<p>Lượng: <input type="text" name="luong" value="'.$a['luong'].'"></p>';	
		echo'<p>level: <input type="text" name="lv" value="'.$a['lv'].'"></p>';
		echo'<p align="center"><input type="submit" name="submit" value="sửa"></form></p></div>';
		}else{
			$sql=mysql_query("select * from `shop_clan` where `xu`='0' and `luong`='0' limit $start,$kmess");
			$tong=mysql_num_rows(mysql_query("select `id` from `shop_clan` where `xu`='0' and `luong`='0' "));
			If(!$tong){
				echo functions::display_error('Không có món hàng chưa đặt giá');
				require('../incfiles/end.php');
				exit;
			}
		While($m=mysql_fetch_array($sql)){
			echo'<div class="list1"><img src="/images/'.$m['loai'].'/'.$m['vp'].'.png">'.$m['name'];
			echo'<a href="pkclan.php?act=set&id='.$m['id'].'">Chỉnh sửa </a> ';
			echo'--# <a href="clan.php?act=del&id='.$m['id'].'">Xóa</a></div>';
		}
		if($tong>$kmess)
			echo'<div class="menu">'.functions::display_pagination('clan.php&page=',$start,$tong,$kmess).'<p><form  method="post"><input type="text" name="page"size="2"/><input type="submit" value="' . $lng [ 'to_page' ] . ' >>"/></form></p>' ;
		}
	break;
	case'del':
		$id=intval($_GET['id']);
		if(isset($_POST['submit'])){
			Mysql_query("delete from `shop_clan` where `id`='$id' limit 1")or die(mysql_error());
			header('location '.$_POST['ref']);
			exit;
		}
		echo'<div class="menu">Bạn chắc chắn muốn xóa? <form method="post">';
		echo'<input type="hidden" name="ref" value="'.$_SERVER['HTTP_REFERER'].'">';
		echo'<input type="submit" name="submit" value="Xóa"></div>';
	break;
	default:
		$sql=mysql_query("select * from `shop_clan` limit $start,$kmess")or die( mysql_error());
		$tong=mysql_num_rows(mysql_query("select * from `shop_clan`")or die( mysql_error()));
		while($a=mysql_fetch_array($sql)){
			echo'<div class="list1">';
			echo'<p><img src="'.$home.'/images/'.$a['loai'].'/'.$a['vp'].'.png"> '.$a['name'].'</p>';
			echo'<p><a href="clan.php?act=set&id='.$a['id'].'">Chỉnh sửa</a>|||<a href="clan.php?act=del&id='.$a['id'].'">Xóa</a></p>';
			echo'</div>';
		}
		if($tong>$kmess)
			echo '<div class="menu">'.functions::display_pagination('shop.php?page=', $start, $tong, $kmess).'</div>';
	break;
}
require('../incfiles/end.php');
?>