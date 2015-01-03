<?php

if(isset($_POST))
		{
			$username = $_POST["username"];
			$password = $_POST["password"];
			
			include("db_conn.php");	
			
			$result = mysql_query("SELECT * FROM administrator 
								   WHERE User_ID='".$username."' AND Password='".$password."'");
								 
			if (mysql_num_rows($result) > 0){
			
				session_start();
				$_SESSION["user"] = $username;
				
				echo "<script language='javascript'>"; 
                echo " location='index.php';"; 
                echo "</script>"; 	
				exit();	
				
			} else {
			
				echo("<script language='javascript'>alert('User Name or Password is incorrect!');window.location.href='login.php';</script>");	
				
			}
			
			
			
}					
	
?>
	
	
