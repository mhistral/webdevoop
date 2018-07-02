<?php
  include("classlib/connection.inc.php");
  // include("classlib/addcustomer.php");
?>

<html>
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="js/core.js"></script>
  <link rel="stylesheet" type="text/css" href ="css/style.css">
</head>
<body>

  <!-- checking DB connection -->
  <?php
    $object = new Dbh;

    $object->connect();
  ?>

  <!-- navbar code goes here -->
<nav class="navbar navbar-expand-lg navbar navbar-light" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="#">UserFirstNameGoesHere</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#" id ="addCustomerNav" data-action="registerNav">Add Customer <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" id ="customerList">Customer List</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" id = "formSearch" method = "post">
      <a href="php/logoutsession.php"><button class="btn btn-outline-success my-2 my-sm-0" type="button">Logout</button></a>
    </form>
  </div>
</nav>

<!-- end of navbar code -->

<!-- start of container code -->
<div class="container cont">
  <!-- start of form code -->
  <div class="col-lg-12 border mt">
    <form method = "post" action = "classlib/connection.inc.php" id = "reg_form">
      <div class="form-group">
        <label class="col-4 col-form-label">First Name</label>
        <div class="col-10">
            <input type = "text" name = "fname" class = "form-control" placeholder = "Enter Last Name here...">
        </div>
      </div>

      <div class="form-group">
        <label class="col-4 col-form-label">Last Name</label>
        <div class="col-10">
            <input type = "text" name = "lname" class = "form-control" placeholder = "Enter Last Name here...">    
        </div>
      </div>

      <div class="form-group">
        <label class="col-4 col-form-label">Home Address:</label>
        <div class="col-10">
            <textarea name ="address" class = "form-control" placeholder = "Enter Home Address here..." rows = "3" ></textarea>
        </div>
      </div>
  
      <div class="form-group">
        <label class="col-4 col-form-label">Email Address:</label>
        <div class="col-10">
          <div class="input-group">
              <input type = "email" id = "email" name = "email" class = "form-control blur" data-action="emailOnBlur" placeholder = "Enter Email address here..." >
          </div>
          <h6 id ="emailNotif"></h6>
        </div>
      </div>

      <div class="form-group">
        <label class="col-4 col-form-label">Contract Started:</label>
        <div class="col-10">
            <div class="input-group">
            <input class="form-control" type="date" value="<?php echo date('Y-m-d'); ?>" id = "contractStarted" name = "contractStarted">
            </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-4 col-form-label">Contract Ended:</label>
        <div class="col-10">
            <div class="input-group">
            <input class="form-control" type="date" value="<?php echo date('Y-m-d'); ?>" id = "contractEnded" name = "contractEnded">
            </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-4 col-form-label">Username</label>
        <div class="col-10">
            <div class="input-group">
                <input type = "text" id = "usern" name = "usern" class = "form-control blur" data-action="userOnBlur" placeholder = "Enter Username here..." >
                <h4 id ="userNotif"></h4>
            </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-4 col-form-label">Password</label>
        <div class="col-10">
            <input type = "password" id = "upass" name = "upass" class = "form-control"  placeholder = "Enter Password here..." >
          
        </div>
      </div>

      <div class="form-group">
        <label class="col-4 col-form-label">Re-type Password</label>
        <div class="col-10">
            <input type = "password" id = "repass" name = "repass" class = "form-control blur"  data-action="repassOnBlur" placeholder = "Retype Password here..." >
            <h4 id ="passNotif"></h4>
        </div>
      </div>
      <button type="submit" class="btn btn-primary" name = "save">Submit</button>
    </form>
    <!-- end of form code -->
  </div>
</div>
<!-- start of container code -->
  <br/><br/>
</div>
</body>
</html>