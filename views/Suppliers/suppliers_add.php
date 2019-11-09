

            </div>

               <div class="clearfix"></div>

            <div class="row top-20px">
          
              <div class="col-md-12 col-sm-12 col-xs-12">
              <?php error_message() ?>
                <div class="form_panel">
                  <div class="form_title">
                    <h2>Supplier Information<small>(Fields in red are required)</small></h2>
                  

<form method="post" action="">
<div class="form-inline">

     <?php

global $totalpage;

if(isset($_POST['submit'])){
 
  insert_supplier();
  
}




?>           
</div><!-- /.form -->

</form>

                    <div class="clearfix"></div>
                  </div>
                  <div class="form_content">
                       <form class="form-horizontal" method="post" action="./core/Request/Suppliers/add.php" id="form1" runat="server" enctype="multipart/form-data">
                        
                         <div class="item form-group">
                        <label class="required-label control-label col-md-2 col-sm-2 col-xs-12" for="email">Campany :
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text"  name="campany"  class="form-control col-md-7 col-xs-12 textbox"  required="">
                        </div>
                      </div>

                      

                        <div class="item form-group">
                        <label class="required-label control-label col-md-2 col-sm-2 col-xs-12">Firstname :
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text"  name="fname" required="required" class="form-control col-md-7 col-xs-12 textbox">
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="required-label control-label col-md-2 col-sm-2 col-xs-12" for="email">Lastname :
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text"  name="lname" required="required" class="form-control col-md-7 col-xs-12 textbox" >
                        </div>
                      </div>

                           <div class="item form-group">
                        <label class="required-label control-label col-md-2 col-sm-2 col-xs-12" for="email">Email : 
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12 textbox" ">
                        </div>
                      </div>

                    

                       <div class="item form-group">
                        <label class=" required-label control-label col-md-2 col-sm-2 col-xs-12" for="email">Phone Number:
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="number"  name="phone" required="required" class="form-control col-md-7 col-xs-12 textbox"  >
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Choose Avatar :
                        </label>
                  
                         <div class="input-group  input-w">
                              
                              
                              <label class="btn btn-info btn-flat" type="submit" ><i class="fa fa-folder-open-o"></i> Choose Avatar<input id="imgInp" type="file" name="avatar" style="display:none;"></label>
                        
                             
                        </div>
                          <div class="col-md-10 col-sm-10 col-xs-12 col-md-offset-2 col-sm-offset-2">

                                <img id="blah" src="app/images/avatar/user.png" class="choose-avatar">
                                 
                          </div>
                      </div>



                        <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Address 1 :
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" id="email" name="address1"  class="form-control col-md-7 col-xs-12 textbox"  >
                        </div>
                      </div>


                        <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Address 2 :
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" id="email" name="address2"  class="form-control col-md-7 col-xs-12 textbox"  >
                        </div>
                      </div>

                         <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">City :
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text"  name="city"  class="form-control col-md-7 col-xs-12 textbox"  >
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">State/Province :
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" id="email" name="state" " class="form-control col-md-7 col-xs-12 textbox"  >
                        </div>
                      </div>
                      
                        <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Zip :
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" id="email" name="zip"  class="form-control col-md-7 col-xs-12 textbox"  >
                        </div>
                      </div>

                          <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Comment :
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <textarea class="form-control col-md-7 col-xs-12 textbox" name="comment">
                            
                          </textarea>
                      </div>
                      </div>

                       
                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Account # :
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text"  name="account"  class="form-control col-md-7 col-xs-12 textbox"  >
                        </div>
                      </div>

                         <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Website :
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text"  name="account"  class="form-control col-md-7 col-xs-12 textbox"  >
                        </div>
                      </div>


                 


                      <div class="form-group">
                        <div class="pull-right">
                          <input type="submit" name="submit" class="btn btn-info btn-flat" value="Submit">
                         
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            