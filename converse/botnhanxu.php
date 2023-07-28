<?php

/*
////////////////////////////////////////////////////////////////////////////////
//                                                                            //
//          Code được viết bởi Tiềndz.                                        //
//             Và Hỗ Trợ By Tienkie.                                          //
//                 không xóa  nếu bạn là người có học !                       //                                                    
//                                                                            //
////////////////////////////////////////////////////////////////////////////////
*/

$idbot = 256; // ID của con bot


if(preg_match('|nhanqua|',$msg) || preg_match('|Nhận quà|',$msg) || preg_match('|Nhanqua|',$msg) || preg_match('|nhận quà|',$msg)) {   
if (time() > $datauser['timeline'] + 3600*6 ){
    
    ///ngoc rong
   
    $randnr=rand(1,1);
    
    if ($randnr==1){
       echo'<script>alert("Bạn nhận được ngọc rồng 6 sao");</script>';
     mysql_query("UPDATE `vatpham` SET `soluong`=`soluong` +'1' WHERE `user_id`='{$user_id}' AND `id_shop`='274'");
}
//ngoc rong
      mysql_query("UPDATE `vatpham` SET `soluong`=`soluong` +'1' WHERE `user_id`='{$user_id}' AND `id_shop`='284'");
   
$bot = "Chúc mừng @$user_id đã nhận được 500.000 xu, 50 lượng , 5 [img]https://i.imgur.com/BIl190L.png[/img] Phong bao, 1 phiếu may mắn hãy đợi 6h để nhận tiếp nhé";
mysql_query("UPDATE `users` SET `timeline` = " .time(). ", `xu`=`xu`+ '500000',`phongbaodo`=`phongbaodo`+'5', `luong`= `luong`+ '50',`vequaybv`=`vequaybv`+'2' WHERE `id` = '{$user_id}'");
} else {	
$bot = "@$user_id bạn đã nhận quà hằng ngày rồi,6h sau khi nhận mới nhận được tiếp";
}


$bot=html_entity_decode($bot,ENT_QUOTES,'UTF-8');
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

?>