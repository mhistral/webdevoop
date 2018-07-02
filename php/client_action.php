<?php
include("../classlib/query.inc.php");

if ($_POST['action']=='edit'){
    $showIdInfo =  new Query();
    $result = $showIdInfo->selectId('customer_info', $_POST['customerID'], 'customer_id');
}

else if ($_POST['action']=='delete'){
    $deleteCustomer =  new Query();
    $result = $deleteCustomer->deleteUser('customer_info', $_POST['customerID'], 'customer_id');
}
