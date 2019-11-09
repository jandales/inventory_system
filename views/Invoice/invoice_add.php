

            </div>

               <div class="clearfix"></div>

            <div class="row">
            <form  method="post" action="" id="add_order"  enctype="multipart/form-data">
              <div class="col-md-8 col-sm-8 col-xs-12">
             
                <div class="form_panel" style="margin-top:10px;">
                  <div class="form_title">
         
            <div class="col-md-12">
                  <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1"><i class="fa fa-cart-plus"></i></span>
                      <input type="text" name="barcode_id" class="form-control barcode" id="barcode" placeholder="Select  Customer First!" readonly="">
                  </div>  

            </div>


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
                             <th colspan="6" style="text-align: center; color:#5cb85c; font-size: 20px;">No Item Added</th>
                           </tr>
                    
                      </tbody>
                 
                    </table> 

                  </div>

                </div>

        
              </div>

     

                 <div class="col-md-4 col-sm-4 col-xs-12 ">
               <div class="col-md-12 col-sm-12 col-xs-12 ">
                <div class="form_panel" style="margin-top:10px;">
                  <div class="form_title">
               <h3>Customer</h3>

<div class="form-inline">

<div class="form-group pull-right">

<label style="font-size: 16px;">0001</label>


</div>

</div><!-- /.form -->

                    <div class="clearfix"></div>
                  </div>
                  <div class="form_content" style="padding-bottom: 20px;">
                      <div class="col-md-12">
                          <div class="input-group select_hiiden">
                          <span class="input-group-addon span_hide" id="basic-addon1"><i class="fa fa-user"></i></span>
                          <select class="form-control no-content customer_id" name="customer_name" id="customer_id">
                          <option></option>
                           

                          </select>
                         
                          </div>
                      </div>

                        <div class="form-horizontal" id="customerinfo">


                        </div>

                    <div class="form-horizontal change_customer" >

                                <a class="btn btn-default">Change supplier</a>
                     </div>

                </div>
              </div>


            </div>

     
            <!--purchase info-->
          <div class="col-md-12 col-sm-12 col-xs-12 ">
                <div class="form_panel -top-20px">
                  <div class="form_title">
               <h3>Purchase Info</h3>
  
                    <div class="clearfix"></div>
                  </div>
                  <div class="form_content" style="padding-bottom: 20px;">
                    
                    <div class="form-horizontal">

                    <!--purchase order-->

                    <!--       <div class="form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" for="email">Purchase Number</label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  name="po_number"  class="form-control col-md-7 col-xs-12 po_number" style="height: 30px; border-radius: 3px;">

                        </div>
                      </div> -->

                             <div  class="form-group get_PO">
                                <label class="control-label col-md-6 col-sm-6 col-xs-12" for="email" >Purchase Order</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <div class="input-group">
                                  
                                  <input type="text" name="tax" class="form-control get_PO" style="height: 30px;">
                                  <a class="input-group-addon get_PO">Get</a>

                                  </div>
                                </div>
                            </div>
                    
                      <!--/purchase order-->

                      <!--tax-->

                        <div class="form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" for="email">Tax Scheme</label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                          
                          <select name="tax_scheme" class="form-control col-md-7 col-xs-12 taxable" style="height: 30px; border-radius: 3px;">
                          <option value="0">No tax</option>



                          </select>

                        </div>
                      </div>

                      <!--/tax-->

                      <!--terms-->

                                             <div class="form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" for="email">Payment Terms</label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                          
                          <select name="terms" class="form-control col-md-7 col-xs-12 taxable" style="height: 30px; border-radius: 3px;">
                          <option value="0">Due to reciept</option>



                          </select>

                        </div>
                      </div>

                    
                      <!--/terms-->

                    <!-- date order -->
                       <div class="form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" for="email">Date Order</label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                          
                            <input type="date"  name="dateorder"  class="form-control col-md-7 col-xs-12 datePicker" style="height: 30px; border-radius: 3px;">
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
                                <input type="text"  name="quantity"  class="form-control col-md-7 col-xs-12 quantity" style="height: 30px; border-radius: 3px; text-align: right" readonly="">

                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-6 col-sm-6 col-xs-12" for="email">Subtotal</label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <div class="input-group">
                                  <span class="input-group-addon">₱</span>
                                  <input type="text"  name="sub-cost"  class="form-control col-md-7 col-xs-12 sub-cost" style="height: 30px; border-radius-right: 3px; text-align: right" readonly="">
                                  </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-6 col-sm-6 col-xs-12" for="email">TAX</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <div class="input-group">
                                  <span class="input-group-addon">₱</span>
                                  <input type="text" name="tax" class="form-control tax" style="height: 30px; text-align: right;" value="0" readonly="">

                                  </div>
                                </div>
                            </div>

                             <div class="form-group">
                                <label class="control-label col-md-6 col-sm-6 col-xs-12" for="email">VAT</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <div class="input-group">
                                  <span class="input-group-addon">₱</span>
                                  <input type="text" name="vat" class="form-control vat" style="height: 30px; text-align: right;" value="0" readonly="" >

                                  </div>
                                </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-6 col-sm-6 col-xs-12" for="email">Discount</label>

                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="input-group">
                                <span class="input-group-addon">%</span>
                                <input type="text" name="discount" class="form-control discount" style="height: 30px; text-align: right;" value ="0" >
                                </div>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-6 col-sm-6 col-xs-12" for="email">VATable Sale</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="input-group">
                                <span class="input-group-addon">₱</span>
                              <input type="text"  name="vat_sale"  class="form-control col-md-7 col-xs-12 vatable_sale" style="height: 30px; border-radius-right: 3px; text-align: right" readonly="">
                                </div>

                                </div>
                          </div>





                          <div class="form-group">
                              <label class="control-label col-md-6 col-sm-6 col-xs-12" for="email">Total Amount Due</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="input-group">
                                <span class="input-group-addon">₱</span>
                                <input type="text"  name="amount"  class="form-control col-md-7 col-xs-12 total-cost" style="height: 30px; border-radius-right: 3px; text-align: right" readonly="">
                                </div>

                                </div>
                          </div>

                 <div class="form-group pull-right">
                               <!-- <input type="submit" name="submit" class="btn btn-info" style="height: 30px;" value="Recieve"> -->
                               <a id="create_order" class="btn btn-info btn-order" style="height: 30px;" d>Create</a>
                               <input type="submit" class="btn btn-danger" style="height: 30px;" value="Cancel">  
                            </div>

                    </div> <!-- form-horsontal-->     

                </div>

          
                </div>
            </div>

               <!-- /purchase info-->


            </div>
     
            </div>
            </form>


<!--pricing-->

 <div class="form-horizontal" method="post" action="" id="form1" runat="server" enctype="multipart/form-data">
                      <div class="modal fade docs-cropped" id="Get_ORDER" aria-hidden="true"  role="dialog" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title" id="getCroppedCanvasTitle">Select Sale Order</h4>
                            </div>
                            <div class="modal-body order_list">

                              
                            
              

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            
                            </div>
                          
                          </div>
                        </div>
                      </div><!-- /.modal -->

 </div>
