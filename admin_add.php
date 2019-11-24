<?php include('admin_server.php') ?>
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
				<label>Name</label>
				<input type="text" name="username" value="<?php echo $admin_name; ?>">
			</div>
			<div class="input-group">
				<label>Email</label>
				<input type="email" name="email" value="<?php echo $email; ?>">
			</div>
			<div class="input-group">
				<label>Password</label>
				<input type="password" name="password_1">
			</div>
			<div class="input-group">
				<label>Confirm password</label>
				<input type="password" name="password_2">
			</div>
			<div class="input-group">
				<button type="submit" class="btn" name="reg_admin">Register</button>
			</div>
			
		</form>
	</body>

</html>