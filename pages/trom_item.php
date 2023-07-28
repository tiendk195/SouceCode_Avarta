<?php
echo '<html><head><title>Tools Leech Item</title><meta charset="utf-8"></head><body>';


if (isset($_GET[ok])) {
$web = $_GET['site'];
$i=$_GET[batdau];
$loai = $_GET['loai'];
$loai = trim($_GET['loai']);
while($i<=$_GET[het]) {
echo '<img src="http://'.$web.'/images/'.$loai.'/'.$i.'.png">­
';
$i++;
}
}
echo '<form method="get">
<tr><td>Link Website Cần Leech Item ( Ví dụ: tuoiteen.me hoặc thitranxiteen.top v.v... ):</td><td><input type="text" name="site"></td></tr>
<br>Từ:<input type="text" name="batdau" value="10" size="5" placeholder="1"> đến 
<input type="text" name="het" size="5" value="30" placeholder="???">
<br><select name="loai">
<option value="ao"> Áo</option>
<option value="quan"> Quần</option>
<option value="canh"> Cánh</option>
<option value="thucung"> Thú cưng</option>
<option value="matna"> Mặt nạ</option>
<option value="haoquang"> Hào quang</option>
<option value="kinh"> Kính</option>
<option value="toc"> Tóc</option>
<option value="mat"> Mắt</option>
<option value="matna"> Mặt nạ</option>
<option value="non"> Nón</option>
<option value="docamtay"> Đồ cầm tay</option>
</select>
<br><input type="submit" value="Leech" name="ok">
</form>';
echo'Mod by Prince';


echo"<script>
var imgs = document.getElementsByTagName('img');
for (var i = 0, j = imgs.length; i<j; i++) {
imgs[i].onerror = function(){
echo'';
}
}
</script>";
echo '</body></html>';

?>