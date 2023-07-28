<?php
header('Content-Type: text/html; charset="utf-8');
define('_IN_JOHNCMS', 1);
$rootpath='../../';

require_once ("../../incfiles/core.php");
if (!$user_id) {
header('Location: /index.php');
exit;
}
?>
<script type="text/javascript">
$(document).ready(function(){
	$('#btn-bat').click(function(){
		var idvp = $('#idvp').val();
		var typebat=$('select option:selected').val();
		var url = "bat-load.php";
		var data = {"bat": "", "idvp": idvp, "type": typebat};
		$('#content-load').load(url, data);
		return false;
	});
});
</script>
<?php
$id=(int)$_POST[idvp];

	$p=mysql_fetch_array(mysql_query("SELECT * FROM `khupokemon` WHERE `user_id`= '".$user_id."'"));
$bt=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='242'"));
$bhv=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='243'"));
$bkd=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='244'"));
$btk=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='245'"));
 
if ($p['loaiboss']==1 ){
	$ten='Khủng long lửa';
	$he='Lửa';
	$diem=2;
			$vp=246;

}
if ($p['loaiboss']==8 ){
	$ten='Meoth';
		$he='Lửa';
		$vp=246;

	$diem=2;
}
if ($p['loaiboss']==2 ){
	$ten='Pika điện';
		$he='Lôi';
		$vp=247;

	$diem=4;
}
	if ($p['loaiboss']==3 ){
	$ten='Cáo thiên nhiên';
		$he='Thiên nhiên';
		$vp=248;

	$diem=1;
}
		if ($p['loaiboss']==4 ){
	$ten='Sóc điện';
			$he='Thiên nhiên';
		$vp=248;

	$diem=1;
}
		if ($p['loaiboss']==5 ){
	$ten='Rùa nước';
			$he='Nước';
		$vp=250;

	$diem=2;
}
		if ($p['loaiboss']==7 ){
	$ten='Thiên điểu';
			$he='Nước';
		$vp=250;

	$diem=2;
}
		if ($p['loaiboss']==6 ){
	$ten='Heo ru ngủ';
			$he='Thiên thần';
		$vp=249;

	$diem=3;
}
echo'<div class="phdr">Sự Kiện Pokemon > Bắt Pokemon > '.$ten.' > <a href="map.php">Quay lại</a></div>';

$check = mysql_result(mysql_query("select count(*) from `khupokemon` where `khu` = '".$id."' AND `user_id`= '".$user_id."'"),0);
if ($check<1) {
header('Location: index.php');
exit;

}
if (isset($_POST[bat])) {
	$randkhu=rand(1,30);
		$randboss=rand(1,8);
		$randdmm=rand(1,2);


$type=(int)$_POST[type];

if ($type==1){
	if ($datauser['non']==530 &&$datauser['ao']==633&&$datauser['quan']==431&&$datauser['toc']==380 ){
			$rand=rand(1,3);
						$randd=rand(1,7);

	} else {

	$rand=rand(1,4);										$randd=rand(1,9);

}
}
if ($type==2){
	if ($datauser['non']==530 &&$datauser['ao']==633&&$datauser['quan']==431&&$datauser['toc']==380 ){
			$rand=rand(1,2);
									$randd=rand(1,7);

	} else {
	$rand=rand(1,3);										$randd=rand(1,9);

	}
}
if ($type==3){
	if ($datauser['non']==530 &&$datauser['ao']==633&&$datauser['quan']==431&&$datauser['toc']==380 ){
			$rand=rand(1,1);
									$randd=rand(1,7);

	} else {
	$rand=rand(1,2);
											$randd=rand(1,9);

}
}
if ($type==4){
if ($datauser['non']==530 &&$datauser['ao']==633&&$datauser['quan']==431&&$datauser['toc']==380 ){
			$rand=rand(1,1);
									$randd=rand(1,7);

	} else {
	$rand=rand(1,1);
										$randd=rand(1,9);

}
}
if ($type!=1&&$type!=2&&$type!=3&&$type!=4) {
echo '<div class="omenu">NoNo...!!!!</div>';
} else {
if ($type==1 && $p['loaiboss']==3 or $p['loaiboss']==4   ) {
	  echo'<center>';
     if($check < 1){
echo'<div class="omenu">Lỗi</div>';
	 }  else  if ( $bt['soluong']<1) {
echo '<div class="omenu"><font color="red"><b>Lỗi!</b></font> Chưa đủ điều kiện để bắt!</div>';
	 } else {
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop`='242'");

if ($rand==1) {

        $bot='Chúc mừng [red]'.$datauser['name'].'[/red] vừa bắt thành công Pokemon [b]'.$ten.'[/b]';
        mysql_query("INSERT INTO `guest` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
if ($randd==1){
echo'<div class="omenu">Bạn nhận được '.$randdmm.' Đá may mắn  <img src="/images/vatpham/256.png"></div>';
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$randdmm."' WHERE `user_id`='".$user_id."' AND `id_shop`='256'");
}
echo '<div class="omenu">Bắt thành công <font color="red">'.$ten.'</font>. Bạn nhận được '.$diem.' Điểm sự kiện và '.$diem.' Huy hiệu '.$he.' <img src="/images/vatpham/'.$vp.'.png">   </div>';

mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$diem."' WHERE `user_id`='".$user_id."' AND `id_shop`='".$vp."'");
mysql_query("UPDATE `users` SET `diempokemon` =`diempokemon`+  '".$diem."',`exp`=`exp`+'10000' WHERE `id`= '".$user_id."'");


} else {

echo '<div class="omenu"><font color="red"><b>Tiếc quá!!</font></b> Pokemon '.$ten.' đã chạy khỏi bạn. <a href="map.php">Quay lại</a></div>';
}
							mysql_query("UPDATE `khupokemon` SET `khu`='".$randkhu."', `loaiboss`= '".$randboss."' WHERE `user_id`= '".$user_id."'");
 
}
echo'</center>';

} else if ($type==2 && $p['loaiboss']!=2 && $p['loaiboss']!=6  ) {
  echo'<center>';
     if($check < 1){
echo'<div class="omenu">Lỗi </div>';
	 }  else  if ( $bhv['soluong']<1) {
echo '<div class="omenu"><font color="red"><b>Lỗi!</b></font> Chưa đủ điều kiện để bắt!</div>';
	 } else {
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop`='243'");

if ($rand==1) {

        $bot='Chúc mừng [red]'.$datauser['name'].'[/red] vừa bắt thành công Pokemon [b]'.$ten.'[/b]';
        mysql_query("INSERT INTO `guest` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
if ($randd==1){
echo'<div class="omenu">Bạn nhận được '.$randdmm.' Đá may mắn  <img src="/images/vatpham/256.png"></div>';
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$randdmm."' WHERE `user_id`='".$user_id."' AND `id_shop`='256'");
}
echo '<div class="omenu">Bắt thành công <font color="red">'.$ten.'</font>. Bạn nhận được '.$diem.' Điểm sự kiện và '.$diem.' Huy hiệu '.$he.'  <img src="/images/vatpham/'.$vp.'.png">  </div>';
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$diem."' WHERE `user_id`='".$user_id."' AND `id_shop`='".$vp."'");
mysql_query("UPDATE `users` SET `diempokemon` =`diempokemon`+  '".$diem."',`exp`=`exp`+'10000' WHERE `id`= '".$user_id."'");

} else {

echo '<div class="omenu"><font color="red"><b>Tiếc quá!!</font></b> Pokemon '.$ten.' đã chạy khỏi bạn. <a href="map.php">Quay lại</a></div>';
} 
							mysql_query("UPDATE `khupokemon` SET `khu`='".$randkhu."', `loaiboss`= '".$randboss."' WHERE `user_id`= '".$user_id."'");

}
echo'</center>';
} else if ($type==3) {
  echo'<center>';
     if($check < 1){
echo'<div class="omenu">Lỗi</div>';
	 }  else  if ( $bkd['soluong']<1) {
echo '<div class="omenu"><font color="red"><b>Lỗi!</b></font> Chưa đủ điều kiện để bắt!</div>';
	 } else {
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop`='244'");

if ($rand==1) {

        $bot='Chúc mừng [red]'.$datauser['name'].'[/red] vừa bắt thành công Pokemon [b]'.$ten.'[/b]';
        mysql_query("INSERT INTO `guest` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
if ($randd==1){
echo'<div class="omenu">Bạn nhận được '.$randdmm.' Đá may mắn  <img src="/images/vatpham/256.png"></div>';
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$randdmm."' WHERE `user_id`='".$user_id."' AND `id_shop`='256'");
}
echo '<div class="omenu">Bắt thành công <font color="red">'.$ten.'</font>. Bạn nhận được '.$diem.' Điểm sự kiện và '.$diem.' Huy hiệu '.$he.'  <img src="/images/vatpham/'.$vp.'.png">  </div>';
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$diem."' WHERE `user_id`='".$user_id."' AND `id_shop`='".$vp."'");
mysql_query("UPDATE `users` SET `diempokemon` =`diempokemon`+  '".$diem."',`exp`=`exp`+'10000' WHERE `id`= '".$user_id."'");

} else {

echo '<div class="omenu"><font color="red"><b>Tiếc quá!!</font></b> Pokemon '.$ten.' đã chạy khỏi bạn. <a href="map.php">Quay lại</a></div>';
}
							mysql_query("UPDATE `khupokemon` SET `khu`='".$randkhu."', `loaiboss`= '".$randboss."' WHERE `user_id`= '".$user_id."'");
 
}
echo'</center>';
} else if ($type==4) {
   echo'<center>';
     if($check < 1){
echo'<div class="omenu">Lỗi </div>';
	 }  else  if ( $btk['soluong']<1) {
echo '<div class="omenu"><font color="red"><b>Lỗi!</b></font> Chưa đủ điều kiện để bắt!</div>';
	 } else {
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop`='245'");

if ($rand==1) {

        $bot='Chúc mừng [red]'.$datauser['name'].'[/red] vừa bắt thành công Pokemon [b]'.$ten.'[/b]';
        mysql_query("INSERT INTO `guest` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
if ($randd==1){
echo'<div class="omenu">Bạn nhận được '.$randdmm.' Đá may mắn  <img src="/images/vatpham/256.png"></div>';
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$randdmm."' WHERE `user_id`='".$user_id."' AND `id_shop`='256'");
}
echo '<div class="omenu">Bắt thành công <font color="red">'.$ten.'</font>. Bạn nhận được '.$diem.' Điểm sự kiện và '.$diem.' Huy hiệu '.$he.' <img src="/images/vatpham/'.$vp.'.png">  </div>';
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$diem."' WHERE `user_id`='".$user_id."' AND `id_shop`='".$vp."'");
mysql_query("UPDATE `users` SET `diempokemon` =`diempokemon`+  '".$diem."',`exp`=`exp`+'10000' WHERE `id`= '".$user_id."'");

} else {

echo '<div class="omenu"><font color="red"><b>Tiếc quá!!</font></b> Pokemon '.$ten.' đã chạy khỏi bạn. <a href="map.php">Quay lại</a></div>';
} 

							mysql_query("UPDATE `khupokemon` SET `khu`='".$randkhu."', `loaiboss`= '".$randboss."' WHERE `user_id`= '".$user_id."'");


}
echo'</center>';
} 

}
}
echo'<form method="post">';




echo'<center><div class="omenu"><img src="images/'.$p['loaiboss'].'.gif" alt="icon"><br><font color="white" style="text-shadow: 0 0 0.2em #F08080, 0 0 0.2em #F08080,  0 0 0.2em #F08080"> Pokemon hệ:</font>
<font color="white" style="text-shadow: 0 0 0.2em #FF0000, 0 0 0.2em #FF0000,  0 0 0.2em #FF0000"> <b>'.$he.'</b> <img src="/images/vatpham/'.$vp.'.png"></font><br></br>
 <br>';


echo'<select name="type">';
	if ($p['loaiboss']==3 or $p['loaiboss']==4    ){
		echo'
<option '.($type==1?'selected="selected"':'').' value="1"> Bắt bằng Bóng thường (10%)</option>';
echo'
<option '.($type==2?'selected="selected"':'').' value="2"> Bắt bằng Bóng hi vọng (20%)</option>';
echo'
<option '.($type==3?'selected="selected"':'').' value="3"> Bắt bằng Bóng khởi đầu (30%)</option>
<option '.($type==4?'selected="selected"':'').' value="4"> Bắt bằng Bóng thần kì (100%)</option>';
	} else 
	if ($p['loaiboss']==1 or $p['loaiboss']==5  or $p['loaiboss']==7   or $p['loaiboss']==8    ){
echo'
<option '.($type==2?'selected="selected"':'').' value="2"> Bắt bằng Bóng hi vọng (20%)</option>';
echo'
<option '.($type==3?'selected="selected"':'').' value="3"> Bắt bằng Bóng khởi đầu (30%)</option>
<option '.($type==4?'selected="selected"':'').' value="4"> Bắt bằng Bóng thần kì (100%)</option>';
	} else 

	if ($p['loaiboss']==2 or $p['loaiboss']==6    ){

echo'
<option '.($type==3?'selected="selected"':'').' value="3"> Bắt bằng Bóng khởi đầu (30%)</option>
<option '.($type==4?'selected="selected"':'').' value="4"> Bắt bằng Bóng thần kì (100%)</option>';
	}
	
echo'
</select>';
echo'<input type="hidden" id="idvp" name="idvp" value="'.$id.'">
';
echo'</br></br><input type="submit" id="btn-bat" name="bat" value="Bắt"></div></form></center>';


?>