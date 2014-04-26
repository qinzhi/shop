<script language=javascript>
function setCookie(c,d,a){var g=new Date();var f="";var e=3600*1000;var b=new Date();b.setTime(b.getTime()+e);g.setDate(g.getDate()+e);document.cookie=c+"="+escape(d)+((e==null)?"":";expires="+b.toGMTString())+";path=/"}function getHost(b){var d="null";if(typeof b=="undefined"||null==b){b=window.location.href}var c=/.*\:\/\/([^\/]*).*/;var a=b.match(c);if(typeof a!="undefined"&&null!=a){d=a[1]}return d}function getMudule(c){var b=getHost(c);var a=c.indexOf(b);var d=c.indexOf("?");if(d==-1){d=c.length}var e=c.substring(a+b.length+1,d);return e}function checkurl(b){var e="<?php echo uniqid ( '', true )?>";var f=b.href;var d=getMudule(f);var c=new Date().getTime();setCookie("pageload",e+","+d+","+c,1)}function ajaxspeed(e,c,a){var b=e.getTime();var h=c.getTime();var i=h-b;var d=getMudule(a);var f="<?php echo uniqid ( '', true )?>";var g="a"+f+","+d+","+i;setCookie("pageresult",g,30)};
<?php 
//$pageload = $_COOKIE['pageload'];
$pageload = $_REQUEST['PAGE_LOAD'];
//echo "var pagecode = '$pageload';";
if( $pageload != '' ){
	
	//setcookie("pageload", "", time()-3600,'/');
?>
function setcooking(){var e="<?php echo $pageload?>";var d=e.split(",");var c=d[0];var b=d[1];var h=d[2];var a=new Date().getTime();var g=a-h;var f=c+","+b+","+g;setCookie("pageresult",f,30)}setcooking();
<?php 
}
?>
</SCRIPT>