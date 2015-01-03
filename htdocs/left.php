<?php
include("session.php");
?>

<html>
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
	background-image: url(images/left.gif);
}
-->
</style>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
-->
</style></head>
<SCRIPT language=JavaScript>
function index_box(idt){
    var nametu="indexing"+idt;
    var tp = document.getElementById(nametu);
    tp.src="images/ico05.gif";
	
	for(var i=1;i<30;i++)
	{
	  var nametu2="indexing"+i;
	  if(i!=idt*1)
	  {
	    var tp2=document.getElementById('indexing'+i);
		if(tp2!=undefined)
	    {tp2.src="images/ico06.gif";}
	  }
	}
}

function list(idstr){
	var name1="subtree"+idstr;
	var name2="img"+idstr;
	var objectobj=document.all(name1);
	var imgobj=document.all(name2);
	
	
	//alert(imgobj);
	
	if(objectobj.style.display=="none"){
		for(i=1;i<10;i++){
			var name3="img"+i;
			var name="subtree"+i;
			var o=document.all(name);
			if(o!=undefined){
				o.style.display="none";
				var image=document.all(name3);
				//alert(image);
				image.src="images/ico04.gif";
			}
		}
		objectobj.style.display="";
		imgobj.src="images/ico03.gif";
	}
	else{
		objectobj.style.display="none";
		imgobj.src="images/ico04.gif";
	}
}

</SCRIPT>

<body>
<table width="198" border="0" cellpadding="0" cellspacing="0" class="left-table01">
  <tr>
    <TD>
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
		  <tr>
			<td width="220" height="55" bgcolor="#6795B4" >
				<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
				  <tr>
					<td width="75%" height="22" style="font-size:20px; font-family: Times New Roman;color:white;" align = "center">Welcome!&nbsp;&nbsp;<b><i><?php echo($_SESSION["user"]);?></i></b></td>
				  </tr>  
				  <tr>
					<td height="22" class="left-font01" align = "center" style="font-size:20px; font-family: Times New Roman;color:white;">
						[<a href="password.php" target="mainFrame" style="font-size:20px; font-family: Times New Roman;color:white;">Reset</a>]
						[<a href="edit.php" target="_top" style="font-size:20px; font-family: Times New Roman;color:white;">Logout</a>]</td>
				  </tr>
				</table>
			</td>
		  </tr>
		</table>

		
		<TABLE width="100%" border="0" cellpadding="0" cellspacing="0" class="left-table03">
          <tr>
            <td height="29">
				<table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
						<td width="8%"><img name="img8" id="img8" src="images/ico04.gif" width="8" height="11" /></td>
						<td width="92%">
								<a href="student_information.php" target="mainFrame" class="left-font03" onClick="list('8');index_box('20');" >Student Management</a></td>
					</tr>
				</table>
			</td>
          </tr>		  
        </TABLE>
		<table id="subtree8" style="DISPLAY: none" width="80%" border="0" align="center" cellpadding="0" 
				cellspacing="0" class="left-table02">
				<tr>
				  <td width="9%" height="20" ><img id="indexing20" src="images/ico06.gif" width="8" height="12" /></td>
				  <td width="91%"><a href="student_information.php" target="mainFrame" class="left-font03" onClick="index_box('20');">Student Information</a></td>
				</tr>
				<tr>
				  <td width="9%" height="20" ><img id="indexing21" src="images/ico06.gif" width="8" height="12" /></td>
				  <td width="100%"><a href="student_supervision.php" target="mainFrame" class="left-font03" onClick="index_box('21');">Supervision Details</a></td>
				</tr>
				<tr>
				  <td width="9%" height="20" ><img id="indexing22" src="images/ico06.gif" width="8" height="12" /></td>
				  <td width="91%"><a href="student_project.php" target="mainFrame" class="left-font03" onClick="index_box('22');">Student Project Details</a></td>
				</tr>
				
      </table>
		

		
		<TABLE width="100%" border="0" cellpadding="0" cellspacing="0" class="left-table03">
          <tr>
            <td height="29">
				<table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
						<td width="8%"><img name="img7" id="img7" src="images/ico04.gif" width="8" height="11" /></td>
						<td width="92%">
								<a href="supervisor_information.php" target="mainFrame" class="left-font03" onClick="list('7');index_box('17');" >Supervisor Information</a></td>
					</tr>
				</table>
			</td>
          </tr>		  
        </TABLE>
		<table id="subtree7" style="DISPLAY: none" width="80%" border="0" align="center" cellpadding="0" 
				cellspacing="0" class="left-table02">
				<tr>
				  <td width="9%" height="20" ><img id="indexing17" src="images/ico06.gif" width="8" height="12" /></td>
				  <td width="91%">
						<a href="supervisor_information.php" target="mainFrame" class="left-font03" onClick="index_box('17');">Supervisor Details</a></td>
				</tr>
				
				
      </table>



        <TABLE width="100%" border="0" cellpadding="0" cellspacing="0" class="left-table03">
          <tr>
            <td height="29">
				<table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
						<td width="8%"><img name="img1" id="img1" src="images/ico04.gif" width="8" height="11" /></td>
						<td width="92%">
								<a href="project_information.php" target="mainFrame" class="left-font03" onClick="list('1');index_box('1');" >Project Management</a></td>
					</tr>
				</table>
			</td>
          </tr>		  
        </TABLE>
		<table id="subtree1" style="DISPLAY: none" width="80%" border="0" align="center" cellpadding="0" 
				cellspacing="0" class="left-table02">
				<tr>
				  <td width="9%" height="20" ><img id="indexing1" src="images/ico06.gif" width="8" height="12" /></td>
				  <td width="91%"><a href="project_information.php" target="mainFrame" class="left-font03" onClick="index_box('1');">Project Information</a></td>
				</tr>
				<tr>
				  <td width="9%" height="20" ><img id="indexing4" src="images/ico06.gif" width="8" height="12" /></td>
				  <td width="91%"><a href="project_assessment.php" target="mainFrame" class="left-font03" onClick="index_box('4');">Project Assessment</a></td>
				</tr>
				<tr>
				  <td width="9%" height="20" ><img id="indexing2" src="images/ico06.gif" width="8" height="12" /></td>
				  <td width="91%"><a href="project_funding.php" target="mainFrame" class="left-font03" onClick="index_box('2');">Funding Tracking</a></td>
				</tr>
				
      </table>
	  
	  
	  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="left-table03">
          <tr>
            <td height="29"><table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="8%" height="12"><img name="img2" id="img2" src="images/ico04.gif" width="8" height="11" /></td>
                  <td width="92%"><a href="notifications_check.php" target="mainFrame" class="left-font03" onClick="list('2');index_box('7');" >Notifications</a></td>
                </tr>
            </table></td>
          </tr>
      </table>
	  
	  <table id="subtree2" style="DISPLAY: none" width="80%" border="0" align="center" cellpadding="0" cellspacing="0" class="left-table02">
        
		<tr>
          <td width="9%" height="20" ><img id="indexing7" src="images/ico06.gif" width="8" height="12" /></td>
          <td width="91%"><a href="notifications_check.php" target="mainFrame" class="left-font03" onClick="index_box('7');">View All Notifications</a></td>
        </tr>
		
		<tr>
          <td width="9%" height="20" ><img id="indexing8" src="images/ico06.gif" width="8" height="12" /></td>
          <td width="91%"><a href="notifications_manage.php" target="mainFrame" class="left-font03" onClick="index_box('8');">Manage Notifications</a></td>
        </tr>
		
      </table>
	  
	  
	   <table width="100%" border="0" cellpadding="0" cellspacing="0" class="left-table03">
          <tr>
            <td height="29"><table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="8%" height="12"><img name="img4" id="img4" src="images/ico04.gif" width="8" height="11" /></td>
                  <td width="92%"><a href="user_manual.php" target="mainFrame" class="left-font03" onClick="list('4');index_box('11');" >Help</a></td>
                </tr>
            </table></td>
          </tr>
      </table>
	  
	  <table id="subtree4" style="DISPLAY: none" width="80%" border="0" align="center" cellpadding="0" cellspacing="0" class="left-table02">
		<tr>
          <td width="9%" height="20" ><img id="indexing11" src="images/ico06.gif" width="8" height="12" /></td>
          <td width="91%"><a href="user_manual.php" target="mainFrame" class="left-font03" onClick="index_box('11');">User Manual</a></td>
        </tr>
	  	
      </table>
		
    </TD>
	</tr>
  
</table>
</body>
</html>
