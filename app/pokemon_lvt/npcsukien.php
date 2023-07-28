<?php
define('_IN_JOHNCMS', 1);
$textl = 'Sự Kiện Pokemon';
$headmod = 'id_user';
$rootpath='../../';
require_once ("../../incfiles/core.php");
require_once ("../../incfiles/head.php");

if (!$user_id) {
echo '<div class="omenu"><p><b>Lỗi!</b><br>Trang chỉ dành cho thành viên!</p></div>';
require_once ("../../incfiles/end.php");
exit;
}
if ($datauser['kichhoat']==0) {
echo '<div class="omenu"><p><b>Lỗi!</b><br>Trang chỉ dành cho thành viên đã kích hoạt!</p></div>';
require_once ("../../incfiles/end.php");
exit;
}
if ($datauser['postforum']<2) {
    echo'<div class="omenu">Bạn cần đạt 2 bài viết để vào đây</div>';
require_once ("../../incfiles/end.php");
exit;
}
?>
<!--Edit by Lethinh-->
<?php
echo'<div class="phdr"> Sự kiện Pokemon</div>';
switch($act) {
default:

echo'<table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed;word-wrap: break-word;">
<tr><td width="65px;" class="blog-avatar"><img src="https://i.imgur.com/IZe8bh9.gif"></td><td style="vertical-align: bottom;"><table cellpadding="0" cellspacing="0"><tbody>
<tr><td class="current-blog" rowspan="2" style=""><div class="blog-bg-left"><img src="/giaodien/images/left-blog.png"></div><img src="/images/on.png" alt="online"/><font color="red"> <b> Ash-Ketchum</b></font><div class="text">
<div class="omenu"><a href="?act=doiruongbian"><img src="/images/vao.png"> Đổi rương bí ẩn</a></div><div class="omenu"><a href="ruongbian.php"><img src="/images/vao.png"> Mở rương bí ẩn</a></div>
<div class="omenu"><a href="shopsukien.php"><img src="/images/vao.png"> Đổi quà</a></div><div class="omenu"><a href="shopnguyenlieu.php"><img src="/images/vao.png"> Mua Bóng Pokemon</a></div><div class="omenu"><a href="shopnguyenlieu.php?act=nangcap"><img src="/images/vao.png"> Nâng cấp Bóng Pokemon</a></div><div class="omenu"><a href="banphao.php"><img src="/images/vao.png"> Bắn pháo vui vẻ</a></div><div class="omenu"><a href="bxh.php"><img src="/images/vao.png"> Bảng xếp hạng</a></div><div class="omenu"><a href="?act=huongdan"><img src="/images/vao.png"> Hướng dẫn sự kiện</a></div><div class="omenu"><a href="index.php"><img src="/images/vao.png"> Quay về</a></div></div></div></td></tr></tbody></table></td></tr></tbody></table>';
break;
case 'doiruongbian':
$damm=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='256'"));
	$thiennhien=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='248'"));
	$nuoc=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='250'"));
	$lua=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='246'"));
	$thienthan=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='249'"));
	$loi=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='247'"));
	
if (isset($_POST['ok'])) {
		$sl=(int)$_POST['sl'];
		$loai = $_POST['loai'];
			if (empty($sl)) {
		echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn chưa nhập số lượng</div>';
	} else if ($sl<0) {
				echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn chưa nhập số lượng</div>';
	} else {
		if ($loai==1){
				$can=50*$sl;
			if ($damm['soluong']<$sl || $loi['soluong']<$can){
					echo'<div class="omenu"><b><font color="red">Lỗi!</font></b> Bạn cần <font color="red">'.$can.' Huy hiệu lôi <img src="/images/vatpham/247.png"> + '.$sl.' Đá may mắn <img src="/images/vatpham/256.png"></font> mới có thể làm <font color="green">'.$sl.' Rương bí ẩn <img src="/images/vatpham/255.png"></font> </div>';
	} else {
					echo'<div class="omenu">Làm thành công '.$sl.' Rương bí ẩn <img src="/images/vatpham/255.png"></div>';
									mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$sl."' WHERE `user_id`='".$user_id."' AND `id_shop`='256'");
																		mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$can."' WHERE `user_id`='".$user_id."' AND `id_shop`='247'");

								 mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$sl."' WHERE `user_id`='".$user_id."' AND `id_shop`='255'");
}
		} else if ($loai==2){
				$can1=35*$sl;
				$can2=70*$sl;

			if ($damm['soluong']<$sl || $thienthan['soluong']<$can1 || $thiennhien['soluong']<$can2 ){
					echo'<div class="omenu"><b><font color="red">Lỗi!</font></b> Bạn cần <font color="red">'.$can1.' Huy hiệu thiên thần <img src="/images/vatpham/249.png"> + '.$can2.' Huy hiệu thiên nhiên <img src="/images/vatpham/248.png"> + '.$sl.' Đá may mắn <img src="/images/vatpham/256.png"></font> mới có thể làm <font color="green">'.$sl.' Rương bí ẩn <img src="/images/vatpham/255.png"></font> </div>';
	} else {
					echo'<div class="omenu">Làm thành công '.$sl.' Rương bí ẩn <img src="/images/vatpham/255.png"></div>';
									mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$sl."' WHERE `user_id`='".$user_id."' AND `id_shop`='256'");
									mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$can1."' WHERE `user_id`='".$user_id."' AND `id_shop`='249'");
									mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$can2."' WHERE `user_id`='".$user_id."' AND `id_shop`='248'");

								 mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$sl."' WHERE `user_id`='".$user_id."' AND `id_shop`='255'");
}
		} else if ($loai==3){
			$can1=45*$sl;
				$can2=45*$sl;

			if ($damm['soluong']<$sl || $nuoc['soluong']<$can1 || $lua['soluong']<$can2 ){
					echo'<div class="omenu"><b><font color="red">Lỗi!</font></b> Bạn cần <font color="red">'.$can1.' Huy hiệu nước <img src="/images/vatpham/250.png"> + '.$can2.' Huy hiệu lửa <img src="/images/vatpham/246.png"> + '.$sl.' Đá may mắn <img src="/images/vatpham/256.png"></font> mới có thể làm <font color="green">'.$sl.' Rương bí ẩn <img src="/images/vatpham/255.png"></font> </div>';
	} else {
					echo'<div class="omenu">Làm thành công '.$sl.' Rương bí ẩn <img src="/images/vatpham/255.png"></div>';
									mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$sl."' WHERE `user_id`='".$user_id."' AND `id_shop`='256'");
									mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$can1."' WHERE `user_id`='".$user_id."' AND `id_shop`='250'");
									mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$can2."' WHERE `user_id`='".$user_id."' AND `id_shop`='246'");

								 mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$sl."' WHERE `user_id`='".$user_id."' AND `id_shop`='255'");
}
		}
	}
}
			
	

echo'<form method="post"><div class="omenu"><center><div class=ducnghia_item><img src="/images/vatpham/255.png" style="position: absolute;verticalalign: 0 px;margin:15px 0 0 -12px;"></div>
</center><br><input type="radio" name="loai" value="1"> <img src="/images/vatpham/255.png"> = 1 Đá may mắn <img src="/images/vatpham/256.png"> và 50 Huy hiệu lôi <img src="/images/vatpham/247.png">
<br><input type="radio" name="loai" value="2"> <img src="/images/vatpham/255.png"> = 1 Đá may mắn <img src="/images/vatpham/256.png"> và 35 Huy hiêu thiên thần <img src="/images/vatpham/249.png"> + 70 Huy hiệu thiên nhiên <img src="/images/vatpham/248.png">
<br><input type="radio" name="loai" value="3">  <img src="/images/vatpham/255.png"> = 1 Đá may mắn <img src="/images/vatpham/256.png"> và 45 Huy hiệu nước <img src="/images/vatpham/250.png"> + 45 Huy hiệu lửa <img src="/images/vatpham/246.png"> 
<br><br>
<center><i>Vui lòng nhập số lượng</i><br>
<input type="number" name="sl" value="1"><br>
<input class="submit" type="submit" name="ok" value="Đổi"> </form></center></div>';

break;
case 'huongdan':




?>


<script type='text/javascript' charset='UTF-8' src='/js/wapvip.js'></script><link rel="stylesheet" href="/js/bootstrap.min.css">
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap2.min.js"></script>
<script>
    $(document).ready(function() {
    	$("#myModal").modal("show");
    });
</script>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
<?php
    echo'<div align="center"><img src="https://i.imgur.com/MOyeRt9.png" alt="Thitran9x.tk" width="180"/></div>
<div align="center"><font style="color:red;">Sự kiện Pokemon - Trở về tuổi thơ</font></div><br />
Chào mừng các bạn đến với Sự kiện Hè 2020 của Thitran9x.tk!<br><br>
<font style="color:red;"><b>Thời gian:</b></font><br>
- Bắt đầu từ 22/07/2020 đến 21h00 22/08/2020<br><br>
<font style="color:red;"><b>Nội dung:</b></font><br>
<br><font style="color:green;">1. Thu nhập quả cầu</font><br>
- Trong thời gian diễn ra Sự kiện, các loại Bóng sẽ là nguyên liệu chính ở sự kiện này:<br>
<br>
<table
border="1" align=center style="width:100%;"><tr><th
bgcolor="#FFCC33"><center>Loại</center></th><th
bgcolor="#FFCC33"><center>Tỉ lệ bắt trúng</center></th></tr>
<tr><td><center>Bóng thường <img src="/images/vatpham/242.png"></center></td><td><center>10%</center></td>
<tr><td><center>Bóng hi vọng <img src="/images/vatpham/243.png"></center></td><td><center>20%</center></td>
<tr><td><center>Bóng khởi đầu <img src="/images/vatpham/244.png"></center></td><td><center>30%</center></td>
<tr><td><center>Bóng thần kì <img src="/images/vatpham/245.png"></center></td><td><center>100%</center></td>
</tr></table><br>- Khi mặc set Ash-Ketchum bạn sẽ được tăng thêm 20% tỉ lệ bắt thành công</br>
- Khi thu phục thành công Pokemon, bạn sẽ có tỉ lệ 10% nhận được Đá may mắn. Khi mặc full set Ash-Ketchum sẽ là tỉ lệ 30%</br>
- Để sở hữu những Bóng thường bạn có thể tham gia các hoạt động sau:<br><br>
<table
border=3 align=center; style="width:100%; padding-right: 10px; padding-left: 10px;"><tr><th
bgcolor="#99FFFF"><center>HOẠT ĐỘNG</center></th><th
bgcolor="#99FFFF"><center>SỐ LƯỢNG</center></th></tr>
<tr><td style="padding-right: 5px; padding-left: 5px">Thu hoạch cây trồng</td><td><center>1 Bóng thường <img src="/images/vatpham/242.png"></center></td></tr>
<tr><td style="padding-right: 5px; padding-left: 5px">Câu cá tại Khu cá mập</td><td><center>1 Bóng thường <img src="/images/vatpham/242.png"></center></td></tr>
<tr><td style="padding-right: 5px; padding-left: 5px">Nhận quà tích lũy online</td><td><center>1 Bóng thường <img src="/images/vatpham/242.png"></center></td></tr>
<tr><td style="padding-right: 5px; padding-left: 5px">Hoàn thành món ăn bất kì tại Nhà bếp</td><td><center>1 Bóng thường <img src="/images/vatpham/242.png"></center></td></tr>
</table>
<br/>

- Ngoài ra, NPC cũng sẽ bán Bóng cho các bạn không có thời gian cày cuốc<br><br>
<table
border=3 align=center; style="width:100%; padding-right: 10px; padding-left: 10px;"><tr><th
bgcolor="#99FFFF"><center>LOẠI BÓNG</center></th><th
bgcolor="#99FFFF"><center>GIÁ BÁN</center></th></tr>
<tr><td style="padding-right: 5px; padding-left: 5px">Bóng thường <img src="/images/vatpham/242.png"></td><td><center>20,000 xu</center></td></tr>
<tr><td style="padding-right: 5px; padding-left: 5px">Bóng thường <img src="/images/vatpham/242.png"></td><td><center>2 lượng </center></td></tr>
<tr><td style="padding-right: 5px; padding-left: 5px">Bóng thần kì <img src="/images/vatpham/245.png"></td><td><center>10 lượng khóa</center></td></tr>
</table>
<br/>

- Để sở hữu các loại bóng cao hơn, bạn cần nâng cấp Bóng tại NPC Ash-Ketchum<br><br>
<table
border=3 style="width:100%; padding-right: 3px; padding-left: 3px;" cellspacing="0" cellpadding="10px"><tr><th
colspan="4" style="text-align: center; color: #EE0000;" width="10%">LƯU Ý: Khi mặc full set Kochiro hoặc Musashi bạn sẽ được x2 tỉ lệ thành công</th></tr><tr><td
style="text-align: center; color: #EE0000;" bgcolor="#FFFF99" width="20%">Bóng nâng cấp</td><td
style="text-align: center; color: #EE0000;" bgcolor="#FFFF99" width="20%">Bóng cần</td><td
style="text-align: center; color: #EE0000;" bgcolor="#FFFF99" width="10%">Tỉ lệ</td>
<td style="text-align: center; color: #EE0000;" bgcolor="#FFFF99" width="30%">Giá nâng cấp</td></tr>
<tr><td style="text-align: center;">Bóng hi vọng <img src="/images/vatpham/243.png"></td><td
style="text-align: center;">3 Bóng thường <img src="/images/vatpham/242.png"></b></td><td
style="padding-right: 5px; padding-left: 5px"><center>20%</center></b></td>
<td style="padding-right: 5px; padding-left: 5px"><center>5.000 Xu</center></b></td></tr>
<tr><td style="text-align: center;">Bóng khởi đầu <img src="/images/vatpham/244.png"></td><td
style="text-align: center;">5 Bóng thường <img src="/images/vatpham/242.png"></b></td><td
style="padding-right: 5px; padding-left: 5px"><center>15%</center></b></td>
<td style="padding-right: 5px; padding-left: 5px"><center>15.000 Xu</center></b></td></tr>
<tr><td style="text-align: center;">Bóng thần kì <img src="/images/vatpham/245.png"></td><td
style="text-align: center;">10 Bóng thường <img src="/images/vatpham/242.png"></b></td><td
style="padding-right: 5px; padding-left: 5px"><center>5%</center></b></td>
<td style="padding-right: 5px; padding-left: 5px"><center>5 Lượng</center></b></td></tr>
</table><br/>

<br><font style="color:green;">2. Thu phục Pokemon</font><br>
- Trong thời gian diễn ra Sự kiện các Pokemon sẽ xuất hiện ở khu vực bên trái NPC Ash-Ketchum, các loại Pokemon sẽ tùy theo hệ và tỉ lệ khác nhau:<br><br>
<table
border=3 style="width:100%; padding-right: 3px; padding-left: 3px;" cellspacing="0" cellpadding="10px"><tr><th
colspan="4" style="text-align: center; color: #EE0000;" width="10%">Danh sách chi tiết các loại Pokemon</th></tr><tr><td
style="text-align: center; color: #EE0000;" bgcolor="#FFFF99" width="20%">Tên Pokemon</td><td
style="text-align: center; color: #EE0000;" bgcolor="#FFFF99" width="10%">Hệ</td><td
style="text-align: center; color: #EE0000;" bgcolor="#FFFF99" width="10%">Điểm</td>
<td style="text-align: center; color: #EE0000;" bgcolor="#FFFF99" width="30%">Bóng có thể bắt</td></tr>
<tr><td style="text-align: center;">Cáo thiên nhiên</td><td
style="text-align: center;">Thiên nhiên<br> <img src="/images/vatpham/248.png"></b></td><td
style="padding-right: 5px; padding-left: 5px"><center>1</center></b></td>
<td style="padding-right: 5px; padding-left: 5px"><center><img src="/images/vatpham/242.png"> <img src="/images/vatpham/243.png"> <img src="/images/vatpham/244.png"> <img src="/images/vatpham/245.png"></center></b></td></tr>
<tr><td style="text-align: center;">Sóc điện</td><td
style="text-align: center;">Thiên nhiên <br><img src="/images/vatpham/248.png"></b></td><td
style="padding-right: 5px; padding-left: 5px"><center>1</center></b></td>
<td style="padding-right: 5px; padding-left: 5px"><center><img src="/images/vatpham/242.png"> <img src="/images/vatpham/243.png"> <img src="/images/vatpham/244.png"> <img src="/images/vatpham/245.png"></center></b></td></tr>
<tr><td style="text-align: center;">Rùa nước</td><td
style="text-align: center;">Nước <br><img src="/images/vatpham/250.png"></b></td><td
style="padding-right: 5px; padding-left: 5px"><center>2</center></b></td>
<td style="padding-right: 5px; padding-left: 5px"><center> <img src="/images/vatpham/243.png"> <img src="/images/vatpham/244.png"> <img src="/images/vatpham/245.png"></center></b></td></tr>
<tr><td style="text-align: center;">Thiên điểu</td><td
style="text-align: center;">Nước <br><img src="/images/vatpham/250.png"></b></td><td
style="padding-right: 5px; padding-left: 5px"><center>2</center></b></td>
<td style="padding-right: 5px; padding-left: 5px"><center> <img src="/images/vatpham/243.png"> <img src="/images/vatpham/244.png"> <img src="/images/vatpham/245.png"></center></b></td></tr>
<tr><td style="text-align: center;">Khủng long lửa</td><td
style="text-align: center;">Lửa <br><img src="/images/vatpham/246.png"></b></td><td
style="padding-right: 5px; padding-left: 5px"><center>2</center></b></td>
<td style="padding-right: 5px; padding-left: 5px"><center> <img src="/images/vatpham/243.png"> <img src="/images/vatpham/244.png"> <img src="/images/vatpham/245.png"></center></b></td></tr>
<tr><td style="text-align: center;">Meoth</td><td
style="text-align: center;">Lửa <br><img src="/images/vatpham/246.png"></b></td><td
style="padding-right: 5px; padding-left: 5px"><center>2</center></b></td>
<td style="padding-right: 5px; padding-left: 5px"><center> <img src="/images/vatpham/243.png"> <img src="/images/vatpham/244.png"> <img src="/images/vatpham/245.png"></center></b></td></tr>
<tr><td style="text-align: center;">Heo ru ngủ</td><td
style="text-align: center;">Thiên thần <br><img src="/images/vatpham/249.png"></b></td><td
style="padding-right: 5px; padding-left: 5px"><center>3</center></b></td>
<td style="padding-right: 5px; padding-left: 5px"><center><img src="/images/vatpham/244.png"> <img src="/images/vatpham/245.png"></center></b></td></tr>
<tr><td style="text-align: center;">Pika điện</td><td
style="text-align: center;">Lôi <br><img src="/images/vatpham/247.png"></b></td><td
style="padding-right: 5px; padding-left: 5px"><center>4</center></b></td>
<td style="padding-right: 5px; padding-left: 5px"><center><img src="/images/vatpham/244.png"> <img src="/images/vatpham/245.png"></center></b></td></tr>
</table><br/><br>
- Khi đã thu phục được Pokemon, bạn sẽ nhận được Huy hiệu, đem huy hiệu đến NPC Ash-Ketchum để đổi phần thưởng có giá trị nhé
<br>


<br><font style="color:green;">3. Hoạt động khác</font><br>
- Tại NPC Ash-Ketchum sẽ giúp bạn đổi Rương bí ẩn, sử dụng Rương bí ẩn bạn sẽ ngẫu nhiên nhận được:</br>
+ Mảnh ghép Cánh nguyệt tiên</br>
+ Hộp quà mảnh ghép</br>
+ Huy hiệu Hoàng Gia</br>
+ 1.000.000 đến 5.000.000 Xu</br>
+ 1 đến 100 Lượng khóa</br>
+ 100 đến 1.000 Lượng </br>
+ 5 đến 10 Bóng thần kỳ</br>
+ 1 Huy hiệu 1STPay</br>

- Các bạn có thể tham gia Ném pháo vui vẻ với 5 lượng tại NPC Ash-Ketchum<br>
- Mỗi 1 giờ bạn hãy chat <i>Pokemon</i> để nhận miễn phí 10 Bóng thường + 5 Bóng khởi đầu nhé<br><br>
<font style="color:red;"><b>Đua TOP:</b></font><br>
- TOP 3 bạn ném pháo vui vẻ nhiều nhất sẽ nhận Cánh tình yêu sắc sảo vĩnh viễn<br>
- TOP 3 bạn có điểm bắt Pokemon cao nhất sẽ nhận Hào quang Đỏ, Xanh, Tím tùy chọn vĩnh viễn<br><br>
<div align="right"><strong>Cảm ơn bạn đã đồng hành cùng Thitran9x.tk!!<br>Chúc bạn có một mùa hè vui vẻ ^^</strong></div>';
?>
     </div>
    </div>
</div></div>
<?php
break;
}
require('../../incfiles/end.php');
?>
