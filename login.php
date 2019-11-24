<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>U-Vend</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background-image:url('umb1.jpg'); background-size:100%;">
  <div class="header">
  	<h2>Login</h2>
  </div>
	
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<input type="text" name="student_id" placeholder="Student ID">
  	</div>
  	<div class="input-group">
  		<input type="password" name="password" placeholder="Password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="signup.php">Sign up</a>
  	</p>
  </form>
</body>
</html>