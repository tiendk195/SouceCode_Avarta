<?php
/*
Code Được Mod Bởi Lê Văn Thịnh
Code Mod By Lê Văn Thịnh
Vui Lòng Ghi Nguồn Nếu Có Sao Chép! 
*/
define('_IN_JOHNCMS',1);
include'../incfiles/core.php';
$textl ='Giả kim thuật';
include'../incfiles/head.php';
if(!$user_id){
header('location: /login.php');
include'../incfiles/end.php';
exit;
}
if ($datauser['kichhoat']==0){
    Header('location: '.$home.'/users/checkpoint.php');
    exit;
}
echo'<link rel="stylesheet" href="/giakimthuat/giaodien.css" type="text/css">';
    $ck=mysql_fetch_array(mysql_query("SELECT * FROM `giakimthuat_khaithac` WHERE  `id`='2' "));

echo'<div class="nenvip"> Hang động đá</div>';
echo'<div class="nenhd"></div>';
echo'<div class="phongcanhhd">
<img src="https://i.imgur.com/m8Lc01H.gif" style="position: absolute;verticalalign: 0 px;margin:0px 0 0 95px;">
<img src="https://i.imgur.com/m8Lc01H.gif" style="position: absolute;verticalalign: 0 px;margin:35px 0 0 155px;">
</div>';
echo'<div class="dat2hd">
<img src="https://i.imgur.com/54ELzv3.png" style="position: absolute;verticalalign: 0 px;margin:0px 0 0 15px;">
<img src="https://i.imgur.com/54ELzv3.png" style="position: absolute;verticalalign: 0 px;margin:0px 0 0 35px;">
<img src="https://i.imgur.com/spX00OG.png" style=" float: right">
</div>';
echo'<div class="dathd">';
mysql_query("UPDATE `users` SET `vitri` = '662' WHERE `id` = '".$user_id."'");

$online_u = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `lastdate` > " . (time() - 300) . " AND `vitri` = '662'"), 0);
$totalonline = $online_u;
$q = @mysql_query("select * from `users` where `lastdate` > " . (time() - 300) . " AND `vitri` = '662';");
$count = mysql_num_rows($q);
while ($arr = mysql_fetch_array($q)){
$trinhtrangvip = mysql_query("select `rights` from `users` where id='" . $arr['id'] . "'");
$trinhtrangviphonnua = mysql_fetch_array($trinhtrangvip);
if($arr['id'] != $datauser['id']){
$u_on[]='<a href="/member/' . $arr['id'] . '.html"><img src="/avatar/' . $arr['id'] . '.png"></a>';
}else{
	$u_on[]='<img src="/avatar/' . $arr['id'] . '.png">';
}
}
//Keet thuc topic
if ($online_u > 0){
echo implode(' ',$u_on).'';
}else{
	echo '<img src="/avatar/'.$user_id.'.png"/>';
}
echo'
<img src="https://i.imgur.com/0me7Szk.png" style="position: absolute;verticalalign: 0 px;margin:0px 0 0 55px;">
</div>';
echo'<div class="dathd">
<center>

<input type="submit"  value="'.$ck['soluong'].'/1000"><br>
<img src="https://i.imgur.com/b6IvJTP.png"><br>
<input id="submit" type="submit" onclick ="khaithacda('.$ck['id'].')" value="Khai thác"><div id="msg"></div>
</center>
</div>';
echo'<div class="dat2hd">
<img src="https://i.imgur.com/spX00OG.png" style="position: absolute;verticalalign: 0 px;margin:0px 0 0 25px;">
<img src="https://i.imgur.com/UsjMCQc.png" style="position: absolute;verticalalign: 0 px;margin:10px 0 0 65px;">
<img src="https://i.imgur.com/Fboxfqm.png" style=" float: right;verticalalign: 0 px;margin:-32px 0 0 0px;">
<a href="map1.php"><img src="/images/vao.gif" style=" float: right;verticalalign: 0 px;margin:-10px 0 0 0px;"></a>
</div>';
echo'<div class="vachdahd"></div>';

include'../incfiles/end.php';
?>
<script>

function khaithacda(id)
{
    $.ajax(
        {
            url : 'khaithac.php?ktd',
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