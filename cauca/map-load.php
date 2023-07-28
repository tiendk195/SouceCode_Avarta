<?PHP
Define('_IN_JOHNCMS', 1);
Require('../incfiles/core.php');
if (!$user_id){
Header("Location: /");
exit;
}

echo'<form action="?act=giang" method="post"><input type="submit" name="giat" id="giat" value="Giật" style=""></form>';