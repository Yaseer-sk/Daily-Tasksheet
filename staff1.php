<?php
session_start();

  $conn = mysqli_connect ("localhost","root","","details") or die("connenction not established");

 
?>
<html>
<head>
<title>
   Staff
</title>
<script src="jquery-3.1.1.min.js"></script>

<link rel="stylesheet" href="bootstrap-3.3.7-dist\css\bootstrap.min.css">

<script src="bootstrap-3.3.7-dist\bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
</head>

<style>
 th{text-align:center}
</style>

<body>

<center>  <a href="http://localhost/basics/admin1.php"><b>Back to dashboard</b></a> </center>
  
 <div style="float: right; margin-right: 20px"><a href="http://localhost/basics/logout.php"><b>Logout</b></a></div>
 

  

<?php

 if($_SESSION['user_type'] != 'admin'){
 header("location: login.php");
	 //echo 'admin';
  }
  else{
?>  
   <table border="2">
	<tr bgcolor='orange' align="center" border='4' width='80%'>
	  <th style="width: 8%"> Date </th>
	  <th> Support Given By </th>
	  <th> Support Given To </th>
	  <th> Support name </th>
	  <th> Support Description </th>
	  <th> Support start time(hours) </th>
	  <th> Support start time(mins) </th>
	  <th> Support end time(hours) </th>
	  <th> Support end time(mins) </th>
	  <th> Support Status </th>
	</tr>
	
  <?php   
  if (isset($_GET['staff'])){
	  
	  $staff_id = $_GET['staff'];
	  
	  $select = "select * from task where user_id='$staff_id'";
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
	   $e_time_m = $row['end_time_m'];
	   $status = $row['status']; 
  ?>

<tr align="center">
	<td> <?php echo $date;?> </td>
	<td> <?php echo $t_owner;?> </td>
	<td> <?php echo $c_name;?> </td>
	<td> <?php echo $t_name;?> </td>
	<td> <?php echo $t_desc;?> </td>
	<td> <?php echo $s_time_h;?> </td>
	<td> <?php echo $s_time_m;?> </td>
	<td> <?php echo $e_time_h;?> </td>
	<td> <?php echo $e_time_m;?> </td>
	<td> <?php echo $status;?> </td>
	</tr>
	 

<?php 
	 }
  }
  ?>
  </table>
<?php } ?>
</body>
</html> 