<?php
include("session.php");
?>

<?php
	
	if (isset($_POST)){
	
				include("db_conn.php");
				
				if (isset($_POST["project_id"])){
				
					$pid = $_POST["project_id"];
				
					if (isset($_POST["content"])){
							$content = $_POST["content"];
							
							$toStu = '0';
							$toSup = '0';
							
							if (isset($_POST["toStu"]))$toStu = '1';
							if (isset($_POST["toSup"]))$toSup = '1';
							
							$query="INSERT INTO notification(Project_ID,Content,isToStu,isToSup)
									VALUES('".$pid."','".$content."','".$toStu."','".$toSup."')";
							$result = mysql_query($query);
							
							}
				}
				
		}
		
		echo "<script language='javascript'>"; 
        echo " location='notifications_manage.php';";
        echo "</script>"; 	
		exit();	   
		
?>
	
	
