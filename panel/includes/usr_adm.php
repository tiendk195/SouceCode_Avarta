<?php

/**
* @package     JohnCMS
* @link        http://johncms.com
* @copyright   Copyright (C) 2008-2011 JohnCMS Community
* @license     LICENSE.txt (see attached file)
* @version     VERSION.txt (see attached file)
* @author      http://johncms.com/about
*/

defined('_IN_JOHNADM') or die('Error: restricted access');
$slv = 0;
$sw = 0;
$adm = 0;
$smd = 0;
$gm = 0;
$ba = 0;
$mc = 0;
$pl = 0;
$tm = 0;

echo '<div class="phdr"><a href="index.php"><b>' . $lng['admin_panel'] . '</b></a> | ' . $lng['administration'] . '</div>';
$req = mysql_query("SELECT * FROM `users` WHERE `rights` = '9' ORDER BY `name` ASC");
if (mysql_num_rows($req)) {
    echo '<div class="omenu"><b><font color="red">Sáng Lập Viên</font></b></div>';
    while (($res = mysql_fetch_assoc($req)) !== false) {
        echo $slv % 2 ? '<div class="menu">' : '<div class="menu">';
        echo functions::display_user($res, array('header' => ('<b>ID:' . $res['id'] . '</b>')));
        echo '</div>';
        ++$slv;
    }
}
$req = mysql_query("SELECT * FROM `users` WHERE `rights` = '8' ORDER BY `name` ASC");
if (mysql_num_rows($req)) {
    echo '<div class="omenu"><b><font color="red">Admin</font></b></div>';
    while (($res = mysql_fetch_assoc($req)) !== false) {
        echo $adm % 2 ? '<div class="menu">' : '<div class="menu">';
        echo functions::display_user($res, array('header' => ('<b>ID:' . $res['id'] . '</b>')));
        echo '</div>';
        ++$adm;
    }
}
$req = mysql_query("SELECT * FROM `users` WHERE `rights` = '7' ORDER BY `name` ASC");
if (mysql_num_rows($req)) {
    echo '<div class="omenu"><b><font color="008000">Smod</font></b></div>';
    while (($res = mysql_fetch_assoc($req)) !== false) {
        echo $smd % 2 ? '<div class="menu">' : '<div class="menu">';
        echo functions::display_user($res, array('header' => ('<b>ID:' . $res['id'] . '</b>')));
        echo '</div>';
        ++$smd;
    }
}
$req = mysql_query("SELECT * FROM `users` WHERE `rights` = '6' ORDER BY `name` ASC");
if (mysql_num_rows($req)) {
    echo '<div class="omenu"><b><font color="gold">Game Master</font></b></div>';
    while (($res = mysql_fetch_assoc($req)) !== false) {
        echo $gm % 2 ? '<div class="menu">' : '<div class="menu">';
        echo functions::display_user($res, array('header' => ('<b>ID:' . $res['id'] . '</b>')));
        echo '</div>';
        ++$gm;
    }
}
$req = mysql_query("SELECT * FROM `users` WHERE `rights` = '5' ORDER BY `name` ASC");
if (mysql_num_rows($req)) {
    echo '<div class="omenu"><b><font color="00CC99">Box Art</font></b></div>';
    while (($res = mysql_fetch_assoc($req)) !== false) {
        echo $ba % 2 ? '<div class="menu">' : '<div class="menu">';
        echo functions::display_user($res, array('header' => ('<b>ID:' . $res['id'] . '</b>')));
        echo '</div>';
        ++$ba;
    }
}
$req = mysql_query("SELECT * FROM `users` WHERE `rights` = '4' ORDER BY `name` ASC");
if (mysql_num_rows($req)) {
    echo '<div class="omenu"><b><font color="ff007f">MC Blog Radio</font></b></div>';
    while (($res = mysql_fetch_assoc($req)) !== false) {
        echo $mc % 2 ? '<div class="menu">' : '<div class="menu">';
        echo functions::display_user($res, array('header' => ('<b>ID:' . $res['id'] . '</b>')));
        echo '</div>';
        ++$mc;
    }
}
$req = mysql_query("SELECT * FROM `users` WHERE `rights` = '3' ORDER BY `name` ASC");
if (mysql_num_rows($req)) {
    echo '<div class="omenu"><b><font color="0000ff">Police MXH</font></b></div>';
    while (($res = mysql_fetch_assoc($req)) !== false) {
        echo $pl % 2 ? '<div class="menu">' : '<div class="menu">';
        echo functions::display_user($res, array('header' => ('<b>ID:' . $res['id'] . '</b>')));
        echo '</div>';
        ++$pl;
    }
}
$req = mysql_query("SELECT * FROM `users` WHERE `rights` = '2' ORDER BY `name` ASC");
if (mysql_num_rows($req)) {
    echo '<div class="omenu"><b><font color="8b008b">Trial Mod</font></b></div>';
    while (($res = mysql_fetch_assoc($req)) !== false) {
        echo $tm % 2 ? '<div class="menu">' : '<div class="menu">';
        echo functions::display_user($res, array('header' => ('<b>ID:' . $res['id'] . '</b>')));
        echo '</div>';
        ++$tm;
    }
}
echo '<div class="phdr">' . $lng['total'] . ': ' . ($sw + $adm + $smd + $mod) . '</div>' .
    '<p><a href="index.php?act=usr">' . $lng['users_list'] . '</a><br />' .
    '<a href="index.php">' . $lng['admin_panel'] . '</a></p>';

?>