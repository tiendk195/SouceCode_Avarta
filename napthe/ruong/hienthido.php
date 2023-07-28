<?php
$check_ao = mysql_fetch_array(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='{$user_id}' AND `loai` = 'ao'"));
$ducnghia_ao = mysql_fetch_array(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='{$user_id}'  AND `id` = '".$check_ao['id_ruong']."' "));
	$shop_ao=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$ducnghia_ao['id_shop']."'"));
if ($check_ao['id_ruong']>0){
    $ao = '<img  style="width: 45px; height:48px;" src="/images/shop/'.$ducnghia_ao['id_shop'].'.png">';
	if ($ducnghia_ao['conghp']>0 or $ducnghia_ao['cong']>0) {
		
     $thongtin_ao = '<span class="ducnghia_ngang_hien"><b><font color="white">'.$shop_ao['tenvatpham'].' </font></b><br>
     <big><b><font color="red">HP: <b>'.number_format($ducnghia_ao['hp']).' [+'.$ducnghia_ao['conghp'].']</b><b></font></br> <font color="blue">SM: <b>'.number_format($ducnghia_ao['sucmanh']).'[+'.$ducnghia_ao['cong'].']</big></font></b></b>

     
     </span>';
} else {
	     $thongtin_ao = '<span class="ducnghia_ngang_hien"><b><font color="white">'.$shop_ao['tenvatpham'].' </font></b><br></br>
     

     
     </span>';
}
	
} else {     $ao = '';
    $thongtin_ao ='<span class="ducnghia_ngang_hien">Chưa mặc <h2><font color="green">Áo</h2></font> </span>';
    
} //KET THUC
//
$check_quan = mysql_fetch_array(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='{$user_id}' AND `loai` = 'quan'"));
$ducnghia_quan = mysql_fetch_array(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='{$user_id}'  AND `id` = '".$check_quan['id_ruong']."' "));
	$shop_quan=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$ducnghia_quan['id_shop']."'"));

if ($check_quan['id_ruong']>0){
    $quan = '
    <img  style="width: 45px; height:48px;" src="/images/shop/'.$ducnghia_quan['id_shop'].'.png">
    
    
    '; 
	if ($ducnghia_quan['conghp']>0 or $ducnghia_quan['cong']>0) {
		
     $thongtin_quan = '<span class="ducnghia_ngang_hien"><b><font color="white">'.$shop_quan['tenvatpham'].' </font></b><br>
     <big><b><font color="red">HP: <b>'.number_format($ducnghia_quan['hp']).' [+'.$ducnghia_quan['conghp'].']</b><b></font></br> <font color="blue">SM: <b>'.number_format($ducnghia_quan['sucmanh']).'[+'.$ducnghia_quan['cong'].']</big></font></b></b>

     
     </span>';
} else {
	     $thongtin_quan = '<span class="ducnghia_ngang_hien"><b><font color="white">'.$shop_quan['tenvatpham'].' </font></b><br></br>
     

     
     </span>';
}} else {     $quan = '';
    
        $thongtin_quan ='<span class="ducnghia_ngang_hien">Chưa mặc <h2><font color="green">Quần</h2></font></span>';

} //KET THUC

//
$check_canh = mysql_fetch_array(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='{$user_id}' AND `loai` = 'canh'"));
$ducnghia_canh = mysql_fetch_array(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='{$user_id}'  AND `id` = '".$check_canh['id_ruong']."' "));
	$shop_canh=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$ducnghia_canh['id_shop']."'"));

if ($check_canh['id_ruong']>0){
    $canh = '<img  style="width: 45px; height:48px;" src="/images/shop/'.$ducnghia_canh['id_shop'].'.png">';
	if ($ducnghia_canh['conghp']>0 or $ducnghia_canh['cong']>0) {
		
     $thongtin_canh = '<span class="ducnghia_ngang_hien"><b><font color="white">'.$shop_canh['tenvatpham'].' </font></b><br>
     <big><b><font color="red">HP: <b>'.number_format($ducnghia_canh['hp']).' [+'.$ducnghia_canh['conghp'].']</b><b></font></br> <font color="blue">SM: <b>'.number_format($ducnghia_canh['sucmanh']).'[+'.$ducnghia_canh['cong'].']</big></font></b></b>

     
     </span>';
} else {
	     $thongtin_canh = '<span class="ducnghia_ngang_hien"><b><font color="white">'.$shop_canh['tenvatpham'].' </font></b><br></br>
     

     
     </span>';
}
} else {     $canh = '';
            $thongtin_canh ='<span class="ducnghia_ngang_hien">Chưa mặc <h2><font color="green">Cánh</h2></font> </span>';

} //KET THUC

//
$check_docamtay = mysql_fetch_array(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='{$user_id}' AND `loai` = 'docamtay'"));
$ducnghia_docamtay = mysql_fetch_array(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='{$user_id}'  AND `id` = '".$check_docamtay['id_ruong']."' "));
	$shop_docamtay=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$ducnghia_docamtay['id_shop']."'"));

if ($check_docamtay['id_ruong']>0){
    $docamtay = '<img  style="width: 45px; height:48px;" src="/images/shop/'.$ducnghia_docamtay['id_shop'].'.png">';
	if ($ducnghia_docamtay['conghp']>0 or $ducnghia_docamtay['cong']>0) {
		
     $thongtin_docamtay = '<span class="ducnghia_trai_hien"><b><font color="white">'.$shop_docamtay['tenvatpham'].' </font></b><br>
     <big><b><font color="red">HP: <b>'.number_format($ducnghia_docamtay['hp']).' [+'.$ducnghia_docamtay['conghp'].']</b><b></font></br> <font color="blue">SM: <b>'.number_format($ducnghia_docamtay['sucmanh']).'[+'.$ducnghia_docamtay['cong'].']</big></font></b></b>

     
     </span>';
} else {
	     $thongtin_docamtay = '<span class="ducnghia_trai_hien"><b><font color="white">'.$shop_docamtay['tenvatpham'].' </font></b><br></br>
     

     
     </span>';
}
} else {     $docamtay = '';             $thongtin_docamtay ='<span class="ducnghia_trai_hien">Chưa mặc <h2><font color="green">Đồ Cầm Tay</h2></font> </span>';
} //KET THUC


//
$check_thucung = mysql_fetch_array(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='{$user_id}' AND `loai` = 'thucung'"));
$ducnghia_thucung = mysql_fetch_array(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='{$user_id}'  AND `id` = '".$check_thucung['id_ruong']."' "));
	$shop_thucung=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$ducnghia_thucung['id_shop']."'"));

if ($check_thucung['id_ruong']>0){
    $thucung = '<img  style="width: 45px; height:48px;" src="/images/shop/'.$ducnghia_thucung['id_shop'].'.png">';
	if ($ducnghia_thucung['conghp']>0 or $ducnghia_thucung['cong']>0) {
		
     $thongtin_thucung = '<span class="ducnghia_ngang_hien"><b><font color="white">'.$shop_thucung['tenvatpham'].' </font></b><br>
     <big><b><font color="red">HP: <b>'.number_format($ducnghia_thucung['hp']).' [+'.$ducnghia_thucung['conghp'].']</b><b></font></br> <font color="blue">SM: <b>'.number_format($ducnghia_thucung['sucmanh']).'[+'.$ducnghia_thucung['cong'].']</big></font></b></b>

     
     </span>';
} else {
	     $thongtin_thucung = '<span class="ducnghia_ngang_hien"><b><font color="white">'.$shop_thucung['tenvatpham'].' </font></b><br></br>
     

     
     </span>';
}
} else {     $thucung = '';
    $thongtin_thucung =' <span class="ducnghia_ngang_hien"> Chưa mặc <h2><font color="green">Thú Cưng</h2></font> </span>';
    
    
} //KET THUC


//
$check_haoquang = mysql_fetch_array(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='{$user_id}' AND `loai` = 'haoquang'"));
$ducnghia_haoquang = mysql_fetch_array(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='{$user_id}'  AND `id` = '".$check_haoquang['id_ruong']."' "));
	$shop_haoquang=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$ducnghia_haoquang['id_shop']."'"));

if ($check_haoquang['id_ruong']>0){
    $haoquang = '<img  style="width: 45px; height:48px;" src="/images/shop/'.$ducnghia_haoquang['id_shop'].'.png">';
	if ($ducnghia_haoquang['conghp']>0 or $ducnghia_haoquang['cong']>0) {
		
     $thongtin_haoquang = '<span class="ducnghia_hien"><b><font color="white">'.$shop_haoquang['tenvatpham'].' </font></b><br>
     <big><b><font color="red">HP: <b>'.number_format($ducnghia_haoquang['hp']).' [+'.$ducnghia_haoquang['conghp'].']</b><b></font></br> <font color="blue">SM: <b>'.number_format($ducnghia_haoquang['sucmanh']).'[+'.$ducnghia_haoquang['cong'].']</big></font></b></b>

     
     </span>';
} else {
	     $thongtin_haoquang = '<span class="ducnghia_hien"><b><font color="white">'.$shop_haoquang['tenvatpham'].' </font></b><br></br>
     

     
     </span>';
}
    
} else {     $haoquang = '';     $thongtin_haoquang =' <span class="ducnghia_hien"> Chưa mặc <h2><font color="green">Hào Quang</h2></font> </span>';
} //KET THUC


//
$check_matna = mysql_fetch_array(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='{$user_id}' AND `loai` = 'matna'"));
$ducnghia_matna = mysql_fetch_array(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='{$user_id}'  AND `id` = '".$check_matna['id_ruong']."' "));
	$shop_matna=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$ducnghia_matna['id_shop']."'"));

if ($check_matna['id_ruong']>0){
    $matna = '<img  style="width: 45px; height:48px;" src="/images/shop/'.$ducnghia_matna['id_shop'].'.png">';
	if ($ducnghia_matna['conghp']>0 or $ducnghia_matna['cong']>0) {
		
     $thongtin_matna = '<span class="ducnghia_hien"><b><font color="white">'.$shop_matna['tenvatpham'].' </font></b><br>
     <big><b><font color="red">HP: <b>'.number_format($ducnghia_matna['hp']).' [+'.$ducnghia_matna['conghp'].']</b><b></font></br> <font color="blue">SM: <b>'.number_format($ducnghia_matna['sucmanh']).'[+'.$ducnghia_matna['cong'].']</big></font></b></b>

     
     </span>';
} else {
	     $thongtin_matna = '<span class="ducnghia_hien"><b><font color="white">'.$shop_matna['tenvatpham'].' </font></b><br></br>
     

     
     </span>';
}
} else {     $matna = ''; $thongtin_matna =' <span class="ducnghia_hien"> Chưa mặc <h2><font color="green">Mặt Nạ</h2></font> </span>';} //KET THUC


//
$check_kinh = mysql_fetch_array(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='{$user_id}' AND `loai` = 'kinh'"));
$ducnghia_kinh = mysql_fetch_array(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='{$user_id}'  AND `id` = '".$check_kinh['id_ruong']."' "));
	$shop_kinh=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$ducnghia_kinh['id_shop']."'"));

if ($check_kinh['id_ruong']>0){
    $kinh = '<img  style="width: 45px; height:48px;" src="/images/shop/'.$ducnghia_kinh['id_shop'].'.png">';
	if ($ducnghia_kinh['conghp']>0 or $ducnghia_kinh['cong']>0) {
		
     $thongtin_kinh = '<span class="ducnghia_hien"><b><font color="white">'.$shop_kinh['tenvatpham'].' </font></b><br>
     <big><b><font color="red">HP: <b>'.number_format($ducnghia_kinh['hp']).' [+'.$ducnghia_kinh['conghp'].']</b><b></font></br> <font color="blue">SM: <b>'.number_format($ducnghia_kinh['sucmanh']).'[+'.$ducnghia_kinh['cong'].']</big></font></b></b>

     
     </span>';
} else {
	     $thongtin_kinh = '<span class="ducnghia_hien"><b><font color="white">'.$shop_kinh['tenvatpham'].' </font></b><br></br>
     

     
     </span>';
}
} else {     $kinh = ''; $thongtin_kinh =' <span class="ducnghia_hien"> Chưa mặc <h2><font color="green">Kính</h2></font> </span>';} //KET THUC

//
$check_khuonmat = mysql_fetch_array(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='{$user_id}' AND `loai` = 'khuonmat'"));
$ducnghia_khuonmat = mysql_fetch_array(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='{$user_id}'  AND `id` = '".$check_khuonmat['id_ruong']."' "));
	$shop_khuonmat=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$ducnghia_khuonmat['id_shop']."'"));

if ($check_khuonmat['id_ruong']>0){
    $khuonmat = '<img  style="width: 45px; height:48px;" src="/images/shop/'.$ducnghia_khuonmat['id_shop'].'.png">';
	if ($ducnghia_khuonmat['conghp']>0 or $ducnghia_khuonmat['cong']>0) {
		
     $thongtin_khuonmat = '<span class="ducnghia_hien"><b><font color="white">'.$shop_khuonmat['tenvatpham'].' </font></b><br>
     <big><b><font color="red">HP: <b>'.number_format($ducnghia_khuonmat['hp']).' [+'.$ducnghia_khuonmat['conghp'].']</b><b></font></br> <font color="blue">SM: <b>'.number_format($ducnghia_khuonmat['sucmanh']).'[+'.$ducnghia_khuonmat['cong'].']</big></font></b></b>

     
     </span>';
} else {
	     $thongtin_khuonmat = '<span class="ducnghia_hien"><b><font color="white">'.$shop_khuonmat['tenvatpham'].' </font></b><br></br>
     

     
     </span>';
}} else {     $khuonmat = ''; $thongtin_khuonmat ='<span class="ducnghia_hien"> Chưa mặc <h2><font color="green">Khuôn Mặt</h2></font> </span>';} //KET THUC


//
$check_toc = mysql_fetch_array(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='{$user_id}' AND `loai` = 'toc'"));
$ducnghia_toc = mysql_fetch_array(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='{$user_id}'  AND `id` = '".$check_toc['id_ruong']."' "));
	$shop_toc=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$ducnghia_toc['id_shop']."'"));

if ($check_toc['id_ruong']>0){
    $toc = '<img  style="width: 45px; height:48px;" src="/images/shop/'.$ducnghia_toc['id_shop'].'.png">';
	if ($ducnghia_toc['conghp']>0 or $ducnghia_toc['cong']>0) {
		
     $thongtin_toc = '<span class="ducnghia_trai_hien"><b><font color="white">'.$shop_toc['tenvatpham'].' </font></b><br>
     <big><b><font color="red">HP: <b>'.number_format($ducnghia_toc['hp']).' [+'.$ducnghia_toc['conghp'].']</b><b></font></br> <font color="blue">SM: <b>'.number_format($ducnghia_toc['sucmanh']).'[+'.$ducnghia_toc['cong'].']</big></font></b></b>

     
     </span>';
} else {
	     $thongtin_toc = '<span class="ducnghia_trai_hien"><b><font color="white">'.$shop_toc['tenvatpham'].' </font></b><br></br>
     

     
     </span>';
}} else {         $toc = ''; 
    
    $thongtin_toc ='<span class="ducnghia_trai_hien"> Chưa mặc <h2><font color="green">Tóc</h2></font> </span>';
} //KET THUC


//
$check_mat = mysql_fetch_array(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='{$user_id}' AND `loai` = 'mat'"));
$ducnghia_mat = mysql_fetch_array(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='{$user_id}'  AND `id` = '".$check_mat['id_ruong']."' "));
	$shop_mat=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$ducnghia_mat['id_shop']."'"));

if ($check_mat['id_ruong']>0){
    $mat = '<img  style="width: 45px; height:48px;" src="/images/shop/'.$ducnghia_mat['id_shop'].'.png">';
	if ($ducnghia_mat['conghp']>0 or $ducnghia_mat['cong']>0) {
		
     $thongtin_mat = '<span class="ducnghia_trai_hien"><b><font color="white">'.$shop_mat['tenvatpham'].' </font></b><br>
     <big><b><font color="red">HP: <b>'.number_format($ducnghia_mat['hp']).' [+'.$ducnghia_mat['conghp'].']</b><b></font></br> <font color="blue">SM: <b>'.number_format($ducnghia_mat['sucmanh']).'[+'.$ducnghia_mat['cong'].']</big></font></b></b>

     
     </span>';
} else {
	     $thongtin_mat = '<span class="ducnghia_trai_hien"><b><font color="white">'.$shop_mat['tenvatpham'].' </font></b><br></br>
     

     
     </span>';
}} else {         $mat = '';
      $thongtin_mat ='<span class="ducnghia_trai_hien"> Chưa mặc <h2><font color="green">Mắt</h2></font> </span>';
} //KET THUC


$check_non = mysql_fetch_array(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='{$user_id}' AND `loai` = 'non'"));
$ducnghia_non = mysql_fetch_array(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='{$user_id}'  AND `id` = '".$check_non['id_ruong']."' "));
	$shop_non=mysql_fetch_array(mysql_query("SELECT * FROM `shopdo` WHERE `id`='".$ducnghia_non['id_shop']."'"));

if ($check_non['id_ruong']>0){
    $non = '<img  style="width: 45px; height:48px;" src="/images/shop/'.$ducnghia_non['id_shop'].'.png">';
		if ($ducnghia_non['conghp']>0 or $ducnghia_non['cong']>0) {
		
     $thongtin_non = '<span class="ducnghia_trai_hien"><b><font color="white">'.$shop_non['tenvatpham'].' </font></b><br>
     <big><b><font color="red">HP: <b>'.number_format($ducnghia_non['hp']).' [+'.$ducnghia_non['conghp'].']</b><b></font></br> <font color="blue">SM: <b>'.number_format($ducnghia_non['sucmanh']).'[+'.$ducnghia_non['cong'].']</big></font></b></b>

     
     </span>';
} else {
	     $thongtin_non = '<span class="ducnghia_trai_hien"><b><font color="white">'.$shop_non['tenvatpham'].' </font></b><br></br>
     

     
     </span>';
}} else {     $non = ''; $thongtin_non ='<span class="ducnghia_trai_hien"> Chưa mặc <h2><font color="green">Khuôn Mặt</h2></font> </span>';} //KET THUC

    


$check_cancau = mysql_fetch_array(mysql_query("SELECT * FROM `ruongduphong` WHERE `user_id`='{$user_id}' AND `loai` = 'cancau'"));
$ducnghia_cancau = mysql_fetch_array(mysql_query("SELECT * FROM `khodo` WHERE `user_id`='{$user_id}'  AND `id` = '".$check_cancau['id_ruong']."' "));
if ($check_cancau['id_ruong']>0){
    $cancau = '/images/shop/'.$ducnghia_cancau['id_shop'].'.png';
} else {         $cancau = '/ducnghia/0.png';} //KET THUC