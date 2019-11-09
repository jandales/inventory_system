<?php

require_once('../../class/Suppliers.php');

if(!isset($_POST['submit'])){ header('Location: ../supplier.php'); }

	$supplier =  new Suppliers();

	$id = $supplier->AutoID();

	$date =  date('d-m-y');

	$avatar_temp = $_FILES['avatar']['tmp_name'];
    $avatar_name = $_FILES['avatar']['name'];
    $avatar_type = $_FILES['avatar']['type'];
    move_uploaded_file($avatar_temp, "../../../app/images/avatar/$avatar_name");

	$input = [
		'supplier_id' => $id,
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
		'date_added' => $date,
		'avatar' => $avatar_name,
		'status' => 'active'
		 ];

	$result = $supplier->create($input);

	header('Location: ../../../suppliers.php');


















?>