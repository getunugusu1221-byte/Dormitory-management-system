<?php
	include("connection.php");  
 session_start();


// ... koodii kee isa duraa ...

if(isset($_POST['send_report'])) {
    $sender = $_SESSION['user_id'];
    $r_type = mysqli_real_escape_string($conn, $_POST['report_type']);
    $r_content = mysqli_real_escape_string($conn, $_POST['report_content']);

    $query = "INSERT INTO admin_reports (sender_id, report_type, content) VALUES ('$sender', '$r_type', '$r_content')";
    
    if(mysqli_query($conn, $query)) {
        echo "<script>alert('Report successfully sent to Admin!');</script>";
    } else {
        echo "<script>alert('Error sending report: " . mysqli_error($conn) . "');</script>";
    }
}
 ?>


<script>
  //alert('You Are Not Logged In !! Please Login to access this page');
// alert(window.location='login.php');
 </script>
 <?php
 
 ?>

<?php

$user_id=$_SESSION['user_id'];

$result=mysqli_query($conn,"select * from users where user_id='$user_id'")or die(mysqli_error($conn));
$row=mysqli_fetch_array($result);
$FirstName=$row['FNAME'];
$middleName=$row['mNAME'];
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>BRU-DMS</title>
<link rel="icon" type="image/png" href="imag/BRU-logo.jpg"/>
<link href="logstyle.css" rel="stylesheet" type="text/css" media="screen" />
<link href="aa.css" rel="stylesheet" type="text/css" media="screen" />
<script src="aa.js" type="text/javascript"></script>
</head>
<body>
<table  border="0" align="center" width="750px">
<!--Header-->
<tr>
<td width="600px"></td>
<td><?php 
echo '<img src="img/people.png" width="40px" height="30px">&nbsp;'.'<font face="times new roman" color="white" size="3">'.$FirstName."&nbsp;".$middleName." ".'</font>';?></td>
<td id="logoutlink" align="center"><a href="logout.php" id="log">Logout</a></td>
</tr>
<tr>
<td width="750px" colspan="3" height="100px">
<p><a href="pro_manager.php"><img src="imag/BRU-logo.jpg" align="left" width="150px" height="120px"></a>
<img src="imag/promanager.png" align="center" width="490px" height="120px"></p>
</td>
</tr>
<!--End Of Header-->
<!--Main menus-->
<tr>
<td colspan="3">
<div id="sse2">
        <div id="sses2"  >
         <ul>
         <li><a href="pro_manager.php">Home</a></li>
         <li><a href="rblock.php">Register Block</a></li>
         <li><a href="logout.php" id="log">Logout</a></li>

         </ul>
         </div>
    </div>

</td>
</tr>
<!--End of main menus-->
<!--Slide shows-->
<!--End of Slide shows-->
<table align="center" id="insides" width="850px">
<tr>
<!--Sub menus-->
<td width="25%" height="400px" valign="top" id="insides">
<table>
<tr>
<th align="center" width="250px" height="25px" bgcolor="#336699"><font face="arial" color="white" size="2">BRU-DMS</font></th>
</tr>
<tr>
<td><br><br><center><img src="imag/BRU Class.jpg" width="150px" height="100px"></center></td>
</tr>
</table>
<table>
<tr>
<th align="center" width="450px" height="25px" bgcolor="#336699"><font face="arial" color="white" size="2">Manage Record</font></th>
</tr>
<tr>
<td><img src="imag/Picture2.png" width="10px">&nbsp;<a href="#">Viewstudent info</a></td>
</tr>
<tr>
<td><img src="imag/Picture2.png" width="10px">&nbsp;<a href="viewroom.php">View Rooms</a></td>
</tr>
</table>
<br>
<br>
<table border="0">
<tr>
<th align="center" width="300px" bgcolor="#336699" height="25px"><font face="arial" color="white" size="2">Related Links</font></th>
</tr>
<tr>
<td><img src="imag/Picture2.png" width="10px">&nbsp;<a href="pmchangepassword.php">Change Password</a></td>
</tr>
<tr>
<td><img src="imag/Picture2.png" width="10px">&nbsp;<a href="viewcoms.php">View Comment</a></td>
</tr>
<tr>
<td><img src="imag/Picture2.png" width="10px">&nbsp;<a href="report.php">Generate Report</a></td>
</tr>
</table>
</td>
<!--End Of Sub menus-->
<!--Body section-->
<td valign="top">
<table border="0" cellspacing="0">
   <tr>
     
     <td width="800"  height="600" valign="top"><br><br>
	 <script type="text/javascript">
function showDiv(prefix,chooser) 
{
        for(var i=0;i<chooser.options.length;i++) 
		{
        	var div = document.getElementById(prefix+chooser.options[i].value);
            div.style.display = 'none';
        }
 
		var selectedOption = (chooser.options[chooser.selectedIndex].value);
		if(selectedOption == "1")
		{
			displayDiv(prefix,"1");
		}
		if(selectedOption == "2")
		{
			displayDiv(prefix,"2");
		}
		if(selectedOption == "3")
		{
			displayDiv(prefix,"3");
		}
		if(selectedOption == "4")
		{
			displayDiv(prefix,"4");
		}
		if(selectedOption == "5")
		{
			displayDiv(prefix,"5");
		}
} 
function displayDiv(prefix,suffix) 
{
        var div = document.getElementById(prefix+suffix);
        div.style.display = 'block';
}
</script>
	 <table id="contentbox">
		<tr>
			<td id="content">
				<div id="report">
    Select category:
    <select name="portal" id="cboOptions" onChange="showDiv('div',this)">
        <option value="1">...</option>
        <option value="2">Registered Rooms</option>
        <option value="4">General Assignation</option>
        <option value="5">Assigned Students</option>
    </select>
    <br /><br />
              
    <div id="div1" style="display:none;"></div>    

    <!-- 1. Registered Rooms Section -->
    <div id="div2" style="display:none;">
        <form action="" method="post">
            <center><h3>All Registered Rooms:</h3></center> 
            <?php 
            // Pro_Manager waan ta'eef 'where block_no' irraa balleessineera
            $sel = mysqli_query($conn, "SELECT * FROM dorm_rooms");
            $intt = mysqli_num_rows($sel);
            
            if($intt > 0) {
                echo "<p><font color='blue'>Total: </font><font color='red'>".$intt."</font> Rooms registered.</p>";
                echo '<table align="center" style="width:100%; border:1px solid #336699; border-radius:10px;" id="vtable">
                        <tr bgcolor="#336699">
                            <th><font color="white" size="2">Block No.</font></th>
                            <th><font color="white" size="2">Room No.</font></th>
                            <th><font color="white" size="2">Capacity</font></th>
                        </tr>';
                
                $report_text = "Registered Rooms: ";
                while($row = mysqli_fetch_array($sel)) {
                    echo "<tr>
                            <td>".$row['block_no']."</td>
                            <td>".$row['room_no']."</td>
                            <td>".$row['capacity']."</td>
                          </tr>";
                    $report_text .= "[Block: ".$row['block_no'].", Room: ".$row['room_no']."] ";
                }
                echo "</table>";
            ?>
                <input type="hidden" name="report_type" value="Registered Rooms">
                <input type="hidden" name="report_content" value="<?php echo $report_text; ?>">
                <br>
                <center><input type="submit" name="send_report" value="Send to Admin" style="background:#2E8B57; color:white; padding:10px; cursor:pointer; border-radius:5px;"></center>
            <?php 
            } else {
                echo "<p align='center' style='color:orange;'>No rooms found in database.</p>";
            }
            ?>
        </form>
    </div>        

    <!-- 2. General Assignation Section -->
    <div id="div4" style="display:none;">
        <form action="" method="post">
            <center><h2>General Assignation</h2></center>
            <?php
            $sel_block = mysqli_query($conn, "SELECT * FROM dorm_rooms");
            if(mysqli_num_rows($sel_block) > 0) {
                echo '<table style="width:100%; border:1px solid #336699; border-radius:10px;" id="vtable">
                        <tr bgcolor="#336699">
                            <th><font color="white" size="2">Block No.</font></th>
                            <th><font color="white" size="2">room</font></th>
                            <th><font color="white" size="2">sex</font></th>
                        </tr>';
                while($row_b = mysqli_fetch_array($sel_block)) {
                    echo "<tr>
                            <td>".$row_b['block_no']."</td>
                            <td>".$row_b['room_no']."</td>
                            <td>".$row_b['gender_type']."</td>
                          </tr>";
                }
                echo "</table>";
            ?>
                <input type="hidden" name="report_type" value="General Assignation">
                <input type="hidden" name="report_content" value="General block assignation updated.">
                <br>
                <center><input type="submit" name="send_report" value="Send to Admin" style="background:#2E8B57; color:white; padding:10px; cursor:pointer; border-radius:5px;"></center>
            <?php 
            } else { echo "No assignation data."; }
            ?>
        </form>
    </div>

    <!-- 3. Assigned Students Section -->
    <div id="div5" style="display:none;">
        <form action="" method="post">
            <center><h2>Assigned Students List</h2></center>
            <?php
            $sel_stu = mysqli_query($conn, "SELECT * FROM students");
            if(mysqli_num_rows($sel_stu) > 0) {
                echo '<table style="width:100%; border:1px solid #336699;" border="1">
                        <tr bgcolor="#336699">
                            <th><font color="white" size="2">Name</font></th>
                            <th><font color="white" size="2">ID No</font></th>
                            <th><font color="white" size="2">Block</font></th>
                            <th><font color="white" size="2">Room</font></th>
                        </tr>';
                while($row_s = mysqli_fetch_array($sel_stu)) {
                    echo "<tr>
                            <td>".$row_s['fname']." ".$row_s['lname']."</td>
                            <td>".$row_s['stud_id']."</td>
                            <td>".$row_s['block_no']."</td>
                            <td>".$row_s['room_no']."</td>
                          </tr>";
                }
                echo "</table>";
            ?>
                <input type="hidden" name="report_type" value="Assigned Students">
                <input type="hidden" name="report_content" value="Total Assigned Students: <?php echo mysqli_num_rows($sel_stu); ?>">
                <br>
                <center><input type="submit" name="send_report" value="Send to Admin" style="background:#2E8B57; color:white; padding:10px; cursor:pointer; border-radius:5px;"></center>
            <?php 
            } else { echo "No students assigned yet."; }
            ?>
        </form>
    </div>
</div>		</div>
			</td>
		</tr>
	</table>
</td>
	</tr>
	 </table>                


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
        <p align="center"><font face="Times New Roman" color="white" size="2">Copyright &copy 2026 Borana University  ODMS. All rights reserved.</font></p>
		<br><br>
		<div class="pull-right_foot" align="center">
		&nbsp;&nbsp;&nbsp;<font face="Times New Roman" color="white" size="3">
		<a href="pro_manager.php">Home</a>&nbsp;|&nbsp;<a href="registerrooms.php">Register Rooms</a>&nbsp;</font>
		</div>

      </footer>
</div>

<!--End of Footer-->
</body>
</html>
