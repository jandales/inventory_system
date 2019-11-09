<?php 

	class Database {
	
		private $localhost = "localhost";

		private $username = "root";

		private $password = "";

		private $database ="pto";


		function  connect(){


			 $connect = mysqli_connect($this->localhost, $this->username, $this->password, $this->database);

			if(!$connect){

				die("Cant connect to database");

			}
		
			return $connect;
		}
	}

?>