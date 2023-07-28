<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');

$headmod = 'mail';
$textl = 'Mail';
require('../incfiles/head.php');
$lv = lv($user_id);
if($id == $user_id){
Header('location: /member/'.$id.'.html');
exit;
}
if($datauser['kichhoat'] <= 0 AND $id != 1){
echo'<div class="phdr">Lỗi yêu cầu</div><div class="omenu"><font color="red"><b>Lỗi!!</font></b> Bạn vui lòng kích hoạt tài khoản để sử dụng chức năng này</div>';
} else if($datauser['postforum'] <= 10 ){
echo'<div class="phdr">Lỗi yêu cầu</div><div class="omenu"><font color="red"><b>Lỗi!!</font></b> Bạn vui lòng đạt trên 10 bài viết để sử dụng chức năng này</div>';
} else {
echo "<script>
var loadad = '<audio id=audioplayer autoplay=true><source src=ping.mp3 type=audio/mpeg></audio>';
var loadcontent = '<div class=menu>Đang tải dữ liệu chat <img src=https://i.imgur.com/VKAdQvl.gif></div>';
var loadsubmit = '<img src=https://i.imgur.com/XJICQrg.gif style=margin-bottom:-10px>';
$(document).ready(function(){
$(\"textarea\").on(\"keydown\", function(event) {
    if (event.keyCode == 13)
        if (!event.shiftKey) $(\"#shoutbox2\").submit();
});
$(\"#datachat2\").html(loadcontent);
$(\"#datachat2\").load(\"mail_chat.php?id=$id&page=$page\");
var refreshId = setInterval(function() {
$(\"#datachat2\").load('$home/mail/mail_chat.php?id=$id&page=$page');
$(\"#datachat2\").slideDown(\"slow\");
}, 4000);
$(\"#shoutbox2\").validate({
debug: false,
submitHandler: function(form) {
$('#loader2').fadeIn(400).html(loadsubmit);
$('#audio2').fadeIn(400).html(loadad);
$.post('$home/mail/mail_chat.php?id=$id&page=$page', $(\"#shoutbox2\").serialize(),function(chatoutput) { 
$(\"#datachat2\").html(chatoutput);
$('#loader2').hide();
});
$(\"#msg2\").val(\"\");
}
});

});
</script>";


echo '<div class="phdr"><i class="fa fa-comments-o"></i> Trò chuyện</div><div class="lucifer">';
echo''.bbcode::auto_bb('shoutbox2', 'msg').'';
echo'</div><div class="menu">

<div style="padding-bottom:4px;">';


echo '<form name="shoutbox2" id="shoutbox2" action="" method="post">

<textarea placeholder="Nhấn Gửi hoặc nhấn ENTER để gửi" id="msg2" name="msg" style="max-width:98%;padding-top:10px;"></textarea>

<br /><a href="/upanh"/><b>(Gửi Hình) </b></a><button type="submit" name="submit" class="nut">Gửi</button><span id="loader2"></span></form></div></div>';

echo '<div id="audio2"></div><div id="datachat2">
</div>';

//--Kết thúc Phòng Chát//
}

///////////////////////////////////////////////////////////////////////////////
//|                  ↪ะCode Mod by PKoolVN ↩                       |//
//|                    ༺Facebook: pkoolvn༻                          |//
//|                ༺Gmail: pkoolvn@gmail.com༻               |//
//|                   ༺ COPY NHỚ GHI NGUỒN༻                 |//
////////////////////////////////////////////////////////////////////////////////
echo'</div>';
echo'</div>';
if (!empty($cms_ads[0]))
echo '<div class="func"><b>' . $cms_ads[0] . '</b></div>';
echo'<div class="clearfix"></div></div><br></div></div><br></div>';
echo'<div class="left_b_bottom"><div class="right_b_bottom"><div class="footer"><div class="left_bottom"></div><div class="right_bottom"></div></div></div></div><div class="copyright">';
echo'<div class="on">';
echo'</div>';
echo '<font color="Blue"> Phiên Bản Version 1.2 <br>Bản Quyền Thuộc Về ©<a href="https://facebook.com/lethinhpro123"><font color="red">Lethinh</font></a> </font></b></br><a href="/mod/noiquy.php"><font color="003366"> Điều Khoản Sử Dụng</font></a></b>';
echo '</div>';
echo '</body></html>';
?>
<script type="text/javascript"> 
$('#poke').click(function() {  
$('#spoke').toggle('fast','linear');  
}); 
</script>