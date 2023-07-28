<?php

////update đánh đề
if($times != 19 and $times != 20 and $times != 21 and $times != 22 and $times != 23){
$decn = mysql_fetch_array(mysql_query("SELECT * FROM `danhde_cn` WHERE `id`='1'"));
if($decn['cn'] == 1){
mysql_query("DELETE FROM `danhde`");
mysql_query("UPDATE `danhde_cn` SET `cn` = '0', `so`='0' WHERE `id` = '1'");
}

} else {
$decn = mysql_fetch_array(mysql_query("SELECT * FROM `danhde_cn` WHERE `id`='1'"));
$de = mysql_fetch_array(mysql_query("SELECT * FROM `danhde` WHERE `user_id`='".$user_id."' and `so`='".$decn['so']."'"));
$xu = $de['xu']*20;

$check = mysql_result(mysql_query("SELECT COUNT(*) FROM `danhde` WHERE `so`='".$decn['so']."'"), 0);
if($check >= 1){
if($decn['so'] >= 1){
if($de['so'] == $decn['so']){
if($de['nhanxu'] == 0){
mysql_query("UPDATE `danhde` SET `nhanxu` = '1' WHERE `user_id` = '".$user_id."'");
mysql_query("UPDATE `users` SET `xu` = `xu`+'{$xu}' WHERE `id` = '{$user_id}'");
$text = 'Chúc mừng bạn đã trúng số đề <b><font color="red">'.$decn['so'].'</font></b> và nhận được <b><font color="red">'.$xu.'</font></b>xu';
mysql_query("INSERT INTO `thongbao` SET
                `id` = '".$user_id."',
                `user` = '".$user_id."',
                `text` = '$text',
                `ok` = '1',
                `time` = '" . time() . "'
            ");
}
}
}
}





if($decn['cn'] == 0){

$sode = rand(1,99);
$check = mysql_result(mysql_query("SELECT COUNT(*) FROM `danhde` WHERE `so`='".$sode."'"), 0);
if($check >= 1){
$text = '[b][green]Con số đề may mắn của ngày hôm nay là:[/green] [red]'.$sode.'[/red] [blue]chúc mừng cắc bạn đã chúng đề nhé nhớ khao M.N nha :)[/blue][/b]';
mysql_query("INSERT INTO `wnew` SET
`user` = '256',
`time` = '".time()."',
`text` = '".$text."'
");
mysql_query("INSERT INTO `guest` SET `user_id`='256', `text`='" . mysql_real_escape_string($text) . "', `time`='".time()."'");
} else {
$text = '[b][green]Con số đề may mắn của ngày hôm nay là:[/green] [red]'.$sode.'[/red] [blue]tiếc quá không có ai trúng :([/blue][/b]';
mysql_query("INSERT INTO `wnew` SET
`user` = '256',
`time` = '".time()."',
`text` = '".$text."'
");
mysql_query("INSERT INTO `guest` SET `user_id`='256', `text`='" . mysql_real_escape_string($text) . "', `time`='".time()."'");
}





mysql_query("UPDATE `danhde_cn` SET `cn` = '1',`so`='".$sode."' WHERE `id` = '1'");

}
}

?>