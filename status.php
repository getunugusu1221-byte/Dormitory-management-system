<?php
$sql = mysqli_connect("localhost", "root", "", "brudms") or die(mysqli_error($conn));
	//$sdb=mysqli_select_db($conn,"brudms") or die(mysqli_error($conn)); 
if(isset($_GET['status']))
{
	$status=$_GET['status'];
	
	$select_status=mysqli_query($conn,"select * from users where user_id='$status'");
	while($row=mysqli_fetch_object($select_status))
	{
		$st=$row->status;
	
	if($st=='0')
	{
		$status2=1;
	}
	else
	{
		$status2=0;
	}
	$update=mysqli_query($conn,"update users set status='$status2' where user_id='$status' ");
	if($update)
	{
		header("Location:raccount.php");
	}
	else
	{
		echo mysqli_error($conn);
	}
	}
	?>
     
    <?php
}
?>