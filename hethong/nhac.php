<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');
$textl='Nghe nhạc';
require('../incfiles/head.php');
if (!$user_id) {
header('Location: /index.php');
exit;
}

Echo'<div class="phdr">Nghe nhạc</div>';


echo'<div class="omenu"><a href="?act=danhsach"><img src="/images/vao.png"> Danh sách bài hát</a></div>';
$n22 = mysql_fetch_array(mysql_query("SELECT * FROM `nhac_user` WHERE `users` = '".$user_id."'  "));

IF($datauser['level'] >=2){

echo'<div class="omenu"><b><font color="red"><a href="?act=add">Thêm Nhạc</b></a></font></div>';
}
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
                $query = "select * from nhac where name like '%$search%' ORDER BY `id` DESC LIMIT $start,$kmess";
 
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
					                echo '<div class="omenu">Có '.$num.' kết quả với từ khóa '.$search.' </div>';

 
                    // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array.
                    while ($row = mysql_fetch_assoc($sql)) {

                      echo'<div class="omenu">♫ Bài hát: <font color="blue">'.$row['name'].'</b></font> 
<br>♪ Ca sĩ: <b><font color="ff3399">'.$row['casi'].'</font></b> <br><br>
<center><b><a href="?act=caidat&id='.$row['id'].'"><font color="003366">[ Cài bài hát này ]</font></a></b> ';
if($datauser['rights']>=9 || $datauser['id']==10020) {
	echo'</br><b><a href="?act=edit&id='.$row['id'].'"><font color="003366">[ Sửa hát này ]</font></a></b></br> ';
		echo'<b><a href="?act=del&id='.$row['id'].'"><font color="003366">[ Xóa hát này ]</font></a></b> ';
}
echo'
</center>
</div>';
}
						$total =mysql_result(mysql_query("SELECT COUNT(*) FROM `nhac` WHERE  name like '%$search%'"), 0);

					if($total > $kmess){
echo'<div class="topmenu">'.functions::pages('?search='.$search.'&ok=search&page=', $start, $total, $kmess).'</div>';

}
                } 
                else {
					                echo '<div class="omenu">Không tìm thấy kết quả nào</div>';
                }
            }
        }



switch($act){
case'caidat':
$n22 = mysql_fetch_array(mysql_query("SELECT * FROM `nhac_user` WHERE `users` = '".$user_id."'  "));


$vp=intval($_GET['id']);
$p=mysql_fetch_array(mysql_query("SELECT * FROM `nhac` WHERE `id`='".$vp."'"));

$n=mysql_num_rows(mysql_query("SELECT * FROM `nhac` WHERE `id`='".$vp."'"));
IF($n<1){
Header('Location: /');
Exit;
} 
mysql_query("UPDATE `users` SET `batnhac`= '1'  WHERE `id`='".$user_id."'");
mysql_query("UPDATE `nhac_user` SET  `id_nhac`='".$p['id']."' WHERE `users`='".$user_id."'");

//mysql_query("UPDATE `nhac_user` SET  `name`='".$p['name']."', `casi`='".$p['casi']."', `link`='".$p['link']."' WHERE `users`='".$user_id."'");
Echo'<div class="omenu">Cài đặt thành công! Hãy tận hưởng âm nhạc trên Thitran9x nhé ♫ <a href="/"> Quay về Trang chủ </a></div>';
Require('../incfiles/end.php');
Exit;

break;
default:



////////
$e=mysql_query("SELECT * FROM
`nhac` WHERE `id`!=0 ORDER BY `id` DESC LIMIT $start, $kmess");
while($s=mysql_fetch_array($e)){
$res=mysql_fetch_array(mysql_query("SELECT * FROM `nhac` WHERE `id`='".$s['id']."'"));
echo'<div class="omenu">♫ Bài hát: <font color="blue">'.$res['name'].'</b></font> 
<br>♪ Ca sĩ: <b><font color="ff3399">'.$res['casi'].'</font></b> <br><br>
<center><b><a href="?act=caidat&id='.$res['id'].'"><font color="003366">[ Cài bài hát này ]</font></a></b> ';
if($datauser['rights']>=9 || $datauser['id']==10020) {
	echo'</br><b><a href="?act=edit&id='.$res['id'].'"><font color="003366">[ Sửa hát này ]</font></a></b></br> ';
		echo'<b><a href="?act=del&id='.$res['id'].'"><font color="003366">[ Xóa hát này ]</font></a></b> ';
}
echo'
</center>
</div>';

}
$total=mysql_result(mysql_query("SELECT COUNT(*) FROM `nhac` WHERE `id`!=0"), 0);
IF($total > $kmess){
Echo'<div class="phdr">'.functions::pages('?act=danhsach&loai='.$loai.'&page=', $start, $total, $kmess).'</div>';
}
////////



break;
case'edit':
$vp=intval($_GET['id']);
$p=mysql_fetch_array(mysql_query("SELECT * FROM `nhac` WHERE `id`='".$vp."'"));

$n=mysql_num_rows(mysql_query("SELECT * FROM `nhac` WHERE `id`='".$vp."'"));
IF($n<1){
Header('Location: /');
Exit;
} 
IF(Isset($_POST['edit'])){
	$gia=trim($_POST['link']);
	$gia2=trim($_POST['casi']);
	$gia3=trim($_POST['name']);

IF($datauser['rights'] >= 2 || $datauser['id']==10020 ){
mysql_query("UPDATE `nhac` SET `link`= '".$gia."',`casi`='".mysql_real_escape_string($gia2)."' ,`name` = '".mysql_real_escape_string($gia3)."' WHERE `id`='".$vp."'");
Echo'<div class="omenu"><center><b><font color="red">Bạn đã sửa thành công </font></b></center></div>';
Require('../incfiles/end.php');
Exit;
}Else{
Echo'<div class="omenu"><center><b><font color="red">Thất bại !!<br>Bạn không có quyền này</font></b></center></div>';
}


Require('../incfiles/end.php');
Exit;
}
echo '<form method="post">
<table><tr><input type="text" name="link" placeholder="Nhập link muốn đổi..."> </tr></br>
<tr><input type="text" name="casi" placeholder="Nhập tên ca sĩ..."> </tr></br>
<tr><input type="text" name="name" placeholder="Nhập tên bài hát..."> </tr></br><tr><input type="submit" value="Đổi" name="edit" class="nut"></tr></table>
</form>';

break;

case'add':
if ($datauser['level']>=2){
 
IF(Isset($_POST['add'])){
	$gia=trim($_POST['casi']);
	$idshop=trim($_POST['link']);
	$idshop2=trim($_POST['name']);

	if (empty($gia)) {
Echo'<div class="omenu"><center><b><font color="red">Thêm thất bại !!</font></b></center></div>';
	} else 	if (empty($idshop)) {
Echo'<div class="omenu"><center><b><font color="red">Thêm thất bại !!</font></b></center></div>';
	} else 	if (empty($idshop2)) {
		Echo'<div class="omenu"><center><b><font color="red">Thêm thất bại !!</font></b></center></div>';
	} else {
$bot=''.$login.' vừa thêm bài hát [red]'.$idshop2.' [/red] vào nghe nhạc!';
mysql_query("INSERT INTO `guest` SET `user_id`='2', `text`='" . mysql_real_escape_string($bot) . "', `time`='".time()."'");
mysql_query("INSERT `nhac` SET `name`='".mysql_real_escape_string($idshop2)."' ,`link`= '".$idshop."',`users`= '".$user_id."',`casi`= '".mysql_real_escape_string($gia)."'");
Echo'<div class="omenu"><center><b><font color="red">Bạn đã thêm thành công</font></b></center></div>';
Require('../incfiles/end.php');
Exit;
}
}



echo'<div class="omenu"><h2><a href="/forum/1479.html">Xem cách lấy link .mp3 tại đây</a></h2></br><font color="red"><b>Lưu ý: Link nhạc phải có đuôi .mp3 ở sau</a></br>Ghi rõ tên ca sĩ nhé</font></b></div>';
echo '<form method="post">
<table><tr><input type="text" name="link" placeholder="Nhập link nhạc..."> </tr></br>
<input type="text" name="casi" placeholder="Tên ca sĩ..."> </tr></br>
<input type="text" name="name" placeholder="Tên bài hát..."> </tr></br><tr><input type="submit" value="Thêm" name="add" class="nut"></tr></table>
</form>';
}
break;
case'del':
$vp=intval($_GET['id']);
$p=mysql_fetch_array(mysql_query("SELECT * FROM `nhac` WHERE `id`='".$vp."'"));

$n=mysql_num_rows(mysql_query("SELECT * FROM `nhac` WHERE `id`='".$vp."'"));
IF($n<1){
Header('Location: /');
Exit;
} 

IF($datauser['rights'] >= 2 || $datauser['id']==10020){
	mysql_query("DELETE FROM `nhac` WHERE `id`='".$vp."'");

Echo'<div class="omenu"><center><b><font color="red">Bạn đã xóa thành công </font></b></center></div>';
Require('../incfiles/end.php');
Exit;
}Else{
Echo'<div class="omenu"><center><b><font color="red">Thất bại !!<br>Bạn không có quyền này</font></b></center></div>';
Require('../incfiles/end.php');
Exit;
}

break;
case'xoa':
$n22 = mysql_fetch_array(mysql_query("SELECT * FROM `nhac_user` WHERE `users` = '".$user_id."'  "));
if ($n22<1) {
		echo'<div class="omenu"><a href="?act=del">Bạn chưa cài bài nào mà</a></div>';
} else {
	mysql_query("DELETE FROM `nhac_user` WHERE `users`='".$user_id."'");
mysql_query("UPDATE `users` SET `batnhac`= '0'  WHERE `id`='".$user_id."'");



Echo'<div class="omenu"><center><b><font color="red">Bạn đã xóa thành công </font></b></center></div>';
Require('../incfiles/end.php');
Exit;
}






}

Require('../incfiles/end.php');
?>