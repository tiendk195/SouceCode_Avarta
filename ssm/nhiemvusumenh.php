<?php
define('_IN_JOHNCMS', 1);
$headmod = 'mod';
$bhead = 2;

require('../incfiles/core.php');
if(!$user_id){
require('../incfiles/head.php');
echo functions::display_error($lng['access_guest_forbidden']);
require('../incfiles/end.php');
exit;
}
if ($datauser['kichhoat']==0){
    Header('location: '.$home.'/users/checkpoint.php');
    exit;
}
$textl = 'Sổ sứ mệnh - Nhiệm vụ';
require('../incfiles/head.php');
echo'<div class="nenvip">Nhiệm vụ sứ mệnh</div>';
$p=mysql_fetch_array(mysql_query("SELECT * FROM `ssm_user` WHERE `user_id`='".$user_id."'"));
$vp=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='284'"));
if ($p['exp']>=50 and $p['level']<40 ){
    	 	 mysql_query("UPDATE `ssm_user` SET `level`= `level` + '1',`exp`=`exp`-'50' WHERE `user_id`='{$user_id}'");

}

echo'<div class="gd_"><div class="pmenu">
<div class="kevach"><font color="white" style="text-shadow: 0 0 0.2em #3399ff, 0 0 0.2em #3399ff,  0 0 0.2em #3399ff"><b>SỔ SỨ MỆNH MÙA 1</b></font>
<font size="1" color="white" style="text-shadow: 0 0 0.2em #9932CC, 0 0 0.2em #9932CC,  0 0 0.2em #9932CC"><b><br>Kỳ hạn: 2021.07.26 - 2021.08.26</b></font>
</div>
<table width="100%" border="0" cellspacing="0"><tbody><tr class=""><div id="data">

<td width="50%"><img src="images/level/'.$p['level'].'.png"  style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:0px;border-radius:10px;"><br>
</td>
<td width="50%"><center><font color="white" style="text-shadow: 0 0 0.2em #3399ff, 0 0 0.2em #3399ff,  0 0 0.2em #3399ff"><b>  <i class="fa fa-quote-left"></i>'.$p['exp'].'/50 <i class="fa fa-quote-right"></i> </b></font><br>
<img src="images/chiso/'.$p['exp'].'.png" style="border: 10px solid #EAF6FC;background-color: #EAF6FC;margin:2px 0;padding:0px;border-radius:10px;"></div></center></td>
</tr></tbody></table></div>
<table width="100%" border="0" cellspacing="0"><tbody><tr class="">
<td width="25%"><center><div class="gd_not" style="background-color: #fbfeff;"><center><a href="index.php"><img src="https://i.imgur.com/3c5zAv4.png"></a></center></div></td>
<td width="25%"><center><div class="gd_not" style="background-color: #fbfeff;"><center><a href="nhiemvusumenh.php"><img src="https://i.imgur.com/GnQ9Za1.png"></a></center></div></td>
<td width="25%"><center><div class="gd_not" style="background-color: #fbfeff;"><center><a href="shopssm.php"><img src="https://i.imgur.com/aiUFye7.png"></a></center></div></td>
<td width="25%"><center><div class="gd_not" style="background-color: #fbfeff;"><a href="bxh.php"><img src="https://i.imgur.com/kqx835s.png"></a></div></center></td>
</tr></tbody></table>
</div>';



echo'<div class="gd_"><div class="pmenu"><center><font color="white" style="text-shadow: 0 0 0.2em #9932CC, 0 0 0.2em #9932CC,  0 0 0.2em #9932CC"><b>NHIỆM VỤ SỨ MỆNH</b></font></center></div><div class="pmenu"><center><font size="1" color="white" style="text-shadow: 0 0 0.2em #9932CC, 0 0 0.2em #9932CC,  0 0 0.2em #9932CC"><b><i class="fa fa-question-circle"></i>  Bắt đầu từ SSM S1, người chơi có thể hoàn thành nhanh các nhiệm vụ sứ mệnh thông qua 
<font color="white" style="text-shadow: 0 0 0.2em #3399ff, 0 0 0.2em #3399ff,  0 0 0.2em #3399ff">Phiếu may mắn</font> nhận từ <font color="white" style="text-shadow: 0 0 0.2em #3399ff, 0 0 0.2em #3399ff,  0 0 0.2em #3399ff">Nhận quà 6h</font><br> Nhiệm vụ càng cao điểm sẽ cần càng nhiều phiếu.<br></b></font>
<div style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:5px;border-radius:5px;width:48px;height:48px;"><font size="1" color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><b> <img src="/images/vatpham/284.png"><br>
'.$vp['soluong'].'</b></font></div></center>
</div>';
    $timers=$p['timereset'] + 3600 * 24;

echo'<div classs="pmenu">';

if ($p['timereset']==0){
  echo'<center><input onclick="rl('.$user_id.')" type="submit" value="Khởi tạo nhiệm vụ"></center>';
  
} else {
echo'<center><input onclick="rl('.$user_id.')" type="submit" value="Làm mới nhiệm vụ '.date("d/m/Y - H:i", $timers).'"></center>';
}
echo'</div>';

echo'<div id="rl"></div>';
echo'<div id="datanv">';

$e=mysql_query("SELECT * FROM `ssm_nhiemvu_user` WHERE `user_id`= '".$user_id."' ORDER BY `id`");
$p=mysql_fetch_array(mysql_query("SELECT * FROM `ssm_user` WHERE `user_id`='".$user_id."'"));

while($s=mysql_fetch_array($e)){
        if ($s['kichhoat']==1){

$res=mysql_fetch_array(mysql_query("SELECT * FROM `ssm_nhiemvu` WHERE `id`='".$s['id_shop']."'"));
if ($s['nhanthuong']==1){
echo'<div class="pmenu"><table width="100%" border="0" cellspacing="0"><tbody><tr class="">
<td width="20%"><img src="images/loai_nhiemvu/'.$res['loainv'].'.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:0px;border-radius:5px;"></td>
<td width="60%"><font size="1" color="white" style="text-shadow: 0 0 0.2em #9932CC, 0 0 0.2em #9932CC,  0 0 0.2em #9932CC"><b> <i class="fa fa-check"></i> </b></font> '.$res['tennhiemvu'].' <br>
Thời gian hết hạn: <font color="red">'.date("d/m/Y - H:i", $s['timeketthuc']).'</font>
<form method="post"></form>
</td>
<td width="20%"></td>
</tr></tbody></table></div>';
} else {

echo'<div class="pmenu"><table width="100%" border="0" cellspacing="0"><tbody><tr class="">
<table width="100%" border="0" cellspacing="0"><tbody><tr class="">
<td width="20%"><img src="images/loai_nhiemvu/'.$res['loainv'].'.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:0px;border-radius:5px;"></td>
<td width="60%"> '.$res['tennhiemvu'].' (<font color="green">'.$s['tiendo'].'</font>/<b><font color="red">'.$res['hoanthanh'].'</font></b>) <br>
Thời gian hết hạn: <font color="red"> '.date("d/m/Y - H:i", $s['timeketthuc']).'</font>';

if ($s['tiendo']>=$res['hoanthanh']){

echo'</br><input onclick="nt('.$s['id'].')" type="submit" value="Nhận thưởng">';
}
echo'
</td>';

echo'<td width="20%">';
if ($s['tiendo']<$res['hoanthanh']){


echo'
<table width="100%" border="0" cellspacing="0"><tbody><tr class="">
<td width="80%"><center>
<div style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:5px;border-radius:5px;width:48px;height:48px;"><span style=" float: right;"><font size="1" onclick="refresh(1795)" color="white" style="text-shadow: 0 0 0.2em #3399ff, 0 0 0.2em #3399ff,  0 0 0.2em #3399ff"><b> <img src="/images/vatpham/284.png"><br>'.$res['vemayman'].'</b></font></span></div></center></td>
<td width="20%"><font size="3" onclick="hoanthanh('.$s['id'].')" color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><b> <i class="fa fa-check-circle"></i> </b></font></td>
</tr></tbody></table>';
}
echo'
</td></tr></tbody></table></div><div id="nt"></div>';

echo'<div id="hoanthanh"></div>';

}
}
}
echo'</div>';
echo'</div>';
require('../incfiles/end.php');
?>

<script>
var loadcontent ='<i>Đang tải dữ liệu...</i>';
$(document).ready(function(){
$('#data').html(loadcontent);
$('#data').load('f5.php');
var refreshId = setInterval(function(){
$('#data').load('f5.php');
$('#data').slideDown('slow');
},1000);
});
var loadcontent ='<i>Đang tải dữ liệu...</i>';
$(document).ready(function(){
$('#datanv').html(loadcontent);
$('#datanv').load('f5-nhiemvu.php');
var refreshId = setInterval(function(){
$('#datanv').load('f5-nhiemvu.php');
$('#datanv').slideDown('slow');
},1000);
});

function rl(id)
{
    $.ajax(
        {
            url : 'reload.php',
            data : {id : id},
            type : 'POST',
            success : function(d)
            {
                $("#rl").html(d);
            }
        }
        
        );
}
 
function hoanthanh(id)
{
    $.ajax(
        {
            url : 'hoanthanh.php',
            data : {id : id},
            type : 'POST',
            success : function(d)
            {
                $("#hoanthanh").html(d);
            }
        }
        
        );
}

function nt(id)
{
    $.ajax(
        {
            url : 'nhanthuong.php',
            data : {id : id},
            type : 'POST',
            success : function(d)
            {
                $("#nt").html(d);
            }
        }
        
        );
}
</script>
