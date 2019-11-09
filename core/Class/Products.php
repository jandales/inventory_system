<?php



 class Products {

 	private $conn;

    private $table = "products";

 	function __construct() {
        
        $db = new Database();

        $this->conn = $db->Connect();

        return $this->conn;

    }

    function lists(){

         $sql = "SELECT * FROM ". $this->table ." as P LEFT JOIN categories as C on  P.category = C.cat_id";

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

      return "Item00" . $id;  

    }


    function create($input){

 
        $sql = "INSERT INTO products(item_id,barcode,item_name,category,supplier,description,reorder_level,avatar, cost,price,quantity) VALUES (?,?,?,?,?,?,?,?,?,?,?)";

        $stmt =  $this->conn->prepare($sql);

        $stmt->bind_param('sssssssssss',
            $input['item_id'],
            $input['barcode'],
            $input['itemname'],
            $input['category'],
            $input['supplier'],
            $input['description'],
            $input['reorder_level'],
            $input['avatar'],
            $input['cost'],
            $input['price'],
            $input['quantity']
        );

        return $stmt->execute();

            



  	}

    

    function update($input){


         $sql = "UPDATE products SET item_name = ?, barcode = ?, category = ?, supplier = ?,description= ?,reorder_level = ?, avatar = ?, cost = ?, price = ? , quantity = ? WHERE item_id = ? ";

           $stmt =  $this->conn->prepare($sql);

        $stmt->bind_param('sssssssssss',
            $input['itemname'],            
            $input['barcode'],            
            $input['category'],
            $input['supplier'],
            $input['description'],
            $input['reorder_level'],
            $input['avatar'],
            $input['cost'],
            $input['price'],
            $input['quantity'],
            $input['item_id']
        );

        $stmt->execute();

        $affected_rows = $stmt->affected_rows;

        return $affected_rows;




    }

    function delete(){

    }

    function edit($id){
    
        $sql = "SELECT * FROM ". $this->table ." as P LEFT JOIN categories as C on  P.category = C.cat_id LEFT JOIN suppliers as S on P.supplier = S.supplier_id WHERE item_id = ?";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param("s",$id);

        $stmt->execute();

        $result = $stmt->get_result()->fetch_assoc();

        return $result;

    }

    function search(){

    }

    function addStock($input){

        $sql = "UPDATE products SET quantity = ? WHERE item_id = ?";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param('ss',$input['quantity'],$input['item_id']);

        $stmt->execute();

        $affected_rows = $stmt->affected_rows;

        return $affected_rows;

    }

     function updateprice($input){


        $sql = "UPDATE products SET price = ? WHERE item_id = ?";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param('ss',$input['price'],$input['item_id']);

        $stmt->execute();

        echo   $affected_rows = $stmt->affected_rows;

        return $affected_rows;

     }


     function searchitem($input){

        $sql = "SELECT * FROM products WHERE item_id = ? OR barcode = ? OR item_name = ?";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param('sss',$input,$input,$input);

        $stmt->execute();

        $result = $stmt->get_result();

        return $result;


     }



 }