<?php

define('_IN_JOHNCMS', 1);

require_once ("../incfiles/core.php");
$vatpham = $id;
if(empty($vatpham)){
header('location: /');
}
$check=mysql_num_rows(mysql_query("SELECT * FROM `shopvatpham` WHERE `id`='".$vatpham."' AND `loai`='ghepmanh'"));

if($check < 1){
                		    echo'<script>alert("Lỗi không có vật phẩm này!!");</script>';
}else{
    $info = mysql_fetch_array(mysql_query("SELECT * FROM `shopvatpham` WHERE `id`='".$vatpham."'"));

    echo'<div class="pmenu"><center><font color="green">'.$info['tenvatpham'].'</font><br>
<input value="1" type="number" id="sl"><br><input type="submit" value="Đổi!" onclick="doi('.$id.')">
</center></div>';
    


}


//


?>