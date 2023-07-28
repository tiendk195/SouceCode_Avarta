<?php
define('_IN_JOHNCMS',1);
require_once('../incfiles/core.php');
	require_once('../incfiles/head.php');

if (!$user_id) {
	header('Location: /login.php');
	exit;
}
if ($datauser['rights']<9){
	header('location: /index.php');
	exit;
}

$id = (int)$_GET['id'];
$check  = mysql_num_rows(mysql_query("SELECT * FROM users WHERE id = '$id'"));
$row = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id = '$id'"));
if ($check < 1)
{
	header('Location: /index.php');
	exit;
}
	$textl = 'Cập nhập mật khẩu cho '.$row['name'].' ';
echo '<div class="phdr">'.$textl.'</div>';
	if (isset($_POST['submit'])) {

			$new = trim(functions::checkout($_POST['new']));
			if (strlen($new) > 15) {
				echo '<div class="omenu">Mật khẩu không vượt quá 15 kí tự</div>';
			} else if (empty($new)) {
				echo '<div class="omenu">Không được để trống mật khẩu </div>';
						
			} else {
				$new = md5(md5($new));
				mysql_query("UPDATE `users` SET `password` = '".$new."' WHERE `id` = '".$id."'");
				$_SESSION['password'] = $new;
				echo '<div class="omenu">Cập nhập thành công mật khẩu '.$_POST['new'].' cho '.$row['name'].' <a href="/index.php">Quay lại</a></div>';
					$text = ' '.$login.' vừa cập nhập mật khẩu cho bạn thành '.$_POST['new'].' . Nếu không phải bạn yêu cầu, vui lòng liện hệ Admin ngay lập tức để bảo vệ tài khoản!! ';
$text2 = ' '.$login.' vừa cập nhập mật khẩu cho '.$row['name'].' thành '.$_POST['new'].' .  ';

	mysql_query("INSERT INTO `thongbao` SET
                `id` = '".$id."',
                `user` = '".$id."',
                `text` = '$text',
                `ok` = '1',
                `time` = '" . time() . "'
            ");
		
mysql_query("INSERT INTO `thongbao` SET
                `id` = '1',
                `user` = '1',
                `text` = '$text2',
                `ok` = '1',
                `time` = '" . time() . "'
            ");
			}
		}
	
	echo'<div class="omenu">Vui lòng không thay đổi tùy tiện mật khẩu của người khác</div>';
	echo '<form method="post"><table align="center" width="98%" class="menu">
	
		<tr>
			<td>Mật khẩu mới:</td>
			<td><input type="text" name="new" placeholder="Nhập mật khẩu..."></td>
		</tr>
		<tr><td></td><td><input type="submit" value="Cập nhập" name="submit"></td></tr>
	</table></form>';

	require_once('../incfiles/end.php');

?>