<?php



 class Invoices {

 	private $conn;

 	function __construct() {
        
        $db = new Database();

        $this->conn = $db->Connect();

        return $this->conn;


    }

    function lists(){

     
        $sql = "SELECT * FROM invoice as I  LEFT JOIN customers as C ON I.customer_id = C.customer_id";

        $result = mysqli_query($this->conn,$sql);

        return $result;

    }

    function create($data){
 



  	}

    

    function update(){

    }

    function delete(){

        $this->deleteSaleOrder($id);
        $this->deleteSaleItems($id);
        $this->deleteCustomerPayment($id);
        
    }

    function select(){

    }

    function search(){

    }

    function deleteSaleOrder($id){


        $sql = "DELETE FROM sale_orders WHERE order_id = ? ";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param('s',$id);

        $result = $stmt->execute();

        return $result;


    }


    function deleteSaleItems($id){


        $sql = "DELETE FROM sale_items WHERE order_id = ? ";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param('s',$id);

        $result = $stmt->execute();

        return $result;


    }


    function deleteCustomerPayment($id){


        $sql = "DELETE FROM customer_payment WHERE order_id = ? ";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param('s',$id);

        $result = $stmt->execute();

        return $result;


    }




 }