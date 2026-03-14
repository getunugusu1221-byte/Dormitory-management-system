<?php
session_start();
include 'connection.php';
if($log != "log"){
	header ("Location: viewcom.php");
}
$ctrl = $_REQUEST['key'];
$SQL = "DELETE FROM comment WHERE id = '$ctrl'";
mysqli_query($conn,$SQL);
mysqli_close($conn);

print "<script>location.href = 'viewcom.php'</script>";
?>