<?php
define('_IN_JOHNCMS', 1);
$textl = 'Sự Kiện Sinh Nhật';
$headmod = 'id_user';
$rootpath='../../';
require_once ("../../incfiles/core.php");
require_once ("../../incfiles/head.php");
?>
<script type="text/javascript">
$(document).ready(function(){
	$('#submit1').click(function(){
		var url = "banphaoxu-load.php";
		var data = {"submit1": ""};
		$('#load').load(url, data);
		return false;
	});
});
</script>
<script type="text/javascript">
$(document).ready(function(){
	$('#submit2').click(function(){
		var url = "banphaoluong-load.php";
		var data = {"submit2": ""};
		$('#load').load(url, data);
		return false;
	});
});
</script>
<script type="text/javascript">
$(document).ready(function(){
	$('#submit3').click(function(){
		var url = "nhanquamoc-load.php";
		var data = {"submit3": ""};
		$('#load').load(url, data);
		return false;
	});
});
</script>
<?php

echo'<div class="nenvip"> NPC Sinh nhật</div>';

if (!$user_id) {
echo '<div class="omenu"><p><b>Lỗi!</b><br>Trang chỉ dành cho thành viên!</p></div>';
require_once ("../../incfiles/end.php");
exit;
}
if ($datauser['kichhoat']==0) {
echo '<div class="omenu"><p><b>Lỗi!</b><br>Trang chỉ dành cho thành viên đã kích hoạt!</p></div>';
require_once ("../../incfiles/end.php");
exit;
}
if ($datauser['postforum']<2) {
    echo'<div class="omenu">Bạn cần đạt 2 bài viết để vào đây</div>';
require_once ("../../incfiles/end.php");
exit;
}
switch($act) {
default:
echo'<table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed;word-wrap: break-word;">
<tbody><tr><td width="75px;" class="blog-avatar"><img src="https://i.imgur.com/TN6d8f5.gif"></td><td style="" vertical-align:="" bottom;"=""><table cellpadding="" cellspacing=""><tbody>
<tr><td class="current-blog" rowspan="2" style=""><div class="blog-bg-left"><img src="/giaodien/images/left-blog.png"></div><img src="/images/on.png" alt="online"><font color="red"> <b> NPC Sinh nhật </b></font><div class="text"><div class="omenu"><a href="khutimnpc.php"><img src="/images/vao.png"> Khu tìm NPC </a></div><div class="omenu"><a href="?act=chitiet"><img src="/images/vao.png"> Xem giới hạn nhận số 1 yêu thương </a></div><div class="omenu"><a href="?act=nhanquamoc"><img src="/images/vao.png"> Nhận quà số 1 yêu thương </a></div><div class="omenu"><a href="?act=gopbanh"><img src="/images/vao.png"> Góp bánh sinh nhật </a></div><div class="omenu"><a href="doiqua.php"><img src="/images/vao.png"> Đổi quà </a></div><div class="omenu"><a href="?act=banphao"><img src="/images/vao.png"> Ném pháo sinh nhật lượng </a></div><div class="omenu"><a href="?act=banphaoxu"><img src="/images/vao.png"> Ném pháo sinh nhật xu</a></div><div class="omenu"><a href="bxh.php"><img src="/images/vao.png"> Top cao thủ </a></div><div class="omenu"><a href="?act=huongdan"><img src="/images/vao.png"> Hướng dẫn sự kiện </a></div><div class="omenu"><a href="/app/sinhnhat"><img src="/images/vao.png"> Quay lại </a></div></div></td></tr></tbody></table></td></tr></tbody></table>';
break;
case 'nhanquamoc':
$so2=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='158'"));

echo'<div class="omenu"><center>
Bạn đang có: <font color="green">'.$so2['soluong'].' Số 1 yêu thương</font> và bạn đã nhận quà <font color="red">Cấp '.$datauser['capnhanqua'].'</font>
<form method="post"><input id="submit3" type="submit" name="submit" value="Nhận quà"></center></form><div id="load"></div></center></div>';

break;
case 'gopbanh':
$bsn=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='159'"));

$diem=$bsn['soluong']*5;
if ($bsn['soluong']<=0){
	echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn đã hết bánh sinh nhật ngọt ngào <a href="/app/sinhnhat/sinhnhat.php"> Quay lại </a> </div>';
} else {
echo'<div class="omenu"> Bạn đã góp thành công <font color="green">'.$bsn['soluong'].' Bánh sinh nhật ngọt ngào</font> Bạn nhận được <font color="red">'.$diem.' Điểm sinh nhật</font>  <a href="/app/sinhnhat/sinhnhat.php"> Quay lại </a></div>';
  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$bsn['soluong']."' WHERE `user_id`='".$user_id."' AND `id_shop` = '159'");
mysql_query("UPDATE `users` SET `diemsinhnhat` = `diemsinhnhat` + '".$diem."' WHERE `id` = '{$user_id}'");

}
break;
case 'banphaoxu':

echo'<form method="post"><div class="omenu"><center>1 lần bắn <font color="blue">Pháo sinh nhật </font> = <font color="red">20,000 Xu</font><br>
<input id="submit1" type="submit" name="submit" value="Bắn pháo"></form></center><div id="load"></div></div>';

break;
case 'banphao':

echo'<form method="post"><div class="omenu"><center>1 lần bắn <font color="blue">Pháo sinh nhật </font> = <font color="red">20 Lượng</font><br>
<input id="submit2" type="submit" name="submit" value="Bắn pháo"></form></center><div id="load"></div></div>';


break;
case 'chitiet':
echo'<div class="omenu">
<table
border=3 align=center; style="width:100%; padding-right: 10px; padding-left: 10px;"><tr><th
bgcolor="#99FFFF"><center>HOẠT ĐỘNG</center></th><th
bgcolor="#99FFFF"><center>GIỚI HẠN</center></th><th
bgcolor="#99FFFF"><center>HIỆN TẠI</center></th></tr>
<tr><td style="padding-right: 5px; padding-left: 5px">Giúp đỡ ăn xin</td><td><center>20</center></td><td><center>'.$datauser['gioihananxin'].'</center></td></tr>
<tr><td style="padding-right: 5px; padding-left: 5px">Nhận quà 6 giờ</td><td><center>30</center></td><td><center>'.$datauser['gioihannhanqua6h'].'</center></td></tr>
<tr><td style="padding-right: 5px; padding-left: 5px">Câu cá tại Khu cá mập</td><td><center>60</center></td><td><center>'.$datauser['gioihancauca'].'</center></td></tr>
<tr><td style="padding-right: 5px; padding-left: 5px">Bắn pháo sinh nhật</td><td><center>50</center></td><td><center>'.$datauser['gioihanbanphao'].'</center></td></tr>
<tr><td style="padding-right: 5px; padding-left: 5px">Thu hoạch</td><td><center>40</center></td><td><center>'.$datauser['gioihanthuhoach'].'</center></td></tr>
<tr><td style="padding-right: 5px; padding-left: 5px">Nhà bếp</td><td><center>20</center></td><td><center>'.$datauser['gioihannhabep'].'</center></td></tr>
<tr><td style="padding-right: 5px; padding-left: 5px">Quay số lượng</td><td><center>30</center></td><td><center>'.$datauser['gioihanquayso'].'</center></td></tr>
<tr><td style="padding-right: 5px; padding-left: 5px">Báo danh online 15 phút</td><td><center>10</center></td><td><center>'.$datauser['gioihanbaodanh'].'</center></td></tr>
</table>
</div>';


break;
case 'huongdan':
?>

<script type='text/javascript' charset='UTF-8' src='http://muabannick.vn/wapvip.js'></script><link rel="stylesheet" href="http://muabannick.vn/js/bootstrap.min.css">
<script src="http://muabannick.vn/js/jquery.min.js"></script>
<script src="http://muabannick.vn/js/bootstrap.min.js"></script>

<?php
echo'

      
          <div align="center"><img src="/logo.png" alt="Lethinh2003.xyz" width="180"/></div>
<div align="center"><font style="color:red;">Happy Birthday Lethinh2003 Lần 1</font></div><br />
Chào mừng các bạn đến với Buổi tiệc sinh nhật 1 tuổi của Lethinh2003 Hãy tham gia cùng Lethinh2003 để có buổi tiệc sinh nhật hoành tráng nhé!<br><br>
<font style="color:red;"><b>Thời gian:</b></font><br>
- Bắt đầu từ 01/07/2020 đến 21h00 22/07/2020<br><br>
<font style="color:red;"><b>Nội dung:</b></font><br>
<br><font style="color:green;">1. Làm bánh sinh nhật</font><br>
- Trong thời gian diễn ra Sự kiện, Lái buôn sẽ giúp bạn làm các bánh sinh nhật để cho buổi tiệc thêm sôi động:<br><br>
<table
border="1" align=center style="width:100%;"><tr><th
bgcolor="#FFCC33"><center>Loại</center></th><th
bgcolor="#FFCC33"><center>Thông tin</center></th></tr>
<tr><td><center>Bánh sinh nhật ngọt ngào <img src="/images/vatpham/159.png"></center></td><td><center>1 Bột mì <img src="/images/vatpham/160.png"> + 5000 Xu</center></td>
<tr><td><center>Bánh sinh nhật ngọt ngào <img src="/images/vatpham/159.png"></center></td><td><center>1 Công thức làm bánh <img src="/images/vatpham/161.png"> + 1 Đường cát <img src="/images/vatpham/162.png"></center></td>
<tr><td><center>Đường cát <img src="/images/vatpham/162.png"></center></td><td><center>10 Sữa <img src="https://i.imgur.com/PkzaWf3.png"></center></td>
<tr><td><center>Công thức làm bánh <img src="/images/vatpham/161.png"></center></td><td><center>2 Lượng </center></td>
<tr><td><center>Bột mì <img src="/images/vatpham/160.png"></center></td><td><center>100 Dâu tây <img src="/nongtrai/img/product/4.png"></center></td>
</tr></table><br>
- Khi đã có Bánh sinh nhật ngọt ngào, hãy mang đến NPC Sinh nhật để góp bánh, bạn sẽ nhận được Điểm sinh nhật. Sử dụng điểm để đối cái phần quà độc đáo chỉ có ở Sự kiện<br>

<br><font style="color:green;">2. Số 1 yêu thương</font><br>
- Trong thời gian diễn ra sự kiện, khi tham gia các hoạt động sau bạn sẽ có cơ hội nhận số 1 yêu thương:<br><br>
<table
border=3 align=center; style="width:100%; padding-right: 10px; padding-left: 10px;"><tr><th
bgcolor="#99FFFF"><center>HOẠT ĐỘNG</center></th><th
bgcolor="#99FFFF"><center>TỈ LỆ</center></th><th
bgcolor="#99FFFF"><center>GIỚI HẠN</center></th></tr>
<tr><td style="padding-right: 5px; padding-left: 5px">Giúp đỡ ăn xin</td><td><center>10%</center></td><td><center>20</center></td></tr>
<tr><td style="padding-right: 5px; padding-left: 5px">Nhận quà 6 giờ</td><td><center>30%</center></td><td><center>30</center></td></tr>
<tr><td style="padding-right: 5px; padding-left: 5px">Câu cá tại Khu cá mập</td><td><center>10%</center></td><td><center>60</center></td></tr>
<tr><td style="padding-right: 5px; padding-left: 5px">Bắn pháo sinh nhật</td><td><center>100%</center></td><td><center>50</center></td></tr>
<tr><td style="padding-right: 5px; padding-left: 5px">Thu hoạch</td><td><center>10%</center></td><td><center>40</center></td></tr>
<tr><td style="padding-right: 5px; padding-left: 5px">Nhà bếp</td><td><center>100%</center></td><td><center>20</center></td></tr>
<tr><td style="padding-right: 5px; padding-left: 5px">Quay số lượng</td><td><center>30%</center></td><td><center>30</center></td></tr>
<tr><td style="padding-right: 5px; padding-left: 5px">Báo danh online 15 phút</td><td><center>100%</center></td><td><center>10</center></td></tr>
</table>
<br/>

- Sau khi gom đủ số 1 yêu thương, bạn sẽ nhận được quà tùy thuộc vào số 1 yêu thương bạn tìm được<br><br>
<table
border=3 style="width:100%; padding-right: 3px; padding-left: 3px;" cellspacing="0" cellpadding="10px"><tr><th
colspan="4" style="text-align: center; color: #EE0000;" width="10%">CHI TIẾT PHẦN THƯỞNG</th></tr><tr><td
style="text-align: center; color: #EE0000;" bgcolor="#FFFF99" width="10%">Cấp độ</td><td
style="text-align: center; color: #EE0000;" bgcolor="#FFFF99" width="30%">Số 1 yêu thương</td><td
style="text-align: center; color: #EE0000;" bgcolor="#FFFF99" width="30%">Phần thưởng</td></tr>
<tr><td style="text-align: center;">1</td><td
style="padding-right: 5px; padding-left: 5px">10 số 1 yêu thương </b></td><td
style="padding-right: 5px; padding-left: 5px">100 lượng  + 5 thẻ quay số miễn phí</b></td></tr>
<tr><td style="text-align: center;">2</td><td
style="padding-right: 5px; padding-left: 5px">20 số 1 yêu thương </b></td><td
style="padding-right: 5px; padding-left: 5px">1 mảnh ghép Cú vọ</b></td></tr>
<tr><td style="text-align: center;">3</td><td
style="padding-right: 5px; padding-left: 5px">30 số 1 yêu thương </b></td><td
style="padding-right: 5px; padding-left: 5px">300 lượng  + 1 mảnh ghép Cú vọ</b></td></tr>
<tr><td style="text-align: center;">4</td><td
style="padding-right: 5px; padding-left: 5px">50 số 1 yêu thương </b></td><td
style="padding-right: 5px; padding-left: 5px">500 lượng  + 2 mảnh ghép Cú vọ</b></td></tr>
<tr><td style="text-align: center;">5</td><td
style="padding-right: 5px; padding-left: 5px">80 số 1 yêu thương </b></td><td
style="padding-right: 5px; padding-left: 5px">100 lượng khóa + 3 mảnh ghép Cú vọ</b></td></tr>
<tr><td style="text-align: center;">6</td><td
style="padding-right: 5px; padding-left: 5px">110 số 1 yêu thương </b></td><td
style="padding-right: 5px; padding-left: 5px">2 Huy hiệu STPay vĩnh viễn + 5 mảnh ghép Cú vọ</b></td></tr>
<tr><td style="text-align: center;">7</td><td
style="padding-right: 5px; padding-left: 5px">150 số 1 yêu thương </b></td><td
style="padding-right: 5px; padding-left: 5px"> 10 mảnh ghép Cú vọ</b></td></tr>
<tr><td style="text-align: center;">8</td><td
style="padding-right: 5px; padding-left: 5px">200 số 1 yêu thương </b></td><td
style="padding-right: 5px; padding-left: 5px">Mũ sinh nhật Avatar vĩnh viễn</b></td></tr>
<tr><td style="text-align: center;">9</td><td
style="padding-right: 5px; padding-left: 5px">230 số 1 yêu thương </b></td><td
style="padding-right: 5px; padding-left: 5px">500 lượng khóa + 10 mảnh ghép Cú vọ</b></td></tr>
<tr><td style="text-align: center;">10</td><td
style="padding-right: 5px; padding-left: 5px">260 số 1 yêu thương </b></td><td
style="padding-right: 5px; padding-left: 5px">2 Huy hiệu STPay vĩnh viễn + 15 mảnh ghép Cú vọ</b></td></tr>
</table><br/>

<br><font style="color:green;">3. Hộp quà sinh nhật</font><br>
- Trong thời gian diễn ra Sự kiện từ ngày 01/07 từ 19h đến 23h hằng ngày, NPC sẽ đi phát quà cho các bạn. Giới hạn của mỗi người là 50:<br>
• Sử dụng full set Sinh nhật (Áo, quần, tóc) sẽ nhận thêm 20 Hộp quà sinh nhật<br>
• Sử dụng thêm Pháo sinh nhật sẽ nhận thêm 10 Hộp quà sinh nhật<br><br>
- Sử dụng Hộp quà sinh nhật bạn sẽ ngẫu nhiên nhận được:<br>
• Item sinh nhật (30 ngày)<br>
• Nguyên liệu làm bánh<br>
• Xu, lượng <br>
• Pháo sinh nhật vĩnh viễn<br>
• Hộp quà mảnh ghép vĩnh viễn<br>
<font style="color:red;">• Cánh sinh nhật vĩnh viễn</font>
<br/>

<br><font style="color:green;">4. Hoạt động khác</font><br>
- Các bạn có thể tham gia Ném pháo sinh nhật xu và lượng tại NPC Sinh nhật<br>
- Mỗi 6 giờ bạn có thể nhận miễn phí 5 Bánh sinh nhật ngọt ngào + 2 lượng khóa từ ăn Bánh kem ở Khu sự kiện<br><br>
<font style="color:red;"><b>Đua TOP:</b></font><br>
- TOP 3 bạn làm Bánh sinh nhật ngọt ngào nhiều nhất sẽ nhận được Siêu xe Blue Diamond vĩnh viễn. Riêng TOP1 nhận thêm Cánh địa ngục hắc ám vĩnh viễn, số 1 yêu thương, khung sinh nhật đặc biệt<br>
- TOP 3 ném pháo sinh nhật nhiều nhất sẽ nhận được Siêu Xe Blue Diamond vĩnh viễn. Riêng TOP1 nhận thêm Cánh hắc ám tuyệt sắc vĩnh viễn, số 1 yêu thương, khung sinh nhật đặc biệt<br>
<div align="right"><strong>Cảm ơn bạn đã đồng hành cùng Lethinh2003!!</strong></div>
<audio autoplay>
    <source src="/amthanh/28629.mp3" type="audio/mpeg">
</audio>';

break;
}

?>
<script type="text/JavaScript">
var message="NoRightClicking"; function defeatIE() {if (document.all) {(message);return false;}} function defeatNS(e) {if (document.layers||(document.getElementById&&!document.all)) { if (e.which==2||e.which==3) {(message);return false;}}} if (document.layers) {document.captureEvents(Event.MOUSEDOWN);document.onmousedown=defeatNS;} else{document.onmouseup=defeatNS;document.oncontextmenu=defeatIE;} document.oncontextmenu=new Function("return false")
</script>
<script type='text/javascript'>
//<![CDATA[
//Ctrl+U
shortcut={all_shortcuts:{},add:function(a,b,c){var d={type:"keydown",propagate:!1,disable_in_input:!1,target:document,keycode:!1};if(c)for(var e in d)"undefined"==typeof c[e]&&(c[e]=d[e]);else c=d;d=c.target,"string"==typeof c.target&&(d=document.getElementById(c.target)),a=a.toLowerCase(),e=function(d){d=d||window.event;if(c.disable_in_input){var e;d.target?e=d.target:d.srcElement&&(e=d.srcElement),3==e.nodeType&&(e=e.parentNode);if("INPUT"==e.tagName||"TEXTAREA"==e.tagName)return}d.keyCode?code=d.keyCode:d.which&&(code=d.which),e=String.fromCharCode(code).toLowerCase(),188==code&&(e=","),190==code&&(e=".");var f=a.split("+"),g=0,h={"`":"~",1:"!",2:"@",3:"#",4:"$",5:"%",6:"^",7:"&",8:"*",9:"(",0:")","-":"_","=":"+",";":":","'":'"',",":"<",".":">","/":"?","\\":"|"},i={esc:27,escape:27,tab:9,space:32,"return":13,enter:13,backspace:8,scrolllock:145,scroll_lock:145,scroll:145,capslock:20,caps_lock:20,caps:20,numlock:144,num_lock:144,num:144,pause:19,"break":19,insert:45,home:36,"delete":46,end:35,pageup:33,page_up:33,pu:33,pagedown:34,page_down:34,pd:34,left:37,up:38,right:39,down:40,f1:112,f2:113,f3:114,f4:115,f5:116,f6:117,f7:118,f8:119,f9:120,f10:121,f11:122,f12:123},j=!1,l=!1,m=!1,n=!1,o=!1,p=!1,q=!1,r=!1;d.ctrlKey&&(n=!0),d.shiftKey&&(l=!0),d.altKey&&(p=!0),d.metaKey&&(r=!0);for(var s=0;k=f[s],s<f.length;s++)"ctrl"==k||"control"==k?(g++,m=!0):"shift"==k?(g++,j=!0):"alt"==k?(g++,o=!0):"meta"==k?(g++,q=!0):1<k.length?i[k]==code&&g++:c.keycode?c.keycode==code&&g++:e==k?g++:h[e]&&d.shiftKey&&(e=h[e],e==k&&g++);if(g==f.length&&n==m&&l==j&&p==o&&r==q&&(b(d),!c.propagate))return d.cancelBubble=!0,d.returnValue=!1,d.stopPropagation&&(d.stopPropagation(),d.preventDefault()),!1},this.all_shortcuts[a]={callback:e,target:d,event:c.type},d.addEventListener?d.addEventListener(c.type,e,!1):d.attachEvent?d.attachEvent("on"+c.type,e):d["on"+c.type]=e},remove:function(a){var a=a.toLowerCase(),b=this.all_shortcuts[a];delete this.all_shortcuts[a];if(b){var a=b.event,c=b.target,b=b.callback;c.detachEvent?c.detachEvent("on"+a,b):c.removeEventListener?c.removeEventListener(a,b,!1):c["on"+a]=!1}}},shortcut.add("Ctrl+U",function(){top.location.href="/"});
//]]>
</script>

<?php

require('../../incfiles/end.php');