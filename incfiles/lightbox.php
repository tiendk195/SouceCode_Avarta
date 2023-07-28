<style>
.jquery-lightbox-overlay{
background:#000000;}
.jquery-lightbox{  position:relative;
padding:17px 0;}
.jquery-lightbox-border-top-left,.jquery-lightbox-border-top-right,.jquery-lightbox-border-bottom-left,.jquery-lightbox-border-bottom-right{
  position:absolute;
height:17px;  width:12%;
z-index:7000;}
.jquery-lightbox-border-top-left{
background:
 
url('<?php echo ''.$home.'/images/lightbox.png'; ?>')
 no-repeat 0 0;
top:0;  left:0;}
.jquery-lightbox-border-top-right{
background:
 
url('<?php echo ''.$home.'/images/lightbox.png'; ?>')
 no-repeat right 0;
top:0;  right:0;}
.jquery-lightbox-border-top-middle{  background:#2b2b2b;
position:absolute;
height:7px;  width:78%;  top:0;
left:12%;  z-index:7000;
overflow:hidden;}
.jquery-lightbox-border-bottom-left{
background:
 
url('<?php echo ''.$home.'/images/lightbox.png'; ?>')
 no-repeat 0 bottom;
bottom:0;
left:0;}
.jquery-lightbox-border-bottom-right{
background:
 
url('<?php echo ''.$home.'/images/lightbox.png'; ?>')
 no-repeat right bottom;
bottom:0;  right:0;}
.jquery-lightbox-border-bottom-middle{
background:#2b2b2b;
height:7px;
width:78%;  position:absolute;
bottom:0;  left:12%;
z-index:7000;  overflow:hidden;}
.jquery-lightbox-title{
background:#2b2b2b;
color:#FFFFFF;
font-family:verdana,arial,serif;
font-size:11px;
line-height:14px;
padding:5px 8px;  margin:3px;
position:absolute;  bottom:0;
z-index:7000;  opacity:0.9;}

.jquery-lightbox-html{  z-index:7000;
position:relative;
border:0;
border-left:7px solid #2b2b2b;
border-right:7px solid #2b2b2b;
padding:0px 15px;
vertical-align:top;}

.jquery-lightbox-html embed,
.jquery-lightbox-html object,
.jquery-lightbox-html iframe{
vertical-align:top;}

.jquery-lightbox-background{
background-color: #F7F8E1;
position:absolute;
top:7px;  left:7px;  z-index:6999;
float:left;
padding:0;}


.jquery-lightbox-background img{
display:block;  position:relative;
border:0;  margin:0;
padding:0;  width:100%;  height:100%;}
.jquery-lightbox-mode-image .jquery-lightbox-html{  z-index:6998;
padding:0;}
.jquery-lightbox-mode-html .jquery-lightbox-background{
background:#FFFFFF;}
.jquery-lightbox-html{
overflow:auto;}
.jquery-lightbox-loading{
 background:#FFFFFF 
url('<?php echo ''.$home.'/images/loadlightbox.gif'; ?>')
 no-repeat center center;}

.jquery-lightbox-button-close{
background:
 
url('<?php echo ''.$home.'/images/lightbox.png'; ?>')
 no-repeat -190px -115px;
position:absolute;
top:12px;  right:-26px;
width:29px;
height:29px;}
.jquery-lightbox-button-close:hover{
background-position:-220px -115px;}
.jquery-lightbox-button-close span,
.jquery-lightbox-buttons span{
display:none;}

.jquery-lightbox-buttons {  position:absolute;
top:7px;
left:7px;  z-index:7001;
height:39px;
display:none;}
.jquery-lightbox-buttons .jquery-lightbox-buttons-init,.jquery-lightbox-buttons .jquery-lightbox-buttons-end{
width:5px;
height:39px;
float:left;
display:inline;}
.jquery-lightbox-buttons-init{
background:
 
url('<?php echo ''.$home.'/images/lightbox.png'; ?>')
 no-repeat -151px -153px;
margin:7px 0 0 7px;}

.jquery-lightbox-buttons-end{
background:
 
url('<?php echo ''.$home.'/images/lightbox.png'; ?>')
 no-repeat -244px -153px;
margin:7px 0 0 0;}

.jquery-lightbox-button-left{
background:
 
url('<?php echo ''.$home.'/images/lightbox.png'; ?>')
 no-repeat -156px -153px;
width:24px;
height:39px;
float:left;
display:inline;
margin:7px 0 0 0;}

.jquery-lightbox-button-left:hover{
background-position:-156px -194px;}
.jquery-lightbox-button-right{
background:
 
url('<?php echo ''.$home.'/images/lightbox.png'; ?>')
 no-repeat -220px -153px;
width:24px;
height:39px;  float:left;
display:inline;
margin:7px 0 0 0;}
.jquery-lightbox-button-right:hover{
background-position:-220px -194px;}
.jquery-lightbox-button-max{
background:
 
url('<?php echo ''.$home.'/images/lightbox.png'; ?>')
 no-repeat -182px -153px;
width:36px;
height:39px;
float:left;  display:inline;
margin:7px 0 0 0;}

.jquery-lightbox-button-max:hover{background-position:-182px -194px;}

.jquery-lightbox-button-min{
background:url('<?php echo ''.$home.'/images/lightbox.png'; ?>')
 no-repeat -162px -235px;
width:36px;
height:39px;
float:left;
display:inline;
margin:7px 0 0 0;}

.jquery-lightbox-button-min:hover{
background-position:-207px -235px;}

.jquery-lightbox-navigator{
display:none;}
</style>

<script type="text/javascript" src="<?php echo $home; ?>/js/lightbox.js"></script>
<script type="text/javascript" src="<?php echo $home; ?>/js/js-lightbox.js"></script>
<script type="text/javascript">
 jQuery(document).ready(function(){
   jQuery('.lightbox').lightbox();
 });
</script>
