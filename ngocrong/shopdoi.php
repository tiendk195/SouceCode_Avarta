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
    $mtp=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND`id_shop`='313'"));

echo'<div class="gd_"><center><div style="border: 1px solid #EAF6FC;background-color: #EAF6FC;margin:2px 0;padding:5px;border-radius:5px;width:48px;height:48px;"><img src="/images/vatpham/313.png"><br>
<font size="1" color="white" style="text-shadow: 0 0 0.2em #ff6633, 0 0 0.2em #ff6633,  0 0 0.2em #ff6633"><b>'.$mtp['soluong'].'</b></font>
</div></center><table width="100%" border="0" cellspacing="0"><tbody><tr class=""><td width="20%"><center><div id="hien"></div>
<br><img src="https://i.imgur.com/nRnLcyT.gif"></center></td>';
echo'
<td width="80%"><div class="pmenu"><div style="overflow: auto;height:135px">';
$req=mysql_query("SELECT * FROM `ngocrong_shopcadic` ORDER BY `id` ");
while($res=mysql_fetch_array($req)) {


$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$res[id_shop]."'"));
echo'<div class="kevach"><table width="100%" border="0" cellspacing="0"><tbody><tr class=""><td width="20%"><center><div style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:5px;border-radius:5px;width:48px;height:48px;"><img src="/images/shop/'.$shop['id'].'.png"></div></center></td>
<td width="50%"><center><div style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:5px;border-radius:5px;width:auto;height:48px;"><font size="1" color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><b>'.$shop['tenvatpham'].'</b></font><br>
<input onclick="thongtin('.$res['id'].')" type="submit" value="Đổi"></div></center></td>
<td width="20%"><center><div style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:5px;border-radius:5px;width:48px;height:48px;"><img src="/images/vatpham/313.png"><br>
<font size="1" color="white" style="text-shadow: 0 0 0.2em #0000ff, 0 0 0.2em #0000ff,  0 0 0.2em #0000ff"><b>'.$res['manh'].'</b></font>
</div></center></td></tr></tbody></table></div>';



}
echo'</div></div></td></tr></tbody></table></div>';


break;
case 'thongtin':
    $vatpham = $id;
if(empty($vatpham)){
header('location: /');
}
$check=mysql_num_rows(mysql_query("SELECT * FROM `ngocrong_shopcadic` WHERE `id`='".$vatpham."' "));

if($check > 1){
                		    echo'<script>alert("Lỗi không có vật phẩm này!!");</script>';
}

    
}

  
include'../incfiles/end.php';


?>
<script>
function thongtin(id)
{
    $.ajax(
        {
            url : 'thongtin_shopdoi.php',
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
