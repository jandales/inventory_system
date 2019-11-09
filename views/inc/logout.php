<?php session_start(); ?>

<?php
		$_SESSION['username'] = null;
		$_SESSION['password'] = null;
		$_SESSION['name'] = null;
		$_SESSION['role'] = null;
		header("Location: ../login.php");


?>