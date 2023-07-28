<?php
define('_IN_JOHNCMS', 1);
$textl = 'Sự Kiện Pokemon';
$headmod = 'id_user';
$rootpath='../../';
require_once ("../../incfiles/core.php");
require_once ("../../incfiles/head.php");

	$thiennhien=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='248'"));
	$nuoc=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='250'"));
	$lua=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='246'"));
	$thienthan=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='249'"));
	$loi=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='247'"));
if (!$user_id) {
echo '<div class="omenu"><p><b>Lỗi!</b><br>Trang chỉ dành cho thành viên!</p></div>';
require_once ("../../incfiles/end.php");
exit;
}
if ($datauser['kichhoat']==0) {
echo '<div class="omenu"><p><b>Lỗi!</b><br>Trang chỉ dành cho thành viên đã kích hoạt!</p></div>';
require_once ("../../incfiles/end.php");
exit;
}
if ($datauser['postforum']<2) {
    echo'<div class="omenu">Bạn cần đạt 2 bài viết để vào đây</div>';
require_once ("../../incfiles/end.php");
exit;
}
?>
<!--Edit by Lethinh-->
<?php
echo'<div class="phdr">Đổi Icon Nick</div>';
if ($datauser['rights']>=9) {
    echo'<div class="omenu"><a href="?act=add">Thêm</a></div>';
}

switch($act) {
default:
echo'<div class="lt" style="text-align:center;"><select name="doiqua" input type="submit" onchange="location = this.options[this.selectedIndex].value;">
    Đổi quà: <br>
<option value="icon.php"/>Đổi icon nick</option>

<option value="shopsukien.php"/>Đổi quà</option>
<option value="doivatpham.php"/>Đổi vật phẩm</option>

</select>
</div>';
$tong =mysql_result(mysql_query("SELECT COUNT(*) FROM `shopiconpokemon` "),0);
$req=mysql_query("SELECT * FROM `shopiconpokemon` ORDER BY `id` DESC LIMIT $start,$kmess");
while($res=mysql_fetch_array($req)) {


    echo'<table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info">
<tbody><tr>
<td class="left-info"><img src="/icon/pokemon/'.$res['id'].'.png" width="20px">
</td>
<td class="right-info">
Cần: <font color="red">';
  if ($res['thiennhien']>0){
			  
		  echo' '.number_format($res['thiennhien']).' Huy hiệu thiên nhiên <img src="/images/vatpham/248.png">';
		  } 
            if ($res['nuoc']>0){
			  
		  echo' '.number_format($res['nuoc']).' Huy hiệu nước <img src="/images/vatpham/250.png">';
		  } 
                if ($res['lua']>0){
			  
		  echo' '.number_format($res['lua']).' Huy hiệu lửa <img src="/images/vatpham/246.png">';
		  } 
		             if ($res['thienthan']>0){
			  
		  echo' '.number_format($res['thienthan']).' Huy hiệu thiên thần <img src="/images/vatpham/249.png">';
		  }
             if ($res['loi']>0){
			  
		  echo' '.number_format($res['loi']).' Huy hiệu lôi <img src="/images/vatpham/247.png">';
		  } 		  
echo'</font> <br>
<a href="?act=doi&amp;id='.$res['id'].'"><input type="submit" name="submit" value="Đổi"></a>
';
              if ($datauser['rights'] >= 9) {
    echo' <a href="?act=xoa&id='.$res[id].'"><input type="submit" name="submit" value="Xóa"></a>';
      echo' <a href="?act=edit&id='.$res[id].'"><input type="submit" name="submit" value="Sửa"></a>';
    } 

          echo'</td></tr></tbody></table>';


}
if ($tong > $kmess){
echo '<div class="topmenu">' . functions::display_pagination('?', $start, $tong, $kmess) . '</div>';
}
break;
case 'edit':
if ($rights>=9) {


$id=$_GET[id];
$p=mysql_fetch_array(mysql_query("SELECT * FROM `shopiconpokemon` WHERE `id`='".$id."'"));

$item=mysql_fetch_array(mysql_query("SELECT * FROM `shopiconpokemon` WHERE `id`='".$id."'"));
  $xyz=mysql_num_rows(mysql_query("SELECT * FROM `shopiconpokemon` WHERE `id`='".$id."'"));
if($xyz<=0){header('location: /');}



echo '<div class="phdr"><b>Edit</b></div>';
if (isset($_POST[submit])) {
$lua=trim($_POST['lua']);
	$nuoc=trim($_POST['nuoc']);
	$thienthan=trim($_POST['thienthan']);
	$loi=trim($_POST['loi']);

	$thiennhien=trim($_POST['thiennhien']);
  mysql_query("UPDATE `shopiconpokemon` SET `thiennhien`= '".$thiennhien."',`lua`= '".$lua."',`nuoc`= '".$nuoc."',`thienthan`= '".$thienthan."',`loi`= '".$loi."' WHERE `id`='".$id."'");


echo '<div class="omenu">Edit thành công! </div>';
}
echo '<img src="/icon/pokemon/'.$item['id'].'.png" width="20px">';
echo '<form method="post">';


echo '<input type="number" name="thiennhien"  placeholder="Nhập thiên nhiên('.$p[thiennhien].')"></br>
<input type="number" name="lua"    placeholder="Nhập lửa('.$p[lua].')"></br>

<input type="number" name="nuoc"    placeholder="Nhập nước('.$p[nuoc].')"></br>

<input type="number" name="thienthan"   placeholder="Nhập thiên thần('.$p[thienthan].')"></br>
<input type="number" name="loi"  placeholder="Nhập lôi('.$p[loi].')"></br>';

echo '<input type="submit" name="submit" value="Lưu">';
echo '</form>';
}
break;
case 'xoa':
if ($datauser['rights'] >= 9) {
$id = $_GET['id'];
if (isset($_POST['delit'])) {
mysql_query("DELETE FROM `shopiconpokemon` WHERE `id`='".$id."'");
    header ('Location : icon.php ');

}
$checkit = mysql_result(mysql_query("select count(*) from `shopiconpokemon` where `id` = '".$id."'"),0);
if ($checkit == 0) {
	echo '<div class="omenu">Không có Item này !</div>';
} else {
echo '<div class="phdr"> Xóa Item </div>';
echo '<center><div class="omenu">Bạn có chắc muốn xóa item này khỏi shop ?<br/>
<form method="post"><input type="submit" name="delit" value="Xóa"></form></div>';
}
}
break;
case 'add':
if ($datauser['rights'] >=9) {
if (isset($_POST[add])) {
$id=(int)$_POST[id];
	$thiennhien=trim($_POST['thiennhien']);

	$lua=trim($_POST['lua']);
	$nuoc=trim($_POST['nuoc']);
	$thienthan=trim($_POST['thienthan']);
	$loi=trim($_POST['loi']);
/*
if ($hsd !=0)
{
$timesd= $hsd*24*3600+time();
}
*/
$checkit = mysql_result(mysql_query("select count(*) from `shopiconpokemon` where `id` = '".$id."'"),0);
if ($checkit == $id) {
	echo '<div class="omenu">Vật phẩm đã có trong shop !</div>';
} else 
if (empty($id) ) {
echo '<div class="news">Không được bỏ trống chỗ nào hết!</div>';
} else {
mysql_query("INSERT INTO `shopiconpokemon` SET
`id`='".$id."',
`thiennhien`= '".$thiennhien."',`lua`= '".$lua."',`nuoc`= '".$nuoc."',`thienthan`= '".$thienthan."',`loi`= '".$loi."'");

echo '<div class="omenu">Thêm thành công</div>';
}
}
$i=1;
for($j=1;$j<=10001;$j++){
if(getimagesize('../icon/pokemon/'.$j.'.png')!=false) {
if($i%10==1){
if($i!=1) echo'</tr>';
echo'<tr>';
}
$checkit = mysql_result(mysql_query("select count(*) from `shopiconpokemon` where `id` = '".$j."'"),0);

echo'<table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info">
<tbody><tr>
<td class="left-info"><img src="/icon/pokemon/'.$j.'.png" width="20px">
</td>
<td class="right-info">
ID: '.$j.' ';
if ($checkit >0) {
	echo'(<font color="red">Đã có</font>)';
}
echo'
</td>
</tr></tbody></table>';

$i++;
}
}
echo '<form method="post">';

echo 'ID: <input type="number" name="id" size="5"><br/>';


echo'<input type="number" name="thiennhien"  placeholder="Nhập thiên nhiên"></br>
<input type="number" name="lua"    placeholder="Nhập lửa"></br>

<input type="number" name="nuoc"    placeholder="Nhập nước"></br>

<input type="number" name="thienthan"   placeholder="Nhập thiên thần"></br>
<input type="number" name="loi"  placeholder="Nhập lôi"></br>';

echo '<input type="submit" name="add" value="Thêm">';
echo '</form>';
}
break;
case 'doi':



$id = (int)$_GET['id'];
$check=mysql_num_rows(mysql_query("SELECT * FROM `shopiconpokemon` WHERE `id`='".$id."'"));
if ($check<1) {
header('Location: icon.php');
exit;
}

$item=mysql_fetch_array(mysql_query("SELECT * FROM `shopiconpokemon` WHERE `id`='".$id."'"));
$p=mysql_fetch_array(mysql_query("SELECT * FROM `shopiconpokemon` WHERE `id`='".$id."'"));

echo'<div class="omenu"><center>Xin chào!<br>
Bạn có muốn đổi Icon <img src="/icon/pokemon/'.$item['id'].'.png" width="20px"> với  <font color="green">';
  if ($p['thiennhien']>0){
			  
		  echo' '.number_format($p['thiennhien']).' Huy hiệu thiên nhiên <img src="/images/vatpham/248.png">';
		  } 
            if ($p['nuoc']>0){
			  
		  echo' '.number_format($p['nuoc']).' Huy hiệu nước <img src="/images/vatpham/250.png">';
		  } 
                if ($p['lua']>0){
			  
		  echo' '.number_format($p['lua']).' Huy hiệu lửa <img src="/images/vatpham/246.png">';
		  } 
		             if ($p['thienthan']>0){
			  
		  echo' '.number_format($p['thienthan']).' Huy hiệu thiên thần <img src="/images/vatpham/249.png">';
		  }
             if ($p['loi']>0){
			  
		  echo' '.number_format($p['loi']).' Huy hiệu lôi <img src="/images/vatpham/247.png">';
		  } 		  
echo'</font> không?
<br>
<form method="post"><input class="submit" type="submit" name="doi" value="Đổi"> </form>
<center></center></center></div>';
 

if(isset($_POST['doi'])){

$kt = mysql_fetch_array(mysql_query("SELECT * FROM `ruongicon` WHERE `user_id` = '".$user_id."'"));
$p=mysql_fetch_array(mysql_query("SELECT * FROM `shopiconpokemon` WHERE `id`='".$id."'"));
	        			$query=mysql_query("SELECT * FROM `ruongicon` WHERE `icon`='".$p['id']."' AND `user_id`='".$user_id."'");
$checkdo=mysql_num_rows($query);
if ($checkdo>=1) {
    echo'<div class="omenu">Giao dịch không thành công, Bạn đã sở hữu  <img src="/icon/pokemon/'.$item['id'].'.png" width="20px"> !!</div>';
}
 else
if ( $thiennhien['soluong']<$p['thiennhien'] || $lua['soluong']<$p['lua'] ||$nuoc['soluong']<$p['nuoc'] ||$thienthan['soluong']<$p['thienthan'] ||$loi['soluong']<$p['loi']) {

	echo '<div class="omenu"><font color="red"><b>Lỗi!</b></font> Chưa đủ điều kiện để đổi</div>';
} else {
 
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$p['thiennhien']."' WHERE `user_id`='".$user_id."' AND `id_shop`='248'");


		mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$p['lua']."' WHERE `user_id`='".$user_id."' AND `id_shop`='246'");
	

	mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$p['nuoc']."' WHERE `user_id`='".$user_id."' AND `id_shop`='250'");
	

	mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$p['thienthan']."' WHERE `user_id`='".$user_id."' AND `id_shop`='249'");
			

	mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$p['loi']."' WHERE `user_id`='".$user_id."' AND `id_shop`='247'");
			

	mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$p['loi']."' WHERE `user_id`='".$user_id."' AND `id_shop`='247'");
	mysql_query("INSERT INTO `ruongicon` SET
`user_id` = '".$user_id."',
`icon` = '".$item['id']."'
");

echo'<div class="omenu">Bạn đã đổi thành công: <b><font color="red"><img src="/icon/pokemon/'.$item['id'].'.png" width="20px"> ';
              echo'</font></b></div>';
}
}





break;
}

require('../../incfiles/end.php');
?>

