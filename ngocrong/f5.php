<?php

define('_IN_JOHNCMS', 1);

require_once ("../incfiles/core.php");

$nro = mysql_fetch_array(mysql_query("SELECT * FROM `ngocrong_uoc` WHERE `time`>'0' "));
$n=mysql_num_rows(mysql_query("SELECT * FROM `ngocrong_uoc` WHERE `time`>'0'"));
if ($n <1){
    echo'<center>
<img onclick="uocrong('.$user_id.')" src="img/tuongrong.png"> </center>';
} else {
    

if ($nro['user_id']==$user_id){
echo'<center><img  onclick="uocrong('.$user_id.')" src="https://i.imgur.com/53ekXS6.gif" width="160" height="210" style="position:absolute;margin:-150px 0 0 -90px"><center>';
   
    
} else {
  echo'<center><img  onclick="cuoprong('.$user_id.')" src="https://i.imgur.com/53ekXS6.gif" width="160" height="210" style="position:absolute;margin:-150px 0 0 -90px"><center></br></br></br></br>';
  
}
}

?>
