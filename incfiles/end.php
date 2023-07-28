<?php
defined('_IN_JOHNCMS') or die('Error: restricted access');
  if (!$user_id) {

echo'</div>';

echo'</div>';
echo'</div>';


} else {
echo'</div>';

echo'</div>'; 
}
if (!empty($cms_ads[0]))
echo '<div class="func"><b>' . $cms_ads[0] . '</b></div>';
if (!$user_id) {
echo'
<div class="clearfix"></div></div><br></div></br>';
echo'<div class="left_b_bottom"><div class="right_b_bottom"><div class="footer"><div class="left_bottom"></div><div class="right_bottom"></div></div></div></div><div class="copyright">';
echo'<div class="on">';
echo'</div>';
echo'<b>Mạng Xã Hội Avatar Online- Version 2.2</b><br><i>Phát triển và thành lập ngày 20/04/2020</i></br>';

}
if ($user_id) {

echo'<div class="clearfix"></div></div><br></div></div><br></div>';
echo'<div class="left_b_bottom"><div class="right_b_bottom"><div class="footer"><div class="left_bottom"></div><div class="right_bottom"></div></div></div></div><div class="copyright">';
echo'<div class="on">';
echo'</div>';
echo'<b>Mạng Xã Hội Avatar Online- Version 2.2</b><br><i>Phát triển và thành lập ngày 20/04/2020</i></br><center><select name="forma" onchange="location = this.options[this.selectedIndex].value">
<option value="/">Trang chủ</option>
<option value="/hotro">Gửi hỗ trợ</option>
</select></center>';

}
?>
<script>
var offset = 600;
var duration = 950;
$(function(){
$(window).scroll(function () {
if ($(this).scrollTop() > offset) $('#top-up').fadeIn(duration);
else $('#top-up').fadeOut(duration);
});
$('#top-up').click(function () {
$('body,html').animate({scrollTop: 0}, duration);
});
});
</script>
<div id="top-up"><i class="fa fa-arrow-circle-o-up"></i></div>
<style>
#top-up {
background:none;
font-size: 3em;
cursor: pointer;
position: fixed;
z-index: 99999;// đè lên tất cả nôị dung đi qua nó
color: #3688c7;
bottom: 50px;
right: 25px;
display: none;
}
</style>
<style type="text/css"> 
a:hover 
{
color:red;


} 
a{color:#ad4105;}
</style>
<script type="text/javascript"> 


$('#poke').click(function() {  
$('#spoke').toggle('fast','linear');  
}); 
setInterval(function(){
 $( "#thongbao" ).load( "/thongbao.php" );
 }, 2000);
</script>