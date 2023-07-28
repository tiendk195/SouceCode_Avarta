<?php
define('_IN_JOHNCMS',1);
require '../incfiles/core.php';
$vequay=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='251'"));

	$bauvat4=mysql_fetch_array(mysql_query("SELECT * FROM `vongquaybauvat` WHERE `id`='4'"));
$shop4=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$bauvat4['id_shop']."'"));
$bauvat5=mysql_fetch_array(mysql_query("SELECT * FROM `vongquaybauvat` WHERE `id`='5'"));
$shop5=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$bauvat5['id_shop']."'"));
$bauvat7=mysql_fetch_array(mysql_query("SELECT * FROM `vongquaybauvat` WHERE `id`='7'"));
$shop7=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$bauvat7['id_shop']."'"));
$bauvat2=mysql_fetch_array(mysql_query("SELECT * FROM `vongquaybauvat` WHERE `id`='2'"));
$shop2=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE `id`='".$bauvat2['id_shop']."'"));
$bauvat1=mysql_fetch_array(mysql_query("SELECT * FROM `vongquaybauvat` WHERE `id`='1'"));
$bauvat6=mysql_fetch_array(mysql_query("SELECT * FROM `vongquaybauvat` WHERE `id`='6'"));

$bauvat3=mysql_fetch_array(mysql_query("SELECT * FROM `vongquaybauvat` WHERE `id`='3'"));

if($user_id){

if($datauser['qbv_time'] < time()){
if($datauser['setquaybv'] == 1){
$da = rand(1,10);
$r = rand(1,200);
$pin = rand(100000000,999999999);


if($r == 2 ){
echo'<div class="omenu">Chúc mừng bạn quay được <font color="red">'.$bauvat3['ten'].'</font> </div>';
mysql_query("UPDATE `users` SET `setquaybv` = '0',`luong`=`luong`+'".$bauvat3['id_shop']."' WHERE `id` = '".$user_id."'");
$bot='[b]Chúc mừng [blue]'.$login.'[/blue] vừa quay được [red] '.$bauvat3['ten'].'[/red] từ kho báu[/b]';
mysql_query("INSERT INTO `guest` SET `user_id`='256', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");

}
if($r == 1){
echo'<div class="omenu">Chúc mừng bạn quay được <font color="red">'.$bauvat1['ten'].'</font> </div>';
mysql_query("UPDATE `users` SET `setquaybv` = '0',`xu`=`xu`+'".$bauvat1['id_shop']."'WHERE `id` = '".$user_id."'");
$bot='[b]Chúc mừng [blue]'.$login.'[/blue] vừa quay được [red] '.$bauvat1['ten'].'[/red] từ kho báu[/b]';
mysql_query("INSERT INTO `guest` SET `user_id`='256', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");

}
////
if($r == 3){
    $query=mysql_query("SELECT * FROM `khodo` WHERE `id_shop`='".$shop5['id']."' AND `user_id`='".$user_id."'");
$check=mysql_num_rows($query);
if ($check<1) {
echo'<div class="omenu">Chúc mừng bạn quay được <font color="red">'.$shop5['tenvatpham'].'</font> </div>';
mysql_query("UPDATE `users` SET `setquaybv` = '0' WHERE `id` = '".$user_id."'");
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='".$shop5['id']."', 
 `loai`='".$shop5['loai']."', 
 `id_loai`='".$shop5['id_loai']."', 
 `tenvatpham` = '".$shop5['tenvatpham']."', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
 


$bot='[b]Chúc mừng [blue]'.$login.'[/blue] vừa quay được [red]'.$shop5['tenvatpham'].' [/red] từ kho báu[/b]';
mysql_query("INSERT INTO `guest` SET `user_id`='256', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
} else {
    echo'<div class="omenu">Chúc mừng bạn quay được <font color="red">'.$da.' '.$shop2['tenvatpham'].'</font> <img src="/images/vatpham/'.$shop2['id'].'.png"/></div>';
mysql_query("UPDATE `users` SET `setquaybv` = '0' WHERE `id` = '".$user_id."'");
  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$da."' WHERE `user_id`='".$user_id."' AND `id_shop` = '".$shop2['id']."'");
}
}

///
if($r == 4){
echo'<div class="omenu">Chúc mừng bạn quay được <font color="red">SET Chiến Binh Thép</font> </div>';
mysql_query("UPDATE `users` SET `setquaybv` = '0' WHERE `id` = '".$user_id."'");

mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='1775', 
 `loai`='matna',
 `id_loai`='2071',
 `tenvatpham` = 'Chiến Binh Thép', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='".$r['timesudung']."'");
 mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='1776', 
 `loai`='ao',
 `id_loai`='2072',
 `tenvatpham` = 'Chiến Binh Thép', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='".$r['timesudung']."'");
 mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='1777', 
 `loai`='quan',
 `id_loai`='2073',
 `tenvatpham` = 'Chiến Binh Thép', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='".$r['timesudung']."'");
  mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='1778', 
 `loai`='docamtay',
 `id_loai`='2074',
 `tenvatpham` = 'Chiến Binh Thép', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='".$r['timesudung']."'");

$bot='[b]Chúc mừng [blue]'.$login.'[/blue] vừa quay được set [red]Chiến Binh Thép [/red] từ kho báu[/b]';
mysql_query("INSERT INTO `guest` SET `user_id`='256', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");

}

////
if($r == 5){
      $query=mysql_query("SELECT * FROM `khodo` WHERE `id_shop`='".$shop4['id']."' AND `user_id`='".$user_id."'");
$check=mysql_num_rows($query);
if ($check<1) {
echo'<div class="omenu">Chúc mừng bạn quay được <font color="red">'.$shop4['tenvatpham'].'</font> </div>';
mysql_query("UPDATE `users` SET `setquaybv` = '0' WHERE `id` = '".$user_id."'");
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='".$shop4['id']."', 
 `loai`='".$shop4['loai']."', 
 `id_loai`='".$shop4['id_loai']."', 
 `tenvatpham` = '".$shop4['tenvatpham']."', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");



$bot='[b]Chúc mừng [blue]'.$login.'[/blue] vừa quay được [red]'.$shop4['tenvatpham'].'[/red] từ kho báu[/b]';
mysql_query("INSERT INTO `guest` SET `user_id`='256', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");

} else {
    echo'<div class="omenu">Chúc mừng bạn quay được <font color="red">'.$da.' '.$shop2['tenvatpham'].'</font> <img src="/images/vatpham/'.$shop2['id'].'.png"/></div>';
mysql_query("UPDATE `users` SET `setquaybv` = '0' WHERE `id` = '".$user_id."'");
  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$da."' WHERE `user_id`='".$user_id."' AND `id_shop` = '".$shop2['id']."'");
}
}


if($r == 6){
echo'<div class="omenu">Chúc mừng bạn quay được <font color="red">'.$bauvat6['ten'].', Thẻ đã được gửi vào Thông báo</font> </div>';
$text = '<center><img src="http://i.imgur.com/UUNSdhi.png"><br><font color="green">'.$bauvat6['ten'].'</font></br><font color="red">Pin: '.$pin.' </br> </font></center>';

mysql_query("UPDATE `users` SET `setquaybv` = '0' WHERE `id` = '".$user_id."'");
mysql_query("INSERT INTO `1STPay` SET
`pin`='".$pin."',
`user_tao`='".$user_id."',
	`timetao`= '" . time() . "',
	`menhgia`='".$bauvat6['id_shop']."'");
mysql_query("INSERT INTO `thongbao` SET
                `id` = '".$user_id."',
                `user` = '".$user_id."',
                `text` = '$text',
                `ok` = '1',
                `time` = '" . time() . "'
            ");


$bot='[b]Chúc mừng [blue]'.$login.'[/blue] vừa quay được [red] '.$bauvat6['ten'].' [/red] từ kho báu[/b]';
mysql_query("INSERT INTO `guest` SET `user_id`='256', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");


}

if($r == 7){
          $query=mysql_query("SELECT * FROM `khodo` WHERE `id_shop`='".$shop7['id']."' AND `user_id`='".$user_id."'");
$check=mysql_num_rows($query);
if ($check<1) {
echo'<div class="omenu">Chúc mừng bạn quay được <font color="red">'.$shop7['tenvatpham'].'</font> </div>';
mysql_query("UPDATE `users` SET `setquaybv` = '0' WHERE `id` = '".$user_id."'");
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='".$shop7['id']."', 
 `loai`='".$shop7['loai']."', 
 `id_loai`='".$shop7['id_loai']."', 
 `tenvatpham` = '".$shop7['tenvatpham']."', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");



$bot='[b]Chúc mừng [blue]'.$login.'[/blue] vừa quay được [red]'.$shop7['tenvatpham'].'[/red] từ kho báu[/b]';
mysql_query("INSERT INTO `guest` SET `user_id`='256', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");

} else {
    echo'<div class="omenu">Chúc mừng bạn quay được <font color="red">'.$da.' '.$shop2['tenvatpham'].'</font> <img src="/images/vatpham/'.$shop2['id'].'.png"/></div>';
mysql_query("UPDATE `users` SET `setquaybv` = '0' WHERE `id` = '".$user_id."'");
  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$da."' WHERE `user_id`='".$user_id."' AND `id_shop` = '".$shop2['id']."'");
}
}




if($r == 8){
echo'<div class="omenu">Chúc mừng may mắn lần sau</div>';
mysql_query("UPDATE `users` SET `setquaybv` = '0' WHERE `id` = '".$user_id."'");

}
if($r >= 9){
echo'<div class="omenu">Chúc mừng bạn quay được <font color="red">'.$da.' '.$shop2['tenvatpham'].'</font> <img src="/images/vatpham/'.$shop2['id'].'.png"/></div>';
mysql_query("UPDATE `users` SET `setquaybv` = '0' WHERE `id` = '".$user_id."'");
  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$da."' WHERE `user_id`='".$user_id."' AND `id_shop` = '".$shop2['id']."'");
  }
}
}
if($datauser['qbv_time'] > time()){
echo'<div class="omenu"><img src="https://i.imgur.com/Q6VbaZn.gif" width="20"/><b> Đang quay vui lòng chờ...</b></div>';
$time = time()+10;
mysql_query("UPDATE `users` SET `setquaybv` = '1',`time_tbbv`='".$time."' WHERE `id` = '".$user_id."'");
}

if (isset($_POST['okquay'])) {
$time = time()+5;
$tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."'");
$checktongruong=mysql_num_rows($tongruong);
if ($vequay['soluong']<1){
echo'<div class="omenu"><font color="red"><b>Lỗi! Bạn không có đá quay</b></font></div>';
} else 
	if ($checktongruong>=$datauser['tongruong']) {
    echo'<div class="omenu">Giao dịch không thành công, rương của bạn đã đầy !!</div>';
	} else 
if($datauser['qbv_time'] < time()){
mysql_query("UPDATE `users` SET `qbv_time` = '".$time."',`time_tbbv`='0' WHERE `id` = '".$user_id."'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop`='251'");

}
}


}




?>