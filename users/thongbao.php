<?php

define('_IN_JOHNCMS', 1);
$headmod = 'journal';
$active3 = 'id="selected"';

require ('../incfiles/core.php');
$textl = 'Thông báo của bạn';
require ('../incfiles/head.php');

if (!$user_id) {
    echo 'Bạn vui lòng đăng nhập để thực hiện việc này';
    require ('../incfiles/end.php');
    exit;
}
echo '<div class="phdr"><b>Thông báo của bạn</b> - <a href="?act=del">Xóa</a></div>';
echo '<div class="gd_">';
$a = mysql_query("SELECT * FROM `thongbao` WHERE `ok` = '1' and `user` = '" . $user_id . "'");
$b = mysql_fetch_assoc($a);

$c = mysql_num_rows($a);	
/////////	
$sort = isset($_GET['sort']) ? trim($_GET['sort']) : '';
///
$tong =mysql_result(mysql_query("SELECT COUNT(*) FROM `thongbao` WHERE `user` = '".$user_id."' "),0);

$req=mysql_query("SELECT * FROM `thongbao` WHERE `user` = '".$user_id."' ORDER BY `id1` DESC LIMIT $start,$kmess");

$i = 0;
while($res=mysql_fetch_array($req)) {
$row = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id = '".$res['id']."'"));

    $link = '';
    $t = mysql_result($req, $i, "text");

    echo $res['ok']==1 ? '<div class="moi">':'<div class="cu">';
    echo'<div class="gd_">';
	if ($res['id']==1){
echo'<font color="red"><b>'.$row['name'].': </b></font> '; 
	}
    echo bbcode::tags(functions::smileys($t));
    echo' <br><i style="font-size:9px;color:#777;float:left"> ' . functions::thoigian($res['time']) . '</i><br></br>';
    echo '</div>';
        echo '</div>';
    ++$i;
}
mysql_query("UPDATE `thongbao` SET `ok`='0' WHERE `user` = '$user_id'");
$q = mysql_query("SELECT * FROM `thongbao` WHERE `user` = '" . $user_id . "'");
$w = mysql_num_rows($q);

if($w == 0){echo '<div class="menu">Không có thông báo mới nào</div></div>';
require_once ('../incfiles/end.php');
exit;
}
if ($tong > $kmess){
echo '<div class="topmenu">' . functions::display_pagination('?', $start, $tong, $kmess) . '</div>';
}
switch ($act) {
case "del":
       
              if ($user_id) 
              {
                $del = mysql_query("DELETE FROM `thongbao` WHERE `user` = '".$user_id."' AND `ok` = '0'");
                
              echo $del;
          header("location: thongbao.html");
              }
break;
}
echo'</div>';
///////

require_once ('../incfiles/end.php');
?>
<style>
    .moi {
    background-color: #EAF6FC;
    border-radius: 5px;
    border: 2px solid #090909;
    color: #31708f;
    margin: 2px 0;
    padding: 10px;
}
.cu {
    background-color: #EAF6FC;
    border-radius: 5px;
    border: 1px solid #bce8f1;
    color: #31708f;
    margin: 2px 0;
    padding: 10px;
}
</style>