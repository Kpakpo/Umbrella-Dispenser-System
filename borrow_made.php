<?php 
    $servername = "localhost";
    $username = "id9362450_root";
    $pass = "HolyBible63";
    $dbname = "id9362450_u_vend";
    // Create connection
    $conn = mysqli_connect($servername, $username, $pass,$dbname);
    $myTable = "user_details";


//borrowing umbrella
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    else{
        // $ident = $_GET["borrow1"];
        if(isset($_GET['borrow1'])){
            $ident = $_GET['borrow1'];
        // }
        
       $ident = mysqli_real_escape_string($conn, $_GET['borrow1']);

    
  // receive all input values from the form
       


        $sql = "SELECT * FROM $myTable WHERE student_id= '$ident'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $ID = $row['student_id'];
        $email = $row['email'];
        $date = '';
        $time = '';
        $date = date("Y-m-d");
        $time = date("h:i:sa");
        
        
        if ($ID == $ident){
            $newTable = "borrow_log";
            $sql = "INSERT INTO `$newTable` (`email`, `Date_Borrowed`,`Time_Borrowed`,`student_id`) VALUES ('$email','$date','$time','$ID')";

            if(mysqli_query($conn, $sql)){
               
                
                file_get_contents('https://ugoat.serveo.net');
                header('location: choice_borrow.php');
                //echo "Open Latch";
                
            }else{
                
               
                echo "Did not save in log";
                // echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
            }
            
            
        }
        else{
            
           
           echo "Do not Open Latch";
        }
        
        //if(mysqli_query($conn, $sql)){
            
        //}else{
            
            
        //}
        }
    

    }
    
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    else{
        // $ident = $_GET["borrow1"];
        if(isset($_GET['return1'])){
            $ident = $_GET['return1'];
        // }
        
       $ident = mysqli_real_escape_string($conn, $_GET['return1']);

    
  // receive all input values from the form
       


        $sql = "SELECT * FROM $myTable WHERE student_id= '$ident'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $ID = $row['student_id'];
        $email = $row['email'];
        $date = '';
        $time = '';
        $date = date("Y-m-d");
        $time = date("h:i:sa");
        
        
        if ($ID == $ident){
            $newTable = "borrow_log";
            $sql = "UPDATE `$newTable` SET Return_Date='$date', Return_Time='$time' where student_id='$ID'";

            if(mysqli_query($conn, $sql)){
               
                
                file_get_contents('https://ugoat.serveo.net');
                header('location: choice_return.php');

                //echo "Open Latch";
                
            }else{
                
               
                echo "Did not save in log";
                // echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
            }
            
            
        }
        else{
            
           
           echo "Do not Open Latch";
        }
        
        //if(mysqli_query($conn, $sql)){
            
        //}else{
            
            
        //}
        }
    

    }
$conn->close();

?>