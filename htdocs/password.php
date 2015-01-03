<?php
include 'session.php';
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

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  
  <tr>
    <td height="30">      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="57" bgcolor="#6795B4">
            
		   <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
		    <tr>
			  <table width="891" border="0" class="top-font01">
                 
                </table>	
		    </tr>
          </table></td>
        </tr>
    </table></td></tr>
  <tr>
    <td><table id="subtree1" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
		
<link href="css/style.css" rel="stylesheet" type="text/css" />
	<br><br>
	<form name="form1" method="post" action="password_s.php" onSubmit="return ee()">
      <table width="" border="0" align="center" bgcolor="#6795B4">
        <tr>
          <td width="200" align="right" style="font-size:20px;font-family:Georgia;color:white">   Old Password</td>
          <td width="144" class="ctxt"><input name="old_pwd" type="password" id="old_pwd" size="25" class="newfont03"></td>
        </tr>
        <tr>
          <td width="200" align="right" style="font-size:20px;font-family:Georgia;color:white">  New Password</td>
          <td class="ctxt"><input name="new_pwd" type="password" id="new_pwd" size="25" class="newfont03"></td>
        </tr>
        <tr>
          <td width="200" align="right" style="font-size:20px;font-family:Georgia;color:white"> Confirm Password</td>
          <td class="ctxt"><input name="comfirm_pwd" type="password" id="comfirm_pwd" size="25" class="newfont03"></td>
        </tr>
         <tr>
          <td width="200" class="button"></td>
          <td class="ctxt"><input type="submit" name="Submit" value="Confirm" style="font-size:20px;font-family:Georgia;">
		  <input type="reset" name="reset" value="Reset" style="font-size:20px;font-family:Georgia;"></td>
        </tr>
      </table>
      <p class="gfont">&nbsp;</p>
	</form>
</td>
  </tr>
  <script language="javascript">
  function ee(){
  if(document.form1.old_pwd.value.length<5)
        {
          alert("Your password must be at least 5 characters!");
          return false;
        }
         
         
         if(document.form1.new_pwd.value.length<5)
       {
         alert("Your password must be at least 5 characters!");
        return false;
        }
		if(document.form1.confirm_pwd.value.length<5)
        {
          alert("Your password must be at least 5 characters!");
          return false;
        }
		
		
		if(document.form1.confirm_pwd.value!=document.form1.xpwd.value)
       {
          alert("New Password and Confirm Password does not match!");
          return false;
		 
       }
	   if(document.form1.old_pwd.value==document.form1.xpwd.value)
       {
          alert("New Password can't be identical to old password!");
          return false;
       }
                }
  </script>
  <tr><td height="20" align="center" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
</tr>
      
</body>
</html>

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
</form>
</body>
</html>
