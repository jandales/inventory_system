
<?php
 

 if(isset($_GET['po_id'])){
     $po_id = $_GET['po_id'];

     $query = "SELECT * FROM recievings WHERE po_id = '{$po_id}' ";
     $query_result = mysqli_query($connect, $query);
  while($db = mysqli_fetch_assoc($query_result)){
        $supplier = $db['supplier_id'];
        $invoice_number = $db['invoice'];
        $invoice_date= $db['invoice_date'];
        $receiving_date = $db['receiving_date'];
        $amount = $db['amount'];
        $status = $db['status'];
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
         
               <h3>Recieve Order</h3>

                  <div class="form-inline">

<div class="form-group pull-right">

 <label class="control-label"><?php echo $po_id ?></label>

                   
</div>
              
</div><!-- /.form -->


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
                         <tbody>

                         <?php
if(isset($_GET['po_id']))
{
$po_id = $_GET['po_id'];
$query = "SELECT * FROM receiving_items WHERE po_id = '{$po_id}' ";
$query_result = mysqli_query($connect, $query);

 while($db = mysqli_fetch_assoc($query_result)){

  $quantity = $db['total_quantity'];
  $discount = $db['total_discount'];
  $subtotal = $db['sub_cost'];

  $item = $db['item_name'];

$query1 = "SELECT * FROM products WHERE item_id = '{$item}' ";
$query_result1 = mysqli_query($connect, $query1);

 while($db1 = mysqli_fetch_assoc($query_result1)){
  $itemname = $db1['item_name'];
  $item_id = $db1['item_id'];
 }

  echo '<tr>';
  echo '<th><input type="text" name="item[]" class="form-control field_txt" value="'.$itemname.'" readonly ></th>';
  echo '<th><input type="number" name="qty[]" class="form-control field_txt qty" value="'.$db['quantity'].'" readonly ></th>';
  echo '<th><input type="text" name="disc[]" class="form-control field_txt disc" value="'.$db['disc'].'" readonly ></th>';
  echo '<th><input type="number" name="price[]" class="form-control field_txt prices" value="'.$db['unit_price'].'" readonly></th>';
  echo '<th><input type="text" name="total[]" class="form-control  field_txt total" readonly="" value="'.$db['subtotal'].'" readonly></th>';
  echo "<th><a id=".$db['id']." class='delete_item li' ><i class='fa fa-eraser'></i></a></th>";
  echo '</tr>';

   


  }
}

                        
                      
 
?>
                    
                      </tbody>
                      <tfoot>
                      
                
                      </tfoot>
                    
                    </table>



                  

                  </div>
                </div>


        
              </div>

     

                 <div class="col-md-4 col-sm-4 col-xs-12">
            
                <div class="form_panel">
                  <div class="form_title">
               <h3>Supplier</h3>


                    <div class="clearfix"></div>
                  </div>
                  <div class="form_content">
                      <div class="col-md-12">

                             <?php

                            $output ="";

                            $query = "SELECT * FROM suppliers WHERE supplier_id = '{$supplier}' ";
                            $query_result = mysqli_query($connect, $query);
                            $count = mysqli_num_rows($query_result);

                            while($db = mysqli_fetch_assoc($query_result))

                            {
                            $output .= '<img src="app/images/avatar/'.$db['avatar'].'" width="40x"  height="40px"  class="suppliers_img">';
                            $output .= "<div class='suppliers_div'>";
                            $output .= "<ul class='suppliers_span'>";
                            $output .= "<li name='name'>".$db['fname']." ". $db['lname']. "</li>";
                            $output .= "<li>".$db['email'] . "</li>";
                            $output .= "</ul>";    
                            $output .= "</div>";

                            }  
                            echo $output;

                            ?>
                      </div>
                         
                             

                </div>

             


              </div>


           


         
                <div class="form_panel">
                  <div class="form_title">
               <h3>Recieving Info</h3>


                    <div class="clearfix"></div>
                  </div>
                  <div class="form_content">
                      <div class="col-md-12">

                          <div class="input-group">
                
                          <label class="control-label col-md-5 col-sm-5">Invoice #</label>
                          <div class="col-md-7 col-sm-7 col-xs-12">
                            <input type="text" name="invoice_number" class="form-control" style="height: 30px;" value="<?Php echo $invoice_number; ?>" readonly >
                          </div>

                         
                          </div>

                          <div class="input-group">
                         
                          <label class="control-label col-md-5 col-sm-5">Invoice Date</label>
                          <div class="col-md-7 col-sm-7 col-xs-12">
                            <input type="text" name="invoice_date" class="form-control " style="height: 30px;"  value="<?Php echo $invoice_date; ?>" readonly>
                          </div>
                         
                          </div>

                           <div class="input-group">
                         
                          <label class="control-label col-md-5 col-sm-5">Recieve Date</label>
                          <div class="col-md-7 col-sm-7 col-xs-12">
                            <input type="text" name="recieve_date" class="form-control" style="height: 30px;"  value="<?Php echo $receiving_date; ?>" readonly>
                          </div>
                         
                          </div>

                    




                      </div>
                         
                           

                            

                </div>

             


              </div>


   


                
                <div class="form_panel -top-20px">
                  <div class="form_title">
               <h3>Payment Info</h3>


                    <div class="clearfix"></div>
                  </div>
                  <div class="form_content" style="padding-bottom: 20px;">
                      <div class="col-md-12">

                          <div class="input-group">
                         
                          <label class="control-label col-md-5 col-sm-5">Quantity</label>
                          <div class="col-md-7 col-sm-7 col-xs-12">
                            <input type="text" name="quantity" class="form-control quantity" style="height: 30px;" readonly="" value="<?php echo $quantity; ?>">
                          </div>

                         
                          </div>

                          <div class="input-group">
                         
                          <label class="control-label col-md-5 col-sm-5">Subtotal</label>
                          <div class="col-md-7 col-sm-7 col-xs-12">
                              <div class="input-group">
                                <span class="input-group-addon">₱</span>
                             <input type="text" name="subtotal" class="form-control sub-cost" style="height: 30px;" readonly="" value="<?php echo $subtotal; ?>">
                          </div>
                          </div>
                          </div>

                           <div class="input-group">
                         
                          <label class="control-label col-md-5 col-sm-5">Discount</label>
                          <div class="col-md-7 col-sm-7 col-xs-12">
                             <div class="input-group">
                         
                          <input type="text" name="discount" class="form-control discount" style="height: 30px; text-align: right;" placeholder="0" value="<?php echo $discount; ?>" >
                          <span class="input-group-addon">%</span>
                           
                          
                          </div>
                          </div>
                         
                          </div>


                         
                     

                            <div class="input-group">
                         
                          <label class="control-label col-md-5 col-sm-5">Total cost</label>
                          <div class="col-md-7 col-sm-7 col-xs-12">
                           <div class="input-group">
                              <span class="input-group-addon">₱</span>
                              <input type="text" name="total-cost" class="form-control total-cost" style="height: 30px;" readonly="" value="<?php echo $amount; ?>">
                          </div>
                         </div>
                          </div>

      

                      </div>
                         
                           

                            

         

             


              </div>


            </div>



            </div>
            </form>

</div>
<!--pricing-->





