<?php
define('_IN_JOHNCMS', 1);
require_once('../../incfiles/core.php');
$textl = 'Đấu boss';
require('../../incfiles/head.php');
echo '
<div class="phdr">Đấu boss</div>
<div class="gmenu"><div class="list5">';
if($user_id){
echo '
<form action="tess.php" method="post">
<input type="checkbox" name="checkid[]" value="1"/>1
<input type="checkbox" name="checkid[]" value="2"/>2
<input type="checkbox" name="checkid[]" value="3"/>3
<input type="submit" name="submit" value="Thu Hoạch"/>
<input type="submit" name="tuoinuoc" value="Tưới Nước"/>
</form>';
if(isset($_POST[submit])){
$check = $_POST['checkid'];
$n = count($check);
for($i = 0 ; $i < $n; $i++){
	echo ($check[$i].'');
}
}
if(isset($_POST[tuoinuoc])){
$check = $_POST['checkid'];
$n = count($check);
for($i = 0 ; $i < $n; $i++){
	echo 'Tưới nước';
	echo ($check[$i].'');
}
}
}else{
	echo '<div class="list1">- Hãy đăng nhập để sử dụng chức năng này nhé!</div>';
}
require('../../incfiles/end.php');
?>