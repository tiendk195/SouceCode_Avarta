<?php
define('_IN_JOHNCMS', 1);
$rootpath='../../../';
require_once('../../../incfiles/core.php');
require_once('../inc.php');
$textl = 'SHOP mua sắm';
?>
<?php
require('../head.php');
?>
<style>
body{
min-width: <?php echo 400+$css;?>px;
text-algin: center;
}
</style>
<?php
echo '<div class="phdr">SHOP MUA SẮM NHÀ</div>';
$sql = "SELECT * FROM gamemini_house_users WHERE user_id = '{$user_id}'";
$data->query($sql);
$rows = $data->num_rows();
if($rows > 0){
if(isset($_GET['yes_vp'])) echo '<div class="romenu" style="text-align: center; font-size: 16px;">Mua sản phẩm thành công, <a href="../">Về Nhà Xem</a>.. </div>';
if(isset($_GET['no_vp'])) echo '<div class="romenu" style="text-align: center; font-size: 16px;">Bạn không có đủ tiền để mua đồ đâu nhé ! </div>';
echo '<div class="omenu"><img src="/icon/next.png"> Chào mừng bạn đã đến với trung tâm đồ nội thất hãy vào và mua những đồ nội thất đẹp nhất nào!!</div>';
include('sanpham.php');
echo '<div class="phdr">Danh Mục Mua Sắm</div>';
echo '<div class="omenu"><img src="/icon/next.png"> <a href="tt_1.html"><b>Giường</b></a></div>';
echo '<div class="omenu"><img src="/icon/next.png"> <a href="tt_2.html"><b>Tủ</b></a></div>';
echo '<div class="omenu"><img src="/icon/next.png"> <a href="tt_3.html"><b>Đồ Điện</b></a></div>';
echo '<div class="omenu"><img src="/icon/next.png"> <a href="tt_4.html"><b>Bàn Ghế</b></a></div>';
echo '<div class="omenu"><img src="/icon/next.png"> <a href="tt_5.html"><b>Linh Tinh</b></a></div>';
echo '<div class="omenu"><img src="/icon/next.png"> <a href="tt_6.html"><b>Trang Trí</b></a></div>';
echo '<div class="omenu"><img src="/icon/next.png"> <a href="tt_7.html"><b>Cây Cảnh</b></a></div>';
echo '<div class="omenu"><img src="/icon/next.png"> <a href="tt_8.html"><b>Sàn Nhà</b></a></div>';
echo '<div class="omenu"><img src="/icon/next.png"> <a href="tt_9.html"><b>Vật liệu khác</b></a></div>';
echo '<div class="list5"><a id="nut" href="../">Quay Lại</a> <a id="nut" href="../edit/">Sửa Lại Nhà</a></div>';
}else{
echo 'Đã có nhà đâu mà mua đồ, mua thì biết vứt đâu... Đi sắm nhà đi bạn!';
}
require('../../../incfiles/end.php');
?>
