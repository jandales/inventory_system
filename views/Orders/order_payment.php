<?php


                            if(isset($_GET['id'])){

                              $id = $_GET['id'];

                              $query = "SELECT * FROM sale_orders WHERE order_id = '{$id}' ";
                              $result = mysqli_query($connect, $query);
                              while($db = mysqli_fetch_assoc($result)){

                              $qty = $db['quantity'];
                              $amount = $db['amount'];
                              $subtotal = $db['subtotal'];
                              $customer_id = $db['customer'];
                              $po_number = $db['po_number'];
                              $date_order = $db['date_order'];
                              $tax_scheme =$db['tax_scheme'];
                              $terms =$db['terms'];
                              $discount = $db['discount'];
                              $quantity = $db['quantity'];
                              $vat = $db['vat'];
                              $vatsale = $db['vat_sale'];
                              $tax = $db['taxable'];
                              // $vat_sale = $db[''];

                              $query1 = query("SELECT * FROM settings WHERE value = '{$tax_scheme}' ");
                              while ($x = fetch_array($query1)) 
                              {
                                $tax_scheme1 =$x['setting_name'];
                              }
                           
                              $query1 = query("SELECT * FROM settings WHERE value = '{$terms}' ");
                              while ($x = fetch_array($query1)) 
                              {
                                $termname =$x['setting_name'];
                              }
                     
                              }
                            }








?>

            </div>

               <div class="clearfix"></div>

            <div class="row">
            <form  method="post" action="" id="form1"  enctype="multipart/form-data">
              <div class="col-md-8 col-sm-8 col-xs-12">
             
                <div class="form_panel" style="margin-top: 10px;">
                  <div class="form_title">
         
               <h3>Payment for <span><?php echo $id ?></span></h3>


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


                              $query = "SELECT * FROM sale_items WHERE order_id = '{$id}' AND type = 'OR' ";
                              $result = mysqli_query($connect, $query);
                              while($db = mysqli_fetch_assoc($result)){

                              $item = $db['item'];
                              $query_item = "SELECT * FROM products WHERE item_id = '{$item}' ";
                              $result_item = mysqli_query($connect, $query_item);
                              while($db1 = mysqli_fetch_assoc($result_item)){
                              $itemname = $db1['item_name'];
                              }

                              echo "<tr>";  
                              echo '<th  class="center"><select  class="form-control itemname txtselect" name="item[]"><option value="">'.$itemname.'</option></select></th>';
                              echo '<th width="15%;" class="center"><input class="form-control field_txt qty" name="qty[]" value="'.$db['quantity'].'"></th>';
                              echo '<th width="15%;" class="center"><input class="form-control field_txt disc" name="disc[]" value="'.$db['disc'].'"></th>';
                              echo '<th width="18%;" class="center"><input class="form-control field_txt prices" name="price[]" value="'.$db['price'].'" readonly></th>';
                              echo '<th width="18%;" class="center"><input class="form-control field_txt subtotal" name="subtotal[]" value="'.$db['subtotal'].'" readonly></th>';
                              echo '<th><a  class="remove"><i class="fa fa-gavel" aria-hidden="true"></i></a></th>';

                              echo "</tr>";                           
                              }

                              ?>                     
                      </tbody>
                     
                    
                    </table>


                  </div>

                </div>

        
              </div>

     

                 <div class="col-md-4 col-sm-4 col-xs-12 ">
               <div class="col-md-12 col-sm-12 col-xs-12 ">
                <div class="form_panel" style="margin-top: 10px;">
                  <div class="form_title">
               <h3>Customer</h3>


                    <div class="clearfix"></div>
                  </div>
                  <div class="form_content" style="padding-bottom: 20px;">
                      <div class="col-md-12">
                          
                            <?php

                            $output ="";

                            $query = "SELECT * FROM customers WHERE customer_id = '{$customer_id}' ";
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

                        <div class="form-horizontal" id="customerinfo">


                        </div>

                    <div class="form-horizontal change_customer" >

                                <a class="btn btn-default">Change supplier</a>
                     </div>

                </div>
              </div>


            </div>

          <div class="col-md-12 col-sm-12 col-xs-12 ">
                <div class="form_panel -top-20px">
                  <div class="form_title">
               <h3>Purchase Info</h3>
  
                    <div class="clearfix"></div>
                  </div>
                  <div class="form_content" style="padding-bottom: 20px;">
                    
                    <div class="form-horizontal">

                    <!--purchase order-->

                          <div class="form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" for="email">Purchase Number</label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  name="po_number"  class="form-control col-md-7 col-xs-12 po_number" style="height: 30px; border-radius: 3px;" readonly="" value="<?php echo $po_number ?>"> 

                        </div>
                      </div>
                    
                      <!--/purchase order-->

                      <!--tax-->

                      <div class="form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" for="email">Tax Scheme</label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                          
                          <input type="text"  name="tax_scheme"  class="form-control col-md-7 col-xs-12 tax_scheme" style="height: 30px; border-radius: 3px;" readonly="" value="<?php echo $tax_scheme1 ?>"> 

                        </div>
                      </div>

                      <!--/tax-->

                      <!--terms-->

                                             <div class="form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" for="email">Payment Terms</label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                          
                          <input type="text"  name="tax_scheme"  class="form-control col-md-7 col-xs-12 tax_scheme" style="height: 30px; border-radius: 3px;" readonly="" value="<?php echo $termname ?>"> 


                        </div>
                      </div>

                    
                      <!--/terms-->

                    <!-- date order -->
                       <div class="form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" for="email">Date Order</label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                          
                            <input type="input"  name="dateorder"  class="form-control col-md-7 col-xs-12 datePicker" style="height: 30px; border-radius: 3px;" value="<?php echo $dateorder; ?> " readonly>
                        </div>
                      </div>
                      <!-- end date order -->

                      </div> <!-- form-horsontal-->     

                </div>

          
                </div>
            </div>

               <!-- /purchase info-->



        
                    <!--purchase order-->
                        <div class="col-md-12 col-sm-12 col-xs-12 ">
                <div class="form_panel -top-20px">
                  <div class="form_title">
               <h3>Payment info</h3>
  
                    <div class="clearfix"></div>
                  </div>
                  <div class="form_content" style="padding-bottom: 20px;">
                    
                    <div class="form-horizontal">

                            <div class="form-group">
                                  <label class="control-label col-md-6 col-sm-6 col-xs-12" for="email">Quantity</label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text"  name="quantity"  class="form-control col-md-7 col-xs-12 quantity" style="height: 30px; border-radius: 3px; text-align: right" readonly="" value="<?php echo $quantity ?>">

                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-6 col-sm-6 col-xs-12" for="email">Subtotal</label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <div class="input-group">
                                  <span class="input-group-addon">₱</span>
                                  <input type="text"  name="sub-cost"  class="form-control col-md-7 col-xs-12 sub-cost" style="height: 30px; border-radius-right: 3px; text-align: right" readonly="" value="<?php echo $subtotal ?>">
                                  </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-6 col-sm-6 col-xs-12" for="email">TAX</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <div class="input-group">
                                  <span class="input-group-addon">₱</span>
                                  <input type="text" name="tax" class="form-control tax" style="height: 30px; text-align: right;" placeholder="0" >

                                  </div>
                                </div>
                            </div>

                             <div class="form-group">
                                <label class="control-label col-md-6 col-sm-6 col-xs-12" for="email">VAT</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <div class="input-group">
                                  <span class="input-group-addon">₱</span>
                                  <input type="text" name="vat" class="form-control vat" style="height: 30px; text-align: right;" readonly="" value="<?php echo $vat; ?>">

                                  </div>
                                </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-6 col-sm-6 col-xs-12" for="email">Discount</label>

                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="input-group">
                                <span class="input-group-addon">%</span>
                                <input type="text" name="discount" class="form-control discount" style="height: 30px; text-align: right;" value="<?php echo $discount ?>" readonly>
                                </div>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-6 col-sm-6 col-xs-12" for="email">VATable Sale</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="input-group">
                                <span class="input-group-addon">₱</span>
                              <input type="text"  name="vat_sale"  class="form-control col-md-7 col-xs-12 vatable_sale" style="height: 30px; border-radius-right: 3px; text-align: right" readonly="" value="<?php echo $vatsale ?>">
                                </div>

                                </div>
                          </div>


                          <div class="form-group">
                              <label class="control-label col-md-6 col-sm-6 col-xs-12" for="email">Total Amount Due</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="input-group">
                                <span class="input-group-addon">₱</span>
                                <input type="text"  name="amount"  class="form-control col-md-7 col-xs-12 total-cost" style="height: 30px; border-radius-right: 3px; text-align: right" readonly="" value="<?php echo $amount ?>">
                                </div>

                                </div>
                          </div>

                     <div class="form-group pull-right">
                        
                               <a id="pay" class="btn btn-info btn-order" style="height: 30px;" >Pay</a>
                               <input type="submit" class="btn btn-danger" style="height: 30px;" value="Cancel">  
                            </div>

                    </div> <!-- form-horsontal-->     

                </div>

          
                </div>
            </div>


               <!-- /purchase info-->
</div>
            




  <div class="form-horizontal" method="post" action=""> 
             <div class="modal fade docs-cropped" id="payment" aria-hidden="true"  role="dialog" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content modal-content1">
                            <div class="modal-header pay-head ">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Enter Amount</h4>
                            </div>
                            <div class="modal-body">
<label style="margin-left: 10px;">Payment Method</label>
          <div class="form-group" style="margin-left: 10px;">

              <label class="checkbox-inline">
  <input type="checkbox" id="cash" value=""> Cash
</label>
<label class="checkbox-inline">
  <input type="checkbox" class="check" value=""> Check
</label>
          </div>


        <div class="form-group hidden check_number">
        <label class="control-label col-md-4" for="email">Enter Check Number</label>

        <div class="input-group col-md-6">
      
        <input type="text" name="discount" class="form-control discount" style="height: 30px;" value="<?php echo $discount ?>">
        </div>
        </div>

                                 <div class="form-group">

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="input-group">
                                <span class="input-group-addon" style="font-size: 18px; background: #DFF0D8;">Amount Due</span>
                                <input type="text"  name="amount"  class="form-control col-md-7 col-xs-12 total-cost" style="height: 50px; border-radius-right: 3px; font-size: 25px;"  value="<?php echo $amount ?>">
                                </div>

                                </div>
                          </div>
                            </div>
                            <div class="modal-footer">
                          
                              <button type="submit" name="update" class="btn btn-info">Submit</button>

                            </div>
                      
                          </div>
                        </div>
                      </div><!-- /.modal -->


                         </div>
     </form>

     <?php

$query = "SELECT * FROM payment";
$result = mysqli_query($connect, $query);
$count =mysqli_num_rows($result);


if($count == null)
{
$id =  "0001";
}
else
{
$max_id =  $count + 1;
$id ="000". $max_id;
}


$query_order =query("INSERT INTO sale_orders(refenrce_no,person_id,amount,date_payment,methodcheck_no,type) VALUES ("' $id '", "' $customer_id '", "' $customer_id '", "' $customer_id '", "' $customer_id '",");



     ?>

