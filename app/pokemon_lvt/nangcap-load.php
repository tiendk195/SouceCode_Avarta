<?php
header('Content-Type: text/html; charset="utf-8');
define('_IN_JOHNCMS', 1);

$rootpath='../../';


require_once ("../../incfiles/core.php");
?>
<script type="text/javascript">
$(document).ready(function(){
	$('#btn-dap').click(function(){
		var idvp = $('#idvp').val();
		var url = "nangcap-load.php";
		var data = {"dap": "", "idvp": idvp,};
		$('#content-load').load(url, data);
		return false;
	});
});
</script>
<?php


$vp=(int)$_POST[idvp];
IF($vp<3 or $vp>6 ){
Header('Location: /');
Exit;
}

 	if ($vp==4){
    	    $loaitien='xu';
    	    $lt='Xu';
    	    $tile=20;
    	    $can=3;

    	    $gia=5000;
    	    $idvp=243;
    	    $tenvp='Bóng hi vọng';

    	}
    
    	if ($vp==5){
    	    $loaitien='xu';
    	    $lt='Xu';
    	    $tile=15;
    	    $can=5;

    	    $gia=15000;
    	    $idvp=244;
    	    $tenvp='Bóng khởi đầu';

    	}
    	
    	if ($vp==6){
    	    $loaitien='luong';
    	    $lt='Lượng';
    	    $tile=5;
    	    $can=10;

    	    $gia=5;
    	    $idvp=245;
    	    $tenvp='Bóng thần kì';

    	}
    	$bong=mysql_fetch_array(mysql_query("SELECT * FROM `vatpham` WHERE `user_id`='".$user_id."' AND `id_shop`='242'"));

if(isset($_POST['dap'])) {
if ($vp==4){
    	    		if (($datauser['toc']==374 &&$datauser['ao']==615&&$datauser['quan']==408) or ( $datauser['toc']==375 &&$datauser['ao']==616&&$datauser['quan']==409) ){

    	   	 $rand=rand(1,2);
} else {
    	 $rand=rand(1,5);
    
}
    	}
    	if ($vp==5){
   
    	    		if (($datauser['toc']==374 &&$datauser['ao']==615&&$datauser['quan']==408) or ( $datauser['toc']==375 &&$datauser['ao']==616&&$datauser['quan']==409) ){

    	   	 $rand=rand(1,3);
} else {
    	 $rand=rand(1,7);
    
}
    

    	}	
    	if ($vp==6){
    	   
    	    		if (($datauser['toc']==374 &&$datauser['ao']==615&&$datauser['quan']==408) or ( $datauser['toc']==375 &&$datauser['ao']==616&&$datauser['quan']==409) ){

    	   	 $rand=rand(1,5);
} else {
    	 $rand=rand(1,7);
    
}


    	}

IF($datauser['$loaitien'] < $gia And $bong['soluong'] <$can){
echo"<script type='text/javascript'>

alert('Lỗi. Bạn không đủ nguyên liệu  ' );
</script>";
} else if ($rand==1){ 
		 
    echo" <script>
alert('Nâng cấp thành công {$tenvp}' );
</script>";
 mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1' WHERE `user_id`='".$user_id."' AND `id_shop`='".$idvp."'");
mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$can."' WHERE `user_id`='".$user_id."' AND `id_shop`='242'");
    mysql_query("UPDATE `users` SET `$loaitien`=`$loaitien`-'".$gia."' WHERE `id`='".$user_id."'");
	
} else if ($rand!=1){ 
		 
    echo" <script>
alert('Nâng cấp thất bại' );
</script>";

	mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`-'".$can."' WHERE `user_id`='".$user_id."' AND `id_shop`='242'");
    mysql_query("UPDATE `users` SET `$loaitien`=`$loaitien`-'".$gia."' WHERE `id`='".$user_id."'");
}
  
     


	

}
echo'<div class="omenu"><center><div class="ducnghia_item"><img src="/images/vatpham/'.$idvp.'.png" style="position: absolute;verticalalign: 0 px;margin:15px 0 0 -9px;"></div>
<br>Bạn có muốn nâng cấp <font color="red">'.$tenvp.'</font> từ <font color="green">'.$can.' Bóng thường <img src="/images/vatpham/242.png"> + '.$gia.'  '.$lt.'</font> 
<br>(tỉ lệ thành công <font color="red">'.$tile.'%</font>) không?<br>

<form method="post">
<input type="hidden" id="idvp" name="idvp" value="'.$vp.'">

<input type="submit" id="btn-dap" name="dap" value="Nâng cấp">
</center></div></div></form>';
?>