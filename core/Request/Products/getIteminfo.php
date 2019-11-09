<?php


require_once('../../class/Products.php');

/// get item info as view modal

if(!isset($_POST['price_id'])) return;




$output ="";

$id = $_POST['price_id'];

$products = new Products();

$item =  $products->edit($id);




$output .='<div class="form-group">';
$output .='<label class="control-label col-md-4 col-sm-4 col-xs-12" for="email">Item name:
      </label>';
$output.='<div class="col-md-8 col-sm-8 col-xs-12">
      <input type="text"   name="item_id"  class="form-control col-md-7 col-xs-12 textbox id" value="'.$item['item_id'].'"></div>';                 
$output .='</div>';

$output .='<div class="form-group">';
$output .='<label class="control-label col-md-4 col-sm-4 col-xs-12" for="email">Item name:
      </label>';
$output.='<div class="col-md-8 col-sm-8 col-xs-12">
      <input type="text"   name="item_name"  class="form-control col-md-7 col-xs-12 textbox id" value="'.$item['item_name'].'"></div>';                 
$output .='</div>';


$output .='<div class="form-group">';
$output .='<label class="control-label col-md-4 col-sm-4 col-xs-12" for="email">Current Price:
      </label>';
$output.='<div class="col-md-8 col-sm-8 col-xs-12">
      <input type="text"   name="cprice"  class="form-control col-md-7 col-xs-12 textbox id" value="'.$item['price'].'"></div>';                 
$output .='</div>';

$output .='<div class="form-group">';
$output .='<label class="control-label col-md-4 col-sm-4 col-xs-12" for="email">New price:
      </label>';
$output.='<div class="col-md-8 col-sm-8 col-xs-12">
      <input type="text"   name="price"  class="form-control col-md-7 col-xs-12 textbox id" value=""></div>';                 
$output .='</div>';







echo $output;



?>