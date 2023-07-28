<?php
	// Kiểm tra giá trị và thực thi chuyển và bán đồ
	$ngang_c = intval($_GET[ngang]);
	$doc_c = intval($_GET[doc]);
	$vitri = $doc_c.':'.$ngang_c;
	if($ngang_c <= $ngang && $doc_c <= $doc && $ngang_c >= 0 && $doc_c >= 0){
		include('edit.php');
		$theloai = $data->o_gach($doc_c,$ngang_c,$cuanha1,$cuanha2,$cuanha3,$cuanha4,$cuanha5,$doc,$ngang,$doc_2,$doc_3);
		$vp_khac = "SELECT * FROM gamemini_house_username A join gamemini_house_vatpham B ON A.vatpham=B.id WHERE user_id = '{$user_id}' AND vitri = '{$vitri}' AND theloai = 'vatpham'";
		$data->query($vp_khac);
		$rows_tpk = $data->num_rows();
		$vatpham_slk = $data->fetch_assoc();
		if($rows_tpk > 0){
?>
					<div class="nenfr">
						<table>
							<tbody>
								<tr>
									<td>
										<img src="<?php echo '/sanbay/house/images/'.$vatpham_slk[theloai].'/'.$vatpham_slk[name_pic].'.png' ?>" width="18">
									</td>
									<td style="vertical-align: top; font-size: 12px;">
										<b><?php echo $vatpham_slk[name]; ?></b><br>
										
										[<a href="<?php echo $ngang_c.'_'.$doc_c.'_'.$vatpham_slk[vatpham]; ?>.html"><b>Di Chuyển</b></a>] / [<a href="<?php echo ''.$ngang_c.'_'.$doc_c.'_'.$vatpham_slk[vatpham]; ?>_huy.html"><b>Vứt Đi</b></a>]
									</td>
								</tr>
							</tbody>
						</table>
					</div>
<?php	
		}else{
			header('Location: ../edit/?no_vp');
		}
	}else{
		header('Location: ../edit/?no_gt');
	}
?>