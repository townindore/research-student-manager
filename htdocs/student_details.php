<?php
include("session.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Student Details - QVW7 RSM</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.tabfont01 {	
	font-family: "Georgia";
	font-size: 9px;
	color: #555555;
	text-decoration: none;
	text-align: center;
}
.font051 {font-family: "Georgia";
	font-size: 12px;
	color: #333333;
	text-decoration: none;
	line-height: 20px;
}
.font201 {font-family: "Georgia";
	font-size: 12px;
	color: #FF0000;
	text-decoration: none;
}
.button {
	font-family: "Georgia";
	font-size: 14px;
	height: 37px;
}
html { overflow-x: auto; overflow-y: auto; border:0;} 
-->
</style>

<link href="css/css.css" rel="stylesheet" type="text/css"/>

<script>

	window.onunload = refreshParent;
	
	function refreshParent() {
		window.opener.location.reload();
	}

	
	function changeSupervisor()
	{	
	
		var myselect = document.getElementById("supervisor_change");
		var supervisor_id = myselect.options[myselect.selectedIndex].value;
		var select_value = myselect.options[myselect.selectedIndex].text;
  
		if (supervisor_id != 'N/A'){
			
			var sid = <?php echo $_GET['sid'];?>;
		
			//ask the administrator's confirmation first before changing supervisor
			var conf = confirm("Are you sure you want to CHANGE the SUPERVISOR of this student (ID:"+sid+") to "+select_value+" ?");

			if(conf == true){
			
			var xmlhttp;
			if (window.XMLHttpRequest)
			  {// code for IE7+, Firefox, Chrome, Opera, Safari
			  xmlhttp=new XMLHttpRequest();
			  }
			else
			  {// code for IE6, IE5
			  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			xmlhttp.onreadystatechange=function()
			  {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				alert("The SUPERVISOR for this student has been successfully CHANGED!");
				location.reload();
				}
			  }
			xmlhttp.open("POST","student_change_supervisor.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("stuid="+sid+"&supid="+supervisor_id);
			} else {
			
			//if the adminstrator clicked "no", the select option will be reset
			document.getElementById("No_Supervisor_Selected").selected=true;
			
			
			}
			
		
		}
		
	}
	
	function removeProject(clicked_id)
	{	
		var sid = <?php echo $_GET['sid'];?>;
		var pid = clicked_id;
	
		//ask the administrator's confirmation first before removing project
		var conf = confirm("Are you sure you want to REMOVE this student (ID:"+sid+") from this project (ID:"+pid+") that the student is WORKING IN?");

		if(conf == true){
		
		
		var xmlhttp;
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			alert("The student has been successfully REMOVED from this project!");
			location.reload();
			}
		  }
		xmlhttp.open("POST","student_project_remove.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("sid="+sid+"&pid="+pid);
		}
		
	}

	
	function addProject()
	{	
		var myselect = document.getElementById("project_add");
		var project_id = myselect.options[myselect.selectedIndex].value;
		var select_value = myselect.options[myselect.selectedIndex].text;
  
		
		// if user has selected a project to add then continue with date validation
		if (project_id != 'N/A'){
			
			var since_date = document.getElementById("since_date");
			var dateValidated = checkdate(since_date);
			
			//if the date has been validated to be correct, continue
			
			if (dateValidated){
			var sid = <?php echo $_GET['sid'];?>;
			
			//ask the administrator's confirmation first before changing supervisor
			var conf = confirm("Are you sure you want to ADD this Project ("+select_value+") to this Student (ID:"+sid+") with the SINCE DATE of "+since_date.value+"?");

			if(conf == true){
			
			var xmlhttp;
			if (window.XMLHttpRequest)
			  {// code for IE7+, Firefox, Chrome, Opera, Safari
			  xmlhttp=new XMLHttpRequest();
			  }
			else
			  {// code for IE6, IE5
			  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			xmlhttp.onreadystatechange=function()
			  {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				alert("The Project ("+select_value+") has been successfully ADDED to this student!");
				location.reload();
				}
			  }
			xmlhttp.open("POST","student_project_add.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("sid="+sid+"&pid="+project_id+"&date="+since_date.value);
			} else {
			
				//if the administrator clicked "no", the select option and since date will be reset
				document.getElementById("No_Project_Selected").selected=true;
				since_date.value = "";
			
				}
			}
			
		
		//if the user has not selected a project to add, give warnings
		}else {
			
			alert("Please specify the project to add!");
		
		}
		
	}
	
	//this is the code for date validation reused from an open source code
		
	/**--------------------------
	//* Validate Date Field script- By JavaScriptKit.com
	//* For this script and 100s more, visit http://www.javascriptkit.com
	//* This notice must stay intact for usage
	---------------------------**/

	function checkdate(input){
		
			var validformat=/^\d{4}\-\d{2}\-\d{2}$/ //Basic check for format validity
			var returnval=false
			
		if (!validformat.test(input.value))
			alert("Invalid Date Format. Please correct and submit again.")
		
		else{ //Detailed check for valid date ranges
			
			var yearfield=input.value.split("-")[0]
			var monthfield=input.value.split("-")[1]
			var dayfield=input.value.split("-")[2]
			
			var dayobj = new Date(yearfield, monthfield-1, dayfield)
			
		if ((dayobj.getMonth()+1!=monthfield)||(dayobj.getDate()!=dayfield)||(dayobj.getFullYear()!=yearfield))
		
			alert("Invalid Day, Month, or Year range detected. Please correct and submit again.")
			else
			
			returnval=true
		
		}
		
		if (returnval==false) input.select()

		return returnval
}



</script>

<link href="css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.STYLE2 {color: #330000}
form {
	font-family: Times New Roman, Times, serif;
}
-->
</style>

</head>


<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
		<td height="40" class="font42">
				<table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#464646" class="newfont03">
				 <tr class="CTitle" >
                    	<td height="22" colspan="8" align="center" style="font-size:30px;font-family:Georgia">Student Management Tool</td>
                  </tr>
      </table></td>
  </tr>
</table>
<br>

<table id="subtree1" style="DISPLAY: " align="center" width="90%" border="1" cellspacing="0" cellpadding="3" align="centr" class = "newfont09">

<?php 
	
	//hanldes the student id read from GET parameters in the URL and retrieve student information
	if (isset($_GET['sid']) and !empty($_GET['sid'])){
	
		$sid = $_GET['sid'];
		
		include("db_conn.php");
		
		$query = "SELECT * FROM student 
				  INNER JOIN supervisor ON student.Sup_ID = supervisor.Sup_ID
				  WHERE student.Stu_Num = ".$sid.";";
				
		$result = mysql_query($query);
		
		$student = mysql_fetch_array($result);
	};
?> 	     
       
		<tr>
		<td height = "20" width="30%" align = "center" class = "newfont09" colspan="2">
		<b>Student Number&nbsp;</b></td><td class = "newfont09" colspan="2">&nbsp;<?php echo $student['Stu_Num'];?>
		</td>
		</tr>
		<tr>
		<td class = "newfont09" height = "20" align = "center" colspan="2">
		<b>Student Name&nbsp;</b><br></td><td class = "newfont09" colspan="2">&nbsp;<?php echo $student['Stu_Name'];?>
		</td>
		</tr>
		<tr>
		<td class = "newfont09" height = "20" align = "center" width = "15">
		<b>Gender</b></td><td class = "newfont09">&nbsp;<?php echo $student['Gender'];?>
		</td>
		<td class = "newfont09" height = "20" align = "center">
		<b>Birth Date</b></td><td class = "newfont09">&nbsp;<?php echo $student['Birth_Date'];?>
		</td>
		</tr>
		<tr>
		<td class = "newfont09" height = "20" align = "center" colspan="2">
		<b>Email<br></b>
		</td>
		<td class = "newfont09" colspan="2">&nbsp;<?php echo $student['Email'];?>
		</td>
		</tr>
		<tr>
		<td class = "newfont09" height = "20" align = "center" colspan="2">
		<b>Program<br></b>
		</td>
		<td class = "newfont09" colspan="2">&nbsp;<?php echo $student['Program'];?>
		</td>
		</tr>
		<tr>
		<td class = "newfont09" height = "50" align = "center" colspan="4">
		<b>Current Supervisor Information<br></b></td>
		</tr>
		<tr>
		<td class = "newfont09" align = "center">
		<b>ID</b>
		</td>
		<td class = "newfont09" align = "center">
		<?php echo $student['Sup_ID']?>
		</td>
		<td class = "newfont09" align = "center">
		<b>Supervisor Name</b>
		</td>
		<td class = "newfont09" align = "center">
		<?php echo $student['Sup_Name'];?>
		</td>
		</tr>
		<tr>
		<td class = "newfont09" align = "center">
		<b>Faculty</b>
		</td>
		<td class = "newfont09" align = "center">
		<?php echo $student['Faculty']?>
		</td>
		<td class = "newfont09" align = "center">
		<b>Email</b>
		</td>
		<td class = "newfont09" align = "center">
		<?php echo $student['email'];?>
		</td>
		</tr>
		
		<?php 
	
		//this query get a list of ALL supervisors so the student can choose to change to
		$supervisor_query = "SELECT * FROM supervisor;";

		$supervisor_result = mysql_query($supervisor_query);
		
		?>
		
		<tr>
		<td class = "newfont09" height = "50" align = "center" colspan="4">
		<b>CHANGE SUPERVISOR</b> of this student to:
		<select name = "supervisor_change" id = "supervisor_change" style="font-size:16px;font-family:Georgia" onChange = "changeSupervisor()">
				<option selected="selected" id = "No_Supervisor_Selected" value = "N/A">[Please Select]</option>
					<?php

						while($supervisor = mysql_fetch_array($supervisor_result)){
							
							$sup_id = $supervisor['Sup_ID'];
							$sup_name = $supervisor['Sup_Name'];
							
							echo '<option value="'.$sup_id.'">'.$sup_id.': '.$sup_name.'</option>';
						}
					?>
		</select>
		</td>
		</tr>
		
		<?php
		
		//this query get student information based on sid and get ALL the projects that the student is WORKING IN
		$student_project_query = "SELECT * FROM student 
								  INNER JOIN works_in ON works_in.Stu_Num = student.Stu_Num
								  INNER JOIN project ON project.Project_ID = works_in.Project_ID
								  WHERE student.Stu_Num = ".$sid.";";

		$student_project_result = mysql_query($student_project_query);
		
		?>
		
		<tr>
		<td class = "newfont09" height = "50" align = "center" colspan="4">
		<b>Project Currently Working In<br></b></td>
		</tr>
		
		<?php 
			
			while($row = mysql_fetch_array($student_project_result)){
			
			echo '<tr><td class = "newfont09" colspan="2"  align = "center">&nbsp;'.$row['Project_ID'].'&nbsp; - &nbsp;'.$row['Project_Title'].
			'&nbsp;&nbsp;</td><td class = "newfont09" colspan="1"  align = "center">&nbsp;Since '.$row['Since_Date'].'</td><td width = "40" colspan="1"><button style="font-size:15px;font-family:Georgia;" class = "dhbutton06" id ="'.$row['Project_ID'].'" 
			onclick="removeProject(this.id)">Remove</button><br></td></tr>';
			
			}
			
			// print a message when no project is found that involves this student
			if (mysql_num_rows($student_project_result)==0){
			
			echo '<tr><td class = "newfont09" colspan="4"  align = "center">No working project found</td></tr>';
			
			}
			
		?>
		
		
		
		<?php
		
		//this retreives a list of ALL projects so the admin can choose from add to the student
		$project_query = "SELECT * FROM project;";
				
		$project_result = mysql_query($project_query);
		
		?>
		
		<tr>
		<td class = "newfont09" height = "80" align = "center" colspan="4"><br>
		<b>ADD NEW PROJECT</b> to this student:<br><br>
		<select name = "project_add" id = "project_add" style="font-size:18px;font-family:Georgia">
				<option selected="selected" id = "No_Project_Selected" value = "N/A">[Please Select]</option>
					<?php

						while($project = mysql_fetch_array($project_result)){
							
							$project_id = $project['Project_ID'];
							$project_title = $project['Project_Title'];
							
							echo '<option value="'.$project_id.'">'.$project_id.': '.$project_title.'</option>';
						}
					?>
		</select>
		<br><br><b>SINCE DATE: <input type = "text" id = "since_date" name = "since_date"/>(yyyy-mm-dd)
		<button style="font-size:15px;font-family:Georgia;" class = "dhbutton04" onclick="addProject()">Add</button>
		<br><br></td>
		</tr>
		
		</table>
</body>
</html>
