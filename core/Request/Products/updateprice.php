<?php
   
	require_once('../../class/Products.php');

	if(!isset($_POST['update'])) return;


	
	$products =  new Products();

	$input = [
		'item_id' => $_POST['item_id'],
		'price' => $_POST['price']
    ];

    echo print_r($input);

    $result =  $products->updateprice($input);

     if($result > 0){
	  	header('Location: ../../../products.php');
	  }

	

?>


