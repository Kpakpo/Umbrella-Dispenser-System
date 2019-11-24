<?php include('server.php') ?>
<!DOCTYPE html>
<html>
	<head>
		<title>U-Vend</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body style="background-image:url('umb1.jpg'); background-size:100%;">
		<div class="header">
			<h2>Sign up</h2>
		</div>

		<form method="post" action="signup.php">
			<?php include('errors.php'); ?>
			<div class="input-group">
				<input type="text" name="student_id" placeholder="Student ID" >
			</div>
			<div class="input-group">
				<input type="email" name="email" placeholder = "Email" >
			</div>
			<div class="input-group">
				<input type="password" name="password_1" placeholder="Password">
			</div>
			<div class="input-group">
				<input type="password" name="password_2" placeholder="Confirm password">
			</div>
			<div class="input-group">
				<button type="submit" class="btn" name="reg_user">Register</button>
			</div>
			<p>
				Already a member? <a href="login.php">Sign in</a>
			</p>
		</form>
	</body>

</html>