<?php
	include("connection.php");  
 session_start();
if(isset($_SESSION['user_id']))
 {
  $mail=$_SESSION['user_id'];
 } else {
 ?>

<script>
  alert('You Are Not Logged In !! Please Login to access this page');
  alert(window.location='login.php');
 </script>
 <?php
 }
 ?>

<?php

$user_id=$_SESSION['user_id'];

$result=mysqli_query($conn,"select * from users where user_id='$user_id'")or die(mysqli_error($conn));
$row=mysqli_fetch_array($result);
$FirstName=$row['FNAME'];
$middleName=$row['mNAME'];
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<SCRIPT language=Javascript>
      <!--
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
      //-->
   </SCRIPT>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>BRU-DMS</title>
<link rel="icon" type="image/png" href="imag/BRU-logo.jpg"/>
<link href="logstyle.css" rel="stylesheet" type="text/css" media="screen" />
<link href="aa.css" rel="stylesheet" type="text/css" media="screen" />
<script src="aa.js" type="text/javascript"></script>
</head>
<body>
<table  border="0" align="center" width="750px">
<!--Header-->
<tr>
<td width="600px"></td>
<td><?php 
echo '<img src="img/people.png" width="40px" height="30px">&nbsp;'.'<font face="times new roman" color="white" size="3">'.$FirstName."&nbsp;".$middleName." ".'</font>';?></td>

</tr>
<tr>
<td width="750px" colspan="3" height="100px">
<p><a href="pro_manager.php"><img src="imag/BRU-logo.jpg" align="left" width="150px" height="120px"></a>
<img src="imag/promanager.png" align="center" width="490px" height="120px"></p>
</td>
</tr>
<!--End Of Header-->
<!--Main menus-->
<tr>
<td colspan="3">
<div id="sse2">
        <div id="sses2"  >
         <ul>
         <li><a href="pro_manager.php">Home</a></li>
         <li><a href="rblock.php">Register Block</a></li>
         <li><a href="logout.php" id="log">Logout</a></li>

         </ul>
         </div>
    </div>

</td>
</tr>
<!--End of main menus-->
<!--Slide shows-->
<!--End of Slide shows-->
<table align="center" id="insides" width="850px">
<tr>
<!--Sub menus-->
<td width="25%" height="400px" valign="top" id="insides">
<table>
<tr>
<th align="center" width="250px" height="25px" bgcolor="#336699"><font face="arial" color="white" size="2">BRU-DMS</font></th>
</tr>
<tr>
<td><br><br><center><img src="imag/BRU Class.jpg" width="150px" height="100px"></center></td>
</tr>
</table>
<table>
<tr>
<th align="center" width="450px" height="25px" bgcolor="#336699"><font face="arial" color="white" size="2">Manage Record</font></th>
</tr>
<tr>
<td><img src="imag/Picture2.png" width="10px">&nbsp;<a href="viewst.php">View Student info</a></td>
</tr>
<tr>
<td><img src="imag/Picture2.png" width="10px">&nbsp;<a href="viewroom.php">View Rooms</a></td>
</tr>
</table>
<br>
<br>
<table border="0">
<tr>
<th align="center" width="300px" bgcolor="#336699" height="25px"><font face="arial" color="white" size="2">Related Links</font></th>
</tr>
<tr>
<td><img src="imag/Picture2.png" width="10px">&nbsp;<a href="pmchangepassword.php">Change Password</a></td>
</tr>
<tr>
<td><img src="imag/Picture2.png" width="10px">&nbsp;<a href="viewcoms.php">View Comment</a></td>
</tr>
<tr>
<td><img src="imag/Picture2.png" width="10px">&nbsp;<a href="report.php">Generate Report</a></td>
</tr>
</table>
</td>
<!--End Of Sub menus-->
<!--Body section-->
<td valign="top">
<br>
<br>
<font face="Arial" size="2px">Block Registration</font>
<div style="width:420px; height:460px; margin:0 auto; position:relative; border:2px solid rgba(0,0,0,0); -webkit-border-radius:5px; -moz-border-radius:5px; border-radius:25px; -webkit-box-shadow:0 0 18px rgba(0,0,0,0.4); -moz-box-shadow:0 0 18px rgba(0,0,0,0.4); box-shadow:0 0 18px rgba(0,0,0,0.4); margin-top:20px; color:#000000;">

  <form id="form1" name="login" method="POST" action="rblock.php" onsubmit="return validateForm()">
 <div style="background-color:#336699;border-radius:5px;font-family:Arial, Helvetica, sans-serif; color:#000000; padding:5px; height:22px;"> 
 <div style="float:left;" ><strong><font color="white" size="2px">Block Registration</font></strong></div>
<div style="float:right; margin-right:20px; background-color:#cccccc; width:25px;  text-align:center; border-radius:10px; height:12px;"><a href="pro_manager.php" title="Close"><img src="imag/close_icon.gif"></a></div> 
 </div>
 <table width="350" align="center" style="border:1px solid #336699">  
  <br><p align="center">Block Information</p>
  <tr><td></td></tr>
		 <tr>
	     <td class='para1_text' width="220px"><font color="red">*</font> Block No:</td>
		 <td><input type="text" name="bno" id="bno" required x-moz-errormessage="Enter Block No" ></td>
	     </tr>
         <tr>
	     <td class='para1_text' width="220px"><font color="red">*</font> No OF Rooms:</td>
		 <td><input type="text" name="nor" id="nor" required x-moz-errormessage="Enter number of rooms"></td>
	     </tr>
		
		 <tr>
                <td class='para1_text' width="220px"><font color="red">*</font>Sex Category</td>
                <td><input type="radio"  name="sexc" value="male" title="choose either yes by clicking here" required />
                  Male
                  <input type="radio" name="sexc" value="female" title='choose no by clicking here' required />
                  Female</td>
              </tr>
</table> 
<table width="350" align="center" style="border:1px solid #336699">  
  <br><br><br><p align="center">Proctor Information</p>
  <tr><td><br></td></tr>
  <tr>
	     <td class='para1_text' width="220px"><font color="red">*</font> Proctor ID:</td>
		 <td><input type="text" name="user_id" id="user_id" required x-moz-errormessage="Enter Proctor ID" ></td>
	     </tr>
			  <tr>
	     <td class='para1_text' width="220px"><font color="red">*</font> Phone No:</td>
		 <td><input type="text" name="phone" id="phone" onKeyPress="return isNumberKey(event)" required x-moz-errormessage="Enter Phone"></td>
	     </tr>
			  <tr>
</table>
<br>
<table align="center"><tr><td><input type="submit" name="submit" value="Submit" class="button_example">&nbsp;&nbsp;&nbsp;<input type="reset" value="Cancel" class="button_example"></td></tr></table>
 <?php
 if(isset($_POST['submit']))
 {
$sql="INSERT INTO dorm_rooms (block_no, room_no ,gender_type, user_id, phone)
VALUES
('$_POST[bno]','$_POST[nor]','$_POST[sexc]','$_POST[user_id]','$_POST[phone]')";
if(!mysqli_query($conn,$sql))
  {
  die(mysqli_error($conn));
  echo' <p class="wrong">Proctor Is not registered</p>';
  echo'  <meta content="5;rblock.php" http-equiv="refresh" />';
  }
  else
  {
echo'<p class="success">Success</p>';
echo'  <meta content="5;rblock.php" http-equiv="refresh" />';
}
}
mysqli_close($conn);
?>
  
  </form>

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
        <p align="center"><font face="Times New Roman" color="white" size="2">Copyright &copy 2025 Borana University  ODMS. All rights reserved.</font></p>
		<br><br>
		<div class="pull-right_foot" align="center">
		&nbsp;&nbsp;&nbsp;<font face="Times New Roman" color="white" size="3">
		<a href="pro_manager.php">Home</a>&nbsp;|&nbsp;<a href="rblock.php">Register Blocks</a>&nbsp;</font>
		</div>

      </footer>
</div>

<!--End of Footer-->
</body>
</html>
