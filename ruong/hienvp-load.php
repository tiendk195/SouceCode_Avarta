<?php

define('_IN_JOHNCMS', 1);

require_once ("../incfiles/core.php");
if ($id<17 AND $id !=15){

if ($id==1){
    $loai ='toc';
}
if ($id==2){
    $loai ='ao';
}
if ($id==3){
    $loai ='quan';
}
if ($id==4){
    $loai ='non';
}
if ($id==5){
    $loai ='docamtay';
}
if ($id==6){
    $loai ='matna';
}
if ($id==7){
    $loai ='kinh';
}
if ($id==8){
    $loai ='nensau';
}
if ($id==9){
    $loai ='canh';
}
if ($id==10){
    $loai ='thucung';
}
if ($id==11){
    $loai ='cancau';
}
if ($id==12){
    $loai ='haoquang';
}
if ($id==13){
    $loai ='mat';
}
if ($id==14){
    $loai ='khuonmat';
}
$total =mysql_result(mysql_query("SELECT COUNT(*) FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='".$loai."'"), 0);
if($total == 0){
    echo'<div class="pmenu"><font color="red"><b>Empty!</b></font> Rương đồ  '.$loai.' trống!</div>';
} else {


    $req=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."' AND `loai`='".$loai."' ORDER BY `id`");
    echo'<div class="pmenu"><div style="overflow:auto;height:150px">';
while($res=mysql_fetch_array($req)){
	$shopdo=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$res['id_shop']."'"));

$pro=mysql_fetch_array(mysql_query("SELECT * FROM `dangmac` WHERE `user_id`='".$user_id."' AND `loai`='".$res['loai']."'"));
$pro2=mysql_fetch_array(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='".$user_id."' AND `loai`='".$res['loai']."'"));
if ($pro['id_ruong'] != $res['id']){

   echo'<img onclick="ttvp('.$res['id'].')" src="/images/shop/'.$res['id_shop'].'.png" style="
border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px" "=""> '; 
} else {

   echo'<img onclick="ttvp('.$res['id'].')" src="/images/shop/'.$res['id_shop'].'.png" style="
border: 1px solid #F6CEE3;background-color: #F6CEE3;margin:2px 0;padding:10px;border-radius:5px;"> '; 
}

}
}
echo' </div></div>';
}
else if ($id==17) {
  $req=mysql_query("SELECT * FROM `khokhung` WHERE `user_id`='".$user_id."' AND `soluong`>'0' ORDER BY `id`");
    echo'<div class="pmenu"><div style="overflow:auto;height:150px">';
while($res=mysql_fetch_array($req)){
	$shopdo=mysql_fetch_array(mysql_query("SELECT * FROM `shopkhung` WHERE `id`='".$res['id_shop']."'"));

$pro=mysql_fetch_array(mysql_query("SELECT * FROM `dangmac` WHERE `user_id`='".$user_id."' AND `loai`='".$res['loai']."'"));
$pro2=mysql_fetch_array(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='".$user_id."' AND `loai`='".$res['loai']."'"));
if ($datauser['khung'] != $res['id_shop']){

 
    echo'<img onclick="ttkhung('.$res['id'].')" src="/images/KhungNV/'.$res['id_shop'].'.gif" height="30" style="
border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px" "=""> ';
} else {
    echo'<img onclick="ttkhung('.$res['id'].')" src="/images/KhungNV/'.$res['id_shop'].'.gif"  height="30"  style="
border: 1px solid #F6CEE3;background-color: #F6CEE3;margin:2px 0;padding:10px;border-radius:5px;">';

   
}

}

echo' </div></div>';

    
} else if ($id==15){
    
    
    echo'<div class="pmenu"><div style="overflow:auto;height:150px">';
    $vatpham=mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `soluong`!='0' ORDER BY `id`");

while($show=mysql_fetch_array($vatpham)) {
    $item=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE `id`='".$show['id_shop']."'"));

echo'<img onclick="ttvp1('.$show['id'].')" src="/images/vatpham/'.$item['id'].'.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:5px;border-radius:5px;"> 
 ';
}
echo'</div></div>';
}
//



?>