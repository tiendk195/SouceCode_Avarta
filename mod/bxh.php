<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
$textl='Bảng Xếp Hạng';
require('../incfiles/head.php');
?>
<style>
.gd_get{
border: 1px solid #F6CEE3;background-color: #F6CEE3;margin:2px 0;
padding:10px;
border-radius:5px;
max-width: 75px;
}
.gd_not{
border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;
padding:10px;
border-radius:5px;
max-width: 75px;
}
</style>
<?php
echo'<div class="phdr">Bảng Xếp Hạng</div>';
switch ($act){
	default:
if ($datauser['rights']>=9){
echo'<div class="phdr">Quản lí</div>';
echo'<div class="omenu"><a href="?act=reset">Reset BXH</a></div>';
}
echo'<div id="msg">';

echo'<div class="gd_"><div class="pmenu"><table width="100%" border="0" cellspacing="0"><tbody><tr class=""><td width="20%"><div id="tt_get1"><div class="gd_not"><center><img onclick="hien(1)" src="icon/chimuc/1.png"></center></div></div></td>
<td width="20%"><div id="tt_get2"><div class="gd_not"><center><img onclick="hien(2)" src="icon/chimuc/2.png"></center></div></div></td>
<td width="20%"><div id="tt_get3"><div class="gd_not"><center><img onclick="hien(3)" src="icon/chimuc/3.png"></center></div></div></td>
<td width="20%"><div id="tt_get4"><div class="gd_not"><center><img onclick="hien(4)" src="icon/chimuc/4.png"></center></div></div></td>
<td width="20%"><div id="tt_get5"><div class="gd_not"><center><img onclick="hien(5)" src="icon/chimuc/5.png"></center></div></div></td>
</tr></tbody></table></div></div>';



echo'</div>';

break;

case 'reset':
if ($datauser['rights']<9 ) {
header('Location: /index.php');
}
echo'<div class="phdr">Reset BXH</div>';


if (isset($_POST[rs])) {
	$text = ' '.$login.' vừa reset BXH!! ';

	mysql_query("INSERT INTO `thongbao` SET
                `id` = '1',
                `user` = '1',
                `text` = '$text',
                `ok` = '1',
                `time` = '" . time() . "'
            ");
			
	echo'<div class="omenu">Thành công</div>';
	mysql_query("UPDATE `users` SET `soca` = '0' ");
	mysql_query("UPDATE `users` SET `nhabepthuhoach` = '0' ");

	mysql_query("UPDATE `users` SET `diemchemgiotuan` = '0' ");
		mysql_query("UPDATE `users` SET `solanhon` = '0' ");
			mysql_query("UPDATE `users` SET `xuthuhoach` = '0' ");
	mysql_query("UPDATE `users` SET `wboss` = '0' ");
		mysql_query("UPDATE `users` SET `naptuan` = '0' ");

}
echo'<div class="omenu">';

		echo '<form method="post">';

echo'Đồng ý reset</br>';
echo'
<input type="submit" name="rs" value="Ok" class="nut"></form></div></center>';
break;

}







require('../incfiles/end.php');
?>
<script>
function hien(id)
{
    $.ajax(
        {
            url : 'bxh-load.php',
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
