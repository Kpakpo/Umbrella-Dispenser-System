<?php

// initializing variables
$servername = "localhost";
$username = "id9362450_root";
$pass = "HolyBible63";
$dbname = "id9362450_u_vend";

$admin_name="";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect($servername, $username, $pass, $dbname);


// REGISTER USER
if (isset($_POST['reg_admin'])) {
  // receive all input values from the form
  $admin_name = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($admin_name)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same StudentID and/or email
  $user_check_query = "SELECT * FROM admins WHERE student_id='$admin_name' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $admin_name) {
      array_push($errors, "username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database
    //$password = password_hash($password_1, PASSWORD_DEFAULT);//encrypt the password before saving in the database

  	$query = "INSERT INTO admins (username, email, password) 
  			  VALUES('$admin_name', '$email', '$password')";
  	mysqli_query($db, $query);
    $_SESSION['username'] = $admin_name;
  	$_SESSION['success'] = "Admin added!";
  	header('location: borrowlog.php');
  }
}


// LOGIN ADMIN
if (isset($_POST['login_admin'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($email)) {
  	array_push($errors, "Email is required");
  }

  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);//encrypt the password before saving in the database
  	//$password = password_hash($password, PASSWORD_DEFAULT);//encrypt the password before saving in the database
  	$query = "SELECT * FROM admins WHERE email='$email' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['email'] = $email;
  	  header('location: borrowlog.php');
  	}else {
  		array_push($errors, "Wrong StudentID/password combination");
  	}
  }
}

?>