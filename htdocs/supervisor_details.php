<?php
include("session.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Supervisor Details - QVW7 RSM</title>
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
                    	<td height="22" colspan="8" align="center" style="font-size:30px;font-family:Georgia">Supervisor Detailed Information</td>
                  </tr>
      </table></td>
  </tr>
</table>
<br>

<table id="subtree1" style="DISPLAY: " align="center" width="90%" border="1" cellspacing="0" cellpadding="3" align="center" class = "newfont09">

<?php 
	
	//handles the supervisor id read from GET parameters in the URL and retrieve supervisor information
	if (isset($_GET['sup_id']) and !empty($_GET['sup_id'])){
	
		$sup_id = $_GET['sup_id'];
		
		include("db_conn.php");
		
		$query = "SELECT * FROM supervisor WHERE Sup_ID = ".$sup_id.";";
				
		$result = mysql_query($query);
		
		$supervisor = mysql_fetch_array($result);
	};
?> 	     
       
		<tr>
		<td height = "20" width="30%" align = "center" class = "newfont09" colspan="2">
		<b>Supervisor ID&nbsp;</b></td><td class = "newfont09" colspan="2">&nbsp;<?php echo $supervisor['Sup_ID'];?>
		</td>
		</tr>
		<tr>
		<td class = "newfont09" height = "20" align = "center" colspan="2">
		<b>Supervisor Name&nbsp;</b><br></td><td class = "newfont09" colspan="2">&nbsp;<?php echo $supervisor['Sup_Name'];?>
		</td>
		</tr>
		<tr>
		<td class = "newfont09" height = "20" align = "center" width = "15">
		<b>Title</b></td><td class = "newfont09">&nbsp;<?php echo $supervisor['Title'];?>
		</td>
		<td class = "newfont09" height = "20" align = "center">
		<b>Faculty</b></td><td class = "newfont09">&nbsp;<?php echo $supervisor['Faculty'];?>
		</td>
		</tr>
		<tr>
		<td class = "newfont09" height = "20" align = "center" colspan="2">
		<b>Email<br></b>
		</td>
		<td class = "newfont09" colspan="2">&nbsp;<?php echo $supervisor['email'];?>
		</td>
		</tr>
		<tr>
		<td class = "newfont09" height = "20" align = "center" colspan="2">
		<b>Research Interests<br></b>
		</td>
		<td class = "newfont09" colspan="2">&nbsp;<?php echo $supervisor['Research_int'];?>
		</td>
		</tr>
		<tr>
		<td class = "newfont09" height = "50" align = "center" colspan="4">
		<b>Student Currently Instructing<br></b></td>
		</tr>
		<tr><td class = "newfont09" colspan="4"  align = "center">
		<?php 
	
		//this query get a list of ALL students that are currently instructed by the supervisor
		$student_query = "SELECT * FROM student WHERE Sup_ID ='".$supervisor['Sup_ID']."';";

		$student_result = mysql_query($student_query);
		
		while($row = mysql_fetch_array($student_result)){
			
			echo $row['Stu_Num'].'&nbsp; - &nbsp;'.$row['Stu_Name'].'<br>';
			
			}
			
			// print a message when no project is found that involves this student
			if (mysql_num_rows($student_result)==0){
			
			echo 'No currently instructed student found.';
			
			}
			
		?>
		</td></tr>
		
		
		<tr>
		<td class = "newfont09" height = "50" align = "center" colspan="4">
		<b>Project Currently Managing<br></b></td>
		</tr>
		<tr><td class = "newfont09" colspan="4"  align = "center">
		
		<?php 
	
		//this query get a list of ALL projects that are currently managed by the supervisor
		$project_query = "SELECT * FROM project WHERE Managed_by ='".$supervisor['Sup_ID']."';";

		$project_result = mysql_query($project_query);
		
		while($row = mysql_fetch_array($project_result)){
			
			echo $row['Project_ID'].'&nbsp; - &nbsp;'.$row['Project_Title'].'<br>';
			
			}
			
			// print a message when no project is found that involves this student
			if (mysql_num_rows($project_result)==0){
			
			echo 'No project managed found.';
			
			}
			
		?>
		</td></tr>
		</table>
</body>
</html>
