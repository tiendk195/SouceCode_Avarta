<?php
define('_IN_JOHNCMS',1);
$rootpath='../../';

require('../../incfiles/core.php');
$headmod='Khu kết hôn';
$textl='Khu kết hôn';
require('../../incfiles/head.php');
if(!$user_id){
header('Location: /dangnhap.html');
exit;
}
if ($datauser['viewleduong']==0){
mysql_query("UPDATE `users` SET `viewleduong` = '1' WHERE `id` = '".$user_id."'");
}
 $tr=mysql_query("SELECT * FROM `leduong`");
$checktr=mysql_num_rows($tr);
if ($checktr<1) {
	echo'<div class="phdr"><center><font class="fmod">Khu Lễ Đường</font></center></div>';
	echo'<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Hiện tại chưa có hôn lễ nào đang diễn ra</div>';
	require('../../incfiles/end.php');
	exit;

}
$leduong = mysql_fetch_array(mysql_query("SELECT * FROM `leduong` WHERE `time`>'0' "));
$cc=mysql_fetch_array(mysql_query("SELECT * FROM  `users` WHERE `id`='".$leduong[user_id]."'"));
$cc2=mysql_fetch_array(mysql_query("SELECT * FROM  `users` WHERE `id`='".$leduong[nguoi_ay]."'"));	
mysql_query("UPDATE `users` SET `vitri` = '22110' WHERE `id` = '".$user_id."'");

echo'<div class="phdr"><center><font class="fmod">Khu Lễ Đường</font></center></div><div class="bwedding"></div><div class="nen"><img src="/icon/css/ghelove.png" width="50"/><img src="/icon/css/ghelove.png" width="50"/><img src="/icon/css/ghelove.png" width="50"/><img src="/icon/css/ghelove.png" width="50"/><img src="/icon/css/ghelove.png" width="50"/><img src="/icon/css/ghelove.png" width="50"/><img src="/icon/css/hoacuoi.png" width="25" style="float:right;margin-right"/><br><img src="/icon/css/ghelove.png" width="50"/><img src="/icon/css/ghelove.png" width="50"/><img src="/icon/css/ghelove.png" width="50"/><img src="/icon/css/ghelove.png" width="50"/><img src="/icon/css/ghelove.png" width="50"/><img src="/icon/css/ghelove.png" width="50"/><img src="/icon/css/hoacuoi.png" width="25" style="float:right;margin-right"/>';
$online_u = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `lastdate` > " . (time() - 300) . " AND `vitri` = '22110'"), 0);
$totalonline = $online_u;
$q = @mysql_query("select * from `users` where `lastdate` > " . (time() - 300) . " AND `vitri` = '22110';");
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

echo'<div class="tham">';


echo'<div class="loz"></div><span id="data"></span></div></div><div class="nen"><img src="/icon/css/ghelove.png" width="50"/><img src="/icon/css/ghelove.png" width="50"/><img src="/icon/css/ghelove.png" width="50"/><img src="/icon/css/ghelove.png" width="50"/><img src="/icon/css/ghelove.png" width="50"/><img src="/icon/css/ghelove.png" width="50"/><img src="/icon/css/hoacuoi.png" width="25" style="float:right;margin-right"/><br><img src="/icon/css/ghelove.png" width="50"/><img src="/icon/css/ghelove.png" width="50"/><img src="/icon/css/ghelove.png" width="50"/><img src="/icon/css/ghelove.png" width="50"/><img src="/icon/css/ghelove.png" width="50"/><img src="/icon/css/ghelove.png" width="50"/><img src="/icon/css/hoacuoi.png" width="25" style="float:right;margin-right"/><br>

<img src="/icon/css/hoacuoi.png" width="25" style="float:right;margin-right"/><br>
<span class="chat" style="position: absolute;margin:-35px 0 0 135px;color:black">Lễ thành hôn của<br><font color="red">'.$cc['name'].' ♡ '.$cc2['name'].'</font></br>Chúc 2 bạn<br>Trăm năm HP!</span><img src="/congvien/chuhon.gif" style="position: absolute;vertical-align: 0px;margin:30px 0 0 150px"><br>
<img src="/icon/css/hoacuoi.png" width="25" style="float:right;margin-right"/><br><img src="/icon/css/hoacuoi.png" width="25"/><img src="/icon/css/hoacuoi.png" width="25" style="float:right;margin-right"/><img src="/icon/css/hoacuoi.png" width="25"/><br></div><div class="gmenu"><center><audio loop="true" src="http://vietup.net/files/24b15b916ba1ad6a3910e79627364ae9/311448aaeb62c544eafa7332bd6f691d/Th%E1%BA%BF%20Gi%E1%BB%9Bi%20%E1%BA%A2o%20T%C3%ACnh%20Y%C3%AAu%20Th%E1%BA%ADt.mp3" controls="controls" style="width:100%">  </audio> </center><audio id="audio" autoplay >
  <source src="http://vietup.net/files/24b15b916ba1ad6a3910e79627364ae9/311448aaeb62c544eafa7332bd6f691d/Th%E1%BA%BF%20Gi%E1%BB%9Bi%20%E1%BA%A2o%20T%C3%ACnh%20Y%C3%AAu%20Th%E1%BA%ADt.mp3" type="audio/ogg">
   
</audio></div>';

require('../../incfiles/end.php');
?>
<style>
.nen {
    background: url(/icon/css/nenwebding.png);
}
.bwedding {
    background: url(/icon/css/bwedding.png) repeat-x;
    height: 80px;
    width: 100%;
    max-width: 900px;
    width: 100%;
}.tham {
    background: url(/icon/css/tham.png) repeat-x;
    height: 22px;
    width: 100%;
    max-width: 900px;
    width: 100%;
}
.chat {
    background-color: #FFFFFF;
    border-radius: 2px;
    padding: 3px;
    margin-bottom: 2px;
    border: solid 1px #FF9900;
}