<?php
/*
Code Được Mod Bởi Lê Văn Thịnh
Code Mod By Lê Văn Thịnh
Vui Lòng Ghi Nguồn Nếu Có Sao Chép! 
*/
define('_IN_JOHNCMS',1);

$textl ='Giả kim thuật';

include'../incfiles/core.php';

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

echo'<div class="nenvip"> Giả kim thuật > Hoàng tử ba tư > Nâng cấp</div>';


echo'<div class="gd_"><table width="100%" border="0" cellspacing="0"><tbody><tr class=""><td width="20%"><center><div style="border: 1px solid #EAF6FC;background-color: #EAF6FC;margin:0px 0;padding:5px;border-radius:5px;width:auto;height:auto;">
<font size="1" color="white" style="text-shadow: 0 0 0.2em #9932CC, 0 0 0.2em #9932CC,  0 0 0.2em #9932CC"><b>Chào mừng ngươi đến với chức năng Nâng cấp</b></font></div>
<br><img src="https://i.imgur.com/b7v6xnq.gif"></center></td><td width="80%"><div class="pmenu"><div style="overflow: auto;height:100px">';

$vatpham=mysql_query("SELECT * FROM `giakimthuat_shopbatu_nangcap`  ORDER BY `id`");

while($show=mysql_fetch_array($vatpham)) {
    $svp=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE  `id`='{$show['id_shop']}'"));



echo' <img onclick="ttvp('.$show['id'].')" src="/images/shop/'.$show['id_shop'].'.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px;">';

}

echo' </div></div></td></tr></tbody></table><div id="hien"></div><div id="nangcap"></div></div>';




include'../incfiles/end.php';




?>
<script>
function ttvp(id)
{
    $.ajax(
        {
            url : 'nangcap-load.php?ttvp',
            data : {id : id},
            type : 'POST',
            success : function(d)
            {
                $("#hien").html(d);
            }
        }
        
        );
}
function nangcap(id)
{
    $.ajax(
        {
            url : 'nangcap-load.php?nangcap',
            data : {id : id},
            type : 'POST',
            success : function(d)
            {
                $("#nangcap").html(d);
            }
        }
        
        );
}
</script>
