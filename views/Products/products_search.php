 <?php 
  if(isset($_POST['new'])){
    header("Location: products.php?page=add");


  }

     if(isset($_POST['close'])){
    header("Location: products.php");
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





<?php

$query = "SELECT * FROM products";
$query_result = mysqli_query($connect, $query);
$totalcount = mysqli_num_rows($query_result );


?>
<form method="post" action="products.php?page=search">
    <div class="title_right">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
              <input type="text" name="search" class="form-control" placeholder="Search">
              <span class="input-group-btn">
              <button class="btn btn-default" type="submit" name="btnsearch"><i class="fa fa-search"></i></button>
               <button class="btn btn-danger" type="submit" name="close"><i class="fa fa-close"></i></button>
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
                    <h2>List of Items <small class="count"><?php echo $totalcount; ?></small> </h2>

 <div class="form-inline">

<div class="form-group pull-right">

<div class="btn-group" role="group" aria-label="..."> 

<button type="submit" name="new"  class="btn btn-info btn-padding" data-toggle="tooltip" data-placement="bottom" title="New Item"><i class="fa fa-plus"></i></button>  

<button type="button" class="btn btn-info btn-padding" data-toggle="tooltip" data-placement="bottom" title="Export"><i class="fa  fa-upload"></i></button>

<button type="button" class="btn btn-info btn-padding" data-toggle="tooltip" data-placement="bottom" title="Import"><i class="fa  fa-download"></i></button>


<button type="submit"  name="edit"  class="btn btn-info btn-padding enabled" data-toggle="tooltip" data-placement="bottom" title="Edit Item" disabled ><i class="fa fa-edit"></i></button>

<button type="submit"   id="delete" name="delete"  class="btn btn-info btn-padding enabled" data-toggle="tooltip" data-placement="bottom" title="Delete Item" disabled><i class="fa fa-times" ></i></button>

</div>                   
</div>


                 
</div><!-- /.form -->



   <div class="clearfix"></div>
                  </div>


                  <div class="table_content">
                     <table class="table table-responsive table-hover table-no-border">

<thead>
<tr>
    <th width="1%;"><input type="checkbox" class="checkbox" id ="selectall"></th>
    <th>Item Code</th>
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
if(isset($_POST['btnsearch'])){
    $search = $_POST['search'];
     $query = "SELECT * FROM products WHERE item_name LIKE '%$search%' ";
     $query_result = mysqli_query($connect, $query);
     $count = mysqli_num_rows($query_result);

    if($count == 0){
        echo "<tr>";
        echo "<th colspan='7' style='text-align:center;'>No Item found in the database</th>";
        echo "</tr>";
    }elseif(empty($search)){
           echo "<tr>";
         echo "<th colspan='7' style='text-align:center;'>Empty fields</th>";
         echo "</tr>";
     }else{

      while($db = mysqli_fetch_assoc($query_result)){
      $id = $db['id'];
      $Item_Code = $db['item_id'];
      $Item_Name = $db['item_name'];
      $category = $db['category'];
      $cost = $db['cost'];
      $price = $db['price'];
      $quantity = $db['quantity'];
   
      $query = "SELECT * FROM categories WHERE cat_id = '{$category}' ";
      $result = mysqli_query($connect, $query);

      while($cat = mysqli_fetch_assoc($result)){
         $cat_name = $cat['cat_name'];
      }
     
                                      
      echo "<tr>";
      echo "<th><input type='checkbox' name='checkbox[]' class='checked' value='$id'></th>";
   
      echo "<th>$Item_Code</th>";
      echo "<th><a id='$id' data-toggle='modal' class='view_info' >$Item_Name</a></th>";
      echo "<th>$cat_name</th>";
      echo "<th>$cost</th>";
      echo "<th>$price</th>";
      echo "<th>$quantity</th>";
      echo "<th><a href='products.php?page=inventory&id=$id'>Inventory</a></th>";
      echo "<th><a href='products.php?page=edit&id=$id'>Edit</a></th>";
      
      echo "</tr>";

      }


     }

   }  


   
      

?>
   
</tbody>
</table>


                  </div>



                </div>

              


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