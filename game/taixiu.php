<?php
//Code by PKoolVN
//Facebook: https://www.facebook.com/pkoolvn
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');
$textl='Tài xỉu';
require('../incfiles/head.php');
if (!$user_id) {
header('Location: /dangnhap.php');
exit;
}
echo '<div class="mainblok">';
$kq=mysql_fetch_array(mysql_query("SELECT * FROM `taixiu` WHERE `id`='1'"));
$hugame=mysql_fetch_array(mysql_query("SELECT * FROM `hugame` WHERE `game`='taixiu'"));
    $query2=mysql_query("SELECT * FROM `hugame` WHERE `game`='taixiu'");
$check2=mysql_num_rows($query2);
if ($check2<1) {
  mysql_query("INSERT INTO `hugame` SET `game`='taixiu'");
}


function thoigian($from, $to = '') {
if (empty($to))
$to = time();
$diff = (int) abs($to - $from);
if ($diff <= 60) {
$s = round($diff);
if ($s <= 1) {
$s = 1;
}
$since = sprintf('%s giây', $s);
} elseif ($diff <= 3600) {
$mins = round($diff / 60);
if ($mins <= 1) {
$mins = 1;
}

/* translators: min=minute */
$since = sprintf('%s phút', $mins);
} else if (($diff <= 86400) && ($diff > 3600)) {
$hours = round($diff / 3600);
if ($hours <= 1) {
$hours = 1;
}
$since = sprintf('%s giờ', $hours);
} elseif ($diff >= 86400) {
$days = round($diff / 86400);
if ($days <= 1) {
$days = 1;
}
$since = sprintf('%s ngày', $days);
}
return $since;
}
//
$xxx=$kq[1]+$kq[2]+$kq[3];
if ($xxx<11) {
$hero='xiu';
$xxx='Xỉu';
} else {
$hero='tai';
$xxx='Tài';
}
switch($act) {
default:
echo'<div class="phdr">Tài xỉu</div>';
if ($datauser['rights']>=9) {
    echo'<div class="omenu"><b><font color="red">
    <a href="?act=lichsu">Xem lịch sử</a></b></font></div>';
}

echo'<div class="gd_"><div class="omenu">';
echo'<div id="cuocxiuxu"></div>';
echo'<div id="cuocxiuluong"></div>';
echo'<div id="cuoctaixu"></div>';
echo'<div id="cuoctailuong"></div>';

echo'<div id="data">';
echo'</div>';
echo'</div></div>';
$ttx = mysql_result(mysql_query("SELECT * FROM `cuoctaixiu`"),0);



echo '<div class="phdr">Đặt cược</div>';
echo'<div class="pmenu"><center><a id="vao">Mở bảng cược</a></center></div>';
echo'<div id="ra" style="display: none;">';


echo'<div class="gd_"><div class="pmenu">';


 echo'<font size="1"><i>Cược xỉu: Xu</br> 
</i>
<input value="1" type="number" id="sotien"><br>

<input type="submit" value="Cược" onclick="cuocxiuxu('.$user_id.')">
</center>';





echo '</div>';
echo '</div>';
echo'<div class="gd_"><div class="pmenu">';
echo'<font size="1"><i>Cược xỉu: Lượng</br> 
</i>
<input value="1" type="number" id="sotien1"><br>

<input type="submit" value="Cược" onclick="cuocxiuluong('.$user_id.')">
</center></div>';





echo '</div>';
echo'<div class="gd_"><div class="pmenu">';
echo'<font size="1"><i>Cược tài: Xu</br> 
</i>
<input value="1" type="number" id="sotien2"><br>

<input type="submit" value="Cược" onclick="cuoctaixu('.$user_id.')">
</center></div>';





echo '</div>';

echo'<div class="gd_"><div class="pmenu">';
echo'<font size="1"><i>Cược tài: Lượng</br> 
</i>
<input value="1" type="number" id="sotien3"><br>

<input type="submit" value="Cược" onclick="cuoctailuong('.$user_id.')">
</center></div>';





echo '</div>';
echo'</div>';
echo'</div>';

break;
case 'lichsu':
if ($datauser['rights']<9 ) {
header('Location: /index.php');
}
echo'<div class="phdr">Lịch sử</div>';


$res=mysql_query("SELECT * FROM `ls_cuoctx` WHERE `id`!='0' ORDER BY `id` DESC LIMIT $start,$kmess");


while ($post = mysql_fetch_array($res)){
    if ($post[win]==1) {
        $thinh= 'WIN';
    }
    if ($post[win]==2) {
        $thinh= 'THUA';
    }
  if ($post[win]==0) {
        $thinh= 'CHƯA SỔ';
    }
    echo'<div class="omenu">
<b>Người đặt: </b><a href="/member/'.$post[user_id].'.html" >'.nick($post['user_id']).' </a></br>
<b>Đặt : '.($post[taixiu]=='tai'?'Tài':'Xỉu').'</b></br>

<b>Thời gian: '.date("d/m/Y - H:i", $post['time']).'</b></br>

<b>Số tiền: </b><font color="red"></font> <b>'.number_format($post[cuoc]).'</b> '.($post[tien]=='xu'?'xu':'lượng').'</font></div>';
}
$total=mysql_result(mysql_query("SELECT COUNT(*) FROM `ls_cuoctx` WHERE `id`!=0"), 0);
IF($total > $kmess){
Echo'<div class="phdr">'.functions::pages('?act=lichsu&page=', $start, $total, $kmess).'</div>';
}
echo'</div>';
}

require('../incfiles/end.php');
?>
<script>
var loadcontent ='<i>Đang tải dữ liệu...</i>';
$(document).ready(function(){
$('#data').html(loadcontent);
$('#data').load('f5-taixiu.php?load');
var refreshId = setInterval(function(){
$('#data').load('f5-taixiu.php?load');
$('#data').slideDown('slow');
},1000);
});
function cuocxiuxu(id)
{
    $.ajax(
        {
            url : 'f5-taixiu.php?cuocxiuxu',
            data : {id : id, sotien : $("#sotien").val()},
            type : 'POST',
            success : function(d)
            {
                $("#cuocxiuxu").html(d);
            }
        }
        
        );
}
function cuocxiuluong(id)
{
    $.ajax(
        {
            url : 'f5-taixiu.php?cuocxiuluong',
            data : {id : id, sotien1 : $("#sotien1").val()},
            type : 'POST',
            success : function(d)
            {
                $("#cuocxiuluong").html(d);
            }
        }
        
        );
}
function cuoctaixu(id)
{
    $.ajax(
        {
            url : 'f5-taixiu.php?cuoctaixu',
            data : {id : id, sotien2 : $("#sotien2").val()},
            type : 'POST',
            success : function(d)
            {
                $("#cuoctaixu").html(d);
            }
        }
        
        );
}
function cuoctailuong(id)
{
    $.ajax(
        {
            url : 'f5-taixiu.php?cuoctailuong',
            data : {id : id, sotien3 : $("#sotien3").val()},
            type : 'POST',
            success : function(d)
            {
                $("#cuoctailuong").html(d);
            }
        }
        
        );
}
</script>
?>
<script>
$('#vao').click(function() {  
$('#ra').toggle('fast','linear');  
}); 
</script>

