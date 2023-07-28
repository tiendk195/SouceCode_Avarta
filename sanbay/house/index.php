<?php
define('_IN_JOHNCMS', 1);
$rootpath='../../';
require_once('../../incfiles/core.php');
require_once('inc.php');
$textl = 'Khu Nhà Ở';
?>
<?php
require_once('../../incfiles/head.php');
?>
<style>
body{
min-width: <?php echo 400+$css;?>px;
text-algin: center;
}
</style>
<?php
echo '<div class="phdr">Nhà Của Bạn</div>';
if(isset($_GET['yes_nha'])) echo '<div class="omenu" style="text-align: center; font-size: 16px;">Mua Nhà Thành Công Rồi, hãy cố gắng trang trí nó thật là đẹp mắt nhé!.. </div>';
if(isset($_GET['no_tien'])) echo '<div class="omenu" style="text-align: center; font-size: 16px;">Bạn không đủ xu để mua ngôi nhà này.. </div>';
if(isset($_GET['yes_lv'])) echo '<div class="omenu" style="text-align: center; font-size: 12px;">Nâng cấp thành công. </div>';
if(isset($_GET['no_tiennc'])) echo '<div class="omenu" style="text-align: center; font-size: 12px;">Bạn không đủ tiền để nâng cấp ngôi nhà của bạn </div>';
$sql_nha = "SELECT * FROM gamemini_house_users WHERE user_id = '{$user_id}'";
$data->query($sql_nha);
$rows = $data->num_rows();
$assoc = $data->fetch_assoc();
if($rows == 0){
if(isset($_GET['mua'])){
if(isset($_POST['dongy'])){
if($datauser['xu'] >= 1000000){
$insert = "INSERT INTO `gamemini_house_users` SET user_id = '{$user_id}'";
$data->query($insert);
$update = "UPDATE `users` SET `xu` = `xu` - '1000000' WHERE id = '{$user_id}' LIMIT 1";
$data->query($update);
header('Location: ../house/?yes_nha');
}else{
header('Location: ../house/?no_tien');
}
}elseif(isset($_POST['khong'])){
header('Location: ../house/');
}
echo '<div class="omenu" style="text-align: center; font-size: 16px;">Bạn có muốn thật sự mua nhà này không?<br/>
<form action="" method="post">
<input type="submit" name="dongy" value="Có"/>
<input type="submit" name="khong" value="Không"/>
</form>
</div>';
}
echo '<div class="omenu">Bạn chưa có nhà để ở hả, tội nghiệp quá, cố gắng kiếm đủ <b>1.00.000 Xu</b> mà sắm cho mình cái nhà đi..</div>';
echo '<div class="omenu"><a id="nut" href="?mua">Mua Nhà Thôi</a></div>';
}else{
if(isset($_GET['nangcap'])){

$tiencan = 2000000*($assoc['lerver']+1);

if(isset($_POST['dongy'])){

if($datauser['xu'] >= $tiencan){
$update_1 = "UPDATE `users` SET `xu` = `xu` - '{$tiencan}' WHERE id = '{$user_id}' LIMIT 1";
$update_2 = "UPDATE `gamemini_house_users` SET `lerver` = `lerver` + '1' WHERE user_id = '{$user_id}' LIMIT 1";
$data->query($update_1);
$data->query($update_2);
header('Location: ../house/?yes_lv');
}elseif($datauser['xu'] < $tiencan){
header('Location: ../house/?no_tiennc');
}
}elseif(isset($_POST['khong'])){
header('Location: ../house/');
}
echo '<div class="omenu" style="text-align: center; font-size: 16px;">Bạn có muốn nâng cấp ngôi nhà này lên với giá <b>'.$tiencan.'</b> Xu không ?<br/>
<form action="" method="post">
<input type="submit" name="dongy" value="Có"/>
<input type="submit" name="khong" value="Không"/>
</form>
</div>';
}
include('hd.php');

echo '<div class="omenu"><a id="nut" href="edit/">Chỉnh Sửa Nhà</a></div>
<div class="omenu"><a id="nut" href="shop/">Mua Sắm Đồ</a></div>';
echo '<div class="omenu"><a id="nut" href="?nangcap">Nâng Cấp</a></div>';
}
echo '<div class="omenu"><a id="nut" href="bxh.php">Bảng Xếp Hạng</a></div>';
require('../../incfiles/end.php');
?>
