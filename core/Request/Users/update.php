<?php


 include_once('../../class/Users.php');





if(isset($_POST['submit'])){

  $users = new Users();

  $id = $_POST['submit'];
 

  $avatar_name = $_FILES['avatar']['name'];

  $avatar_temp = $_FILES['avatar']['tmp_name'];

  move_uploaded_file($avatar_temp, "../../../app/images/avatar/$avatar_name");


  $list = $users->select($id);



 if(empty($avatar_name)){

 		foreach ($list as $key => $user) {
 			 $avatar_name = $user['avatar'];
 		} 
	

 }

   $data  = array(
 	'email' => $_POST['email'],
 	'fname' => $_POST['fname'],
 	'lname' => $_POST['lname'],
 	'role' => $_POST['role'],
 	'snumber' => $_POST['number'],
 	'address' => $_POST['address'],
 	'gender' => $_POST['gender'],
 	'avatar' => $avatar_name ,
 	'id' => $id

 ); 




 $users->update($data);          
  
  
  // $message = '<div class="alert alert-success">
  //               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  //               User Updated!</span></div>';

  //   set_message($message);
  //   redirect("users.php");


	 header('location: ../../../users.php');
  }

  ?>
