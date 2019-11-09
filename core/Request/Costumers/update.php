<?php

	include_once('../../class/Costumer.php');
	 include_once('../../class/Messages.php');
	include_once('../../class/Helpers.php');

  if(isset($_POST['update'])){

  		$customer = new Customers();

  		$x = new Helpers();

  		$id =  $_POST['update']; 
		
		$avatar_name = $_FILES['avatar']['name'];
		$avatar_temp = $_FILES['avatar']['tmp_name'];

		
		move_uploaded_file($avatar_temp, "app/images/avatar/$avatar_name");


		if(empty($avatar_name)){

		

				$list = $customer->select($id);


				foreach ($list as $key => $value) {

					$avatar_name = $value['avatar'];

				}				

		 }



		 $input = array(

		 	'id' => $x->escape_string($id),

  			'fname' => $x->escape_string($_POST['fname']),

  			'lname' => $x->escape_string($_POST['lname']),

  			'email' => $x->escape_string($_POST['email']),

  			'phone' => $x->escape_string($_POST['phone']),

  			'address1' =>  $x->escape_string($_POST['address1']),

  			'address2' => $x->escape_string($_POST['address2']),

  			'city' => $x->escape_string($_POST['city']),

  			'zip' => $x->escape_string($_POST['zip']),

		    'state' => $x->escape_string($_POST['state']),

		  	'campany' =>  $x->escape_string($_POST['campany']),

		  	'account' => $x->escape_string($_POST['account']),

		  	'comment' => $x->escape_string($_POST['comment']),

		    'status' => $x->escape_string($_POST['status']),

		    'avatar' => $x->escape_string($avatar_name)

  			 );	

		    $result =  $customer->update($input);

		    if($result > 0){

		    		header('Location: ../../../customers.php');
		    }






	}

?>

