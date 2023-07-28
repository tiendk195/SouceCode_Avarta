<?PHP
$headmod = 'Làng cổ';
$textl = 'Làng cổ';
switch($act){
case 'danh':
    ?>
<script type="text/javascript">
$(document).ready(function(){
	$('#btn-dap').click(function(){
		var idvp = $('#idvp').val();
		var url = "danh-load.php";
		var data = {"dap": "", "idvp": idvp,};
		$('#content-load').load(url, data);
		return false;
	});
});
</script>
    <script type="text/javascript">
$(document).ready(function(){
	$('#hoiphuc').click(function(){
		var url = "hoiphuc-load.php";
		var data = {"hoiphuc": ""};
		$('#load').load(url, data);
		return false;
	});
});
</script>


<?php
$vtt = mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id` = '".$user_id."' AND `id_shop`='257' LIMIT 1"));
if ($vtt['soluong']<1){
    echo'<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn không có vé truyền tống <img src="/images/vatpham/257.png">. Hãy đến <a href="/nongtrai/laibuon.php">Lái Buôn</a> ở Nông Trại để mua nhé</div>';

echo'</div>';Require('../incfiles/end.php');
exit;
}
    $id=(int)$_GET[id];

    echo '<div id="content-load">';
   // echo'<form  method="post"><input type="submit" name="hoiphuc" id ="hoiphuc" value="Hồi phục bằng 50.000 xu" /></br></form>';

$check=mysql_num_rows(mysql_query("SELECT * FROM `langtruyenthuyet_boss` WHERE `id`='".$id."'"));
if ($check<1) {
header('Location: index.php');
exit;
}
if(!isset($_POST['submit'])) {
$boss=mysql_fetch_array(mysql_query("SELECT * FROM `langtruyenthuyet_boss` WHERE `id`='".$id."'"));
echo'<div class="omenu">Thông tin Boss '.$boss['tenboss'].':</br>
HP Boss: '.$boss['hp'].'/'.$boss['hpfull'].' <br>
SM Boss: '.$boss['sucmanh'].' <br>Level Boss: '.$boss['lvboss'].' <br>';
echo'<form  method="post"><input type="hidden" id="idvp" name="idvp" value="'.$id.'"><input type="submit" id="btn-dap" name="dap" value="Đánh"></form></div>';
} else {

$req_id = mysql_query("SELECT * FROM `langtruyenthuyet_boss` WHERE `id`='$id'");
while($res_id = mysql_fetch_assoc($req_id)){
$id=(int)$_GET[id];
$u = $user_id;
$hp = $datauser['hp'];
$sm = $datauser['sucmanh'];
$tenboss = $res_id['tenboss']; 
$hpboss = $res_id['hp'];
$hpbossfull = $res_id['hpfull'];
$smboss = $res_id['sucmanh'];
$timedie = $res_id['timebosschet'];
if($res_id['hienthi'] == 1){
mysql_query("UPDATE `users` SET `hp`=`hp`-'".$smboss."' WHERE `id`='".$u."'");
mysql_query("UPDATE `langtruyenthuyet_boss` SET `hp`=`hp`-'".$sm."' WHERE `id`='".$id."'");
Echo'<div class="omenu">
HP Boss: '.$hpboss.' <br>
SM Boss: '.$smboss.' <br>
</div>';
//header("Location: vao.php");
$lv = $datauser['level'];
if($lv >= $res['lvboss'] && $lv < $res['lvbossmax']){
}
if($hpboss <=0){
if($res_id['lvboss'] == 10 && $lv >= 10){
$tichluy = rand(20,30);
mysql_query("UPDATE `users` SET `tichluy` = `tichluy` + $tichluy WHERE `id` = $user_id");
$randxu = rand(10000, 20000);
mysql_query("UPDATE `users` SET `xu` = `xu` + '".$randxu."' WHERE `id` = '".$user_id."'");
$randexp = rand(1000, 2000);
mysql_query("UPDATE `users` SET `exp` = `exp` + '".$randexp."' WHERE `id` = '".$user_id."'");
mysql_query("UPDATE `users` SET `nhb`=`nhb`+'0' WHERE `id`='{$user_id}'");
mysql_query("UPDATE `users` SET `kcx`=`kcx`+'0' WHERE `id`='{$user_id}'");
$randch=rand(1,100);
if($randch >= 8 && $randch <=11){
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop`='".$randch."'");
$query=mysql_query("SELECT * FROM `shopvatpham` WHERE `hienthi`='0' AND `id`='".$randch."'");
$info=mysql_fetch_array($query);
echo'<img src="/images/qua.png" alt="Nhận quà"/> Bạn đã giết chết '.$tenboss.' và nhận được
'.$info[tenvatpham].' !';
}else{
echo '<img src="/images/qua.png" alt="Nhận quà"/> Bạn đã giết chết '.$tenboss.' và nhận được '.$randxu.' xu, '.$randexp.' kinh nghiệm !';
}
//
mysql_query("UPDATE `langtruyenthuyet_boss` SET `hienthi`='0' WHERE `id`='".$id."'");
mysql_query("UPDATE `langtruyenthuyet_boss` SET `timebosschet` = '".time()."' WHERE `id`='".$id."'");
mysql_query("UPDATE `langtruyenthuyet_boss` SET `hoisinh`='0' WHERE `id`='".$id."'");
}else{
Echo'<a href="?act=danh&id='.$res_id['id'].'"><img src="img/boss/'.$res_id['iconboss'].'.png"></a>';
}
if($res_id['lvboss'] == 20 && $lv >= 20){
$tichluy = rand(40,60);
mysql_query("UPDATE `users` SET `tichluy` = `tichluy` + $tichluy WHERE `id` = $user_id");
$randxu = rand(30000, 50000);
mysql_query("UPDATE `users` SET `xu` = `xu` + '".$randxu."' WHERE `id` = '".$user_id."'");
$randexp = rand(3000, 5000);
mysql_query("UPDATE `users` SET `exp` = `exp` + '".$randexp."' WHERE `id` = '".$user_id."'");

$randch=rand(1,80);
if($randch >= 8 && $randch <=11){
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop`='".$randch."'");
$query=mysql_query("SELECT * FROM `shopvatpham` WHERE `hienthi`='0' AND `id`='".$randch."'");
$info=mysql_fetch_array($query);
echo'<img src="/images/qua.png" alt="Nhận quà"/> Bạn đã giết chết '.$tenboss.' và nhận được
'.$info[tenvatpham].' !';
}else{
echo '<img src="/images/qua.png" alt="Nhận quà"/> Bạn đã giết chết '.$tenboss.' và nhận được '.$randxu.' xu, '.$randexp.' kinh nghiệm !';
}
//
mysql_query("UPDATE `langtruyenthuyet_boss` SET `hienthi`='0' WHERE `id`='".$id."'");
mysql_query("UPDATE `langtruyenthuyet_boss` SET `timebosschet` = '".time()."' WHERE `id`='".$id."'");
mysql_query("UPDATE `langtruyenthuyet_boss` SET `hoisinh`='0' WHERE `id`='".$id."'");
}else{
if($lv >= 10){
    if ($res_id['hp']<=0){
Echo'<img src="img/boss/'.$res_id['iconboss'].'die.png">';
} else {
    Echo'<a href="?act=danh&id='.$res_id['id'].'"><img src="img/boss/'.$res_id['iconboss'].'.png"></a>';

}
}
}
}
}
}
}
echo'</div>';
break;
}
?>