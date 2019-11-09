<?php
 $date = date('m-d-y');
 $id_name ="IN";
 $suppliers_id = "";
 $max_id ="";
 $query = "SELECT * FROM invoice";
 $result = mysqli_query($connect, $query);
 $count =mysqli_num_rows($result);


                    
             
if($count == null){
   $ro_id = $id_name . "001";
}else{
  $max_id =  $count + 1;
  $in_id = $id_name ."00". $max_id;

}



?>

<?php 

if(isset($_GET['saleorder'])){

$output ="";
$get = $_GET['saleorder'];

$query = "SELECT * FROM sale_orders WHERE order_id = '{$get}' ";
$result = mysqli_query($connect, $query);
while($db = mysqli_fetch_assoc($result)){



$order_id  = $db['order_id'];
$customers = $db['customer'];
$quantity  = $db['quantity'];
$amount    = $db['amount'];
$discount  = $db['discount'];
$taxable   = $db['taxable'];
    
}
 
}


?>




            </div>

               <div class="clearfix"></div>

            <div class="row">
            <form  method="post" action="" id="form1"  enctype="multipart/form-data">
              <div class="col-md-8 col-sm-8 col-xs-12">
             
                <div class="form_panel">
                  <div class="form_title">
         
               <h3>Invoice <span>(<?php echo $in_id ?>)</span></h3>

               

                    <div class="clearfix"></div>
                  </div>
                  
                  <div class="form_content" style="margin-top: -11px;">
                 
                    <table class="table" >
                    <thead >
                      <tr>
                          <th  class="center">ItemName</th>
                          <th width="15%;" class="center">Qty</th>
                          <th width="15%;" class="center">Disc</th>
                          <th width="18%;" class="center">Price</th>
                          <th width="18%;" class="center">Total</th>
                          <th><a><i class="fa fa-gavel" aria-hidden="true"></i></a></th>
                      </tr>
                      </thead>
                         <tbody id="fields">
<?php
                            if(isset($_GET['saleorder'])){

$output ="";

$get = $_GET['saleorder'];

$query = "SELECT * FROM sale_items WHERE order_id = '{$get}' ";
$result = mysqli_query($connect, $query);
while($db = mysqli_fetch_assoc($result)){
$item = $db['item'];

$query_item = "SELECT * FROM products WHERE item_id = '{$item}' ";
$result_item = mysqli_query($connect, $query_item);
while($db1 = mysqli_fetch_assoc($result_item)){
$itemname = $db1['item_name'];
}


echo "<tr>";
echo '<th><select name="item[]" class="form-control itemname"><option>'.$itemname .'</option></select></th>';
echo '<th><input type="number" name="qty[]" class="form-control qty" value="'.$db['quantity'].'"></th>';
echo '<th><input type="text" name="disc[]" class="form-control disc"  value="'.$db['disc'].'" ></th>';
echo '<th><input type="number" name="price[]" class="form-control prices"  value="'.$db['price'].'"></th>';
echo '<th><input type="text" name="total[]" class="form-control total" readonly=""  value="'.$db['total'].'"></th>';
echo '<th><a class="remove li" ><i class="fa fa-eraser" aria-hidden="true"></i></a></th>';
echo '</tr>';
    
}

    echo $output;
}










?>








                    
                      </tbody>
                      <tfoot>

                         

                          <tr>
                          <th colspan="6" style="text-align: center;"><a id="saleitem" >Add another Item</a></th>
                          </tr>
                
                      </tfoot>
                    
                    </table>



                  

                  </div>

                </div>

        
              </div>

     

                 <div class="col-md-4 col-sm-4 col-xs-12 ">
               <div class="col-md-12 col-sm-12 col-xs-12 ">
                <div class="form_panel">
                  <div class="form_title">
               <h3>Customer</h3>


                    <div class="clearfix"></div>
                  </div>
                  <div class="form_content" style="padding-bottom: 20px;">
                      <div class="col-md-12">
                          <div class="input-group select_hiiden">
                          <span class="input-group-addon span_hide" id="basic-addon1"><i class="fa fa-user"></i></span>
                          <select class="form-control no-content customer_id" name="customer_name" >
                          <option></option>
                            <?php

 if(isset($_GET['saleorder']))
 {

  $sql = "SELECT * FROM customers WHERE customer_id = '{$customers}' ";
     $req = mysqli_query($connect,$sql);

     while ($row = mysqli_fetch_array($req)) {
    echo "<option value='".$row['customer_id']."'>".$row['fname']." ".$row['lname']."</option>";

    }


 }

 else

 {

     $sql = "SELECT * FROM customers WHERE status = 'active' ";
     $req = mysqli_query($connect,$sql);

     while ($row = mysqli_fetch_array($req)) {
    echo "<option value='".$row['customer_id']."'>".$row['fname']." ".$row['lname']."</option>";

    }


 }


?>

                          </select>
                         
                          </div>
                      </div>

                        <div class="form-horizontal" id="customerinfo">


                        </div>

                    <div class="form-horizontal change_customer" >

                                <a class="btn btn-default">Change customer</a>
                     </div>

                </div>
              </div>


            </div>

                  <div class="col-md-12 col-sm-12 col-xs-12 -top-20px">
                <div class="box_panel" style="margin-bottom: 30px;">
                 
               
                 
                <div class="box_content">

                 
                 <div class="form-horizontal">
                     

                              <div class="form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" for="email">Purchase number</label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  name="po_number"  class="form-control col-md-7 col-xs-12 po_number" style="height: 30px; border-radius: 3px;" value="<?php if(isset($_GET['saleorder'] )){ echo $order_id; }?>">

                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" for="email">Saler Order</label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="input-group">
                         
                          <input type="text"  name="amount"  class="form-control col-md-7 col-xs-12 total-sale" style="height: 30px; border-radius-right: 3px; text-align: left;" readonly="" value="<?php if(isset($_GET['saleorder'])){ echo $order_id; }?>">
                          <span class="input-group-addon getorders"><i class="fa fa-search"></i></span>
                          </div>

                        </div>
                      </div>

                          <div class="form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" for="email">Date Invoice</label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                          
                            <input type="date"  name="date"  class="form-control col-md-7 col-xs-12 datePicker" style="height: 30px; border-radius: 3px;">


                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" for="email">Tax Scheme</label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                          
                          <select name="taxable" class="form-control col-md-7 col-xs-12 taxable" style="height: 30px; border-radius: 3px;">
                          <option value="0">No tax</option>


 <?php
    $tax = "Tax";
    $sql = "SELECT * FROM settings WHERE setting_name LIKE '%$tax%' ";
    $req = mysqli_query($connect,$sql);

     while ($row = mysqli_fetch_array($req)) {
       echo "<option value='".$row['value']."'>".$row['setting_name']." </option>";

    }


?>



                          </select>

                        </div>
                      </div>
          
                    
              </div>
              
              
            
             
                </div>
               
                </div>
           

            </div>



                <div class="col-md-12 col-sm-12 col-xs-12 -top-20px">
                <div class="box_panel">
                 
               
                 
                <div class="box_content">
  <div class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" for="email">Quantity</label>

                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  name="quantity"  class="form-control col-md-7 col-xs-12 quantity" style="height: 30px; border-radius: 3px; text-align: right" readonly="" value="<?php if(isset($_GET['saleorder'])){ echo $quantity; }?>">

                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" for="email">Subtotal</label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <div class="input-group">
                         <span class="input-group-addon">₱</span>
                          <input type="text"  name="subtotal"  class="form-control col-md-7 col-xs-12 subtotal" style="height: 30px; border-radius-right: 3px; text-align: right" readonly="" value="<?php if(isset($_GET['saleorder'])){ echo $amount; }?>">
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" for="email">Tax</label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="input-group">
                          <span class="input-group-addon">₱</span>
                          <input type="text" name="tax" class="form-control tax" style="height: 30px; text-align: right;" value="0" >
                          
                          </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" for="email">Discount</label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="input-group">
                         <span class="input-group-addon">%</span>
                          <input type="text" name="discount" class="form-control discount" style="height: 30px; text-align: right;" placeholder="0" >
                           
                          
                          </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" for="email">Total Amount</label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="input-group">
                         <span class="input-group-addon">₱</span>
                          <input type="text"  name="amount"  class="form-control col-md-7 col-xs-12 total-sale" style="height: 30px; border-radius-right: 3px; text-align: right" readonly="" value="<?php if(isset($_GET['saleorder'])){ echo $amount; }?>">
                          </div>

                        </div>
                      </div>


              


  </div>

                


              <div class="form-group pull-right" style="margin-right: 22px; margin-top: 10px;">
                    
                         <div class="col-md-6 col-sm-10 col-xs-12">
                          <input type="submit"  name="submit" class="btn btn-info">
                        </div>

              </div>
             
                </div>
               
                </div>
           

            </div>



              

            </div>



         
            </div>


            <!--pricing-->


         


     <div class="modal fade docs-cropped" id="error" aria-hidden="true"  role="dialog" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title" id="getCroppedCanvasTitle">Error</h4>
                            </div>
                            <div class="modal-body" id="edit-content">
                            <label style="display: block; text-align: center;">Customer is empty!</label>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
 
                            </div>
                      
                          </div>
                        </div>
                      </div><!-- /.modal -->

                        <div class="modal fade docs-cropped" id="lstorders" aria-hidden="true"  role="dialog" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title" id="getCroppedCanvasTitle">Sale Orders</h4>
                            </div>
                            <div class="modal-body" id="edit-content">
                                
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th>Order number</th>
                                      <th>Customer</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody class="lstorders">
                                   
                                  </tbody>
                                </table>

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
 
                            </div>
                      
                          </div>
                        </div>
                      </div><!-- /.modal -->


            </form>


