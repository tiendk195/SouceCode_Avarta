<?php

define('_IN_JOHNCMS', 1);
require_once('../incfiles/core.php');
$textl = 'Khu sinh thái';
require('../incfiles/head.php');

$res = mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id` = '".$user_id."' AND `id_shop`='7' LIMIT 1"));
$vc = mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id` = '".$user_id."' AND `id_shop`='98' LIMIT 1"));

if(!$user_id){
echo '<div class="main-xmenu">
<div class="phdr"><b>Lỗi Truy Cập</b></div>';
echo '<div class="menu list-top">Vui lòng đăng nhập để sử dụng tính năng này!</div>';
echo '</div>';
require('../incfiles/end.php');
exit;
}
$checkcc=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='cancau' AND `id_loai`='3'"));
$checkcc2=mysql_num_rows(mysql_query("SELECT * FROM `dangmac` WHERE `user_id`='".$user_id."' AND `loai`='cancau' AND `id_loai`='3'"));
$checkcc3=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='cancau' AND `id_loai`='2'"));
$checkcc4=mysql_num_rows(mysql_query("SELECT * FROM `dangmac` WHERE `user_id`='".$user_id."' AND `loai`='cancau' AND `id_loai`='2'"));
if($checkcc < 1 and $checkcc3 < 1 ){
	echo'<div class="phdr"><b>Lỗi Truy Cập</b></div>';

	echo'<div class="omenu"><b><font color="red">Lỗi!</font></b> Bạn chưa sở hữu cần câu <a href="shop.php">Đến cửa hàng</a></div>';
	    require_once ('../incfiles/end.php');
    exit;
}
if($checkcc2 < 1 and $checkcc4 < 1){
		echo'<div class="phdr"><b>Lỗi Truy Cập</b></div>';

	echo'<div class="omenu"><b><font color="red">Lỗi!</font></b> Bạn chưa mặc cần câu <a href="/ruong">Đến rương đồ</a></div>';
	    require_once ('../incfiles/end.php');
    exit;
}
if($vc['soluong'] < 1 ){
		echo'<div class="phdr">Lỗi yêu cầu</div>';

	echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn chưa có vé câu cá mập <img src="/images/vatpham/98.png"> , hãy đến cửa hàng để mua <a href="shop.php">Đến cửa hàng</a></div>';
	    require_once ('../incfiles/end.php');
    exit;
}
mysql_query("UPDATE `users` SET `vitri` = '23' WHERE `id` = '".$user_id."'");

echo '<style>
.honuoc {
background: #5dbdf5 url("img/honuoc.png") repeat-x bottom;
margin: -0px -1px -0px -1px;
padding-top: 100px;
}
.da {
background: url("img/da.png");
margin: -0px -1px -0px -1px;
padding: 5px;
}
.vaocau {
background: url("img/vaocau.png") no-repeat bottom center;
padding-top: 52px;
text-align: center;
}
.congdong {
background: #f4faed;
border-left: 1px solid #e0e0e0;
border-right: 1px solid #e0e0e0;
}
.list-bottom {
border-bottom: 1px dashed #ddd;
}
.danhmuc {
background: #78b6cf url(img/danhmuc.png) repeat-x bottom;
border-top: 3px solid #65a7bf;
padding: 3px 6px;
color: #fff;
margin: -5px -5px 2px -5px;
font-weight: bold;
}
.honuoccauca {
background: #5dbdf5 url("img/honuoccauca.png") repeat-x bottom;
margin: -0px -1px -0px -1px;
padding-top: 10px;
}
.datcauca {
background: url("img/datcauca.png") no-repeat bottom center;
text-align: center;
padding-top: 160px;
}
.ngoicau {
background: url("img/ngoicau.png") no-repeat bottom left;
text-align: left;
padding: 168px 0px 24px 38px;
}
</style>';
$act = $_GET['act'];
switch ($act) {
default:
header('Location: /cauca/');

break;
case 'cauca':
echo'<div class="main-xmenu">
<div class="phdr"><a href="/khugiaitri">Giải trí</a> | Câu cá</div><div class="honuoccauca">
<div class="datcauca">
<a href="?act=batdau">
<form method="post">
<input type="submit" name="batdau" value="Bắt đầu">
</form></a>';
//-- Tìm kiếm users ---//
$online_u = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `vitri` = '23'"), 0);
$totalonline = $online_u;
$q = @mysql_query("select * from `users` where `lastdate` > " . (time() - 300) . " AND `vitri` = '23';");
$count = mysql_num_rows($q);
while ($arr = mysql_fetch_array($q)){
$trinhtrangvip = mysql_query("select `rights` from `users` where id='" . $arr['id'] . "'");
$trinhtrangviphonnua = mysql_fetch_array($trinhtrangvip);
if($arr['id'] != $datauser['id']){
$u_on[]='<a href="/member/' . $arr['id'] . '.html"><img src="/avatar/' . $arr['id'] . '.png"></a>';
}else{
}
}
//Keet thuc tim kiem
echo'  <a id="myImage" href="/member/'.$user_id.'.html"><label style="display: inline-block;text-align: center;"><b style="font-size: 9px;color:red;font-weight:bold;text-align: center;"></b><br><img src="/avatar/'.$user_id.'.png"></label></a></center>'; 
if ($online_u > 0){
echo implode(' ',$u_on).'';
}

//echo'<img src="/avatar/' . $datauser['id'] . '.png" alt="' . $datauser['name'] . '" style="vertical-align: 20px;">';
echo'
</div>
</div>
</div>';
echo'<form>
<center><input type="button" class="nut" name="len" onclick="Len();" value="↑↑"></br><div class="xd"></div>
<input type="button" class="nut" name="trai" onclick="Trai();" value="<<">
<input type="button" class="nut" name="ok" onclick="ok" value="Oki">
<input type="button" class="nut" name="phai" onclick="Phai();" value=">>"><br><div class="xd"></div>
<input type="button" class="nut" name="xuong" onclick="Xuong();" value="↓↓">  
</center>
</form>';
if(isset($_POST['batdau'])) {
header('Location: ?act=batdau');
}

break;
case 'batdau':
echo'
<div class="main-xmenu">
<div class="phdr"><a href="/khugiaitri">Giải trí</a> | Câu cá</div><div class="honuoccauca">
<div class="ngoicau">
<img src="/avatar/' . $datauser['id'] . '.png" alt="' . $datauser['name'] . '" style="vertical-align: 20px;">

<a href="?act=giang">
<form method="post">
<input type="submit" name="giang" value="Giăng">
</form>
</a>
</div></div></div>';
echo'<div class="menu">Xu : '.number_format($datauser['xu']).' - Câu được : '.$datauser['soca'].' con cá - Mồi câu còn : '.$res['soluong'].' - <a href="/cauca">Quay về Khu sinh thái</a></div>';
echo'<div class="pmenu"><center>Level: <font color="red">'.number_format($datauser['levelca']).'+'.number_format($datauser['chisolevelca']).'%</font></center></div>';

if(isset($_POST['giang'])) {
header('Location: ?act=giang');
}
break;
case 'giang':

	
if(isset($_POST['giat'])) {
if ($datauser['levelca']>=0 && $datauser['levelca']<2 && $checkcc2 >= 1 ){

	$rand=rand(1,8);
} else if ($datauser['levelca']>=0 && $datauser['levelca']<2 && $checkcc4 >= 1 ){
	$rand=rand(1,10);
	

} else if ($datauser['levelca']>=2 && $datauser['levelca']<4 && $checkcc2 >= 1){
	$rand=rand(1,7);
	} else if ($datauser['levelca']>=2 && $datauser['levelca']<4 && $checkcc4 >= 1){
	$rand=rand(1,8);
	

} else if ($datauser['levelca']>=4 && $checkcc2 >= 1){
	$rand=rand(1,5);
	} else if ($datauser['levelca']>=4 && $checkcc4 >= 1){
	$rand=rand(1,7);
}

	if ($datauser[lastpost]>time()) {
		    echo"<script>
alert('Cá đang cắn câu, hãy kiên nhẫn chờ đợi!' );
    </script>";

header('Location: ?act=batdau');

	exit;
	}
	


echo'
<div class="main-xmenu">
<div class="phdr"><a href="/khugiaitri">Giải trí</a> | Câu cá</div><div class="honuoccauca">
<div class="ngoicau">
<img src="/avatar/' . $datauser['id'] . '.png" alt="' . $datauser['name'] . '" style="vertical-align: 20px;">

<a href="?act=giang">
<form method="post">
<input type="submit" name="giang" value="Giăng">
</form>
</a>
</div></div></div>';
if ($res['soluong']<1) {
			echo'<div class="omenu"><b><font color="red">Lỗi!</font></b> Bạn đã hết mồi câu <a href="/ruong">Đến rương đồ</a></div>';
	    require_once ('../incfiles/end.php');
    exit;
}

if ($datauser['levelca']>=0 && $datauser['levelca']<2){
mysql_query("UPDATE `users` SET `chisolevelca`=`chisolevelca` +'10' WHERE `id`='".$user_id."'");
} else if ($datauser['levelca']>=2 && $datauser['levelca']<4){
mysql_query("UPDATE `users` SET `chisolevelca`=`chisolevelca` +'5' WHERE `id`='".$user_id."'");
} else if ($datauser['levelca']>=4){
mysql_query("UPDATE `users` SET `chisolevelca`=`chisolevelca` +'2' WHERE `id`='".$user_id."'");
}
/*
  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '242'");

		  $text='Bạn đã nhận được 1 Bóng thường  từ Câu cá ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
*/
$randsn=rand(1,12);
	///ngoc rong
    if ($datauser['matna']=='261'){
         $randnr=rand(1,7);
   
    } else {
    $randnr=rand(1,10);
    }
    if ($randnr==1){
       echo'<script>alert("Bạn nhận được ngọc rồng 7 sao");</script>';
     mysql_query("UPDATE `vatpham` SET `soluong`=`soluong` +'1' WHERE `user_id`='{$user_id}' AND `id_shop`='275'");
}
//ngoc rong


$randsk=rand(1,200);
if ($randsk==1) {
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `id_shop`='125' AND `user_id`='".$user_id."'");
echo 'Bạn đã câu trúng 1 mảnh 1stpay <img src="/images/vatpham/125.png"><br/>';
$text = 'Bạn đã câu trúng 1 mảnh 1stpay <img src="/images/vatpham/125.png"> từ Câu cá';
mysql_query("INSERT INTO `thongbao` SET
                `id` = '1',
                `user` = '".$user_id."',
                `text` = '$text',
                `ok` = '1',
                `time` = '" . time() . "'
            ");
}
$checknv=mysql_num_rows(mysql_query("SELECT * FROM `nhiemvu_user` WHERE `user_id`='".$user_id."' AND `id_nv`='1'"));
if ($checknv>0) {
mysql_query("UPDATE `nhiemvu_user` SET `tiendo`=`tiendo`+'1' WHERE `user_id`='".$user_id."' AND `id_nv`='1'");
}
    //Nhiệm vụ SSM
    $res2=mysql_query("SELECT * FROM `ssm_nhiemvu_user` WHERE `user_id`='".$user_id."' AND `kichhoat`='1' ORDER BY `id` ");

while($ssm=mysql_fetch_array($res2)) {
    $ssm2 = mysql_fetch_array(mysql_query("SELECT * FROM `ssm_nhiemvu` WHERE `id`='{$ssm['id_shop']}'"));
    if ($ssm2['loai']=='caucamap'){
            mysql_query("UPDATE `ssm_nhiemvu_user` SET `tiendo`= `tiendo` + '1' WHERE `user_id`='{$user_id}' AND `id` = '{$ssm['id']}' ");
    }
}
//Nhiệm vụ SSM
/*
$randsn=rand(1,10);
	if ($datauser['gioihancauca']<60){
		if ($randsn==1){
		    echo' <div class="omenu">Bạn nhận được 1 số 1 yêu thương <img src="/images/vatpham/158.png"></br></div>';
mysql_query("UPDATE `users` SET `gioihancauca` =`gioihancauca` + '1'  WHERE `id` = '{$user_id}'");
  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '158'");

	}
	}
	*/
mysql_query("UPDATE `users` SET `exp`=`exp`+'5000' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `users` SET `tim1st`=`tim1st`+'10' WHERE `id`='".$user_id."'");
$text = 'Bạn nhận được 10 tim <img src="https://i.imgur.com/ZL9ehAx.gif"> từ Câu cá';
mysql_query("INSERT INTO `thongbao` SET
                `id` = '1',
                `user` = '".$user_id."',
                `text` = '$text',
                `ok` = '1',
                `time` = '" . time() . "'
            ");
mysql_query("UPDATE `users` SET `lastpost`='".time()."'+'5' WHERE `id`='".$user_id."'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop`='7'");


if ($rand==1){
	echo'<div class="omenu">Bạn câu được 1 Cá chim <img src="idca/4.png"></div>';
		mysql_query("UPDATE `ca_ruong` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_ca`='4'");
mysql_query("UPDATE `users` SET `soca` = `soca` + '1' WHERE `id` = '".$user_id."'");

}
if ($rand==2){
	echo'<div class="omenu">Bạn câu được 1 Cá ngựa <img src="idca/5.png"></div>';
		mysql_query("UPDATE `ca_ruong` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_ca`='5'");
mysql_query("UPDATE `users` SET `soca` = `soca` + '1' WHERE `id` = '".$user_id."'");

}
if ($rand==3){
	echo'<div class="omenu">Bạn câu được 1 Cá đuối <img src="idca/6.png"></div>';
		mysql_query("UPDATE `ca_ruong` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_ca`='6'");
mysql_query("UPDATE `users` SET `soca` = `soca` + '1' WHERE `id` = '".$user_id."'");

}
if ($rand==4){
	echo'<div class="omenu">Bạn câu được 1 Cá mập <img src="idca/7.png"></div>';
		mysql_query("UPDATE `ca_ruong` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_ca`='7'");
mysql_query("UPDATE `users` SET `soca` = `soca` + '1' WHERE `id` = '".$user_id."'");
$bot = 'Chúc mừng @'.$user_id.' vừa câu được [b]1 Cá mập[/b] từ Câu cá';
/*
mysql_query("INSERT INTO `guest` SET
`adm` = '0',
`time` = '$time',
`user_id` = '2',
`name` = 'BOT',
`text` = '" .$bot . "',
`ip` = '0000',
`browser` = 'IPHONE'
");
*/

}
if ($rand>=5){
	echo'<div class="omenu">Bạn câu trật rồi!! Cá đã chạy mất</div>';
} 



echo'<div class="menu">Xu : '.number_format($datauser['xu']).' - Câu được : '.$datauser['soca'].' con cá - Mồi câu còn : '.$res['soluong'].' - <a href="/cauca">Quay về Khu sinh thái</a></div>';
echo'<div class="pmenu"><center>Level: <font color="red">'.number_format($datauser['levelca']).'+'.number_format($datauser['chisolevelca']).'%</font></center></div>';
} else {

echo'<div class="main-xmenu">
<div class="phdr"><a href="/khugiaitri">Giải trí</a> | Câu cá</div><div class="honuoccauca">
<div class="ngoicau">
<img src="/avatar/' . $datauser['id'] . '.png" alt="' . $datauser['name'] . '" style="vertical-align: 20px;">
<img src="img/giangcau.png" alt="icon" style="vertical-align: -6px;">';

?>


<script type="text/javascript"> 
setTimeout(function(){
 $( "#datamap" ).load( "map-load.php" );
 }, 3000);
</script>
<?php

echo'<span id="datamap"></span>';


//echo'<form action="?act=giang" method="post"><input type="submit" name="giat" id="giat" value="Giật" style=""></form>';

echo'
</div></div></div>';
echo'<div class="omenu"><center> Cá đang cắn câu, hãy kiên trì đợi <img src="/images/load.gif"></center></div>';

}



$nl = rand(1,3);



break;
}

require('../incfiles/end.php');
?>