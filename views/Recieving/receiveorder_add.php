<?php
 $id_name ="PO";
 $suppliers_id = "";
 $max_id ="";
 $query = "SELECT * FROM recievings";
 $result = mysqli_query($connect, $query);
 $count =mysqli_num_rows($result);


if($count == null)
{
   $po_id = $id_name . "-001";
}else
{
  $max_id =  $count + 1;
  $po_id = $id_name ."-00". $max_id;

}


?>


            </div>

               <div class="clearfix"></div>

            <div class="row">
            <form  method="post" action="" id="form_recieve"  enctype="multipart/form-data">
              <div class="col-md-8 col-sm-8 col-xs-12">
             
                <div class="form_panel">
                  <div class="form_title">
         
<div class="col-md-12">
     <div class="input-group">
  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-cart-plus"></i></span>
  <input type="text" name="barcode_id" class="form-control barcode" id="barcode" placeholder="Select supplier First" readonly="">
 
</div>  

</div>





               

<!-- 
                <div class="form-inline">

                <div class="col-md-8">
                       <div class="input-group">
                         
                          <span class="input-group-addon"  ><i class="fa fa-cart-plus"></i></span>
                        
                            <input type="text" name="itemcode" class="form-control">
                       
                          

                         </div> 
                </div>
                
  <div class="col-md-2">
                <div class="form-group ">
                <div class="input-group">
                
                <input type="text" class="form-control"  placeholder="Quantity">
              
                </div>
                </div>
  </div>

  <div class="col-md-2">
                 <div class="form-group ">
                <div class="input-group">
                
                <input type="text" class="form-control"  placeholder="discount">
              
                </div>
                </div>

                </div>
 </div>
 -->
                         



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





                         <tr class="no-item">
                             <th class="no-item" colspan="6" style="text-align: center; color:#5cb85c; font-size: 20px;">No item recieve</th>
                           </tr>





<!-- 
                           <tr>
     <th  class="center">'.$db['item_name'] .'</th>
      <th width="15%;" class="center"><input class="form-control field_txt qty1"  value="1"></th>
      <th width="15%;" class="center"><input class="form-control field_txt" ></th>
      <th width="18%;" class="center">'.$db['price'].'</th>
      <th width="18%;" class="center">Total</th>
    <th><a><i class="fa fa-gavel" aria-hidden="true"></i></a></th>
      </tr> -->

                        
                       

                    
                      </tbody>
                     
                    
                    </table>



                  

                  </div>
                </div>


        
              </div>

     

                 <div class="col-md-4 col-sm-4 col-xs-12 ">
               <div class="col-md-12 col-sm-12 col-xs-12 ">
                <div class="form_panel">
                  <div class="form_title">
               <h3>Supplier</h3>

                                 <div class="form-inline">

<div class="form-group pull-right">

 <label><?php echo $po_id ?></label>

                   
</div>
              
</div><!-- /.form -->
                    <div class="clearfix"></div>
                  </div>
                  <div class="form_content" style="padding-bottom: 20px;">
                      <div class="col-md-12">

                          <div class="input-group select_hiiden">
                         
                          <span class="input-group-addon span_hide"  ><i class="fa fa-user"></i></span>
                          <select class="form-control no-content get_id" name="supplier" id="supplier_id">
                          <option></option>
                            <?php

                             $query = "SELECT * FROM suppliers WHERE status = 'active' ";
                             $result = mysqli_query($connect, $query);

                            while($sup_db = mysqli_fetch_assoc($result)){
                           
                                $id= $sup_db['supplier_id'];
                                $campany = $sup_db['campany'];
                                echo  "<option value='$id'>$campany</option>";
                            }

  
                          ?>

                          </select>


                         
                          </div>


                      </div>
                         
                             <div class="form-horizontal" id="supplier_info">


                            </div>

                             <div class="form-horizontal change" >

                                <a class="btn btn-default">Change supplier</a>
                            </div>

                </div>

             


              </div>


            </div>


              <div class="col-md-12 col-sm-12 col-xs-12 ">
                <div class="form_panel -top-20px">
                  <div class="form_title">
               <h3>Recieving Info</h3>


                    <div class="clearfix"></div>
                  </div>
                  <div class="form_content" style="padding-bottom: 20px;">
                      <div class="col-md-12">

                          <div class="input-group">
                         
                          <label class="control-label col-md-5 col-sm-5">Invoice #</label>
                          <div class="col-md-7 col-sm-7 col-xs-12">
                            <input type="text" name="invoice_number" id="invoice_number" class="form-control invoice_number" style="height: 30px;">
                          </div>

                         
                          </div>

                          <div class="input-group">
                         
                          <label class="control-label col-md-5 col-sm-5">Invoice Date</label>
                          <div class="col-md-7 col-sm-7 col-xs-12">
                            <input type="date" name="invoice_date" class="form-control datePicker" style="height: 30px;">
                          </div>
                         
                          </div>

                           <div class="input-group">
                         
                          <label class="control-label col-md-5 col-sm-5">Recieve Date</label>
                          <div class="col-md-7 col-sm-7 col-xs-12">
                            <input type="date" name="recieve_date" class="form-control datePicker" style="height: 30px;">
                          </div>
                         
                          </div>

                    




                      </div>
                         
                           

                            

                </div>

             


              </div>


            </div>


                     <div class="col-md-12 col-sm-12 col-xs-12 ">
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
                            <input type="text" name="quantity" class="form-control quantity" style="height: 30px;" readonly="">
                          </div>

                         
                          </div>

                          <div class="input-group">
                         
                          <label class="control-label col-md-5 col-sm-5">Subtotal</label>
                          <div class="col-md-7 col-sm-7 col-xs-12">
                              <div class="input-group">
                                <span class="input-group-addon">₱</span>
                             <input type="text" name="subtotal_cost" class="form-control sub-cost" style="height: 30px;" readonly="">
                          </div>
                          </div>
                          </div>

                           <div class="input-group">
                         
                          <label class="control-label col-md-5 col-sm-5">Discount</label>
                          <div class="col-md-7 col-sm-7 col-xs-12">
                             <div class="input-group">
                         
                          <input type="text" name="discount" class="form-control discount" style="height: 30px; text-align: right;" placeholder="0" >
                          <span class="input-group-addon">%</span>
                           
                          
                          </div>
                          </div>
                         
                          </div>


                         
                     

                            <div class="input-group">
                         
                          <label class="control-label col-md-5 col-sm-5">Total cost</label>
                          <div class="col-md-7 col-sm-7 col-xs-12">
                           <div class="input-group">
                              <span class="input-group-addon">₱</span>
                              <input type="text" name="total-cost" class="form-control total-cost" style="height: 30px;" readonly="">
                          </div>
                         </div>
                          </div>

                           
                             <div class="form-group pull-right">
                               <!-- <input type="submit" name="submit" class="btn btn-info" style="height: 30px;" value="Recieve"> -->
                               <a id="insert_recieve" class="btn btn-info" style="height: 30px;">Submit</a>
                               <input type="submit" class="btn btn-danger" style="height: 30px;" value="Cancel">  
                            </div>

                    




                      </div>
                         
                           

                            

                </div>

             


              </div>


            </div>








            </div>
            </form>

</div>
<!--pricing-->



<?php




if(isset($_POST['submit']))
{
  

insert_recieve();

}



?>             


 <div class="modal fade docs-cropped" id="alert_error" aria-hidden="true"  role="dialog" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title" id="getCroppedCanvasTitle">Error</h4>
                            </div>
                            <div class="modal-body" id="alert_content">
                            
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
 
                            </div>
                      
                          </div>
                        </div>
                      </div><!-- /.modal -->




