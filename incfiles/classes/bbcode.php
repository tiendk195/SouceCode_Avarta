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
function tagtv($var){
$db=mysql_fetch_array(mysql_query("select * from `users` where `id`='{$var}'"));
$check = mysql_result(mysql_query("select count(*) from `users` where `id` = '".$var."'"),0);


if($check == 0){
$ra='@'.$var.'';
} else {
$ra='<a href="../member/'.$db['id'].'.html">'.nick($db['id']).'</a>';
}
return $ra;
}
class bbcode extends core
{
/*
-----------------------------------------------------------------
Обработка тэгов и ссылок
-----------------------------------------------------------------
*/

public static function tags($var) {   
$emoj = array(
              ":kl",

              ":))",
               ":)", ":~",
			   ":B",
			   ":|",
			   "8-)",
			   ":-((",
			   ":$",
			   ":X",
			   ":Z",
			   ":((",
			   ":-|",
			   ":-H",
			   ":P",
			   ":D",
			   ":o",
			   ":(",
			   ":+",
			   "--B", 
			   ":Q", 
			   ":T", 
			   ";P", 
			   ";-D",
			   ";D", 
			   ";O",
			   ";G",
			   "|-)", 
			   ":!",
			   ":L", 
			   ":>", 
			   ":;",
			   ";F", 
			   ";-S",
			   ";?", 
			   ";-X",
			   ":-F",
			   ";8", 
			   ";!", 
			   ";-!",
			   ";XX", 
			   ":-BYE",
			   ":WIPE",
			   ":-DIG",
			   ":handclap",
			   "/-huan",
			   "B-)",
			   ":-L",
			   ":-R",
			   ":-O",
			   "/+huan",
			   "P-(",
			   ":--|",
			   "X-)",
			   ":*",
			   ";-A",
			   "8*", 
			   "/-showlove",
			   "/-rose", 
			   "/-fade", 
			   "/-heart",
			   "/-break",
			   "/-coffee", 
			   "/-cake",
			   "/-li", 
			   "/-bome",
			   "/-bd", 
			   "/-shit",
			   "/-strong",
			   "/-weak",
			   "/-share",
			   "/-v", 
			   "/-thanks",
			   "/-jj", 
			   "/-punch",
			   "/-bad",
			   "/-loveu",
			   "/-no",
			   "/-ok", 
			   "/-flag",
			   ":3",
			   ":v",   "/dui1",
			   "/dui2",			  
			"/dui3",			  "/dui4",			  "/dui5",			  "/dui6",			  "/dui7",			  "/dui8",			  "/dui9",			  "/duia", "/duib","/duic","/duid","/duie","/duif","/likemanht","/byet","/bant","/hit","/cot","/khongt",
			":-1:",":-2:",":-3:",":-4:",":-5:",":-6:",":-7:",":-8:",":-9:",":-10:",":-11:",":-12:",":-13:",
			":-14:",":-15:",":-16:",":-17:",":-18:",":-19:",":-20:",":-21:",":-22:",":-23:",":-24:",":-25:",":-26:",":-27:",":-28:",":-29:",":-30:",
			":-31:",":-32:",":-33:",":-34:",":-35:",":-36:",":-37:",":-38:",":-39:",":-40:",":-41:",":-42:",":-43:",":-44:"
			
			);

		$smil = array(
					  '<img src="/images/smileys/user/emoz/29.gif">',

					  '<img src="/images/smileys/simply/)).gif">',
					  '<img src="/images/smileys/user/emoz/1.gif">',
					  '<img src="/images/smileys/user/emoz/2.gif">',
					  '<img src="/images/smileys/user/emoz/3.gif">',
					  '<img src="/images/smileys/user/emoz/4.gif">',
					  '<img src="/images/smileys/user/emoz/5.gif">',
					  '<img src="/images/smileys/user/emoz/6.gif">',
					  '<img src="/images/smileys/user/emoz/7.gif">',
					  '<img src="/images/smileys/user/emoz/8.gif">',
					  '<img src="/images/smileys/user/emoz/9.gif">',
					  '<img src="/images/smileys/user/emoz/10.gif">',
					  '<img src="/images/smileys/user/emoz/11.gif">',
					  '<img src="/images/smileys/user/emoz/12.gif">',
					  '<img src="/images/smileys/user/emoz/13.gif">',
					  '<img src="/images/smileys/user/emoz/14.gif">',
					  '<img src="/images/smileys/user/emoz/15.gif">',
					  '<img src="/images/smileys/user/emoz/16.gif">',
					  '<img src="/images/smileys/user/emoz/17.gif">',
					  '<img src="/images/smileys/user/emoz/18.gif">',
					  '<img src="/images/smileys/user/emoz/19.gif">',
					  '<img src="/images/smileys/user/emoz/20.gif">',
					  '<img src="/images/smileys/user/emoz/21.gif">',
					  '<img src="/images/smileys/user/emoz/22.gif">',
					  '<img src="/images/smileys/user/emoz/23.gif">',
					  '<img src="/images/smileys/user/emoz/24.gif">',
					  '<img src="/images/smileys/user/emoz/25.gif">',
					  '<img src="/images/smileys/user/emoz/26.gif">',
					  '<img src="/images/smileys/user/emoz/27.gif">',
					  '<img src="/images/smileys/user/emoz/28.gif">',
					  '<img src="/images/smileys/user/emoz/29.gif">',
					  '<img src="/images/smileys/user/emoz/30.gif">',
					  '<img src="/images/smileys/user/emoz/31.gif">',
					  '<img src="/images/smileys/user/emoz/32.gif">',
					  '<img src="/images/smileys/user/emoz/33.gif">',
					  '<img src="/images/smileys/user/emoz/34.gif">',
					  '<img src="/images/smileys/user/emoz/35.gif">',
					  '<img src="/images/smileys/user/emoz/36.gif">',
					  '<img src="/images/smileys/user/emoz/37.gif">',
					  '<img src="/images/smileys/user/emoz/38.gif">',
					  '<img src="/images/smileys/user/emoz/39.gif">',
					  '<img src="/images/smileys/user/emoz/40.gif">',
					  '<img src="/images/smileys/user/emoz/41.gif">',
					  '<img src="/images/smileys/user/emoz/42.gif">',
					  '<img src="/images/smileys/user/emoz/43.gif">',
					  '<img src="/images/smileys/user/emoz/44.gif">',
					  '<img src="/images/smileys/user/emoz/45.gif">',
					  '<img src="/images/smileys/user/emoz/46.gif">',
					  '<img src="/images/smileys/user/emoz/47.gif">',
					  '<img src="/images/smileys/user/emoz/48.gif">',
					  '<img src="/images/smileys/user/emoz/49.gif">',
					  '<img src="/images/smileys/user/emoz/50.gif">',
					  '<img src="/images/smileys/user/emoz/51.gif">',
					  '<img src="/images/smileys/user/emoz/52.gif">',
					  '<img src="/images/smileys/user/emoz/53.gif">',
					  '<img src="/images/smileys/user/emoz/54.gif">',
					  '<img src="/images/smileys/user/emoz/55.gif">',
					  '<img src="/images/smileys/user/emoz/56.gif">',
					  '<img src="/images/smileys/user/emoz/57.gif">',
					  '<img src="/images/smileys/user/emoz/58.gif">',
					  '<img src="/images/smileys/user/emoz/59.gif">',
					  '<img src="/images/smileys/user/emoz/60.gif">',
					  '<img src="/images/smileys/user/emoz/61.gif">',
					  '<img src="/images/smileys/user/emoz/62.gif">',
					  '<img src="/images/smileys/user/emoz/63.gif">',
					  '<img src="/images/smileys/user/emoz/64.gif">',
					  '<img src="/images/smileys/user/emoz/65.gif">',
					  '<img src="/images/smileys/user/emoz/66.gif">',
					  '<img src="/images/smileys/user/emoz/67.gif">',
					  '<img src="/images/smileys/user/emoz/68.gif">',
					  '<img src="/images/smileys/user/emoz/69.gif">',
					  '<img src="/images/smileys/user/emoz/70.gif">',
					  '<img src="/images/smileys/user/emoz/71.gif">',
					  '<img src="/images/smileys/user/emoz/72.gif">',
					  '<img src="/images/smileys/user/emoz/73.gif">',
					  '<img src="/images/smileys/user/emoz/74.gif">',
					  '<img src="/images/smileys/user/emoz/75.gif">',
					  '<img src="/images/smileys/user/emoz/76.gif">',
					  '<img src="/images/smileys/user/emoz/77.gif">',
					  '<img src="/images/smileys/user/emoz/78.gif">',
					  '<img src="/images/smileys/simply/3.png">',
					  '<img src="/images/smileys/simply/v.png">',
		 '<img src="/images/smileys/user/emoz/dui1.png">',
					  '<img src="/images/smileys/user/emoz/dui2.png">',
					  '<img src="/images/smileys/user/emoz/dui3.png">',
					  '<img src="/images/smileys/user/emoz/dui4.png">',
					  '<img src="/images/smileys/user/emoz/dui5.png">',
					  '<img src="/images/smileys/user/emoz/dui6.png">',
					  '<img src="/images/smileys/user/emoz/dui7.png">',
					  '<img src="/images/smileys/user/emoz/dui8.png">',
					  '<img src="/images/smileys/user/emoz/dui9.png">',
					  	  '<img src="/images/smileys/user/emoz/dui10.png">',
						  	  '<img src="/images/smileys/user/emoz/dui11.png">',
					  '<img src="/images/smileys/user/emoz/dui12.png">',
					  '<img src="/images/smileys/user/emoz/dui13.png">',
					  '<img src="/images/smileys/user/emoz/dui14.png">',
					  '<img src="/images/smileys/user/emoz/dui15.png">',
					  		  	  '<img src="/images/smileys/user/emoz/thinh1.png">',
						  	  '<img src="/images/smileys/user/emoz/thinh2.png">',
							    	  '<img src="/images/smileys/user/emoz/thinh3.png">',
						  	  '<img src="/images/smileys/user/emoz/thinh4.png">',
							    	  '<img src="/images/smileys/user/emoz/thinh5.png">',
						  	  '<img src="/images/smileys/user/emoz/thinh6.png">',
							  		  	  '<img src="/images/smileys/user/Sitcker/1.gif"/>',
										  		  	  '<img src="/images/smileys/user/Sitcker/2.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/3.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/4.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/5.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/6.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/7.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/8.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/9.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/10.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/11.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/12.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/13.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/14.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/15.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/16.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/17.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/18.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/19.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/20.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/21.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/22.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/23.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/24.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/25.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/26.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/27.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/28.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/29.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/30.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/31.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/32.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/33.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/34.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/35.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/36.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/37.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/38.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/39.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/40.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/41.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/42.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/43.gif"/>',
							  		  	  '<img src="/images/smileys/user/Sitcker/44.gif"/>',

		);
		$var = str_replace($emoj, $smil, $var);


$var = preg_replace(array ('#@([\w\d]{1,})#se'), array ("''.tagtv('$1').''"), str_replace("]\n", "]", $var));
$var = self::anti_char($var);
        $var = preg_replace('#\[spoiler=(.+?)\]#si', '$2', $var);

$var = preg_replace('#\[youtube](.*?)\[/youtube]#si', '<iframe width="300" height="160" src="http://www.youtube.com/embed/$1?feature=player_detailpage" frameborder="0" allowfullscreen></iframe>', $var);
$var = preg_replace('#\[mp3](.*?)\[/mp3]#si', '<audio loop="true" src="$1" controls="controls" style="width:100%">  </audio>', $var);
$var = preg_replace('#\[img](.+?)\[/img]#is', '<img src="\1" alt="'.bbcode::notags($textl).'"></img>', $var);
$var = preg_replace('#\[img](.*?)\[/img]#si', '<a href="$1"><img src="$1" alt="Ảnh" style="word-wrap : break-word; padding: 1px; border: 1px solid #d5d5d5;"/></a>', $var);
$var = preg_replace('#\[user=(.*?)](.*?)\[/user]#si', '<a href="/member/$1.html">$2</a>', $var);
$var = preg_replace('#\[imggoc](.*?)\[/imggoc]#si', '<a href="$1"><img src="$1" alt="Ảnh"/></a>', $var);
$var = preg_replace('#\[br]#si', '<br/>', $var);
$var = preg_replace('#\[center](.*?)\[/center]#si', '<center>$1</center>', $var);
$var = preg_replace('#\[text](.*?)\[/text]#si', '<textarea>$1</textarea>', $var);
$var = preg_replace('#\[code](.*?)\[/code]#si', '<div class="code">$1</div>', $var);
$var = preg_replace("#\[spoiler=(?:&quot;|\"|')?(.*?)[\"']?(?:&quot;|\"|')?\](.*?)\[\/spoiler\](\r\n?|\n?)#si", "<div style=\"margin: 5px 5px 5px 5px;\"><div class=\"smallfont\" style=\"margin-bottom:2px\"><i>$1</i>: <input type=\"button\" style=\"margin: 0px; padding: 0px; width: 45px; font-size: 10px;\" onClick=\"if (this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display != '') { this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = ''; this.innerText = ''; this.value = 'Hide'; } else { this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = 'none'; this.innerText = ''; this.value = 'Show'; }\" value=\"Show\"></div><div style=\"border: 1px inset; background-color: whitesmoke; margin: 0px; padding: 2px;\"><div style=\"display: none;\">$2</div></div></div>", $var);
$var = preg_replace("#\[spoiler\](.*?)\[\/spoiler\](\r\n?|\n?)#si", "<div style=\"margin: 5px 5px 5px 5px;\"><div class=\"smallfont\" ><input type=\"button\" style=\"margin: 0px; padding: 0px; width: 45px; font-size: 10px;\" onClick=\"if (this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display != '') { this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = ''; this.innerText = ''; this.value = 'Hide'; } else { this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = 'none'; this.innerText = ''; this.value = 'Show'; }\" value=\"Show\"></div><div style=\"border: 1px inset; background-color: whitesmoke; margin: 0px; padding: 2px;\"><div style=\"display: none;\">$1</div></div></div>", $var);


$var = preg_replace('#\[d](.*?)\[/d]#si', '<div class="down"><img src="/images/taive.gif" alt="Tải về"/><br/>$1</div>', $var);
$var = self::parse_time($var);               // Обработка тэга времени
$var = self::highlight_code($var);           // Подсветка кода
$var = preg_replace('#@([\w\d]{2,})#si', '@$1', $var);
$var = self::highlight_url($var);            // Обработка ссылок
$var = self::OLD_highlight_url($var);        // Обработка ссылок в BBcode
$var = self::highlight_bb($var);             // Обработка ссылок
$var = self::smart_search($var);
return $var;
}
public static function anti_char($var) 
{ 
return preg_replace("/4rumvn/i",'***', $var); 
} 

/*
-----------------------------------------------------------------
Обработка времени
-----------------------------------------------------------------
*/
private static function parse_time($var)
{
if (!function_exists('process_time')) {
function process_time($time)
{
$shift = (core::$system_set['timeshift'] + core::$user_set['timeshift']) * 3600;
if($out = strtotime($time)){
return date("d.m.Y / H:i", $out + $shift);
} else {
return false;
}
}
}
return preg_replace(array('#\[time\](.+?)\[\/time\]#se'), array("''.process_time('$1').''"), $var);
}

/*
-----------------------------------------------------------------
Парсинг ссылок
-----------------------------------------------------------------
За основу взята доработанная функция от форума phpBB 3.x.x
-----------------------------------------------------------------
*/
public static function highlight_url($text)
{
if (!function_exists('url_callback')) {
function url_callback($type, $whitespace, $url, $relative_url)
{
$orig_url = $url;
$orig_relative = $relative_url;
$url = htmlspecialchars_decode($url);
$relative_url = htmlspecialchars_decode($relative_url);
$text = '';
$chars = array('<', '>', '"');
$split = false;
foreach ($chars as $char) {
$next_split = strpos($url, $char);
if ($next_split !== false) {
$split = ($split !== false) ? min($split, $next_split) : $next_split;
}
}
if ($split !== false) {
$url = substr($url, 0, $split);
$relative_url = '';
} else if ($relative_url) {
$split = false;
foreach ($chars as $char) {
$next_split = strpos($relative_url, $char);
if ($next_split !== false) {
$split = ($split !== false) ? min($split, $next_split) : $next_split;
}
}
if ($split !== false) {
$relative_url = substr($relative_url, 0, $split);
}
}
$last_char = ($relative_url) ? $relative_url[strlen($relative_url) - 1] : $url[strlen($url) - 1];
switch ($last_char)
{
case '.':
case '?':
case '!':
case ':':
case ',':
$append = $last_char;
if ($relative_url) $relative_url = substr($relative_url, 0, -1);
else $url = substr($url, 0, -1);
break;

default:
$append = '';
break;
}
$short_url = (mb_strlen($url) > 50) ? mb_substr($url, 0, 50) . ' ... ' . mb_substr($url, -5) : $url;
switch ($type)
{
case 1:
$relative_url = preg_replace('/[&?]sid=[0-9a-f]{32}$/', '', preg_replace('/([&?])sid=[0-9a-f]{32}&/', '$1', $relative_url));
$url = $url . '/' . $relative_url;
$text = $relative_url;
if (!$relative_url) {
return $whitespace . $orig_url . '/' . $orig_relative;
}
break;

case 2:
$text = $short_url;
if (!isset(core::$user_set['direct_url']) || !core::$user_set['direct_url']) {
$url = ''. $url.'';
}
break;

case 3:
$url = 'http://' . $url;
$text = $short_url;
if (!isset(core::$user_set['direct_url']) || !core::$user_set['direct_url']) {
$url = ''. $url.'';
}
break;

case 4:
$text = $short_url;
$url = 'mailto:' . $url;
break;
}
$url = htmlspecialchars($url);
$text = htmlspecialchars($text);
$append = htmlspecialchars($append);
return $whitespace . '<a href="' . $url . '">' . $text . '</a>' . $append;
}
}

static $url_match;
static $url_replace;

if (!is_array($url_match)) {
$url_match = $url_replace = array();

// Обработка внутренние ссылки
$url_match[] = '#(^|[\n\t (>.])(' . preg_quote(core::$system_set['homeurl'], '#') . ')/((?:[a-zа-яё0-9\-._~!$&\'(*+,;=:@|]+|%[\dA-F]{2})*(?:/(?:[a-zа-яё0-9\-._~!$&\'(*+,;=:@|]+|%[\dA-F]{2})*)*(?:\?(?:[a-zа-яё0-9\-._~!$&\'(*+,;=:@/?|]+|%[\dA-F]{2})*)?(?:\#(?:[a-zа-яё0-9\-._~!$&\'(*+,;=:@/?|]+|%[\dA-F]{2})*)?)#ieu';
$url_replace[] = "url_callback(1, '\$1', '\$2', '\$3')";

// Обработка обычных ссылок типа xxxx://aaaaa.bbb.cccc. ...
$url_match[] = '#(^|[\n\t (>.])([a-z][a-z\d+]*:/{2}(?:(?:[a-zа-яё0-9\-._~!$&\'(*+,;=:@|]+|%[\dA-F]{2})+|[0-9.]+|\[[a-zа-яё0-9.]+:[a-zа-яё0-9.]+:[a-zа-яё0-9.:]+\])(?::\d*)?(?:/(?:[a-zа-яё0-9\-._~!$&\'(*+,;=:@|]+|%[\dA-F]{2})*)*(?:\?(?:[a-zа-яё0-9\-._~!$&\'(*+,;=:@/?|]+|%[\dA-F]{2})*)?(?:\#(?:[a-zа-яё0-9\-._~!$&\'(*+,;=:@/?|]+|%[\dA-F]{2})*)?)#ieu';
$url_replace[] = "url_callback(2, '\$1', '\$2', '')";

// Обработка сокращенных ссылок, без указания протокола "www.xxxx.yyyy[/zzzz]"
$url_match[] = '#(^|[\n\t (>])(www\.(?:[a-zа-яё0-9\-._~!$&\'(*+,;=:@|]+|%[\dA-F]{2})+(?::\d*)?(?:/(?:[a-zа-яё0-9\-._~!$&\'(*+,;=:@|]+|%[\dA-F]{2})*)*(?:\?(?:[a-zа-яё0-9\-._~!$&\'(*+,;=:@/?|]+|%[\dA-F]{2})*)?(?:\#(?:[a-zа-яё0-9\-._~!$&\'(*+,;=:@/?|]+|%[\dA-F]{2})*)?)#ieu';
$url_replace[] = "url_callback(3, '\$1', '\$2', '')";
}
return preg_replace($url_match, $url_replace, $text);
}

/*
-----------------------------------------------------------------
Удаление bbCode из текста
-----------------------------------------------------------------
*/
static function notags($var = '')
{
$var = preg_replace('#\[color=(.+?)\](.+?)\[/color]#si', '$2', $var);
        $var = preg_replace('#\[spoiler=(.+?)\]#si', '$2', $var);
$var = preg_replace('!\[bg=(#[0-9a-f]{3}|#[0-9a-f]{6}|[a-z\-]+)](.+?)\[/bg]!is', '$2', $var);
$replace = array(
'[small]' => '',
'[/small]' => '',
'[big]' => '',
'[/big]' => '',
'[green]' => '',
'[/green]' => '',
'[red]' => '',
'[/red]' => '',
'[blue]' => '',
'[/blue]' => '',
'[b]' => '',
'[/b]' => '',
'[i]' => '',
'[/i]' => '',
'[u]' => '',
'[/u]' => '',
'[s]' => '',
'[/s]' => '',
'[quote]' => '',
'[/quote]' => '',
'[c]' => '',
'[/c]' => '',
'[*]' => '',
'[/*]' => ''
);
return strtr($var, $replace);
}

/*
-----------------------------------------------------------------
Подсветка кода
-----------------------------------------------------------------
*/
private static function highlight_code($var)
{
if (!function_exists('process_code')) {
function process_code($php)
{
$php = strtr($php, array('<br />' => '', '\\' => 'slash_JOHNCMS'));
$php = html_entity_decode(trim($php), ENT_QUOTES, 'UTF-8');
$php = substr($php, 0, 2) != "<?" ? "<?php\n" . $php . "\n?>" : $php;
$php = highlight_string(stripslashes($php), true);
$php = strtr($php, array('slash_JOHNCMS' => '&#92;', ':' => '&#58;', '[' => '&#91;'));
return '<div class="phpcode">' . $php . '</div>';
}
}
return preg_replace(array('#\[php\](.+?)\[\/php\]#se'), array("''.process_code('$1').''"), str_replace("]\n", "]", $var));
}

/*
-----------------------------------------------------------------
Обработка URL в тэгах BBcode
-----------------------------------------------------------------
*/
private static function OLD_highlight_url($var)
{
if (!function_exists('process_url')) {
function process_url($url)
{
$tmp = parse_url($url[1]);
if ('http://' . $tmp['host'] == core::$system_set['homeurl'] || isset(core::$user_set['direct_url']) && core::$user_set['direct_url']) {
return '<a href="' . $url[1] . '">' . $url[2] . '</a>';
} else {
return '<a href="' . $url[1] . '">' . $url[2] . '</a>';
}
}
}
return preg_replace_callback('~\\[url=(https?://.+?)\\](.+?)\\[/url\\]~', 'process_url', $var);
}

/*
-----------------------------------------------------------------
Обработка bbCode
-----------------------------------------------------------------
*/
private static function highlight_bb($var)
{
// Список поиска
$search = array(
'#\[b](.+?)\[/b]#is', // Жирный
'#\[chudam](.+?)\[/chudam]#is', // Жирный
'#\[font2](.+?)\[/font2]#is', // Жирный
'#\[font3](.+?)\[/font3]#is', // Жирный
'#\[font4](.+?)\[/font4]#is', // Жирный

'#\[i](.+?)\[/i]#is', // Курсив
'#\[u](.+?)\[/u]#is', // Подчеркнутый
'#\[s](.+?)\[/s]#is', // Зачеркнутый
'#\[small](.+?)\[/small]#is', // Маленький шрифт
'#\[big](.+?)\[/big]#is', // Большой шрифт
'#\[red](.+?)\[/red]#is', // Красный
'#\[green](.+?)\[/green]#is', // Зеленый
'#\[blue](.+?)\[/blue]#is', // Синий
'!\[color=(#[0-9a-f]{3}|#[0-9a-f]{6}|[a-z\-]+)](.+?)\[/color]!is', // Цвет шрифта
'!\[bg=(#[0-9a-f]{3}|#[0-9a-f]{6}|[a-z\-]+)](.+?)\[/bg]!is', // Цвет фона
'#\[(quote|c)](.+?)\[/(quote|c)]#is', // Цитата
'#\[trichten](.+?)\[/trichten]#is',
'#\[trichnd](.+?)\[/trichnd]#is',

'#\[\*](.+?)\[/\*]#is' ,// Список
          '#\[spoiler=(.+?)](.+?)\[/spoiler]#is' // Спойлер
        );
// Список замены
$replace = array(
'<span style="font-weight: bold">$1</span>', // Жирный
'<span class="ducnghia_font">$1</span>', // Курсив
'<span class="ducnghia_font2">$1</span>', // Курсив
'<span class="ducnghia_font3">$1</span>', // Курсив
'<span class="ducnghia_font4">$1</span>', // Курсив

'<span style="font-style:italic">$1</span>', // Курсив
'<span style="text-decoration:underline">$1</span>', // Подчеркнутый
'<span style="text-decoration:line-through">$1</span>', // Зачеркнутый
'<span style="font-size:x-small">$1</span>', // Маленький шрифт
'<span style="font-size:large">$1</span>', // Большой шрифт
'<span style="color:red">$1</span>', // Красный
'<span style="color:green">$1</span>', // Зеленый
'<span style="color:blue">$1</span>', // Синий
'<span style="color:$1">$2</span>', // Цвет шрифта
'<span style="background-color:$1">$2</span>', // Цвет фона
'<span class="quote" style="display:block">$2</span>', // Цитата
'<div class="user1">Trích dẫn bài của \1</div>', // trich dan dong 1
'<div class="quote2"> \1</div>', // trich dan dong 2
'<span class="bblist">$1</span>', // Список
            '<div><div class="spoilerhead" style="cursor:pointer;" onclick="var _n=this.parentNode.getElementsByTagName(\'div\')[1];if(_n.style.display==\'none\'){_n.style.display=\'\';}else{_n.style.display=\'none\';}">$1 (+/-)</div><div class="spoilerbody" style="display:none">$2</div></div>' // Спойлер

);
return preg_replace($search, $replace, $var);
}

/*
-----------------------------------------------------------------
Панель кнопок bbCode (для компьютеров)
-----------------------------------------------------------------
*/
public static function auto_bb($form, $field)
{

$colors = array(
'ffffff', 'bcbcbc', '708090', '6c6c6c', '454545',
'fcc9c9', 'fe8c8c', 'fe5e5e', 'fd5b36', 'f82e00',
'ffe1c6', 'ffc998', 'fcad66', 'ff9331', 'ff810f',
'd8ffe0', '92f9a7', '34ff5d', 'b2fb82', '89f641',
'b7e9ec', '56e5ed', '21cad3', '03939b', '039b80',
'cac8e9', '9690ea', '6a60ec', '4866e7', '173bd3',
'f3cafb', 'e287f4', 'c238dd', 'a476af', 'b53dd2'
);
$i = 1;
$font_color = '<table><tr>';
$bg_color = '<table><tr>';
foreach ($colors as $value) {
$font_color .= '<a href="javascript:tag(\'[color=#' . $value . ']\', \'[/color]\', \'\');" style="background-color:#' . $value . ';"></a>';
$bg_color .= '<a href="javascript:tag(\'[bg=#' . $value . ']\', \'[/bg]\', \'\');" style="background-color:#' . $value . ';"></a>';
if (!($i % sqrt(count($colors)))) {
$font_color .= '</tr><tr>';
$bg_color .= '</tr><tr>';
}
++$i;
}
$font_color .= '</tr></table>';
$bg_color .= '</tr></table>';
$smileys = !empty(self::$user_data['smileys']) ? unserialize(self::$user_data['smileys']) : '';
if (!empty($smileys)) {
$res_sm = '';
$bb_smileys = '<small><a href="' . self::$system_set['homeurl'] . '/pages/faq.php?act=my_smileys">Sửa ICon</a></small><br />';
foreach ($smileys as $value)
$res_sm .= '<a href="javascript:tag(\':\', \''.$value.':\', \'\')">:' . $value . ':</a> ';
$bb_smileys .= functions::smileys($res_sm, self::$user_data['rights'] >= 1 ? 1 : 0);
} else {
$bb_smileys = '<small><a href="' . self::$system_set['homeurl'] . '/pages/faq.php?act=smileys">Thêm ICon</a></small>';
}
$out = '<style>
.bb_hide{background-color: rgba(178,178,178,0.5); padding: 5px; border-radius: 3px; border: 1px solid #708090; display: none; overflow: auto; max-width: 300px; max-height: 150px; position: absolute;}
.bb_opt:hover .bb_hide{display: block;}
.bb_color a {float:left;  width:9px; height:9px; margin:1px; border: 1px solid black;}
</style>
<script language="JavaScript" type="text/javascript">
function tag(text1, text2, text3) {
if ((document.selection)) {
document.' . $form . '.' . $field . '.focus();
document.' . $form . '.document.selection.createRange().text = text3+text1+document.' . $form . '.document.selection.createRange().text+text2+text3;
} else if(document.forms[\'' . $form . '\'].elements[\'' . $field . '\'].selectionStart!=undefined) {
var element = document.forms[\'' . $form . '\'].elements[\'' . $field . '\'];
var str = element.value;
var start = element.selectionStart;
var length = element.selectionEnd - element.selectionStart;
element.value = str.substr(0, start) + text3 + text1 + str.substr(start, length) + text2 + text3 + str.substr(start + length);
} else document.' . $form . '.' . $field . '.value += text3+text1+text2+text3;}
  function show_hide(elem) {
              obj = document.getElementById(elem);
              if( obj.style.display == "none" ) {
                obj.style.display = "block";
              } else {
                obj.style.display = "none";
              }
            }
</script>
<a href="javascript:tag(\'[red]\', \'[/red]\', \'\')"><b><font color="red">Chữ đỏ</b></font></a> - 
<a href="javascript:tag(\'[blue]\', \'[/blue]\', \'\')"><b><font color="blue">Chữ xanh</b></font></a> - 
<a href="javascript:tag(\'[spoiler]\', \'[/spoiler]\', \'\')"><b><font color="black">Ẩn hiện</b></font></a> - 
<a href="javascript:tag(\'[b]\', \'[/b]\', \'\')"><b><font color="black">Chữ đậm</b></font></a> - 
<a href="javascript:tag(\'[i]\', \'[/i]\', \'\')"><i><b><font color="black">Chữ nghiêng</b></font></a></i> - 
<a href="javascript:tag(\'[u]\', \'[/u]\', \'\')"><u><b><font color="black">Chữ gạch chân</b></font></a></u> - 
<a href="javascript:tag(\'[s]\', \'[/s]\', \'\')"><s><b><font color="black">Chữ gạch ngang</b></font></a></s> - 
<a href="javascript:tag(\'[php]\', \'[/php]\', \'\')"><b><font color="black">Mã code</b></font></a> - 
<a href="javascript:tag(\'[img]\', \'[/img]\', \'\')"><b><font color="black">Ảnh</b></font></a>


';


return $out . '<br /></br>';
}
private static function smart_search($var)
{
$key = '/s(tu khoa 1|tu khoa 2|..tu khoa n)s/i';
$key = htmlentities($key, ENT_QUOTES, 'UTF-8');
return preg_replace($key, ' <a href="'.self::$system_set['homeurl'].'/search/$1" title="Search: $1" target="_blank">$1</a> ', $var);
}
}