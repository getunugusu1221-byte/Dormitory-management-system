<?php
	include("connection.php");
	session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BRU-DMS-View Dorm</title>
<link rel="icon" type="image/png" href="imag/BRU-logo.jpg"/>
<link href="logstyle.css" rel="stylesheet" type="text/css" media="screen" />
<link href="aa.css" rel="stylesheet" type="text/css" media="screen" />
<script src="aa.js" type="text/javascript"></script>
</head>
<body>
<table  border="0" align="center" width="750px">
<!--Header-->
<tr>
<td width="100%"></td>
<td id="loginlink" align="center"><a href="login.php" id="log">Logout</a></td>
</tr>
<tr>
<td width="700px" colspan="3" height="120px">
<p><a href="index.php"><img src="imag/BRU-logo.jpg" align="left" width="150px" height="120px"></a>
<img style="border-radius:55px;box-shadow:1px 1px 12px black" src="imag/brudms.png" align="center" width="470px" height="120px"></p>
</td>
</tr>
<!--End Of Header-->
<!--Main menus-->
<tr>
<td colspan="3" width="750px">
<div id="sse2">
        <div id="sses2"  >
         <ul>
         <li><a href="index.php">Home</a></li>
         <li><a href="about.php">About Us</a></li>
         <li><a href="contact.php">Contact Us</a></li>
		 <li><a href="viewdorm.php">View Dorm</a></li>
		 <li><a href="help.php">Help</a></li>
         <li><a href="logout.php" id="log">Logout</a></li>

         </ul>
         </div>
    </div>

</td>
</tr>
<!--End of main menus-->
<table align="center" id="insides" width="850px">
<tr>
<!--Sub menus-->
<td width="25%" height="500px" valign="top" id="insides">
<table  >
<tr>
<th align="center" width="250px" height="25px" bgcolor="#336699"><font face="arial" color="white" size="2">BRU-DMS</font></th>
</tr>
<tr>
<td><br><br><center><img src="imag/BRU Class.jpg" width="150px" height="100px"></center></td>
</tr>
</table>
<br>
<br>
<br>
<table border="0">
<tr>
<th width="250px" bgcolor="#336699" height="25px"><font face="arial" color="white" size="2">Related Links</font></th>
</tr>
<tr>
<td><img src="img/Picture2.png" width="10px">&nbsp;<a href="http://www.bru.edu.et">BRU Site</a></td>
</tr>
<tr>
<td><img src="img/Picture2.png" width="10px">&nbsp;<a href="site.php">Site Map</a></td>
</tr>
<tr>
<td><img src="img/Picture2.png" width="10px">&nbsp;<a href="https://mail.google.com/a/bru/edu.et">Web Mail</a></td>
</tr>
</table>
<br>
<br>
<br>


</td>

<!--End Of Sub menus-->
<!--Body section-->
<td valign="top">

<br>
<br>
<br>
  <form id="form1" name="login" method="POST" action="viewdorm.php" onsubmit="return validateForm()">
  	
<p style="font-size:14px;color:blue;" >Your Dormitory Placement information is launched.You can see Your Dormitory Placement  information by entering your id or registration number.</p>
   <table width="399px" valign="top" align="center">
  
  <tr>

	       <td class='para1_text' width="220px"><font color="red">*</font> Student ID No.</td><td><input type="text" name="idno" required x-moz-errormessage="Enter Your ID No." ></td>
	     
    
	
    <td><input type="submit" name="submitlogin" class="button_example" value="Submit" /></td>
  </tr>
</table>
  </form>
<!--Php Script-->  
	 <?php	
	if (isset($_POST['submitlogin'])){ 
	$idno=$_POST['idno'];
			$view=mysqli_query($conn,"select * from students where stud_id='$idno'");
					$rowCheck = mysqli_num_rows($view);
if($rowCheck<1)
{
echo'<p class="wrong">The ID no is not found</p>';
echo' <meta content="5;viewdorm.php" http-equiv="refresh" />';
}
else
{
			while($row = mysqli_fetch_array($view))
            {
			$fname=$row['fname'];
			$mname=$row['mname'];
            $dorm=$row['room_no'];
            $block=$row['block_no'];
            }
			echo"<table align='center' style='border-radius:15px;border:1px solid #336699;' width='250px' height='100px'>";
			echo"<tr>";
			echo"<th colspan='2' bgcolor='#336699'><font color='white' size='2'>".$fname."&nbsp;".$mname."</font><a href='viewdorm.php'><img align='right' src='img/close_icon.gif'></a></th>";
			echo"</tr><tr>";
	echo"<td><font face='Times New Roman' size='3' color='green'>Block No:</td><td>".$block.'</td></tr>';
	echo"<td><font face='Times New Roman' size='3' color='green'>Room No:</td><td>".$dorm.'</td></tr>';
	echo"</font></table>";
	}
	}
?>



<br><br></td>
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
		<a href="index.php">Home</a>&nbsp;|&nbsp;<a href="about.php">About Us</a>&nbsp;|&nbsp;<a href="contact.php">Contact Us</a>&nbsp;|&nbsp;<a href="develop.php">Developers</a>&nbsp;|&nbsp;<a href="comment.php">Comment</a></font>
		</div>

      </footer>
</div>

<!--End of Footer-->
</body>
</html>
