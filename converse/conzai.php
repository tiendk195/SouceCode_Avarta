<?php
function pkoolvn2($str) { 
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
   $tukhoa = "#cz ";
   //Tạo một user làm user BOT và nhập ID của user đó vào đây
   $idbot = 9903;
   
   //Cấu hình API
   $loctuxau = "1"; //Lọc những từ nói bậy. 0 là không lọc và 1 là có lọc. Mặc định là 0.
   $tenbot = "Gà Vàng"; //Cái này sẽ thay thế tất cả tên bot là simsimi thành tên của bạn truyền vào. Mặc định là Sim
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
$pt = pkoolvn2($temp[1]);
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
$c = curl_init("http://api.vina4u.pro/api.php?loctuxau=1&msg=$pt");
curl_setopt($c, CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($c, CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
$traloi = curl_exec($c);
curl_close($c);
$traloi = trim($traloi);
if($traloi == "error")
{
$traloi = "Câu này mình chưa được học. Bạn có thể dạy cho mình chứ ?!";
}
if($msg == "bố con là ai" || $msg == "bo con la ai" || $msg == "ai là bố con" ||$msg == "ai la bo con" ||$msg == "bố mày là ai vậy"){
$traloi = "Là Bố Phương SN 2000 mà 2 đứa con rùi :-b)";
}
if($msg == "mẹ con là ai" || $msg == "me con la ai" || $msg == "ai là mẹ con" ||$msg == "ai la me con" ||$msg == "mẹ mày là ại"){
$traloi = "Là Mẹ Nga Xinh Đẹp :3";
}
if($msg == "pkoolvn"){
$traloi = "anh pkoolvn đẹp zai :3";
}
if($msg == "khánh là ai" ||$msg == "khanh la ai"){
$traloi = "là ck e ạ :3";
}
if($msg == "bye"){
$traloi = "dạ bye ạ :(";
}
if($msg == "phương ck ai"){
$traloi = "Nga dê chứ ai :3";
}
if($msg == "phương yêu ai"){
$traloi = "Nga dâm dê chứ ai :ha:";
}
if($msg == "phương iu ai"){
$traloi = "Nga dê dê ý :ha:";
}
if($msg == "nga vk ai"){
$traloi = "Vk a phương đẹp troai :3";
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
if($msg == "vk đâu"){
$traloi = "dạ vk nà ck";
}
if($msg == "o"){
$traloi = "Ác ma đang hội tụ @Thánh Chửi vừa online mọi người đều sợ hãi";
}
if($msg == "of"){
$traloi = "Luồng ác khí vừa vụt tắt @ Thánh chửi vừa offline nguy hiểm qua rồi...";
}
if($msg == "phương"){
$traloi = "Anh Phương Đz nhất web :)";
}
if($msg == "phương gay"){
$traloi = " không đâu anh phương men lì lém :)";
}
if($msg == "nam"){
$traloi = " Anh nam hả. Hình như hơi bị gay gay :)";
}
if($msg == "Khánh ngu" || $msg == "khánh ngu" ||$msg == "khah ngu"){
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
if($msg == "Khánh" || $msg == "khanh" || $msg == "khánh" ||$msg == "Khánh" ||$msg == "KHÁNH"){
$rand = rand(1,10);
if($rand == 1){
$traloi = "Khánh là ck bé sim đóa";
}
if($rand == 2){
$traloi = "Dạ bé sim iu ck khánh nhứt ạ";
}
if($rand == 3){
$traloi = "Ck khánh của sim đz nhứt quả đất";
}
if($rand == 4){
$traloi = "Ck khánh là của sim :3 ";
}
if($rand == 5){
$traloi = "I love ck khánh đẹp troai :-_ ";
}
if($rand == 6){
$traloi = "Khánh là ck bé sim nhoa :) ";
}
if($rand == 7){
$traloi = "I love ck khánh đẹp troai :-_ ";
}
if($rand == 8){
$traloi = "Ck khánh đẹp troai lém ạ";
}
if($rand == 9){
$traloi = "Ai kêu rì ck khánh của tui :^";
}
if($rand == 10){
$traloi = "Em yêu anh..khánh...";
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
