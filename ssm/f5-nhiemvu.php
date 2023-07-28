<?php

define('_IN_JOHNCMS', 1);

require_once ("../incfiles/core.php");



$e=mysql_query("SELECT * FROM `ssm_nhiemvu_user` WHERE `user_id`= '".$user_id."' ORDER BY `id`");
$p=mysql_fetch_array(mysql_query("SELECT * FROM `ssm_user` WHERE `user_id`='".$user_id."'"));

while($s=mysql_fetch_array($e)){
        if ($s['kichhoat']==1){

$res=mysql_fetch_array(mysql_query("SELECT * FROM `ssm_nhiemvu` WHERE `id`='".$s['id_shop']."'"));
if ($s['nhanthuong']==1){
echo'<div class="pmenu"><table width="100%" border="0" cellspacing="0"><tbody><tr class="">
<td width="20%"><img src="images/loai_nhiemvu/'.$res['loainv'].'.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:0px;border-radius:5px;"></td>
<td width="60%"><font size="1" color="white" style="text-shadow: 0 0 0.2em #9932CC, 0 0 0.2em #9932CC,  0 0 0.2em #9932CC"><b> <i class="fa fa-check"></i> </b></font> '.$res['tennhiemvu'].' <br>
Thời gian hết hạn: <font color="red">'.date("d/m/Y - H:i", $s['timeketthuc']).'</font>
<form method="post"></form>
</td>
<td width="20%"></td>
</tr></tbody></table></div>';
} else {

echo'<div class="pmenu"><table width="100%" border="0" cellspacing="0"><tbody><tr class="">
<table width="100%" border="0" cellspacing="0"><tbody><tr class="">
<td width="20%"><img src="images/loai_nhiemvu/'.$res['loainv'].'.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:0px;border-radius:5px;"></td>
<td width="60%"> '.$res['tennhiemvu'].' (<font color="green">'.$s['tiendo'].'</font>/<b><font color="red">'.$res['hoanthanh'].'</font></b>) <br>
Thời gian hết hạn: <font color="red"> '.date("d/m/Y - H:i", $s['timeketthuc']).'</font>';

if ($s['tiendo']>=$res['hoanthanh']){

echo'</br><input onclick="nt('.$s['id'].')" type="submit" value="Nhận thưởng">';
}
echo'
</td>';

echo'<td width="20%">';
if ($s['tiendo']<$res['hoanthanh']){


echo'
<table width="100%" border="0" cellspacing="0"><tbody><tr class="">
<td width="80%"><center>
<div style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:5px;border-radius:5px;width:48px;height:48px;"><span style=" float: right;"><font size="1" onclick="refresh(1795)" color="white" style="text-shadow: 0 0 0.2em #3399ff, 0 0 0.2em #3399ff,  0 0 0.2em #3399ff"><b> <img src="/images/vatpham/284.png"><br>'.$res['vemayman'].'</b></font></span></div></center></td>
<td width="20%"><font size="3" onclick="hoanthanh('.$s['id'].')" color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><b> <i class="fa fa-check-circle"></i> </b></font></td>
</tr></tbody></table>';
}
echo'
</td></tr></tbody></table></div>';
}
}
}

?>