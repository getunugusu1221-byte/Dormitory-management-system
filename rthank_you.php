<?php
session_start();
include("connection.php");
if(isset($_SESSION['validuser']))
{
$username=$_SESSION['validuser'];
}
else
{
?>
<!-- <script>
alert("you are already loged out");
alert(window.location='login.php');
</script> -->
<?php
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Borana University Online Dormitory managent system</title>
<link rel="icon" type="image/png" href="imag/BRU-logo.jpg"/>
<link href="adminstyle.css" rel="stylesheet" type="text/css" media="screen" />
<link href="slideshow/js-image-slider.css" rel="stylesheet" type="text/css" />
<script src="slideshow/js-image-slider.js" type="text/javascript"></script>
<link href="aa.css" rel="stylesheet" type="text/css" media="screen" />
<script src="aa.js" type="text/javascript"></script>
<script language="javascript">
		
  function logoutcon()
  {
   var conlog = confirm('Are you sure you want to log out !!');
   if(conlog)
   {
   alert(window.location="logout.php");
   }
   else
   {
    return false;
   }
  }
				 
	 </script>
</head>
<body>
<table  border="0" align="center">
<!--Header-->
<tr >
<br><br>
<td width="720px"></td>
<td><img src="img/people.png" width="80px" height="30px"></td>
<td id="logoutlink" align="center"><a href="logout.php" id="log" onclick="logoutcon();">Logout</a></td>
</tr>
<tr>
<td width="950px" colspan="3" height="150px">
<p><a href="index.php"><img src="imag/BRU-logo.jpg" align="left" width="190px" height="150px"></a></p>
</td>
</tr>
<!--End Of Header-->
<!--Main menus-->
<tr>
<td colspan="3">
<div id="sse2">
        <div id="sses2"  >
         <ul>
         <li><a href="admin.php">Home</a></li>
         <li><a href="viewcom.php">View Comment</a></li>
         <li><a href="postinfo.php">Post Info</a></li>
		 <li><a href="viewstudent.php">View StudentInfo</a></li>
         <li><a href="logout.php" id="log">Logout</a></li>

         </ul>
         </div>
    </div>

</td>
</tr>
<!--End of main menus-->
<!--Slide shows-->
<!--End of Slide shows-->
<table align="center" id="insides" width="950px">
<tr>
<!--Sub menus-->
<td width="190px" height="600px" valign="top" id="insides">
<table  >
<tr>
<th align="center" width="450px" height="25px" bgcolor="#336699"><font face="arial" color="white" size="2">Manage Record</font></th>
</tr>
<tr>
<td><img src="imag/Picture2.png" width="10px">&nbsp;<a href="#">Search</a></td>
</tr>
<tr>
<td><img src="imag/Picture2.png" width="10px">&nbsp;<a href="#">Update</a></td>
</tr>
<tr>
<td><img src="imag/Picture2.png" width="10px">&nbsp;<a href="#">Delete</a></td>
</tr>
</table>
<br>
<br>
<br>
<table border="0">
<tr>
<th width="300px" bgcolor="#336699" height="25px"><font face="arial" color="white" size="2">Manage Account</font></th>
</tr>
<tr>
<td><img src="imag/Picture2.png" width="10px">&nbsp;<a href="cua.php">Create User Account</a></td>
</tr>
<tr>
<td><img src="imag/Picture2.png" width="10px">&nbsp;<a href="#">Remove User Account</a></td>
</tr>
<tr>
<td><img src="imag/Picture2.png" width="10px">&nbsp;<a href="#">Edit User Account</a></td>
</tr>
</table>
<br>
<br>
<br>
<br>
<br>
<?php 
include "cal.php"; 
?>


</td>
<!--End Of Sub menus-->
<!--Body section-->
<td valign="top">
<br>
<br>
<font face="Arial" size="2px">
<div style="width:480px; height:170px; margin:0 auto; position:relative; border:2px solid rgba(0,0,0,0); -webkit-border-radius:5px; -moz-border-radius:5px; border-radius:25px; -webkit-box-shadow:0 0 18px rgba(0,0,0,0.4); -moz-box-shadow:0 0 18px rgba(0,0,0,0.4); box-shadow:0 0 18px rgba(0,0,0,0.4); margin-top:20px; color:#000000;">

  <form id="form1" name="login" method="POST" action="rblock.php" onsubmit="return validateForm()">
 <div style="background-color:#336699;border-radius:5px;font-family:Arial, Helvetica, sans-serif; color:#000000; padding:5px; height:22px;"> 
 
 
 <div style="float:left;" ><strong><font color="white" size="2px">Success</font></strong></div>
 <div style="float:right; margin-right:3px; background-color:#cccccc; width:25px;  text-align:center; border-radius:10px; height:12px;"><a href="admin.php" title="Close">X</a></div>
 
 
 </div><br><br>
<center><h2>Thanks for registering!</h2>
<br>
Your registration is now complete.
<p>
<?php
echo'<meta content="3;rblock.php" http-equiv="refresh" />';
?>
</p></center>
  </div>

<br><br><br>
</font>
                   


</td>
</tr>
</table>
<!--End Body of section-->
</table>
<!--Footer-->

<div id="sample">
      <footer>
	  <br>
	  <div align="right">
<a href="#top"><img src="img/arrow_up.png" width="40px" title="Scroll Back to Top"></a>
</div>
        <p align="center"><font face="Times New Roman" color="white" size="2">Copyright &copy 2026 Borana University  ODMS. All rights reserved.</font></p>
		<br><br>
		<div class="pull-right_foot" align="center">
		&nbsp;&nbsp;&nbsp;<font face="Times New Roman" color="white" size="3">
		<a href="admin.php">Home</a>&nbsp;|&nbsp;<a href="viewcom.php">View Comment</a>&nbsp;|&nbsp;<a href="Postinfo.php">Post Info</a>&nbsp;|&nbsp;<a href="viewstudent.php">View StudentInfo</a></font>
		</div>

      </footer>
</div>

<!--End of Footer-->
</body>
</html>
