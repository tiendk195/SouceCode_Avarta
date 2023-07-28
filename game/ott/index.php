<?php

define('_IN_JOHNCMS',1);
$rootpath ='../../';
include'../../incfiles/core.php';
$textl ='Oẳn Tù Tì';
include'../../incfiles/head.php';
if(!$user_id){
include'../../incfiles/end.php';
exit;
}
echo'<div class="phdr">Oẳn Tù Tì</div>';
if($datauser['kichhoat'] == 0){
echo'<div class="phdr">Lỗi </div>';
echo'<div class="rmenu">Bạn vui lòng kích hoạt tài khoản </div>';
} else {
if (isset($_GET['moi'])) {
$id = (int)$_GET['id'];
$pkoolvn = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$id."'"));
if (isset($_POST['ok'])) {
$c = $_POST['c'];
$cuoc = $_POST['cuoc'];

if($id == $user_id){
Header('location: /member/'.$user_id.'.html');
} else 
if($datauser['xu'] < $cuoc){
echo'<div class="rmenu">Bạn không đủ xu</div>';
} else if($pkoolvn['xu'] < $cuoc){
echo'<div class="rmenu">Đối thủ không đủ xu</div>';
} else if($cuoc < 10000000 || $cuoc > 90000000000){
echo'<div class="rmenu">Mức cược không hợp lệ. 10M xu => 90 tỷ xu!</div>';
} else if($c < 1){
echo'<div class="rmenu">Bạn vui lòng chọn</div>';
} else {

mysql_query("INSERT INTO `ott` SET
                `nguoichoi1` = '".$user_id."',
                `nguoichoi2` = '".$id."',
                `cuoc` = '$cuoc',
                `c1` = '$c'
            ");
$xin = mysql_insert_id();
$text = '<b>'.nick($user_id).'</b> mời bạn chơi oẳn tù tì với mức cược '.number_format($_POST['cuoc']).'xu<a href="/game/ott?go&id='.$xin.'"><b> Bấm Vào Đây</b></a> để chơi';
mysql_query("INSERT INTO `thongbao` SET
                `id` = '".$user_id."',
                `user` = '".$id."',
                `text` = '$text',
                `ok` = '1',
                `time` = '" . time() . "'
            ");
$texttb = ''.$datauser['name'].' đã mời bạn chơi oẳn tù tì với mức cược '.number_format($_POST['cuoc']).'xu bạn có muốn chơi không?';
$url_tb = ''.$home.'/game/ott/?go&id='.$xin.'';
mysql_query("UPDATE `users` SET `tb_load`='".$texttb."',`url_tb`='".$url_tb."' WHERE `id` = '".$id."'");
Header('location: /member/'.$id.'.html');
}
}

echo'<div class="menu"> Oẳn tù tì với '.$pkoolvn['name'].'<br><form method="post"><table>
<tbody><td style="border: 1px solid #AAA"><img src="1.png" width="18"><input type="radio" name="c" value="1"/></td><td style="border: 1px solid #AAA"><img src="2.png" width="24"><input type="radio" name="c" value="2"/></td><td style="border: 1px solid #AAA"><img src="3.png" width="21"><input type="radio" name="c" value="3"/></td></tbody></table>Nhập xu cược:<br>
<input type="number" name="cuoc" size="10"> <br>
	<input type="submit" name="ok" value="Chơi"> </form></div>';
}



if (isset($_GET['go'])) {
$id = (int)$_GET['id'];
$pkoolvn = mysql_fetch_array(mysql_query("SELECT * FROM `ott` WHERE `id`='".$id."'"));
$p = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$pkoolvn['nguoichoi1']."'"));


if($pkoolvn['nguoichoi2'] != $user_id){
echo'<div class="rmenu">Error</div>';
} else {

if (isset($_POST['ok'])) {
$c = $_POST['c'];
if($c == 0){
} else 
if($pkoolvn['win']){
echo'<div class="rmenu">Kết thúc! Vui lòng mời lại!</div>';
} else 
if($datauser['xu'] < $pkoolvn['cuoc']){
echo'<div class="rmenu">Bạn không đủ xu</div>';
} else if($p['xu'] < $pkoolvn['cuoc']){
echo'<div class="rmenu">Đối thủ không đủ xu!</div>';
} else {
////1
if($pkoolvn['c1'] == 1 AND $c == 1){
echo'<div class="rmenu"><center><img src="1.png" width="18"> Hòa <img src="1.png" width="18"></center></div>';
$win = 0;
}

if($pkoolvn['c1'] == 1 AND $c == 2){
echo'<div class="rmenu"><center><img src="2.png" width="24"> Bạn thua <img src="1.png" width="18"><br>-'.number_format($pkoolvn['cuoc']).'xu </center></div>';
$win = $pkoolvn['nguoichoi1'];
}

if($pkoolvn['c1'] == 1 AND $c == 3){
echo'<div class="rmenu"><center><img src="3.png" width="21"> Bạn thắng <img src="1.png" width="18"><br>+'.number_format($pkoolvn['cuoc']).'xu</center> </div>';
$win = $user_id;
}

////2

if($pkoolvn['c1'] == 2 AND $c == 1){
echo'<div class="rmenu"><center><img src="1.png" width="18"> Bạn thắng <img src="2.png" width="24"><br>+'.number_format($pkoolvn['cuoc']).'xu </center></div>';
$win = $user_id;
}


if($pkoolvn['c1'] == 2 AND $c == 2){
echo'<div class="rmenu"><center><img src="2.png" width="24"> Hòa <img src="2.png" width="24"></center></div>';
$win = 0;
}

if($pkoolvn['c1'] == 2 AND $c == 3){
echo'<div class="rmenu"><center><img src="3.png" width="21"> Bạn thua <img src="2.png" width="24"><br>-'.number_format($pkoolvn['cuoc']).'xu </center></div>';
$win = $pkoolvn['nguoichoi1'];
}
////3
if($pkoolvn['c1'] == 3 AND $c == 1){
echo'<div class="rmenu"><center><img src="3.png" width="21"> Bạn thua <img src="1.png" width="18"><br>-'.number_format($pkoolvn['cuoc']).'xu </center></div>';
$win = $pkoolvn['nguoichoi1'];
}

if($pkoolvn['c1'] == 3 AND $c == 2){
echo'<div class="rmenu"><center><img src="2.png" width="24"> Bạn thắng <img src="3.png" width="21"><br>+'.number_format($pkoolvn['cuoc']).'xu </center></div>';
$win = $user_id;
}

if($pkoolvn['c1'] == 3 AND $c == 3){
echo'<div class="rmenu"><center><img src="3.png" width="21"> Hòa <img src="3.png" width="21"></center></div>';
$win = 0;
}

if($win == $user_id){
mysql_query("UPDATE `users` SET `xu`=`xu`+'".$pkoolvn['cuoc']."' WHERE `id` = '".$user_id."'");
mysql_query("UPDATE `users` SET `xu`=`xu`-'".$pkoolvn['cuoc']."' WHERE `id` = '".$pkoolvn['nguoichoi1']."'");
mysql_query("UPDATE `ott` SET `win`='".$user_id."' WHERE `id` = '".$id."'");
$text = '<b>'.nick($user_id).' đã thắng oẳn tù tì bạn bị trừ '.number_format($pkoolvn['cuoc']).'xu</b>';
mysql_query("INSERT INTO `thongbao` SET
                `id` = '".$user_id."',
                `user` = '".$pkoolvn['nguoichoi1']."',
                `text` = '$text',
                `ok` = '1',
                `time` = '" . time() . "'
            ");

$texttb = ''.$datauser['name'].' thắng oẳn tù tì bạn bị trừ '.number_format($pkoolvn['cuoc']).'xu. Bạn có muốn chơi lại không?';
$url_tb = ''.$home.'/game/ott/?moi&id='.$user_id.'';
mysql_query("UPDATE `users` SET `tb_load`='".$texttb."',`url_tb`='".$url_tb."' WHERE `id` = '".$pkoolvn['nguoichoi1']."'");
}

if($win == $pkoolvn['nguoichoi1']){
mysql_query("UPDATE `users` SET `xu`=`xu`+'".$pkoolvn['cuoc']."' WHERE `id` = '".$pkoolvn['nguoichoi1']."'");
mysql_query("UPDATE `users` SET `xu`=`xu`-'".$pkoolvn['cuoc']."' WHERE `id` = '".$user_id."'");
mysql_query("UPDATE `ott` SET `win`='".$pkoolvn['nguoichoi1']."' WHERE `id` = '".$id."'");
$text = '<b>'.nick($user_id).' đã thua oẳn tù tì bạn được cộng '.number_format($pkoolvn['cuoc']).'xu</b>';
mysql_query("INSERT INTO `thongbao` SET
                `id` = '".$user_id."',
                `user` = '".$pkoolvn['nguoichoi1']."',
                `text` = '$text',
                `ok` = '1',
                `time` = '" . time() . "'
            ");
$texttb = ''.$datauser['name'].' thua oẳn tù tì bạn được cộng +'.number_format($pkoolvn['cuoc']).'xu. Bạn có muốn chơi lại không?';
$url_tb = ''.$home.'/game/ott/?moi&id='.$user_id.'';
mysql_query("UPDATE `users` SET `tb_load`='".$texttb."',`url_tb`='".$url_tb."' WHERE `id` = '".$pkoolvn['nguoichoi1']."'");
}
if($win == 0){
mysql_query("UPDATE `ott` SET `win`='1' WHERE `id` = '".$id."'");
$text = '<b>'.nick($user_id).' đã hòa oẳn tù tì bạn được cộng +0xu</b>';
mysql_query("INSERT INTO `thongbao` SET
                `id` = '".$user_id."',
                `user` = '".$pkoolvn['nguoichoi1']."',
                `text` = '$text',
                `ok` = '1',
                `time` = '" . time() . "'
            ");
}





}
}








echo'<div class="menu"> Oẳn tù tì với '.$p['name'].', cược '.number_format($pkoolvn['cuoc']).'xu<br><form method="post"><table>
<tbody><td style="border: 1px solid #AAA"><img src="1.png" width="18"><input type="radio" name="c" value="1"/></td><td style="border: 1px solid #AAA"><img src="2.png" width="24"><input type="radio" name="c" value="2"/></td><td style="border: 1px solid #AAA"><img src="3.png" width="21"><input type="radio" name="c" value="3"/></td></tbody></table>
	<input type="submit" name="ok" value="Chơi"> </form></div>';


}}



}




include'../../incfiles/end.php';
?>