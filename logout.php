<?php
	Session_Start();
	$_SESSION["login"] = null;
	$_SESSION["name"] = null;
	
	header("Location: index.php");
?>
