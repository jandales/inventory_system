<?php include '../inc/db.php' ?>
<?php
    $export ="";   
    $query = "SELECT * FROM products";
    $query_result = mysqli_query($connect, $query);
    $count = mysqli_num_rows($query_result);

    $export .= '<div class="table-responsive">';
    $export .= '<table class="table">';
    $export .= "<thead>";
    $export .= '<th>Item Code</th>';
    $export .= '<th>Item Name</th>';
    $export .= '<th>Category</th>';
    $export .= '<th>Cost Price</th>';
    $export .= '<th>Selling Price</th>';
    $export .= '<th>Quantity</th>';
    $export .= "</thead>";
    $export .= "<tbody>";

    while($db = mysqli_fetch_assoc($query_result)){
    $id = $db['id'];
    $Item_Code = $db['item_id'];
    $Item_Name = $db['item_name'];
    $category = $db['category'];
    $cost = $db['cost'];
    $price = $db['price'];
    $quantity = $db['quantity'];
 
    $query = "SELECT * FROM categories WHERE cat_id = '{$category}' ";
    $result = mysqli_query($connect, $query);

    while($cat = mysqli_fetch_assoc($result)){
       $cat_name = $cat['cat_name'];
    }
   
                                      
  
$export .= "<tr>";
$export .=  "<th>$Item_Code</th>";
$export .=  "<th>$Item_Name</th>";
$export .=  "<th>$cat_name</th>";
$export .=  "<th>$cost</th>";
$export .=  "<th>$price</th>";
$export .=  "<th>$quantity</th>";
$export .=  "</tr>";


      }

$export .= "</tbody>";
$export .= '</table>';
$export .='</div>';
     

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename=product.xls');
        echo   $export;

      
    

                    
                  
            

?>