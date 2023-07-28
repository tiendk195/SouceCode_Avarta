<?php
define('_IN_JOHNCMS',1);
$rootpath='../../';

require('../../incfiles/core.php');
$headmod='Khu kết hôn';
$textl='Khu kết hôn';
require('../../incfiles/head.php');
if(!$user_id){
header('Location: /dangnhap.html');
exit;
}
switch($act) {
default:
echo '<div class="box_forums"><br/><div class="homeforum"><div class="icon-home"><div class="home">Kết Hôn</div></div></div></div>';
echo'<div class="phdr">Chức Năng</div>';
echo'<table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed;word-wrap: break-word;"><tr><td width="45px;" class="blog-avatar"><img src="images/chuhon.gif"/></td><td style="vertical-align: bottom;"><table cellpadding="0" cellspacing="0"><tbody><tr><td class="current-blog" rowspan="2" style=""><div class="blog-bg-left"><img src="/giaodien/images/left-blog.png"></div><img src="/images/on.png" alt="online"/><font color="red"> <b> Chủ Hôn </b></font>';
if ($datauser['kichhoat'] ==0 ){ 
echo'<div class="omenu">Vui lòng kích hoạt để sử dụng chức năng</div>';
} else {
echo'
'.(empty($datauser['nguoiyeu']) ? '
<div class="omenu"><a href="?act=kethon"><img src="/images/vao.png"> Gửi lời cầu hôn</a></div>
<div class="omenu"><a href="ths.php"><img src="/images/vao.png"> Tin hôn sự</a></div>
' : '
<div class="omenu"><a href="?act=nangcap"><img src="/images/vao.png"> Nâng cấp</a></div>
<div class="omenu"><a href="?act=lydi"><img src="/images/vao.png"> Ly dị</a></div>
').'';
}
echo'</div></div></td></tr></tbody></table></td></tr></tbody></table>';
if ($datauser['nguoiyeu']!=0) {
echo'


<div class="phdr"> Kết Hôn - WEDDING </div>
<div class="da">';
if(time() < $datauser['timetim']+300){
echo'<a href="?act=thuhoach"><img src="images/caythutim.png" alt="icon" style="vertical-align: -5px">';
}Else{
echo'<a href="?act=thuhoach"><img src="images/caythutim.png" alt="icon" style="vertical-align: -5px">';
}
echo'    <br/>
    <a href="?act=shop"><img src="images/shopdoi.png" alt="icon" style="vertical-align: -5px">
    </a>
    <a href="?act=ruong"><img src="images/ruongdoi.png" alt="icon" style="vertical-align: -5px">
    </a>
    <br>
</div>
<div class="da">
</div>
';
}
break;
case'tochuc':
echo'<div class="phdr">Hôn lễ</div>';
$leduong = mysql_fetch_array(mysql_query("SELECT * FROM `leduong` WHERE `time`>'0' "));
$time = $leduong['time']+60*60;
 $tr=mysql_query("SELECT * FROM `leduong`");
$checktr=mysql_num_rows($tr);
if(isset($_POST['ok'])){
	if ($datauser['luong']<500){
		echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn không đủ lượng</div>';
	} else 

if ($checktr>0) {
	echo'<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Hiện tại đang có hôn lễ diễn ra, vui lòng tổ chức vào lúc  '.date("d/m/Y - H:i", $time).'</div>';


} else {
				echo'<div class="omenu">Tổ chức hôn lễ thành công!!</div>';
      mysql_query("UPDATE `users` SET `viewleduong`='0' ");

  mysql_query("INSERT INTO `leduong` SET `user_id`='".$user_id."', `nguoi_ay`='2',`time`='".time()."' ");

	}
}

echo'<div class="omenu"> Phí tổ chức đám cưới là 500 lượng! Bạn có muốn tổ chức không?<br><form method="post">
	<input type="submit" name="ok" value="Ok"> </form></div>';
	

}
require('../../incfiles/end.php');