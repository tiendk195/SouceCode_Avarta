<?php

/**
 * @package     JohnCMS
 * @link        http://johncms.com
 * @copyright   Copyright (C) 2008-2011 JohnCMS Community
 * @license     LICENSE.txt (see attached file)
 * @version     VERSION.txt (see attached file)
 * @author      http://johncms.com/about
 */

defined('_IN_JOHNCMS') or die('Restricted access');

class functions extends core
{
    /**
     * Антифлуд
     * Режимы работы:
     *   1 - Адаптивный
     *   2 - День / Ночь
     *   3 - День
     *   4 - Ночь
     *
     * @return int|bool
     */
    public static function antiflood()
    {
        $default = array(
            'mode'    => 2,
            'day'     => 10,
            'night'   => 30,
            'dayfrom' => 10,
            'dayto'   => 22
        );
        $af = isset(self::$system_set['antiflood']) ? unserialize(self::$system_set['antiflood']) : $default;
        switch ($af['mode']) {
            case 1:
                // Адаптивный режим
                $adm = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `rights` > 0 AND `lastdate` > " . (time() - 300)), 0);
                $limit = $adm > 0 ? $af['day'] : $af['night'];
                break;
            case 3:
                // День
                $limit = $af['day'];
                break;
            case 4:
                // Ночь
                $limit = $af['night'];
                break;
            default:
                // По умолчанию день / ночь
                $c_time = date('G', time());
                $limit = $c_time > $af['day'] && $c_time < $af['night'] ? $af['day'] : $af['night'];
        }
        if (self::$user_rights > 0)
            $limit = 4; // Для Администрации задаем лимит в 4 секунды
        $flood = self::$user_data['lastpost'] + $limit - time();
        if ($flood > 0)
            return $flood;
        else
            return FALSE;
    }

    /**
     * Маскировка ссылок в тексте
     *
     * @param $var
     *
     * @return string
     */
    public static function antilink($var)
    {
        $var = preg_replace('~\\[url=(https?://.+?)\\](.+?)\\[/url\\]|(https?://(www.)?[0-9a-z\.-]+\.[0-9a-z]{2,6}[0-9a-zA-Z/\?\.\~&amp;_=/%-:#]*)~', '###', $var);
        $replace = array(
            '.ru'   => '***',
            '.com'  => '***',
            '.biz'  => '***',
            '.cn'   => '***',
            '.in'   => '***',
            '.net'  => '***',
            '.org'  => '***',
            '.info' => '***',
            '.mobi' => '***',
            '.wen'  => '***',
            '.kmx'  => '***',
            '.h2m'  => '***'
        );

        return strtr($var, $replace);
    }

    /**
     * Фильтрация строк
     *
     * @param string $str
     *
     * @return string
     */
    public static function checkin($str)
    {
        if (function_exists('iconv')) {
            $str = iconv("UTF-8", "UTF-8", $str);
        }

        // Фильтруем невидимые символы
        $str = preg_replace('/[^\P{C}\n]+/u', '', $str);

        return trim($str);
    }


public static function autolink($text) {
function fix($url) {
$img = '/[.](jpg|png|gif|jpeg|bmp)$/i';
if (preg_match($img, $url)) { return ' [img]' . $url . '[/img]'; }
else if (preg_match($file, $url)) { return ' [d]' . $url . '[/d]'; }
else { return ' ' . $url; }
}
$url_match = $url_replace = array();
$url_match[] = '#(^|[\n\t (>.])([a-z][a-z\d+]*:/{2}(?:(?:[a-z0-9\-._~!$&\'(*+,;=:@|]+|%[\dA-F]{2})+|[0-9.]+|\[[a-z0-9.]+:[a-z0-9.]+:[a-z0-9.:]+\])(?::\d*)?(?:/(?:[a-z0-9\-._~!$&\'(*+,;=:@|]+|%[\dA-F]{2})*)*(?:\?(?:[a-z0-9\-._~!$&\'(*+,;=:@/?|]+|%[\dA-F]{2})*)?(?:\#(?:[a-z0-9\-._~!$&\'(*+,;=:@/?|]+|%[\dA-F]{2})*)?)#ieu';
$url_replace[] = "fix('$2')";
return preg_replace($url_match, $url_replace, $text);
}

//// thoi gian tinh ////
public static function thoigiantinh($from, $to = '') {
if (empty($to))
$to = time();
$diff = (int) abs($to - $from);
if ($diff <= 60) {
$since = sprintf('chờ chút');
} elseif ($diff <= 3600) {
$mins = round($diff / 60);
if ($mins <= 1) {
$mins = 1;
}
/* translators: min=minute */
$since = sprintf('%s phút', $mins);
} else if (($diff <= 86400) && ($diff > 3600)) {
$hours = round($diff / 3600);
if ($hours <= 1) {
$hours = 1;
}
$since = sprintf('%s giờ', $hours);
} elseif ($diff >= 86400) {
$days = round($diff / 86400);
if ($days <= 1) {
$days = 1;
}
$since = sprintf('%s ngày', $days);
}
return $since;
}
//
//// thoigian forum ////

public static function pages($url, $start, $total, $kmess)
    {
              $neighbors = 2;
        if ($start >= $total)
            $start = max(0, $total - (($total % $kmess) == 0 ? $kmess : ($total % $kmess)));
        else
            $start = max(0, (int)$start - ((int)$start % (int)$kmess));
        $base_link = '<a class="pagenav" href="' . strtr($url, array('%' => '%%')) . '%d' . '">%s</a>';
        $out[] = $start == 0 ? '' : sprintf($base_link, $start / $kmess, '&lt;&lt;');
        if ($start > $kmess * $neighbors)
            $out[] = sprintf($base_link, 1, '1');
        if ($start > $kmess * ($neighbors + 1))
            $out[] = '<span style="font-weight: bold;">...</span>';
        for ($nCont = $neighbors; $nCont >= 1; $nCont--)
            if ($start >= $kmess * $nCont) {
                $tmpStart = $start - $kmess * $nCont;
                $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
            }
        $out[] = '<span class="currentpage"><b>' . ($start / $kmess + 1) . '</b></span>';
        $tmpMaxPages = (int)(($total - 1) / $kmess) * $kmess;
        for ($nCont = 1; $nCont <= $neighbors; $nCont++)
            if ($start + $kmess * $nCont <= $tmpMaxPages) {
                $tmpStart = $start + $kmess * $nCont;
                $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
            }
        if ($start + $kmess * ($neighbors + 1) < $tmpMaxPages)
            $out[] = '<span style="font-weight: bold;">...</span>';
        if ($start + $kmess * $neighbors < $tmpMaxPages)
            $out[] = sprintf($base_link, $tmpMaxPages / $kmess + 1, $tmpMaxPages / $kmess + 1);
        if ($start + $kmess < $total) {
            $display_page = ($start + $kmess) > $total ? $total : ($start / $kmess + 2);
            $out[] = sprintf($base_link, $display_page, '&gt;&gt;');
        }

        return implode(' ', $out);
    }






    public static function thoigian($from, $to = '') {
            if (empty($to))
            $to = time();
            $diff = (int) abs($to - $from);
        if ($diff <= 60) {
            $since = sprintf('khoảng vài giây trước');
        } elseif ($diff <= 3600) {
                $mins = round($diff / 60);
            if ($mins <= 1) {
                $mins = 1;
            }
        /* translators: min=minute */
                $since = sprintf('%s phút trước', $mins);
        } else if (($diff <= 86400) && ($diff > 3600)) {
                $hours = round($diff / 3600);
            if ($hours <= 1) {
                $hours = 1;
            }
                $since = sprintf('%s giờ trước', $hours);
        } elseif ($diff >= 86400) {
            $days = round($diff / 86400);
            if ($days <= 1) {
              $days = 1;
            }
        $since = sprintf('%s ngày trước', $days);
        }
      return $since;
    }
//// het code ///

public static function phan_trang_bai_viet($url, $start, $total, $kmess)
{
$neighbors = 2;
if ($start >= $total)
$start = max(0, $total - (($total % $kmess) == 0 ? $kmess : ($total % $kmess)));
else
$start = max(0, (int)$start - ((int)$start % (int)$kmess));
$base_link = '<a class="pagenav" href="' . strtr($url, array('%' => '%%')) . 'page-%d' . '">%s</a>';
$out[] = $start == 0 ? '' : sprintf($base_link, $start / $kmess, 'Trang trước');
if ($start > $kmess * $neighbors)
$out[] = sprintf($base_link, 1, '1');
if ($start > $kmess * ($neighbors + 1))
$out[] = '<span style="font-weight: bold;">..</span>';
for ($nCont = $neighbors; $nCont >= 1; $nCont--)
if ($start >= $kmess * $nCont) {
$tmpStart = $start - $kmess * $nCont;
$out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
}
$out[] = '<span class="currentpage"><b>' . ($start / $kmess + 1) . '</b></span>';
$tmpMaxPages = (int)(($total - 1) / $kmess) * $kmess;
for ($nCont = 1; $nCont <= $neighbors; $nCont++)
if ($start + $kmess * $nCont <= $tmpMaxPages) {
$tmpStart = $start + $kmess * $nCont;
$out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
}
if ($start + $kmess * ($neighbors + 1) < $tmpMaxPages)
$out[] = '<span style="font-weight: bold;">..</span>';
if ($start + $kmess * $neighbors < $tmpMaxPages)
$out[] = sprintf($base_link, $tmpMaxPages / $kmess + 1, $tmpMaxPages / $kmess + 1);
if ($start + $kmess < $total) {
$display_page = ($start + $kmess) > $total ? $total : ($start / $kmess + 2);
$out[] = sprintf($base_link, $display_page, 'Trang sau');
}

return implode(' ', $out);
}

public static function phan_trang($url, $start, $total, $kmess)
{
$neighbors = 2;
if ($start >= $total)
$start = max(0, $total - (($total % $kmess) == 0 ? $kmess : ($total % $kmess)));
else
$start = max(0, (int)$start - ((int)$start % (int)$kmess));
$base_link = '<a class="pagenav" href="' . strtr($url, array('%' => '%%')) . 'page/%d' . '">%s</a>';
$out[] = $start == 0 ? '' : sprintf($base_link, $start / $kmess, 'Trang trước');
if ($start > $kmess * $neighbors)
$out[] = sprintf($base_link, 1, '1');
if ($start > $kmess * ($neighbors + 1))
$out[] = '<span style="font-weight: bold;">..</span>';
for ($nCont = $neighbors; $nCont >= 1; $nCont--)
if ($start >= $kmess * $nCont) {
$tmpStart = $start - $kmess * $nCont;
$out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
}
$out[] = '<span class="currentpage"><b>' . ($start / $kmess + 1) . '</b></span>';
$tmpMaxPages = (int)(($total - 1) / $kmess) * $kmess;
for ($nCont = 1; $nCont <= $neighbors; $nCont++)
if ($start + $kmess * $nCont <= $tmpMaxPages) {
$tmpStart = $start + $kmess * $nCont;
$out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
}
if ($start + $kmess * ($neighbors + 1) < $tmpMaxPages)
$out[] = '<span style="font-weight: bold;">..</span>';
if ($start + $kmess * $neighbors < $tmpMaxPages)
$out[] = sprintf($base_link, $tmpMaxPages / $kmess + 1, $tmpMaxPages / $kmess + 1);
if ($start + $kmess < $total) {
$display_page = ($start + $kmess) > $total ? $total : ($start / $kmess + 2);
$out[] = sprintf($base_link, $display_page, 'Trang sau');
}

return implode(' ', $out);
}

/////

/////////////////////////////
public static function phan_trang_team_vina($url, $start, $total, $kmess)
{
$neighbors = 2;
if ($start >= $total)
$start = max(0, $total - (($total % $kmess) == 0 ? $kmess : ($total % $kmess)));
else
$start = max(0, (int)$start - ((int)$start % (int)$kmess));
$base_link = '<a class="pagenav" href="' . strtr($url, array('%' => '%%')) . 'team/%d' . '#teamvina">%s</a>';
$out[] = $start == 0 ? '' : sprintf($base_link, $start / $kmess, 'Trước');
if ($start > $kmess * $neighbors)
$out[] = sprintf($base_link, 1, '1');
if ($start > $kmess * ($neighbors + 1))
$out[] = '<span style="font-weight: bold;">..</span>';
for ($nCont = $neighbors; $nCont >= 1; $nCont--)
if ($start >= $kmess * $nCont) {
$tmpStart = $start - $kmess * $nCont;
$out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
}
$out[] = '<span class="currentpage"><b>' . ($start / $kmess + 1) . '</b></span>';
$tmpMaxPages = (int)(($total - 1) / $kmess) * $kmess;
for ($nCont = 1; $nCont <= $neighbors; $nCont++)
if ($start + $kmess * $nCont <= $tmpMaxPages) {
$tmpStart = $start + $kmess * $nCont;
$out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
}
if ($start + $kmess * ($neighbors + 1) < $tmpMaxPages)
$out[] = '<span style="font-weight: bold;">..</span>';
if ($start + $kmess * $neighbors < $tmpMaxPages)
$out[] = sprintf($base_link, $tmpMaxPages / $kmess + 1, $tmpMaxPages / $kmess + 1);
if ($start + $kmess < $total) {
$display_page = ($start + $kmess) > $total ? $total : ($start / $kmess + 2);
$out[] = sprintf($base_link, $display_page, 'Sau');
}

return implode(' ', $out);
}
public static function toigiaitri($text)
{
	$text = html_entity_decode(trim($text), ENT_QUOTES, 'UTF-8');
	$text=str_replace(" ","-", $text);$text=str_replace("--","-", $text);
	$text=str_replace("@","-",$text);$text=str_replace("/","-",$text);
	$text=str_replace("\\","-",$text);$text=str_replace(":","",$text);
	$text=str_replace("\"","",$text);$text=str_replace("'","",$text);
	$text=str_replace("<","",$text);$text=str_replace(">","",$text);
	$text=str_replace(",","",$text);$text=str_replace("?","",$text);
	$text=str_replace(";","",$text);$text=str_replace(".","",$text);
	$text=str_replace("[","",$text);$text=str_replace("]","",$text);
	$text=str_replace("(","",$text);$text=str_replace(")","",$text);
	$text=str_replace("́","", $text);
	$text=str_replace("̀","", $text);
	$text=str_replace("̃","", $text);
	$text=str_replace("̣","", $text);
	$text=str_replace("̉","", $text);
	$text=str_replace("*","",$text);$text=str_replace("!","",$text);
	$text=str_replace("$","-",$text);$text=str_replace("&","-and-",$text);
	$text=str_replace("%","",$text);$text=str_replace("#","",$text);
	$text=str_replace("^","",$text);$text=str_replace("=","",$text);
	$text=str_replace("+","",$text);$text=str_replace("~","",$text);
	$text=str_replace("`","",$text);$text=str_replace("--","-",$text);
	$text = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $text);
	$text = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $text);
	$text = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $text);
	$text = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $text);
	$text = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $text);
	$text = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $text);
	$text = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $text);
	$text = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $text);
	$text = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $text);
	$text = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $text);
	$text = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $text);
	$text = preg_replace("/(đ)/", 'd', $text);
	$text = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $text);
	$text = preg_replace("/(đ)/", 'd', $text);
	$text = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $text);
	$text = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $text);
	$text = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $text);
	$text = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $text);
	$text = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $text);
	$text = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $text);
	$text = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $text);
	$text = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $text);
	$text = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $text);
	$text = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $text);
	$text = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $text);
	$text = preg_replace("/(Đ)/", 'D', $text);
	$text = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $text);
	$text = preg_replace("/(Đ)/", 'D', $text);
	$text=strtolower($text);
	return $text;
}
////////////////////////


/* CUT WORD */
public static function cutword($str , $len) {
if (mb_strlen($str , 'UTF-8') > $len *5) {
$str = mb_substr($str, 0, $len * 5, 'UTF-8');
$str = mb_substr($str, 0 ,mb_strrpos($str ," " ,'UTF-8'), 'UTF-8' );
$str = '' . strip_tags(implode(' ', array_slice(explode(' ', $str), 0, $len))) . '...';
}
return $str ;
}

public static function display_pagination2($base_url, $start, $max_value, $num_per_page)
    {
        $neighbors = 2;
        if ($start >= $max_value)
            $start = max(0, (int)$max_value - (((int)$max_value % (int)$num_per_page) == 0 ? $num_per_page : ((int)$max_value % (int)$num_per_page)));
        else
            $start = max(0, (int)$start - ((int)$start % (int)$num_per_page));
        $base_link = '<a class="pagenav" href="' . strtr($base_url, array('%' => '%%')) . '_page=%d' . '">%s</a>';
        $out[] = $start == 0 ? '' : sprintf($base_link, $start / $num_per_page, '« ');
        if ($start > $num_per_page * $neighbors)
            $out[] = sprintf($base_link, 1, '1');
        if ($start > $num_per_page * ($neighbors + 1))
            $out[] = '<span style="font-weight: bold;">...</span>';
        for ($nCont = $neighbors; $nCont >= 1; $nCont--)
            if ($start >= $num_per_page * $nCont) {
                $tmpStart = $start - $num_per_page * $nCont;
                $out[] = sprintf($base_link, $tmpStart / $num_per_page + 1, $tmpStart / $num_per_page + 1);
            }
        $out[] = '<span class="currentpage"><b>' . ($start / $num_per_page + 1) . '</b></span>';
        $tmpMaxPages = (int)(($max_value - 1) / $num_per_page) * $num_per_page;
        for ($nCont = 1; $nCont <= $neighbors; $nCont++)
            if ($start + $num_per_page * $nCont <= $tmpMaxPages) {
                $tmpStart = $start + $num_per_page * $nCont;
                $out[] = sprintf($base_link, $tmpStart / $num_per_page + 1, $tmpStart / $num_per_page + 1);
            }
        if ($start + $num_per_page * ($neighbors + 1) < $tmpMaxPages)
            $out[] = '<span style="font-weight: bold;">...</span>';
        if ($start + $num_per_page * $neighbors < $tmpMaxPages)
            $out[] = sprintf($base_link, $tmpMaxPages / $num_per_page + 1, $tmpMaxPages / $num_per_page + 1);
        if ($start + $num_per_page < $max_value) {
            $display_page = ($start + $num_per_page) > $max_value ? $max_value : ($start / $num_per_page + 2);
            $out[] = sprintf($base_link, $display_page, ' »');
        }
        return implode(' ', $out);
    }


    /**
     * Обработка текстов перед выводом на экран
     *
     * @param string $str
     * @param int    $br   Параметр обработки переносов строк
     *                     0 - не обрабатывать (по умолчанию)
     *                     1 - обрабатывать
     *                     2 - вместо переносов строки вставляются пробелы
     * @param int    $tags Параметр обработки тэгов
     *                     0 - не обрабатывать (по умолчанию)
     *                     1 - обрабатывать
     *                     2 - вырезать тэги
     *
     * @return string
     */
    public static function checkout($str, $br = 0, $tags = 0)
    {
        $str = htmlspecialchars(trim($str), ENT_QUOTES);
        if ($br == 1) {
            // Вставляем переносы строк
            $str = nl2br($str);
        } elseif ($br == 2) {
            $str = str_replace("\r\n", ' ', $str);
        }
        if ($tags == 1) {
            $str = bbcode::tags($str);
        } elseif ($tags == 2) {
            $str = bbcode::notags($str);
        }

        return trim($str);
    }

    /**
     * Показ различных счетчиков внизу страницы
     */
    public static function display_counters()
    {
        global $headmod;
        $req = mysql_query("SELECT * FROM `cms_counters` WHERE `switch` = '1' ORDER BY `sort` ASC");
        if (mysql_num_rows($req) > 0) {
            while (($res = mysql_fetch_array($req)) !== FALSE) {
                $link1 = ($res['mode'] == 1 || $res['mode'] == 2) ? $res['link1'] : $res['link2'];
                $link2 = $res['mode'] == 2 ? $res['link1'] : $res['link2'];
                $count = ($headmod == 'mainpage') ? $link1 : $link2;
                if (!empty($count))
                    echo $count;
            }
        }
    }

    /**
     * Показываем дату с учетом сдвига времени
     *
     * @param int $var Время в Unix формате
     *
     * @return string Отформатированное время
     */
    public static function display_date($var)
    {
        $shift = (self::$system_set['timeshift'] + self::$user_set['timeshift']) * 3600;
        if (date('Y', $var) == date('Y', time())) {
            if (date('z', $var + $shift) == date('z', time() + $shift))
                return self::$lng['today'] . ', ' . date("H:i", $var + $shift);
            if (date('z', $var + $shift) == date('z', time() + $shift) - 1)
                return self::$lng['yesterday'] . ', ' . date("H:i", $var + $shift);
        }

        return date("d.m.Y / H:i", $var + $shift);
    }


    /**
     * Сообщения об ошибках
     *
     * @param string|array $error Сообщение об ошибке (или массив с сообщениями)
     * @param string       $link  Необязательная ссылка перехода
     *
     * @return bool|string
     */
    public static function display_error($error = '', $link = '')
    {
        if (!empty($error)) {
            return '<div class="rmenu"><p><b>' . self::$lng['error'] . '!</b><br />' .
                (is_array($error) ? implode('<br />', $error) : $error) . '</p>' .
                (!empty($link) ? '<p>' . $link . '</p>' : '') . '</div>';
        } else {
            return FALSE;
        }
    }

    /**
     * Отображение различных меню
     *
     * @param array  $val
     * @param string $delimiter Разделитель между пунктами
     * @param string $end_space Выводится в конце
     *
     * @return string
     */
    public static function display_menu($val = array(), $delimiter = ' » ', $end_space = '')
    {
        return implode($delimiter, array_diff($val, array(''))) . $end_space;
    }

public static function vina4ucut($str, $len) 
{ 
if (mb_strlen($str, 'UTF-8') > $len*5) { 
$str = mb_substr($str, 0, $len*5, 'UTF-8'); 
$str = mb_substr($str, 0, mb_strrpos($str," ", 'UTF-8'), 'UTF-8'); 
$str = strip_tags(implode(' ',array_slice(explode(' ',$str),0,$len)));
} 
return $str; 
}


    /**
     * Постраничная навигация
     * За основу взята доработанная функция от форума SMF 2.x.x
     *
     * @param string $url
     * @param int    $start
     * @param int    $total
     * @param int    $kmess
     *
     * @return string
     */
     public static function display_pagination($url, $start, $total, $kmess)
    {
        $neighbors = 2;
        if ($start >= $total)
            $start = max(0, $total - (($total % $kmess) == 0 ? $kmess : ($total % $kmess)));
        else
            $start = max(0, (int)$start - ((int)$start % (int)$kmess));
        $base_link = '<a class="pagenav" href="' . strtr($url, array('%' => '%%')) . 'page=%d' . '">%s</a>';
        $out[] = $start == 0 ? '' : sprintf($base_link, $start / $kmess, '&lt;&lt;');
        if ($start > $kmess * $neighbors)
            $out[] = sprintf($base_link, 1, '1');
        if ($start > $kmess * ($neighbors + 1))
            $out[] = '<span style="font-weight: bold;">...</span>';
        for ($nCont = $neighbors; $nCont >= 1; $nCont--)
            if ($start >= $kmess * $nCont) {
                $tmpStart = $start - $kmess * $nCont;
                $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
            }
        $out[] = '<span class="currentpage"><b>' . ($start / $kmess + 1) . '</b></span>';
        $tmpMaxPages = (int)(($total - 1) / $kmess) * $kmess;
        for ($nCont = 1; $nCont <= $neighbors; $nCont++)
            if ($start + $kmess * $nCont <= $tmpMaxPages) {
                $tmpStart = $start + $kmess * $nCont;
                $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
            }
        if ($start + $kmess * ($neighbors + 1) < $tmpMaxPages)
            $out[] = '<span style="font-weight: bold;">...</span>';
        if ($start + $kmess * $neighbors < $tmpMaxPages)
            $out[] = sprintf($base_link, $tmpMaxPages / $kmess + 1, $tmpMaxPages / $kmess + 1);
        if ($start + $kmess < $total) {
            $display_page = ($start + $kmess) > $total ? $total : ($start / $kmess + 2);
            $out[] = sprintf($base_link, $display_page, '&gt;&gt;');
        }

        return implode(' ', $out);
    }


    /**
     * Показываем местоположение пользователя
     *
     * @param int    $user_id
     * @param string $place
     *
     * @return mixed|string
     */
    public static function display_place($user_id = 0, $place = '')
    {
        global $headmod;
        $place = explode(",", $place);
        $placelist = parent::load_lng('places');
        if (array_key_exists($place[0], $placelist)) {
            if ($place[0] == 'profile') {
                if ($place[1] == $user_id) {
                    return '<a href="' . self::$system_set['homeurl'] . '/users/profile.php?user=' . $place[1] . '">' . $placelist['profile_personal'] . '</a>';
                } else {
                    $user = self::get_user($place[1]);

                    return $placelist['profile'] . ': <a href="' . self::$system_set['homeurl'] . '/users/profile.php?user=' . $user['id'] . '">' . $user['name'] . '</a>';
                }
            } elseif ($place[0] == 'online' && isset($headmod) && $headmod == 'online') {
                return $placelist['here'];
            } else {
                return str_replace('#home#', self::$system_set['homeurl'], $placelist[$place[0]]);
            }
        }

        return '<a href="' . self::$system_set['homeurl'] . '/index.php">' . $placelist['homepage'] . '</a>';
    }

    /**
     * Отображения личных данных пользователя
     *
     * @param int   $user Массив запроса в таблицу `users`
     * @param array $arg  Массив параметров отображения
     *                    [lastvisit] (boolean)   Дата и время последнего визита
     *                    [stshide]   (boolean)   Скрыть статус (если есть)
     *                    [iphide]    (boolean)   Скрыть (не показывать) IP и UserAgent
     *                    [iphist]    (boolean)   Показывать ссылку на историю IP
     *
     *                    [header]    (string)    Текст в строке после Ника пользователя
     *                    [body]      (string)    Основной текст, под ником пользователя
     *                    [sub]       (string)    Строка выводится вверху области "sub"
     *                    [footer]    (string)    Строка выводится внизу области "sub"
     *
     * @return string
     */
    public static function display_user($user = 0, $arg = array())
    {
        global $rootpath, $mod;
        $out = FALSE;

        if (!$user['id']) {
            $out = '<b>' . self::$lng['guest'] . '</b>';
            if (!empty($user['name']))
                $out .= ': ' . $user['name'];
            if (!empty($arg['header']))
                $out .= ' ' . $arg['header'];
        } else {
$out .= '<div class="forumtext">';
$out .= '<table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed;word-wrap: break-word;">
<tr><td width="45px;" class="blog-avatar">';

if ($user['gif']) {
$out .= '<img class="avatarforum" src="' . self::$system_set['homeurl'] . '/avatar/gif/'.$user['gif'].'.png" width="50" height="50" alt="'.$user['name'].'"/>';
}
else if($user['hieuung']){
$out .= '<img class="fmod" src="' . self::$system_set['homeurl'] . '/avatar/'.$user['id'].'.png" width="45" height="45" alt="'.$user['name'].'"/>';
} else {

$out .= '<img class="avatarforum" src="' . self::$system_set['homeurl'] . '/avatar/'.$user['id'].'.png" width="45" height="45" alt="'.$user['name'].'"/>';
}
$out .= '</td><td style="vertical-align: bottom;"><table cellpadding="0" cellspacing="0"><tbody>
<tr><td class="current-blog" rowspan="2" style=""><div class="blog-bg-left">';
$out .= '<img src="/giaodien/images/left-blog.png"></div>';
$out .= (time() > $user['lastdate'] + 300 ? '<img style="vertical-align:middle;" title="' . $res['from'] . ' is offline" src="/images/off.png" alt="offline"/> ' : '<img style="vertical-align:middle;" title="' . $res['from'] . ' is online" src="/images/on.png" alt="online"/> ');

$out .= !self::$user_id || self::$user_id == $user['id'] ? '<span
style="color:#2c5170"><b>' . nick($user['id']) . '</b></span>' : '<a href="' . self::$system_set['homeurl'] . '/member/' . $user['id'] . '.html"><span
style="color:#2c5170"><b>' . nick($user['id']) . '</b></span></a>';

$out .= ' ' . $rank[$user['rights']];
$out .= ' ' . $nhan[$user['nhan']];
$out .= '<div class="text">';
         if (!empty($arg['header']))
                $out .= ' ' . $arg['header'];
        }




        if (isset($arg['body']))
            $out .= '<div>' . $arg['body'] . '</div>';
        $ipinf = !isset($arg['iphide']) && self::$user_rights ? 1 : 0;
   
        if ($ipinf || $lastvisit || isset($arg['sub']) && !empty($arg['sub']) || isset($arg['footer'])) {

            if (isset($arg['sub'])) {
                $out .= '<div>' . $arg['sub'] . ' </div>';
            }
            if ($lastvisit) {
                $out .= '<div><span class="gray">' . self::$lng['last_visit'] . ':</span> ' . $lastvisit . '</div>';
            }
            $iphist = '';
            if ($ipinf) {
                $out .= '<div><span class="gray"><small><font color="2c5170">IP: </font></small></span> ';
                $hist = $mod == 'history' ? '&amp;mod=history' : '';
                $ip = long2ip($user['ip']);
                if (self::$user_rights && isset($user['ip_via_proxy']) && $user['ip_via_proxy']) {
                    $out .= '<a href="' . self::$system_set['homeurl'] . '/' . self::$system_set['admp'] . '/index.php?act=search_ip&amp;ip=' . $ip . $hist . '"><small><font color="003366">' . $ip . '</font></small></a>';
                    $out .= ' | ';
                    $out .= '<a href="' . self::$system_set['homeurl'] . '/' . self::$system_set['admp'] . '/index.php?act=search_ip&amp;ip=' . long2ip($user['ip_via_proxy']) . $hist . '"><small><font color="003366">' . long2ip($user['ip_via_proxy']) . '</font></small></a>';
                } elseif (self::$user_rights) {
                    $out .= '<a href="' . self::$system_set['homeurl'] . '/' . self::$system_set['admp'] . '/index.php?act=search_ip&amp;ip=' . $ip . $hist . '"><small><font color="003366">' . $ip . '</font></small></a>';
                } else {
                    $out .= $ip . $iphist;
                }
            if (isset($arg['footer']))
                $out .= $arg['footer'];
}
            
        }
$out .= '</div></div></td>
</tr></tbody></table></td></tr></tbody></table></div>';
        return $out;
    }
function tagsthanhvien($var){
$csdl=mysql_fetch_array(mysql_query("select * from users where name='{$var}'"));
if(mysql_num_rows(mysql_query("select * from users where name='{$var}'"))==0){
$nickname=''.$var.'';
} else {
$nickname='<a href="../member/'.$csdl['id'].'.html">@'.$csdl['name'].'</a>';
}
return $nickname.' ';
}
    /**
     * Форматирование имени файла
     *
     * @param string $name
     *
     * @return string
     */
    public static function format($name)
    {
        $f1 = strrpos($name, ".");
        $f2 = substr($name, $f1 + 1, 999);
        $fname = strtolower($f2);

        return $fname;
    }

    /**
     * Получаем данные пользователя
     *
     * @param int $id Идентификатор пользователя
     *
     * @return array|bool
     */

    /*
    -----------------------------------------------------------------
    Получаем данные пользователя
    -----------------------------------------------------------------
    */

public static function vina4utext($str) { 
    $str = html_entity_decode($str, ENT_QUOTES, 'UTF-8');  
    $str = str_replace("\r\n", ', ', $str); 
    $str = str_replace("'", '', $str); 
    $str = bbcode::notags($str); 
    $str = strtr($str, array( 
    '&' => ' ', 
    '!' => ' ', 
    '@' => ' ', 
    '#' => ' ', 
    '$' => ' ', 
    '^' => ' ', 
    ';' => ' ', 
    '{' => ' ', 
    '}' => ' ', 
    '(' => ' ', 
    ')' => ' ', 
    ':' => ' ', 
    '~' => ' ', 
    '`' => ' ', 
    '%' => ' ', 
    '*' => ' ', 
    '<' => ' ', 
    '>' => ' ', 
    '_' => ' ', 
    '.' => ' ', 
    '?' => ' ', 
    'â€¦' => ' ', 
    '"' => ' ', 
    '[' => ' ', 
    ']' => ' ' 
    )); 
    $str = preg_replace("/, {2,20}/", ', ', $str);  
    $str = preg_replace("/[,]{2,20}/", ',', $str);  
    $str = preg_replace("/[ ]{2,20}/", ' ', $str);  
    $str = trim($str); 
return $str;  
}



    public static function get_user($id = 0)
    {
        if ($id && $id != self::$user_id) {
            $req = mysql_query("SELECT * FROM `users` WHERE `id` = '$id'");
            if (mysql_num_rows($req)) {
                return mysql_fetch_assoc($req);
            } else {
                return FALSE;
            }
        } else {
            return self::$user_data;
        }
    }

    /**
     * Является ли выбранный юзер другом?
     *
     * @param int $id   Идентификатор пользователя, которого проверяем
     *
     * @return bool
     */
    public static function is_friend($id = 0)
    {
        static $user_id = NULL;
        static $return = FALSE;

        if (!self::$user_id && !$id) {
            $return = $query == 2 ? TRUE : FALSE;
        }

        return $return;
    }

    /**
     * Находится ли выбранный пользователь в контактах и игноре?
     *
     * @param int $id Идентификатор пользователя, которого проверяем
     *
     * @return int Результат запроса:
     *             0 - не в контактах
     *             1 - в контактах
     *             2 - в игноре у меня
     */
    public static function is_contact($id = 0)
    {
        static $user_id = NULL;
        static $return = 0;

        if (!self::$user_id && !$id) {
            return 0;
        }

        if (is_null($user_id) || $id != $user_id) {
            $user_id = $id;
            $req_1 = mysql_query("SELECT * FROM `cms_contact` WHERE `user_id` = '" . self::$user_id . "' AND `from_id` = '$id'");
            if (mysql_num_rows($req_1)) {
                $res_1 = mysql_fetch_assoc($req_1);
                if ($res_1['ban'] == 1) {
                    $return = 2;
                } else {
                    $return = 1;
                }
            } else {
                $return = 0;
            }
        }

        return $return;
    }

    /**
     * Проверка на игнор у получателя
     *
     * @param $id
     *
     * @return bool
     */
    public static function is_ignor($id)
    {
        static $user_id = NULL;
        static $return = FALSE;

        if (!self::$user_id && !$id) {
            return FALSE;
        }

        if (is_null($user_id) || $id != $user_id) {
            $user_id = $id;
            $req_2 = mysql_query("SELECT * FROM `cms_contact` WHERE `user_id` = '$id' AND `from_id` = '" . self::$user_id . "'");
            if (mysql_num_rows($req_2)) {
                $res_2 = mysql_fetch_assoc($req_2);
                if ($res_2['ban'] == 1) {
                    $return = TRUE;
                }
            }
        }

        return $return;
    }

    /*
    -----------------------------------------------------------------
    Транслитерация с Русского в латиницу
    -----------------------------------------------------------------
    */
    public static function rus_lat($str)
    {
        $replace = array(
            'а' => 'a',
            'б' => 'b',
            'в' => 'v',
            'г' => 'g',
            'д' => 'd',
            'е' => 'e',
            'ё' => 'e',
            'ж' => 'j',
            'з' => 'z',
            'и' => 'i',
            'й' => 'i',
            'к' => 'k',
            'л' => 'l',
            'м' => 'm',
            'н' => 'n',
            'о' => 'o',
            'п' => 'p',
            'р' => 'r',
            'с' => 's',
            'т' => 't',
            'у' => 'u',
            'ф' => 'f',
            'х' => 'h',
            'ц' => 'c',
            'ч' => 'ch',
            'ш' => 'sh',
            'щ' => 'sch',
            'ъ' => "",
            'ы' => 'y',
            'ь' => "",
            'э' => 'ye',
            'ю' => 'yu',
            'я' => 'ya'
        );

        return strtr($str, $replace);
    }

    /*
    -----------------------------------------------------------------
    Обработка смайлов
    -----------------------------------------------------------------
    */
    public static function smileys($str, $adm = FALSE)
    {
        global $rootpath;
        static $smileys_cache = array();
        if (empty($smileys_cache)) {
            $file = $rootpath . 'files/cache/smileys.dat';
            if (file_exists($file) && ($smileys = file_get_contents($file)) !== FALSE) {
                $smileys_cache = unserialize($smileys);

                return strtr($str, ($adm ? array_merge($smileys_cache['usr'], $smileys_cache['adm']) : $smileys_cache['usr']));
            } else {
                return $str;
            }
        } else {
            return strtr($str, ($adm ? array_merge($smileys_cache['usr'], $smileys_cache['adm']) : $smileys_cache['usr']));
        }
    }

    /*
    -----------------------------------------------------------------
    Функция пересчета на дни, или часы
    -----------------------------------------------------------------
    */
    public static function timecount($var)
    {
        global $lng;
        if ($var < 0) $var = 0;
        $day = ceil($var / 86400);
        if ($var > 345600) return $day . ' ' . $lng['timecount_days'];
        if ($var >= 172800) return $day . ' ' . $lng['timecount_days_r'];
        if ($var >= 86400) return '1 ' . $lng['timecount_day'];

        return date("G:i:s", mktime(0, 0, $var));
    }

    /*
    -----------------------------------------------------------------
    Транслитерация текста
    -----------------------------------------------------------------
    */
    public static function trans($str)
    {
        $replace = array(
            'a'  => 'а',
            'b'  => 'б',
            'v'  => 'в',
            'g'  => 'г',
            'd'  => 'д',
            'e'  => 'е',
            'yo' => 'ё',
            'zh' => 'ж',
            'z'  => 'з',
            'i'  => 'и',
            'j'  => 'й',
            'k'  => 'к',
            'l'  => 'л',
            'm'  => 'м',
            'n'  => 'н',
            'o'  => 'о',
            'p'  => 'п',
            'r'  => 'р',
            's'  => 'с',
            't'  => 'т',
            'u'  => 'у',
            'f'  => 'ф',
            'h'  => 'х',
            'c'  => 'ц',
            'ch' => 'ч',
            'w'  => 'ш',
            'sh' => 'щ',
            'q'  => 'ъ',
            'y'  => 'ы',
            'x'  => 'э',
            'yu' => 'ю',
            'ya' => 'я',
            'A'  => 'А',
            'B'  => 'Б',
            'V'  => 'В',
            'G'  => 'Г',
            'D'  => 'Д',
            'E'  => 'Е',
            'YO' => 'Ё',
            'ZH' => 'Ж',
            'Z'  => 'З',
            'I'  => 'И',
            'J'  => 'Й',
            'K'  => 'К',
            'L'  => 'Л',
            'M'  => 'М',
            'N'  => 'Н',
            'O'  => 'О',
            'P'  => 'П',
            'R'  => 'Р',
            'S'  => 'С',
            'T'  => 'Т',
            'U'  => 'У',
            'F'  => 'Ф',
            'H'  => 'Х',
            'C'  => 'Ц',
            'CH' => 'Ч',
            'W'  => 'Ш',
            'SH' => 'Щ',
            'Q'  => 'Ъ',
            'Y'  => 'Ы',
            'X'  => 'Э',
            'YU' => 'Ю',
            'YA' => 'Я'
        );

        return strtr($str, $replace);
    }

    /*
    -----------------------------------------------------------------
    Старая функция проверки переменных.
    В новых разработках не применять!
    Вместо данной функции использовать checkin()
    -----------------------------------------------------------------
    */
    public static function check($str)
    {
        $str = htmlentities(trim($str), ENT_QUOTES, 'UTF-8');
        $str = self::checkin($str);
        $str = nl2br($str);
        $str = mysql_real_escape_string($str);

        return $str;
    }

public static function create_keywords($story, $separator = ', ', $keyword_count = 20) {
global $set;
$fastquotes = array ("\x22", "\x60", "\t", "\n", "\r", '"', "\\", '\r', '\n', "-", "{", "}", "[", "]" );
$story1 = str_replace( $fastquotes, " ", $story );
$story2 = preg_replace("/[^\w\x7F-\xFF\s]/", " ", $story1);
$story = preg_replace("/ {,1}/", " ", $story2);
$story3 = str_replace( $fastquotes, '', trim( strip_tags( str_replace( '
', ' ', stripslashes( $story1 ) ) ) ) );
$story3 = preg_replace("/ {,1}/", " ", $story3);
$set['meta_desc'] = mb_substr( $story3, 0, 190, 'UTF-8' );
$arr = explode( " ", $story );
foreach ( $arr as $word ) {
if( mb_strlen( $word, 'UTF-8') > 4 ) $newarr[] = $word;
}
$arr = array_count_values( $newarr );
arsort( $arr );
$arr = array_keys( $arr );
$total = count( $arr );
$offset = 0;
$arr = array_slice( $arr, $offset, $keyword_count );
$set['meta_key'] = implode( $separator, $arr );
}

function loadhtml ($url){
$curl = curl_init ();
$header=array();
$header[] = "Accept: text/xml,application/xml,application/xhtml+xml,";
$header[] = "text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5";
$header[] = "Cache-Control: max-age=0";
$header[] = "Connection: close";
$header[] = "Content-type: text/plain";
$header[] = "Keep-Alive: 300";
$header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
$header[] = "Accept-Language: en-us,en;q=0.5";
$header[] = "Pragma: no-cache"; // browsers keep this blank.
curl_setopt ($curl, CURLOPT_URL, $url);
curl_setopt ($curl, CURLOPT_USERAGENT, "Mozilla/17.0");
curl_setopt ($curl, CURLOPT_REFERER, "http://www.google.com.vn");
curl_setopt ($curl, CURLOPT_AUTOREFERER, true);
curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($curl, CURLOPT_HTTPHEADER, $header);
curl_setopt ($curl, CURLOPT_ENCODING, "gzip,deflate");
$data= curl_exec ($curl);
curl_close ($curl);
return $data;
}
function keyw ($str) {
        $url = "http://ajax.googleapis.com/ajax/services/search/web?v=1.0&q=" . urlencode($str) . '&rsz=large&start=1';
        $body = loadhtml ($url);
        $json = json_decode($body);
        for($x=0;$x<count($json->responseData->results);$x++){
        $tt  .= ',' . $json->responseData->results[$x]->title . ',' . $json->responseData->results[$x]->content;
        }
        preg_match_all ('#<b>(.+?)</b>#',$tt,$result);
        foreach (array_unique($result[0]) as $kw) {
              $keyw .=  (preg_replace (array('#<b>#','#</b>#','#\.+#'),array('','',''),$kw)) . ',';
        }
        return $keyw;
}
public static function get_googleapis($key = '')
    {
        global $textl, $set;
        $body = '';
        if (!empty($key)) {
            $googleapis = 'http://ajax.googleapis.com/ajax/services/search/web?v=1.0&q=' . rawurlencode($key) . '&rsz=large&start=1';
        } else {
            $googleapis = 'http://ajax.googleapis.com/ajax/services/search/web?v=1.0&q=' . rawurlencode($textl) . '&rsz=large&start=1';
        }
        if (function_exists('curl_init')) {
        $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $googleapis);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.64 Safari/537.31');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_REFERER, 'http://google.com.vn/');
            $body = curl_exec($ch);
            curl_close($ch);
        }
        if (($json = json_decode($body))) {
        $total = count($json->responseData->results);
            $tag = array();
            for ($i = 0; $i < $total; $i++) {
                $search = mb_substr($json->responseData->results[$i]->titleNoFormatting, 0, 64, 'UTF-8');
            $tag[] = '<a href="' . $set['homeurl'] . '/search/' . urlencode($search) . '">' . $search . '</a>';
            }
            return implode(', ', $tag);
        }
        return 'Có lỗi xảy ra!';
    }
    
    
    
    
    
    


}
