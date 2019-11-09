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



          

<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">

              <div class="panel-form">
              
                <div class="panel-form-heading">
       
                     <select class="form-control select-md col-md-2 sup_id get_id" name="supplier" id="supplier_id">
                   
                  </select>

          
                  <div class="pull-right">
                  <label style="font-weight: normal;" class="label-PO" name="PO_">Order #: <?php echo  $po_id ?></label>
                  </div>

                  <div class="clearfix"></div>


               </div>
               <!--end head-->

       <div class="clearfix"></div>
                <div class="panel-form-content1">

                  <section  class = "col-md-8" style="margin-bottom: 10px;">

                <div class="form-horizontal" id="supplier_info">
                    <div class="form-group">
                    <label class="control-label col-md-2" style="font-size: 12px;">Supplier</label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                    <input type="text" class="form-control col-md-5 col-xs-12" style="height: 30px; border-radius: 3px;" readonly>
                    </div>
                    </div>

                     <div class="form-group">
                     <label class="control-label col-md-2" style="font-size: 12px;">Invoice #</label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                    <input type="text" class="form-control col-md-5 col-xs-12" style="height: 30px; border-radius: 3px;">
                    </div>
                    </div>

                     <div class="form-group">
                     <label class="control-label col-md-2" style="font-size: 12px;">Date</label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                    <input type="date" id="datePicker" class="form-control col-md-5 col-xs-12" style="height: 30px; border-radius: 3px;">
                    </div>
                    </div>
                </div>
                  </section>

               <section  class = "col-md-4" style="margin-bottom: 10px;">

                <div class="form-horizontal" id="supplier_info">
                    <div class="form-group">
                    <label class="control-label col-md-4" style="font-size: 12px;">Date recieved</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="date" id="datePicker" class="form-control col-md-5 col-xs-12" style="height: 30px; border-radius: 3px;">
                    </div>
                    </div>

                  

                </div>
                  </section>


                </div>
                   <!--end content-->
        

                   <section  class = "col-md-12" style="margin-bottom: 10px;">
                     
                      <ul class="item_feild">
                      <li style="width: 4%"><</li><li style="width: 25%;">
                      Item name</li><li style="width: 25%;">
                        Description</li><li style="width: 14%;">
                        Quantity</li><li style="width: 14%;">
                        Price</li><li style="width: 14%;">
                        Subtotal</li><li style="width: 4%">
                        ></li>
                      </ul>



           <ul class="item_feild-input" id="parent" style="width: 100%; margin:0 auto; padding: 0;">
            <li class="parent" style="width: 4%"><input type="" name=""></li><li style="width: 25%;">
            <input type="text"  placeholder="Search item"></li><li style="width: 25%;">
            <input type="text" ></li><li id="parent" style="width: 14%;">
            <input type="text"  id="n1"></li><li  style="width: 14%;">
            <input type="text"  id="n2" ></li><li  style="width: 14%;">
            <input type="text" id="n3"></li><li style="width: 4%">
            <span>x</span></li>
          </ul>


           <ul class="item_feild-input" id="parent" style="width: 100%; margin:0 auto; padding: 0;">
            <li class="parent" style="width: 4%"><input type="" name=""></li><li style="width: 25%;">
            <input type="text"  placeholder="Search item"></li><li style="width: 25%;">
            <input type="text" ></li><li id="parent" style="width: 14%;">
            <input type="text"  id="n1"></li><li  style="width: 14%;">
            <input type="text"  id="n2" ></li><li  style="width: 14%;">
            <input type="text" id="n3"></li><li style="width: 4%">
          <span>x</span></li>
          </ul>

         
         





          



                          <a style="display: block; margin-top:10px; text-align: center;" id="additem"><i class="fa fa-plus"></i> Add another Item</a>
                   </section>
        

              </div><!--panel-->


     

</div>
</div>

<!--pricing-->



             