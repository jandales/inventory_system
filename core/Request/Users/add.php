<?php

 include_once('../../class/Users.php');


$user = new Users();


if(isset($_POST['add_user'])){

  $username = $_POST['username'];

  $email = $_POST['email'];

  $fname = $_POST['fname'];

  $lname = $_POST['lname'];

  $role = $_POST['role'];

  $number = $_POST['number'];

  $address = $_POST['address'];

  $gender = $_POST['gender'];

  $password = $_POST['password'];

  $date =  date('d-m-y');


  /// check if the curent username is allready exist

  $exist = $user->exist($username);

  if($exist) {

    echo "users already exist";

      // $error_message = ' <div class="alert alert-danger">
      // <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      // <label>Error:  <span>Username already exist!</span></label> 
      // </div>';

      // Messages::Error($error_message);
    
      // Messages::redirect('../users.php');
      return;



  }

  elseif($role == "Role"){

   echo  "Select role!";

    //  $error_message = ' <div class="alert alert-danger">
    // <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    //   <label>Error:  <span>Select role!</span></label></div>';

    // set_error_message("$error_message");

      return;

  }

  elseif($gender == "Gender"){

    //  $error_message = ' <div class="alert alert-danger">
    // <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    //   <label>Error:  <span>Select Gender!</span></label></div>';

    // set_error_message("$error_message");

   echo "Select Gender!";

      return;
  }

  else{

  $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12, )); 


  $data  = array(

  	'username' => $username,
  	'email' => $email,
  	'fname' => $fname,
  	'lname' => $lname,
  	'role' => $role,
  	'snumber' => $number,
  	 'address' => $address,
  	 'gender' => $gender,
  	 'password' => $password,
  	 'date_reg' => $date

  );



   $result = $user->create($data);

   if($result > 0) {

   	  // $message = '<div class="alert alert-success">
      //          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      //            New User Added: ' . $username .  '</span></div>';

      // set_message($message);

      header('Location: ../../../users.php');

   }



}
}


?>