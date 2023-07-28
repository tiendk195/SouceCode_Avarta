<?php
	// Kiểm tra giá trị trùng lặp trong database
	$sql_kiemtra_db = "SELECT * FROM gamemini_house_username A JOIN gamemini_house_vatpham B ON A.vatpham=B.id WHERE user_id = '{$user_id}' AND vitri = '{$vitri_update}' AND theloai = 'vatpham'";
	$data->query($sql_kiemtra_db);
	$rows_ktdb_1 = $data->num_rows();
	// Kiểm vật phẩm trên nền nhà
	$sql_kiemtra_vp = "SELECT * FROM gamemini_house_username A JOIN gamemini_house_vatpham B ON A.vatpham=B.id WHERE user_id = '{$user_id}' AND vitri = '{$vitri_update}' AND B.theloai2 = 'cottru'";
	$data->query($sql_kiemtra_vp);
	$rows_ktdb_2 = $data->num_rows();
	$fetch_vp_arr_vp = $data->fetch_assoc();
	// Kiểm tra thông tin vật phẩm
	$sql_kiemtra_vp_2 = "SELECT * FROM gamemini_house_username A JOIN gamemini_house_vatpham B ON A.vatpham=B.id WHERE user_id = '{$user_id}' AND vitri = '{$vitri_cu}' AND theloai = 'vatpham'";
	$data->query($sql_kiemtra_vp_2);
	$rows_ktdb_3 = $data->num_rows();
	$fetch_vp_arr = $data->fetch_assoc();
	// Kiểm tra vị trí đồ đang đặt di chuyển tới
	$sql_kiemtra_vp_3 = "SELECT * FROM gamemini_house_username A JOIN gamemini_house_vatpham B ON A.vatpham=B.id WHERE user_id = '{$user_id}' AND vitri = '{$vitri_cu}' AND theloai = 'vatpham'";
	$data->query($sql_kiemtra_vp_3);
	$rows_ktdb_4 = $data->num_rows();
	$fetch_vp_arr4 = $data->fetch_assoc();
	if($fetch_vp_arr[thuoctinh] == '1' && $dichuyen_tl != 'tuongnhatren' && $dichuyen_tl ){
		header('Location: ../edit/?no_vitri');
		exit;
	}
	if($fetch_vp_arr[thuoctinh] == '0' && $dichuyen_tl == 'tuongnhatren'){
		header('Location: ../edit/?no_vitri');
		exit;
	}
	if($rows_ktdb_1 > 0){
		header('Location: ../edit/?no_vitri');
		exit;
	}
	if($rows_ktdb_2 > 0){
		header('Location: ../edit/?no_vitri');
		exit;
	}
	
?>