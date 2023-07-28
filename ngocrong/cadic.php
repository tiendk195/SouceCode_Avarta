<?php
/*
Code Được Mod Bởi Lê Văn Thịnh
Code Mod By Lê Văn Thịnh
Vui Lòng Ghi Nguồn Nếu Có Sao Chép! 
*/
define('_IN_JOHNCMS',1);
include'../incfiles/core.php';
$textl ='Làng Ngọc Rồng';
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

echo'<div class="phdr">Làng Ngọc Rồng > NPC > Cadic</div>';
switch($act) {
default:
echo'<div class="gd_"><div class="gd_npc"><center><img src="https://i.imgur.com/RkCFGhH.png"><br>
Chào chú, cháu có thể giúp gì?</center></div>';

echo'<div class="pmenu"><a href="?act=oktuonglai"><img src="/images/vao.png"> Đi tới Tương lai</a></div>';
//<div class="pmenu"><a href="?act=nhiemvu"><img src="/images/vao.png"> Nhiệm vụ bất khả thi</a></div>';

echo'<div class="pmenu"><a href="shop.php"><img src="/images/vao.png"> Cửa hàng</a></div>
<div class="pmenu"><a href="?act=nangcap"><img src="/images/vao.png"> Nâng cấp cải trang</a></div>


<div class="pmenu"><a href="shopdoi.php"><img src="/images/vao.png"> Đổi đồ đặc biệt</a></div>
<div class="pmenu"><a href="khamitem.php"><img src="/images/vao.png"> Khảm sao trang bị</a></div>
<div class="pmenu"><a href="?act=epda"><img src="/images/vao.png"> Ép đá</a></div></div>';
break;
case 'nangcap':
echo'<div class="gd_"><table width="100%" border="0" cellspacing="0"><tbody><tr class=""><td width="20%"><center><div style="border: 1px solid #EAF6FC;background-color: #EAF6FC;margin:0px 0;padding:5px;border-radius:5px;width:auto;height:auto;">
<font size="1" color="white" style="text-shadow: 0 0 0.2em #9932CC, 0 0 0.2em #9932CC,  0 0 0.2em #9932CC"><b>Hãy nâng cấp cải trang giúp thay đổi diện mạo và cường hóa sức mạnh hơn!</b></font></div>
<br><img src="https://i.imgur.com/nRnLcyT.gif"></center></td><td width="80%"><div class="pmenu"><div style="overflow: auto;height:140px">';
$vatpham=mysql_query("SELECT * FROM `ngocrong_cadic_nangcapct`  ORDER BY `id`");

while($show=mysql_fetch_array($vatpham)) {
$daghep=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE  `id`='{$show['id_shop']}'"));
$dacan=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE  `id`='{$show['da']}'"));

echo' <img onclick="thongtin_ct('.$show['id'].')" src="/images/shop/'.$show['id_shop'].'.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px;">';
}
echo' </div></div></td></tr></tbody></table><div id="hien"></div><div id="nangcapct"></div></div>';


break;
case 'epda':
echo'<div class="gd_"><table width="100%" border="0" cellspacing="0"><tbody><tr class=""><td width="20%"><center><div style="border: 1px solid #EAF6FC;background-color: #EAF6FC;margin:0px 0;padding:5px;border-radius:5px;width:auto;height:auto;">
<font size="1" color="white" style="text-shadow: 0 0 0.2em #9932CC, 0 0 0.2em #9932CC,  0 0 0.2em #9932CC"><b>Ép đá tỉ lệ thành công là 100% và cần ít nhất 3 loại đá nhỏ hơn để ép thành đá cao hơn!</b></font></div>
<br><img src="https://i.imgur.com/nRnLcyT.gif"></center></td><td width="80%"><div class="pmenu"><div style="overflow: auto;height:140px">';
$vatpham=mysql_query("SELECT * FROM `ngocrong_epda`  ORDER BY `id`");

while($show=mysql_fetch_array($vatpham)) {
$daghep=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE  `id`='{$show['id_shop']}'"));
$dacan=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE  `id`='{$show['da']}'"));

echo' <img onclick="thongtin_da('.$show['id'].')" src="/images/vatpham/'.$show['id_shop'].'.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px;">';
}
echo' </div></div></td></tr></tbody></table><div id="hien"></div><div id="epda"></div></div>';

break;
case 'oktuonglai':

    
    ?>
<script>
var i=<?php echo (15);?>;
function timeend() {
i--;
if(i>=0) {$("#time").html('<b style="color:red">'+i+'</b>');setTimeout("timeend()",1000);}
else {
        <?php mysql_query("UPDATE `users` SET `tuonglai`='1' WHERE `id`='".$user_id."'"); ?>

    window.location="tuonglai";
    
}
}
timeend();
</script>

<style>

    .nentroisao {
    background-image: url(https://i.imgur.com/KaUuQEv.gif);
    background-repeat: repeat;
    border: 3px solid #F6CEE3;
    background-color: #EAF6FC;
    color: white;
    text-shadow: 0 0 0.2em #ff6633, 0 0 0.2em #ff6633, 0 0 0.2em #ff6633;
    margin: 2px 0;
    padding: 5px;
    border-radius: 5px;
    min-height: 250px;
}
</style>
<?php
echo'<div class="gd_"><div class="pmenu"><center>
Bạn sẽ đến tương lai sau <font color="red"><b><span id="time"></span>s</b></font> nữa</center></div></div>';

 echo'<div class="nentroisao">';
 echo'<marquee align="center" scrollamount="2" direction="left"><img src="https://i.imgur.com/Oc9C3gI.png" ></marquee>';
  echo'</div>';

}
    
include'../incfiles/end.php';


?>
<script>
function thongtin_da(id)
{
    $.ajax(
        {
            url : 'npc_cadic.php?thongtin_da',
            data : {id : id},
            type : 'POST',
            success : function(d)
            {
                $("#hien").html(d);
            }
        }
        
        );
}
function epda(id)
{
    $.ajax(
        {
            url : 'npc_cadic.php?epda',
            data : {id : id, sl : $("#sl").val()},
            type : 'POST',
            success : function(d)
            {
                $("#epda").html(d);
            }
        }
        
        );
}
function thongtin_ct(id)
{
    $.ajax(
        {
            url : 'npc_cadic.php?thongtin_ct',
            data : {id : id},
            type : 'POST',
            success : function(d)
            {
                $("#hien").html(d);
            }
        }
        
        );
       
}
 function nangcapct(id)
{
    $.ajax(
        {
            url : 'npc_cadic.php?nangcapct',
            data : {id : id},
            type : 'POST',
            success : function(d)
            {
                $("#nangcapct").html(d);
            }
        }
        
        );
}
</script>
