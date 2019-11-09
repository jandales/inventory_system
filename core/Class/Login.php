<?php
	


	/**
	* Login system CLass
	*/
	class Login 
	{
		
		private $conn;

		private $password;

		function __construct() {       
  

        $db = new Database();

        $this->conn = $db->Connect();  

        return $this->conn;
    }



		/**
		* Methdd to retreive password
		*/
		function Login($username) {
			


			$sql = 'SELECT password FROM users WHERE username = ?';

			$stmt = $this->conn->prepare($sql);

			$stmt->bind_param('s', $username);

			$stmt->execute();

			$result = $stmt->get_result()->fetch_assoc();		

			return $result['password'];



		}

		


	

		function Logout(){

		}





	}




?>