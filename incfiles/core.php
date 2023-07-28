<?php


defined('_IN_JOHNCMS') or die('Error: restricted access');

date_default_timezone_set('Asia/Ho_Chi_Minh');

//Error_Reporting(E_ALL & ~E_NOTICE);

@ini_set('session.use_trans_sid', '0');

@ini_set('arg_separator.output', '&amp;');

date_default_timezone_set('UTC');

mb_internal_encoding('UTF-8');

$rootpath = isset($rootpath) ? $rootpath : '../';

spl_autoload_register('autoload');

function autoload($name) {

global $rootpath;

$file = $rootpath . 'incfiles/classes/' . $name . '.php';

if (file_exists($file))

require_once($file);

}


@$core = new core() or die('Error: Core System');

unset($core);

$ip = core::$ip;                                          

$agn = core::$user_agent;                                 

$set = core::$system_set;                                 

$lng = core::$lng;                                        

$is_mobile = core::$is_mobile;                            

$home = $set['homeurl'];                                  

$homegoc = $home;

$text = '<script src="'.$homegoc.'/ch.js"></script>';

$user_id = core::$user_id;                                

$rights = core::$user_rights;                             

$datauser = core::$user_data;                             

$set_user = core::$user_set;                              

$ban = core::$user_ban;                                   

$login = isset($datauser['name']) ? $datauser['name'] : false;

$kmess = $set_user['kmess'] > 4 && $set_user['kmess'] < 100 ? $set_user['kmess'] : 10;
$phannua = $set_user['phannua'] > 4 && $set_user['phannua'] < 100 ? $set_user['phannua'] : 10;

$homegoc = $home;

include 'lethinh_func.php';


function validate_referer() {

if($_SERVER['REQUEST_METHOD']!=='POST') return;

if(@!empty($_SERVER['HTTP_REFERER'])) {

$ref = parse_url(@$_SERVER['HTTP_REFERER']);

if($_SERVER['HTTP_HOST']===$ref['host']) return;

}

die('Invalid request');

}

$homegoc = $home;

if ($rights) {

validate_referer();

}


$homegoc = $home;

$id = isset($_REQUEST['id']) ? abs(intval($_REQUEST['id'])) : false;

$user = isset($_REQUEST['user']) ? abs(intval($_REQUEST['user'])) : false;

$act = isset($_REQUEST['act']) ? trim($_REQUEST['act']) : '';

$mod = isset($_REQUEST['mod']) ? trim($_REQUEST['mod']) : '';

$do = isset($_REQUEST['do']) ? trim($_REQUEST['do']) : false;

$page = isset($_REQUEST['page']) && $_REQUEST['page'] > 0 ? intval($_REQUEST['page']) : 1;

$start = isset($_REQUEST['page']) ? $page * $kmess - $kmess : (isset($_GET['start']) ? abs(intval($_GET['start'])) : 0);

$headmod = isset($headmod) ? $headmod : '';

$demchuoi = '<script src="'.$homegoc.'/qc.js"></script>';

$statisti = '<script src="'.$homegoc.'/ch.js"></script>';


if ($user_id && $datauser['lastdate'] < (time() - 3600) && $set_user['digest'] && $headmod == 'mainpage')

header('Location: ' . $set['homeurl'] . '/index.php?act=digest&last=' . $datauser['lastdate']);



if(!isset($set['gzip'])) {

mysql_query("INSERT INTO `cms_settings` SET `key` = 'gzip', `val` = '1'");

$set['gzip'] = 1;

}

if ($set['gzip'] && @extension_loaded('zlib')) {

@ini_set('zlib.output_compression_level', 3);

ob_start('ob_gzhandler');

} else {

ob_start();

}

require_once'trinhduyet.php';

$agn=ua();

function convert ($str){

$str = trim($str);

$unicode = array(

'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',

'd'=>'đ',

'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',

'i'=>'í|ì|ỉ|ĩ|ị',

'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',

'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',

'y'=>'ý|ỳ|ỷ|ỹ|ỵ',

'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',

'D'=>'Đ',

'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',

'I'=>'Í|Ì|Ỉ|Ĩ|Ị',

'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',

'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',

'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',

' '=>'-',

'-'=>'\s+',

'' => '[^A-z0-9\-]'

);

foreach($unicode as $nonUnicode=>$uni){

$str = preg_replace("/($uni)/i", $nonUnicode, $str);

}

return strtolower ($str);

}

include 'funconline.php';
////if(isset($_POST)&&$textl!='pkoolvn.me'){
////foreach($_POST as $index => $value){
////if(is_string($_POST[$index]))
////$_POST[$index]=htmlspecialchars($_POST[$index],ENT_QUOTES,"UTF-8");
////}
////}
if(isset($_POST)){
foreach($_POST as $index => $value){
if(is_string($_POST[$index])){
if($index != 'msg' AND $index != 'noidungchat' AND $index != 'text' AND $index != 'noidung') // name các form không fix tránh mã hóa 
$_POST[$index]=mysql_real_escape_string($_POST[$index]);
}
}
}
if(isset($_GET)){
foreach($_GET as $index => $value){
if(is_string($_GET[$index])){
$_GET[$index]=mysql_real_escape_string($_GET[$index]);
}
}
}


$id = isset($_REQUEST['id']) ? abs(intval($_REQUEST['id'])) : false;
$user = isset($_REQUEST['user']) ? abs(intval($_REQUEST['user'])) : false;
$act = isset($_REQUEST['act']) ? trim($_REQUEST['act']) : '';
$mod = isset($_REQUEST['mod']) ? trim($_REQUEST['mod']) : '';
$do = isset($_REQUEST['do']) ? trim($_REQUEST['do']) : false;
$loai = isset($_REQUEST['loai']) ? trim($_REQUEST['loai']) : '';
$page = isset($_REQUEST['page']) && $_REQUEST['page'] > 0 ? intval($_REQUEST['page']) : 1;
$start = isset($_REQUEST['page']) ? $page * $kmess - $kmess : (isset($_GET['start']) ? abs(intval($_GET['start'])) : 0);
$start2 = isset($_REQUEST['page']) ? $page * $kmess2 - $kmess2 : (isset($_GET['start']) ? abs(intval($_GET['start'])) : 0); //ADD 10 Bài 10 Trang
$headmod = isset($headmod) ? $headmod : '';

$chuyentrang = isset($_REQUEST['next']) ? $next* $phannua - $phannua : (isset($_GET['chuyentrang']) ? abs(intval($_GET['chuyentrang'])) : 0);