<?PHP
Define('_IN_JOHNCMS', 1);
$rootpath='../../';

require_once ("../../incfiles/core.php");
if (!$user_id){
Header("Location: /");
exit;
}
mysql_query("UPDATE `users` SET `vitri`='669' WHERE `id`='{$user_id}'");

//-- Online Topic ---//
$online_u = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `lastdate` > " . (time() - 300) . " AND `vitri` = '669'"), 0);
$totalonline = $online_u;
$q = @mysql_query("select * from `users` where `lastdate` > " . (time() - 300) . " AND `vitri` = '669';");
$count = mysql_num_rows($q);
while ($arr = mysql_fetch_array($q)){
$trinhtrangvip = mysql_query("select `rights` from `users` where id='" . $arr['id'] . "'");
$trinhtrangviphonnua = mysql_fetch_array($trinhtrangvip);
if($arr['id'] != $datauser['id']){
	
$u_on[]='<a href="/member/' . $arr['id'] . '.html"><img src="/avatar/' . $arr['id'] . '.png"></a>';
}else{
}
}
//Keet thuc topic


if ($online_u > 0){
echo implode(' ',$u_on).'';
}else{

}




