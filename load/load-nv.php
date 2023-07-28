<?php
define('_IN_JOHNCMS', 1);

require_once ("../incfiles/core.php");

echo'
<table width="100%" border="0" cellspacing="0"><tbody><tr class="">
<td width="30%"> <div class="gd_new"><div style="overflow: auto;height:100px">
<center>
<div class="gd_con">
<font size="1" color="red"><b>'.$login.'</b></font><br>';
echo'
<div class="gd_khung_'.$datauser['khung'].'">';

echo'
<img src="/avatar/'.$datauser['id'].'.png" style="position: absolute;verticalalign: 0 px;margin:13px 0 0 -23px;"></div></div>
</center></div></div></td><td width="35%"><div class="gd_new"><div style="overflow: auto;height:100px">
<div class="gd_con"><a href="/ruong"><font color="red" size="1"><b><i class="fa fa-briefcase"></i> Rương đồ</b></font></a></div>';
if ($rights>=2) {

echo'<div class="gd_con"><a href="/quanli"><font color="red" size="1"><b><i class="fa fa-archive"></i> Quản lí hệ thống </b></font> </a></div>';
}

echo'<div class="gd_con"><a href="/member/'.$datauser['id'].'.html"><font color="red" size="1"><b><i class="fa fa-user"></i> Thông tin cá nhân</b></font></a></div>
<div class="gd_con"><a href="/users/setting.php"><font color="red" size="1"><b><i class="fa fa-lock"></i> Cài đặt cá nhân</b></font></a></div>
<div class="gd_con"><a href="/users/'.$datauser['id'].'.html"><font color="red" size="1"><b><i class="fa fa-cogs"></i> Thiết lập</b></font> </a> </div>
<div class="gd_con"><a href="/exit.php"><font color="red" size="1"><b><i class="fa fa-sign-out"></i> Đăng xuất</b></font> </a> </div>';


echo'
</div></div></td><td width="35%"> <div class="gd_new"><div style="overflow: auto;height:100px">
<div class="gd_con"><font color="green" size="1"><b><i class="fa fa-money"></i> '.number_format($datauser['xu']).' Xu</b></font></div>
<div class="gd_con"><font color="green" size="1"><b><i class="fa fa-money"></i> '.number_format($datauser['luongkhoa']).' Lượng khóa</b></font></div>
<div class="gd_con"><font color="green" size="1"><b><i class="fa fa-money"></i> '.number_format($datauser['xeng']).' Xèng</b></font></div>
<div class="gd_con"><font color="green" size="1"><b><i class="fa fa-money"></i> '.number_format($datauser['luong']).' Lượng</b></font></div>
<div class="gd_con"><font color="green" size="1"><b><i class="fa fa-star"></i>  '.number_format($datauser['level']).' +'.number_format($datauser['chisolevel']).'%</b></font>
</div></div></div></td></tr></tbody></table>';
?>