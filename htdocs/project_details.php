<?php
include("session.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Project Details - QVW7 RSM</title>
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

//validate the message and then send it with Ajax
function sendNotification()
	{	
		var pid = document.forms["send_notification"]["project_id"].value;
		var content = document.forms["send_notification"]["content"].value;
		var toStu = document.forms["send_notification"]["toStu"].checked;
		var toSup = document.forms["send_notification"]["toSup"].checked;
		
		//if user hasn't input any message content, give warning
		if (content == null || content == ""){
			
			alert ("Message Content can not be empty!");
			return false;
		
		//if user hasn't checked to student / to supervisor, give warning
		} else if (!document.forms["send_notification"]["toStu"].checked && !document.forms["send_notification"]["toSup"].checked){
			
			alert ("At least one of \"To Student\" or \"To Supervisor\" must be checked!");
			return false;
		
		//if both correct, send the message via Ajax
		}else{
		
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
				alert("The Notification has been successfully sent!");
				location.reload();
				}
			  }
			  
			xmlhttp.open("POST","notifications_send.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			
			//based on whether the to Student/ to Supervisor is checked, modify the sending parameters
			var send_value = "project_id="+pid+"&content="+content;
			
			if (toStu)send_value += "&toStu=1";
			if (toSup)send_value += "&toSup=1";
			
			xmlhttp.send(send_value);
		}
			
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
                    	<td height="22" colspan="8" align="center" style="font-size:30px;font-family:Georgia">Project Detailed Information</td>
                  </tr>
      </table></td>
  </tr>
</table>
<br>

<table id="subtree1" style="DISPLAY: " align="center" width="90%" border="1" cellspacing="0" cellpadding="3" align="center" class = "newfont09">

<?php 
	
	//handles the project id read from GET parameters in the URL and retrieve project information
	if (isset($_GET['pid']) and !empty($_GET['pid'])){
	
		$pid = $_GET['pid'];
		
		include("db_conn.php");
		
		$query = "SELECT * FROM project INNER JOIN supervisor ON supervisor.Sup_ID = project.Managed_by WHERE Project_ID = ".$pid.";";
				
		$result = mysql_query($query);
		
		$project = mysql_fetch_array($result);
	};
?> 	     
       
		<tr>
		<td height = "20" width="30%" align = "center" class = "newfont09" colspan="2">
		<b>Project ID&nbsp;</b></td><td class = "newfont09" colspan="2">&nbsp;<?php echo $project['Project_ID'];?>
		</td>
		</tr>
		<tr>
		<td class = "newfont09" height = "20" align = "center" colspan="2">
		<b>Project Title&nbsp;</b><br></td><td class = "newfont09" colspan="2">&nbsp;<?php echo $project['Project_Title'];?>
		</td>
		</tr>
		<tr>
		<td class = "newfont09" height = "20" align = "center" colspan="2">
		<b>Funding Purpose</b></td><td class = "newfont09">&nbsp;<?php echo $project['Fund_Purpose'];?>
		</td>
		</tr>
		<tr>
		<td class = "newfont09" height = "20" align = "center" colspan="2">
		<b>Funding Source</b></td><td class = "newfont09">&nbsp;<?php echo $project['Fund_Source'];?>
		</td>
		</tr>
		<tr>
		<td class = "newfont09" height = "20" align = "center" colspan="2">
		<b>Funding Amount</b></td><td class = "newfont09">&nbsp;$<?php echo $project['Fund_Amount'];?>
		</td>
		</tr>
		<tr>
		<td class = "newfont09" height = "20" align = "center" colspan="4">
		<b>Assessment Scores<br></b>
		</td></tr>
		<tr>
		<td class = "newfont09" colspan="2"  align = "center">&nbsp;Early Term Score</td>
		<td class = "newfont09" colspan="2">&nbsp;<?php echo $project['Early_Assess'];?>
		</td>
		</tr>
		<tr>
		<td class = "newfont09" colspan="2"  align = "center">&nbsp;Mid Term Score</td>
		<td class = "newfont09" colspan="2">&nbsp;<?php echo $project['Mid_Assess'];?>
		</td>
		</tr>
		<tr>
		<td class = "newfont09" colspan="2"  align = "center">&nbsp;Final Score</td>
		<td class = "newfont09" colspan="2">&nbsp;<?php echo $project['Final_Assess'];?>
		</td>
		</tr>
		<tr>
		<td class = "newfont09" align = "center" colspan="2">
		<b>Current Stage</b></td>
		<td class = "newfont09" colspan="4" ><?php echo $project['Current_Stage'];?>
		</td></tr>
		<tr>
		<td class = "newfont09" align = "center" colspan="2">
		<b>Managing Supervisor</b></td>
		<td class = "newfont09" colspan="4" ><?php echo $project['Sup_Name'];?>
		</td></tr>
		<tr>
		<td class = "newfont09" height = "20" align = "center" colspan="4">
		<b>Project Description<br></b>
		</td></tr>
		<tr>
		<td class = "newfont09" height = "20" colspan="4">
		<?php echo $project['Project_Description'];?>
		</td></tr>
		<tr>
		<td class = "newfont09" height = "20" align = "center" colspan="4">
		<b>Student Currently Working in this Project<br></b>
		</td></tr>
		<tr><td class = "newfont09" height = "20" colspan="4" align = "center">
		<?php 
	
		//this query get a list of ALL students that are currently working in this project
		$student_query = "SELECT * FROM works_in INNER JOIN student ON student.Stu_Num = works_in.Stu_Num WHERE works_in.Project_ID = ".$project['Project_ID'].";";

		$student_result = mysql_query($student_query);
		
		while($row = mysql_fetch_array($student_result)){
			
			echo $row['Stu_Num'].'&nbsp; - &nbsp;'.$row['Stu_Name'].'<br>';
			
			}
			
			// print a message when no project is found that involves this student
			if (mysql_num_rows($student_result)==0){
			
			echo 'No student found currently working in this project.';
			
			}
			
		?>
		</td></tr>
		
		<tr class="CTitle" >
		<td height="50" colspan="4" align="center" style="font-size:20px;font-family:Georgia;">
		Send Notification to This Project</td>
		  </tr>
		  
		  <tr>
		<td class = "newfont09" height = "20" align = "center" colspan="4">
		<b>Notification History<br></b>
		</td></tr>
		
		<?php 
	
		//this query get a list of ALL students that are currently working in this project
		$notification_query = "SELECT * FROM notification WHERE Project_ID = ".$project['Project_ID'].";";

		$notification_result = mysql_query($notification_query);
		
		while($row = mysql_fetch_array($notification_result)){
			
			echo '<tr><td class = "newfont09" height = "20" colspan="1" align = "center">'.$row['Message_ID'].'</td>';
			echo '<td class = "newfont09" height = "20" colspan="1" align = "center">'.$row['Date_Time'].'</td>';
			echo '<td class = "newfont09" height = "20" colspan="2" align = "center">'.$row['Content'].'</td></tr>';
			}
			
			// print a message when no project is found that involves this student
			if (mysql_num_rows($notification_result)==0){
			
			echo '<tr><td class = "newfont09" height = "20" colspan="4" align = "center">No history notifications found.</td></tr>';
			
			}
			
		?>
		  
		  
		  
		  
		  
		  <?php 
			include("db_conn.php");
			$query="SELECT * FROM project;";
			$result = mysql_query($query);
			?> 
		  <tr>
		<td class="newfont02" align="center" colspan="4">
		
		 <form name = "send_notification" method="post">
		   <br><b>To:&nbsp; </b><u><?php echo $project['Project_ID'];?> : <?php echo $project['Project_Title'];?></u> (this project)
		   <input type="hidden" name = "project_id" id = "pid" value="<?php echo $project['Project_ID'];?>"/>
		   <br><br><b>Message Content:</b><br><textarea name="content" cols="60" rows="5"></textarea><br>
		   <input type="checkbox" name="toStu" id="toStu">To Students&nbsp;&nbsp;&nbsp; 
		   <input type="checkbox" name="toSup" id="toSup">To Supervisor<br><br>
		   <input type="button" name="submit" value="Send Notification" onclick="sendNotification();">
		   <input type="reset" name="reset" value="Reset">
		 </form>
		 
		 <form name = "remove_notification" method = "post" action = "notifications_manage.php">
			<input type = "hidden" name = "message_id" value = "0"/>
		 </form>

		</td>
        </tr>
		
		
		</table>
</body>
</html>
