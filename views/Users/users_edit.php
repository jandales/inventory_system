

 <?php 




  if(isset($_GET['id'])){

     $id = $_GET['id'];   
   
    $users = new Users();

    $lists = $users->select($id);

    foreach ($lists as $key => $db) {     

      $user  = array('username' => $db['username'],
        'avatar' => $db['username'],
        'fname' => $db['fname'],
        'lname' => $db['lname'],
        'gender' => $db['gender'],
        'email' => $db['email'],
        'number' => $db['snumber'],
        'address' => $db['address'],
        'password' => $db['password'],
        'avatar'=> $db['avatar'],
        'role' => $db['role']
      );

    } 
  }



  ?>


            </div>

               <div class="clearfix"></div>

            <div class="row top-20px">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form_panel">
                  <div class="form_title">
                    <h2>Edit User Information</h2>

<form method="post" action="">
<div class="form-inline">
<div class="form-group pull-right">

<button type="submit" name="back"  class="btn btn-info btn-padding"><i class="fa fa-arrow-left"></i> Back</button>
                  
</div>
               
</div><!-- /.form -->

</form>
                    <div class="clearfix"></div>
                  </div>

                 
                  <div class="form_content">
                       <form class="form-horizontal form-label-left" novalidate action="./core/Request/Users/update.php" method="post" enctype="multipart/form-data">

                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="username">Username :
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12 textbox"  name="username"  required="required" type="username" value="<?php echo $user['username'] ?>" readonly>
                         
                        </div>
                        
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Email <span class="required">:</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12 textbox" value="<?php echo $user['email'] ?>" readonly>
                          
                        </div>
                       
                      </div>
                      
                        <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Firstname <span class="required">:</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" id="email" name="fname" required="required" class="form-control col-md-7 col-xs-12 textbox" value="<?php echo $user['fname'] ?>" >
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Lastname <span class="required">:</span>
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" id="email" name="lname" required="required" class="form-control col-md-7 col-xs-12 textbox" value="<?php echo $user['lname'] ?>" >
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Choose Avatar :
                        </label>
                  
                         <div class="input-group  input-w">
                              
                              
                              <label class="btn btn-info btn-flat" type="submit" ><i class="fa fa-folder-open-o"></i> Choose Avatar<input id="imgInp" type="file" name="avatar" style="display:none;"></label>
                        
                             
                        </div>
                          <div class="col-md-10 col-sm-10 col-xs-12 col-md-offset-2 col-sm-offset-2">

                        
                              <?php

                             if(!$user['avatar'] == 0){
                              $avatar = $user['avatar'];
                                echo "<img id='blah' class='img-responsive avatar-view' src='app/images/avatar/$avatar' alt='avatar'  width='140px' >";
                            }else{
                              echo '<img id="blah" class="img-responsive avatar-view" src="app/images/avatar/user.png" alt="avatar" width="140px">';
                            }


                          ?>
                                 
                          </div>
                      </div>


                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="number">Phone Number: <span class="required">:</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="number" id="number" name="number" required="required"  class="form-control col-md-7 col-xs-12 textbox" value="<?php echo $user['number'] ?>">
                        </div>
                      </div>

                           <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Address <span class="required">:</span>
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text"  name="address" required="required" class="form-control col-md-7 col-xs-12 textbox" value="<?php echo $user['address'] ?>" >
                        </div>
                      </div>

                       <div class="item form-group">
                          <label class="control-label col-md-2 col-sm-2 col-xs-12" for="occupation">Gender <span class="required">:</span>
                          </label>
                          <div class="col-md-10 col-sm-10 col-xs-12">
                           <select class="form-control col-md-7 col-xs-12 textbox" name="gender" value=<?php echo $user['gender'] ?>>
                            
                           <option>Male</option>
                           <option>Female</option>                          
                            
                           </select>
                          </div>
                        </div>

                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="occupation">Role <span class="required">:</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                         <select class="form-control col-md-7 col-xs-12 textbox" name="role" value=<?php echo $user['role'] ?>>

                           <option>Administrator</option>
                           <option>Encoder</option>
                           <option>Cashier</option>
                         </select>


                        </div>
                      </div>
                     
                   
                    
                     
                   
                      <div class="form-group">
                        <div class="pull-right">
                          <button type="submit" name="submit" value=<?php echo $id; ?> class="btn btn-primary btn-flat" >Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>

          



                </div>
              </div>
            </div>