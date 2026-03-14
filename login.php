<?php
		include("connection.php");
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Borana University Online Dormitory managent system</title>
<link rel="icon" type="image/png" href="imag/BRU-logo.jpg"/>
<link href="logstyle.css" rel="stylesheet" type="text/css" media="screen" />
<link href="aa.css" rel="stylesheet" type="text/css" media="screen" />
<script src="aa.js" type="text/javascript"></script>
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
		 <li><a href="viewdorm.php">View Dorm</a></li>
		 <li><a href="help.php">Help</a></li>
		
         </ul>
         </div>
    </div>

</td>
</tr>
<!--End of main menus-->
<table align="center" id="insides" width="850px">
<tr>
<!--Sub menus-->
<td width="25%" height="500px" valign="top" id="insides">
<table  >
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
<td><img src="img/Picture2.png" width="10px">&nbsp;<a href="https://irc@bru.edu.et">Web Mail</a></td>
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
	
<div style="width:420px; height:350px; margin:0 auto; position:relative; border:2px solid rgba(0,0,0,0); -webkit-border-radius:5px; -moz-border-radius:5px; border-radius:25px; -webkit-box-shadow:0 0 18px rgba(0,0,0,0.4); -moz-box-shadow:0 0 18px rgba(0,0,0,0.4); box-shadow:0 0 18px rgba(0,0,0,0.4); margin-top:20px; color:#000000;">

  <form id="form1" name="login" method="POST" action="login.php" onsubmit="return validateForm()">
 <div style="background-color:#336699;border-radius:5px;font-family:Arial, Helvetica, sans-serif; color:#000000; padding:5px; height:22px;"> 
 
 
 <div style="float:left;" ><strong><font color="white" size="2px">Member Login</font></strong></div>
 <div style="float:right; margin-right:20px; background-color:#cccccc; width:25px;  text-align:center; border-radius:10px; height:12px;"><a href="index.php" title="Close"><img src="img/close_icon.gif"></a></div>
 
 
 </div>
 <?php
	//    if (isset($_POST['submitlogin'])){ 
	//     $username=$_POST['username'];
	//     $password=$_POST['password'];
	//     $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	//     $result = mysqli_query($conn,$sql); 
	// 	// TO check that at least one row was returned 
	// 	$rowCheck = mysqli_num_rows($result);
	// 	$row=mysqli_fetch_array($result);
    //     $status=$row['status'];
	// 	 if($row['level']==1){ 
	// 	 if($status==1)
	// 	{
	// 	$_SESSION['user_id']=$row['user_id'];
    //      echo "<script>window.location='admin.php';</script>";
	// 		} 
	// 		else
	// 	{
	// 	echo'<p class="wrong"> Your Account is not active Please contact the system Admin</p>';                                
	// 	   echo' <meta content="4;login.php" http-equiv="refresh" />';	
	// 	}
	// 	}	
	// 		else if($row['level']==2){
    //       if($status==1)
	// 	{	
	// 	$_SESSION['user_id']=$row['user_id'];
		
    //      echo'  <meta content="1;pro_manager.php" http-equiv="refresh" />';
	// 		}
	// 		else
	// 	{
	// 	echo'  <p class="wrong"> Your Account is not active Please contact the system Admin</p>';                                
	// 	   echo' <meta content="4;login.php" http-equiv="refresh" />';	
		   
	// 	}
	// 	}
	// 		else if($row['level']==3){
    //       if($status==1)
	// 	{
			
	// 	$_SESSION['user_id']=$row['user_id'];
		
    //      echo'  <meta content="1;proctor.php" http-equiv="refresh" />';
	// 		}
	// 		else
	// 	{
	// 	echo' <p class="wrong"> Your Account is not active Please contact the system Admin</p>';                                
	// 	   echo' <meta content="4;login.php" http-equiv="refresh" />';	
	// 	}
	// 	}
	// 	else {
		
	// 	echo'<br>';
    //    echo'  <p class="wrong">Check Your username or/and Password</p>';                                
	// 	   echo' <meta content="4;login.php" http-equiv="refresh" />';	
	// 	}}
	// 	

    // mysqli_close($conn);


	

if(isset($_POST['submitlogin'])) {
    // 1. Security: SQL injection irraa of eeguuf
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // 2. Query: Login Credentials mirkaneessuuf
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    
    if ($row = mysqli_fetch_array($result)) {
        $status = $row['status'];
        $level = $row['level'];
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['username'] = $row['username']; // Username session keessa kaa'uuf
        $_SESSION['password'] = $row['password']; // password session keessa kaa'uuf
        
        if ($status == 1) {
            // ADMIN, MANAGER, fi PROCTOR-f
            if ($level == 1) {
                echo "<script>window.location='admin.php';</script>";
            } 
            else if ($level == 2) {
                echo "<script>window.location='pro_manager.php';</script>";
            } 
            else if ($level == 3) {
                echo "<script>window.location='proctor.php';</script>";
            } 
            else {
                // --- LOGIC BARATAARRAA (STUDENT LOGIC) ---
                // Barataan kun table 'registrar' keessa jiraachuu isaa check gochuuf:
                // Username isaa akka 'stud_id' tti fayyadamna
                $checkRegistrar = mysqli_query($conn, "SELECT * FROM registrar WHERE stud_id='$username' and phone='$password'");
                $count = mysqli_num_rows($checkRegistrar);

                if ($count > 0) {
                    // Yoo registrar keessatti argame kallattiin gara index.php deema
                    echo "<script>window.location='index.php';</script>";
                } else {
                    // Yoo registrar keessatti hin argamin, dura akka galmaa'u gara register.php erga
                    echo "<script>
                            alert('You are logged in, but not registered in the system yet. Please register first.');
                            window.location='register.php';
                          </script>";
                }
            }
        } else {
            echo '<p style="color:red; text-align:center;">Your Account is not active. Contact Admin.</p>';
            echo '<meta content="3;login.php" http-equiv="refresh" />';
        }
    } 
    else {
        echo '<br><p style="color:red; text-align:center;">Invalid username or password.</p>';
        echo '<meta content="3;login.php" http-equiv="refresh" />';
    }
}
	mysqli_close($conn);

    ?>
 <p align="center"><img src="img/login_icon1.gif" title="Member Login" width="80"></p>
  <table width="286" valign="top" align="center" border="0">
  
  <tr>

	       <td class='para1_text' width="220px"><font color="red">*</font> Username:</td><td>
		   <input type="text"   name="username"   required x-moz-errormessage="Enter Username" ></td>
		 
	     </tr>
		 <tr>
	       <td class='para1_text'><font color="red">*</font> Password:</td><td><input type="password" name="password" required x-moz-errormessage="Enter password" ></td>
	     </tr>
		 
  <tr>
    <td><div align="right"></div></td>
    <td class='para1_text' width="280px"><a href="forget.php">Forget Your Password? <img src="img/help.png"> </a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
	<br>
    <td><input type="submit" name="submitlogin" class="button_example" value="login" /></td>
  </tr>
</table> 
  </form>
<!--Php Script-->  
	   
	   

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
        <p align="center"><font face="Times New Roman" color="white" size="2">Copyright &copy 2026 Borana University  ODMS. All rights reserved.</font></p>
		<br><br>
		<div class="pull-right_foot" align="center">
		&nbsp;&nbsp;&nbsp;<font face="Times New Roman" color="white" size="3">
		<a href="index.php">Home</a>&nbsp;|&nbsp;<a href="about.php">About Us</a>&nbsp;|&nbsp;<a href="contact.php">Contact Us</a>&nbsp;|&nbsp;<a href="dev.php">Developers</a>&nbsp;|&nbsp;<a href="comment.php">Comment</a></font>
		</div>

      </footer>
</div>

<!--End of Footer-->
</body>
</html>
