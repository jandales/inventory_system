
<form method="post" action="suppliers.php?category=search">
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
<?php 

      $categories = New Categories();

      $Lists = $categories->index();

     

 ?>
<div class="clearfix"></div>

            <div class="row">
                      






              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="table_panel bottom-20">
                  <div class="table_title">
                    <h2>List of Categories <small class="count">
                      <?php echo $Lists->num_rows ?>
                    </small> </h2>


<div class="form-inline">

<div class="form-group pull-right">

<div class="btn-group" role="group" aria-label="..."> 

<button type="submit" name="new"  class="btn btn-info btn-padding" data-toggle="modal" data-target="#myModal" data-toggle="tooltip" data-placement="bottom" title="New Category"><i class="fa fa-plus"></i></button>  

<button type="button" class="btn btn-info btn-padding" data-toggle="tooltip" data-placement="bottom" title="Export"><i class="fa  fa-upload"></i></button>

<button type="button" class="btn btn-info btn-padding" data-toggle="tooltip" data-placement="bottom" title="Import"><i class="fa  fa-download"></i></button>


<button type="submit"  name="edit"  class="btn btn-info btn-padding enabled" data-toggle="modal" data-target="#myModal1"  data-toggle="tooltip" data-placement="bottom" title="Edit customer"  ><i class="fa fa-edit"></i></button>

<button type="submit"   id="delete" name="delete"  class="btn btn-info btn-padding enabled" data-toggle="tooltip" data-placement="bottom" title="Delete user" disabled><i class="fa fa-times" ></i></button>

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
    <th>Category ID</th>
    <th>Category Name</th>
    <th>Description</th>
    <th>Delete</th>
    <th>Edit</th>
 
</tr>

</thead>
<tbody>

<?php 
    


foreach( $Lists as $key => $row ) {

        $id = $row['id']; 

        echo "<tr>";

        echo "<th><input type='checkbox' name='checkbox[]' class='checked' value='$id'></th>";

        echo "<th>" . $row['cat_id'] . "</th>";

        echo "<th>" . $row['cat_name'] . "</th>";

        echo "<th>" . $row['cat_description'] . "</th>"; 

        echo "<th><a href='categories.php?delete=$id'>Delete</a></th>"; 

        echo "<th><a id='$id' data-toggle='modal' class='view'>Edit</a></th>";

        echo "</tr>";    
   

}



?>


<?php


if(isset($_GET['delete'])){

  $id= $_GET['delete'];

  $category = new Categories();

  $category->delete($id);
    
  redirect("categories.php");
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



          <form class="form-horizontal" method="post" action="./core/Request/Categories/add.php" id="form1" runat="server" enctype="multipart/form-data">
                      <div class="modal fade docs-cropped" id="myModal" aria-hidden="true"  role="dialog" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title" id="getCroppedCanvasTitle">Add new category</h4>
                            </div>
                            <div class="modal-body">

                              
                            </br>  
                        
                

                      <div class="modal-item form-group -top-30px">
                            <label class="required-label control-label col-md-3 col-sm-3 col-xs-12" for="email">Category Name:
                            </label>

                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <input type="text"  name="cat_name"  class="form-control col-md-7 col-xs-12 textbox"  >
                            </div>
                      </div>

                       <div class="modal-item form-group -top-30px">
                            <label class="required-label control-label col-md-3 col-sm-3 col-xs-12" for="email">Description :
                            </label>

                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <input type="text"  name="cat_description"  class="form-control col-md-7 col-xs-12 textbox"  >
                            </div>
                      </div>

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <button type="submit" name="submit" class="btn btn-info">Submit</button>
                            </div>
                          
                          </div>
                        </div>
                      </div><!-- /.modal -->

 </form>







                       <!-- Show the cropped image in modal -->
     <form class="form-horizontal" method="post" action="./core/Request/Categories/update.php"> 
             <div class="modal fade docs-cropped" id="editmodal" aria-hidden="true"  role="dialog" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title" id="getCroppedCanvasTitle">Edit new category</h4>
                            </div>
                            <div class="modal-body" id="edit-content">

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <button type="submit" name="submit" class="btn btn-info">Submit</button>
                            </div>
                      
                          </div>
                        </div>
                      </div><!-- /.modal -->


     </form>
