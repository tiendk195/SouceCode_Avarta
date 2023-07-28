<script type="text/javascript"> 
setInterval(function(){
 $( "#wnew" ).load( "/pages/wnew-load.php" );
 }, 10000);
</script>
<?php
include "botonline.php";
if(!$user_id){
?>
<style>
body{
background: #eee url(https://i.imgur.com/Tf66ze1.png) no-repeat center fixed;background-size: cover;
}
</style>
<?php
/*


echo'<div class="nenda" style="height:80px;margin:0;"><div class="lethinh"><center><font color="red"><img src="/img/admin.png"> Admin:</font></center> Từ 01/07/2020, MXH Thitran9x.tk chỉnh thức nâng cấp với nhiều chức năng mới, hãy giới thiệu bạn bè cùng tham gia nhé!</div><center>
<a href="dangnhap.html"><input class="nut" value="Đăng nhập" style="padding:1px;" type="submit"></a> <a href="dangki.html"><input class="nut" value="Đăng kí" style="padding:1px;" type="submit"></a></center>


</div>';



echo'<div class="lethinh"><center><font color="green">Tại sao bạn nên tham gia MXH Thitran9x.tk</font></center>
<br><table width="100%" border="0" cellspacing="0">
<tbody><tr><td width="50%"><a href="/"><img src="http://teamobi.com/home/images/games/1395045680_icon-avatar-128.png" width="60px"><br><b><font color="red"> Vision 1.2 </font></b></a></td>
<td width="50%">
• Hoạt động hơn 2 năm<br>
• Dễ dàng kích hoạt chỉ cần <font color="blue">FB</font> hoặc  <font color="red">SĐT</font><br>
• Gần <font color="red">1,000</font> thành viên<br>
• Gần <font color="red">5,000</font> item, vật phẩm mới lạ<br>
• <font color="green">Event</font> được tổ chức liên tiếp theo mùa</td>
</tr></tbody></table></div>';
echo'<div class="omenu"><div class="lt"><font size="4&quot;" color="red">Thông tin diễn đàn</font><br>';

echo'
● Phiên bản: <font color="green">Version 1.2</font> <br>
● Cập nhật: <b>24/04/2020 - 08:11</b><br>
● Thành viên: <b>' .number_format(mysql_result(mysql_query("SELECT COUNT(*) FROM `users`"), 0)) . '</b><br>
● Chủ đề: <font color="red">  ' .number_format(mysql_result(mysql_query("SELECT COUNT(*) FROM `forum` WHERE `type` = 't' AND `close` != '1'"), 0)) . ' </font><br>
● Bài Viết: <font color="red">  ' .number_format(mysql_result(mysql_query("SELECT COUNT(*) FROM `forum` WHERE `type` = 'm' AND `close` != '1'"), 0)) . '</font><br>
</div><br></div>';
*/

echo'<div class="lethinh"><div style="background:url(https://i.imgur.com/1TtYtea.gif)"><center><font color="green">Tại sao bạn nên tham gia MXH Werfamily?</font></center>
<br><table width="100%" border="0" cellspacing="0">
<tbody><tr><td width="50%"><div style="text-align:center"><img src="/assets/images/slides/7.png" width="95" alt="logo"><br><font color="red">Phiên bản 4.0</font></div></td>
<td width="50%">
• Tên cũ: Thitran9x<br>

• Hoạt động hơn 1 năm<br>
• Hoàn toàn miễn phí, không tốn phí kích hoạt<br>
• Hệ thống Chức năng mới mẻ, hấp dẫn<br>
• Gần <font color="red">5,000</font> item, vật phẩm mới lạ<br>
• <font color="green">Event</font> được tổ chức liên tiếp theo mùa</td>
</tr></tbody></table></div></div>';

    echo'<div class="bg-content">
    <div>
        <div class="title">
            <h4>Hình ảnh</h4>
        </div>  <br>
    <div class="w3-content w3-display-container">
    <center>
                <img class="mySlides" src="/assets/images/slides/1.png" style="width: 100%; display: none;">

        <img class="mySlides" src="/assets/images/slides/2.png" style="width: 100%; display: none;">
        <img class="mySlides" src="/assets/images/slides/3.png" style="width: 100%; display: none;">
        <img class="mySlides" src="/assets/images/slides/4.png" style="width: 100%; display: none;">
        <img class="mySlides" src="/assets/images/slides/5.png" style="width: 100%; display: none;">
        

        
    </center>
    </div> 

    </div>
    <script>
        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            myIndex++;
            if (myIndex > x.length) {
                myIndex = 1
            }
            x[myIndex - 1].style.display = "block";
            setTimeout(carousel, 2000);
        }
    </script><div class="bg-content">
    <div>
        <div class="title">
            <h4>Giới Thiệu</h4>
        </div>
        <div class="content" style="text-indent: 3%">
            <p>
            </p><p>MXH chơi trực tiếp trên Website các bạn không cần cấu hình điện thoại cũng như giải quyết vấn đề cấu hình, bộ nhớ cho dế yêu của bạn</p>
            <p>Đăng kí nhanh gọn và hoàn toàn miễn phí, các đơn vị tiền tệ ảo trong game cũng vô cùng dễ cày</p>
            <p>Các bạn có thể cày cuốc từ Nông trại: thu hoạch cây trồng; thu hoạch nông sản để chế biến các món ăn vô cùng phong phú</p>
            <p>Ngoài ra, bạn còn có thể câu cá để kiếm tiền, có những người sát cá lắm nhé, chỉ cần câu cá là giàu đc thôi! Liệu bạn có câu được nhiều cá không? Hãy thử và xem khả năng mình đến đâu nhé!</p>
            <p>Nhân vật của bạn trong Thành Phố Werfamily sẽ trở nên lộng lẫy biết bao nhiêu khi được trang bị những bộ đồ siêu đẹp! Bộ đồ mặc cho nhân vật còn thể hiện sự cá tính, phong cách của bạn nữa! Thật tuyệt vời đúng không nào.</p>
            <p>Nếu cảm thấy mệt mỏi muốn giải trí, đừng quên ghé các Game mini của Werfamily: đua pet, caro cùng và bầu cua cùng bạn bè để xả strees thật thoải mái nhé</p>
            
            
            </div><div class="bg-content">
        <div class="title">
            <h4>Hướng dẫn tân thủ</h4></div>
        <div class="content" style="text-indent: 3%">
            <p><strong>1. Đăng kí tài khoản</strong></p>

            <ul>
            </ul>

            <p>- MXH <b>Werfamily</b> không sử dụng chung tài khoản với bất kì MXH hay Website khác nào!
            </p><p> - Bạn có thể đăng kí miễn phí ngay <a href="/dangki.html" style="color: black"><b>tại
                        đây</b></a></p>
            <p> - Khi đăng ký, bạn nên sử dụng đúng số điện thoại thật của mình. Nếu sử dụng thông
                tin sai, người có số điện thoại thật sẽ có thể lấy mật khẩu của bạn.</p>
            <p>- Số điện thoại và email của bạn sẽ không hiện ra cho người khác thấy. Admin không bao giờ hỏi
                mật khẩu của bạn.</p>

            <p><strong>2. Bạn nên biết?</strong></p>

            <ul>
            </ul>

            <p>- Tài khoản Werfamily đăng kí hoàn toàn miễn phí. Cam kết sẽ không gửi tin nhắn trừ tiền.</p>
             <p> -  Làm nhiệm vụ, quay số, hoàn thành các nhiệm vụ sẽ giúp bạn nhận được điểm kinh nghiệm lên Cấp nhanh hơn.</p>
             <p>    - Tham gia đánh Boss thế giới sẽ giúp bạn có lợi nhuận đáng kể.</p>
            <p>     - Nông sản trong Nông trại sẽ giúp bạn rất nhiều ở các Sự kiện.</p>
             <p>    - Cường hóa sức mạnh ở Boss thế giới sẽ giúp bạn có sức mạnh đáng kể và tiêu diệt Boss thế giới nhanh hơn.</p>
             <p>    - Chỉ duy nhất loại thẻ có thể nạp ở Werfamily là <font color="red">Thẻ 1STPay </font> Ngoài ra thẻ 1STPay không thể nạp cho bất kì game hay MXH nào khác.</p>
        </div>
</div>
    </div>
<div class="bg-content">
        <div class="title">
            <h4>Hỗ trợ</h4></div>
        <div class="content" style="text-indent: 3%">
            <p><strong>1. Thông qua Facebook</strong></p>

            <ul>
            </ul>

            <p>- Hỗ trợ vấn đề: lỗi game, vấn đề tài khoản <a href="https://www.facebook.com/gaming/thitran9x">Fanpage Werfamily (Tên cũ: Thitran9x) </a></p>
                <p> - Hỗ trợ vấn đề nạp thẻ, lỗi tiền tệ <a href="https://www.facebook.com/lethinhpro123">Facebook Admin </a></p>


            <p><strong>2. Thông qua Gmail</strong></p>

            <ul>
            </ul>

            <p>- Liên hệ trực tiếp thông qua Thư điện tử: <b>muradvn2003@gmail.com</b></p>
        </div>

    </div></div>        <div class="bg-content"><div>
        <div class="title">
            <h4>Thông tin diễn đàn</h4></div>
        <div class="content"></div></div><br><div class="lethinh">
<table width="100%" border="0" cellspacing="0">
<tbody><tr><td width="50%"><img src="/assets/images/slides/7.png" width="85" alt="logo"></td>
<td width="50%">
● Phiên bản: <font color="green">Version 4.0</font> - Cập nhật <b>01/08/2021</b><br>
● Thành viên: <b>' .number_format(mysql_result(mysql_query("SELECT COUNT(*) FROM `users`"), 0)) . '</b><br>
● Ngày thành lập: <font color="red">20/04/2020</font></td>
</tr></tbody></table>
</div><br>
<div class="title"></div>
</div></div>';
}




include('map.php');
include "update_danhde.php";
include "update.php";
require('nhanqua.php');
if ($user_id) {

/*
if ($datauser['kichhoat']!=1){
    echo'<div class="phdr">KÍCH HOẠT TÀI KHOẢN</div>';
    echo'<div class="news"><center> - Nhằm tránh quảng cáo waps, cũng như acc ảo. Vui lòng kích hoạt! - Bạn vào đây để kích hoạt miễn phí : <b><a href="/users/checkpoint.php">Kích hoạt</a></b></center></div>';
}
*/
}


echo'<div class="box_list_parent_index">';
//chat box ajax
if ($user_id ) {
    echo'<div class="phdr"><i class="fa fa-wechat"></i> TRÒ CHUYỆN ';
    if ($datauser['rights']>=9){
echo'<a href="/pages/thongbao.php"> - Chat Thông Báo</a>';
echo'<a href="/pages/guithongbao.php"> - Gửi Thông Báo</a>';

}
echo'</b></div>';

    $vipham = mysql_fetch_array(mysql_query("SELECT * FROM `ls_chanchat` WHERE `user_id`='" . $user_id. "'"));
if ($datauser['chanchat'] == 1)
{
    echo '<div class="omenu"><b>Bạn đã bị <font color="red">chặn chat bởi '.$vipham['ban_who'].'</font></br>Nêu cảm thấy đây là hiểu lầm, vui lòng gửi hỗ trợ <a href="/hotro">tại đây</a></b></div>';

}

 else {
     /*
echo'<center><div class="pmenu"><font color="red">Admin <img src="/img/admin.png"></font> Hãy chat <font color="green"><a href="javascript:tag(\'\', \'Pokemon\', \'\')">Pokemon</a></font> để nhận quà sau mỗi 1 giờ nhé ^^</div></center>';
*/
//echo'<div class="lucifer">Chat <b><a href="javascript:tag(\'\', \'sukien15 \', \'\')">sukien15</a></b> Để Nhận Quà Sự Kiện 1-5</div>';
//--Phòng Chát--//
echo'<div class="gd_con"><div class="menu">';
echo'<span id="wnew"></span>';
if (time()>$datauser['timeline']+6*60*60) {

echo'<div class="pmenu"><center><font color="red"><b><i class="fa fa-thumb-tack"></i> Admin:</b></font> Hãy chat 
<i><font color="green">nhanqua</font></i> để nhận quà sau mỗi 6 giờ nhé!</center></div>';
}
/*
$olabytom = mysql_fetch_array(mysql_query("SELECT * FROM `wnew` ORDER BY `id` DESC LIMIT 1"));
$tinhtimeht = time() - $olabytom['time'];
if($tinhtimeht <= 200){
$idchat = $olabytom['user'];
$nick = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$idchat."'"));
echo'<div class="omenu" style="border:1px solid #3883CC;"><marquee><b><font color="red">Tin nhắn từ '.$nick['name'].'</font></b>: ' . bbcode::tags(functions::smileys($olabytom['text'])) . '</marquee></div>';
}
*/
$token = mt_rand(1000, 100000);
$_SESSION['token'] = $token;
$X=$_SESSION['5S']-time()+1;
$refer = base64_encode($_SERVER['REQUEST_URI']);





echo'
<div class="list_chat"><table width="100%" cellpadding="0" cellspacing="0"><tbody><tr><td width="auto"><a href="/"><b><font color="#FFFFFF"></font></b></a></td></tr></tbody></table>
<table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed;word-wrap: break-word;">
<tbody><tr><td width="45px;" class="blog-avatar"><img src="../avatar/'.$user_id.'.png" width="45" height="48" alt="'.$user_id.'" align="top">&nbsp;</td><td style="vertical-align: bottom;"><table cellpadding="0" cellspacing="0">
<tbody><tr><td class="current-blog" rowspan="2" style="">
<div class="blog-bg-left"><img src="/giaodien/images/left-blog.png"></div><div class="newsx">
<form name="shoutbox" id="shoutbox" action="/converse/index.php?act=say" method="post"><textarea type="text" rows="3" placeholder="'.($_SESSION['5S']>time()?'Bạn chat quá nhanh vui lòng đợi '.$X.' giây':'').'"id="msg" name="msg"></textarea>
<input type="submit" name="submit" value="Chat"/></input><span  id="loader" style="display: none;"></span></form>
</div></td></tr></tbody></table></td></tr></tbody></table></div>';


echo'
</div>';

include('incfiles/icon.php');


echo'</div>';



}


echo'<div class="gd_">';

echo '<div id="datachat">';
echo'</div>';
echo'</div>';


}


            

if ($user_id) {
if($datauser['laynhiem'] == 1 ) {
} else {
echo'<div class="phdr">  BÀI VIẾT MỚI NHẤT</div>';
echo'<div class="gd_"><div style="overflow: auto;height:200px">';





$req = mysql_query("SELECT * FROM `forum` WHERE `type` = 't' and kedit='0' AND `close`!='1' ORDER BY `time` DESC LIMIT $start,6");
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
$trang6 = mysql_query("SELECT * FROM `forum_thank1` WHERE `topic` = '" . ($arr['id'] + 1) . "'");
$trang7 = mysql_num_rows($trang6);
$trang8 = mysql_query("SELECT * FROM `forum_thank2` WHERE `topic` = '" . ($arr['id'] + 1) . "'");
$trang9 = mysql_num_rows($trang8);
$trang10 = mysql_query("SELECT * FROM `forum_thank3` WHERE `topic` = '" . ($arr['id'] + 1) . "'");
$trang11 = mysql_num_rows($trang10);
$laynoidung = mysql_fetch_array(mysql_query("SELECT `text` FROM `forum` WHERE `type`='m' AND `refid`='" . $arr['id'] . "'"));
$gettop = mysql_fetch_assoc(mysql_query("SELECT * FROM `forum` WHERE `type` = 'r' and id = '".$arr['refid']."'"));
$chuyenmuc = $gettop['text'];
$laynoidung = mysql_fetch_array(mysql_query("SELECT `text` FROM `forum` WHERE `type`='m' AND `refid`='" . $arr['id'] . "'"));
$chude = $arr['text'];
$chude = html_entity_decode($chude, ENT_QUOTES,'UTF-8');
$chude = functions::checkout(mb_substr($chude, ($pos - 100), 50), 1);

echo is_integer($i / 2) ? '<div class="pmenu">' : '<div class="pmenu">';

 
      echo' <i class="fa fa-pencil"></i>';
 

echo' <a href="'.$home.'/forum/' . $arr['id'] . '.html" title="' . $chude . '">';
if ($arr['realid'] == 1)
echo ' <img src="images/rate.gif" alt=""/> ';
if ($arr['indam'] == 1) {
echo '<b>';
if ($arr['edit'] == 1 ){
echo '<font color="2c5170">' .functions::smileys($chude). ' </font></a>';
   echo' <img src="../images/khoatopic.gif" alt=""/>';
} else {
    echo '<font color="2c5170">' .functions::smileys($chude). ' </font></a>';
}
echo '</b>';
} else {
if ($arr['vip'] == 1)
echo '';
if ($arr['edit'] == 1 ){

echo '<font color="#2C517B">' . bbcode::tags(functions::smileys($chude)) . '</font></a>';
   echo' <img src="../images/khoatopic.gif" alt=""/>';
} else {
    echo '<font color="#2C517B">' . bbcode::tags(functions::smileys($chude)) . '</font></a>';

}
    
}


if ($arr['vip'] == 1)
echo ' <img src="../images/smileys/simply/new.gif"/>';


if (mb_strlen($arr['text']) > 50)
echo'...';
if ($trang5 !== 0) echo '<font color="red"> [<img src="/images/like.gif" width="18" height="18">' . $trang5. ']</font>';
if ($trang7 !== 0) echo '<font color="red"> [<img src="/images/tim.gif" width="18" height="18">' . $trang7. ']</font>';
if ($trang9 !== 0) echo '<font color="red"> [<img src="/images/haha.gif" width="18" height="18">' . $trang9. ']</font>';
if ($trang11 !== 0) echo '<font color="red"> [<img src="/images/angry.gif" width="18" height="18">' . $trang11. ']</font>';
echo'<br/>';
		      $nguoidang=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$arr['user_id']."'"));

echo'<span style="font-size:11px;color:#333;">    Bởi : </span> <small><a href="'.$home.'/member/'.$arr['user_id'].'.html" title="' . $chude . '">'.$nguoidang['name'].'</small></a>';
echo'<span style="font-size:11px;color:#666;"><i> Trả lời: ' . $colmes1 . ' - Xem '.$arr['view'].'</i></span>';

echo '</div>';
echo'</td>
</tr>
</tbody>
</table>';
++$i;
}
}
echo'</div></div>';

}
//////

	if($datauser['laynhiem'] == 1 ) {
	//echo'<center><font color="red"><b>Chức năng chỉ dành cho người!!</font></b><img src="/zom.png"></center>';
}
else {
if ($user_id) {
    echo'<div class="phdr"><i class="fa fa-paper-plane"></i> CHUYÊN MỤC </div>';
    echo'
    <div class="gd_"><a id="vao"><div class="pmenu"><center><font color="red"><b> Bạn muốn đăng bài?<br><i class="fa fa-pencil"></i></b></font></center></div></a>
    
    <div id="ra" style="display: none;">';

$ddvn=mysql_query("SELECT * FROM `forum` WHERE `type`='f' ");
While($f=mysql_fetch_array($ddvn)){
    echo'<div class="gd_"><font color="red" style="text-transform: uppercase"><b><i class="fa fa-paper-plane"></i> '.$f['text'].'</b></font></div>';

$ddvn1=mysql_query("SELECT * FROM `forum` WHERE `type`='r' AND `refid`='".$f['id']."' ");
while($r=mysql_fetch_array($ddvn1)){
    echo'<div class="pmenu"><div class="gd_"><table width="100%" border="0" cellspacing="0"><tbody><tr class="">
<td width="50%"><div class="pmenu"><a href="/forum/'.$r['id'].'.html"><font color="#2C517B"><b> <i class="fa fa-'.$r['id_style'].'"></i> '.$r['text'].'</b></font></a><br><span style="color:black">'.$r['soft'].'</span></div></td><td width="50%">';

$ddvn2=mysql_query("SELECT * FROM `forum` WHERE `type`='t'" . ($rights >= 1 ? '' : " AND `close`!='1'") . " AND `refid`='".$r['id']."' ORDER BY `id` DESC LIMIT 2");
While($t=mysql_fetch_array($ddvn2)){
echo'<div class="pmenu">';

	if ($t['indam'] == 1) {
echo'<b><i class="fa fa-thumb-tack"></i><a href="/forum/'.$t['id'].'.html"><span style="size:8px"> ' .functions::smileys($t['text']). '</span></a></b>';

	} else {
if ($t['vip'] == 1)
echo '';

echo '<i class="fa fa-thumb-tack"></i> <a href="'.$home.'/forum/'.$t['id'].'.html"><span style="size:8px;">' . bbcode::tags(functions::smileys($t['text'])) . '</span></a>';
	}

if ($t['vip'] == 1)
echo '</b> <img src="../images/smileys/simply/new.gif"/>';
echo'</br>';
echo'</div>';


}
echo'</div>';
echo'</td></tr></tbody></table></div></div>';
}
}
//echo'</div>';
echo'</div>';
echo'</div>';

}
}


if ($user_id) {



// Thống kê online
$users = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `lastdate` > '" . (time() - 300) . "'"), 0);
mysql_query("UPDATE `users` SET $sql `total_on_site` = '$totalonsite', `lastdate` = " . time() . " WHERE `id` = '7'");echo'<div class="phdr"><i class="fa fa-line-chart"></i> THÀNH VIÊN TRỰC TUYẾN</div>';
//echo'<a id="monl"><div class="omenu"><center><font color="red">[ Xem thành viên đang online ]</font></b></center></div></a><div id="smonl" style="display: none;">';
echo'<div class="gd_"><div class="pmenu"><div style="overflow: auto;height:20px">';
include 'incfiles/on.php';
echo' </div></div></div>';

//echo'</div>';
include 'xuli.php';
echo'<table width="100%" border="0" cellspacing="0"><tbody><tr class="menu">
<td width="25%"><a href="https://www.facebook.com/gaming/thitran9x"><i class="fa fa-pagelines"></i> Fanpage</a></td>
<td width="25%"> <a href="#"><i class="fa fa-facebook-official"></i> Group</a></td>
<td width="25%"><a href="https://www.facebook.com/lethinhpro123"><i class="fa fa-mobile"></i> Liên hệ</a></td>
<td width="25%"><i class="fa fa-asterisk"></i> Phiên bản: 4.0</td>
</tr></tbody></table>';

}
echo'</div>';
if ($user_id) {
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
$('#menu2').click(function() {  
$('#smenu2').toggle('fast','linear');  
}); 
$('#monl').click(function() {  
$('#smonl').toggle('fast','linear');  
}); 

$('#pclick').click(function() {  
$('#pshow').toggle('fast','linear');  
}); 
$('#nhac').click(function() {  
$('#snhac').toggle('fast','linear');  
}); 
$('#icon').click(function() {  
$('#sicon').toggle('fast','linear');  
}); 
</script>
<script type="text/javascript"> 
$('#vao').click(function() {  
$('#ra').toggle('fast','linear');  
});
$('#ok').click(function() {  
$('#oke').toggle('fast','linear');  
}); 
$('#okla').click(function() {  
$('#oklala').toggle('fast','linear');  
}); 
$('#fuck').click(function() {  
$('#fucke').toggle('fast','linear');  
}); 
$('#test').click(function() {  
$('#tests').toggle('fast','linear');  
}); 
$('#testx').click(function() {  
$('#testxx').toggle('fast','linear');  
}); 
$('#stick').click(function() {  
$('#sticks').toggle('fast','linear');  
}); 
</script>



<script>
// Get the modal
var modal = document.getElementById("myModal");

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    modal.style.display = "none";
}
window.onload = function() {
    modal.style.display = "block";
}
</script>


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
}