<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');

require('../incfiles/head.php');
if(!$user_id){
header('location: /index.html');
}
if ($datauser['rights']<9 ){ 
header('location: /index.html');
exit;
}
if(!$loai){
$total =mysql_result(mysql_query("SELECT COUNT(*) FROM `khodo` WHERE `user_id`='".$user_id."'"), 0);
 echo'<div class="phdr">Item ẩn</div><div class="menu"><a href="?loai=all"><img src="/images/vao.png">  Tất cả</a></div><div class="menu"><a href="?loai=ao"><img src="/images/vao.png">  Áo</a></div><div class="menu"><a href="?loai=quan"><img src="/images/vao.png">  Quần</a></div><div class="menu"><a href="?loai=canh"><img src="/images/vao.png">  Cánh</a></div><div class="menu"><a href="?loai=matna"><img src="/images/vao.png">  Mặt nạ</a></div><div class="menu"><a href="?loai=haoquang"><img src="/images/vao.png">  Hào quang</a></div><div class="menu"><a href="?loai=non"><img src="/images/vao.png">  Mũ</a></div><div class="menu"><a href="?loai=kinh"><img src="/images/vao.png">  Kính</a></div><div class="menu"><a href="?loai=thucung"><img src="/images/vao.png">  Thú cưng</a></div><div class="menu"><a href="?loai=docamtay"><img src="/images/vao.png">  Đồ cầm tay</a></div><div class="menu"><a href="?loai=toc"><img src="/images/vao.png">  Tóc</a></div><div class="menu"><a href="?loai=mat"><img src="/images/vao.png">  Mắt</a></div><div class="menu"><a href="?loai=khuonmat"><img src="/images/vao.png">  Khuôn mặt</a></div><div class="menu"><a href="?loai=nensau"><img src="/images/vao.png">  Nền Sau</a></div><div class="menu"><a href="?loai=cancau"><img src="/images/vao.png">  Cần câu</a></div>
';






}
?> 

<?php
if($loai){

		$total2 =mysql_result(mysql_query("SELECT COUNT(*) FROM `shopdo` WHERE `hienthi`='0'"), 0);

	$total =mysql_result(mysql_query("SELECT COUNT(*) FROM `shopdo` WHERE `user_id`='".$user_id."' AND `loai`='".$loai."'"), 0);

    echo'<div class="phdr">Item ẩn</div>';
?>
<div class="omenu"><b>Chọn loại đồ :</b> <select name="url"size="1"onChange="window.open(this.options [this.selectedIndex].value,'_top')" style="border: 0;">
<?php
echo '<option value="">Chọn</option>';
echo '<option value="?loai=all"> Tất cả</option>';

echo '<option value="?loai=ao"> Áo</option>';
echo '<option value="?loai=quan"> Quần</option>';
echo '<option value="?loai=toc"> Tóc</option>';

echo '<option value="?loai=non"> Mũ</option>';
echo '<option value="?loai=mat"> Mắt</option>';
echo '<option value="?loai=khuonmat"> Mặt</option>';
echo '<option value="?loai=haoquang"> Hào quang</option>';
echo '<option value="?loai=canh"> Cánh</option>';
echo '<option value="?loai=docamtay"> Đồ cầm tay</option>';
echo '<option value="?loai=nensau"> Nền Sau</option>';
echo '<option value="?loai=thucung"> Thú cưng</option>';
echo '<option value="?loai=kinh"> Kính</option>';
echo '<option value="?loai=matna"> Mặt nạ</option>';


echo '</select>';
echo '</div>';
echo'<form method="post">';
if ($loai==all){
	$req=mysql_query("SELECT * FROM `shopdo` WHERE `hienthi`='0' AND `id_loai`!='0' ORDER BY `id` DESC LIMIT $start,$kmess");
} else {

$req=mysql_query("SELECT * FROM `shopdo` WHERE `hienthi`='0' AND `id_loai`!='0' AND `loai`= '".$loai."' ORDER BY `id` DESC LIMIT $start,$kmess");
}
while($res=mysql_fetch_array($req)){
echo'  <table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info"><tbody><tr><td class="left-info"><img src="/images/shop/'.$res['id'].'.png"></td><td class="right-info"><span>
<font color="ff007f">Vật phẩm:</font>   '.$res[tenvatpham].'  </font> ('.($res['timesudung'] ? thoigiantinh(floor($res['timesudung'])).'' : 'Vĩnh viễn').')</br>
          <font color="ff007f">ID:</font> '.$res['id'].'</font><br>
		  <font color="ff007f">Loại:</font> '.$res['loai'].'</font><br>
		  <font color="ff007f">ID Loại:</font> '.$res['id_loai'].'</font><br>

          </span>';
if($datauser['rights']>=9 ){
echo' <b><a href="iteman.php?act=lay&id='.$res[id].'">Lấy</a>';
        echo' <a href="iteman.php?act=tang&id='.$res[id].'">- Tặng</a>';
    
       echo' <a href="iteman.php?act=edit&id='.$res[id].'">- Sửa</a>';
        echo' <a href="iteman.php?act=xoa&id='.$res[id].'">- Xóa</a>';
  }
          echo'</td></tr></tbody></table>';





}
if ($loai==all){
	$total =mysql_result(mysql_query("SELECT COUNT(*) FROM `shopdo` WHERE `hienthi`='0' AND `id_loai`!='0'"), 0);
} else {
$total =mysql_result(mysql_query("SELECT COUNT(*) FROM `shopdo` WHERE `hienthi`='0' AND `loai`='".$loai."'  AND `id_loai`!='0'"), 0);
}
if($total == 0){
echo'<div class="omenu">Item ẩn của bạn trống!</div>';
}else if($total > $kmess){
echo'<div class="topmenu">'.functions::pages('?loai='.$loai.'&page=', $start, $total, $kmess).'</div>';

}
echo'</form>';
}

require('../incfiles/end.php');
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