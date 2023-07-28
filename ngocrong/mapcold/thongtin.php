<?php

define('_IN_JOHNCMS', 1);
$rootpath='../../';

require_once ("../../incfiles/core.php");


$p = mysql_fetch_array(mysql_query("SELECT * FROM `ngocrong_cold` WHERE `id` = '$id'"));
$n=mysql_num_rows(mysql_query("SELECT * FROM `ngocrong_cold` WHERE `id`='".$id."'"));
IF($n<1){
Header('Location: /');
Exit;
}


    
   echo'<div class="gd_npc"><center><font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000">'.$p['tenboss'].' - HP: '.$p['hp'].'/'.$p['hpfull'].'</font><br>
<font size="1" color="white" style="text-shadow: 0 0 0.2em #ff6633, 0 0 0.2em #ff6633,  0 0 0.2em #ff6633">'.$p['mota'].'</font><br>
<form method="post"><input onclick="danh('.$id.')" type="submit" name="submit" value="Đánh"></form>
<center></center></center></div>';

?>
