<?php
include("../classlib/validate.inc.php");
// include("../classlib/query.inc.php");
$id = $_POST['id'];
$firstName = $_POST['fname'];
$lastName = $_POST['lname'];
$email =  $_POST['email'];
$address = $_POST['address'];
$usern = $_POST['usern'];
$upass =  $_POST['upass'];
$repass =  $_POST['repass'];
$contractStarted = $_POST['contractStarted'];
$contractEnded =  $_POST['contractEnded'];

// creating instance of Query and Validate
$query = new Query();
$validate = new Validate();

//getting the return value 
$resultArray['passResult'] = $validate->validatePassword($upass,$repass);
$resultArray['emailResult'] = $validate->validateOutsideEmail('customer_info', $email, $id, 'email_address', "customer_id");
$resultArray['userResult'] = $validate->validateOutsideUsername('customer_info', $usern, $id, 'username', "customer_id");


// validation logic starts here
if ($resultArray['passResult']['passvalidate'] == 'match' && $resultArray['emailResult']['emailvalidate'] == "available email" &&
$resultArray['userResult']['unamevalidate'] == "available Username"){
    $query->editUser($id, $firstName,$lastName,$email,$address,$usern,$upass,$contractStarted,$contractEnded);

}

// foreach($resultArray as $allResults);
// var_dump($allResults);
echo json_encode($resultArray, JSON_PRETTY_PRINT);



