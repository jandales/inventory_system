<?php

require_once('../../class/Suppliers.php');


if(!isset($_POST['submit'])){
	header('Location: ../../../suppliers.php');
}

	$id = $_POST['submit'];
	
	$suppliers = new Suppliers();


 
	$avatar_name = $_FILES['avatar']['name'];

	$avatar_temp = $_FILES['avatar']['tmp_name'];

	move_uploaded_file($avatar_temp, "../../../app/images/avatar/$avatar_name");

	if(empty($avatar_name)){

	  $supplier = $suppliers->edit($id);

	  $avatar_name = $supplier['avatar'];

	} 



	$input = [

		'id' => $id,

		'fname' => $_POST['fname'],

		'lname' => $_POST['lname'],

		'email' => $_POST['email'],

		'phone' => $_POST['phone'],

		'address1' => $_POST['address1'],

		'address2' => $_POST['address2'],

		'zip' => $_POST['zip'],

		'state' => $_POST['state'],

		'city' => $_POST['city'],

		'campany' => $_POST['campany'],

		'account' => $_POST['account'],

		'comment' => $_POST['comment'],		

		'avatar' => $avatar_name

		 ];


	   $affected_row = $suppliers->update($input);

	   if($affected_row > 0){

	   		header('Location: ../../../suppliers.php');

	   }






?>