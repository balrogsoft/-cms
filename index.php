<?php
$site_title = "Website title";
$site_description = "";
$site_tags = "";
$site_copyright =  '&copy; '. date('Y') .' Your website';;
$site_nav[0] = "Item 1";
$site_nav[1] = "Item 2";
$site_nav[2] = "Item 3";
$site_urlrw = false;
$login_pass = "1234";
$login_link = "<div class='footer_login'><form action='index.php' method='post'><a id='login' href='javascript:slogin();'>Login</a><input id='pass' name='pass' style='display:none' type='password' size='10'/><input id='submit' style='display:none' type='submit' value='Login'/></form></div>";
$logout_link = "<div class='footer_login'><form action='index.php' method='post'><input type='hidden' name='logout' value='1'/> <input type='submit' value='Logout'/></form></div>";

session_start();

if (isset($_POST["logout"]))
	unset($_SESSION['user']);


function loadContent($p)
{
	if (strlen($p)!==0 && strpos($p, "..")===false)
	{
		$f = "data/".$p;
		if  (file_exists($f))
			return @file_get_contents($f);  
	}
	return "";
}
function login_check()
{
	if (isset($_SESSION['user'])) 
		echo "<script>$(function() { $('.editable').click(addTextEdit); });</script>";
	else 
		echo "";
}

if (isset($_REQUEST['page']))
	$p = $_REQUEST['page'];
else
	$p = $_SERVER['QUERY_STRING'];
if (strlen($p)==0)
	$p = str_replace(' ', '-', $site_nav[0]);

$m = str_replace('-', ' ', $p);

if ($_POST["pass"]===$login_pass)
	$_SESSION['user']="admin";

if (isset($_SESSION['user']))
	$login_link = $logout_link;

require('theme.php');
?>
