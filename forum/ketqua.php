<?php
define('_IN_JOHNCMS', 1);
$headmod = 'users';
require ('../incfiles/core.php');
$lng_forum = core::load_lng('forum');
$textl = 'Kết quả tìm kiếm trên google';
require ('../incfiles/head.php');
//Last search
$sql = " AND `engine` LIKE '%google%'";
$sql = str_replace('AND', 'WHERE', $sql);
         $total = mysql_result(mysql_query("SELECT COUNT(*) FROM `stat_robots` ".$sql.""), 0);
         if($total > 0)
         $req = mysql_query("SELECT * FROM `stat_robots` ".$sql." ORDER BY `date` DESC LIMIT 30");

if($total > 0){
	echo '<div class="gmenu">';
while ($arr = mysql_fetch_array($req)){
    echo '<a href="https://www.google.com.vn/m?q=' . str_replace(' ','+',$arr['query']) . '">'.$arr['query'].'</a>, ';
    
}
echo '</div>';
}
require ('../incfiles/end.php');