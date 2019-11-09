<?php


	include_once('../../class/Categories.php');



	if(isset($_POST['submit']))
	{


		$category = new Categories();
		

		$input  = [

			 'category_id' => $category->CreateCategoryID(),
			 'name' => $_POST['cat_name'],  
			 'description' => $_POST['cat_description']
		];


		$category->create($input);


	    header('Location: ../../../categories.php');



	}



?>