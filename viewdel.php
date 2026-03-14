<?php
session_start();
include 'connection.php';
if($log != "log"){
	header ("Location: viewreg.php");
}
$ctrl = $_REQUEST['key'];
$SQL = "DELETE FROM regestration WHERE apid = '$ctrl'";
mysqli_query($conn,$SQL);
mysqli_close($conn);
print "<script>location.href = 'viewreg.php'</script>";
?>