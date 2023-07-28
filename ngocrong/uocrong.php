<?php
define('_IN_JOHNCMS', 1);

require_once ('../incfiles/core.php');
if (!$user_id) {
header('Location: /index.php');
exit;
}


 $nr1 = mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='269'"));
$nr2 = mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='270'"));
$nr3 = mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='271'"));
$nr4 = mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='272'"));
$nr5 = mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='273'"));
$nr6 = mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='274'"));
$nr7 = mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='275'"));
 $tr=mysql_query("SELECT * FROM `ngocrong_uoc`");
$checktr=mysql_num_rows($tr);
$nro = mysql_fetch_array(mysql_query("SELECT * FROM `ngocrong_uoc` WHERE `time`>'0' "));

$time = $nro['time']+6*60;
$timeboss=$time-time();

if ($checktr>0) {
                    echo'<script>alert("Hiện tại đang có một người ước rồng thần, vui lòng ước lại vào '.$timeboss.'s sau ");</script>';

} else {
  if ($nr1['soluong']<1 || $nr2['soluong']<1 || $nr3['soluong']<1 || $nr4['soluong']<1 || $nr5['soluong']<1|| $nr6['soluong']<1|| $nr7['soluong']<1) {
                    echo'<script>alert("Đừng đánh thức ta khi ngươi chưa thu thập đủ ngọc rồng! ");</script>';
        } else {
                           $bot='@'.$user_id.' vừa gọi thành công [b]Rồng thần[/b]. [url='.$home.'/ngocrong/]Vào đây[/url] để cướp nào :yao:';
        mysql_query("INSERT INTO `guest` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
            mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='{$user_id}' AND `id_shop`='269'");
                    mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='{$user_id}' AND `id_shop`='270'");
            mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='{$user_id}' AND `id_shop`='271'");
            mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='{$user_id}' AND `id_shop`='272'");
            mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='{$user_id}' AND `id_shop`='273'");
            mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='{$user_id}' AND `id_shop`='274'");
            mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'1' WHERE `user_id`='{$user_id}' AND `id_shop`='275'");

                  mysql_query("INSERT INTO `ngocrong_uoc` SET `user_id`='".$user_id."', `loai`='1',`time`='".time()."' ");
                                        echo'<script>alert("Gọi thành công rồng thần!! ");</script>';


        }
        ?>
<script>
   window.location="index.php";</script> 
</script>
<?php
        }

?>