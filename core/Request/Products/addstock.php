<?php


	require_once('../../class/Products.php');


	if(!isset($_POST['submit'])) return;

	

	$id = $_POST['submit'];

	$products =  new Products();

	$item = $products->edit($id);


	$qty = $_POST['qty'];

	$newQty =  $qty + $item['quantity'];


	$input = [
		'item_id' => $id, 
		'quantity' => $newQty
	];
    

    $affected_row = $products->addstock($input);

    if($affected_row > 0){
    	header('Location: ../../../products.php');
    }









?>