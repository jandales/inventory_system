<?php


	include_once('../../class/Customers.php');
	include_once('../../class/Helpers.php');

	
	if(isset($_POST['delete'])) {

		$x =  new Helpers();

		$id = $x->escape_string($_POST['delete']);

		$users = new Customers();

		$users->delete($id);

	}


?>