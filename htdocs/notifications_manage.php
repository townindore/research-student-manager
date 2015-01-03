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

function removeNotification(clicked_id)
	{
		var message_id = clicked_id.toString();
			
		if (confirm('Are your sure to remove Message ID: '+message_id+" ?")) {
			document.remove_notification.message_id.value = message_id;
			document.remove_notification.submit();
		} else {
			
		}
	}

	
	function validateForm()
	{	
		var pid = document.forms["send_notification"]["project_id"].value;
		var content = document.forms["send_notification"]["content"].value;
		
		if (pid == "N/A"){
		
			alert ("Project ID must be specified!");
			return false;
		}
		else if (content == null || content == ""){
			
			alert ("Message Content can not be empty!");
			return false;
			
		} else if (!document.forms["send_notification"]["toStu"].checked && !document.forms["send_notification"]["toSup"].checked){
			
			alert ("At least one of \"To Student\" or \"To Supervisor\" must be checked!");
			return false;
		
		}else{
			
			return true;
			this.close();
		}
	}
	

</script>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.STYLE2 {color: #330000}
-->
</style></head>

<?php 
	include("db_conn.php");
	// this handles the removing action
		
		if(isset($_POST["message_id"])){
				
			$message_id = $_POST["message_id"];
			
			$remove_query = "DELETE FROM `notification` WHERE Message_ID = '".$message_id."';";
			$remove_result = mysql_query($remove_query);
		}
	
	// this retrieves all the notifications from the database
	$query="SELECT * FROM notification;";
	$result = mysql_query($query);
	
	
	
?> 

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
    </table></td></tr>
  <tr>
    <td><table id="subtree1" style="DISPLAY: " width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="6"><img src="images/spacer.gif" width="1" height="1" /></td>
        </tr>
		<td height="40" class="font42">
				<table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#464646" class="newfont03">
				 <tr class="CTitle" >
                    	<td height="22" colspan="8" align="center" style="font-size:20px;font-family:Georgia;">All Notifications</td>
                  </tr>
		 <tr bgcolor="#EEEEEE">
				    <td>Project ID</td>
					<td>Message_ID</td>
					<td>Date_Time</td>
					<td>Content</td>
					<td>To Students?</td>
					<td>To Supervisors?</td>
					<td></td>
                  </tr>
				  
				  <?php
						while($row = mysql_fetch_array($result)){
							
								$pid = stripslashes($row['Project_ID']);
								$message_id = stripslashes($row['Message_ID']);
								$date_time = stripslashes($row['Date_Time']);
								$content = stripslashes($row['Content']);
								$toStu = stripslashes($row['isToStu']);
								$toSup = stripslashes($row['isToSup']);
								
								switch($toStu){
									case '0':
									$toStu = 'No';break;
									case '1':
									$toStu = 'Yes';break;
								}
								
								switch($toSup){
									case '0':
									$toSup = 'No';break;
									case '1':
									$toSup = 'Yes';break;
								}
								
								echo ('<tr bgcolor="#FFFFFF"><td class="newfont03">' . $pid. '</td>');
								echo '<td class="newfont03">' . $message_id . '</td>';
								echo '<td class="newfont03">' . $date_time . '</td>';
								echo '<td class="newfont03">' . $content . '</td>';
								echo '<td class="newfont03">' . $toStu . '</td>';
								echo '<td class="newfont03">' . $toSup . '</td>';
								echo '<td class="newfont03" width="10"><button class = "dhbutton02" id ="'.$message_id.'" onclick="removeNotification(this.id)">Remove</button></td></tr>';
						}
					?>    
      </table></td>
  </tr>
</table>
  </tr>
  <tr><td><br><hr><br></td></tr>
  <tr class="CTitle" >
      <td height="50" colspan="8" align="center" style="font-size:20px;font-family:Georgia;">Send Notification</td>
  </tr>
  <?php 
	include("db_conn.php");
    $query="SELECT * FROM project;";
	$result = mysql_query($query);
	?> 
  <tr>
		<td class="newfont02" align="center">
		
		 <form name = "send_notification" method="post" action="notifications_send.php" onsubmit="return validateForm();">
		   <br><br><b>To:&nbsp; </b><select name = "project_id" id = "pid">
		<option selected="selected" value = "N/A">[Please Select]</option>
			<?php

				while($row = mysql_fetch_array($result)){
					
					$pid = stripslashes($row['Project_ID']);
					$title = stripslashes($row['Project_Title']);
					
					echo '<option value="' . $pid . '">'. $pid .':' . $title .'</option>';
				}
			?>
		</select>
		   <br><b>Message:</b><br><textarea name="content" cols="60" rows="5"></textarea><br><br>
		   <input type="checkbox" name="toStu" id="toStu">To Students&nbsp;&nbsp;&nbsp; 
		   <input type="checkbox" name="toSup" id="toSup">To Supervisor<br><br>
		   <input type="submit" name="submit" value="Send Notification">
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
