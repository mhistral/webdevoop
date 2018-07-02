<?php
include("../classlib/validate.inc.php");

//instantiate new object from class Query
$query = new Query();

$firstName = $_POST['fname'];
$lastName = $_POST['lname'];
$email =  $_POST['email'];
$address = $_POST['address'];
$usern = $_POST['usern'];
$upass =  $_POST['upass'];
$repass =  $_POST['repass'];
$contractStarted = $_POST['contractStarted'];
$contractEnded =  $_POST['contractEnded'];

$query = new Query();
$validate = new Validate();

//getting the return value 
$resultArray['passResult'] = $validate->validatePassword($upass,$repass);
$resultArray['emailResult'] = $validate->validateEmail('customer_info', $email, 'email_address');
$resultArray['userResult'] = $validate->validateUsername('customer_info', $usern, 'username');


// validation logic starts here
if ($resultArray['passResult']['passvalidate'] == 'match' && $resultArray['emailResult']['emailvalidate'] == "available email" &&
$resultArray['userResult']['unamevalidate'] == "available Username"){
    $query->addUsers($firstName, $lastName, $email, $address, $usern, $upass, $contractStarted, $contractEnded);
}

echo json_encode($resultArray, JSON_PRETTY_PRINT);




