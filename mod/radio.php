<?php

/*
////////////////////////////////////////////////////////////////////////////////

//          Code được viết bởi pkoolvn                                                            //
//                                                                     //
//           fb.com/pkoolvn                                                              //                                                      //
//                                                                           //
////////////////////////////////////////////////////////////////////////////////
*/

define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
$textl = 'Gửi Yêu Cầu Blog Radio';

require('../incfiles/head.php');
echo'<div class="phdr">Blog Radio</div>';

if($datauser['rights'] == 10 || $datauser['id'] == 10586 || $datauser['id'] == 14273 || $datauser['id'] == 6){
if (isset($_GET['xoa'])) {
$id = $_GET['id'];
$r = mysql_fetch_array(mysql_query("select * from radio WHERE `id` = '".$id."'"));
if($r){
echo'<div class="rmenu">Xóa thành công</div>';
mysql_query("DELETE FROM `radio` WHERE `id`='".$_GET['id']."' LIMIT 1");
require('../incfiles/end.php');
exit;
}
}
echo'<div class="menu"><a href="http://api.tuoiteen.me/upload.php"><b>[Upload Files Ghi Âm]</b></a></div>';
echo'<div class="rmenu">Danh sách yêu cầu thành viên gửi về</div>';

$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `radio` "), 0);
if ($tong) {
$req = mysql_query("SELECT * FROM `radio` ORDER BY `id` DESC LIMIT $start, $kmess ");
while ($res = mysql_fetch_array($req)) {

echo '<div class="menu"><b><a href="?xoa&id='.$res['id'].'">[Xóa]</a> Yêu cầu từ bạn</b> <a href="/users/profile.php?user='.$res['user_id'].'"><b>'.nick($res['user_id']).'</b></a>:  ' . bbcode::tags(functions::smileys($res['text'])) . '</div>';
}
if ($tong > $kmess){
echo '<div class="topmenu">' . functions::display_pagination('?page=', $start, $tong, $kmess) . '</div>';
}
} else {
echo '<div class="rmenu2">Chưa có ai gửi yêu cầu -.-</div>';
}


} else {

if (isset($_POST['submit'])) {
$text = functions::check($_POST['msg']);
if(strlen($text) > 10020) {
echo '<div class="rmenu">Nội dung của bạn đã quá 10020 kí tự. Vui lòng sửa lại!</div>';
} else if (empty($text)) {
echo '<div class="rmenu">Bạn chưa nhập nội dung</div>';
} else {
mysql_query("INSERT INTO `radio` SET
`user_id` = '".$user_id."',
`time` = '".time()."',
`text` = '".$text."'
");
echo '<div class="rmenu2"><b><font color="red">Kết quả: gửi yêu cầu thành công!</b></font></div>';
}
}
echo '<div class="rmenu">Gửi yêu cầu cho blog radio</div><div class="menu">Nội dung mà bạn muốn tâm sự hoặc gửi ai đó:<br><form action ="" method ="post"><textarea cols="15" rows="2" name="msg"></textarea>
<input type ="submit" name = "submit" value ="Gửi"></form></div>';


}

require('../incfiles/end.php');
?>