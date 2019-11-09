
<?php
 

if(isset($_POST['edit'])){
  $po_id = $_GET['po_id'];
  redirect("Purchaseorder.php?page=edit&id={$po_id}");

}

if(isset($_POST['void'])){
  $po_id = $_GET['po_id'];
 
  $query ="UPDATE purchase_order SET status = 'Void' WHERE po_id = '{$po_id}' ";
  $result = mysqli_query($connect, $query);
   redirect("Purchaseorder.php");


}




 if(isset($_GET['po_id'])){
    $po_id = $_GET['po_id'];
     $query = "SELECT * FROM purchase_order WHERE po_id = '{$po_id}' ";
     $query_result = mysqli_query($connect, $query);
    while($db = mysqli_fetch_assoc($query_result)){
        $supplier = $db['supplier'];
        $date = $db['date_issued'];
        $due_date= $db['due_date'];
        $status = $db['status'];
    
      }

$query = "SELECT * FROM suppliers WHERE supplier_id = '$supplier' ";
$query_result = mysqli_query($connect, $query);

while($db = mysqli_fetch_assoc($query_result))

{

$id = $db['id'];
$campany_name = $db['campany'];
$email = $db['email'];
$phone = $db['phone'];

}
}
    ?>


<?php
 
 if(isset($_GET['po_id']))
 {
    $po_id = $_GET['po_id'];



     $query = "SELECT * FROM purchase_items WHERE po_id = '{$po_id}' ";
     $query_result = mysqli_query($connect, $query);
   
      ?>

            </div>

               <div class="clearfix"></div>

            <div class="row top-20px">
          
              <div class="col-md-12 col-sm-12 col-xs-12">
           
<form action="" method="post">

                <div class="form_panel">
                  <div class="form_title">
<h2>Purchase Item <?php if($status == 'Recieved'){ echo '<span style="color:#9C27B0; font-size: 15px;"> '. $status .' </span>';
}else if($status == 'Void'){
echo '<span style="color:red; font-size: 15px;"> '. $status .' </span>';
}else{
echo '<span style="color:green; font-size: 15px;"> '. $status .' </span>';
}?>
</h2>
                  

 <div class="form-inline">

<div class="form-group pull-right">

<div class="btn-group" role="group" aria-label="..."> 
 <?php   if($status == 'Recieved'){ 
 }else if($status == 'Void'){
  echo '<button type="button"  data-toggle="modal" data-target="#myModal" class="btn btn-info btn-padding" disabled>Recieved</button>';
 }else{
  echo '<button type="button"  data-toggle="modal" data-target="#myModal" class="btn btn-info btn-padding">Recieve all</button>';
 }
?>

<button type="submit" onclick="myFunction()"  class="btn btn-info btn-padding">Print</button>  

<button type="submit" class="btn btn-info btn-padding" name="edit"> Edit</button>

<button type="button"  class="btn btn-info btn-padding" data-toggle="modal" data-target="#void">Void</button>




</div>                   
</div>


                 

                    <div class="clearfix"></div>
                  </div>
                  <div class="form_content"> 

 <div class="col-md-5 col-sm-8 col-xs-12 bottom-10">
  <table class="table-list1">
  <tr>
    <th>Campany :</th>
    <th><input type="text" name="supplier" value="<?php echo $campany_name ?>" readonly></th>
 
  </tr>

   <tr>
    <th>Email :</th>
    <th><?php echo $email ?></th>

  </tr>

    <tr>
    <th>Phone # :</th>
    <th><?php echo $phone ?></th>
 
  </tr>

</table>   
  </div>

<div class="col-md-4 col-sm-8 col-xs-12 bottom-10 pull-right">
<table class="table-label">
  <tr>
    <th width="40%">Purchase # :</th>
    <th><?php echo $po_id ?></th>
 
  </tr>

   <tr>
    <th width="30%"> Date Issued :</th>
    <th><?php echo $date ?></th>

  </tr>

   <tr>
    <th width="30%"> Due Date :</th>
    <th><?php echo $due_date ?></th>

  </tr>


</table>   
</div>





                      

<div class="table_content">


<table class="table"  style="">

<thead>
<tr>

<th>Item Name</th>
<th>Desciption</th>
<th>Quantity</th>
<th>Unit Price</th>
<th>Discount</th>
<th>Sub-total</th>




</tr>

</thead>
<tbody>
<?php
   while($db = mysqli_fetch_assoc($query_result)){
        $campany_name = $db['po_id'];
        $item_id = $db['item_name'];
        $total_quantity =$db['total_quantity'];
        $itemcount =$db['itemcount'];
        $amount = $db['total_amount'];
        $total_discount = $db['total_discount'];
        $remark = $db['remark'];
        $percent = "%";


        $query1 = "SELECT * FROM products WHERE item_id = '{$item_id}' ";
        $query_result1 = mysqli_query($connect, $query1);

        while($db1 = mysqli_fetch_assoc($query_result1)){
          $item_name = $db1['item_name'];
        }


echo " <tr>";
echo "<th><input type='text' name='itemname[]' value='$item_name' readonly class='form-control' style=' border:0 !important;'> </th>";
echo "<th><input type='text' name='description[]' value='". $db['description'] ."' readonly class='form-control'  style=' border:0 !important;'></th>";
echo "<th><input type='text' name='quantity[]' value='".$db['quantity']."' readonly class='form-control'  style=' border:0 !important;'></th>";
echo "<th><input type='text' name='price[]' value='".$db['unit_price']."' readonly class='form-control'  style=' border:0 !important;'></th>";
echo "<th><input type='text' name='discount[]' value='".$db['discount']."' readonly class='form-control'  style=' border:0 !important;'></th>";
echo " <th><input type='text' name='subtotal[]' value='".$db['subtotal']."' readonly class='form-control'  style=' border:0 !important;' >  </th>";
echo " </tr>";


      }

     
     
 }

 


?>
</tbody>
</table>


</div>
<div class="clearfix"></div>
<section style="margin-top: 30px">
  
            <section class="col-md-3 col-sm-3 col-xs-12 pull-right" style="margin-bottom: 20px;">
                    <table class="table-list">

                       <tr>
                        <th>Quantity:</th>
                        <th><input type="text" name="total_quantity" class="total_quantity" style="height: 25px; border:0;" readonly="readonly" value="<?php echo $total_quantity ?>"></th>
                      </tr>

                       <tr>
                        <th>Item unit:</th>
                        <th><input type="text" name="itemunit" class="itemunit" style="height: 25px; border:0;" readonly="readonly" value="<?php echo $itemcount ?>"></th>
                      </tr>

                     

                     
                      <tr>
                        <th>Total Discount:</th>
                        <th><input type="text" name="total_discount" class="total_discount" style="height: 25px; border:0;" readonly="readonly" value="<?php echo $total_discount  ?>"></th>
                      </tr>

                    

                        <tr>
                        <th>Total Cost:</th>
                        <th><input type="text" name="amount" class="total-amount" style="height: 25px; border:0;" readonly="readonly" value="<?php echo $amount  ?>"></th>
                      </tr>
                     

                    </table>
                    
                  </section>


                 <section class="col-md-7 col-sm-7 col-xs-12">
                      <div class="form-group">
                      <label class="control-label col-md-2" style="font-size: 12px;">Remark : </label>
                      <div class="col-md-6  col-sm-6 col-xs-12">
                     <textarea class="form-control" name="remark"><?php echo $remark  ?></textarea>
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

</section>

                  </div>








              
              </div>


           
            </div>
            </div>
            






<div class="modal fade" id="myModal" aria-hidden="true"  role="dialog" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title" id="getCroppedCanvasTitle">Recieve Orders</h4>
      </div>

      <div class="modal-body">
      <table class="table-list pull-left" style="width: 50%; margin: 20px 0;">

      <tr>
       <tr>
      <th style="border-bottom: 0 !important;">Purchase order:</th>
      <th style="border-bottom: 0 !important;"><input type="text" name="date_void" class="total_quantity" style="height: 25px; border:1px solid #ddd !important; border-radius: 3px;" value="<?php echo $po_id ?>" readonly></th>
      </tr>

      <th style="border-bottom: 0 !important;">Date recieve</th>
      <th style="border-bottom: 0 !important;"><input type="date" name="date_recieve" class="total_quantity" style="height: 25px; border:1px solid #ddd !important;"></th>
      </tr>
      </table>

      <table class="table-list pull-right" style="width: 40%; margin: 20px 0;">
      <tr>
      <th>Quantity:</th>
      <th><input type="text" name="total_quantity" class="total_quantity" style="height: 25px; border:0;" readonly="readonly" value="<?php echo $total_quantity ?>"></th>
      </tr>

      <tr>
      <th>Total Cost:</th>
      <th><input type="text" name="amount" class="total-amount" style="height: 25px; border:0;" readonly="readonly" value="<?php echo $amount  ?>"></th>
      </tr>
      </table>
      <div class="clearfix"></div>
      </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" name="recieved" class="btn btn-info">Submit</button>

    </div>

    </div>
  </div>
</div><!-- /.modal -->
</form>


<form method="post" action="">

<div class="modal fade" id="void" aria-hidden="true"  role="dialog" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title" id="getCroppedCanvasTitle">Are sure to void this purchase order</h4>
      </div>

      <div class="modal-body">
      <table class="table-list pull-left" style="width: 50%; margin: 20px 0;">
       <tr>
      <th style="border-bottom: 0 !important;">Purchase order:</th>
      <th style="border-bottom: 0 !important;"><input type="text" name="date_void" class="total_quantity" style="height: 25px; border:1px solid #ddd !important; border-radius: 3px;" value="<?php echo $po_id ?>" readonly></th>
      </tr>
      <tr>
      <th style="border-bottom: 0 !important;">Date recieve</th>
      <th style="border-bottom: 0 !important;"><input type="date" name="date_recieve" class="total_quantity" style="height: 25px; border:1px solid #ddd !important;"></th>
      </tr>
      </table>

      <table class="table-list pull-right" style="width: 40%; margin: 20px 0;">
      <tr>
      <th>Quantity:</th>
      <th><input type="text" name="total_quantity" class="total_quantity" style="height: 25px; border:0;" readonly="readonly" value="<?php echo $total_quantity ?>"></th>
      </tr>

      <tr>
      <th>Total Cost:</th>
      <th><input type="text" name="amount" class="total-amount" style="height: 25px; border:0;" readonly="readonly" value="<?php echo $amount  ?>"></th>
      </tr>
      </table>
      <div class="clearfix"></div>
      </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" name="void" class="btn btn-danger">Void</button>

    </div>

    </div>
  </div>
</div><!-- /.modal -->
</form>
<?php 
if(isset($_POST['recieved'])){

  $date_recieve = $_POST['date_recieve'];
  $supplier = $_POST['supplier'];
  $query ="INSERT INTO recievings(receiving_date,supplier_id,employee_id) VALUES ('{$date_recieve}','{$supplier}', 'employee_id')";
    $po =  mysqli_query($connect, $query);

$itemname = count($_POST['itemname']);

$supplier = $_POST['supplier'];
$totalsub= $_POST['total-sub'];
$total_quantity = $_POST['total_quantity'];
$itemunit= $_POST['itemunit'];
$total_discount = $_POST['total_discount'];
$total_amount = $_POST['amount'];

  if($itemname > 0 )
{

    for($i=0; $i < $itemname; $i++)
    {
    if(trim($_POST['itemname'][$i]) != '')

    {

  $query_items ="INSERT INTO receiving_items(po_id, item_name,description,quantity,unit_price,subtotal,discount,itemcount,total_quantity,total_amount,total_discount) VALUES ('{$po_id}','".$_POST["itemname"][$i]."','". $_POST["description"][$i]."','". $_POST["quantity"][$i]."','". $_POST["price"][$i]."','". $_POST["subtotal"][$i]."','". $_POST['discount'][$i]."','{$itemunit}','{$total_quantity}','{$total_amount}','{$total_discount}')";
   $result =  mysqli_query($connect,$query_items);


    $query ="UPDATE purchase_order SET status = 'Recieved' WHERE po_id = '{$po_id}' ";
  $result = mysqli_query($connect, $query);
  redirect("Purchaseorder.php");

    }

    }


    }
  
}

?>