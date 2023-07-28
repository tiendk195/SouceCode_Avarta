<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
$textl = 'Báo lỗi';
require('../incfiles/head.php');
echo'<div class="phdr"> Báo Lỗi </div>';

if (!$user_id) {
	header ('Location : /index.php');
}
switch($act) {
case 'xem' :
if($datauser['rights'] == 10) {
if (isset($_GET['xoa'])) {
$id = $_GET['id'];
$r = mysql_fetch_array(mysql_query("select * from `baoloi` WHERE `id` = '".$id."'"));
if($r){
echo'<div class="rmenu">Xóa thành công <a href="?act=xem">trở lại</a></div>';
mysql_query("DELETE FROM `baoloi` WHERE `id`='".$_GET['id']."' LIMIT 1");
require('../incfiles/end.php');
exit;
}
}

echo'<div class="menu">Danh sách báo lỗi :</div>';
mysql_query("UPDATE `baoloi` SET `ducnghia` = '1'");

$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `baoloi` "), 0);
if ($tong) {
$req = mysql_query("SELECT * FROM `baoloi` ORDER BY `id` DESC LIMIT $start, $kmess ");
while ($res = mysql_fetch_array($req)) {

echo '<div class="menu"><b>
<a href="?act=xem&xoa&id='.$res['id'].'">[Xóa]</a>
Người báo lỗi </b> <a href="/users/profile.php?user='.$res['user_id'].'"><b>'.nick($res['user_id']).'</b></a><br/>';
if ($res['loai'] == 1) {
	echo '<b>Chủ Đề : Góp ý<br/></b>';
}
if ($res['loai'] == 2) {
	echo '<b>Chủ Đề : Báo lỗi<br/></b>';
}
if ($res['loai'] == 3) {
	echo '<b>Chủ Đề : Kích Hoạt<br/></b>';
}
echo 'Nội Dung :  ' . bbcode::tags(functions::smileys($res['text'])) . '</div>';
}
if ($tong > $kmess){
echo '<div class="topmenu">' . functions::display_pagination('?page=', $start, $tong, $kmess) . '</div>';
}
} else {
echo '<div class="rmenu2">Chưa có ai báo lỗi ! <a href="baoloi.php">trở lại</a></div>';
}

}
echo'</div>';
break;

default :
if (isset($_POST['submit'])) {

$noidung = functions::check($_POST['noidung']);
$typess = (int)$_POST['chude'];

if(strlen($noidung) > 10000) {
echo '<div class="rmenu">Nội dung của bạn đã quá 10000 kí tự. Vui lòng sửa lại!</div>';
} else if(strlen($noidung) < 20) {
echo '<div class="rmenu">Nội dung của bạn ít hơn 20 ký tự !</div>';
} else if (empty($noidung)) {
echo '<div class="rmenu">Bạn chưa nhập nội dung</div>';
} else {
mysql_query("INSERT INTO `baoloi` SET
`user_id` = '".$user_id."',
`ducnghia` = '0',

`time` = '".time()."',
`text` = '".$noidung."',
`loai` = '".$typess."'
");
$id = '1' and $id = '3';
$pkcleals = '<b><a href="/member/'.$user_id.'.html"/>'.nick($user_id).'</a> </b> đã gửi một bài viết chủ đề <b>' .$typess.' (1 là góp ý 2 là báo lỗi)</b>'; 
mysql_query("INSERT INTO `thongbao` SET
`id` = '".$id."', 
`user` = '".$id."', 
`text` = '$pkcleals', 
`ok` = '1', 
`time` = '" . time() . "' 
");
echo '<div class="pmenu"><b><font color="red">Báo lỗi thành công !</b></font></div>';  
}
}
	if ($datauser['rights'] == 10) {
		echo '<center><div class="pmenu">Click vào ><a href="?act=xem"> Đây </a>< Để xem báo lỗi </center></div>';
	}

	echo '
	<div class="menu">
	Nhập nội dung (Đọc Kĩ Những Điều Phía Dưới) : <br/>
	<form action ="" method ="post">
	<textarea cols="15" rows="10" name="noidung"></textarea><br/>
    Chọn chủ đề <select name="chude">
    	<option value="3">Kích hoạt</option>

	<option value="1">Góp ý</option>
	<option value="2">Báo lỗi</option>
	</select>
	<input type ="submit" name = "submit" value =" [Gửi] "></form></div>';
?>
<div class="pmenu"><center><h2>Những điều cần lưu ý khi báo lỗi và góp ý</h2></center></br>
<center><br/>

1.Kích Hoạt : <br>

- để được kích hoạt không cần email cần làm theo bước sau : <br>
NHẬP VÀO Ô KIA NỘI DUNG <br>
<c><textarea>
Kích hoạt tài khoản @<?=$datauser['name']?>[<?=$user_id?>] 
Lí Do Kích Hoạt : không có email</textarea></c>

2.Nội dung topic : <br/><br/>
- Bài viết thuộc Báo Lỗi hay Góp Ý, cần thấy chi tiết, rõ ràng, mọi thắc mắc của bạn về mọi việc của MXH. Chúng tôi sẽ xử lý và xem xét kĩ từng góp ý báo lỗi của các bạn.<br/><br/>

3. Các lưu ý khác: <br/><br/>
- Không lập topic với nội dung gây xung đột, đã kích, xúc phạm danh dự, up các hình ảnh thô tục, đồi truỵ hoặc các topic không liên quan về MXH .<br/><br/>
- Các khiếu nại về mất item hoặc xin ân xá hãy vào Ib cho Admin để được hỗ trợ ngày. <br/><br/>
- Những vấn đề liên quan đế cá nhân, chia sẻ cảm xúc bạn hãy xuống box Trai Tài Gái Sắc<br/><br/>

<b>(*)Lưu ý : <br/><br/>
Các Góp Ý và Báo Lỗi có nội dung trái với những điều trên sẽ bị Xoá và sau đó là ra đảo chơi. Hãy cân nhắc nhé.<br/><br/></b>
</div>  </div>

<?php


break;
}
if($user_id){
echo'</div>';
}
echo'<div class="clearfix"></div></div><br></div></div><br></div>';
echo'<div class="left_b_bottom"><div class="right_b_bottom"><div class="footer"><div class="left_bottom"></div><div class="right_bottom"></div></div></div></div><div class="copyright">';
echo'<div class="on">';
echo'</div>';
echo '<font color="Blue">©2018 Mteen.Me <br>Version 1.2 Ajax 3.3.1 </font></b></br><a href="/panel/baoloi.php"><font color="red">BÁO LỖI - GÓP Ý</font></a></b><br><select name="forma" onchange="location = this.options[this.selectedIndex].value;"> <option value="#"><center>Ban Quản Trị ( 4 Anh Em )</center></option><option value="/"> Quy Lão ( VH )</option> <option value="https://www.fb.com/PkCLealsVN"> PkCLealsVN ( Bun Ma - Hiếu )</option>  <option value="https://www.fb.com/T.T.Shiro"> Shiro ( Tiền )</option>  <option value="https://www.fb.com/PokezVN"> PokezVN ( Phúc )</option> </select></center>';
echo '</div>';
echo '</body></html>';
?>