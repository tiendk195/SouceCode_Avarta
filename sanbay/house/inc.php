<?php
	// Cấu hình class
	class user{
		protected $_result = "";
		// Truy vấn
		public $err_query = "";
		public function query($sql){
			$this->_result = mysql_query($sql);
		}
		public function query_2(){
				return $this->_result;
		}
		public function num_rows(){
			if($this->_result){
				$row = mysql_num_rows($this->_result);
			}else{
				$row = "Can not count";
			}
			return $row;
		
		}
		public function fetch_assoc(){
			if($this->_result){
				$data = mysql_fetch_assoc($this->_result);
			}else{
				$data = "Can not fetch assoc";
			}
			return $data;
		}
		public function fetch_array(){
			if($this->_result){
				while($data = mysql_fetch_array($this->_result)){
					$name[] = $data;
				}
			}else{
				$name = "Can not while fetch array";
			}
			return $name;
		
		}
		public function insert($table,$data){
				$name_db = '';
				$inport_value = '';
				foreach($data as $key => $value){
					$name_db .= '`'.$key.'`,';
					$inport_value .= "'".mysql_escape_string($value)."',";
				}
				$data = "INSERT INTO ".$table." (".trim($name_db,",").") VALUES (".trim($inport_value,",").")";
				return $this->query($data);
				
		}
		public function delete($table,$where){
				$data = "DELETE FROM ".$table." WHERE ".$where."";
				return $this->query($data);
		}
		public function update($table,$data,$where){
				$name_db = '';
				foreach($data as $key => $value){
					$name_db .= '`'.$key.'`='." '".mysql_escape_string($value)."',";
				}
				$data = "UPDATE ".$table." SET ".trim($name_db,",")." WHERE ".$where."";
				return $this->query($data);
		}
		public function o_gach($doc_c,$ngang_c,$cuanha1,$cuanha2,$cuanha3,$cuanha4,$cuanha5,$doc,$ngang,$doc_2,$doc_3){
			$o_gach = 'nennha';
			for($j = 0; $j <= $ngang; $j ++){
				for($i = 0;$i <= $doc;$i++){
					if($i == $doc_3 && $i == $doc_c && $j == 0 && $j == $ngang_c){
						$o_gach = 'cottru';	
					}elseif($i == 0 && $i == $doc_c && $j == 0 && $j == $ngang_c){
						$o_gach = 'cottru';	
					}elseif($i == 0 && $i == $doc_c && $j == $ngang && $j == $ngang_c){
						$o_gach = 'cottru';	
					}elseif($i == $doc_3 && $i == $doc_c && $j == $ngang && $j == $ngang_c){
						$o_gach = 'cottru';	
					}elseif($i == 0 && $j > 0 && $j < $ngang && $i == $doc_c && $j == $ngang_c){
						$o_gach = 'gachngang';	
					}elseif($i == $doc_3 && $j > 0 && $j < $ngang && $i == $doc_c && $j == $ngang_c && $j != $cuanha1 && $j != $cuanha2 && $j != $cuanha3 && $j != $cuanha4 && $j != $cuanha5){
						$o_gach = 'gachngang';	
					}elseif($j == 0 && $i > 0 && $i < $doc_3 && $i == $doc_c && $j == $ngang_c){
						$o_gach = 'gachdoc';
					}elseif($j == $ngang && $i > 0 && $i < $doc_3 && $i == $doc_c && $j == $ngang_c){
						$o_gach = 'gachdoc';
					}elseif($i == 1 && $j > 0 && $j < $ngang && $i == $doc_c && $j == $ngang_c){
						$o_gach = 'tuongnhatren';
					}elseif($i == 2 && $j > 0 && $j < $ngang && $i == $doc_c && $j == $ngang_c){
						$o_gach = 'tuongnhaduoi';
					}elseif($i == $doc_2 && $i == $doc_c && $j == $ngang_c  && $j != $cuanha1 && $j != $cuanha2 && $j != $cuanha3 && $j != $cuanha4 && $j != $cuanha5){
						$o_gach = 'tuongnhatren';
					}elseif($i == $doc && $i == $doc_c && $j == $ngang_c  && $j != $cuanha1 && $j != $cuanha2 && $j != $cuanha3 && $j != $cuanha4 && $j != $cuanha5){
						$o_gach = 'tuongnhaduoi';
					}
				}
			}
			return $o_gach;
		}
		// Kết nối hiển thị thể loại
		public function house_tl($user_id,$theloai){
			$nennha_n = "SELECT * FROM gamemini_house_username A join gamemini_house_vatpham B ON A.vatpham=B.id WHERE user_id = '{$user_id}' AND theloai = '{$theloai}'";
			return $this->query($nennha_n);
		}
		public function thaygach($edit,$row,$nengoc,$array_n,$i,$j){
			if($edit == 'divgd'){
				$html_nen = '<div class="'.$nengoc.'">';
					if($row > 0){
						foreach($array_n as $nennha){
							$vitri_nen = explode(':',$nennha[vitri]);
							if($vitri_nen[0] == $i && $vitri_nen[1] == $j){
								$html_nen = '<div class="nennha" style="background: url(/sanbay/house/images/'.$nennha[theloai].'/'.$nennha[name_pic].'.png) no-repeat;">';
							}
						}
					}
			}else{
				$html_nen = '<a class="'.$nengoc.'" href="'.$j.'_'.$i.'.html">';
					if($row > 0){
						foreach($array_n as $nennha){
							$vitri_nen = explode(':',$nennha[vitri]);
							if($vitri_nen[0] == $i && $vitri_nen[1] == $j){
								$html_nen = '<a class="nennha" style="background: url(/sanbay/house/images/'.$nennha[theloai].'/'.$nennha[name_pic].'.png) no-repeat;" href="'.$j.'_'.$i.'.html">';
							}
						}
					}
			}
			return $html_nen;
		}
		public function dichuyen($edit,$row,$nengoc,$array_n,$i,$j,$id_vp,$ngang,$doc){
			$html_nen = '<a class="'.$nengoc.'" href="movie_'.$j.'_'.$i.'_'.$id_vp.'_'.$ngang.'_'.$doc.'.html">';
				if($row > 0){
					foreach($array_n as $nennha){
						$vitri_nen = explode(':',$nennha[vitri]);
						if($vitri_nen[0] == $i && $vitri_nen[1] == $j){
							$html_nen = '<a class="nennha" style="background: url(/sanbay/house/images/'.$nennha[theloai].'/'.$nennha[name_pic].'.png) no-repeat;" href="movie_'.$j.'_'.$i.'_'.$id_vp.'_'.$ngang.'_'.$doc.'.html">';
						}
					}
				}
			return $html_nen;
		}
		public function chono_mua($edit,$row,$nengoc,$array_n,$i,$j,$id_vp){
			$html_nen = '<a class="'.$nengoc.'" href="chon_'.$j.'_'.$i.'_'.$id_vp.'.html">';
				if($row > 0){
					foreach($array_n as $nennha){
						$vitri_nen = explode(':',$nennha[vitri]);
						if($vitri_nen[0] == $i && $vitri_nen[1] == $j){
							$html_nen = '<a class="nennha" style="background: url(/sanbay/house/images/'.$nennha[theloai].'/'.$nennha[name_pic].'.png) no-repeat;" href="chon_'.$j.'_'.$i.'_'.$id_vp.'.html">';
						}
					}
				}
			return $html_nen;
		}
		public function viet_tl($ten){
			$thongtin = '';
			if($ten == 'tuongnhaduoi'){
				$thongtin = 'Có thể đặt ở những chỗ nào là chân tường';
			}elseif($ten == 'tuongnhatren'){
				$thongtin = 'Có thể đặt ở những chỗ là tường ở bên trên';
			}elseif($ten == 'gachdoc'){
				$thongtin = 'Có thể đặt ở những chỗ có ô có gạch xây nhìn xuyên và theo chiều dọc';
			}elseif($ten == 'gachngang'){
				$thongtin = 'Có thể đặt ở những chỗ có ô có gạch xây nhìn xuyên và theo chiều ngang';
			}elseif($ten == 'nennha'){
				$thongtin = 'Dùng dưới sàn nhà';
			}elseif($ten == 'cottru'){
				$thongtin = 'Dùng những chỗ nào có cột nhà';
			}elseif($ten == 'vatpham'){
				$thongtin = 'Để dưới sàn nhà hoặc treo';
			}
			return $thongtin;
		}
		
		public function vatpham($vatpham){
			$vat = "";
			if($vatpham == 1){
				$vat = "giuong";
			}elseif($vatpham == 2){
				$vat = "tu";
			}elseif($vatpham == 3){
				$vat = "dodien";
			}elseif($vatpham == 4){
				$vat = "banghe";
			}elseif($vatpham == 5){
				$vat = "linhtinh";
			}elseif($vatpham == 6){
				$vat = "trangtri";
			}elseif($vatpham == 7){
				$vat = "caycanh";
			}elseif($vatpham == 8){
				$vat = "nennha";
			}elseif($vatpham == 9){
				$vat = "cottru";
			}
			return $vat;
		}
		// Hiển thị vật phẩm nội thất
		
		public function view_vatpham($tt_vp_row,$tt_vp,$i,$j,$theloai){
			$style = ' ';
			if($theloai == 'tuongnhatren'){
				$style = ' style="margin-top: 1px;" ';
			}
			if($tt_vp_row > 0){
				foreach($tt_vp as $item){
					$vitri = explode(':',$item[vitri]);
					if($vitri[0] == $i && $vitri[1] == $j){
						if($item[thuoctinh] == '1'){
							$style = ' style="margin-top: 3px;" ';
						}elseif($item[theloai2] == 'caycanh'){
							$style = ' style="margin-top: -25px;" ';
						}
						$mang[] = '<img'.$style.'src="/sanbay/house/images/'.$item[theloai].'/'.$item[name_pic].'.png"/>';
					}
				}
			}else{
				$mang = 0;
			}
			return $mang;
		}
	}
	$data = new user();
// Kiểm tra user tồn tại hay không
if(!$user_id){
	$textl = 'Khu Nhà Ở';
	require('../../incfiles/head.php');
		echo 'Bạn vui lòng đăng nhập để sử dụng chức năng này';
	require('../../incfiles/end.php');
	exit;
}
?>
<?php
$lerver = "SELECT `lerver` FROM gamemini_house_users WHERE user_id = '{$user_id}'";
	$data->query($lerver);
	$lv_t = $data->fetch_assoc();
	$lever_t = $lv_t['lerver'];
	$ngang = $lv_t['lerver']+13;
	$doc = $lv_t['lerver']+11;
	$doc_2 = $lv_t['lerver']+10;
	$doc_3 = $lv_t['lerver']+9;
	$css = $lv_t['lerver']*24;
	$cuanha1 = floor(($ngang/2)-2);
	$cuanha2 = floor(($ngang/2)-1);
	$cuanha3 = floor(($ngang/2));
	$cuanha4 = floor(($ngang/2)+1);
	$cuanha5 = floor(($ngang/2)+2);

?>