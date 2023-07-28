<?php
define('_IN_JOHNCMS', 1);
$textl = 'Ngọc Rồng/ Map Tương Lai';
$headmod = 'id_user';
$rootpath='../../';
require_once ("../../incfiles/core.php");
require_once ("../../incfiles/head.php");
if (!$user_id) {
echo '<div class="omenu"><p><b>Lỗi!</b><br>Trang chỉ dành cho thành viên!</p></div>';
require_once ("../../incfiles/end.php");
exit;
}
if ($datauser['kichhoat']==0){
    Header('location: '.$home.'/users/checkpoint.php');
    exit;
}
if ($datauser['tuonglai']==0) {
    echo'<script> alert("Vui lòng ngồi lên du thuyền để tới tương lai") </script>';
    exit;
}


?>
<style>

.bautroi {
background: url('img/bautroi.png') repeat-x;
height: 153px;
width: 100%;
}
.nenxanh {
background: url('img/nenxanh.png') repeat;
height: 30px;
width: 100%;
}
.nendat {
background: url('img/dat1.png') repeat;
}
.nendat2 {
background: url('img/dat2.png') repeat-x;
height: 79px;
}
.viendat {
background: url('img/viendat.png') repeat-x;
height: 3px;
}
.gd_game{
border: 1px solid #A9E2F3;
background-color: #A9E2F3;
margin:2px 0;
padding:10px;
border-radius:5px;
}
.ducnghia_trai {
    position: relative;
    display: inline-block;
}

.ducnghia_trai .ducnghia_trai_hien {
    visibility: hidden;
    width: 120px;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    top: -5px;
    right: 110%;
}

.ducnghia_trai .ducnghia_trai_hien::after {
    content: "";
    position: absolute;
    top: 50%;
    left: 100%;
    margin-top: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: transparent transparent transparent black;
}
.ducnghia_trai:hover .ducnghia_trai_hien {
    visibility: visible;
}

.ducnghia_ {
    position: relative;
    display: inline-block;
}
.ducnghia_ .ducnghia_hien {
    visibility: hidden;
    width: 120px;
    background-color: #FFF;
    color: black;
    text-align: center;
    border-radius: 15px;
    padding: 5px 0;
    
    /* Position the ducnghia_ */
       position: absolute;

    z-index: 1;
    bottom: 100%;
    left: 50%;
    margin-left: -60px;
}
</style>

<script type="text/javascript">
$(document).ready(function(){
	$('#danh').click(function(){
		var url = "wboss-load.php";
		var data = {"danh": ""};
		$('#load').load(url, data);
		return false;
	});
});
</script>
<script type="text/javascript">
$(document).ready(function(){
	$('#hoiphuc').click(function(){
		var url = "hoiphuc-load.php";
		var data = {"hoiphuc": ""};
		$('#load').load(url, data);
		return false;
	});
});
</script>

<?php




switch($act){
case'khu':
$vp=intval($_GET['id']);
$e=mysql_fetch_array(mysql_query("SELECT * FROM `ngocrong_tuonglai_khu` WHERE `id`='".$vp."'"));
$p=mysql_fetch_array(mysql_query("SELECT * FROM `ngocrong_tuonglai` WHERE `id`='".$e['boss']."'"));

$n=mysql_num_rows(mysql_query("SELECT * FROM `ngocrong_tuonglai_khu` WHERE `id`='".$vp."'"));
IF($n<1){
Header('Location: /');
Exit;
} 

echo'<div class="phdr">Map Tương Lai > Khu '.$vp.'</div>';

mysql_query("UPDATE `users` SET `vitri` = '557' +'".$vp."' WHERE `id` = '".$user_id."'");

$online_u = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `lastdate` > " . (time() - 300) . " AND `vitri` = '557'+'".$vp."'"), 0);
$totalonline = $online_u;
$q = @mysql_query("select * from `users` where `lastdate` > " . (time() - 300) . " AND `vitri` = '557'+'".$vp."';");
$count = mysql_num_rows($q);
while ($arr = mysql_fetch_array($q)){
$trinhtrangvip = mysql_query("select `rights` from `users` where id='" . $arr['id'] . "'");
$trinhtrangviphonnua = mysql_fetch_array($trinhtrangvip);
if($arr['id'] != $datauser['id']){
$u_on[]='<a href="/member/' . $arr['id'] . '.html"><img src="/avatar/' . $arr['id'] . '.png"></a>';
}else{
	$u_on[]='<img src="/avatar/' . $arr['id'] . '.png">';
}
}
//Keet thuc topic

////


echo'<div class="gd_"><div class="pmenu"><center><a id="s"><span style="background-color:#fff;"><b><font color="red">HIỂN THỊ THÔNG TIN<br><i class="fa fa-info-circle"></i></font></b></span>
</a>
<div id="ss"  style="display: none;"><div id="data" style=""><div class="gd_game"><font color="green" size="1"><b><i class="fa fa-bolt"></i></b> 50




 °
<font color="green" size="1"><b><i class="fa fa-heart"></i></b> 100 



<font color="blue" size="1">° Ảnh hưởng bởi cái lạnh: [-20HP/-182189s]</font> 
<br><input onclick="hoiphuc(1587)" type="submit" value="Hồi phục bằng Đậu thần">
</font></font></div><div style="text-align: center;"><table width="100%" border="0" cellspacing="0"><tbody><tr class="pmenu">
<td width="25%"><div class="ducnghia_">
<img src="img/congcu/350.png" onclick="sudung_(350)" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px"><br>
<span class="ducnghia_hien">
<table cellpadding="0" cellspacing="0" width="100%">
<tbody><tr>
<td width="30"><img src="/ngocrong/img/ngocrong/12.png"> </td><td width="70">
<font size="1" color="white" style="text-shadow: 0 0 0.2em #ff6633, 0 0 0.2em #ff6633,  0 0 0.2em #ff6633"><b>Bổ huyết</b></font><br>
<font size="1">Hồi sức khỏe bản thân trong 15 phút</font>
</td></tr></tbody></table>

</span>
</div></td>

<td width="25%"><div class="ducnghia_">
<img src="img/congcu/351.png" onclick="sudung_(351)" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px">
<span class="ducnghia_hien">
<table cellpadding="0" cellspacing="0" width="100%">
<tbody><tr>
<td width="30"><img src="/ngocrong/img/ngocrong/13.png"> </td><td width="70">
<font size="1" color="white" style="text-shadow: 0 0 0.2em #ff6633, 0 0 0.2em #ff6633,  0 0 0.2em #ff6633"><b>Giáp xên bọ hung</b></font><br>
<font size="1">Giảm tỉ lệ nhận sát thương từ quái trong 15 phút</font>
</td></tr></tbody></table>

</span>
</div></td>

<td width="25%"><div class="ducnghia_">
<img src="img/congcu/352.png" onclick="sudung_(352)" "="" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px">
<span class="ducnghia_hien">
<table cellpadding="0" cellspacing="0" width="100%">
<tbody><tr>
<td width="30"><img src="/ngocrong/img/ngocrong/14.png"> </td><td width="70">
<font size="1" color="white" style="text-shadow: 0 0 0.2em #ff6633, 0 0 0.2em #ff6633,  0 0 0.2em #ff6633"><b>Cuồng nộ</b></font><br>
<font size="1">Tăng X2 sức mạnh trong  15 phút</font>
</td></tr></tbody></table>

</span>
</div></td>

<td width="25%"><div class="ducnghia_">
<img src="img/congcu/353.png" "="" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px">
<span class="ducnghia_hien">
<table cellpadding="0" cellspacing="0" width="100%">
<tbody><tr>
<td width="30"><img src="/ngocrong/img/ngocrong/15.png"> </td><td width="70">
<font size="1" color="white" style="text-shadow: 0 0 0.2em #ff6633, 0 0 0.2em #ff6633,  0 0 0.2em #ff6633"><b>Ẩn danh</b></font><br>
<font size="1">Đánh quái sẽ không bị sát thương từ quái trong 15 phút</font>
</td></tr></tbody></table>
<font size="1" color="white" style="text-shadow: 0 0 0.2em #9932CC, 0 0 0.2em #9932CC,  0 0 0.2em #9932CC"><b>Thời gian sử dụng: 14′</b></font>
</span>
</div></td>

</tr></tbody></table></div><font color="green" size="1"><font color="green" size="1">




<center></center></div></center></div></div>';

echo'<div class="bautroi"></div>';
echo'<div class="nenxanh"></div>';
echo'<div class="nendat">';
echo'<div id="danh"></div>';

echo'<a href="index.php"><img src="/app/images/k'.$vp.'.png"></a>';

if ($e['boss'] != 0) {


echo'<center><img onclick="thongtin_('.$vp.')"  src="img/boss/'.$e['boss'].'.png" style="position: absolute;verticalalign: 0px;margin:-56px 0 0 0px;"></center>';
echo'</br></br>';
	echo'<center><span id="load">

<center></center> </span>
';
}
echo'</div>';

echo'</font></font></font></font>';
echo'<div class="nendat2">';

if ($online_u > 0){
echo implode(' ',$u_on).'';
}else{
	echo '<img src="/avatar/'.$user_id.'.png"/>';
}
echo'
</div>';





break;



default:
echo'<div class="phdr">Map Tương Lai </div>';

    $e=mysql_query("SELECT * FROM `ngocrong_tuonglai_khu` ORDER BY `id`");

while($s=mysql_fetch_array($e)) {
	echo'<div class="omenu"><a href="?act=khu&id='.$s['id'].'"><img src="/images/vao.png"> Khu '.$s['id'].'</a></div>';
	
}

}

require('../../incfiles/end.php');
?>
<script type="text/javascript"> 
$('#s').click(function() {  
$('#ss').toggle('fast','linear');  
});
 </script>
 <script>
 function thongtin_(id)
{
    $.ajax(
        {
            url : 'thongtin.php',
            data : {id : id},
            type : 'POST',
            success : function(d)
            {
                $("#danh").html(d);
            }
        }
        
        );
}
function danh(id)
{
    $.ajax(
        {
            url : 'wboss.php',
            data : {id : id},
            type : 'POST',
            success : function(d)
            {
                $("#danh").html(d);
            }
        }
        
        );
}
function hoiphuc(id)
{
    $.ajax(
        {
            url : 'hoiphuc.php',
            data : {id : id},
            type : 'POST',
            success : function(d)
            {
                $("#hoiphuc").html(d);
            }
        }
        
        );
}
function sudung_(id)
{
    $.ajax(
        {
            url : 'sudung.php',
            data : {id : id},
            type : 'POST',
            success : function(d)
            {
                $("#sudung").html(d);
            }
        }
        
        );
}
var loadcontent ='<i>Đang tải dữ liệu...</i>';
$(document).ready(function(){
$('#data').html(loadcontent);
$('#data').load('f5.php');
var refreshId = setInterval(function(){
$('#data').load('f5.php');
$('#data').slideDown('slow');
},1000);
});
</script>


