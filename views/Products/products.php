 <?php 

 $products =  new Products();

 $lists =  $products->lists();

  if(isset($_POST['new'])){
    header("Location: products.php?page=add");
  }

 if(isset($_POST['checkbox'])){
        foreach($_POST['checkbox'] as $id){
            
            if(isset($_POST['delete'])){
                  $query ="DELETE  FROM products WHERE id = '{$id}' ";
                  $result = mysqli_query($connect, $query);
                  header("Location: products.php");
                     
            }

            if(isset($_POST['edit'])){
                  header("Location: products.php?page=edit&id={$id}");
                
            }

           

        }
    }
   

 ?>



<form method="post" action="products.php?page=search">
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
                    <h2>List of Items <small class="count"><?php echo $lists->num_rows ?></small> </h2>


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
    <th>Barcode</th>
    <th>Item Name</th>
    <th>Category</th>
    <th>Cost Price</th>
    <th>Selling Price</th>
    <th>Quantity</th>
    <th>Inventory</th>
    <th>Edit</th>
   


   
    
</tr>

</thead>
<tbody>
 <?php

    foreach ($lists as $key => $db) {
    
      echo "<tr>";
      echo "<th><input type='checkbox' name='checkbox[]' class='checked' value='".$db['item_id']."'></th>";
      echo "<th>".$db['barcode']."</th>";
      echo "<th><a id='".$db['item_id']."' data-toggle='modal' class='view_info' >".$db['item_name']."</a></th>";
      echo "<th>".$db['cat_name']."</th>";
      echo "<th>".$db['cost']."</th>";
      echo "<th><a id='".$db['item_id']."' class='update_price'>".$db['price']."</a></th>";
      echo "<th>".$db['quantity']."</th>";
      echo "<th><a href='products.php?page=inventory&id=".$db['item_id']."'>Inventory</a></th>";
      echo "<th><a href='products.php?page=edit&id=".$db['item_id']."'>Edit</a></th>";
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
                            <div class="modal-body" id="iteminfo">

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                             

                            </div>
                      
                          </div>
                        </div>
                      </div><!-- /.modal -->


                                    <form   class ="form-horizontal" method="post" action="./core/Request/Products/updateprice.php"> 
             <div  class="modal fade " id="price_modal" aria-hidden="true"  role="dialog" tabindex="-1">
                        <div  style="width: 300px;" class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title" id="getCroppedCanvasTitle">Update Price</h4>
                            </div>
                            <div class="modal-body" id="price-content">

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <button type="submit" name="update" class="btn btn-info">Submit</button>
                         </div>
                      
                          </div>
                        </div>
                      </div><!-- /.modal -->


     </form>


       