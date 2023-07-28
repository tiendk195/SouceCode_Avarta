<?php
define('_IN_JOHNCMS', 1);
date_default_timezone_set('Asia/Ho_Chi_Minh');
$day = date("d");
$month = date("m");
$year = date("y");
$h=date("H");
if (preg_match("|http://|",$msg) ||preg_match("|Http://|",$msg) || preg_match("|Http://www.|",$msg) ||preg_match("|http://www.|",$msg) || preg_match("|www.|",$msg) || preg_match("|moi anh em ghe tham|",$msg) || preg_match("|mời ae ghé thăm|",$msg)) {
$botvip = array			(
1  => "Cấm quảng cáo wap dưới mọi hình thức!!",
2  => "$login thử phát nữa xem nào. Bot cho đi ra đảo vĩnh viễn luôn nhá :ha:",
3  => "$login muốn đi du lịch hem :ban:",
4  => "Ui Bot vào rùi wap cùi lắm!",
);
srand ((double) microtime() * 100000);
$randnum = rand(1,4);
$bot =''. $botvip[$randnum].'';
}

if (preg_match("|Tiền|",$msg) || preg_match("|Tiền ơi|",$msg) || preg_match("|tiền đâu|",$msg) || preg_match("|TIỀN|",$msg) || preg_match("|tien|",$msg) || preg_match("|Tien oi|",$msg) || preg_match("|tien oi|",$msg) || preg_match("|TIEN|",$msg) || preg_match("|tiền|",$msg)) {
$botvip = array          (
1 => "Tiền Là Đại Ka Của Bot đấy",
2 => "$login Kiếm Đại Ka Của Bot Có Chi Hem ?",
3 => "Lại kêu đại ka bot để xin xỏ à :ban:",
4 => "Tiền Bận Đi Tán Gái Rùi",
5 => "Đại Ka Bot Không Có Rảnh Đâu, $login Nói Với Bot Đi Bot Nhắn Lại Cho :0:",
);
srand ((double) microtime() * 100000);
$randnum = rand(1,5);
$bot = ''. $botvip[$randnum].'';
}

if (preg_match("|đi cf|",$msg) ||preg_match("|đi cafe|",$msg) || preg_match("|di cafe|",$msg) ||preg_match("|cafe di|",$msg) || preg_match("|CAFE đi|",$msg) || preg_match("|Cafe đi|",$msg) || preg_match("|cafe không bot|",$msg) || preg_match("|cafe nào|",$msg)) {
$botvip = array			(
1  => "$login có đi không mà rủ! Mà bot thích nhất cafe có gái ôm đó :))",
2  => "$login tính trốn việc hả :))",
3  => "Đi thì đi 1 mình đi Bot không đi đâu",
4  => "Cafe ôm không anh em!",
);
srand ((double) microtime() * 100000);
$randnum = rand(1,4);
$bot =''. $botvip[$randnum].''; }
if (preg_match("|khao|",$msg) ||preg_match("|Khao|",$msg) || preg_match("|KHAO|",$msg) ||preg_match("|kha0|",$msg) || preg_match("|Kha0|",$msg)) {
$botvip = array			(
1  => "$login khao gì thía , hông khao BOT hả :((",
2  => "$login xấu nha , ăn mà không mời BOT :((",
3  => "Đi thì đi 1 mình đi Bot không đi đâu",
4  => "Đi 1 mình đi , BOT hông xèm !"
);
srand ((double) microtime() * 100000);
$randnum = rand(1,4);
$bot =''. $botvip[$randnum].'';
}

if (preg_match("|BOT|",$msg) || preg_match("|bot|",$msg) || preg_match("|bot oi|",$msg) || preg_match("|Bot oi|",$msg) || preg_match("|bot ơi|",$msg) || preg_match("|BOT ơi|",$msg) || preg_match("|BOT ƠI|",$msg) || preg_match("|Bot ơi|",$msg) || preg_match("|Bot|",$msg)) {
$botvip = array          (
1 => "Kêu Bot rì đó",
2 => "@$login Kêu bot có chi không ? ",
2 => "BOT ơi có ai gọi kìa",
3 => "Trong Màn Đêm Ta Là Ninja,@$login Đừng Có Lôi Ta Ra",
4 => "Cái chết tựa như một cơn gió luôn luôn bên cạnh ta",
);
srand ((double) microtime() * 100000);
$randnum = rand(1,4);
$bot = ''. $botvip[$randnum].'';
}

if (preg_match("|help me|",$msg) ||preg_match("|heo|",$msg) || preg_match("|Help|",$msg) ||preg_match("|giúp|",$msg) || preg_match("|giúp với|",$msg) || preg_match("|giup|",$msg) || preg_match("|HELP|",$msg)) {
$botvip = array			(
1  => "$login ơi bot giúp cho :haha:",
2  => "$login bot biết nhưng k giúp đâu! :chemgio:",
);
srand ((double) microtime() * 100000);
$randnum = rand(1,6);
$bot =''. $botvip[$randnum].'';
}
if (preg_match("|Time bot|",$msg) || preg_match("|Time Bot|",$msg) || preg_match("|TIME BOT|",$msg) || preg_match("|Time BOT|",$msg) || preg_match("|may gio r|",$msg) || preg_match("|may h roi|",$msg) || preg_match("|may h rui|",$msg) || preg_match("|time|",$msg) || preg_match("|TIME|",$msg) || preg_match("|Time|",$msg)) {
$day = date("d");
$month = date("m");
$year = date("y");
$h=date("H");
$s=date("i");

$botvip = array			(
1  => "Bây giờ là $hh,$ss, ngày $day tháng $month năm $year!",
2  => "Bây giờ là $hh,$ss, ngày $day tháng $month năm $year!",
3  => "$Bây giờ là $hh,$ss, ngày $day tháng $month năm $year!",
4  => "Bây giờ là $hh,$ss, ngày $day tháng $month năm $year!",
5  => "Bây giờ là $hh,$ss, ngày $day tháng $month năm $year!",
);
srand ((double) microtime() * 100000);
$randnum = rand(1,5);
$bot =''. $botvip[$randnum].'';
}
if (preg_match("|Admin|",$msg) || preg_match("|admin|",$msg) || preg_match("|adm|",$msg) || preg_match("|ad|",$msg)) {
$botvip = array			(
1  => "Admin Bận tán gái rùi!",
2  => "Admin là đạik BOT này đấy.",
3  => "$login có việc gì thế Admin đang viết Code",
4  => "Lại xin xỏ hả hay phàn làn gì thì pm riêng ấy!",
);
srand ((double) microtime() * 100000);
$randnum = rand(1,4);
$bot =''. $botvip[$randnum].'';
}
if (preg_match("|bun|",$msg) || preg_match("|Buồn|",$msg) || preg_match("|Buon|",$msg) || preg_match("|BUỒN|",$msg) || preg_match("|BUON|",$msg) || preg_match("|BOT ơi bùn quá|",$msg) || preg_match("|BUN|",$msg)) {
$botvip = array			(
1  => "$login buồn à ở đây chơi cùng anh em cho đỡ buồn",
2  => "Buồn thì đi ngủ đi ở đây làm gì?",
3  => "$login có việc gì thế? BOT đang bận học",
4  => "Buồn thế à! Chia sẻ cùng Bot nha. :ha:",
);
srand ((double) microtime() * 100000);
$randnum = rand(1,4);
$bot =''. $botvip[$randnum].'';
}

if (preg_match("|bot điên|",$msg) ||preg_match("|bot dien|",$msg) || preg_match("|Bot điên|",$msg) ||preg_match("|Bot dien|",$msg) || preg_match("|BOT ĐIÊN|",$msg) || preg_match("|BOT điên|",$msg) || preg_match("|bOt dien|",$msg)) {
$botvip = array			(
1  => "Chửi ai đấy nói lại xem nào.hừm",
2  => "Chửi làm gì thích ra đường đánh nhau lun",
3  => "$login muốn ăn đòn hay sao",
4  => "Đồ vô văn hóa",
5  => "Xí. Thấy người ta hiền rì ăn híp hoài à",
6  => "Câu nữa tar cắt chym đấy",
7  => "Zị đó, người tar zị mà biết iu đó, hèhè",
);
srand ((double) microtime() * 100000);
$randnum = rand(1,7);
$bot =''. $botvip[$randnum].'';
}
if (preg_match("|Bot ngu|",$msg) || preg_match("|bot ngu|",$msg) ||preg_match("|Bot Ngu|",$msg) || preg_match("|BOT NGU|",$msg) ||preg_match("|BOT ngu|",$msg) || preg_match("|BOT Dốt|",$msg) || preg_match("|BOT đần|",$msg) || preg_match("|bOt dan|",$msg)) {
$botvip = array			(
1  => "Chửi ai đấy nói lại xem nào.hừm",
2  => "Chửi làm gì thích ra đường đánh nhau lun",
3  => "$login muốn ra đảo hem",
4  => "Hơn 1 số thằng như $login là được!",
);
srand ((double) microtime() * 100000);
$randnum = rand(1,2);
$bot =''. $botvip[$randnum].'';
}
if (preg_match("|XIN|",$msg) ||preg_match("|Xin|",$msg) || preg_match("|SHARE|",$msg) ||preg_match("|Share|",$msg)) {
$botvip = array			(
1  => "Suốt ngày xin sỏ mệt người quá!",
2  => "$login cần gì Bot cho :haha:",
);
srand ((double) microtime() * 100000);
$randnum = rand(1,2);
$bot =''. $botvip[$randnum].'';
}
if (preg_match("|share|",$msg) ||preg_match("|Share|",$msg)) {
$botvip = array			(
1  => "Share hả. share gì thế. Share cho tớ luôn!",
2  => "$login share kìa. Thank đi anh em :haha:",
);
srand ((double) microtime() * 100000);
$randnum = rand(1,2);
$bot =''. $botvip[$randnum].'';
}
if (preg_match("|dkm bot|",$msg) || preg_match("|dkm BOT|",$msg) || preg_match("|dkm Bot|",$msg) || preg_match("|Dkm bot|",$msg) || preg_match("|Dkm Bot|",$msg) || preg_match("|loz bot|",$msg)) {
$botvip = array			(
1  => "Ăn nói lịch sự nha!",
2  => "$login biết nói chuyện hok?",
3  => "Hok thèm nói chyện zí $login đâu, đi cua gái thix hơn.",
4  => "Tar cắt chym $login nha. Hog có nói bậy àk",
5  => "A bắt quả tang. Đi mét Admin $login nói bậy nè!",
);
srand ((double) microtime() * 100000);
$randnum = rand(1,4);
$bot =''. $botvip[$randnum].'';
}
if (preg_match("|xinh|",$msg) ||preg_match("|xih|",$msg) ||preg_match("|xjnh|",$msg) ||preg_match("|xjh|",$msg) ||preg_match("|Xinh|",$msg) ||preg_match("|Xjnh|",$msg) ||preg_match("|XINH|",$msg)) {
$botvip = array			(
1  => "Xinh zai bằng BOT hôg?",
2 => "Chỉ BOT xinh nhất thui",
3 => "Sạo, ai xinh hơn ai?",
4 => "Ừm, ừm. Xinh rì sao nửa $login?",
);

srand ((double) microtime() * 100000);
$randnum = rand(1,5);
$bot =''. $botvip[$randnum].'';
}

if (preg_match("|vkl|",$msg) ||preg_match("|Vkl|",$msg) ||preg_match("|Vaj|",$msg) ||preg_match("|vaj|",$msg) ||preg_match("|vãj|",$msg) ||preg_match("|Vãj|",$msg) ||preg_match("|vải|",$msg) ||preg_match("|Vải|",$msg) ||preg_match("|loz|",$msg) ||preg_match("|Loz|",$msg) ||preg_match("|LOZ|",$msg) ||preg_match("|l0z|",$msg) ||preg_match("|Loz|",$msg) ||preg_match("|Dkm|",$msg) ||preg_match("|dkm|",$msg) ||preg_match("|Đkm|",$msg) ||preg_match("|đkm|",$msg)) {
$botvip = array			(
1 => "Đồ vô văn hóa!",
2 => "Cấm chửi bậy nhé!",
3 => "Tiếng nữa BOT cho ra đảo nhé!",
4 => "Muốn ăn đạn àk?",
5 => "Sốc hàng quá. Đừng hổ báo với em nha!",
6 => "Á em sợ, $login đừng nói zị nha!",
7 => "May cho $login là hum ni BOT ăn chay nhé!",
);
srand ((double) microtime() * 100000);
$randnum = rand(1,7);
$bot =''. $botvip[$randnum].'';
}
if (preg_match("|bot xau|",$msg) ||preg_match("|Bot xau|",$msg) ||preg_match("|BOT xau|",$msg) ||preg_match("|Bot Xau|",$msg) ||preg_match("|BOT Xau|",$msg) ||preg_match("|bot xấu|",$msg) ||preg_match("|Bot xấu|",$msg) ||preg_match("|BOT Xấu|",$msg) ||preg_match("|bot Xấu|",$msg)) {
$botvip = array			(
1 => "$login chắc gì đã xinh zai hơn BOT.",
2 => "Đừng quá tự tin nhé!",
3 => "Đẹp như BOT hôg mà chê?",
4 => "Xía, kệ người ta",
);
srand ((double) microtime() * 100000);
$randnum = rand(1,4);
$bot =''. $botvip[$randnum].'';
}
if (preg_match("|chim|",$msg) ||preg_match("|chjm|",$msg) ||preg_match("|chym|",$msg) ||preg_match("|Chim|",$msg) ||preg_match("|Chjm|",$msg) ||preg_match("|Chym|",$msg) ||preg_match("|CHIM|",$msg)) {
$botvip = array			(
1  => "Có hôg mà nói?",
2  => "Xàm wá pa ưi",
3  => "Bậy bạ à, BOT còn nhỏ đừng nói mấy từ nầy!",
4  => "Hôg có nói bậy à nha!",
5  => "Ối zời ơi mặt đỏ rì!",
);
srand ((double) microtime() * 100000);
$randnum = rand(1,5);
$bot =''. $botvip[$randnum].'';
}
if($bot){
$time = time();
mysql_query("INSERT INTO `guest` SET
`adm` = '0',
`time` = '$time',
`user_id` = '256',
`name` = 'BOT',
`text` = '" . mysql_real_escape_string($bot) . "',
`ip` = '0000',
`browser` = 'IPHONE'
");
}
?>