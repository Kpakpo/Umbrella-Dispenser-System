<?php
session_start();

// initializing variables
$servername = "localhost";
$username = "id9362450_root";
$pass = "HolyBible63";
$dbname = "id9362450_u_vend";

$StudentID = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect($servername, $username, $pass, $dbname);


// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $StudentID = mysqli_real_escape_string($db, $_POST['student_id']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($StudentID)) { array_push($errors, "StudentID is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same StudentID and/or email
  $user_check_query = "SELECT * FROM user_details WHERE student_id='$StudentID' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['student_id'] === $StudentID) {
      array_push($errors, "StudentID already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database
    //$password = password_hash($password_1, PASSWORD_DEFAULT);//encrypt the password before saving in the database

  	$query = "INSERT INTO user_details (student_id, email, password) 
  			  VALUES('$StudentID', '$email', '$password')";
  	mysqli_query($db, $query);
    $_SESSION['student_id'] = $StudentID;
  	$_SESSION['success'] = "Welcome";
  	header('location: choice_borrow.php');
  }
}

// LOGIN USER

if (isset($_POST['login_user'])) {
  $StudentID = mysqli_real_escape_string($db, $_POST['student_id']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($StudentID)) {
  	array_push($errors, "StudentID is required");
  }

  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);//encrypt the password before saving in the database
  	//$password = password_hash($password, PASSWORD_DEFAULT);//encrypt the password before saving in the database
  	$query = "SELECT * FROM user_details WHERE student_id='$StudentID' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  header('location: choice_borrow.php');
  	}else {
  		array_push($errors, "Wrong StudentID/password combination");
  	}
  }
}


?>