<?php

define('_IN_JOHNCMS', 1);
$rootpath='../../';

require_once ("../../incfiles/core.php");

$wboss2 = mysql_fetch_array(mysql_query("SELECT * FROM `ngocrong_tuonglai_khu` WHERE `id` = '$id'"));

$wboss = mysql_fetch_array(mysql_query("SELECT * FROM `ngocrong_tuonglai` WHERE `id` = '{$wboss2['boss']}' "));
$n=mysql_num_rows(mysql_query("SELECT * FROM `ngocrong_tuonglai_khu` WHERE `id`='".$id."'"));
IF($n<1){
Header('Location: /');
Exit;
}
if ($wboss2['boss']==0){
	 	                 		    echo'<script>alert("Lỗi dữ liệu!! ");</script>';
	 	                 		    header('Location: index.php');

	 	                 		    exit;
}
 $tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."'");
$checktongruong=mysql_num_rows($tongruong);
	if ($checktongruong>=$datauser['tongruong']) {
	 	                 		    echo'<script>alert("Rương của bạn đã đầy, vui lòng nâng cấp thêm ");</script>';
header('Location: /ruong');

exit;	 	                 		    
}

echo'<div class="gd_npc"><center>';

$bh = mysql_fetch_array(mysql_query("SELECT * FROM `ngocrong_chucnang` WHERE `user_id`='{$user_id}' AND `loai`='280'"));

   
$gx = mysql_fetch_array(mysql_query("SELECT * FROM `ngocrong_chucnang` WHERE `user_id`='{$user_id}' AND `loai`='281'"));

$cn = mysql_fetch_array(mysql_query("SELECT * FROM `ngocrong_chucnang` WHERE `user_id`='{$user_id}' AND `loai`='282'"));
 $ad = mysql_fetch_array(mysql_query("SELECT * FROM `ngocrong_chucnang` WHERE `user_id`='{$user_id}' AND `loai`='283'"));
 $dameboss=$datauser['sucmanh'];
  $bossdame=($wboss['dame']);
 if ($bh['sudung']==1) {
    $hpboss=$bh['sucmanh'];
}
 if ($cn['sudung']==1) {
    $dameboss=$cn['sucmanh'];
}
 if ($gx['sudung']==1) {
    $bossdame=($wboss['dame']/2);
}
 if ($ad['sudung']==1) {
    $bossdame=0;
}
 	if ($datauser['matna']==253 ){
 	     $dameboss=$dameboss+($dameboss*30/100);
 	     
 	}
 	 	if ($datauser['matna']==252 ){
 	     $dameboss=$dameboss+($dameboss*40/100);
 	     
 	}

 		if ($datauser['matna']==255 ){
 	     $dameboss=$dameboss+($dameboss*20/100);
 	     
 	}
 		if ($datauser['matna']!=253 or $datauser['matna']!=252 or $datauser['matna']!=255  ){
 		     	     $dameboss=$dameboss-($dameboss*10/100);

 		}



if ($wboss['phanthuong']==1  ){
    $ngoc=269;
}    
if ($wboss['phanthuong']==2 ){
    $ngoc=270;
}     
if ($wboss['phanthuong']==3 ){
    $ngoc=271;
}  
if ($wboss['phanthuong']==4 ){
    $ngoc=272;
}  
if ($wboss['phanthuong']==5 ){
    $ngoc=273;
}  
if ($wboss['phanthuong']==6 ){
    $ngoc=274;
}  
if ($wboss['phanthuong']==7  ){
    $ngoc=275;
}  



if ($wboss['phanthuong2']==1  ){
    $ngoc2=269;
}    
if ($wboss['phanthuong2']==2 ){
    $ngoc2=270;
}     
if ($wboss['phanthuong2']==3 ){
    $ngoc2=271;
}  
if ($wboss['phanthuong2']==4 ){
    $ngoc2=272;
}  
if ($wboss['phanthuong2']==5 ){
    $ngoc2=273;
}  
if ($wboss['phanthuong2']==6 ){
    $ngoc2=274;
}  
if ($wboss['phanthuong2']==7  ){
    $ngoc2=275;
}  

///
if ($wboss['phanthuong3']==1  ){
    $ngoc3=269;
}    
if ($wboss['phanthuong3']==2 ){
    $ngoc3=270;
}     
if ($wboss['phanthuong3']==3 ){
    $ngoc3=271;
}  
if ($wboss['phanthuong3']==4 ){
    $ngoc3=272;
}  
if ($wboss['phanthuong3']==5 ){
    $ngoc3=273;
}  
if ($wboss['phanthuong3']==6 ){
    $ngoc3=274;
}  
if ($wboss['phanthuong3']==7  ){
    $ngoc3=275;
} 

$hpboss = $datauser['sucmanh'];
$rand = rand(1,3);
$xu = rand(1,50000);
$da = rand(1,2);
$diemsk= rand(1,20);



if ($bh['sudung']==1 && $bh['hp']<=0){

 echo'<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><center><b> Bạn cần có HP để tấn công.</center></b></font>';


} 

else 
if($bh['sudung']!=1 && $datauser['hp'] <= 0 ) {
echo'<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><center><b> Bạn cần có HP để tấn công.</center></b></font>';

} else 
 if($datauser['sucmanh'] <= 0 ) {
echo'<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><center><b> Bạn cần có sức mạnh để tấn công.</center></b></font>';

} else if($wboss2['hp'] <= 0){
         echo'<script>alert("Boss đã chết, vui lòng đợi hồi sinh ");</script>';

echo'<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><center><b>Các Ngươi Đợi Đấy,nhất định taaa sẽ trở lại</center></b></font>';
} else if($wboss2['hp'] <= $dameboss){

if ($dameboss >= $wboss2['hp']) {
        $randcs=rand(1,2);
    $csb=rand(1,3);
    $csv=rand(1,1);
    if ($randcs==1){
     echo'<script>alert("Bạn nhận được Capsube bạc*'.$csb.' ");</script>';

    	
    	 mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'{$csb}' WHERE `user_id`='".$user_id."' AND `id_shop` = '286' ");    
    }
        if ($randcs==2){
     echo'<script>alert("Bạn nhận được Capsube vàng*'.$csv.' ");</script>';

    	
    	 mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'{$csv}' WHERE `user_id`='".$user_id."' AND `id_shop` = '287' ");    
    }
    
                    mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'{$wboss['davun']}' WHERE `user_id`='".$user_id."' AND `id_shop` = '285' ");

echo'<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><center><b>Bạn Giết Được '.$wboss['tenboss'].' Nhận Được '.$da.' Đá nâng cấp, '.$wboss['davun'].' mảnh đá vụn,  '.$xu.' Xu </b></font></center>';
                mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'$da' WHERE `user_id`='".$user_id."' AND `id_shop` = '60'");
 if ($bh['sudung']==1) {
mysql_query("UPDATE `ngocrong_chucnang` SET `hp`=`hp`-'$bossdame' WHERE `user_id`='{$user_id}' AND `loai`={$bh['loai']}");
}else {
mysql_query("UPDATE `users` SET `hp`=`hp`-'$bossdame',`wboss`=`wboss`+1  WHERE `id`='{$user_id}'");
}

mysql_query("UPDATE `ngocrong_tuonglai_khu` SET  `hp` = '0'  WHERE `id`='{$wboss2['id']}'");



$text = ''.$login.' vừa giết được '.$wboss['tenboss'].' mọi người đều ngưỡng mộ.';

mysql_query("INSERT INTO `wnew` SET
`user` = '256',
`time` = '".time()."',
`text` = '".$text."'
");
if ($wboss['id']==4 or $wboss['id']==5 or $wboss['id']==6 ) {
    			                  		    echo'<script>alert("Bạn nhận được 2 Rương ngọc!! ");</script>';
			  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'2' WHERE `user_id`='".$user_id."' AND `id_shop` = '318'");

} 
if ($wboss['phanthuong2']!=0  && $wboss['tile2']!=0 ){
    $randnr2 = rand(1,$wboss['tile2']);
    if ($randnr2==1){
    	echo'</br>
    	<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000">
    	<center><b>Bạn đã nhận được Ngọc rồng '.$wboss['phanthuong2'].' sao</b></font></center>';
    			    echo'<script>alert("Bạn nhận được ngọc rồng '.$wboss['phanthuong2'].' sao");</script>';

    	
    	 mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '".$ngoc2."'");
     $tb='Bạn nhận được ngọc rồng '.$wboss['phanthuong'].' sao <img src="/images/vatpham/'.$ngoc2.'.png"> từ '.$wboss['tenboss'].' ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$tb',
`ok`='1',
`time`='".time()."'
");	

}

    
}
if ($wboss['phanthuong3']!=0 && $wboss['tile3']!=0  ){
    $randnr3 = rand(1,$wboss['tile3']);
    if ($randnr3==1){
    	echo'</br>
    	<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000">
    	<center><b>Bạn đã nhận được Ngọc rồng '.$wboss['phanthuong3'].' sao</b></font></center>';
    			    echo'<script>alert("Bạn nhận được ngọc rồng '.$wboss['phanthuong3'].' sao");</script>';

    	
    	 mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '".$ngoc3."'");
     $tb='Bạn nhận được ngọc rồng '.$wboss['phanthuong'].' sao <img src="/images/vatpham/'.$ngoc3.'.png"> từ '.$wboss['tenboss'].' ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$tb',
`ok`='1',
`time`='".time()."'
");	

}

    
}
if ($wboss['phanthuong']!=0 && $wboss['tile']!=0  ){

$randnr = rand(1,$wboss['tile']);

if ($randnr==1){
    	echo'</br>
    	<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000">
    	<center><b>Bạn đã nhận được Ngọc rồng '.$wboss['phanthuong'].' sao</b></font></center>';
    			    echo'<script>alert("Bạn nhận được ngọc rồng '.$wboss['phanthuong'].' sao");</script>';

    	
    	 mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '".$ngoc."'");
     $tb='Bạn nhận được ngọc rồng '.$wboss['phanthuong'].' sao <img src="/images/vatpham/'.$ngoc.'.png"> từ '.$wboss['tenboss'].' ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$tb',
`ok`='1',
`time`='".time()."'
");	
}
}

}


} else if ($rand==1) {
$dame=$bossdame*10;
echo'Bạn bị tấn công và mất thêm <font color="red"><b>'.$dame.' HP</font></b> của bản thân';
 if ($bh['sudung']==1) {
mysql_query("UPDATE `ngocrong_chucnang` SET `hp`=`hp`-'$dame' WHERE `user_id`='{$user_id}' AND `loai`={$bh['loai']}");
} else {
mysql_query("UPDATE `users` SET `hp`=`hp`-'{$dame}' WHERE `id`='{$user_id}'");
}
} else {
$rand = rand(1,15);
$da = rand(1,2);
$luong = rand(1,2);

if ($rand == 4) {
	echo'<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><center><b>Bạn đã nhận được '.$da.' Đá nâng cấp</b></font></center>';
	                mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'$da' WHERE `user_id`='".$user_id."' AND `id_shop` = '60'");

}
if ($rand == 10) {
$da23=rand(1,2);
	echo'<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><center><b>Bạn đã nhận được '.$da23.' Đá ngũ sắc</b></font></center>';
	                mysql_query("UPDATE `users` SET `dangusac`=`dangusac`+'".$da23."' WHERE `id`='".$user_id."'");

}

if ($rand == 2) {
	echo'<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><center><b>Bạn đã nhận được '.$luong.' Lượng</b></font></center>';
	                mysql_query("UPDATE `users` SET `luong`=`luong`+'$luong' WHERE `id`='".$user_id."'");

}
 if ($bh['sudung']==1) {
mysql_query("UPDATE `ngocrong_chucnang` SET `hp`=`hp`-'$bossdame' WHERE `user_id`='{$user_id}' AND `loai`={$bh['loai']}");
} else {
mysql_query("UPDATE `users` SET `hp`=`hp`-'{$bossdame}  WHERE `id`='{$user_id}'");
}
mysql_query("UPDATE `ngocrong_tuonglai_khu` SET `hp`=`hp`-'".$dameboss."' WHERE `id`='{$wboss2['id']}'");
echo''.$wboss['tenboss'].' bị mất <font color="green"><b>'.$dameboss.'HP</b></font>';

}

echo'</br></br>';
echo'<input onclick="danh('.$id.')" type="submit" name="submit" value="Đánh">';
echo'</center></div>';

?>