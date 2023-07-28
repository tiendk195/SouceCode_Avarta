<?php

define('_IN_JOHNCMS', 1);
$rootpath='../../';

require_once ("../../incfiles/core.php");


$wboss = mysql_fetch_array(mysql_query("SELECT * FROM `wboss` WHERE `id` = '2019'"));

if(isset($_POST['danh'])) {
    

    
    
    
$hpboss = $datauser['sucmanh'];
$rand = rand(1,3);
$xu = rand(1,50000);
$da = rand(1,2);
$diemsk= rand(1,20);

$tgdanhboss= rand(1,4);
if ($datauser['solandanhboss15']>= $tgdanhboss){
    echo"<script type='text/javascript'>
    
		if(confirm('Bạn đánh quá nhanh! Tiếp tục?')){
	
	
		
	
		}else{
		window.location.href = '/';
		}
	</script>";
	mysql_query("UPDATE `users` SET `solandanhboss15`='0' WHERE `id` = '".$user_id."'");
} else 
if($datauser['suckhoe'] <= 0 ) {
echo'<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><center><b>Lỗi! Bạn cần 5 điểm sức khỏe để tấn công.</b></font></br></center>';


} else if($datauser['sucmanh'] <= 0 ) {
echo'<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><center><b> Bạn cần có sức mạnh để tấn công.</center></b></font>';

} else if($wboss['hp'] <= 0){
echo'<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><center><b>Các Ngươi Đợi Đấy,nhất định taaa sẽ trở lại</center></b></font>';
} else if($wboss['hp'] <= $datauser['sucmanh']){

if ($datauser['sucmanh'] >= $wboss['hp']) {
echo'<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><center><b>Bạn Giết Được Boss Nezuko! Nhận Được '.$da.' Đá nâng cấp, '.$xu.' Xu và '.$diemsk.' Điểm sự kiện</b></font></center>';
                mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'$da' WHERE `user_id`='".$user_id."' AND `id_shop` = '60'");

mysql_query("UPDATE `users` SET `suckhoe`=`suckhoe`-'5',`xu`=`xu`+'$xu',`wboss`=`wboss`+1 ,`diemsk15`=`diemsk15`+ '$diemsk' ,`dietboss15` =`dietboss15`+'1' WHERE `id`='{$user_id}'");

mysql_query("UPDATE `wboss` SET `hp`='0',`die`='1' WHERE `id`='2019'");


$text = ''.$login.' vừa giết được Boss Nezuko mọi người đều ngưỡng mộ.';

mysql_query("INSERT INTO `wnew` SET
`user` = '256',
`time` = '".time()."',
`text` = '".$text."'
");

}


} else if ($rand==1) {
	
echo'<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><center><b>GrèGrè... Bạn bị Nezuko phản dame -25 sức khỏe.</b></center></font>';
mysql_query("UPDATE `users` SET `suckhoe`=`suckhoe`-'25' WHERE `id`='{$user_id}'");

} else {
echo'<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><center><b>Bạn đã tấn công Nezuko, Boss bị trừ -'.number_format($datauser['sucmanh']).'HP</b></font></center>';
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
mysql_query("UPDATE `users` SET `suckhoe`=`suckhoe`-'5',`solandanhboss15`=`solandanhboss15`+'1'  WHERE `id`='{$user_id}'");
mysql_query("UPDATE `wboss` SET `hp`=`hp`-'".$datauser['sucmanh']."' WHERE `id`='2019'");

}
echo'<center></center></<br> <font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><b><img src="/icon/hp.png"> '.$datauser['suckhoe'].' </br>HP: '.number_format($wboss['hp']).'</font></b></center>';
}

?>