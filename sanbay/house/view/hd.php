<?php
	include('select.php');
	echo '<div class="house_game">';
	for($j = 0; $j <= $ngang; $j ++){
		echo '<div class="floatnen">';
		for($i = 0;$i <= $doc;$i++){
			if($j == 0 || $j == $ngang){
				if($i == 0 || $i == $doc_3){
					echo $data->thaygach('divgd',$cotru_vp_row,'gach_trung',$cotru_vp,$i,$j);
					echo '</div>';
				}else if($i == $doc){
					echo $data->thaygach('divgd',$tnt_vp_row,'mautuong2',$tnt_vp,$i,$j);
					echo '</div>';
				}else if($i == $doc_2){
					echo $data->thaygach('divgd',$gachdoc_vp_row,'mautuong',$gachdoc_vp,$i,$j);
						$xem_vp = $data->view_vatpham($tt_vp_row,$tt_vp,$i,$j,'mautuong');
						if($xem_vp != 0){
							foreach($xem_vp as $item){
								echo $item;
							}
						}
					echo '</div>';
				}else{
					echo $data->thaygach('divgd',$gachdoc_vp_row,'gach_nha',$gachdoc_vp,$i,$j);
					echo '</div>';
				}
			}elseif($i == 1 || $i == $doc_2 && $j != $cuanha1 && $j != $cuanha2 && $j != $cuanha3 && $j != $cuanha4 && $j != $cuanha5){
				echo $data->thaygach('divgd',$tnt_vp_row,'mautuong',$tnt_vp,$i,$j);
					$xem_vp = $data->view_vatpham($tt_vp_row,$tt_vp,$i,$j,'mautuong');
					if($xem_vp != 0){
						foreach($xem_vp as $item){
							echo $item;
						}
					}
				echo '</div>';
			}elseif($i == 2){
				echo $data->thaygach('divgd',$tnd_vp_row,'mautuong2',$tnd_vp,$i,$j);
				echo '</div>';
			}elseif($i == $doc && $j != $cuanha1 && $j != $cuanha2 && $j != $cuanha3 && $j != $cuanha4 && $j != $cuanha5){
				echo $data->thaygach('divgd',$tnd_vp_row,'mautuong2',$tnd_vp,$i,$j);
				echo '</div>';
			}else{
				if($i == 0 || $i == $doc_3 && $j != $cuanha1 && $j != $cuanha2 && $j != $cuanha3 && $j != $cuanha4 && $j != $cuanha5){
					echo $data->thaygach('divgd',$gachngang_vp_row,'tuong-ngang',$gachngang_vp,$i,$j);
					echo '</div>';
				}else if($i == 0 || $i == $doc_3 && $j != $cuanha1 && $j != $cuanha2 && $j != $cuanha3 && $j != $cuanha4 && $j != $cuanha5){
					echo $data->thaygach('divgd',$tnd_vp_row,'mautuong2',$tnd_vp,$i,$j);
					echo '</div>';
				}else{
					echo $data->thaygach('divgd',$nn_vp_row,'nennha',$nn_vp,$i,$j);
					$xem_vp = $data->view_vatpham($tt_vp_row,$tt_vp,$i,$j,'nennha');
					if($xem_vp != 0){
						foreach($xem_vp as $item){
							echo $item;
						}
					}
					echo '</div>';
				}
			}
		}
		echo '</div>';
	}
	echo '<div class="clear"></div>';
?>
</div>