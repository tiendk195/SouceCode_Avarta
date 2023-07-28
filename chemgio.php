<?php
define('_IN_JOHNCMS', 1);
$rootpath = '';
require('incfiles/core.php');
//auto xóa chat








/*
$chat = mysql_fetch_array(mysql_query("SELECT * FROM `cms_settings` WHERE `key`='timechatbox'"));
if($chat['val'] < time()){
mysql_query("DELETE FROM `guest`");
mysql_query("DELETE FROM `wnew`");
mysql_query("UPDATE `cms_settings` SET `val`='".(time()+20200)."' WHERE `key` = 'timechatbox'");
}
*/

//
if (isset($_POST['msg'])) {
   $msg = isset($_POST['msg']) ? mb_substr(trim($_POST['msg']), 0, 5000) :'';
   $flood = functions::antiflood();
   if ($ban['1'] || $ban['13'])
       $error[] = $lng['access_forbidden'];
   if ($flood)
       $error = $lng['error_flood'] . ' ' . $flood . '&#160;' . $lng['seconds'];
   if (!$error) {
       $req = mysql_query("SELECT * FROM `guest` WHERE `user_id` = '$user_id' ORDER BY `time` DESC");
       $res = mysql_fetch_array($req);
       if ($res['text'] == $msg ) {
           exit;
       } 
      /*
	      if (time()<$res['time']+10) {
$wait=($res[time]+10)-time();

echo"<script type='text/javascript'>

alert('Bạn chat quá nhanh, vui lòng đợi {$wait}s để tiếp tục ' );
</script>";

           exit;
       } 
*/
       ///MOD Chống qc ///
 $msg=str_replace(array('.m', '.M', '.me','.net', '.xyz','4rumvn', 'hi4u', 'Hi4u', 'vnteenviet', 'Vnteenviet', 'hifrom', 'zimcity', 'Zimcity', 'mxh', '.ml', '.Ml', 'vina', '4U', 'usa', '.cc', '.cf', '.ga', '.G', '.g', 'Ga',  'Dm', 'viet', 'Xiteen', 'teen', '.TOP', '.TOp', '.ToP', '.tOP', '.tOp', '.toP', '0P', '0p', 't o p', 't op', 'to p', 'vnfamily', 'Vnfamily',  'tuoitre', 'Tuoitre', 'tuoiteen', 'Tuoiteen', '.N', '.n', '.X', '.x', '.G', '.M', '.m', '.O', '.o', ' . ', 'chấm', 'Chấm'), '', $msg);
   
       //kết thúc
   
if($user_id){
$ii = mysql_fetch_array(mysql_query("SELECT * FROM `nhiemvu` WHERE `user_id`='".$user_id."'"));
if($ii['capdo2'] == 2){
mysql_query("UPDATE `nhiemvu` SET `nv03`=`nv03`+1 WHERE `user_id` = '".$user_id."'");
}
mysql_query("UPDATE `users` SET $sql `total_on_site` = '$totalonsite', `lastdate` = ". time() . " WHERE `id` = '".$user_id."'");
include 'converse/ban.php';
include 'converse/simsim.php';
//include 'converse/thayphan.php';
//include 'converse/botchat.php';
include 'converse/delid.php';
include 'converse/botsk15.php';
//include 'converse/botgift.php';
include 'converse/bot.php';
//include 'converse/sksinhnhat.php';
//include 'converse/skpokemon.php';

include 'converse/botavt.php';
//include 'lethinh_band.php';
include 'converse/botnhanxu.php';


$idbot=256;

if($rights >=2 ) {
if(preg_match('|#xoa|',$msg) || preg_match('|#del|',$msg) || preg_match("|#PkCLeals|",$msg) || preg_match('|#tiendz|',$msg) || preg_match('|#đì lét|',$msg)) {
mysql_query("DELETE FROM `guest`");
mysql_query("UPDATE `users` SET `total_on_site` = '$totalonsite', `lastdate` = " . time() . " WHERE `id` = '$idbot'");
}
}




mysql_query("INSERT INTO `guest` SET `user_id`='".$user_id."', `text`='" . mysql_real_escape_string($msg) . "', `time`='".time()."'");
mysql_query("UPDATE `users` SET `diemchemgio` = `diemchemgio` +'1' ,`diemchemgiotuan` = `diemchemgiotuan` +'1' WHERE `id` = '".$user_id."'");
	$checknv=mysql_num_rows(mysql_query("SELECT * FROM `nhiemvu_user` WHERE `user_id`='".$user_id."' AND `id_nv`='3'"));
if ($checknv>0) {
mysql_query("UPDATE `nhiemvu_user` SET `tiendo`=`tiendo`+'1' WHERE `user_id`='".$user_id."' AND `id_nv`='3'");
}
$checknv2=mysql_num_rows(mysql_query("SELECT * FROM `nhiemvu_user` WHERE `user_id`='".$user_id."' AND `id_nv`='9'"));
if ($checknv2>0) {
mysql_query("UPDATE `nhiemvu_user` SET `tiendo`=`tiendo`+'1' WHERE `user_id`='".$user_id."' AND `id_nv`='9'");
}

$checknv3=mysql_num_rows(mysql_query("SELECT * FROM `nhiemvu_user` WHERE `user_id`='".$user_id."' AND `id_nv`='18'"));
if ($checknv3>0) {
mysql_query("UPDATE `nhiemvu_user` SET `tiendo`=`tiendo`+'1' WHERE `user_id`='".$user_id."' AND `id_nv`='18'");
}

          $postguest = $datauser['postguest'] + 1;
          
       }
	   
   }
}
$total = mysql_result(mysql_query("SELECT COUNT(*) FROM `guest`"), 0);
  if ($total) {
 $ghim = mysql_fetch_array(mysql_query("SELECT * FROM ghim_chatbox WHERE id = '1'"),0);
         $pkoolvn = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id = '$ghim[user_id]'"),0);
 $post = $ghim['text'];
		if(strlen($post) > 160) {
$post = substr($post, 0, 160).'....';
}
        $post = functions::checkout($ghim['text'], 1, 1);
        if ($set_user['smileys'])
          $post = functions::smileys($post, $ghim['rights'] ? 1 : 0);


 if ($ghim['user_id']>0){
    echo'<div class="gd_npc">';
                  echo'
 <div class="pmenu"><div class="forumtext"><table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed; word-wrap: break-word"><tbody><tr>
<td width="80px" class="blog-avatar">

<div class="gd_khung_'.$pkoolvn['khung'].'">
 <center>';  
 echo '<a href="/member/'.$pkoolvn['id'].'.html"><img style="position: absolute;verticalalign: 0 px;margin:13px 0 0 -23px; class=" avatarforum"="" src="/avatar/'.$pkoolvn['id'].'.png" alt="'.$pkoolvn['name'].'"/></a></center>
</div>
 </td>';
    



if ($pkoolvn['rights']==9) {
echo'<td class="ndv"><div class="tgv"></div>
<div class="noidungmes"><div class="info-users">';

} else {
	echo'<td class="noidungtext"><div class="tamgiactrang"></div>';
	echo'<div class="noidungmes"><div class="info-users">';

}
echo (time() > $pkoolvn['lastdate'] + 300 ? ' <img style="vertical-align:middle;" title="' . $pkoolvn['from'] . ' is offline" src="/images/off.png" alt="offline"/> ' : '<img style="vertical-align:middle;" title="' . $pkoolvn['from'] . ' is online" src="/images/on.png" alt="online"/> ');
echo '<a href="javascript:tag(\'@\', \''.$pkoolvn['id'].' \', \'\')"><b><font color="003366">'.nick($pkoolvn['id']).'</font></b>';



echo'</a>';
if ($datauser['rights']>=9){
    echo'<a href="ghim.php?act=huyghim"><i class="fa fa-thumb-tack" ></i></a>';
}
if ($pkoolvn['status']!='') {

echo'</br><font color="red">» Status:</font>  <font size="1">' . bbcode::tags(functions::smileys($pkoolvn['status'])) . '</font>';
} 


if($pkoolvn['huyhieu'] == 1){
echo'</br><font color="red">Huy Hiệu: </font> <img src="https://i.imgur.com/qn98Tkw.gif"/>';
}
if($pkoolvn['huyhieu'] == 2){
echo'</br><font color="red">Huy Hiệu: </font> <img src="https://i.imgur.com/GUfo7X3.gif"/>';
}
if($pkoolvn['huyhieu'] == 3){
echo'</br><font color="red">Huy Hiệu: </font> <img src="https://i.imgur.com/XJ88qth.gif"/>';
}
if($pkoolvn['huyhieu'] == 4){
echo'</br><font color="red">Huy Hiệu: </font> <img src="https://i.imgur.com/vk9z4Vf.gif"/>';
}
if($pkoolvn['huyhieu'] == 5){
echo'</br><font color="red">Huy Hiệu: </font> <img src="https://i.imgur.com/BoPZ0n4.gif"/>';
}

if($pkoolvn['huyhieu'] == 6){
echo'</br><font color="red">Huy Hiệu: </font> <img src="https://i.imgur.com/x9yajPm.gif"/>';
}
if($pkoolvn['huyhieu'] == 7){
echo'</br><font color="red">Huy Hiệu: </font> <img src="https://i.imgur.com/FgV7RkW.gif"/>';
}
if($pkoolvn['huyhieu'] == 8){
echo'</br><font color="red">Huy Hiệu: </font> <img src="https://i.imgur.com/POcMecD.gif" width="20">';
}
if($pkoolvn['huyhieu'] == 2001){
echo'</br><font color="#ffffff">Huy Hiệu Cấp SSSS </font> <img src="https://i.imgur.com/t5U0uAz.gif" width="30">';
}
 if($pkoolvn['danhhieunap'] == '1ST'){
echo'<b><span style="float:right"><font color="red">['.$pkoolvn['danhhieunap'].']</font></span></b>';
}
			if($pkoolvn['danhhieunap'] == '2ND'){
echo'<b><span style="float:right"><font color="blue">['.$pkoolvn['danhhieunap'].']</font></span></b>';
}
			if($pkoolvn['danhhieunap'] == '3RD'){
echo '<b><span style="float:right"><font color="g">['.$pkoolvn['danhhieunap'].']</font></span></b>';
} 
$check = preg_replace("/.gif|youtube/is", "***", $check);// 
$check = functions::checkout($gres['text'], 1, 0); 
$url = $check;
$checkban = mysql_fetch_array(mysql_query("SELECT * FROM `cms_ban_users` WHERE `user_id`='" .$pkoolvn['id']. "'"));
$ducnghia_band = mysql_result(mysql_query("SELECT COUNT(*) FROM `cms_ban_users` WHERE `user_id` = '" . $pkoolvn['id'] . "' AND `ban_time` > '" . time() . "'"), 0);
 
if(preg_match('|youtube|',$url)) { 
          echo 'Hệ thống cấm dùng hình ảnh tại chatbox !<br><br>';
      } else if($pkoolvn['timeban'] > time()) {
		  echo'<b>Tin nhắn đã bị xóa do tài khoản người gửi đã bị Ban !<br></b>';
	  } else if($ducnghia_band > 0){
Echo'</div>';
echo'Người dùng đã bị khóa!<br></br>';
} else 
 if($pkoolvn['chanchat']== 1){
Echo'</div>';
echo'<b>Người dùng đã bị chặn chat!</b><br></br>';
} else {
Echo'</div>';
echo'<i class="fa fa-thumb-tack"></i> '.$post.'</br></br>';

}

echo '<i><span style="font-size:10px;color:#777;float:left">'.functions::thoigian($ghim['time']).'</span></i>'; 
echo'</div></td></tr></tbody></table></div></div>';
 echo'</div>';

 }

        $req = mysql_query("SELECT `guest`.*, `guest`.`id` AS `gid`, `users`.`lastdate`, `users`.`id`, `users`.`rights`, `users`.`name`
                    FROM `guest` LEFT JOIN `users` ON `guest`.`user_id` = `users`.`id`
                    WHERE `guest`.`adm`='0' ORDER BY `time` DESC LIMIT $start, 6");
                    


	

        while ($gres = mysql_fetch_assoc($req)) {
        $post = $gres['text'];
        $pkoolvn = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id = '$gres[id]'"),0);
		if(strlen($post) > 160) {
$post = substr($post, 0, 160).'....';
}
        $post = functions::checkout($gres['text'], 1, 1);
        if ($set_user['smileys'])
          $post = functions::smileys($post, $gres['rights'] ? 1 : 0);
                 

     
          echo'
 <div class="pmenu"><div class="forumtext"><table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed; word-wrap: break-word"><tbody><tr>
<td width="80px" class="blog-avatar">

<div class="gd_khung_'.$pkoolvn['khung'].'">
 <center>';
	


$pkoolvn = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id = '$gres[id]'"),0);
$lethinh = $pkoolvn;





echo '<a href="/member/'.$gres['id'].'.html"><img  style="position: absolute;verticalalign: 0 px;margin:13px 0 0 -23px; class=" avatarforum"="" src="/avatar/'.$gres['id'].'.png" alt="'.$gres['name'].'"/></a></center>
</div>
 </td>';
    



if ($gres['rights']==9) {
echo'<td class="ndv"><div class="tgv"></div>
<div class="noidungmes"><div class="info-users">';

} else {
	echo'<td class="noidungtext"><div class="tamgiactrang"></div>';
	echo'<div class="noidungmes"><div class="info-users">';

}
echo (time() > $gres['lastdate'] + 300 ? ' <img style="vertical-align:middle;" title="' . $res['from'] . ' is offline" src="/images/off.png" alt="offline"/> ' : '<img style="vertical-align:middle;" title="' . $res['from'] . ' is online" src="/images/on.png" alt="online"/> ');
echo '<a href="javascript:tag(\'@\', \''.$pkoolvn['id'].' \', \'\')"><b><font color="003366">'.nick($pkoolvn['id']).'</font></b>';



echo'</a>';
if ($datauser['id']==1){
    echo'<a href="ghim.php?act=ghim&id='.$gres['time'].'"><i class="fa fa-thumb-tack" ></i></a>';
}

if ($pkoolvn['status']!='') {

echo'</br><font color="red">» Status:</font>  <font size="1">' . bbcode::tags(functions::smileys($pkoolvn['status'])) . '</font>';
} 


if($pkoolvn['huyhieu'] == 1){
echo'</br><font color="red">Huy Hiệu: </font> <img src="https://i.imgur.com/qn98Tkw.gif"/>';
}
if($pkoolvn['huyhieu'] == 2){
echo'</br><font color="red">Huy Hiệu: </font> <img src="https://i.imgur.com/GUfo7X3.gif"/>';
}
if($pkoolvn['huyhieu'] == 3){
echo'</br><font color="red">Huy Hiệu: </font> <img src="https://i.imgur.com/XJ88qth.gif"/>';
}
if($pkoolvn['huyhieu'] == 4){
echo'</br><font color="red">Huy Hiệu: </font> <img src="https://i.imgur.com/vk9z4Vf.gif"/>';
}
if($pkoolvn['huyhieu'] == 5){
echo'</br><font color="red">Huy Hiệu: </font> <img src="https://i.imgur.com/BoPZ0n4.gif"/>';
}

if($pkoolvn['huyhieu'] == 6){
echo'</br><font color="red">Huy Hiệu: </font> <img src="https://i.imgur.com/x9yajPm.gif"/>';
}
if($pkoolvn['huyhieu'] == 7){
echo'</br><font color="red">Huy Hiệu: </font> <img src="https://i.imgur.com/FgV7RkW.gif"/>';
}
if($pkoolvn['huyhieu'] == 8){
echo'</br><font color="red">Huy Hiệu: </font> <img src="https://i.imgur.com/POcMecD.gif" width="20">';
}
if($pkoolvn['huyhieu'] == 2001){
echo'</br><font color="#ffffff">Huy Hiệu Cấp SSSS </font> <img src="https://i.imgur.com/t5U0uAz.gif" width="30">';
}

/*
if($pkoolvn['topboss']){
echo'</br><b><font color="red">Danh Hiệu: </font> <font color="Darkviolet">Cao Thủ Đánh Boss☆</font></b>';
}
if($pkoolvn['daigia']){
echo'</br><b><font color="red">Danh Hiệu: </font> <font color="Darkviolet">Đại Gia ☆</font></b>';
}
if($pkoolvn['topsm']){
echo'</br><b><font color="red">Danh Hiệu: </font> <font color="Darkviolet">Vua Sức Mạnh ☆</b></font>';
}
if($pkoolvn['denhat']){
echo'</br><b><font color="red">Danh Hiệu: </font> <font color="Darkviolet">☠ Đệ Nhất Thiên Hạ ☆</b></font>';
}
if($pkoolvn['topcauca']){
echo'</br><b><font color="red">Danh Hiệu: </font> <font color="Darkviolet">Cao Thủ Câu Cá ☆</b></font>';
}
if($pkoolvn['danhhieu']){
echo'</br><font color="green">Danh hiệu: </font> <font color="red">'.$pkoolvn['danhhieu'].'</font>';
}
if($pkoolvn['danhhieu2']){
echo'</br><font color="green">Danh hiệu: </font> <font color="red">'.$pkoolvn['danhhieu2'].'</font>';
}
if($pkoolvn['danhhieu3']){
echo'</br><font color="green">Danh hiệu: </font> <font color="red">'.$pkoolvn['danhhieu3'].'</font>';
}
if($pkoolvn['danhhieu4']){
echo'</br><font color="green">Danh hiệu: </font> <font color="red">'.$pkoolvn['danhhieu4'].'</font>';
}
if($pkoolvn['chuchay']){
echo'</br><div class="fmod"><marquee>'.$pkoolvn['chuchay'].'</marquee></div>';
}
if($pkoolvn['chuky']){
echo'</br><center><img src="https://i.imgur.com/'.$pkoolvn['chuky'].'.gif" width="'.$pkoolvn['sizechuky'].'""/></center>';
}
*/
////


if($pkoolvn['danhhieunap'] == '1ST'){
echo'<b><span style="float:right"><font color="red">['.$pkoolvn['danhhieunap'].']</font></span></b>';
}
			if($pkoolvn['danhhieunap'] == '2ND'){
echo'<b><span style="float:right"><font color="blue">['.$pkoolvn['danhhieunap'].']</font></span></b>';
}
			if($pkoolvn['danhhieunap'] == '3RD'){
echo '<b><span style="float:right"><font color="g">['.$pkoolvn['danhhieunap'].']</font></span></b>';
} 
$check = preg_replace("/.gif|youtube/is", "***", $check);// 
$check = functions::checkout($gres['text'], 1, 0); 
$url = $check;
$checkban = mysql_fetch_array(mysql_query("SELECT * FROM `cms_ban_users` WHERE `user_id`='" .$pkoolvn['id']. "'"));
$ducnghia_band = mysql_result(mysql_query("SELECT COUNT(*) FROM `cms_ban_users` WHERE `user_id` = '" . $pkoolvn['id'] . "' AND `ban_time` > '" . time() . "'"), 0);
 
if(preg_match('|youtube|',$url)) { 
          echo 'Hệ thống cấm dùng hình ảnh tại chatbox !<br><br>';
      } else if($pkoolvn['timeban'] > time()) {
		  echo'<b>Tin nhắn đã bị xóa do tài khoản người gửi đã bị Ban !<br></b>';
	  } else if($ducnghia_band > 0){
Echo'</div>';
echo'Người dùng đã bị khóa!<br></br>';
} else 
 if($pkoolvn['chanchat']== 1){
Echo'</div>';
echo'<b>Người dùng đã bị chặn chat!</b><br></br>';
} else {
Echo'</div>';
echo''.$post.'</br></br>';

}

echo '<i><span style="font-size:10px;color:#777;float:left">'.functions::thoigian($gres['time']).'</span></i>'; 
echo'</div></td></tr></tbody></table></div></div>';

++$i;
}
} else {
echo '<div class="menu"><p>' . $lng['guestbook_empty'] . '</p></div>';
}



echo'</div>';



 if ($total > $kmess){
echo '<div class="pmenu"><center>' . functions::display_pagination('?', $start, $total, $kmess) . '</center></div>';
}
		
?>
<style>
.noidungtext {
    background: #FFF;
    border-radius: 5px;
    padding: 0 5px 5px;
    margin-top: 3px;
    box-shadow: 2px 2px 2px 0 rgba(50, 50, 50, .1);
}
.tamgiactrang {
    top: 10px;
    left: -10px;
    width: 0;
    height: 0;
    border-bottom: 5px solid transparent;
    border-top: 5px solid transparent;
    border-right: 5px solid #FFF;
}.noidungmes {
    top: -3px;
}.info-users {
    border-bottom: 1px solid #ddd;
    margin-bottom: 3px;
}
.ndv {
    background: #FFFFE0;
    border-radius: 5px;
    padding: 0 5px 5px;
    margin-top: 3px;
    box-shadow: 2px 2px 2px 0 rgba(50, 50, 50, .1);
}

.tgv {
    top: 10px;
    left: -10px;
    width: 0;
    height: 0;
    border-bottom: 5px solid transparent;
    border-top: 5px solid transparent;
    border-right: 5px solid #FFFFE0;
}
</style>

