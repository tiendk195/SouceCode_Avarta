<?php

define('_IN_JOHNCMS', 1);

require_once ("../incfiles/core.php");
$vatpham = $id;
if(empty($vatpham)){
                		    echo'<script>alert("Vật phẩm không tồn tại!!");</script>';
exit;
    
}
$check = mysql_num_rows(mysql_query("SELECT * FROM `ssm_quathuong` WHERE `id`='".$vatpham."'"));
if($check < 1){
                		    echo'<script>alert("Vật phẩm không tồn tại!!");</script>';
                		    exit;
}

$p=mysql_fetch_array(mysql_query("SELECT * FROM `ssm_quathuong` WHERE `id`='".$vatpham."'"));
if ($p['id_loai']!='0'){
    
if ($p['loai']=='vatpham'){
$ssm=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE `id`='".$p['id_loai']."'"));
$mota=$ssm['thongtin'];
$tenvp=$ssm['tenvatpham'];
$img='<img src="/images/vatpham/'.$p['id_loai'].'.png">';


} 
if ($p['loai']=='do'){
  $ssm=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$p['id_loai']."'"));
  $tenvp=$ssm['tenvatpham'];
$img='<img src="/images/shop/'.$p['id_loai'].'.png">';

}  


 
echo'
<div class="gd_"><div class="pmenu"><table width="100%" border="0" cellspacing="0"><tbody><tr class="">

<td width="20%"><div style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:5px;border-radius:5px;width:48px;height:48px;"><center>';

echo''.$img.'';

echo'<br>';
if ($p['loai']=='vatpham'){

echo'<font size="1" color="white" style="text-shadow: 0 0 0.2em #ff6633, 0 0 0.2em #ff6633,  0 0 0.2em #ff6633"><b>'.$p['soluong'].'</b></font>';
}

echo'
</center></div></td>
<td width="80%"><font color="green">'.$tenvp.'</font><br>
'.$mota.'';
$ssm=mysql_fetch_array(mysql_query("SELECT * FROM `ssm_user` WHERE `user_id`='".$user_id."'"));
$tt2=mysql_fetch_array(mysql_query("SELECT * FROM `ssm_thuong_user` WHERE `user_id`='".$user_id."' AND `level` = '".$vatpham."' "));

if ($ssm['level']>=$p['id'] && $tt2['nhanthuong']==0){

echo'</br><input onclick="nhanthuong_('.$p['id'].')" type="submit" value="Nhận thưởng">';
}
echo'</td>';



echo'</tr></tbody></table>';

echo'</div></div>';

}
 else {
     echo'<div class="gd_"><div class="pmenu"><table width="100%" border="0" cellspacing="0"><tbody><tr class="">

<td width="20%"><img src="images/level/'.$p['id'].'.png" style="border: 3px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:0px;border-radius:10px;"></td>
<td width="80%">Level '.$p['id'].' ở SSM thường không có phần thưởng. Hãy đến mở SSM VIP nào ~~</td> 

</tr></tbody></table></div></div>';
 }
?>