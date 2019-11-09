
<?php

include_once('../class/Login.php');
include_once('../class/Users.php');
include_once('../class/Helpers.php');


if(isset($_POST['login'])){



	$x = new Helpers();
	$login  = new Login();


	$user = $_POST['username'];
	$pass = $_POST['password'];
	
	$user = $x->escape_string($user);
    $pass = $x->escape_string($pass);

	$spash = sha1(sha1($pass."salt")."salt");
	
	$password =  $login->login($user);





if(empty($user) || empty($pass)){


	$error = '<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    field are empty!</div>';
	set_error_message("$error");
	header("Location: ../login.php");
	

}	
else if(password_verify($pass, $password)){




		$Users = new Users();

		$user =  $Users->UserInfo($user);

		foreach ($user as $key => $p) {

			$_SESSION['username'] = $p['username'];	
			$_SESSION['id'] = $p['id'];	
			$_SESSION['fname'] = $p['fname'];
			$_SESSION['lname'] = $p['lname'];
			$_SESSION['role'] = $p['role'];
			$_SESSION['avatar'] = $p['avatar'];

	
		}			

		header("Location: ../../index.php");	
		

}else{

	$error = '<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Wrong username or password try again!</div>';
	set_error_message("$error");
	header("Location: ../login.php");
}

}


?>