<?php
/*
Code Được Mod Bởi Lê Văn Thịnh
Code Mod By Lê Văn Thịnh
Vui Lòng Ghi Nguồn Nếu Có Sao Chép! 
*/
define('_IN_JOHNCMS',1);
include'../incfiles/core.php';
$textl ='Làng Ngọc Rồng';
include'../incfiles/head.php';
if(!$user_id){
header('location: /login.php');
include'../incfiles/end.php';
exit;
}
if ($datauser['kichhoat']==0){
    Header('location: '.$home.'/users/checkpoint.php');
    exit;
}
$nro = mysql_fetch_array(mysql_query("SELECT * FROM `ngocrong_uoc` WHERE `time`>'0' "));
$n=mysql_num_rows(mysql_query("SELECT * FROM `ngocrong_uoc` WHERE `time`>'0'"));



{
   echo'<div class="phdr">Làng Ngọc Rồng </div>';
   echo'<div id="ur"></div>';
   echo'<div id="thuhoach"></div>';
   echo'<div class="nentroikame">
<marquee behavior="scroll" direction="left" scrollamount="6" style="margin-top: 6px"><img src="/icon/iconxoan/dammaylon.png" width="20"></marquee>
<marquee behavior="scroll" direction="left" scrollamount="4" style="margin-top: -10px"><img src="/icon/iconxoan/dammaynho.png" width="15"></marquee></div>';
echo'<div class="bco"></div>';
echo'<div class="nen" style="min-height: 45px;margin:0"><a href="bahatmit.php"><img src="https://i.imgur.com/HCZlPBR.gif" title="Bà hạt mít" style="position: absolute;verticalalign: 0 px;margin:0px 0 0 0px;"></a>


<a href="cadic.php"><img src="https://i.imgur.com/nRnLcyT.gif" title="Cadic" style="position: absolute;verticalalign: 0 px;margin:0px 0 0 85px;"></a>
</div>';
echo'<div class="nen" style="min-height: 85px;margin:0">





<div id="data" style=""><center>
<img onclick="uocrong('.$user_id.')" src="img/tuongrong.png"> </center>';
?>
<script>
function thuhoach(id)
{
    $.ajax(
        {
            url : 'caydau.php',
            data : {id : id},
            type : 'POST',
            success : function(d)
            {
                $("#thuhoach").html(d);
            }
        }
        
        );
}
function uocrong(id)
{
    $.ajax(
        {
            url : 'uocrong.php',
            data : {id : id},
            type : 'POST',
            success : function(d)
            {
                $("#ur").html(d);
            }
        }
        
        );
}
function cuoprong(id)
{
    $.ajax(
        {
            url : 'cuop-load.php',
            data : {id : id},
            type : 'POST',
            success : function(d)
            {
                $("#ur").html(d);
            }
        }
        
        );
}
</script></div><script>
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
<?php
if ($nro['user_id']==$user_id){
    echo'<center>';
     echo '<div id="content-load">';
?>
<script type="text/javascript">
$(document).ready(function(){
	$('#btn-uoc').click(function(){
		var idvp = $('#idvp').val();
		var typeuoc=$('select option:selected').val();
		var url = "uoc-load.php";
		var data = {"uoc": "", "idvp": idvp, "type": typeuoc};
		$('#content-load').load(url, data);
		return false;
	});
});
</script>

<?php
echo'</br></br></br></br></br></br>';
echo'<select name="type">';
		echo'
<option '.($type==1?'selected="selected"':'').' value="1"> Ước Đẹp trai</option>';
echo'
<option '.($type==2?'selected="selected"':'').' value="2"> Ước Giàu có</option>';
echo'
<option '.($type==3?'selected="selected"':'').' value="3"> Ước Sức mạnh</option>';
echo'
</select>';
echo'<input type="hidden" id="idvp" name="idvp" value="'.$nro['id'].'">';
echo'</br><input type="submit" id="btn-uoc" name="uoc" value="Ước"></form></center></br></br></br></br>';
    echo'<center>';
}
if ($n >0){
echo'<center><img src="/avatar/'.$nro['user_id'].'.png">
<img src="https://i.imgur.com/8SRVPNR.gif" style="position: absolute;verticalalign: 0px;margin:-40px 0 0 -87px;"><br><br>
 
</center>';
}

echo'<br><br><center> 
</center></div>';
echo'<div class="buico"></div>';
echo'<div class="nen" style="min-height: 55px;margin:0"><img src="https://i.imgur.com/Fboxfqm.png" style=" float: right;verticalalign: 0 px;margin:-32px 0 0 0px;">
<a href="mapcold/"><img src="/images/vao.gif" style=" float: right"></a>
<img src="https://i.imgur.com/IUDYAK6.png" style=" float: left;verticalalign: 0 px;margin:-32px 0 0 0px;">
<a href="mapnuituyet/"><img src="/images/vao.gif" style=" float: left"></a>';


//echo'<img src="/avatar/'.$user_id.'.png">';

mysql_query("UPDATE `users` SET `vitri` = '554' WHERE `id` = '".$user_id."'");

$online_u = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `lastdate` > " . (time() - 300) . " AND `vitri` = '554'"), 0);
$totalonline = $online_u;
$q = @mysql_query("select * from `users` where `lastdate` > " . (time() - 300) . " AND `vitri` = '554';");
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
}else{
	echo '<img src="/avatar/'.$user_id.'.png"/>';
}



echo'</div>';
echo'<div class="nenco"><div style="text-align: center;"><div class="ducnghia_">';
$dau=$datauser['leveldauthan']*10;
if ($datauser['timethuhoachcaydau']<= time() ){

echo'
<img onclick="thuhoach('.$user_id.')" src="img/dauthan-thuhoach.png"> 
<span class="ducnghia_hien">
<table cellpadding="0" cellspacing="0" width="100%">
<tbody><tr>
<td width="30"><img src="img/dauthan-thuhoach.png" "=""></td><td width="70">
<font size="1" color="white" style="text-shadow: 0 0 0.2em #ff6633, 0 0 0.2em #ff6633,  0 0 0.2em #ff6633"><b>Cây đậu thần</b></font><br>
<font size="1">Sản lượng: '.$dau.' đậu thần</font>
</td></tr></tbody></table>
</span>';
}
else {
  echo'
<img onclick="thuhoach('.$user_id.')" src="img/dauthan.png"> 
<span class="ducnghia_hien">
<table cellpadding="0" cellspacing="0" width="100%">
<tbody><tr>
<td width="30"><img src="img/dauthan.png" "=""></td><td width="70">
<font size="1" color="white" style="text-shadow: 0 0 0.2em #ff6633, 0 0 0.2em #ff6633,  0 0 0.2em #ff6633"><b>Cây đậu thần</b></font><br>
<font size="1">Thu hoạch sau: '.thoigiantinh(floor($datauser['timethuhoachcaydau'])).'</font>
</td></tr></tbody></table>
</span>';  
}

echo'
</div>
</div></div>';
echo'<div class="datco"></div>';





}
include'../incfiles/end.php';
?>

<style>
.nen {
    margin: 10px 0px;
    background: url(https://i.imgur.com/hSIat6a.png);
    padding: 0px;
}
.bautroi {
background: url('/giaodien/images/nentroixanh.png') repeat-x;
height: 48px;
width: 100%;
}
.nenco {
background: url('img/nenco.png') repeat-x;
height: 39px;
width: 100%;
}
.datco {
background: url('img/datco.png') repeat;
height: 75px;
width: 100%;
}
.nentroikame {
background: url('https://i.imgur.com/nGE7OfS.png') repeat-x;
height: 235px;
width: 100%;
}
.nen1 {
background: url('https://i.imgur.com/kE1pExL.png') repeat-x;
height: 35px;
width: 100%;
}
.nencanh {
background: url('https://i.imgur.com/ntBqPdi.png') repeat-x;
height: 225px;
width: 100%;
}
.dat{
background: url('https://i.imgur.com/aiKhxH5.png') repeat;
height: 35px;
width: 100%;
}
.bco{
background: url('https://i.imgur.com/uG8e3eI.png') repeat-x; 
height: 25px;
width: 100%;
}
</style>
