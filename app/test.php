<?php
define('_IN_JOHNCMS', 1);
$headmod = 'mod';
$bhead = 2;
require('../incfiles/core.php');
if(!$user_id){
require('../incfiles/head.php');
echo functions::display_error($lng['access_guest_forbidden']);
require('../incfiles/end.php');
exit;
}
$textl = 'Khu Sự Kiện';
require('../incfiles/head.php');
$info = new Info;
$type = $info->random_level(GET('type')) != '' ? (int)GET('type'):1;
$luauytin = $info->random_level($type).' '.$settings['rd_'.$type]*0.001.'K';

?>
<script>
    var page = 1, type = '<?=$type?>';
       swal({   
            title: "<?=$luauytin;?>",   
            text: "<?=$info->random_notify($type);?>",   
            showConfirmButton:true
        }, function() {
        });
</script>
<div class="sa-mainsa">
    <div class="container">
        <div class="sa-lprod">
            <div class="sa-filter">
                <div class="row">

<?php


require('../incfiles/end.php');
?>