<?php
include("connection.inc.php");

class Query extends Dbh {
	
	/**
	 * returning all value from specific table
	 */
	
	public function selectAll($table){
		try{
			$stmt = $this->connect()->prepare("SELECT * FROM $table");
			$stmt->execute();
			$result = $stmt->fetchAll();

			/**
			 * returning the value of the table
			 */
			// foreach($result as $item){
			// 	$data[]=$item;
			// };
			return $result;

		}
		catch(PDOException $e){
			echo $e->getMessage(); 
			return false;
		}
	}

	/**
	 * getting value of specific ID
	 */

	public function selectId($table, $id, $db_customer){
		try{
			$stmt = $this->connect()->prepare("SELECT * FROM $table WHERE $db_customer=:customerID");
			$stmt->execute([
				'customerID' => $id
			]);
		
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			echo json_encode($result, JSON_PRETTY_PRINT);
		}
		catch(PDOException $e){
			echo $e->getMessage(); 
			return false;
		}
	}
	
	/**
	 * adding customer
	 */

	public function addUsers($firstName, $lastName, $email, $address, $usern, $upass, $contractStarted, $contractEnded){ 

	
		try{
			$stmt = $this->connect()->prepare("INSERT INTO customer_info (first_name, last_name, email_address, home_address,username, 
			user_pass, contract_start, contract_end)VALUES(:fname, :lname, :email, :home, :usern, :upass, 
			:contractStarted, :contractEnded)");
	
			$stmt->execute([
					'fname' => $firstName,
					'lname' => $lastName,
					'email' => $email,
					'home' => $address,
					'usern' => $usern,
					'upass' => $upass,
					'contractStarted' => $contractStarted,
					'contractEnded' => $contractEnded
			]);
			
			// return $stmt;  
			return true;  
		}
		catch(PDOException $e){
			echo $e->getMessage(); 
			return false;
		} 
	}

	/**
	 * edit customer
	 */

	public function editUser($id, $firstName, $lastName, $email, $address, $usern, $upass, $contractStarted, $contractEnded){
		try{
			
			$stmt = $this->connect()->prepare("UPDATE customer_info SET first_name=:fname, last_name=:lname, email_address=:email, home_address=:home,
			username=:usern, user_pass=:upass, contract_start=:contractStarted, contract_end=:contractEnded WHERE customer_id=:id");

			$stmt->execute([
					"id" => $id,
					'fname' => $firstName,
					'lname' => $lastName,
					'email' => $email,
					'home' => $address,
					'usern' => $usern,
					'upass' => $upass,
					'contractStarted' => $contractStarted,
					'contractEnded' => $contractEnded

			]);

	  
		}
		catch(PDOException $e){
			echo $e->getMessage(); 
			return false;
		}

	}
	/**
	 * delete customer
	 */
	public function deleteUser($table, $id, $db_customer){
		try{
			$stmt = $this->connect()->prepare("DELETE FROM $table WHERE $db_customer=:customerID");

			$stmt->execute([
				'customerID' => $id
			]);

			$result['msg'] = "Deleted Succesfully!";
			echo json_encode($result);
		}
		catch(PDOException $e){
			echo $e->getMessage(); 
			return false;
		}

	}

	/**
	 * search email outside the given id
	 */
	public function selectOutsideEmail($table, $email, $id, $email_db, $id_db){
		try{
			$stmt = $this->connect()->prepare("SELECT * FROM $table WHERE $email_db=:email AND $id_db!=:id");		
			$stmt->execute([
				'email' => $email,
				'id' => $id
			]);

			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			// echo json_encode($result);

			//used for validateEmail 
			return $stmt;

		}
		catch(PDOException $e){
			echo $e->getMessage();
			return false;
		
		}
	}

	/**
	 * search username 
	 */

	public function selectOutsideUser($table, $usern, $id, $usern_db, $id_db){
		try{
			$stmt = $this->connect()->prepare("SELECT * FROM $table WHERE $usern_db=:usern AND $id_db!=:id" );		
			$stmt->execute([
				'usern' => $usern,
				'id' => $id
			]);

			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			// echo json_encode($result);

			//used for validateEmail 
			return $stmt;

		}
		catch(PDOException $e){
			echo $e->getMessage();
			return false;
		
		}
	}

	/**
	 * search email 
	 */
	public function selectEmail($table, $email, $email_db){
		try{
			$stmt = $this->connect()->prepare("SELECT * FROM $table WHERE $email_db=:email");		
			$stmt->execute([
				'email' => $email,
			]);

			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			// echo json_encode($result);

			//used for validateEmail 
			return $stmt;

		}
		catch(PDOException $e){
			echo $e->getMessage();
			return false;
		
		}
	}

	/**
	 * search username outside the given id
	 */

	public function selectUser($table, $usern, $usern_db){
		try{
			$stmt = $this->connect()->prepare("SELECT * FROM $table WHERE $usern_db=:usern" );		
			$stmt->execute([
				'usern' => $usern,
			]);

			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			// echo json_encode($result);

			//used for validateEmail 
			return $stmt;

		}
		catch(PDOException $e){
			echo $e->getMessage();
			return false;
		
		}
	}

	/**
	 * search lastname
	 */

	//  public function searchLastName ($table, $lname, $db_lname){
	// 	try{
	// 		$stmt = $this->connect()->prepare("SELECT * FROM $table WHERE $lname LIKE :searchLname");
	// 		$search = "%".$search."%";
	// 		$stmt->bindParam(':search', $search);
	// 		$stmt->execute();

	// 		$result = $stmt->fetch(PDO::FETCH_ASSOC);
	// 		// echo json_encode($result);

	// 		//used for validateEmail 
	// 		return $stmt;
	// 	}

	// 	catch(PDOException $e){
	// 		echo $e->getMessage();
	// 		return false;
		
	// 	}
	//  }


}