<?php
// Thực hiện lênh update sửa xóa insert
if(isset($_GET['dichuyen'])){
		$id_vp = intval($_GET['dichuyen']);
		if($id_vp > 0){
			if(isset($_GET['chuyen'])){
				$ngang_up = intval($_GET['ngang']);
				$doc_up = intval($_GET['doc']);
				$ngang_goc2 = intval($_GET['ngang_goc']);
				$doc_goc = intval($_GET['doc_goc']);
				$vitri_cu = $doc_goc.':'.$ngang_goc2;
				$vitri_update = $doc_up.':'.$ngang_up;
				$select_vp = "SELECT * FROM gamemini_house_username WHERE vitri = '{$vitri_cu}' AND user_id = '{$user_id}' AND vatpham = '{$id_vp}'";
				$data->query($select_vp);
				$dem_vp = $data->num_rows();
				
				$dichuyen_tl = $data->o_gach($doc_up,$ngang_up,$cuanha1,$cuanha2,$cuanha3,$cuanha4,$cuanha5,$doc,$ngang,$doc_2,$doc_3);
				include('kiemtra.php');
				$sql = "UPDATE gamemini_house_username SET vitri = '{$vitri_update}' WHERE vitri = '{$vitri_cu}' AND user_id = '{$user_id}' AND vatpham = '{$id_vp}'";
				if(($dichuyen_tl == 'nennha' || $dichuyen_tl == 'tuongnhatren') && $dem_vp > 0){
					echo $data->query($sql);
					header('Location: ../edit/');
				}elseif($dem_vp == 0){
					header('Location: ../edit/?no_vp');
				}else{
					header('Location: ../edit/?no_vitri');
				}
			}else{
				include('hd_movie.php');
			}
			echo '<div class="oemnu"><a id="nut" href="../edit/">Quay Lại</a> <a id="nut" href="../shop/">Mua Sắm Đồ</a></div>';
			require('../../../incfiles/end.php');
			exit;
		}
}

// Hủy đồ


if(isset($_GET[dohuy])){
	$dohuy = intval($_GET['dohuy']);
	if($dohuy > 0){
		if(isset($_POST['dongy'])){
			$where_dl = "user_id = '{$user_id}' AND vatpham = '{$dohuy}' AND vitri = '{$vitri}'";
			$data->delete('gamemini_house_username',$where_dl);
			$update_vp = "UPDATE gamemini_house_users SET sl_vatpham = sl_vatpham - 1 WHERE user_id = '{$user_id}'";
								$data->query($update_vp);
			header('Location: ../edit/');
		}elseif(isset($_POST['khong'])){
			header('Location: ../edit/');
		}
		echo '<div class="rmenu" style="text-align: center; font-size: 16px;">Bạn có muốn vứt đi đồ này không<br/>
		<form action="" method="post">
		<input type="submit" name="dongy" value="Có"/>
		<input type="submit" name="khong" value="Không"/>
		</form>
		</div>';
	}
	echo '<div class="list5"><a id="nut" href="../edit/">Quay Lại</a> <a id="nut" href="../shop/">Mua Sắm Đồ</a></div>';
	require('../../../incfiles/end.php');
	exit;
		
}

?>