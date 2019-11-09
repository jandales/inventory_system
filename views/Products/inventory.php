
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
          
              <div class="col-md-12 col-sm-12 col-xs-12">
        
                <div class="form_panel">
                  <div class="form_title">
                    <h3>Item Information</h3>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="form_content">
                       <form class="form-horizontal" method="post" action="./core/Request/Products/addstock.php" enctype="multipart/form-data">
                        

                      

                        <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Item Name :
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text"  name="fname" required="required" class="form-control col-md-7 col-xs-12 textbox" value="<?php echo $item['item_name']?>" readonly>
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Current Stock :
                        </label>

                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text"  name="lname" required="required" class="form-control col-md-7 col-xs-12 textbox" value="<?php echo $item['quantity']  ?>" readonly>
                        </div>
                      </div>

                           <div class="item form-group">
                        <label class="required-label control-label col-md-2 col-sm-2 col-xs-12" for="email">Add stock:  
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="number" id="email" name="qty" class="form-control col-md-7 col-xs-12 textbox" value="">
                        </div>
                      </div>


                      <div class="form-group">
                        <div class="pull-right">
                          <button type="submit" name="submit" class="btn btn-info btn-flat" value="<?php echo $item['item_id']  ?>">Submit</button>                         
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>