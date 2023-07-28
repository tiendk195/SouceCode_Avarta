<style>
	.nennha{
		background: url('/sanbay/house/images/nen.png') no-repeat;
		height: 24px;
		width: 24px;
		text-align: center;
	}
	.floatnen{
		float: left;
	}
	img{
		margin-top: -15px;
		margin-left: -2px;
		
	}
	.house_game_2{
		text-algin: center;
	}
	.house_game_2 a{
		display: block;
	}
	.house_game_2 a:hover{
		border: 1px solid #81b0e4;
		margin-top: -2px;
		margin-left: -2px;
	}
	.gach_nha{
		background: url('/sanbay/house/images/gach.png') no-repeat;
		height: 24px;
		width: 24px;
	}
	.gach_trung{
		background: url('/sanbay/house/images/gach_trung.png') no-repeat;
		height: 24px;
		width: 24px;
	}
	.tuong-ngang{
		background: url('/sanbay/house/images/tuong-ngang.png') no-repeat;
		height: 24px;
		width: 24px;
	}
	.mautuong{
		background: url('/sanbay/house/images/mautuong.png') no-repeat;
		height: 24px;
		width: 24px;
	}
	.mautuong2{
		background: url('/sanbay/house/images/mautuong2.png') no-repeat;
		height: 24px;
		width: 24px;
	}
</style>
<?php
// Select vatpham
	$data->house_tl($int_user,'vatpham');
	$tt_vp_row = $data->num_rows();
	$tt_vp = $data->fetch_array();
	// Select nennha
	$data->house_tl($int_user,'nennha');
	$nn_vp_row = $data->num_rows();
	$nn_vp = $data->fetch_array();
	// Select tuongnha tren
	$data->house_tl($int_user,'tuongnhatren');
	$tnt_vp_row = $data->num_rows();
	$tnt_vp = $data->fetch_array();
	// Select tuongnha duoi
	$data->house_tl($int_user,'tuongnhaduoi');
	$tnd_vp_row = $data->num_rows();
	$tnd_vp = $data->fetch_array();
	// Select gach cot tru nha
	$data->house_tl($int_user,'cottru');
	$cotru_vp_row = $data->num_rows();
	$cotru_vp = $data->fetch_array();
	// Select gach xay hang doc canh trai va phai mau trang
	$data->house_tl($int_user,'gachdoc');
	$gachdoc_vp_row = $data->num_rows();
	$gachdoc_vp = $data->fetch_array();
	// Select gach xay hang doc canh tren va duoi mau trang
	$data->house_tl($int_user,'gachngang');
	$gachngang_vp_row = $data->num_rows();
	$gachngang_vp = $data->fetch_array();
?>