<?php

define('_IN_JOHNCMS', 1);
$textl = 'Ăn mày';
$headmod = 'id_user';
$rootpath='../';
require_once ("../incfiles/core.php");
require_once ("../incfiles/head.php");
?> <script language="javascript">
	$(document).ready(function(){
		$('.lethinhIT').on('click','#lethinhdz',function(){
				var xu = $("#xu").val();

			$.ajax({
				url: 'lethinh-anmay.php',
				type: 'POST',
				dataType: 'text',
				data: {
				    xu : xu,
					ok: ""
				},
				success: function(result){
					$('.lethinhIT').html(result);
				}
			});
			return false;
		});
	});
</script>  <?php


echo'<div class="phdr">Ăn mày</div>';

echo'<div class="lethinhIT">';
echo'<center>';

echo'<div class="omenu">';
echo'<b><font color="red">Cho ăn xin có tỉ lệ rơi đồ ăn xin cực hot </font></b></br>';
echo'<img src="anxin.gif"/><br><b> Lạy ông đi qua,lại bà đi lại!</br>
Xin hãy bố thí cho con vài trăm triệu để đổi đời với ạ ^^</b></div>';

echo'<div class="omenu"><form method="post">
<input type="number" name="xu" id="xu" placeholder="Nhập xu">

	</br><input class="nut" type="submit" name="ok" id="lethinhdz" value="Cho xu"> </form></div>';
	
	
echo'</center>';
/*
echo'<div class="phdr">Cá nhân</div>';
echo'<div class="omenu">';
echo'<b>Đã cho <font color="red">'.number_format($datauser['choxu']).' xu</b></font></br>';
if ($datauser['choxu']<=0) {
    $tile = '0';
}
if ($datauser['choxu']>0 and $datauser['choxu']<=100000) {
    $tile = '1';
}
if ($datauser['choxu']>100000 and $datauser['choxu']<=1000000) {
    $tile = '10';
}
if ($datauser['choxu']>1000000 and $datauser['choxu']<=10000000) {
    $tile = '50';
}
if ($datauser['choxu']>10000000) {
    $tile = '100';
}
echo'<b>Tỉ lệ ra đồ ăn mày: <font color="green">'.$tile.'%</b></font></br>';
echo'<b>Cho trên 10.000.000 xu chắc chắn nhận được đồ!</b>';

echo'</div>';
*/
echo'</div>';

require_once ("../incfiles/end.php");
?>