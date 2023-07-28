<?php
	if(isset($_GET['name'])){
	$int = intval($_GET['name']);
		$theloai = $data->vatpham($int);
		$sql_vatpham = "SELECT * FROM gamemini_house_vatpham WHERE theloai2 = '{$theloai}'";
		$data->query($sql_vatpham);
		$tong = $data->num_rows();
		$sql_vatpham = "SELECT * FROM gamemini_house_vatpham WHERE theloai2 = '{$theloai}' ORDER BY id DESC LIMIT $start,$kmess";
		$data->query($sql_vatpham);
		$vatpham = $data->query_2();
		while($vatphampro = mysql_fetch_array($vatpham)){
?>
					<div class="omenu">
						<table width="100%">
							<tbody>
								<tr>
									<td width="50px">
										<img style="padding: 10px" src="<?php echo '/sanbay/house/images/'.$vatphampro['theloai'].'/'.$vatphampro['name_pic'].'.png' ?>">
									</td>
									<td style="vertical-align: top; font-size: 12px;">
										<b><?php echo $vatphampro['name']; ?></b><br>
										<b>Giá: <?php echo $vatphampro['giatien']; echo ($vatphampro['donvi'] == 'luong') ? ' Lượng' : ' Xu'?></b><br>
										<b>Đặt Được ở vị trí:</b> <?php echo $data->viet_tl($vatphampro['theloai']) ?>.<br/>
										[<b> <a href="vpid_<?php echo $vatphampro['id']; ?>.html">Chọn cái này</a> ]
									</td>
								</tr>
							</tbody>
						</table>
					</div>
<?php				
		}
		if ($tong > $kmess){ //Phân Trang
			echo '<div class="phantrang">' . functions::display_pagination('tt_'.$int.'_p', $start, $tong, $kmess) . '</div>';
		}
	}
	if(isset($_GET['vatpham'])){
		$id_vp = intval($_GET['vatpham']);
		if($id_vp > 0){
			include('hd.php');
		}else{
			header('Location: ../');
		}
	}
	if(isset($_GET['iddo'])){
	$dohuy = intval($_GET[iddo]);
	$ngang_c = intval($_GET[ngang]);
	$doc_c = intval($_GET[doc]);
	$vitri = $doc_c.':'.$ngang_c;
	$sql_vatpham = "SELECT * FROM gamemini_house_vatpham WHERE id = '{$dohuy}'";
	$data->query($sql_vatpham);
	$thongtin = $data->fetch_assoc();
	$theloai_2 = $thongtin[theloai2];
	
	if($thongtin[donvi] == 'luong'){
		$donvi = 'luong';
	}else{
		$donvi = 'xu';
	}
	$giatien = $thongtin[giatien];
	// Kiểm tra đã có vật phẩm tại ô gạch đó chưa
	$sql_kiemtra_vp = "SELECT * FROM gamemini_house_username A JOIN gamemini_house_vatpham B ON A.vatpham=B.id WHERE vatpham = '{$dohuy}' AND user_id = '{$user_id}' AND vitri = '{$vitri}' AND theloai != 'nennha'";
	$data->query($sql_kiemtra_vp);
	$rows_ktvp = $data->num_rows();
	// Kiểm tra giá trị trùng lặp trong database
	$sql_kiemtra_db = "SELECT * FROM gamemini_house_username A JOIN gamemini_house_vatpham B ON A.vatpham=B.id WHERE user_id = '{$user_id}' AND vitri = '{$vitri}' AND theloai = 'nennha'";
	$data->query($sql_kiemtra_db);
	$rows_ktdb = $data->num_rows();
	$fetch_vp_arr = $data->fetch_assoc();
	// Kiểm tra giá trị trùng lặp trong database trên tường
	$sql_kiemtra_db_2 = "SELECT * FROM gamemini_house_username A JOIN gamemini_house_vatpham B ON A.vatpham=B.id WHERE user_id = '{$user_id}' AND vitri = '{$vitri}' AND theloai = 'tuongnhatren'";
	$data->query($sql_kiemtra_db_2);
	$rows_ktdb_2 = $data->num_rows();
	$fetch_vp_arr_2 = $data->fetch_assoc();
	// Kiểm vật phẩm trên nền nhà
	$sql_kiemtra_vp = "SELECT * FROM gamemini_house_username A JOIN gamemini_house_vatpham B ON A.vatpham=B.id WHERE user_id = '{$user_id}' AND vitri = '{$vitri}' AND theloai = 'nennha'";
	$data->query($sql_kiemtra_vp);
	$rows_ktdb_3 = $data->num_rows();
	$fetch_vp_arr_vp = $data->fetch_assoc();
	// Kiểm vật phẩm trên nền nhà
	$sql_kiemtra_vp_trung = "SELECT * FROM gamemini_house_username A JOIN gamemini_house_vatpham B ON A.vatpham=B.id WHERE user_id = '{$user_id}' AND vitri = '{$vitri}' AND theloai = 'vatpham'";
	$data->query($sql_kiemtra_vp_trung);
	$rows_ktdb_trung = $data->num_rows();
	if($rows_ktdb_trung > 0 && $thongtin[theloai] != 'nennha'){
		echo '<div class="omenu" style="text-align: center; font-size: 16px;">Chỗ này đang có một vật phẩm khác, không thể đặt vào <br/>
			<a href="vpid_'.$dohuy.'.html">Quay lại đặt chỗ khác</a> | <a href="../shop/">Ra Shop</a></div>';
		require('../../../incfiles/end.php');
		exit;		
	}
	
	if($rows_ktdb > 0){
		if($fetch_vp_arr[theloai] == 'nennha' && $fetch_vp_arr[vatpham] == $thongtin[id] && $fetch_vp_arr[vitri] == $vitri){
			echo '<div class="omenu" style="text-align: center; font-size: 16px;">Chỗ này đã có viên gạch này rồi cưng :D, đặt thêm nữa chi cho tốn tiền <br/>
				<a href="vpid_'.$dohuy.'.html">Quay lại đặt chỗ khác</a> | <a href="../shop/">Ra Shop</a></div>';
			require('../../../incfiles/end.php');
			exit;
		}
		
	}
	
	if($ngang_c <= $ngang && $doc_c <= $doc && $ngang_c >= 0 && $doc_c >= 0){
		$theloai_id = $data->o_gach($doc_c,$ngang_c,$cuanha1,$cuanha2,$cuanha3,$cuanha4,$cuanha5,$doc,$ngang,$doc_2,$doc_3);
		if($theloai_id == 'nennha' && $fetch_vp_arr[theloai2] == 'cottru' && $thongtin[thuoctinh] == '0' && $thongtin[theloai2] =! 'cottru'){
			echo '<div class="omenu" style="text-align: center; font-size: 16px;">Vị trí này đã được xây tường không thể đặt đồ nội thất <br/>
				<a href="vpid_'.$dohuy.'.html">Quay lại đặt chỗ khác</a> | <a href="../shop/">Ra Shop</a></div>';
			require('../../../incfiles/end.php');
			exit;
		
		}
		if($theloai_id == 'nennha' && $fetch_vp_arr[theloai2] != 'cottru' && $thongtin[thuoctinh] == '1'){
			echo '<div class="omenu" style="text-align: center; font-size: 16px;">Không thể đặt đồ treo tường xuống dưới nền nhà được <br/>
				<a href="vpid_'.$dohuy.'.html">Quay lại đặt chỗ khác</a> | <a href="../shop/">Ra Shop</a></div>';
			require('../../../incfiles/end.php');
			exit;
		
		}
		if($theloai_id == 'nennha' && $fetch_vp_arr_vp[theloai] == 'vatpham' && $thongtin[theloai2] == 'cottru'){
			echo '<div class="omenu" style="text-align: center; font-size: 16px;">Chỗ này đang có vật phẩm không thể làm tường <br/>
				<a href="vpid_'.$dohuy.'.html">Quay lại đặt chỗ khác</a> | <a href="../shop/">Ra Shop</a></div>';
			require('../../../incfiles/end.php');
			exit;
		
		}
		if($theloai_id == 'tuongnhatren' && $fetch_vp_arr_2[theloai2] == 'cottru' && $thongtin[theloai] == 'vatpham'){
			echo '<div class="omenu" style="text-align: center; font-size: 16px;">Chỗ này là tường rồi không thể đặt đồ nội thất <br/>
				<a href="vpid_'.$dohuy.'.html">Quay lại đặt chỗ khác</a> | <a href="../shop/">Ra Shop</a></div>';
			require('../../../incfiles/end.php');
			exit;
		}
		$theloai_fix = $thongtin[theloai];
		if($thongtin[theloai] == 'vatpham'){
			$theloai_fix = 'nennha';
		}
		if($theloai_id == $theloai_fix || ($theloai_id == 'tuongnhatren' && $thongtin[thuoctinh] == '1')){
			if($rows_ktvp == 0){
				if($dohuy > 0){
					if(isset($_POST['dongy'])){
						if($datauser[$donvi] >= $thongtin['giatien'] || $user_id == 1){
							if($rows_ktdb > 0 && $thongtin[theloai] == 'nennha'){
								$update_vp = "UPDATE gamemini_house_username SET vatpham = '{$dohuy}', theloai2 = '{$theloai_2}' WHERE user_id = '{$user_id}' AND vitri = '{$vitri}' AND theloai2 = '{$fetch_vp_arr_vp[theloai2]}'";
								$data->query($update_vp);
								
							}else{
								$insert = "INSERT INTO gamemini_house_username SET user_id = '{$user_id}', vatpham = '{$dohuy}', vitri = '{$vitri}', theloai2 = '{$theloai_2}'";
								$data->query($insert);
								$update_vp = "UPDATE gamemini_house_users SET sl_vatpham = sl_vatpham + 1 WHERE user_id = '{$user_id}'";
								$data->query($update_vp);
							}
							if($user_id != 1){
								$update = "UPDATE users SET `{$donvi}`=`{$donvi}`-'{$giatien}' WHERE id = '{$user_id}' LIMIT 1";
								$data->query($update);
							}
							if($thongtin['theloai'] == 'nennha' || $thongtin['theloai'] == 'tuongnhatren' || $thongtin['theloai'] == 'tuongnhaduoi'){
								header('Location: ../shop/vpid_'.$dohuy.'.html');
							}else{
								header('Location: ../shop/?yes_vp');
							}
						}else{
							header('Location: ../shop/?no_vp');
						}
					}elseif(isset($_POST[khong])){
						header('Location: ../shop/');
					}
					echo '<div class="omenu" style="text-align: center; font-size: 16px;">Bạn có muốn mua đồ này không?<br/>
					<form action="" method="post">
					<input type="submit" name="dongy" value="Có"/>
					<input type="submit" name="khong" value="Không"/>
					</form>
					</div>';
				}
			}else{
				echo '<div class="omenu" style="text-align: center; font-size: 16px;">Chỗ này đang có đồ rồi không thể thêm tiếp <br/>
				<a href="vpid_'.$dohuy.'.html">Quay lại đặt chỗ khác</a> | <a href="../shop/">Ra Shop</a></div>';
			}
		}else{
				echo '<div class="omenu" style="text-align: center; font-size: 16px;">Chỗ này không thể đặt được vật phẩm này <br/>
				<a href="vpid_'.$dohuy.'.html">Quay lại đặt chỗ khác</a> | <a href="../shop/">Ra Shop</a></div>';
			}
		require('../../../incfiles/end.php');
		exit;
	}
}
?>