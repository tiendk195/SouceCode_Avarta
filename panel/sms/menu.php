<?php
if ($user_id) {
$list = array();
$new_sys_mail = mysql_result(mysql_query("SELECT COUNT(*) FROM `cms_mail` WHERE `from_id`='$user_id' AND `read`='0' AND `sys`='1' AND `delete`!='$user_id';"), 0);
if ($new_sys_mail) $list[] = '<div class="list2"><center><a href="' . $home . '/mail/index.php?act=systems">&nbsp;&nbsp;<img src="/mail/images/thongbaomoi.gif"><font color="red"><b> Bạn có ' . $new_sys_mail . ' thông báo chưa đọc</b></font></a></div></center>';
if (!empty($list)) echo'' . functions::display_menu($list, ', ') . '';

}
require('nhanqua.php');
if(time() > $datauser['tgonline'] + 300 ){

}
if ($user_id) {
echo '<div class="phdr"> <i class="fa fa-space-shuttle"></i> Bản Đồ Thành Phố</div>';
echo'<div class="pmenu"><div style="text-align:center"><table width="100%" border="0" cellspacing="0"><br/><td width="32%">';

echo'<a href="/farm"><img src="/images/farmloc.png"/><br/><b><i>Nông Trại</a>';
echo'</td><td width="32%">';
echo'<a href="/shop"><img src="/images/muasamloc.png"/><br/><i><b>Khu mua Sắm</a>';
echo'</td><td width="35%">';
echo'<a href="' . $set['homeurl'] . '/khugiaitri"><img src="/images/giaitri.png"/><br/><i><b>Khu Giải Trí</a>';
echo'</td></tr></table></div>';
echo'<div style="text-align:center"><table width="100%" border="0" cellspacing="0"><br/><td width="32%">';
echo'<a href="/khusinhthai"><img src="/khusinhthai/lozz.png"/><br/><i><b>Khu sinh thái</a>';
echo'</td><td width="32%">';
echo'<a href="/congvien"><img src="/congvien/congvien.png"/><br/><i><b>Công Viên</a>';
echo'</td><td width="35%">';
echo'<a href="/sanbay"><img src="/images/sanbay.png"/><br/><i><b>Sân Bay</a>';
echo'</td></tr></table></div>';

echo'<div style="text-align:center"><table width="100%" border="0" cellspacing="0"><br/><td width="32%">';
echo'<a href="/khugiaitri/ngoaio.php"><img src="/icon/ngoaio.png"/><br/><i><b>Bãi Đất Trống</a>';
echo'</td><td width="32%">';
echo'<a href="/chotroi"><img src="/images/chotroi.png" width="35"/><br/><i><b>Chợ Trời</a>';
echo'</td><td width="35%">';
echo'<a href="/sukien"><img src="/ducnghia/sukien.png"width="35" height="35"><br/><i><b>Trung Thu</a><br>';
echo'</td><td width="32%">';
echo'</td></tr></table>';


echo'</td></tr></table>';



echo'<br/></div></div></b></i>';
if ($user_id) {
//////////////

echo'';
////////////
?>
<script>
function tag(text1, text2) {
              if ((document.selection)) {
                document.shoutbox.msg.focus();
                document.shoutbox.document.selection.createRange().text = text1+document.shoutbox.document.selection.createRange().text+text2;
              } else if(document.forms['shoutbox'].elements['msg'].selectionStart!=undefined) {
                var element = document.forms['shoutbox'].elements['msg'];
                var str = element.value;
                var start = element.selectionStart;
                var length = element.selectionEnd - element.selectionStart;
                element.value = str.substr(0, start) + text1 + str.substr(start, length) + text2 + str.substr(start + length);
              } else {
                document.shoutbox.msg.value += text1+text2;
              }
            }
            function show_hide(elem) {
              obj = document.getElementById(elem);
              if( obj.style.display == "none" ) {
                obj.style.display = "block";
              } else {
                obj.style.display = "none";
              }
}
         
</script>
<?php
$n = mysql_fetch_array(mysql_query("SELECT * FROM `nhac` WHERE `id` = '1' "));
$nick = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$n['users']."' "));
 echo'<div class="phdr"><i class="fa fa-music"></i> Nghe Nhạc ';
if($datauser['kichhoat'] >= 1){
echo'<a href="/pages/nhac.php"><b> <i class="fa fa-cogs" style="font-size:12px"></i></b></a>';
}
echo'</div>';
echo'<div class="omenu"> <center><b> ' . bbcode::tags(functions::smileys($n['text'])) . ' </b><br><i ><p align="right">Đăng Bởi : <font color="red">'.$nick['name'].'</font></i></p>
    <audio loop="true" src="'.$n['link'].'" controls="controls" style="width:100%">  </audio> 
   </center></div>';
echo'<div class="box_list_parent_index">';
//--Phòng Chát--//
echo '<div class="phdr"><table width="100%" cellpadding="0" cellspacing="0"><tr><td width="auto"><a href="/converse/index.php"><b><i class="fa fa-paper-plane"></i> Trò Chuyện</b></a> <i class="fa fa-hashtag"></i> <a href="/pages/faq.php"> <i>Bảng Icon</i></a></td></tr></table></div><div class="mainblok">';
if($user_id){

if ($datauser['kichhoat']==1) {

$refer = base64_encode($_SERVER['REQUEST_URI']);
$token = mt_rand(1000, 100000);
$_SESSION['token'] = $token;
echo '<div class="lucifer"><form name="shoutbox" id="shoutbox" action="/converse/index.php?act=say" method="post">';

echo'<textarea placeholder="" id="msg" name="msg"></textarea><input type="hidden" name="ref" value="'.$refer.'"/><input type="hidden" name="token" value="'.$token.'">
<br /><select name="forma" onchange="location = this.options[this.selectedIndex].value;">
<option value="/">Chat Thường</option>
<option value="/mod/wnew.php">Chát Thế Giới</a></option>
</select> <input type="submit" name="submit" value="' . $lng['sent'] . '">
 </form></div>';
} else {
echo '<div class="news"><b><center> Tài Khoản của bạn chưa kích hoạt,hãy ấn vào <a href="/users/checkpoint.php"> <font color="red"><b> Đây </font></b> </a> để kích hoạt miễn phí</center></b></div>';
}
} else {
echo '<div class="list1">Bạn Cần <a href="/dangnhap.html"> Đăng nhập </a> hoặc <a href="/dangki.html"> Đăng Kí </a> để chém gió nhé</div>';
}
echo '<div id="datachat"><i class="fa fa-cog fa-spin fa-3x fa-fw"></i>
<span class="sr-only">Loading...</span></div>';
echo '</div>';
//--Kết thúc Phòng Chát//
echo'</div>';

}

if($datauser['khac'] >= 1){

echo'<div class="phdr"> Tính Năng Đệ Tử </div>';
echo'<a id="nghia"><div class="omenu"><center><font color="green"><b>[ Mở Menu Đệ Tử ]</b></font></b></center></div></a><div id="ducnghia" style="display: none;">';
if($datauser['sex']==m){
if($datauser['hopthe'] <= 0){
echo'<div class="omenu"><a href="/hopthe/hopthenam.php">Hợp Thể <img src="../images/smileys/simply/hot_.gif"/></a></div>';
echo'<div class="omenu"><a href="/hopthe/bongtainam.php">Hợp Thể Porata <img src="../images/smileys/simply/hot_.gif"/> </a></div>';

}

}

else
if($datauser['sex']==zh){
    if($datauser['hopthe'] <= 0){
echo'<div class="omenu"><a href="/hopthe/hopthenu.php">Hợp Thể <img src="../images/smileys/simply/hot_.gif"/></a></div>';
echo'<div class="omenu"><a href="/hopthe/bongtainu.php">Hợp Thể Porata <img src="../images/smileys/simply/hot_.gif"/> </a></div>';}


}
if($datauser['hopthe'] >= 1){

echo'<div class="omenu"><a href="/hopthe/tach.php">Tách Hợp Thể <img src="../images/smileys/simply/hot_.gif"/></a></div>';}

    

echo'</div>';

}
if($user_id){
echo'<div class="phdr"><i class="fa fa-paper-plane"></i> Bài viết mới';
echo'</div>';




$req = mysql_query("SELECT * FROM `forum` WHERE `type` = 't' and kedit='0' AND `close`!='1' ORDER BY `time` DESC LIMIT $start,10");
$view = mysql_query("UPDATE forum SET view = view + 1 WHERE id = $id");
$total = mysql_result(mysql_query("SELECT COUNT(*) FROM `forum` WHERE `type` = 't' and kedit='0' AND `close`!='1'"), 0);
while ($arr = mysql_fetch_array($req)) {
$q3 = mysql_query("select `id`, `refid`, `text` from `forum` where type='r' and id='" . $arr['refid'] . "'");
$razd = mysql_fetch_array($q3);
$q4 = mysql_query("select `id`, `refid`, `text` from `forum` where type='f' and id='" . $razd['refid'] . "'");
$frm = mysql_fetch_array($q4);
$nikuser = mysql_query("SELECT `from`,`id`, `time` FROM `forum` WHERE `type` = 'm' AND `close` != '1' AND `refid` = '" . $arr['id'] . "'ORDER BY time DESC");
$colmes1 = mysql_num_rows($nikuser);
$nam = mysql_fetch_array($nikuser);
$trang4 = mysql_query("SELECT * FROM `forum_thank` WHERE `topic` = '" . ($arr['id'] + 1) . "'");
$trang5 = mysql_num_rows($trang4);
$laynoidung = mysql_fetch_array(mysql_query("SELECT `text` FROM `forum` WHERE `type`='m' AND `refid`='" . $arr['id'] . "'"));
$gettop = mysql_fetch_assoc(mysql_query("SELECT * FROM `forum` WHERE `type` = 'r' and id = '".$arr['refid']."'"));
$chuyenmuc = $gettop['text'];
$laynoidung = mysql_fetch_array(mysql_query("SELECT `text` FROM `forum` WHERE `type`='m' AND `refid`='" . $arr['id'] . "'"));
$chude = $arr['text'];
$chude = html_entity_decode($chude, ENT_QUOTES,'UTF-8');
$chude = functions::checkout(mb_substr($chude, ($pos - 100), 50), 1);
echo is_integer ( $i / 2 ) ? '<div class="list1">' : '<div class="list1">' ;
echo'' . ($arr['edit'] == 1 ? '<img src="../images/khoatopic.gif" alt=""/>' : ' <img src="/images/bv.gif">') . ' <a href="'.$home.'/forum/' . $arr['id'] . '.html" title="' . $chude . '">';
if ($arr['vip'] == 1)
echo '<b>';
if ($arr['indam'] == 1)
echo '<b>';
echo '<font color="2c5170">' .functions::smileys($chude). '</font></a>';
if ($arr['indam'] == 1)
echo '</b>';
if ($arr['vip'] == 1)
echo '</b> <img src="../images/smileys/simply/hot_.gif"/>';
if (mb_strlen($arr['text']) > 50)
echo'...';
echo'<br/>';
$n = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$arr['user_id']."'"));
echo'<span style="font-size:11px;color:#333;"><i class="fa fa-user" aria-hidden="true"></i>

 Bởi: </span>';
if($n['rights'] <= 8){
echo'<small><a href="'.$home.'/member/'.$arr['user_id'].'.html" title="' . $chude . '">'.$n['name'].'</small></a>';
}
if($n['rights'] >= 9){
echo'<small><a href="'.$home.'/member/'.$arr['user_id'].'.html" title="' . $chude . '"><font color="red"><b>'.$n['name'].'</b></font></small></a>';
}
echo'<span style="font-size:11px;color:#666;"><i> Trả lời: <i class="fa fa-comment"></i> ' . $colmes1 . ' - Xem '.$arr['view'].'';
if ($trang5 !== 0) echo '<font color="red"> [♥' . $trang5. ']</font>';

echo '</i></span></div>';
++$i;
}

echo '<div class="phdr"><i class="fa fa-paper-plane"></i> Trung Tâm TuoiTre4u </div>';
echo'<div class="list1"><a href="/forums/3.html"><b><font color="2c5170">Thông Báo</font></b></a><br/>';
echo'Những thông tin mới nhất từ BQT<br/>';
$value = 2;
$t = mysql_result(mysql_query("SELECT COUNT(*) FROM `forum` WHERE `type` = 't' and kedit='0' AND `refid` = '3'"), 0);
$req_6 = mysql_query("SELECT * FROM `forum` WHERE `kedit` = '0' AND `type` = 't' AND `close`!='1' AND `refid` = '3' ORDER BY `vip` DESC,`time` DESC LIMIT $value");while ($hoanganh = mysql_fetch_assoc($req_6)) {
if ($hoanganh['vip'] == 1)
echo '<b>';
if ($hoanganh['indam'] == 1)
echo '<b>';
echo '<img src="/images/bv.gif"/> <a href="'.$home.'/forum/'.$hoanganh['id'].'.html"><span style="size:8px;">' .$hoanganh['text'] . '</span></a>';
if ($hoanganh['indam'] == 1)
echo '</b>';
if ($hoanganh['vip'] == 1)
echo '</b> <img src="../images/smileys/simply/hot_.gif"/>';
echo'<br/>';
$i ;
}

echo'</div>';
echo'<div class="list1"><a href="/forums/4.html"><b><font color="2c5170">Góp Ý - Hỏi Đáp</font></b></a><br/>';
echo'Mọi hỏi đáp thắc mắc hoặc đóng góp ý kiến cho diễn đàn hãy đăng bài tại đây !<br/>';
$value = 2;
$t = mysql_result(mysql_query("SELECT COUNT(*) FROM `forum` WHERE `type` = 't' and kedit='0' AND `refid` = '4'"), 0); 
$req_6 = mysql_query("SELECT * FROM `forum` WHERE `kedit` = '0' AND `type` = 't' AND `close`!='1' AND `refid` = '4' ORDER BY `vip` DESC,`time` DESC LIMIT $value");
while ($hoanganh = mysql_fetch_assoc($req_6)) {
if ($hoanganh['vip'] == 1)
echo '<b>';
if ($hoanganh['indam'] == 1)
echo '<b>';
echo '<img src="/images/bv.gif"/> <a href="'.$home.'/forum/'.$hoanganh['id'].'.html"><span style="size:8px;">' .$hoanganh['text'] . '</span></a>';
if ($hoanganh['indam'] == 1)
echo '</b>';
if ($hoanganh['vip'] == 1)
echo '</b> <img src="../images/smileys/simply/hot_.gif"/>';
echo'<br/>';
$i ;
}
echo'</div>';
}
echo'<div class="list1"><a href="/forum/index.php?id=6"><b><font color="2c5170">Báo Lỗi</font></b></a><br/>';
echo'Nếu gặp lỗi trên diễn đàn hãy lập topic ở đây để được giải đáp nhé!<br/>';
$value = 2;
$t = mysql_result(mysql_query("SELECT COUNT(*) FROM `forum` WHERE `type` = 't' and kedit='0' AND `refid` = '6'"), 0);
$req_6 = mysql_query("SELECT * FROM `forum` WHERE `kedit` = '0' AND `type` = 't' AND `close`!='1' AND `refid` = '6' ORDER BY `vip` DESC,`time` DESC LIMIT $value");
while ($hoanganh = mysql_fetch_assoc($req_6)) {
if ($hoanganh['vip'] == 1)
echo '<b>';
if ($hoanganh['indam'] == 1)
echo '<b>';
echo '<img src="/images/bv.gif"/> <a href="'.$home.'/forum/'.$hoanganh['id'].'.html"><span style="size:8px;">' .$hoanganh['text'] . '</span></a>';
if ($hoanganh['indam'] == 1)
echo '</b>';
if ($hoanganh['vip'] == 1)
echo '</b> <img src="../images/smileys/simply/hot_.gif"/>';
echo'<br/>';
$i ;
}
echo'</div>';
echo'<div class="phdr"><i class="fa fa-paper-plane"></i> Khu Vui Chơi - Giải Trí</div>';
echo'<div class="list1"><a href="/forum/index.php?id=11"><b><font color="2c5170">Sự Kiện Diễn Đàn</font></b></a><br/>';
echo'Nơi diễn ra các sự kiện!<br/>';
$$value = 2;
$t = mysql_result(mysql_query("SELECT COUNT(*) FROM `forum` WHERE `type` = 't' and kedit='0' AND `refid` = '11'"), 0);
$req_6 = mysql_query("SELECT * FROM `forum` WHERE `kedit` = '0' AND `type` = 't' AND `close`!='1' AND `refid` = '11' ORDER BY `vip` DESC,`time` DESC LIMIT $value");
while ($hoanganh = mysql_fetch_assoc($req_6)) {
if ($hoanganh['vip'] == 1)
echo '<b>';
if ($hoanganh['indam'] == 1)
echo '<b>';
echo '<img src="/images/bv.gif"/> <a href="'.$home.'/forum/'.$hoanganh['id'].'.html"><span style="size:8px;">' .$hoanganh['text'] . '</span></a>';
if ($hoanganh['indam'] == 1)
echo '</b>';
if ($hoanganh['vip'] == 1)
echo '</b> <img src="../images/smileys/simply/hot_.gif"/>';
echo'<br/>';
$i ;
}
echo'</div>';

echo'<div class="list1"><a href="/forum/index.php?id=13"><b><font color="2c5170">Góc Thành Viên</font></b></a><br/>';
echo' Nơi Dành Cho Các Bạn Chém Gió, Khoe Gấu... <br/>';

$$value = 2;
$t = mysql_result(mysql_query("SELECT COUNT(*) FROM `forum` WHERE `type` = 't' and kedit='0' AND `refid` = '13'"), 0);
$req_6 = mysql_query("SELECT * FROM `forum` WHERE `kedit` = '0' AND `type` = 't' AND `close`!='1' AND `refid` = '13' ORDER BY `vip` DESC,`time` DESC LIMIT $value");
while ($hoanganh = mysql_fetch_assoc($req_6)) {
if ($hoanganh['vip'] == 1)
echo '<b>';
if ($hoanganh['indam'] == 1)
echo '<b>';
echo '<img src="/images/bv.gif"/> <a href="'.$home.'/forum/'.$hoanganh['id'].'.html"><span style="size:8px;">' .$hoanganh['text'] . '</span></a>';
if ($hoanganh['indam'] == 1)
echo '</b>';
if ($hoanganh['vip'] == 1)
echo '</b> <img src="../images/smileys/simply/hot_.gif"/>';
echo'<br/>';
$i ;
}
echo'</div>';
echo'<div class="list1"><a href="/forums/10.html"><b><font color="2c5170">Chợ Trời</font></b></a><br/>';
echo'Dành cho các bạn muốn đăng bán các món đồ có giá trị ở trợ trời !<br/>';
$value = 2;
$t = mysql_result(mysql_query("SELECT COUNT(*) FROM `forum` WHERE `type` = 't' and kedit='0' AND `refid` = '10'"), 0);
$req_6 = mysql_query("SELECT * FROM `forum` WHERE `kedit` = '0' AND `type` = 't' AND `close`!='1' AND `refid` = '10' ORDER BY `vip` DESC,`time` DESC LIMIT $value");
while ($hoanganh = mysql_fetch_assoc($req_6)) {
if ($hoanganh['vip'] == 1)
echo '<b>';
if ($hoanganh['indam'] == 1)
echo '<b>';
echo '<img src="/images/bv.gif"/> <a href="'.$home.'/forum/'.$hoanganh['id'].'.html"><span style="size:8px;">' .$hoanganh['text'] . '</span></a>';
if ($hoanganh['indam'] == 1)
echo '</b>';
if ($hoanganh['vip'] == 1)
echo '</b> <img src="../images/smileys/simply/hot_.gif"/>';
echo'<br/>';
$i ;
}
echo'</div>';
echo'<div class="list1"><a href="/forum/index.php?id=12"><b><font color="2c5170">Box Clan</font></b></a><br/>';
echo'Nơi dành riêng cho các bạn đã có clan !<br/>';
$value = 2;
$t = mysql_result(mysql_query("SELECT COUNT(*) FROM `forum` WHERE `type` = 't' and kedit='0' AND `refid` = '12'"), 0);
$req_6 = mysql_query("SELECT * FROM `forum` WHERE `kedit` = '0' AND `type` = 't' AND `close`!='1' AND `refid` = '12' ORDER BY `vip` DESC,`time` DESC LIMIT $value");
while ($hoanganh = mysql_fetch_assoc($req_6)) {
if ($hoanganh['vip'] == 1)
echo '<b>';
if ($hoanganh['indam'] == 1)
echo '<b>';
echo '<img src="/images/bv.gif"/> <a href="'.$home.'/forum/'.$hoanganh['id'].'.html"><span style="size:8px;">' .$hoanganh['text'] . '</span></a>';
if ($hoanganh['indam'] == 1)
echo '</b>';
if ($hoanganh['vip'] == 1)
echo '</b> <img src="../images/smileys/simply/hot_.gif"/>';
echo'<br/>';
$i ;
}
echo'</div>';
}
if (!$user_id) {

echo'<div class="phdr"><center><i class="fa fa-hashtag"></i> Giới Thiệu Về MXH TuoiTre4u</center></div>
<center><div class="menu" style="padding-bottom: 4px">
<table width="100%" border="0" cellspacing="0"><tbody><tr style="vertical-align: top;">
<td width="33%" class="gtc1"><i class="fa fa-user-plus" style="font-size:15pt"></i></br><span style="font-size:13pt"><b><span class="xanhduong">Thành Viên Mới</span></b></span></br>
Thành viên sau khi tham gia mạng xã hội sẽ được tặng ngay 3 tỉ xu và 1.000 lượng. Ngoài ra khi tham gia bạn sẽ nhận được item tân thủ hấp dẫn
</td>
<td width="33%" class="gtc2">
<i class="fa fa-github-alt" style="font-size:15pt"></i></br><span style="font-size:13pt"><b><span class="xanhla">Hệ Thống Game</span></b></span></br>
Với nhiều trò chơi như: Đánh boss, ăn trộm, đánh caro, nông trại, nâng cấp, quay số, câu cá, mua sắm đồ,...Chắc chắn sẽ khiến bạn hài lòng và có những phút giây giải trí sau mỗi ngày làm việc
</td>
<td width="33%" class="gtc3"><i class="fa fa-comments" style="font-size:15pt"></i>
</br><span style="font-size:13pt"><b><span class="datroi">Trò Chuyện</span></b></span></br>
Phòng chat, forum và hộp thư chính là công cụ giúp bạn giao lưu và trò chuyện với các thành viên khác. Bạn có thể bày tỏ tâm sự, chia sẻ niềm vui, hay đơn giản là chém gió, tám cùng mọi người ^^ Bạn sẽ xả một đống stress khỏi cơ thể :)</td>
</tr></tbody></table></div></center>';}
//echo '<div class="phdr"> <b>THỐNG KÊ DIỄN ĐÀN</br></div>';
//echo '<div class="omenu"><b>'; 
//echo' Thành viên: <font color="blue">' .number_format(mysql_result(mysql_query("SELECT COUNT(*) FROM `users`"), 0)) . '</font>'; 
//echo' Nam: <font color="blue">' .number_format(mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `sex` = 'm'"), 0)) . '</font>'; 
//echo' Nữ: <font color="blue">' .number_format(mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `sex` = 'zh'"), 0)) . '</font>'; 
//echo' Chủ đề: <font color="blue">' .number_format(mysql_result(mysql_query("SELECT COUNT(*) FROM `forum` WHERE `type` = 't' AND `close` != '1'"), 0)) . '</font>'; 
//echo' Bài viết: <font color="blue">' .number_format(mysql_result(mysql_query("SELECT COUNT(*) FROM `forum` WHERE `type` = 'm' AND `close` != '1'"), 0)) . '</font>';
//echo'</b></font></div>';

// Thống kê online by Hoàng Anh
$usere = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `lastdate` > '" . (time() - 300) . "'"), 0);
$tamune = mysql_result(mysql_query("SELECT COUNT(*) FROM `cms_sessions` WHERE `lastdate` > '" . (time() - 300) . "'"), 0);
$total = $total+$googlebot+$msnbot+$yandexbot+$bingbot+$yahoobot+$baidu+$DoCoMo+$AhrefsBot+$Sosospider+$usere+$tamune;
$users = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `lastdate` > '" . (time() - 300) . "'"), 0);
$guests = mysql_result(mysql_query("SELECT COUNT(*) FROM `cms_sessions` WHERE `lastdate` > '" . (time() - 300) . "'"), 0);
$total = $users+$guests;
mysql_query("UPDATE `users` SET $sql `total_on_site` = '$totalonsite', `lastdate` = " . time() . " WHERE `id` = '7'");
if ($user_id) {


echo'<div class="phdr"><i class="fa fa-line-chart"></i>  Đang có '.($user_id || $set['active'] ? '<a href="/users/index.php?act=online"><font color="f8f8ff">'.$users.'' : $users).'</font></a> thành viên online</div>';

echo'<div class="omenu"><center><a id="click"><font color="red"><b>[ Xem thành viên đang online ]</b></font></b></center></a></div>';
echo'<div id="show" style="display: none;">';
echo'<div class="pmenu">';
include 'incfiles/on.php';
echo '</div>';
echo'</div>';
}
?>
<script type="text/javascript"> 
$('#forum').click(function() {  
$('#forums').toggle('fast','linear');  
}); 
$('#p').click(function() {  
$('#okay').toggle('fast','linear');  
}); 
$('#click').click(function() {  
$('#show').toggle('fast','linear');  
}); 
$('#pkoolvn').click(function() {  
$('#showpkoolvn').toggle('fast','linear');  
}); 
$('#pclick').click(function() {  
$('#pshow').toggle('fast','linear');  
}); 
$('#nhac').click(function() {  
$('#snhac').toggle('fast','linear');  
}); 
$('#nghia').click(function() {  
$('#ducnghia').toggle('fast','linear');  
}); 
</script>