<?php

/**
 * @package     LeVanThinh
 * @link        http://vui1st.tk
 * @copyright   Copyright (C) 2017 Vui1st Community
 * @license     LICENSE.txt (see attached file)
 * @version     VERSION.txt (see attached file)
 * @author      Lê Văn Thịnh
 */

define('_IN_JOHNCMS', 1);

$rootpath = '';
$headmod = 'login';
require('incfiles/core.php');
require('incfiles/head.php');

if (!$user_id) {
	echo '<div class="omenu">Lỗi. Trang chỉ giành cho thành viên</div>';
	
	require('incfiles/end.php');
	exit;
}




echo'<div class="phdr">Đăng xuất tài khoản</div>';
echo'<form method="post"><div class="omenu"><center>Bạn có muốn đăng xuất không?</br><input type="submit" name="EXIT" value="Có"></center></form>';
echo'</div>';


if(isset($_POST['EXIT'])){

session_name('SESID');
session_start();
setcookie('cuid', '');
setcookie('cups', '');
session_destroy();
header('Location: /index.html');
}


require('incfiles/end.php');
?>