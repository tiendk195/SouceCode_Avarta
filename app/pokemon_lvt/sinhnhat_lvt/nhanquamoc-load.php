<?php

define('_IN_JOHNCMS', 1);
$rootpath='../../';

require_once ("../../incfiles/core.php");
$so2=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='158'"));

if(isset($_POST['submit3'])) {



if ( $so2['soluong'] <10 ){
echo"<script type='text/javascript'>

alert('Bạn chưa đủ thành tích' );
</script>";
} else {
	if ($datauser['capnhanqua']==0 and  $so2['soluong'] >=10  ){
		    echo' Bạn nhận được 100 lượng + 25 thẻ quay số miễn phí từ Mốc quà 1</br>';
mysql_query("UPDATE `users` SET `capnhanqua` =`capnhanqua` + '1',`luong` = `luong`+'100'  WHERE `id` = '{$user_id}'");
  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'25' WHERE `user_id`='".$user_id."' AND `id_shop` = '12'");

	} else 	if ($datauser['capnhanqua']==1 and  $so2['soluong'] >=20  ){
				    echo' Bạn nhận được 1 mảnh ghép Cú vọ từ Mốc quà 2</br>';
mysql_query("UPDATE `users` SET `capnhanqua` =`capnhanqua` + '1'  WHERE `id` = '{$user_id}'");
  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '165'");
  
	} else 	if ($datauser['capnhanqua']==2 and  $so2['soluong'] >=30  ){
		    echo' Bạn nhận được 300 lượng  + 1 mảnh ghép Cú vọ từ Mốc quà 3</br>';
mysql_query("UPDATE `users` SET `capnhanqua` =`capnhanqua` + '1',`luong` = `luong`+'300'  WHERE `id` = '{$user_id}'");
  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '165'");
  
	} else 	if ($datauser['capnhanqua']==3 and  $so2['soluong'] >=50  ){
		    echo' Bạn nhận được 500 lượng  + 2 mảnh ghép Cú vọ từ Mốc quà 4</br>';
mysql_query("UPDATE `users` SET `capnhanqua` =`capnhanqua` + '1',`luong` = `luong`+'500'  WHERE `id` = '{$user_id}'");
  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'2' WHERE `user_id`='".$user_id."' AND `id_shop` = '165'");
  
	} else 	if ($datauser['capnhanqua']==4 and  $so2['soluong'] >=80  ){
		    echo' Bạn nhận được 100 lượng khóa + 3 mảnh ghép Cú vọ từ Mốc quà 5</br>';
mysql_query("UPDATE `users` SET `capnhanqua` =`capnhanqua` + '1',`luongkhoa` = `luongkhoa`+'100'  WHERE `id` = '{$user_id}'");
  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'3' WHERE `user_id`='".$user_id."' AND `id_shop` = '165'");
  
	} else 	if ($datauser['capnhanqua']==5 and  $so2['soluong'] >=110  ){
		    echo' Bạn nhận được 2 Huy hiệu STPay vĩnh viễn + 5 mảnh ghép Cú vọ từ Mốc quà 6</br>';
mysql_query("UPDATE `users` SET `capnhanqua` =`capnhanqua` + '1'  WHERE `id` = '{$user_id}'");
  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'5' WHERE `user_id`='".$user_id."' AND `id_shop` = '165'");
    mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'2' WHERE `user_id`='".$user_id."' AND `id_shop` = '125'");

  
	} else 	if ($datauser['capnhanqua']==6 and  $so2['soluong'] >=150  ){
		    echo' Bạn nhận được 10 mảnh ghép Cú vọ từ Mốc quà 7</br>';
mysql_query("UPDATE `users` SET `capnhanqua` =`capnhanqua` + '1'  WHERE `id` = '{$user_id}'");
  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'10' WHERE `user_id`='".$user_id."' AND `id_shop` = '165'");
  
	} else 	if ($datauser['capnhanqua']==7 and  $so2['soluong'] >=200  ){
		    echo' Bạn nhận được Mũ sinh nhật Avatar vĩnh viễn từ Mốc quà 8</br>';
mysql_query("UPDATE `users` SET `capnhanqua` =`capnhanqua` + '1'  WHERE `id` = '{$user_id}'");

	$do=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='2635'"));
		
		

 mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$do[loai]."',
`id_loai`='".$do[id_loai]."',
`tenvatpham`='".$do[tenvatpham]."',
`id_shop`='".$do[id]."',
`timesudung`='0'
");

		} else 	if ($datauser['capnhanqua']==8 and  $so2['soluong'] >=230  ){
		    echo' Bạn nhận được 500 lượng khóa + 10 mảnh ghép Cú vọ từ Mốc quà 9</br>';
mysql_query("UPDATE `users` SET `capnhanqua` =`capnhanqua` + '1',`luongkhoa` = `luongkhoa`+'500'  WHERE `id` = '{$user_id}'");
  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'10' WHERE `user_id`='".$user_id."' AND `id_shop` = '165'");
  
		} else 	if ($datauser['capnhanqua']==9 and  $so2['soluong'] >=260  ){
		
		    echo' Bạn nhận được 2 Huy hiệu STPay vĩnh viễn + 15 mảnh ghép Cú vọ từ Mốc quà 10</br>';
mysql_query("UPDATE `users` SET `capnhanqua` =`capnhanqua` + '1'  WHERE `id` = '{$user_id}'");
  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'15' WHERE `user_id`='".$user_id."' AND `id_shop` = '165'");
      mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'2' WHERE `user_id`='".$user_id."' AND `id_shop` = '125'");


		} else 	if ($datauser['capnhanqua']>=10  )
		{
			    echo' Lỗi. Bạn đã nhận tất cả thành tích!<a href="sinhnhat.php"> Quay lại</a>';
		} 


	

}
}

?>