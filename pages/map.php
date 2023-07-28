<?php
if($user_id){ 


/*
echo'<div class="omenu"><div class="lt">Từ ngày 22/07 đến 25/07, <a href="/mod/shopbian.html">Shop Bí Ẩn</a> sẽ xuất hiện để các bạn có thể mua đồ siêu Hot với giá khuyến mãi từ 10% đến 70%</div></div>';
*/

 {
     $total = mysql_result(mysql_query("SELECT COUNT(*) FROM `daugia` WHERE `site` = 1"),0);
if($total >= 1){
    echo'<div class="omenu"><div class="lt">Hiện tại đang có một cuộc đấu giá tại công viên. Tham gia ngay để rinh item xịn nhé</div></div>';
}

$n=mysql_num_rows(mysql_query("SELECT * FROM `nhabep_chebien` WHERE `user_id`='".$user_id."'"));
 if($n>0){

$c = mysql_fetch_assoc(mysql_query("SELECT * FROM `nhabep_chebien` WHERE `user_id`='".$user_id."'"));
$v = mysql_fetch_assoc(mysql_query("SELECT * FROM `nhabep_shop` WHERE `id`='".$c['chebien']."'"));
if($c['time'] <= time()){
	 echo'<div class="phdr">NHÀ BẾP</div>';

echo'<div class="omenu"><center><img src="/nongtrai/icon/nhabep/'.$v['id'].'.png"><br><b><font color="red">'.$v['ten'].'</font></b><br><font color="green">CHẾ BIẾN HOÀN TẤT</font><br><a href="/nongtrai/nhabep.php"><input type="submit"  value="HOÀN THÀNH"></a></center></div>';
}
 }
 /*
 $da1=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='99'"));
$da2=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='100'"));
$da3=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='101'"));
$da4=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='102'"));
$da5=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='103'"));
$da6=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='104'"));


	 echo'<div class="phdr">THÔNG TIN SỰ KIỆN </div>';
	 echo'<div class="omenu">Bắn '.$datauser['banphaohoa'].' <img src="https://i.imgur.com/DDv9Fai.png"> - '.$da6['soluong'].' <img src="/images/vatpham/104.png">
	 - '.$da1['soluong'].' <img src="/images/vatpham/99.png">
	 - '.$da2['soluong'].' <img src="/images/vatpham/100.png">
	 - '.$da3['soluong'].' <img src="/images/vatpham/101.png">
	 - '.$da4['soluong'].' <img src="/images/vatpham/102.png">
	 - '.$da5['soluong'].' <img src="/images/vatpham/103.png">
	 - '.$datauser['hopquakibi'].' <img src="/app/sukien16/images/hopquakibi.png"><a href="/app/sukien16/hopqua.php"><input type="button" value="Mở Ngay" class="nut"></a>
</div>';
echo'<div class="omenu"> <font color="red"><b>'.$datauser['diemsk16'].' Điểm Sự Kiện -</b></font><b><font color="green"> TOP Sự Kiện: '.$datauser['diemsk16'].'  Điểm</font> </b></div>';
echo'<div class="omenu"> <font color="red"><b>Chúc Thành Viên Lethinh2003.xyz có một sự kiện Mùa hẻ mát lạnh thật vui và sảng khoái!</b></font></div>';
 */
echo'<div class="phdr"><i class="fa fa-home"></i> TRUNG TÂM THÀNH PHỐ</div>';

echo'<div class="gd_">
<div style="text-align:center"> <br><table width="100%" border="0" cellspacing="0"><tbody><tr>
<td width="32%"> 
<a href="/cauca"><img src="//i.imgur.com/Vpeqir1.png" style="border: 1px solid#bce8f1;background-color: #EAF6FC;margin:2px 0;padding:10px;border-radius:5px;" height="45" width="45"></a>
<br><span style="background-color:#EAF6FC;"><font color="white" style="text-shadow: 0 0 0.2em #3399ff, 0 0 0.2em #3399ff,  0 0 0.2em #3399ff">Khu sinh thái</font></span>
</td>
<td width="32%"> 
<a href="/sanbay/"><img src="//i.imgur.com/9hTXsl0.png" alt="icon" height="45" width="45" style="border: 1px solid#bce8f1;background-color: #EAF6FC;margin:2px 0;padding:10px;border-radius:5px;"></a>
<br><span style="background-color:#EAF6FC;"><font color="white" style="text-shadow: 0 0 0.2em #3399ff, 0 0 0.2em #3399ff,  0 0 0.2em #3399ff">Sân bay</font></span>
</td></tr></tbody></table></div>
<div style="text-align:center"> <br><table width="100%" border="0" cellspacing="0"><tbody><tr>
<td width="32%"> 
<a href="/congvien"><img src="//i.imgur.com/JxESWWJ.png" alt="icon" height="45" width="45" style="border: 1px solid#bce8f1;background-color: #EAF6FC;margin:2px 0;padding:10px;border-radius:5px;"></a>
<br><span style="background-color:#EAF6FC;"><font color="white" style="text-shadow: 0 0 0.2em #3399ff, 0 0 0.2em #3399ff,  0 0 0.2em #3399ff">Công viên</font></span>
</td><td width="32%"> 
<a href="/khugiaitri"><img src="//i.imgur.com/DErvBaC.png" alt="icon" height="45" width="45" style="border: 1px solid#bce8f1;background-color: #EAF6FC;margin:2px 0;padding:10px;border-radius:5px;"></a>
<br><span style="background-color:#EAF6FC;"><font color="white" style="text-shadow: 0 0 0.2em #3399ff, 0 0 0.2em #3399ff,  0 0 0.2em #3399ff">Khu giải trí</font></span>
</td><td width="32%"> 
<a href="/shop"><img src="//i.imgur.com/wlQIZbQ.png" alt="icon" height="45" width="45" style="border: 1px solid#bce8f1;background-color: #EAF6FC;margin:2px 0;padding:10px;border-radius:5px;"></a>
<br><span style="background-color:#EAF6FC;"><font color="white" style="text-shadow: 0 0 0.2em #3399ff, 0 0 0.2em #3399ff,  0 0 0.2em #3399ff">Khu mua sắm</font></span>
</td></tr></tbody></table></div>
<div style="text-align:center"> <br><table width="100%" border="0" cellspacing="0"><tbody><tr>
<td width="32%"> 
<a href="/napthe"><img src="/icon/iconxoan/khuatm.png" alt="icon" height="45" width="45" style="border: 1px solid#bce8f1;background-color: #EAF6FC;margin:2px 0;padding:10px;border-radius:5px;"></a>
<br><span style="background-color:#EAF6FC;"><font color="white" style="text-shadow: 0 0 0.2em #3399ff, 0 0 0.2em #3399ff,  0 0 0.2em #3399ff">Khu nạp thẻ</font></span>

</td><td width="32%"> 
<a href="/farm/?xem"><img src="//i.imgur.com/tA8goGN.png" alt="icon" height="45" width="45" style="border: 1px solid#bce8f1;background-color: #EAF6FC;margin:2px 0;padding:10px;border-radius:5px;"></a>
<br><span style="background-color:#EAF6FC;"><font color="white" style="text-shadow: 0 0 0.2em #3399ff, 0 0 0.2em #3399ff,  0 0 0.2em #3399ff">Nông trại</font></span>
</td></tr></tbody></table></div><div style="text-align:center"> <br><table width="100%" border="0" cellspacing="0"><tbody><tr>
<td width="32%">
<a href="/bossthegioi/npc.php"><img src="https://i.imgur.com/SThfF6J.png" alt="icon" height="45" width="45" style="border: 1px solid#bce8f1;background-color: #EAF6FC;margin:2px 0;padding:10px;border-radius:5px;"></a>
<br><span style="background-color:#EAF6FC;"><font color="white" style="text-shadow: 0 0 0.2em #3399ff, 0 0 0.2em #3399ff,  0 0 0.2em #3399ff">Khu Boss thế giới</font></span>
</td></tr></tbody></table></div><div style="text-align:center"> <br><table width="100%" border="0" cellspacing="0"><tbody><tr>
<td width="32%">
<a href="/ssm"><img src="https://i.imgur.com/oYY24vu.gif" alt="icon" height="45" width="45" style="border: 1px solid#bce8f1;background-color: #EAF6FC;margin:2px 0;padding:10px;border-radius:5px;"></a>
<br><span style="background-color:#EAF6FC;"><font color="white" style="text-shadow: 0 0 0.2em #ff6633, 0 0 0.2em #ff6633,  0 0 0.2em #ff6633">Sổ Sứ Mệnh S1 <img src="/images/new.gif"></font></span>

</td><td width="32%">
<a href="/ngocrong/"><img src="https://i.imgur.com/f8tnaSw.png" alt="icon" height="45" width="45" style="border: 1px solid#bce8f1;background-color: #EAF6FC;margin:2px 0;padding:10px;border-radius:5px;"></a>
<br><span style="background-color:#EAF6FC;"><font color="white" style="text-shadow: 0 0 0.2em #ff6633, 0 0 0.2em #ff6633,  0 0 0.2em #ff6633">Ngọc Rồng</font></span>

</td></tr></tbody></table></div>
<div style="text-align:center"><a id="ok"><font color="red"><b><br><span style="background-color:#fff;">MỞ THÊM CHỨC NĂNG<br><i class="fa fa-plus-circle"></i></span></b></font></a><table width="100%" border="0" cellspacing="0"><tbody><tr></tr></tbody></table></div><br>
<div id="oke" style="display: none;">
<div style="text-align:center"><table width="100%" border="0" cellspacing="0"><tbody><tr>
<td width="32%"> <br>
<a href="/avatar/chotroi.php"><img src="/images/chotroi.png" alt="icon" height="45" width="45" style="border: 1px solid#bce8f1;background-color: #EAF6FC;margin:2px 0;padding:10px;border-radius:5px;"> 
<br><span style="background-color:#EAF6FC;"><font color="white" style="text-shadow: 0 0 0.2em #3399ff, 0 0 0.2em #3399ff,  0 0 0.2em #3399ff">Chợ trời</font></span>
</a></td><td width="32%"> 
<a href="/vip"><img src="/images/khuvucvip.png" alt="icon" height="45" width="45" style="border: 1px solid#bce8f1;background-color: #EAF6FC;margin:2px 0;padding:10px;border-radius:5px;">
<br><font color="white" style="text-shadow: 0 0 0.2em #3399ff, 0 0 0.2em #3399ff,  0 0 0.2em #3399ff">Khu vực VIP</font>
</a></td><td width="32%"> 
<a href="/langtruyenthuyet"><img src="/images/langtruyenthuyet.png" alt="icon" height="45" width="45" style="border: 1px solid#bce8f1;background-color: #EAF6FC;margin:2px 0;padding:10px;border-radius:5px;">
<br><span style="background-color:#EAF6FC;"><font color="white" style="text-shadow: 0 0 0.2em #3399ff, 0 0 0.2em #3399ff,  0 0 0.2em #3399ff">Làng truyền thuyết</font></span>
</a></td></tr></tbody></table></div>

<div style="text-align:center"> <br><table width="100%" border="0" cellspacing="0"><tbody><tr>
<td width="32%">
<a href="/khungoaio"><img src="/images/ngoaio.png" alt="icon" height="45" width="45" style="border: 1px solid#bce8f1;background-color: #EAF6FC;margin:2px 0;padding:10px;border-radius:5px;">
<br><span style="background-color:#EAF6FC;"><font color="white" style="text-shadow: 0 0 0.2em #3399ff, 0 0 0.2em #3399ff,  0 0 0.2em #3399ff">Khu ngoại ô</font></span>

</a></td><td width="32%"> 
<a href="/vip/shopvip.php"><img src="/images/shopvip.png" alt="icon" height="45" width="45" style="border: 1px solid#bce8f1;background-color: #EAF6FC;margin:2px 0;padding:10px;border-radius:5px;">
<br><span style="background-color:#EAF6FC;"><font color="white" style="text-shadow: 0 0 0.2em #3399ff, 0 0 0.2em #3399ff,  0 0 0.2em #3399ff">Shop VIP</font></span>

</a></td><td width="32%">
<a href="/nhom/boss"><img src="/images/bossclan.png" alt="icon" height="45" width="45" style="border: 1px solid#bce8f1;background-color: #EAF6FC;margin:2px 0;padding:10px;border-radius:5px;">
<br><span style="background-color:#EAF6FC;"><font color="white" style="text-shadow: 0 0 0.2em #3399ff, 0 0 0.2em #3399ff,  0 0 0.2em #3399ff">Khu Boss Clan</font></span>
</a></td></tr></tbody></table></div>
<div style="text-align:center"> <br><table width="100%" border="0" cellspacing="0"><tbody><tr>
<td width="32%">
<a href="/giakimthuat"><img src="https://i.imgur.com/hubN63g.png" alt="icon" height="45" width="45" style="border: 1px solid#bce8f1;background-color: #EAF6FC;margin:2px 0;padding:10px;border-radius:5px;">
<br><span style="background-color:#EAF6FC;"><font color="white" style="text-shadow: 0 0 0.2em #3399ff, 0 0 0.2em #3399ff,  0 0 0.2em #3399ff">Giả kim thuật</font></span>
</a></td>

</tr></tbody></table></div>


</div>
</div>';



}
}
if ($datauser['kichhoat'] == 1)
{


	echo'<div class="phdr"><i class="fa fa-music"></i> HỆ THỐNG NGHE NHẠC > <a href="/hethong/nhac.php"> Danh sách bài hát </a></div>';
$n = mysql_fetch_array(mysql_query("SELECT * FROM `nhac_user` WHERE `users` = '".$user_id."'  "));
$n2 = mysql_fetch_array(mysql_query("SELECT * FROM `nhac` WHERE `id` = '".$n['id_nhac']."'  "));
echo'<div class="gd_con">';

if ($datauser['batnhac']==0) {

	echo'<div class="omenu">
<center>Bạn chưa cài đặt bài hát nào! Hãy đến cài đặt bài hát để hưởng thức âm nhạc cùng '.$home.' nào ♫ <a href="/hethong/nhac.php"> Nhấp vào đây để tạo bài hát </a></center>
</div>';
} 
else if ($datauser['batnhac']==1) {

echo'<div class="omenu">
<center><b>Tên bài hát: </b>' . bbcode::tags(functions::smileys($n2['name'])) . '  - <b>' . bbcode::tags(functions::smileys($n2['casi'])) . '</b><br><audio src="'.$n2['link'].'" controls="" loop="1" style="width:50%"></audio></center>
</div>';
}
echo'</div>';
}
 
?>