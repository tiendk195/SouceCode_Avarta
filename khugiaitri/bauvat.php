<?php
define('_IN_JOHNCMS',1);
require '../incfiles/core.php';
$textl = 'Quay báu vật';
require '../incfiles/head.php';

echo"<script>
var loadcontent = '';
$(document).ready(function(){
$('#dataquay').html(loadcontent);
$('#dataquay').load('bauvat-load.php');
var refreshId=setInterval(function(){
$('#dataquay').load('bauvat-load.php');
$('#dataquay').slideDown('slow');
},4000);
$('#postquay').validate({
debug:false,
submitHandler:function(form){
$.post('bauvat-load.php',
$('#postquay').serialize(),
function(chatoutput){
$('#dataquay').html(chatoutput);
});
$('#okquay').val('');
}
});
});

</script>";
$vequay=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='251'"));

$bauvat4=mysql_fetch_array(mysql_query("SELECT * FROM `vongquaybauvat` WHERE `id`='4'"));
$shop4=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$bauvat4['id_shop']."'"));
$bauvat5=mysql_fetch_array(mysql_query("SELECT * FROM `vongquaybauvat` WHERE `id`='5'"));
$shop5=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$bauvat5['id_shop']."'"));
$bauvat7=mysql_fetch_array(mysql_query("SELECT * FROM `vongquaybauvat` WHERE `id`='7'"));
$shop7=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$bauvat7['id_shop']."'"));
$bauvat2=mysql_fetch_array(mysql_query("SELECT * FROM `vongquaybauvat` WHERE `id`='2'"));
$shop2=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE `id`='".$bauvat2['id_shop']."'"));
$bauvat1=mysql_fetch_array(mysql_query("SELECT * FROM `vongquaybauvat` WHERE `id`='1'"));
$bauvat6=mysql_fetch_array(mysql_query("SELECT * FROM `vongquaybauvat` WHERE `id`='6'"));

$bauvat3=mysql_fetch_array(mysql_query("SELECT * FROM `vongquaybauvat` WHERE `id`='3'"));

?>
<style>
.play {
    display: block;
    padding: 0;
}
.mm {
    display: inline-block;
    height: 50px;
    width: 50px;
    background-color: #4646ab;
    color: #FF0000;
    transition: all 0.5s ease 0s;
    text-align: center;
    line-height: 30px;
    font-size: 25px;
	border:4px solid #000;
	margin: 10px;
}
.mm.active {
	border-color: green blue red gold;
    transition: all 0.5s ease 0s;
    font-size: 28px;

}
.mm.m1 {
    left: 25px;
    top: 25px;
	
}
.mm.m2 {
    left: 100px;
    top: 25px;
}
.mm.m3 {
    left: 179px;
    top: 25px;
}
.mm.m4 {
    left: 179px;
    top: 100px;
}
.mm.m5 {
    left: 173px;
    top: 167px;
}
.mm.m6 {
    left: 100px;
    top: 173px;
}
.mm.m7 {
	    left: 25px;
    top: 173px;

}
.mm.m8 {
		    left: 25px;
    top: 100px;

}
.box {
	    box-shadow: 0px 0px 8px purple;
}

</style>
<script type="text/javascript">
  window.onload = function(){
    setTimeout("switch_Image()", 1000);
  }
  var current = 1;
  var num_image = 4;
  function switch_Image(){
      current++;
      document.images['image'].src ='/icon/skin/' + current + '.png';
     if(current < num_image){
       setTimeout("switch_Image()", 1000);
     }else if(current == num_image){
       current = 0;
       setTimeout("switch_Image()", 1000);
     }
 }
m = 2;
b = 8;
m_reset = 8;
        function wheel(d, c)
        {
            var f = 8*3 + c;
            setTimeout(function() {
				if(m >1)
				m_reset = m-1;
			else 
				m_reset = 8;
				$('.m'+m_reset).removeClass('active');
                $('.m'+m).addClass('active');
                m++;
                b++;
				if(m ==9)
					m = 1;
                if (b < f)
                    wheel(d, c);  
}
}
</script>


<div class="phdr">Quay Báu Vật</div>
<?php
switch($act){
	default:
echo'<div class="omenu"><center>Bạn đang có <font color="red">'.$vequay['soluong'].'</font> Vé Quay</br>(*) Khi nhấn quay, vui lòng đợi hệ thống xử lý .</center></div>';

?>
<center>

<div id="dataquay"></div><div class="menu">
<?php 

	
echo'<form name="postquay" id="postquay" method="post">
<ul class="play">
    <li class="mm m1 box"><font size="1">'.$bauvat1['ten'].'</font></li>
    <li class="mm m2 box"><div class="ducnghia_trai"><span class="ducnghia_trai_hien">'.$shop2['tenvatpham'].'</span><img src="/images/vatpham/'.$shop2['id'].'.png" width="25"/></div>
</li>
    <li class="mm m3 box"><font size="1">'.$bauvat3['ten'].'</font></li>
	<div>
    <li class="mm m8 box"><div class="ducnghia_ngang"><span class="ducnghia_ngang_hien">'.$shop4['tenvatpham'].'</span><img src="/images/shop/'.$shop4['id'].'.png"/></div></li><input type="submit" name="okquay" style="margin-top:20px;    margin-right: 11px;
    margin-left: 20px; width: 56.43px" value="Quay"></form>';

echo'	
    <li class="mm m4 box"><div class="ducnghia_trai"><span class="ducnghia_trai_hien">'.$shop5['tenvatpham'].'</span><img src="/images/shop/'.$shop5['id'].'.png" width="45"/></div></li>
	</div>
    <li class="mm m7 box"><div class="ducnghia_ngang"><span class="ducnghia_ngang_hien">'.$bauvat6['ten'].'</span><img src="https://i.imgur.com/B1MTo0E.png" width="45"/></div></li>
    <li class="mm m6 box"><div class="ducnghia_trai"><span class="ducnghia_trai_hien">'.$shop7['tenvatpham'].' </span><img src="/images/shop/'.$shop7['id'].'.png" width="45"/></div></li>
    <li class="mm m5 box active"><div class="ducnghia_"><span class="ducnghia_hien">Các vật phẩm ngẫu nhiên, có thể ra set Chiến Binh Thép</span>?</div></li>
	<div class="result"></div>
</ul><b><font color="blue">Vé quay nhận được từ quà Online...</font></b>
</center>';
if ($datauser['rights']>=9){
echo'<div class="phdr">Khu vực Admin</div>';


echo'<div class="omenu"><a href="?act=edit&id=4">Chỉnh sửa '.$shop4['tenvatpham'].' </a></br>
<a href="?act=edit&id=5">Chỉnh sửa '.$shop5['tenvatpham'].' </a></br>
<a href="?act=edit&id=7">Chỉnh sửa '.$shop7['tenvatpham'].' </a></br>
<a href="?act=editxu&id=1">Chỉnh sửa xu </a></br>
<a href="?act=editluong&id=3">Chỉnh sửa lượng</a></br>
<a href="?act=editvp&id=2">Chỉnh sửa '.$shop2['tenvatpham'].' </a></br><a href="?act=editcard&id=6">Chỉnh sửa '.$bauvat6['ten'].' </a></br></div>';
}
break;
case 'edit':
if ($datauser['rights']>=9){


$id=$_GET[id];
$item=mysql_fetch_array(mysql_query("SELECT * FROM `vongquaybauvat` WHERE `id`='".$id."'"));
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$item[id_shop]."'"));
  $xyz=mysql_num_rows(mysql_query("SELECT * FROM `vongquaybauvat` WHERE `id`='".$id."'"));
if($xyz<=0){header('location: /');}
if ($id ==1 or $id ==2 or $id ==3 or $id ==6){header('location: /');}

if (isset($_POST[submit])) {
@mysql_query("UPDATE `vongquaybauvat` SET
`id_shop`='".(int)$_POST[id_shop]."'


WHERE `id`='".$id."'
");


echo '<div class="omenu">Edit thành công! </div>';
}
echo '<img src="/images/shop/'.$shop['id'].'.png"> (ID:'.$shop['id'].') ';
echo '<form method="post">';


echo 'Vật phẩm: <select name="id_shop">';
$qs=mysql_query("SELECT * FROM `shopdo` WHERE `hienthi`='1'");
while ($show=mysql_fetch_array($qs)) {
echo '<option value="'.$show[id].'">'.$show[id].' '.$show[tenvatpham].'</option>';
}
echo '</select><br/>';
echo '<input type="submit" name="submit" value="Lưu">';
echo '</form>';
}
break;
case 'editxu':
if ($datauser['rights']>=9){


$id=1;
$item=mysql_fetch_array(mysql_query("SELECT * FROM `vongquaybauvat` WHERE `id`='".$id."'"));
  $xyz=mysql_num_rows(mysql_query("SELECT * FROM `vongquaybauvat` WHERE `id`='".$id."'"));
if($xyz<=0){header('location: /');}


if (isset($_POST[submit])) {
@mysql_query("UPDATE `vongquaybauvat` SET
`id_shop`='".(int)$_POST[xu]."',
`ten`='".$_POST[ten]."'



WHERE `id`='".$id."'
");


echo '<div class="omenu">Edit thành công! </div>';
}
echo''.$item['ten'].' - '.number_format($item['id_shop']).' xu';
echo '<form method="post">';

echo 'Tên: <input type="text" name="ten" value="'.$item['ten'].'" > <br/>';

echo 'Xu: <input type="number" name="xu"  value="'.$item['id_shop'].'" > Xu<br/>';

echo '<input type="submit" name="submit" value="Lưu">';
echo '</form>';
}
break;
case 'editluong':
if ($datauser['rights']>=9){


$id=3;
$item=mysql_fetch_array(mysql_query("SELECT * FROM `vongquaybauvat` WHERE `id`='".$id."'"));
  $xyz=mysql_num_rows(mysql_query("SELECT * FROM `vongquaybauvat` WHERE `id`='".$id."'"));
if($xyz<=0){header('location: /');}


if (isset($_POST[submit])) {
@mysql_query("UPDATE `vongquaybauvat` SET
`id_shop`='".(int)$_POST[luong]."',
`ten`='".$_POST[ten]."'



WHERE `id`='".$id."'
");


echo '<div class="omenu">Edit thành công! </div>';
}
echo''.$item['ten'].' - '.number_format($item['id_shop']).' lượng';
echo '<form method="post">';

echo 'Tên: <input type="text" name="ten" value="'.$item['ten'].'" > <br/>';

echo 'Lượng: <input type="number" name="luong"  value="'.$item['id_shop'].'"> Lượng<br/>';

echo '<input type="submit" name="submit" value="Lưu">';
echo '</form>';
}
break;
case 'editvp':
if ($datauser['rights']>=9){


$id=2;
$item=mysql_fetch_array(mysql_query("SELECT * FROM `vongquaybauvat` WHERE `id`='".$id."'"));
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE `id`='".$item[id_shop]."'"));
  $xyz=mysql_num_rows(mysql_query("SELECT * FROM `vongquaybauvat` WHERE `id`='".$id."'"));
if($xyz<=0){header('location: /');}

if (isset($_POST[submit])) {
@mysql_query("UPDATE `vongquaybauvat` SET
`id_shop`='".(int)$_POST[id_shop]."'


WHERE `id`='".$id."'
");


echo '<div class="omenu">Edit thành công! </div>';
}
echo '<img src="/images/vatpham/'.$shop['id'].'.png"> (ID:'.$shop['id'].') ';
echo '<form method="post">';


echo 'Vật phẩm: <select name="id_shop">';
$qs=mysql_query("SELECT * FROM `shopvatpham`");
while ($show=mysql_fetch_array($qs)) {
echo '<option value="'.$show[id].'">'.$show[id].' '.$show[tenvatpham].'</option>';
}
echo '</select><br/>';
echo '<input type="submit" name="submit" value="Lưu">';
echo '</form>';
}
break;
case 'editcard':
if ($datauser['rights']>=9){


$id=6;
$item=mysql_fetch_array(mysql_query("SELECT * FROM `vongquaybauvat` WHERE `id`='".$id."'"));
  $xyz=mysql_num_rows(mysql_query("SELECT * FROM `vongquaybauvat` WHERE `id`='".$id."'"));
if($xyz<=0){header('location: /');}


if (isset($_POST[submit])) {
@mysql_query("UPDATE `vongquaybauvat` SET
`id_shop`='".(int)$_POST[card]."',
`ten`='".$_POST[ten]."'



WHERE `id`='".$id."'
");


echo '<div class="omenu">Edit thành công! </div>';
}
echo''.$item['ten'].' - '.number_format($item['id_shop']).' VNĐ';
echo '<form method="post">';

echo 'Tên: <input type="text" name="ten" value="'.$item['ten'].'"> <br/>';

echo 'Mệnh giá: <input type="number" name="card"  value="'.$item['id_shop'].'"> VNĐ<br/>';

echo '<input type="submit" name="submit" value="Lưu">';
echo '</form>';
}
}

require '../incfiles/end.php';

?>