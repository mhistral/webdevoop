<html>
<head>
	<title></title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href ="css/style.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   <script src="js/core.js"></script>
   <link rel="stylesheet" type="text/css" href ="css/style.css">

</head>
<body>

<!-- navbar code goes here -->
<nav class="navbar navbar-expand-lg navbar navbar-light" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="#">UserFirstNameGoesHere</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="#" id ="addCustomerNav" data-action="registerNav">Add Customer <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#" id ="customerList">Customer List</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" id = "formSearch" method = "post">
      <a href="php/logoutsession.php"><button class="btn btn-outline-success my-2 my-sm-0" type="button">Logout</button></a>
    </form>
  </div>
</nav>
<!-- end of navbar code -->


<!-- table code goes here -->
<div class="container mt-5">
	<table class="table table-hover table-responsive">
	<h2>CUSTOMER LIST</h2>
	<thead>
		<tr>
			<th scope="col">Count</th>
			<th scope="col">Firstname</th>
			<th scope="col">Lastname</th>
			<th scope="col">Email Address</th>
			<th scope="col">Address</th>
			<th scope="col">Username</th>
			<th scope="col">Contract Started</th>
			<th scope="col">Contract Ended</th>
			<th scope="col">Actions</th>
		</tr>
	</thead>

	<!-- checking DB connection and accessing data-->
	<?php
	include("classlib/query.inc.php");
	
	//checking if Database is Connected
  	$object = new Dbh;
	$object->connect();
	//end of checking

	//getting the table data
	$tableData = new Query();
	$count=1;

	foreach($tableData->selectAll('customer_info') as $item){

	// var_dump($item);

  ?>
	<tbody>
		<tr>
			<td><?= $count ?></th>
			<td><?= $item['first_name'] ?></td>
			<td><?= $item['last_name'] ?></td>
			<td><?= $item['email_address'] ?></td>
			<td><?= $item['home_address'] ?></td>
			<td><?= $item['username'] ?></td>
			<td><?= date("M-d-Y", strtotime($item['contract_start'])) ?></td>
			<td><?= date("M-d-Y", strtotime($item['contract_end']))?></td>
			<td><button class="btn btn-action" data-action = "edit" data-client-id = "<?= $item['customer_id'] ?>" name="edit"> Edit</button></td>
			<td><button class="btn btn-action" data-action = "delete" data-client-id = "<?= $item['customer_id'] ?>" name="delete"> Delete</button></td>
        
		</tr>
	</tbody>
		
	<?php
		$count++;
		} //end tag of foreach loop
	?>

	</table>
<!-- end of table code -->

	<!--modal content-->
	<div class="modal fade" id="myModal" role="dialog">
		<!-- start of modal-dialog-->
		<div class="modal-dialog">
			<!-- start of modal-content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!-- start of container cont-->	
				<div class="container cont">
					<!-- start of form code -->
					<div class="col-lg-12">
						<form method = "post" action = "classlib/connection.inc.php" id = "edit_form" >
							<div class="form-group">
								<!-- <label class="col-4 col-form-label">ID</label> -->
								<div class="col-10">
										<input type = "text" name = "id" class = "form-control" placeholder = "ID goes here" hidden>
								</div>
							</div>

							<div class="form-group">
								<label class="col-4 col-form-label">First Name</label>
								<div class="col-10">
										<input type = "text" name = "fname" class = "form-control" placeholder = "Enter First Name here...">
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
										<input type = "email" id = "email" name = "email" class = "form-control onBlur" data-action="emailOnBlur" placeholder = "Enter Email address here..." >
									</div>
									<h6 id ="emailNotif"></h6>
								</div>
							</div>

							<div class="form-group">
								<label class="col-4 col-form-label">Contract Started:</label>
								<div class="col-10">
									<div class="input-group">
										<input class="form-control" type="date" value="<?php echo date('Y-m-d'); ?>" name = "contractStarted">
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-4 col-form-label">Contract Ended:</label>
								<div class="col-10">
									<div class="input-group">
										<input class="form-control" type="date" value="<?php echo date('Y-m-d'); ?>" name = "contractEnded">
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-4 col-form-label">Username</label>
								<div class="col-10">
									<div class="input-group">
										<input type = "text" id = "usern" name = "usern" class = "form-control onBlur" data-action="userOnBlur" placeholder = "Enter Username here..." >
									</div>
									<h6 id ="userNotif"></h6>
								</div>
							</div>

							<div class="form-group">
								<label class="col-4 col-form-label">Password</label>
								<div class="col-10">
									<input type = "password" id = "upass" name = "upass" class = "form-control"  placeholder = "Enter Password here..." >		
								</div>
								<br/><h6 id ="passNotif"></h6>
							</div>

							<div class="form-group">
								<label class="col-4 col-form-label">Re-type Password</label>
								<div class="col-10">
									<input type = "password" id = "repass" name = "repass" class = "form-control onBlur"  data-action="repassOnBlur" placeholder = "Retype Password here..." >
								</div>
							</div>
							<button type="submit" class="btn btn-primary" name = "save">Submit</button>
						</form>
						<!-- end of form code -->
					</div>
				</div>
				<!-- end of container cont-->	
			</div>
			<!-- end of modal-content-->
		</div>
		<!-- end of modal-dialog-->
	</div>
	<!-- end of modal content-->
</div>
<!-- end of container code -->
</div>
</body>
</html>