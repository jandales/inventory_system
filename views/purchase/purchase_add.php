<?php
 $date = date('m-d-y');
 $id_name ="PO";
 $suppliers_id = "";
 $max_id ="";
 $query = "SELECT * FROM purchase_order";
 $result = mysqli_query($connect, $query);
 $count =mysqli_num_rows($result);


                    
             
if($count == null){
   $po_id = $id_name . "001";
}else{
  $max_id =  $count + 1;
  $po_id = $id_name ."00". $max_id;

}


if(isset($_POST['cancel'])){
  header("Location: Purchaseorder.php");
}
?>



            </div>

               <div class="clearfix"></div>

            <div class="row top-20px">
            <form name="form" id="form" action="" method="post">
              <div class="col-md-12 col-sm-12 col-xs-12">

              <div class="panel-form">
              
                <div class="panel-form-heading">
       
                     <select class="form-control select-md col-md-2 sup_id get_id" name="supplier" id="supplier_id">
                    <option>Select Supplier</option>
                     <?php
                            $query = "SELECT * FROM suppliers WHERE status = 'active' ";
                            $result = mysqli_query($connect, $query);

                            while($sup_db = mysqli_fetch_assoc($result)){
                           
                                $id= $sup_db['supplier_id'];
                                $campany = $sup_db['campany'];
                                echo  "<option value='$id'>$campany</option>";
                            }


                       
                               $query = "SELECT * FROM suppliers WHERE supplier_id = 'SU-001' ";
                              $query_result = mysqli_query($connect, $query);
                              $count = mysqli_num_rows($query_result);

                              ?>


                               <?php 

                              while($db = mysqli_fetch_assoc($query_result))

                              {

                              $id = $db['id'];
                              $campany_name = $db['campany'];
                              $email = $db['email'];
                              $phone = $db['phone'];

                              }

                           

                           ?>
                  </select>

              


                  <div class="pull-right">
                  <label class="label-PO" name="PO_">#<?php echo  $po_id ?></label>
                  </div>
                  <div class="clearfix"></div>


               </div>
                 <div class="clearfix"></div>

                 <div class="panel-form-label">
                 <label  class="control-label">Select supplier</label>
                 </div>

               <div class="panel-form-content">
                <section  class ="col-md-8 col-sm-6 col-xs-12">
                <div class="form-horizontal" id="supplier_info">


               </div>

                </section>
                 <section  class = "col-md-4 col-sm-6 col-xs-12">
                 <div class="form-horizontal">
                     

                       <div class="form-group">
                        <label class="control-label col-md-4 col-sm-6 col-xs-12" for="email">Issue Date</label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date"  name="date_issue"  class="form-control col-md-7 col-xs-12 datePicker" style="height: 30px; border-radius: 3px;">

                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-6 col-xs-12" for="email">Due Date</label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date"  name="due_date"  class="form-control col-md-7 col-xs-12 datePicker" style="height: 30px; border-radius: 3px;">

                        </div>
                      </div>





               </div>
               </section>
               </br>

<div class="form-table-q">
<div class="row1 row-line" style="display:flex; width: 100%; background: #EEEEEE; padding: 3px;">



<div style="width: 25%; margin-left: 5%; margin-top:4px;">
<label>Item name</label>
</div>
<div style="width: 20%;  margin-left: 1%; margin-top:4px;">
<label>Description</label>
</div>
<div style="width: 10%;  margin-left: 1%; margin-top:4px;">
<label>Quantity</label>
</div>
<div style="width: 10%;  margin-left: 1%; margin-top:4px;">
<label>Price</label>
</div>
<div style="width: 10%;  margin-left: 1%; margin-top:4px;">
<label>Discount</label>
</div>
<div style="width: 10%;  margin-left: 1%; margin-top:4px;">
<label>Sub-Total</label>
</div>

</div>



<div class="row1  " id="field" style="width: 100%;">
 
   
  
</div>
 </div>



<div class="clearfix"></div>



                                   <a id="additem" class="add-btn"><i class="fa fa-plus"></i> Add another item</a>
                         
             
                      
                   
             


               </div>


                <div class="panel-form-footer">

               
            

     

           

              
                  <section class="col-md-3 col-sm-3 col-xs-12 pull-right" style="margin-bottom: 20px;">
                    <table class="table-list">

                       <tr>
                        <th>Quantity:</th>
                        <th><input type="text" name="total_quantity" class="total_quantity" style="height: 25px; border:0;" readonly="readonly" placeholder="0"></th>
                      </tr>

                       <tr>
                        <th>Item count:</th>
                        <th><input type="text" name="itemunit" class="itemunit" style="height: 25px; border:0;" readonly="readonly" placeholder="0"></th>
                      </tr>

                     
                    
                     
                      <tr>
                        <th>Discount:</th>
                        <th><input type="text" name="total_discount" class="total_discount" style="height: 25px; border:0;" readonly="readonly" placeholder="0 %"></th>
                      </tr>

                    

                        <tr>
                        <th>Total Cost:</th>
                        <th><input type="text" name="amount" class="total-amount" style="height: 25px; border:0;" readonly="readonly" placeholder="Php 0.00"></th>
                      </tr>
                     

                    </table>
                    
                  </section>


                 <section class="col-md-7 col-sm-7 col-xs-12">
                      <div class="form-group">
                      <label class="control-label col-md-2" style="font-size: 12px;">Remark : </label>
                      <div class="col-md-6  col-sm-6 col-xs-12">
                     <textarea class="form-control" name="remark"></textarea>
                      </div>
                      </div>
                </section>

                <div class="clearfix"></div>
                <section class="pull-right">
                  <div class="form-group">
                    <input type="submit" name="submit" id="submit" class="btn btn-info">
                    <input type="submit" name="cancel" id="cancel" class="btn btn-danger" value="Cancel">
                  </div>
                </section>
                







             </div>

          

              </div><!--panel-->


          
            </form>

</div>
</div>

<!--pricing-->



             