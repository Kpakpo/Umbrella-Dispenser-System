
<?php

// initializing variables
$servername = "localhost";
$username = "id9362450_root";
$pass = "HolyBible63";
$dbname = "id9362450_u_vend";

//connect to the database
$db = mysqli_connect($servername, $username, $pass, $dbname);
$myTable = "borrow_log";



// BORROW UMBRELLA
if ($db->connect_error) {
        die("Database Connection failed: " . mysqli_connect_error());
}

else{
     $ID = $_POST['student_id'];
     $sql = "SELECT * FROM borrow_log";
    $result = mysqli_query($db,$sql);
    $date = date("Y-m-d");
    $time = date("h:i:sa");

   
    $email2 = "SELECT 'email' FROM user_details WHERE user_detail.student_id='$ID'";

    //$email2 = $_POST['email'];
    
    /*$sql = "SELECT * FROM $myTable WHERE student_id= '$val'";  //add status column for returned umbrellas
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_row($result);
    */
    
    $newTable = "borrow_log";
    $sql = "INSERT INTO `$newTable` (`student_id`,`email`, `Date`,`Time_Borrowed`) VALUES ('$ID', '$email2','$date','$time') WHERE return_status='$stat2'";

}
    

if (isset($_POST['umb_borrow'])){
//if (!empty($_POST['student_id']) && !empty($_POST['email'])){
    
    $ID = $_POST['student_id'];
    $email2 = "SELECT 'email' FROM user_details WHERE user_detail.student_id='$ID'";

    //$email2 = $_POST['email'];
    
    /*$sql = "SELECT * FROM $myTable WHERE student_id= '$val'";  //add status column for returned umbrellas
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_row($result);
    */
    
    
    $sql = "INSERT INTO `$newTable` (`student_id`,`email`, `Date`,`Time_Borrowed`) VALUES ('$ID', '$email2','$date','$time') WHERE return_status='$stat2'";

    if(mysqli_query($db, $sql)== TRUE){
      echo "Open latch";
    }else{
        echo "Did not save in log";
        echo "Error: " . $sql . "<br>" . $db->error;        
    }

    
        $db->close();
        
}


//returning

//if (isset($_POST['umb_return'])){
if (!empty($_POST['student_id']) && !empty($_POST['email'])){
    
    $ID = $_POST['student_id'];
    $email2 = $_POST['email'];
    
    /*$sql = "SELECT * FROM $myTable WHERE student_id= '$val'";  //add status column for returned umbrellas
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_row($result);
    */
    
    $newTable = "borrow_log";
    $sql = "UPDATE `$newTable` set return_status='returned' where `student_id`='$stat2'";

    if(mysqli_query($db, $sql)== TRUE){
      echo "Returned umbrella";
    }else{
        echo "Cannot return umbrella";
        echo "Error: " . $sql . "<br>" . $db->error;        
    }

    
    $db->close();
        
}

?>