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
    $ck=mysql_fetch_array(mysql_query("SELECT * FROM `giakimthuat_khaithac` WHERE  `id`='1' "));

echo'<div class="nenvip"> Giả kim thuật</div>';
echo'<div class="bautroi"><marquee behavior="scroll" direction="left" scrollamount="2" style="margin-top: 5px"><img src="https://i.imgur.com/B3dJFLI.png"></marquee>
<marquee behavior="scroll" direction="left" scrollamount="3" style="margin-top: 10px"><img src="https://i.imgur.com/B3dJFLI.png"></marquee></div>';
echo'<div class="nuida"></div>';
echo'<div class="nennui"></div>';
echo'<div class="vienda"></div>';
echo'<div class="nenco">
<center>
<a href="index.php"><img src="/images/vao.gif" style=" float: left;verticalalign: 0 px;margin:-2px 0 0 0px;"></a>
<img src="https://i.imgur.com/geUEVcQ.png">
<a href="map2.php"><img src="/images/vao.gif" style="position: absolute;verticalalign: 0 px;margin:100px 0 0 -71px;"></a>
</center>
</div><div class="nenco">';
mysql_query("UPDATE `users` SET `vitri` = '661' WHERE `id` = '".$user_id."'");

$online_u = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `lastdate` > " . (time() - 300) . " AND `vitri` = '661'"), 0);
$totalonline = $online_u;
$q = @mysql_query("select * from `users` where `lastdate` > " . (time() - 300) . " AND `vitri` = '661';");
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
</div><div class="nenco">';

echo'
<input type="submit" name="submit" value="'.$ck['soluong'].'/1000"><br>
<img src="https://i.imgur.com/PDqjS9G.png" style="float: center;"><br>
<input id="submit" type="submit" onclick ="khaithac('.$ck['id'].')" value="Khai thác"><div id="msg"></div>

<img src="https://i.imgur.com/Fboxfqm.png" style=" float: right;verticalalign: 0 px;margin:-65px 0 0 0px;"><br>
<a href="map4"><img src="/images/vao.gif" style=" float: right;verticalalign: 0 px;margin:-55px 0 0 0px;"></a>';

echo'</div>';


include'../incfiles/end.php';
?>
<script>

function khaithac(id)
{
    $.ajax(
        {
            url : 'khaithac.php?ktg',
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
