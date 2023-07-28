<?php

/*
//////////////////////////////////////////////////////////////////
///                                                           ////
///            Code Creat sitemap for JohnCMS                 ////
///            Viết by Quyetdaik                              ////
///            Support: http://giacmovn.com                   ////
///                                                           ////
//////////////////////////////////////////////////////////////////
*/

/*
Tạo một thư mục sitemap up file này vào chạy đường dẫn http://domain.com/sitemap/
Submit file sitemap.xml cho các webmaster tool
Chèn vào robots.txt dòng này: Sitemap: http://domain.com/sitemap.xml
*/

define('_IN_JOHNCMS', 1);

$headmod = 'sitemap';

require('../incfiles/core.php');

require('../incfiles/head.php');

$xml_f = fopen("sitemap_forum.xml", "w+");
$xml_th = fopen("sitemap_thread.xml", "w+");
$xml_index = fopen("sitemap.xml", "w+");

$header_xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xsi:schemaLocation=\"http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\">\n";

$header = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<sitemapindex xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xsi:schemaLocation=\"http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\">\n";

fwrite($xml_f, $header_xml);
fwrite($xml_th, $header_xml);
fwrite($xml_index, $header);

///////////////////

$req_th = mysql_query("SELECT `id`,`text`,`time` FROM `forum` WHERE `type`='t' ORDER BY `time` DESC");

if (!$req_th)
    die("Không thể đọc data");
	
while ($res_th = mysql_fetch_array($req_th)) {
    fwrite($xml_th, "<url>\n<loc>".$set["homeurl"]."/forum/index.php?id=".$res_th["id"]."</loc>\n<lastmod>".date("Y-m-d",$res_th["time"])."</lastmod>\n<changefreq>daily</changefreq>\n<priority>1.0</priority>\n</url>\n");
}

// Nếu bạn đã rewwite url thay ".$set["homeurl"]."/forum/index.php?id=".$res_th["id"]."
// thành func rewite của bạn VD như func của mình là:
//           ".$set["homeurl"]."/forum/".qdk(untags($res_th["text"]))."_".$res_th["id"].".html

mysql_free_result($req_th);

////////////////

        $req_f = mysql_query("SELECT `id`,`text`,`time` FROM `forum` WHERE `type`='f' ORDER BY `realid`");
		
if (!$req_f)
    die("Không thể đọc data");
	
        while ($res_f = mysql_fetch_array($req_f)) {
    fwrite($xml_f, "<url>\n<loc>".$set["homeurl"]."/forum/index.php?id=".$res_f["id"]."</loc>\n<lastmod>".date("Y-m-d",time())."</lastmod>\n<changefreq>daily</changefreq>\n<priority>0.8</priority>\n</url>\n");	
                $req_f1 = mysql_query("SELECT `id`,`text`,`time` FROM `forum` WHERE `type`='r' AND `refid`='".$res_f["id"]."' ORDER BY `realid`");
                while ($res_f1 = mysql_fetch_assoc($req_f1)) {
    fwrite($xml_f, "<url>\n<loc>".$set["homeurl"]."/forum/index.php?id=".$res_f1["id"]."</loc>\n<lastmod>".date("Y-m-d",time())."</lastmod>\n<changefreq>daily</changefreq>\n<priority>0.8</priority>\n</url>\n");
                }
        }

// Nếu bạn đã rewwite url thay ".$set["homeurl"]."/forum/index.php?id=".$res_f["id"]."
// và ".$set["homeurl"]."/forum/index.php?id=".$res_f1["id"]."
// thành func rewite của bạn VD như func của mình là:
//                ".$set["homeurl"]."/forum/".qdk(untags($res_f["text"]))."_".$res_f["id"].".html
//                ".$set["homeurl"]."/forum/".qdk(untags($res_f1["text"]))."_".$res_f1["id"].".html

//////////////

    fwrite($xml_index, "<sitemap>\n<loc>".$set["homeurl"]."/sitemap/sitemap_forum.xml</loc>\n<lastmod>".date("Y-m-d",time())."</lastmod>\n</sitemap>\n<sitemap>\n<loc>".$set["homeurl"]."/sitemap/sitemap_thread.xml</loc>\n<lastmod>".date("Y-m-d",time())."</lastmod>\n</sitemap>\n</sitemapindex>\n");

$footer_xml = "</urlset>";
fwrite($xml_f,$footer_xml);
fwrite($xml_th,$footer_xml);
fclose($xml_f);
fclose($xml_th);
fclose($xml_index);

echo "Tạo thành công! <a href=\"sitemap.xml\" alt=\"Site-Map-Index\" title=\"Site Map Index\">Index</a> <a href=sitemap_forum.xml alt=\"Site-Map-Forum\" title=\"Site Map Forum\">Forum</a> <a href=sitemap_thread.xml alt=\"Site-Map-Thread\" title=\"Site Map Thread\">Toppic</a>";

require('../incfiles/end.php');

?>