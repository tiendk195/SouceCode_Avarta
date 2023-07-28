<?php
function expuser($expuser){
$tkexp = @mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id='{$expuser}'"));
$daon = $tkexp['online'];
$gio = 60 * 60;
$expgio = $gio / 10;
$xuatexp = $daon / $expgio;
$subexp = explode('.', $xuatexp);
$expuser = $subexp[0];
return $expuser; }
function lv($lv){
$tklv = @mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id='{$lv}'"));
$daon = $tklv['online'];
$gio = 60 * 60;
$expgio = $gio / 10;
$xuatexp = $daon / $expgio;
$subexp = explode('.', $xuatexp);
$exp = $subexp[0];
$xuatlv = (100 + $exp) /100;
$sublv = explode('.', $xuatlv);
$lv= $sublv[0];
return $lv; }
function timeonline($time){
$ketqua = $time;
$chiangay = ($ketqua / 60 / 60 / 24);
$xuatngay = explode('.', $chiangay);
$ngay = $xuatngay[0]; //so ngay
$sogio = ($ketqua - ($ngay * 60 * 60 * 24)); //con lai so gio(tinh theo giay)
$chiagio = ($sogio / 60 / 60);
$xuatgio = explode('.', $chiagio);
$gio = $xuatgio[0]; //so gio
$sophut = ($sogio - ($gio * 60 * 60)); //con lai so phut (tinh theo giay)
$chiaphut = ($sophut / 60);
$xuatphut = explode('.', $chiaphut);
$phut = $xuatphut[0];
$giay = ($sophut - ($phut * 60));
if($ngay != 0){
$time = $ngay.' ngày, '.$gio.' giờ, '.$phut.' phút';
}elseif($gio != 0){
$time = $gio.' gio, '.$phut.' phút, '.$giay.'  giây';
}elseif($phut != 0){
$time = $phut.' phút, '.$giay.' giây';
}else{ $time = $giay.' giây'; }
return $time; }
$congtime = time() - $datauser['lastdate'];
if($datauser['lastdate'] > (time() - 300)){
mysql_query("UPDATE `users` SET `online` = `online`+'$congtime' WHERE `id` = '$user_id'"); }


function thoigiantinh($from, $to = '') {
if (empty($to))
$to = time();
$diff = (int) abs($to - $from);
if ($diff <= 60) {
$since = sprintf('Sắp hết hạn');
} elseif ($diff <= 3600) {
$mins = round($diff / 60);
if ($mins <= 1) {
$mins = 1;
}
/* mod thời gian phút */
$since = sprintf('%s phút', $mins);
} else if (($diff <= 86400) && ($diff > 3600)) {
$hours = round($diff / 3600);
if ($hours <= 1) {
$hours = 1;
}
$since = sprintf('%s giờ', $hours  );
} elseif ($diff >= 86400) {
$days = round($diff / 86400);
if ($days <= 1) {
$days = 1;
}
$since = sprintf('%s ngày', $days);
}
return $since;
}


$id = isset($_REQUEST['id']) ? abs(intval($_REQUEST['id'])) : false;
$user = isset($_REQUEST['user']) ? abs(intval($_REQUEST['user'])) : false;
$act = isset($_REQUEST['act']) ? trim($_REQUEST['act']) : '';
$mod = isset($_REQUEST['mod']) ? trim($_REQUEST['mod']) : '';
$do = isset($_REQUEST['do']) ? trim($_REQUEST['do']) : false;
$page = isset($_REQUEST['page']) && $_REQUEST['page'] > 0 ? intval($_REQUEST['page']) : 1;
$start = isset($_REQUEST['page']) ? $page * $kmess - $kmess : (isset($_GET['start']) ? abs(intval($_GET['start'])) : 0);
$teamnext = isset($_REQUEST['teamnext']) && $_REQUEST['teamnext'] > 0 ? intval($_REQUEST['teamnext']) : 1;
$teampage = isset($_REQUEST['teamnext']) ? $teamnext* $teamkmess - $teamkmess : (isset($_GET['teampage']) ? abs(intval($_GET['teampage'])) : 0);
$homenext = isset($_REQUEST['homenext']) && $_REQUEST['homenext'] > 0 ? intval($_REQUEST['homenext']) : 1;
$homepage = isset($_REQUEST['homenext']) ? $homenext* $homekmess - $homekmess : (isset($_GET['homepage']) ? abs(intval($_GET['homepage'])) : 0);
$next = isset($_REQUEST['next']) && $_REQUEST['next'] > 0 ? intval($_REQUEST['next']) : 1;
$chuyentrang = isset($_REQUEST['next']) ? $next* $phannua - $phannua : (isset($_GET['chuyentrang']) ? abs(intval($_GET['chuyentrang'])) : 0);
$noionline = isset($noionline) ? $noionline : '';
?>
