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

$textl = 'Sổ sứ mệnh';
require('../incfiles/head.php');
if ($datauser['kichhoat']==0){
    Header('location: '.$home.'/users/checkpoint.php');
    exit;
}
$p=mysql_fetch_array(mysql_query("SELECT * FROM `ssm_user` WHERE `user_id`='".$user_id."'"));
if ($p['exp']>=50 and $p['level']<40 ){
    	 	 mysql_query("UPDATE `ssm_user` SET `level`= `level` + '1',`exp`=`exp`-'50' WHERE `user_id`='{$user_id}'");

}
echo'<div class="nenvip">Sổ sứ mệnh</div>';
echo'<div class="gd_"><div class="pmenu">
<div class="kevach"><font color="white" style="text-shadow: 0 0 0.2em #3399ff, 0 0 0.2em #3399ff,  0 0 0.2em #3399ff"><b>SỔ SỨ MỆNH MÙA 1</b></font>';
if ($p['kichhoat']==0){
echo'<span style="float:right"><font color="white" style="text-shadow: 0 0 0.2em #ff3399, 0 0 0.2em #ff3399,  0 0 0.2em #ff3399"><i class="fa fa-caret-right"></i><a href="muassm.php"> MỞ SMM VIP</a></font></span>';
}
echo'<font size="1" color="white" style="text-shadow: 0 0 0.2em #9932CC, 0 0 0.2em #9932CC,  0 0 0.2em #9932CC"><b><br>Kỳ hạn: 2021.07.26 - 2021.08.26</b></font>
</div>
<table width="100%" border="0" cellspacing="0"><tbody><tr class="">
<div id="data">
<td width="50%"><img src="images/level/'.$p['level'].'.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:0px;border-radius:10px;"><br>
</td>
<td width="50%"><center><font color="white" style="text-shadow: 0 0 0.2em #3399ff, 0 0 0.2em #3399ff,  0 0 0.2em #3399ff"><b>  <i class="fa fa-quote-left"></i> '.$p['exp'].'/50 <i class="fa fa-quote-right"></i> </b></font><br>
<img src="images/chiso/'.$p['exp'].'.png" style="border: 10px solid #EAF6FC;background-color: #EAF6FC;margin:2px 0;padding:0px;border-radius:10px;"></div></center></td>
</tr></tbody></table></div>
<table width="100%" border="0" cellspacing="0"><tbody><tr class="">
<td width="25%"><center><div class="gd_not" style="background-color: #fbfeff;"><a href="?"><img src="https://i.imgur.com/ryANvCI.png"></a></div></center></td>
<td width="25%"><center><div class="gd_not" style="background-color: #fbfeff;"><a href="nhiemvusumenh.php"><img src="https://i.imgur.com/vFVAS7j.png"></a></div></center></td>
<td width="25%"><center><div class="gd_not" style="background-color: #fbfeff;"><a href="shopssm.php"><img src="https://i.imgur.com/aiUFye7.png"></a></div></center></td>
<td width="25%"><center><div class="gd_not" style="background-color: #fbfeff;"><a href="bxh.php"><img src="https://i.imgur.com/kqx835s.png"></a></div></center></td>
</tr></tbody></table></div>';
echo'<a id="poke"><div class="gd_"><div class="pmenu"><center>
<font color="white" style="text-shadow: 0 0 0.2em #9932CC, 0 0 0.2em #9932CC,  0 0 0.2em #9932CC"><b>XEM SỐ SỨ MỆNH MÙA 1<br><i class="fa fa-arrow-circle-down"></i></b></font></center>
<center></center></div></div></a>';
echo'<div id="spoke" style="display: none;"><div id="test"><div class="gd_ssm">
<div class="pmenu1">
<img src="https://i.imgur.com/oYY24vu.gif" height="60" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:0px;border-radius:10px;">
';
$e=mysql_query("SELECT * FROM `ssm_quavip` ORDER BY `id`");

while($s=mysql_fetch_array($e)) {
	echo' <img src="images/level/'.$s['id'].'.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:0px;border-radius:10px;">';
	
}
echo'</div>';
echo'<div class="pmenu1"><img src="https://i.imgur.com/JIuVYyp.gif" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:0px;border-radius:5px;">  
';
$e=mysql_query("SELECT * FROM `ssm_quavip` ORDER BY `id`");

while($s=mysql_fetch_array($e)) {
    $tt2=mysql_fetch_array(mysql_query("SELECT * FROM `ssm_vip_user` WHERE `user_id`='".$user_id."' AND `level` = '".$s['id']."' "));
if ($tt2['nhanthuong']==0){
    echo' <img onclick="tt_sovip('.$s['id'].')" src="images/sovip/'.$s['id'].'.gif" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:0px;border-radius:5px;">';
} else {
    echo' <img onclick="tt_sovip('.$s['id'].')" src="images/sovip_done/'.$s['id'].'.gif" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:0px;border-radius:5px;">';
}
}
echo'</div>';

//So thuong
echo'<div class="pmenu1"><img src="https://i.imgur.com/A3oFLgw.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:0px;border-radius:5px;">  
';
$e=mysql_query("SELECT * FROM `ssm_quathuong` ORDER BY `id`");

while($s=mysql_fetch_array($e)) {
    $tt2=mysql_fetch_array(mysql_query("SELECT * FROM `ssm_thuong_user` WHERE `user_id`='".$user_id."' AND `level` = '".$s['id']."' "));
if ($tt2['nhanthuong']==0){
    if ($s['id_loai']==0){
            echo' <img onclick="tt_sothuong('.$s['id'].')" src="images/sothuong/2.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:0px;border-radius:5px;">';

    } else {
    echo' <img onclick="tt_sothuong('.$s['id'].')" src="images/sothuong/'.$s['id'].'.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:0px;border-radius:5px;">';
}
    
} else {
       if ($s['id_loai']==0){
            echo' <img onclick="tt_sothuong('.$s['id'].')" src="images/sothuong/2.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:0px;border-radius:5px;">';

    } else {
        
   
    echo' <img onclick="tt_sothuong('.$s['id'].')" src="images/sothuong_done/'.$s['id'].'.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:0px;border-radius:5px;">';

    }
    }
}
echo'</div>';
//


echo'</div></div></div>';


echo'<p id="hien"></p>';




require('../incfiles/end.php');
?>


<script>
function tt_sovip(id)
{
    $.ajax(
        {
            url : 'tt_sovip.php',
            data : {id : id},
            type : 'POST',
            success : function(d)
            {
                $("#hien").html(d);
            }
        }
        
        );
}

function tt_sothuong(id)
{
    $.ajax(
        {
            url : 'tt_sothuong.php',
            data : {id : id},
            type : 'POST',
            success : function(d)
            {
                $("#hien").html(d);
            }
        }
        
        );
}

function nhanvip_(id)
{
    $.ajax(
        {
            url : 'thuong_vip.php',
            data : {id : id},
            type : 'POST',
            success : function(d)
            {
                $("#hien").html(d);
            }
        }
        
        );
}
function nhanthuong_(id)
{
    $.ajax(
        {
            url : 'thuong_thuong.php',
            data : {id : id},
            type : 'POST',
            success : function(d)
            {
                $("#hien").html(d);
            }
        }
        
        );
}
</script>
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
</script>