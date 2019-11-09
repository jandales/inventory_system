 <?php 
  if(isset($_POST['back'])){
    header("Location: users.php");
  }

 ?>

 <?php 
  if(isset($_GET['id'])){
    $id = $_GET['id'];
   

    $query = "SELECT * FROM users WHERE id = '{$id}' ";
    $query_result = mysqli_query($connect, $query);

    if(!$query_result){
    echo "cant load";
    }
    while($db = mysqli_fetch_assoc($query_result)){
    $id = $db['id'];
    $username = $db['username'];
    $avatar = $db['username'];
    $fname = $db['fname'];
    $lname = $db['lname'];
    $gender = $db['gender'];
    $email = $db['email'];
    $number = $db['snumber'];
    $address = $db['address'];
    $password= $db['password'];
    $avatar= $db['avatar'];
    $role = $db['role'];
    $date = $db['date_reg'];
    $name = $fname .  '&nbsp' .  $lname;

  }
}
if(isset($_POST['update_user'])){

  $username = $_POST['username'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];

  $number = $_POST['number'];
  $address = $_POST['address'];


  $query = "UPDATE users SET ";



   $query .= "fname = '{$fname}', ";
   $query .= "lname = '{$lname}', ";
   $query .= "gender = '{$gender}', ";
   $query .= "email = '{$email}', ";
   $query .= "snumber = '{$number}', ";
   $query .= "address = '{$address}' ";
   $query .= "WHERE id = '{$id}' ";
   $query_update=mysqli_query($connect, $query);
  

  if(!$query_update){
      echo "Cant update";
    }else{
     header("Location: users.php?page=profile&id=$id");
    }
  
      
  }

  ?>

            </div>

               <div class="clearfix"></div>
               <div class="row top-20px">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form_panel">
                  <div class="form_title">
                    <h2>Edit Profile</h2>
                    <form method="post" action="">
<div class="form-inline">
<div class="form-group pull-right">

<button type="submit" name="back"  class="btn btn-info btn-padding btn-flat"><i class="fa fa-arrow-left"></i> Back</button>
                  
</div>
               
</div><!-- /.form -->



                    <div class="clearfix"></div>
                  </div>
                  <div class="form_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <?php

                            if(!$avatar == 0){
                                echo "<img class='img-responsive avatar-view' src='app/images/avatar/$avatar' alt='avatar'>";
                            }else{
                              echo '<img class="img-responsive avatar-view" src="app/images/avatar/user.png" alt="avatar">';
                            }

                          ?>
                         
                         </div>
                      </div>

                       <div class="form-group">
                          
                        </div>

                      


                        <form  action="" method="post" enctype="multipart/form-data">
                         <input type="submit" class="btn btn-info btn-padding btn-flat" name="update" value="Update Profile">
                    <label class="label-control sel-image">Select Image<input type="file" name="avatar" style="display:none;"></label>
                        
                        <?php 
                         
                         

                        if(isset($_POST['update'])){
                        

                          if(!empty($_FILES['avtar']['name'])){
                            $avatar_temp = $_FILES['avatar']['tmp_name'];
                            $avatar_name = $_FILES['avatar']['name'];
                            $avatar_type = $_FILES['avatar']['type'];
                            move_uploaded_file($avatar_temp, "app/images/avatar/$avatar_name");

                         }else{
                            echo "<div class='alert alert-danger'>No chosen file</div>";

                         }
                        }
                         
                          ?>

                        </form>


                    
             

                    </div>



                    <div class="col-md-9 col-sm-9 col-xs-12">

                    <form class="form-horizontal form-label-left" novalidate action="" method="post">

                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="username">Username <span class="required">:</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12 textbox"  name="username"  required="required" type="username" value="<?php echo $username ?>" readonly>
                          
                        </div>
                        
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Email <span class="required">:</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="email"  name="email" required="required" class="form-control col-md-7 col-xs-12 textbox" value="<?php echo $email ?>" readonly>
                        </div>
                      
                      </div>
                      
                        <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Firstname <span class="required">:</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text"  name="fname" required="required" class="form-control col-md-7 col-xs-12 textbox" value="<?php echo $fname ?>" >
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Lastname <span class="required">:</span>
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text"  name="lname" required="required" class="form-control col-md-7 col-xs-12 textbox" value="<?php echo $lname ?>" >
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="number">Number <span class="required">:</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="number"  name="number" required="required"  class="form-control col-md-7 col-xs-12 textbox" value="<?php echo $number ?>">
                        </div>
                      </div>

                           <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Address <span class="required">:</span>
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text"  name="address" required="required" class="form-control col-md-7 col-xs-12 textbox" value="<?php echo $address ?>" >
                        </div>
                      </div>

                       <div class="item form-group">
                          <label class="control-label col-md-2 col-sm-2 col-xs-12" for="occupation">Gender <span class="required">:</span>
                          </label>
                          <div class="col-md-10 col-sm-10 col-xs-12">
                           <select class="form-control col-md-7 col-xs-12" name="gender">

                            <?php

                            if($gender == 'Male'){
                              echo "<option>$gender</option>";
                              echo "<option>Female</option>";
                            }else{
                               echo "<option>$gender</option>";
                               echo "<option>Male</option>";
                            }

                            ?>
                            
                           </select>
                          </div>
                        </div>

                
                   
                   
                    
                     
                   
                      <div class="form-group">
                        <div class="pull-right">
                          <button type="submit" name="update_user" class="btn btn-primary btn-flat">Submit</button>
                        </div>
                      </div>
                    </form>
                    

                     
                    </div>
                  </div>
                </div>
              </div>
            </div>