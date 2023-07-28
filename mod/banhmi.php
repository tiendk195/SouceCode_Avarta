<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');

require('../incfiles/head.php');
echo'<div class="phdr"> Hồi phục sức khỏe</div> ';

echo'<div class="omenu"><form method="post">
<input type="radio" name="loai" value="1"> Kem dâu <img src="img/kemdau.png"> - 2000 xu + 10 sức khỏe
<br><input type="radio" name="loai" value="2"> Kem tươi <img src="img/kem.png"> - 5000 xu + 50 sức khỏe
<br><input type="radio" name="loai" value="3"> Hambuger <img src="img/hamburger.png"> - 10000 xu + 100 sức khỏe
<br><center><input type="submit" name="submit" value="Mua"></center>
</form>
</div>';

if (isset($_POST['submit'])) {

	$vatpham = $_POST['loai'];
if ($vatpham=='1'){
		$tien=2000;
	} else 
			if ($vatpham=='2'){
		$tien=5000;
	} else 	if ($vatpham=='3'){
		$tien=10000;
	}  

	
	 if (!in_array($vatpham, array('1', '2', '3'))) {
		echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Vui lòng thao tác lại</div>';
		} else if ($datauser['suckhoe']>=100){
			echo'<div class="omenu">Bạn không cần hồi phục</div>';
} else 
			if ($vatpham=='1'){
if ($datauser['xu']>=$tien) {
		echo'<div class="omenu">Bạn đã mua thành công Kem dâu và bạn được cộng 10 sức khỏe</div>';
						mysql_query("UPDATE `users` SET `xu` = `xu`- '".$tien."' ,`suckhoe`=`suckhoe`+'10' WHERE `id` = '".$user_id."'");
} else {
			echo'<div class="omenu">Bạn đã không đủ xu</div>';
}
		} else 	if ($vatpham=='2'){
if ($datauser['xu']>=$tien) {
		echo'<div class="omenu">Bạn đã mua thành công Kem tươi và bạn được cộng 50 sức khỏe</div>';
						mysql_query("UPDATE `users` SET `xu` = `xu`- '".$tien."' ,`suckhoe`=`suckhoe`+'50' WHERE `id` = '".$user_id."'");
} else {
			echo'<div class="omenu">Bạn đã không đủ xu</div>';
}
		} else 
			if ($vatpham=='3'){
if ($datauser['xu']>=$tien) {
		echo'<div class="omenu">Bạn đã mua thành công Bánh mì và bạn được hồi 100 sức khỏe</div>';
						mysql_query("UPDATE `users` SET `xu` = `xu`- '".$tien."' ,`suckhoe`='100' WHERE `id` = '".$user_id."'");
} else {
			echo'<div class="omenu">Bạn đã không đủ xu</div>';
}
			} 


}

		
	Require('../incfiles/end.php');
?>