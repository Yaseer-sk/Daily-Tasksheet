<?php
session_start();

  $conn = mysqli_connect ("localhost","root","","details") or die("connenction not established"); 
?>
<html>
 <head>
  <title>Staff</title>
   <script src="jquery-3.1.1.min.js"></script>
   <link rel="stylesheet" href="bootstrap-3.3.7-dist\css\bootstrap.min.css">
   <script src="bootstrap-3.3.7-dist\bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   <script>
	 $(document).ready(function(){
		// alert("hi");
		 
		 var pathname = window.location.pathname; // Returns path only
		 var url      = window.location.href;     // Returns full URL
		// alert(url);
	if( url.search( 'staff1' ) > 0 ) {
		// alert(url);
		 $(".s2, .s3, .s4, .s5, .s6, .s7, .s8, .s9").hide();
		 $(".s1").show();
	  }
	  if( url.search( 'staff2' ) > 0 ) {
		 //alert("img 1");
		$(".s1, .s3, .s3, .s4, .s5, .s6, .s7, .s8, .s9").hide();
		 $(".s2").show();	
	  } 
	  
	  if( url.search( 'staff3' ) > 0 ) {
		 //alert("img 1");
		$(".s1, .s2, .s4, .s5, .s6, .s7, .s8, .s9").hide();
		 $(".s3").show();
	  }
	  
	   if( url.search( 'staff4' ) > 0 ) {
		 //alert("img 1");
		$(".s1, .s2, .s3, .s5, .s6, .s7, .s8, .s9").hide();
		 $(".s4").show();
	  } 
	  
		if( url.search( 'staff5' ) > 0 ) {
		 //alert("img 1");
		$(".s1, .s2, .s3, .s4, .s6, .s7, .s8, .s9").hide();
		 $(".s5").show();
	  } 
	  
	  if( url.search( 'staff6' ) > 0 ) {
		 //alert("img 1");
		$(".s1, .s2, .s3, .s4, .s5, .s7, .s8, .s9").hide();
		 $(".s6").show();
	  } 
	  
	   if( url.search( 'staff7' ) > 0 ) {
		 //alert("img 1");
		$(".s1, .s2, .s3, .s4, .s5, .s6, .s8, .s9").hide();
		 $(".s7").show();
	  } 
	  
		if( url.search( 'staff8' ) > 0 ) {
		 //alert("img 1");
		$(".s1, .s2, .s3, .s4, .s5, .s6, .s7, .s9").hide();
		 $(".s8").show();
	  } 
	  
		  if( url.search( 'staff9' ) > 0 ) {
		 //alert("img 1");
		$(".s1, .s2, .s3, .s4, .s5, .s6, .s7, .s8").hide();
		 $(".s9").show();
	  } 
	 });	 
    </script>

 </head>

<body>

 <center>  <a href="http://localhost/basics/insert_data.php"><b>Back to dashboard</b></a> </center>
  
  <div style="float: right; margin-right: 20px"><a href="http://localhost/basics/logout.php"><b>Logout</b></a></div>
 
   <div id="s1">
<?php

 if($_SESSION['user_type'] != 'user'){
	  header("location: login.php");
	 //echo 'admin';
  }
  else{
	  $_SESSION['id']
?>

<table border="2" class="s1">
	<tr bgcolor='orange' border='4' width='100%'>
	  <th> Date </th>
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
 
	  $select = "select * from task where user_id = '" . $_SESSION['id']. "'";
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
?>
 </table>

   <?php } ?>
 
</div>
 
 </body>
</html>
 