<?php

define('_IN_JOHNCMS', 1);

require_once ("../incfiles/core.php");
$vatpham = $id;
if(empty($vatpham)){
header('location: /ruong');
}
$check=mysql_num_rows(mysql_query("SELECT * FROM `vatpham` WHERE `id`='".$vatpham."' AND `user_id`='".$user_id."' AND `soluong`>'0'"));

if($check < 1){
                		    echo'<script>alert("Bạn không có vật phẩm này!!");</script>';
}else{
$info = mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id`='".$vatpham."'"));
$pro=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE `id`='".$info['id_shop']."'"));

echo'<div class="pmenu"><div style="overflow:auto;height:150px"><div class="gd_con"><font color="green">'.$pro['tenvatpham'].'</font>
<sup><b><font color="red">'.$info['soluong'].'</font></b></sup></div>';
echo'<div class="gd_con">Thông tin: '.$pro['thongtin'].'</div>';
echo'
<div class="gd_con">Hạn sử dụng: <font color="red"><font color="blue">  '.($info['timesudung'] ? thoigiantinh(floor($info['timesudung'])).'' : 'Vĩnh viễn').'</font> </font></div>

';

echo'<div class="gd_con"><font color="red">';
if ($pro['loai']=='hopquadacbiet'){
 echo'<a href="/mod/hopquamanhghep.php">
<input id="submit" type="submit" name="submit" value="Dùng"></a>';
}
if ($pro['loai']=='hopquasinhnhat'){
echo'<a href="/app/sinhnhat/sdhopqua.php"><input class="submit" type="submit" name="ok" value="Dùng"></a></br>';
}
if ($pro['loai']=='ruongbian'){
echo'<a href="/app/pokemon/ruongbian.php"><input class="submit" type="submit" name="ok" value="Dùng"></a></br>';
}
if ($pro['loai']=='bauvat'){
echo'<a href="/khugiaitri/bauvat.php"><input class="submit" type="submit" name="ok" value="Dùng"></a></br>';
}
if ($pro['loai']=='ruongmanhghep'){
echo'<a href="/sudungvatpham/260.php"><input class="submit" type="submit" name="ok" value="Dùng"></a></br>';
}
if ($pro['id']=='261'){
echo'<a href="/sudungvatpham/261.php"><input class="submit" type="submit" name="ok" value="Dùng"></a></br>';
}
if ($pro['id']=='262'){
echo'<a href="/sudungvatpham/262.php"><input class="submit" type="submit" name="ok" value="Dùng"></a></br>';
}
if ($pro['id']=='267'){
echo'<a href="/sudungvatpham/267.php"><input class="submit" type="submit" name="ok" value="Dùng"></a></br>';
}
if ($pro['id']=='66'){
echo'<a href="/sudungvatpham/66.php"><input class="submit" type="submit" name="ok" value="Dùng"></a></br>';
}
if ($pro['id']=='286'){
echo'<a href="/sudungvatpham/286.php"><input class="submit" type="submit" name="ok" value="Dùng"></a></br>';
}
if ($pro['id']=='287'){
echo'<a href="/sudungvatpham/287.php"><input class="submit" type="submit" name="ok" value="Dùng"></a></br>';
}

echo''.(!empty($item['query'])?'<a href="dung.php?id='.$info['id'].'"><input class="submit" type="submit" name="ok" value="Dùng"></a> </br>':'').'';

echo'</font></div>';



if ($pro['loai'] !='dacbiet' and $pro['loai'] !='danhboss' and $pro['loai'] !='ghepmanh'  ) {


echo'<div class="gd_con"><a href="/avatar/chotroi.php?act=ban&loai=vatpham&id='.$info['id'].'"><input id="submit" type="submit" name="submit" value="Rao bán"></a> 
</div>';
}
echo'
<div class="gd_con"><a href="xoavp.php?id='.$info['id'].'"><input id="submit" type="submit" name="submit" value="Bỏ"></a></div>
</div></div>';


}


//


?>