<?php

define('_IN_JOHNCMS', 1);

require_once ("../incfiles/core.php");
if(isset($_POST['submit'])) {
		echo'<div id="load">';
$tmm=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `id_shop` = '49' AND `user_id` = '".$user_id."'"));

IF($tmm['soluong']<=0){
Echo'<div class="lt"><center><b><font color="red">BẠN KHÔNG CÓ THẺ MAY MẮN</font></b></center></div>';

}Else

{
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop`='49'");
$rand=rand(1,30);
IF($rand==1){
mysql_query("update `users` set `xu`=`xu`+'50000' where `id`='".$user_id."'");
Echo'<div class="lt"><center><b><font color="red">BẠN NHẬN ĐƯỢC 50000 XU</font></b></center></div>';
}
else IF($rand==2){
mysql_query("update `users` set `exp`=`exp`+'5000' where `id`='".$user_id."'");
Echo'<div class="lt"><center><b><font color="red">BẠN NHẬN ĐƯỢC 5000 EXP</font></b></center></div>';
}else IF($rand==3){
mysql_query("update `users` set `luong`=`luong`+'20' where `id`='".$user_id."'");
Echo'<div class="lt"><center><b><font color="red">BẠN NHẬN ĐƯỢC 20 LƯỢNG</font></b></center></div>';
}Else  IF($rand==4){
$all=mysql_fetch_array(mysql_query("SELECT max(id) FROM `shopdo`"));  
$rando=rand(1,$all['max(id)']);
$checkrand=mysql_num_rows(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$rando."'"));
$checksv=mysql_num_rows(mysql_query("SELECT * FROM `shopvip` WHERE `vatpham`='".$rando."'"));
IF($checkrand<1 || $checksv > 0){
mysql_query("update `users` set `luongkhoa`=`luongkhoa`+'10' where `id`='".$user_id."'");
Echo'<div class="lt"><center><b><font color="red">BẠN NHẬN ĐƯỢC 10 LƯỢNG KHÓA</font></b></center></div>';
}Else{
$cross=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$rando."'"));
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$cross[loai]."',
`id_loai`='".$cross[id_loai]."',
`tenvatpham`='".$cross[tenvatpham]."',
`id_shop`='".$cross[id]."'
");
  $text='Bạn nhận được '.$cross[tenvatpham].' <img src="/images/shop/'.$rando.'.png"> từ Thẻ bài may mắn  ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
Echo'<div class="lt"><center><b><font color="red"><img src="/images/shop/'.$rando.'.png"><br>Bạn nhận được vật phẩm  '.$cross[tenvatpham].'</font></b></center></div>';
} 
}
Else  IF($rand>4){
    mysql_query("update `users` set `xu`=`xu`+'50000' where `id`='".$user_id."'");
Echo'<div class="lt"><center><b><font color="red">BẠN NHẬN ĐƯỢC 50000 XU</font></b></center></div>';
}
    
}
echo'</div>';

}
?>
