<?php
header('Content-Type: text/html; charset="utf-8');
define('_IN_JOHNCMS', 1);

require_once ('../incfiles/core.php');
if (!$user_id) {
header('Location: /index.php');
exit;
}

    ?>
<script type="text/javascript">
$(document).ready(function(){
	$('#btn-uoc').click(function(){
		var idvp = $('#idvp').val();
		var typeuoc=$('select option:selected').val();
		var url = "uoc-load.php";
		var data = {"uoc": "", "idvp": idvp, "type": typeuoc};
		$('#content-load').load(url, data);
		return false;
	});
});
</script>
<?php
$id=(int)$_POST[idvp];
$type=(int)$_POST[type];

$nr = mysql_fetch_array(mysql_query("SELECT * FROM `ngocrong_uoc` WHERE `id`='".$id."' AND `user_id`='".$user_id."' "));
   if (time()>=$nr['time']+5*60) {
echo'<script>alert("Rồng thần đã hết thời gian !!");</script>';
           mysql_query("DELETE FROM `ngocrong_uoc` ");

} else

if ($nr<1){
echo'<script>alert("Lỗi!!");</script>';
} else {
    if ($nr['loai']==1){
            //Nhiệm vụ SSM
    $res2=mysql_query("SELECT * FROM `ssm_nhiemvu_user` WHERE `user_id`='".$user_id."' AND `kichhoat`='1' ORDER BY `id` ");

while($ssm=mysql_fetch_array($res2)) {
    $ssm2 = mysql_fetch_array(mysql_query("SELECT * FROM `ssm_nhiemvu` WHERE `id`='{$ssm['id_shop']}'"));
    if ($ssm2['loai']=='uocrong'){
            mysql_query("UPDATE `ssm_nhiemvu_user` SET `tiendo`= `tiendo` + '1' WHERE `user_id`='{$user_id}' AND `id` = '{$ssm['id']}' ");
    }
}
//Nhiệm vụ SSM
                $danc=rand(200,500);
$sm=10000;
        $xu=rand(10000000,20000000);
        $luongkhoa=rand(500,2000);


        if ($type==1){
            $tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."'");
$checktongruong=mysql_num_rows($tongruong);
	if ($checktongruong>=$datauser['tongruong']) {
echo'<script>alert("Rương của bạn đã đầy, vui lòng nâng cấp thêm!!");</script>';
	} else{
	    $randmtp=rand(1,5);
	    if ($randmtp==1){
	     	    echo'<script>alert("Bạn nhận được 1 Rương mảnh trang phục!");</script>';

	                mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '317'");
   
	    }
	    echo'<script>alert("Bạn nhận được 1 mảnh trang phục!");</script>';

	                mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop` = '313'");

	    
	    $rand=rand(1,5);
echo'<script>alert("Ước Đẹp trai thành công!!");</script>';
             $bot='Chúc mừng [red]'.$datauser['name'].'[/red] vừa ước thành công [b] Đẹp trai[/b] từ Ngọc Rồng';
        mysql_query("INSERT INTO `guest` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
   if ($rand==1){
       $cross=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='4371'"));
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$cross[loai]."',
`id_loai`='".$cross[id_loai]."',
`tenvatpham`='".$cross[tenvatpham]."',
`id_shop`='".$cross[id]."'
");
  $text='Bạn nhận được '.$cross[tenvatpham].' <img src="/images/shop/'.$cross['id'].'.png"> từ Ước Rồng Thần  ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
}
if ($rand==2){
       $cross=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='4368'"));
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$cross[loai]."',
`id_loai`='".$cross[id_loai]."',
`tenvatpham`='".$cross[tenvatpham]."',
`id_shop`='".$cross[id]."'
");
  $text='Bạn nhận được '.$cross[tenvatpham].' <img src="/images/shop/'.$cross['id'].'.png"> từ Ước Rồng Thần  ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
}
if ($rand==3){
       $cross=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='4367'"));
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$cross[loai]."',
`id_loai`='".$cross[id_loai]."',
`tenvatpham`='".$cross[tenvatpham]."',
`id_shop`='".$cross[id]."'
");
  $text='Bạn nhận được '.$cross[tenvatpham].' <img src="/images/shop/'.$cross['id'].'.png"> từ Ước Rồng Thần  ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
}
if ($rand==4){
       $cross=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='4347'"));
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$cross[loai]."',
`id_loai`='".$cross[id_loai]."',
`tenvatpham`='".$cross[tenvatpham]."',
`id_shop`='".$cross[id]."'
");
  $text='Bạn nhận được '.$cross[tenvatpham].' <img src="/images/shop/'.$cross['id'].'.png"> từ Ước Rồng Thần  ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
}
if ($rand==5){
       $cross=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='4395'"));
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$cross[loai]."',
`id_loai`='".$cross[id_loai]."',
`tenvatpham`='".$cross[tenvatpham]."',
`id_shop`='".$cross[id]."'
");
  $text='Bạn nhận được '.$cross[tenvatpham].' <img src="/images/shop/'.$cross['id'].'.png"> từ Ước Rồng Thần  ';
mysql_query("INSERT INTO `thongbao` SET
`id`='1',
`user`='".$user_id."',
`text`='$text',
`ok`='1',
`time`='".time()."'
");
}

   }    
       
       
       
        }
        else if ($type==2){
            $rand = rand(1,2);
            if ($rand==1){
            echo'<script>alert("Ước giàu có thành công, bạn nhận được '.$xu.' xu");</script>';

             $bot='Chúc mừng [red]'.$datauser['name'].'[/red] vừa ước thành công [b]'.$xu.' Xu[/b] từ Ngọc Rồng';
        mysql_query("INSERT INTO `guest` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
        mysql_query("UPDATE `users` SET `xu` =`xu`+  '".$xu."' WHERE `id`= '".$user_id."'");
        }
         if ($rand==2){
            echo'<script>alert("Ước giàu có thành công, bạn nhận được '.$luongkhoa.' lượng khóa");</script>';
               $bot='Chúc mừng [red]'.$datauser['name'].'[/red] vừa ước thành công [b]'.$luongkhoa.' Lượng khóa[/b] từ Ngọc Rồng';
        mysql_query("INSERT INTO `guest` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
                mysql_query("UPDATE `users` SET `luongkhoa` =`luongkhoa`+  '".$luongkhoa."' WHERE `id`= '".$user_id."'");
         }
        }
         
                else if ($type==3){
                    
             $rand = rand(1,2);
            if ($rand==1){
            echo'<script>alert("Ước sức mạnh thành công, bạn nhận được '.$sm.' sức mạnh");</script>';

             $bot='Chúc mừng [red]'.$datauser['name'].'[/red] vừa ước thành công [b]'.$sm.' sức mạnh[/b] từ Ngọc Rồng';
        mysql_query("INSERT INTO `guest` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
        mysql_query("UPDATE `users` SET `smthem` = `smthem` +   '".$sm."' WHERE `id`= '".$user_id."'");
        }
         if ($rand==2){
            echo'<script>alert("Ước sức mạnh thành công, bạn nhận được '.$danc.' đá nâng cấp");</script>';
               $bot='Chúc mừng [red]'.$datauser['name'].'[/red] vừa ước thành công [b]'.$danc.' đá nâng cấp[/b] từ Ngọc Rồng';
        mysql_query("INSERT INTO `guest` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
            mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'".$danc."' WHERE `user_id`='".$user_id."' AND `id_shop` = '60'");
         }
        }
                      
        
    
}
mysql_query("DELETE FROM `ngocrong_uoc` ");
            echo'<script>alert("Hẹn gặp ngươi vào một ngày đẹp trời nhé hahaha");</script>';

?>
  <meta http-equiv="refresh" content="2">
  <?php
  
    
}

echo'</center></div>';


?>