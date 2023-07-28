<?php
header('Content-Type: text/html; charset="utf-8');
define('_IN_JOHNCMS', 1);
require_once('../incfiles/core.php');
if (!$user_id) {
header('Location: /index.php');
exit;
}
?>
<script type="text/javascript">
$(document).ready(function(){
	$('#btn-quay').click(function(){
		var idvp = $('#idvp').val();
		var typequay=$('select option:selected').val();
		var url = "nangcap-load.php";
		var data = {"quay": "", "idvp": idvp, "type": typequay};
		$('#content-load').load(url, data);
		return false;
	});
});
</script>
<?php
$tqs=mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='12'");
$nqs=mysql_num_rows($tqs);
$pqs=mysql_fetch_array($tqs);
$id=(int)$_POST[idvp];



$check = mysql_result(mysql_query("select count(*) from `khodo` where `id` = '".$id."'"),0);
if ($check<1) {
header('Location: /');
exit;

} else {
$item=mysql_fetch_array(mysql_query("SELECT * FROM `khodo` WHERE `id`='".$id."'"));
$lethinh_dz=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='60'"));
$soluong = $lethinh_dz['soluong'];
$do_lethinh = mysql_fetch_array(mysql_query("SELECT * FROM khodo WHERE id = '".$id."'"));
$do = $do_lethinh;

if (isset($_POST[quay])) {
if ($do['cong']<20){
    $rand=rand(1,2);

}
if ($do['cong']>=20){
    $rand=rand(1,5);

}
if ($do['conghp']<20){
    $rand=rand(1,2);

}
if ($do['conghp']>=20){
    $rand=rand(1,5);

}
$type=(int)$_POST[type];


$xu = 50000;
$da = 10;



if ($type!=1&&$type!=2&&$type!=3) {
echo '<div class="omenu">NoNo...!!!!</div>';
} else {
if ($type==1) {
    echo'<center>';
     if($check < 1){
echo'<div class="omenu">Lỗi ID đồ không tồn tại</div>';
	 } else if ($do['cong'] >=50){
		 echo'<div class="omenu">Đồ đã đạt cấp tối đa</div>';

} else if ($do['user_id']!= $user_id) {
    echo'<div class="omenu">Đồ này không phải của bạn </div>';
} else  if ($xu > $datauser['xu']) 
{
    echo'<div class="omenu">Bạn không đủ xu hoặc đá nâng cấp</div>'; 
    
}  else if($da > $soluong){ 
    echo'<div class="omenu">Bạn không đủ xu hoặc đá nâng cấp</div>'; 
    
} 
else {
      mysql_query("UPDATE `users` SET `xu`=`xu`-'$xu' WHERE `id`='".$user_id."'");
                mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'$da' WHERE `user_id`='".$user_id."' AND `id_shop` = '60'");




/////
if ($rand==1) {
$tc=$do['cong']+'1';

    $congsm=150;

  
   
                mysql_query("UPDATE `khodo` SET `sucmanh`=`sucmanh`+'$congsm' ,`cong` = `cong`+'1' WHERE `id`='".$id."'"); 
        $checknv2=mysql_num_rows(mysql_query("SELECT * FROM `nhiemvu_user` WHERE `user_id`='".$user_id."' AND `id_nv`='15'"));
if ($checknv2>0) {
mysql_query("UPDATE `nhiemvu_user` SET `tiendo`=`tiendo`+'1' WHERE `user_id`='".$user_id."' AND `id_nv`='15'");
}
        $bot='chúc mừng [red]'.$datauser['name'].'[/red] vừa nâng cấp [blue]'.$do['tenvatpham'].'[/blue] [green] [+'.$tc.'][/green]';
                mysql_query("INSERT INTO `wnew` SET
`user` = '2',
`time` = '".time()."',
`text` = '".$bot."'
");
//mysql_query("INSERT INTO `guest` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
        echo'<div class="omenu">Nâng cấp SM [+'.$tc.'] thành công. </div>';

} else {
$mayman=rand(1,2);
if ($mayman==1) {
$all=mysql_fetch_array(mysql_query("SELECT max(id) FROM `shopdo`"));  
$rando=rand(1,$all['max(id)']);
$checkrand=mysql_num_rows(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$rando."'"));
if ($checkrand<1) {
echo '<div class="omenu">Nâng cấp thất bại!</div>';
} else {
    /*
$cross=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$rando."'"));
$ngay=rand(1,3);
$time=$ngay*24*3600+time();
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$cross[loai]."',
`id_loai`='".$cross[id_loai]."',
`tenvatpham`='".$cross[tenvatpham]."',
`id_shop`='".$cross[id]."',
`timesudung`='".$time."'
");
*/
echo '<div class="omenu">Nâng cấp thất bại!</div>';
}
} else {
echo '<div class="omenu">Nâng cấp thất bại!</div>';
}
}
}
echo'</center>';
} else if ($type==2) {
    echo'<center>';

 if($check < 1){
echo'<div class="omenu">Lỗi ID đồ không tồn tại</div>';
	 } else if ($do['conghp'] >=50){
		 echo'<div class="omenu">Đồ đã đạt cấp tối đa</div>';
} else if ($do['user_id']!= $user_id) {
    echo'<div class="omenu">Đồ này không phải của bạn </div>';
} else  if ($xu > $datauser['xu']) 
{
    echo'<div class="omenu">Bạn không đủ xu hoặc đá nâng cấp</div>'; 
    
}  else if($da > $soluong){ 
    echo'<div class="omenu">Bạn không đủ xu hoặc đá nâng cấp</div>'; 
    
} 
else {
      mysql_query("UPDATE `users` SET `xu`=`xu`-'$xu' WHERE `id`='".$user_id."'");
                mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'$da' WHERE `user_id`='".$user_id."' AND `id_shop` = '60'");




/////
if ($rand==1) {
$tc=$do['conghp']+'1';

    $conghp=150;


                mysql_query("UPDATE `khodo` SET `hp`=`hp`+'$conghp' ,`conghp` = `conghp`+'1' WHERE `id`='".$id."'"); 
                $checknv2=mysql_num_rows(mysql_query("SELECT * FROM `nhiemvu_user` WHERE `user_id`='".$user_id."' AND `id_nv`='15'"));
if ($checknv2>0) {
mysql_query("UPDATE `nhiemvu_user` SET `tiendo`=`tiendo`+'1' WHERE `user_id`='".$user_id."' AND `id_nv`='15'");
}
             $bot='chúc mừng [red]'.$datauser['name'].'[/red] vừa nâng cấp [blue]'.$do['tenvatpham'].'[/blue] [green] [+'.$tc.'][/green]';
                mysql_query("INSERT INTO `wnew` SET
`user` = '2',
`time` = '".time()."',
`text` = '".$bot."'
");   
        echo'<div class="omenu">Nâng cấp HP [+'.$tc.'] thành công. </div>';

} else {
$mayman=rand(1,2);
if ($mayman==1) {
$all=mysql_fetch_array(mysql_query("SELECT max(id) FROM `shopdo`"));  
$rando=rand(1,$all['max(id)']);
$checkrand=mysql_num_rows(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$rando."'"));
if ($checkrand<1) {
echo '<div class="omenu">Nâng cấp thất bại!</div>';
} else {
   
echo '<div class="omenu">Nâng cấp thất bại!</div>';

}
} else {
echo '<div class="omenu">Nâng cấp thất bại!</div>';
}
}
}
} 
echo'</center>';

}

}
echo'<form method="post">';


echo '<input type="hidden" id="idvp" name="idvp" value="'.$id.'">
';

echo'<center><div class="omenu"><b><img src="/images/shop/'.$do['id_shop'].'.png"><br><b><font color="green">[ '.$do['tenvatpham'].' ]</font></b></b></br>
<font color="red">Tăng HP: '.number_format($do[hp]).' [ +'.$do[conghp ].' ]</font><br>
<font color="blue">Tăng sức mạnh: '.number_format($do[sucmanh]).'  [ +'.$do[cong ].' ]</font> <br>

Cần : <b> '.number_format($xu).' xu , '.$da.' đá nâng cấp </b></br>';


    echo'<select name="type">
<option '.($type==1?'selected="selected"':'').' value="1"> Nâng Cấp SM</option>
<option '.($type==2?'selected="selected"':'').' value="2"> Nâng Cấp HP</option>
</select>';






echo'</br></br><button id="btn-quay" name="quay"> Nâng cấp </button></form></center>';
echo'<div class="omenu">';
echo'<b><font color="red"><b>Bạn đang có '.number_format($soluong).' đá cường hóa</b></br>';
echo' </div>';
}
?>