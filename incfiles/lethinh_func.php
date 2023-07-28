<?php
function nick($id, $mod = false) {
$clan = '';
$nhan = '';
$vip = '';
$font = '';
$chuc = '';
$shadow = '';
$danhhieu = '';
$chuchay = '';

$ban = mysql_result(mysql_query("SELECT COUNT(*) FROM `cms_ban_users` WHERE `user_id` = '" . $id . "' AND `ban_time` > '" . time() . "'"), 0);
$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '" . $id . "'"));
if($ban > 0) {
$out .= '<span style="color:black">'.($mod == 1 ? '<small>' : '<b>').'<s>' . $user['name'] . '</s>'.($mod == 1 ? '</small>' : '</b>').'</font>';
} else {
if($user['rights'] >= 0) {
if($user['rights'] == 0) {$font = '<font color="#013481">';}
if($user['rights'] == 2) {$font = '<font color="#8b008b">';}
if($user['rights'] == 3) {$font = '<font color="#0000ff">';}
if($user['rights'] == 4) {$font = '<font color="#ff007f">';}
if($user['rights'] == 5) {$font = '<font color="#00CC99">';}
if($user['rights'] == 6) {$font = '<font color="gold">';}
if($user['rights'] == 7) {$font = '<font color="#008000">';}
if($user['rights'] == 8) {$font = '<font color="red">';}
if($user['rights'] == 9) {$font = '<font color="red">';}
if($user['id']==1) {
if($user['rights'] == 10) {$font = '<font color="red">';} }

///Mod chuc vu
 if($user['rights']  == 2){
$chuc = '<font color="8b008b"> - Trial Mod</font>';
}
if($user['rights']  == 3){
$chuc = '<font color="0000ff"> - Police MXH</font>';
}
if($user['rights']  == 4){
$chuc = '<font color="#ff007f"> - MC Blog Radio</font>';
}

if($user['rights']  == 5){
$chuc = '<font color="#00CC99"> - Box Art</font>';
}
if($user['rights']  == 6){
$chuc = '<font color="gold"> - GM</font>';
}
if($user['rights']  == 7){
$chuc = '<font color="008000"> - SMod</font>';
}
if($user['rights']  == 8){
$chuc = '<font color="red"> - Admin <img src="/img/admin.png"></font>';
}

if($user['rights']  == 9){
$chuc = '<img src="/img/admin.png">';
}





if($user['color']){
$font = '<font color="'.$user['color'].'">';
}
if($user['cauvong'] == 1) { 
$cauvong = ' <img src="/icon/cauvong.gif"/>';
}
if($user['icon'] >= 1) { 
$clan = ' <img src="/images/clan/'.$user['icon'].'.png"/>';
} 
if($user['icon_nick'] >= 1 ) { 
$icon = ' <img src="/icon/nick/'.$user['icon_nick'].'.gif"width="15px" >';
} 
$time = time();
//danh hiệu
if ($user['danhhieu']!='' && $user['danhhieu']!='1ST'&& $user['danhhieu']!='2ND' && $user['danhhieu']!='3RD'  ){
if($user['timedanhhieu'] > $time){
	if($user['danhhieu'] == 'FARM VIP'){
$danhhieu = '<b style="color:#ff3399">[<img src="https://i.imgur.com/t8nFPOV.png">'.$user['danhhieu'].']</b>';
} else 
if($user['danhhieu'] == 'FISH VIP'){
$danhhieu = '<b style="color:green">[<img src="https://i.imgur.com/AzWkeOJ.png">TOP]</b>';
} else
if($user['danhhieu'] == 'FISH VIP'){
$danhhieu = '<b style="color:green">[<img src="https://i.imgur.com/AzWkeOJ.png">TOP]</b>';
} else
if($user['danhhieu'] == 'Vua đầu bếp'){
$danhhieu = '<b style="color:#ff5159">['.$user['danhhieu'].']</b>';
} else
if($user['danhhieu'] == 'BOSS VIP'){
$danhhieu = '<b style="color:#FF6633">['.$user['danhhieu'].']</b>';
} else
	if($user['danhhieu'] == 'Chém gió'){
$danhhieu = '<b style="color:#0088FF">['.$user['danhhieu'].']</b>';
} else
		if($user['danhhieu'] == 'VIP'){
$danhhieu = '<b style="color:red">['.$user['danhhieu'].']</b>';
} else
		if($user['danhhieu'] == 'PRO'){
$danhhieu = '<b style="color:blue">['.$user['danhhieu'].']</b>';
} else
		if($user['danhhieu'] == 'TOP'){
$danhhieu = '<b style="color:green">['.$user['danhhieu'].']</b>';
} else
if($user['danhhieu'] == 'SVIP'){
$danhhieu = '<b><font color="ff9900" class="hu12" style="text-shadow: 3px 3px 11px #ff9900;"> [S</font><font color="red" style="text-shadow: 3px 3px 11px #ff0000;">V</font><font color="green" style="text-shadow: 3px 3px 11px #009900;">I</font><font color="0099ff" style="text-shadow: 3px 3px 11px #0099ff;">P</font><font color="9932CC" style="text-shadow: 3px 3px 11px #9932CC;">★] </font></b>';
} else {


$danhhieu = '<b>['.$user['danhhieu'].']</b>';

}

}
}

if($user['timevip'] > $time){

if ($user['kichhoatvip']==1) {
	$khvip = '<img src="/icon/nick/31.gif">';
}
}
	if($user['hienthivip'] == 1){
if ($user['naptichluy']<10000) {
	$loaivip='0';
} else if ($user['naptichluy']>=10000 and $user['naptichluy']<20000  ) {
		$loaivip='1';
} else if ($user['naptichluy']>=20000 and $user['naptichluy']<50000  ) {
		$loaivip='2';
		} else if ($user['naptichluy']>=50000 and $user['naptichluy']<70000  ) {
		$loaivip='3';
				} else if ($user['naptichluy']>=70000 and $user['naptichluy']<100000  ) {
		$loaivip='4';
					} else if ($user['naptichluy']>=100000 and $user['naptichluy']<150000  ) {
		$loaivip='5';
					} else if ($user['naptichluy']>=150000 and $user['naptichluy']<200000  ) {
		$loaivip='6';
					} else if ($user['naptichluy']>=200000 and $user['naptichluy']<250000  ) {
		$loaivip='7';
			} else if ($user['naptichluy']>=250000 and $user['naptichluy']<350000  ) {
		$loaivip='8';
			} else if ($user['naptichluy']>=350000 and $user['naptichluy']<500000  ) {
		$loaivip='9';
			} else if ($user['naptichluy']>=500000  and $user['naptichluy']<1000000  ) {
		$loaivip='10';
				} else if ($user['naptichluy']>=1000000  ) {
		$loaivip='11';
			}

if($loaivip == 1){
$vip = '<font color="05b9f0" style="text-shadow: 3px 3px 11px #05b9f0;"><b>[VIP1]</b></font>';
}
if($loaivip == 2){
$vip = '<font color="0f02f7" style="text-shadow: 3px 3px 11px #0f02f7;"><b>[VIP2]</b></font>';
}
if($loaivip == 3){
$vip = '<font color="9932CC" style="text-shadow: 3px 3px 11px #9932CC;"><b>[VIP3]</b></font>';
}
if($loaivip == 4){
$vip = '<font color="FF9900" style="text-shadow: 3px 3px 11px #FF9900";><b>[VIP4]</b></font>';
}
if($loaivip == 5){
$vip = '<font color="red" style="text-shadow: 3px 3px 11px #ff0000;"><b>[VIP5]</b></font>';
}
if($loaivip == 6){
$vip = '<font color="EE1289" style="text-shadow: 3px 3px 11px #cc0000;"><b>[VIP6]</b></font>';
}
if($loaivip == 7){
$vip = '<font color="009900" style="text-shadow: 3px 3px 11px #009900";><b>[VIP7]</b></font>';
}
if($loaivip == 8){
$vip = '<font color="0000ff" style="text-shadow: 3px 3px 11px #0000ff";><b>[VIP8]</b></font>';

}
if($loaivip == 9){
$vip = '<font color="ff03ab" style="text-shadow: 3px 3px 11px #ff03ab";><b>[VIP9]</b></font>';

}
if($loaivip == 10){
$vip = '<font color="F08080" style="text-shadow: 3px 3px 11px #F08080";><b>[VIP10]</b></font>';

}
if($loaivip == 11){
$vip = '<b><font color="ff9900" style="text-shadow: 3px 3px 11px #ff9900;"> [S</font><font color="red" style="text-shadow: 3px 3px 11px #ff0000;">V</font><font color="green" style="text-shadow: 3px 3px 11px #009900;">I</font><font color="0099ff" style="text-shadow: 3px 3px 11px #0099ff;">P</font><font color="9932CC" style="text-shadow: 3px 3px 11px #9932CC;">★] </font></b>';
}
if($loaivip == 12){
$vip = '<span class="fmod"><b><font color="ff9900" style="text-shadow: 3px 3px 11px #ff9900;"> [S</font><font color="red" style="text-shadow: 3px 3px 11px #ff0000;">V</font><font color="green" style="text-shadow: 3px 3px 11px #009900;">I</font><font color="0099ff" style="text-shadow: 3px 3px 11px #0099ff;">P</font><font color="9932CC" style="text-shadow: 3px 3px 11px #9932CC;">★] </font></b></span>';
}
/*
if($loaivip == 1){
$vip = '<font color="white" style="text-shadow: 0 0 0.2em #666666, 0 0 0.2em #666666,  0 0 0.2em #666666"><b>[<img src="/icon/vip/vip1.gif">VIP1]</b></font>';
}
if($loaivip == 2){
$vip = '<font color="white" style="text-shadow: 0 0 0.2em #ff33ff, 0 0 0.2em #ff33ff, 0 0 0.2em #ff33ff"><b>[<img src="/icon/vip/vip2.gif">VIP2]</b></font>';
}
if($loaivip == 3){
$vip = '<font color="white" style="text-shadow: 0 0 0.2em #ff6633, 0 0 0.2em #ff6633,  0 0 0.2em #ff6633"><b>[<img src="/icon/vip/vip3.gif">VIP3]</b></font>';
}
if($loaivip == 4){
$vip = '<font color="white" style="text-shadow: 0 0 0.2em #3399ff, 0 0 0.2em #3399ff,  0 0 0.2em #3399ff"><b>[<img src="/icon/vip/vip4.gif">VIP4]</b></font>';
}
if($loaivip == 5){
$vip = '<font color="white" style="text-shadow: 0 0 0.2em #ff0000, 0 0 0.2em #ff0000,  0 0 0.2em #ff0000"><b>[<img src="/icon/vip/vip5.gif">VIP5]</b></font>';
}
if($loaivip == 6){
$vip = '<font color="white" style="text-shadow: 0 0 0.2em #ff3399, 0 0 0.2em #ff3399,  0 0 0.2em #ff3399"><b>[<img src="/icon/vip/vip6.gif">VIP6]</b></font>';
}
if($loaivip == 7){
$vip = '<font color="white" style="text-shadow: 0 0 0.2em #009900, 0 0 0.2em #009900,  0 0 0.2em #009900"><b>[<img src="/icon/vip/vip7.gif">VIP7]</b></font>';
}
if($loaivip == 8){
$vip = '<font color="white" style="text-shadow: 0 0 0.2em #009900, 0 0 0.2em #009900,  0 0 0.2em #009900"><b>[<img src="/icon/vip/vip7.gif">VIP7]</b></font>';
}
if($loaivip == 9){
$vip = '<font color="white" style="text-shadow: 0 0 0.2em #9932CC, 0 0 0.2em #9932CC,  0 0 0.2em #9932CC"><b>[<img src="/icon/vip/vip9.gif">VIP9]</b></font>';
}
if($loaivip == 10){
$vip = '<font color="white" style="text-shadow: 0 0 0.2em #F08080, 0 0 0.2em #F08080,  0 0 0.2em #F08080"><b>[<img src="/icon/vip/vip10.gif">VIP10]</b></font>';
}
if($loaivip == 11){
$vip = '<b><font color="ff9900" style="text-shadow: 3px 3px 11px #ff9900;"> [S</font><font color="red" style="text-shadow: 3px 3px 11px #ff0000;">V</font><font color="green" style="text-shadow: 3px 3px 11px #009900;">I</font><font color="0099ff" style="text-shadow: 3px 3px 11px #0099ff;">P</font><font color="9932CC" style="text-shadow: 3px 3px 11px #9932CC;">★] </font></b>';
}
if($loaivip == 12){
$vip = '<i class="fmod"><b><font color="ff9900" style="text-shadow: 3px 3px 11px #ff9900;"> [S</font><font color="red" style="text-shadow: 3px 3px 11px #ff0000;">V</font><font color="green" style="text-shadow: 3px 3px 11px #009900;">I</font><font color="0099ff" style="text-shadow: 3px 3px 11px #0099ff;">P</font><font color="9932CC" style="text-shadow: 3px 3px 11px #9932CC;">★] </font></b></i>';
}
*/
}


$time = time();

if($user['timeshadow'] > $time){
	if($user['btshadow'] == '1'){
		$shadow = '<span class="'.$user['shadow'].'">';

/*
if($user['shadow'] == '1'){
$shadow = '<span class="legend">';
}
if($user['shadow'] == '2'){
$shadow = '<span class="friendly">';
}
if($user['shadow'] == '3'){
$shadow = '<span class="rich">';
}
if($user['shadow'] == '4'){
$shadow = '<span class="darkness">';
}
if($user['shadow'] == '5'){
$shadow = '<span class="hero">';
}
if($user['shadow'] == '6'){
$shadow = '<span class="hu2">';
}
if($user['shadow'] == '7'){
$shadow = '<span class="hu3">';
}
if($user['shadow'] == '8'){
$shadow = '<span class="hu4">';
}
if($user['shadow'] == '9'){
$shadow = '<span class="hu5">';
}
if($user['shadow'] == '10'){
$shadow = '<span class="hu6">';
}
if($user['shadow'] == '11'){
$shadow = '<span class="hu7">';
}
*/
	}
}
if($user['hieuungnick'] == 2){
$hieuung = '<span class="legend">';
}
if($user['hieuungnick'] == 3){
$hieuung = '<span class="hu3">';
}
if($user['hieuungnick'] == 4){
$hieuung = '<span class="hu4">';
}
if($user['hieuungnick'] == 5){
$hieuung = '<span class="xblue">';
}
if($user['hieuungnick'] == 6){
$hieuung = '<span class="lien">';
}
if($user['hieuungnick'] == 7){
$hieuung = '<span class="tuoitho"><span class="fmod"><img src="https://i.imgur.com/VQKoLG2.gif" width="16" height="16" border="0"/></span><span class="hu1">';
}
if($user['hieuungnick'] >= 8){
$hieuung = '<span class="hu'.$user['hieuungnick'].'">';
}

if($user['hieuungnick_2'] == 1){
$hieuung2 = '<span class="rank">';
}
if($user['hieuungnick_2'] == 2){
$hieuung2 = '<span class="rank2">';
}
if($user['hieuungnick_2'] == 3){
$hieuung2 = '<span class="rank3">';
}
if($user['hieuungnick_2'] == 3110){
$hieuung2 = '<span class="khungblack">';
}
if($user['kichhoat'] == 1){

$kichhoat = '<div class="ducnghia_"><sup><font  color="white" style="text-shadow: 0 0 0.2em #3399ff, 0 0 0.2em #3399ff,  0 0 0.2em #3399ff"><b> <i class="fa fa-check-circle"></i></b></font></sup><span class="ducnghia_hien"><font size="1" color="white" style="text-shadow: 0 0 0.2em #000000, 0 0 0.2em #000000,  0 0 0.2em #000000">Đã kích hoạt</font></span></div>';
}

$ny = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$user['nguoiyeu']."'"));

$ktkh = mysql_result(mysql_query("select count(*) from `kethon` where `user_id` = '".$user['id']."' and `dongy`='1'"),0);
$ktkh2 = mysql_result(mysql_query("select count(*) from `kethon` where `nguoi_ay` = '".$user['id']."' and `dongy`='1'"),0);
$kh = mysql_fetch_array(mysql_query("SELECT * FROM `kethon` WHERE `user_id`='".$user['id']."' and `dongy`='1'"));
$kh2 = mysql_fetch_array(mysql_query("SELECT * FROM `kethon` WHERE `nguoi_ay`='".$user['id']."' and `dongy`='1'"));


if($ktkh >= 1){
$nhan = '<img src="/icon/nhan/'.$user['nhan'].'.png"/>';
}
if($ktkh2 >= 1){
$nhan = '<img src="/icon/nhan/'.$ny['nhan'].'.png"/>';
}
$out .= ''.$shadow.' '.$hieuung2.' '.$hieuung.' '.$icon.' '.$clan.'  '.$font.' '.$vip.' '.$cauvong.' ' . $user['name'] . '  '.$chuc.' '.$kichhoat.'  '.$nhan.' '.$danhhieu.' '.$khvip.'</font></font></b></i></span>';
} else {
$out .= ''.$shadow.' '.$hieuung2.' '.$hieuung.'  '.$icon.' '.$clan.' '.$font.' '.$vip.' '.$cauvong.' <font color="#013481">' . $user['name'] . '  '.$chuc.' '.$kichhoat.' '.$nhan.' '.$danhhieu.' '.$khvip.'</font></font></font></span></b></i>';
}
}
return $out;
}


////
function rand_face($text) {
$face = array();
$face[] = '<font face="arial">';
$face[] = '<font>';
$face[] = '<font face="tahoma">';
$out .= '' . $text . '';
return $out;
}

?>