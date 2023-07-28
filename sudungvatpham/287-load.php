<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');



$hopqua=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='287'"));
$hopqua2=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE   `id`='{$hopqua['id_shop']}'"));




if(isset($_POST['moruong'])) {
        $tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."'");
$checktongruong=mysql_num_rows($tongruong);
	if ($checktongruong>=$datauser['tongruong']) {
	 	                 		    echo'<script>alert("Rương của bạn đã đầy, vui lòng nâng cấp thêm ");</script>';
header('Location: /ruong');

exit;	 	                 		    
}

    if ($hopqua['soluong']<=0) {
			                  		    echo'<script>alert("Bạn không có đủ '.$hopqua2['tenvatpham'].' ");</script>';
    } else  {
		$rand=rand(1,50);
		$bh = rand (1,3);
				$cn = rand (1,3);
				$gx = rand (1,3);
				$ad = rand (1,3);
				$nr = rand (1,3);

		if ($rand==1){
		    			                  		    echo'<script>alert("Bạn nhận được '.number_format($bh).' bổ huyết  ");</script>';

			  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'{$bh}' WHERE `user_id`='".$user_id."' AND `id_shop` = '280'");
   
		}
			if ($rand==2){
 echo'<script>alert("Bạn nhận được '.number_format($cn).' cuồng nộ  ");</script>';

			  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'{$cn}' WHERE `user_id`='".$user_id."' AND `id_shop` = '282'");
   
		}
				if ($rand==3){
		     echo'<script>alert("Bạn nhận được '.number_format($gx).' giáp xên bọ hung  ");</script>';

			  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'{$gx}' WHERE `user_id`='".$user_id."' AND `id_shop` = '281'");
   
		}
	
						if ($rand==4){
		     echo'<script>alert("Bạn nhận được '.$ad.' ẩn danh  ");</script>';

			  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'{$ad}' WHERE `user_id`='".$user_id."' AND `id_shop` = '283'");
   
		}
						if ($rand==5){
		    		     echo'<script>alert("Bạn nhận được '.$nr.' 4 sao  ");</script>';

			  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'{$nr}' WHERE `user_id`='".$user_id."' AND `id_shop` = '272'");
   
		}
								if ($rand==6){
		    		   		     echo'<script>alert("Bạn nhận được '.$nr.' 5 sao  ");</script>';

			  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'{$nr}' WHERE `user_id`='".$user_id."' AND `id_shop` = '273'");
   
		}
									if ($rand==7){

		    		       $cross=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='4360'"));
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$cross[loai]."',
`id_loai`='".$cross[id_loai]."',
`tenvatpham`='".$cross[tenvatpham]."',
`id_shop`='".$cross[id]."'
");
  $text='Bạn nhận được '.$cross[tenvatpham].' <img src="/images/shop/'.$cross['id'].'.png"> từ Capsule vàng  ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
		  echo'<script>alert("Bạn nhận được '.$cross[tenvatpham].'   ");</script>';
		     
		    		     
		}
			if ($rand==8){

		    		       $cross=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='4361'"));
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$cross[loai]."',
`id_loai`='".$cross[id_loai]."',
`tenvatpham`='".$cross[tenvatpham]."',
`id_shop`='".$cross[id]."'
");
  $text='Bạn nhận được '.$cross[tenvatpham].' <img src="/images/shop/'.$cross['id'].'.png"> từ Capsule vàng  ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
		  echo'<script>alert("Bạn nhận được '.$cross[tenvatpham].'   ");</script>';
		     
		    		     
		}
		if ($rand==9){

		    		       $cross=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='4362'"));
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$cross[loai]."',
`id_loai`='".$cross[id_loai]."',
`tenvatpham`='".$cross[tenvatpham]."',
`id_shop`='".$cross[id]."'
");
  $text='Bạn nhận được '.$cross[tenvatpham].' <img src="/images/shop/'.$cross['id'].'.png"> từ Capsule vàng  ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
		  echo'<script>alert("Bạn nhận được '.$cross[tenvatpham].'   ");</script>';
		     
		    		     
		}
				if ($rand==10){

		    		       $cross=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='4352'"));
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$cross[loai]."',
`id_loai`='".$cross[id_loai]."',
`tenvatpham`='".$cross[tenvatpham]."',
`id_shop`='".$cross[id]."'
");
  $text='Bạn nhận được '.$cross[tenvatpham].' <img src="/images/shop/'.$cross['id'].'.png"> từ Capsule vàng  ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
		  echo'<script>alert("Bạn nhận được '.$cross[tenvatpham].'   ");</script>';
		     
		    		     
		}
		if ($rand==11){

		    		       $cross=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='4353'"));
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$cross[loai]."',
`id_loai`='".$cross[id_loai]."',
`tenvatpham`='".$cross[tenvatpham]."',
`id_shop`='".$cross[id]."'
");
  $text='Bạn nhận được '.$cross[tenvatpham].' <img src="/images/shop/'.$cross['id'].'.png"> từ Capsule vàng  ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
		  echo'<script>alert("Bạn nhận được '.$cross[tenvatpham].'   ");</script>';
		     
		    		     
		}
		if ($rand==12){

		    		       $cross=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='4354'"));
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$cross[loai]."',
`id_loai`='".$cross[id_loai]."',
`tenvatpham`='".$cross[tenvatpham]."',
`id_shop`='".$cross[id]."'
");
  $text='Bạn nhận được '.$cross[tenvatpham].' <img src="/images/shop/'.$cross['id'].'.png"> từ Capsule vàng  ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
		  echo'<script>alert("Bạn nhận được '.$cross[tenvatpham].'   ");</script>';
		     
		    		     
		}
		
				if ($rand==13){

		    		       $cross=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='4201'"));
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$cross[loai]."',
`id_loai`='".$cross[id_loai]."',
`tenvatpham`='".$cross[tenvatpham]."',
`id_shop`='".$cross[id]."'
");
  $text='Bạn nhận được '.$cross[tenvatpham].' <img src="/images/shop/'.$cross['id'].'.png"> từ Capsule vàng  ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
		  echo'<script>alert("Bạn nhận được '.$cross[tenvatpham].'   ");</script>';
		     
		    		     
		}
				if ($rand==14){

		    		       $cross=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='4202'"));
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$cross[loai]."',
`id_loai`='".$cross[id_loai]."',
`tenvatpham`='".$cross[tenvatpham]."',
`id_shop`='".$cross[id]."'
");
  $text='Bạn nhận được '.$cross[tenvatpham].' <img src="/images/shop/'.$cross['id'].'.png"> từ Capsule vàng  ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
		  echo'<script>alert("Bạn nhận được '.$cross[tenvatpham].'   ");</script>';
		     
		    		     
		}
					if ($rand==15){

		    		       $cross=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='4357'"));
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$cross[loai]."',
`id_loai`='".$cross[id_loai]."',
`tenvatpham`='".$cross[tenvatpham]."',
`id_shop`='".$cross[id]."'
");
  $text='Bạn nhận được '.$cross[tenvatpham].' <img src="/images/shop/'.$cross['id'].'.png"> từ Capsule vàng  ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
		  echo'<script>alert("Bạn nhận được '.$cross[tenvatpham].'   ");</script>';
		     
		    		     
		}
		if ($rand==16){

		    		       $cross=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='4358'"));
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$cross[loai]."',
`id_loai`='".$cross[id_loai]."',
`tenvatpham`='".$cross[tenvatpham]."',
`id_shop`='".$cross[id]."'
");
  $text='Bạn nhận được '.$cross[tenvatpham].' <img src="/images/shop/'.$cross['id'].'.png"> từ Capsule vàng  ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
		  echo'<script>alert("Bạn nhận được '.$cross[tenvatpham].'   ");</script>';
		     
		    		     
		}
		if ($rand==17){

		    		       $cross=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='4359'"));
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$cross[loai]."',
`id_loai`='".$cross[id_loai]."',
`tenvatpham`='".$cross[tenvatpham]."',
`id_shop`='".$cross[id]."'
");
  $text='Bạn nhận được '.$cross[tenvatpham].' <img src="/images/shop/'.$cross['id'].'.png"> từ Capsule vàng  ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
		  echo'<script>alert("Bạn nhận được '.$cross[tenvatpham].'   ");</script>';
		     
		    		     
		}
		if ($rand==18){

		    		       $cross=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='4178'"));
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$cross[loai]."',
`id_loai`='".$cross[id_loai]."',
`tenvatpham`='".$cross[tenvatpham]."',
`id_shop`='".$cross[id]."'
");
  $text='Bạn nhận được '.$cross[tenvatpham].' <img src="/images/shop/'.$cross['id'].'.png"> từ Capsule vàng  ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
		  echo'<script>alert("Bạn nhận được '.$cross[tenvatpham].'   ");</script>';
		     
		    		     
		}
				if ($rand==19){

		    		       $cross=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='4179'"));
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$cross[loai]."',
`id_loai`='".$cross[id_loai]."',
`tenvatpham`='".$cross[tenvatpham]."',
`id_shop`='".$cross[id]."'
");
  $text='Bạn nhận được '.$cross[tenvatpham].' <img src="/images/shop/'.$cross['id'].'.png"> từ Capsule vàng  ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
		  echo'<script>alert("Bạn nhận được '.$cross[tenvatpham].'   ");</script>';
		     
		    		     
		}
				if ($rand==20){

		    		       $cross=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='4181'"));
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$cross[loai]."',
`id_loai`='".$cross[id_loai]."',
`tenvatpham`='".$cross[tenvatpham]."',
`id_shop`='".$cross[id]."'
");
  $text='Bạn nhận được '.$cross[tenvatpham].' <img src="/images/shop/'.$cross['id'].'.png"> từ Capsule vàng  ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
		  echo'<script>alert("Bạn nhận được '.$cross[tenvatpham].'   ");</script>';
		     
		    		     
		}
				if ($rand==21){

		    		       $cross=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='4194'"));
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$cross[loai]."',
`id_loai`='".$cross[id_loai]."',
`tenvatpham`='".$cross[tenvatpham]."',
`id_shop`='".$cross[id]."'
");
  $text='Bạn nhận được '.$cross[tenvatpham].' <img src="/images/shop/'.$cross['id'].'.png"> từ Capsule vàng  ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
		  echo'<script>alert("Bạn nhận được '.$cross[tenvatpham].'   ");</script>';
		     
		    		     
		}
		
						if ($rand==22){

		    		       $cross=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='4195'"));
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$cross[loai]."',
`id_loai`='".$cross[id_loai]."',
`tenvatpham`='".$cross[tenvatpham]."',
`id_shop`='".$cross[id]."'
");
  $text='Bạn nhận được '.$cross[tenvatpham].' <img src="/images/shop/'.$cross['id'].'.png"> từ Capsule vàng  ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
		  echo'<script>alert("Bạn nhận được '.$cross[tenvatpham].'   ");</script>';
		     
		    		     
		}
			if ($rand==23){

		    		       $cross=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='4196'"));
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$cross[loai]."',
`id_loai`='".$cross[id_loai]."',
`tenvatpham`='".$cross[tenvatpham]."',
`id_shop`='".$cross[id]."'
");
  $text='Bạn nhận được '.$cross[tenvatpham].' <img src="/images/shop/'.$cross['id'].'.png"> từ Capsule vàng  ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
		  echo'<script>alert("Bạn nhận được '.$cross[tenvatpham].'   ");</script>';
		     
		    		     
		}
					if ($rand==24){

		    		       $cross=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='4389'"));
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$cross[loai]."',
`id_loai`='".$cross[id_loai]."',
`tenvatpham`='".$cross[tenvatpham]."',
`id_shop`='".$cross[id]."'
");
  $text='Bạn nhận được '.$cross[tenvatpham].' <img src="/images/shop/'.$cross['id'].'.png"> từ Capsule vàng  ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
		  echo'<script>alert("Bạn nhận được '.$cross[tenvatpham].'   ");</script>';
		     
		    		     
		}
					if ($rand==25){

		    		       $cross=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='4390'"));
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$cross[loai]."',
`id_loai`='".$cross[id_loai]."',
`tenvatpham`='".$cross[tenvatpham]."',
`id_shop`='".$cross[id]."'
");
  $text='Bạn nhận được '.$cross[tenvatpham].' <img src="/images/shop/'.$cross['id'].'.png"> từ Capsule vàng  ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
		  echo'<script>alert("Bạn nhận được '.$cross[tenvatpham].'   ");</script>';
		     
		    		     
		}
					if ($rand==26){

		    		       $cross=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='4391'"));
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$cross[loai]."',
`id_loai`='".$cross[id_loai]."',
`tenvatpham`='".$cross[tenvatpham]."',
`id_shop`='".$cross[id]."'
");
  $text='Bạn nhận được '.$cross[tenvatpham].' <img src="/images/shop/'.$cross['id'].'.png"> từ Capsule vàng  ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
		  echo'<script>alert("Bạn nhận được '.$cross[tenvatpham].'   ");</script>';
		     
		    		     
		}
			if ($rand==27){

		    		       $cross=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='4387'"));
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$cross[loai]."',
`id_loai`='".$cross[id_loai]."',
`tenvatpham`='".$cross[tenvatpham]."',
`id_shop`='".$cross[id]."'
");
  $text='Bạn nhận được '.$cross[tenvatpham].' <img src="/images/shop/'.$cross['id'].'.png"> từ Capsule vàng  ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
		  echo'<script>alert("Bạn nhận được '.$cross[tenvatpham].'   ");</script>';
		     
		    		     
		}
			if ($rand==28){

		    		       $cross=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='4388'"));
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$cross[loai]."',
`id_loai`='".$cross[id_loai]."',
`tenvatpham`='".$cross[tenvatpham]."',
`id_shop`='".$cross[id]."'
");
  $text='Bạn nhận được '.$cross[tenvatpham].' <img src="/images/shop/'.$cross['id'].'.png"> từ Capsule vàng  ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
		  echo'<script>alert("Bạn nhận được '.$cross[tenvatpham].'   ");</script>';
		     
		    		     
		}
					if ($rand>=29){
					    		  echo'<script>alert("Chúc bạn may mắn lần sau ");</script>';
}

			  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '{$hopqua2['id']}'");



    }
}
	 


?>