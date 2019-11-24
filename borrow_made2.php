
<?php

// initializing variables
$servername = "localhost";
$username = "id9362450_root";
$pass = "HolyBible63";
$dbname = "id9362450_u_vend";

$date = '';
$time = '';
$StudentID = "";
$email    = "";
$errors = array();

$date = date("Y-m-d");
$time = date("h:i:sa");
$status = "N/A";
$return_stat = 'Returned';

// connect to the database
$db = mysqli_connect($servername, $username, $pass, $dbname);

// add borrow to log
if (isset($_POST['umb_borrow'])) {
  // receive all input values from the form
  $StudentID = mysqli_real_escape_string($db, $_POST['borrow1']);

  
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($StudentID)) { array_push($errors, "StudentID is required"); }


  // first check the database to make sure
  // a user does not already exist with the same StudentID and/or email
  $user_check_query = "SELECT * FROM user_details WHERE student_id='$StudentID' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  
  $borrow_check_query = "SELECT * FROM user_details WHERE student_id='$StudentID' LIMIT 1";
  $result2 = mysqli_query($db, $borrow_check_query);
  $borrow = mysqli_fetch_assoc($result2);
  
  
  if ($user) { // if user exists
    if ($user['student_id']===$StudentID) {
        //if ($borrow!= TRUE){
        
        
            $query = "INSERT INTO borrow_log (student_id, email, Date, Time_Borrowed, return_status) 
      			  VALUES('$StudentID', '$email', '$date, $time, $status')";
      	    $added = mysqli_query($db, $query);
          	if($added===TRUE){
              	$_SESSION['success'] = "You can now pick up your umbrella! Do make sure you return it";
              	$_SESSION['success'] = " Do make sure you return it";
                header('location: choice_borrow.php');
                echo "Open Latch";
            }
	        else{

        	    echo "Do not save in borrow_log";
        	    //echo "ERROR: could not be able to execute $sql. " . mysqli_error($db);
            }
        //}
        /*
        else{
            echo "You haven't returned an umbrella you already borrowed.";*/
    }
    }
    
    

}


//change return status to "returned"
if (isset($_POST['umb_return'])) {
  $StudentID = mysqli_real_escape_string($db, $_POST['student_id']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  $user_check_query = "SELECT * FROM user_details WHERE student_id='$StudentID' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  $borrow_check_query = "SELECT * FROM user_details WHERE student_id='$StudentID' LIMIT 1";
  $result2 = mysqli_query($db, $borrow_check_query);
  $borrow = mysqli_fetch_assoc($result2);

  if ($user) { // if user exists
    if ($borrow){ // if user has already borrowed
        if ($StudentID === $user['student_id']) {
            if ($StudentID ===$borrow['student_id']){
        
                $query = "UPDATE borrow_log SET return_status='Returned'  WHERE student_id=$StudentID";
              	$updated = mysqli_query($db, $query);
              	
              	if ($updated === TRUE){
                  	$_SESSION['success'] = "Please put back the umbrella! ";
                    header('location: choice_return.php');
              	}
            }
        }
    }
  }
}


?>