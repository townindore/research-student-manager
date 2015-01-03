<?php
include("session.php");
?>

<?php
	
	if (isset($_POST)){
	
				include("db_conn.php");
				
				if (isset($_POST["stuid"])){
					
					$student_id = $_POST["stuid"];
					
					if (isset($_POST["supid"])){
						
						$supervisor_id = $_POST["supid"];
						
						$query = "UPDATE student SET Sup_ID = ".$supervisor_id." WHERE Stu_Num = ".$student_id;
						$result = mysql_query($query);
						
						};
				}
				
		}
		
?>
	
	
