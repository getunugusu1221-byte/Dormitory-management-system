<?php
include("connection.php");
session_start();

if(isset($_GET['process_id'])){
    $sid = mysqli_real_escape_string($conn, $_GET['process_id']);

    // 1. Fetch student details from registrar
    $reg_query = mysqli_query($conn, "SELECT * FROM registrar WHERE stud_id = '$sid'");
    $st = mysqli_fetch_assoc($reg_query);

    if($st){
        $fname = $st['fname'];
        $mname = $st['mname'];
        $lname = $st['lname'];
        $sex   = $st['sex'];
        $year  = $st['year'];

        // 2. Automatically find an available room for their gender
        $room_query = mysqli_query($conn, "SELECT * FROM dorm_rooms WHERE gender_type = '$sex' AND current_occupants < capacity LIMIT 1");
        
        if(mysqli_num_rows($room_query) > 0){
            $room = mysqli_fetch_assoc($room_query);
            $block_no = $room['block_no'];
            $room_no  = $room['room_no'];
            $room_id  = $room['id'];

            // 3. Store into 'students' table with all required columns
            $insert_sql = "INSERT INTO students (fname, mname, lname, stud_id, sex, year, block_no, room_no) 
                           VALUES ('$fname', '$mname', '$lname', '$sid', '$sex', '$year', '$block_no', '$room_no')";
            
            if(mysqli_query($conn, $insert_sql)){
                // 4. Increase the count in dorm_rooms
                mysqli_query($conn, "UPDATE dorm_rooms SET current_occupants = current_occupants + 1 WHERE id = '$room_id'");
                
                echo "<script>alert('Assigned Successfully! Block: $block_no, Room: $room_no'); window.location.href='assign_student.php';</script>";
            } else {
                echo "<script>alert('Error: Student already assigned.'); window.location.href='assign_student.php';</script>";
            }
        } else {
            echo "<script>alert('No available rooms for $sex students!'); window.location.href='assign_student.php';</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Assign Students</title>
    <style>
        body { font-family: Arial; background: #2c3e50; color: white; padding: 20px; }
        .box { background: rgba(0,0,0,0.8); padding: 30px; border-radius: 15px; width: 80%; margin: auto; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; color: white; }
        th, td { border: 1px solid #555; padding: 10px; text-align: left; }
        th { background: #336699; }
        .btn { background: #28a745; color: white; padding: 5px 10px; text-decoration: none; border-radius: 4px; }
        .btn:hover { background: #218838; }
    </style>
</head>
<body>

<div class="box">
    <h2>Pending Dormitory Assignment</h2>
    <p>Select a student to automatically assign a block and room by gender.</p>
    
    <table>
        <tr>
            <th>Full Name</th>
            <th>ID</th>
            <th>Gender</th>
            <th>Year</th>
            <th>Action</th>
        </tr>
        <?php
        // Only show students who haven't been assigned yet
        $sql = "SELECT * FROM registrar WHERE stud_id NOT IN (SELECT stud_id FROM students)";
        $res = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>".$row['fname']." ".$row['mname']."</td>";
            echo "<td>".$row['stud_id']."</td>";
            echo "<td>".ucfirst($row['sex'])."</td>";
            echo "<td>".$row['year']."</td>";
            echo "<td><a href='assign_student.php?process_id=".$row['stud_id']."' class='btn'>Assign Now</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
    <a href="view_assigned.php" style="color: cyan;">View Assigned Students List →</a>
</div>

</body>
</html>