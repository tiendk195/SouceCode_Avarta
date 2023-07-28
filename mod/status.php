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
$textl = 'Mua Status Chatbox';
require('../incfiles/head.php');
switch($act) {
    default:
if ($datauser['status']!='' or $datauser['status']!=0) {
    echo '<div class="phdr"><b>Cá nhân</b></div>';

    echo'<div class="omenu">Status hiện tại: ' . bbcode::tags(functions::smileys($datauser['status'])) . '</br>
    <a href="?act=del"><font color="red"><b>[ Xóa ]</b></font></a>
    
    </div>';
}
echo '<div class="phdr"><b>Mua Status Chém gió</b></div>';




echo'<center><div class="omenu"><font color="red"><b>Giá: 50 lựợng và 500.000 xu </b></font><br/> <b><font color="green">Nhập Status Muốn Mua</b></font> <br>
<font color="red"><b>Status sẽ được hiển thị ở chém gió BOX!</br>Có thể sử dụng BBCode</b></font></a><br/>
</center>';
echo '<div class="omenu">


<center><font color=red"><div id="lethinh_loi"> </div></font><font color="green"> <div id="lethinh_ok"> </div> </font> </center>
<center><input type="text" id="msg" name="msg" placeholder="Ví dụ Lethinhpro"></br>
<input type="submit" value="Lưu lại" id="ok" name="submit" /></center><br />
</br></div>

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
			lethinh_loi.html("Bạn chưa nhập status");
			return false;
		}
		$.ajax({
		  url: "/ajax/lethinh_status.php",
		  method: "POST",
		  data: { msg : msg },
		  success : function(response){
		  	if (response == "1") {
		  		lethinh_loi.html("bạn chưa nhập status");

		  	} else
		  	if (response == "2") {
		  		lethinh_loi.html("status không hợp lệ");
		  	} 
		  	
		  	else
		  	if (response == "3") {
		  		lethinh_ok.html("Mua status thành công");
		  	} 
		  		else
		  	if (response == "4") {
		  		lethinh_loi.html("Bạn không đủ lượng hoặc xu");
		  	} 
		  }
		});
 
	});
</script>
<?php
break;

    case 'del':

 echo '<div class="phdr"><b>Cá nhân</b></div>';
         if ($datauser['status']=='' or $datauser['status']=='0') {
                  echo'<div class="omenu"><b><font color="red">Bạn chưa có status!</font></b></div>';   
         } else {

 if(isset($_POST['xoa'])){

    echo'<div class="omenu"><b><font color="red">Xóa thành công</font></b></div>';
    
mysql_query("UPDATE `users` SET `status`=''  WHERE `id`='".$user_id."'");
    

}

    echo'<div class="omenu"><b>Bạn có chắc chắn muốn xóa status:<font color="red"> '.$datauser['status'].' </font>không?</b></br>
    <form method="post"><input type="submit" value="Xóa" name="xoa" /><br />



</form>
    
    </div>';
    break;


}
}




require_once('../incfiles/end.php');



?>