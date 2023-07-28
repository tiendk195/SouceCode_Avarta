<?php

define('_IN_JOHNCMS', 1);
$rootpath='../../';

require_once ("../../incfiles/core.php");

if(isset($_POST['submit2'])) {
	$rand = rand(1,1000);



if ( $datauser['luong'] <20 ){
echo"<script type='text/javascript'>

alert('Bạn không đủ lượng để bắn pháo' );
</script>";
} else {
	if ($datauser['gioihanbanphao']<50){
		    echo' Bạn nhận được 1 số 1 yêu thương <img src="/images/vatpham/158.png"></br>';
mysql_query("UPDATE `users` SET `gioihanbanphao` =`gioihanbanphao` + '1'  WHERE `id` = '{$user_id}'");
  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '158'");

	}
    echo' Bắn pháo sinh nhật thành công! <a href="sinhnhat.php"> Quay lại</a>';
	
mysql_query("UPDATE `users` SET `luong` =`luong` - '20',`banphaohoaluong`= `banphaohoaluong` +'1' WHERE `id` = '{$user_id}'");
	
}


	

}
?>