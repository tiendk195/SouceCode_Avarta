<?php
define('_IN_JOHNCMS', 1);
require_once('../incfiles/core.php');
$headmod = 'Khu mua sắm';
$textl = 'Khu mua sắm'; 
require_once('../incfiles/head.php');
echo'<div class="phdr">Danh mục cửa hàng - [<a href="/ruong"><b>Rương Đồ</b></a>]</div>';
echo'<div class="gd_"><table width="100%" border="0" cellspacing="0"><tbody><tr class=""><td width="20%"><center><div style="border: 1px solid #EAF6FC;background-color: #EAF6FC;margin:0px 0;padding:5px;border-radius:5px;width:auto;height:auto;">
<font size="1" color="white" style="text-shadow: 0 0 0.2em #9932CC, 0 0 0.2em #9932CC,  0 0 0.2em #9932CC"><b>Hãy mua sắm chọn lựa những món đồ thời trang thật đẹp nhé!</b></font></div>
<br><img src="/avatar/1.png"></center></td><td width="80%"><div class="pmenu"><div style="overflow: auto;height:140px">';

echo' <img onclick="hienvp(1)" src="/ruong/img/1.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px;">';
echo' <img onclick="hienvp(2)" src="/ruong/img/3.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px;">';
echo' <img onclick="hienvp(3)" src="/ruong/img/4.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px;">';
echo' <img onclick="hienvp(4)" src="/ruong/img/2.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px;">';
echo' <img onclick="hienvp(5)" src="/ruong/img/10.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px;">';
echo' <img onclick="hienvp(6)" src="/ruong/img/6.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px;">';
echo' <img onclick="hienvp(7)" src="/ruong/img/8.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px;">';
echo' <img onclick="hienvp(8)" src="/ruong/img/19.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px;">';
echo' <img onclick="hienvp(9)" src="/ruong/img/5.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px;">';
echo' <img onclick="hienvp(10)" src="/ruong/img/9.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px;">';
echo' <img onclick="hienvp(11)" src="/ruong/img/13.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px;">';
echo' <img onclick="hienvp(12)" src="/ruong/img/7.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px;">';
echo' <img onclick="hienvp(13)" src="/ruong/img/16.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px;">';
echo' <img onclick="hienvp(14)" src="/ruong/img/11.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px;">';



echo' </div></div></td></tr></tbody></table><div id="msg"></div><div id="ttvp"></div><div id="mua"></div></div>';


require('../incfiles/end.php');

?>
<script>
function hienvp(id)
{
    $.ajax(
        {
            url : 'chucnang.php?hienvp',
            data : {id : id},
            type : 'POST',
            success : function(d)
            {
                $("#msg").html(d);
            }
        }
        
        );
}
</script>
<script>
function ttvp(id)
{
    $.ajax(
        {
            url : 'chucnang.php?ttvp',
            data : {id : id},
            type : 'POST',
            success : function(d)
            {
                $("#ttvp").html(d);
            }
        }
        
        );
}
</script>
<script>
function mua(id)
{
    $.ajax(
        {
            url : 'chucnang.php?mua',
            data : {id : id},
            type : 'POST',
            success : function(d)
            {
                $("#mua").html(d);
            }
        }
        
        );
}
</script>