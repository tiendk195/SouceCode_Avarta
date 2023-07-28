<?php
header('Content-Type: text/html; charset="utf-8');
define('_IN_JOHNCMS', 1);



require_once ('../incfiles/core.php');
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


$id=(int)$_POST[idvp];
$check=mysql_num_rows(mysql_query("SELECT * FROM `langtruyenthuyet_boss` WHERE `id`='".$id."'"));
if ($check<1) {
header('Location: index.php');
exit;
}
$res_id=mysql_fetch_array(mysql_query("SELECT * FROM `langtruyenthuyet_boss` WHERE `id`='".$id."'"));

if(isset($_POST['dap'])) {
    $boss=mysql_fetch_array(mysql_query("SELECT * FROM `langtruyenthuyet_boss` WHERE `id`='".$id."'"));
echo'<div class="omenu">Thông tin Boss '.$boss['tenboss'].':</br>
HP Boss: '.$boss['hp'].'/'.$boss['hpfull'].' <br>
SM Boss: '.$boss['sucmanh'].' <br>Level Boss: '.$boss['lvboss'].' <br>HP Cá nhân: '.$datauser['hp'].'/'.$datauser['hpfull'].' <br>
SM Cá nhân: '.$datauser['sucmanh'].'<br>
';
echo'<form  method="post"><input type="hidden" id="idvp" name="idvp" value="'.$id.'"><input type="submit" id="btn-dap" name="dap" value="Đánh"></form></div>';
 $wait=$datauser[timedanhboss]-time();
if ($datauser[timedanhboss]>time()) {
		    echo"<script>
if(confirm('Bạn đánh quá nhanh! Vui lòng đợi {$wait}s để tiếp tục?')){
}else{
		window.location.href = '';
		}
	</script>";
} else if ($datauser['sucmanh']<=0){
    echo'<div class="omenu"><font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><center><b>Lỗi! Bạn không có SM.</b></font></br></center></div>';
} else
if ($datauser['hp']<=0){
 
echo'<div class="omenu"><font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><center><b>Lỗi! Bạn đã hết HP.</b></font></br></center>';
    echo'<span id="load"></span>';

   echo'<form  method="post"><input type="submit" name="hoiphuc" id ="hoiphuc" value="Hồi phục bằng 50.000 xu" /></br></form>';
   echo'</div>';
} else if ($boss['hp']<=0){
		echo'<div class="omenu"><font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><b>Boss đã hết HP</font></div>';

} else{



$u = $user_id;
$hp = $datauser['hp'];
$sm = $datauser['sucmanh'];
$tenboss = $res_id['tenboss']; 
$hpboss = $res_id['hp'];
$hpbossfull = $res_id['hpfull'];
$smboss = $res_id['sucmanh'];
$timedie = $res_id['timebosschet'];
mysql_query("UPDATE `users` SET `hp`=`hp`-'".$smboss."' WHERE `id`='".$u."'");
mysql_query("UPDATE `langtruyenthuyet_boss` SET `hp`=`hp`-'".$sm."' WHERE `id`='".$id."'");
Echo'<div class="omenu">
<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><b>Boss: - '.$sm.' HP<br>
Bạn: - '.$smboss.' HP</font></b><br>
';
$lv = $datauser['level'];

if($datauser['sucmanh']>=$hpboss){

if($lv < 10){
$tichluy = rand(5,10);
$randxu = rand(10000, 50000);
$randexp = rand(1000, 2000);
$randthe = rand(1, 1);

}
    
if($lv >= 10 && $lv < 20 ){
$tichluy = rand(20,30);
$randxu = rand(50000, 100000);
$randexp = rand(1000, 10000);
$randthe = rand(1, 2);

} 
if( $lv >= 20){
$tichluy = rand(40,60);
$randxu = rand(100000, 200000);
$randexp = rand(3000, 15000);
$randthe = rand(1, 3);

}
    $text='Bạn nhận được '.$randthe.' thẻ may mắn <img src="/images/vatpham/49.png">, '.$tichluy.' điểm tích lũy, '.$randxu.' xu, '.$randexp.' kinh nghiệm từ '.$tenboss.'  ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
$bot='@'.$user_id.' vừa giết được boss [b]'.$tenboss.'[/b] ';
//mysql_query("INSERT INTO `guest` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
mysql_query("INSERT INTO `wnew` SET `user`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");

    echo 'Bạn đã giết chết '.$tenboss.' và nhận được '.$randthe.' thẻ may mắn <img src="/images/vatpham/49.png">, '.$tichluy.' điểm tích lũy, '.$randxu.' xu, '.$randexp.' kinh nghiệm !';
    mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$randthe."' WHERE `user_id`='".$user_id."' AND `id_shop`='49'");

    mysql_query("UPDATE `langtruyenthuyet_boss` SET `hienthi`='0' WHERE `id`='".$id."'");
mysql_query("UPDATE `langtruyenthuyet_boss` SET `timebosschet` = '".time()."' WHERE `id`='".$id."'");
mysql_query("UPDATE `langtruyenthuyet_boss` SET `hoisinh`='0' WHERE `id`='".$id."'");

mysql_query("UPDATE `users` SET `tichluy` = `tichluy` + $tichluy WHERE `id` = $user_id");
mysql_query("UPDATE `users` SET `xu` = `xu` + '".$randxu."' WHERE `id` = '".$user_id."'");
mysql_query("UPDATE `users` SET `exp` = `exp` + '".$randexp."' WHERE `id` = '".$user_id."'");

}
mysql_query("UPDATE `users` SET `timedanhboss`='".time()."'+'3' WHERE `id`='".$user_id."'");

}
echo'</div>';

}


?>