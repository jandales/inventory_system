 <?php 
  if(isset($_POST['new'])){
    header("Location: Purchaseorder.php?page=add");
  }

 if(isset($_POST['checkbox'])){
        foreach($_POST['checkbox'] as $id){
            
            if(isset($_POST['delete'])){
                $query ="DELETE FROM purchase_order WHERE po_id = '{$id}' ";
                $result = mysqli_query($connect,$query);

                if($result)
                {
                $query ="DELETE FROM purchase_items WHERE po_id = '{$id}' ";
                $result = mysqli_query($connect,$query);
                redirect("Purchaseorder.php");

                }  

                   
                     
            }

            if(isset($_POST['edit'])){
                  header("Location: Purchaseorder.php?page=edit&id={$id}");
                
            }

            if(isset($_POST['item'])){
                    header("Location: Purchaseorder.php?page=item&po_id={$id}");
            }

        }
    }
   

 ?>





<?php
$query = "SELECT * FROM purchase_order";
$query_result = mysqli_query($connect, $query);
$customer_count = mysqli_num_rows($query_result );

?>
<form method="post" action="purchaseorder.php?page=search">
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
                    <h2>List of Purchase Order <small class="count"><?php echo $customer_count ?></small> </h2>


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
                   <?php  get_PO(); ?>

                  </div>
                </div>

  <nav aria-label="Page navigation" class="pull-right">
  <ul class="pagination">
  

    <?php
      supplier_pager();
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

  $query ="DELETE FROM purchase_order WHERE po_id = '{$po_id}' ";
  $result = mysqli_query($connect,$query);

  if($result)
  {
    $query ="DELETE FROM purchase_items WHERE po_id = '{$po_id}' ";
    $result = mysqli_query($connect,$query);
     redirect("Purchaseorder.php");

  }


}

?>