<?php
include("session.php");
?>

<?php
	
	if (isset($_POST)){
	
				include("db_conn.php");
				
				if (isset($_POST["sid"]) and isset($_POST["pid"]) and isset($_POST["date"])){
					
					$student_id = $_POST["sid"];
					$project_id = $_POST["pid"];
					$since_date = $_POST["date"];
						
					$query="INSERT INTO `works_in`(`Stu_Num`, `Project_ID`, `Since_Date`) VALUES (".$student_id.",".$project_id.",'".$since_date."')";
					$result = mysql_query($query);
				}
				
		}
		
?>