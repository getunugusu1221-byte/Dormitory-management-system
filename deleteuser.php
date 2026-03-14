<?php
session_start();
include 'connection.php';
if($log != "log"){
	header ("Location: raccount.php");
}
$ctrl = $_REQUEST['key'];
$SQL = "DELETE FROM users WHERE user_id = '$ctrl'";
mysqli_query($conn,$SQL);
mysqli_close($conn);

print "<script>location.href = 'raccount.php'</script>";
?>