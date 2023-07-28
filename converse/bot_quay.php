<?php
define('_IN_JOHNCMS', 1);
if(preg_match('|Quay|',$msg) ||preg_match('|quay|',$msg) ||preg_match('|QUAY|',$msg)) {
if($datauser['xu'] < 15000) {
$botquay = ''.$login.' hôg đủ tiền để quay đâu nhé!';
} elseif(!$user_id) {
$botquay = ''.$login.' chưa đăng nhập trúng sao BOT cộng tiền!';
} else {
$rand = rand(99, 9999);
$card = rand(1111111111111, 9999999999999);
if(preg_match('|9999|',$rand)) {
$botquay = ''.$login.' quay đc số '.$rand.'! Xin chúc mừng đã quay được giải biệt của chương trình quay số may mắn! 500.000xu đó nha!';
@mysql_query("UPDATE users SET `xu`=`xu`+'500000' WHERE `id`='$user_id'");
} elseif(preg_match('|999|',$rand)) {
$botquay = 'éc. '.$login.' quay đc số '.$rand.'! Xin chúc mừng đã quay đc giải nhất của chương trình quay số may mắn! Giải thưởng 300.000xu Cảm ơn '.$login.' đã tham gia Quay số!';
@mysql_query("UPDATE users SET `xu`=`xu`+'300000' WHERE `id` = '$user_id'");
} elseif(preg_match('|99|',$rand)) {
$botquay = 'Hey. '.$login.' quay đc số '.$rand.'! Xin chúc mừng đã quay đc giải nhì của chương trình quay số may mắn! Giải thưởng 200.000xu. Cảm ơn '.$login.' đã tham gia Quay số!';
@mysql_query("UPDATE users SET `xu` = `xu`+'200000' WHERE `id` = '$user_id'");
} elseif(preg_match('|00|',$rand) ||preg_match('|11|',$rand) ||preg_match('|22|',$rand) ||preg_match('|33|',$rand) ||preg_match('|44|',$rand) ||preg_match('|55|',$rand) ||preg_match('|66|',$rand) ||preg_match('|77|',$rand) ||preg_match('|88|',$rand)) {
$botquay = 'Thành viên. '.$login.' quay đc số '.$rand.'! Xin chúc mừng '.$login.' đã quay được giải ba của chương trình quay số may mắn! Hệ thống đã chuyển 69696 xu vào tài khoản của '.$login.' !';
@mysql_query("UPDATE users SET `xu` = `xu`+'69696' WHERE `id` = '$user_id'");
} else {
$botquay = 'Chia buồn cùng '.$login.' , '.$login.' quay được số '.$rand.', Chúc may mắn lần sau! Bot đã trừ của '.$login.' 15000 xu';
mysql_query("UPDATE users SET `xu`=`xu`-'15000' WHERE `id`='$user_id'");
} }
$time = time();
mysql_query("INSERT INTO `guest` SET
`adm` = '0',
`time` = '$time',
`user_id` = '4098',
`name` = 'BOT',
`text` = '" . mysql_real_escape_string($botquay) . "',
`ip` = '0000',
`browser` = 'IPHONE'
");

}

?>
