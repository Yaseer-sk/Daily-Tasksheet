<?php
  include("connect.php");
session_start();
?>

<html>
<head>
<title>   Login </title>
<script src="jquery-3.1.1.min.js"></script>

<link rel="stylesheet" href="./bootstrap.min.css">

<script src="./bootstrap.min.js"></script>

<link rel="stylesheet" href="./font-awesome.min.css">
</head>

<body>
 <div class="container">
  <div class="row" style="padding-top: 10%;">
   <div class="col-md-4 col-md-offset-4">
    <img src="logo.png" class="img-responsive" style="padding-left: 29%">
   </div>
  </div>
 
  <div class="row" style="padding-top: 3%;">
   <div class="col-md-4 col-md-offset-4" style=" border: 1px solid #ccc; border-radius: 20px; padding: 25px">
    <form action="login.php" method="POST">
     <input type="email" name="email" class="form-control" placeholder="Enter email" /> <br />
     <input type="password" name="pass" class="form-control" placeholder="Enter Password" /> <br />
     <center> <input type="submit" name="login" class="btn btn-success" value="Login" style="text-align: center" /> </center>
    </form>
   </div>
  </div>
 </div>

<?php

  if (isset($_POST['login']))
  {
	  $user_email = mysqli_real_escape_string($conn, $_POST['email']);
	  $user_pass = mysqli_real_escape_string($conn,$_POST['pass']);
	  
	  $sel = "select * from login where email='$user_email' AND password='$user_pass'";
	  	  
	  $run = mysqli_query($conn, $sel);
	  	  
	  $check = mysqli_num_rows($run);	  
	  
	  if ($check==0) {
		  echo "<script>alert('This email is not registered. Please register and login again');</script>";
		 
	  } else {
		 
		  if($data=mysqli_fetch_assoc($run)){
			 if($data['user_type'] == 'admin'){
			 $_SESSION['user_type'] = 'admin';
			 $_SESSION['name'] = $data['username'] ;
			 $_SESSION['id'] = $data['user_id'] ;
			header('location: admin1.php');				
			 } else if($data['user_type'] == 'user') {
                $_SESSION['user_type'] = 'user';
				$_SESSION['name'] = $data['username'] ;
				$_SESSION['id'] = $data['user_id'] ;	
				header('location: insert_data.php') ;
			 }
		  }
		  
	  }
  }
  ?>
</body>
</html>
