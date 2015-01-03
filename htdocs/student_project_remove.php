<?php
include("session.php");
?>

<?php
	
	if (isset($_POST)){
	
				include("db_conn.php");
				
				if (isset($_POST["sid"])){
					
					$student_id = $_POST["sid"];
					
					if (isset($_POST["pid"])){
						
						$project_id = $_POST["pid"];
						
						$query="DELETE FROM works_in WHERE Stu_Num = ".$student_id." AND Project_ID = '".$project_id."'";
						$result = mysql_query($query);
						
						};
				}
				
		}
		
?>
	
	
