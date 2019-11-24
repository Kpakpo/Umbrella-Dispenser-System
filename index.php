<?php 
  session_start(); 

  if (!isset($_SESSION['student_id'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['student_id']);
  	header("location: login.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background-image:url('umb1.jpg'); background-size:100%;">

<div class="header">
	<h2>Home Page</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>
 
    <!-- logged in user information -->
    <?php  if (isset($_SESSION['student_id'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['student_id']; ?></strong></p>
			<p>You Have successfully created an account.<strong><?php echo $_SESSION['student_id']; ?></strong></p>
			<p>Click <a href="choice.php" style="color: red;">Here</a> to borrow or return an umbrella</p>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>
		
</body>
</html>