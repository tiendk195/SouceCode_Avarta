<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');
$headmod='Item đã úp'; 
$textl='Item đã úp';
require('../incfiles/head.php');
if(!$user_id){
header('location: /dangnhap.html');
exit;
}
if ($rights<5) {
header('Location: /');
exit;
}

switch ($act){

case 'edit': //Sửa đồ
    $id=$_GET[id];
    $xyz=mysql_num_rows(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$id."' AND `nguoiup`='".$user_id."'"));
if($xyz<=0){header('location: /');}
$res=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$_GET[id]."' AND `nguoiup`='".$user_id."'"));

echo '<div class="phdr"><b>'.$res[tenvatpham].'</b></div>';
if (isset($_POST[submit])) {
@mysql_query("UPDATE `shopdo` SET
`tenvatpham`='".$_POST[vatpham]."',
`loaitien`='".$_POST[loaitien]."',
`gia`='".$_POST[gia]."',
`gioitinh`='".$_POST[gioitinh]."',

`premium`='".$_POST[premium]."',
`hienthi`='".$_POST[hienthi]."'
WHERE `id`='".$id."'
");
echo '<div class="omenu">Edit thành công! </div>';
}
echo '<img src="/images/shop/'.$id.'.png">';
echo '<form method="post">';
echo 'Tên vật phẩm: <input type="text" name="vatpham" value="'.$res[tenvatpham].'"><br/>';
echo 'Loại tiền: <select name="loaitien">
<option value="xu" '.($res[loaitien]==xu?'selected="selected"':'').'> Xu</option>
<option value="vnd" '.($res[loaitien]==vnd?'selected="selected"':'').'> Lượng</option>
</select><br/>';
echo 'Giá: <input type="text" name="gia" size="3" value="'.$res[gia].'"><br/>';
echo 'Giới tính: <select name="gioitinh">
<option value="" '.($res[gioitinh]==''?'selected="selected"':'').'> Dùng chung</option>
<option value="nam" '.($res[gioitinh]==nam?'selected="selected"':'').'> Nam</option>
<option value="nu" '.($res[gioitinh]==nu?'selected="selected"':'').'> Nữ</option>
</select><br/>';
echo 'Shop cao cấp: <select name="premium">
<option value="" '.($res[premium]==''?'selected="selected"':'').'>Không cho vào</option>
<option value="1" '.($res[premium]==1?'selected="selected"':'').'> Cho vào</option>

</select><br/>';
echo 'Hiển thị: <select name="hienthi">
<option value="0" '.($res[hienthi]==0?'selected="selected"':'').'> Hiển thị</option>
<option value="1" '.($res[hienthi]==1?'selected="selected"':'').'> Ẩn</option>
</select><br/>';
echo '<input type="submit" name="submit" value="Lưu">';
echo '</form>';
break;

case 'xoa': //Xóa đồ
Echo '<div class="phdr">Xóa vật phẩm</div>';
$id=$_GET[id];
 $xyz=mysql_num_rows(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$id."' AND `nguoiup`='".$user_id."'"));
if($xyz<=0){header('location: /');}
$res=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$_GET[id]."' AND `nguoiup`='".$user_id."'"));


echo'<center>';

Echo'<div class="omenu"><img src="/images/shop/'.$res['id'].'.png"></br><b>Bạn có muốn xóa vật phẩm <font color="red">'.$res['tenvatpham'].'</font> không ??</b>';
echo '<form method="post"><input type="submit" name="submit" value="Xóa"></form></div>';
if (isset($_POST[submit])) {
Echo'<div class="omenu">Bạn đã xóa thành công vật phẩm <font color="red">'.$res['tenvatpham'].'</font> !!<a href="itemdaup.php">Return</a></a></div>';
echo'</center>';

mysql_query("DELETE FROM `shopdo` WHERE `id`='".$res[id]."'");

}



break;
case 'lay';

  $id=$_GET[id];
    $xyz=mysql_num_rows(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$id."' AND `nguoiup`='".$user_id."'"));
if($xyz<=0){header('location: /');}
if($datauser['rights']>=5 ){

$res=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$_GET[id]."' AND `nguoiup`='".$user_id."'"));
$post = mysql_fetch_array(mysql_query("select * from `shopdo` WHERE  `id` = '$id' AND `nguoiup`='".$user_id."' LIMIT 1"));

	
echo '<div class="phdr"><b>'.$res[tenvatpham].'</b></div>';
$tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."'");
$checktongruong=mysql_num_rows($tongruong);
	if ($checktongruong>=$datauser['tongruong']) {
    echo'<div class="omenu">Giao dịch không thành công, rương của bạn đã đầy !!</div>';
} else {
    			$query=mysql_query("SELECT * FROM `khodo` WHERE `id_shop`='".$post['id']."' AND `user_id`='".$user_id."'");
$checkdo=mysql_num_rows($query);
if ($checkdo>=1) {
    echo'<div class="omenu">Giao dịch không thành công, Bạn đã sở hữu  <b>'.$post['tenvatpham'].'</b> !!</div>';
} else {

@mysql_query("INSERT INTO `khodo` SET
 `id_shop`='".$post['id']."',
 `user_id`='".$user_id."',
 `id_loai`='".$post['id_loai']."',
 `tenvatpham` ='".$post['tenvatpham']."',
  `loaido` ='vip',

 `loai`='".$post['loai']."'");
 echo'<center>';
echo '<div class="omenu"><font color ="red">Lấy thành công</font></br>';
echo '<img src="/images/shop/'.$post['id'].'.png" alt="*" /></br>';
echo ' Tên Vật Phẩm: '.$post[tenvatpham].'</br>';
echo ' Loại: '.$post[loai].'</br>';

echo ' ID Shop: '.$post[id].' </div>';
echo'</center>';
}
}
}
break;


default:
echo '<div class="phdr">Item đã úp</div>';
echo'<div class="omenu">';
echo'<div align="center">
            <form action = "search_me.php" method="get">
                Search: <input type="text" name="search" />
                <input type="submit" name="ok" value="search" />
            </form>
        </div>';
		echo'</div>';
  // Nếu người dùng submit form thì thực hiện
        if (isset($_REQUEST['ok'])) 
        {
            // Gán hàm addslashes để chống sql injection
            $search = addslashes($_GET['search']);
 
            // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
            if (empty($search)) {
                echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn chưa nhập từ khóa tìm kiếm</div>';
            } 
            else
            {
                // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
                $query = "select * from shopdo where hienthi=1 and tenvatpham like '%$search%' ORDER BY `id` DESC LIMIT $start,$kmess";
 
                // Kết nối sql
                mysql_connect("localhost", "root", "vertrigo", "basic");
 
                // Thực thi câu truy vấn
                $sql = mysql_query($query);
 
                // Đếm số đong trả về trong sql.
                $num = mysql_num_rows($sql);
 
                // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
                if ($num > 0 && $search != "") 
                {
                    // Dùng $num để đếm số dòng trả về.
					                echo '<div class="omenu">Có '.$num.' kết quả với từ khóa '.$search.' </div>';

 
                    // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array.
                    while ($row = mysql_fetch_assoc($sql)) {

                        echo'  <table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info"><tbody><tr><td class="left-info"><img src="/images/shop/'.$row['id'].'.png"></td><td class="right-info"><span>
<font color="ff007f">Vật phẩm:</font>   '.$row[tenvatpham].'  </font></br>
          <font color="ff007f">ID:</font> '.$row['id'].'</font><br>
		  <font color="ff007f">Loại:</font> '.$row['loai'].'</font><br>
		  <font color="ff007f">ID Loại:</font> '.$row['id_loai'].'</font><br>';
		  if ($row['nguoiup']>0) {
		      
		      $nguoiup=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$row['nguoiup']."'"));

		      echo'		  <font color="ff007f">Người up:</font> '.$nguoiup['name'].'</font><br>';
		  }

          echo'</span>';
 echo' <a href="?act=lay&id='.$row[id].'"><input type="submit" name="submit" value="Lấy"></a>';
  
       echo' <a href="?act=edit&id='.$row[id].'"><input type="submit" name="submit" value="Sửa"></a>';
        echo' <a href="?act=xoa&id='.$row[id].'"><input type="submit" name="submit" value="Xóa"></a>';
          echo'</td></tr></tbody></table>';

                    }
						$total =mysql_result(mysql_query("SELECT COUNT(*) FROM `shopdo` WHERE `hienthi`='1' and tenvatpham like '%$search%'"), 0);

					if($total > $kmess){
echo'<div class="topmenu">'.functions::pages('?search='.$search.'&ok=search&page=', $start, $total, $kmess).'</div>';

}
                } 
                else {
					                echo '<div class="omenu">Không tìm thấy kết quả nào</div>';
                }
            }
        }


$req=mysql_query("SELECT * FROM `shopdo` WHERE `id`!='0' AND `nguoiup`='".$user_id."' ORDER BY `id` DESC LIMIT $start,$kmess");
while($res=mysql_fetch_array($req)) {
	echo'  <table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info"><tbody><tr><td class="left-info"><img src="/images/shop/'.$res['id'].'.png"></td><td class="right-info"><span>
<font color="ff007f">Vật phẩm:</font>   '.$res[tenvatpham].'  </font> ('.($res['timesudung'] ? thoigiantinh(floor($res['timesudung'])).'' : 'Vĩnh viễn').')</br>
          <font color="ff007f">ID:</font> '.$res['id'].'</font><br>
		  <font color="ff007f">Loại:</font> '.$res['loai'].'</font><br>
          </span>';

    echo' <a href="?act=lay&id='.$res[id].'"><input type="submit" name="submit" value="Lấy"></a>';
  
       echo' <a href="?act=edit&id='.$res[id].'"><input type="submit" name="submit" value="Sửa"></a>';
        echo' <a href="?act=xoa&id='.$res[id].'"><input type="submit" name="submit" value="Xóa"></a>';

          echo'</td></tr></tbody></table>';
}
$total=mysql_result(mysql_query("SELECT COUNT(*) FROM `shopdo` WHERE `nguoiup`='".$user_id."'"),0);
if ($total > $kmess) {
echo '<div class="topmenu">' . functions::pages('?page=', $start, $total, $kmess) . '</div>';
}
break;
break;


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