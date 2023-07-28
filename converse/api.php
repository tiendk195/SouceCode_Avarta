<?php
/*pkoolvn*/
$text = $_GET['text'];
$pass = "dz"; // thay nếu mày thích
$act = $_GET[pkoolvn]; // thay nếu mày thích
if($act != $pass){
echo "Anh @1 không cho em học!!";
exit;
}
echo DS(Sexy($text));

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
'Referer:  http://tuoiteen.me',
'User-Agent: Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.6; pl; rv:1.9.2.13) Gecko/20101203 Firefox/3.5.13',
'X-Requested-With: XMLHttpRequest'
);
$text = $_GET['text'];
curl_setopt($curl, CURLOPT_URL, "http://simsimi.com/getRealtimeReq?uuid=m0njJQ6vh8ElgCfIsaZ6Zp8yYoZ0O1szQWaIvPOlpXg&lc=vi&ft=0&reqText=$text&status=A");
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($curl);
$pharr = json_decode($result,true);
$phanhoi = $pharr['respSentence'];
if($phanhoi == '')
{
$a = array('Em chưa được học câu đó - dạy cho em bằng ứng dụng SimSimi trên Android, iOS và Windows Phone nha ',' Cài đặt Bot SimSimi Miễn Phí Tại Website  http://pkoolvn.me <3 ', ' Em không hiểu được nhãn dán với icon đâu ', ' Em không hiểu huhu anh pkoolvn chưa lạp trình cho em phần này '); // respond nếu nội dung sim trả lời == NULL
$b = array_rand($a,3);
$phanhoi = $a[$b[1]];
}
return $phanhoi; // hiển thị nội dung respond
}
?>