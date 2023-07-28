<?php
define('_IN_JOHNCMS',1);
$rootpath='../../';

require('../../incfiles/core.php');
$headmod='Khu kết hôn';
$textl='Khu kết hôn';
require('../../incfiles/head.php');
if(!$user_id){
header('Location: /dangnhap.html');
exit;
}
mysql_query("UPDATE `users` SET `viewleduong` = '1' WHERE `id` = '".$user_id."'");


echo'<div class="phdr"><center>♡Khu Lễ Đường♡</center></div>';
 $tr=mysql_query("SELECT * FROM `leduong`");
$checktr=mysql_num_rows($tr);
if ($checktr<1) {
	echo'<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Hiện tại chưa có hôn lễ nào đang diễn ra</div>';
	require('../../incfiles/end.php');
	exit;

}
$leduong = mysql_fetch_array(mysql_query("SELECT * FROM `leduong` WHERE `time`>'0' "));
$cc=mysql_fetch_array(mysql_query("SELECT * FROM  `users` WHERE `id`='".$leduong[user_id]."'"));
$cc2=mysql_fetch_array(mysql_query("SELECT * FROM  `users` WHERE `id`='".$leduong[nguoi_ay]."'"));

echo'<div class="omenu"><center> <b><font size="3" class="fmod"><span class="love">Happy Webding of '.$cc['name'].' ♡ '.$cc2['name'].'</span></font><br>

<br><img src="/avatar/'.$leduong['user_id'].'.png"> <i class="longlanh">♡♡ </i>  <img src="/avatar/'.$leduong['nguoi_ay'].'.png" class="xavt"><br><font class="tuoitho"> <i class="longlanh">'.date("d/m/Y - H:i", $leduong['time']).'</i> </font><br><br><a href="leduong.php"><button><font color="blue"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Vào Lễ Đường<i class="fa fa-hand-o-left" aria-hidden="true"></i></font></button></a><br><br></b><form method="post"><b><center>Mừng xu: <input type="number" name="xu"><br>
<input type="submit" name="mung" value="Mừng"><br>Tiền mừng được gửi tới cặp đôi này!</center></b></form></center></div>';
if(isset($_POST['mung'])){
	$xu=(int)$_POST['xu'];
	if ($datauser['id']==$leduong[user_id] or $datauser['id']==$leduong[nguoi_ay] ){
					echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn không được tự mừng cho mình!</div>';
	} else 
if (empty($xu) or $xu<0){
			echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn chưa nhập xu</div>';
} else 
	if ($datauser['xu']<$xu){
		echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn không đủ xu</div>';
	} else {
		mysql_query("UPDATE `users` SET `xu` =`xu`- '$xu' WHERE `id` = '".$user_id."'");

		mysql_query("UPDATE `users` SET `xu` =`xu`+ '$xu' WHERE `id` = '".$leduong[user_id]."'");
		mysql_query("UPDATE `users` SET `xu` =`xu`+ '$xu' WHERE `id` = '".$leduong[nguoi_ay]."'");
$text = ' '.$login.' vừa mừng lễ cho bạn  '.number_format($xu).' xu, cảm ơn ngay!!! ';







mysql_query("INSERT INTO `thongbao` SET
                `id` = '".$user_id."',
                `user` =  '".$leduong[user_id]."',
                `text` = '$text',
                `ok` = '1',
                `time` = '" . time() . "'
            ");
mysql_query("INSERT INTO `thongbao` SET
                `id` = '".$user_id."',
                `user` = '".$leduong[nguoi_ay]."',
                `text` = '$text',
                `ok` = '1',
                `time` = '" . time() . "'
            ");
				echo'<div class="omenu">Mừng lễ thành công '.number_format($xu).' xu!!</div>';
	}
}

require('../../incfiles/end.php');
?>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-162107419-1');
</script><style>
 .love {
progress;
  background: url('/icon/trai-tim.gif');
}
.tuoitho {
progress;
  background: url('/icon/tuoitho.gif');
}
.longlanh { 
progress;
  background: url('/icon/longlanh.gif');
}</style>

<script type="text/javascript">
$(function(){
   // kich hoat nhac tet tren mobile
   var audio = $("#audio").get(0);
   audio.load();
   audio.play();
});
</script>
<script>/***** Khát Vọng Việt - Trái Tim Rơi Trên Blog *****/if(typeof $pdj=='undefined'){document.write('<'+'script');document.write(' language="javascript"');document.write(' type="text/javascript"');document.write(' src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js">');document.write('</'+'script'+'>')}</script><script>if(typeof $pdj=='undefined'){var $pdj=jQuery.noConflict()}if(!image_urls){var image_urls=Array()}if(!flash_urls){var flash_urls=Array()}image_urls['corazon']="http://lh6.googleusercontent.com/-7-WYEBOVd7c/TzMiej4AFcI/AAAAAAAACLc/w2Fn6N9jwIU/s32/heart.png";$pdj(document).ready(function(){var c=$pdj(window).width();var d=$pdj(window).height();var e=function(a,b){return Math.round(a+(Math.random()*(b-a)))};var f=function(a){setTimeout(function(){a.css({left:e(0,c)+'px',top:'-30px',display:'block',opacity:'0.'+e(10,100)}).animate({top:(d-10)+'px'},e(8500,10000),function(){$pdj(this).fadeOut('slow',function(){f(a)})})},e(1,9000))};$pdj('<div></div>').attr('id','corazonDiv').css({position:'fixed',width:(c-20)+'px',height:'1px',left:'0px',top:'-5px',display:'block'}).appendTo('body');for(var i=1;i<=15;i++){var g=$pdj('<img/>').attr('src',image_urls['corazon']).css({position:'absolute',left:e(0,c)+'px',top:'-30px',display:'block',opacity:'0.'+e(10,100),'margin-left':0}).addClass('corazonDrop').appendTo('#corazonDiv');f(g);g=null};var h=0;var j=0;$pdj(window).resize(function(){c=$pdj(window).width();d=$pdj(window).height()})});</script>