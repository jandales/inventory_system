<?php


 class Suppliers  {

 	private $conn;

    public $table = 'suppliers';

 	function __construct() {
        
        $db = new Database();

        $this->conn = $db->Connect();  

        return $this->conn;

    }

    function index() {

        $sql = "SELECT * FROM ". $this->table ." WHERE status = 'active' ";

        $result = mysqli_query($this->conn,$sql);

        return $result;
    }

    function getall(){

       $sql = "SELECT * FROM ". $this->table ." WHERE status = 'active' ";

       $result = mysqli_query($this->conn,$sql);

       return $result;

    }


    function AutoID(){

      $sql = "SELECT * FROM ". $this->table ." ";

     $result = mysqli_query($this->conn, $sql);

     $count =mysqli_num_rows($result);


      if($count == 0){

         $id = 1;

      } else {   

        $id =  $count + 1 ;
      
      }

      return "S00" . $id;  

    }


    function create($input){

  
 

        $sql = "INSERT INTO ". $this->table ." (supplier_id, fname,lname,email,phone,address1,address2,zip,state,city,campany,account,comment,avatar,status,date_added) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ? , ? )";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param('ssssssssssssssss',
            $input['supplier_id'],
            $input['fname'],
            $input['lname'],
            $input['email'],
            $input['phone'],
            $input['address1'],
            $input['address2'],
            $input['zip'],
            $input['state'],
            $input['city'],
            $input['campany'],
            $input['account'],
            $input['comment'],
            $input['avatar'],
            $input['status'],               
            $input['date_added']

        );

        if(!$stmt->execute()) {
          return "Cant Creater Suppleirs";  
        }



        return "Successfully Created";

     
  	
    }    

    function update($input) {



      $sql = "UPDATE " . $this->table . " SET  fname = ?, lname = ?,  email = ?, phone = ?, address1 = ?, address2 = ?, city = ?, zip = ?, state = ?, campany = ?, comment = ?, account = ?, avatar = ? WHERE id = ? ";


      $stmt =  $this->conn->prepare($sql);

      $stmt->bind_param('ssssssssssssss',


            $input['fname'],

            $input['lname'],

            $input['email'],

            $input['phone'],

            $input['address1'],

            $input['address2'],

            $input['city'],

            $input['zip'],

            $input['state'],

            $input['campany'],

            $input['account'],

            $input['comment'],   

            $input['avatar'],

            $input['id']

            );

      $stmt->execute();

      return $stmt->affected_rows;

     






    }

    function updateStatus($id) {

        $sql = "UPDATE " . $this->table . "   Set status = 0 WHERE id = '?' ";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param('s',$id);

        $stmt->execute();        

    }


    //// set to inactive supplier
    function delete($id) {

        $sql = "UPDATE ". $this->table ." SET status = 'inactive' WHERE id = ?";
 
        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param('s',$id);

        return $stmt->execute();

    }

    function edit($id) {

      $sql = "SELECT * FROM ". $this->table ."  WHERE id = ?  ";

      $stmt = $this->conn->prepare($sql);

      $stmt->bind_param('s',$id);

      $stmt->execute();

      $result = $stmt->get_result()->fetch_assoc();

      return $result;

    }

    function search($input){

          $sql = "SELECT * FROM " . $this->table ."  WHERE status = 'active' AND campany LIKE ? ";

          $stmt = $this->conn->prepare($sql);

          $stmt->bind_param('s',$input);

          $stmt->execute();

         $result = $stmt->get_result();

         return $result;



    }


 }