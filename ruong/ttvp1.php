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

echo'<div class="pmenu"><div style="overflow:auto;height:150px"><div class="gd_con"><font color="green"><font size="1">'.$pro['tenvatpham'].'</font></font>
<sup><b><font color="red">'.$info['soluong'].'</font></b></sup></div>';
echo'<div class="gd_con"><font size="1">Thông tin: '.$pro['thongtin'].'</font></div>';
echo'
<div class="gd_con"><font size="1">Hạn sử dụng: <font color="red"><font color="blue">  '.($info['timesudung'] ? thoigiantinh(floor($info['timesudung'])).'' : 'Vĩnh viễn').'</font></font> </font></div>

';
if ($pro['id']=='127'){
    echo'<div class="gd_con">';

echo'<a href="/bossthegioi/dung.php?id=127"><input class="submit" type="submit" name="ok" value="Dùng"></a></br>';
echo'</div>';

    
}


if ($pro['loai']=='hopquasinhnhat'){
    echo'<div class="gd_con">';

echo'<a href="/app/sinhnhat/sdhopqua.php"><input class="submit" type="submit" name="ok" value="Dùng"></a></br>';
echo'</div>';

    
}
if ($pro['loai']=='ruongbian'){
    echo'<div class="gd_con">';

echo'<a href="/app/pokemon/ruongbian.php"><input class="submit" type="submit" name="ok" value="Dùng"></a></br>';
echo'</div>';

    
}
if ($pro['loai']=='bauvat'){
    echo'<div class="gd_con">';

echo'<a href="/khugiaitri/bauvat.php"><input class="submit" type="submit" name="ok" value="Dùng"></a></br>';
echo'</div>';

    
}
if ($pro['loai']=='ruongmanhghep'){
    echo'<div class="gd_con">';

echo'<a href="/sudungvatpham/260.php"><input class="submit" type="submit" name="ok" value="Dùng"></a></br>';
echo'</div>';

    
}
if ($pro['id']=='261'){
    echo'<div class="gd_con">';

echo'<a href="/sudungvatpham/261.php"><input class="submit" type="submit" name="ok" value="Dùng"></a></br>';
echo'</div>';

    
}
if ($pro['id']=='262'){
    echo'<div class="gd_con">';

echo'<a href="/sudungvatpham/262.php"><input class="submit" type="submit" name="ok" value="Dùng"></a></br>';
echo'</div>';

    
}
if ($pro['id']=='267'){
    echo'<div class="gd_con">';

echo'<a href="/sudungvatpham/267.php"><input class="submit" type="submit" name="ok" value="Dùng"></a></br>';
echo'</div>';

    
}
if ($pro['id']=='66'){
    echo'<div class="gd_con">';

echo'<a href="/sudungvatpham/66.php"><input class="submit" type="submit" name="ok" value="Dùng"></a></br>';
echo'</div>';

    
}
if ($pro['id']=='97'){
    echo'<div class="gd_con">';

echo'<a href="/sudungvatpham/97.php"><input class="submit" type="submit" name="ok" value="Dùng"></a></br>';

  echo'</div>';
  
}
if ($pro['id']=='286'){
    echo'<div class="gd_con">';

echo'<a href="/sudungvatpham/286.php"><input class="submit" type="submit" name="ok" value="Dùng"></a></br>';
echo'</div>';

    
}
if ($pro['id']=='287'){
    echo'<div class="gd_con">';

echo'<a href="/sudungvatpham/287.php"><input class="submit" type="submit" name="ok" value="Dùng"></a></br>';
echo'</div>';

    
}
if ($pro['id']=='266'){
    echo'<div class="gd_con">';

echo'<a href="/sudungvatpham/266.php"><input class="submit" type="submit" name="ok" value="Dùng"></a></br>';

 echo'</div>';
   
}
if ($pro['id']=='263'){
    echo'<div class="gd_con">';

echo'<a href="/sudungvatpham/263.php"><input class="submit" type="submit" name="ok" value="Dùng"></a></br>';

    echo'</div>';

}
if ($pro['id']=='317'){
    echo'<div class="gd_con">';

echo'<a href="/sudungvatpham/317.php"><input class="submit" type="submit" name="ok" value="Dùng"></a></br>';

echo'</div>';
    
}
if ($pro['id']=='318'){
    echo'<div class="gd_con">';

echo'<a href="/sudungvatpham/318.php"><input class="submit" type="submit" name="ok" value="Dùng"></a></br>';
echo'</div>';

    
}
if ($pro['id']=='320'){
    echo'<div class="gd_con">';

echo'<a href="/sudungvatpham/320.php"><input class="submit" type="submit" name="ok" value="Dùng"></a></br>';
echo'</div>';
    
}
if ($pro['id']=='321'){
    echo'<div class="gd_con">';

echo'<a href="/sudungvatpham/321.php"><input class="submit" type="submit" name="ok" value="Dùng"></a></br>';
echo'</div>';
    
}
if ($pro['id']=='331'){
    echo'<div class="gd_con">';

echo'<a href="/sudungvatpham/331.php"><input class="submit" type="submit" name="ok" value="Dùng"></a></br>';
echo'</div>';
    
}

echo''.(!empty($item['query'])?'<a href="dung.php?id='.$info['id'].'"><div class="gd_con"><input class="submit" type="submit" name="ok" value="Dùng"></a></div> </br>':'').'';




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