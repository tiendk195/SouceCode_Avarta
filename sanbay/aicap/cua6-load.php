<?php

define('_IN_JOHNCMS', 1);

$rootpath='../../';
require_once ("../../incfiles/core.php");




if(isset($_POST['nhanthuong'])) {
                $tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."'");
$checktongruong=mysql_num_rows($tongruong);
if ($datauser['vitri']!='673')
{
      echo"
<script>
alert('Bạn không ở trong map này' );
</script>";
?>
<meta http-equiv="refresh" content="2;url=http://thitranvuive.xyz/sanbay/aicap"> 
<?php


} else if ($datauser['zombie']==1){
       echo"
<script>
alert('Không thể nhận quà khi bạn là zombie' );
</script>"; 
?>
<meta http-equiv="refresh" content="2;url=http://thitranvuive.xyz/sanbay/aicap"> 
<?php
} else

	if ($checktongruong>=$datauser['tongruong']) {
    echo'Giao dịch không thành công, rương của bạn đã đầy !!';
	} else {
$rand=rand(1,36);
if ($rand==1){
    $do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='4269'"));
     echo"
<script>
alert('Nhận thưởng thành công. Bạn nhận được {$do[tenvatpham]} ' );
</script>";   
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='".$do['id']."', 
 `loai`='".$do['loai']."', 
 `id_loai`='".$do['id_loai']."', 
 `tenvatpham` = '".$do['tenvatpham']."', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
}
if ($rand==2){
    $do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='4270'"));
     echo"
<script>
alert('Nhận thưởng thành công. Bạn nhận được {$do[tenvatpham]} ' );
</script>";   
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='".$do['id']."', 
 `loai`='".$do['loai']."', 
 `id_loai`='".$do['id_loai']."', 
 `tenvatpham` = '".$do['tenvatpham']."', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
}
if ($rand==3){
    $do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='4271'"));
     echo"
<script>
alert('Nhận thưởng thành công. Bạn nhận được {$do[tenvatpham]} ' );
</script>";   
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='".$do['id']."', 
 `loai`='".$do['loai']."', 
 `id_loai`='".$do['id_loai']."', 
 `tenvatpham` = '".$do['tenvatpham']."', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
}
if ($rand==4){
    $do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='4272'"));
     echo"
<script>
alert('Nhận thưởng thành công. Bạn nhận được {$do[tenvatpham]} ' );
</script>";   
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='".$do['id']."', 
 `loai`='".$do['loai']."', 
 `id_loai`='".$do['id_loai']."', 
 `tenvatpham` = '".$do['tenvatpham']."', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
}

if ($rand==5){
    $do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='926'"));
     echo"
<script>
alert('Nhận thưởng thành công. Bạn nhận được {$do[tenvatpham]} ' );
</script>";   
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='".$do['id']."', 
 `loai`='".$do['loai']."', 
 `id_loai`='".$do['id_loai']."', 
 `tenvatpham` = '".$do['tenvatpham']."', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
}
if ($rand==6){
    $do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='927'"));
     echo"
<script>
alert('Nhận thưởng thành công. Bạn nhận được {$do[tenvatpham]} ' );
</script>";   
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='".$do['id']."', 
 `loai`='".$do['loai']."', 
 `id_loai`='".$do['id_loai']."', 
 `tenvatpham` = '".$do['tenvatpham']."', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
}
if ($rand==7){
    $do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='928'"));
     echo"
<script>
alert('Nhận thưởng thành công. Bạn nhận được {$do[tenvatpham]} ' );
</script>";   
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='".$do['id']."', 
 `loai`='".$do['loai']."', 
 `id_loai`='".$do['id_loai']."', 
 `tenvatpham` = '".$do['tenvatpham']."', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
}
if ($rand==8){
    $do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='1942'"));
     echo"
<script>
alert('Nhận thưởng thành công. Bạn nhận được {$do[tenvatpham]} ' );
</script>";   
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='".$do['id']."', 
 `loai`='".$do['loai']."', 
 `id_loai`='".$do['id_loai']."', 
 `tenvatpham` = '".$do['tenvatpham']."', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
}
if ($rand==9){
    $do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='1943'"));
     echo"
<script>
alert('Nhận thưởng thành công. Bạn nhận được {$do[tenvatpham]} ' );
</script>";   
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='".$do['id']."', 
 `loai`='".$do['loai']."', 
 `id_loai`='".$do['id_loai']."', 
 `tenvatpham` = '".$do['tenvatpham']."', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
}
if ($rand==10){
    $do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='1944'"));
     echo"
<script>
alert('Nhận thưởng thành công. Bạn nhận được {$do[tenvatpham]} ' );
</script>";   
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='".$do['id']."', 
 `loai`='".$do['loai']."', 
 `id_loai`='".$do['id_loai']."', 
 `tenvatpham` = '".$do['tenvatpham']."', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
}
if ($rand==11){
    $do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2726'"));
     echo"
<script>
alert('Nhận thưởng thành công. Bạn nhận được {$do[tenvatpham]} ' );
</script>";   
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='".$do['id']."', 
 `loai`='".$do['loai']."', 
 `id_loai`='".$do['id_loai']."', 
 `tenvatpham` = '".$do['tenvatpham']."', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
}
if ($rand==12){
    $do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2727'"));
     echo"
<script>
alert('Nhận thưởng thành công. Bạn nhận được {$do[tenvatpham]} ' );
</script>";   
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='".$do['id']."', 
 `loai`='".$do['loai']."', 
 `id_loai`='".$do['id_loai']."', 
 `tenvatpham` = '".$do['tenvatpham']."', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
}
if ($rand==13){
    $do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2728'"));
     echo"
<script>
alert('Nhận thưởng thành công. Bạn nhận được {$do[tenvatpham]} ' );
</script>";   
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='".$do['id']."', 
 `loai`='".$do['loai']."', 
 `id_loai`='".$do['id_loai']."', 
 `tenvatpham` = '".$do['tenvatpham']."', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
}
if ($rand==14){
    $do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2755'"));
     echo"
<script>
alert('Nhận thưởng thành công. Bạn nhận được {$do[tenvatpham]} ' );
</script>";   
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='".$do['id']."', 
 `loai`='".$do['loai']."', 
 `id_loai`='".$do['id_loai']."', 
 `tenvatpham` = '".$do['tenvatpham']."', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
}
if ($rand==15){
    $do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2756'"));
     echo"
<script>
alert('Nhận thưởng thành công. Bạn nhận được {$do[tenvatpham]} ' );
</script>";   
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='".$do['id']."', 
 `loai`='".$do['loai']."', 
 `id_loai`='".$do['id_loai']."', 
 `tenvatpham` = '".$do['tenvatpham']."', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
}
if ($rand==16){
    $do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2757'"));
     echo"
<script>
alert('Nhận thưởng thành công. Bạn nhận được {$do[tenvatpham]} ' );
</script>";   
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='".$do['id']."', 
 `loai`='".$do['loai']."', 
 `id_loai`='".$do['id_loai']."', 
 `tenvatpham` = '".$do['tenvatpham']."', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
}
if ($rand==17){
    $do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2758'"));
     echo"
<script>
alert('Nhận thưởng thành công. Bạn nhận được {$do[tenvatpham]} ' );
</script>";   
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='".$do['id']."', 
 `loai`='".$do['loai']."', 
 `id_loai`='".$do['id_loai']."', 
 `tenvatpham` = '".$do['tenvatpham']."', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
}
if ($rand==18){
    $do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2759'"));
     echo"
<script>
alert('Nhận thưởng thành công. Bạn nhận được {$do[tenvatpham]} ' );
</script>";   
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='".$do['id']."', 
 `loai`='".$do['loai']."', 
 `id_loai`='".$do['id_loai']."', 
 `tenvatpham` = '".$do['tenvatpham']."', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
}
    if ($rand==19){
    $do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2760'"));
     echo"
<script>
alert('Nhận thưởng thành công. Bạn nhận được {$do[tenvatpham]} ' );
</script>";   
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='".$do['id']."', 
 `loai`='".$do['loai']."', 
 `id_loai`='".$do['id_loai']."', 
 `tenvatpham` = '".$do['tenvatpham']."', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
}  
    if ($rand==20){
    $do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='493'"));
     echo"
<script>
alert('Nhận thưởng thành công. Bạn nhận được {$do[tenvatpham]} ' );
</script>";   
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='".$do['id']."', 
 `loai`='".$do['loai']."', 
 `id_loai`='".$do['id_loai']."', 
 `tenvatpham` = '".$do['tenvatpham']."', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
}  
   if ($rand==21){
    $do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='494'"));
     echo"
<script>
alert('Nhận thưởng thành công. Bạn nhận được {$do[tenvatpham]} ' );
</script>";   
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='".$do['id']."', 
 `loai`='".$do['loai']."', 
 `id_loai`='".$do['id_loai']."', 
 `tenvatpham` = '".$do['tenvatpham']."', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
} 
   if ($rand==22){
    $do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='495'"));
     echo"
<script>
alert('Nhận thưởng thành công. Bạn nhận được {$do[tenvatpham]} ' );
</script>";   
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='".$do['id']."', 
 `loai`='".$do['loai']."', 
 `id_loai`='".$do['id_loai']."', 
 `tenvatpham` = '".$do['tenvatpham']."', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
}  
   if ($rand==23){
    $do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='779'"));
     echo"
<script>
alert('Nhận thưởng thành công. Bạn nhận được {$do[tenvatpham]} ' );
</script>";   
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='".$do['id']."', 
 `loai`='".$do['loai']."', 
 `id_loai`='".$do['id_loai']."', 
 `tenvatpham` = '".$do['tenvatpham']."', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
}
   if ($rand==24){
    $do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='780'"));
     echo"
<script>
alert('Nhận thưởng thành công. Bạn nhận được {$do[tenvatpham]} ' );
</script>";   
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='".$do['id']."', 
 `loai`='".$do['loai']."', 
 `id_loai`='".$do['id_loai']."', 
 `tenvatpham` = '".$do['tenvatpham']."', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
}
   if ($rand==25){
    $do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='781'"));
     echo"
<script>
alert('Nhận thưởng thành công. Bạn nhận được {$do[tenvatpham]} ' );
</script>";   
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='".$do['id']."', 
 `loai`='".$do['loai']."', 
 `id_loai`='".$do['id_loai']."', 
 `tenvatpham` = '".$do['tenvatpham']."', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
}
   if ($rand==26){
    $do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='1345'"));
     echo"
<script>
alert('Nhận thưởng thành công. Bạn nhận được {$do[tenvatpham]} ' );
</script>";   
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='".$do['id']."', 
 `loai`='".$do['loai']."', 
 `id_loai`='".$do['id_loai']."', 
 `tenvatpham` = '".$do['tenvatpham']."', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
}
 if ($rand==27){
    $do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='1346'"));
     echo"
<script>
alert('Nhận thưởng thành công. Bạn nhận được {$do[tenvatpham]} ' );
</script>";   
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='".$do['id']."', 
 `loai`='".$do['loai']."', 
 `id_loai`='".$do['id_loai']."', 
 `tenvatpham` = '".$do['tenvatpham']."', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
}
 if ($rand==28){
    $do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='1347'"));
     echo"
<script>
alert('Nhận thưởng thành công. Bạn nhận được {$do[tenvatpham]} ' );
</script>";   
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='".$do['id']."', 
 `loai`='".$do['loai']."', 
 `id_loai`='".$do['id_loai']."', 
 `tenvatpham` = '".$do['tenvatpham']."', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
}
 if ($rand==29){
    $do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='1348'"));
     echo"
<script>
alert('Nhận thưởng thành công. Bạn nhận được {$do[tenvatpham]} ' );
</script>";   
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='".$do['id']."', 
 `loai`='".$do['loai']."', 
 `id_loai`='".$do['id_loai']."', 
 `tenvatpham` = '".$do['tenvatpham']."', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
}
 if ($rand==30){
    $do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='1349'"));
     echo"
<script>
alert('Nhận thưởng thành công. Bạn nhận được {$do[tenvatpham]} ' );
</script>";   
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='".$do['id']."', 
 `loai`='".$do['loai']."', 
 `id_loai`='".$do['id_loai']."', 
 `tenvatpham` = '".$do['tenvatpham']."', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
}
 if ($rand==31){
    $do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='1350'"));
     echo"
<script>
alert('Nhận thưởng thành công. Bạn nhận được {$do[tenvatpham]} ' );
</script>";   
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='".$do['id']."', 
 `loai`='".$do['loai']."', 
 `id_loai`='".$do['id_loai']."', 
 `tenvatpham` = '".$do['tenvatpham']."', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
}
 if ($rand==32){
    $do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2729'"));
     echo"
<script>
alert('Nhận thưởng thành công. Bạn nhận được {$do[tenvatpham]} ' );
</script>";   
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='".$do['id']."', 
 `loai`='".$do['loai']."', 
 `id_loai`='".$do['id_loai']."', 
 `tenvatpham` = '".$do['tenvatpham']."', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
}
 if ($rand==33){
    $do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2730'"));
     echo"
<script>
alert('Nhận thưởng thành công. Bạn nhận được {$do[tenvatpham]} ' );
</script>";   
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='".$do['id']."', 
 `loai`='".$do['loai']."', 
 `id_loai`='".$do['id_loai']."', 
 `tenvatpham` = '".$do['tenvatpham']."', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
}
 if ($rand==34){
    $do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2731'"));
     echo"
<script>
alert('Nhận thưởng thành công. Bạn nhận được {$do[tenvatpham]} ' );
</script>";   
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='".$do['id']."', 
 `loai`='".$do['loai']."', 
 `id_loai`='".$do['id_loai']."', 
 `tenvatpham` = '".$do['tenvatpham']."', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
}
 if ($rand==35){
    $do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2732'"));
     echo"
<script>
alert('Nhận thưởng thành công. Bạn nhận được {$do[tenvatpham]} ' );
</script>";   
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='".$do['id']."', 
 `loai`='".$do['loai']."', 
 `id_loai`='".$do['id_loai']."', 
 `tenvatpham` = '".$do['tenvatpham']."', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
}
 if ($rand==36){
    $do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2733'"));
     echo"
<script>
alert('Nhận thưởng thành công. Bạn nhận được {$do[tenvatpham]} ' );
</script>";   
mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='".$do['id']."', 
 `loai`='".$do['loai']."', 
 `id_loai`='".$do['id_loai']."', 
 `tenvatpham` = '".$do['tenvatpham']."', 
 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");
}
mysql_query("UPDATE `users` SET `vitri`='0' WHERE `id`='{$user_id}'");
?>
<meta http-equiv="refresh" content="2;url=http://thitranvuive.xyz/sanbay/aicap"> 
<?php
}

    
    
}
?>