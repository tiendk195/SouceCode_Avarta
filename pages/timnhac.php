<?php
/*pkoolvn*/

function pkoolvn($str) { 
    $str = html_entity_decode($str, ENT_QUOTES, 'UTF-8');  
    $str = str_replace("\r\n", ', ', $str); 
    $str = str_replace("'", '', $str); 
    $str = strtr($str, array( 
    ' ' => '+'
    )); 
    $str = preg_replace("/, {2,20}/", ', ', $str);  
    $str = preg_replace("/[,]{2,20}/", ',', $str);  
    $str = preg_replace("/[ ]{2,20}/", ' ', $str);  
    $str = trim($str); 
return $str;  
}
define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
$textl = 'Chọn Nhạc';

if (!$user_id) {
    require('../incfiles/head.php');
echo functions::display_error($lng['access_guest_forbidden']);
require('../incfiles/end.php');
exit;
}
require('../incfiles/head.php');
echo'<div class="phdr">Chọn Nhạc</div>';
$q = pkoolvn($_POST['q']);
if(!$q){
Header('location: /pages/nhac.php');
exit;
}
echo DS(Sexy($q));

function DS($data){
$data = preg_replace("/đụ|cặc|lồn|cặt|loz|buồi|địt/is", "***", $data); // lọc từ max xấu
return $data;
}

function Sexy($noidung) {
$key = 'e5fbeb60-09d7-40e3-96ef-7a6495da1832'; // paid key
$curl = curl_init(); if (!$curl) exit;
$headers = array(
'Accept: application/json, text/javascript, */*; q=0.01',
'Content-type: application/json; charset=utf-8',
'Referer:  http://lethinh2003.xyz',
'User-Agent: Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.6; pl; rv:1.9.2.13) Gecko/20101203 Firefox/3.5.13',
'X-Requested-With: XMLHttpRequest'
);
$q = pkoolvn($_POST['q']);
curl_setopt($curl, CURLOPT_URL, "http://lethinh2003.xyz/pages/search_nhac.php?pkoolvn=ok&q=$q");
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($curl);
$pharr = json_decode($result,true);
$phanhoi = $pharr['html'];
if($phanhoi == '')
{
echo'<div class="rmenu">Không tìm thấy kết quả</div>';
require('../incfiles/end.php');
exit;
}
return $phanhoi; // hiển thị nội dung respond
}
////Không xóa, sửa dòng dưới nếu là người có học///
echo'<div class="phdr">Mod by pkoolvn</div>';
////done
require('../incfiles/end.php');
?>