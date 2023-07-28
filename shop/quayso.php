<?php
define('_IN_JOHNCMS',1);
require('../incfiles/core.php');
$headmod='Khu giải trí';
$textl='Khu quay số';
require('../incfiles/head.php');
echo '<div class="thinhdz">';
if (!$user_id) {
header('Location: /index.php');
}

if ($datauser['kichhoat'] ==0 ){ 
echo'<div class="omenu">Vui lòng kích hoạt để sử dụng chức năng</div></div>';
require('../incfiles/end.php');
exit;
}
echo'<div class="phdr">Khu giải trí &gt; Quay số </div>';
echo'<div class="omenu"><img src="/icon/next.png"><a href="quayso-luongkhoa.html"> Quay số bằng lượng khóa</a></div>';
echo'<div class="omenu"><img src="/icon/next.png"><a href="quayso-xu.html""> Quay số bằng xu</a></div>';
echo'<div class="omenu"><img src="/icon/next.png"><a href="quayso-luong.html""> Quay số bằng lượng</a></div>';
echo'<div class="omenu"><img src="/icon/next.png"><a href="quayso-free.html""> Quay số bằng thẻ free</a></div>';
echo '</div>';
require('../incfiles/end.php');
?>