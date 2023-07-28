<?php

define('_IN_JOHNCMS', 1);

require_once ("../incfiles/core.php");
if (isset($_GET['thongtin_vp'])) {
$tqs=mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='12'");
$nqs=mysql_num_rows($tqs);
$pqs=mysql_fetch_array($tqs);
$vatpham = $id;
if(empty($vatpham)){
header('location: /');
}
$check=mysql_num_rows(mysql_query("SELECT * FROM `quayso` WHERE `id`='".$id."' "));

if($check < 1){
                		    echo'<script>alert("Lỗi không có vật phẩm này!!");</script>';
}else{
        $item=mysql_fetch_array(mysql_query("SELECT * FROM `quayso` WHERE `id`='".$id."'"));
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$item[vatpham]."'"));
 $x5=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE  `id_shop`='126' AND `user_id`='".$user_id."' "));
    $x5s=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE  `id`='126'  "));



    echo'<div class="pmenu"><center><font color="green">'.$shop[tenvatpham].'</font>
<br><font size="1"><i>1 phiếu quay số miễn phí (Đang có: '.$pqs['soluong'].')</br>
Tỉ lệ: ';
if ($item[tile]==1){
	echo' Không xác định';
} else {
	echo' '.$item[tile].'% ';
}
echo'<br>
Sử dụng <font color="red">'.$x5s['tenvatpham'].' </font> để tăng tỉ lệ thành công</br>
Đang có: '.$x5['soluong'].'
</i>
</br>

<input type="submit" value="Quay" onclick="quay('.$id.')">';
if ($datauser['rights'] >= 9) {
    echo' <a href="?act=del&id='.$id.'"><input type="submit" name="submit" value="Xóa"></a>';
        echo' <a href="?act=edit&id='.$id.'"><input type="submit" name="submit" value="Sửa"></a>';
    } 
echo'
</center></div>';
    



}
}

//


if (isset($_GET['quay'])) {

$vatpham = $id;
if(empty($vatpham)){
header('location: /');
}
$tqs=mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='12'");
$nqs=mysql_num_rows($tqs);
$pqs=mysql_fetch_array($tqs);
$item=mysql_fetch_array(mysql_query("SELECT * FROM `quayso` WHERE `id`='".$id."'"));
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$item[vatpham]."'"));
$checkdo=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `id_shop`='".$shop['id']."' AND `user_id`='".$user_id."'"));

 $x5quayso=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE  `id_shop`='126' AND `user_id`='".$user_id."' "));
    $x5s=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE  `id`='126'  "));
	$tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."'");
$checktongruong=mysql_num_rows($tongruong);

$check=mysql_num_rows(mysql_query("SELECT * FROM `quayso` WHERE `id`='".$id."' "));

if($check < 1){
                		    echo'<script>alert("Lỗi không có vật phẩm này!!");</script>';
} else if($checkdo >= 1){
                		    echo'<script>alert("Bạn đã sở hữu vật phẩm này!!");</script>';
} else if ($checktongruong>=$datauser['tongruong']) {
    echo'<script>alert("Giao dịch không thành công, rương của bạn đã đầy !!");</script>';
}


else{
    $tile=$item[tile];
if ($x5quayso['soluong']>0) {
$tile=10/$tile;
} else 
	if ($x5quayso['soluong']<=0) {
$tile=50/$tile;
	    
	}
$tile=floor($tile);
$rand=rand(1,$tile+2);
if ($pqs['soluong']<1){
                    		    echo'<script>alert("Lỗi không có phiếu quay số!!");</script>';



                       		    exit;
}
if ($x5quayso['soluong']>0) {
	mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop`='126'");
}
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='".$user_id."' AND `id_shop`='12'");
if ($rand==1) {
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$shop[loai]."',
`id_loai`='".$shop[id_loai]."',
`tenvatpham`='".$shop[tenvatpham]."',
`id_shop`='".$shop[id]."'
");
$checknv2=mysql_num_rows(mysql_query("SELECT * FROM `nhiemvu_user` WHERE `user_id`='".$user_id."' AND `id_nv`='14'"));
if ($checknv2>0) {
mysql_query("UPDATE `nhiemvu_user` SET `tiendo`=`tiendo`+'1' WHERE `user_id`='".$user_id."' AND `id_nv`='14'");
}
$bot='[b][red]Xin chúc mừng [blue]'.$login.'[/blue] vừa quay trúng [blue]'.$shop['tenvatpham'].' ! [/blue][/red][/b]';
mysql_query("INSERT INTO `chatthegioi` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
                       		    echo'<script>alert("Chúc mừng bạn đã quay trúng '.$shop[tenvatpham].'");</script>';

}
else {
$mayman=rand(1,2);
if ($mayman==1) {
$all=mysql_fetch_array(mysql_query("SELECT max(id) FROM `shopdo`"));  
$rando=rand(1,$all['max(id)']);
$checkrand=mysql_num_rows(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$rando."'"));
if ($checkrand<1) {
                       		    echo'<script>alert("Không Trúng Rồi , Bạn Hãy Thử Lại");</script>';
} else {

                       		    echo'<script>alert("Không Trúng Rồi , Bạn Hãy Thử Lại");</script>';

}
} else {
                       		    echo'<script>alert("Không Trúng Rồi , Bạn Hãy Thử Lại");</script>';
}
}

    
    



}
}

//



?>