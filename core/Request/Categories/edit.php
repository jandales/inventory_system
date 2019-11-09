<?php

	include_once('../../class/Categories.php');


if(isset($_POST['category_edit'])){

$output ="";

$id = $_POST['category_edit'];


$category =  new Categories();

$row = $category->select($id);




$output .='<div class="form-group">';
$output .='<label class="control-label col-md-4 col-sm-4 col-xs-12" for="email">Category code:
      </label>';
$output.='<div class="col-md-12 col-sm-12 col-xs-12">
      <input type="text"   name="cat_id"  class="form-control col-md-7 col-xs-12 textbox id" hidden value='.$row['cat_id'].'></div>';                 
$output .='</div>';


$output .='<div class="modal-item form-group">';
$output .='<label class="control-label col-md-4 col-sm-4 col-xs-12" for="email">Name:
      </label>';
$output.='<div class="col-md-12 col-sm-12 col-xs-12">
      <input type="text"   name="cat_name"  class="form-control col-md-7 col-xs-12 textbox id" value='.$row['cat_name'].'></div>';                 
$output .='</div>';



$output .='<div class="modal-item form-group">';
$output .='<label class="control-label col-md-4 col-sm-4 col-xs-12" for="email">Descrition:
      </label>';
$output.='<div class="col-md-12 col-sm-12 col-xs-12">
      <input type="text"   name="cat_description"  class="form-control col-md-7 col-xs-12 textbox id" value='.$row['cat_description'].'></div>';                 
$output .='</div>';




    echo $output;
}


?>