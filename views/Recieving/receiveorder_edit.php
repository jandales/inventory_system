
    



            </div>

               <div class="clearfix"></div>

            <div class="row top-20px">
            <form name="form" id="form" action="" method="post">
              <div class="col-md-12 col-sm-12 col-xs-12">

              <div class="panel-form">
              
                <div class="panel-form-heading">
       
                    <label style="padding-top: 3px; margin-left: 5px; font-size:15px;">Edit Purchase Order</label>
               


                  <div class="pull-right">
                  <label class="label-PO" name="PO_"></label>
                  </div>
                  <div class="clearfix"></div>


               </div>
                 <div class="clearfix"></div>

                 <div class="panel-form-label1">
                 
                 </div>

               <div class="panel-form-content1">
                <section  class ="col-md-4 col-sm-6 col-xs-12">
                <div class="form-horizontal">

                <?php



if(isset($_GET['id']))

{

$po_id = $_GET['id'];
$output ="";

 $query = "SELECT * FROM recievings WHERE po_id = '{$po_id}' ";
     $query_result = mysqli_query($connect, $query);
    while($db = mysqli_fetch_assoc($query_result)){
        $supplier = $db['supplier_id'];
        $date_recieve = $db['receiving_date'];
        $invoice_date = $db['invoice_date'];
        $invoice = $db['invoice'];
      }


$query = "SELECT * FROM suppliers WHERE supplier_id = '{$supplier}' ";
$query_result = mysqli_query($connect, $query);
$count = mysqli_num_rows($query_result);

while($db = mysqli_fetch_assoc($query_result))

{

         

$output .= '<div class="form-group">';
$output .= '<label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-size: 12px;">Campany </label>';
$output .= '<div class="col-md-9 col-sm-6 col-xs-12">';
$output .= '<input type="text" id="sup_id1" class="form-control col-md-5 col-xs-12" style="height: 30px; border-radius: 3px;" readonly value="'.$db['campany'].'">';
$output .= '</div>';
$output .= '</div>';


$output .= '<div class="form-group">';
$output .= '<label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-size: 12px;">Email </label>';
$output .= '<div class="col-md-9 col-sm-6 col-xs-12">';
$output .= '<input type="text" class="form-control col-md-5 col-xs-12" style="height: 30px; border-radius: 3px;" readonly value="'.$db['email'].'">';
$output .= '</div>';
$output .= '</div>';


$output .= '<div class="form-group">';
$output .= '<label class="control-label col-md-3 col-sm-3 col-xs-12" style="font-size: 12px;">Phone </label>';
$output .= '<div class="col-md-9 col-sm-6 col-xs-12">';
$output .= '<input type="text" class="form-control col-md-5 col-xs-12" style="height: 30px; border-radius: 3px;" readonly value="'.$db['phone'].'">';
$output .= '</div>';
$output .= '</div>';
   




}
  
echo $output;

}

?>

               </div>

                </section>
                 <section  class = "col-md-4 col-sm-4 col-xs-12">
                 <div class="form-horizontal">
                     

                       <div class="form-group">
                        <label class="control-label col-md-4 col-sm-6 col-xs-12" for="email">Invoice #</label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  name="invoice_number"  class="form-control col-md-7 col-xs-12" style="height: 30px; border-radius: 3px;" value="<?php echo $invoice; ?>">

                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-6 col-xs-12" for="email">Invoice Date</label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date"  name="invoice_date"  class="form-control col-md-7 col-xs-12" style="height: 30px; border-radius: 3px;" value="<?php echo $invoice_date; ?>">

                        </div>

                    

                      </div>

                           <div class="form-group">
                        <label class="control-label col-md-4 col-sm-6 col-xs-12" for="email">Date received</label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date"  name="recieve_date"  class="form-control col-md-7 col-xs-12" style="height: 30px; border-radius: 3px;" value="<?php echo $date_recieve; ?>">

                        </div>
                        </div>





               </div>
               </section>

                          <section  class = "col-md-4 col-sm-4 col-xs-12">
                 <div class="form-horizontal">
                     

                       <div class="form-group">
                        <label class="control-label col-md-4 col-sm-6 col-xs-12" for="email">Tax</label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12" style="height: 30px; border-radius: 3px;" name="tax">
                          <option>Tax Exclusive</option>
                          <option>Tax inclusive</option>
                          </select>

                        </div>
                      </div>

                  

                           <div class="form-group">
                        <label class="control-label col-md-4 col-sm-6 col-xs-12" for="email">Employee</label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  name="employee"  class="form-control col-md-7 col-xs-12" style="height: 30px; border-radius: 3px;" readonly="" value="<?php echo $_SESSION['username']; ?>">

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
<label>Tax</label>
</div>
<div style="width: 10%;  margin-left: 1%; margin-top:4px;">
<label>Sub-Total</label>
</div>

</div>




 
<div class="row1" id="field" style="width: 100%;">
   <?php

if(isset($_GET['id'])){

$p_id = $_GET['id'];

$output="";



$query = "SELECT * FROM receiving_items WHERE po_id = '{$p_id}' ";
$query_result = mysqli_query($connect, $query);




while($db = mysqli_fetch_assoc($query_result)){
  $item_Id = $db["item_name"];
$id = $db['id'];
$itemcount =$db['itemcount'];
$discount = $db['total_discount'];
$amount = $db['total_cost'];
$quantity = $db['total_quantity'];
$remark = $db['remark'];

$query_p = "SELECT * FROM products WHERE item_id = '{$item_Id}' ";
$query_result_p = mysqli_query($connect, $query_p);
while($db1 = mysqli_fetch_assoc($query_result_p))

{ 
  $item_code = $db1['item_id'];
  $item_name = $db1['item_name'];
}


echo "<select class='form-control  text clsProductId' name='itemname[]'' id='show_item'><option value ='".$item_code."'>$item_name</option></select>";
echo ' <input type="text" class="form-control  text" name="description[]" value="' .$db['description'].'">';
echo '<input type="number" class="quantity form-control  text" name="quantity[]"  value="'.$db['quantity'].'">';
echo ' <input type="number" class="prices form-control  text" name="price[]"   value="'.$db['unit_price'].'">';
echo '<input type="number" class="discount form-control  text" name="discount[]"  value="'.$db['tax'].'">';
echo '<input type="number" class="sub-total form-control  text" name="sub-total[]"   value="'.$db['subtotal'].'"">';
echo '<div class="span"><span id="1" class="remove" ><i class="fa fa-trash-o" aria-hidden="true"></i></span></div>';



}




}


?>

 
   

</div>
</div>


<div class="clearfix"></div>



                                   <a id="additem" class="add-btn"><i class="fa fa-plus"></i> Add another item</a>
                         
             
                      
                   
             


               </div>


                <div class="panel-form-footer1">

               
            

     

           

              
                  <section class="col-md-3 col-sm-3 col-xs-12 pull-right" style="margin-bottom: 20px;">
                    <table class="table-list">

                       <tr>
                        <th>Quantity:</th>
                        <th><input type="text" name="total_quantity" class="total_quantity" style="height: 25px; border:0;" readonly="readonly" value="<?php echo $quantity ?> "></th>
                      </tr>

                       <tr>
                        <th>Item count:</th>
                        <th><input type="text" name="itemunit" class="itemunit" style="height: 25px; border:0;" readonly="readonly" value="<?php echo $itemcount ?> "></th>
                      </tr>

                     

                     
                      <tr>
                        <th>Total Discount:</th>
                        <th><input type="text" name="total_discount" class="total_discount" style="height: 25px; border:0;" readonly="readonly" placeholder="0 %"></th>
                      </tr>

                    

                        <tr>
                        <th>Total Amount:</th>
                        <th><input type="text" name="amount" class="total-amount" style="height: 25px; border:0;" readonly="readonly" placeholder="Php 0.00"></th>
                      </tr>
                     

                    </table>
                    
                  </section>


                 <section class="col-md-7 col-sm-7 col-xs-12">
                      <div class="form-group">
                      <label class="control-label col-md-2" style="font-size: 12px;">Remark : </label>
                      <div class="col-md-6  col-sm-6 col-xs-12">
                     <textarea class="form-control" name="remark"><?php $remark ?> </textarea>
                      </div>
                      </div>
                </section>

                <div class="clearfix"></div>
                <section class="pull-right">
                  <div class="form-group">
                    <input type="submit" name="update"  class="btn btn-info">
                    <input type="submit" name="cancel" id="cancel" class="btn btn-danger" value="Cancel">
                  </div>
                </section>
                







             </div>

          

              </div><!--panel-->


          
            </form>

</div>
</div>

<!--pricing-->



     <?php




  if(isset($_POST['update'])){
$itemname = count($_POST['itemname']);
if($itemname > 0 )
{

 for($i=0; $i < $itemname; $i++)
{
  if(trim($_POST['itemname'][$i]) != '')
{

$query_update = "UPDATE receiving_items SET item_name ='".$_POST['itemname'][$i]."', description ='".$_POST['description'][$i]."', quantity ='".$_POST['quantity'][$i]."',  unit_price = '".$_POST['price'][$i]."', discount = '".$_POST['discount'][$i]."', subtotal = '".$_POST['sub-total'][$i]."' WHERE item_name = '".$_POST['itemname'][$i]."' ";
$update = mysqli_query($connect, $query_update);
header("Location: receiveorders.php?page=item&po_id={$po_id}");

    }

    }


    }

    }

?>    