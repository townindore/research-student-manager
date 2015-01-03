<?php
include("session.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>QVW7-Project Assessment Management Tool</title>
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
	
	function validateForm()
	{	
		var escore = document.forms["assess_form"]["early_score"].value;
		var mscore = document.forms["assess_form"]["mid_score"].value;
		var fscore = document.forms["assess_form"]["final_score"].value;
		
		if (isNaN(escore) || isNaN(mscore) || isNaN(fscore)){
		
			alert ("Sorry, Assessment Score must be a number!");
			return false;
		}
		else if (escore < 0 || escore > 100 || mscore < 0 || mscore > 100 || fscore < 0 || fscore > 100){
			
			alert ("Sorry, Assessment Score must be within 0 to 100!");
			return false;
		} else {
			
			return true;
			this.close();
		}
	}
	
	function enableEdit()
	{	
	
		
		if (document.getElementById("modifyStage").checked){
			
			document.getElementById("current_stage").disabled=false;
		
		}else{
		
			document.getElementById("current_stage").disabled=true;
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
                    	<td height="22" colspan="8" align="center" style="font-size:30px;font-family:Georgia">Project Management Tool</td>
                  </tr>
      </table></td>
  </tr>
</table>
<br>

<table id="subtree1" style="DISPLAY: " align="center" width="90%" border="1" cellspacing="0" cellpadding="3" align="centr" class = "newfont09">

<?php 
	
	//hanldes the project id posted from the button and open the corresponding project for update
	if (isset($_GET['pid']) and !empty($_GET['pid'])){
	
		$pid = $_GET['pid'];
		
		include("db_conn.php");
		$query = "SELECT * FROM project WHERE Project_ID = ".$pid.";";
		$result = mysql_query($query);
		
		$project = mysql_fetch_array($result);
	};
?> 	     
        
<form action="update_project.php" method="post" name="assess_form" onsubmit="return validateForm();">

		<input type = "hidden" name = "project_id" value = "<?php echo $project['Project_ID'];?>"/>

		<tr>
		<td height = "50" width="30%" align = "center" class = "newfont09">
		<b>Project ID&nbsp;</b></td><td class = "newfont09">&nbsp;<?php echo $project['Project_ID'];?>
		</td>
		</tr>
		<tr>
		<td class = "newfont09" height = "50" align = "center">
		<b>Project Title&nbsp;</b><br></td><td class = "newfont09">&nbsp;<?php echo $project['Project_Title'];?>
		</td>
		</tr>
		<tr>
		<td class = "newfont09" height = "50" align = "center">
		<b>Current Stage </b></td><td class = "newfont09">&nbsp;<?php echo $project['Current_Stage'];?>
		</td>
		</tr>
		<tr>
		<td class = "newfont09" height = "50" align = "center" colspan="2">
		<b>Project Assessment Scores<br></b>
		</td>
		</tr>
		<tr>
		<td class = "newfont09" height = "50" align = "center">
		<b>Early Term<br></b></td><td class = "newfont09" >&nbsp;
		<input class = "newfont09" name = "early_score" id="early_score" type="text" value = "<?php echo $project['Early_Assess'];?>"></input>
		out of 100
		</td>
		</tr>
		<tr>
		<td class = "newfont09" height = "50" align = "center">
		<b>Mid Term<br></b></td><td class = "newfont09">&nbsp;
		<input class = "newfont09" name = "mid_score" id="mid_score" type="text" value = "<?php echo $project['Mid_Assess'];?>"></input>
		out of 100
		</td>
		</tr>
		<tr>
		<td class = "newfont09" height = "50" align = "center">
		<b>Final Score<br></b></td><td class = "newfont09">&nbsp;
		<input class = "newfont09" name = "final_score" id="final_score" type="text" value = "<?php echo $project['Final_Assess'];?>"></input>
		out of 100
		</td>
		</tr>
		<tr>
		<td class = "newfont09" height = "50" align = "center" colspan="2">
		<input type="checkbox" name="update current stage" id="modifyStage" onclick = "enableEdit()"/>
		Update Project Current Stage to
		<Select class = "newfont09" name = "current_stage" id="current_stage" disabled>
			<option selected="selected" value = "N/A">[Please Select]</option>
			<option value = "Proposing">Proposing</option>
			<option value = "Early">Early</option>
			<option value = "Mid-Tern">Mid-Term</option>
			<option value = "Final">Final</option>
			<option value = "Dropped">Dropped</option>
			<option value = "Completed">Completed</option>
		</select>
		</td>
		</tr>
		<tr  border = "0">
		<td height = "50" align = "center" colspan="2">
		<input class = "newfont09" name = "submit" type = "submit" value="Update">
		<input class = "newfont09" type = "reset" value="Reset" onclick = "enableEdit()">
		</td></tr>
		
		
		
		</form>
		
		</table>
</body>
</html>
