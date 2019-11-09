<?php



 class Orders {

 	private $conn;

 	function __construct() {
        
        $db = new Database();

        $this->conn = $db->Connect();

        return $this->conn;

    }

    function AutoID(){


        $sql = "SELECT * FROM sale_orders ";

        $result =  mysqli_query($this->conn,$sql);

        $count =mysqli_num_rows($result);

         

      if($count == 0){

         $id = 1;

      } else {   

        $id =  $count + 1 ;
      
      }

      return "000" . $id;                      
             
  }

    function lists(){

        $sql = "SELECT * FROM sale_orders as S LEFT JOIN customers as C on customer = customer_id ";

        $result =  mysqli_query($this->conn,$sql);

        return $result;
    }

    function create($data){

  	}    

    function update(){

    }

    function delete($id){
        
            $this->deleteSaleOrders($id);
            $this->deleteSaleItem($id);
            $this->deleteCustomerPayment($id);
    }

    function select(){

    }

    function search(){

    }


    function deleteSaleOrders($id){

        $sql = "DELETE FROM  sale_orders WHERE order_id = ?";

        $stmt =  $this->conn->prepare($sql);

        $stmt->bind_param('s',$id);

        $stmt->execute();

    }

    function deleteSaleItem($id){

        $sql = "DELETE FROM  sale_items WHERE order_id = ?";

        $stmt =  $this->conn->prepare($sql);

        $stmt->bind_param('s',$id);

        $stmt->execute();

    }


    function deleteCustomerPayment($id){

        $sql = "DELETE FROM  customer_payment WHERE order_id = ?";

        $stmt =  $this->conn->prepare($sql);

        $stmt->bind_param('s',$id);

        $stmt->execute();

    }


 }