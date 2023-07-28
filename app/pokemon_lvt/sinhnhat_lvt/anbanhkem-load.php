<?php

define('_IN_JOHNCMS', 1);
$rootpath='../../';

require_once ("../../incfiles/core.php");

if(isset($_POST['submit'])) {
	$rand = rand(1,1000);
	$dans = rand(1,3);
	$xu = rand(10000,30000);
	$luong = rand(10,50);

$time = time();

if (time() <= $datauser['timeanbanhsn'] + 3600 ){
echo"<script type='text/javascript'>

alert('Bạn chỉ có thể ăn bánh kem sau mỗi 6 giờ!  ' );
</script>";
} else {
		 
    echo" <script>
alert('Bạn nhận được 5 Bánh sinh nhật ngọt ngào và 2 Lượng khóa. Hãy quay lại sau 6 giờ nữa nhé!' );
</script>";
  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'5' WHERE `user_id`='".$user_id."' AND `id_shop` = '159'");
mysql_query("UPDATE `users` SET `timeanbanhsn` = " .time(). ",`luongkhoa`=`luongkhoa`+'2'  WHERE `id` = '{$user_id}'");
	
}


	

}
?>