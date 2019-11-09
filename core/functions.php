<?php include '../inc/db.php' ?>
<?php include '../inc/function.php' ?>
<?php


//////// delete item in cart receving
if(isset($_POST['id']))
{

$po_id = $_POST['id'];

$sql = query("DELETE  FROM receiving_items WHERE id = '{$po_id}'");


}

/////////get supplier info


if(isset($_POST['get_id']))
{
$output ="";
$supplier_id = $_POST['get_id'];
$query = query("SELECT * FROM suppliers WHERE supplier_id = '{$supplier_id}' ");

while($db = fetch_array($query))

{

$output .= '<img src="app/images/avatar/'.$db['avatar'].'" width="40x"  height="40px"  class="suppliers_img">';
$output .= "<div class='suppliers_div'>";
$output .= "<ul class='suppliers_span'>";
$output .= "<li name='name'>".$db['fname']." ". $db['lname']. "</li>";
$output .= "<li>".$db['email'] . "</li>";
$output .= "</ul>";  
$output .= "</div>";




}
  
echo $output;

}

if(isset($_POST['customer_id']))
{
$output ="";
$customer_id = $_POST['customer_id'];
$query = query("SELECT * FROM customers WHERE customer_id = '{$customer_id}' ");

while($db = fetch_array($query))

{

$output .= '<img src="app/images/avatar/'.$db['avatar'].'" width="40x"  height="40px"  class="suppliers_img">';
$output .= "<div class='suppliers_div'>";
$output .= "<ul class='suppliers_span'>";
$output .= "<li name='name'>".$db['fname']." ". $db['lname']. "</li>";
$output .= "<li>".$db['email'] . "</li>";
$output .= "</ul>";  
$output .= "</div>";




}
  
echo $output;

}


///////get supplier product

if(isset($_POST['supplier_id']))    
{
  $item ="";
  $supplier_id = $_POST['supplier_id'];

  if($supplier_id !== '')
  {
    $query = query("SELECT * FROM products WHERE supplier = '{$supplier_id}' ");
      
        while($db = fetch_array($query))

        {
          
          $item .= "<option value =". $db['item_id'] .">". $db['item_name'] ."</option>";
      }
         echo $item;
  }

}

if(isset($_POST['item_id']))
{
    $item ="";
  $item_id= $_POST['item_id'];

  if($item_id!== '')
  {
    $query = query("SELECT * FROM products WHERE item_id = '{$item_id}' ");
  

        while($db = fetch_array($query))

        {
          $item .= $db['price'];
      }
         echo $item;
  }

}











if(isset($_POST['po_number'])){

$output ="";

$get = $_POST['po_number'];

$query = "SELECT * FROM sale_items WHERE order_id = '{$get}' ";
$result = mysqli_query($connect, $query);
while($db = mysqli_fetch_assoc($result)){
$item = $db['item'];

$query_item = "SELECT * FROM products WHERE item_id = '{$item}' ";
$result_item = mysqli_query($connect, $query_item);
while($db1 = mysqli_fetch_assoc($result_item)){
$itemname = $db1['item_name'];
}


echo "<tr>";
echo '<th><select name="item[]" class="form-control itemname"><option>'.$itemname .'</option></select></th>';
echo '<th><input type="number" name="qty[]" class="form-control qty" value="'.$db['quantity'].'"></th>';
echo '<th><input type="text" name="disc[]" class="form-control disc"  value="'.$db['disc'].'" ></th>';
echo '<th><input type="number" name="price[]" class="form-control prices"  value="'.$db['price'].'"></th>';
echo '<th><input type="text" name="total[]" class="form-control total" readonly=""  value="'.$db['total'].'"></th>';
echo '<th><a class="remove li" ><i class="fa fa-eraser" aria-hidden="true"></i></a></th>';
echo '</tr>';
    
}

    echo $output;
}

////////e get supplier 

if(isset($_POST['customer'])){

$customer_id = $_POST['customer'];
$query = query("SELECT * FROM sale_orders WHERE customer = '{$customer_id}' ");

while($db=fetch_array($query)){

$customer_id = $db['customer'];


$customer = query("SELECT * FROM customers WHERE customer_id = '{$customer_id}' ");
while($db1=fetch_array($customer)){

$name = $db1['fname'] .' '. $db1['lname'];

}

echo '<tr>';
echo '<th>'.$db['order_id'].'</th>';
echo '<th>'.$name.'</th>';
echo '<th><a href="invoice.php?page=add&saleorder='.$db['order_id'].'" >Invoice</a></th>';
echo '</tr>';
}

}

/////////// get item to recive
if(isset($_POST['barcode']))
{
  $barcode = $_POST['barcode'];
  $query = query("SELECT * FROM products WHERE item_id = '{$barcode}' OR barcode = '{$barcode}' OR item_name = '{$barcode}' ");

  while($db=fetch_array($query)){



    echo '<th  class="center"><select  class="form-control itemname txtselect" name="item[]"><option value="'.$db['item_id'] .'">'.$db['item_name'] .'</option></select></th>';
    echo '<th width="15%;" class="center"><input class="form-control field_txt qty" name="qty[]"value="1"></th>';
    echo '<th width="15%;" class="center"><input class="form-control field_txt disc" name="disc[]" value="0"></th>';
    echo '<th width="18%;" class="center"><input class="form-control field_txt prices" name="price[]" value="'.$db['price'].'" readonly></th>';
    echo '<th width="18%;" class="center"><input class="form-control field_txt subtotal" name="subtotal[]" value="'.$db['price'].'" readonly></th>';
    echo '<th><a  class="remove"><i class="fa fa-gavel" aria-hidden="true"></i></a></th>';
      

  }

}





?>