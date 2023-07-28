<?php
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
$textl = 'Giới thiệu';
require('../incfiles/head.php');
function rand_string($length) {
$chars ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$size = strlen($char);
for($i = 0; $i<$length; $i++) {
$str .= $chars[rand(0, $size -1)];
$str=substr(str_shuffle($chars), 0, $length);
}
return $str;
}
$random = rand_string(8);


echo'<div class="phdr">Giới thiệu</div>';

echo'<form method="post"><input type="submit" name="submit" value="Nhấp để lấy Mã Giới Thiệu !!"></form>';
if (isset($_POST[submit])) {
	if ($datauser['magioithieu']==''){

	mysql_query("UPDATE `users` SET `magioithieu`= '".$random."'  WHERE `id`='".$user_id."'");
	echo'<div class="omenu"><font color="red"> Coppy mã giới thiệu của bạn.</font><br>
<input type="text" value="'.$random.'"></div>';
	} else {
	echo'<div class="omenu"><font color="red"> Coppy mã giới thiệu của bạn.</font><br>
<input type="text" value="'.$datauser['magioithieu'].'"></div>';
echo'<div class="omenu"><b>Mẫu quảng cáo:</b><br><textarea rows="6">Link '.$home.': '.$home.'/dangki.html
Nhớ nhập mã giới thiệu: '.$datauser['magioithieu'].' để nhận được nhiều ưu đãi. 
Chào các bạn.
Hôm nay mình sẽ chia sẻ cho các bạn 1 MXH cực hay và hấp dẫn đó là  '.$home.'/dangki.html
MXH với nhiều chức năng mới và đặc biệt mà các MXH khác không có.
1. Phương thức đăng ký mới lạ bạn có thể đăng ký bằng nick KH hoặc bằng SMS rất tiện ích .
2. Hệ thống đồ họa, item giống game Avatar ngoài ra còn có thêm nhiều item mới do BQT sưu tầm và thiết kế. Đáp ứng nhu cầu làm đẹp của mọi người. Shop tuyệt đẹp cũng như chức năng quay số và nâng cấp item dùng đá như Avatar rất cuốn hút có tỉ lệ rõ ràng. Có thể nói chưa có MXH nào làm được như vậy. Ngoài ra các item trong shop cũng như nâng cấp và quay số đều được các admin thêm mới mỗi ngày.
3. Hệ thống nông trại phong phú với nhiều cây trồng và vật nuôi khác nhau để bạn lựa chọn nuôi trồng để kiếm thêm thu nhập. Bạn có thể dùng nông sản để chế biến trong nhà bếp để bán được nhiều tiền hơn. Để thêm nhiều nông sản bạn có thể mua thêm ô đất để trồng cây tối đa là 60ô và khi đạt số ô đất tối đa bạn có thể nâng cấp đất lên lv2. Ngoài ra để tăng tính hấp dẫn hàng tuần BQT còn tổ chức đua top phú nông và thánh trộm cho mọi người những bạn đứng top sẽ có phần thưởng rất lớn
4. Hệ thống Game Mini đa dạng hấp dẫn như: Phá khóa , Đập trứng ra item , Đoán số được lượng , Xổ số và Oản tù tì bằng xu giữa các người chơi với nhau.
5. Hệ thống mới chưa từng có đó là chợ trời giúp bạn có thể trao đổi buôn bán item giữa các người chơi.
6. Ngoài chơi game ngay trên diễn dàn bạn còn có thể lập ra các topic để chia sẽ những điều mới lạ cho nhau như diễn đàn Team , hay hơn nữa nếu đóng góp nhiều bài viết cũng như được like nhiều , bạn sẽ được lên cấp và đạt cấp độ mới sẽ đẹp hơn còn được nhận quà theo mốc. Các event mini như Đuổi hình bắt chữ, Đoán tên bài hát..sẽ diễn ra thường xuyên. Và còn có chatbox để tán gẫu với nhau.
7. Hệ thống tường nhà theo dõi và lịch sử giao dịch mới lạ giúp bạn biết được các hoạt động của mình và lý do được hoặc mất item.. Để khuyến khích khi online nhiều sẽ đạt được mốc quà tặng khác nhau.
8. Chức vụ như MXH Team full chức năng giao diện đẹp. Đặc biệt MXH hỗ trợ tất cả các loại điện thoại. Chỉ cần kết nối Internet bạn đã có thể tham gia và tận hưởng sự thú vị của MXH này. Hãy ghi nhớ tên wap là: '.$home.'/dangki.html
Rất vui được đón chào các bạn tham gia MXH '.$home.'/dangki.html .  Thân mời
</textarea></div>';


}}
/*
echo'<div class="omenu"><b>Mẫu quảng cáo:</b><br><textarea rows="6">Link '.$home.': '.$home.'/dangki.html
Nhớ nhập mã giới thiệu: '.$datauser['magioithieu'].' để được ưu đãi. 
Chào các bạn.
Hôm nay mình sẽ chia sẻ cho các bạn 1 MXH cực hay và hấp dẫn đó là  '.$home.'/dangki.html
MXH với nhiều chức năng mới và đặc biệt mà các MXH khác không có.
1. Phương thức đăng ký mới lạ bạn có thể đăng ký bằng nick KH hoặc bằng SMS rất tiện ích .
2. Hệ thống đồ họa, item giống game Avatar ngoài ra còn có thêm nhiều item mới do BQT sưu tầm và thiết kế. Đáp ứng nhu cầu làm đẹp của mọi người. Shop tuyệt đẹp cũng như chức năng quay số và nâng cấp item dùng đá như Avatar rất cuốn hút có tỉ lệ rõ ràng. Có thể nói chưa có MXH nào làm được như vậy. Ngoài ra các item trong shop cũng như nâng cấp và quay số đều được các admin thêm mới mỗi ngày.
3. Hệ thống nông trại phong phú với nhiều cây trồng và vật nuôi khác nhau để bạn lựa chọn nuôi trồng để kiếm thêm thu nhập. Bạn có thể dùng nông sản để chế biến trong nhà bếp để bán được nhiều tiền hơn. Để thêm nhiều nông sản bạn có thể mua thêm ô đất để trồng cây tối đa là 60ô và khi đạt số ô đất tối đa bạn có thể nâng cấp đất lên lv2. Ngoài ra để tăng tính hấp dẫn hàng tuần BQT còn tổ chức đua top phú nông và thánh trộm cho mọi người những bạn đứng top sẽ có phần thưởng rất lớn
4. Hệ thống Game Mini đa dạng hấp dẫn như: Phá khóa , Đập trứng ra item , Đoán số được lượng , Xổ số và Oản tù tì bằng xu giữa các người chơi với nhau.
5. Hệ thống mới chưa từng có đó là chợ trời giúp bạn có thể trao đổi buôn bán item giữa các người chơi.
6. Ngoài chơi game ngay trên diễn dàn bạn còn có thể lập ra các topic để chia sẽ những điều mới lạ cho nhau như diễn đàn Team , hay hơn nữa nếu đóng góp nhiều bài viết cũng như được like nhiều , bạn sẽ được lên cấp và đạt cấp độ mới sẽ đẹp hơn còn được nhận quà theo mốc. Các event mini như Đuổi hình bắt chữ, Đoán tên bài hát..sẽ diễn ra thường xuyên. Và còn có chatbox để tán gẫu với nhau.
7. Hệ thống tường nhà theo dõi và lịch sử giao dịch mới lạ giúp bạn biết được các hoạt động của mình và lý do được hoặc mất item.. Để khuyến khích khi online nhiều sẽ đạt được mốc quà tặng khác nhau.
8. Chức vụ như MXH Team full chức năng giao diện đẹp. Đặc biệt MXH hỗ trợ tất cả các loại điện thoại. Chỉ cần kết nối Internet bạn đã có thể tham gia và tận hưởng sự thú vị của MXH này. Hãy ghi nhớ tên wap là: '.$home.'/dangki.html
Rất vui được đón chào các bạn tham gia MXH '.$home.'/dangki.html .  Thân mời
</textarea></div>';
*/
echo'<div class="phdr">Thông tin</div>';
echo'<div class="omenu">
Bạn đã giới thiệu được : <b>'.$datauser['gioithieu'].' người </b><br>
</div>';
echo'<div class="login"><details open=""><summary><font color="red">Xem phần quà giới thiệu</font></summary><div class="omenu">Quà giới thiệu :<br>
+ Xu = 500.000<br>
+ Lượng = 5<br>
+ Lượng khóa = 5<br>

</div></details></div>';


require('../incfiles/end.php');
?>