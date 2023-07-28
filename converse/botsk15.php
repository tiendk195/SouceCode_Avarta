<?php






if(preg_match('|sukien15|',$msg) || preg_match('|Sự kiện 1 5|',$msg) || preg_match('|Sukien15|',$msg) || preg_match('|sự kiện 15|',$msg) || preg_match('|su kien 15|',$msg)|| preg_match('|Su kien 15|',$msg)) {   
    $query=mysql_query("SELECT * FROM `vatpham` WHERE `id_shop`='105' AND `user_id`='".$user_id."'");
$check=mysql_num_rows($query);
if ($check<1) {
  mysql_query("INSERT INTO `vatpham` SET `soluong`='0',`user_id`='".$user_id."',`id_shop` = '105'");
}
if (time() > $datauser['timesk15'] + 3600 ){
?>
	
<script>
alert('Bạn nhận được 5 Hộp quà 1-5' );
<?php
  mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'5' WHERE `user_id`='".$user_id."' AND `id_shop` = '105'");
mysql_query("UPDATE `users` SET `timesk15` = " .time(). "  WHERE `id` = '{$user_id}'");

?>


   







</script>
<?php
	

} else {
    ?>
    <script>
alert('Bạn đã nhận rồi. Vui lòng đợi 1 tiếng sau để nhận tiếp' );
    </script>

<?php
    
}
}