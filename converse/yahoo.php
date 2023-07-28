<?php

if (preg_match('|#yahoo|',$msg)) {

if($user['tien'] < 200) {

$yahoo = '@'.$login.' không đủ tiền để xem Avatar trong Yahoo! Massage đâu nhé.! :d';

} else {

 mysql_query("UPDATE user SET tien=tien+200 WHERE id=3 LIMIT 1");

 mysql_query("UPDATE user SET tien=tien-200 WHERE id='$user_id' LIMIT 1");

function avatar($wapnha){

 $wapnha=str_replace("#yahoo ","",$wapnha);

 $wapnha=str_replace("#yahoo","",$wapnha);



 $zingnet = strtolower($wapnha);

return $wapnha;

}


				$yahoo = 'http://img.msg.yahoo.com/avatar.php?yids=' . avatar($msg) . '';

                        $yahoo = 'Avatar [b]' . avatar($msg) . '[/b] trong Yahoo! Massage[br][img='.$yahoo.'][br][br][b]BOT Yahoo![/b] trừ [b]'.$login.'[/b] 200'.$wap['tien'].' :d';
		}

}

		?>