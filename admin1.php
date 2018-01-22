<?php
session_start();
 $conn = mysqli_connect ("localhost","root","","details") or die("connenction not established");

  if($_SESSION['user_type'] != 'admin'){
	  header("location: login.php");
	// echo 'admin';
  }
  else{
	  	echo "<b>Welcome:</b>" . $_SESSION['name'];
?>

<html>
<head>
<title>
   Admin
</title>
<script src="./jquery-3.1.1.min.js"></script>

<link rel="stylesheet" href="./bootstrap.min.css">

<script src="./bootstrap.min.js"></script>

<link rel="stylesheet" href="./font-awesome.min.css">


</head>

<body>


<div style="float: right; margin-right: 20px"><a href="./logout.php"><b>Logout</b></a></div>
 

 <div class="container">
   <div class="row" style="padding-top: 7%;">
    <div class="col-md-4" style="height: 500px; border-right: 1px solid rgba(0, 0, 0, 0.12);padding-top: 7%">
     <div class="form-height" style="border: 1px solid #ccc; border-radius: 20px; padding: 25px;margin-right:10%">
      <form action="admin1.php" method="POST">
       <input type="hidden" name="user_id" class="form-control" />
        <input type="text" name="name" class="form-control" placeholder="Enter Username" required /> <br />
         <input type="email" name="email" class="form-control" placeholder="Enter email" required /> <br />
          <input type="password" name="pass" class="form-control" placeholder="Enter Password" required /> <br />
           <center> <input type="submit" name="regi" class="btn btn-warning" value="Register" style="text-align: center" /></center>     
      </form>
     </div>
    </div>

<?php

 if (isset($_POST['regi'])){
	$user_id = $_POST['user_id'];
    $user_name = $_POST['name'];
	$user_email = $_POST['email'];
	$user_pass = $_POST['pass'];
	
	$insert = "insert into login (email,password,user_type,username) values ('$user_email','$user_pass','user','$user_name')";
	
	$run = mysqli_query($conn, $insert);
	
	if($run){
		echo "<script>alert('You have successfully added user')</script>";
	        }
		}
	
     $select = "select * from login where user_type='user' ORDER BY user_id DESC";
	
      $sel_run = mysqli_query($conn, $select);
		
	
			while($row=mysqli_fetch_assoc($sel_run))
		     {
			   $user_id = $row['user_id'];
			   $user_name = $row['username'];
?>

 <div class="col-md-4 col-md-offset-1">
   <input type="button" name="name" class="btn btn-success" value="<?php echo $user_name; ?>" disabled="disabled" style="width: 85%"/> <a href="admin1.php?delete=<?php echo $user_id; ?>"><i class="fa fa-trash" aria-hidden="true" title="Delete user" onclick="return confirm('Are you sure?')"></i></a> <a href="staff1.php?staff=<?php echo $user_id; ?> "><i class="fa fa-eye" aria-hidden="true" title="View Tasks"></i> </a><br /><br />
 </div>
  <?php  
 }
  ?>
  
  <?php
  
	if(isset($_GET['delete']))
	{
		$delete_id = $_GET['delete'];
		
		$delete = "delete from login where user_id='$delete_id'";
		
		$run_delete = mysqli_query($conn, $delete);
		
		if($run_delete){
			echo "<script>window.location.href='admin1.php'</script>";
		}
	}
	?>
 </div>
</div>

  <?php } ?>
</body>
</html>
