<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');

require('../incfiles/head.php');
if(!$user_id){
header('location: /index.html');
}
if ($datauser['rights']<9 ){ 
header('location: /index.html');
exit;
}
echo'<div class="phdr">Tìm kiếm từ khóa > <a href="t.php">Quay về</a></div>';
echo'<div class="omenu">';
echo'<div align="center">
            <form action = "search.php" method="get">
                Search: <input type="text" name="search" />
                <input type="submit" name="ok" value="search" />
            </form>
        </div>';
		echo'</div>';
  // Nếu người dùng submit form thì thực hiện
        if (isset($_REQUEST['ok'])) 
        {
            // Gán hàm addslashes để chống sql injection
            $search = addslashes($_GET['search']);
 
            // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
            if (empty($search)) {
                echo '<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn chưa nhập từ khóa tìm kiếm</div>';
            } 
            else
            {
                // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
                $query = "select * from shopdo where hienthi=1 and tenvatpham like '%$search%' ORDER BY `id` DESC LIMIT $start,$kmess";
 
                // Kết nối sql
                mysql_connect("localhost", "root", "vertrigo", "basic");
 
                // Thực thi câu truy vấn
                $sql = mysql_query($query);
 
                // Đếm số đong trả về trong sql.
                $num = mysql_num_rows($sql);
 
                // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
                if ($num > 0 && $search != "") 
                {
                    // Dùng $num để đếm số dòng trả về.
					    

 
                    // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array.
                    while ($row = mysql_fetch_assoc($sql)) {

                        echo'  <table border="0" cellpadding="0" cellspacing="0" width="100%" class="profile-info"><tbody><tr><td class="left-info"><img src="/images/shop/'.$row['id'].'.png"></td><td class="right-info"><span>
<font color="ff007f">Vật phẩm:</font>   '.$row[tenvatpham].'  </font></br>
          <font color="ff007f">ID:</font> '.$row['id'].'</font><br>
		  <font color="ff007f">Loại:</font> '.$row['loai'].'</font><br>
		  <font color="ff007f">ID Loại:</font> '.$row['id_loai'].'</font><br>';
		  if ($row['nguoiup']>0) {
		      
		      $nguoiup=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$row['nguoiup']."'"));

		      echo'		  <font color="ff007f">Người up:</font> '.$nguoiup['name'].'</font><br>';
		  }

          echo'</span>';
if($datauser['rights']>=9 ){
echo' <b><a href="iteman.php?act=lay&id='.$row[id].'">Lấy</a>';
        echo' <a href="iteman.php?act=tang&id='.$row[id].'">- Tặng</a>';
    
       echo' <a href="iteman.php?act=edit&id='.$row[id].'">- Sửa</a>';
        echo' <a href="iteman.php?act=xoa&id='.$row[id].'">- Xóa</a>';
  }
          echo'</td></tr></tbody></table>';

                    }
						$total =mysql_result(mysql_query("SELECT COUNT(*) FROM `shopdo` WHERE `hienthi`='1' and tenvatpham like '%$search%'"), 0);

					if($total > $kmess){
echo'<div class="topmenu">'.functions::pages('?search='.$search.'&ok=search&page=', $start, $total, $kmess).'</div>';

}
                } 
                else {
					                echo '<div class="omenu">Không tìm thấy kết quả nào</div>';
                }
            }
        }

require('../incfiles/end.php');
?>