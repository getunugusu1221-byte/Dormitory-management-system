<?php
include('connection.php');
			$query="SELECT * FROM info ORDER BY date;";
			$result=mysqli_query($conn,$query);
while($row = mysqli_fetch_array($result))
  {
   $title = $row['title'];
   $info = $row['infos'];
   }
            
            echo"<h2 align='center'><u>". $title."</u></h2>";			
			echo"<font face='arial' size='2' color='black' >";
			echo"<p align='center'>";
			echo $info;
			echo"</p>";			
			?>