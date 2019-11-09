<?php

////// get item file call by ajax
require_once('../../class/Products.php');


if(!isset($_POST['get_item'])) return;



$output ="";

$id = $_POST['get_item'];



$products =  new Products();

$db = $products->edit($id);




if(!$db['avatar'] == 0){

$output .="<img src='app/images/avatar/".$db['avatar']."' width='80px' style='margin-bottom:20px;'>";

}else{

$output .="<img src='app/images/avatar/choose.png' width='80px' style='margin-bottom:20px;'>";

}


$output .='<table class="table table-bordered">';

$output .='<tr>';
$output .='<th style="width:30%;">Item Code</th>';
$output .='<th>'. $db['item_id'] .'</th>';
$output .='</tr>';

$output .='<tr>';
$output .='<th style="width:30%;">Barcode</th>';
$output .='<th>'. $db['barcode'] .'</th>';
$output .='</tr>';


$output .='<tr>';
$output .='<th>Item name</th>';
$output .='<th>'. $db['item_name'] .'</th>';
$output .='</tr>';

$output .='<tr>';
$output .='<th>Category</th>';
$output .='<th>'. $db['cat_name'] . '</th>';
$output .='</tr>';

$output .='<tr>';
$output .='<th>Supplier</th>';
$output .='<th>'.  $db['campany'] .'</th>';
$output .='</tr>';


$output .='<tr>';
$output .='<th>Description</th>';
$output .='<th>'. $db['description'] .'</th>';
$output .='</tr>';

$output .='<tr>';
$output .='<th>Reorder Level</th>';
$output .='<th>'. $db['reorder_level'] .'</th>';
$output .='</tr>';

$output .='<tr>';
$output .='<th>Cost price</th>';
$output .='<th>'. $db['cost'] .'</th>';
$output .='</tr>';

$output .='<tr>';
$output .='<th>Selling Price</th>';
$output .='<th>'. $db['price'] .'</th>';
$output .='</tr>';

$output .='<tr>';
$output .='<th>Quantity</th>';
$output .='<th>'. $db['quantity'] .'</th>';
$output .='</tr>'; 


 $output .='</table>';

 echo $output;



?>