<?php

define('_IN_JOHNCMS', 1);

require_once ("../incfiles/core.php");
$vatpham = $id;
if(empty($vatpham)){
header('location: /ruong');
}
$check = mysql_num_rows(mysql_query("SELECT * FROM `khokhung` WHERE `id`='".$vatpham."' AND `user_id`='".$user_id."'"));
if($check < 1){
echo'<div class="omenu">Bạn không có Vật Phẩm này!</div>';
}else{
$info = mysql_fetch_array(mysql_query("SELECT * FROM `khokhung` WHERE `user_id`='".$user_id."' AND `id`='".$vatpham."'"));

$pro=mysql_fetch_array(mysql_query("SELECT * FROM `shopkhung` WHERE  `id`='".$info['id_shop']."'"));

echo'<div class="pmenu"><div style="overflow:auto;height:150px"><div class="gd_con"><font color="green">'.$pro['tenvatpham'].'</font></div>';

echo'
<div class="gd_con">Hạn sử dụng: <font color="red"><font color="blue">  '.($info['timesudung'] ? thoigiantinh(floor($info['timesudung'])).'' : 'Vĩnh viễn').'</font> </font></div>


<div class="gd_con"><font color="red">';
if ($datauser['khung'] == $info['id_shop']){
 echo'<a href="khung.php?act=thao&id='.$info['id'].'">
<input id="submit" type="submit" name="submit" value="Tháo"></a>';   
} else {
echo'<a href="khung.php?act=mac&id='.$info['id'].'">
<input id="submit" type="submit" name="submit" value="Sử dụng"></a>';
}

echo'</font></div>





</div></div>';


}


//


?>