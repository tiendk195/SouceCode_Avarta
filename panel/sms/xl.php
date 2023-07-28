<?php
require_once('in/data.php'); //file ket noi data o day nhe
$code = $_REQUEST['code'];
$subCode = $_REQUEST['subCode'];
$mobile = $_REQUEST['mobile'];
$phone = ' '.$mobile.'';
$phone = str_replace(' 84','0', $phone);
$phone = str_replace(' 01','01', $phone);
$phone= str_replace(' 09','09', $phone);
$sdt = $phone; //so dien thoai da qua xu ly bo 84
$serviceNumber = $_REQUEST['serviceNumber'];
$tongdai = $serviceNumber;
$info = $_REQUEST['info'];
$sub = explode(' ', $info);
$ma = $sub[2];
if($ma == KH || $ma == Kh || $ma == kh){
$ma = $sub[2];
$id = $sub[3];
$dem = mysql_result(mysql_query("select count(*) from `users` where `mibile` = '".$sdt."' and `kichhoat` = '1'"),0);
$nick = mysql_result(mysql_query("select count(*) from `users` where `id` = '".$id."'"),0);
$kichhoat = mysql_result(mysql_query("select count(*) from `users` where `id` = '".$id."' and `kichhoat` = '1"),0);
if($dem != 0){
$responseInfo = 'So dien thoai nay da kich hoat cho 1 tai khoan';
}elseif($nick == 0){
$responseInfo = 'Nick nay khong ton tai!';
}elseif($kichhoat != 0){
$responseInfo = 'Nick nay da kich hoat!';
}else{
$rand = rand(1000,99999);
@mysql_query("UPDATE users SET `quakh`='1', `kichhoat`='1', `mibile`='".$sdt."', `timekichhoat`='".time()."' WHERE `id`='".$id."'");
$responseInfo = 'Kich hoat thanh cong cho id tai khoan: '.$id.' chuc ban online vui ve';
// CU PHAP LAY LAI PASSWORD
	} else if ($ma == PASS || $ma == Pass || $ma == pass) {
		if ($demphone == 0){
			$responseInfo = 'So dien thoai khong ton tai voi bat ky tai khoan nao !';
		} else {
			if(empty($id)) {
				$passmoi = rand(10000,99999);
			} else {
				$passmoi = $id;
			}
			$pass = md5(md5($passmoi));
			mysql_query("UPDATE users SET `password`='$pass' WHERE `sodienthoai`='{$sdt}'");
			$responseInfo = 'PASS MOI CUA BAN LA "'.$passmoi.'" !';
		}

	// CU PHAP NAP CREDIT
	} else if ($ma == NAP || $ma == Nap || $ma == nap) {
			$credit_set = ($tongdai == 8198 ? '100':NULL).($tongdai == 8298 ? '200':NULL).($tongdai == 8398 ? '300':NULL).($tongdai == 8498 ? '400':NULL).($tongdai == 8598 ? '600':NULL).($tongdai == 8698 ? '1200':NULL).($tongdai == 8798 ? '2000':NULL);
				if($dem == 0){
					$responseInfo = 'ID khong ton tai';
				} else if ($tongdai == 8098) {
					$responseInfo = 'DAU SO 8098 KHONG CHO PHEP NAP CREDIT, MONG BAN THONG CAM !';
				} else {
					mysql_query("UPDATE users SET `credit` = `credit` + '{$credit_set}' WHERE `id`='{$id}'");
					$responseInfo = 'BAN DA NAP '.$credit_set.' CREDIT VAO ID '.$id.', CAM ON BAN DA SU DUNG DICH VU.';
					mysql_query("INSERT INTO history_card SET 
						`user_id` = $id, 
						`type` = 2, 
						`sotien` = '{$tongdai}',
						`so_credit` = '{$credit_set}',
						`sodienthoai` = '{$sdt}',
						`view` = 1,
						`time` = '".time()."'
						");
				} 

	// NEU SAI CAC CU PHAP TREN THI SE TRA VE KET QUA
	
}else{
$responseInfo = 'Sai cu phap';
}
echo '0|'.$responseInfo;
?>