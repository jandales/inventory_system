<?php



 class AccountInformation {

 	public $conn;

 	public $table = 'AccountInfo';

 	function __construct() {
        
        $db = new DbConnection();

        $this->conn = $db->Connect();

		return $this->conn;


    }

    function index(){	
	
		$sql = "select * from ". $this->table ." ";
		$result = mysqli_query($this->conn,$sql);
		return $result;

    }

    function create($data){
 
		$sql ="INSERT INTO " . $this->table ."(person_id,firstname,lastname,email,phone,address,zip,state,city,account,avatar,date_added) VALUES ('?','?','?','?','?','?','?','?','?','?','?','?')";
  
		$stmt->$this->conn->prepare($sql);

		$stmt->bind_param('ssssssssssssssss',

		$data['person_id'],
		$data['firstname'],
		$data['lastname'],
		$data['email'],
		$data['phone'],
		$data['address'],		
		$data['zip'],
		$data['city'],
		$data['state'],
		$data['account'],	
		$data['avatar'],
		$data['date_added']
		

);

	$stmt->execute();



  	}

    

    function update(){
	
		$sql = "UPDATE ". $this->table . " SET firstname = '?', lastname = '?', email = '?', phone = '?', address = '?', , city = '?', zip = '?', state = '?',  account = '?', avatar = '?',   WHERE person_id = '?'";
		$stmt->$this->conn->prepare($sql);
					
		$stmt->bind_param('ssssssssssssssss',
			$data['person_id'],
			$data['firstname'],
			$data['lname'],
			$data['email'],
			$data['phone'],
			$data['address'],	
			$data['zip'],
			$data['city'],
			$data['state'],		
			$data['account'],		
			$data['avatar']				

		);

		return $stmt->execute();

					
 

    }

    function delete($id) {

	
		$sql = "Delete  from ". $this->table ."  WHERE person_id = ? ";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param('s',$id);

        $result = $stmt->execute();

        return $result;


    }

    function select($id){
	
	
		$sql = " SELECT * FROM " . $this->table . " WHERE person_id = ? ";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param("s", $id);

        $stmt->execute();

        $result = $stmt->get_result();

        return $result;
    }
		





 }