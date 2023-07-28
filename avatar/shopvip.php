<?PHP
Define('_IN_JOHNCMS', 1);
Require('../incfiles/core.php');
$headmod = 'Shop VIP';
$textl = 'Shop VIP';
Require('../incfiles/head.php');
IF(!$user_id){
Header("Location: /");
Exit;
}
Echo'<div class="box_forums"><br/><div class="homeforum"><div class="icon-home"><div class="home">Khu mua sắm</div></div></div></div><div class="phdr">Shop VIP</div>';
IF($datauser['vip'] < 1){
Echo'<div class="omenu"><center><b><font color="red">BẠN KHÔNG PHẢI LÀ VIP</font></b></center></div>';
}Else{
switch($act){
case'mua':
$vp=intval($_GET['id']);
$p=mysql_fetch_array(mysql_query("SELECT * FROM `shopvip` WHERE `id`='".$vp."'"));
$r=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$p['vatpham']."'"));
IF($r['timesudung']){
$r['timesudung'] = $r['timesudung'] + time();
}
$n=mysql_num_rows(mysql_query("SELECT * FROM `shopvip` WHERE `id`='".$vp."'"));
IF($n<1){
Header('Location: /');
Exit;
} 
IF(Isset($_POST['mua'])){
IF($r['loaitien'] == 'vnd'){
IF($datauser['vnd'] >= $r['gia']){
mysql_query("UPDATE `users` SET `vnd`=`vnd`-'".$r['gia']."' WHERE `id`='".$user_id."'");
mysql_query("INSERT INTO `khodo` SET `user_id`='".$user_id."', `id_shop`='".$r['id']."', `loai`='".$r['loai']."', `id_loai`='".$r['id_loai']."', `tenvatpham` = '".$r['tenvatpham']."', `timesudung`='".$r['timesudung']."'");
Echo'<div class="omenu"><center><b><font color="red">BẠN ĐÃ MUA THÀNH CÔNG VẬT PHẨM '.$r['tenvatpham'].'</font></b></center></div>';
Require('../incfiles/end.php');
Exit;
}Else{
Echo'<div class="omenu"><center><b><font color="red">Giao dịch thất bại !!<br>Bạn không đủ '.$r['gia'].' lượng</font></b></center></div>';
}
}
IF($r['loaitien'] == 'xu'){
IF($datauser['xu'] >= $r['gia']){
mysql_query("UPDATE `users` SET `xu`=`xu`-'".$r['gia']."' WHERE `id`='".$user_id."'");
mysql_query("INSERT INTO `khodo` SET `user_id`='".$user_id."', `id_shop`='".$r['id']."', `loai`='".$r['loai']."', `id_loai`='".$r['id_loai']."', `tenvatpham` = '".$r['tenvatpham']."', `timesudung`='".$r['timesudung']."'");
Echo'<div class="omenu"><center><b><font color="red">BẠN ĐÃ MUA THÀNH CÔNG VẬT PHẨM '.$r['tenvatpham'].'</font></b></center></div>';
Require('../incfiles/end.php');
Exit;
}Else{
Echo'<div class="omenu"><center><b><font color="red">Giao dịch thất bại !!<br>Bạn không đủ '.$r['gia'].' xu</font></b></center></div>';
}
}
Require('../incfiles/end.php');
Exit;
}
Echo'<div class="omenu"><center><b><font color="red"><img src="/images/shop/'.$r['id'].'.png"><br>Bạn có chắc chắn mua '.$r['tenvatpham'].' không??</font></b><form method="post"><input type="submit" name="mua" value="MUA"></center></div>';
break;
default:
$e=mysql_query("SELECT * FROM
`shopvip` WHERE `id`!=0 ORDER BY `id` DESC LIMIT $start, $kmess");
while($s=mysql_fetch_array($e)){
$res=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$s['vatpham']."'"));
Echo'<div class="omenu" style="padding: 0px"><table width="100%" border="0" cellspacing="0" class="profile-info"><tbody><tr><td class="left-info" width="25%"><img src="/images/shop/'.$res['id'].'.png"></td><td class="right-info" width="75%">Tên: <b>'.$res['tenvatpham'].'</b> <br>Giá: <b>'.number_format($res['gia']).'</b> '.($res['loaitien'] == xu ? 'xu' : 'lượng').' <br>Hạn sử dụng: '.($r['timesudung'] ? thoigiantinh(floor($r['timesudung'])).'' : '<b><font color="red">Vĩnh viễn</font></b>').'</div><div class="menu"><a href="?act=mua&id='.$s['id'].'"><button> Mua </button></a></td></tr></tbody></table></div>';
}
$total=mysql_result(mysql_query("SELECT COUNT(*) FROM `shopvip` WHERE `id`!=0"), 0);
IF($total > $kmess){
Echo'<div class="phdr">'.functions::pages('?act=danhsach&loai='.$loai.'&page=', $start, $total, $kmess).'</div>';
}
break;
}
}
Require('../incfiles/end.php');
?>