<?php include('borrow_made.php')?>

<!DOCTYPE html>
<html>
    <script
    src="http://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
<div class="form">
  <link rel="stylesheet" href="form.css">
      <body style="background-image:url('umb1.jpg'); background-size:100%;">

      <ul class="tab-group">
        <li class="tab active"><a href="choice_borrow.php">Borrow</a></li>
        <li class="tab"><a href="choice_return.php">Return</a></li>
      </ul>
      
      <!--<div class="tab-content">-->

      <div id="borrow">
          
        
        <h1>U-VEND</h1>
  
        <form method="GET" action="borrow_made.php">
          
          <div class="field-wrap">

            <input type="text" id="indexnumber" placeholder="Enter index number" name="borrow1" class="form-control"/>
          </div>
          
          <div class="field-wrap">
         
           

          <button type="submit" class="button button-block" name="umb_borrow">Borrow</button>
          <br>
          <button class = "logout"> <a href="login.php?logout='1'" >Logout</a> </button>

        </form> <!-- form1 -->

      </div> <!--borrow -->
        
      
        
      <!--</div><!-- tab-content -->
      
</div> <!-- /form -->
<script src="forms.js"></script>
</html>