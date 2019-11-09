 <?php 
  if(isset($_POST['back'])){
    header("Location: users.php");
  }

 ?>


            </div>

               <div class="clearfix"></div>

            <div class="row top-20px">
          
              <div class="col-md-12 col-sm-12 col-xs-12">
              <?php error_message() ?>
                <div class="form_panel">
                  <div class="form_title">
                    <h2>User Information</h2>

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
                       <form class="form-horizontal" method="post" action="./core/Request/Users/add.php">
                        

                      <div class="item form-group">
                        <label class="required-label control-label col-md-2 col-sm-2 col-xs-12" for="username">Username :
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="username" id="name" class="form-control col-md-7 col-xs-12 textbox"  name="username" placeholder="" required="required" value="">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="required-label control-label col-md-2 col-sm-2 col-xs-12" for="email">Email : 
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12 textbox" value="<?php if(isset($_POST['email'])){ echo $_POST['email']; } ?>">
                        </div>
                      </div>
                      
                        <div class="item form-group">
                        <label class="required-label control-label col-md-2 col-sm-2 col-xs-12">Firstname :
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text"  name="fname" required="required" class="form-control col-md-7 col-xs-12 textbox" value="<?php if(isset($_POST['fname'])){ echo $_POST['fname']; } ?>">
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="required-label control-label col-md-2 col-sm-2 col-xs-12" for="email">Lastname :
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text"  name="lname" required="required" class="form-control col-md-7 col-xs-12 textbox" value="<?php if(isset($_POST['lname'])){ echo $_POST['lname']; } ?>"  >
                        </div>
                      </div>


                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Address :
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" id="email" name="address" required="required" class="form-control col-md-7 col-xs-12 textbox" value="<?php if(isset($_POST['address'])){ echo $_POST['address']; } ?>" >
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Phone Number :
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="number"  name="number" required="required" class="form-control col-md-7 col-xs-12 textbox" value="<?php if(isset($_POST['number'])){ echo $_POST['number']; } ?>" >
                        </div>
                      </div>
                   
                   
                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Gender : 
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                         <select class="form-control col-md-7 col-xs-12 textbox" name="gender">
                           <option>Gender</option>
                           <option>Male</option>
                           <option>Female</option>
                         </select>
                        </div>
                      </div>


                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12 textbox" for="occupation">Role :
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                         <select class="form-control col-md-7 col-xs-12 textbox" name="role">
                           <option>Role</option>
                           <option>Administrator</option>
                           <option>Encoder</option>
                           <option>Cashier</option>
                         </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="password" class="control-label control-label col-md-2 col-sm-2 col-xs-12">Password</label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input id="password" type="password" name="password" data-validate-length="6,8" class="form-control col-md-7 col-xs-12 textbox" required="required">
                        </div>
                      </div>
                   
                    
                     
                   
                      <div class="form-group">
                        <div class="pull-right">
                          <input type="submit" name="add_user" class="btn btn-primary btn-flat" value="Submit">
                         
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>