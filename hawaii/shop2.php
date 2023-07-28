<?php
define ('_IN_JOHNCMS', 1);
require ('../incfiles/core.php');
$textl ='Khu Hawaii';
require ('../incfiles/head.php');
?>
<style>
.cathawai {
	background: url('https://i.imgur.com/iHgmaVn.png')repeat;
	height: 141px;
}
.nentroihawai {
	background: url('https://i.imgur.com/Xf3IjOS.png')repeat-x;
	margin: auto;
height: 38px
}
.nenbienhawai {
	background: url('https://i.imgur.com/SFhcEMr.png')repeat-x;
	margin: auto;
height: 65px
}
</style>
<?php


echo'
<div class="phdr">NPC Đặc Biệt</div><table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed;word-wrap: break-word;">
<tbody><tr><td width="75px;" class="blog-avatar"><img src="shopvip.gif"></td><td style="" vertical-align:="" bottom;"=""><table cellpadding="" cellspacing=""><tbody>
<tr><td class="current-blog" rowspan="2" style=""><div class="blog-bg-left"><img src="/giaodien/images/left-blog.png"></div><img src="/images/on.png" alt="online"><font color="red"> <b> NPC Đặc Biệt </b></font><div class="text">';
if ($datauser['kichhoat'] ==0 ){ 
echo'<div class="omenu">Vui lòng kích hoạt để sử dụng chức năng</div>';
} else {
echo'<div class="omenu"><a href="dacbiet.php"><img src="https://i.imgur.com/NcUsZit.gif"> Shop Đặc Biệt </a></div>';
}
echo'</div></td></tr></tbody></table></td></tr></tbody></table>';


require ('../incfiles/end.php');
?>