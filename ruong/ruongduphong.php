<?php


define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
$lng_profile = core::load_lng('profile');



require('../incfiles/head.php');


echo'<div class="phdr">Rương dự phòng của '.$datauser['name'].' </div>';
include "hienthido.php";

switch($act) {
default:


//MOD AO By DUCNGHIA

?> 
 <center><table><tbody><tr><td>
   <div class=ducnghia_ngang><div class=ducnghia_item><?=$ao?><?=$thongtin_ao?>  </div></div><br>
  <div class=ducnghia_ngang><div class=ducnghia_item> <?=$quan?>  <?=$thongtin_quan?>  </div></div><br>
   <div class=ducnghia_ngang><div class=ducnghia_item> <?=$canh?> <?=$thongtin_canh?></div></div><br>
   <div class=ducnghia_ngang><div class=ducnghia_item> <?=$thucung?> <?=$thongtin_thucung ?> </div></div></td>
   
   <td><center><div class=ducnghia_><div class=ducnghia_item> <?=$haoquang?> <?=$thongtin_haoquang?> 

   </div></div>
   <div class=ducnghia_><div class=ducnghia_item> <?=$matna?> <?=$thongtin_matna?> </div></div>
 <br></br>
   <?php
   echo' <div style="width:150px;background-color:white;">';
  
//echo'<img src="https://i.imgur.com/qSADbLt.png" weigth="25" height="25">';
echo'  <div style="text-align: center;"><br><small>'.$datauser[name].'</small><br> <br> </div>';


echo'<img  src="/avatar/'.$datauser[id].'.png" width="45" height="48"/> <br>';
echo'<b><font color="red">HP <span>'.number_format($datauser['hp']).'/'.number_format($datauser['hpfull']).'<font></font></span><font><br><font color="blue">SM <span>'.number_format($datauser['sucmanh']).'<br></span></font></font></font></b>';
echo'</div>';



   ?>
   
   

   
<div class=ducnghia_><div class=ducnghia_item> <?=$kinh?>  <?=$thongtin_kinh?> </div></div>
<div class=ducnghia_><div class=ducnghia_item> <?=$khuonmat?> <?=$thongtin_khuonmat?> </div> </div></center></td>





<td><div class=ducnghia_trai><div class=ducnghia_item> <?=$toc?>  <?=$thongtin_toc?> </div> </div><br>
<div class=ducnghia_trai><div class=ducnghia_item> <?=$mat?>  <?=$thongtin_mat?> </div> </div><br>
<div class=ducnghia_trai><div class=ducnghia_item> <?=$non?>  <?=$thongtin_non?>   </div> </div> <br>
<div class=ducnghia_trai><div class=ducnghia_item> <?=$docamtay?> <?=$thongtin_docamtay?>    </div></div></div></td></tr>





</tbody>


</table>


<?php

echo'</label>';
echo'<a href="?act=dung"><input id="button" type="button" name="button" value="Sử dụng"></a></br>';
break;
case 'dung':
$info = mysql_fetch_array(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='{$user_id}' AND `loai` = 'ao'"));
    mysql_query("UPDATE `users` SET `{$info['loai']}`='".$info['id_loai']."' WHERE `id`='".$user_id."'");
    mysql_query("UPDATE `dangmac` SET `id_ruong`='".$info['id_ruong']."', `id_loai` = '".$info['id_loai']."',`timesudung`='".$info['timesudung']."'  WHERE `user_id`='".$user_id."' AND `loai`='".$info['loai']."'");
    mysql_query("UPDATE `ruongduphong` SET `id_loai`='',`id_ruong`='',`timesudung`='' WHERE `user_id`='".$user_id."' AND `loai`='".$info['loai']."'");
    //
    $info = mysql_fetch_array(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='{$user_id}' AND `loai` = 'quan'"));
    mysql_query("UPDATE `users` SET `{$info['loai']}`='".$info['id_loai']."' WHERE `id`='".$user_id."'");
    mysql_query("UPDATE `dangmac` SET `id_ruong`='".$info['id_ruong']."', `id_loai` = '".$info['id_loai']."',`timesudung`='".$info['timesudung']."'  WHERE `user_id`='".$user_id."' AND `loai`='".$info['loai']."'");
    mysql_query("UPDATE `ruongduphong` SET `id_loai`='',`id_ruong`='',`timesudung`='' WHERE `user_id`='".$user_id."' AND `loai`='".$info['loai']."'");
    //
    $info = mysql_fetch_array(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='{$user_id}' AND `loai` = 'canh'"));
    mysql_query("UPDATE `users` SET `{$info['loai']}`='".$info['id_loai']."' WHERE `id`='".$user_id."'");
    mysql_query("UPDATE `dangmac` SET `id_ruong`='".$info['id_ruong']."', `id_loai` = '".$info['id_loai']."',`timesudung`='".$info['timesudung']."'  WHERE `user_id`='".$user_id."' AND `loai`='".$info['loai']."'");
    mysql_query("UPDATE `ruongduphong` SET `id_loai`='',`id_ruong`='',`timesudung`='' WHERE `user_id`='".$user_id."' AND `loai`='".$info['loai']."'");
    //
    $info = mysql_fetch_array(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='{$user_id}' AND `loai` = 'docamtay'"));
    mysql_query("UPDATE `users` SET `{$info['loai']}`='".$info['id_loai']."' WHERE `id`='".$user_id."'");
    mysql_query("UPDATE `dangmac` SET `id_ruong`='".$info['id_ruong']."', `id_loai` = '".$info['id_loai']."',`timesudung`='".$info['timesudung']."'  WHERE `user_id`='".$user_id."' AND `loai`='".$info['loai']."'");
    mysql_query("UPDATE `ruongduphong` SET `id_loai`='',`id_ruong`='',`timesudung`='' WHERE `user_id`='".$user_id."' AND `loai`='".$info['loai']."'");
    //
    $info = mysql_fetch_array(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='{$user_id}' AND `loai` = 'thucung'"));
    mysql_query("UPDATE `users` SET `{$info['loai']}`='".$info['id_loai']."' WHERE `id`='".$user_id."'");
    mysql_query("UPDATE `dangmac` SET `id_ruong`='".$info['id_ruong']."', `id_loai` = '".$info['id_loai']."',`timesudung`='".$info['timesudung']."'  WHERE `user_id`='".$user_id."' AND `loai`='".$info['loai']."'");
    mysql_query("UPDATE `ruongduphong` SET `id_loai`='',`id_ruong`='',`timesudung`='' WHERE `user_id`='".$user_id."' AND `loai`='".$info['loai']."'");
    //
    $info = mysql_fetch_array(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='{$user_id}' AND `loai` = 'haoquang'"));
    mysql_query("UPDATE `users` SET `{$info['loai']}`='".$info['id_loai']."' WHERE `id`='".$user_id."'");
    mysql_query("UPDATE `dangmac` SET `id_ruong`='".$info['id_ruong']."', `id_loai` = '".$info['id_loai']."',`timesudung`='".$info['timesudung']."'  WHERE `user_id`='".$user_id."' AND `loai`='".$info['loai']."'");
    mysql_query("UPDATE `ruongduphong` SET `id_loai`='',`id_ruong`='',`timesudung`='' WHERE `user_id`='".$user_id."' AND `loai`='".$info['loai']."'");
    //
    $info = mysql_fetch_array(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='{$user_id}' AND `loai` = 'matna'"));
    mysql_query("UPDATE `users` SET `{$info['loai']}`='".$info['id_loai']."' WHERE `id`='".$user_id."'");
    mysql_query("UPDATE `dangmac` SET `id_ruong`='".$info['id_ruong']."', `id_loai` = '".$info['id_loai']."',`timesudung`='".$info['timesudung']."'  WHERE `user_id`='".$user_id."' AND `loai`='".$info['loai']."'");
    mysql_query("UPDATE `ruongduphong` SET `id_loai`='',`id_ruong`='',`timesudung`='' WHERE `user_id`='".$user_id."' AND `loai`='".$info['loai']."'");
    //
    $info = mysql_fetch_array(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='{$user_id}' AND `loai` = 'kinh'"));
    mysql_query("UPDATE `users` SET `{$info['loai']}`='".$info['id_loai']."' WHERE `id`='".$user_id."'");
    mysql_query("UPDATE `dangmac` SET `id_ruong`='".$info['id_ruong']."', `id_loai` = '".$info['id_loai']."',`timesudung`='".$info['timesudung']."'  WHERE `user_id`='".$user_id."' AND `loai`='".$info['loai']."'");
    mysql_query("UPDATE `ruongduphong` SET `id_loai`='',`id_ruong`='',`timesudung`='' WHERE `user_id`='".$user_id."' AND `loai`='".$info['loai']."'");
    //
    $info = mysql_fetch_array(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='{$user_id}' AND `loai` = 'khuonmat'"));
    mysql_query("UPDATE `users` SET `{$info['loai']}`='".$info['id_loai']."' WHERE `id`='".$user_id."'");
    mysql_query("UPDATE `dangmac` SET `id_ruong`='".$info['id_ruong']."', `id_loai` = '".$info['id_loai']."',`timesudung`='".$info['timesudung']."'  WHERE `user_id`='".$user_id."' AND `loai`='".$info['loai']."'");
    mysql_query("UPDATE `ruongduphong` SET `id_loai`='',`id_ruong`='',`timesudung`='' WHERE `user_id`='".$user_id."' AND `loai`='".$info['loai']."'");
    //
    $info = mysql_fetch_array(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='{$user_id}' AND `loai` = 'toc'"));
    mysql_query("UPDATE `users` SET `{$info['loai']}`='".$info['id_loai']."' WHERE `id`='".$user_id."'");
    mysql_query("UPDATE `dangmac` SET `id_ruong`='".$info['id_ruong']."', `id_loai` = '".$info['id_loai']."',`timesudung`='".$info['timesudung']."'  WHERE `user_id`='".$user_id."' AND `loai`='".$info['loai']."'");
    mysql_query("UPDATE `ruongduphong` SET `id_loai`='',`id_ruong`='',`timesudung`='' WHERE `user_id`='".$user_id."' AND `loai`='".$info['loai']."'");
    //
    $info = mysql_fetch_array(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='{$user_id}' AND `loai` = 'mat'"));
    mysql_query("UPDATE `users` SET `{$info['loai']}`='".$info['id_loai']."' WHERE `id`='".$user_id."'");
    mysql_query("UPDATE `dangmac` SET `id_ruong`='".$info['id_ruong']."', `id_loai` = '".$info['id_loai']."',`timesudung`='".$info['timesudung']."'  WHERE `user_id`='".$user_id."' AND `loai`='".$info['loai']."'");
    mysql_query("UPDATE `ruongduphong` SET `id_loai`='',`id_ruong`='',`timesudung`='' WHERE `user_id`='".$user_id."' AND `loai`='".$info['loai']."'");
    //
        $info = mysql_fetch_array(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='{$user_id}' AND `loai` = 'non'"));
    mysql_query("UPDATE `users` SET `{$info['loai']}`='".$info['id_loai']."' WHERE `id`='".$user_id."'");
    mysql_query("UPDATE `dangmac` SET `id_ruong`='".$info['id_ruong']."', `id_loai` = '".$info['id_loai']."',`timesudung`='".$info['timesudung']."'  WHERE `user_id`='".$user_id."' AND `loai`='".$info['loai']."'");
    mysql_query("UPDATE `ruongduphong` SET `id_loai`='',`id_ruong`='',`timesudung`='' WHERE `user_id`='".$user_id."' AND `loai`='".$info['loai']."'");
        //
        $info = mysql_fetch_array(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='{$user_id}' AND `loai` = 'nensau'"));
    mysql_query("UPDATE `users` SET `{$info['loai']}`='".$info['id_loai']."' WHERE `id`='".$user_id."'");
    mysql_query("UPDATE `dangmac` SET `id_ruong`='".$info['id_ruong']."', `id_loai` = '".$info['id_loai']."',`timesudung`='".$info['timesudung']."'  WHERE `user_id`='".$user_id."' AND `loai`='".$info['loai']."'");
    mysql_query("UPDATE `ruongduphong` SET `id_loai`='',`id_ruong`='',`timesudung`='' WHERE `user_id`='".$user_id."' AND `loai`='".$info['loai']."'");
    header('Location: ruongduphong.php');
       //
        $info = mysql_fetch_array(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='{$user_id}' AND `loai` = 'cancau'"));
    mysql_query("UPDATE `users` SET `{$info['loai']}`='".$info['id_loai']."' WHERE `id`='".$user_id."'");
    mysql_query("UPDATE `dangmac` SET `id_ruong`='".$info['id_ruong']."', `id_loai` = '".$info['id_loai']."',`timesudung`='".$info['timesudung']."'  WHERE `user_id`='".$user_id."' AND `loai`='".$info['loai']."'");
    mysql_query("UPDATE `ruongduphong` SET `id_loai`='',`id_ruong`='',`timesudung`='' WHERE `user_id`='".$user_id."' AND `loai`='".$info['loai']."'");
    header('Location: ruongduphong.php');

}

require_once('../incfiles/end.php');
