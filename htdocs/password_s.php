<?php
include 'session.php';
?>

<?php

	$new_pwd=$_POST["new_pwd"];
	$old_pwd=$_POST["old_pwd"];
	
	include("db_conn.php");
        
		$query = "SELECT * FROM administrator WHERE User_ID = '".$_SESSION['user']."'";
		$result = mysql_query($query);
		$my_row = mysql_fetch_array($result);
		
if($old_pwd == $my_row ['Password'])
{
       $query="UPDATE administrator set Password = '".$new_pwd."' WHERE User_ID = '".$_SESSION['user']."';";
        
	   $result1=mysql_query($query);
		
	   if($result1)
		
		echo"<script language='javascript'> alert('Your password has been successfully changed!');history.back();</script>";
}       
else 
echo"<script language='javascript'> alert('Incorrect old password!');history.back();</script>";

  
?>