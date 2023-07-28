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

echo'<div class="nenvip"> Giả kim thuật > Jones > Đổi quà</div>';
    $ckc=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE  `id_shop`='334' AND `user_id`='{$user_id}'"));

echo'<div class="gd_"><table width="100%" border="0" cellspacing="0"><tbody><tr class=""><td width="20%"><center><div style="border: 1px solid #EAF6FC;background-color: #EAF6FC;margin:0px 0;padding:5px;border-radius:5px;width:auto;height:auto;">
<font size="1" color="white" style="text-shadow: 0 0 0.2em #9932CC, 0 0 0.2em #9932CC,  0 0 0.2em #9932CC"><b>Bạn đang có '.$ckc['soluong'].' <img src="/images/vatpham/334.png"></b></font></div>
<br><img src="https://imgur.com/R3WfazX.gif"></center></td><td width="80%"><div class="pmenu"><div style="overflow: auto;height:140px">';

$vatpham=mysql_query("SELECT * FROM `giakimthuat_shopjones_doiqua`  ORDER BY `id`");

while($show=mysql_fetch_array($vatpham)) {

echo' <img onclick="ttdoiqua('.$show['id'].')" src="/images/shop/'.$show['id_shop'].'.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px;">';

}

echo' </div></div></td></tr></tbody></table><div id="hien"></div><div id="doiqua"></div></div>';



require_once ("../../incfiles/end.php");

?>
<script>
function ttdoiqua(id)
{
    $.ajax(
        {
            url : 'shop-load.php?ttdoiqua',
            data : {id : id},
            type : 'POST',
            success : function(d)
            {
                $("#hien").html(d);
            }
        }
        
        );
}
function doiqua(id)
{
    $.ajax(
        {
            url : 'shop-load.php?doiqua',
            data : {id : id},
            type : 'POST',
            success : function(d)
            {
                $("#doiqua").html(d);
            }
        }
        
        );
}

</script>