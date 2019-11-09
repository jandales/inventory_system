<?php


include_once('../../class/Costumer.php');
include_once('../../class/Messages.php');
include_once('../../class/Helpers.php');




 if(isset($_POST['submit'])){


	
  $x = new Helpers();

  $avatar_temp = $_FILES['avatar']['tmp_name'];

  $avatar_name = $_FILES['avatar']['name'];

  $avatar_type = $_FILES['avatar']['type'];

  move_uploaded_file($avatar_temp, "../../../app/images/avatar/$avatar_name");

  $date =  date('d-m-y');
	
  $data = array(

	'fname' => $x->escape_string($_POST['fname']),
	'lname' => $x->escape_string($_POST['lname']),
	'email' => $x->escape_string($_POST['email']),
	'phone' => $x->escape_string($_POST['phone']),
	'address1' => $x->escape_string($_POST['address1']),
	'address2' => $x->escape_string($_POST['address2']),
	'zip' => $x->escape_string($_POST['zip']),
	'state' => $x->escape_string($_POST['state']),
	'city' => $x->escape_string($_POST['city']),
	'campany' => $x->escape_string($_POST['campany']),
	'account' => $x->escape_string($_POST['account']),
	'comment' => $x->escape_string($_POST['comment']),
	'status'  => 'active',
	'date_added' => $x->escape_string($date),
	'avatar' => $x->escape_string($avatar_name)
	
  );



	$customer = new Customers();

	$customer->create($data);

	header('Location: ../../../customers.php');



	

  
	
	
	
	
	
	
	
	
	
	}
?>