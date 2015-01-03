<?php   
session_start();

	unset($_SESSION['user']);
	echo("<meta http-equiv=refresh content='0; url=index.php'>"); 
	echo "<script language=javascript>window.close();</script>";

?>
