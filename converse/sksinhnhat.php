<?php






if(preg_match('|sukiensinhnhat|',$msg) || preg_match('|Sự kiện sinh nhật|',$msg) || preg_match('|Sinhnhat|',$msg) || preg_match('|sinhnhat|',$msg) || preg_match('|sinh nhat|',$msg)|| preg_match('|Sinh nhat|',$msg) || preg_match('|Sinh nhật|',$msg) || preg_match('|sinhnhật|',$msg) || preg_match('|Sinhnhật|',$msg)) {   
  
if (time() > $datauser['timesksinhnhat'] + 21600 ){
	$randsn=rand(1,7);
	if ($datauser['gioihannhanqua6h']<30){
		if ($randsn==1){
				$bot = "Chúc mừng @$user_id đã nhận được 1 số 1 yêu thương hãy đợi 6h để nhận tiếp nhé";

		   
mysql_query("UPDATE `users` SET `gioihannhanqua6h` =`gioihannhanqua6h` + '1'  WHERE `id` = '{$user_id}'");
  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '158'");

	
} else {	
$bot = "@$user_id đen quá, bạn không nhận được gì từ quà lần này!";
}


mysql_query("UPDATE `users` SET `timesksinhnhat` = " .time(). "  WHERE `id` = '{$user_id}'");

}

	
	} else {
		$bot = "@$user_id bạn đã nhận quà rồi, vui lòng đợi 6h để nhận tiếp nhé!";
	}
$time = time()+10;
mysql_query("INSERT INTO `guest` SET
`adm` = '0',
`time` = '$time',
`user_id` = '$idbot',
`name` = 'BOT',
`text` = '" . mysql_real_escape_string($bot) . "',
`ip` = '0000',
`browser` = 'IPHONE'
");



	

}