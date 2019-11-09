 <?php 


 if(isset($_POST['checkbox'])){
        foreach($_POST['checkbox'] as $id){
            
           if(isset($_POST['delete'])){
            
                  $invoices =  new Invoices();
                  $this->delete($id);
                  header("Location: orders.php");
                     
            }

            if(isset($_POST['edit'])){
                  header("Location: products.php?page=edit&id={$id}");
                
            }

           

        }
    }
   

 ?>





<?php

  $invoices =  new Invoices();

  $lists = $invoices->lists();

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
                    <h2>List of Invoice <small class="count"><?php echo $lists->num_rows ?></small> </h2>


 <div class="form-inline">

<div class="form-group pull-right">

<div class="btn-group" role="group" aria-label="..."> 

<a  href="invoice.php?page=add" type="submit" name="new"  class="btn btn-info btn-padding" data-toggle="tooltip" data-placement="bottom" title="New Item"><i class="fa fa-plus"></i></a>  

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
    <th>Invoice number</th>
    <th>Customer</th>
    <th>Amount</th>
    <th>Date</th>
    <th>Delete</th>
    
</tr>

</thead>
<tbody>
 <?php

      foreach ($lists as $key => $db) {
        
        $customer_name  = $db['fname'] . " " .  $db['lname'];

      echo "<tr>";
      echo "<th><input type='checkbox' name='checkbox[]' class='checked' value='".$db['invoice_number']."'></th>";
      echo "<th><a href='invoice.php?page=item&id=".$db['invoice_number']."'>". $db['invoice_number'] . "</a></th>";
      echo "<th><a href='customers.php?page=profile&id=".$db['customer_id']."' >$customer_name</a></th>";
      echo "<th><a class='balance'>". $db['balance'] ."</a></th>";
      echo "<th>". $db['invoice_date']."</th>";
      echo "<th><a href='orders.php?delete=".$db['invoice_number']."'>Delete<a></th>"; 
      echo "</tr>";

      }


?>
   
</tbody>
</table>


                  </div>



                </div>

                <nav aria-label="Page navigation" class="pull-right">
  <ul class="pagination">

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

    $id = $_GET['delete'];
    $invoices =  new Invoices();
    $this->delete($id);
    header("Location: orders.php");
                     
}

?>