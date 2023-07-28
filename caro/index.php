<?php
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
$textl = 'Caro Online';
$DOCTYPE3 = 2;
require('../incfiles/head.php'); 

echo'<div class="main-xmenu">';
echo'<div class="phdr">Caro Online</div>';
if (!$user_id){
echo'<div class="menu">Bạn phải đăng nhập để chơi game này nhé !</div>';
echo'</div>';
require('../incfiles/end.php');
exit;
}
if(isset($_POST['off'])){
@mysql_query("UPDATE users SET `jquery` = '0' WHERE `id`='{$user_id}'");
header('Location: '.$home.'/caro/');
}
if (isset($_POST['on'])){
header('Location: '.$home.'/caro/');
@mysql_query("UPDATE users SET `jquery` = '1' WHERE `id`='{$user_id}'");
}

$moneycol='xu'; //Tên cột dữ liệu tiền của thành viên
if(!$datauser['id']){$datauser['id']='0';}
?>
<style>
.smi
{
border:0px solid black;
}
.tab {border-collapse:collapse;}
td
{
padding:0px;
}
</style>

<script type="text/javascript" src="<?php echo $home; ?>/jquery-vina4u.js"></script>
<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
<!--[if !IE]><!-->
<script>
var turn=0;
var getturn;
 setInterval(function(){
 $( "#autoload" ).load( "http://<?php echo $_SERVER['SERVER_NAME']; ?>/caro/menucaro.php?id=<?php echo $_GET['id']; ?>" );
$.get('caroturn.php?id=<?php echo $_GET['id']; ?>', function(data){
    getturn= data;
});
if(getturn != turn){
turn= getturn;
 $( "#autocaro" ).load( "http://<?php echo $_SERVER['SERVER_NAME']; ?>/caro/ocaro.php?id=<?php echo $_GET['id']; ?>" );
}
 }, 1000);
 function danhco(tx,ty){
     $.get("http://<?php echo $_SERVER['SERVER_NAME']; ?>/caro/?id=<?php echo $_GET['id']; ?>&action=" + tx + "." +ty);
    return false;
 }
</script>
<!--<![endif]-->
<!--[if IE]>
<script>
var turn=0;
var getturn;
 setInterval(function(){
 $( "#autoload" ).load( "menucaro.php?id=<?php echo $_GET['id']; ?>&" + new Date().getTime() );
$.get('caroturn.php?id=<?php echo $_GET['id']; ?>&' + new Date().getTime() , function(data){
    getturn= data;
});
if(getturn != turn){
turn= getturn;
 $( "#autocaro" ).load( "ocaro.php?id=<?php echo $_GET['id']; ?>&" + new Date().getTime() );
}
 }, 1000);
 function danhco(tx,ty){
     $.get("?id=<?php echo $_GET['id']; ?>&action=" + tx + "." +ty);
    return false;
 }
</script>
<![endif]-->

<?php
if(!$_GET['id']){if($datauser['id']!=0){
$cwin=$datauser['cwin'];
$close=$datauser['close'];
if(($cwin+$close)>0) {$tlt=(int)(($cwin/($cwin+$close))*100).'%';} else {$tlt='0%';}
echo'<div class="menu list-bottom congdong">Thành tích: '.$cwin.' thắng và '.$close.' thua, tỉ lệ thắng '.$tlt.'</div>';
$a = explode(".",$datauser[$moneycol]);
$tien = $a[0];

if($_POST['muccuoc']<0 || $_POST['socot'] < 15 || $_POST['socot'] > 25){ ?>
<div class="menu">
<form action="/caro/" method="post">
Nhập ID số nick muốn đấu (để trống để tạo bàn chờ):<br>
<?php if($_GET['thachdau']){
$td = $_GET['thachdau'];
$gettd=mysql_query('SELECT * FROM users WHERE id='.$td);
if(mysql_numrows($gettd)>0){
echo '<b><a href="/member/'.mysql_result($gettd,0,"id").'.html">'.mysql_result($gettd,0,"name").'</a></b>';
} else {echo '<input type="text" name="doituong" value="">';}
} else { ?>
<input type="text" name="doituong" value="">
<?php } ?><br>
Mức cược:<br><input type="text" name="muccuoc" value="0"> <br>
<input type="hidden" name="socot" value="15">
<input type="hidden" name="wt" value="1">
	<input type="submit" value="Thách Đấu" />
</form>
</div>

<?php } else {
if(!$_POST['doituong']){$btrong='1';} else {
$dup = mysql_query("SELECT * FROM users WHERE id='".mb_strtolower($_POST['doituong'], 'UTF-8')."'");
if(mysql_numrows($dup)>0){$poid=mysql_result($dup,0,'id');}
$nnumrow=mysql_numrows($dup);
}
$kiemtra=mysql_query('SELECT * FROM `carodata` WHERE (`px`='.$datauser['id'].' OR  (`po`='.$datauser['id'].' AND `turn`!=0)) AND `winner`=0');
$demban=mysql_numrows($kiemtra);
if(($nnumrow>0 || $btrong) && $poid!=$datauser['id'] && $datauser[$moneycol]>=$_POST['muccuoc'] && $_POST['muccuoc']<=100000000000 && ($poid || $btrong) && $_POST['wt']>=1 && $_POST['wt']<=60 && $demban==0){
$oid=($btrong=='1') ? 0 : mysql_result($dup,0,'id');
$sql="INSERT INTO `carodata` (`id`, `data1`, `data2`, `px`, `po`, `turn`, `winner`, `tinhtrang`, `hl`, `socot`, `muccuoc`, `new`, `waittime`, `lastturn`) VALUES (NULL, '', '', '".$datauser['id']."', '".$oid."', '0', '0', '0', '', '".$_POST['socot']."', '".$_POST['muccuoc']."', '1', '".$_POST['wt']."', '".time()."')";
$result=mysql_query($sql);
$xin = mysql_insert_id();
if(!$_POST['doituong']){
$avatar = ''.$login.' vừa tạo phòng caro với mức cược '.number_format($_POST['muccuoc']).' xu [url='.$home.'/caro/?id='.$xin.'][b]bấm vào đây[/b][/url] để tham gia';
        $time = time();
        mysql_query("INSERT INTO `guest` SET
            `adm` = '0',
            `time` = '$time',
            `user_id` = '256',
            `name` = 'BOT',
            `text` = '" . mysql_real_escape_string($avatar) . "',
            `ip` = '0000',
            `browser` = 'IPHONE'
        ");
}

$text = '<b>'.nick($user_id).'</b> mời bạn chơi caro <a href="/caro"><b>Bấm Vào Đây</b></a> để xem';
mysql_query("INSERT INTO `thongbao` SET
                `id` = '".$user_id."',
                `user` = '".$oid."',
                `text` = '$text',
                `ok` = '1',
                `time` = '" . time() . "'
            ");
$texttb = ''.$datauser['name'].' đã mời bạn chơi caro với mức cược '.number_format($_POST['muccuoc']).'xu bạn có muốn tham gia?';
$url_tb = ''.$home.'/caro/?id='.$xin.'';
mysql_query("UPDATE `users` SET `tb_load`='".$texttb."',`url_tb`='".$url_tb."' WHERE `id` = '".$oid."'");
echo '<div class="menu">Tạo bàn chơi thành công!</div>';
} else { ?>
<div class="menu"><font color="red">
<?php
if($_POST['socot'] < 15 || $_POST['socot'] > 25){ echo 'Số cột không hợp lệ.<br>';}
if($demban!=0){ echo 'Hãy hoàn thành các bàn chơi chưa xong trước khi tạo bàn.<br>';}
if($datauser[$moneycol]<$_POST['muccuoc']){ echo 'Tiền cược không đủ.<br>';}
if($nnumrow==0 && $_POST['doituong']){ echo 'Không tìm thấy thành viên này.<br>';}
if($_POST['muccuoc']>100000000000){ echo 'Tiền cược phải nhỏ hơn 100.000.000.000 Xu<br>';}
if($_POST['wt']<1 || $_POST['wt']>60){ echo 'Thời gian chờ phải từ 1 đến 60 phút.<br>';}
?>
</font></div><div class="menu list-top congdong">
<form action="/caro/" method="post">
Nhập ID số nick muốn đấu (để trống để tạo bàn chờ):<br>
<?php if($_GET['thachdau']){
$td = ereg_replace("[^0-9]", "", $_GET['thachdau']);
$gettd=mysql_query('SELECT * FROM users WHERE id='.$td);
if(mysql_numrows($gettd)>0){
echo '<b><a href="/member/'.mysql_result($gettd,0,"id").'.html">'.mysql_result($gettd,0,"name").'</a></b>';
} else {echo '<input type="text" name="doituong" value="">';}
} else { ?>
<input type="text" name="doituong" value="">
<?php } ?><br>
Mức cược:<br><input type="text" name="muccuoc" value="0"> <br>
<input type="hidden" name="socot" value="15">
<input type="hidden" name="wt" value="1">
	<input type="submit" value="Chấp nhận" />
</form></div>
<?php }
}
$sql='SELECT c.*, x.name AS xname, x.rights AS xrights, o.name AS oname, o.rights AS orights, x.lastdate AS xlvs FROM carodata c LEFT JOIN users x ON c.px=x.id LEFT JOIN users o ON c.po=o.id WHERE `turn` = 0 AND `po` = '.$datauser['id'].' AND `winner`=0 ORDER BY c.id DESC LIMIT 10';
$result=mysql_query($sql);
if(mysql_numrows($result)>0){
echo '<div class="phdr"><b>Bàn cờ chờ chấp thuận của bạn:</b></div>';
$a=0;
while($a<mysql_numrows($result)){
echo '';
if (time()-mysql_result($result,$a,"xlvs")>300){echo '<img src="icons/9.png"> ';}
else {echo '<div class="menu list-top congdong"><img src="icons/30.png"> ';}
echo '<a href="?id='.mysql_result($result,$a,'id').'">Bàn số #'.mysql_result($result,$a,'id').'</a> (đề nghị bởi <b><a href="/member/'.mysql_result($result,$a,"px").'.html">'.mysql_result($result,$a,"xname").'</a></b>) mức cược '.number_format(mysql_result($result,$a,"muccuoc")).'$ </div>';
$a++;
}
}
$sql='SELECT c.*, x.name AS xname, x.rights AS xrights, o.name AS oname, o.rights AS orights FROM carodata c LEFT JOIN users x ON c.px = x.id LEFT JOIN users o ON c.po = o.id WHERE `turn` = '.$datauser['id'].' AND `winner`=0 ORDER BY c.id DESC LIMIT 10';
$result=mysql_query($sql);
if(mysql_numrows($result)>0){
echo'</div>';
echo'<div class="main-xmenu">';
echo'<div class="phdr">Bàn cờ chờ chấp thuận của bạn:</div>';
$a=0;
while($a<mysql_numrows($result)){
if(mysql_result($result,$a,'px')==$datauser['id']){$o='o';} elseif(mysql_result($result,$a,'po')==$datauser['id']){$o='x';}
if(((time()-mysql_result($result,$a,'lastturn'))/60)>mysql_result($result,$a,'waittime')){$sp1='<span style="background-color: rgb(249, 240, 218)">';$sp2='</span>';}
echo $sp1.'<div class="menu list-top congdong"><a href="?id='.mysql_result($result,$a,'id').'">Bàn số #'.mysql_result($result,$a,'id').'</a> (với <b><a href="/member/'.mysql_result($result,$a,"p".$o).'.html">'.mysql_result($result,$a,$o."name").'</a></b>) mức cược '.number_format(mysql_result($result,$a,"muccuoc")).'$</div>'.$sp2;
$a++;
}
}
$sql='SELECT c.*, x.name AS xname, x.rights AS xrights, o.name AS oname, o.rights AS orights FROM carodata c LEFT JOIN users x ON c.px = x.id LEFT JOIN users o ON c.po = o.id WHERE `turn` != '.$datauser['id'].' AND `turn` != 0 AND (`px` = '.$datauser['id'].' OR `po` = '.$datauser['id'].') AND `winner`=0 ORDER BY c.id DESC LIMIT 10';
$result=mysql_query($sql);
if(mysql_numrows($result)>0){
echo'</div>';
echo'<div class="main-xmenu">';
echo'<div class="phdr">Bàn cờ đang tham gia</div>';
$a=0;
while($a<mysql_numrows($result)){
if(mysql_result($result,$a,'px')==$datauser['id']){$o='o';} elseif(mysql_result($result,$a,'po')==$datauser['id']){$o='x';}
if(((time()-mysql_result($result,$a,'lastturn'))/60)>mysql_result($result,$a,'waittime')){$sp1='<span style="background-color: rgb(249, 240, 218)">';$sp2='</span>';}
echo '<div class="menu"><img src="/caro/icons/pl.png"> <a href="/caro/?id='.mysql_result($result,$a,'id').'">[ <b>Bàn số #'.mysql_result($result,$a,'id').'</b> ]</a> (với <b><a href="/profile.php?user='.mysql_result($result,$a,"p".$o).'">'.mysql_result($result,$a,$o."name").'</a></b>) mức cược '.number_format(mysql_result($result,$a,"muccuoc")).'xu</div>';
$a++;
}}
$sql='SELECT c.*, x.name AS xname, x.rights AS xrights, o.name AS oname, o.rights AS orights FROM carodata c LEFT JOIN users x ON c.px = x.id LEFT JOIN users o ON c.po = o.id WHERE `turn` = 0 AND `px` = '.$datauser['id'].' AND `po`!=0 AND `winner`=0 ORDER BY c.id DESC LIMIT 10';
$result=mysql_query($sql);
if(mysql_numrows($result)>0){
echo'</div>';
echo'<div class="main-xmenu">';
echo'<div class="phdr">Bàn cờ chờ chấp thuận của đối thủ</div>';
$a=0;
while($a<mysql_numrows($result)){
if(mysql_result($result,$a,'px')==$datauser['id']){$o='o';} elseif(mysql_result($result,$a,'po')==$datauser['id']){$o='x';}
echo'<div class="menu list-top congdong"><img src="/caro/icons/30.png"> <a href="/caro/?id='.mysql_result($result,$a,'id').'">[ <b>Bàn số #'.mysql_result($result,$a,'id').'</b> ]</a> (với <b><a href="/member/'.mysql_result($result,$a,"p".$o).'.html">'.nick(mysql_result($result,$a,"p".$o)).'</a></b>) mức cược '.number_format(mysql_result($result,$a,"muccuoc")).'xu</div>';
$a++;
}}
}
$sql='SELECT c.*, x.name AS xname, x.rights AS xrights, o.name AS oname, o.rights AS orights, x.lastdate AS xlvs FROM carodata c LEFT JOIN users x ON c.px = x.id LEFT JOIN users o ON c.po = o.id WHERE `turn` = 0 AND `po` = 0 AND `winner`=0 AND '.time().' - x.lastdate <=300 ORDER BY c.id DESC LIMIT 10';
$result=mysql_query($sql);
if(mysql_numrows($result)>0){
echo'</div>';
echo'<div class="main-xmenu">';
echo'<div class="phdr">Bàn cờ trống đang chờ</div>';
$a=0;
while($a<mysql_numrows($result)){
echo'<div class="menu">';
if (time()-mysql_result($result,$a,"xlvs")>300){echo '<img src="/caro/icons/9.png"> ';}
else {echo '<img src="/caro/icons/30.png"> ';}
echo '<a href="/caro/?id='.mysql_result($result,$a,'id').'">[ <b>Bàn số #'.mysql_result($result,$a,'id').'</b> ]</a> (tạo bởi <b><a href="/member/'.mysql_result($result,$a,"px").'.html">'.nick(mysql_result($result,$a,"px")).'</a></b> cược '.number_format(mysql_result($result,$a,"muccuoc")).'xu - '.mysql_result($result,$a,"waittime").' phút trước)</div>';
$a++;
}
}
$sql='SELECT c.*, x.name AS xname, x.rights AS xrights, o.name AS oname, o.rights AS orights FROM carodata c LEFT JOIN users x ON c.px = x.id LEFT JOIN users o ON c.po = o.id WHERE `turn` != 0 AND `px` != '.$datauser['id'].' AND  `po` != '.$datauser['id'].' ORDER BY c.id DESC LIMIT 10';
$result=mysql_query($sql);
if(mysql_numrows($result)>0){
echo'</div>';
echo'<div class="main-xmenu">';
echo'<div class="phdr">Bàn cờ đang đánh</div>';
$a=0;
while($a<mysql_numrows($result)){
echo'<div class="menu">';
if(!mysql_result($result,$a,"winner")){echo '<img src="/caro/icons/pl.png"> ';}
else {echo '<img src="/caro/icons/'.(mysql_result($result,$a,"hl") ? 'cp' : 'done').'.png"> ';}
echo '<a href="/caro/?id='.mysql_result($result,$a,'id').'">[<b> Bàn số #'.mysql_result($result,$a,'id').'</b> ]</a> (<b><a href="/member/'.mysql_result($result,$a,"px").'.html">'.nick(mysql_result($result,$a,"px")).'</a></b> và <b><a href="/member/'.mysql_result($result,$a,"po").'.html">'.nick(mysql_result($result,$a,"po")).'</a></b>) mức cược '.number_format(mysql_result($result,$a,"muccuoc")).'xu';
$a++;

echo'</div>';
}


}
$sql='SELECT c.*, x.name AS xname, x.rights AS xrights, o.name AS oname, o.rights AS orights FROM carodata c LEFT JOIN users x ON c.px = x.id LEFT JOIN users o ON c.po = o.id WHERE (`px` = '.$datauser['id'].' OR `po` = '.$datauser['id'].') AND `winner`!=0 ORDER BY c.id DESC LIMIT 10';
$result=mysql_query($sql);
if(mysql_numrows($result)>0){
echo'</div>';
echo'<div class="main-xmenu">';
echo'<div class="phdr">Bàn cờ đã hoàn thành</div>';
$a=0;
while($a<mysql_numrows($result)){
if(mysql_result($result,$a,'winner')==$datauser['id']){$win='bạn thắng';}else{$win='bạn thua';}
if(mysql_result($result,$a,'px')==$datauser['id']){$o='o';} elseif(mysql_result($result,$a,'po')==$datauser['id']){$o='x';}
echo '<div class="menu"><img src="/caro/icons/'.(mysql_result($result,$a,"hl") ? 'cp' : 'done').'.png"> <a href="/caro/?id='.mysql_result($result,$a,'id').'">[ <b>Bàn số #'.mysql_result($result,$a,'id').'</b> ]</a> (với <b><a href="/member/'.mysql_result($result,$a,"p".$o).'.html">'.nick(mysql_result($result,$a,"p".$o)).'</a></b>) '.$win.' '.number_format(mysql_result($result,$a,"muccuoc")).'xu</div>';
$a++;
}}
echo '<div class="phdr">Bảng Xếp Hạng</div>';
$req=mysql_query("SELECT * FROM `users` WHERE `cwin`>=0 AND `rights` <=9 ORDER BY `cwin` DESC LIMIT 0,5");
$i = 1;
while ($res = mysql_fetch_array($req)) {
    
    $xxxx=mysql_query("SELECT * FROM `users` WHERE `id` ='".$res['id']."' ");

    $ducnghia_user =  mysql_fetch_array($xxxx);
    
echo ' <div class="menu">

<img src="/avatar/'.$res['id'].'.png">
<a href="/member/'.$res['id'].'.html"><b>'.nick($res['id']).'</b></a>';
if($i == 1){
echo'<b> - <font color="red"> [TOP 1]</b></font>';
}
if($i == 2){
echo'<b> - <font color="red"> [TOP 2]</b></font>';
}
if($i == 3){
echo'<b> - <font color="red"> [TOP 3]</b></font>';
}
echo'<br/>
Win: '.number_format($res['cwin']).' Ván<br/></div>';
++$i;
}

} else {
	$sql='SELECT c.*, x.name AS xname, x.rights AS xrights, o.name AS oname, o.rights AS orights FROM carodata c
		LEFT JOIN users x ON c.px = x.id
		LEFT JOIN users o ON c.po = o.id
		WHERE c.id='.$_GET['id'];
	$result=mysql_query($sql);
	if(mysql_numrows($result)>0) {
	if(mysql_result($result,0,'turn')==0 && mysql_result($result,0,'tinhtrang')==0 && mysql_result($result,0,'po')==$datauser['id']) {
		if($_POST['ap']){
			$kiemtra=mysql_query('SELECT * FROM `carodata` WHERE (`px`='.$datauser['id'].' OR  `po`='.$datauser['id'].') AND `winner`=0 AND `turn`!=0');
			$demban=mysql_numrows($kiemtra);
			if($demban==0){
			$sqls='SELECT lastdate AS session_time FROM users WHERE id='.mysql_result($result,0,'px').' ORDER BY session_time DESC LIMIT 1';
			$stime=mysql_query($sqls);
			if(mysql_numrows($stime)!=0 && time()-mysql_result($stime,0,'session_time')<=300){
			if($datauser[$moneycol]>=mysql_result($result,0,'muccuoc')){
$text = '<b>'.nick($user_id).'</b> đã chấp nhận lời mời chơi caro của bạn <a href="/caro?id='.$_GET['id'].'"><b>Bấm Vào Đây</b></a> để vào phòng';
mysql_query("INSERT INTO `thongbao` SET
                `id` = '".$user_id."',
                `user` = '".mysql_result($result,0,'px')."',
                `text` = '$text',
                `ok` = '1',
                `time` = '" . time() . "'
            ");
$texttb = ''.$datauser['name'].' đã chấp nhận lời mời chơi caro của bạn nhấn ok để vào phòng!';
$url_tb = ''.$home.'/caro/?id='.$_GET['id'].'';
mysql_query("UPDATE `users` SET `tb_load`='".$texttb."',`url_tb`='".$url_tb."' WHERE `id` = '".mysql_result($result,0,'px')."'");			$rturn=array(mysql_result($result,0,'px'),mysql_result($result,0,'po'));
			$setturn=$rturn[rand(0,1)];
			$sql='UPDATE carodata SET `turn`='.$setturn.', `tinhtrang`=1, `lastturn` = '.time().' WHERE `id`='.$_GET['id'];
			$result=mysql_query($sql);

			$sql='SELECT c.*, x.name AS xname, x.rights AS xrights, o.name AS oname, o.rights AS orights FROM carodata c
				LEFT JOIN users x ON c.px = x.id
				LEFT JOIN users o ON c.po = o.id
				WHERE c.id='.$_GET['id'];
			$result=mysql_query($sql);

			} else {echo '<b><font color="red">Bạn không đủ tiền cược!</font></b><br>';}
			} else {echo '<b><font color="red">Không thể chấp nhận bàn cờ của thành viên offline quá 5 phút, vui lòng đợi người này online và thử lại!</font></b><br>';}
			} else {echo '<b><font color="red">Bạn không thể tham gia nhiều bàn cùng lúc.</font></b><br>';}
		}
		if($_POST['dn']){
			$sql='DELETE FROM carodata WHERE `id`='.$_GET['id'];
			mysql_query($sql);
		}}
		if(mysql_result($result,0,'turn')==0 && mysql_result($result,0,'tinhtrang')==0 && mysql_result($result,0,'po')==0 && $_POST['jn'] && mysql_result($result,0,'px')!=$datauser['id']){
			$kiemtra=mysql_query('SELECT * FROM `carodata` WHERE (`px`='.$datauser['id'].' OR  `po`='.$datauser['id'].') AND `winner`=0 AND `turn`!=0');
			$demban=mysql_numrows($kiemtra);
			if($demban==0){
			$sqls='SELECT lastdate AS session_time FROM users WHERE id='.mysql_result($result,0,'px').' ORDER BY session_time DESC LIMIT 1';
			$stime=mysql_query($sqls);
			if(mysql_numrows($stime)!=0 && time()-mysql_result($stime,0,'session_time')<=300){
			if($datauser[$moneycol]>=mysql_result($result,0,'muccuoc')){
$text = '<b>'.nick($user_id).'</b> đã tham gia bàn caro của bạn <a href="/caro?id='.$_GET['id'].'"><b>Bấm Vào Đây</b></a> để vào phòng';
mysql_query("INSERT INTO `thongbao` SET
                `id` = '".$user_id."',
                `user` = '".mysql_result($result,0,'px')."',
                `text` = '$text',
                `ok` = '1',
                `time` = '" . time() . "'
            ");
$texttb = ''.$datauser['name'].' đã tham gia bàn caro của bạn nhấn ok để vào phòng!';
$url_tb = ''.$home.'/caro/?id='.$_GET['id'].'';
mysql_query("UPDATE `users` SET `tb_load`='".$texttb."',`url_tb`='".$url_tb."' WHERE `id` = '".mysql_result($result,0,'px')."'");			$rturn=array(mysql_result($result,0,'px'),$datauser['id']);
			$setturn=$rturn[rand(0,1)];
			$sql='UPDATE carodata SET `turn`='.$setturn.', `tinhtrang`=1, `po`='.$datauser['id'].', `lastturn`='.time().' WHERE `id`='.$_GET['id'];
			$result=mysql_query($sql);
			$sql='SELECT c.*, x.name AS xname, x.rights AS xrights, o.name AS oname, o.rights AS orights FROM carodata c
				LEFT JOIN users x ON c.px = x.id
				LEFT JOIN users o ON c.po = o.id
				WHERE c.id='.$_GET['id'];
			$result=mysql_query($sql);
			}
			else {echo '<b><font color="red">Bạn không đủ tiền cược!</font></b><br>';}
			} else {echo '<b><font color="red">Không thể tham gia bàn cờ của thành viên offline quá 5 phút, vui lòng đợi người này online và thử lại!</font></b><br>';}
			} else {echo '<b><font color="red">Bạn không thể tham gia nhiều bàn cùng lúc.</font></b><br>';}
		}
		if($_POST['cn'] && mysql_result($result,0,'turn')==0 && mysql_result($result,0,'tinhtrang')==0 && mysql_result($result,0,'px')==$datauser['id'] && $datauser['id'] != ANONYMOUS){
			$sql='DELETE FROM carodata WHERE `id`='.$_GET['id'];
			mysql_query($sql);
		}
		$data1=explode(":",mysql_result($result,0,'data1'));
		$data1f=mysql_result($result,0,'data1');
		$data2f=mysql_result($result,0,'data2');
		$data2=explode(":",mysql_result($result,0,'data2'));
		$socot=mysql_result($result,0,'socot');
		$hl=explode(":",mysql_result($result,0,'hl'));
		if(mysql_result($result,0,'px')==$datauser['id']){$u='x'; $o='o';} elseif(mysql_result($result,0,'po')==$datauser['id']) {$u='o'; $o='x';} else {$view=1;}
		if($_GET['action']){
		$action=explode(".",$_GET['action']);
		if(mysql_result($result,0,'new')==1){
		$actionf=$action[0].'|'.$action[1]; } else {
		$actionf=$action[0].$action[1];}
		if(!in_array($actionf, $data2) && !mysql_result($result,0,'winner') && mysql_result($result,0,'turn')==$datauser['id'] && $action[0]<$socot && $action[1]<$socot && $action[0]>0 && $action[1]>0){
			$sql= 'UPDATE carodata SET `data1`="'.$data1f.$u.':'.'",`data2`="'.$data2f.$actionf.':'.'", turn='.mysql_result($result,0,'p'.$o).', `lastturn` = "'.time().'" WHERE id='.$_GET['id'];
			$result=mysql_query($sql);
			$sql='SELECT c.*, x.name AS xname, x.rights AS xrights, o.name AS oname, o.rights AS orights FROM carodata c
		LEFT JOIN users x ON c.px = x.id
		LEFT JOIN users o ON c.po = o.id
		WHERE c.id='.$_GET['id'];
			$result=mysql_query($sql);
			$data1=explode(":",mysql_result($result,0,'data1'));
			$data1f=mysql_result($result,0,'data1');
			$data2f=mysql_result($result,0,'data1');
			$data2=explode(":",mysql_result($result,0,'data2'));
			$socot=mysql_result($result,0,'socot');
			$hl=explode(":",mysql_result($result,0,'hl'));
			//Bắt đầu kiểm tra thắng thua...
			$d=0;
			while($d<count($data1)){
				$data[$d]=$data1[$d].$data2[$d];
				$d++;
			}
			$x=$action[0];
			$y=$action[1];
			//Các dòng dưới đây sẽ kiểm tra ngay tại điểm thành viên vừa đánh
			if(mysql_result($result,0,'new')==1){
			if(in_array($u.($x+1).'|'.$y, $data) && in_array($u.($x+2).'|'.$y, $data) && in_array($u.($x+3).'|'.$y, $data) && in_array($u.($x+4).'|'.$y, $data) && (!in_array($o.($x-1).'|'.$y, $data) || !in_array($o.($x+5).'|'.$y, $data))) {$win=1;$hld=$x.$y.':'.($x+1).'|'.$y.':'.($x+2).'|'.$y.':'.($x+3).'|'.$y.':'.($x+4).'|'.$y.':';}
			if(in_array($u.($x-1).'|'.$y, $data) && in_array($u.($x+1).'|'.$y, $data) && in_array($u.($x+2).'|'.$y, $data) && in_array($u.($x+3).'|'.$y, $data) && (!in_array($o.($x-2).'|'.$y, $data) || !in_array($o.($x+4).'|'.$y, $data))) {$win=1;$hld=$x.$y.':'.($x-1).'|'.$y.':'.($x+2).'|'.$y.':'.($x+3).'|'.$y.':'.($x+1).'|'.$y.':';}
			if(in_array($u.($x-1).'|'.$y, $data) && in_array($u.($x+1).'|'.$y, $data) && in_array($u.($x+2).'|'.$y, $data) && in_array($u.($x-2).'|'.$y, $data) && (!in_array($o.($x-3).'|'.$y, $data) || !in_array($o.($x+3).'|'.$y, $data))) {$win=1;$hld=$x.$y.':'.($x-1).'|'.$y.':'.($x+2).'|'.$y.':'.($x-2).'|'.$y.':'.($x+1).'|'.$y.':';}
			if(in_array($u.($x-1).'|'.$y, $data) && in_array($u.($x+1).'|'.$y, $data) && in_array($u.($x-3).'|'.$y, $data) && in_array($u.($x-2).'|'.$y, $data) && (!in_array($o.($x-4).'|'.$y, $data) || !in_array($o.($x+2).'|'.$y, $data))) {$win=1;$hld=$x.$y.':'.($x-1).'|'.$y.':'.($x-3).'|'.$y.':'.($x-2).'|'.$y.':'.($x+1).'|'.$y.':';}
			if(in_array($u.($x-1).'|'.$y, $data) && in_array($u.($x-4).'|'.$y, $data) && in_array($u.($x-3).'|'.$y, $data) && in_array($u.($x-2).'|'.$y, $data) && (!in_array($o.($x-5).'|'.$y, $data) || !in_array($o.($x+1).'|'.$y, $data))) {$win=1;$hld=$x.$y.':'.($x-1).'|'.$y.':'.($x-3).'|'.$y.':'.($x-2).'|'.$y.':'.($x-4).'|'.$y.':';}
			//Kiểm tra hàng ngang
			if(in_array($u.$x.'|'.($y+1), $data) && in_array($u.$x.'|'.($y+2), $data) && in_array($u.$x.'|'.($y+3), $data) && in_array($u.$x.'|'.($y+4), $data) && (!in_array($o.$x.'|'.($y-1), $data) || !in_array($o.$x.'|'.($y+5), $data))) {$win=1;$hld=$x.$y.':'.$x.'|'.($y+1).':'.$x.'|'.($y+2).':'.$x.'|'.($y+3).':'.$x.'|'.($y+4).':';}
			if(in_array($u.$x.'|'.($y+1), $data) && in_array($u.$x.'|'.($y+2), $data) && in_array($u.$x.'|'.($y+3), $data) && in_array($u.$x.'|'.($y-1), $data) && (!in_array($o.$x.'|'.($y-2), $data) || !in_array($o.$x.'|'.($y+4), $data))) {$win=1;$hld=$x.$y.':'.$x.'|'.($y+1).':'.$x.'|'.($y+2).':'.$x.'|'.($y+3).':'.$x.'|'.($y-1).':';}
			if(in_array($u.$x.'|'.($y+1), $data) && in_array($u.$x.'|'.($y+2), $data) && in_array($u.$x.'|'.($y-2), $data) && in_array($u.$x.'|'.($y-1), $data) && (!in_array($o.$x.'|'.($y-3), $data) || !in_array($o.$x.'|'.($y+3), $data))) {$win=1;$hld=$x.$y.':'.$x.'|'.($y+1).':'.$x.'|'.($y+2).':'.$x.'|'.($y-2).':'.$x.'|'.($y-1).':';}
			if(in_array($u.$x.'|'.($y+1), $data) && in_array($u.$x.'|'.($y-3), $data) && in_array($u.$x.'|'.($y-2), $data) && in_array($u.$x.'|'.($y-1), $data) && (!in_array($o.$x.'|'.($y-4), $data) || !in_array($o.$x.'|'.($y+2), $data))) {$win=1;$hld=$x.$y.':'.$x.'|'.($y+1).':'.$x.'|'.($y-3).':'.$x.'|'.($y-2).':'.$x.'|'.($y-1).':';}
			if(in_array($u.$x.'|'.($y-4), $data) && in_array($u.$x.'|'.($y-3), $data) && in_array($u.$x.'|'.($y-2), $data) && in_array($u.$x.'|'.($y-1), $data) && (!in_array($o.$x.'|'.($y-5), $data) || !in_array($o.$x.'|'.($y+1), $data))) {$win=1;$hld=$x.$y.':'.$x.'|'.($y-4).':'.$x.'|'.($y-3).':'.$x.'|'.($y-2).':'.$x.'|'.($y-1).':';}
			//Kiểm tra đường chéo thứ nhất
			if(in_array($u.($x+1).'|'.($y+1), $data) && in_array($u.($x+2).'|'.($y+2), $data) && in_array($u.($x+3).'|'.($y+3), $data) && in_array($u.($x+4).'|'.($y+4), $data) && (!in_array($o.($x-1).'|'.($y-1), $data) || !in_array($o.($x+5).'|'.($y+5), $data))){$win=1;$hld=$x.$y.':'.($x+1).'|'.($y+1).':'.($x+2).'|'.($y+2).':'.($x+3).'|'.($y+3).':'.($x+4).'|'.($y+4).':';}
			if(in_array($u.($x+1).'|'.($y+1), $data) && in_array($u.($x+2).'|'.($y+2), $data) && in_array($u.($x+3).'|'.($y+3), $data) && in_array($u.($x-1).'|'.($y-1), $data) && (!in_array($o.($x-2).'|'.($y-2), $data) || !in_array($o.($x+4).'|'.($y+4), $data))){$win=1;$hld=$x.$y.':'.($x+1).'|'.($y+1).':'.($x+2).'|'.($y+2).':'.($x+3).'|'.($y+3).':'.($x-1).'|'.($y-1).':';}
			if(in_array($u.($x+1).'|'.($y+1), $data) && in_array($u.($x+2).'|'.($y+2), $data) && in_array($u.($x-2).'|'.($y-2), $data) && in_array($u.($x-1).'|'.($y-1), $data) && (!in_array($o.($x-3).'|'.($y-3), $data) || !in_array($o.($x+3).'|'.($y+3), $data))){$win=1;$hld=$x.$y.':'.($x+1).'|'.($y+1).':'.($x+2).'|'.($y+2).':'.($x-2).'|'.($y-2).':'.($x-1).'|'.($y-1).':';}
			if(in_array($u.($x+1).'|'.($y+1), $data) && in_array($u.($x-3).'|'.($y-3), $data) && in_array($u.($x-2).'|'.($y-2), $data) && in_array($u.($x-1).'|'.($y-1), $data) && (!in_array($o.($x-4).'|'.($y-4), $data) || !in_array($o.($x+2).'|'.($y+2), $data))){$win=1;$hld=$x.$y.':'.($x+1).'|'.($y+1).':'.($x-3).'|'.($y-3).':'.($x-2).'|'.($y-2).':'.($x-1).'|'.($y-1).':';}
			if(in_array($u.($x-4).'|'.($y-4), $data) && in_array($u.($x-3).'|'.($y-3), $data) && in_array($u.($x-2).'|'.($y-2), $data) && in_array($u.($x-1).'|'.($y-1), $data) && (!in_array($o.($x-5).'|'.($y-5), $data) || !in_array($o.($x+1).'|'.($y+1), $data))){$win=1;$hld=$x.$y.':'.($x-4).'|'.($y-4).':'.($x-3).'|'.($y-3).':'.($x-2).'|'.($y-2).':'.($x-1).'|'.($y-1).':';}
			//Kiểm tra đường chéo thứ hai
			if(in_array($u.($x-1).'|'.($y+1), $data) && in_array($u.($x-2).'|'.($y+2), $data) && in_array($u.($x-3).'|'.($y+3), $data) && in_array($u.($x-4).'|'.($y+4), $data) && (!in_array($o.($x+1).'|'.($y-1), $data) || !in_array($o.($x-5).'|'.($y+5), $data))){$win=1;$hld=$x.$y.':'.($x-1).'|'.($y+1).':'.($x-2).'|'.($y+2).':'.($x-3).'|'.($y+3).':'.($x-4).'|'.($y+4).':';}
			if(in_array($u.($x-1).'|'.($y+1), $data) && in_array($u.($x-2).'|'.($y+2), $data) && in_array($u.($x-3).'|'.($y+3), $data) && in_array($u.($x+1).'|'.($y-1), $data) && (!in_array($o.($x+2).'|'.($y-2), $data) || !in_array($o.($x-4).'|'.($y+4), $data))){$win=1;$hld=$x.$y.':'.($x-1).'|'.($y+1).':'.($x-2).'|'.($y+2).':'.($x-3).'|'.($y+3).':'.($x+1).'|'.($y-1).':';}
			if(in_array($u.($x-1).'|'.($y+1), $data) && in_array($u.($x-2).'|'.($y+2), $data) && in_array($u.($x+2).'|'.($y-2), $data) && in_array($u.($x+1).'|'.($y-1), $data) && (!in_array($o.($x+3).'|'.($y-3), $data) || !in_array($o.($x-3).'|'.($y+3), $data))){$win=1;$hld=$x.$y.':'.($x-1).'|'.($y+1).':'.($x-2).'|'.($y+2).':'.($x+2).'|'.($y-2).':'.($x+1).'|'.($y-1).':';}
			if(in_array($u.($x-1).'|'.($y+1), $data) && in_array($u.($x+3).'|'.($y-3), $data) && in_array($u.($x+2).'|'.($y-2), $data) && in_array($u.($x+1).'|'.($y-1), $data) && (!in_array($o.($x+4).'|'.($y-4), $data) || !in_array($o.($x-2).'|'.($y+2), $data))){$win=1;$hld=$x.$y.':'.($x-1).'|'.($y+1).':'.($x+3).'|'.($y-3).':'.($x+2).'|'.($y-2).':'.($x+1).'|'.($y-1).':';}
			if(in_array($u.($x+4).'|'.($y-4), $data) && in_array($u.($x+3).'|'.($y-3), $data) && in_array($u.($x+2).'|'.($y-2), $data) && in_array($u.($x+1).'|'.($y-1), $data) && (!in_array($o.($x+5).'|'.($y-5), $data) || !in_array($o.($x-1).'|'.($y+1), $data))){$win=1;$hld=$x.$y.':'.($x+4).'|'.($y-4).':'.($x+3).'|'.($y-3).':'.($x+2).'|'.($y-2).':'.($x+1).'|'.($y-1).':';}
			}
			//Nếu thắng, cập nhật bàn chơi này
			if($win){
				$sql='UPDATE carodata SET `winner`='.mysql_result($result,0,'p'.$u).', `hl`="'.$hld.'", `tinhtrang`=2, `wline`="'.$wline.'" WHERE id='.$_GET['id'];
				$result=mysql_query($sql);
				$sql='SELECT c.*, x.name AS xname, x.rights AS xrights, o.name AS oname, o.rights AS orights FROM carodata c
					LEFT JOIN users x ON c.px = x.id
					LEFT JOIN users o ON c.po = o.id
					WHERE c.id='.$_GET['id'];
				$result=mysql_query($sql);
$abc = 'SELECT * FROM users WHERE id='.mysql_result($result,0,'p'.$o);
$p = mysql_fetch_array(mysql_query($abc));
$phong = mysql_fetch_array(mysql_query("SELECT * FROM `carodata` WHERE `id`='".$id."'"));
if($p['xu'] >= $phong['muccuoc']){

				$sql = 'UPDATE users
				SET '.$moneycol.' = '.$moneycol.' + '.mysql_result($result,0,"muccuoc").', cwin = cwin + 1
				WHERE id = '.mysql_result($result,0,'p'.$u);
				mysql_query($sql);
				$sql = 'UPDATE users
				SET '.$moneycol.' = '.$moneycol.' - '.mysql_result($result,0,"muccuoc").', close = close + 1
				WHERE id = '.mysql_result($result,0,'p'.$o);
				mysql_query($sql);
}				$data1=explode(":",mysql_result($result,0,'data1'));
				$data1f=mysql_result($result,0,'data1');
				$data2f=mysql_result($result,0,'data1');
				$data2=explode(":",mysql_result($result,0,'data2'));
				$socot=mysql_result($result,0,'socot');
				$hl=explode(":",mysql_result($result,0,'hl'));
			}
		}}
		 if((mysql_result($result,0,"waittime")-((int)((time()-mysql_result($result,0,"lastturn"))/60)))<1 && $view!=1 && mysql_result($result,0,"turn")!=$datauser['id'] && $_POST['xt'] && !mysql_result($result,0,"winner") && mysql_result($result,0,"turn")!=0) {
		 				$sql='UPDATE carodata SET `winner`='.mysql_result($result,0,'p'.$u).', `hl`="'.$hld.'", `tinhtrang`=2 WHERE id='.$_GET['id'];
				$result=mysql_query($sql);
				$sql='SELECT c.*, x.name AS xname, x.rights AS xrights, o.name AS oname, o.rights AS orights FROM carodata c
					LEFT JOIN users x ON c.px = x.id
					LEFT JOIN users o ON c.po = o.id
					WHERE c.id='.$_GET['id'];
				$result=mysql_query($sql);
$abc = 'SELECT * FROM users WHERE id='.mysql_result($result,0,'p'.$o);
$p = mysql_fetch_array(mysql_query($abc));
$phong = mysql_fetch_array(mysql_query("SELECT * FROM `carodata` WHERE `id`='".$id."'"));
if($p['xu'] >= $phong['muccuoc']){
				
$sql = 'UPDATE users
				SET '.$moneycol.' = '.$moneycol.' + '.mysql_result($result,0,"muccuoc").', cwin = cwin + 1
				WHERE id = '.mysql_result($result,0,'p'.$u);
				mysql_query($sql);
				$sql = 'UPDATE users
				SET '.$moneycol.' = '.$moneycol.' - '.mysql_result($result,0,"muccuoc").', close = close + 1
				WHERE id = '.mysql_result($result,0,'p'.$o);
				mysql_query($sql);
	}			$data1=explode(":",mysql_result($result,0,'data1'));
				$data1f=mysql_result($result,0,'data1');
				$data2f=mysql_result($result,0,'data1');
				$data2=explode(":",mysql_result($result,0,'data2'));
				$socot=mysql_result($result,0,'socot');
				$hl=explode(":",mysql_result($result,0,'hl'));
		 }
                
$phong = mysql_fetch_array(mysql_query("SELECT * FROM `carodata` WHERE `id`='".$id."'"));
		echo'<div class="menu list-bottom congdong">Bàn số '.$_GET['id'].' - mức cược '.number_format($phong['muccuoc']).' xu</div>';

		echo '<div id="autoload"></div>';
                
		echo '<div width="100%" align="center">';
		echo '<div class="menu">';
		if($_GET['size']==2){
		$tdsize="10";
		$gsize='&size=2';
		$pg=1;
		echo '<b><a href="?id='.$_GET['id'].'">[Xem kích cỡ lớn]</a></b>';
		$c1='gif';$b1='png';
		} else {
		$pg=2;
		echo '<b><a href="?id='.$_GET['id'].'&size=2">[Xem kích cỡ nhỏ]</a></b>';
		$tdsize="20";
		$b1='gif';$c1='png';
		}
		echo ' <b><a href="?id='.$_GET['id'].$gsize.'">[Cập nhật/tải lại]</a></b>';
                echo'</div>';
		echo '<style>
.smi .cr:hover
{
background-image:url("/'.$u.'.'.$b1.'"); height:<php echo $tdsize; ?>px; width: <php echo $tdsize; ?>px; border:0px;display:inline-block;
}
</style>';
                if ($datauser['jquery'] =='1') {
		echo '<div id="autocaro"></div>';
                } else {
                include'ocaro-noauto.php';
                }
		echo '</div>';
		?>
		<?php
                echo'<div id="autocaro"></div><div class="menu list-top congdong" style="text-align:center;margin-top: 5px;">';
		if(mysql_result($result,0,"winner")){if(mysql_result($result,0,"winner")==mysql_result($result,0,"px")){
		echo '<b><a href="/member/'.mysql_result($result,0,"px").'.html">'.nick(mysql_result($result,0,"px")).'</a></b> chiến thắng!';}
		else {
		echo '<b><a href="/member/'.mysql_result($result,0,"po").'.html">'.nick(mysql_result($result,0,"po")).'</a></b> chiến thắng!';
		}
		if (mysql_result($result,0,"hl")==''){echo ' Vì đối thủ hết giờ mà không đánh';}
		}
		echo '<center><img src="/caro/x.png"> <a href="/member/'.mysql_result($result,0,"px").'.html">'.nick(mysql_result($result,0,"px")).'</a>';
                if (mysql_result($result,0,"po") > '0') {
		echo ' và <img src="/caro/o.png"> <a href="/member/'.mysql_result($result,0,"po").'.html">'.nick(mysql_result($result,0,"po")).'</a></center>'; 
                }
                echo '</div>';
		if($datauser['id']!=0) { ?>
<script>
var loadcontent = '<div class=menu>Đang tải <img src=https://i.imgur.com/VKAdQvl.gif></div>';
$(document).ready(function(){
$('#datachat3').html(loadcontent);
$('#datachat3').load('/caro/carocmt.php?id=<?php echo$_GET['id']; ?>');
var refreshId=setInterval(function(){
$('#datachat3').load('/caro/carocmt.php?id=<?php echo$_GET['id']; ?>');
$('#datachat3').slideDown('slow');
},7000);
$('#shoutbox3').validate({
debug:false,
submitHandler:function(form){
$.post('/caro/carocmt.php?id=<?php echo$_GET['id']; ?>',
$('#shoutbox3').serialize(),
function(chatoutput){
$('#datachat3').html(chatoutput);
});
$('#msg2').val('');
}
});
});
</script>
</div>
<div class="main-xmenu">
<div class="phdr"><i class="fa fa-comments-o"></i> Trò chuyện</div><div class="lucifer">

 <form name="shoutbox3" id="shoutbox3" method="post">
<input type="hidden" name="tid" value="<?php echo $_GET['id']; ?>"><textarea style="border-left: 2px solid #44B6AE; width: 97%; height: 50px" placeholder=""  id="msg2" name="noidung" required></textarea><br><a href="/upanh"/><b>(Gửi Hình) </b></a><input type="submit" value="Chat"/>
</form>
</div>

<div id="datachat3">
</div>
<?php }

} else {
echo'<div class="menu">Bạn phải đăng nhập để chơi game này nhé !';
require('../incfiles/end.php');
exit;
}
}
?>
</div>
<?php require('../incfiles/end.php');

?>