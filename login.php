<html>
<head>
    <title>Customer List</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/core.js"></script>
    <link rel="stylesheet" type="text/css" href ="css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar navbar-light" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="#">LOGIN</a>
</nav>

<div class="container cont cont-margin">
    <div class="col-lg-12 border">
    
        <form method = "post" action = "php/connection.php" id = "login_form">
            <div class="form-group">
                <label class="col-4 col-form-label">Username</label>
                <div class="col-10">
                <input type = "text" name = "username" class = "form-control" placeholder = "Enter Username Here">
                </div>
            </div>

            <div class="form-group">
                <label class="col-4 col-form-label">Password</label>
                <div class="col-10">
                    <input type = "password" name = "password" class = "form-control" placeholder = "Enter Password here...">
                </div>
            </div>
            <button type="submit" class="btn btn-primary" id = "login">Login</button>
        </form>
        
    </div>
</div>
</body>
</html>