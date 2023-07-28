<?php

define('_IN_JOHNCMS', 1);
$rootpath='../../';

require_once ("../../incfiles/core.php");

if(isset($_POST['submit2'])) {



if ( $datauser['luong'] <5 ){
echo"<script type='text/javascript'>

alert('Bạn không đủ lượng để bắn pháo' );
</script>";
} else {

    echo' Bắn pháo vui vẻ thành công! <a href="npcsukien.php"> Quay lại</a>';
	
mysql_query("UPDATE `users` SET `luong` =`luong` - '5',`banphaohoapokemon`= `banphaohoapokemon` +'1' WHERE `id` = '{$user_id}'");
	
}


	

}
?>