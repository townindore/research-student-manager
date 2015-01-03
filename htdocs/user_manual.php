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

</script>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.STYLE2 {color: #330000}
-->
</style></head>


<body>

<form action="add_s.php" method="post" enctype="multipart/form-data" name="myform" >
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
          <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="6"><img src="images/spacer.gif" width="1" height="1" /></td>
        </tr>
      </table></td>
  </tr>
</table>
</form>
<tr><td class = "newfont09">
<p>This section will show the sceenshots of each of the modules of the system and briefly introduce what each parts do. Figure 1 shows a screen shot of the student information  module, where all the student information is retrieved from the student table  in the database and is printed on the web page in a table. Administrators can  filter students by program or find them by name or student number. The name of  each student is also a clickable hyper link that can lead to a pop up window  like in Figure 2, which shows all the detailed information of that student.</p>
<p><img src="images/screenshots/clip_image002.jpg" alt="screenshot" width="643" height="166" /> <br />
  <strong>Figure 1 Screenshot of the Student Information Module</strong></p>
<p>In the student  details pop up window, all the basic information of a student can be viewed by  the administrator. Also can be viewed is some basic information of the  supervisor who instructs this student and a list of all the projects that the  students is currently working in. As one of the main features of managing  research students, the student details pop up window also allows the  administrator to change supervisor of the student through the drop down box,  remove student from a currently working project by clicking the &ldquo;remove&rdquo; button  on the line of each project, and enrol student to a new project by choosing the  project, enter the since date and click on &ldquo;add&rdquo;. </p>
<p><img src="images/screenshots/clip_image004.gif" alt="screenshot" width="301" height="364" /><br />
</p>
<div>
  <p><strong>Figure 2 Student Details Pop-up Window</strong></p>
</div>
<p><img src="images/screenshots/clip_image006.jpg" alt="screenshot" width="643" height="132" /></p>
<div>
  <p><strong>Figure 3 Student Management - Supervision Details </strong></p>
</div>
<p>&nbsp;</p>
<p><img src="images/screenshots/clip_image008.gif" alt="screenshot" width="646" height="185" /></p>
<div>
  <p><strong>Figure 4 Student Management - Project Details </strong></p>
</div>
<p><br clear="all" />
  In the Student Management module, there are also two sub  modules: Supervision Details, where a list of student and their supervisor will  be shown like in Figure 3, and Student Project Details, where a list of  projects that the student is working in is shown like in Figure 4. These two modules  work similarly like the Student Information module in terms of filtering and  searching functions.
</p>
</p>
<p>Figure 5  then shows another module of  the research student manager, the Supervisor Information module. A list of  detailed information of all supervisors are shown here, and filtering and  searching is also supported. The supervisor names can be clicked to show a detailed  information pop up window where the student instructed and project managed by  that supervisor is also viewable. (See Figure 6) </p>
<p><img src="images/screenshots/clip_image010.gif" alt="screenshot" width="647" height="167" /></p>
<div>
  <p><strong>Figure 5 Supervisor Information</strong></p>
</div>
<p><br clear="all" />
  <br />
  <img src="images/screenshots/clip_image012.gif" alt="screenshot" width="390" height="353" /></p>
<div>
  <p><strong>Figure 6 Supervisor Information - Pop-up Window of Supervisor Details</strong>
</p></div>
<p>The Project Management Module also works  similarly like the Student Management module. It has a sub module listing a  table of basic project information of all projects like shown in Figure 7, a  sub module with a list of the project assessment scores shown like in Figure  8, and a sub module with a list of funding details of each project like shown  in Figure 9. These three sub modules are such designed to focus on different  aspects of project information.<br />
</p>
<p><img src="images/screenshots/clip_image016.gif" alt="screenshot" width="647" height="186" /><br clear="all" />
</p>
<div>
  <p><strong>Figure 7 Project Management - Project Basic Information</strong></p>
</div>
<p><img src="images/screenshots/clip_image017.png" alt="screenshot" width="646" height="184" /></p>
<div>
  <p><strong>Figure 8 Project Management - Project Assessment Management</strong></p>
</div>
<p>&nbsp;</p>
<p><img src="images/screenshots/clip_image019.png" alt="sc" width="647" height="142" /><br clear="all" />
</p>
<div>
  <p><strong>Figure 9 Project Management - Project Funding Details</strong></p>
  <br clear="all" />
</div>
<p><br />
Figure 10 shows a  screen shot of the project assessment management module. The administrator can  view the details about project assessments in the table of this module and then  make changes by inputting assessment scores and update project status using the  form provided below.</p>
<p><img src="images/screenshots/clip_image018.gif" alt="screenshot" width="510" height="584" /></p>
<div>
  <p><strong>Figure 10 Project Management - Project Details Pop-up Window</strong></p>
  <strong><br clear="all" />
</strong></div>
<p>Also noticeable is that the filtering and  searching functions are also supported on the tables, and that the project title  can be clicked on to pop up a project detail window like shown in Figure 11. This  window shows the complete detailed information about that project, the supervisor  that manages that project and a list of students that are currently working on  that project. The notification sending tool is also embedded into this pop up  window. This tool will show all the history notification that has been sent by  the administrator to this very project. The administrator can view this as well  as sending new notifications with this tool.</p>
<p><br clear="all" />
  <br />
  <img src="images/screenshots/clip_image020.gif" alt="screenshot" width="647" height="160" /></p>
<div>
  <p><strong>Figure 11 Notifications Management</strong></p>
  <strong><br clear="all" />
  </strong></div>
<p><br clear="all" />
  The last module to demonstrate here is  the Notifications module in which the administrator can view a list of the  detailed information of all the notifications. New notification can also be  sent through the Manage Notifications sub module. There&rsquo;s also a user Help  module, which is very straight forward and will not be shown here.</p>

</body>
</td>
</tr>
</html>
