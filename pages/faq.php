<?php

/**
 * @package     JohnCMS
 * @link        http://johncms.com
 * @copyright   Copyright (C) 2008-2011 JohnCMS Community
 * @license     LICENSE.txt (see attached file)
 * @version     VERSION.txt (see attached file)
 * @author      http://johncms.com/about
 */

define('_IN_JOHNCMS', 1);
require('../incfiles/core.php');
$lng_faq = core::load_lng('faq');
$lng_smileys = core::load_lng('smileys');
$textl = 'Biểu cảm';
$headmod = 'faq';
require('../incfiles/head.php');

// Обрабатываем ссылку для возврата
if (empty($_SESSION['ref'])) {
    $_SESSION['ref'] = isset($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : $home;
}

// Сколько смайлов разрешено выбрать пользователям?
$user_smileys = 150;

switch ($act) {
    case 'forum':
        /*
        -----------------------------------------------------------------
        Правила Форума
        -----------------------------------------------------------------
        */
        echo '<div class="phdr"><a href="faq.php"><b>Biểu cảm</b></a> | ' . $lng_faq['forum_rules'] . '</div>' .
             '<div class="menu"><p>' . $lng_faq['forum_rules_text'] . '</p></div>';
        break;

    case 'tags':
        /*
        -----------------------------------------------------------------
        Справка по BBcode
        -----------------------------------------------------------------
        */
        echo '<div class="phdr"><a href="faq.php"><b>Biểu cảm</b></a> | ' . $lng_faq['tags'] . '</div>' .
             '<div class="menu"><p>' .
             '<table cellpadding="3" cellspacing="0">' .
             '<tr><td align="right"><h3>BBcode</h3></td><td></td></tr>' .
             '<tr><td align="right">[php]...[/php]</td><td>' . $lng['tag_code'] . '</td></tr>' .
             '<tr><td align="right"><a href="#">' . $lng['link'] . '</a></td><td>[url=http://site_url]<span style="color:blue">' . $lng_faq['tags_link_name'] . '</span>[/url]</td></tr>' .
             '<tr><td align="right">[b]...[/b]</td><td><b>' . $lng['tag_bold'] . '</b></td></tr>' .
             '<tr><td align="right">[i]...[/i]</td><td><i>' . $lng['tag_italic'] . '</i></td></tr>' .
             '<tr><td align="right">[u]...[/u]</td><td><u>' . $lng['tag_underline'] . '</u></td></tr>' .
             '<tr><td align="right">[s]...[/s]</td><td><strike>' . $lng['tag_strike'] . '</strike></td></tr>' .
             '<tr><td align="right">[red]...[/red]</td><td><span style="color:red">' . $lng['tag_red'] . '</span></td></tr>' .
             '<tr><td align="right">[green]...[/green]</td><td><span style="color:green">' . $lng['tag_green'] . '</span></td></tr>' .
             '<tr><td align="right">[blue]...[/blue]</td><td><span style="color:blue">' . $lng['tag_blue'] . '</span></td></tr>' .
             '<tr><td align="right">[color=]...[/color]</td><td>' . $lng['color_text'] . '</td></tr>' .
             '<tr><td align="right">[bg=][/bg]</td><td>' . $lng['color_bg'] . '</td></tr>' .
             '<tr><td align="right">[c]...[/c]</td><td><span class="quote">' . $lng['tag_quote'] . '</span></td></tr>' .
             '<tr><td align="right" valign="top">[*]...[/*]</td><td><span class="bblist">' . $lng['tag_list'] . '</span></td></tr>' .
             '</table>' .
             '</p></div>';
        break;

    case 'trans':
        /*
        -----------------------------------------------------------------
        Справка по Транслиту
        -----------------------------------------------------------------
        */
        echo '<div class="phdr"><a href="faq.php"><b>Biểu cảm.</b></a> | ' . $lng_faq['translit_help'] . '</div>' .
             '<div class="menu"><p>' . $lng_faq['translit_help_text'] . '</p></div>';
        break;

    case 'smileys':
        /*
        -----------------------------------------------------------------
        Главное меню каталога смайлов
        -----------------------------------------------------------------
        */
        echo '<div class="phdr"><a href="faq.php">Biểu cảm - Cảm xúc</div>';
        if ($user_id) {
            $mycount = !empty($datauser['smileys']) ? count(unserialize($datauser['smileys'])) : '0';
            echo '<div class="topmenu"><a href="faq.php?act=my_smileys">Biểu cảm của bạn</a> (' . $mycount . ' / ' . $user_smileys . ')</div>';
        }
        if ($rights >= 1)
            echo '<div class="gmenu"><a href="faq.php?act=smadm">Biểu cảm cho BQT</a> (' . (int)count(glob($rootpath . 'images/smileys/admin/*.gif')) . ')</div>';
        $dir = glob($rootpath . 'images/smileys/user/*', GLOB_ONLYDIR);
        foreach ($dir as $val) {
            $cat = explode('/', $val);
            $cat = array_pop($cat);
            if (array_key_exists($cat, $lng_smileys)) {
                $smileys_cat[$cat] = $lng_smileys[$cat];
            } else {
                $smileys_cat[$cat] = ucfirst($cat);
            }
        }
        asort($smileys_cat);
        $i = 0;
        foreach ($smileys_cat as $key => $val) {
            echo $i % 2 ? '<div class="menu">' : '<div class="menu">';
            echo '<a href="faq.php?act=smusr&amp;cat=' . urlencode($key) . '">' . htmlspecialchars($val) . '</a>' .
                 ' (' . count(glob($rootpath . 'images/smileys/user/' . $key . '/*.{gif,jpg,png}', GLOB_BRACE)) . ')';
            echo '</div>';
            ++$i;
        }
       
        break;

    case 'smusr':
        /*
        -----------------------------------------------------------------
        Каталог пользовательских Смайлов
        -----------------------------------------------------------------
        */
        $dir = glob($rootpath . 'images/smileys/user/*', GLOB_ONLYDIR);
        foreach ($dir as $val) {
            $val = explode('/', $val);
            $cat_list[] = array_pop($val);
        }
        $cat = isset($_GET['cat']) && in_array(trim($_GET['cat']), $cat_list) ? trim($_GET['cat']) : $cat_list[0];
        $smileys = glob($rootpath . 'images/smileys/user/' . $cat . '/*.{gif,jpg,png}', GLOB_BRACE);
        $total = count($smileys);
        $end = $start + $kmess;
        if ($end > $total) $end = $total;
        echo '<div class="phdr"><a href="faq.php?act=smileys"><b>' . $lng['smileys'] . '</b></a> | ' .
             (array_key_exists($cat, $lng_smileys) ? $lng_smileys[$cat] : ucfirst(htmlspecialchars($cat))) .
             '</div>';
        if ($total) {
            if ($user_id) {
                $user_sm = isset($datauser['smileys']) ? unserialize($datauser['smileys']) : '';
                if (!is_array($user_sm)) $user_sm = array();
                echo '<div class="topmenu">' .
                     '<a href="faq.php?act=my_smileys">' . $lng['my_smileys'] . '</a>  (' . count($user_sm) . ' / ' . $user_smileys . ')</div>' .
                     '<form action="faq.php?act=set_my_sm&amp;cat=' . $cat . '&amp;start=' . $start . '" method="post">';
            }
            if ($total > $kmess) echo '<div class="topmenu">' . functions::display_pagination('faq.php?act=smusr&amp;cat=' . urlencode($cat) . '&amp;page=', $start, $total, $kmess) . '</div>';
            for ($i = $start; $i < $end; $i++) {
                $smile = preg_replace('#^(.*?).(gif|jpg|png)$#isU', '$1', basename($smileys[$i], 1));
                echo $i % 2 ? '<div class="menu">' : '<div class="menu">';
                if ($user_id) echo (in_array($smile, $user_sm) ? '' : '<input type="checkbox" name="add_sm[]" value="' . $smile . '" />&#160;');
                echo '<img src="../images/smileys/user/' . $cat . '/' . basename($smileys[$i]) . '" alt="" />&#160;:' . $smile . ': ' . $lng['lng_or'] . ' :' . functions::trans($smile) . ':';
                echo '</div>';
            }
        if ($user_id) echo '<div class="gmenu"><input type="submit" name="add" value=" ' . $lng['add'] . ' "/></div></form>';
        } else {
            echo '<div class="menu"><p>' . $lng['list_empty'] . '</p></div>';
        }
        echo '<div class="phdr">' . $lng['total'] . ': ' . $total . '</div>';
        if ($total > $kmess) {
            echo '<div class="topmenu">' . functions::display_pagination('faq.php?act=smusr&amp;cat=' . urlencode($cat) . '&amp;page=', $start, $total, $kmess) . '</div>';
        }
        
        break;

    case 'smadm':
        /*
        -----------------------------------------------------------------
        Каталог Админских Смайлов
        -----------------------------------------------------------------
        */
        if ($rights < 1) {
            echo functions::display_error($lng['error_wrong_data'], '<a href="faq.php?act=smileys">' . $lng['back'] . '</a>');
            require('../incfiles/end.php');
            exit;
        }
        echo '<div class="phdr"><a href="faq.php?act=smileys"><b>' . $lng['smileys'] . '</b></a> | ' . $lng_faq['smileys_adm'] . '</div>';
        if ($user_id) {
            $user_sm = unserialize($datauser['smileys']);
            if (!is_array($user_sm))
                $user_sm = array();
            echo '<div class="topmenu"><a href="faq.php?act=my_smileys">' . $lng['my_smileys'] . '</a>  (' . count($user_sm) . ' / ' . $user_smileys . ')</div>' .
                 '<form action="faq.php?act=set_my_sm&amp;start=' . $start . '&amp;adm" method="post">';
        }
        $array = array();
        $dir = opendir('../images/smileys/admin');
        while (($file = readdir($dir)) !== false) {
            if (($file != '.') && ($file != "..") && ($file != "name.dat") && ($file != ".svn") && ($file != "index.php")) {
                $array[] = $file;
            }
        }
        closedir($dir);
        $total = count($array);
        if ($total > 0) {
            $end = $start + $kmess;
            if ($end > $total)
                $end = $total;
            for ($i = $start; $i < $end; $i++) {
                $smile = preg_replace('#^(.*?).(gif|jpg|png)$#isU', '$1', $array[$i], 1);
                echo $i % 2 ? '<div class="menu">' : '<div class="menu">';
                if ($user_id)
                    $smileys = (in_array($smile, $user_sm) ? ''
                            : '<input type="checkbox" name="add_sm[]" value="' . $smile . '" />&#160;');
                echo $smileys . '<img src="../images/smileys/admin/' . $array[$i] . '" alt="" /> - :' . $smile . ': ' . $lng['lng_or'] . ' :' . functions::trans($smile) . ':</div>';
            }
        } else {
            echo '<div class="menu"><p>' . $lng['list_empty'] . '</p></div>';
        }
        if ($user_id)
            echo '<div class="menu"><input type="submit" name="add" value=" ' . $lng['add'] . ' "/></div></form>';
        echo '<div class="phdr">' . $lng['total'] . ': ' . $total . '</div>';
        if ($total > $kmess) {
            echo '<div class="topmenu">' . functions::display_pagination('faq.php?act=smadm&amp;page=', $start, $total, $kmess) . '</div>';
            echo '<p><form action="faq.php?act=smadm" method="post">' .
                 '<input type="text" name="page" size="2"/>' .
                 '<input type="submit" value="' . $lng['to_page'] . ' &gt;&gt;"/></form></p>';
        }
        echo '<p><a href="' . $_SESSION['ref'] . '">' . $lng['back'] . '</a></p>';
        break;

    case 'my_smileys':
        /*
        -----------------------------------------------------------------
        Список своих смайлов
        -----------------------------------------------------------------
        */
        
        echo '<div class="phdr"><a href="faq.php?act=smileys"><b>' . $lng['smileys'] . '</b></a> | ' . $lng['my_smileys'] . '</div>';
        $smileys = !empty($datauser['smileys']) ? unserialize($datauser['smileys']) : array();
        $total = count($smileys);
        if ($total)
            echo '<form action="faq.php?act=set_my_sm&amp;start=' . $start . '" method="post">';
        if ($total > $kmess) {
            $smileys = array_chunk($smileys, $kmess, TRUE);
            if ($start) {
                $key = ($start - $start % $kmess) / $kmess;
                $smileys_view = $smileys[$key];
                if (!count($smileys_view))
                    $smileys_view = $smileys[0];
                $smileys = $smileys_view;
            } else {
                $smileys = $smileys[0];
            }
        }
        $i = 0;
        foreach ($smileys as $value) {
            $smile = ':' . $value . ':';
            echo ($i % 2 ? '<div class="menu">' : '<div class="menu">') .
                 '<input type="checkbox" name="delete_sm[]" value="' . $value . '" />&#160;' .
                 functions::smileys($smile, $rights >= 1 ? 1 : 0) . '&#160;' . $smile . ' ' . $lng['lng_or'] . ' ' . functions::trans($smile) . '</div>';
            $i++;
        }
        if ($total) {
            echo '<div class="rmenu"><input type="submit" name="delete" value=" ' . $lng['delete'] . ' "/></div></form>';
        } else {
            echo '<div class="menu"><p>' . $lng['list_empty'] . '<br /><a href="faq.php?act=smileys">' . $lng['add_smileys'] . '</a></p></div>';
        }
        echo '<div class="phdr">' . $lng['total'] . ': ' . $total . ' / ' . $user_smileys . '</div>';
        if ($total > $kmess)
            echo '<div class="topmenu">' . functions::display_pagination('faq.php?act=my_smileys&amp;page=', $start, $total, $kmess) . '</div>';
        echo '<p>' . ($total ? '<a href="faq.php?act=set_my_sm&amp;clean">' . $lng['clear'] . '</a><br />'
                : '') . '<a href="' . $_SESSION['ref'] . '">' . $lng['back'] . '</a></p>';
        break;

    case 'set_my_sm':
        /*
        -----------------------------------------------------------------
        Настраиваем список своих смайлов
        -----------------------------------------------------------------
        */
        $adm = isset($_GET['adm']);
        $add = isset($_POST['add']);
        $delete = isset($_POST['delete']);
        $cat = isset($_GET['cat']) ? trim($_GET['cat']) : '';
        if (!$user_id || ($adm && !$rights) || ($add && !$adm && !$cat) || ($delete && !$_POST['delete_sm']) || ($add && !$_POST['add_sm'])) {
            echo functions::display_error($lng['error_wrong_data'], '<a href="faq.php?act=smileys">' . $lng['smileys'] . '</a>');
            require('../incfiles/end.php');
            exit;
        }
        $smileys = unserialize($datauser['smileys']);
        if (!is_array($smileys))
            $smileys = array();
        if ($delete)
            $smileys = array_diff($smileys, $_POST['delete_sm']);
        if ($add) {
            $add_sm = $_POST['add_sm'];
            $smileys = array_unique(array_merge($smileys, $add_sm));
        }
        if (isset($_GET['clean']))
            $smileys = array();
        if (count($smileys) > $user_smileys) {
            $smileys = array_chunk($smileys, $user_smileys, TRUE);
            $smileys = $smileys[0];
        }
        mysql_query("UPDATE `users` SET `smileys` = '" . mysql_real_escape_string(serialize($smileys)) . "' WHERE `id` = '$user_id'");
        if ($delete || isset($_GET['clean'])) {
            header('location: faq.php?act=my_smileys&start=' . $start . '');
        } else {
            header('location: faq.php?act=' . ($adm ? 'smadm' : 'smusr&cat=' . urlencode($cat) . '') . '&start=' . $start . '');
        }
        break;

    default:
        /*
        -----------------------------------------------------------------
        Главное меню FAQ
        -----------------------------------------------------------------
        */
        echo '<div class="phdr"><b>Biểu cảm</b></div>' .
             '<div class="omenu"><a href="http://mteen.net/mod/noiquy.php">Nội quy</a></div>' .
             '<div class="omenu"><a href="faq.php?act=tags">Mã bbcode</a></div>';
            echo '<div class="omenu"><a href="faq.php?act=smileys">Biểu cảm</a></div>';
            echo '<div class="phdr"></div>';
}

require('../incfiles/end.php');