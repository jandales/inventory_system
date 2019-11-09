<?php


	include_once('../../class/Users.php');
	include_once('../../class/Helpers.php');

	
	if(isset($_POST['delete'])) {

		$id = Helpers::escape_string($_POST['delete']);

		$customers = new Users();

		$customers->delete($id);

	}


?>