<?php
define('_IN_JOHNCMS',1);
$rootpath='../../';
include'../../incfiles/core.php';
$textl = 'Cô Giáo Tiếng Anh';
include'../../incfiles/head.php';
$check=intval(abs($_GET['check']));
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `cogiaota` where `id`"), 0);
$cg = mysql_fetch_array(mysql_query("select * from `cogiao` where `id` = '1'"));
switch($act) {
case 'add':
if ($datauser['id'] == 1) {
echo '<div class="phdr">Thêm câu hỏi</div>';
if (isset($_POST['add'])) {
$cauhoi=$_POST['cauhoi'];
$dapan=$_POST['dapan'];
if (empty($cauhoi)) {
echo '<div class="news">Không được bỏ trống chỗ nào hết!</div>';
} else {
mysql_query("INSERT INTO `cogiaota` SET
`cauhoi`='".$cauhoi."',
`dapan`='".$dapan."'");
echo '<div class="rmenu">Thêm thành công</div>';
}
}
echo '<form method="post">';
echo 'Câu hỏi: <input type="text" name="cauhoi" size="3"><br/>';
echo 'Đáp án: <input type="text" name="dapan" size="3"><br/>';

echo '<input type="submit" name="add" value="Thêm">';
echo '</form>';
}
include'../../incfiles/end.php';
exit;
break;
}

if($datauser['xu']<=0){
echo'<div class="rmenu">Bạn không đủ xu</div>';
include'../../incfiles/end.php';
exit;
}
$_SESSION['timetl']=$cg['time'];
?>
<script>
var i=<?php echo ($_SESSION['timetl']-time());?>;
function timeend() {
i--;
if(i>=0) {$("#time").html('<b style="color:red">'+i+'</b>');setTimeout("timeend()",1000);}
else {window.location="?";}
}
timeend();
</script>
<style>
.newss {
    background-color: #fffaf0;
    border: 2px dashed #ffcf66;
    margin-bottom: 5px;
    padding: 5px;
width: 96%;
}
.hangraota{
background: url('https://i.imgur.com/76dejvF.png') repeat-x; 
height: 130px;
width: 99%;
}
.datta{
background: url('https://i.imgur.com/psJm7tm.png') repeat-x; 
height: 100px;
width: 99%;
}
.buicos {
background: url('http://danchoiviet.xyz/giaodien/images/buico.png') repeat-x;
margin-bottom: 4px;
height: 24px;
width: 99%;
}
.traloi {
    background-color: #FFFFFF;
    border-radius: 5px;
    border: 1px solid #FFC9D6;
    color: #000000;
    margin: 5px 0px;
    padding: 10px;
width: 94%;
}
.cotcung{
background-color: #3688c7;
color: #fff;
font-weight: bold;
padding: 4px 4px 5px 11px;
width: 94%;
}
.nencay{background:url(https://i.imgur.com/s9WE9wX.png) repeat-x;height:96px;width:100%;max-width:900px;width:100%}
.buico{background:url(/giaodien/images/buico.png) repeat-x;margin-bottom:4px;height:24px}
</style>
<?php
echo'<center><div class="phdr">Khu Cô Giáo Tiếng Anh</div>';
$tl=@mysql_fetch_array(mysql_query("select * from `cogiaota` where `id` = '{$cg['id_cg']}'"));
if($cg['id_win'] and $cg['traloi'] == 1){
echo'<div class="menu"><marquee>Chúc mừng bạn '.nick($cg['id_win']).' đã trả lời câu hỏi '.strtolower($tl['cauhoi']).' tiếng anh đọc là gì! đúng và nhanh nhất</marquee></div>';
}
$rand = rand(1,$tong);
$a=1;
$ran = $rand-$a;
if($cg['time'] < time()){
mysql_query("UPDATE `cogiao` SET `time`='".(time()+20)."',`id_win`='0',`traloi`='0',`id_cg`='".$rand."' WHERE `id`='1'");
Header('location: ?reload');
exit;
}
mysql_query("UPDATE `users` SET `vitri`='557' WHERE `id`='{$user_id}'");

echo '<div class="menu"><div class="nencay" style="min-height:140px"><marquee behavior="scroll" direction="left" scrollamount="1" style="margin-top: 5px"><img src="/img/may1.png"></marquee><marquee behavior="scroll" direction="left" scrollamount="2" style="margin-top: 10px"><img src="/img/may2.png"></marquee></div><div class="cola" style="min-height: 100px;margin:0"><div class="buico"></div>';
$online_u = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `vitri` = '557'"), 0);
$totalonline = $online_u;
$q = @mysql_query("select * from `users` where `lastdate` > " . (time() - 300) . " AND `vitri` = '557';");
$count = mysql_num_rows($q);
while ($arr = mysql_fetch_array($q)){
$trinhtrangvip = mysql_query("select `rights` from `users` where id='" . $arr['id'] . "'");
$trinhtrangviphonnua = mysql_fetch_array($trinhtrangvip);
if($arr['id'] != $datauser['id']){
$u_on[]='<a href="../member/' . $arr['id'] . '.html"><img src="/avatar/' . $arr['id'] . '.png"></a>';
}else{
	$u_on[]='<img src="/avatar/' . $arr['id'] . '.png">';
}
}
//Keet thuc topic
if ($online_u > 0){
echo implode(' ',$u_on).'';
}

echo'<br><br><br>';
$dichuyen1 = rand(-10,-100);
$dichuyen2 = rand(-100,100);
echo'&#160;<img src="ta.png" alt="Cô Giáo" style="position: absolute;vertical-align: 0px;margin:'.$dichuyen1.'px 0 0 '.$dichuyen2.'px"></a>';
echo'</div><div class="buico"></div></div>';

$tl=@mysql_fetch_array(mysql_query("select * from `cogiaota` where `id` = '{$cg['id_cg']}'"));
$dentu = $_SERVER['HTTP_REFERER'];
if(empty($dentu) && $check>=1){
Header('location: ?reload');
echo'<div class="newss"><b>Lỗi</b> : Không Thể Kết Nối Tới Server Anh Việt</div>';
include'../../incfiles/end.php';
exit;
}
if(isset($_POST['submit'])){
$timecam = $cg['time']- time();
$cam =time();

if($cg['traloi'] == 1){
echo'<div class="rmenu">Lỗi đã có người trả lời đúng trước bạn vui lòng đợi <span id="time"></span>s nữa để trả lời câu tiếp theo. <meta http-equiv=refresh content="'.date('s', $timecam).'; URL="></div>';
include'../../incfiles/end.php';
Exit;
}

$tll=@mysql_fetch_array(mysql_query("select * from `cogiaota` where `id` = '{$cg['id_cg']}'"));

$dapan = $tll['dapan'];
$traloi = strtolower(addslashes($_POST['dapan']));
if(empty($traloi)){
echo'<div class="rmenu">Vui lòng nhập câu chả lời</div>';
}else
if($dapan!=$traloi){
echo'<div class="rmenu">Bạn Trả Lời Sai Rồi</div>';
}else if($dapan==$traloi){
	$checknv=mysql_num_rows(mysql_query("SELECT * FROM `nhiemvu_user` WHERE `user_id`='".$user_id."' AND `id_nv`='17'"));
if ($checknv>0) {
mysql_query("UPDATE `nhiemvu_user` SET `tiendo`=`tiendo`+'1' WHERE `user_id`='".$user_id."' AND `id_nv`='17'");
}
	$checknv2=mysql_num_rows(mysql_query("SELECT * FROM `nhiemvu_user` WHERE `user_id`='".$user_id."' AND `id_nv`='24'"));
if ($checknv2>0) {
mysql_query("UPDATE `nhiemvu_user` SET `tiendo`=`tiendo`+'1' WHERE `user_id`='".$user_id."' AND `id_nv`='24'");
}
mysql_query("UPDATE `users` SET `xu`=`xu`+'10000' WHERE `id`='".$user_id."'");

mysql_query("UPDATE `cogiao` SET `time`='".(time()+25)."',`id_win`='".$user_id."',`traloi`='1' WHERE `id`='1'");
echo'<div class="rmenu">Chúc Mừng Bạn '.$login.' Đã Trả Lời Chính Xác. Bạn Nhận Được 10000 xu</div>';

$nl = rand(1,3);
echo'<div class="rmenu"><b><font color="red">Chúc mừng bạn nhận được '.$nl.' <img src="/event/103/img/ladong.png"/></font></b></div>';
mysql_query("UPDATE `users` SET `ladong`=`ladong`+'{$nl}' WHERE `id`='{$user_id}'");

$ii = mysql_fetch_array(mysql_query("SELECT * FROM `nhiemvu` WHERE `user_id`='".$user_id."'"));
if($ii['capdo3'] == 0){
mysql_query("UPDATE `nhiemvu` SET `3nv1`=`3nv1`+'1' WHERE `user_id` = '".$user_id."'");
}
if($ii['capdo3'] == 1){
mysql_query("UPDATE `nhiemvu` SET `3nv2`=`3nv2`+'1' WHERE `user_id` = '".$user_id."'");
}

if($ii['capdo3'] == 2){
mysql_query("UPDATE `nhiemvu` SET `3nv3`=`3nv3`+'1' WHERE `user_id` = '".$user_id."'");
}
if($ii['capdo3'] == 3){
mysql_query("UPDATE `nhiemvu` SET `3nv4`=`3nv4`+'1' WHERE `user_id` = '".$user_id."'");
}

}

}
$timec = $cg['time']- time();
echo'<div class="omenu">';
echo'<div class="traloi"><font color="red"><b>Cô Giáo</b></font>: Từ '.$tl['cauhoi'].' Tiếng Anh Đọc Là Gì? Còn: <span id="time"></span>s</div>
<div class="traloi"><form action="?check='.$rand.'"method="post"><b>'.nick($datauser['id']).'</b>: <input type="text"name="dapan"><input type="submit" name="submit" value="Trả Lời"></form></div>';
echo'</div>';
include'../../incfiles/end.php';
?>