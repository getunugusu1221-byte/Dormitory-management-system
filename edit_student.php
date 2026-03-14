<?php
include("connection.php");
session_start();

// 1. GET THE STUDENT DATA TO FILL THE FORM
if (isset($_GET['stud_id'])) {
    $id_to_edit = mysqli_real_escape_string($conn, $_GET['stud_id']);
    $get_student = mysqli_query($conn, "SELECT * FROM registrar WHERE stud_id = '$id_to_edit'");
    
    if (mysqli_num_rows($get_student) > 0) {
        $data = mysqli_fetch_assoc($get_student);
    } else {
        echo "<script>alert('Student not found!'); window.location.href='index.php';</script>";
        exit();
    }
}

// 2. PROCESS THE UPDATE WHEN THE BUTTON IS CLICKED
if (isset($_POST['Update'])) {
    $old_stud_id = $_POST['old_stud_id']; // Hidden field to identify the record
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $mname = mysqli_real_escape_string($conn, $_POST['mname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $new_stud_id = mysqli_real_escape_string($conn, $_POST['stud_id']);
    $region = mysqli_real_escape_string($conn, $_POST['region']);
    $Nationality = mysqli_real_escape_string($conn, $_POST['Nationality']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $acedamicyear = mysqli_real_escape_string($conn, $_POST['acedamicyear']);
    $sex = mysqli_real_escape_string($conn, $_POST['sex']);
    $year = mysqli_real_escape_string($conn, $_POST['year']);
    $semister = mysqli_real_escape_string($conn, $_POST['semister']);

    $sql = "UPDATE registrar SET 
            fname='$fname', mname='$mname', lname='$lname', stud_id='$new_stud_id', 
            region='$region', Nationality='$Nationality', phone='$phone', 
            acedamicyear='$acedamicyear', sex='$sex', year='$year', semister='$semister' 
            WHERE stud_id = '$old_stud_id'";

    if (mysqli_query($conn, $sql)) {
        echo '<script>
                alert("Updated successfully!");
                window.location.href = "updete_student.php"; 
              </script>';
    } else {
        echo "<script>alert('Error updating: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student - BRU DMS</title>
    <style>
        body { background-image: url('imag/BRU Class.jpg'); background-size: cover; font-family: sans-serif; }
        .form-container {
            background-color: rgba(2, 0, 5, 0.9);
            color: #fff;
            padding: 40px;
            border-radius: 30px;
            width: 90%;
            max-width: 650px;
            margin: 50px auto;
            box-shadow: 0px 10px 25px rgba(0,0,0,0.5);
        }
        .form-container h1 { color: #007bff; text-align: center; margin-bottom: 25px; }
        .input-group { display: flex; justify-content: space-between; margin-bottom: 15px; gap: 20px; }
        .input-box { width: 48%; }
        .input-box label { display: block; font-size: 13px; margin-bottom: 5px; }
        .form-container input[type="text"], .form-container input[type="tel"], .form-container select {
            width: 100%; border: none; border-bottom: 2px solid #fff; background: transparent; color: #fff; outline: none; height: 30px;
        }
        button { background-color: #007bff; width: 100%; padding: 12px; border: none; border-radius: 10px; color: #fff; cursor: pointer; font-weight: bold; margin-top: 20px; }
        button:hover { background-color: #28a745; }
        .cancel-btn { display: block; text-align: center; color: #ccc; margin-top: 10px; text-decoration: none; }
    </style>
</head>
<body>

<div class="form-container">
    <h1>Edit Student Record</h1>
    <form method="POST" action="edit_student.php">
        <!-- Hidden input to keep track of the original Student ID -->
        <input type="hidden" name="old_stud_id" value="<?php echo $data['stud_id']; ?>">

        <div class="input-group">
            <div class="input-box">
                <label>First Name:</label>
                <input type="text" name="fname" value="<?php echo $data['fname']; ?>" required>
            </div>
            <div class="input-box">
                <label>Middle Name:</label>
                <input type="text" name="mname" value="<?php echo $data['mname']; ?>" required>
            </div>
        </div>

        <div class="input-group">
            <div class="input-box">
                <label>Last Name:</label>
                <input type="text" name="lname" value="<?php echo $data['lname']; ?>" required>
            </div>
            <div class="input-box">
                <label>Student ID:</label>
                <input type="text" name="stud_id" value="<?php echo $data['stud_id']; ?>" required>
            </div>
        </div>

        <div class="input-group">
            <div class="input-box">
                <label>Region:</label>
                <input type="text" name="region" value="<?php echo $data['region']; ?>" required>
            </div>
            <div class="input-box">
                <label>Nationality:</label>
                <input type="text" name="Nationality" value="<?php echo $data['Nationality']; ?>" required>
            </div>
        </div>

        <div class="input-group">
            <div class="input-box">
                <label>Phone:</label>
                <input type="tel" name="phone" value="<?php echo $data['phone']; ?>" required>
            </div>
            <div class="input-box">
                <label>Academic Year:</label>
                <input type="text" name="acedamicyear" value="<?php echo $data['acedamicyear']; ?>" required>
            </div>
        </div>

        <div style="margin-bottom: 15px;">
            <label>Gender:</label> &nbsp;
            <input type="radio" name="sex" value="male" <?php if($data['sex']=='male') echo 'checked'; ?>> Male
            <input type="radio" name="sex" value="female" <?php if($data['sex']=='female') echo 'checked'; ?>> Female
        </div>

        <div class="input-group">
            <div class="input-box">
                <label>Year:</label>
                <select name="year">
                    <option value="first year" <?php if($data['year']=='first year') echo 'selected'; ?>>First Year</option>
                    <option value="second year" <?php if($data['year']=='second year') echo 'selected'; ?>>Second Year</option>
                    <option value="third year" <?php if($data['year']=='third year') echo 'selected'; ?>>Third Year</option>
                    <option value="Fourth year" <?php if($data['year']=='Fourth year') echo 'selected'; ?>>Fourth Year</option>
                    <option value="fifth year" <?php if($data['year']=='fifth year') echo 'selected'; ?>>Fifth Year</option>
                    
                </select>
            </div>
            <div class="input-box">
                <label>Semester:</label>
                <input type="text" name="semister" value="<?php echo $data['semister']; ?>" required>
            </div>
        </div>

        <button type="submit" name="Update">SAVE CHANGES</button>
        <a href="index.php" class="cancel-btn">Cancel</a>
    </form>
</div>

</body>
</html>