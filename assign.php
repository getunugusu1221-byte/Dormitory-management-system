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
$norooms=$row['norooms'];
$sexcategory=$row['sexcategory'];
$year=$row['year'];
$faculty=$row['faculty'];
$result2=mysqli_query($conn,"select * from room where block_no='$block'")or die(mysqli_error($conn));
$row=mysqli_fetch_array($result2);
$bed=$row['nobed'];
//$sexcategory=$row['sexcategory'];
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title> Borana University Online Dormitory managent system</title>
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
<td id="logoutlink" align="center"><a href="logout.php" id="log">Logout</a></td>
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
<td><img src="img/Picture2.png" width="10px">&nbsp;<a href="#">Generate Report</a></td>
</tr>
</table>
<br>
<br>
</td>
<!--End Of Sub menus-->
<!--Body section-->
<td valign="top" height="450px">
<br>
<br>
<font face="Arial" size="2px">Our Home page......</font>
  <div style="width:480px; height:360px; margin:0 auto; position:relative; border:2px solid rgba(0,0,0,0); -webkit-border-radius:5px; -moz-border-radius:5px; border-radius:25px; -webkit-box-shadow:0 0 18px rgba(0,0,0,0.4); -moz-box-shadow:0 0 18px rgba(0,0,0,0.4); box-shadow:0 0 18px rgba(0,0,0,0.4); margin-top:20px; color:#000000;">


  <form id="form1" name="login" method="POST" action="assign.php"  onsubmit='return formValidation()'>
 <div style="background-color:#336699;border-radius:5px;font-family:Arial, Helvetica, sans-serif; color:#000000; padding:5px; height:22px;"> 
 
 
 <div style="float:left;" ><strong><font color="white" size="2px">Room Assignation</font></strong></div>
<div style="float:right; margin-right:20px; background-color:#cccccc; width:25px;  text-align:center; border-radius:10px; height:12px;">
	<a href="proctor.php" title="Close"><img src="img/close_icon.gif"></a></div> 
 
 </div><br>
  <table width="426px" align="center" >
	<tr>
	<br><br>
	<td></td>
	</tr>
         <tr>
	       <td class='para1_text' width="220px"><font color="red">*</font> Sex:</td><td>
			<input type="text"  name="sex"  value="<?php echo $sexcategory;?>"/></td>
	     </tr>
		 <tr>
	       <td class='para1_text' width="220px"><font color="red">*</font> Year:</td>
		   <td style="padding-top:12px;"><select name="year"  maxlength="5">
                  <option value='<?php echo $year;?>'><?php echo $year;?></option>
                </select></td>
	     </tr>
		 <tr>
	       <td class='para1_text' width="220px"><font color="red">*</font> Faculty:</td>
		   <td style="padding-top:12px;"><select name="facultys"  maxlength="5">
                   <input type="text" value='<?php echo $faculty;?>'><?php echo $faculty;?></option>
                </select></td>
	     </tr>
		 <tr>
	       <td class='para1_text' width="220px"><font color="red">*</font> Block No:</td>
		   <td style="padding-top:12px;"><input type="text" name="block"  value="<?php echo $block;?>"/></td>
	     </tr>
		 <tr>
	       <td class='para1_text' width="220px"><font color="red">*</font>No. of Rooms:</td>
		   <td style="padding-top:12px;"><input type="text" name="nodorms" value="<?php echo $norooms;?>" /></td>
	     </tr>
		 <tr>
	       <td class='para1_text' width="220px"><font color="red">*</font>No. of Beds Per Dorm:</td>
		   <td style="padding-top:12px;"><input type="text" name="nodorm" value="<?php echo $bed;?>" /></td>
	     </tr>
		 <tr><td></td><td><input type="submit" name="save" value="Assign" class="button_example"/></td></tr>
         </table> 
  </form>
  <?php	
  if(isset($_POST['save']))
 {
 $sex=$_POST['sex'];
 $year=$_POST['year'];
 $max=6;
					$sql= "SELECT * FROM registrar where sex='$sex' AND year='$year'";
					$result=mysqli_query($conn,$sql);
					$count=mysqli_num_rows($result);
		     		if($count<1)
					{
					echo('<p class="wrong">The requirements are not exist!</p>');
					//die(mysql_error());
					echo'<meta content="5;assign.php" http-equiv="refresh" />';
					}
		else
{		
for($i=1;$i<=$norooms;$i++)
{
for($j=1;$j<=$max;$j++)
{
while($row = mysqli_fetch_array($result))
  {
$r0=$row[1];
$r1=$row[2];
$r2=$row[3];
$r3=$row[4];
$r4=$row[5];
$sql=mysqli_query($conn,"INSERT INTO students (fname,mname,lname,stud_id,sex,batch,faculty,block_no,room_no)
VALUES
('$r0','$r1','$r2','$r3','$r4','$batchs','$faculty','$block','$i')");
}}
}

echo'  <p class="success">&nbsp;&nbsp; success!</p>';
echo'<meta content="3;assign.php" http-equiv="refresh"/>';
}}
?>
  </div> 
<font size='2px'>If you want to upload an excel file :<br>
<a href='fileupload.php'><img src='img/click.png' width='100px'></a>  
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
		<a href="proctor.php">Home</a>&nbsp;|&nbsp;<a href="registerrooms.php">Register Rooms</a>&nbsp;|&nbsp;
		<a href="comments.php">Comment</a></font>
		</div>

      </footer>
</div>

<!--End of Footer-->
</body>
</html>
