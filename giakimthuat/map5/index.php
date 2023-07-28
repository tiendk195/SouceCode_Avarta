<?php
/*
Code Được Mod Bởi Lê Văn Thịnh
Code Mod By Lê Văn Thịnh
Vui Lòng Ghi Nguồn Nếu Có Sao Chép! 
*/
define('_IN_JOHNCMS',1);

$textl ='Giả kim thuật';
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

echo'<div class="nenvip"> Hang Kim loại di tích</div>';
    $ck=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE  `id_shop`='320' AND `user_id`='".$user_id."' "));
    $gkt=mysql_fetch_array(mysql_query("SELECT * FROM `giakimthuat_user` WHERE  `user_id`='".$user_id."' "));

    if ($gkt['time']<time()){
        echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn cần phải dùng Chìa khóa hang kim loại <img src="/images/vatpham/320.png"> mới có thể vào đây <a href="../map4/"> Quay về</a></div>';
    } else {
            

echo'<div class="tuonghd"><center><img src="img/conghang.png" style="margin:-10px 0 0 0px;"></center></div>';
echo'<div class="nenhd" style="min-height: 230px;margin:0"><div class="pmenu"><center>Thời gian trong hang còn lại: <div id="data">'.thoigiantinh(floor($gkt['time'])).'</div>

</center></div><div class="omenu"><center><p id="moruong"></p><p id="dongcua"></p>
<p id="msg"></p> <p id="tancong"></p></center></div><center><img src="img/boss/'.$gkt['boss'].'.gif" style="margin:0px 0 0 3px;" onclick="thongtin('.$gkt['boss'].')"></center>';
echo'<img src="/avatar/'.$user_id.'.png"></div>';
echo'<div class="nenhd" style="min-height: 180px;margin:0"><div id="data2" style=""><img src="img/1.png" style="position: absolute;verticalalign: 0 px;margin:35px 0 0 175px;" onclick="dongcua('.$user_id.')"> 
<img src="img/cua-1.png" style=";position: absolute;verticalalign: 0 px;margin:50px 0 0 212px;"> <img src="img/kruong-0.png" style="position: absolute;verticalalign: 0 px;position: absolute;verticalalign: 0 px;margin:65px 0 0 215px;" onclick="moruong('.$user_id.')"> </div>
<center><img src="img/ha2.png"><img src="img/ha1.gif"></center></div>';
}



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

function thongtin(id)
{
    $.ajax(
        {
            url : 'boss.php?thongtin',
            data : {id : id},
            type : 'POST',
            success : function(d)
            {
                $("#msg").html(d);
            }
        }
        
        );
}
function tancong(id)
{
    $.ajax(
        {
            url : 'boss.php?tancong',
            data : {id : id},
            type : 'POST',
            success : function(d)
            {
                $("#tancong").html(d);
            }
        }
        
        );
}
function moruong(id)
{
    $.ajax(
        {
            url : 'boss.php?moruong',
            data : {id : id},
            type : 'POST',
            success : function(d)
            {
                $("#moruong").html(d);
            }
        }
        
        );
}
function dongcua(id)
{
    $.ajax(
        {
            url : 'boss.php?dongcua',
            data : {id : id},
            type : 'POST',
            success : function(d)
            {
                $("#dongcua").html(d);
            }
        }
        
        );
}

</script>

