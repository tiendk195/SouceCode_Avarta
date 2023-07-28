<?php
define('_IN_JOHNCMS', 1);
$textl = 'Sự Kiện Sinh Nhật';
$headmod = 'id_user';
$rootpath='../../';
require_once ("../../incfiles/core.php");
require_once ("../../incfiles/head.php");


echo'<div class="nenvip"><center>Sự kiện Sinh nhật </center></div>';

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
$botmi=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='160'"));
$congthuc=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='161'"));
$duongcat=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='162'"));
$v2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `fermer_sclad` WHERE `semen`='4' AND `id_user`='".$user_id."'"));
$v1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `fermer_sclad` WHERE `semen`='20' AND `id_user`='".$user_id."'"));
if (isset($_POST['submit'])) {
	$sl=(int)$_POST['sl'];
		$loai = $_POST['loai'];

		if (empty($sl)) {
		echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn chưa nhập số lượng</div>';
	} else if ($sl<0) {
				echo'<div class="omenu"><font color="red"><b>Lỗi!</b></font> Bạn chưa nhập số lượng</div>';
	} else {
		if ($loai==1){
			$tien=5000*$sl;
		if ($botmi['soluong']<$sl || $datauser['xu']<$tien){
			echo'<div class="omenu"><b><font color="red">Lỗi!</font></b> Bạn cần <font color="red">'.$sl.' Bột mì + '.$tien.' Xu </font> mới có thể làm <font color="green">'.$sl.' Bánh sinh nhật ngọt ngào</font> </div>';
	} else {
					echo'<div class="omenu">Làm thành công '.$sl.' Bánh sinh nhật ngọt ngào</div>';
					
						mysql_query("UPDATE `users` SET `xu` = `xu`- '".$tien."',`sobanhsinhnhat`=`sobanhsinhnhat`+ '".$sl."' WHERE `id` = '".$user_id."'");
									mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$sl."' WHERE `user_id`='".$user_id."' AND `id_shop`='160'");
																		mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$sl."' WHERE `user_id`='".$user_id."' AND `id_shop`='159'");


	}
		} else if ($loai==2){
			if ($congthuc['soluong']<$sl || $duongcat['soluong']<$sl){
				
			echo'<div class="omenu"><b><font color="red">Lỗi!</font></b> Bạn cần <font color="red">'.$sl.' Công thức làm bánh + '.$sl.' Đường cát </font> mới có thể làm <font color="green">'.$sl.' Bánh sinh nhật ngọt ngào</font> </div>';
	} else {
					echo'<div class="omenu">Làm thành công '.$sl.' Bánh sinh nhật ngọt ngào</div>';
											mysql_query("UPDATE `users` SET `sobanhsinhnhat`=`sobanhsinhnhat`+ '".$sl."' WHERE `id` = '".$user_id."'");

									mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$sl."' WHERE `user_id`='".$user_id."' AND `id_shop`='161'");
									mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$sl."' WHERE `user_id`='".$user_id."' AND `id_shop`='162'");
																											mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$sl."' WHERE `user_id`='".$user_id."' AND `id_shop`='159'");


	}
		} else  if ($loai==3){
			$sl2=$sl*10;
			if ($v1['kol']<$sl2 ){
				
			echo'<div class="omenu"><b><font color="red">Lỗi!</font></b> Bạn cần <font color="red">'.$sl2.' Sữa bò </font> mới có thể làm <font color="green">'.$sl.' Đường cát</font> </div>';
	} else {
					echo'<div class="omenu">Làm thành công '.$sl.' Đường cát </div>';
									mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$sl."' WHERE `user_id`='".$user_id."' AND `id_shop`='162'");
                       mysql_query("UPDATE `fermer_sclad` SET `kol`=`kol`-'".$sl2."' WHERE `id_user`='".$user_id."' AND `semen`='20'");
	}
		} else   if ($loai==4){
			$sl2=$sl*2;
			if ($datauser['luong']<$sl2 ){
				
			echo'<div class="omenu"><b><font color="red">Lỗi!</font></b> Bạn cần <font color="red">'.$sl2.' Lượng </font> mới có thể làm <font color="green">'.$sl.' Công thức làm bánh</font> </div>';
	} else {
					echo'<div class="omenu">Làm thành công '.$sl.' Công thức làm bánh</div>';
									mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$sl."' WHERE `user_id`='".$user_id."' AND `id_shop`='161'");
															mysql_query("UPDATE `users` SET `luong` = `luong`- '".$sl2."' WHERE `id` = '".$user_id."'");

	}
		} else if ($loai==5){
			$sl2=$sl*100;
			if ($v2['kol']<$sl2 ){
				
			echo'<div class="omenu"><b><font color="red">Lỗi!</font></b> Bạn cần <font color="red">'.$sl2.' Dâu tâu </font> mới có thể làm <font color="green">'.$sl.' Bột mì</font> </div>';
	} else {
					echo'<div class="omenu">Làm thành công '.$sl.' Bột mì </div>';
									mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$sl."' WHERE `user_id`='".$user_id."' AND `id_shop`='160'");
                       mysql_query("UPDATE `fermer_sclad` SET `kol`=`kol`-'".$sl2."' WHERE `id_user`='".$user_id."' AND `semen`='4'");

	}
		} 
	}
}	
	
	

echo'<div class="omenu"><form method="post">
<input type="radio" name="loai" value="1"> Bánh sinh nhật ngọt ngào  = <font color="#FF0080">1 Bột mì + 5000 Xu</font>
<br><input type="radio" name="loai" value="2"> Bánh sinh nhật ngọt ngào  = <font color="#FF0080">1 Công thức làm bánh + 1 Đường cát </font>
<br><input type="radio" name="loai" value="3"> Đường cát  = <font color="#FF0080">10 Sữa</font>
<br><input type="radio" name="loai" value="4"> Công thức làm bánh  = <font color="#FF0080">2 lượng </font>
<br><input type="radio" name="loai" value="5"> Bột mì  = <font color="#FF0080">100 Dâu tây</font>
<center><br><input type="number" name="sl" value="1">
<br><input type="submit" name="submit" value="Xác nhận"></center>
</form>
</div>';

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