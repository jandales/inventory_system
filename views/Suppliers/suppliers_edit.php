 <?php 
  if(isset($_POST['back'])){
    header("Location: suppliers.php");
  }



 ?>

<?php

if(isset($_GET['id'])){




$id = $_GET['id'];

$suppliers = new Suppliers();

$supplier = $suppliers->edit($id);


}
?>

            </div>

               <div class="clearfix"></div>

            <div class="row top-20px">
          
              <div class="col-md-12 col-sm-12 col-xs-12">
        
                <div class="form_panel">
                  <div class="form_title">
                    <h2>Edit Supplier Information<small>(Fields in red are required)</small></h2>
                  

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
                       <form class="form-horizontal" method="post" action="./core/Request/Suppliers/update.php" enctype="multipart/form-data">
                        

                       <div class="item form-group">
                        <label class="required-label control-label col-md-2 col-sm-2 col-xs-12" for="email">Campany :
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text"  name="campany"  class="form-control col-md-7 col-xs-12 textbox"     value="<?php echo $supplier['campany']; ?>" >
                        </div>
                      </div>


                        <div class="item form-group">
                        <label class="required-label control-label col-md-2 col-sm-2 col-xs-12">Firstname :
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text"  name="fname" required="required" class="form-control col-md-7 col-xs-12 textbox" value="<?php echo $supplier['fname'] ?>">
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="required-label control-label col-md-2 col-sm-2 col-xs-12" for="email">Lastname :
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text"  name="lname" required="required" class="form-control col-md-7 col-xs-12 textbox" value="<?php echo $supplier['lname'] ?>">
                        </div>
                      </div>

                           <div class="item form-group">
                        <label class="required-label control-label col-md-2 col-sm-2 col-xs-12" for="email">Email : 
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12 textbox" value="<?php echo $supplier['email'] ?>">
                        </div>
                      </div>

                    

                       <div class="item form-group">
                        <label class=" required-label control-label col-md-2 col-sm-2 col-xs-12" for="email">Phone Number:
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="number"  name="phone" required="required" class="form-control col-md-7 col-xs-12 textbox" value="<?php  echo $supplier['phone'] ?>" >
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Choose Avatar :
                        </label>
                  
                         <div class="input-group  input-w">
                              
                              
                              <label class="btn btn-info btn-flat" type="submit" name="avatar"><i class="fa fa-folder-open-o"></i> Choose Avatar<input type="file" id="imgInp" name="avatar" style="display: none;"></label>
                        
                             
                        </div>
                          <div class="col-md-10 col-sm-10 col-xs-12 col-md-offset-2">
                                <?php
                                $avatar = $supplier['avatar'];
                             if(!$avatar == null){
                                echo "<img id='blah' class='img-responsive avatar-view' src='app/images/avatar/$avatar' alt='avatar'  width='140px' >";
                            }else{
                              echo '<img id="blah" class="img-responsive avatar-view" src="app/images/avatar/user.png" alt="avatar" width="140px">';
                            }


                          ?>
                                 
                          </div>
                      </div>



                        <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Address 1 :
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" id="email" name="address1"  class="form-control col-md-7 col-xs-12 textbox" value="<?php echo $supplier['address1'] ?>" >
                        </div>
                      </div>


                        <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Address 2 :
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" id="email" name="address2"  class="form-control col-md-7 col-xs-12 textbox" value="<?php echo $supplier['address2'] ?>" >
                        </div>
                      </div>

                         <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">City :
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text"  name="city"  class="form-control col-md-7 col-xs-12 textbox" value="<?php echo $supplier['city'] ?>"  >
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">State/Province :
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" id="email" name="state" " class="form-control col-md-7 col-xs-12 textbox"  value="<?php echo $supplier['state'] ?>" >
                        </div>
                      </div>
                      
                        <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Zip :
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" id="email" name="zip"  class="form-control col-md-7 col-xs-12 textbox"  value="<?php echo $supplier['zip'] ?>"  >
                        </div>
                      </div>

                          <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Comment :
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <textarea class="form-control col-md-7 col-xs-12" name="comment" value="<?php echo $supplier['comment'] ?>">
                         
                          </textarea>
                      </div>
                      </div>

                       
                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Account # :
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text"  name="account"  class="form-control col-md-7 col-xs-12 textbox"     value="<?php echo $supplier['account'] ?>" >
                        </div>
                      </div>


                    
                 


                      <div class="form-group">
                        <div class="pull-right">
                          <button type="submit" name="submit" class="btn btn-info btn-flat" value="<?php echo $supplier['id']; ?>">Submit</button>
                         
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>