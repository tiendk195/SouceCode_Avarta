<?PHP
Define('_IN_JOHNCMS', 1);
Require('../incfiles/core.php');
$headmod = 'Lật hình';
$textl = 'Lật hình';
Require('../incfiles/head.php');
IF(!$user_id){
Header("Location: /");
Exit;
}
?>
<script type="text/javascript">
$(document).ready(function(){
	$('#submit').click(function(){
		var url = "lathinh-load.php";
		var data = {"submit": ""};
		$('#load').load(url, data);
		return false;
	});
});
</script>
<?php
Echo'<div class="phdr">Lật hình may mắn</div>';
$vtt = mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id` = '".$user_id."' AND `id_shop`='257' LIMIT 1"));
if ($vtt['soluong']<1){
    echo'<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn không có vé truyền tống <img src="/images/vatpham/257.png">. Hãy đến <a href="/nongtrai/laibuon.php">Lái Buôn</a> ở Nông Trại để mua nhé</div>';
Require('../incfiles/end.php');
exit;
}
switch($act){
default:
Echo'<div class="omenu"><center><b><font color="red">HÃY CHỌN CHO MÌNH MỘT LÁ BÀI MAY MẮN</font></b></center></div>';
echo'<div style="text-align:center"><table width="100%" border="0" cellspacing="0"><tr class="omenu">
<td width="32%"><a href="?act=lat&id=1"><img src="img/labai.png" height="32" width="32"></td>
<td width="32%"><a href="?act=lat&id=2"><img src="img/labai.png" height="32" width="32"></td>
<td width="32%"><a href="?act=lat&id=3"><img src="img/labai.png" height="32" width="32"></td>
</tr></table></div>';
echo'<div style="text-align:center"><table width="100%" border="0" cellspacing="0"><tr class="omenu">
<td width="32%"><a href="?act=lat&id=4"><img src="img/labai.png" height="32" width="32"></td>
<td width="32%"><a href="?act=lat&id=5"><img src="img/labai.png" height="32" width="32"></td>
<td width="32%"><a href="?act=lat&id=6"><img src="img/labai.png" height="32" width="32"></td>
</tr></table></div>';
echo'<div style="text-align:center"><table width="100%" border="0" cellspacing="0"><tr class="omenu">
<td width="32%"><a href="?act=lat&id=7"><img src="img/labai.png" height="32" width="32"></td>
<td width="32%"><a href="?act=lat&id=8"><img src="img/labai.png" height="32" width="32"></td>
<td width="32%"><a href="?act=lat&id=9"><img src="img/labai.png" height="32" width="32"></td>
</tr></table></div>';
break;
case'lat':
if(isset($_POST['lat'])) {
$tmm=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `id_shop` = '49' AND `user_id` = '".$user_id."'"));

IF($tmm['soluong']<=0){
Echo'<div class="omenu"><center><b><font color="red">BẠN KHÔNG CÓ THẺ MAY MẮN</font></b></center></div>';
Require('../incfiles/end.php');
Exit;
}Else

{
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop`='49'");
$rand=rand(1,5);
IF($rand>1){
mysql_query("update `users` set `xu`=`xu`+'100000' where `id`='".$user_id."'");
Echo'<div class="omenu"><center><b><font color="red">BẠN NHẬN ĐƯỢC 100000 XU</font></b></center></div>';
}Else{
$all=mysql_fetch_array(mysql_query("SELECT max(id) FROM `shopdo`"));  
$rando=rand(1,$all['max(id)']);
$checkrand=mysql_num_rows(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$rando."'"));
$checksv=mysql_num_rows(mysql_query("SELECT * FROM `shopvip` WHERE `vatpham`='".$rando."'"));
IF($checkrand<1 || $checksv > 0){
mysql_query("update `users` set `luongkhoa`=`luongkhoa`+'100' where `id`='".$user_id."'");
Echo'<div class="omenu"><center><b><font color="red">BẠN NHẬN ĐƯỢC 100 LƯỢNG KHÓA</font></b></center></div>';
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
Echo'<div class="omenu"><center><b><font color="red"><img src="/images/shop/'.$rando.'.png"><br>Bạn nhận được vật phẩm  '.$cross[tenvatpham].'</font></b></center></div>';
}
}
}
}
echo'<center><div class="omenu"><img src="img/labai.png" height="32" width="32"> </br>Bạn có muốn lật thẻ bài này không?';
   echo'<form  method="post"><input type="submit" id="submit"  name="submit"  value="Lật" /></br></form><div id="load"></div></div></center>';
break;
}
Require('../incfiles/end.php');
?>