<?php
include("session.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.tabfont01 {	
	font-family: "宋体";
	font-size: 9px;
	color: #555555;
	text-decoration: none;
	text-align: center;
}
.font051 {font-family: "宋体";
	font-size: 12px;
	color: #333333;
	text-decoration: none;
	line-height: 20px;
}
.font201 {font-family: "宋体";
	font-size: 12px;
	color: #FF0000;
	text-decoration: none;
}
.button {
	font-family: "宋体";
	font-size: 14px;
	height: 37px;
}
html { overflow-x: auto; overflow-y: auto; border:0;} 
-->
</style>

<link href="css/css.css" rel="stylesheet" type="text/css" />
<script type="text/JavaScript">

function filterFunction(){
  var myselect = document.getElementById("filtered_faculty");
  var select_value = myselect.options[myselect.selectedIndex].value;
  
  if (select_value != 'N/A'){
		document.searchform.submit();
	}
}

</script>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.STYLE2 {color: #330000}
-->
</style></head>


<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  
  <tr>
    <td height="30">      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="57" bgcolor="#6795B4">
            
		   <table width="891" border="0" class="top-font01">
                  <tr>
</a></td>
                  </tr>
                </table></td>
        </tr>

<?php 
	include("db_conn.php");
	
	//if user clears filters and search, just read all rows from the student table
	if(isset($_POST["clear"])){
	
		$query = "SELECT * FROM project;";
				
		}
	else {
	
	//applying filters by changing the SQL queries
	if (isset($_POST["filtered_faculty"]) and $_POST["filtered_faculty"]!= "N/A")
		{
			if ($_POST["filtered_faculty"]!="all"){
				$faculty_name = $_POST["filtered_faculty"];
				$query = "SELECT * 
						  FROM project 
						  WHERE Fund_Source = '".$faculty_name."'
						  ORDER BY Project_ID";
						  }
			else {
				$query = "SELECT * FROM project;";
				}
		}
	//applying searching by changing the SQL queries
	else if (isset($_POST["search_keyword"])) {
			
			$keyword = $_POST["search_keyword"];
			
			if (isset($_POST["search_criteria"])){
			
				if ($_POST["search_criteria"] == "name" ){
				
					$query = "SELECT * FROM project WHERE Project_Title LIKE '%".$keyword."%' ORDER BY Project_ID;";
					
				
				} else if ($_POST["search_criteria"] == "id"){
				
					$query = "SELECT * FROM project WHERE Project_ID LIKE '%".$keyword."%' ORDER BY Project_ID";
				}
			}
		}
	
	//no filters and no searching
	else{
		
		$query = "SELECT * FROM project;";
		
		}
	
	}
	
	$result=mysql_query($query); 
?> 

    </table></td></tr>
  <tr>
    <td><table id="subtree1" style="DISPLAY: " width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="6"><img src="images/spacer.gif" width="1" height="1" /></td>
        </tr>
		<tr>
          <td height="40" class="font42">
				<table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#464646" class="newfont03">
				<tr>
		
			<?php
			$faculty_query = "SELECT DISTINCT Fund_Source FROM project;";
			$faculties = mysql_query($faculty_query); 
			?>
		
			<td height = "30" bgcolor="#FFFFFF" style="font-size:20px; font-family: Georgia, 'Times New Roman', Times, serif;" colspan = "7" align = "right">
			<form name = "searchform" id = "searchform" action = "project_information.php" method = "post"> 
				Filter Project by Faculty: 
				<select name = "filtered_faculty" id = "filtered_faculty" style="font-family:Georgia;font-size:15px" onChange = "filterFunction()">
				<option selected="selected" value = "N/A">[Please Select]</option>
				<option value = "all" >== All Faculties/Departments ==</option>
					<?php

						while($row = mysql_fetch_array($faculties)){
							$faculty = $row['Fund_Source'];
							echo '<option value="'.$faculty.'">'.$faculty.'</option>';
						}
					?>
				</select>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				Find Project: <input type = "text" name = "search_keyword" style = "font-family:Georgia;font-size:15px">
				<input type = "submit" name = "search" value = "Search" style = "font-family:Georgia;font-size:15px">
				<input type = "submit" name = "clear" value = "Clear Filter & Search" style = "font-family:Georgia;font-size:15px"><br>
				<input type="radio" name="search_criteria" checked="checked" value="name">by title
				<input type="radio" name="search_criteria" value="id">by project id&nbsp;&nbsp;
			</form></td></tr>
				 <tr class="CTitle" >
                    	<td height="22" colspan="8" align="center" style="font-size:20px;font-family:Georgia;">Project Details</td>
                  </tr>
                  <tr bgcolor="#EEEEEE">
				    <td>Project ID</td>
					<td>Project Title</td>
					<td>Project Description</td>
					<td>Managing Supervisor</td>
					<td>Current Stage</td>
                  </tr>
				  
				   <?php
						while($row = mysql_fetch_array($result)){
							
								$pid = stripslashes($row['Project_ID']);
								$title = stripslashes($row['Project_Title']);
								$project_des = stripslashes($row['Project_Description']);
								$department = stripslashes($row['Fund_Source']);
								$project_stage = stripslashes($row['Current_Stage']);
								$manager_id = stripslashes($row['Managed_by']);
								
								//this code here gets the supervisor name who manages the project
								$supervisor_query = "SELECT * FROM supervisor WHERE Sup_ID = ".$manager_id.";";
								$supervisor_result=mysql_query($supervisor_query);
								$supervisor = mysql_fetch_array($supervisor_result);
								$manager_name = stripslashes($supervisor['Sup_Name']);
								
								
								echo ('<tr bgcolor="#FFFFFF"><td class="newfont02">' . $pid. '</td>');
								echo '<td class="newfont02"><a href="#" onClick="window.open(\'project_details.php?pid='.$pid.'\',\'Project Details\',\'location=yes,toolbar=yes,scrollbars=yes,width=700,height=700\')"><u>' . $title . '</u></a></td>';
								echo '<td class="newfont02">' . $project_des . '</td>';
								echo '<td class="newfont02">' . $manager_name . '</td>';
								echo '<td class="newfont02">' . $project_stage . '</td></tr>';
							}
							
							//if no results retrieved, print a message to indicate
								if (mysql_num_rows($result)==0){
					
								echo '<tr bgcolor="#FFFFFF"><td class = "newfont09" colspan="6"  align = "center">No result found.</td></tr>';
						
							}
							
					?>     
				  
      </table></td>
  </tr>
</table>

</body>
</html>
