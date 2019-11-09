<?php

	require_once('../../class/Products.php');

	if(!isset($_POST['submit'])) return;

	 $products =  new Products();

	 $category = $_POST['category'];

	 $supplier = $_POST['supplier'];
	
	 $avatar_temp = $_FILES['avatar']['tmp_name'];

	 $avatar_name = $_FILES['avatar']['name'];

	 $avatar_type = $_FILES['avatar']['type'];

	 move_uploaded_file($avatar_temp, "../../../app/images/avatar/$avatar_name");

	 $item_id = $products->AutoID(); 


	if($category == "0"){

		echo "Select category";

	}elseif($supplier == "0"){

	 	echo "Select supplier";

	}else{

	$input = [ 
		  	   'item_id' => $item_id,
	           'barcode' => $_POST['barcode'],
	           'itemname' => $_POST['itemname'],
	           'category' => $category,
	           'supplier' => $supplier,
	           'description' => $_POST['description'],
	           'reorder_level' => $_POST['reorder_level'],
	           'avatar' => $avatar_name,
	           'cost' => $_POST['cost'],
	           'price' => $_POST['price'],
	           'quantity' => $_POST['quantity']
	         ];

	  $result =  $products->create($input);

	  if($result > 0){
	  	header('Location: ../../../products.php');
	  }




	}




?>