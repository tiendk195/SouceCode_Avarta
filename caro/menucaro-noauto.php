<?php
if($_GET['id']){
                echo'<div class="menu list-bottom hot">';
	$sql='SELECT c.*, x.name AS xname, x.rights AS xrights, o.name AS oname, o.rights AS orights FROM carodata c
		LEFT JOIN users x ON c.px = x.id
		LEFT JOIN users o ON c.po = o.id
		WHERE c.id='.$_GET['id'];
	$result=mysql_query($sql);
	if(mysql_numrows($result)>0) {
		$data1=explode(":",mysql_result($result,0,'data1'));
		$data1f=mysql_result($result,0,'data1');
		$data2f=mysql_result($result,0,'data2');
		$data2=explode(":",mysql_result($result,0,'data2'));
		$socot=mysql_result($result,0,'socot');
		$hl=explode(":",mysql_result($result,0,'hl'));
		if(mysql_result($result,0,'px')==$datauser['id']){$u='x'; $o='o';} elseif(mysql_result($result,0,'po')==$datauser['id']) {$u='o'; $o='x';} else {$view=1;}
		if(mysql_result($result,0,'turn')==0 && mysql_result($result,0,'tinhtrang')==0 && mysql_result($result,0,'po')==$datauser['id']){
		?>
		<form style="display:inline;" action="/caro/?id=<?php echo $_GET['id']; ?>" method="post" id="ttt">
		<input type="hidden" name="ap" value="1"><input type="submit" name="ttt" id="ttt" value="Chấp nhận thách đấu" />
		</form>
		<form style="display:inline;" action="caroaction.php?id=<?php echo $_GET['id']; ?>" method="post" id="ttt">
		<input type="hidden" name="dn" value="1"><input type="submit" name="ttt" id="ttt" value="Từ chối" /><br>
		</form>
		<?php } if(mysql_result($result,0,'turn')==0 && mysql_result($result,0,'tinhtrang')==0 && mysql_result($result,0,'px')==$datauser['id'] && mysql_result($result,0,'po')!=0){
		echo 'Đang chờ chấp thuận của đối thủ...<br>';
		}
		if(mysql_result($result,0,'turn')==0 && mysql_result($result,0,'tinhtrang')==0 && mysql_result($result,0,'po')==0 && mysql_result($result,0,'px')!=$datauser['id'] && $datauser['id'] != ANONYMOUS){ ?>
		<form style="display:inline;" action="/caro/?id=<?php echo $_GET['id']; ?>" method="post" id="ttt">
		<input type="hidden" name="jn" value="1"><input type="submit" name="ttt" id="ttt" value="Tham gia" /><br>
		</form>
		<?php }
		if(mysql_result($result,0,'turn')==0 && mysql_result($result,0,'tinhtrang')==0 && mysql_result($result,0,'po')==0 && mysql_result($result,0,'px')==$datauser['id']) {
		echo '<b>Đang chờ đối thủ tham gia...</b><br>';		
		}
		if(mysql_result($result,0,'turn')==0 && mysql_result($result,0,'px')==$datauser['id'] && $datauser['id'] != ANONYMOUS){ ?>
		<form style="display:inline;" action="caroaction.php?id=<?php echo $_GET['id']; ?>" method="post" id="ttt">
		<input type="hidden" name="cn" value="1"><input type="submit" name="ttt" id="ttt" value="Hủy bàn" /><br>
		</form>
		<?php }
		if(mysql_result($result,0,'winner')==0 && mysql_result($result,0,'turn')!=0){
		if($view!=1){
		if(mysql_result($result,0,'turn')==$datauser['id'] && $view!=1){echo 'Đến lượt của bạn';}
		if(mysql_result($result,0,'turn')==mysql_result($result,0,'p'.$o) && $view!=1 && mysql_result($result,0,'turn')!=0){echo 'Lượt của đối thủ:';}}
		else{
		echo 'Đến lượt của ';
		if(mysql_result($result,0,'turn')==mysql_result($result,0,'px')){echo '<a href="/account/'.mysql_result($result,0,"px").'"><b>'.mysql_result($result,0,"xname").'</b></a>';}
		else {echo '<a href="/account/'.mysql_result($result,0,"po").'"><b>'.mysql_result($result,0,"oname").'</b></a>';}
		}
		if((mysql_result($result,0,"waittime")*60-(time()-mysql_result($result,0,"lastturn")))>=0){
		$thoigian=(mysql_result($result,0,"waittime")-(((time()-mysql_result($result,0,"lastturn"))/60)));
		$thoigian=explode(".",$thoigian);
		$phut=$thoigian[0];
		$giay=(60-(((time()-mysql_result($result,0,"lastturn"))%60))==60) ? '00' : (60-(((time()-mysql_result($result,0,"lastturn"))%60)));
		$time='thời gian còn '.$phut.' phút '.$giay.' giây.';
		} else {$time='hết giờ.';}
		echo ' '.$time.'<br>';}
		if((mysql_result($result,0,"waittime")-((int)((time()-mysql_result($result,0,"lastturn"))/60)))<1 && $view!=1 && mysql_result($result,0,"turn")!=$datauser['id'] && mysql_result($result,0,"winner")==0 && mysql_result($result,0,"turn")!=0) {  ?>
		<form style="display:inline;" action="/caro/?id=<?php echo $_GET['id']; ?>" method="post" id="ttt">
		<input type="hidden" name="xt" value="1"><input type="submit" name="ttt" id="ttt" value="Xử thua đối thủ" /><br>
		</form>
		<?php }}} ?>
                </div>