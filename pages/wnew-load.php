<?PHP
Define('_IN_JOHNCMS', 1);
Require('../incfiles/core.php');
if (!$user_id){
Header("Location: /");
exit;
}






$olabytom = mysql_fetch_array(mysql_query("SELECT * FROM `wnew` ORDER BY `id` DESC LIMIT 1"));
$tinhtimeht = time() - $olabytom['time'];
if($tinhtimeht <= 200){
$idchat = $olabytom['user'];
$nick = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$idchat."'"));
echo'<div class="pmenu" style="border:1px solid #3883CC;"><marquee><b><font color="red">'.$nick['name'].'</font></b>: ' . bbcode::tags(functions::smileys($olabytom['text'])) . '</marquee></div>';
}