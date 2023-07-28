<?php

define('_IN_JOHNCMS', 1);
$rootpath='../../';

require_once ("../../incfiles/core.php");


$wboss = mysql_fetch_array(mysql_query("SELECT * FROM `wboss` WHERE `id` = '2019'"));

if(isset($_POST['danh'])) {
    

    
    
    
$hpboss = $datauser['sucmanh'];
$rand1 = rand(1,20);
if ($datauser['non']==315){
$rand2 = rand(1,50);
} else {
$rand2 = rand(1,200);
}

$xu = rand(1,50000);
$da = rand(1,2);
$diemsk= rand(1,20);
$dame=rand(1,6);

if ($datauser['suckhoe']<= 0){
    echo"<script type='text/javascript'>
    
		if(confirm('Bạn đã hết sức khỏe, có muốn hồi phục?')){
			window.location.href = 'hoiphuc.php';

	
		
	
		}else{
		}
	</script>";
} else {
echo'<marquee direction="up" scrollamount="7" loop="1" style="text-align: center"><b><font color="red">-'.$dame.'</font></b></marquee>';
if ($rand1==1){
?>
	
<script>
alert('Bạn nhận được 1 đá xanh' );
<?php
  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'5' WHERE `user_id`='".$user_id."' AND `id_shop` = '99'");
?>


   







</script>
<?php
	
}

if ($rand1==2){
?>
	
<script>
alert('Bạn nhận được 1 đá lục' );
<?php
  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'5' WHERE `user_id`='".$user_id."' AND `id_shop` = '100'");
  ?>


   







</script>
<?php
}
if ($rand1==3){
?>
	
<script>
alert('Bạn nhận được 1 đá tím' );
<?php
  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'5' WHERE `user_id`='".$user_id."' AND `id_shop` = '101'");
  ?>


   







</script>
<?php
}
if ($rand2==4){
?>
	
<script>
alert('Bạn nhận được 1 đá hồng' );
<?php
  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'5' WHERE `user_id`='".$user_id."' AND `id_shop` = '102'");
  ?>


   







</script>
<?php
}
if ($rand2==5){
?>
	
<script>
alert('Bạn nhận được 1 đá đỏ' );
<?php
  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'5' WHERE `user_id`='".$user_id."' AND `id_shop` = '103'");
  ?>


   







</script>
<?php
}
/*
$rand = rand(1,15);
$da = rand(1,3);
$luong = rand(1,2);

if ($rand == 4) {
	echo'<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><center><b>Bạn đã nhận được '.$da.' Đá nâng cấp</b></font></center>';
	                mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'$da' WHERE `user_id`='".$user_id."' AND `id_shop` = '60'");

}
if ($rand == 10) {
$da23=rand(1,2);
	echo'<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><center><b>Bạn đã nhận được '.$da23.' Đá ngũ sắc</b></font></center>';
	                mysql_query("UPDATE `users` SET `dangusac`=`dangusac`+'".$da23."' WHERE `id`='".$user_id."'");

}
if ($rand == 15) {
$query=mysql_query("SELECT * FROM `vatpham` WHERE `id_shop`='105' AND `user_id`='".$user_id."'");
$check=mysql_num_rows($query);
if ($check<1) {
  mysql_query("INSERT INTO `vatpham` SET `soluong`='0',`user_id`='".$user_id."',`id_shop` = '105'");
}
$qua15=rand(1,10);
	echo'<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><center><b>Bạn đã nhận được '.$qua15.' Hộp quà 1-5</b></font></center>';
  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$qua15."' WHERE `user_id`='".$user_id."' AND `id_shop` = '105'");


}
if ($rand == 2) {
	echo'<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><center><b>Bạn đã nhận được '.$luong.' Lượng</b></font></center>';
	                mysql_query("UPDATE `users` SET `luong`=`luong`+'$luong' WHERE `id`='".$user_id."'");

}
*/
mysql_query("UPDATE `users` SET `suckhoe`=`suckhoe`-'".$dame."' WHERE `id`='{$user_id}'");

}
echo'<center><center><img src="images/npclua.gif"><br><div class="lucifer">Sức Khoẻ : '.$datauser['suckhoe'].'/100</div></center>';
}

?>