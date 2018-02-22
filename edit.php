<?php
session_start();


if (isset($_SESSION['user']) && isset($_POST['p']) && isset($_POST['e']))
{	
	$p = $_POST['p'];
	$e = $_POST['e'];
	$f = "data/$p";

	if (file_put_contents($f, $e)>=0)
		echo "1";
}
?>
