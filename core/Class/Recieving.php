<?php



 class Recieving {

 	private $conn;

    private $table = 'recievings';

 	function __construct() {
        
        $db = new Database();

        $this->conn = $db->Connect();

        return $this->conn;


    }

    function index(){

        $sql = "SELECT * FROM ". $this->table ." as R LEFT JOIN suppliers as S ON R.supplier_id = S.id";

        $result = mysqli_query($this->conn,$sql);

        return $result;

    }

    function create($data){
 

        $sql = "INSERT INTO recievings(po_id,invoice,invoice_date,receiving_date,supplier_id,amount,employee_id,status) VALUES ('?','?','?','?','?','?','?','?')";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param('ssssssss',
            $data['po_id'],
            $data['invoice'],
            $data['invoice_date'],
            $data['recieving_date'],
            $data['supplier_id'],
            $data['amount'],
            $data['employee_id'],
            $data['status']

        ); 

        return $stmt->execute();

  	}

    function AddItem($data){

        $sql ="INSERT INTO receiving_items(po_id,invoice_number,item_name,quantity,unit_price,subtotal, disc,total_quantity,total_discount,sub_cost) VALUES ('?','?','?','?','?','?','?','?','?','?')";
        
        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param('ssssssss',
            $data['po_id'],
            $data['invoice_number'],
            $data['item'],
            $data['quantity'],
            $data['unit_price'],
            $data['subtotal'],
            $data['disc'],
            $data['total_quantity'],
            $data['total_discount'],
            $data['sub_cost']

        ); 

        return $stmt->execute();


    }

    function update(){

    }


    function delete($id){

        //delete recieving info
        $this->delete_recievings($id);

        // DELETE PURCHASE PAYMENT
        $this->delete_purchase_payment($id);

        // DELETE SUPPLIER PAYMENT
        $this->delete_supplier_payment($id);
    }
    

    function delete_recievings($id){

        $sql = "DELETE FROM recievings WHERE po_id = ?";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param('s',$id);

        $stmt->execute();
        
    }

    function delete_purchase_payment($id){

        $sql = "DELETE FROM purchase_payment WHERE po_id = ?";

        $stmt =  $this->conn->prepare($sql);

        $stmt->bind_param('s',$id);

        $stmt->execute();

        
    }

    function delete_supplier_payment($id){

        $sql = "DELETE FROM supplier_payment WHERE po_id = ?";

        $stmt =  $this->conn->prepare($sql);

        $stmt->bind_param('s',$id);

        $stmt->execute();

        
    }

    function select(){

    }

    function search($input){

        $sql = "SELECT * FROM ". $this->table ." as R LEFT JOIN suppliers as S ON R.supplier_id = S.id WHERE po_id LIKE ? OR invoice LIKE ? S.campany LIKE ?";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param('s',$input);

        $stmt->execute();

        $result = $stmt->get_result();      

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

      return "RO" . $id;  
}



 }