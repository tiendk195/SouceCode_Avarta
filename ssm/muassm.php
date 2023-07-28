<?php
define('_IN_JOHNCMS', 1);
$headmod = 'mod';
$bhead = 2;

require('../incfiles/core.php');
if(!$user_id){
require('../incfiles/head.php');
echo functions::display_error($lng['access_guest_forbidden']);
require('../incfiles/end.php');
exit;
}
if ($datauser['kichhoat']==0){
    Header('location: '.$home.'/users/checkpoint.php');
    exit;
}
$textl = 'Sổ sứ mệnh';
require('../incfiles/head.php');
echo'<div class="nenvip">Mở Sổ sứ mệnh</div>';
echo'<div id="data"></div>';
echo'<div class="gd_"><p id="hien"></p><table width="100%" border="0" cellspacing="0"><tbody><tr class="">
<td width="50%"><div class="gd_ssm">
<center>
<b><font size="3">SSM VIP</font></b></center>
<span style="float:right"><font size="1"><i class="fa fa-check"></i> Mở nhiều phần thưởng xịn</font></span><br><br>
<i class="fa fa-arrow-right"></i> Mở khóa Shop Vinh Dự sứ mệnh<br>
<i class="fa fa-arrow-right"></i> Trang phục VIP<br>
<i class="fa fa-arrow-right"></i> Pet VIP vĩnh viễn<br>
</div>
<center><img onclick="mo_ssm('.$user_id.')" src="https://i.imgur.com/wRRBiTz.gif"></center>
</td>
<td width="50%"><div class="gd_ssm_1">
<center><b><font size="3">SSM VIP + VƯỢT CẤP</font></b></center>
<span style="float:right"><font size="1"><i class="fa fa-check"></i> Mở ưu đãi + Vượt 5 cấp</font></span><br><br>
<i class="fa fa-arrow-right"></i> Mở khóa toàn bộ ưu đãi SSM VIP<br>
<i class="fa fa-arrow-right"></i> Ưu đãi vượt thêm 5 cấp<br>
<i class="fa fa-arrow-right"></i> Vô ngàn vật phẩm có giá trị<br><br><br>
<div class="gd_ssm_2"><font size="1">Thưởng đặc biệt</font><br>
<i class="fa fa-arrow-right"></i> Nhận ngay Khung Đại tướng robot<br>


</div></div>
<center><img onclick="mo_ssm_vip('.$user_id.')" src="https://i.imgur.com/goV5U1g.gif"></center>
</td>
</tr></tbody></table></div>';



require('../incfiles/end.php');
?>
<style>
.gd_ {
    border: 1px solid #2E9AFE;
    background-color: #A9E2F3;
    margin: 2px 0;
    padding: 10px;
    border-radius: 5px;
}
  .gd_ssm {
    background-image: url(images/gd1.gif);
    background-repeat: repeat;
    border: 3px solid #F6CEE3;
    background-color: #EAF6FC;
    color: white;
    text-shadow: 0 0 0.2em #ff6633, 0 0 0.2em #ff6633, 0 0 0.2em #ff6633;
    margin: 2px 0;
    padding: 5px;
    border-radius: 5px;
    min-height: 250px;
}
.gd_ssm_1 {
    background-image: url(images/gd1.gif);
    background-repeat: repeat;
    border: 3px solid #D358F7;
    background-color: #EAF6FC;
    color: white;
    text-shadow: 0 0 0.2em #9932cc, 0 0 0.2em #9932cc, 0 0 0.2em #9932cc;
    margin: 2px 0;
    padding: 5px;
    border-radius: 5px;
    min-height: 250px;
    max-height: 250px;
}
.gd_ssm_2 {
    border: 3px solid #D358F7;
    background-color: #ECCEF5;
    color: white;
    text-shadow: 0 0 0.2em #f08080, 0 0 0.2em #f08080, 0 0 0.2em #f08080;
    margin: 2px 0;
    padding: 5px;
    border-radius: 5px;
}



</style>
<script>

var loadcontent ='<i>Đang tải dữ liệu...</i>';
$(document).ready(function(){
$('#data').html(loadcontent);
$('#data').load('f5.php');
var refreshId = setInterval(function(){
$('#data').load('f5.php');
$('#data').slideDown('slow');
},1000);
});

function mo_ssm(id)
{
    $.ajax(
        {
            url : 'mo_ssm.php',
            data : {id : id},
            type : 'POST',
            success : function(d)
            {
                $("#hien").html(d);
            }
        }
        
        );
}

function mo_ssm_vip(id)
{
    $.ajax(
        {
            url : 'mo_ssm_vip.php',
            data : {id : id},
            type : 'POST',
            success : function(d)
            {
                $("#hien").html(d);
            }
        }
        
        );
}

</script>