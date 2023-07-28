<?php
error_reporting(0);
define('_IN_JOHNCMS', 1);
$headmod = 'mod';
$bhead = 2;
require('../incfiles/core.php');
if(!$user_id){
require('../incfiles/head.php');
echo functions::display_error($lng['access_guest_forbidden']);
require('../incfiles/end.php');
exit;
}
$textl = 'Boss';
require('../incfiles/head.php');
?>
<style>
.k1{
border:1px solid#FF0000;border-radius:10px;padding:2px;margin:2px;box-shadow: 1px 1px 7px #FF0000
}
.k10{border:1px solid#ADDFFF;border-radius:10px;padding:2px;margin:2px;box-shadow: 1px 1px 7px #ADDFFF
}
</style>
<?php
echo'<div class="phdr">NPC Boss Thế giới</div>';
switch($act) {
default:





echo'<div class="menu"><center><span class="k1">Boss Thế giới cực kì nguy hiểm, nếu ngươi muốn thử sức thì cứ vào!</span></center><br>
<a id="vao"><center><img src="https://i.imgur.com/GDBM2tn.gif" title="NPC Boss Thế giới"></center></a><div id="ra" style="display: none;">
<div class="omenu"><a href="?act=vao"><b><font color="red"><img src="/images/vao.png"> Vào Khiêu chiến Boss</font></b></a></div>
<div class="omenu"><a href="shop.php"><b><font color="red"><img src="/images/vao.png"> Cửa hàng</font></b></a></div>
<div class="omenu"><a href="doiqua.php"><b><font color="red"><img src="/images/vao.png"> Đổi quà</font></b></a></div>
<div class="omenu"><a href="shopchetac.php"><b><font color="red"><img src="/images/vao.png"> Shop chế tác</font></b></a></div>

<div class="omenu"><a href="huongdan.php"><b><font color="red"><img src="/images/vao.png"> Xem Hướng Dẫn</font></b></a></div>


</div></div>';
break;
case 'vao':
 $checkbosstg=mysql_query("SELECT * FROM `tgdanhbosstg` WHERE `user_id`='".$user_id."' AND `colenh`='1'");
$checkboss=mysql_num_rows($checkbosstg);
if ($checkboss<1) {
echo'<div class="omenu"><center><span class="k10">Cổ lệnh của Ngươi đã hết hiệu lực, hãy đến Shop của ta để mua <a href="shop.php">Nhấp vào để Đến Shop</a></span><br><img src="https://i.imgur.com/GDBM2tn.gif">
</div>';
} else {
echo'<div class="omenu"><center><span class="k10">Xác nhận vào Khiêu chiến Boss Thế giới? Mỗi lần thuê chỉ được <font color="red">30 phút</font>.  Hãy cẩn trọng!</span></br>
<img src="https://i.imgur.com/GDBM2tn.gif">
<br>
	<a href="index.php"><input class="nut" type="submit" name="ok" value="Vào"></a></center></div>';

}
}

?>
<script>
$('#vao').click(function() {  
$('#ra').toggle('fast','linear');  
}); 
</script>

<?php

require('../incfiles/end.php');
?>