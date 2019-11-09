<?php include '../inc/db.php' ?>
<?php include '../inc/function.php' ?>
<?php



 $query = "SELECT * FROM sale_orders";
 $result = mysqli_query($connect, $query);
 $count =mysqli_num_rows($result);


if($count == null)
{
   $id =  "0001";
}
else
{
  $max_id =  $count + 1;
  $id ="000". $max_id;
}



 $query_order =query("INSERT INTO sale_orders(order_id,customer,quantity,amount,po_number,date_order,taxable,status,subtotal,balance,vat,tax_scheme,vat_sale,terms) VALUES ('".$id."','".$_POST['customer_name']."','".$_POST['quantity']."','".$_POST['amount']."','".$_POST['po_number']."','".$_POST['dateorder']."','".$_POST['tax']."','open','".$_POST['sub-cost']."','".$_POST['amount']."','".$_POST['vat']."', '".$_POST['tax_scheme']."','".$_POST['vat_sale']."','".$_POST['terms']."')");


$item = count($_POST['item']);

if($item > 0 )
{


for($i=0; $i < $item; $i++)
{

if(trim($_POST['item'][$i]) != '')

{

$query =  query("INSERT INTO sale_items(order_id, item, quantity, disc, price, subtotal,type) VALUES ('{$id}','".$_POST['item'][$i]."','".$_POST['qty'][$i]."','".$_POST['disc'][$i]."','".$_POST['price'][$i]."','". $_POST['subtotal'][$i] ."', 'OR')");




}

}

}



























