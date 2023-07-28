<?php
/*
Code Được Mod Bởi Lê Văn Thịnh
Code Mod By Lê Văn Thịnh
Vui Lòng Ghi Nguồn Nếu Có Sao Chép! 
*/
define('_IN_JOHNCMS',1);

$textl ='Sa mạc';
$rootpath='../../';

require_once ("../../incfiles/core.php");

require_once ("../../incfiles/head.php");
if(!$user_id){
header('location: /login.php');
require_once ("../../incfiles/end.php");
exit;
}
if ($datauser['kichhoat']==0){
    Header('location: '.$home.'/users/checkpoint.php');
    exit;
}

echo'<link rel="stylesheet" href="/giakimthuat/giaodien.css" type="text/css">';
     $info = mysql_fetch_array(mysql_query("SELECT * FROM `giakimthuat_user` WHERE `user_id`='".$user_id."'"));
echo'<div id="msg"></div>';
echo'<div class="nenvip"> Sa mạc</div>';
echo'<div class="viensamac"><center><img src="img/hangditich.png" style="margin:5px 0 0 0px;">
<a href="../map5/"><img src="/images/vao.gif" style="position: absolute;verticalalign: 0px;margin:10px 0 0 -43px;"></a>
</center>
</div>';
echo'<div class="nensamac" style="min-height: 25px;margin:0">
</div>';
echo'<div class="nensamac2" style="min-height: 150px;margin:0"><div id="load"></div>
<div id="data" style=""><center><div class="ducnghia_"><img src="img/0.png"><span class="ducnghia_hien">Số lần ước nguyện: '.$info['uocnguyen'].'</span></div>
<br></center></div><center>

<b id="trangthai_'.$user_id.'">
 <img src="
img/tuongrong.png" onclick="uocnguyen('.$user_id.')">
<br><br>
</b> </center>';
mysql_query("UPDATE `users` SET `vitri` = '663' WHERE `id` = '".$user_id."'");

$online_u = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `lastdate` > " . (time() - 300) . " AND `vitri` = '663'"), 0);
$totalonline = $online_u;
$q = @mysql_query("select * from `users` where `lastdate` > " . (time() - 300) . " AND `vitri` = '663';");
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
echo'<center>
<img src="img/hoboi.png"><br>
<a href="jones.php"><img src="https://i.imgur.com/KxohIcr.gif"></a>
</center></div>';
echo'<div class="buicosm" style="min-height: 18px;margin:0"></div>';
require_once ("../../incfiles/end.php");

?>
<script>
var loadcontent ='<i>Đang tải dữ liệu....</i>';
$(document).ready(function(){
$('#data').html(loadcontent);
$('#data').load('f5.php');
var refreshId = setInterval(function(){
$('#data').load('f5.php');
$('#data').slideDown('slow');
},1000);
});
</script>
<script>
function uocnguyen(id)
{
    $.ajax(
        {
            url : 'rong.php?uocnguyen',
            data : {id : id},
            type : 'POST',
            success : function(d)
            {
                $("#load").html(d);
            }
        }
        
        );
}
function nhanruong(id)
{
    $.ajax(
        {
            url : 'rong.php?nhanruong',
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