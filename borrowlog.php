<?php 

  if (!isset($_SESSION['student_id'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: admin.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['student_id']);
  	header("location: admin.php");
  }
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="refresh" content="3" >
  <link type="image/x-icon" href="http://192.168.20.21/mpconsole/favicon.ico" rel="icon" />
  <link type="image/x-icon" href="http://192.168.20.21/mpconsole/favicon.ico" rel="shortcut icon" />
  <title>U-Vend</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="res/styles.css">
    <link rel="stylesheet" href="res/theme.css">

    <!--Icons-->
    <script src="res/lumino.glyphs.js"></script>
    <script src="res/notify.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

</head>


<body>


  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><span class="text-info">U-Vend</span></a>
      </div>

    </div><!-- /.container-fluid -->
  </nav>

  <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <ul class="nav menu">
      <li class='active'><a href="borrowlog.php"><svg
            class="glyph stroked dashboard-dial">
            <use xlink:href="#stroked-dashboard-dial"></use>
          </svg> Borrowed Details</a></li>
      
      <li><a href="admin.php"><svg class="glyph stroked male user">
            <use xlink:href="#stroked-male-user"></use>
          </svg> Log Out</a></li>
    </ul>
  </div>
  <!--/.sidebar-->

  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Student ID</th>
          <th>Email Address</th>
          <th>Date Borrowed</th>
          <th>Time Borrowed</th>
          <th>Date Returned</th>
          <th>Time Returned</th>
        </tr>
      </thead>
      <tbody>
        <tr>
    <?php
        require("model/database.php") ;
        $sql = "SELECT * FROM borrow_log ORDER BY Date_Borrowed, Time_Borrowed DESC";
        if ($result=mysqli_query($db,$sql)){
        //each scan/ each time borrowed
        $row = mysqli_fetch_row($result);

        while($row = mysqli_fetch_row($result))
        {
        echo "<tr>";
        echo "<td>" . $row['student_id'] . "</td>" ;
        echo "<td>" . $row['Email'] . "</td>";
        echo "<td>" . $row['Date_Borrowed'] . "</td>";
        echo "<td>" . $row['Time_Borrowed'] . "</td>";
        echo "<td>" . $row['Date_Returned'] . "</td>";
        echo "<td>" . $row['Time_Returned'] . "</td>";
        echo "</tr>";
        }

        echo "</TABLE>";
        // Free result set
        mysqli_free_result($result);
    }

    mysqli_close($db);
        ?>
        </tr>
      </tbody>
    </table>
  </div>
  <!--/.main-->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
</body>

</html>
