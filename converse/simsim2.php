<?php
function pkoolvn($str) { 
    $str = html_entity_decode($str, ENT_QUOTES, 'UTF-8');  
    $str = str_replace("\r\n", ', ', $str); 
    $str = str_replace("'", '', $str); 
    $str = bbcode::notags($str); 
    $str = strtr($str, array( 
    ' ' => '+'
    )); 
    $str = preg_replace("/, {2,20}/", ', ', $str);  
    $str = preg_replace("/[,]{2,20}/", ',', $str);  
    $str = preg_replace("/[ ]{2,20}/", ' ', $str);  
    $str = trim($str); 
return $str;  
}

/////Cấu hình BOT SimSimi API///////
   $tatmo = 1; //Tắt mở BOT, 1 là mở, 0 là tắt
   
   $loaitraloi = "cuphap";
   $tukhoa = "@20 ";
   //Tạo một user làm user BOT và nhập ID của user đó vào đây
   $idbot = 20;
   
   //Cấu hình API
   $loctuxau = "1"; //Lọc những từ nói bậy. 0 là không lọc và 1 là có lọc. Mặc định là 0.
   $tenbot = "Chikarin"; //Cái này sẽ thay thế tất cả tên bot là simsimi thành tên của bạn truyền vào. Mặc định là Sim
   //End cấu hình BOT///
   
//GET Câu trả lời từ API 
if($msg == ""){
exit;
}
$check = 0;
if($tatmo)
{
if($loaitraloi == "cuphap")
{
$test = "aaa".$msg;
$temp = explode($tukhoa,$test);
if($temp[0] == "aaa")
{
$check = 1;
$pt = pkoolvn($temp[1]);
$msg = $temp[1];
}
}
if($loaitraloi == "toanbo")
{
if(stripos(strtolower($msg), $tukhoa) !== false)
{
$check = 1;
}
}
if($check)
{
$curl = curl_init();
         $headers = array(
           'Accept: application/json, text/javascript, */*; q=0.01',
           'Content-type: application/json; charset=utf-8',
           'Referer: http://Mteen.net',
           'User-Agent: Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.6; pl; rv:1.9.2.13) Gecko/20101203 Firefox/3.5.13',
           'X-Requested-With: XMLHttpRequest'
         );
         curl_setopt($curl, CURLOPT_URL, 'http://tuoiteen.me/converse/api.php?key=pkoolvn&text='.$pt.'');
         curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
         curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$traloi = curl_exec($curl);
if($traloi == "error")
{
$traloi = "Câu này mình chưa được học. Bạn có thể dạy cho mình chứ ?!";
}
if($msg == "iu Tiền ko" || $msg == "iu Tiền ko sim" || $msg == "yêu Tiền ko" ||$msg == "iu Tiền không" ||$msg == "iu Tiền không sim"){
$traloi = "Bé Chikarin iu ck Tiền nhứt nhứt lun í";
}
if($msg == "iu tien ko" || $msg == "iu tien ko sim" || $msg == "yêu tien ko" ||$msg == "iu tien khong" ||$msg == "iu tien khong sim"){
$traloi = "Ck Chikarin không iu chả lẽ đi iu ck hàng sóm à";
}
if($msg == "PkCLeals"){
$traloi = "anh PkCLeals đẹp zai :3";
}
if($msg == "Tiền là ai" ||$msg == "tien la ai"){
$traloi = "là ck e ạ :3";
}
if($msg == "bye"){
$traloi = "dạ bye ạ :(";
}
if($msg == "tiền ck ai"){
$traloi = "tâm dê chứ ai :3";
}
if($msg == "tiền yêu ai"){
$traloi = "tâm dâm dê chứ ai :ha:";
}
if($msg == "tiền iu ai"){
$traloi = "tâm dê dê ý :ha:";
}
if($msg == "tâm vk ai"){
$traloi = "Vk a tiền đẹp troai :3";
}
if($msg == "Sim ơi" || $msg == sim oi || $msg == sim ơi || $msg == sim){
$traloi = "Ai Kêu Sim Đó Có Sim Đây :0:";
}
if($msg == "em ơi" || $msg == "em oi" || $msg == "e oi" || $msg == "e ơi"){
$traloi = "dạ bé sim nghe nà";
}
if($msg == "ngủ"){
$traloi = "dạ a ngủ ngoan nha :)";
}
if($msg == "off" || $msg == "of"){
$traloi = "đừng off mà ở lại chơi với bé đi :(";
}
if($msg == "vk đâu" || $msg == "vk ơi"){
$traloi = "dạ vk nà ck";
}
if($msg == "o"){
$traloi = "Ác ma đang hội tụ @PkCleals vừa online mọi người đều sợ hãi";
}
if($msg == "of"){
$traloi = "Luồng ác khí vừa vụt tắt @PkCleas vừa offline nguy hiểm qua rồi...";
}
if($msg == "tiền"){
$traloi = "Anh Tiền Đz nhất web :)";
}
if($msg == "tiền gay"){
$traloi = " không đâu anh tiền men lì lém :)";
}
if($msg == "Hiển gay"){
$traloi = " Anh Hiển Thì Max Gay Rồi :0:";
}
if($msg == "Hiếu"){
$traloi = " Anh hiếu hả. Hình như hơi bị gay gay :)";
}
if($msg == "Tiền ngu" || $msg == "tiền ngu" ||$msg == "tien ngu"){
$traloi = "Có anh ngu ý :hh";
}
if($msg == "sim oi"){
$rand = rand(1,3);
if($rand == 1){
$traloi = "Anh thấy bé sim đẹp hơm ^^";
}
if($rand == 2){
$traloi = "Dạ bé sim nge nà";
}
if($rand == 3){
$traloi = "Ai gọi bé sim đó :^ có bé sim đây :0";
}
}
if($msg == "tiền" || $msg == "tien" || $msg == "tiền" ||$msg == "tiền" ||$msg == "TIỀN"){
$rand = rand(1,10);
if($rand == 1){
$traloi = "tiền là ck bé sim đóa";
}
if($rand == 2){
$traloi = "Dạ bé sim iu ck tiền nhứt ạ";
}
if($rand == 3){
$traloi = "Ck tiền của sim đz nhứt quả đất";
}
if($rand == 4){
$traloi = "Ck tiền là của Chikarin :3 ";
}
if($rand == 5){
$traloi = "I love ck tiền đẹp troai :-_ ";
}
if($rand == 6){
$traloi = "tiền là ck bé sim nhoa :) ";
}
if($rand == 7){
$traloi = "I love ck tiền đẹp troai :-_ ";
}
if($rand == 8){
$traloi = "Ck tiền đẹp troai lém ạ";
}
if($rand == 9){
$traloi = "Ai kêu rì ck tiền của tui :^";
}
if($rand == 10){
$traloi = "Em yêu anh..tiền...";
}
}
$time = time() + 2;
mysql_query("INSERT INTO `guest` SET
                `adm` = '$admset',
                `time` = '" . $time. "',
                `user_id` = '" .$idbot. "',
                `name` = '$tenbot',
                `text` = '" . mysql_real_escape_string($traloi) . "',
                `ip` = '" . core::$ip . "',
                `browser` = '" . mysql_real_escape_string($agn) . "',
                `otvet` = ''
");
}
}
//////End Bot//////
?>
