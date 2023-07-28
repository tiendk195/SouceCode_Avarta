<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');
$headmod='Khu giải trí';
$textl='Khu quay số';
require('../incfiles/head.php');
if (!$user_id) {
header('Location: /index.php');
}
echo'<div class="phdr">Quay số > Quay số lượng</div>';
switch($act) {
default:
        if ($datauser['rights']>=9){
        echo'<div class="gd_"><div class="pmenu"><a href="?act=add">Thêm đồ</a></div></div>';
    }
echo'<div class="gd_"><table width="100%" border="0" cellspacing="0"><tbody><tr class=""><td width="20%"><center><div style="border: 1px solid #EAF6FC;background-color: #EAF6FC;margin:0px 0;padding:5px;border-radius:5px;width:auto;height:auto;">
<font size="1" color="white" style="text-shadow: 0 0 0.2em #9932CC, 0 0 0.2em #9932CC,  0 0 0.2em #9932CC"><b>Quay số may mắn đây!!!</b></font></div>
<br><img src="/icon/npcquayso.gif"></center></td><td width="80%"><div class="pmenu"><div style="overflow: auto;height:140px">';
$tong =mysql_result(mysql_query("SELECT COUNT(*) FROM `quayso`WHERE `vnd`!='0'  "),0);
$vatpham = mysql_query("SELECT * FROM `quayso` WHERE `id`!=0 AND `vnd`!='0' ORDER BY `id` ");
while($show=mysql_fetch_array($vatpham)) {
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$show[vatpham]."'"));
$checkdo=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `id_shop`='".$shop['id']."' AND `user_id`='".$user_id."'"));
if ($checkdo>=1){
    echo' <img onclick="thongtin_vp('.$show['id'].')" src="/images/shop/'.$shop['id'].'.png" style="border: 1px solid #F6CEE3;background-color: #F6CEE3;margin:2px 0;padding:10px;border-radius:5px;">';

} else{
echo' <img onclick="thongtin_vp('.$show['id'].')" src="/images/shop/'.$shop['id'].'.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px;">';
}
}
echo' </div></div></td></tr></tbody></table><div id="hien"></div><div id="quay"></div></div>';

break;
case 'add':
if ($rights>=9) {
echo '<div class="phdr">Thêm đồ quay số</div>';
if (isset($_POST[add])) {
$vatpham=(int)$_POST[vatpham];
$vnd=(int)$_POST[vnd];
$vndkhoa=(int)$_POST[vndkhoa];

$xu=(int)$_POST[xu];
$tile=(int)$_POST[tile];
if (empty($vatpham) or  empty($tile)) {
echo '<div class="news">Không được bỏ trống chỗ nào hết!</div>';
} else {
mysql_query("INSERT INTO `quayso` SET
`vatpham`='".$vatpham."',
`vnd`='".$vnd."',
`vndkhoa`='".$vndkhoa."',

`xu`='".$xu."',
`tile`='".$tile."'");
$tenvatpham=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$vatpham."'"));
$bot=''.$login.' vừa thêm [red]'.$tenvatpham[tenvatpham].' [/red] vào quay số!';
mysql_query("INSERT INTO `guest` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
echo '<div class="omenu">Thêm thành công</div>';
}
}
echo '<form method="post">';
echo 'Vật phẩm: <select name="vatpham">';
$qs=mysql_query("SELECT * FROM `shopdo` WHERE `hienthi`='1'");
while ($show=mysql_fetch_array($qs)) {
echo '<option value="'.$show[id].'"> '.$show[tenvatpham].'</option>';
}
echo '</select><br/>';
echo 'Quay bằng Lượng(Nhập 0 nếu không có): <input type="text" name="vnd" size="3"> Lượng<br/>';
echo 'Quay bằng Lượng khóa(Nhập 0 nếu không có): <input type="text" name="vndkhoa" size="3"> Lượng<br/>';

echo 'Quay bằng xu(Nhập 0 nếu không có): <input type="text" name="xu" size="3"> xu<br/>';
echo 'Tỉ lệ trúng: <input type="text" name="tile" size="1">%<br/>';
echo '<input type="submit" name="add" value="Thêm">';
echo '</form>';
}
break;
case 'del':
if ($rights>=9) {

echo '<div class="phdr">Xóa đồ quay số</div>';
$id=(int)$_GET[id];
    $item=mysql_fetch_array(mysql_query("SELECT * FROM `quayso` WHERE `id`='".$id."'"));
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$item[vatpham]."'"));
  $xyz=mysql_num_rows(mysql_query("SELECT * FROM `quayso` WHERE `id`='".$id."'"));
if($xyz<=0){header('location: /');}
$res=mysql_fetch_array(mysql_query("SELECT * FROM `quayso` WHERE `id`='".$_GET[id]."'"));
echo'<center>';
Echo'<div class="omenu"><b>Bạn có muốn xóa vật phẩm quay số <img src="/images/shop/'.$res['vatpham'].'.png"> <font color="red">'.$shop['tenvatpham'].'</font> không ??</b>';
echo '<form method="post"><input type="submit" name="submit" value="Xóa"></form></div>';
if (isset($_POST[submit])) {
Echo'<div class="omenu">Bạn đã xóa thành công vật phẩm <font color="red">'.$shop['tenvatpham'].'</font> !!<a href="quaysoluong.php">Trở về!!</a></div>';
echo'</center>';
mysql_query("DELETE FROM `quayso` WHERE `id`='".$id."'");

}
}
break;
case 'edit':
if ($rights>=9) {


$id=$_GET[id];
$item=mysql_fetch_array(mysql_query("SELECT * FROM `quayso` WHERE `id`='".$id."'"));
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$item[vatpham]."'"));
  $xyz=mysql_num_rows(mysql_query("SELECT * FROM `quayso` WHERE `id`='".$id."'"));
if($xyz<=0){header('location: /');}


echo '<div class="phdr"><b>'.$shop[tenvatpham].'</b></div>';
if (isset($_POST[submit])) {
@mysql_query("UPDATE `quayso` SET
`vnd`='".$_POST[vnd]."',
`vndkhoa`='".$_POST[vndkhoa]."',

`xu`='".$_POST[xu]."',
`tile`='".$_POST[tile]."'


WHERE `id`='".$id."'
");

echo '<div class="omenu">Edit thành công! </div>';
}
echo '<img src="/images/shop/'.$shop['id'].'.png">';
echo '<form method="post">';


echo 'Nhập xu: <input type="number" name="xu" value="'.$item[xu].'"><br/>';
echo 'Nhập lượng khóa: <input type="number" name="vndkhoa" value="'.$item[vndkhoa].'"><br/>';

echo 'Nhập lượng: <input type="number" name="vnd" value="'.$item[vnd].'"><br/>';
echo 'Nhập tỉ lệ: <input type="number" name="tile" value="'.$item[tile].'"><br/>';
echo '<input type="submit" name="submit" value="Lưu">';
echo '</form>';
}
}
    
    
include'../incfiles/end.php';


?>
<script>
function thongtin_vp(id)
{
    $.ajax(
        {
            url : 'luong-load.php?thongtin_vp',
            data : {id : id},
            type : 'POST',
            success : function(d)
            {
                $("#hien").html(d);
            }
        }
        
        );
}
function quay(id)
{
    $.ajax(
        {
            url : 'luong-load.php?quay',
            data : {id : id},
            type : 'POST',
            success : function(d)
            {
                $("#quay").html(d);
            }
        }
        
        );
}
</script>