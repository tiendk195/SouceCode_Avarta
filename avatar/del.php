<?PHP
Define('_IN_JOHNCMS', 1);
Require('../incfiles/core.php');
$headmod = 'Xóa item';
$textl = 'Xóa item';
Require('../incfiles/head.php');
if ($rights<9) {
header('Location: /404.php');
exit;
}
Echo '<div class="phdr">Xóa vật phẩm</div>';
$id=$_GET[id];
  $xyz=mysql_num_rows(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$id."'"));
if($xyz<=0){header('location: /');}
$res=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$_GET[id]."'"));
echo'<center>';
Echo'<div class="omenu"><b>Bạn có muốn xóa vật phẩm <img src="/images/shop/'.$id.'.png"> <font color="red">'.$res['tenvatpham'].'</font> không ??</b>';
echo '<form method="post"><input type="submit" name="submit" value="Xóa"></form></div>';
if (isset($_POST[submit])) {
Echo'<div class="omenu">Bạn đã xóa thành công vật phẩm <font color="red">'.$res['tenvatpham'].'</font> !!<a href="index.php">Trở về cửa hàng!!</a></div>';
echo'</center>';
mysql_query("DELETE FROM `shopdo` WHERE `id`='".$res[id]."'");

}
Require('../incfiles/end.php');
?>