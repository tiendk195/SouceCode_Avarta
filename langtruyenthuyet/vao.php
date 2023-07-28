<?PHP
Define('_IN_JOHNCMS', 1);
Require('../incfiles/core.php');
$headmod = 'Làng cổ';
$textl = 'Làng Truyền Thuyết';
Require('../incfiles/head.php');
Include('hoisinh.php');
if (!$user_id){
Header("Location: /");
exit;
}

Echo '<div class="phdr">Làng Truyền Thuyết</div>';
$vtt = mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id` = '".$user_id."' AND `id_shop`='257' LIMIT 1"));
if ($vtt['soluong']<1){
    echo'<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn không có vé truyền tống <img src="/images/vatpham/257.png">. Hãy đến <a href="/nongtrai/laibuon.php">Lái Buôn</a> ở Nông Trại để mua nhé</div>';
Require('../incfiles/end.php');
exit;
}
$lv = $datauser['level'];
if($lv < 1){
echo'<div class="menu">Bạn phải đạt level 1 để vào làng cổ</div>';
require('../incfiles/end.php');
exit;
}
Echo'<link rel="stylesheet" href="game.css" type="text/css" />
<div class="datboss">
<img src="img/caydua.png">
<img src="img/caydua.png">
<img src="img/caydua.png"><div class="datboss">';
//Hiển thị Avatar 
mysql_query("UPDATE `users` SET `vitri` = '222' WHERE `id` = '".$user_id."'");
//-- Tìm kiếm users ---//
$online_u = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `vitri` = '222'"), 0);
$totalonline = $online_u;
$q = @mysql_query("select * from `users` where `lastdate` > " . (time() - 300) . " AND `vitri` = '222';");
$count = mysql_num_rows($q);
while ($arr = mysql_fetch_array($q)){
$trinhtrangvip = mysql_query("select `rights` from `users` where id='" . $arr['id'] . "'");
$trinhtrangviphonnua = mysql_fetch_array($trinhtrangvip);
if($arr['id'] != $datauser['id']){
$u_on[]='<a href="/member/' . $arr['id'] . '.html"><img src="/avatar/' . $arr['id'] . '.png"></a>';
}else{
	$u_on[]='<a href="/member/' . $arr['id'] . '.html"><img src="/avatar/' . $arr['id'] . '.png"></a>';


}
}
//Keet thuc tim kiem

if ($online_u > 0){
echo implode(' ',$u_on).'';
}

Echo'<div class="buico"></div></div>';
include 'danh.php';
$req = mysql_query("SELECT * FROM `langtruyenthuyet_boss`");
while($res = mysql_fetch_assoc($req)){
if($lv >= $res['lvboss'] || $lv < $res['lvbossmax']){
if($res['hienthi'] == 0){
if(time() > $res['timebosschet'] + 300 ){
mysql_query("UPDATE `langtruyenthuyet_boss` SET `hienthi`='1'");
mysql_query("UPDATE `langtruyenthuyet_boss` SET `hp`=`hpfull`");
}
}

     if ($res['hp']<=0){
         Echo'<img src="img/boss/'.$res['iconboss'].'die.png">';
} else {
    Echo'<a href="?act=danh&id='.$res['id'].'"><img src="img/boss/'.$res['iconboss'].'.png"></a>';}

}
}
Echo'<div class="buico"></div>
</div>
';
switch ($act){
default: 
break;
case 'bomhp':
$bomhp = '10000';
mysql_query("UPDATE `users` SET `hp` = `hpfull` WHERE `id` = $user_id");
Echo'<div class="omenu">Bạn đã hồi HP thành công!!</div>';

break;
}
Require('../incfiles/end.php');
?>