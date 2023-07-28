<?php

define('_IN_JOHNCMS', 1);

require_once ("../incfiles/core.php");
$vatpham = $id;
if(empty($vatpham)){
header('location: /ruong');
}
$check = mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `id`='".$vatpham."' AND `user_id`='".$user_id."'"));
if($check < 1){
echo'<div class="omenu">Bạn không có Vật Phẩm này!</div>';
}else{
$info = mysql_fetch_array(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."' AND `id`='".$vatpham."'"));
$info2 = mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE  `id`='".$info['id_shop']."'"));

$dangmac = mysql_num_rows(mysql_query("SELECT * FROM `dangmac` WHERE `user_id`='".$user_id."' AND `loai`='".$info['loai']."'"));
$pro=mysql_fetch_array(mysql_query("SELECT * FROM `dangmac` WHERE `user_id`='".$user_id."' AND `loai`='".$info['loai']."'"));

echo'<div class="pmenu"><div style="overflow:auto;height:150px"><div class="gd_con"><font color="green"> '.$info2['tenvatpham'].'</font></div>';
if ($info[sucmanh]>0){
   echo' <div class="gd_con">Sức mạnh: <font color="red"><font color="blue"> '.number_format($info[sucmanh]).' [ +'.$info[cong ].' ] </font> </font></div>';
}
if ($info[hp]>0){
   echo' <div class="gd_con">HP: <font color="red"><font color="blue"> '.number_format($info[hp]).' [ +'.$info[hp ].' ] </font> </font></div>';
}
echo'
<div class="gd_con">Hạn sử dụng: <font color="red"><font color="blue">  '.($info['timesudung'] ? thoigiantinh(floor($info['timesudung'])).'' : 'Vĩnh viễn').'</font> </font></div>
<div class="gd_con"><font color="red"><a href="nangcap.php?id='.$info['id'].'">
<input id="submit" type="submit" name="submit" value="Nâng cấp"></a></font></div>


<div class="gd_con"><font color="red">';
if ($pro['id_ruong'] == $info['id']){
 echo'<a href="?loai='.$loai.'&act=thao&id='.$info['id'].'">
<input id="submit" type="submit" name="submit" value="Tháo"></a>';   
} else {
echo'<a href="?loai='.$loai.'&act=mac&id='.$info['id'].'">
<input id="submit" type="submit" name="submit" value="Sử dụng"></a>';
}

echo'</font></div>




<div class="gd_con"><a href="/avatar/chotroi.php?act=ban&loai=do&id='.$info['id'].'"><input id="submit" type="submit" name="submit" value="Rao bán"></a> 
</div>
<div class="gd_con"><a href="del.php?id='.$info['id'].'"><input id="submit" type="submit" name="submit" value="Bỏ"></a></div>
</div></div>';


}


//


?>