<?php

define('_IN_JOHNCMS', 1);
$rootpath='../../';

require_once ("../../incfiles/core.php");

     $info = mysql_fetch_array(mysql_query("SELECT * FROM `giakimthuat_user` WHERE `user_id`='".$user_id."'"));
     if ($info['uocnguyen']>=0 && $info['uocnguyen']<5){
         $img=0;
     }
  if ($info['uocnguyen']>=5 && $info['uocnguyen']<10){
         $img=5;
     } 
     if ($info['uocnguyen']>=10 && $info['uocnguyen']<15){
         $img=10;
     }
     if ($info['uocnguyen']>=15 && $info['uocnguyen']<20){
         $img=15;
     }
       if ($info['uocnguyen']>=20 && $info['uocnguyen']<25){
         $img=20;
     }
       if ($info['uocnguyen']>=25 && $info['uocnguyen']<30){
         $img=25;
     }
       if ($info['uocnguyen']>=30 && $info['uocnguyen']<35){
         $img=30;
     }
       if ($info['uocnguyen']>=35 && $info['uocnguyen']<40){
         $img=35;
     }
       if ($info['uocnguyen']>=40 && $info['uocnguyen']<45){
         $img=40;
     }
       if ($info['uocnguyen']>=45 && $info['uocnguyen']<50){
         $img=45;
     }
       if ($info['uocnguyen']>=50 && $info['uocnguyen']<55){
         $img=50;
     }
       if ($info['uocnguyen']>=55 && $info['uocnguyen']<60){
         $img=55;
     }
       if ($info['uocnguyen']>=60 && $info['uocnguyen']<65){
         $img=60;
     }
       if ($info['uocnguyen']>=65 && $info['uocnguyen']<70){
         $img=65;
     }
       if ($info['uocnguyen']>=70 && $info['uocnguyen']<75){
         $img=70;
     }
       if ($info['uocnguyen']>=75 && $info['uocnguyen']<80){
         $img=75;
     }
       if ($info['uocnguyen']>=80 && $info['uocnguyen']<85){
         $img=80;
     }
       if ($info['uocnguyen']>=85 && $info['uocnguyen']<90){
         $img=85;
     }
       if ($info['uocnguyen']>=90 && $info['uocnguyen']<95){
         $img=90;
     }
       if ($info['uocnguyen']>=95 && $info['uocnguyen']<100){
         $img=95;
     }
       if ($info['uocnguyen']>=100 ){
         $img=100;
     }
     
     

echo'<center><div class="ducnghia_"><img src="img/'.$img.'.png"><span class="ducnghia_hien">Số lần ước nguyện: '.$info['uocnguyen'].'</span></div>
<br></center>';


//
?>