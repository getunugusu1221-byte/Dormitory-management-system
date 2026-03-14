<?php
	include("connection.php");
 session_start();
if(isset($_SESSION['user_id']))
 {
  $mail=$_SESSION['user_id'];
 } else {
 ?>
 <script>
  alert('You Are Not Logged In !! Please Login to access this page');
  alert(window.location='login.php');
 </script>
 <?php
 }
 ?>
<?php
$user_id=$_SESSION['user_id'];
$result=mysqli_query($conn,"select * from users where user_id='$user_id'")or die(mysqli_error($conn));
$row=mysqli_fetch_array($result);
$FirstName=$row['FNAME'];
$middleName=$row['mNAME'];
?>
<!DOCTYPE html >
<head>
<SCRIPT language=Javascript>
      <!--
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
      //-->
   </SCRIPT>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Borana University Online Dormitory managent system</title>
<link rel="icon" type="image/png" href="imag/BRU-logo.jpg"/>
<link href="adminstyle.css" rel="stylesheet" type="text/css" media="screen" />
<link href="slideshow/js-image-slider.css" rel="stylesheet" type="text/css" />
<script src="slideshow/js-image-slider.js" type="text/javascript"></script>
<link href="aa.css" rel="stylesheet" type="text/css" media="screen" />
<script src="aa.js" type="text/javascript"></script>
</head>
<body>
<table  align="center" width="750px">
<!--Header-->
<tr >
<td width="600px"></td>
<td><?php 
echo '<img src="img/people.png" width="40px" height="30px">&nbsp;'.'<font face="times new roman" color="white" size="3">'.$FirstName."&nbsp;".$middleName." ".'</font>';?></td>
<td id="logoutlink" align="center"><a href="logout.php" id="log">Logout</a></td>
</tr>
<tr>
<td width="750px" colspan="3" height="120px">
<p><a href="index.php"><img src="imag/BRU-logo.jpg" align="left" width="150px" height="120px"></a><img src="imag/admin.png" align="center" width="450px" height="120px"></p>
</td>
</tr>
<!--End Of Header-->
<!--Main menus-->
<tr>
<td colspan="3">
<div id="sse2">
        <div id="sses2"  >
         <ul>
         <li><a href="admin.php">Home</a></li>
         <li><a href="viewcom.php">View Comment</a></li>
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
<td width="25%" height="500px" valign="top" id="insides">
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
<td><img src="imag/Picture2.png" width="10px">&nbsp;<a href="viewstudent.php">View Student</a></td>
</tr>
</table>
<br>
<br>
<table border="0">
<tr>
<th width="300px" bgcolor="#336699" height="25px"><font face="arial" color="white" size="2">Manage Account</font></th>
</tr>
<tr>
<td><img src="imag/Picture2.png" width="10px">&nbsp;<a href="cua.php">Create User Account</a></td>
</tr>
<tr>
<td><img src="imag/Picture2.png" width="10px">&nbsp;<a href="raccount.php">Edit User Account</a></td>
</tr>
</table>
<br>
<br>


</td>
<!--End Of Sub menus-->
<!--Body section-->
<td valign="top">
<br>
<br>
<font face="Arial" size="2px">Modify Page</font>
   

  <div style="width:350px; height:360px; margin:0 auto; position:relative; border:2px solid rgba(0,0,0,0); -webkit-border-radius:5px; -moz-border-radius:5px; border-radius:25px; -webkit-box-shadow:0 0 18px rgba(0,0,0,0.4); -moz-box-shadow:0 0 18px rgba(0,0,0,0.4); box-shadow:0 0 18px rgba(0,0,0,0.4); margin-top:20px; color:#000000;">
<!--Form Validation-->
<script type='text/javascript'>
function formValidation(){
//assign the fields
    var firstname=document.getElementById('fname');
	var middlename= document.getElementById('mname');
    var lastname= document.getElementById('lname');
	var user_id = document.getElementById('user_id');
	var phone = document.getElementById('phone');
	var username = document.getElementById('username');
	var password = document.getElementById('password');
	var cpassword = document.getElementById('rpassword');
if(isAlphabet(firstname, "please enter Your First name in letters only")){
if(lengthRestriction(firstname, 3, 30,"for your First name")){
if(isAlphabet(middlename, "please enter Your Middle name in letters only")){
if(lengthRestriction(middlename, 3, 30,"for your Middle name")){
if(isAlphabet(lastname, "please enter Your Last name in letters only")){
if(lengthRestriction(lastname, 3, 30,"for your Last name")){
if(isAlphanumeric(user_id,"Please Enter the Correct ID No (!@#$%^&*()*+=~`) Not allowed")){
if(lengthRestriction(user_id, 3, 15,"for your ID No")){
if(isAlphanumeric(password,"Please Enter the Correct Password (!@#$%^&*()*+=~`) Not allowed")){
if(lengthRestriction(password, 3, 10,"for your Password")){
if(isAlphanumeric(rpassword,"Please Enter the Correct Confirmation Password (!@#$%^&*()*+=~`) Not allowed")){
if(lengthRestriction(rpassword, 5, 10,"for your Confirmation Password")){
if(isAlphanumeric(username,"Please Enter the Correct Username(!@#$%^&*()*+=~`) Not allowed")){
if(lengthRestriction(username, 5, 10,"for your username")){
if(isNumeric(phone, "please enter Number only For Phone Number")){
if(lengthRestriction(phone, 10, 10,"for your Phone number")){
	return true;
	}}}}
	}
	}
	}}
	}}}}
	}}}}
return false;
		
}	
function isAlphabet(elem, helperMsg){
	var alphaExp = /^[a-zA-Z]+$/;
	if(elem.value.match(alphaExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}

function emailValidator(elem, helperMsg){
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	if(elem.value.match(emailExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}
function isNumeric(elem, helperMsg){
	var numericExpression = /^[0-9]+$/;
	if(elem.value.match(numericExpression)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}
function lengthRestriction(elem, min, max, helperMsg){
	var uInput = elem.value;
	if(uInput.length >= min && uInput.length <= max){
		return true;
	}else{
		alert("Please enter between " +min+ " and " +max+ " characters" +helperMsg);
		elem.focus();
		return false;
	}
}
function isAlphanumeric(elem, helperMsg){
	var alphaExp = /^[0-9a-zA-Z\/]+$/;
	if(elem.value.match(alphaExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}
function isAlphabet(elem, helperMsg){
	var alphaExp = /^[a-zA-Z]+$/;
	if(elem.value.match(alphaExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}
	</script>
	
	
	<?php
$ctrl = $_SESSION['user_id'];
$query="SELECT * FROM users where user_id='{$ctrl}'";
$result=mysqli_query($conn,$query);
$count=mysqli_num_rows($result);
if(!$result){
die("user not registered!".mysqli_error($conn));
}
if($count==1){
while($row=mysqli_fetch_array($result)){
$r0=$row['FNAME'];
$r1=$row['mNAME'];
$r2=$row['lname'];
$r3=$row['user_id'];
$r4=$row['sex'];
$r5=$row['level'];
$r6=$row['phone'];
$r7=$row['username'];
$r8=$row['password'];
$r9=$row['rpassword'];
}
?>
  <form id="form1" method="POST" action="modifyuser.php"  onsubmit='return formValidation()'>
 <div style="background-color:#336699;border-radius:5px;font-family:Arial, Helvetica, sans-serif; color:#000000; padding:5px; height:22px;"> 
 
 
 <div style="float:left;" ><strong><font color="white" size="2px">Edit User Account</font></strong></div>
<div style="float:right; margin-right:20px; background-color:#cccccc; width:25px;  text-align:center; border-radius:10px; height:12px;"><a href="raccount.php" title="Close"><img src="img/close_icon.gif"></a></div> 
 
 </div>
 
 <table valign='top' align="center">
<tr>
<tr><td>First Name:</td><td><input type='text' name='fname' id='fname' value="<?php echo "$r0"?>"></td></tr>
<tr><td>Middle Name:</td><td><input type='text' name='mname' id='mname' value="<?php echo "$r1"?>"></td></tr>
<tr><td>Last Name:</td><td><input type='text' name='lname' id='lname' value="<?php echo "$r2"?>"></td></tr>
<tr><td>User ID:</td><td bgcolor="red"><input  type='text' id='user_id' name='user_id' readonly='readonly' value="<?php echo "$r3"?>"></td></tr>
<tr><td>Sex:</td><td ><input  type='text' name='sex'  id='sex' value="<?php echo "$r4"?>"></td></tr>
<tr><td>Level  :</td><td><input type='text' name='level' id='level'  value="<?php echo "$r5"?>"></tr></td>
<tr><td>Phone No:</td><td><input type='text' name='phone' id='phone' onKeyPress="return isNumberKey(event)" value="<?php echo "$r6"?>"></tr></td>
<tr><td>Username:</td><td><input type='text' name='username' id='username' value="<?php echo "$r7"?>"></tr></td>
<tr><td>Password:</td><td><input type='text' name='password' id='password' value="<?php echo "$r8"?>"></tr></td>
<tr><td>Confirm Password:</td><td><input type='text' name='rpassword' id='confirmpassword' value="<?php echo "$r9"?>"></tr></td>
<tr><td colspan=2 align='center'><input type='submit' name='update' value='Save Changes' class="button_example"></tr></td>
</table>
 
 
 <?php
}
	  

?>
 
 <?php
  if(isset($_POST['update']))
  {
	            $fname=$_POST['fname'];
				$mname=$_POST['mname'];
				$lname=$_POST['lname'];
				$user_id=$_POST['user_id'];
				$phone_no=$_POST['phone'];
				$level=$_POST['level'];
				$password=$_POST['password'];
				$confirmpassword=$_POST['rpassword'];
				if($password==$confirmpassword)
				{
  $update = mysqli_query($conn,"update users set FNAME='$fname',mNAME='$mname', lname='$lname',level='$level', phone='$phone_no' 
	,password='$password',rpassword='$confirmpassword' WHERE user_id='{$user_id}'") or die(mysqli_error($conn));
 // echo'<meta content="3;raccount.php" http-equiv="refresh"/>';
 echo "<script>window.location='raccount.php';</script>";
  }
  else
  {
  echo'  <p class="wrong">Your Password Does not match!!</p>';
	   echo'<meta content="4;raccount.php" http-equiv="refresh" />';
  }
  }
  ?>
 
 
 
 
 
 
 
  <!--<table width="406" align="center">
	
         <tr>
	       <td class='para1_text' width="220px">First Name:</td>
		   <td><input type="text" name="fname" id="fname" value="<?php echo $fname; ?>"></td>
	     </tr>
		 <tr>
	       <td class='para1_text' width="220px"> Middle Name:</td>
		   <td><input type="text" name="mname" id="mname" value="<?php echo $mname; ?>" ></td>
	     </tr>
		 <tr>
	       <td class='para1_text' width="220px"> Last Name:</td>
		   <td><input type="text" name="lname" id="lname" value="<?php echo $lname; ?>" ></td>
	     </tr>
		 <tr>
	       <td class='para1_text' width="220px"> User ID:</td>
		   <td><input type="text" readonly='readonly' value="<?php echo $user_id; ?>" ></td>
	     </tr>
		 <tr>
                
                <td class='para1_text' width="220px">Sex:</td>
                <td><input type="text" name="sex" id="sex" value="<?php echo $sex; ?>" ></td>
              </tr>
		 <tr>
	       <td class='para1_text' width="220px"> Phone No.:</td>
		   <td><input type="text" name="phone_no" id="phone" value="<?php echo $phone_no; ?>" onKeyPress="return isNumberKey(event)" value="<?php echo $fetch[7] ?>" ></td>
	     </tr>
              <tr>
              <td style="padding-top:12px;">Access Type :</td>
		      <td><input type="text" name="level" value="<?php echo $level; ?>" id="actype"></td>
              </tr>
			  <tr>
              <td class='para1_text' width="220px">Block Number :</td>
              <td><input type="text" name="block" value="<?php echo $block; ?>" id="block"></td>
              </tr>
		   <tr>
	       <td class='para1_text' width="220px"> Username:</td>
		   <td><input type="text" name="username" value="<?php echo $username; ?>" ></td>
	     </tr>
		 <tr>
	       <td class='para1_text'> Password:</td>
		   <td><input type="text" name="password" value="<?php echo $password; ?>" id="username"></td>
	     </tr>
		 <tr>
	       <td class='para1_text'> Confirm Password:</td>
		   <td><input type="text" name="confirmpassword" value="<?php echo $confirmpassword; ?>" id="cpassword"></td>
	     </tr>
  <tr>
	<br><br><br>
	<td>&nbsp;</td>
    <td><input type="submit" name="save" value="Save" /></td>
  </tr>
  
  
</table>--> 
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
        <p align="center"><font face="Times New Roman" color="white" size="2">Copyright &copy 2014 Debre Berhan University  ODMS. All rights reserved.</font></p>
		<br><br>
		<div class="pull-right_foot" align="center">
		&nbsp;&nbsp;&nbsp;<font face="Times New Roman" color="white" size="3">
		<a href="admin.php">Home</a>&nbsp;|&nbsp;<a href="viewcom.php">View Comment</a>&nbsp;|&nbsp;<a href="Postinfo.php">Post Info</a>&nbsp;</font>
		</div>

      </footer>
</div>

<!--End of Footer-->
</body>
</html>
