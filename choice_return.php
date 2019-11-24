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
        <li class="tab"><a href="choice_borrow.php">Borrow</a></li>
        <li class="tab active"><a href="choice_return.php">Return</a></li>
      </ul>
      
      <!--<div class="tab-content">-->
          <div id="return">
              <h1>Welcome Back!</h1>
              <form method="POST" action="borrow_made.php">
                  <div class="field-wrap">
                      <input type="text" id="indexnumber" placeholder="Enter index number" name="return1" class="form-control"/>
                  </div>
          

                  <button type="submit" class="button button-block" name="umb_return">Return</button>
                  
                  <br>
                  <button class = "logout"> <a href="login.php?logout='1'" >Logout</a> </button>

              </form> <!-- form2 -->
        
          </div><!-- return -->
        
        
        
      <!--</div><!-- tab-content -->-->

        

      
</div> <!-- /form -->
<script src="forms.js"></script>
</html>