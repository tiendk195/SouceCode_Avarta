<?php

define('_IN_JOHNCMS', 1);

require_once ("../incfiles/core.php");
if (isset($_GET['thongtin_da'])) {
    $thongtin_da = $_GET['thongtin_da'];

$vatpham = $id;
if(empty($vatpham)){
header('location: /');
}
$check=mysql_num_rows(mysql_query("SELECT * FROM `ngocrong_epda` WHERE `id`='".$vatpham."' "));

if($check < 1){
                		    echo'<script>alert("Lỗi không có vật phẩm này!!");</script>';
}else{
        $info = mysql_fetch_array(mysql_query("SELECT * FROM `ngocrong_epda` WHERE `id`='".$vatpham."'"));

    $daghep=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE  `id`='{$info['id_shop']}'"));
        $daghep_u=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE  `id_shop`='{$info['id_shop']}' AND `user_id`='".$user_id."' "));

$dacan=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE  `id`='{$info['da']}'"));
    $dacan_u=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE  `id_shop`='{$info['da']}' AND `user_id`='".$user_id."' "));
    $dv=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE  `id_shop`='285' AND `user_id`='".$user_id."' "));


    echo'<div class="pmenu"><center><font color="green">'.$daghep['tenvatpham'].'</font>
<br><font size="1"><i>Cần 3 '.$dacan['tenvatpham'].' 
(Đang có: '.$dacan_u['soluong'].') + '.$info['davun'].' Đá vụn (Đang có:  '.$dv['soluong'].' ) cho mỗi 1 '.$daghep['tenvatpham'].' <br></i>
<input value="1" type="number" id="sl"><br>

<input type="submit" value="Ép đá!" onclick="epda('.$id.')">
</center></div>';
    



}
}

//

if (isset($_GET['thongtin_ct'])) {

$vatpham = $id;
if(empty($vatpham)){
header('location: /');
}
$check=mysql_num_rows(mysql_query("SELECT * FROM `ngocrong_cadic_nangcapct` WHERE `id`='".$vatpham."' "));

if($check < 1){
                		    echo'<script>alert("Lỗi không có vật phẩm này!!");</script>';
}else{
        $info = mysql_fetch_array(mysql_query("SELECT * FROM `ngocrong_cadic_nangcapct` WHERE `id`='".$vatpham."'"));

    $ttct=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE  `id`='{$info['id_shop']}'"));
        $docan=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE  `id`='{$info['docan']}'"));

        //$docan=mysql_fetch_array(mysql_query("SELECT * FROM `khodo` WHERE  `id_shop`='{$info['docan']}' AND `user_id`='".$user_id."' "));

        $daghep_u=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE  `id_shop`='{$info['id_shop']}' AND `user_id`='".$user_id."' "));

$vpcan=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE  `id`='{$info['vpcan']}'"));
    $dv=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE  `id_shop`='285' AND `user_id`='".$user_id."' "));
    $vpcankho=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE  `id_shop`='{$info['vpcan']}' AND `user_id`='".$user_id."' "));
    $ktruong=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `id_shop`='".$info['docan']."'  AND `user_id`='".$user_id."' AND `timesudung` = '0'"));


    echo'<div class="pmenu"><center><font color="green">'.$ttct['tenvatpham'].'</font>
<br><font size="1"><i><font color="red">Thông tin::</font> '.$info['mota'].' </br>
Cần  '.$docan['tenvatpham'].' ';
if ($ktruong>=1){
    echo'(Đã có)';
} else {
    echo'(Chưa có)';
}
echo'</br>
'.$info['slvp'].' '.$vpcan['tenvatpham'].' (Đang có:  '.$vpcankho['soluong'].' ) </br>
'.$info['davun'].' Đá vụn (Đang có:  '.$dv['soluong'].' ) <br>
Bạn có chắc chắn muốn nâng cấp với tỉ lệ <font color="red"><b>'.((10-$info['tile'])*10).'%</b></font> không?</br>
<font color="red"><b>Lưu ý:</b></font> Khi thất bại chỉ mất đá vụn</i></br></br>

<input type="submit" value="Nâng cấp" onclick="nangcapct('.$id.')">
</center></div>';
    



}
}

//



if (isset($_GET['epda'])) {
    $epda = $_GET['epda'];

$vatpham = $id;
if(empty($vatpham)){
header('location: /');
}
$check=mysql_num_rows(mysql_query("SELECT * FROM `ngocrong_epda` WHERE `id`='".$vatpham."'"));

if($check < 1){
                		    echo'<script>alert("Lỗi không có vật phẩm này!!");</script>';
}


else{
        	$sl=trim($_POST['sl']);


     $info = mysql_fetch_array(mysql_query("SELECT * FROM `ngocrong_epda` WHERE `id`='".$vatpham."'"));
    $daghep=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE  `id`='{$info['id_shop']}'"));
    $daghep_u=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE  `id_shop`='{$info['id_shop']}' AND `user_id`='".$user_id."' "));
    $dacan=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE  `id`='{$info['da']}'"));
    $dacan_u=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE  `id_shop`='{$info['da']}' AND `user_id`='".$user_id."' "));
    $dv=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE  `id_shop`='285' AND `user_id`='".$user_id."' "));

    
    if ($dv['soluong']<($info['davun']*$sl) || $dacan_u['soluong']<(3*$sl)  || $sl<1) {
                        		    echo'<script>alert("Bạn không có đủ '.($info['davun']*$sl).' Mảnh đá vụn hoặc '.($sl*3).' '.$dacan['tenvatpham'].'   !!");</script>';

}
else {
    echo'<div class="pmenu">Chúc mừng bạn đã ghép thành công '.$sl.' '.$daghep['tenvatpham'].'!</div>';
    $davun=$info['davun']*$sl;
    mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$davun."' WHERE `user_id`='".$user_id."' AND `id_shop`='285'");
    mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$sl."' WHERE `user_id`='".$user_id."' AND `id_shop`='{$info['id_shop']}' ");
    mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".($sl*3)."' WHERE `user_id`='".$user_id."' AND `id_shop`='{$info['da']}' ");

    
    	
}


}
}

//
if (isset($_GET['khamda'])) {
    $khamda = $_GET['khamda'];

$vatpham = $id;
if(empty($vatpham)){
header('location: /');
}
$check=mysql_num_rows(mysql_query("SELECT * FROM `ngocrong_khamda` WHERE `id`='".$vatpham."'"));

if($check < 1){
                		    echo'<script>alert("Lỗi không có vật phẩm này!!");</script>';
}else{



     
     
     
  

     $info = mysql_fetch_array(mysql_query("SELECT * FROM `ngocrong_khamda` WHERE `id`='".$vatpham."'"));

 $checktoc=mysql_fetch_array(mysql_query("SELECT * FROM `khodo` WHERE  `id_shop`='{$info['id_shop']}' AND `user_id`='".$user_id."' "));
 $kttoc=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE  `id_shop`='{$info['id_shop']}' AND `user_id`='".$user_id."' "));

        $toc=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE  `id`='{$info['id_shop']}' "));
        $khotoc=mysql_fetch_array(mysql_query("SELECT * FROM `khodo` WHERE `user_id`= '{$user_id}' AND `id_shop`='{$info['id_shop']}' "));
     $kham = mysql_fetch_array(mysql_query("SELECT * FROM `ngocrong_khamda` WHERE `id`='".$vatpham."'"));
         if ($kttoc<1){
            echo'<script>alert("Lỗi, bạn chưa sở hữa item này!!");</script>';
            	header('Location: /ngocrong');
            	exit;

   }
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

    
    if ($kham['da']>$davp['soluong'] or $davun['soluong']<$kham['davun']  ) {
                        		    echo'<script>alert("Bạn không có đủ '.$kham['da'].' '.$dasvp['tenvatpham'].' hoặc '.$kham['davun'].' mảnh đá vụn  !!");</script>';

}
else {
    mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$kham['da']."' WHERE `user_id`='".$user_id."' AND `id_shop`='{$khamda}'");
    mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$kham['davun']."' WHERE `user_id`='".$user_id."' AND `id_shop`='285' ");


           if ($checktoc['sao']>=0 && $checktoc['sao']<=3){
$tile=rand(1,$info['tile1']);
}
           if ($checktoc['sao']>=4 && $checktoc['sao']<=8){
$tile=rand(1,$info['tile2']);
}
           if ($checktoc['sao']>=9 && $checktoc['sao']<=12){
$tile=rand(1,$info['tile3']);
}
           if ($checktoc['sao']>=13 && $checktoc['sao']<=15){
$tile=rand(1,$info['tile4']);
}
           if ($checktoc['sao']>=16){
$tile=rand(1,$info['tile5']);
}
    if ($tile==1){
    
        echo'<script>alert("Chúc mừng bạn đã khảm thành công '.$toc['tenvatpham'].' từ '.$khotoc['sao'].' ✩  lên '.($khotoc['sao']+1).' ✩   !!");</script>';
     $bot='Chúc mừng [red]'.$datauser['name'].'[/red] vừa khảm thành công [green]'.$toc['tenvatpham'].'[/green] từ '.$khotoc['sao'].' ✩  lên '.($khotoc['sao']+1).' ✩   ';
        mysql_query("INSERT INTO `guest` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
    if ($checktoc['sao']>=4 && $checktoc['sao']<=8){
     if ($baohiemso['soluong']>0){
            mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop`='{$baohiemso['id_shop']}' ");

   } 
    
}
           if ($checktoc['sao']>=9 && $checktoc['sao']<=12){

   if ($baohiemtrung['soluong']>0){
           mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop`='{$baohiemtrung['id_shop']}' ");

   } 
    
}
if ($checktoc['sao']>=13){

   if ($baohiemcao['soluong']>0){
           mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop`='{$baohiemcao['id_shop']}' ");

   } 
    
}
    
    
    
    mysql_query("UPDATE `khodo` SET `sao`=`sao`+'1',`sucmanh`=`sucmanh`+'100', `hp`=`hp`+'100' WHERE `user_id`='".$user_id."' AND `id_shop`='{$info['id_shop']}' LIMIT 1 ");

}
else {
    
    if ($checktoc['sao']>=4 && $checktoc['sao']<=8){
   if ($baohiemso['soluong']>0){
           mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop`='{$baohiemso['id_shop']}' ");
        echo'<script>alert("Ghép đá thất bại, '.$toc['tenvatpham'].' không bị rớt sao do có bảo hiểm  !!");</script>';

   } else {
               echo'<script>alert("Ghép đá thất bại, '.$toc['tenvatpham'].' rớt từ '.$khotoc['sao'].' ✩   xuống '.($khotoc['sao']-1).' ✩   !!");</script>';

   }
    
}
           if ($checktoc['sao']>=9 && $checktoc['sao']<=12){

   if ($baohiemtrung['soluong']>0){
           mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop`='{$baohiemtrung['id_shop']}' ");
        echo'<script>alert("Ghép đá thất bại, '.$toc['tenvatpham'].' không bị rớt sao do có bảo hiểm  !!");</script>';

   } else {
               echo'<script>alert("Ghép đá thất bại, '.$toc['tenvatpham'].' rớt từ '.$khotoc['sao'].' ✩   xuống '.($khotoc['sao']-1).' ✩   !!");</script>';

   }
    
}
if ($checktoc['sao']>=13){

   if ($baohiemcao['soluong']>0){
           mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop`='{$baohiemcao['id_shop']}' ");
        echo'<script>alert("Ghép đá thất bại, '.$toc['tenvatpham'].' không bị rớt sao do có bảo hiểm  !!");</script>';

   } else {
               echo'<script>alert("Ghép đá thất bại, '.$toc['tenvatpham'].' rớt từ '.$khotoc['sao'].' ✩   xuống '.($khotoc['sao']-1).' ✩   !!");</script>';

   }
    
}
    
    
    


    
        if ($checktoc['sao']>4 && $checktoc['sao']<=8 && $baohiemso['soluong']<1 ){
 
    mysql_query("UPDATE `khodo` SET `sao`=`sao`-'1' WHERE `user_id`='".$user_id."' AND `id_shop`='{$info['id_shop']}' LIMIT 1 ");

}
        if ($checktoc['sao']>9 && $checktoc['sao']<=12  && $baohiemtrung['soluong']<1  ){


    mysql_query("UPDATE `khodo` SET `sao`=`sao`-'1' WHERE `user_id`='".$user_id."' AND `id_shop`='{$info['id_shop']}' LIMIT 1 ");
}
        if ($checktoc['sao']>13 && $checktoc['sao']<=15  && $baohiemcao['soluong']<1 ){


    mysql_query("UPDATE `khodo` SET `sao`=`sao`-'1' WHERE `user_id`='".$user_id."' AND `id_shop`='{$info['id_shop']}' LIMIT 1 ");
}
        if ($checktoc['sao']>16   && $baohiemcao['soluong']<1){


    mysql_query("UPDATE `khodo` SET `sao`=`sao`-'1' WHERE `user_id`='".$user_id."' AND `id_shop`='{$info['id_shop']}' LIMIT 1 ");
}

    
}
    	
}


}
}

//
if (isset($_GET['nangcapct'])) {

$vatpham = $id;
if(empty($vatpham)){
header('location: /');
}
$check=mysql_num_rows(mysql_query("SELECT * FROM `ngocrong_cadic_nangcapct` WHERE `id`='".$vatpham."'"));

if($check < 1){
                		    echo'<script>alert("Lỗi không có vật phẩm này!!");</script>';
}


else{


     $info = mysql_fetch_array(mysql_query("SELECT * FROM `ngocrong_cadic_nangcapct` WHERE `id`='".$vatpham."'"));
        $ttct=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE  `id`='{$info['id_shop']}'"));
        $docan=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE  `id`='{$info['docan']}'"));
        
    $vpcan_u=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE  `id_shop`='{$info['vpcan']}' AND `user_id`='".$user_id."' "));
    $docan_u=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE  `id_shop`='{$info['id_shop']}' AND `user_id`='".$user_id."' "));
    $dv=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE  `id_shop`='285' AND `user_id`='".$user_id."' "));
    $ktruong=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `id_shop`='".$info['docan']."'  AND `user_id`='".$user_id."' AND `timesudung` = '0'"));

    
    if ($dv['soluong']<$info['davun'] || $vpcan_u['soluong']<$info['slvp']  || $ktruong<1) {
                        		    echo'<script>alert("Bạn không có đủ nguyên liệu   !!");</script>';

}
else {
    $rand=rand(1,$info['tile']);
    if ($rand==1){
    echo'<script>alert("Chúc mừng bạn đã nâng cấp thành công  '.$ttct['tenvatpham'].'!");</script>';
   
    mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$info['davun']."' WHERE `user_id`='".$user_id."' AND `id_shop`='285'");
    mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`- '".$info['slvp']."' WHERE `user_id`='".$user_id."' AND `id_shop`='{$info['vpcan']}' ");
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$ttct['loai']."',
`id_loai`='".$ttct['id_loai']."',
`timesudung`='".$ttct['timesudung']."',
`tenvatpham`='".$ttct['tenvatpham']."',
`id_shop`='".$ttct['id']."'
");
mysql_query("DELETE FROM `khodo` WHERE `id_shop`='".$docan['id']."' AND `user_id`='".$user_id."' LIMIT 1");
    } else {
    echo'<script>alert("Nâng cấp thất bại  '.$ttct['tenvatpham'].'!");</script>';
       mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$info['davun']."' WHERE `user_id`='".$user_id."' AND `id_shop`='285'");

    }   
    
    	
}


}
}


?>