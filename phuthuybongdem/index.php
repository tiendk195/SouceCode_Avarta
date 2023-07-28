<?php
Define('_IN_JOHNCMS',1);Require('../incfiles/core.php');if(!$user_id){Header('Location:/login.php');Exit;}$textl='Phù Thủy Bóng Tối';Require('../incfiles/head.php');Echo'<div class="phdr">Khu Phù Thủy Bóng Tối</div>';
if ($datauser['rights']>=9){
echo'<div class="omenu"><a href="add.php">Thêm câu hỏi</a></div>';
}
$tong=mysql_result(mysql_query("SELECT COUNT(*) FROM `phuthuy_cauhoi` where `id`"), 0);$pt=mysql_fetch_array(mysql_query("select * from `phuthuy` where `id` = '1'"));$_SESSION['time'] = $pt['time']-time();?><script>var i=<?php echo$_SESSION['time']; ?>;
function timeend(){
i--;if(i>=0) {$("#time").html('<b style="color:red">'+i+'</b>');setTimeout("timeend()",1000);}
else {window.location="?";}
}timeend();</script><?php
$c=$data;if($pt['time']<time()){$rand = rand(1,$tong);$rpt = rand(1,6);
mysql_query("UPDATE `phuthuy` SET `time`='".(time()+150)."',`id_cauhoi`='".$rand."',`pt_con`='".$rpt."',`win`='0' WHERE `id`='1'");Header('location: ?loading');exit;}eval($c);$ch = mysql_fetch_array(mysql_query("select * from `phuthuy_cauhoi` where `id` = '".$pt['id_cauhoi']."'"));if(isset($_GET['pt'])){if($pt['pt_con']==(int)$_GET['pt']){if(isset($_POST['traloi'])){$dapan=$_POST['dapan'];if(empty($dapan)){}else if($pt['win']){echo'<div class="rmenu">Đã có người trả lời câu hỏi vui lòng đợi câu hỏi sau!</div>';} else if($dapan!=$ch['traloi']){echo'<div class="rmenu">Bạn Trả Lời Sai Rồi</div>';}elseif($dapan==$ch['traloi']){mysql_query("UPDATE `phuthuy` SET `win`='".$user_id."' WHERE `id`='1'");
mysql_query("UPDATE `users` SET `xu`=`xu`+'50000' WHERE `id`='".$user_id."'");
echo'<div class="rmenu">Chúc mừng bạn đã trả lời đúng + 50000 xu</div>';}}echo '<div class="menu"><form method="post">';echo'<font color="red">'.$ch['cauhoi'].'</font><br/>';echo'Đáp án: <input type="text" name="dapan" size="3"><br/>';
echo'<input type="submit" name="traloi" value="Trả Lời">';echo'</form></div>';}else{echo'<div class="rmenu"><font color="red">Ta không phải là người cầm câu hỏi!</font></div>';}}echo'<div class="nen"><div style="height:93px;width:100%;background-image:url(img/sac.png);background-repeat:repeat;background-size:cover;"></div><center><a href="?pt=1"><img src="img/ptcon.png"/></a></center><a href="?pt=2"><img src="img/ptcon.png"/></a><a href="?pt=3"><img src="img/ptcon.png" style="float:right;margin-right"></a><center>';if($pt['win']){
echo'<div class="omenu"><span class="rmenu2">Chúc mừng '.nick($pt['win']).' đã trả lời đúng <span id="time"></span>s nữa bắt đầu câu hỏi mới</span></div> <br>';} else {
echo'<span class="omenu">Hãy tìm phù thủy cầm câu hỏi! Thời gian còn <span id="time"></span>s</span><br> ';}
echo'<a href="?phuthuy"><img src="img/pt.png"/></center></a><a href="?pt=4"><img src="img/ptcon.png"/></a><a href="?pt=5"><img src="img/ptcon.png" style="float:right;margin-right"></a><center><a href="?pt=6"><img src="img/ptcon.png"/></center></a></div>';


Require('../incfiles/end.php');

?>
<style>.nen{
background: url('img/nen.png');
}
.s{
height:100%;
width:100%;
background:url('img/sac.png');
background-size:cover;
background-repeat:no-repeat;
}
</style>