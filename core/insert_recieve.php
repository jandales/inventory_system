<?php include '../inc/db.php' ?>
<?php include '../inc/function.php' ?>
<?php

 $id_name ="PO";
 $suppliers_id = "";
 $max_id ="";
 $query = "SELECT * FROM recievings";
 $result = mysqli_query($connect, $query);
 $count =mysqli_num_rows($result);


if($count == null)
{
   $po_id = $id_name . "-001";
}
else
{
  $max_id =  $count + 1;
  $po_id = $id_name ."-00". $max_id;
}


$itemname = $_POST['item'];


if($itemname > 0 )
{


/////insert orders
   $query ="INSERT INTO recievings(po_id,invoice,invoice_date,receiving_date,supplier_id,amount,employee_id,status) VALUES ('{$po_id}','".$_POST['invoice_number']."','".$_POST['invoice_date']."','".$_POST['recieve_date']."','".$_POST['supplier']."','".$_POST['total-cost']."','".$_SESSION['username']."','Unpiad')";
    $po =  mysqli_query($connect, $query);

  
    for($i=0; $i < $itemname; $i++)
    {
    if(trim($_POST['item'][$i]) != '')

    {

///////////// insert items
$query_items ="INSERT INTO receiving_items(po_id,invoice_number,item_name,quantity,unit_price,subtotal, disc,total_quantity,total_discount,sub_cost) VALUES ('{$po_id}','".$_POST['invoice_date']."','". $_POST["item"][$i]."','". $_POST["qty"][$i]."','". $_POST["price"][$i]."','". $_POST["subtotal"][$i]."','". $_POST['disc'][$i]."','".$_POST['quantity']."','".$_POST['discount']."','".$_POST['subtotal_cost']."')";
$item = mysqli_query($connect, $query_items);
        

    
$query = "SELECT * FROM products WHERE item_id = '". $_POST["item"][$i]."' ";
$query_result = mysqli_query($connect, $query);

while($db = mysqli_fetch_assoc($query_result)){

$quantity = $db['quantity'];
$price = $db['cost'];

}
//////update inventory
$quantity = $quantity +  $_POST["qty"][$i];
$query = "UPDATE products SET ";
$query .= "cost = '". $_POST["price"][$i]."', ";
$query .= "quantity = '{$quantity}' ";
$query .= "WHERE item_id = '". $_POST["item"][$i]."' ";
$query_update=mysqli_query($connect, $query);

echo "data update";

    }

    }

}



  



