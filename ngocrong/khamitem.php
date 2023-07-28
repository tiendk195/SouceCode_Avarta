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

echo'<div class="phdr">Làng Ngọc Rồng > NPC > Cadic > Khảm đá</div>';
switch($act) {
default:




echo'<div class="gd_"><div class="pmenu"><center><form method="post">';

echo'<select name="loai" onchange="location = this.options[this.selectedIndex].value;"><option value="?"> Chọn vật phẩm Khảm </option>';
$e=mysql_query("SELECT * FROM `ngocrong_khamda`  ORDER BY `id`");
while($s=mysql_fetch_array($e)){
     $checktoc=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE  `id_shop`='{$s['id_shop']}' AND `user_id`='".$user_id."' "));
    $toc=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE  `id`='{$s['id_shop']}' ")); 

if ($checktoc>0){
   echo'<option '.($type==$s['id'] ?'selected="selected"':'').' value="?act=ghepda&id='.$s['id'].'"> '.$toc['tenvatpham'].'</option>';
}
}
echo'</select></form></center></div></div>';
 

break;
case 'ghepda':
    
       $vatpham = $id;
if(empty($vatpham)){
header('location: /');
}
$check=mysql_num_rows(mysql_query("SELECT * FROM `ngocrong_khamda` WHERE `id`='".$vatpham."'"));

if($check < 1){
                		    echo'<script>alert("Lỗi không có vật phẩm này!!");</script>';
}else{


     
     
     
  

     $info = mysql_fetch_array(mysql_query("SELECT * FROM `ngocrong_khamda` WHERE `id`='".$vatpham."'"));
 $kttoc=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE  `id_shop`='{$info['id_shop']}' AND `user_id`='".$user_id."' "));

 $checktoc=mysql_fetch_array(mysql_query("SELECT * FROM `khodo` WHERE  `id_shop`='{$info['id_shop']}' AND `user_id`='".$user_id."' "));

        $toc=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE  `id`='{$info['id_shop']}' "));
        $khotoc=mysql_fetch_array(mysql_query("SELECT * FROM `khodo` WHERE `user_id`= '{$user_id}' AND `id_shop`='{$info['id_shop']}' "));
     $kham = mysql_fetch_array(mysql_query("SELECT * FROM `ngocrong_khamda` WHERE `id`='".$vatpham."'"));
        if ($checktoc['sao']>=0 && $checktoc['sao']<=3){
            $khamda=$info['khamda1'];
           }
           if ($checktoc['sao']>=4 && $checktoc['sao']<=8){
                        $khamda=$info['khamda2'];

        }
                   if ($checktoc['sao']>=9 && $checktoc['sao']<=12){
                           $khamda=$info['khamda3'];

        }
                           if ($checktoc['sao']>=13 && $checktoc['sao']<=15){
                     $khamda=$info['khamda4'];

                 }
                           if ($checktoc['sao']>=16){
                     $khamda=$info['khamda5'];

            }
        
        $davp=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE  `id_shop`='{$khamda}' AND `user_id`='{$user_id}' "));
        $dasvp=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE  `id`='{$khamda}' "));
        $davun=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE  `id_shop`='285' AND `user_id`='{$user_id}' "));
        $baohiemso=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE  `id_shop`='314' AND `user_id`='{$user_id}' "));
        $baohiemtrung=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE  `id_shop`='315' AND `user_id`='{$user_id}' "));
        $baohiemcao=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE  `id_shop`='316' AND `user_id`='{$user_id}' "));

   if ($kttoc<1){
            echo'<script>alert("Lỗi, bạn chưa sở hữa item này!!");</script>';
            	header('Location: /ngocrong');
            	exit;

   }
   echo'<div id="khamda"></div>';
  
  
   
echo'<div class="gd_"><table width="100%" border="0" cellspacing="0"><tbody><tr class=""><td width="20%"><center>
<font size="1" color="red"><b>'.$toc['tenvatpham'].'</font></b></br>
<font size="1" color="white" style="text-shadow: 0 0 0.2em #0de7ff, 0 0 0.2em #0de7ff,  0 0 0.2em #0de7ff"><b>'.$khotoc['sao'].' ✩ </b></font>
<font color="red"><b>></font></b>
<font size="1" color="white" style="text-shadow: 0 0 0.2em #9932CC, 0 0 0.2em #9932CC,  0 0 0.2em #9932CC"><b>'.($khotoc['sao']+1).' ✩</font></b></br>

<br>
<div style="border: 1px solid #A9E2F3;background-color: #7e959c;margin:2px 0;padding:5px;border-radius:5px;width:48px;height:48px;">
<img src="/images/'.$toc['loai'].'-ok-lt/'.$toc['id_loai'].'.png"></div></br>
<font color="red"><b>↓</b></font></br>
<div style="border: 1px solid #EAF6FC;background-color: #EAF6FC;margin:0px 0;padding:5px;border-radius:5px;width:auto;height:auto;">
<font size="1" color="white" style="text-shadow: 0 0 0.2em #9932CC, 0 0 0.2em #9932CC,  0 0 0.2em #9932CC"><b>
Tăng giới hạn nâng cấp lên '.($khotoc['sao']+1).' cấp
</b></font></br>
<font  size="1"  color="red">SM: '.$khotoc['sucmanh'].' -> '.($khotoc['sucmanh']+100).'</br>
HP: '.$khotoc['hp'].' -> '.($khotoc['hp']+100).'</br></font></div>
</center></td><td width="80%"><div class="pmenu">';





echo'<div class="kevach"><table width="100%" border="0" cellspacing="0"><tbody><tr class=""><td width="20%"><center><img src="/images/vatpham/'.$khamda.'.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px;width:48px;height:48px;">

</br><font size="1" color="white" style="text-shadow: 0 0 0.2em #9932cc, 0 0 0.2em #9932cc,  0 0 0.2em #9932cc"><b>'.$kham['da'].'/'.$davp['soluong'].'</br>'.$dasvp['tenvatpham'].'</font></b></center></td>';

echo'<td width="20%">
<center><img src="/images/vatpham/'.$davun['id_shop'].'.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px;width:48px;height:48px;" >

</br><font size="1" color="white" style="text-shadow: 0 0 0.2em #9932cc, 0 0 0.2em #9932cc,  0 0 0.2em #9932cc"><b>'.$kham['davun'].'/'.$davun['soluong'].'</br>Mảnh đá vụn</font></b></center></td>';
echo'</center></td></tr></tbody></table></div>';
    if ($checktoc['sao']>=4 && $checktoc['sao']<=8){
$baohiem=$baohiemso;
}
           if ($checktoc['sao']>=9 && $checktoc['sao']<=12){
$baohiem=$baohiemtrung;
}
if ($checktoc['sao']>=13){
$baohiem=$baohiemcao;
}

if ($checktoc['sao']>=4){
echo'<div class="kevach"><center><font size="1" color="white" style="text-shadow: 0 0 0.2em #9932CC, 0 0 0.2em #9932CC,  0 0 0.2em #9932CC"><b>
Khi trong rương có Bảo hiểm, hệ thống sẽ tự động sử dụng để tránh rớt ✩
</b></font></center><table width="100%" border="0" cellspacing="0"><tbody><tr class=""><td width="20%"><center>';
echo'<img src="/images/vatpham/'.$baohiem['id_shop'].'.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px;width:48px;height:48px;" >
';


echo'</br><font size="1" color="white" style="text-shadow: 0 0 0.2em #9932cc, 0 0 0.2em #9932cc,  0 0 0.2em #9932cc"><b>'.$baohiem['soluong'].'/1</font></b></center></td>';

echo'</center></td></tr></tbody></table></div>';
}
echo'</br><center><input type="submit" value="Khảm đá" onclick="khamda('.$kham['id'].')"></center>';


echo'</div>';

echo'</div>';



echo'</td></tr></tbody></table></div>';

    
}
}
    
include'../incfiles/end.php';


?>
<script>


function khamda(id)
{
    $.ajax(
        {
            url : 'npc_cadic.php?khamda',
            data : {id : id},
            type : 'POST',
            success : function(d)
            {
                $("#khamda").html(d);
            }
        }
        
        );
}





</script>
