

<?php

if(isset($_GET['id'])){


$id = $_GET['id'];

$customer =  new Customers();

$list = $customer->select($id);

foreach ($list as $key => $db) {

  $person  = array(

    'id' => $db['id'],

    'fname' =>  $db['fname'],

    'lname' => $db['lname'],

    'email' => $db['email'],

    'phone' => $db['phone'],

    'address1' => $db['address1'],

    'address2'=> $db['address2'],

    'zip' => $db['zip'],

    'state' => $db['state'],

    'city' => $db['city'],

    'campany' => $db['campany'],

    'account' => $db['account'],

    'comment' => $db['comment'],

    'status' => $db['status'],

    'avatar' => $db['avatar']

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
                    <h2>Edit Customer Information<small>(Fields in red are required)</small></h2>
                  

<form method="post" action="">
<div class="form-inline">
<div class="form-group pull-right">

                  
</div>
               
</div><!-- /.form -->
</form>

                    <div class="clearfix"></div>
                  </div>
                  <div class="form_content">
                       <form class="form-horizontal" method="post" action="./core/Request/Costumers/update.php" enctype="multipart/form-data">
                        

                      
                        <div class="item form-group">
                        <label class="required-label control-label col-md-2 col-sm-2 col-xs-12">Firstname :
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text"  name="fname" required="required" class="form-control col-md-7 col-xs-12 textbox" value="<?php echo $person['fname'] ?>">
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="required-label control-label col-md-2 col-sm-2 col-xs-12" for="email">Lastname :
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text"  name="lname" required="required" class="form-control col-md-7 col-xs-12 textbox" value="<?php echo $person['lname'] ?>">
                        </div>
                      </div>

                           <div class="item form-group">
                        <label class="required-label control-label col-md-2 col-sm-2 col-xs-12" for="email">Email : 
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12 textbox" value="<?php echo $person['email'] ?>">
                        </div>
                      </div>

                    

                       <div class="item form-group">
                        <label class=" required-label control-label col-md-2 col-sm-2 col-xs-12" for="email">Phone Number:
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="number"  name="phone" required="required" class="form-control col-md-7 col-xs-12 textbox" value="<?php echo $person['phone'] ?>" >
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Choose Avatar :
                        </label>
                  
                         <div class="input-group  input-w">
                              
                              
                              <label class="btn btn-info btn-flat" type="submit" name="avatar"><i class="fa fa-folder-open-o"></i> Choose Avatar<input type="file" name="avatar" style="display: none;"></label>
                        
                             
                        </div>

                          <div class="col-md-10 col-sm-10 col-xs-12 col-md-offset-2">
                                <?php

                              $avatar = $person['avatar'];                          


                             if(!$avatar == null){

                            
                                echo "<img class='img-responsive avatar-view' src='app/images/avatar/$avatar' alt='avatar'  width='140px' >";

                            }else{

                               echo '<img class="img-responsive avatar-view" src="app/images/avatar/user.png" alt="avatar" width="140px">';

                            }


                          ?>
                                 
                          </div>
                      </div>



                        <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Address 1 :
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" id="email" name="address1"  class="form-control col-md-7 col-xs-12 textbox" value="<?php echo $person['address1'] ?>" >
                        </div>
                      </div>


                        <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Address 2 :
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" id="email" name="address2"  class="form-control col-md-7 col-xs-12 textbox" value="<?php echo $person['address2'] ?>" >
                        </div>
                      </div>

                         <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">City :
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text"  name="city"  class="form-control col-md-7 col-xs-12 textbox" value="<?php echo $person['city'] ?>"  >
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">State/Province :
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" id="email" name="state"  class="form-control col-md-7 col-xs-12 textbox"  value="<?php echo $person['state'] ?>" >
                        </div>
                      </div>
                      
                        <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Zip :
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" id="email" name="zip"  class="form-control col-md-7 col-xs-12 textbox"  value="<?php echo $person['zip'] ?>"  >
                        </div>
                      </div>

                          <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Comment :
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <textarea class="form-control col-md-7 col-xs-12" name="comment"     value="<?php echo $person['comment']?>">
                         
                          </textarea>
                      </div>
                      </div>

                        <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Campany :
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text"  name="campany"  class="form-control col-md-7 col-xs-12 textbox"     value="<?php echo $person['campany'] ?>" >
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Account # :
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text"  name="account"  class="form-control col-md-7 col-xs-12 textbox"   value="<?php echo $person['account'] ?>" >
                        </div>
                      </div>


                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Status:
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12 textbox" selected = "<?php echo $person['status'] ?>" name="status">


                            <option>active</option>
                            <option>inactive</option>
                          




                         
                          </select>
                        </div>
                      </div>

                 


                      <div class="form-group">
                        <div class="pull-right">
                          <button type="submit"  name="update" class="btn btn-info btn-flat" value="<?php echo $person['id'] ?>">Submit</button>
                         
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>