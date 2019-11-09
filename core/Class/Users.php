<?php

class Users   {

 	private $conn;

    private $table = 'users';


 	function __construct() {       
   

        $db = new Database();

        $this->conn = $db->connect();  

        return $this->conn;
        
    }

    function index(){
       
        
        $query = "SELECT * FROM users";

        return $result = mysqli_query($this->conn,$query);      
        
    }



    function create($data){   

        $sql = "INSERT INTO users (username, email, fname, lname,  role, snumber, address, gender, password, date_reg) VALUES (?,?,?,?,?,?,?,?,?,?)";

        $stmt = $this->conn->prepare($sql);

            $stmt->bind_param("ssssssssss",
                $data['username'],
                $data['email'],
                $data['fname'],
                $data['lname'],
                $data['role'],
                $data['snumber'],
                $data['address'],
                $data['gender'],
                $data['password'],
                $data['date_reg']               
            );

          return  $stmt->execute();
          
  	}    

    function update($data = array()){



            $sql = "UPDATE users SET  email = ?, fname = ?, lname = ?, role = ?, snumber = ?, address = ?, gender = ?, avatar = ? WHERE id = ? ";

            $stmt = $this->conn->prepare($sql);

            $stmt->bind_param('sssssssss',
                $data['email'],
                $data['fname'],
                $data['lname'],
                $data['role'],
                $data['snumber'],
                $data['address'],
                $data['gender'],
                $data['avatar'],
                $data['id']
               );

            $stmt->execute();
   
    }


    function exist($username){

        $sql = "SELECT COUNT(username) FROM users WHERE username = ? ";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param('s',$username);

        $stmt->execute();      

        return $stmt->num_rows();
      
    }



    function delete($id){

        $sql = "DELETE FROM users WHERE id = ? ";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param('s',$id);

        $result = $stmt->execute();

        return $result;

    }


    function select($id){

        $sql = "SELECT * FROM users WHERE id = ? ";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param("s", $id);

        $stmt->execute();

        $result = $stmt->get_result()->fetch_assoc();

        return $result;

    }

    function search($data){


       
        $sql = "SELECT * FROM users WHERE username LIKE ? ";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param("s", $data);

        $stmt->execute();

        $result = $stmt->get_result();

   
        return $result;

    }

    function UserInfo($username){

      $sql = "SELECT * FROM users WHERE username = ? ";

      $stmt = $this->conn->prepare($sql);

      $stmt->bind_param("s", $username);

      $stmt->execute();

      $result = $stmt->get_result();

      return $result; 

    }

    function ChangeUserRole($role,$id){


      $sql = "UPDATE users SET role = ? WHERE id = ?";

      $stmt = $this->conn->prepare($sql);

      $stmt->bind_param("ss", $role,$id);

      $stmt->execute();

      $count = $stmt->affected_rows;

      return $count;     
    
    } 


    function pagination(){

        if(Helpers::$totalpage > 1){

            $i = "";
            if ($this->page > 1) {

                  $i =  $this->page - 1;

              echo "<li><a href='users.php?page={$i}' ><i class='fa fa-caret-left'></i></a></li><li>";

            } else {

                echo "<li><a href=''><i class='fa fa-caret-left'></i></a></li><li>";

            }


            for ( $i = 1; $i <= $this->totalpage; $i++ ) {
                
              if($i == $this->page){

                echo "<a href='users.php?page={$i}' class='active_link'>$i</a></li><li>";
              }else{
                echo "<a href='users.php?page={$i}'>$i</a></li><li>";
              }

            }
            if ($this->page < $this->totalpage){
              $i =  $this->page + 1;
            echo "<a href='users.php?page={$i}' ><i  class='fa fa-caret-right'></i></a></li>";
            }else{
            echo "<a class='disabled'><i  class='fa fa-caret-right'></i></a></li>";
            }

         }

    }



 }