<?php
define('_IN_JOHNCMS',1);
header('Content-Type: text/html; charset=utf-8');
require('../incfiles/core.php');

if ($datauser['choxu']>10000000) {
  $r = rand(1,3);
  
}
if ($datauser['choxu']>=0 and $datauser['choxu']<=100000) {
  $r = rand(1,1000);
  
}
if ($datauser['choxu']>100000 and $datauser['choxu']<=1000000) {
  $r = rand(1,100);
  
}
if ($datauser['choxu']>1000000 and $datauser['choxu']<=10000000) {
  $r = rand(1,50);
  
}
$time = time();

if (isset($_POST['ok'])) {

$xu = $_POST['xu'];
echo'<center>';
if($xu < 0)
{
echo'<div class="omenu">Lỗi! Số tiền bạn đặt không hợp lệ!</div>';
}
else
if($xu > $datauser['xu'])
{
echo'<div class="omenu">Bạn không đủ tiền để đặt cược</div>';
}
else
{
 if (empty($xu)) {
			echo '<div class="omenu">Lỗi... Bạn chưa nhập xu</div>';
} else 
    { 
        
            //Nhiệm vụ SSM
    $res2=mysql_query("SELECT * FROM `ssm_nhiemvu_user` WHERE `user_id`='".$user_id."' AND `kichhoat`='1' ORDER BY `id` ");

while($ssm=mysql_fetch_array($res2)) {
    $ssm2 = mysql_fetch_array(mysql_query("SELECT * FROM `ssm_nhiemvu` WHERE `id`='{$ssm['id_shop']}'"));
    if ($ssm2['loai']=='anxin'){
            mysql_query("UPDATE `ssm_nhiemvu_user` SET `tiendo`= `tiendo` + '1' WHERE `user_id`='{$user_id}' AND `id` = '{$ssm['id']}' ");
    }
}
//Nhiệm vụ SSM
        
echo'<div class="omenu">Cho thành công '.number_format($xu).' xu!</div>';
echo'</center>';
/*
$randsn=rand(1,10);
	if ($datauser['gioihananxin']<20){
		if ($randsn==1){
		    echo' <div class="omenu">Bạn nhận được 1 số 1 yêu thương <img src="/images/vatpham/158.png"></br></div>';
mysql_query("UPDATE `users` SET `gioihananxin` =`gioihananxin` + '1'  WHERE `id` = '{$user_id}'");
  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '158'");

	}
	}
*/

$checknv3=mysql_num_rows(mysql_query("SELECT * FROM `nhiemvu_user` WHERE `user_id`='".$user_id."' AND `id_nv`='21'"));
if ($checknv3>0) {
mysql_query("UPDATE `nhiemvu_user` SET `tiendo`=`tiendo`+'1' WHERE `user_id`='".$user_id."' AND `id_nv`='21'");
}

mysql_query("UPDATE `users` SET`choxu`=`choxu`+'$xu', `xu`=`xu`-'$xu' WHERE `id` = '".$user_id."'");
		    if ($r==1) {
		        		        $query=mysql_query("SELECT * FROM `khodo` WHERE `id_shop`='1977' AND `user_id`='".$user_id."'");
		    
$check=mysql_num_rows($query);
if ($check<1) {
		        echo'<div class="omenu"><b>Bạn nhận được <font color="red">Tóc ăn xin</font></b></div>';

	

mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='1977', 
 `loai`='toc',
 `tenvatpham` = 'Ăn xin', 
  `id_loai`='205',

 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");

 $bot = ' @'.$login.' Vừa nhận được Tóc ăn xin, chúc mừng :O';
mysql_query("INSERT INTO `guest` SET
`adm` = '0',
`time` = '$time',
`user_id` = '2',
`name` = 'BOT',
`text` = '" . mysql_real_escape_string($bot) . "',
`ip` = '0000',
`browser` = 'IPHONE'
");
} else {
		      // echo'<div class="omenu"><b><font color="red">Bạn nhận được Tóc ăn xin, do đã sở hữu nên sẽ không nhận nữa!</font></b></div>';


}

		    }
    }
		    if ($r==2) {
		        		        $query=mysql_query("SELECT * FROM `khodo` WHERE `id_shop`='1978' AND `user_id`='".$user_id."'");
$check=mysql_num_rows($query);
if ($check<1) {
		        echo'<div class="omenu"><b>Bạn nhận được <font color="red">Áo ăn xin</font></b></div>';

	

mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='1978', 
 `loai`='ao',
 `tenvatpham` = 'Ăn xin', 
  `id_loai`='428',

 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");

 $bot = ' @'.$login.' Vừa nhận được Áo ăn xin, chúc mừng :O';
mysql_query("INSERT INTO `guest` SET
`adm` = '0',
`time` = '$time',
`user_id` = '2',
`name` = 'BOT',
`text` = '" . mysql_real_escape_string($bot) . "',
`ip` = '0000',
`browser` = 'IPHONE'
");
} else {
		       // echo'<div class="omenu"><b><font color="red">Bạn nhận được Áo ăn xin, do đã sở hữu nên sẽ không nhận nữa!</font></b></div>';


}

		    }
		    if ($r==3) {
		        		        $query=mysql_query("SELECT * FROM `khodo` WHERE `id_shop`='1979' AND `user_id`='".$user_id."'");
$check=mysql_num_rows($query);
if ($check<1) {
		        echo'<div class="omenu"><b>Bạn nhận được <font color="red">Quần ăn xin</font></b></div>';

	

mysql_query("INSERT INTO `khodo` SET
 `user_id`='".$user_id."', 
 `id_shop`='1979', 
 `loai`='quan',
 `tenvatpham` = 'Ăn xin', 
  `id_loai`='237',

 `hp`='0',
 `sucmanh`='0',
 `timesudung`='0'");

 $bot = ' @'.$login.' Vừa nhận được Quần ăn xin, chúc mừng :O';
mysql_query("INSERT INTO `guest` SET
`adm` = '0',
`time` = '$time',
`user_id` = '2',
`name` = 'BOT',
`text` = '" . mysql_real_escape_string($bot) . "',
`ip` = '0000',
`browser` = 'IPHONE'
");
} else {
		       // echo'<div class="omenu"><b><font color="red">Bạn nhận được Quần ăn xin, do đã sở hữu nên sẽ không nhận nữa!</font></b></div>';


}

		    } 


}
echo'</center>';
}
echo'<div class="lethinhIT">';
echo'<center>';

echo'<div class="omenu">';
echo'<b><font color="red">Cho ăn xin có tỉ lệ rơi đồ ăn xin cực hot </font></b></br>';
echo'<img src="anxin.gif"/><br><b> Lạy ông đi qua,lại bà đi lại!</br>
Xin hãy bố thí cho con vài trăm triệu để đổi đời với ạ ^^</b></div>';

echo'<div class="omenu"><form method="post">
<input type="number" name="xu" id="xu" placeholder="Nhập xu">

	</br><input class="nut" type="submit" name="ok" id="lethinhdz" value="Cho xu"> </form></div>';
	
	
echo'</center>';
/*
echo'<div class="phdr">Cá nhân</div>';
echo'<div class="omenu">';
echo'<b>Đã cho <font color="red">'.number_format($datauser['choxu']).' xu</b></font></br>';
if ($datauser['choxu']<=0) {
    $tile = '0';
}
if ($datauser['choxu']>0 and $datauser['choxu']<=100000) {
    $tile = '1';
}
if ($datauser['choxu']>100000 and $datauser['choxu']<=1000000) {
    $tile = '10';
}
if ($datauser['choxu']>1000000 and $datauser['choxu']<=10000000) {
    $tile = '50';
}
if ($datauser['choxu']>10000000) {
    $tile = '100';
}
echo'<b>Tỉ lệ ra đồ ăn mày: <font color="green">'.$tile.'%</b></font></br>';
echo'<b>Cho trên 10.000.000 xu chắc chắn nhận được đồ!</b>';

echo'</div>';
echo'</div>';
*/