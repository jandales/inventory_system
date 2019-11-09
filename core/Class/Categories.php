<?php


class Categories 
{
	
	private $conn;

    private $table = 'categories';

    private $suffix = "Cat-00";

    private $categoryID;
			



 	function __construct() {
        
        $db = new Database();

        $this->conn = $db->Connect();  

        return $this->conn;
    }

    function index(){

        $limit = Helpers::limit($this->table);
        
        $query = "SELECT * FROM " . $this->table . " $limit";

        return $result = mysqli_query($this->conn,$query);      
        
    }



    function CreateCategoryID()
    {
		$query = "SELECT * FROM " . $this->table ." ";

		$result = mysqli_query($this->conn, $query);

		$count =mysqli_num_rows($result);

		if($count == 0) {

			$this->categoryID = 1;

		} else {			

			$this->categoryID =  $count + 1;

	    }

		return $this->suffix . $this->categoryID;

    }



    function create($data){ 

       $sql =  "INSERT INTO " . $this->table . " (cat_id,cat_name,cat_description) VALUES (?,?,?)";

        $stmt = $this->conn->prepare($sql);

            $stmt->bind_param("sss",

            	$data['category_id'],

                $data['name'],

                $data['description']
                          
            );

          return  $stmt->execute();
          
  	}    

    function update($data){

            echo print_r($data);
            $sql = "UPDATE " . $this->table . " SET  cat_name = ?, cat_description = ? WHERE cat_id = ? ";

            $stmt = $this->conn->prepare($sql);

            $stmt->bind_param('sss',
            	
            	$data['cat_name'],
                $data['cat_description'],
                $data['cat_id']                
               );

            $stmt->execute();
   
    }


    function exist($input){

        $sql = "SELECT COUNT(id) FROM ". $this->table ." WHERE cat_name = ? ";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param('s',$input);

        $stmt->execute();      

        return $stmt->num_rows();
      
    }

    function delete($id){

        $sql = "DELETE FROM " .$this->table ." WHERE id = ? ";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param('s', $id);

        $result = $stmt->execute();

        return $result;

    }


    function select($id){

        $sql = "SELECT * FROM " . $this->table ."  WHERE id = ? ";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param("s", $id);

        $stmt->execute();

        $result = $stmt->get_result()->fetch_assoc();

        return $result;

    }

     function GetAll(){

         $query = "SELECT * FROM " . $this->table . " ";

         return $result = mysqli_query($this->conn,$query);      

    }

    function search($input) {


       
        $sql = "SELECT * FROM " . $this->table . " WHERE cat_id LIKE  ? ";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param("s", $input);

        $stmt->execute();

        $result = $stmt->get_result();

   
        return $result;

    }

    function Pagination() {

		if($totalpage > 1){

			$i = "";

			if ($page > 1) {

			$i =  $page - 1;
			
			echo "<li><a href='categories.php?page={$i}' ><i class='fa fa-caret-left'></i></a></li><li>";

		} else {

			echo "<li><a href=''><i class='fa fa-caret-left'></i></a></li><li>";

		}


		for($i = 1; $i <= $totalpage; $i++){

			if($i == $page){

				echo "<a href='categories.php?page={$i}' class='active_link'>$i</a></li><li>";

			} else {

				echo "<a href='categories.php?page={$i}'>$i</a></li><li>";

			}

		}

		if ($page < $totalpage){

			$i =  $page + 1;

			echo "<a href='categories.php?page={$i}' ><i  class='fa fa-caret-right'></i></a></li>";

		} else {

			echo "<a class='disabled'><i  class='fa fa-caret-right'></i></a></li>";
		}


    }

    }


}





 ?>