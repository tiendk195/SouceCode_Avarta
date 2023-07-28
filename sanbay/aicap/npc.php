<?php
define('_IN_JOHNCMS', 1);
$textl = 'Ai Cập';
$headmod = 'id_user';
$rootpath='../../';
require_once ("../../incfiles/core.php");
require_once ("../../incfiles/head.php");

echo'<div class="phdr">NPC Pharaoh</div><table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed;word-wrap: break-word;">
<tr><td width="65px;" class="blog-avatar"><img src="https://i.imgur.com/mCO5iVN.gif"></td><td style="vertical-align: bottom;"><table cellpadding="0" cellspacing="0"><tbody>
<tr><td class="current-blog" rowspan="2" style=""><div class="blog-bg-left"><img src="/giaodien/images/left-blog.png"></div><img src="/images/on.png" alt="online"/><font color="red"> <b> NPC Pharaoh</b></font><div class="text"><div class="omenu"><img src="/images/next.png"><font color="red"> Mua vé vào ai cập <img src="/images/vatpham/259.png"> (10 phút) bằng 20 lượng khóa!</font></br><form method="post"><input type="submit" name="vett" value="Mua" /></form></div></div></div></td></tr></tbody></table></td></tr></tbody></table>';



        $timesd=time()+10*60;
        if(isset($_POST['vett'])) {
            if ($datauser['luongkhoa']<20){
                echo'<div class="omenu"><font color="red"><b>Lỗi!!</b></font> Bạn không đủ tiền</div>';
                
            } else {
                echo'<div class="omenu">Mua thành công</div>';
                mysql_query("UPDATE `users` SET `luongkhoa`=`luongkhoa`-'20' WHERE `id`='{$user_id}'");
                mysql_query("UPDATE `vatpham` SET `soluong`=`soluong`+'1',`timesudung`='".$timesd."' WHERE `user_id`='".$user_id."' AND `id_shop`='259'");

            }
        }






require("../../incfiles/end.php");