<?php
/*
Code Được Mod Bởi Lê Văn Thịnh
Code Mod By Lê Văn Thịnh
Vui Lòng Ghi Nguồn Nếu Có Sao Chép! 
*/
define('_IN_JOHNCMS',1);
include'../incfiles/core.php';
$textl ='Làng Ngọc Rồng';
include'../incfiles/head.php';
if(!$user_id){
header('location: /login.php');
include'../incfiles/end.php';
exit;
}

$nr8 = mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='285'"));
$nr = mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE  `user_id`='".$user_id."' "));
$nr1 = mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='269'"));
$nr2 = mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='270'"));
$nr3 = mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='271'"));
$nr4 = mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='272'"));
$nr5 = mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='273'"));
$nr6 = mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='274'"));
$nr7 = mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='275'"));


    echo'<div class="phdr">Làng Ngọc Rồng > NPC > Bà Hạt Mít > Nhập Ngọc Rồng</div>';

switch($act) {
default:
     
    echo'<div class="pmenu">';
    echo'<center><img src="https://i.imgur.com/HCZlPBR.gif"></br>';
    echo'Xin chào con, '.$datauser['name'].'. Chào mừng con gia nhập với làng nhé </br>';
         echo'<a href="?act=1">Hóa phép 1 sao</a>';
                  echo'</br><a href="?act=2">Hóa phép 2 sao</a>';
                  echo'</br><a href="?act=3">Hóa phép 3 sao</a>';
                  echo'</br><a href="?act=4">Hóa phép 4 sao</a>';
                  echo'</br><a href="?act=5">Hóa phép 5 sao</a>';
                  echo'</br><a href="?act=6">Hóa phép 6 sao</a>';



    echo'</center></div>';
break;
case '1':
   IF(Isset($_POST['ok'])){
    	$sl=trim($_POST['sl']);
    
    
    	    $giatien=$sl*7;
    	    $dv=$sl*20;




IF($nr2['soluong'] >= $giatien and $sl >0 and $nr8['soluong']>$dv){
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$giatien."' WHERE `user_id`='".$user_id."' AND `id_shop`='270'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$sl."' WHERE `user_id`='".$user_id."' AND `id_shop`='269'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$dv."' WHERE `user_id`='".$user_id."' AND `id_shop`='285'");
Echo'<div class="pmenu"><center><b><font color="red">Bạn đã hóa phép thành công 1 sao *'.$sl.'</font></b></center></div>';

}Else{
Echo'<div class="pmenu"><center><b><font color="red">Hóa phép thất bại !!<br>Bạn không đủ nguyên liệu</font></b></center></div>';
}


}

    

echo'<form method="post"><div class="pmenu"><center><img src="/images/vatpham/269.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px">
<br>Xác nhận hóa phép <font color="green">1 sao</font> với 7 viên <font color="red"> 2 sao</font> và 20 mảnh đá vụn <img src="/images/vatpham/285.png"> ?
<br> Nhập số lượng muốn hóa phép</br>
<input type="number" name="sl" value="1"><br>
<input class="submit" type="submit" name="ok" value="Hóa phép"> </center>
</div></form>';
    
   break;
case '2':
   IF(Isset($_POST['ok'])){
    	$sl=trim($_POST['sl']);
    
    
    	    $giatien=$sl*7;
    	    $dv=$sl*15;




IF($nr3['soluong'] >= $giatien and $sl >0 and $nr8['soluong']>$dv ){
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$giatien."' WHERE `user_id`='".$user_id."' AND `id_shop`='271'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$sl."' WHERE `user_id`='".$user_id."' AND `id_shop`='270'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$dv."' WHERE `user_id`='".$user_id."' AND `id_shop`='285'");
Echo'<div class="pmenu"><center><b><font color="red">Bạn đã hóa phép thành công 2 sao *'.$sl.'</font></b></center></div>';

}Else{
Echo'<div class="pmenu"><center><b><font color="red">Hóa phép thất bại !!<br>Bạn không đủ nguyên liệu</font></b></center></div>';
}


}

    

echo'<form method="post"><div class="pmenu"><center><img src="/images/vatpham/270.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px">
<br>Xác nhận hóa phép <font color="green">2 sao</font> với 7 viên <font color="red"> 3 sao</font> và 15 mảnh đá vụn <img src="/images/vatpham/285.png"> ?
<br> Nhập số lượng muốn hóa phép</br>
<input type="number" name="sl" value="1"><br>
<input class="submit" type="submit" name="ok" value="Hóa phép"> </center>
</div></form>';
break;
case '3':
   IF(Isset($_POST['ok'])){
    	$sl=trim($_POST['sl']);
    
    
    	    $giatien=$sl*7;
    	    $dv=$sl*10;




IF($nr4['soluong'] >= $giatien and $sl >0 and $nr8['soluong']>$dv){
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$giatien."' WHERE `user_id`='".$user_id."' AND `id_shop`='272'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$sl."' WHERE `user_id`='".$user_id."' AND `id_shop`='271'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$dv."' WHERE `user_id`='".$user_id."' AND `id_shop`='285'");
Echo'<div class="pmenu"><center><b><font color="red">Bạn đã hóa phép thành công 3 sao *'.$sl.'</font></b></center></div>';

}Else{
Echo'<div class="pmenu"><center><b><font color="red">Hóa phép thất bại !!<br>Bạn không đủ nguyên liệu</font></b></center></div>';
}


}

    

echo'<form method="post"><div class="pmenu"><center><img src="/images/vatpham/271.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px">
<br>Xác nhận hóa phép <font color="green">3 sao</font> với 7 viên <font color="red"> 4 sao</font> và 10 mảnh đá vụn <img src="/images/vatpham/285.png"> ?
<br> Nhập số lượng muốn hóa phép</br>
<input type="number" name="sl" value="1"><br>
<input class="submit" type="submit" name="ok" value="Hóa phép"> </center>
</div></form>';

break;
case '4':
   IF(Isset($_POST['ok'])){
    	$sl=trim($_POST['sl']);
    
    
    	    $giatien=$sl*7;
    	    $dv=$sl*7;




IF($nr5['soluong'] >= $giatien and $sl >0 and $nr8['soluong']>$dv ){
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$giatien."' WHERE `user_id`='".$user_id."' AND `id_shop`='273'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$sl."' WHERE `user_id`='".$user_id."' AND `id_shop`='272'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$dv."' WHERE `user_id`='".$user_id."' AND `id_shop`='285'");
Echo'<div class="pmenu"><center><b><font color="red">Bạn đã hóa phép thành công 4 sao *'.$sl.'</font></b></center></div>';

}Else{
Echo'<div class="pmenu"><center><b><font color="red">Hóa phép thất bại !!<br>Bạn không đủ nguyên liệu</font></b></center></div>';
}


}

    

echo'<form method="post"><div class="pmenu"><center><img src="/images/vatpham/272.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px">
<br>Xác nhận hóa phép <font color="green">4 sao</font> với 7 viên <font color="red"> 5 sao</font> và 7 mảnh đá vụn <img src="/images/vatpham/285.png"> ?
<br> Nhập số lượng muốn hóa phép</br>
<input type="number" name="sl" value="1"><br>
<input class="submit" type="submit" name="ok" value="Hóa phép"> </center>
</div></form>';

    break;
case '5':
   IF(Isset($_POST['ok'])){
    	$sl=trim($_POST['sl']);
    
    
    	    $giatien=$sl*7;
    	    $dv=$sl*5;




IF($nr6['soluong'] >= $giatien and $sl >0 and $nr8['soluong']>$dv){
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$giatien."' WHERE `user_id`='".$user_id."' AND `id_shop`='274'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$sl."' WHERE `user_id`='".$user_id."' AND `id_shop`='273'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$dv."' WHERE `user_id`='".$user_id."' AND `id_shop`='285'");
Echo'<div class="pmenu"><center><b><font color="red">Bạn đã hóa phép thành công 5 sao *'.$sl.'</font></b></center></div>';

}Else{
Echo'<div class="pmenu"><center><b><font color="red">Hóa phép thất bại !!<br>Bạn không đủ nguyên liệu</font></b></center></div>';
}


}

    

echo'<form method="post"><div class="pmenu"><center><img src="/images/vatpham/273.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px">
<br>Xác nhận hóa phép <font color="green">5 sao</font> với 7 viên <font color="red"> 6 sao</font> và 5 mảnh đá vụn <img src="/images/vatpham/285.png"> ?
<br> Nhập số lượng muốn hóa phép</br>
<input type="number" name="sl" value="1"><br>
<input class="submit" type="submit" name="ok" value="Hóa phép"> </center>
</div></form>';
 
    break;
case '6':
   IF(Isset($_POST['ok'])){
    	$sl=trim($_POST['sl']);
    
    
    	    $giatien=$sl*7;
    	    $dv=$sl*3;




IF($nr7['soluong'] >= $giatien and $sl >0 and $nr8['soluong']>$dv ){
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$giatien."' WHERE `user_id`='".$user_id."' AND `id_shop`='275'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$sl."' WHERE `user_id`='".$user_id."' AND `id_shop`='274'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$dv."' WHERE `user_id`='".$user_id."' AND `id_shop`='285'");
Echo'<div class="pmenu"><center><b><font color="red">Bạn đã hóa phép thành công 6 sao *'.$sl.'</font></b></center></div>';

}Else{
Echo'<div class="pmenu"><center><b><font color="red">Hóa phép thất bại !!<br>Bạn không đủ nguyên liệu</font></b></center></div>';
}


}

    

echo'<form method="post"><div class="pmenu"><center><img src="/images/vatpham/274.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px">
<br>Xác nhận hóa phép <font color="green">6 sao</font> với 7 viên <font color="red"> 7 sao</font> và 3 mảnh đá vụn <img src="/images/vatpham/285.png"> ?
<br> Nhập số lượng muốn hóa phép</br>
<input type="number" name="sl" value="1"><br>
<input class="submit" type="submit" name="ok" value="Hóa phép"> </center>
</div></form>';   
}
include'../incfiles/end.php';
?>
