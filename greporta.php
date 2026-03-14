<?php
include("connection.php");  
session_start();



// ... koodii kee isa duraa ...

if(isset($_POST['send_to_manager'])) {
    $sender = $_SESSION['user_id'];
    $r_type = mysqli_real_escape_string($conn, $_POST['report_title']);
    $r_body = mysqli_real_escape_string($conn, $_POST['report_html']); // Table HTML isaa fudhata

    $query = "INSERT INTO sent_reports (sender_id, report_type, report_body) VALUES ('$sender', '$r_type', '$r_body')";
    
    if(mysqli_query($conn, $query)) {
        echo "<script>alert('Report successfully sent to Pro_Manager!');</script>";
    } else {
        echo "<script>alert('Error sending report: " . mysqli_error($conn) . "');</script>";
    }
}

//Check Login
if(!isset($_SESSION['user_id'])) {
    echo "<script>
            alert('You Are Not Logged In !! Please Login to access this page');
            window.location.href='login.php';
          </script>";
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch User Info
$result = mysqli_query($conn, "SELECT * FROM users WHERE user_id='$user_id'") or die(mysqli_error($conn));
$row = mysqli_fetch_array($result);
$FirstName = $row['FNAME'];
$middleName = $row['mNAME'];

// Fetch Block Info
$result1 = mysqli_query($conn, "SELECT * FROM block WHERE user_id='$user_id'") or die(mysqli_error($conn));
$row1 = mysqli_fetch_array($result1);
$block = isset($row1['block_no']) ? $row1['block_no'] : "N/A";
$norooms = isset($row1['norooms']) ? $row1['norooms'] : 0;
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Borana University Online Dormitory Management System</title>
    <link rel="icon" type="image/png" href="imag/BRU-logo.jpg"/>
    <link href="logstyle.css" rel="stylesheet" type="text/css" />
    <link href="aa.css" rel="stylesheet" type="text/css" />
    <script src="aa.js" type="text/javascript"></script>
    
    <style>
        #print_content {
            width: 100%;
            margin: 0 auto;
        }
        .report-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .report-table th, .report-table td {
            border: 1px solid #336699;
            padding: 8px;
            text-align: left;
            font-size: 14px;
        }
        .report-table th {
            background-color: #336699;
            color: white;
        }
        .print-btn {
            width: 150px;
            height: 35px;
            color: #2E8B57;
            text-transform: capitalize;
            font-weight: bolder;
            font-size: 15px;
            cursor: pointer;
        }
    </style>

    <script language="javascript">
    function Clickheretoprint(divId) { 
        var disp_setting = "toolbar=yes,location=no,directories=yes,menubar=yes,scrollbars=yes,width=900, height=400, left=100, top=25"; 
        var content_value = document.getElementById(divId).innerHTML; 
        
        var docprint = window.open("", "", disp_setting); 
        docprint.document.open(); 
        docprint.document.write('<html><head><title>Print Report</title>'); 
        docprint.document.write('<style>table{width:100%; border-collapse:collapse;} th,td{border:1px solid black; padding:8px;}</style>');
        docprint.document.write('</head><body onLoad="self.print()">');          
        docprint.document.write(content_value);          
        docprint.document.write('</body></html>'); 
        docprint.document.close(); 
        docprint.focus(); 
    }

    function showDiv(prefix, chooser) {
        for(var i=0; i<chooser.options.length; i++) {
            var div = document.getElementById(prefix + chooser.options[i].value);
            if(div) div.style.display = 'none';
        }
        var selectedOption = chooser.options[chooser.selectedIndex].value;
        var selectedDiv = document.getElementById(prefix + selectedOption);
        if(selectedDiv) selectedDiv.style.display = 'block';
    } 
    </script>
</head>
<body>
<table border="0" align="center" width="850px">
    <!--Header-->
    <tr>
        <td width="500px"></td>
        <td align="right">
            <img src="imag/people.png" width="30px" height="25px" style="vertical-align: middle;">
            <span style="font-family: 'Times New Roman'; color: white; font-size: 16px;">
                <?php echo $FirstName . " " . $middleName; ?>
            </span>
        </td>
    </tr>
    <tr>
        <td colspan="2" height="100px">
            <p>
                <a href="proctor.php"><img src="imag/BRU-logo.jpg" align="left" width="150px" height="120px"></a>
                <img src="imag/proctor.png" align="center" width="490px" height="120px">
            </p>
        </td>
    </tr>
    <!--Main menus-->
    <tr>
        <td colspan="2">
            <div id="sse2">
                <div id="sses2">
                    <ul>
                        <li><a href="proctor.php">Home</a></li>
                        <li><a href="registerrooms.php">Register Rooms</a></li>
                        <li><a href="logout.php" id="log">Logout</a></li>
                    </ul>
                </div>
            </div>
        </td>
    </tr>

    <!--Main Content-->
    <tr>
        <td colspan="2">
            <table align="center" width="100%" id="insides">
                <tr>
                    <!--Sub menus-->
                    <td width="250px" valign="top">
                        <table width="100%" bgcolor="#336699">
                            <tr><th height="25px"><font color="white" size="2">BRU-DMS</font></th></tr>
                        </table>
                        <center><br><img src="imag/BRU Class.jpg" width="180px" height="120px"></center>
                        <br>
                        <table width="100%">
                            <tr><th bgcolor="#336699" height="25px"><font color="white" size="2">Manage Record</font></th></tr>
                            <tr><td><img src="img/Picture2.png" width="10px">&nbsp;<a href="assign.php">Assign Student</a></td></tr>
                            <tr><td><img src="img/Picture2.png" width="10px">&nbsp;<a href="viewstu.php">View Student Info</a></td></tr>
                        </table>
                        <br>
                        <table width="100%">
                            <tr><th bgcolor="#336699" height="25px"><font color="white" size="2">Related Links</font></th></tr>
                            <tr><td><img src="img/Picture2.png" width="10px">&nbsp;<a href="changepassword.php">Change Password</a></td></tr>
                            <tr><td><img src="img/Picture2.png" width="10px">&nbsp;<a href="greporta.php">Generate Report</a></td></tr>
                        </table>
                    </td>

                    <!--Body section-->
                    <td valign="top" style="padding: 20px;">
                        <div id="report-selection">
                            <h3>Which Type of report do you want?</h3>
                            <select name="portal" id="cboOptions" onChange="showDiv('div', this)">
                                <option value="1">...</option>
                                <option value="2">Registered Rooms</option>
                                <option value="4">General Assignation</option>
                            </select>
                        </div>
                        <br />

                        <div id="div1" style="display:none;"></div>

                        <!-- Registered Rooms Report -->
  <div id="div2" style="display:none;">
    <form action="" method="post">
        <center><h3>Rooms:</h3></center> 
        <?php 
        $sel = mysqli_query($conn, "SELECT * FROM dorm_rooms WHERE block_no='$block'");
        
        // Table HTML isaa variable keessatti walitti qabuuf
        $table_html = "<table border='1' style='width:100%; border-collapse:collapse;'>
                        <tr><th>Block No.</th><th>Room No.</th><th>Capacity</th></tr>";
        
        $display_table = '<table align="center" style="width:100%; border:1px solid #336699; border-radius:10px;" id="vtable">
                          <tr><th bgcolor="#336699"><font color="white" size="2">Block No.</th>
                          <th bgcolor="#336699"><font color="white" size="2">Room No.</th>
                          <th bgcolor="#336699"><font color="white" size="2">Capacity</th></tr>';

        while($row = mysqli_fetch_array($sel)) {
            $row_str = "<tr><td>".$row['block_no']."</td><td>".$row['room_no']."</td><td>".$row['capacity']."</td></tr>";
            $display_table .= $row_str;
            $table_html .= $row_str;
        }
        $display_table .= "</table>";
        $table_html .= "</table>";

        echo $display_table; // Screen irratti agarsiisuuf
        ?>
        
        <!-- Data hidden ta'ee akka erguuf -->
        <input type="hidden" name="report_title" value="Registered Rooms Report (Block: <?php echo $block; ?>)">
        <input type="hidden" name="report_html" value="<?php echo htmlspecialchars($table_html); ?>">
        
        <p align="center">
            <input type="submit" name="send_to_manager" value="Send to Pro_Manager" 
                   style="width:250px; height:40px; background-color:#2E8B57; color:white; font-weight:bold; border-radius:5px; cursor:pointer;">
        </p>
    </form>
</div>

                        <!-- General Assignation Report -->
                       <div id="div4" style="display:none;">
						<form action="" method="post">
							<u><center><h2>General Assignation</h2></center></u>
							<?php
							$sel_gen = mysqli_query($conn, "SELECT * FROM block");
							
							$gen_html = "<table border='1' style='width:100%; border-collapse:collapse;'>
										<tr><th>Block No.</th><th>Sex</th><th>Faculty</th></tr>";
							
							$display_gen = '<table style="width:100%; border:1px solid #336699; border-radius:10px;" id="vtable">
											<tr><th bgcolor="#336699"><font color="white" size="2">Block No.</th>
											<th bgcolor="#336699"><font color="white" size="2">Sex</th>
											<th bgcolor="#336699"><font color="white" size="2">Faculty</th></tr>';

							while($row = mysqli_fetch_array($sel_gen)) {
								$row_str = "<tr><td>".$row['block_no']."</td><td>".$row['sexcategory']."</td><td>".$row['faculty']."</td></tr>";
								$display_gen .= $row_str;
								$gen_html .= $row_str;
							}
							$display_gen .= "</table>";
							$gen_html .= "</table>";

							echo $display_gen;
							?>

							<input type="hidden" name="report_title" value="General Assignation Report">
							<input type="hidden" name="report_html" value="<?php echo htmlspecialchars($gen_html); ?>">
							
							<p align="center">
								<input type="submit" name="send_to_manager" value="Send to Pro_Manager" 
									style="width:250px; height:40px; background-color:#2E8B57; color:white; font-weight:bold; border-radius:5px; cursor:pointer;">
							</p>
						</form>
					</div>
					</td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<!--Footer-->
<div id="sample">
    <footer>
        <br>
        <div align="right">
            <a href="#top"><img src="img/arrow_up.png" width="40px" title="Scroll Back to Top"></a>
        </div>
        <p align="center" style="color: white; font-size: 12px;">
            Copyright &copy; 2026 Borana University ODMS. All rights reserved.
        </p>
        <div align="center">
            <a href="proctor.php" style="color: white;">Home</a> | 
            <a href="registerrooms.php" style="color: white;">Register Rooms</a> | 
            <a href="comments.php" style="color: white;">Comment</a>
        </div>
    </footer>
</div>
</body>
</html>