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

$result1=mysqli_query($conn,"select * from block where user_id='$user_id'")or die(mysqli_error($conn));
$row=mysqli_fetch_array($result1);
$block=$row['block_no'];
$sex=$row['sexcategory'];
$faculty=$row['faculty'];
$norooms=$row['norooms'];

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
<title>Room Registration...</title>
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
<p><a href="proctor.php"><img src="imag/BRU-logo.jpg" align="left" width="150px" height="120px"></a>
<img src="imag/proctor.png" align="center" width="490px" height="120px"></p>
</td>
</tr>
<!--End Of Header-->
<!--Main menus-->
<tr>
<td colspan="3">
<div id="sse2">
        <div id="sses2"  >
         <ul>
         <li><a href="proctor.php">Home</a></li>
         <li><a href="registerrooms.php">Register Rooms</a></li>
          <li><a href="logout.php" id="log">Logout</a>
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
<td><img src="img/Picture2.png" width="10px">&nbsp;<a href="assign.php">Assign Student</a></td>
</tr>
<tr>
<td><img src="img/Picture2.png" width="10px">&nbsp;<a href="viewstu.php">View Student Info</a></td>
</tr>
</table>
<br>
<br>
<table border="0">
<tr>
<th align="center" width="300px" bgcolor="#336699" height="25px"><font face="arial" color="white" size="2">Related Links</font></th>
</tr>
<tr>
<td><img src="img/Picture2.png" width="10px">&nbsp;<a href="changepassword.php">Change Password</a></td>
</tr>
<tr>
<td><img src="img/Picture2.png" width="10px">&nbsp;<a href="greporta.php">Generate Report</a></td>
</tr>
</table>
<br>
<br>
</td>
<!--End Of Sub menus-->
<!--Body section-->
<td valign="top">
<br>
<br>
<font face="Arial" size="2px">Room Registration......</font>
  <!--For the upload Form-->  
<div style="width:420px; height:270px; margin:0 auto; position:relative; border:2px solid rgba(0,0,0,0); -webkit-border-radius:25px; -moz-border-radius:25px; border-radius:35px; -webkit-box-shadow:10 10 18px rgba(0,0,0,0.4); -moz-box-shadow:0 0 18px rgba(0,0,0,0.4); box-shadow:0 0 18px rgba(0,0,0,0.4); margin-top:20px; color:#000000;">
 <div style="background-color:#336699;border-radius:5px;font-family:Arial, Helvetica, sans-serif; color:#000000; padding:5px; height:22px;"> 
 
 
 <div style="float:left;" ><strong><font color="white" size="2px">Room Registration...</font></strong></div>
 <div style="float:right; margin-right:20px; background-color:#cccccc; width:25px;  text-align:center; border-radius:30px; height:12px;"><a href="proctor.php" title="Close"><img src="img/close_icon.gif"></a></div>
 </div>
 <?php
 if(isset($_POST['submit']))
 {
if (!$conn)
  {
  die('Could not connect: ' . mysqli_error($conn));
  }
  $rno=$_POST['room'];
for($i=1;$i<=$rno;$i++)
{
$sql="INSERT INTO room (block_no, room_no ,nobed)VALUES('$_POST[block]','$i','$_POST[nobed]')";
$aa=mysqli_query($conn,$sql);
}
if (!$aa)
  {
  //die(mysqli_error($conn));
         echo' <p class="wrong">Already Registered</p>';
  echo'  <meta content="5;registerrooms.php" http-equiv="refresh" />';
  }
  else
  {
echo'<p class="success">Success</p>';
echo'  <meta content="5;registerrooms.php" http-equiv="refresh" />';
}

}
mysqli_close($conn);
?>
  <form  method="POST" action="registerrooms.php">
          <table>
		  <br><br>
            <tr>
			  <td class='para1_text' width="220px"><font color="red">*</font>Block No.</td>
              <td><input type="text" name="block" value="<?php echo $block;?>" =""></td>
            </tr>
            <tr>
              <td class='para1_text' width="220px"><font color="red">*</font>Total No. Of Rooms</td>
              <td><input type="text" name="room" value="<?php echo $norooms;?>" =""></td>
            </tr>
			<tr>
              <td class='para1_text' width="220px"><font color="red">*</font>No.Of Beds per Dorm</td>
              <td><input type="text" name="nobed" onKeyPress="return isNumberKey(event)" required x-moz-errormessage="Enter No Of Beds"></td>
            </tr>
            <tr>
              <td></td>
              <td><input type="submit" name="submit" value="Save" class="button_example" />
                
            </tr>
          </table>
        </form>
  </div>
				   
				   
				   
				   
				   
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
<a href="#top"><img src="imag/arrow_up.png" width="40px" title="Scroll Back to Top"></a>
</div>
        <p align="center"><font face="Times New Roman" color="white" size="2">Copyright &copy 2026 Borana University  ODMS. All rights reserved.</font></p>
		<br><br>
		<div class="pull-right_foot" align="center">
		&nbsp;&nbsp;&nbsp;<font face="Times New Roman" color="white" size="3">
		<a href="proctor.php">Home</a>&nbsp;|&nbsp;<a href="registerrooms.php">Register Rooms</a>&nbsp;|&nbsp;<a href="comments.php">Comment</a></font>
		</div>

      </footer>
</div>

<!--End of Footer-->
</body>
</html>
