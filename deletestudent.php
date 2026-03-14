<?php
session_start();
include 'connection.php';
if($log != "log"){
	header ("Location: view_students.php");
}
$ctrl = $_REQUEST['key'];
$SQL = "DELETE FROM registrar WHERE user_id = '$ctrl'";
mysqli_query($conn,$SQL);
mysqli_close($conn);

print "<script>location.href = 'view_students.php'</script>";
?>