<?php

date_default_timezone_set('Asia/Ho_Chi_Minh');
$time2 = date('H');
$dg = mysql_query("SELECT * FROM `chotroi` WHERE `timetreoban` < '".time()."' AND `timetreoban` !='0'");
while($check = mysql_fetch_array($dg)){ 



	if ($check[loaivp]=='do') {
				$text='<b><font color="000000"> Đơn hàng <img src="/images/shop/'.$check[id_shop].'.png"> ['.$check[tenvatpham].'] bị hủy do quá thời hạn</font>';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$check[user_id]."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");

mysql_query("INSERT INTO `khodo` SET
`user_id`='".$check[user_id]."',
`tenvatpham`='".$check[tenvatpham]."',
`id_loai`='".$check[id_loai]."',
`cong`='".$check[cong]."',
`conghp`='".$check[conghp]."',
`sucmanh`='".$check[sucmanh]."',
`hp`='".$check[hp]."',
`sao`='".$check[sao]."',

`id_shop`='".$check[id_shop]."',
`loai`='".$check[loai]."'
");

} else if($check[loaivp]=='vatpham') {
				$text='<b><font color="000000"> Đơn hàng <img src="/images/vatpham/'.$check[id_shop].'.png"> ['.$check[tenvatpham].'] bị hủy do quá thời hạn</font>';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$check[user_id]."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$check[soluong]."' WHERE `user_id`='".$check[user_id]."' AND `id_shop`='".$check[id_shop]."'");
}
mysql_query("DELETE FROM `chotroi` WHERE `id`='".$check['id']."'");

}
   if (time()>=$datauser['timeaicap']+15*60) {
       mysql_query("UPDATE `users` SET `zombie`='0' WHERE `id`='{$user_id}'");

   }
   /*
//ninja
$resetnj = mysql_fetch_array(mysql_query("SELECT * FROM `tho_ninja`  "));
   if (time()>=$resetnj['time']+10*60) {

      mysql_query("UPDATE `tho_ninja` SET `time`='".time()."' ,`hp`='".$resetnj['hpfull']."',`mp`='".$resetnj['mpfull']."' ");
}
$resetnj2 = mysql_fetch_array(mysql_query("SELECT * FROM `ech_ninja`  "));
   if (time()>=$resetnj2['time']+10*60) {

      mysql_query("UPDATE `ech_ninja` SET `time`='".time()."' ,`hp`='".$resetnj2['hpfull']."',`mp`='".$resetnj2['mpfull']."' ");
}

$resetnj3 = mysql_fetch_array(mysql_query("SELECT * FROM `sen_ninja`  "));
   if (time()>=$resetnj3['time']+10*60) {

      mysql_query("UPDATE `sen_ninja` SET `time`='".time()."' ,`hp`='".$resetnj3['hpfull']."',`mp`='".$resetnj3['mpfull']."' ");
}
$resetnj4 = mysql_fetch_array(mysql_query("SELECT * FROM `chim_ninja`  "));
   if (time()>=$resetnj4['time']+10*60) {

      mysql_query("UPDATE `chim_ninja` SET `time`='".time()."' ,`hp`='".$resetnj4['hpfull']."',`mp`='".$resetnj4['mpfull']."' ");
}
$resetnj4 = mysql_fetch_array(mysql_query("SELECT * FROM `doi_ninja`  "));
   if (time()>=$resetnj4['time']+10*60) {

      mysql_query("UPDATE `doi_ninja` SET `time`='".time()."' ,`hp`='".$resetnj4['hpfull']."',`mp`='".$resetnj4['mpfull']."' ");
}
$resetnj4 = mysql_fetch_array(mysql_query("SELECT * FROM `soixanh_ninja`  "));
   if (time()>=$resetnj4['time']+10*60) {

      mysql_query("UPDATE `soixanh_ninja` SET `time`='".time()."' ,`hp`='".$resetnj4['hpfull']."',`mp`='".$resetnj4['mpfull']."' ");
}
*/
$resetnj4 = mysql_fetch_array(mysql_query("SELECT * FROM `soido_ninja`  "));
   if (time()>=$resetnj4['time']+10*60) {

      mysql_query("UPDATE `soido_ninja` SET `time`='".time()."' ,`hp`='".$resetnj4['hpfull']."',`mp`='".$resetnj4['mpfull']."' ");
}
//ngọc rồng
$vatpham=mysql_num_rows(mysql_query("SELECT * FROM `shopvatpham` WHERE `loai`='ngocrong'"));
$all=mysql_fetch_array(mysql_query("SELECT max(id) FROM `shopvatpham` WHERE `loai`='ngocrong'"));  

$ix=280;
while ($ix<=283) {
$vatpham_check_x=mysql_num_rows(mysql_query("SELECT * FROM `ngocrong_chucnang` WHERE `user_id`='".$user_id."' AND `loai`='".$ix."'"));
if ($vatpham_check_x<1) {
mysql_query("INSERT INTO `ngocrong_chucnang` SET `user_id`='".$user_id."', `loai`='".$ix."'");
}
$ix++;
}
//ssm_vip_user
//ssm_nv

$vatpham=mysql_num_rows(mysql_query("SELECT * FROM `ssm_quavip`"));
$all=mysql_fetch_array(mysql_query("SELECT max(id) FROM `ssm_quavip`"));  

$ix=1;
while ($ix<=$all['max(id)']) {
$vatpham_check_x=mysql_num_rows(mysql_query("SELECT * FROM `ssm_vip_user` WHERE `user_id`='".$user_id."' AND `level`='".$ix."'"));
$res=mysql_fetch_array(mysql_query("SELECT * FROM `ssm_quavip` WHERE `id`='".$ix."'"));

if ($vatpham_check_x<1) {
mysql_query("INSERT INTO `ssm_vip_user` SET `user_id`='".$user_id."', `level`='".$ix."' ");
}
$ix++;
}

//ssm_nv
//ssm_nv

$vatpham=mysql_num_rows(mysql_query("SELECT * FROM `ssm_quathuong`"));
$all=mysql_fetch_array(mysql_query("SELECT max(id) FROM `ssm_quathuong`"));  

$ix=1;
while ($ix<=$all['max(id)']) {
$vatpham_check_x=mysql_num_rows(mysql_query("SELECT * FROM `ssm_thuong_user` WHERE `user_id`='".$user_id."' AND `level`='".$ix."'"));
$res=mysql_fetch_array(mysql_query("SELECT * FROM `ssm_quathuong` WHERE `id`='".$ix."'"));

if ($vatpham_check_x<1) {
mysql_query("INSERT INTO `ssm_thuong_user` SET `user_id`='".$user_id."', `level`='".$ix."' ");
}
$ix++;
}

//ssm_nv

$vatpham=mysql_num_rows(mysql_query("SELECT * FROM `ssm_nhiemvu`"));
$all=mysql_fetch_array(mysql_query("SELECT max(id) FROM `ssm_nhiemvu`"));  

$ix=1;
while ($ix<=$all['max(id)']) {
$vatpham_check_x=mysql_num_rows(mysql_query("SELECT * FROM `ssm_nhiemvu_user` WHERE `user_id`='".$user_id."' AND `id_shop`='".$ix."'"));
$res=mysql_fetch_array(mysql_query("SELECT * FROM `ssm_nhiemvu` WHERE `id`='".$ix."'"));

if ($vatpham_check_x<1) {
mysql_query("INSERT INTO `ssm_nhiemvu_user` SET `user_id`='".$user_id."', `id_shop`='".$ix."', `ngaynv` ='".$res['ngaynv']."' ");
}
$ix++;
}

//ssm
$nhac=mysql_query("SELECT * FROM `ssm_user` WHERE `user_id`='".$user_id."'");
$checknhac=mysql_num_rows($nhac);
if ($checknhac<1) {
  mysql_query("INSERT INTO `ssm_user` SET `user_id`='".$user_id."'");
}
//giả kim thuật
$nhac=mysql_query("SELECT * FROM `giakimthuat_user` WHERE `user_id`='".$user_id."'");
$checknhac=mysql_num_rows($nhac);
if ($checknhac<1) {
  mysql_query("INSERT INTO `giakimthuat_user` SET `user_id`='".$user_id."'");
}
/*
//tang thap
$nhac=mysql_query("SELECT * FROM `tangthap_users` WHERE `user_id`='".$user_id."'");
$checknhac=mysql_num_rows($nhac);
if ($checknhac<1) {
  mysql_query("INSERT INTO `tangthap_users` SET `user_id`='".$user_id."'");
}
*/
//nhac
$nhac=mysql_query("SELECT * FROM `nhac_user` WHERE `users`='".$user_id."'");
$checknhac=mysql_num_rows($nhac);
if ($checknhac<1) {
  mysql_query("INSERT INTO `nhac_user` SET `users`='".$user_id."'");
}
///reset nv hằng ngày
$nvhn=mysql_query("SELECT * FROM `timenhiemvuhn` WHERE `user_id`='".$user_id."'");
$checknvhn=mysql_num_rows($nvhn);
if ($checknvhn<1) {
  mysql_query("INSERT INTO `timenhiemvuhn` SET `user_id`='".$user_id."'");
}
/*
$nvhn1=mysql_query("SELECT * FROM `timenhiemvuhnkpah` WHERE `user_id`='".$user_id."'");
$checknvhn1=mysql_num_rows($nvhn1);
if ($checknvhn1<1) {
  mysql_query("INSERT INTO `timenhiemvuhnkpah` SET `user_id`='".$user_id."'");
}
/*
//lang ninja
$nvhnnn=mysql_query("SELECT * FROM `timenhiemvuhnninja` WHERE `user_id`='".$user_id."'");
$checknvhnnn=mysql_num_rows($nvhnnn);
if ($checknvhnnn<1) {
  mysql_query("INSERT INTO `timenhiemvuhnninja` SET `user_id`='".$user_id."'");
}
$checkin = mysql_fetch_array(mysql_query("SELECT * FROM `tuininja` WHERE `user_id`='{$user_id}'"));
    if (time()>=$checkin['timebuff']) {
             mysql_query("UPDATE `tuininja` SET `mp`=`mp` - `mpbuff`, `hp`=`hp` - `hpbuff`,`dame`=`dame` - `damebuff`,`phongthu`=`phongthu` - `phongthubuff`  WHERE `user_id`='{$user_id}'");

                     mysql_query("UPDATE `tuininja` SET `mpbuff`='0',`hpbuff`='0',`damebuff`='0' ,`nguoibuff`='0' ,`phongthubuff`='0'    WHERE `user_id`='{$user_id}'");

    }

    $level=$checkin['lv']*2000;
if ($checkin['exp']>=$level){
        $lv=$checkin['lv']+1;
mysql_query("UPDATE `tuininja` SET `hp`=`hp`+'500',`hpfull`=`hpfull`+'500' WHERE `user_id`='{$user_id}'");
mysql_query("UPDATE `tuininja` SET `mp`=`mp`+'250',`mpfull`=`mpfull`+'250' WHERE `user_id`='{$user_id}'");
mysql_query("UPDATE `tuininja` SET `tiemnang`=`tiemnang`+'5',`diemkinang`= `diemkinang` +'1' WHERE `user_id`='{$user_id}'");

mysql_query("UPDATE `tuininja` SET `lv`='".$lv."' WHERE `user_id`='{$user_id}'");
mysql_query("UPDATE `tuininja` SET `exp`=`exp`-'".$level."' WHERE `user_id`='{$user_id}'");
    }
           if ($checkin['lv']>=2){

    	    $checknv=mysql_num_rows(mysql_query("SELECT * FROM `nhiemvuninja_user` WHERE `user_id`='".$user_id."' AND `id_nv`='13'")); 
    	    if ($checknv>0) { 
    	        mysql_query("UPDATE `nhiemvuninja_user` SET `tiendo`=`tiendo`+'1' WHERE `user_id`='".$user_id."' AND `id_nv`='13'"); 
    	        
    	    }
           }
               if ($checkin['lv']>=5){

    	    $checknv=mysql_num_rows(mysql_query("SELECT * FROM `nhiemvuninja_user` WHERE `user_id`='".$user_id."' AND `id_nv`='14'")); 
    	    if ($checknv>0) { 
    	        mysql_query("UPDATE `nhiemvuninja_user` SET `tiendo`=`tiendo`+'1' WHERE `user_id`='".$user_id."' AND `id_nv`='14'"); 
    	        
    	    }
           }
               if ($checkin['lv']>=10){

    	    $checknv=mysql_num_rows(mysql_query("SELECT * FROM `nhiemvuninja_user` WHERE `user_id`='".$user_id."' AND `id_nv`='15'")); 
    	    if ($checknv>0) { 
    	        mysql_query("UPDATE `nhiemvuninja_user` SET `tiendo`=`tiendo`+'1' WHERE `user_id`='".$user_id."' AND `id_nv`='15'"); 
    	        
    	    }
           }
               if ($checkin['lv']>=15){

    	    $checknv=mysql_num_rows(mysql_query("SELECT * FROM `nhiemvuninja_user` WHERE `user_id`='".$user_id."' AND `id_nv`='16'")); 
    	    if ($checknv>0) { 
    	        mysql_query("UPDATE `nhiemvuninja_user` SET `tiendo`=`tiendo`+'1' WHERE `user_id`='".$user_id."' AND `id_nv`='16'"); 
    	        
    	    }
           }
               if ($checkin['lv']>=30){

    	    $checknv=mysql_num_rows(mysql_query("SELECT * FROM `nhiemvuninja_user` WHERE `user_id`='".$user_id."' AND `id_nv`='17'")); 
    	    if ($checknv>0) { 
    	        mysql_query("UPDATE `nhiemvuninja_user` SET `tiendo`=`tiendo`+'1' WHERE `user_id`='".$user_id."' AND `id_nv`='17'"); 
    	        
    	    }
           }
               if ($checkin['lv']>=50){

    	    $checknv=mysql_num_rows(mysql_query("SELECT * FROM `nhiemvuninja_user` WHERE `user_id`='".$user_id."' AND `id_nv`='18'")); 
    	    if ($checknv>0) { 
    	        mysql_query("UPDATE `nhiemvuninja_user` SET `tiendo`=`tiendo`+'1' WHERE `user_id`='".$user_id."' AND `id_nv`='18'"); 
    	        
    	    }
           }
               if ($checkin['lv']>=70){

    	    $checknv=mysql_num_rows(mysql_query("SELECT * FROM `nhiemvuninja_user` WHERE `user_id`='".$user_id."' AND `id_nv`='19'")); 
    	    if ($checknv>0) { 
    	        mysql_query("UPDATE `nhiemvuninja_user` SET `tiendo`=`tiendo`+'1' WHERE `user_id`='".$user_id."' AND `id_nv`='19'"); 
    	        
    	    }
           }
               if ($checkin['lv']>=100){

    	    $checknv=mysql_num_rows(mysql_query("SELECT * FROM `nhiemvuninja_user` WHERE `user_id`='".$user_id."' AND `id_nv`='20'")); 
    	    if ($checknv>0) { 
    	        mysql_query("UPDATE `nhiemvuninja_user` SET `tiendo`=`tiendo`+'1' WHERE `user_id`='".$user_id."' AND `id_nv`='20'"); 
    	        
    	    }
           }
           
       if ($checkin['lv']>=5){
                   mysql_query("UPDATE `tuininja` SET `tienhoa`='1' WHERE `user_id`='{$user_id}'");

       }
          if ($checkin['lv']>=10){
                   mysql_query("UPDATE `tuininja` SET `tienhoa`='2' WHERE `user_id`='{$user_id}'");

       }
          if ($checkin['lv']>=20){
                   mysql_query("UPDATE `tuininja` SET `tienhoa`='3' WHERE `user_id`='{$user_id}'");

       }
          if ($checkin['lv']>=30){
                   mysql_query("UPDATE `tuininja` SET `tienhoa`='4' WHERE `user_id`='{$user_id}'");

       }
          if ($checkin['lv']>=50){
                   mysql_query("UPDATE `tuininja` SET `tienhoa`='5' WHERE `user_id`='{$user_id}'");

       }
          if ($checkin['lv']>=60){
                   mysql_query("UPDATE `tuininja` SET `tienhoa`='6' WHERE `user_id`='{$user_id}'");

       }
          if ($checkin['lv']>=80){
                   mysql_query("UPDATE `tuininja` SET `tienhoa`='7' WHERE `user_id`='{$user_id}'");

       }
          if ($checkin['lv']>=90){
                   mysql_query("UPDATE `tuininja` SET `tienhoa`='8' WHERE `user_id`='{$user_id}'");

       }
          if ($checkin['lv']>=150){
                   mysql_query("UPDATE `tuininja` SET `tienhoa`='9' WHERE `user_id`='{$user_id}'");

       }
            if ($checkin['lv']>=300){
                   mysql_query("UPDATE `tuininja` SET `tienhoa`='10' WHERE `user_id`='{$user_id}'");

       }
         
       
*/


//viewthongbao
//ngoc rong

$resetnr = mysql_fetch_array(mysql_query("SELECT * FROM `ngocrong_uoc` WHERE `time`>'0' "));
   if (time()>=$resetnr['time']+5*60) {
       mysql_query("DELETE FROM `ngocrong_uoc`");

}
//reset lễ đường
$resetld = mysql_fetch_array(mysql_query("SELECT * FROM `leduong` WHERE `time`>'0' "));
   if (time()>=$resetld['time']+60*60) {
       mysql_query("DELETE FROM `leduong`");
      mysql_query("UPDATE `users` SET `viewleduong`='0' ");

}
//cau ca
//check time thung rac
 $trc=mysql_query("SELECT * FROM `timecaucamap` WHERE `user_id`='".$user_id."'");
$checktrc=mysql_num_rows($trc);
if ($checktrc<1) {
  mysql_query("INSERT INTO `timecaucamap` SET `user_id`='".$user_id."'");
} 
///reset cau ca map
$resettrc = mysql_fetch_array(mysql_query("SELECT * FROM `timecaucamap` WHERE `user_id` = '".$user_id."' AND `time`>'0' "));
   if (time()>=$resettrc['time']+30*60) {

      mysql_query("UPDATE `timecaucamap` SET `time`='0'  WHERE `user_id` = '".$user_id."'");
}
/*
//Khi phach anh hung
$resetkp = mysql_fetch_array(mysql_query("SELECT * FROM `buom_kpah`  "));
   if (time()>=$resetkp['time']+10*60) {

      mysql_query("UPDATE `buom_kpah` SET `time`='".time()."' ,`hp`='".$resetkp['hpfull']."' ");
}
$resetkp2 = mysql_fetch_array(mysql_query("SELECT * FROM `rua_kpah`  "));
   if (time()>=$resetkp2['time']+10*60) {

      mysql_query("UPDATE `rua_kpah` SET `time`='".time()."' ,`hp`='".$resetkp2['hpfull']."' ");
}
$resetkp3 = mysql_fetch_array(mysql_query("SELECT * FROM `totoro_kpah`  "));
   if (time()>=$resetkp3['time']+10*60) {

      mysql_query("UPDATE `totoro_kpah` SET `time`='".time()."' ,`hp`='".$resetkp3['hpfull']."' ");
}
$resetkp4 = mysql_fetch_array(mysql_query("SELECT * FROM `thodan_kpah`  "));
   if (time()>=$resetkp4['time']+10*60) {

      mysql_query("UPDATE `thodan_kpah` SET `time`='".time()."' ,`hp`='".$resetkp4['hpfull']."' ");
}
*/
//check time thung rac
 $tr=mysql_query("SELECT * FROM `timethungrac` WHERE `user_id`='".$user_id."'");
$checktr=mysql_num_rows($tr);
if ($checktr<1) {
  mysql_query("INSERT INTO `timethungrac` SET `user_id`='".$user_id."'");
} 
///reset thung rac
$resettr = mysql_fetch_array(mysql_query("SELECT * FROM `timethungrac` WHERE `user_id` = '".$user_id."' AND `time`>'0' "));
   if (time()>=$resettr['time']+60*60*24) {
       mysql_query("DELETE FROM `thungrac` WHERE `user_id`='".$user_id."'");

      mysql_query("UPDATE `timethungrac` SET `time`='0'  WHERE `user_id` = '".$user_id."'");
}
//check boss tg
 $checkbosstg=mysql_query("SELECT * FROM `tgdanhbosstg` WHERE `user_id`='".$user_id."'");
$checkboss=mysql_num_rows($checkbosstg);
if ($checkboss<1) {
  mysql_query("INSERT INTO `tgdanhbosstg` SET `user_id`='".$user_id."'");
} 
//
 $checkbosstg2=mysql_query("SELECT * FROM `bossthegioi_boss` WHERE `user_id`='".$user_id."'");
$checkboss2=mysql_num_rows($checkbosstg2);
if ($checkboss2<1) {
  mysql_query("INSERT INTO `bossthegioi_boss` SET `user_id`='".$user_id."'");
} 
// reset số lần đánh boss tg2
$resetboss2 = mysql_fetch_array(mysql_query("SELECT * FROM `tgdanhbosstg` WHERE `user_id` = '".$user_id."' AND `time`>'0' "));
   if (time()>=$resetboss2['time']+6*60*60) {
	  $randbs=rand(10,50); 
	 $hpboss = 10000*$randbs;
//$hpboss= rand(1000000,3000000);
mysql_query("UPDATE `bossthegioi_boss` SET `hp`='".$hpboss."'  WHERE  `user_id`='".$user_id."'");

       
      mysql_query("UPDATE `tgdanhbosstg` SET `time`='0',`colenh`='0' WHERE `user_id` = '".$user_id."'");
    mysql_query("UPDATE `users` SET `solandanhboss`='0' WHERE `id` = '".$user_id."'");
}
   if (time()>=$datauser['timenamlinhchi']+15*60) {
       
    mysql_query("UPDATE `users` SET `namlinhchi`='0',`timenamlinhchi`='0'  WHERE `id` = '".$user_id."'");
}

//reset cau cá
$resetcauca = mysql_fetch_array(mysql_query("SELECT * FROM `tgcauca` WHERE `user_id` = '".$user_id."' AND `time`>'0' "));
   if (time()>=$resetcauca['time']+60*60*24) {
       
      mysql_query("UPDATE `tgcauca` SET `time`='0' WHERE `user_id` = '".$user_id."'");
    mysql_query("UPDATE `users` SET `solancauca1`='0', `solancauca2`='0', `solancauca3`='0' WHERE `id` = '".$user_id."'");
}
/*

$wboss22 = mysql_fetch_array(mysql_query("SELECT * FROM `wboss` WHERE `id` = '2022'"));
if ($wboss22['loaiboss']==1){
$ten='Naruto';
} 
if ($wboss22['loaiboss']==2){
$ten='Sasuke';
} 
if ($wboss22['loaiboss']==3){
$ten='Sakura';
} 
if ($wboss22['loaiboss']==4){
$ten='Gaara';
}
if ($wboss22['loaiboss']==5){
$ten='Hinata';
}
if ($wboss22['loaiboss']==6){
$ten='Itachi';
}
if ($wboss22['loaiboss']==7){
$ten='Obito';
}
if ($wboss22['loaiboss']==8){
$ten='Orochimaru';
}
if ($wboss22['loaiboss']==9){
$ten='Rockle';
}
if ($wboss22['loaiboss']==10){
$ten='Deidara';
}
mysql_query("UPDATE `wboss` SET `ten` = '".$ten."' WHERE `id` = '2022'");

$wboss2111 = mysql_fetch_array(mysql_query("SELECT * FROM `wboss` WHERE `id` = '2022'"));
$hpboss2111= rand(1000000,2000000);
$loaiboss= rand(1,10);

/*
   if (time()>=$wboss2111['time']+60*60) {
mysql_query("UPDATE `wboss` SET `hp`='".$hpboss2111."',`loaiboss`='".$loaiboss."', `time`='".time()."'  WHERE `id`='2022'");
$text = 'Boss Ninja School vừa xuất hiện tại khu <a href="/ninja/boss.php">Boss</a>. Tiêu diệt để nhận nhiều phần quà có giá trị';
$text2 = 'Boss Ninja School vừa xuất hiện tại khu [url=http://werfamily.tk/ninja/boss.php]Boss[/url]. Tiêu diệt để nhận nhiều phần quà có giá trị';

mysql_query("INSERT INTO `wnew` SET
`user` = '256',
`time` = '".time()."',
`text` = '".$text."'
");
mysql_query("INSERT INTO `guest` SET `user_id`='256', `text`='" . mysql_real_escape_string($text2) . "', `time`='".time()."'");

}


$wboss21 = mysql_fetch_array(mysql_query("SELECT * FROM `wboss` WHERE `id` = '2021'"));
if ($wboss21['loaiboss']==1){
$ten='Trúc Lâm Tự';
} 
if ($wboss21['loaiboss']==2){
$ten='Vô Cực Đạo';
} 
if ($wboss21['loaiboss']==3){
$ten='Hỏa Long Bang';
} 
if ($wboss21['loaiboss']==4){
$ten='Thủy Liên Viện';
}
if ($wboss21['loaiboss']==5){
$ten='Ma Chu Cốc';
}
mysql_query("UPDATE `wboss` SET `ten` = '".$ten."' WHERE `id` = '2021'");

$wboss211 = mysql_fetch_array(mysql_query("SELECT * FROM `wboss` WHERE `id` = '2021'"));
$hpboss211= rand(1000000,2000000);
$loaiboss= rand(1,5);

   if (time()>=$wboss211['time']+6*60*60) {
mysql_query("UPDATE `wboss` SET `hp`='".$hpboss211."',`loaiboss`='".$loaiboss."', `time`='".time()."'  WHERE `id`='2021'");
$text = 'Boss Ngũ Long Tranh Bá vừa xuất hiện tại khu <a href="/5ltb/npcboss.php">Boss</a>. Tiêu diệt để nhận nhiều phần quà có giá trị';
$text2 = 'Boss Ngũ Long Tranh Bá vừa xuất hiện tại khu [url=http://thitran9x.tk/5ltb/npcboss.php]Boss[/url]. Tiêu diệt để nhận nhiều phần quà có giá trị';

mysql_query("INSERT INTO `wnew` SET
`user` = '256',
`time` = '".time()."',
`text` = '".$text."'
");
mysql_query("INSERT INTO `guest` SET `user_id`='256', `text`='" . mysql_real_escape_string($text2) . "', `time`='".time()."'");

}


$wboss = mysql_fetch_array(mysql_query("SELECT * FROM `wboss` WHERE `id` = '10'"));

if ($wboss['loaiboss']==1){
$ten='Madara';
} 
if ($wboss['loaiboss']==2){
$ten='Sasuke';
} 
if ($wboss['loaiboss']==3){
$ten='Itachi';
} 
if ($wboss['loaiboss']==4){
$ten='Kakashi Anbu';
}
if ($wboss['loaiboss']==5){
$ten='Kakashi Chidori';
}
if ($wboss['loaiboss']==6){
$ten='Itachi Edo Tensei';
}
if ($wboss['loaiboss']==7){
$ten='Nagato';
}
if ($wboss['loaiboss']==8){
$ten='Tayuya';
}
if ($wboss['loaiboss']==9){
$ten='Danzo';
}
if ($wboss['loaiboss']==10){
$ten='Naruto';
}
mysql_query("UPDATE `wboss` SET `ten` = '".$ten."' WHERE `id` = '10'");
 
$wboss10 = mysql_fetch_array(mysql_query("SELECT * FROM `wboss` WHERE `id` = '10'"));
$hpboss10= rand(1000000,5000000);
$loaiboss= rand(1,10);

   if (time()>=$wboss10['time']+6*60*60) {
mysql_query("UPDATE `wboss` SET `hp`='".$hpboss10."',`loaiboss`='".$loaiboss."', `time`='".time()."'  WHERE `id`='10'");
$text = 'Boss Naruto vừa xuất hiện tại khu <a href="/app/wboss.php">Boss</a>. Tiêu diệt để nhận nhiều phần quà có giá trị';
$text2 = 'Boss Naruto vừa xuất hiện tại khu [url=http://thitran9x.tk/app/wboss.php]Boss[/url]. Tiêu diệt để nhận nhiều phần quà có giá trị';

mysql_query("INSERT INTO `wnew` SET
`user` = '256',
`time` = '".time()."',
`text` = '".$text."'
");
mysql_query("INSERT INTO `guest` SET `user_id`='256', `text`='" . mysql_real_escape_string($text2) . "', `time`='".time()."'");

}

$wboss15 = mysql_fetch_array(mysql_query("SELECT * FROM `wboss` WHERE `id` = '2019'"));
$hpboss= rand(1000000,5000000);

   if (time()>=$wboss15['time']+60*60) {

mysql_query("UPDATE `khuboss15` SET `boss`='0' WHERE `boss`='1'");
mysql_query("UPDATE `wboss` SET `hp`='".$hpboss."', `time`='".time()."'  WHERE `id`='2019'");
$text = 'Boss Nezuko vừa xuất hiện tại khu sự kiện, tìm và tiêu diệt ngay';
/*
mysql_query("INSERT INTO `wnew` SET
`user` = '256',
`time` = '".time()."',
`text` = '".$text."'
");
//mysql_query("INSERT INTO `guest` SET `user_id`='256', `text`='" . mysql_real_escape_string($text) . "', `time`='".time()."'");


}

$rand=rand(1,30);
$n=mysql_num_rows(mysql_query("SELECT * FROM `khuboss15` WHERE `boss`='1'"));
IF($n<1){

mysql_query("UPDATE `khuboss15` SET `boss`='1'  WHERE `id`='".$rand."'");

   }
   */
   
   //ketsat
    $ks=mysql_query("SELECT * FROM `ketsat` WHERE `user_id`='".$user_id."'");
$checkks=mysql_num_rows($ks);
if ($checkks<1) {
  mysql_query("INSERT INTO `ketsat` SET `user_id`='".$user_id."'");
} 
/*
   ///khu sinh nhat
   $randct=rand(1000000,9999999);
   $randkhu=rand(1,30);
    $sn=mysql_query("SELECT * FROM `khusinhnhat` WHERE `user_id`='".$user_id."'");
$checksn=mysql_num_rows($sn);
if ($checksn<1) {
  mysql_query("INSERT INTO `khusinhnhat` SET `khu`=  '".$randkhu."',`captcha`= '".$randct."', `user_id`='".$user_id."'");
} 
   $khusn = mysql_fetch_array(mysql_query("SELECT * FROM `khusinhnhat` WHERE `user_id`='".$user_id."'"));
/*
   if (time()>=$khusn['time']+60*60) {
mysql_query("UPDATE `khusinhnhat` SET `khu` = '".$randkhu."',`captcha`= '".$randct."',`nhan`='0', `time`='".time()."'  WHERE `user_id`='".$user_id."' ");
   }

//khu pokemon

   $randbosspk=rand(1,8);
   $randkhupk=rand(1,30);
    $pk=mysql_query("SELECT * FROM `khupokemon` WHERE `user_id`='".$user_id."'");
$checkpk=mysql_num_rows($pk);
if ($checkpk<1) {
  mysql_query("INSERT INTO `khupokemon` SET `khu`=  '".$randkhupk."',`loaiboss`= '".$randbosspk."', `user_id`='".$user_id."'");
} 
*/
//cauca 
if ($datauser['chisolevelca']>=100){
	mysql_query("UPDATE `users` SET `levelca`=`levelca` +'1' WHERE `id`='".$user_id."'");
	mysql_query("UPDATE `users` SET `chisolevelca`=`chisolevelca` -'100' WHERE `id`='".$user_id."'");
}
$checkca1=mysql_num_rows(mysql_query("SELECT * FROM `ca_ruong` WHERE `user_id`='".$user_id."' AND `id_ca`='1'"));
if ($checkca1<1) {
mysql_query("INSERT INTO `ca_ruong` SET `user_id`='".$user_id."', `id_ca`='1'");
}
$checkca2=mysql_num_rows(mysql_query("SELECT * FROM `ca_ruong` WHERE `user_id`='".$user_id."' AND `id_ca`='2'"));
if ($checkca2<1) {
mysql_query("INSERT INTO `ca_ruong` SET `user_id`='".$user_id."', `id_ca`='2'");
}
$checkca3=mysql_num_rows(mysql_query("SELECT * FROM `ca_ruong` WHERE `user_id`='".$user_id."' AND `id_ca`='3'"));
if ($checkca3<1) {
mysql_query("INSERT INTO `ca_ruong` SET `user_id`='".$user_id."', `id_ca`='3'");
}
$checkca4=mysql_num_rows(mysql_query("SELECT * FROM `ca_ruong` WHERE `user_id`='".$user_id."' AND `id_ca`='4'"));
if ($checkca4<1) {
mysql_query("INSERT INTO `ca_ruong` SET `user_id`='".$user_id."', `id_ca`='4'");
}
$checkca5=mysql_num_rows(mysql_query("SELECT * FROM `ca_ruong` WHERE `user_id`='".$user_id."' AND `id_ca`='5'"));
if ($checkca5<1) {
mysql_query("INSERT INTO `ca_ruong` SET `user_id`='".$user_id."', `id_ca`='5'");
}
$checkca6=mysql_num_rows(mysql_query("SELECT * FROM `ca_ruong` WHERE `user_id`='".$user_id."' AND `id_ca`='6'"));
if ($checkca6<1) {
mysql_query("INSERT INTO `ca_ruong` SET `user_id`='".$user_id."', `id_ca`='6'");
}
$checkca7=mysql_num_rows(mysql_query("SELECT * FROM `ca_ruong` WHERE `user_id`='".$user_id."' AND `id_ca`='7'"));
if ($checkca6<1) {
mysql_query("INSERT INTO `ca_ruong` SET `user_id`='".$user_id."', `id_ca`='7'");
}
//vongquaymm
$cuoc=200000;
$allcuoc=(mysql_num_rows(mysql_query("SELECT * FROM `vxmm` WHERE `cuoc` = '".$cuoc."'"))*$cuoc);

IF(mysql_num_rows(mysql_query("SELECT * FROM `vxmm` WHERE `time`<'".time()."'")) > 0){

	$o=mysql_num_rows(mysql_query("SELECT * FROM `vxmm`"));
$idvx=rand(1,$o);
	$m=mysql_fetch_assoc(mysql_query("SELECT `user_id` FROM `vxmm` WHERE `stt`='".$idvx."'"));
	$n=$m[user_id];
	$idvxmm=$n;
	mysql_query("UPDATE `users` SET `xu`=`xu`+'".$allcuoc."' WHERE `id`='".$idvxmm."'");
	$z=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$idvxmm."'"));

	$bot='Xin chúc mừng @'.$z[id].' đã thắng [b]'.number_format($allcuoc).'[/b] xu trong Vòng quay may mắn!';

	mysql_query("INSERT INTO `guest` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");

	mysql_query("INSERT INTO `wnew` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
	mysql_query("DELETE FROM `vxmm`");
	}

   
//Tài xỉu
$ttx = mysql_result(mysql_query("SELECT * FROM `cuoctaixiu`"),0);
if($ttx > 0){
$kq = mysql_fetch_array(mysql_query("SELECT * FROM `taixiu` WHERE `id`='1'"));
if($kq['time'] < time()){
$r1 = rand(1,6);
$r2 = rand(1,6);
$r3 = rand(1,6);
mysql_query("UPDATE `taixiu` SET `1`='".$r1."',`2`='".$r2."',`3`='".$r3."' WHERE `id`='1'");

$kq=mysql_fetch_array(mysql_query("SELECT * FROM `taixiu` WHERE `id`='1'"));
$xxx=$kq[1]+$kq[2]+$kq[3];
if ($xxx<11) {
$hero='xiu';
$xxx='Xỉu';
} else {
$hero='tai';
$xxx='Tài';
}
$t=mysql_query("SELECT * FROM `cuoctaixiu` WHERE `taixiu`='".$hero."' ORDER BY `id` ");

while($h=mysql_fetch_array($t)) {
	$name=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$h[user_id]."'"));
$text2 = 'Chúc mừng các bạn đã chiến thắng tài xỉu: @'.($name['id']).' ';
mysql_query("INSERT INTO `guest` SET `user_id`='256', `text`='" . mysql_real_escape_string($text2) . "', `time`='".time()."'");

}

$t2=mysql_query("SELECT * FROM `cuoctaixiu` WHERE `taixiu`!='".$hero."' ORDER BY `id` ");

while($h2=mysql_fetch_array($t2)) {
	$name2=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$h2[user_id]."'"));
$text4 = 'Chia buồn các bạn đã thua tài xỉu: @'.($name2['id']).' ';
mysql_query("INSERT INTO `guest` SET `user_id`='256', `text`='" . mysql_real_escape_string($text4) . "', `time`='".time()."'");

}
	$text3 = '[b][green]Kết quả tài xỉu lần này là:[/green] [red]'.$xxx.'[/red][/b][br][img]' . $set['homeurl'] . '/game/img/taixiu/'.$kq[1].'.jpg[/img] [img]' . $set['homeurl'] . '/game/img/taixiu/'.$kq[2].'.jpg[/img] [img]' . $set['homeurl'] . '/game/img/taixiu/'.$kq[3].'.jpg[/img]';
	mysql_query("INSERT INTO `guest` SET `user_id`='256', `text`='" . mysql_real_escape_string($text3) . "', `time`='".time()."'");

$q=mysql_query("SELECT * FROM `cuoctaixiu` WHERE `taixiu`='".$hero."' ORDER BY `id` ");
while($post=mysql_fetch_array($q)) {

    mysql_query("UPDATE `ls_cuoctx` SET `win`='1' WHERE `user_id`= '".$user_id."' AND `cuoc`='".$post['cuoc']."'");

    
mysql_query("UPDATE `users` SET `$post[tien]`=`$post[tien]`+'".($post['cuoc']*2*99/100)."' WHERE `id`='".$post['user_id']."'");
$text = '<b>Chúc mừng bạn đã thắng tài xỉu và nhận được <font color="red">'.number_format(($post['cuoc']*99/100)).'</font> '.$post['tien'].'</b>';
mysql_query("INSERT INTO `thongbao` SET
                `id` = '".$post['user_id']."',
                `user` = '".$post['user_id']."',
                `text` = '$text',
                `ok` = '1',
                `time` = '" . time() . "'
            ");
mysql_query("DELETE FROM `cuoctaixiu` WHERE `user_id`='".$post['user_id']."'");

} 
$q2=mysql_query("SELECT * FROM `cuoctaixiu` WHERE `taixiu`!='".$hero."' ORDER BY `id` ");
while($post2=mysql_fetch_array($q2)) {
    mysql_query("UPDATE `ls_cuoctx` SET `win`='2' WHERE `user_id`= '".$user_id."' AND `cuoc`='".$post2['cuoc']."'");

   mysql_query("UPDATE `hugame` SET `$post2[tien]`=`$post2[tien]`+'".$post2['cuoc']."'WHERE `game`='taixiu'");
$text = '<b>Chia buồn, bạn đã thua tài xỉu và mất <font color="red">'.number_format(($post2['cuoc'])).'</font> '.$post2['tien'].'</b>';
mysql_query("INSERT INTO `thongbao` SET
                `id` = '".$post2['user_id']."',
                `user` = '".$post2['user_id']."',
                `text` = '$text',
                `ok` = '1',
                `time` = '" . time() . "'
            ");
mysql_query("DELETE FROM `cuoctaixiu` WHERE `user_id`='".$post2['user_id']."'");

} 
mysql_query("DELETE FROM `cuoctaixiu`");
}
}
 else {
    $kq = mysql_fetch_array(mysql_query("SELECT * FROM `taixiu` WHERE `id`='1'"));
if($kq['time'] < time()){
    
    mysql_query("UPDATE `taixiu` SET `time`='".time()."' WHERE `id`='1'");
}
}








?>