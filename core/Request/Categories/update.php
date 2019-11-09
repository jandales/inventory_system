<?php


	include_once('../../class/Categories.php');



	if(isset($_POST['submit']))	{



	
	  $category = new Categories();
	

		$input  = [
			'cat_id' =>  $_POST['cat_id'],
		    'cat_name' => $_POST['cat_name'] ,
		    'cat_description' => $_POST['cat_description']
		 ];


		$category->update($input);

		header('Location: ../../../categories.php');



	}



?>