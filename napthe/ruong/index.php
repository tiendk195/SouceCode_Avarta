<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');
$user=(int)$_GET['user'];
$checku=mysql_num_rows(mysql_query("SELECT * FROM `users` WHERE `id`='".$user."'"));
if ($checku>0) {
$ru=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$user."'"));
}

if ($checku<1) {
$headmod='Rương đồ';
$textl='Rương đồ';
} else {
$textl='Rương đồ của '.$ru['name'].'';
}
$map ='hoimau';
require('../incfiles/head.php');
if(!$user_id){
header('location: /index.html');
}
if ($checku>0) {
$user_id=$ru['id'];
}
if(time() - $datauser['timethuoc1'] < 120 || time() - $datauser['timethuoc2'] < 300){
echo'<div class="menu red">Lỗi !! Bạn không thể xem rương đồ trong trạng thái zombie</div>';
require('../incfiles/end.php');
exit;
}
include'mac.php';
include'thao.php';


    echo'<div class="gd_"><div class="pmenu"><center><a href="del.php?act=hsd"><font color="red"><i class="fa fa-trash-o" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px"></i></font></a>
<a href="thungrac.php"><font color="green"><i class="fa fa-trash" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px"></i></font></a>

<a href="/ruong"><font color="black"><i class="fa fa-refresh" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px"></i></font></a>

<a href="nangcapruong.php"><font color="red"><i class="fa fa-chevron-circle-up" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px"></i></font></a>
<a href="ruongicon.php"><font color="green"><i class="fa fa-gratipay" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px"></i></font></a>

</center><center><img src="/avatar/'.$user_id.'.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px">
</center><br><div style="overflow:scroll;height:110px"><table width="100%" border="0" cellspacing="0"><tbody><tr class="">

<td width="10%">';
$pro=mysql_fetch_array(mysql_query("SELECT * FROM `dangmac` WHERE `user_id`='".$user_id."' AND `loai`='toc'"));
if ($pro['id_ruong']>0){
    echo'<div class="gd_get">';

} else {
echo'<div class="gd_ruong">';
}
echo'<img onclick="hienvp(1)" src="img/1.png"></div></td>




<td width="10%">';
$pro=mysql_fetch_array(mysql_query("SELECT * FROM `dangmac` WHERE `user_id`='".$user_id."' AND `loai`='ao'"));
if ($pro['id_ruong']>0){
    echo'<div class="gd_get">';

} else {
echo'<div class="gd_ruong">';
}
echo'<img onclick="hienvp(2)" src="img/3.png"></div></td>

<td width="10%">';
$pro=mysql_fetch_array(mysql_query("SELECT * FROM `dangmac` WHERE `user_id`='".$user_id."' AND `loai`='quan'"));
if ($pro['id_ruong']>0){
    echo'<div class="gd_get">';

} else {
echo'<div class="gd_ruong">';
}
echo'<img onclick="hienvp(3)" src="img/4.png"></div></td>


<td width="10%">';
$pro=mysql_fetch_array(mysql_query("SELECT * FROM `dangmac` WHERE `user_id`='".$user_id."' AND `loai`='non'"));
if ($pro['id_ruong']>0){
    echo'<div class="gd_get">';

} else {
echo'<div class="gd_ruong">';
}

echo'<img onclick="hienvp(4)" src="img/2.png"></div></td>

<td width="10%">';
$pro=mysql_fetch_array(mysql_query("SELECT * FROM `dangmac` WHERE `user_id`='".$user_id."' AND `loai`='docamtay'"));
if ($pro['id_ruong']>0){
    echo'<div class="gd_get">';

} else {
echo'<div class="gd_ruong">';
}

echo'<img onclick="hienvp(5)" src="img/10.png"></div></td>

<td width="10%">';
$pro=mysql_fetch_array(mysql_query("SELECT * FROM `dangmac` WHERE `user_id`='".$user_id."' AND `loai`='matna'"));
if ($pro['id_ruong']>0){
    echo'<div class="gd_get">';

} else {
echo'<div class="gd_ruong">';
}

echo'<img onclick="hienvp(6)" src="img/6.png"></div></td>

<td width="10%">';
$pro=mysql_fetch_array(mysql_query("SELECT * FROM `dangmac` WHERE `user_id`='".$user_id."' AND `loai`='kinh'"));
if ($pro['id_ruong']>0){
    echo'<div class="gd_get">';

} else {
echo'<div class="gd_ruong">';
}

echo'<img onclick="hienvp(7)" src="img/8.png"></div></td>

<td width="10%">';
$pro=mysql_fetch_array(mysql_query("SELECT * FROM `dangmac` WHERE `user_id`='".$user_id."' AND `loai`='nensau'"));
if ($pro['id_ruong']>0){
    echo'<div class="gd_get">';

} else {
echo'<div class="gd_ruong">';
}

echo'<img onclick="hienvp(8)" src="img/19.png"></div></td>

</tr></tbody></table>
<table width="100%" border="0" cellspacing="0"><tbody><tr class=""><td width="10%">';

$pro=mysql_fetch_array(mysql_query("SELECT * FROM `dangmac` WHERE `user_id`='".$user_id."' AND `loai`='canh'"));
if ($pro['id_ruong']>0){
    echo'<div class="gd_get">';

} else {
echo'<div class="gd_ruong">';
}
echo'<img onclick="hienvp(9)" src="img/5.png"></div></td><td width="10%">';
$pro=mysql_fetch_array(mysql_query("SELECT * FROM `dangmac` WHERE `user_id`='".$user_id."' AND `loai`='thucung'"));
if ($pro['id_ruong']>0){
    echo'<div class="gd_get">';

} else {
echo'<div class="gd_ruong">';
}

echo'<img onclick="hienvp(10)" src="img/9.png"></div></td>
<td width="10%">';
$pro=mysql_fetch_array(mysql_query("SELECT * FROM `dangmac` WHERE `user_id`='".$user_id."' AND `loai`='cancau'"));
if ($pro['id_ruong']>0){
    echo'<div class="gd_get">';

} else {
echo'<div class="gd_ruong">';
}

echo'<img onclick="hienvp(11)" src="img/13.png"></div></td>
<td width="10%">';
$pro=mysql_fetch_array(mysql_query("SELECT * FROM `dangmac` WHERE `user_id`='".$user_id."' AND `loai`='haoquang'"));
if ($pro['id_ruong']>0){
    echo'<div class="gd_get">';

} else {
echo'<div class="gd_ruong">';
}

echo'<img onclick="hienvp(12)" src="img/7.png"></div></td>
<td width="10%">';
$pro=mysql_fetch_array(mysql_query("SELECT * FROM `dangmac` WHERE `user_id`='".$user_id."' AND `loai`='mat'"));
if ($pro['id_ruong']>0){
    echo'<div class="gd_get">';

} else {
echo'<div class="gd_ruong">';
}

echo'<img onclick="hienvp(13)" src="img/16.png"></div></td>
<td width="10%">';
$pro=mysql_fetch_array(mysql_query("SELECT * FROM `dangmac` WHERE `user_id`='".$user_id."' AND `loai`='khuonmat'"));
if ($pro['id_ruong']>0){
    echo'<div class="gd_get">';

} else {
echo'<div class="gd_ruong">';
}

echo'<img onclick="hienvp(14)" src="img/11.png"></div></td>
<td width="10%">';
$pro=mysql_fetch_array(mysql_query("SELECT * FROM `dangmac` WHERE `user_id`='".$user_id."' AND `loai`='fsfà'"));
if ($pro['id_ruong']>0){
    echo'<div class="gd_get">';

} else {
echo'<div class="gd_ruong">';
}

echo'<img onclick="hienvp(15)" src="img/14.png"></div></td>';
echo'
<td width="10%">';
if ($datauser['khung']>1){
   echo'<div class="gd_get">';
 
} else {
echo'<div class="gd_ruong">';
}
echo'<img onclick="hienvp(17)" src="img/18.png"></div></td></tr></tbody></table>';
echo'</div></div></div>';



echo'<div class="gd_"><div class="pmenu"><table width="100%" border="0" cellspacing="0"><tbody><tr class=""><td width="50%"><div class="gd_ruong_1">Danh sách</br><p id="msg"></p></div></td><td width="50%"><div class="gd_ruong_1">Trang bị</br><p id="msg"></p><p id="ttvp"></p></tr></tbody></table></div></div>';
echo'<div class="gd_"><div class="pmenu"><table width="100%" border="0" cellspacing="0"><tbody><tr class=""><td width="50%"><div class="gd_ruong_1">Khung </br><p id="ttvp1"></p></div></td>
<td width="50%"><div class="gd_ruong_1">Vật phẩm</br><p id="ttvp2"></p></div></td></tr></tbody></table></div></div>';






require('../incfiles/end.php');
?>

 

<script>
function hienvp(id)
{
    $.ajax(
        {
            url : 'hienvp-load.php',
            data : {id : id},
            type : 'POST',
            success : function(d)
            {
                $("#msg").html(d);
            }
        }
        
        );
}
</script>
<script>
function ttvp(id)
{
    $.ajax(
        {
            url : 'ttvp-load.php',
            data : {id : id},
            type : 'POST',
            success : function(d)
            {
                $("#ttvp").html(d);
            }
        }
        
        );
}
</script>
<script>
function ttvp1(id)
{
    $.ajax(
        {
            url : 'ttvp1.php',
            data : {id : id},
            type : 'POST',
            success : function(d)
            {
                $("#ttvp2").html(d);
            }
        }
        
        );
}
function ttkhung(id)
{
    $.ajax(
        {
            url : 'tt_khung-load.php',
            data : {id : id},
            type : 'POST',
            success : function(d)
            {
                $("#ttvp1").html(d);
            }
        }
        
        );
}
</script>