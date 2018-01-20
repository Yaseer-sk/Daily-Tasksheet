<?php
session_start();
  include("connect.php");
?>


<html>
<head>
<title> View </title>
<script src="jquery-3.1.1.min.js"></script>

<link rel="stylesheet" href="bootstrap-3.3.7-dist\css\bootstrap.min.css">

<script src="bootstrap-3.3.7-dist\bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<div style="float: right; margin-right: 20px"><a href="http://localhost/basics/logout.php"><b>Logout</b></a></div>
 

  <?php   
  
	  $select = "select * from task";
	  $run1 = mysqli_query($conn, $select);
	  
	  while($row = mysqli_fetch_assoc($run1))
	  {
		  $id = $row['task_id'];
		 $date = $row['date'];
	   $t_owner = $row['task_owner'];
	   $c_name = $row['client_name'];
	   $t_name = $row['task_name'];
	   $t_desc = $row['task_desc'];
	   $s_time_h = $row['start_time_h'];
	   $s_time_m = $row['start_time_m'];
	   $e_time_h = $row['end_time_h'];
	  // $view = $_POST['view_task'];
	   $e_time_m = $row['end_time_m'];
	   $status = $row['status']; 
	  } 
  ?>


<?php

  if($_SESSION['user_type'] != 'user'){
	  header("location: login.php");
	  //echo "user";
  }
   else{ 
?>
<center>  <a href="http://localhost/basics/insert_data.php"><b>Back to dashboard</b></a> </center> <br />

<div class="row">
  <div class="container">
    <div class="col-md-6 col-md-offset-3">
	<form action="" method="POST">
	   <label>Date:
	   <input type="date" name="date" class="form-control date" value="<?php echo $date;?>" disabled /> </label>
	   <label>Support Given By:
	   <input type="text" name="task_owner" class="form-control towner" value="<?php echo $t_owner;?>" readonly /></label> 
	   <label>Support Given To:
	   <input type="text" name="client_name" class="form-control cname" value="<?php echo $c_name;?>" disabled /></label> 
	   <label>Support name:
	   <input type="text" name="task_name" class="form-control tname" value="<?php echo $t_name;?>" disabled /></label> 
	   <label>Support Description:
	   <input type="text" name="task_desc" class="form-control tdesc" value="<?php echo $t_desc;?>" disabled /></label> <br />
	   <label>Support start time:
	   <input type="number" name="start_time_h" class="form-control sth" value="<?php echo $s_time_h;?>" disabled />
	   <input type="number" name="start_time_m" class="form-control stm"  value="<?php echo $s_time_m;?>" disabled /> 
	   </label>
	   <label>Support end time:
	   <input type="number" name="end_time_h" class="form-control eth"  value="<?php echo $e_time_h;?>" disabled /> 
	   <input type="number" name="end_time_m" class="form-control etm"  value="<?php echo $e_time_m;?>" disabled /> 
	   </label>
	   <label>Support Status:
	   <input type="text" name="status" class="form-control status" value="<?php echo $status;?>" disabled /></label> 
	   <input type='button' name='view_task' value='EDIT YOUR TASK' id='view' class='form-control btn-warning'/> <br />
	   <input type='submit' name='update' value='UPDATE' id='up' class='form-control btn-info'/></div>
		
	   
	  </form>
	</div>
  </div>
  </div>
  
<?php
    }
?>
  
<?php

  if(isset($_POST['update']))
  {
	  $up_date = $_POST['date'];
	  $up_towner = $_POST['task_owner'];
	  $up_cname = $_POST['client_name'];
	  $up_tname = $_POST['task_name'];
	  $up_tdesc = $_POST['task_desc'];
	  $up_stimeh = $_POST['start_time_h'];
	  $up_stimem = $_POST['start_time_m'];
	  $up_etimeh = $_POST['end_time_h'];
      $up_etimem = $_POST['end_time_m'];
	  $up_status = $_POST['status'];
	  
	  $update = "update task set date='$up_date',task_owner='$up_towner',client_name='$up_cname',task_name='$up_tname',task_desc='$up_tdesc',start_time_h='$up_stimeh',start_time_m='$up_stimem',end_time_h='$up_etimeh',end_time_m='$up_etimem',status='$up_status' where task_id='$id'";
	  
	  $up_run = mysqli_query($conn,$update);
	  
	  if($up_run)
	  {
		  echo "<script>alert('Updated Successfully');</script>";
		  echo "<script>window.location.href='view.php';</script>";
	  }
  }

?>

		
<script>

$(document).ready(function()
{ $('#up').hide();
	$('#view').click(function()
	{alert('To make changes click OK');
	
		$('.form-control').prop('disabled',false);
		$('.towner').prop('readonly',true);
		$('#up').show();
		$('#view').hide();
		
	});
});
</script>  
</body>
</html>
