<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
if (!$user_id )
{
	header('Location: /login.php');
	exit;
}
require('../incfiles/head.php');


$hopqua=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='260'"));

echo'<div class="phdr">Sử dụng Rương mảnh ghép</div>';

echo'<div class="gd_"><table width="100%" border="0" cellspacing="0"><tbody><tr class=""><td width="20%"><center>
<br><div style="border: 1px solid #EAF6FC;background-color: #EAF6FC;margin:2px 0;padding:5px;border-radius:5px;width:48px;height:48px;"><img src="/images/vatpham/260.png"><br>
<font size="1" color="white" style="text-shadow: 0 0 0.2em #ff6633, 0 0 0.2em #ff6633,  0 0 0.2em #ff6633">'.$hopqua['soluong'].'</font>
</div></center></td><td width="80%"><div class="pmenu"><center><div style="overflow: auto;height:135px">';
$vatpham=mysql_query("SELECT * FROM `shopvatpham` WHERE `loai`='ghepmanh' ORDER BY `id`");

while($show=mysql_fetch_array($vatpham)) {
echo'
<img onclick="thongtin('.$show['id'].')" src="/images/vatpham/'.$show['id'].'.png" style="border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:5px;border-radius:5px;">';
}
echo'</div><center></center></center></div></td></tr></tbody></table><div id="hien"></div></div>';




require('../incfiles/end.php');
?>
<script>
function thongtin(id)
{
    $.ajax(
        {
            url : 'thongtin-260.php',
            data : {id : id, sl : $("#sl").val()},
            type : 'POST',
            success : function(d)
            {
                $("#hien").html(d);
            }
        }
        
        );
}
function doi(id)
{
    $.ajax(
        {
            url : 'doi-260.php',
            data : {id : id, sl : $("#sl").val()},
            type : 'POST',
            success : function(d)
            {
                $("#hien").html(d);
            }
        }
        
        );
}
</script>