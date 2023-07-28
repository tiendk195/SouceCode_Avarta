<?php
define('_IN_JOHNCMS', 1);
$rootpath='../../';
require_once('../../incfiles/core.php');
require_once('inc.php');
$textl = 'Khu Nhà Ở';
?>
<?php
require('../../incfiles/head.php');
echo '<div class="phdr">Bảng xếp hạng nhà rộng nhất</div>';
$sql_nha = "SELECT * FROM gamemini_house_users WHERE id ORDER BY sl_vatpham DESC LIMIT $start,$kmess";
$data->query($sql_nha);
$query = $data->query_2();
$sql_nha2 = "SELECT * FROM gamemini_house_users";
$data->query($sql_nha2);
$rows = $data->num_rows();
while($post = mysql_fetch_array($query)){

?>
<div class="omenu">
<table cellpadding="0" cellspacing="0" width="100%">
<tbody><tr><td width="50">
<img src="/avatar/<?php echo $post[user_id]; ?>.png" alt="*" class="portrait">
</td><td width="auto" valign="top">
Nick: <b><?php echo nick($post[user_id]); ?></b><br/>
Nhà Cấp: <b><?php echo $post[lerver]; ?></b><br/>
Số lượng đồ: <b><?php echo $post[sl_vatpham]; ?></b><br/>
<a href="<?php echo 'view/?id='.$post[user_id].''; ?>">Xem nhà</a>
</td></tr></tbody></table>
</div>
<?php
}
if ($rows > $kmess){ //Phân Trang
echo '<div class="trang">' . functions::display_pagination('bxh.php?page='.$int, $start, $rows, $kmess) . '</div>';
}
require('../../incfiles/end.php');
?>
