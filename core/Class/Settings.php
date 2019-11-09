<?php




class Settings  {

 	private $conn;

  


 	function __construct() {       
   

        $db = new Database();

        $this->conn = $db->connect();  

        return $this->conn;
        
    }

    function taxes(){

    	$tax = "Tax";

    	$sql = "SELECT * FROM settings WHERE setting_name LIKE ? ";

    	$stmt = $this->conn->prepare($sql);

        $stmt->bind_param('s',$tax);

        $stmt->execute();   

        $result = $stmt->get_result();   

        return $result;



           
    }








 }