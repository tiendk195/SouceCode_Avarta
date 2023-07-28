<?php
header('Content-Type: text/html; charset="utf-8');
define('_IN_JOHNCMS', 1);

$rootpath='../../';
require_once ("../../incfiles/core.php");
if (!$user_id) {
header('Location: /index.php');
exit;
}


    ?>
<script type="text/javascript">
$(document).ready(function(){
	$('#btn-danh').click(function(){
		var idvp = $('#idvp').val();
		var url = "danh4-load.php";
		var data = {"danh": "", "idvp": idvp};
		$('#content-load').load(url, data);
		return false;
	});
});
</script>
<?php
//-- Online Topic ---//
mysql_query("UPDATE `users` SET `vitri`='671' WHERE `id`='{$user_id}'");

$online_u = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `lastdate` > " . (time() - 300) . " AND `vitri` = '671'"), 0);
$totalonline = $online_u;
$q = @mysql_query("select * from `users` where `lastdate` > " . (time() - 300) . " AND `vitri` = '671';");
$count = mysql_num_rows($q);
while ($arr = mysql_fetch_array($q)){
$trinhtrangvip = mysql_query("select `rights` from `users` where id='" . $arr['id'] . "'");
$trinhtrangviphonnua = mysql_fetch_array($trinhtrangvip);
if($arr['id'] != $datauser['id']){
	if ($datauser['zombie']==1){
$u_on[]='<label style="display: inline-block;text-align: center;"><input type="hidden" id="idvp" name="idvp" value="'.$arr['id'].'"><img src="/avatar/' . $arr['id'] . '.png"><form method="post"><input type="submit" id="btn-danh" name="danh" value="Đánh"></form></label>';
} else {
 $u_on[]='<label style="display: inline-block;text-align: center;"><a href="/member/' . $arr['id'] . '.html"><img src="/avatar/' . $arr['id'] . '.png"></a></label>';   
}
}else{
}
}
//Keet thuc topic

$id=(int)$_POST[idvp];
$check  = mysql_num_rows(mysql_query("SELECT * FROM users WHERE id = '$id'"));
$row = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id = '$id'"));
if ($check < 1)
{
    echo"
<script>
alert('Người chơi không tồn tại' );
</script>";
}
 else if ($row['vitri']!='671')
{
      echo"
<script>
alert('Người chơi không ở trong map này' );
</script>";


}else if ($datauser['zombie']==0){
       echo"
<script>
alert('Không thể lây nhiễm khi bạn là người' );
</script>"; 
}else if ($datauser['id']==$id){
       echo"
<script>
alert('Không thể lây nhiễm chính mình' );
</script>"; 

} else if ($row['zombie']==1){
       echo"
<script>
alert('Không thể lây nhiễm cho đồng đội' );
</script>"; 
}

else {
        $rand=rand(1,3);
    if ($rand==1){
       echo"
<script>
alert('Lây nhiễm cho {$row[name]} thành công' );
</script>"; 
 mysql_query("UPDATE `users` SET `zombie`='1' WHERE `id`='$id'");
  mysql_query("UPDATE `users` SET `zombie`='0' WHERE `id`='$user_id'");
        $bot='Bạn [red]'.$row['name'].'[/red] vừa bị biến thành Zombie do [b]'.$datauser['name'].'[/b] lây nhiễm';
        mysql_query("INSERT INTO `guest` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
} else if ($rand!=1){
           echo"
<script>
alert('Lây nhiễm cho {$row[name]} thất bại' );
</script>"; 
}
} 
if ($online_u > 0){
echo implode(' ',$u_on).'';
}else{
	echo '<label style="display: inline-block;text-align: center;"><b style="font-size: 9px;color:red;font-weight:bold;text-align: center;">'.$datauser['name'].'</b><br><img src="/avatar/' . $datauser['id'] . '.png"></label>';
}
echo'<label style="display: inline-block;text-align: center;"><a href="/member/' . $datauser['id'] . '.html"><img src="/avatar/'.$user_id.'.png"></a></label>';
?>