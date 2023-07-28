<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');
require('../incfiles/head.php');
date_default_timezone_set('Asia/Ho_Chi_Minh');

$dis=mysql_num_rows(mysql_query("SELECT * FROM `vatpham` WHERE  `user_id`='".$user_id."' AND `soluong`!='0'"));
if ($dis>0) {
echo '<div class="phdr">Rương Vật Phẩm</div>';
$tong =mysql_result(mysql_query("SELECT COUNT(*) FROM `vatpham`  WHERE `user_id`='".$user_id."' AND `soluong`!='0' "),0);

$vatpham=mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `soluong`!='0' ORDER BY `id_shop` DESC LIMIT $start,$kmess");

while($show=mysql_fetch_array($vatpham)) {
$item=mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE `id`='".$show['id_shop']."'"));
echo '<div class="omenu"><tr>
<td><img src="/images/vatpham/'.$item['id'].'.png"></td></br>

<td><b><font color="blue">'.$item['tenvatpham'].'</font>

'.($show[dakhoa]!='0'?'[<font color="black">ĐÃ KHÓA</font>]':'').'


</b>'.($show['timesudung']!=0?' - <font color="blue">Còn: '.thoigiantinh(floor($show['timesudung'])).'</font>':'').'<br/>
Thông tin: '.$item['thongtin'].'</br>Số lượng: <b>'.$show['soluong'].'</b></br>
<center>';
if ($item['loai']=='hopquadacbiet'){
echo'<a href="/mod/hopquamanhghep.php"><input class="submit" type="submit" name="ok" value="Dùng"></a></br>';
}
if ($item['loai']=='hopquasinhnhat'){
echo'<a href="/app/sinhnhat/sdhopqua.php"><input class="submit" type="submit" name="ok" value="Dùng"></a></br>';
}
if ($item['loai']=='ruongbian'){
echo'<a href="/app/pokemon/ruongbian.php"><input class="submit" type="submit" name="ok" value="Dùng"></a></br>';
}
if ($item['loai']=='bauvat'){
echo'<a href="/khugiaitri/bauvat.php"><input class="submit" type="submit" name="ok" value="Dùng"></a></br>';
}
echo''.(!empty($item['query'])?'<a href="dung.php?id='.$show['id'].'"><input class="submit" type="submit" name="ok" value="Dùng"></a> </br>':'').'<a href="xoavp.php?id='.$show['id'].'">
<input class="submit" type="submit" name="xoa" value="Bỏ"></a> ';
if ($item['loai'] != 'dacbiet' and  $item['loai'] !='danhboss' and  $item['loai'] !='ghepmanh'  ) {
echo'</br><a href="/avatar/chotroi.php?act=ban&loai=vatpham&id='.$show['id'].'">
<input class="submit" type="submit" name="ban" value="Rao bán"></a>';
}
echo'</center>
</td>
</tr></div>';
}
echo '</table>';
if ($tong > $kmess){
echo '<div class="topmenu">' . functions::display_pagination('?', $start, $tong, $kmess) . '</div>';
}

}
require('../incfiles/end.php');