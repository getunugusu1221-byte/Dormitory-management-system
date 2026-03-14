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

$result=("select * from users where user_id='$user_id'")or die(mysqli_error($conn));
$result = mysqli_query($conn,$result);
$row=mysqli_fetch_array($result);
$FirstName=$row['FNAME'];
$middleName=$row['mNAME'];
$result1=("select * from block where user_id='$user_id'")or die(mysqli_error($conn));
$result1 = mysqli_query($conn,$result1);
$row=mysqli_fetch_array($result1);
$block=$row['block_no'];

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Borana University Online Dormitory managent system</title>
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
<img src="imag/admin.png" align="center" width="490px" height="120px"></p>
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
<td><img src="imag/Picture2.png" width="10px">&nbsp;<a href="assign.php">Assign Student</a></td>
</tr>
<tr>
<td><img src="imag/Picture2.png" width="10px">&nbsp;<a href="viewstu.php">View Student Info</a></td>
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
<td><img src="imag/Picture2.png" width="10px">&nbsp;<a href="greporta.php">Generate Report</a></td>
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






<?php

if ( isset( $_FILES['userfile'] ) )
{
  $csv_file = $_FILES['userfile']['tmp_name'];
  if ( ! is_file( $csv_file ) )
  echo'<p class="wrong">file not found/empty?</p>';
  $sql = '';
  
  if (($handle = fopen( $csv_file, "r")) !== FALSE)
  {
 
      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
      {  
	    $sql="SELECT * FROM students where stud_id='{$data[1]}' ;";
		$result = mysqli_query($conn,$sql);
		$row=mysqli_fetch_array($result);
            $sql="INSERT INTO students(fname,mname,lname,stud_id,sex,batch,faculty,block_no,room_no)";
			$sql .=" values ('{$data[0]}','{$data[1]}',
			'{$data[2]}','{$data[3]}','{$data[4]}','{$data[5]}','{$data[6]}','{$data[7]}','{$data[8]}'); ";
			$result = mysqli_query($conn,$sql);
			}
			if(!$result)
			{
			echo'<p class="wrong">File Is Not Uploaded!</p>';
			die(mysqli_error($conn));
			}
			else
			{
	       echo '<p class="upload"> your data Sucessfull!!</p>';
		   }
	     
  fclose($handle);
}
			}
			?>

<fieldset><legend><font color="blue">Upload All students of<font color="red" size="3px"><?php  echo $block;?></font></font></legend>
<br /><br />
  <form enctype="multipart/form-data" method="POST">
    <input name="userfile" size="14"type="file">
    <input type="submit" value="Upload">
	<br /><br />
		<p>You can insert no more than 1000 students grade report at a time.</p>
		<p><i>Example:Block30.csv</i></p>
  </form>
  </fieldset>
          		  


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
