<?php

define('_IN_JOHNCMS', 1);

require_once ("../incfiles/core.php");
?>
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

$wboss = mysql_fetch_array(mysql_query("SELECT * FROM `wboss` WHERE `id` = '10'"));
echo'<div class="omenu">';

if(isset($_POST['danh'])) {
    

    
    
    
$hpboss = $datauser['sucmanh'];
if ($datauser[sucmanh]>=50000) {
$ihp = rand($datauser['sucmanh']/5,$datauser['sucmanh']/5+1000);
} else if ($datauser[sucmanh]<50000) {
    $ihp = rand($datauser['sucmanh']/10,$datauser['sucmanh']/10+100);
}

$rand = rand(1,3);
if ($datauser[sucmanh]>=50000) {

$xu = rand(1000000,2000000);
$da = rand(1,10);
$dawin = rand(50,100);
} else if ($datauser[sucmanh]<50000) {
$xu = rand(2000000,3000000);
$da = rand(1,10);
$dawin = rand(50,200);
}
$diemsk= rand(1,20);
$wait=$datauser[timedanhboss]-time();
if ($datauser[timedanhboss]>time()) {
		    echo"<script>
if(confirm('Bạn đánh quá nhanh! Vui lòng đợi {$wait}s để tiếp tục?')){
}else{
		window.location.href = '';
		}
	</script>";
} else

if($datauser['hp'] <= 0 ) {
echo'<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><center><b>Lỗi! Bạn đã hết HP.</b></font></br></center>';
echo'<input type="submit" name="hoiphuc" id ="hoiphuc" value="Hồi phục bằng 50.000 xu" /></br>';



} else if($datauser['sucmanh'] <= 0 ) {
echo'<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><center><b> Bạn cần có sức mạnh để tấn công.</center></b></font>';

} else if($wboss['hp'] <= 0){
echo'<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><center><b>Các Ngươi Đợi Đấy,nhất định bổn tọa sẽ trở lại</center></b></font>';
} else if($wboss['hp'] <= $datauser['sucmanh']){
			$all=mysql_fetch_array(mysql_query("SELECT max(id) FROM `shopdo` WHERE `hienthi`='1' "));  
$rando=rand($all['min(id)'],$all['max(id)']);
$checkrand=mysql_num_rows(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$rando."' "));
$cross=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$rando."' "));
if ($checkrand>=1){
echo'<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><center><b>Bạn nhận được '.$cross['tenvatpham'].' <img src="/images/shop/'.$cross['id'].'.png"></b></font></center>';
mysql_query("INSERT INTO `khodo` SET `user_id`='".$user_id."', `id_shop`='".$cross['id']."', `loai`='".$cross['loai']."', `id_loai`='".$cross['id_loai']."', `tenvatpham` = '".$cross['tenvatpham']."', `timesudung`='0'");
$tb='Bạn nhận được '.$cross['tenvatpham'].' <img src="/images/shop/'.$cross['id'].'.png"> từ Boss '.$wboss['ten'].' ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$tb',
`ok`='1',
`time`='".time()."'
");
}	
echo'<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><center><b>Bạn Giết Được Boss '.$wboss['ten'].'! Nhận Được '.$dawin.' Đá nâng cấp, '.$xu.' Xu, 1 Huy hiệu 1STPay <img src="/images/vatpham/125.png"></b></font></center>';
                mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'$dawin' WHERE `user_id`='".$user_id."' AND `id_shop` = '60'");
                mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '125'");
					$tb='Bạn nhận được 1.000.000 EXP, '.$dawin.' Đá nâng cấp, '.$xu.' Xu, 1 Huy hiệu 1STPay <img src="/images/vatpham/125.png"> từ Boss '.$wboss['ten'].' ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$tb',
`ok`='1',
`time`='".time()."'
");

mysql_query("UPDATE `users` SET  `hp`=`hp`-'{$ihp}',`xu`=`xu`+'$xu',`exp`=`exp`+'1000000' ,`wboss`=`wboss`+1 WHERE `id`='{$user_id}'");

mysql_query("UPDATE `wboss` SET `hp`='0',`die`='1' WHERE `id`='10'");


$text = ''.$login.' vừa giết được Boss '.$wboss['ten'].' mọi người đều ngưỡng mộ.';

mysql_query("INSERT INTO `wnew` SET
`user` = '256',
`time` = '".time()."',
`text` = '".$text."'
");




} else {
echo'<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><center><b>Bạn đã tấn công '.$wboss['ten'].', Boss bị trừ -'.number_format($datauser['sucmanh']).'HP, Bạn bị trừ -'.$ihp.'HP </b></font></center>';
$rand = rand(1,7);
$da = rand(1,3);
$luong = rand(1,2);
if ($rand >= 4) {
	echo'<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><center><b>Bạn đã nhận được '.$da.' Đá nâng cấp</b></font></center>';
	                mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'$da' WHERE `user_id`='".$user_id."' AND `id_shop` = '60'");

}

if ($rand == 1) {
	echo'<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><center><b>Bạn đã nhận được '.$da.' Đá nâng cấp</b></font></center>';
	                mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'$da' WHERE `user_id`='".$user_id."' AND `id_shop` = '60'");

}
if ($rand == 2) {
$da23=rand(1,4);
	echo'<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><center><b>Bạn đã nhận được '.$da23.' Đá ngũ sắc</b></font></center>';
	                mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'$da23' WHERE `user_id`='".$user_id."' AND `id_shop` = '123'");

}

if ($rand == 3) {
	echo'<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><center><b>Bạn đã nhận được '.$luong.' Lượng</b></font></center>';
	                mysql_query("UPDATE `users` SET `luong`=`luong`+'$luong' WHERE `id`='".$user_id."'");

}
mysql_query("UPDATE `users` SET `timedanhboss`='".time()."'+'3' WHERE `id`='".$user_id."'");

mysql_query("UPDATE `users` SET `hp`=`hp`-'{$ihp}', `exp`=`exp`+'10000' WHERE `id`='{$user_id}'");
mysql_query("UPDATE `wboss` SET `hp`=`hp`-'".$datauser['sucmanh']."' WHERE `id`='10'");

}
echo'<center></center></<br> <font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><b>Bản thân: '.number_format($datauser['hp']).'/ '.number_format($datauser['hpfull']).'</br> HP: '.number_format($wboss['hp']).'</font></b></center>';
}
echo'</div>';

?>