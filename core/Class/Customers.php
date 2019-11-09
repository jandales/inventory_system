<?php



class Customers  {

 	public $conn;

 	public $table = 'customers';

 	function __construct() {
        
        $db = new Database();

        $this->conn = $db->Connect();
        
		return $this->conn;


    }

    function index(){	
	
		$sql = "select * from ". $this->table ." WHERE status = 'active' ";

		$result = mysqli_query($this->conn,$sql);

		return $result;
    }


    function AutoId() {	


		 $query = "SELECT * FROM customers";

		 $result = mysqli_query($this->conn, $query);

		 $count =mysqli_num_rows($result);


			if($count == 0){

			   $customer_id = 1;

			} else {	 

			  $customer_id =  $count + 1 ;
			
			}

			return $customer_id;
    }

    function create($data) {


    	$id = "CU-00" . $this->AutoId();    	

 	

	    $sql ="INSERT INTO customers (customer_id,fname,lname,email,phone,address1,address2,zip,state,city,campany,account,comment,avatar,status,date_added) VALUES (?,?, ?, ?, ?,?, ?, ?, ?,? ,?, ?, ?, ?, ? , ?)";
  
		$stmt = $this->conn->prepare($sql);

		$stmt->bind_param('ssssssssssssssss',			
			$id,
			$data['fname'],
			$data['lname'],
			$data['email'],
			$data['phone'],
			$data['address1'],
			$data['address2'],
			$data['zip'],
			$data['state'],
			$data['city'],
			$data['campany'],
			$data['account'],
			$data['comment'],
			$data['avatar'],
			$data['status'],
			$data['date_added']
		

		);

		return $stmt->execute();



  	}

    

    function update($data){

    	echo "ready to update....";

	
		$sql = "UPDATE ". $this->table . " SET fname = ?, lname = ?, email = ?, phone = ?, address1 = ?, address2 = ?, city = ?, zip = ?, state = ?, comment =?,campany = ?, account = ?, avatar = ?, status = ?  WHERE id = ?";

		$stmt = $this->conn->prepare($sql);
					
		$stmt->bind_param('sssssssssssssss',			
			$data['fname'],
			$data['lname'],
			$data['email'],
			$data['phone'],
			$data['address1'],
			$data['address2'],
			$data['zip'],
			$data['city'],
			$data['state'],
			$data['company'],
			$data['account'],
			$data['comment'],
			$data['avatar'],
			$data['status'],
			$data['id']
		

		);

		$stmt->execute();

		return  $stmt->affected_rows;

					
 		

    }

    function delete($id){


	
		$sql = "UPDATE ". $this->table ." set status = 'inactive' WHERE id = ? ";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param('s',$id);

        $result = $stmt->execute();

        return $result;


    }

    function select($id){
	
	
		$sql = "SELECT * FROM ". $this->table ." WHERE id = ? ";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param("s", $id);

        $stmt->execute();

        $result = $stmt->get_result();

        return $result;
    }

    function search($input){

   
	
	    $sql = "SELECT * FROM customers WHERE status = 'active' AND fname LIKE ? ";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param("s", $input);

        $stmt->execute();

        $result = $stmt->get_result();

   
        return $result;



    }
		function exist($name){

        $sql = "SELECT COUNT(username) FROM ". $this->table ." WHERE customer_name = ? ";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param('s',$username);

        $stmt->execute();      

        return $stmt->num_rows();
      
    }





 }