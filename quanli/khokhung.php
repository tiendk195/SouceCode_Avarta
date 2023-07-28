<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');

require('../incfiles/head.php');
if(!$user_id){
header('location: /index.html');
}
if ($datauser['rights']<9 ){ 
header('location: /index.html');
exit;
}
if($act == 'lay'){
   echo '<div class="phdr">Lấy item</div>';
   $id=$_GET[id];
    $xyz=mysql_num_rows(mysql_query("SELECT * FROM `shopkhung` WHERE `id`='".$id."'"));
if($xyz<=0){header('location: /');}
if($datauser['rights']>=9 ){

$res=mysql_fetch_array(mysql_query("SELECT * FROM `shopkhung` WHERE `id`='".$_GET[id]."'"));
$post = mysql_fetch_array(mysql_query("select * from `shopkhung` WHERE  `id` = '$id'  LIMIT 1"));

	
echo '<div class="phdr"><b>'.$res[tenvatpham].'</b></div>';
$tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."'");
$checktongruong=mysql_num_rows($tongruong);
	if ($checktongruong>=$datauser['tongruong']) {
    echo'<div class="omenu">Giao dịch không thành công, rương của bạn đã đầy !!</div>';
} else {
    			$query=mysql_query("SELECT * FROM `khokhung` WHERE `id_shop`='".$post['id']."'AND `soluong`='1' AND `user_id`='".$user_id."'");
$checkdo=mysql_num_rows($query);
if ($checkdo>=1) {
    echo'<div class="omenu">Giao dịch không thành công, Bạn đã sở hữu  <b>'.$post['tenvatpham'].'</b> !!</div>';
} else {
@mysql_query("UPDATE `khokhung` SET
`soluong`='1'
WHERE `id_shop`='".$post['id']."' AND `user_id`='".$user_id."'
");

 echo'<center>';
echo '<div class="omenu"><font color ="red">Lấy thành công</font></br>';
echo '<div class="gd_khung_'.$id.'">
<img src="/avatar/'.$user_id.'.png" style="position: absolute;verticalalign: 0 px;margin:13px 0 0 -23px;"></div></br>';
echo ' Tên Vật Phẩm: '.$post[tenvatpham].'</br>';

echo ' ID Shop: '.$post[id].' </div>';
echo'</center>';
}
}
}
}
 

if($act == 'edit'){
echo '<div class="phdr">Sửa item</div>';

 $id=$_GET[id];
    $xyz=mysql_num_rows(mysql_query("SELECT * FROM `shopkhung` WHERE `id`='".$id."'"));
if($xyz<=0){header('location: /');}
$res=mysql_fetch_array(mysql_query("SELECT * FROM `shopkhung` WHERE `id`='".$_GET[id]."'"));

echo '<div class="phdr"><b>'.$res[tenvatpham].'</b></div>';
if (isset($_POST[submit])) {
@mysql_query("UPDATE `shopkhung` SET
`tenvatpham`='".$_POST[vatpham]."'

WHERE `id`='".$id."'
");
echo '<div class="omenu">Edit thành công! </div>';
}
echo '<center> <div class="gd_khung_'.$id.'">
<img src="/avatar/'.$user_id.'.png" style="position: absolute;verticalalign: 0 px;margin:13px 0 0 -23px;"></div>';
echo '<form method="post">';
echo 'Tên vật phẩm: <input type="text" name="vatpham" value="'.$res[tenvatpham].'"><br/>';

echo '<input type="submit" name="submit" value="Lưu">';
echo '</form>';
}


if($act == 'tang'){
echo '<div class="phdr">Tặng item</div>';
 $id=$_GET[id];
    $xyz=mysql_num_rows(mysql_query("SELECT * FROM `shopkhung` WHERE `id`='".$id."'"));
if($xyz<=0){header('location: /');}
if($id && $datauser['rights'] >= 9){
$shop = mysql_fetch_assoc(mysql_query("SELECT * FROM `shopkhung` WHERE `id`='".$id."'"));

echo'<div class="omenu"><center> <div class="gd_khung_'.$shop['id'].'">
<img src="/avatar/'.$user_id.'.png" style="position: absolute;verticalalign: 0 px;margin:13px 0 0 -23px;"></div>
<br>Bạn có muốn tặng item này không ?<br><form method="post"> <input type="number" placeholder="Nhập ID người nhận" name="nguoinhan"> <input type="submit" value="Xác Nhận" name="submit"></form></center></div>';
if(isset($_POST['submit'])){
if($shop['timesudung']){
$shop['timesudung'] = $shop['timesudung'] + time();
}

$nguoinhan = $_POST['nguoinhan'];

$check = mysql_num_rows(mysql_query("SELECT * FROM `users` WHERE `id`='".$nguoinhan."'"));
if($check < 1){
echo'<div class="omenu">Người dùng không tồn tại.</div>';
require('../incfiles/end.php');
exit;
}
$nguoinhan1=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$nguoinhan."'"));
$tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$nguoinhan."'");
$checktongruong=mysql_num_rows($tongruong);
	if ($checktongruong>=$nguoinhan1['tongruong']) {
    echo'<div class="omenu">Giao dịch không thành công, rương của người ta đã đầy !!</div>';
	require('../incfiles/end.php');
exit;
} 
	    			$query=mysql_query("SELECT * FROM `khokhung` WHERE `id_shop`='".$shop['id']."'AND `soluong`='1' AND `user_id`='".$nguoinhan."'");
$checkdo=mysql_num_rows($query);
if ($checkdo>=1) {
    echo'<div class="omenu">Giao dịch không thành công, Người ta đã sở hữu  <b>'.$shop['tenvatpham'].'</b> !!</div>';
require('../incfiles/end.php');
exit;
} 
@mysql_query("UPDATE `khokhung` SET
`soluong`='1'
WHERE `id_shop`='".$id."' AND `user_id`='".$nguoinhan."'
");

$text='<b><font color="003366">'.$login.'</font></b><font color="000000"> vừa gửi </br><center>
<div class="gd_khung_'.$shop['id'].'">
<img src="/avatar/'.$user_id.'.png" style="position: absolute;verticalalign: 0 px;margin:13px 0 0 -23px;"></div>


</center></br>
['.$shop['tenvatpham'].'] cho bạn</font>';
$text2='<b><font color="003366">'.$login.'</font></b><font color="000000"> vừa gửi </br><center>
<div class="gd_khung_'.$shop['id'].'">
<img src="/avatar/'.$user_id.'.png" style="position: absolute;verticalalign: 0 px;margin:13px 0 0 -23px;"></div>


</center></br> ['.$shop['tenvatpham'].'] </font>';
mysql_query("INSERT INTO `thongbao` SET
`id`='".$user_id."',
`user`='".$nguoinhan."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
//lịch sử chuyển
mysql_query("INSERT INTO `ls_tangvp` SET
`id`='".$user_id."',
`user`='".$nguoinhan."',
`text`='$text2',
`time`='".time()."'
");
echo'<div class="omenu">Bạn đã tặng thành công: <b><font color="red"> '.$shop['tenvatpham'].'</font></b> cho '.nick($nguoinhan).'</div>';
}

}
}

		$total2 =mysql_result(mysql_query("SELECT COUNT(*) FROM `shopdo` WHERE `hienthi`='0'"), 0);

	$total =mysql_result(mysql_query("SELECT COUNT(*) FROM `shopdo` WHERE `user_id`='".$user_id."' AND `loai`='".$loai."'"), 0);

    echo'<div class="phdr">Kho khung</div>';


$req=mysql_query("SELECT * FROM `shopkhung` WHERE `id`!='0' ORDER BY `id` DESC LIMIT $start,$kmess");

while($res=mysql_fetch_array($req)){
echo'  <table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info"><tbody><tr><td class="left-info">

<div class="gd_khung_'.$res['id'].'">
<img src="/avatar/'.$user_id.'.png" style="position: absolute;verticalalign: 0 px;margin:13px 0 0 -23px;"></div>
</td><td class="right-info"><span>
<font color="ff007f">Vật phẩm:</font>   '.$res[tenvatpham].'  </font> ('.($res['timesudung'] ? thoigiantinh(floor($res['timesudung'])).'' : 'Vĩnh viễn').')</br>
          <font color="ff007f">ID:</font> '.$res['id'].'</font><br>
		  

          </span>';
if($datauser['rights']>=9 ){
echo' <b><a href="?act=lay&id='.$res[id].'">Lấy</a>';
        echo' <a href="?act=tang&id='.$res[id].'">- Tặng</a>';
    
       echo' <a href="?act=edit&id='.$res[id].'">- Sửa</a>';
  }
          echo'</td></tr></tbody></table>';





}

$total =mysql_result(mysql_query("SELECT COUNT(*) FROM `shopkhung` WHERE `id`!='0'"), 0);

if($total == 0){
echo'<div class="omenu">Item của bạn trống!</div>';
}else if($total > $kmess){
echo'<div class="topmenu">'.functions::pages('?loai='.$loai.'&page=', $start, $total, $kmess).'</div>';

}
echo'</form>';


require('../incfiles/end.php');
?>
