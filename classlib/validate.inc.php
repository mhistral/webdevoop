<?php

include("query.inc.php");

class Validate extends Query{
    /**
     * validates password 
     * 
     */

    function validatePassword($upass, $repass){
        try{

            //validating password
            if ($upass != $repass){
                $validate['passvalidate'] = "mismatch";
            }
            
            else if ($upass && $repass == ""){
                $validate['passvalidate'] = "empty";
            }
    
            else if ($upass == $repass){
                $validate['passvalidate'] = "match";
            }
            return $validate;
            echo json_encode($validate, JSON_PRETTY_PRINT);
		}
		catch(Exception $e){
			echo $e->getMessage(); 
			return false;
		}

    }

    /**
     * validates Email if available or not outside the given id
     */

    function validateOutsideEmail ($table, $email, $id, $email_db, $id_db){

        	if ($this->selectOutsideEmail($table, $email, $id, $email_db, $id_db)->rowCount()>0){
				$validate['emailvalidate'] = "existing email";
            }
            else if ($email == ""){
                $validate['emailvalidate'] = "empty";
            }
			else {
				$validate['emailvalidate'] = "available email";
            }
            return $validate;
            // echo json_encode($validate);          
        }

    /**
     * Validates Username if available or not outside the given id
     */
    function validateOutsideUsername ($table, $usern, $id, $usern_db, $id_db){
        if ($this->selectOutsideUser($table, $usern, $id, $usern_db, $id_db)->rowCount()>0){
            $validate['unamevalidate'] = "existing Username";
        }
        else if ($usern == ""){
            $validate['unamevalidate'] = "empty";
        }
        else {
            $validate['unamevalidate'] = "available Username";
        }
        return $validate;
        // echo json_encode($validate);     
    }

        /**
     * validates Email if available
     */

    function validateEmail ($table, $email,  $email_db){

        if ($this->selectEmail($table, $email, $email_db)->rowCount()>0){
            $validate['emailvalidate'] = "existing email";
        }
        else if ($email == ""){
            $validate['emailvalidate'] = "empty";
        }
        else {
            $validate['emailvalidate'] = "available email";
        }
        return $validate;
        // echo json_encode($validate);          
    }

/**
 * Validates Username if available
 */
function validateUsername ($table, $usern, $usern_db){
    if ($this->selectUser($table, $usern, $usern_db)->rowCount()>0){
        $validate['unamevalidate'] = "existing Username";
    }
    else if ($usern == ""){
        $validate['unamevalidate'] = "empty";
    }
    else {
        $validate['unamevalidate'] = "available Username";
    }
    return $validate;
    // echo json_encode($validate);     
}

}
