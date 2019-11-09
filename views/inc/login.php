<?php require_once('../config.php'); ?>
<?php
if(isset($_POST['login'])){


	$user = $_POST['username'];
	$pass = $_POST['password'];
	
	$user = mysqli_real_escape_string($connect, $user);
    $pass = mysqli_real_escape_string($connect, $pass);
	$spash = sha1(sha1($pass."salt")."salt");

	$query= "SELECT * FROM users WHERE username = '$user' ";
	$result = mysqli_query($connect, $query);

	if(!$result){
 	die("error". mysqli_error($connect));
 }

 while($row = mysqli_fetch_array($result)) {

 	    $row_username = $row['username'];
 	    $row_password = $row['password'];
 	    $row_name = $row['fname'];
 	    $row_lname = $row['lname'];
 	    $row_email = $row['email'];
 	    $row_role = $row['role'];
 	    $row_avatar = $row['avatar'];
	  

 	 }


}


if(empty($user) || empty($pass)){
	$error = '<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    field are empty!</div>';
	set_error_message("$error");
	header("Location: ../login.php");
	

}	
else if($user !==  $row_username  && $pass !== $row_password ){
	$error = '<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Wrong username or password try again!</div>';
	set_error_message("$error");
	header("Location: ../login.php");
	

}else if(password_verify($pass, $row_password)){
		$_SESSION['username'] = $row_username;
		$_SESSION['password'] = $row_password;
		$_SESSION['fname'] = $row_name;
		$_SESSION['lname'] = $row_lname;
		$_SESSION['role'] = $row_role;
		$_SESSION['avatar'] = $row_avatar;
		header("Location: ../index.php");
	
		echo $pass . '<br>';
		echo $row_password . '<br>';
		echo $spash;

}else{

	$error = '<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Wrong username or password try again!</div>';
	set_error_message("$error");
	header("Location: ../login.php");
}


?>