<?php
session_start();
if($_SESSION["user"]=="") 
{
echo "<script language='javascript'>"; 
echo " location='login.php';"; 
echo "</script>"; 	
	exit();		
}
?>