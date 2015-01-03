<?php
include("session.php");
?>

<?php
	
	if (isset($_POST)){
	
				include("db_conn.php");
				
				if (isset($_POST["project_id"])){
					
					$pid = $_POST["project_id"];
					
					if (isset($_POST["early_score"])){
						
						$score = $_POST["early_score"];
						
						$query="UPDATE project SET Early_Assess = ".$score." WHERE Project_ID = '".$pid."'";
						$result = mysql_query($query);
						
						};
					
					if (isset($_POST["mid_score"])){
						
						$score = $_POST["mid_score"];
						
						$query="UPDATE project SET Mid_Assess = ".$score." WHERE Project_ID = '".$pid."'";
						$result = mysql_query($query);
						
						};
					
					if (isset($_POST["final_score"])){
						
						$score = $_POST["final_score"];
						
						$query="UPDATE project SET Final_Assess = ".$score." WHERE Project_ID = '".$pid."'";
						$result = mysql_query($query);
						
						};
					
					if(isset($_POST["current_stage"])){
							
							$current_stage = $_POST["current_stage"];
							
							if ($current_stage!='N/A'){
							
								$query= "UPDATE project SET Current_Stage = '".$current_stage."' WHERE Project_ID = '".$pid."'";
								$result = mysql_query($query);
								
							}
					
						}
					
				}
				
		}
		
		echo "<script language='javascript'>"; 
        echo "this.close();"; 
        echo "</script>"; 	
		exit();	  
?>
	
	
