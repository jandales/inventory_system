
<?php

if(isset($_GET['id'])){

 $id = $_GET['id'];

 $products =  new Products();

 $item = $products->edit($id);




}



 ?>


            </div>

               <div class="clearfix"></div>

            <div class="row top-20px">
            <form  method="post" action="./core/Request/Products/update.php" id="form1"  enctype="multipart/form-data">
              <div class="col-md-12 col-sm-12 col-xs-12">
              <?php error_message() ?>
                <div class="form_panel">
                  <div class="form_title">
                    <h2><i class="fa fa-edit"></i> Item Information<small>(Fields in red are required)</small></h2>
                  


                    <div class="clearfix"></div>
                  </div>
                  
                  <div class="form_content">
                 
                       <div class="form-horizontal">
                        
                        

                       <div class="item form-group">
                        <label class="required-label control-label col-md-2 col-sm-2 col-xs-12" for="email">Barcode Code:
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text"  name="barcode"  class="form-control col-md-7 col-xs-12 textbox"  required="" value="<?php echo $item['barcode'] ?>">
                        </div>
                      </div>

                      

                        <div class="item form-group">
                        <label class="required-label control-label col-md-2 col-sm-2 col-xs-12">Product Name :
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text"  name="itemname" required="required" class="form-control col-md-7 col-xs-12 textbox" value="<?php echo $item['item_name'] ?>" >
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="required-label control-label col-md-2 col-sm-2 col-xs-12" for="email">Category :
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                         
                           <select class="form-control col-md-7 col-xs-12 textbox"  name="category">

                            <?php
                       

                            $categories =  new Categories();

                            $lists  = $categories->GetAll();                        

                            foreach ($lists as $key => $value) {

                              if($item['cat_id'] == $value['cat_id'] ) {

                                  echo  "<option selected  value='" . $value['cat_id'] . " '>". $value['cat_name'] ."</option>";
                              }
                              else
                              {
                                echo  "<option  value='" . $value['cat_id'] . " '>". $value['cat_name'] ."</option>";
                              }

                               
                            }                         
                            
                           ?>


                      



                          </select>
                          <label><a href="categories.php">Add new category</a></label>
                        </div>
                      </div>

                        
                       <div class="item form-group">
                        <label class="required-label control-label col-md-2 col-sm-2 col-xs-12" for="email">Supplier :
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12 textbox" name="supplier"  value="select">                            

                            <?php

                            $suppliers = new Suppliers();

                            $lists = $suppliers->getall();

                            foreach ($lists as $key => $value) {

                                if($value['supplier_id'] == $item['supplier_id']){

                                  echo  "<option selected value='".$item['supplier']."'>" . $item['campany'] . "</option>";


                                }else{

                                  echo  "<option value='". $value['supplier_id']."'>". $value['campany'] . "</option>";

                                }
                                
                            }

                           ?>
                          </select>
                          
                          <label><a href="suppliers.php?page=add">Add new Supplier</a></label>
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Description :
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                             <textarea class="form-control col-md-7 col-xs-12 textbox" name="description">
                              <?php echo $item['description'] ?>
                             </textarea>
                        </div>
                      </div>


                       <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Reorder Level :
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="number"  name="reorder_level"  class="form-control col-md-7 col-xs-12 textbox" value="<?php echo $item['reorder_level'] ?>">
                        </div>
                      </div>


                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Choose Image :
                        </label>
                  
                         <div class="input-group  input-w">
                              
                              
                              <label class="btn btn-info btn-flat" type="submit" ><i class="fa fa-folder-open-o"></i> Choose Image<input id="imgInp" type="file" name="avatar" style="display:none;"></label>
                        
                             
                        </div>
                          <div class="col-md-10 col-sm-10 col-xs-12 col-md-offset-2 col-sm-offset-2">

                              

                                <?php

                                  $avatar = $item['avatar'];

                                  if(!$avatar == null){
                                  echo "<img src='app/images/avatar/$avatar' id='blah' class='choose-avatar'>";

                                  }else{

                                  echo "<img id='blah'  src='app/images/avatar/choose.png' class='choose-avatar'>";

                                  }

                                ?>
                                 
                          </div>
                      </div>


                   
                    </div>

                  </div>
                </div>
              </div>


               <div class="col-md-12 col-sm-12 col-xs-12 ">
                <div class="form_panel -top-20px">
                  <div class="form_title">
                    <h3>Pricing and Inventory</h3>
                

                    <div class="clearfix"></div>
                  </div>
                  <div class="form_content">
                       <div class="form-horizontal">
                        
                         <div class="item form-group">
                        <label class="required-label control-label col-md-2 col-sm-2 col-xs-12" for="email">Cost Price:
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="number"  name="cost"  class="form-control col-md-7 col-xs-12 textbox"  required="" value="<?php echo $item['cost'] ?>">
                        </div>
                      </div>

                      

                        <div class="item form-group">
                        <label class="required-label control-label col-md-2 col-sm-2 col-xs-12">Selling Price :
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="number"  name="price" required="required" class="form-control col-md-7 col-xs-12 textbox" value="<?php echo $item['price'] ?>">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Quantity :
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="number"  name="quantity" required="required" class="form-control col-md-7 col-xs-12 textbox" value="<?php echo $item['quantity'] ?>">
                        </div>
                      </div>

                       <div class="form-group">
                        <div class="pull-right">
                          <button type="submit" name="submit" class="btn btn-info btn-flat" value="<?php echo $item['item_id'] ?>" >Submit</button>
                         
                        </div>
                      </div>

                   
                 
                  </div>
                </div>
              </div>







            </div>
            </form>

</div>
<!--pricing-->



             