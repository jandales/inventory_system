  <?php 
  if(isset($_POST['back'])){
    header("Location: users.php");
  }

 ?>

 <?php 
  if(isset($_SESSION['username'])){
    
   $username = $_SESSION['username'];

    $query = "SELECT * FROM users WHERE username = '{$username}' ";
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
    $avatar = $db['avatar'];
    $role = $db['role'];
    $date = $db['date_reg'];
    $name = $fname .  '&nbsp' .  $lname;

  }
}
?>

            </div>

               <div class="clearfix"></div>
               <div class="row top-20px" >
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
      
                  <div class="x_content" style="margin-top:25px;">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <?php

                             if(!$avatar == 0){
                                echo "<img class='img-responsive avatar-view' src='app/images/avatar/$avatar' alt='avatar'>";
                            }else{
                              echo '<img class="img-responsive avatar-view" src="app/images/avatar/default.jpg" alt="avatar">';
                            }


                          ?>
                        </div>
                      </div>
                      <h3><?php echo $name ?> <small>(<?php echo $username ?>)</small></h3>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> <?php echo $address ?>
                        </li>

                        <li>
                          <i class="fa fa-envelope user-profile-icon"></i> <?php echo $email ?>
                          </li>
                         <li>
                          <i class="fa fa-user user-profile-icon"></i> <?php echo $role ?>
                          </li>
                        <li class="m-top-xs">
                          <i class="fa fa-phone user-profile-icon"></i>
                          <a> <?php echo $number ?></a>
                        </li>
                      </ul>

                      <a href="users.php?page=profile_edit&id=<?php echo $id ?>" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                      <br />

                   
                    
                   

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                   
                    

                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Recent Activity</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">User Information</a>
                          </li>
                          
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                              <div class="x_panel">
 
                  <div class="x_content">
                     

                       <table  class="table-form">
                     
                        <tr>
                          <th width="20%;">No activity</th>
               
                        </tr>

                       

                      </table>
                  
                  </div>
                </div>
                            

                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                            
                              <div class="x_panel">
 
                  <div class="x_content">
                     

                       <table  class="table-form">
                     
                        <tr>
                          <th width="20%;">Username:</th>
                          <th><?php echo $username ?></th>
                        </tr>

                         <tr>
                          <th width="20%;">Email:</th>
                          <th><?php echo $email ?></th>
                        </tr>

                         <tr>
                          <th width="20%;">Firstname:</th>
                          <th><?php echo $fname ?></th>
                        </tr>

                        <tr>
                          <th width="20%;">Lastname:</th>
                          <th><?php echo $lname ?></th>
                        </tr>

                        <tr>
                          <th width="20%;">Number:</th>
                          <th><?php echo $number ?></th>
                        </tr>

                        <tr>
                          <th width="20%;">Address:</th>
                          <th><?php echo $address ?></th>
                        </tr>

                          <tr>
                          <th width="20%;">Role:</th>
                          <th><?php echo $role ?></th>
                        </tr>

                          <tr>
                          <th width="20%;">Gender:</th>
                          <th><?php echo $gender ?></th>
                        </tr>

                         <tr>
                          <th width="20%;">Date registered:</th>
                          <th><?php echo $date ?></th>
                        </tr>

                      </table>
                  
                  </div>
                </div>

                          </div>
                        
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>