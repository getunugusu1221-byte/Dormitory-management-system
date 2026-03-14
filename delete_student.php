<?php
include("connection.php");
session_start();

if(isset($_GET['stud_id'])){
    $stud_id = mysqli_real_escape_string($conn, $_GET['stud_id']);

    // 'stud_id' maqaa column database keetii ta'uu mirkaneeffadhu
    $sql = "DELETE FROM registrar WHERE stud_id = '$stud_id'";

    if(mysqli_query($conn, $sql)){
        echo "<script>
                alert('Student record deleted successfully!');
                window.location.href = 'view_students.php'; // Gara index.php tti si deebisa
              </script>";
    } else {
        echo "<script>
                alert('Error: " . mysqli_error($conn) . "');
                window.location.href = 'index.php';
              </script>";
    }
} else {
    header("Location: index.php");
}
?>