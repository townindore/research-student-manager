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
	
		$query = "SELECT * FROM supervisor;";
				
		}
	else {
	
	//applying filters by changing the SQL queries
	if (isset($_POST["filtered_faculty"]) and $_POST["filtered_faculty"]!= "N/A")
		{
			if ($_POST["filtered_faculty"]!="all"){
				$faculty_name = $_POST["filtered_faculty"];
				$query = "SELECT * 
						  FROM supervisor 
						  WHERE Faculty = '".$faculty_name."'
						  ORDER BY Sup_ID";
						  }
			else {
				$query = "SELECT * FROM supervisor;";
				}
		}
	//applying searching by changing the SQL queries
	else if (isset($_POST["search_keyword"])) {
			
			$keyword = $_POST["search_keyword"];
			
			if (isset($_POST["search_criteria"])){
			
				if ( $_POST["search_criteria"] == "name" ){
				
					$query = "SELECT * 
							  FROM supervisor 
							  WHERE Sup_Name LIKE '%".$keyword."%'
							  ORDER BY Sup_ID";
					
				
				} else if ($_POST["search_criteria"] == "id"){
				
					$query = "SELECT * 
							  FROM supervisor 
							  WHERE Sup_ID LIKE '%".$keyword."%'
							  ORDER BY Sup_ID";
				}
			}
		}
	
	//no filters and no searching
	else{
		
		$query = "SELECT * FROM supervisor;";
		
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
                <td height="40" class="font42">
				<table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#464646" class="newfont03">
				<tr>
		
			<?php
			$faculty_query = "SELECT DISTINCT supervisor.Faculty FROM supervisor;";
			$faculties = mysql_query($faculty_query); 
			?>
			<br>
			<td height = "30" bgcolor="#FFFFFF" style="font-size:20px; font-family: Georgia, 'Times New Roman', Times, serif;" colspan = "7" align = "right">
			<form name = "searchform" id = "searchform" action = "supervisor_information.php" method = "post"> 
				Filter by Faculty: 
				<select name = "filtered_faculty" id = "filtered_faculty" style="font-family:Georgia;font-size:15px" onChange = "filterFunction()">
				<option selected="selected" value = "N/A">[Please Select]</option>
				<option value = "all" >== All Faculties ==</option>
					<?php

						while($row = mysql_fetch_array($faculties)){
							$faculty = $row['Faculty'];
							echo '<option value="'.$faculty.'">'.$faculty.'</option>';
						}
					?>
				</select>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				Find Supervisor: <input type = "text" name = "search_keyword" style = "font-family:Georgia;font-size:15px">
				<input type = "submit" name = "search" value = "Search" style = "font-family:Georgia;font-size:15px">
				<input type = "submit" name = "clear" value = "Clear Filter & Search" style = "font-family:Georgia;font-size:15px"><br>
				<input type="radio" name="search_criteria" checked="checked" value="name">by name
				<input type="radio" name="search_criteria" value="id">by supervisor id&nbsp;&nbsp;
			</form></td></tr>
				<tr class="CTitle" >
                    	<td height="22" colspan="7" align="center" style="font-size:20px;font-family:Georgia;">Supervison Details</td>
                  </tr>
                  <tr bgcolor="#EEEEEE">
					<td>Supervisor ID</td>
				    <td>Supervisor Name</td>
					<td>Title</td>
					<td>Faculty</td>
					<td>Research Interest</td>
					<td>Email Address</td>
                  </tr>
				    <?php
						while($row = mysql_fetch_array($result)){
							
								$sup_name = stripslashes($row['Sup_Name']);
								$sup_id = stripslashes($row['Sup_ID']);
								$title = stripslashes($row['Title']);
								$faculty = stripslashes($row['Faculty']);
								$research_int = stripslashes($row['Research_int']);
								$email = stripslashes($row['email']);
								
								echo ('<tr bgcolor="#FFFFFF"><td class="newfont03">' . $sup_id . '</td>');
								echo '<td class="newfont03"><a href="#" onClick="window.open(\'supervisor_details.php?sup_id='.$sup_id.'\',\'Supervisor Details\',\'location=yes,toolbar=yes,scrollbars=yes,width=700,height=700\')"><u>' . $sup_name . '</u></a></td>';
								echo '<td class="newfont03">' . $title . '</td>';
								echo '<td class="newfont03">' . $faculty . '</td>';
								echo '<td class="newfont03">' . $research_int . '</td>';
								echo '<td class="newfont03">' . $email . '</td></tr>';
						}
						
						//if no results retrieved, print a message to indicate
						if (mysql_num_rows($result)==0){
			
						echo '<tr bgcolor="#FFFFFF"><td class = "newfont09" colspan="6"  align = "center">No result found.</td></tr>';
					
						}
						
						
					?>      
            </table></td>
        </tr>
      </table>
      <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="6"><img src="images/spacer.gif" width="1" height="1" /></td>
        </tr>
        <tr>
          <td height="33">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
