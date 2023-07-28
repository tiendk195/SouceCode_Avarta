<?php

/**
 * @package     VinaJohn
 * @link        http://vina4u.pro
 * @copyright   Copyright (C) 2008-2011 JohnCMS Community
 * @license     LICENSE.txt (see attached file)
 * @version     VERSION.txt (see attached file)
 * @author      @Lookari
 */

defined('_IN_JOHNCMS') or die('Error: restricted access');

$textl = $lng['forum'] . ' | ' . $lng['unread'];
$headmod = 'report';
require('../incfiles/head.php');

$checkreport = mysql_fetch_assoc(mysql_query("SELECT * FROM `forum` WHERE `id`='".$id."'"));
if($checkreport['user_id']== $user_id){
		header("Location: index.php?id=".$checkreport['refid']."");
}
echo '<div class="phdr">Báo Cáo Vi Phạm</div><br />';
echo '<div class="gmenu"><b>Đối Tượng</b> : '.$checkreport['from'].'['.$checkreport['user_id'].']';
echo '</div><div class="phdr">Nội dung</div>';
echo '<div class="list1">'.$checkreport['text'].'</div>';
echo '<div class="list2">Lý Do ( Giới hạn ký tự )</div>';
echo '<form action="" method="post">
      <input name="lydo" value="'.$_POST['lydo'].'"/>
	  <input name="submit" type="submit" value="Báo Cáo" /></form>';
	  
	  
$lydo = isset($_POST['lydo']) ? functions::checkin($_POST['lydo']) : ''; 
if(isset($_POST['submit'])){
          if(str_word_count($lydo) >= 1){
        mysql_query("INSERT INTO `baocao` SET
            `user_id`='".$user_id."',
			`to`     = '".$checkreport['user_id']."',
            `lydo` = '" . mysql_real_escape_string($lydo) . "',
            `time` = '".time()."',
			`forum`= '".$id."'
        ");
		header("Location: index.php?id=".$checkreport['refid']."");
               }else{
			   			   echo '<div class="rmenu">Lỗi Vui lòng nhập Lý do</div>';
			   }    
}			   
