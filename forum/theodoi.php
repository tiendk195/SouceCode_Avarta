<?php
/*////mod theo dõi chủ đề cho johncms//////
@tác giả: Hoàng Anh             /////
@hỗ trợ: tuoitreu.com         /////
//////code theo dõi////////////////*/
define('_IN_JOHNCMS', 1);
require_once('../incfiles/core.php');
require_once('../incfiles/head.php');
$headmod='theo dõi chủ đề';
$t=$_GET['t'];
$input =mysql_fetch_array(mysql_query("select * from `forum` where `id`='$t' and `type`='t'"));
$input1=mysql_num_rows(mysql_query("select * from `theodoi` where `user_id`='$user_id' and `topic`='$t'"));
$dv = mysql_fetch_array(mysql_query("SELECT * FROM `theodoi` WHERE `user_id`='{$datauser['id']}'"));
if(!$t){
echo 'tình trạng dữ liệu';
require_once('../incfiles/end.php');
exit;
}
if($input1==0){
if(isset($_POST['submit'])){

} else {
if($_POST['check'])
$check='1';
else
$check='0';
header('Location: /forum/'.$t.'.html');
echo 'Bạn đã theo dõi chủ đề thành công';
mysql_query("insert into `theodoi` set `topic`='$t',
`check`='$check',
`user_id`='$user_id',
`time`='".time()."',
`text`='".mysql_real_escape_string($input['text'])."'");

}
} else {
echo '<div class="mainblok"><div class="phdr">Bỏ theo dõi</div><div class="menu">Bạn đã bỏ theo dõi chủ đề này</div></div>';
mysql_query("delete from `theodoi` where `topic`='$t' and `user_id`='$user_id'");
header('Location: /forum/'.$t.'.html');
}
require_once('../incfiles/end.php');
?>
