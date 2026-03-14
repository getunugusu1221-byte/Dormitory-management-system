<?php
	include("connection.php");
	session_start();

?>
<?php

if(isset($_POST['Register'])){
    // SQL Injection irraa of eeguuf
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $mname = mysqli_real_escape_string($conn, $_POST['mname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $stud_id = mysqli_real_escape_string($conn, $_POST['stud_id']);
    $region = mysqli_real_escape_string($conn, $_POST['region']);
    $Nationality = mysqli_real_escape_string($conn, $_POST['Nationality']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $acedamicyear = mysqli_real_escape_string($conn, $_POST['acedamicyear']);
    $sex = mysqli_real_escape_string($conn, $_POST['sex']);
    $year = mysqli_real_escape_string($conn, $_POST['year']);
    $semister = mysqli_real_escape_string($conn, $_POST['semister']);

    $sql = "INSERT INTO registrar (fname, mname, lname, stud_id, region, Nationality, phone, acedamicyear, sex, year, semister) 
            VALUES ('$fname', '$mname', '$lname', '$stud_id', '$region', '$Nationality', '$phone', '$acedamicyear', '$sex', '$year', '$semister')";

    $result = mysqli_query($conn, $sql);

    if($result){
       
        echo '<script>
                alert("Registered successfully!");

                window.location.href = "index.php";
              </script>';
          
              
    }
    else{
        
        echo "<script>alert('Error: Data could not be saved. " . mysqli_error($conn) . "');</script>";
    }
}


    ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BRU-DMS-View Dorm</title>
<link rel="icon" type="image/png" href="imag/BRU-logo.jpg"/>
<link href="logstyle.css" rel="stylesheet" type="text/css" media="screen" />
<link href="styles.css" rel="stylesheet" type="text/css" media="screen" />

<link href="aa.css" rel="stylesheet" type="text/css" media="screen" />
<script src="aa.js" type="text/javascript"></script>
<style>
 * {
    padding: 0;
    margin: 0;
    font-family: sans-serif;
}

body {
   
    background-size: cover;
    background-attachment: fixed;
}

/* Form Container - Kun table keessatti akka walakkaa galu taasisa */
.form-container {
    background-color: rgba(2, 0, 5, 0.9); /* Shaffafummaa isaa xiqqoo fooyya'e */
    color: #fff;
    padding: 30px;
    border-radius: 20px;
    width: 100%;
    max-width: 550px; /* Bal'ina formichaa */
    margin: 20px auto; /* Table keessatti walakkaa akka ta'u taasisa */
    box-shadow: 0px 0px 15px rgba(0,0,0,0.5);
}

.form-container h1 {
    color: #4da6ff;
    text-align: center;
    margin-bottom: 20px;
    font-family: "Times New Roman", Times, serif;
}

.form-container label {
    display: inline-block;
    width: 110px;
    margin-bottom: 10px;
    font-size: 14px;
}

.form-container input[type="text"],
.form-container input[type="tel"],
.form-container select {
    border: none;
    border-bottom: 1px solid #fff;
    background-color: transparent;
    color: #fff;
    outline: none;
    height: 30px;
    width: 150px;
    margin-bottom: 15px;
}

/* Browser qulqulluu akka ta'uuf */
.form-container input::placeholder {
    
    font-size: 12px;
}

.btn-container {
    text-align: center;
    margin-top: 20px;
}

button {
    background-color: #28a745;
    width: 80%;
    padding: 10px;
    border: none;
    border-radius: 10px;
    color: #fff;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    transition: 0.3s;
}

button:hover {
    background-color: #007bff;
}

#insides {
    background-color: rgba(255, 255, 255, 0.8); 
    border-radius: 10px;
}
.error-text {
    color: #ff4d4d;
    font-size: 11px;
    display: none; 
    display: block; 
    margin-bottom: 10px;
    font-weight: bold;
}
.invalid {
    border-bottom: 2px solid #ff4d4d !important;
}
</style>
</head>
<body>
<table  border="0" align="center" width="750px">
<!--Header-->
<tr>
<td width="100%"></td>
</tr>
<tr>
<td width="700px" colspan="3" height="120px">
<p><a href="index.php"><img src="imag/BRU-logo.jpg" align="left" width="150px" height="120px"></a>
<img style="border-radius:55px;box-shadow:1px 1px 12px black" src="imag/brudms.png" align="center" width="470px" height="120px"></p>
</td>
</tr>
<!--End Of Header-->
<!--Main menus-->
<tr>
<td colspan="3" width="750px">
<div id="sse2">
        <div id="sses2"  >
         <ul>
         <li><a href="index.php">Home</a></li>
         <li><a href="about.php">About Us</a></li>
         <li><a href="contact.php">Contact Us</a></li>
		       <li><a href="help.php">Help</a></li>
         <li><a href="logout.php" id="log">Logout</a></li>

         </ul>
         </div>
    </div>

</td>
</tr>
<!--End of main menus-->
<table align="center" id="insides" width="1000px">
<tr>
<!--Sub menus-->
<td width="25%" height="500px" valign="top" id="insides">
<table>
<tr>
<th align="center" width="250px" height="25px" bgcolor="#336699"><font face="arial" color="white" size="2">BRU-DMS</font></th>
</tr>
<tr>
<td><br><br><center><img src="imag/BRU Class.jpg" width="150px" height="100px"></center></td>
</tr>
</table>
<br>
<br>
<br>
<table border="0">
<tr>
<th width="250px" bgcolor="#336699" height="25px"><font face="arial" color="white" size="2">Related Links</font></th>
</tr>
<tr>
<td><img src="img/Picture2.png" width="10px">&nbsp;<a href="http://www.bru.edu.et">BRU Site</a></td>
</tr>
<tr>
<td><img src="img/Picture2.png" width="10px">&nbsp;<a href="site.php">Site Map</a></td>
</tr>
<tr>
<td><img src="img/Picture2.png" width="10px">&nbsp;<a href="https://mail.google.com/a/bru/edu.et">Web Mail</a></td>
</tr>
</table>
<br>
<br>
<br>


</td>

<!--End Of Sub menus-->
<!--Body section-->
<td valign="top">

<br>
<br>
<br>
  
<div class="form-container">
    <h1 style="font-family: 'Times New Roman'">Student Registration Form</h1>
    <form id="registrationForm" name="login" method="POST" action="register.php" onsubmit="return validateForm()">
        <div class="first">
            <label for="fname">First Name:</label>
            <input type="text" name="fname" id="fname" placeholder="enter firstname">
            <span id="fnameError" class="error-text"></span>

            <label for="mname">Middle Name:</label>
            <input type="text" name="mname" id="mname" placeholder="enter middlename">
            <span id="mnameError" class="error-text"></span><br>

            <label for="lname">Last Name:</label>
            <input type="text" name="lname" id="lname" placeholder="enter lastname">
            <span id="lnameError" class="error-text"></span>

            <label for="stud_id">Student ID:</label>
            <input type="text" name="stud_id" id="stud_id" placeholder="enter student id">
            <span id="stud_idError" class="error-text"></span><br>

            <label for="region">Region:</label>
            <input type="text" name="region" id="region" placeholder="enter region">
            <span id="regionError" class="error-text"></span>

            <label for="Nationality">Nationality:</label>
            <input type="text" name="Nationality" id="Nationality" placeholder="enter nationality">
            <span id="NationalityError" class="error-text"></span><br>

            <label for="phone">Phone Number:</label>
            <input type="tel" name="phone" id="phone" placeholder="enter phone number">
            <span id="phoneError" class="error-text"></span>

            <label for="acedamicyear">AccYear:</label>
            <input type="text" name="acedamicyear" id="acedamicyear" placeholder="enter academic year">
            <span id="acedamicyearError" class="error-text"></span><br>
        </div>

        <div class="second">
            <label>Gender:</label>
            <input type="radio" name="sex" id="male" value="male"> Male
            <input type="radio" name="sex" id="female" value="female"> Female
            <span id="sexError" class="error-text"></span><br>

            <label for="year">YEAR:</label>
            <select name="year" id="year">
                <option value="">choose year---</option>
                <option value="first year">first year</option>
                <option value="second year">second year</option>
                <option value="third year">Third year</option>
                <option value="Fourth year">Fourth year</option>
                <option value="fifth year">fifth year</option>
                <option value="sixth year">sixth year</option>
            </select>
            <span id="yearError" class="error-text"></span><br>

            <label for="semister">Semester:</label>
            <input type="text" name="semister" id="semister" placeholder="enter semister">
            <span id="semisterError" class="error-text"></span><br>

            <div class="btn">
                <button type="submit" name="Register">Register</button>
            </div>
        </div>
    </form>
</div>
	
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
<a href="#top"><img src="img/arrow_up.png" width="40px" title="Scroll Back to Top"></a>
</div>
        <p align="center"><font face="Times New Roman" color="white" size="2">Copyright &copy 2025 Borana University  ODMS. All rights reserved.</font></p>
		<br><br>
		<div class="pull-right_foot" align="center">
		&nbsp;&nbsp;&nbsp;<font face="Times New Roman" color="white" size="3">
		<a href="index.php">Home</a>&nbsp;|&nbsp;<a href="about.php">About Us</a>&nbsp;|&nbsp;<a href="contact.php">Contact Us</a>&nbsp;|&nbsp;<a href="develop.php">Developers</a>&nbsp;|&nbsp;<a href="comment.php">Comment</a></font>
		</div>

      </footer>
</div>

<!--End of Footer-->

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Funktishinii dogoggora agarsiisu ykn balleessu
    function validateInput(inputId, errorId, message, condition) {
        const input = document.getElementById(inputId);
        const errorSpan = document.getElementById(errorId);
        
        if (condition) {
            errorSpan.textContent = message;
            errorSpan.style.display = "block";
            input.classList.add("invalid");
            return false;
        } else {
            errorSpan.textContent = "";
            errorSpan.style.display = "none";
            input.classList.remove("invalid");
            return true;
        }
    }

    // BLUR EVENTS
    document.getElementById("fname").addEventListener("blur", function() {
        validateInput("fname", "fnameError", "First name is required (Letters only)", this.value.trim() === "" || !/^[a-zA-Z]+$/.test(this.value));
    });

    document.getElementById("mname").addEventListener("blur", function() {
        validateInput("mname", "mnameError", "Middle name is required", this.value.trim() === "");
    });

    document.getElementById("lname").addEventListener("blur", function() {
        validateInput("lname", "lnameError", "Last name is required", this.value.trim() === "");
    });

    document.getElementById("stud_id").addEventListener("blur", function() {
        validateInput("stud_id", "stud_idError", "Enter a valid Student ID", this.value.trim() === "");
    });

    document.getElementById("phone").addEventListener("blur", function() {
        validateInput("phone", "phoneError", "Enter a 10-digit phone number", !/^[0-9]{10}$/.test(this.value));
    });

    document.getElementById("region").addEventListener("blur", function() {
        validateInput("region", "regionError", "Region is required", this.value.trim() === "");
    });

    document.getElementById("Nationality").addEventListener("blur", function() {
        validateInput("Nationality", "NationalityError", "Nationality is required", this.value.trim() === "");
    });

    document.getElementById("acedamicyear").addEventListener("blur", function() {
        validateInput("acedamicyear", "acedamicyearError", "Academic Year is required", this.value.trim() === "");
    });

    document.getElementById("year").addEventListener("blur", function() {
        validateInput("year", "yearError", "Please select a year", this.value === "");
    });

    document.getElementById("semister").addEventListener("blur", function() {
        validateInput("semister", "semisterError", "Semester is required", this.value.trim() === "");
    });
});

// Form-ichi yeroo Submit ta'u hunda isaanii mirkaneessuuf
function validateForm() {
    let isValid = true;
    // Asirratti validation hunda deebisanii check gochuun ni danda'ama
    // Yoo dogoggorri jiraate "false" return godha, formichi hin darbu.
    const inputs = document.querySelectorAll('input[type="text"], input[type="tel"], select');
    inputs.forEach(input => {
        if(input.value.trim() === "") {
            isValid = false;
        }
    });

    if(!isValid) {
        alert("Please fill all required fields correctly.");
    }
    return isValid;
}
</script>
</body>
</html>
