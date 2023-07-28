<?php

define('_IN_JOHNCMS', 1);

require_once ("../incfiles/core.php");
       if (isset($_GET['load'])) {
$hugame=mysql_fetch_array(mysql_query("SELECT * FROM `hugame` WHERE `game`='taixiu'"));


//Tài xỉu
$ttx = mysql_result(mysql_query("SELECT * FROM `cuoctaixiu`"),0);
if($ttx > 0){
$kq = mysql_fetch_array(mysql_query("SELECT * FROM `taixiu` WHERE `id`='1'"));
if($kq['time'] < time()){
$r1 = rand(1,6);
$r2 = rand(1,6);
$r3 = rand(1,6);
mysql_query("UPDATE `taixiu` SET `1`='".$r1."',`2`='".$r2."',`3`='".$r3."' ,`phien`=`phien`+'1' WHERE `id`='1'");

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
} else {
    $kq = mysql_fetch_array(mysql_query("SELECT * FROM `taixiu` WHERE `id`='1'"));
if($kq['time'] < time()){
    
    mysql_query("UPDATE `taixiu` SET `time`='".time()."' WHERE `id`='1'");
}
}



$kq=mysql_fetch_array(mysql_query("SELECT * FROM `taixiu` WHERE `id`='1'"));

$xxx=$kq[1]+$kq[2]+$kq[3];
if ($xxx<11) {
$hero='xiu';
$xxx='Xỉu';
} else {
$hero='tai';
$xxx='Tài';
}
echo'<div style="border: 1px solid #ef0909;background-image: url(/ssm/images/gd1.gif);background-color: #EAF6FC;margin:0px 0;padding:5px;border-radius:5px;width:auto;height:50px;">
<font size="1" color="white" style="text-shadow: 0 0 0.2em #9932CC, 0 0 0.2em #9932CC,  0 0 0.2em #9932CC"><b><img src="https://i.imgur.com/JC1HnCj.png" width="50">
'.number_format($hugame['xu']).' Xu - '.number_format($hugame['luong']).' Lượng
 ';
echo'</font></div>';
echo'</br><center>Kết quả phiên '.$kq['phien'].': '.$kq[1].' - '.$kq[2].' - '.$kq[3].'</br>
'.$xxx.'</br>';

echo '<img src="img/taixiu/'.$kq[1].'.jpg"> <img src="img/taixiu/'.$kq[2].'.jpg"> <img src="img/taixiu/'.$kq[3].'.jpg"></center>';
echo'</br>';
echo'<div class="kevach"><center>Phiên '.($kq['phien']+1).'</center></div>';
$ttx = mysql_result(mysql_query("SELECT * FROM `cuoctaixiu`"),0);
if($ttx > 0){
echo'<center><div class="omenu"><font size="4">'.($kq[time]-time()).'s nữa sẽ có kết quả tiếp theo!</font> </div></center>';
}
echo'<div style="overflow: auto;height:100px">';
echo'<center>';
echo'<div style="border: 1px solid #EAF6FC;background-color: #EAF6FC;margin:0px 0;padding:5px;border-radius:5px;width:auto;height:100px;">
<font size="1" color="white" style="text-shadow: 0 0 0.2em #9932CC, 0 0 0.2em #9932CC,  0 0 0.2em #9932CC"><b>
Danh sách đặt 
';
echo'</b></font>';
$q=mysql_query("SELECT * FROM `cuoctaixiu` ORDER BY `id`");
$num=mysql_num_rows($q);

while($post=mysql_fetch_array($q)) {
$name=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$post[user_id]."'"));
echo'</br><font size="1">'.nick($post[user_id]).' đã đặt <font color="red">'.($post[taixiu]=='tai'?'Tài':'Xỉu').'</font> <b>'.number_format($post[cuoc]).'</b> '.($post[tien]=='xu'?'xu':'lượng').'</font>';


}
if ($num<1){
    echo'</br>Trống';
}
echo'</div>';
echo'</center>';
echo'</div>';

///


//
}
       if (isset($_GET['cuocxiuxu'])) {

           $hugame=mysql_fetch_array(mysql_query("SELECT * FROM `hugame` WHERE `game`='taixiu'"));
$rand=rand(1,100);
                   	$sotien=trim($_POST['sotien']);
                   	$typetien='xu';
                   	$loaicuoc='xiu';
                   	$tx = mysql_result(mysql_query("SELECT * FROM `cuoctaixiu` WHERE `user_id`='".$user_id."'"),0);
                      $chectx=mysql_fetch_array(mysql_query("SELECT * FROM `cuoctaixiu` WHERE `user_id`='".$user_id."'"));


if ($datauser[$typetien]<$sotien||empty($sotien)||$sotien<=0) {
                    		    echo'<script>alert("Lỗi số tiền không hợp lệ!!");</script>';

       } 
      
      
           
       
       
       else if($tx >= 1  ){
           
                                		    echo'<script>alert("Lỗi bạn đã cược ván này rồi!!");</script>';
  
       
} else  {
    
  
    
    	if ($rand ==1){
	                           		    echo'<script>alert("Chúc mừng bạn nhận được '.number_format($hugame['xu']).' Xu và '.number_format($hugame['luong']).' Lượng từ Hũ Game");</script>';

$bot=''.$login.' đã nổ hủ Tài Xỉu, nhận được '.number_format($hugame['xu']).' Xu và '.number_format($hugame['luong']).' ';
mysql_query("INSERT INTO `guest` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
mysql_query("INSERT INTO `wnew` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
mysql_query("UPDATE `users` SET `xu`=`xu`+'".$hugame['xu']."',`luong`=`luong`+ '".$hugame['luong']."' WHERE `id`='".$user_id."'");
	mysql_query("UPDATE `hugame` SET `xu`='0',`luong`='0' WHERE `game`='taixiu' ");

	}
                       		    echo'<script>alert("Đặt thành công '.number_format($sotien).' '.$typetien.' !!");</script>';

$checknv3=mysql_num_rows(mysql_query("SELECT * FROM `nhiemvu_user` WHERE `user_id`='".$user_id."' AND `id_nv`='23'"));
if ($checknv3>0) {
mysql_query("UPDATE `nhiemvu_user` SET `tiendo`=`tiendo`+'1' WHERE `user_id`='".$user_id."' AND `id_nv`='23'");
}
                      $checktimetx=mysql_fetch_array(mysql_query("SELECT * FROM `taixiu` WHERE `id`='1'"));

if ($checktimetx['time']<=time()){
mysql_query("UPDATE `taixiu` SET `time`='".(time()+60)."'  WHERE `id`='1'");
}
mysql_query("UPDATE `users` SET `$typetien`=`$typetien`-'".$sotien."' WHERE `id`='".$user_id."'");
mysql_query("INSERT INTO `ls_cuoctx` SET `user_id`='".$user_id."',`taixiu`='".mysql_real_escape_string($loaicuoc)."',`cuoc`='".$sotien."',`time`='".time()."',`tien`='".$typetien."'");

mysql_query("INSERT INTO `cuoctaixiu` SET `user_id`='".$user_id."',`taixiu`='".mysql_real_escape_string($loaicuoc)."',`cuoc`='".$sotien."',`tien`='".$typetien."'");
}
}
           		  
///
 if (isset($_GET['cuocxiuluong'])) {
           $hugame=mysql_fetch_array(mysql_query("SELECT * FROM `hugame` WHERE `game`='taixiu'"));
$rand=rand(1,100);
                   	$sotien=trim($_POST['sotien1']);
                   	$typetien='luong';
                   	$loaicuoc='xiu';
                   	$tx = mysql_result(mysql_query("SELECT * FROM `cuoctaixiu` WHERE `user_id`='".$user_id."'"),0);
                   	$tx2 = mysql_num_rows(mysql_query("SELECT * FROM `cuoctaixiu` WHERE `user_id`='".$user_id."' , `taixiu`='xiu',  `tien`='luong' "));


if ($datauser[$typetien]<$sotien||empty($sotien)||$sotien<=0) {
                    		    echo'<script>alert("Lỗi số tiền không hợp lệ!!");</script>';

       }  else if($tx >= 1){
                       		    echo'<script>alert("Lỗi bạn đã cược ván này rồi!!");</script>';
} else  {
    	if ($rand ==1){
	                           		    echo'<script>alert("Chúc mừng bạn nhận được '.number_format($hugame['xu']).' Xu và '.number_format($hugame['luong']).' Lượng từ Hũ Game");</script>';

$bot=''.$login.' đã nổ hủ Tài Xỉu, nhận được '.number_format($hugame['xu']).' Xu và '.number_format($hugame['luong']).' ';
mysql_query("INSERT INTO `guest` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
mysql_query("INSERT INTO `wnew` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
mysql_query("UPDATE `users` SET `xu`=`xu`+'".$hugame['xu']."',`luong`=`luong`+ '".$hugame['luong']."' WHERE `id`='".$user_id."'");
	mysql_query("UPDATE `hugame` SET `xu`='0',`luong`='0' WHERE `game`='taixiu' ");

	}
                       		    echo'<script>alert("Đặt thành công '.number_format($sotien).' '.$typetien.' !!");</script>';

$checknv3=mysql_num_rows(mysql_query("SELECT * FROM `nhiemvu_user` WHERE `user_id`='".$user_id."' AND `id_nv`='23'"));
if ($checknv3>0) {
mysql_query("UPDATE `nhiemvu_user` SET `tiendo`=`tiendo`+'1' WHERE `user_id`='".$user_id."' AND `id_nv`='23'");
}
                      $checktimetx=mysql_fetch_array(mysql_query("SELECT * FROM `taixiu` WHERE `id`='1'"));

if ($checktimetx['time']<=time()){
mysql_query("UPDATE `taixiu` SET `time`='".(time()+60)."'  WHERE `id`='1'");
}
mysql_query("UPDATE `users` SET `$typetien`=`$typetien`-'".$sotien."' WHERE `id`='".$user_id."'");
mysql_query("INSERT INTO `ls_cuoctx` SET `user_id`='".$user_id."',`taixiu`='".mysql_real_escape_string($loaicuoc)."',`cuoc`='".$sotien."',`time`='".time()."',`tien`='".$typetien."'");

mysql_query("INSERT INTO `cuoctaixiu` SET `user_id`='".$user_id."',`taixiu`='".mysql_real_escape_string($loaicuoc)."',`cuoc`='".$sotien."',`tien`='".$typetien."'");
}
}
///
 if (isset($_GET['cuoctaixu'])) {
           $hugame=mysql_fetch_array(mysql_query("SELECT * FROM `hugame` WHERE `game`='taixiu'"));
$rand=rand(1,100);
                   	$sotien=trim($_POST['sotien2']);
                   	$typetien='xu';
                   	$loaicuoc='tai';
                   	$tx = mysql_result(mysql_query("SELECT * FROM `cuoctaixiu` WHERE `user_id`='".$user_id."'"),0);


if ($datauser[$typetien]<$sotien||empty($sotien)||$sotien<=0) {
                    		    echo'<script>alert("Lỗi số tiền không hợp lệ!!");</script>';

       }  else if($tx >= 1){
                       		    echo'<script>alert("Lỗi bạn đã cược ván này rồi!!");</script>';
} else  {
    	if ($rand ==1){
	                           		    echo'<script>alert("Chúc mừng bạn nhận được '.number_format($hugame['xu']).' Xu và '.number_format($hugame['luong']).' Lượng từ Hũ Game");</script>';

$bot=''.$login.' đã nổ hủ Tài Xỉu, nhận được '.number_format($hugame['xu']).' Xu và '.number_format($hugame['luong']).' ';
mysql_query("INSERT INTO `guest` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
mysql_query("INSERT INTO `wnew` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
mysql_query("UPDATE `users` SET `xu`=`xu`+'".$hugame['xu']."',`luong`=`luong`+ '".$hugame['luong']."' WHERE `id`='".$user_id."'");
	mysql_query("UPDATE `hugame` SET `xu`='0',`luong`='0' WHERE `game`='taixiu' ");

	}
                       		    echo'<script>alert("Đặt thành công '.number_format($sotien).' '.$typetien.' !!");</script>';

$checknv3=mysql_num_rows(mysql_query("SELECT * FROM `nhiemvu_user` WHERE `user_id`='".$user_id."' AND `id_nv`='23'"));
if ($checknv3>0) {
mysql_query("UPDATE `nhiemvu_user` SET `tiendo`=`tiendo`+'1' WHERE `user_id`='".$user_id."' AND `id_nv`='23'");
}
                      $checktimetx=mysql_fetch_array(mysql_query("SELECT * FROM `taixiu` WHERE `id`='1'"));

if ($checktimetx['time']<=time()){
mysql_query("UPDATE `taixiu` SET `time`='".(time()+60)."'  WHERE `id`='1'");
}
mysql_query("UPDATE `users` SET `$typetien`=`$typetien`-'".$sotien."' WHERE `id`='".$user_id."'");
mysql_query("INSERT INTO `ls_cuoctx` SET `user_id`='".$user_id."',`taixiu`='".mysql_real_escape_string($loaicuoc)."',`cuoc`='".$sotien."',`time`='".time()."',`tien`='".$typetien."'");

mysql_query("INSERT INTO `cuoctaixiu` SET `user_id`='".$user_id."',`taixiu`='".mysql_real_escape_string($loaicuoc)."',`cuoc`='".$sotien."',`tien`='".$typetien."'");
}
}
    
///
 if (isset($_GET['cuoctailuong'])) {
           $hugame=mysql_fetch_array(mysql_query("SELECT * FROM `hugame` WHERE `game`='taixiu'"));
$rand=rand(1,100);
                   	$sotien=trim($_POST['sotien3']);
                   	$typetien='luong';
                   	$loaicuoc='tai';
                   	$tx = mysql_result(mysql_query("SELECT * FROM `cuoctaixiu` WHERE `user_id`='".$user_id."'"),0);


if ($datauser[$typetien]<$sotien||empty($sotien)||$sotien<=0) {
                    		    echo'<script>alert("Lỗi số tiền không hợp lệ!!");</script>';

       }  else if($tx >= 1){
                       		    echo'<script>alert("Lỗi bạn đã cược ván này rồi!!");</script>';
} else  {
    	if ($rand ==1){
	                           		    echo'<script>alert("Chúc mừng bạn nhận được '.number_format($hugame['xu']).' Xu và '.number_format($hugame['luong']).' Lượng từ Hũ Game");</script>';

$bot=''.$login.' đã nổ hủ Tài Xỉu, nhận được '.number_format($hugame['xu']).' Xu và '.number_format($hugame['luong']).' ';
mysql_query("INSERT INTO `guest` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
mysql_query("INSERT INTO `wnew` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
mysql_query("UPDATE `users` SET `xu`=`xu`+'".$hugame['xu']."',`luong`=`luong`+ '".$hugame['luong']."' WHERE `id`='".$user_id."'");
	mysql_query("UPDATE `hugame` SET `xu`='0',`luong`='0' WHERE `game`='taixiu' ");

	}
                       		    echo'<script>alert("Đặt thành công '.number_format($sotien).' '.$typetien.' !!");</script>';

$checknv3=mysql_num_rows(mysql_query("SELECT * FROM `nhiemvu_user` WHERE `user_id`='".$user_id."' AND `id_nv`='23'"));
if ($checknv3>0) {
mysql_query("UPDATE `nhiemvu_user` SET `tiendo`=`tiendo`+'1' WHERE `user_id`='".$user_id."' AND `id_nv`='23'");
}
                      $checktimetx=mysql_fetch_array(mysql_query("SELECT * FROM `taixiu` WHERE `id`='1'"));

if ($checktimetx['time']<=time()){
mysql_query("UPDATE `taixiu` SET `time`='".(time()+60)."'  WHERE `id`='1'");
}
mysql_query("UPDATE `users` SET `$typetien`=`$typetien`-'".$sotien."' WHERE `id`='".$user_id."'");
mysql_query("INSERT INTO `ls_cuoctx` SET `user_id`='".$user_id."',`taixiu`='".mysql_real_escape_string($loaicuoc)."',`cuoc`='".$sotien."',`time`='".time()."',`tien`='".$typetien."'");

mysql_query("INSERT INTO `cuoctaixiu` SET `user_id`='".$user_id."',`taixiu`='".mysql_real_escape_string($loaicuoc)."',`cuoc`='".$sotien."',`tien`='".$typetien."'");
}
}




?>
