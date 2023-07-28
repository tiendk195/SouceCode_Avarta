<?php
define('_IN_JOHNCMS', 1);
$rootpath='../../';

require_once ("../../incfiles/core.php");
$textl = 'Đấu giá';
require_once ("../../incfiles/head.php");
if(!$user_id){
Header("Location: $home");
exit;
}

?>
<style>
.gach {
    background: url(https://i.imgur.com/7kK4wQN.png);
}
</style>
<?php
echo '<div class="phdr">Đấu giá</div> ';
mysql_query("UPDATE `users` SET `vitri` = '2211' WHERE `id` = '".$user_id."'");

echo'<div class="gach"><center>';

echo'<br><br><a href="shopxeng.php">
<img src="img/npcdaugia.gif"></a></br> ';
$online_u = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `lastdate` > " . (time() - 300) . " AND `vitri` = '2211'"), 0);
$totalonline = $online_u;
$q = @mysql_query("select * from `users` where `lastdate` > " . (time() - 300) . " AND `vitri` = '2211';");
$count = mysql_num_rows($q);
while ($arr = mysql_fetch_array($q)){
$trinhtrangvip = mysql_query("select `rights` from `users` where id='" . $arr['id'] . "'");
$trinhtrangviphonnua = mysql_fetch_array($trinhtrangvip);
if($arr['id'] != $datauser['id']){
$u_on[]='<a href="/member/' . $arr['id'] . '.html"><img src="/avatar/' . $arr['id'] . '.png"></a>';
}else{
	$u_on[]='<img src="/avatar/' . $arr['id'] . '.png">';
}
}
//Keet thuc topic
if ($online_u > 0){
echo implode(' ',$u_on).'';
}else{
	echo '<img src="/avatar/'.$user_id.'.png"/>';
}
echo'</center></div>';

if ($datauser['rights']>=9){
echo'
<div class="omenu"><a href="?act=taomoi"><img src="/icon/vao.png"> Tạo phiên đấu giá mới</a></div>';
}
echo'<div class="omenu">
<a href="?act=lichsu"><img src="/icon/vao.png"> Lịch sử tham gia của bạn</a></div>
<div class="omenu">
<a href="?act=hdsd"><img src="/icon/vao.png"> Hướng dẫn</a></div>';
switch($act){
default:

$total = mysql_result(mysql_query("SELECT COUNT(*) FROM `daugia` WHERE `site` = 1"),0);
$csdl = mysql_query('SELECT * FROM `daugia` WHERE `site` = 1');
if($total < 1){
echo '<div class="omenu"><font color="red"> Hiện tại chưa có vật phẩm đấu giá nhé bạn.
</div></font>';
}
if($total){
echo '<div class="omenu"><font color="red"> Có <b>'.$total.'</b> sản phẩm đang được đấu giá, hàng nhập khẩu, chưa có trong shop</div></font>';
$csdlz = mysql_query("SELECT * FROM `daugia` WHERE `site` = 1 ORDER BY `id` DESC LIMIT $start, $kmess");
while ($res = mysql_fetch_array($csdlz)){
$time = ($res['timeend']-time());
$get = mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id` = '".$res['idvp']."'"),0);
if ($res[loaitien]=='xu'){
    $loaitien='Xu';
    
}
if ($res[loaitien]=='luong'){
    $loaitien='Lượng';
    
}
if ($res[loaitien]=='luongkhoa'){
    $loaitien='Lượng khóa';
    
}
echo '<div class="omenu">
<img class="ducnghia_item" src="/images/shop/'.$res['idvp'].'.png"></br>
<b>Phiên:</b> #'.$res['id'].'</br>
<b><font color="red">Tên vật phẩm:</font></b> '.$get['tenvatpham'].''.($rights >=9 ? '<a href="?act=edit&id='.$res['id'].'"> [Sửa]</a><a href="?act=del&id='.$res['id'].'"> [Xóa]</a>' : '').'</br>
<b><font color="blue">Khởi điểm:</font></b> '.number_format($res['sotien']).' '.$loaitien.'<br>
'.($time >0 ? '<a href="?act=daugia&id='.$res['id'].'">
<input type="submit" name="submit" value="Đấu giá"></a><br/>
Kết thúc sau: <b>'.$time.'</b> giây' : '<font color=red>Đã kết thúc</font>').'</div>';

}
if($total > $kmess)
echo '<div class="trang">'.functions::display_pagination('?',$start,$total,$kmess).'</div>';
} else {

}
break;
case 'lichsu':

echo'<div class="phdr"> Lịch sử</div>';


$res=mysql_query("SELECT * FROM `daugia_lichsu` WHERE `id`!='0' AND `user_id`='".$user_id."' ORDER BY `id` DESC LIMIT $start,$kmess");


while ($post = mysql_fetch_array($res)){

    echo'<div class="omenu">
    <b>Phiên: #'.$post['phien'].'</b></br>
<b>Loại tiền : '.$post['loaitien'].'</b></br>

<b>Thời gian: '.date("d/m/Y - H:i", $post['time']).'</b></br>

<b>Số tiền: </b><font color="red"></font> <b>'.number_format($post[sotien]).'</b> </font></div>';
}
$total=mysql_result(mysql_query("SELECT COUNT(*) FROM  `daugia_lichsu` WHERE `id`!='0' AND `user_id`='".$user_id."' "), 0);
IF($total > $kmess){
Echo'<div class="phdr">'.functions::pages('?act=lichsu&page=', $start, $total, $kmess).'</div>';
}
break;
case 'hdsd':
echo'<div class="phdr"> Hướng dẫn chức năng đấu giá</div>
<div class="omenu">- Tùy vào lịch đấu giá mà BQT thông báo. Các item được đấu giá sẽ tùy thuộc vào các khung giờ khác nhau và mức giá 1 lần cược cũng đều khác nhau, có thể là xu hoặc lượng. Ví dụ item đó có giá cược 1 lần là 5.000 xu và bạn chọn số lần cược là 5 nếu như có người chơi khác đặt số lần cược lớn nhất sẽ dành chiến thắng trong phiên đấu giá.</div>';
break;
case 'taomoi':
if($rights >= 9){
if(isset($_POST['submit'])){
    $loaitien=$_POST['loaitien'];
    $sotien=intval($_POST['sotien']);
        $thoigian=intval($_POST['time']);
        $time=time()+$thoigian*60*60;

if (empty($sotien)){
    	echo'<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Vui lòng nhập số tiền</div>';
} else if (empty($thoigian)){
    	echo'<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Vui lòng nhập thời gian</div>';
} else
    if ($loaitien !='xu' && $loaitien !='luong' && $loaitien !='luongkhoa' ){
	echo'<div class="omenu">Lỗi</div>';
} else {
@mysql_query("INSERT INTO `daugia` SET `user_id` = '".$user_id."',
`idvp` = '".intval($_POST[idvp])."', 
`sotien` = '".intval($_POST[sotien])."',
`loaitien` = '".$_POST[loaitien]."', 
`site` = '1', 
`timeend` = '".$time."'") or die(mysql_error());
@mysql_query("INSERT INTO `guest` SET `time` = '".time()."', `text` = 'Vừa có 1 phiên đấu giá mới. Vào công viên để biết thêm chi tiết...', `user_id` = 2");
header('Location: index.php');

}
}
echo '<div class="omenu"><form method="post">';
echo 'Chọn vật phẩm: <select name="idvp"  value="'.$_POST['id'].'">';
$qs=mysql_query("SELECT * FROM `shopdo` WHERE `hienthi`='1'");
while ($show=mysql_fetch_array($qs)) {
echo '<option value="'.$show[id].'">'.$show[id].': '.$show[tenvatpham].'</option>';
}
echo '</select><br/>';
echo 'Loại tiền: <select name="loaitien">
<option value = "xu">Xu</option><option value = "luong">Lượng</option><option value = "luongkhoa">Lượng khóa</option></select><br>';
echo'<input type="number" name="sotien" placeholder="Nhập số tiền ..."><br>
<input type="number" name="time" placeholder="Nhập thời gian (giờ) ..."><br>
<input type="submit" name="submit" class="inputsubmit" value="Tạo phiên"></div>';
}
break;
case 'edit':
    $get = mysql_fetch_array(mysql_query("SELECT * FROM `daugia` WHERE `id` = '".intval($_GET['id'])."'"),0);

$total = mysql_result(mysql_query("SELECT COUNT(*) FROM `daugia` WHERE `id` = '".intval($_GET['id'])."'"),0);
if($rights >=9 && $total){
if(isset($_POST['submit'])){
   $loaitien=$_POST['loaitien'];
    $sotien=intval($_POST['sotien']);
if (empty($sotien)){
    	echo'<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Vui lòng nhập số tiền</div>';
} else
    if ($loaitien !='xu' && $loaitien !='luong' && $loaitien !='luongkhoa' ){
	echo'<div class="omenu">Lỗi</div>';
} else {
@mysql_query("UPDATE `daugia` SET `user_id` = $user_id, `sotien` = '".intval($_POST[sotien])."',
`loaitien` = '".$_POST[loaitien]."'  WHERE `id` = '".intval($_GET['id'])."'");
header('Location: index.php');
exit;
}
}
echo '<div class="omenu">
<form method="post">';
echo 'Loại tiền: <select name="loaitien"><option value = "'.$get['loaitien'].'">Mặc định ('.$get['loaitien'].')</option>
<option value = "xu">Xu</option><option value = "luong">Lượng</option><option value = "luongkhoa">Lượng khóa</option></select><br>';
echo'<input type="number" name="sotien" placeholder="'.$get['sotien'].'"><br>
<input type="submit" class="inputsubmit" name="submit" value="Sửa"></div>';
}
break;
case 'del':
$total = mysql_result(mysql_query("SELECT COUNT(*) FROM `daugia` WHERE `id` = '".intval($_GET['id'])."'"),0);
if($rights >=9 && $total){
if(isset($_POST['submit'])){
@mysql_query("DELETE FROM `daugia_act` WHERE `iddg` = $id");
@mysql_query("DELETE FROM `daugia` WHERE `id` = $id");
header('Location: index.php');
exit;
}
echo '<div class="omenu"><form method="post"><input type="submit" name="submit" value="Xác nhận xóa" class="inputback"></form></div>';
}
break;
case 'daugia':
$total = mysql_result(mysql_query("SELECT COUNT(*) FROM `daugia` WHERE `id` = '".intval($_GET['id'])."'"),0);
if(!$total){echo '<div class="omenu"><font color="red"><b>Lỗi !!</font></b> Vật phẩm không có trong danh sách đấu giá!</div>';}
else {
$res = mysql_fetch_array(mysql_query("SELECT * FROM `daugia` WHERE `id` = '".intval($_GET['id'])."'"),0);
if(($res['timeend'] - time()) <0){
Header("Location: $home/game/daugia");
exit;
}
$time = ($res['timeend']-time());
$get = mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id` = '".$res['idvp']."'"),0);
if ($res[loaitien]=='xu'){
    $loaitien='Xu';
    
}
if ($res[loaitien]=='luong'){
    $loaitien='Lượng';
    
}
if ($res[loaitien]=='luongkhoa'){
    $loaitien='Lượng khóa';
    
}echo '<div class="omenu">
<img class="ducnghia_item" src="/images/shop/'.$res['idvp'].'.png"></br>
<b>Phiên:</b> #'.$res['id'].'</br>
<b><font color="red">Tên vật phẩm:</font></b> '.$get['tenvatpham'].''.($rights >=9 ? '<a href="?act=edit&id='.$res['id'].'"> [Sửa]</a><a href="?act=del&id='.$res['id'].'"> [Xóa]</a>' : '').'</br>
<b><font color="blue">Khởi điểm:</font></b> '.number_format($res['sotien']).' '.$loaitien.'<br>
'.($time >0 ? 'Kết thúc sau: <b>'.$time.'</b> giây' : '<font color=red>Đã kết thúc</font>').'</div>';
if(isset($_POST['submit'])){
    if ($datauser['rights']>=9){
        echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Chức năng không dành cho BQT</div>';
        require_once ("../../incfiles/end.php");
exit;

    }
$xuz = intval(abs($_POST['cost']));
if($res['loaitien']=='xu'){
    $xu = 'xu'; $xl = 'xu';
    
} else if($res['loaitien']=='luong'){
    $xu = 'luong'; 
    $xl = 'luong';
    
} else if($res['loaitien']=='luongkhoa'){
    $xu = 'luongkhoa'; 
    $xl = 'luongkhoa';
    
}

if($datauser[$xu] > $res['sotien'] AND $xuz > $res['sotien'] AND $xuz <= $datauser[$xu]){
$got = mysql_fetch_array(mysql_query("SELECT `cost` FROM `daugia_act` WHERE `iddg` = $id ORDER BY `cost` DESC LIMIT 1"),0);
if($got['cost'] < $xuz && $xuz > $res['sotien'] && $xuz > 0){
mysql_query("UPDATE users SET $xu = $xu -$xuz WHERE id = $user_id");
mysql_query("INSERT INTO `daugia_act` SET `cost` = $xuz, `user_id` = $user_id, `iddg` = $id");
           mysql_query("INSERT INTO `daugia_lichsu` SET 
               `user_id`='" . $user_id ."',
               `phien`='" . $id . "',
               `sotien`='" . $xuz . "',
               `loaitien`='" . $res['loaitien']. "',
               `time` = '".time()."'
               "); 
echo '<div class="omenu">Tham gia tranh giá thành công!</div>';
header('Location: index.php');

} else {
echo '<div class="omenu">Bạn đã đưa ra giá thấp hơn hoặc ngang bằng với giá đấu cao nhất hiện tại!</div>';
}
} else {
echo '<div class="omenu">Bạn không thể đấu giá với mức này!</div>';
}
}
echo '<div class="omenu">Nhập số tiền đấu giá:<form method="post"><input type="number" name="cost" placeholder="Nhập số tiền"></br>
<button name="submit">Tranh giá</button></form></div>';
$good = mysql_query("SELECT * FROM `daugia_act` WHERE `iddg` = $id ORDER BY `cost` DESC");
echo '<div class="phdr">Lượt đấu giá ('.mysql_num_rows($good).')</div>';

if(mysql_num_rows($good)){
while($well = mysql_fetch_array($good)){
echo '<div class="omenu">'.nick($well['user_id']).' <span class="right"><b>'.number_format($well['cost']).'</b> '.$loaitien.'</span></div>';
}
} else{
echo '<div class="omenu">Hãy là người đầu tiên!</div>';
}
}
break;
}
require_once ("../../incfiles/end.php");
