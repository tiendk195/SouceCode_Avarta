<?php
define('_IN_JOHNCMS', 1);
$headmod = 'mod';
require('../incfiles/core.php');
if(!$user_id){
require('../incfiles/head.php');
echo
functions::display_error($lng['access_guest_forbidden']);
exit;
}
$textl = 'Mua Màu Nick';
require('../incfiles/head.php');
echo '<div class="phdr"><b>Mua Màu Nick</b></div>';




echo'<center><div class="omenu"><font color="red"><b>Giá: 500 lựợng </b></font><br/> <b><font color="green">Nhập Mã Màu Muốn Đổi</b></font> <br>
<font color="red"><b><a href="/mod/mamau.php"/>Xem Mã Màu</b></font></a><br/>
</center>';
echo '<div class="omenu">


<center><font color=red"><div id="lethinh_loi"> </div></font><font color="green"> <div id="lethinh_ok"> </div> </font> </center>
<center><input type="text" id="msg" name="msg" placeholder="Ví dụ #FF0000"></br>
<input type="submit" value="Lưu lại" id="ok" name="submit" /></center><br />
<center><b><font color="red">Chú ý: Nhập Sai Mã Màu Sẽ Không Hiển Thị</font></center></b></br></div>

 ';


?>
<!--VIẾT BY lethinh-->
<script type="text/javascript">
	$("#ok").on("click", function(){
		var msg = $("#msg").val();
		var lethinh_loi = $("#lethinh_loi");
		var lethinh_ok = $("#lethinh_ok");
 		lethinh_loi.html("");
		lethinh_ok.html("");
 
		if (msg == "") {
			lethinh_loi.html("Bạn chưa nhập mã màu");
			return false;
		}
		$.ajax({
		  url: "/ajax/lethinh_maunick.php",
		  method: "POST",
		  data: { msg : msg },
		  success : function(response){
		  	if (response == "1") {
		  		lethinh_loi.html("bạn chưa nhập mã màu");

		  	} else
		  	if (response == "2") {
		  		lethinh_loi.html("Mã màu không hợp lệ");
		  	} 
		  	
		  	else
		  	if (response == "3") {
		  		lethinh_ok.html("Mua mã màu thành công");
		  	} 
		  		else
		  	if (response == "4") {
		  		lethinh_loi.html("Bạn không đủ lượng");
		  	} 
		  }
		});
 
	});
</script>
<?php




require_once('../incfiles/end.php');



?>