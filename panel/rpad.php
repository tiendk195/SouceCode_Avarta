<?php

/**
* @package     VinaJohn
* @link        http://vina4u.pro
* @copyright   Copyright (C) 2008-2011 JohnCMS Community
* @license     LICENSE.txt (see attached file)
* @version     VERSION.txt (see attached file)
* @author      Lookari
*/

defined('_IN_JOHNADM') or die('Error: restricted access');
echo 'die';
// Проверяем права доступа
if ($rights < 9) {
    header('Location: http://johncms.com/?err');
    exit;
}


echo '<div class="phdr">Báo Cáo</div>';
$req = mysql_query("SELECT * FROM `baocao` WHERE `kiemtra`='1' ORDERBY time DESC");
$i = 0;
while($res = mysql_fetch_array($req)){
echo $i % 2 ? '<div class="list2">' : '<div class="list1">';
echo $i.'.<br />-Lý do : '.$res['lydo'].'.<br /><a href="../forum/index.php?act=post&id='.$res['forum'].'">Xem</a>  <a href="../users/profile.php?act=ban&mod=do&user='.$res['to'].'">Xử lý</a>';
echo '</div>';
$i++;
}


}