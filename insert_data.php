<?php
session_start();

include("connect.php");
  
  if($_SESSION['user_type'] != 'user'){
	  header("location: login.php");
	  //echo 'user';
  }
   else {
   	echo "<b>Welcome:</b>" . $_SESSION['name'];
	  
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>
   Insert Data
</title>
<script src="jquery-3.1.1.min.js"></script>

<link rel="stylesheet" href="./bootstrap.min.css">

<script src="./bootstrap.min.js"></script>
</head>
<body>
<br />
<br />
<div style="float: right; margin-right: 20px"><a href="./logout.php"><b>Logout</b></a></div>
 
<div class="row">
 <div class="row">
  <div class="col-md-2">
   <a href="all-task.php"> <input value="VIEW PREVIOUS TASK" id="pre" class="form-control btn btn-info"/> </a>
  </div>
 </div>
  <div class="container">
    <div class="col-md-6 col-md-offset-3">
	 <form action="insert_data.php" method="POST">
	  <input type="hidden" name="user_id" class="form-control" value="<?php echo $_SESSION['id'];?>" />
	   <label>Enter Date:
	   <input type="date" name="date" class="form-control" value="<?php echo date('d-m-Y'); ?>" /> </label>
	   <label>Support Given By:
	   <input type="text" name="task_owner" class="form-control" value="<?php echo $_SESSION['name'];?>" readonly /></label>
	   <label>Support Given To:
	   <input type="text" name="client_name" class="form-control" /></label>
	   <label>Support Subject:
	   <input type="text" name="task_name" class="form-control" /></label>
	   <label>Support Description:
	   <input type="text" name="task_desc" class="form-control" /></label><br>
	   <label>Support start time:
	   <input type="number" name="start_time_h" class="form-control" placeholder="Hour" />
	   <input type="number" name="start_time_m" class="form-control"  placeholder="Minutes"/>
	   </label>
	   <label>Support end time:
	   <input type="number" name="end_time_h" class="form-control"  placeholder="Hour"/>
	   <input type="number" name="end_time_m" class="form-control"  placeholder="Minutes"/>
	   </label>
	   <label>Support Status:
	   <input type="text" name="status" class="form-control" /></label><br>
	   <input type="submit" name="submit" value="SUBMIT TASK" id="sub" class="form-control btn-success"/> <br />
	  </form>
	</div>
  </div>
</div>


<?php
  if(isset($_POST['submit']))
   {
	   $user_id = $_POST['user_id'];
       $date = $_POST['date'];
	   $t_owner = $_POST['task_owner'];
	   $c_name = $_POST['client_name'];
	   $t_name = $_POST['task_name'];
	   $t_desc = $_POST['task_desc'];
	   $s_time_h = $_POST['start_time_h'];
	   $s_time_m = $_POST['start_time_m'];
	   $e_time_h = $_POST['end_time_h'];
	   $e_time_m = $_POST['end_time_m'];
	   $status = $_POST['status'];
	  
		$insert =  "insert into task (user_id,date,task_owner,client_name,task_name,task_desc,start_time_h,start_time_m,end_time_h,end_time_m,status) values('$user_id','$date','$t_owner','$c_name','$t_name','$t_desc','$s_time_h','$s_time_m','$e_time_h','$e_time_m','$status')";
	   
		$run = mysqli_query($conn, $insert);
	   
		   if($run)
		   {
			  echo "<div class='row'><div class='container'><div class='col-md-6 col-md-offset-3'><input type='submit' name='view_task' value='VIEW YOUR TASK' id='view' class='form-control btn-info'/></div></div></div>";
		   }
		   else{
			   echo "data not inserted";
		   }
   }
   
?>

<script>
$(document).ready(function(){
	
    $('#view').click(function(){
		//alert('yes');
		window.location.href = "view.php";
		
    });
}); 
</script>

</body>
</html>
<?php } ?>
