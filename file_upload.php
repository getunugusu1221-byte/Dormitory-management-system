<?php
 session_start();
@include("connection.php");
 if(isset($_SESSION['uname']))
 {
  $username=$_SESSION['uname'];
 }
 else {
 ?>
 <?php
 }
 ?>
 
 
 
	    <?php

if ( isset( $_FILES['userfile'] ) )
{
  $csv_file = $_FILES['userfile']['tmp_name'];
  if ( ! is_file( $csv_file ) )
  echo"<script>alert('file not found/empty?')</script>";
//echo"<script>alert(window.location='../OSRS2/file_upload.php')</script>";

  $sql = '';
  
  if (($handle = fopen( $csv_file, "r")) !== FALSE)
  {
 
      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
      {  
	    $sql="SELECT * FROM sgradereport where id_no='{$data[1]}' ;";
		$result = mysqli_query($conn,$sql);
		$row=mysqli_fetch_array($result);
			  
		//$sql1=mysql_query("INSERT INTO sgradereport SET id_no='$id_no' ");
            $sql="INSERT INTO sgradereport(name,sex,id_no)";
			$sql .=" values ('{$data[0]}','{$data[1]}',
			'{$data[2]}'); ";
			$result = mysqli_query($conn,$sql);
			if(!$result)
			{
			echo"error".mysqli_error($conn);
			}
			else
			{
	       echo "<script>alert('upload your data Sucessfull!!');</script>";
		   }
	  }   
  fclose($handle);

}

     
  //exit( $sql );
			}
			?>
<!DOCTYPE html>
<html>
<head>
  <title>You are uploading the students grade report</title>
</head>
<table border="0" cellspacing="0" cellpadding="0">

<tr>
<td colspan="4">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</td>
</tr>
<tr>
<td>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</td>
<td width="650" style="margin-left:23px;">

<body>
<fieldset><legend><font color="blue">Add all the grade report here</font></legend>
<br /><br />
  <form enctype="multipart/form-data" method="POST">
    <input name="userfile" size="14"type="file">
    <input type="submit" value="Upload">
	<br /><br />
		You can insert no more than 1000 students grade report at a time.
  </form>
  </fieldset>
</body>
			
		
			</html>
			