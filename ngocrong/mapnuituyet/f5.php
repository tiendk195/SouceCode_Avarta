<?php

define('_IN_JOHNCMS', 1);
$rootpath='../../';

require_once ("../../incfiles/core.php");


$p = mysql_fetch_array(mysql_query("SELECT * FROM `ngocrong_nuituyet` WHERE `id` = '$id'"));
$bh = mysql_fetch_array(mysql_query("SELECT * FROM `ngocrong_chucnang` WHERE `user_id` = '".$user_id."' AND `loai`='280'"));
$gx = mysql_fetch_array(mysql_query("SELECT * FROM `ngocrong_chucnang` WHERE `user_id` = '".$user_id."' AND `loai`='281'"));

$cn = mysql_fetch_array(mysql_query("SELECT * FROM `ngocrong_chucnang` WHERE `user_id` = '".$user_id."' AND `loai`='282'"));
$ad = mysql_fetch_array(mysql_query("SELECT * FROM `ngocrong_chucnang` WHERE `user_id` = '".$user_id."' AND `loai`='283'"));
$checkin3 = mysql_fetch_array(mysql_query("SELECT * FROM `ngocrong_chucnang` WHERE `user_id`='{$user_id}' AND `loai`='280'"));

   if (time()>=$checkin3['timesudung']) {
    mysql_query("UPDATE `ngocrong_chucnang` SET `sudung`='0',`hp`='0',`sucmanh`='0' WHERE `user_id`='{$user_id}' AND `loai`={$checkin3['loai']}");
   }
$checkin3 = mysql_fetch_array(mysql_query("SELECT * FROM `ngocrong_chucnang` WHERE `user_id`='{$user_id}' AND `loai`='281'"));

   if (time()>=$checkin3['timesudung']) {
    mysql_query("UPDATE `ngocrong_chucnang` SET `sudung`='0' ,`hp`='0',`sucmanh`='0' WHERE `user_id`='{$user_id}' AND `loai`={$checkin3['loai']}");
   }
$checkin3 = mysql_fetch_array(mysql_query("SELECT * FROM `ngocrong_chucnang` WHERE `user_id`='{$user_id}' AND `loai`='282'"));

   if (time()>=$checkin3['timesudung']) {
    mysql_query("UPDATE `ngocrong_chucnang` SET `sudung`='0' ,`hp`='0',`sucmanh`='0' WHERE `user_id`='{$user_id}' AND `loai`={$checkin3['loai']}");
   }
   $checkin3 = mysql_fetch_array(mysql_query("SELECT * FROM `ngocrong_chucnang` WHERE `user_id`='{$user_id}' AND `loai`='283'"));

   if (time()>=$checkin3['timesudung']) {
    mysql_query("UPDATE `ngocrong_chucnang` SET `sudung`='0',`hp`='0',`sucmanh`='0' WHERE `user_id`='{$user_id}' AND `loai`={$checkin3['loai']}");
   }
    
   echo'<div class="gd_game"><div id="hoiphuc"></div><font color="green" size="1"><b><i class="fa fa-bolt"></i></b> '.$datauser['sucmanh'].'';
      if ($cn['sudung']==1){
echo'<font color="red"> ['.$cn['sucmanh'].']</font>';
} 
 echo'  <div id="sudung"></div><font color="green" size="1"><b><i class="fa fa-heart"></i></b> '.$datauser['hp'].' ';
      if ($bh['sudung']==1){
echo'<font color="red"> ['.$bh['hp'].']</font>';
}  
/*
	if ($datauser['matna']==258 ){

echo'</br><font size="1" color="white" style="text-shadow: 0 0 0.2em #9932CC, 0 0 0.2em #9932CC,  0 0 0.2em #9932CC">
<b>Bạn đang sử dụng Cải trang Frost 1, Sức mạnh + 30%</b></font>';

}
*/
 	if ($datauser['matna']==255 ){

echo'</br><font size="1" color="white" style="text-shadow: 0 0 0.2em #9932CC, 0 0 0.2em #9932CC,  0 0 0.2em #9932CC">
<b>Bạn đang sử dụng Cải trang Fide 1, Sức mạnh + 20%</b></font>
';
}
 	if ($datauser['matna']==253 ){

echo'</br><font size="1" color="white" style="text-shadow: 0 0 0.2em #9932CC, 0 0 0.2em #9932CC,  0 0 0.2em #9932CC">
<b>Bạn đang sử dụng Cải trang Fide 2, Sức mạnh + 30%</b></font>
';
}
 	if ($datauser['matna']==252 ){

echo'</br><font size="1" color="white" style="text-shadow: 0 0 0.2em #9932CC, 0 0 0.2em #9932CC,  0 0 0.2em #9932CC">
<b>Bạn đang sử dụng Cải trang Fide 3, Sức mạnh + 40%</b></font>
';
}

   echo'

<br><input onclick="hoiphuc('.$user_id.')" type="submit" value="Hồi phục bằng Đậu thần">
</font></font></div><div style="text-align: center;"><table width="100%" border="0" cellspacing="0"><tbody><tr class="pmenu">
<td width="25%"><div class="ducnghia_">';
if ($bh['sudung']==0){
echo'<img src="img/congcu/350.png" onclick="sudung_(280)" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px"><br>';
} else {
   echo'<img src="/images/vatpham/280.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px"><br>';
 
}

echo'<span class="ducnghia_hien">
<table cellpadding="0" cellspacing="0" width="100%">
<tbody><tr>
<td width="30"><img src="/images/vatpham/280.png"> </td><td width="70">
<font size="1" color="white" style="text-shadow: 0 0 0.2em #ff6633, 0 0 0.2em #ff6633,  0 0 0.2em #ff6633"><b>Bổ huyết</b></font><br>
<font size="1">Tăng đôi HP bản thân trong 15 phút</font>
</td></tr></tbody></table>';
if ($bh['sudung']==1){
echo'<font size="1" color="white" style="text-shadow: 0 0 0.2em #9932CC, 0 0 0.2em #9932CC,  0 0 0.2em #9932CC">
<b>Thời gian sử dụng: '.thoigiantinh(floor($bh['timesudung'])).'</b></font>
';
}

echo'</span>
</div></td>

<td width="25%"><div class="ducnghia_">';
if ($gx['sudung']==0){
echo'<img src="img/congcu/351.png" onclick="sudung_(281)" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px"><br>';
} else {
   echo'<img src="/images/vatpham/281.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px"><br>';
 
}
echo'<span class="ducnghia_hien">
<table cellpadding="0" cellspacing="0" width="100%">
<tbody><tr>
<td width="30"><img src="/images/vatpham/281.png"> </td><td width="70">
<font size="1" color="white" style="text-shadow: 0 0 0.2em #ff6633, 0 0 0.2em #ff6633,  0 0 0.2em #ff6633"><b>Giáp xên bọ hung</b></font><br>
<font size="1">Giảm tỉ lệ nhận sát thương từ quái trong 15 phút</font>
</td></tr></tbody></table>';
if ($gx['sudung']==1){
echo'<font size="1" color="white" style="text-shadow: 0 0 0.2em #9932CC, 0 0 0.2em #9932CC,  0 0 0.2em #9932CC">
<b>Thời gian sử dụng: '.thoigiantinh(floor($gx['timesudung'])).'</b></font>
';
}

echo'</span>
</div></td>

<td width="25%"><div class="ducnghia_">';
if ($cn['sudung']==0){
echo'<img src="img/congcu/352.png" onclick="sudung_(282)" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px"><br>';
} else {
   echo'<img src="/images/vatpham/282.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px"><br>';
 
}
echo'<span class="ducnghia_hien">
<table cellpadding="0" cellspacing="0" width="100%">
<tbody><tr>
<td width="30"><img src="/images/vatpham/282.png"> </td><td width="70">
<font size="1" color="white" style="text-shadow: 0 0 0.2em #ff6633, 0 0 0.2em #ff6633,  0 0 0.2em #ff6633"><b>Cuồng nộ</b></font><br>
<font size="1">Tăng X2 sức mạnh trong  15 phút</font>
</td></tr></tbody></table>';
if ($cn['sudung']==1){
echo'<font size="1" color="white" style="text-shadow: 0 0 0.2em #9932CC, 0 0 0.2em #9932CC,  0 0 0.2em #9932CC">
<b>Thời gian sử dụng: '.thoigiantinh(floor($cn['timesudung'])).'</b></font>
';
}

echo'

</span>
</div></td>

<td width="25%"><div class="ducnghia_">';
if ($ad['sudung']==0){
echo'<img src="img/congcu/353.png" onclick="sudung_(283)" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px"><br>';
} else {
   echo'<img src="/images/vatpham/283.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px"><br>';
 
}
echo'<span class="ducnghia_hien">
<table cellpadding="0" cellspacing="0" width="100%">
<tbody><tr>
<td width="30"><img src="/images/vatpham/283.png"> </td><td width="70">
<font size="1" color="white" style="text-shadow: 0 0 0.2em #ff6633, 0 0 0.2em #ff6633,  0 0 0.2em #ff6633"><b>Ẩn danh</b></font><br>
<font size="1">Đánh quái sẽ không bị sát thương từ quái trong 15 phút</font>
</td></tr></tbody></table>
';
if ($ad['sudung']==1){
echo'<font size="1" color="white" style="text-shadow: 0 0 0.2em #9932CC, 0 0 0.2em #9932CC,  0 0 0.2em #9932CC">
<b>Thời gian sử dụng: '.thoigiantinh(floor($ad['timesudung'])).'</b></font>
';
}

echo'</span>
</div></td>

</tr></tbody></table></div><font color="green" size="1"><font color="green" size="1">




<center></center></div>';

?>
