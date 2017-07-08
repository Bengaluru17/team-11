<!DOCTYPE HTML>
<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['uname']);
      $mypassword = mysqli_real_escape_string($db,$_POST['pwd']); 
      
      $sql = "SELECT * FROM user WHERE login_name = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
	  $user_type_id = $row['user_type_id'];
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1 && $user_type_id == 1) {
        $_SESSION['login_user'] = $myusername;
        header("location: admin.php");
      }
	  else if($count == 1 && $user_type_id == 2) {
        $_SESSION['login_user'] = $myusername;
        header("location: staff.php");
      }
	  else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/myStyle.css">
	
	
</head>

<body>


<h1 style="position=center;">Login</h1>
<div class = "container">
	<form class="login" method="post">
	<!--<label><b>Username</b></label>-->
	</br>
	<input type="text" name="uname" class="rounded_text" placeholder="username">
	
	<!--<label><b>Password</b></label>-->
	</br>
	
	<input type="password" class="rounded_text" placeholder="Password" name="pwd">
	</br>
	
	</br>
	<button type="submit" class="btn"><span>Login</span></button>
	<!--<input type="submit" value="Login" class="btn">-->
	</br>
	
	</form>
	
</div>

<div class="footer">
	<p id="copyright">Copyright 2017</p>
	<p id="siddaganga">Reaching hands</p>
 
</div>
</body>

</html>
