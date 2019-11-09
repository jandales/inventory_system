

 <?php 
  if(!isset($_GET['id'])) return;

    $id = $_GET['id'];   

    $users = new Users();

    $user = $users->select($id);

    $name = $user['fname'] .  '&nbsp' .$user['lname'];
  

?>

            </div>

               <div class="clearfix"></div>
               <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>User Profile <small>Activity report</small></h2>
                    <form method="post" action="">
<div class="form-inline">
<div class="form-group pull-right">

<a href="users.php" type="submit" name="back"  class="btn btn-info btn-padding"><i class="fa fa-arrow-left"></i> Back</a>
                  
</div>
               
</div><!-- /.form -->
</form>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <?php

                            $avatar = $user['avatar'];

                             if(!$avatar == 0){
                                echo "<img class='img-responsive avatar-view' src='app/images/avatar/$avatar' alt='avatar'>";
                            }else{
                              echo '<img class="img-responsive avatar-view" src="app/images/avatar/user.png" alt="avatar">';
                            }


                          ?>
                        </div>
                      </div>
                      <h3><?php echo $name ?> <small>(<?php echo $user['username'] ?>)</small></h3>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> <?php echo $user['address'] ?>
                        </li>

                        <li>
                          <i class="fa fa-envelope user-profile-icon"></i> <?php echo $user['email'] ?>
                          </li>
                         <li>
                          <i class="fa fa-user user-profile-icon"></i> <?php echo $user['role'] ?>
                          </li>
                        <li class="m-top-xs">
                          <i class="fa fa-phone user-profile-icon"></i>
                          <a> <?php echo $user['snumber'] ?></a>
                        </li>
                      </ul>

                      <a href="users.php?page=edit&id=<?php echo $id ?>" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
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
                          <th><?php echo $user['username'] ?></th>
                        </tr>

                         <tr>
                          <th width="20%;">Email:</th>
                          <th><?php echo $user['email'] ?></th>
                        </tr>

                         <tr>
                          <th width="20%;">Firstname:</th>
                          <th><?php echo $user['fname'] ?></th>
                        </tr>

                        <tr>
                          <th width="20%;">Lastname:</th>
                          <th><?php echo $user['lname'] ?></th>
                        </tr>

                        <tr>
                          <th width="20%;">Number:</th>
                          <th><?php echo $user['snumber'] ?></th>
                        </tr>

                        <tr>
                          <th width="20%;">Address:</th>
                          <th><?php echo $user['address'] ?></th>
                        </tr>

                          <tr>
                          <th width="20%;">Role:</th>
                          <th><?php echo $user['role'] ?></th>
                        </tr>

                          <tr>
                          <th width="20%;">Gender:</th>
                          <th><?php echo $user['gender'] ?></th>
                        </tr>

                         <tr>
                          <th width="20%;">Date registered:</th>
                          <th><?php echo $user['date_reg'] ?></th>
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