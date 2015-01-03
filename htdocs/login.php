<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Login - Research Student Manager</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link href="css/style0.css" rel="stylesheet" type="text/css" />
<link href="css/css.css" rel="stylesheet" type="text/css" />

<script>
	function validateForm()
	 {
	 var x=document.forms["login_form"]["username"].value;
	 var y=document.forms["login_form"]["password"].value;
	 if (x == null || x == "" || y == null || y == "")
	   {
	   alert("Username or Password can't be empty!");
	   return false;
	   }
	 }
</script>

</head>

<body>
<table width="100%" border="0" cellspacing="" cellpadding="50" bgcolor="#6795B4">
  <tr>
  <td align = "center" style="font-family:Times;font-size:70px;color:white"><b><i>QVW7 - Research Student Manager</i></b></td>
  </tr>
</table>
<table width="562" border="0" align="center" cellpadding="0" cellspacing="0" class="right-table03">
  <tr>
    <td width="221"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="login-text01">
      
      <tr>
        <td width="100%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="login-text01">
          
		  <tr>
            <td align="center"><div align="right"><img src="images/login_logo.png" width="120" height="120" border="0" /></div></td>
          </tr>
          
        </table></td>
        <td width="0%"><img src="images/nav04.gif" width="1" height="62" /></td>
      </tr>
    </table></td>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="2" class="login-text02">
		<form name="login_form" method="post" action="login_authenticate.php" onsubmit="return validateForm()">
  <table width="296" border="0" align="center">
    <tr>
      <td colspan="5" style="font-size:22px"><div align="center">Administrator Login</div></td>
      </tr>
    <tr>
      <td width="114" colspan="2"><div align="right" style="font-size:16px">User Name：</div></td>
      <td width="172" colspan="2"><label>
        <input type="text" name="username" id="username" style="width:180px;font-size:20px" size="19" />
      </label></td>
    </tr>
    <tr>
      <td><div align="right" style="font-size:16px"">Password：</div></td>
      <td colspan="2"><label>
        <input type="password" name="password" id="password" style="width:180px;font-size:20px" size="19" /> 
      </label></td>
    </tr>
    
    <tr>
      <td colspan="3"><div align="center"><br>
        <label>
        <input type="submit" name="button" id="button" value="Login" />
        </label>
        <input type="reset" name="button2" id="button2" value="Reset" />
        <input type="hidden" name="action" id="action"  value="do" />
      </div></td>
    </tr>
  </table>
</form>
        </td>
        </tr>
      
    </table></td>
  </tr>
  <tr>
	<td align="center" colspan="2" style="font-family:Georgia;font-size:13px"><br><br>Developed by <b>Yingduo Tang</b>
	<br></td>
	</tr>
</table>
</body>
</html>