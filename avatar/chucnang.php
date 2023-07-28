<?php

define('_IN_JOHNCMS', 1);

require_once ("../incfiles/core.php");
if (isset($_GET['hienvp'])) {
    
  if ($id<17 AND $id !=15){

if ($id==1){
    $loai ='toc';
}
if ($id==2){
    $loai ='ao';
}
if ($id==3){
    $loai ='quan';
}
if ($id==4){
    $loai ='non';
}
if ($id==5){
    $loai ='docamtay';
}
if ($id==6){
    $loai ='matna';
}
if ($id==7){
    $loai ='kinh';
}
if ($id==8){
    $loai ='nensau';
}
if ($id==9){
    $loai ='canh';
}
if ($id==10){
    $loai ='thucung';
}
if ($id==11){
    $loai ='cancau';
}
if ($id==12){
    $loai ='haoquang';
}
if ($id==13){
    $loai ='mat';
}
if ($id==14){
    $loai ='khuonmat';
}

     echo'<div class="pmenu"><div style="overflow:auto;height:150px">';

$req = mysql_query("SELECT `id`, `gia`, `tenvatpham`, `loaitien`,`timesudung` FROM `shopdo` WHERE `loai`='".$loai."' AND `hienthi`=0 AND `premium`=0 ORDER BY `id` ");
while($res = mysql_fetch_assoc($req)){
    $shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$res[id]."'"));

    
    $checkdo=mysql_num_rows(mysql_query("SELECT * FROM `khodo` WHERE `id_shop`='".$shop['id']."' AND `user_id`='".$user_id."'"));
if ($checkdo>=1){
    echo' <img onclick="ttvp('.$res['id'].')" src="/images/shop/'.$res['id'].'.png" style="border: 1px solid #F6CEE3;background-color: #F6CEE3;margin:2px 0;padding:10px;border-radius:5px;">';
} else {
    
 echo'<img onclick="ttvp('.$res['id'].')" src="/images/shop/'.$res['id'].'.png" style="
border: 1px solid #A9E2F3;background-color: #A9E2F3;margin:2px 0;padding:10px;border-radius:5px" "=""> ';
}
}

}
}

//


if (isset($_GET['ttvp'])) {
   if ($datauser['naptichluy']>=10000 and $datauser['naptichluy']<20000  ) {
$giamgia = 1.1;
} else if ($datauser['naptichluy']>=20000 and $datauser['naptichluy']<50000  ) {
$giamgia = 1.2;
		} else if ($datauser['naptichluy']>=50000 and $datauser['naptichluy']<70000  ) {
$giamgia = 1.3;
				} else if ($datauser['naptichluy']>=70000 and $datauser['naptichluy']<100000  ) {
$giamgia = 1.4;
					} else if ($datauser['naptichluy']>=100000 and $datauser['naptichluy']<150000  ) {
$giamgia = 1.5;
					} else if ($datauser['naptichluy']>=150000 and $datauser['naptichluy']<200000  ) {
$giamgia = 1.6;
					} else if ($datauser['naptichluy']>=200000 and $datauser['naptichluy']<250000  ) {
$giamgia = 1.7;
			} else if ($datauser['naptichluy']>=250000 and $datauser['naptichluy']<350000  ) {
$giamgia = 1.8;
			} else if ($datauser['naptichluy']>=350000 and $datauser['naptichluy']<500000  ) {
$giamgia = 1.9;
			} else if ($datauser['naptichluy']>=500000  and $datauser['naptichluy']<1000000  ) {
$giamgia = 2;
				} else if ($datauser['naptichluy']>=1000000  ) {
$giamgia = 2.5;
} else if ($datauser['naptichluy']<10000) {
   $giamgia = 1;
} 


$vatpham = $id;
if(empty($vatpham)){
header('location: /');
}
$check=mysql_num_rows(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$id."'"));
        $item=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$id."'"));


if($check < 1){
                		    echo'<script>alert("Lỗi không có vật phẩm này!!");</script>';
}else if($item['hienthi'] == 1){
                    		    echo'<script>alert("Lỗi không có vật phẩm này!!");</script>';
} else if($item['premium'] == 1){
                    		    echo'<script>alert("Lỗi không có vật phẩm này!!");</script>';
} else 






{
        $item=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$id."'"));
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$item[id]."'"));
$shop2=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$item[id]."'"));

$shop['gia'] = round($shop['gia'] / $giamgia);



    echo'<div class="pmenu"><center><font color="green">'.$shop[tenvatpham].'</font>
<br><font size="1"><i>Giá gốc: <s>'.number_format($shop2['gia']).' '.($shop['loaitien'] == xu ? 'Xu' : 'Lượng').' </s></br> ';
echo'Giá sale: '.number_format($shop['gia']).'</font> '.($shop['loaitien'] == xu ? 'Xu' : 'Lượng').'</br>';
echo'</font>
</i>
</br>

<input type="submit" value="Mua" onclick="mua('.$id.')">';
    echo' <a href="list.php?act=tang&amp;id='.$id.'"><input type="submit" name="submit" value="Tặng"></a>';

if ($datauser['rights'] >= 9) {
    echo' <a href="del.php?id='.$id.'"><input type="submit" name="submit" value="Xóa"></a>';
        echo' <a href="edit.php?id='.$id.'"><input type="submit" name="submit" value="Sửa"></a>';
    } 
echo'
</center></div>';
    



}
}

//

if (isset($_GET['mua'])) {
if ($datauser['naptichluy']>=10000 and $datauser['naptichluy']<20000  ) {
$giamgia = 1.1;
} else if ($datauser['naptichluy']>=20000 and $datauser['naptichluy']<50000  ) {
$giamgia = 1.2;
		} else if ($datauser['naptichluy']>=50000 and $datauser['naptichluy']<70000  ) {
$giamgia = 1.3;
				} else if ($datauser['naptichluy']>=70000 and $datauser['naptichluy']<100000  ) {
$giamgia = 1.4;
					} else if ($datauser['naptichluy']>=100000 and $datauser['naptichluy']<150000  ) {
$giamgia = 1.5;
					} else if ($datauser['naptichluy']>=150000 and $datauser['naptichluy']<200000  ) {
$giamgia = 1.6;
					} else if ($datauser['naptichluy']>=200000 and $datauser['naptichluy']<250000  ) {
$giamgia = 1.7;
			} else if ($datauser['naptichluy']>=250000 and $datauser['naptichluy']<350000  ) {
$giamgia = 1.8;
			} else if ($datauser['naptichluy']>=350000 and $datauser['naptichluy']<500000  ) {
$giamgia = 1.9;
			} else if ($datauser['naptichluy']>=500000  and $datauser['naptichluy']<1000000  ) {
$giamgia = 2;
				} else if ($datauser['naptichluy']>=1000000  ) {
$giamgia = 2.5;
} else if ($datauser['naptichluy']<10000) {
   $giamgia = 1;
} 


$vatpham = $id;
if(empty($vatpham)){
header('location: /');
}
$tongruong=mysql_query("SELECT * FROM `khodo` WHERE `user_id`='".$user_id."'");
$checktongruong=mysql_num_rows($tongruong);

$check=mysql_num_rows(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$id."'"));
        $item=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$id."'"));


if($check < 1){
                		    echo'<script>alert("Lỗi không có vật phẩm này!!");</script>';
}else if($item['hienthi'] == 1){
                    		    echo'<script>alert("Lỗi không có vật phẩm này!!");</script>';
} else if($item['premium'] == 1){
                    		    echo'<script>alert("Lỗi không có vật phẩm này!!");</script>';
} else 	if ($checktongruong>=$datauser['tongruong']) {
                    		    echo'<script>alert("Rương của bạn đã đầy, vui lòng nâng cấp thêm!!");</script>';
} else {
        $item=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$id."'"));
$shop=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$item[id]."'"));

$shop['gia'] = round($shop['gia'] / $giamgia);
$query=mysql_query("SELECT * FROM `khodo` WHERE `id_shop`='".$shop['id']."' AND `user_id`='".$user_id."'");
$checkdo=mysql_num_rows($query);
if ($checkdo>=1) {
                        		    echo'<script>alert("Giao dịch thất bại, bạn đã sở hữu '.$shop['tenvatpham'].' ");</script>';

    exit;
} 
if($shop['timesudung']!=0){
$shop['timesudung'] = $shop['timesudung'] + time();
}
if($shop['loaitien'] == 'xu'){
    if($datauser['xu'] >= $shop['gia']){
                                		    echo'<script>alert("Giao dịch thành công, bạn đã mua '.$shop['tenvatpham'].' ");</script>';

mysql_query("UPDATE `users` SET `xu`=`xu`-'".$shop['gia']."' WHERE `id`='".$user_id."'");
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$shop['loai']."',
`id_loai`='".$shop['id_loai']."',
`tenvatpham`='".$shop['tenvatpham']."',
`id_shop`='".$shop['id']."',
`timesudung`='".$shop['timesudung']."'
");
} else {
                         		    echo'<script>alert("Giao dịch thất bại, bạn không đủ tiền ");</script>';
   
}
} else if($shop['loaitien'] == 'vnd'){
     if($datauser['luong'] >= $shop['gia']){
                                		    echo'<script>alert("Giao dịch thành công, bạn đã mua '.$shop['tenvatpham'].' ");</script>';

mysql_query("UPDATE `users` SET `luong`=`luong`-'".$shop['gia']."' WHERE `id`='".$user_id."'");
mysql_query("INSERT INTO `khodo` SET
`user_id`='".$user_id."',
`loai`='".$shop['loai']."',
`id_loai`='".$shop['id_loai']."',
`tenvatpham`='".$shop['tenvatpham']."',
`id_shop`='".$shop['id']."',
`timesudung`='".$shop['timesudung']."'
");
} else {
                         		    echo'<script>alert("Giao dịch thất bại, bạn không đủ tiền ");</script>';
   
}
}
    
    



   
    



}
}

//

?>