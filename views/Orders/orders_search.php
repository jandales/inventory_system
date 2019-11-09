 <?php 
  if(isset($_POST['new'])){
    header("Location: orders.php?page=add");
  }

 if(isset($_POST['checkbox'])){
        foreach($_POST['checkbox'] as $id){
            
            if(isset($_GET['delete'])){
                 $or_id = $_GET['delete'];
                  $orders_delete = query("DELETE  FROM sale_orders WHERE order_id = '{$or_id}' ");
                  $orders_sale = query("DELETE  FROM sale_items WHERE order_id = '{$or_id}' ");
                  $orderS_payment = query("DELETE  FROM customer_payment WHERE order_id = '{$or_id}' ");
                  header("Location: orders.php");
                     
            }

            if(isset($_POST['edit'])){
                  header("Location: products.php?page=edit&id={$id}");
                
            }

           

        }
    }
   

 ?>





<?php

$query = query("SELECT * FROM sale_orders");

$totalcount = count_result($query);

?>
<form method="post" action="orders.php?page=search">
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
                    <h2>List of orders <small class="count"><?php echo $totalcount ?></small> </h2>


 <div class="form-inline">

<div class="form-group pull-right">

<div class="btn-group" role="group" aria-label="..."> 

<button type="submit" name="new"  class="btn btn-info btn-padding" data-toggle="tooltip" data-placement="bottom" title="New Item"><i class="fa fa-plus"></i></button>  

<button type="button" id="export" class="btn btn-info btn-padding" data-toggle="tooltip" data-placement="bottom" title="Export"><i class="fa  fa-upload"></i></button>

<button type="button" class="btn btn-info btn-padding" data-toggle="tooltip" data-placement="bottom" title="Import"><i class="fa  fa-download"></i></button>


<button type="submit"  name="edit"  class="btn btn-info btn-padding enabled" data-toggle="tooltip" data-placement="bottom" title="Edit Item" disabled ><i class="fa fa-edit"></i></button>

<button type="submit"   id="delete" name="delete"  class="btn btn-info btn-padding enabled" data-toggle="tooltip" data-placement="bottom" title="Delete Item" disabled><i class="fa fa-times" ></i></button>

</div>                   
</div>


                 
</div><!-- /.form -->



   <div class="clearfix"></div>
                  </div>


                  <div class="table_content" id="data_table">
                     <table class="table table-responsive table-hover table-no-border">

<thead>
<tr>
    <th width="1%;"><input type="checkbox" class="checkbox" id ="selectall"></th>
    <th>Order number</th>
    <th>Customer Name</th>

    <th>Amount</th>
    <th>Date Order</th>
    <th>Status</th>
    <th>Delete</th>

   


   
    
</tr>

</thead>
<tbody>
 <?php

    if(isset($_POST['btnsearch'])){
    $search = $_POST['search'];


    $query_count =query("SELECT * FROM sale_orders");
     $pagecount = count_result($query_count);
     
     $query_setting = query("SELECT * FROM settings WHERE setting_name = 'page' ");
     while ($value =fetch_array($query_setting )) {
     $perpage = $value['value'];
      }

     $totalpage = ceil($pagecount / $perpage);
      if(isset($_GET['page'])){
      $page =  $_GET['page'];

      }else{
        $page ="";
      }
      if($page < 1){
        $page = 1;
      }else if($page > $totalpage) {
        $page = $totalpage;
      }else{

      }
     $limit = 'LIMIT '  .($page - 1) * $perpage .','.$perpage;
     $query = query("SELECT * FROM sale_orders WHERE order_id = '{$search}' $limit ");
     $count = count_result($query);


     if($count == 0){
        echo "<tr>";
        echo "<th colspan='7' style='text-align:center;'>No Orders Found</th>";
        echo "</tr>";
     }else{
      while($db = fetch_array($query)){
      $id = $db['id'];
      $cu_id = $db['customer'];


      $customer = query("SELECT * FROM customers WHERE customer_id = '{$cu_id}' ");
      while ($cu =fetch_array($customer)) {
         $fname =$cu['fname'];
         $lname =$cu['lname'];
         $customer_id = $cu['customer_id'];
         $name = $fname ." ". $lname;
 
     }
                                      
      echo "<tr>";
      echo "<th><input type='checkbox' name='checkbox[]' class='checked' value='".$db['order_id']."'></th>";
      echo "<th><a href='orders.php?page=item&id=".$db['order_id']."'>". $db['order_id'] . "</a></th>";
      echo "<th><a href='customers.php?page=profile&id=".$customer_id."' >". $name . "</a></th>";
      echo "<th><a class='balance'>". $db['amount']   ."</a></th>";
      echo "<th>". $db['date_order']."</th>";
      echo "<th>". $db['status']."</th>";
      echo "<th><a href='orders.php?delete=".$db['order_id']."'>Delete<a></th>"; 
      echo "</tr>";


      }


     }

 

    }

?>
   
</tbody>
</table>


                  </div>



                </div>

                <nav aria-label="Page navigation" class="pull-right">
  <ul class="pagination">
  

    <?php
    products_pager();
    ?>



  </ul>
</nav>


              </div>
            </div>
</form>

            <div class="modal fade docs-cropped" id="viewinfo" aria-hidden="true"  role="dialog" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title" id="getCroppedCanvasTitle">Item information</h4>
                            </div>
                            <div class="modal-body" id="edit-content">

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                             

                            </div>
                      
                          </div>
                        </div>
                      </div><!-- /.modal -->


  <?php  

if(isset($_GET['delete'])){

$or_id = $_GET['delete'];
$orders_delete = query("DELETE  FROM sale_orders WHERE order_id = '{$or_id}' ");
$orders_sale = query("DELETE  FROM sale_items WHERE order_id = '{$or_id}' ");
$orderS_payment = query("DELETE  FROM customer_payment WHERE order_id = '{$or_id}' ");

header("Location: orders.php");
                     
}

?>