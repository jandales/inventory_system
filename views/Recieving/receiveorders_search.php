 <?php 
  if(isset($_POST['new'])){
    header("Location: receiveorders.php?page=add");
  }

 if(isset($_POST['checkbox'])){
        foreach($_POST['checkbox'] as $id){
            
            if(isset($_POST['delete'])){
                  $delete_recieve =query("DELETE FROM recievings WHERE po_id = '{$id}' ");
                  ///delete items
                  $delete_items  =query("DELETE FROM receiving_items WHERE po_id = '{$id}' ");

                  //////delete payment 
                  $delete_payment_h =query("DELETE FROM purchase_payment WHERE po_id = '{$id}' ");
                  //////delete payment 
                  $delete_payment =query("DELETE FROM supplier_payment WHERE po_id = '{$id}' ");
                  redirect("receiveorders.php");       
                     
            }

            if(isset($_POST['edit'])){
                  header("Location: receiveorders.php?page=edit&id={$id}");
                
            }

            if(isset($_POST['item'])){
                    header("Location: receiveorders.php?page=item&po_id={$id}");
            }

        }
    }
   

 ?>





<?php
$query = query("SELECT * FROM recievings");

$recieve_count = count_result($query);

?>
<form method="post" action="receiveorders.php?page=search">
    <div class="title_right">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
              <input type="text" name="search" class="form-control" placeholder="Search">
              <span class="input-group-btn">
              <button class="btn btn-default" type="submit" name="btnsearch"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </div>
    </div>
</div>
</form>
<?php display_message() ?>
<div class="clearfix"></div>
<form method="post" action="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="table_panel">
                  <div class="table_title">
                    <h2>List of Recieve Order <small class="count"><?php echo $recieve_count ?></small> </h2>


 <div class="form-inline">

<div class="form-group pull-right">

<div class="btn-group" role="group" aria-label="..."> 

<button type="submit" name="new"  class="btn btn-info btn-padding" data-toggle="tooltip" data-placement="bottom" title="New Purchase order"><i class="fa fa-plus"></i></button>  

<button type="button" class="btn btn-info btn-padding" data-toggle="tooltip" data-placement="bottom" title="Export"><i class="fa  fa-upload"></i></button>

<button type="button" class="btn btn-info btn-padding" data-toggle="tooltip" data-placement="bottom" title="Import"><i class="fa  fa-download"></i></button>

<button type="submit"   name="item" class="btn btn-info btn-padding enabled" data-toggle="tooltip" data-placement="bottom" title="View Purchase item" disabled><i class="fa  fa-users"></i></button>

<button type="submit"  name="edit"  class="btn btn-info btn-padding enabled" data-toggle="tooltip" data-placement="bottom" title="Edit Purchase item" disabled ><i class="fa fa-edit"></i></button>

<button type="submit"   id="delete" name="delete"  class="btn btn-info btn-padding enabled" data-toggle="tooltip" data-placement="bottom" title="Delete PO" disabled><i class="fa fa-times" ></i></button>

</div>                   
</div>


                 
</div><!-- /.form -->



   <div class="clearfix"></div>
                  </div>


                  <div class="table_content">
                     <table class="table table-hover table-no-border">

   <thead>
  <tr>
 <th width="1%;"><input type="checkbox" class="checkbox" id ="selectall"></th>
 <th>Order number</th>
  <th>Invioce number</th>
   <th>Supplier</th>
    <th>Amount</th>
    <th>Date recieved</th>
    <th>Delete</th>
   </tr>
  </thead>
   <tbody>
                   <?php 

                    if(isset($_POST['btnsearch'])){
                          get_recieve_search();
                    }



             
                   ?>
</tbody>
</table>
                  </div>
                </div>

  <nav aria-label="Page navigation" class="pull-right">
  <ul class="pagination">
  

    <?php
      recievings_pager();
    ?>

  </ul>
</nav>


              </div>
            </div>
</form>



<?php
if(isset($_GET['delete']))
{
  $po_id = $_GET['delete']; 
  ////delete recieve item
  $delete_recieve =query("DELETE FROM recievings WHERE po_id = '{$po_id}' ");
  ///delete items
  $delete_items  =query("DELETE FROM receiving_items WHERE po_id = '{$po_id}' ");

     //////delete payment 
  $delete_payment_h =query("DELETE FROM purchase_payment WHERE po_id = '{$po_id}' ");
   //////delete payment 
  $delete_payment =query("DELETE FROM supplier_payment WHERE po_id = '{$po_id}' ");
   redirect("receiveorders.php");



}

?>

         






                       <!-- Show the cropped image in modal -->
     <form class="form-horizontal" method="post" action=""> 
             <div class="modal fade docs-cropped" id="editmodal" aria-hidden="true"  role="dialog" tabindex="-1" >
                        <div class="modal-dialog" style="width:60%;">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title" id="getCroppedCanvasTitle">Payment for Purchase Order</h4>
                            </div>
                            <div class="modal-body" id="edit-content">

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <button type="submit" name="pay" class="btn btn-info">Submit</button>
<?php

if(isset($_POST['pay'])){
$query ="INSERT INTO purchase_payment(po_id, invoice_number,supplier_id,date_payment,amount,payment_method,check_number,balance) VALUES ('".$_POST['po_id']."','".$_POST['invoice_number']."','".$_POST['supplier_id']."','".$_POST['date']."','".$_POST['amount']."','".$_POST['method']."','".$_POST['checknumber']."','".$_POST['balance']."')";
    $po =  mysqli_query($connect, $query);

}

?>
                            </div>
                      
                          </div>
                        </div>
                      </div><!-- /.modal -->


     </form>
