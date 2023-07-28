<?php






if(preg_match('|pokemon|',$msg) || preg_match('|Po ke mon|',$msg) || preg_match('|Pokemon|',$msg)) {   
$p=mysql_fetch_array(mysql_query("SELECT * FROM `khupokemon` WHERE `user_id`= '".$user_id."'"));

if (time() > $datauser['timeskpokemon'] + 60*60 ){
echo"
	
<script>
alert('Bạn nhận được 10 Bóng thường, 5 Bóng khởi đầu. Khu của bạn là: {$p['khu']} ');</script>
";

  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'10' WHERE `user_id`='".$user_id."' AND `id_shop` = '242'");
    mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'5' WHERE `user_id`='".$user_id."' AND `id_shop` = '244'");

mysql_query("UPDATE `users` SET `timeskpokemon` = " .time(). "  WHERE `id` = '{$user_id}'");


	

} else {
    ?>
    <script>
alert('Bạn đã nhận rồi. Vui lòng đợi 1 tiếng sau để nhận tiếp' );
    </script>

<?php
    
}
}