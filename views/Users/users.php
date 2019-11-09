
 <?php



    $users  = new Users();

    $users->update();

    $Lists = $users->index();

if(isset($_POST['new'])){
    header("Location: users.php?page=add");
}

 if(isset($_POST['checkbox'])){

    $option = $_POST['change'];

    if ($option == 0){
      echo "Invalid option";
    }
     
    foreach($_POST['checkbox'] as $id) {   
                      
      $users->ChangeUserRole($option,$id);

    }
  }



 if(isset($_POST['checkbox'])){
        

        foreach($_POST['checkbox'] as $id){

            
            if(isset($_POST['delete'])){

                  
                  $users->delete($id);

                  redirect("users.php");
                     
            }          
            

        }
    }

?>






<form method="post" action="users.php?page=search">
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
                    <h2>List of user <small class="count"><?php echo $Lists->num_rows ?></small> </h2>


 <div class="form-inline">
<div class="input-group pull-right">
      <select class="form-control col-md-3" name="change">
        <option value="0">Change role to </option>
        <option value="Administrator">Administrator</option>
        <option value="Encoder">Encoder</option>
        <option value="Cashier">Cashier</option>
      </select>
      <span class="input-group-btn">
        <button class="btn btn-info" type="submit">Apply</button>
      </span>
</div><!-- /input-group -->
<div class="form-group pull-right">

<div class="btn-group" role="group" aria-label="..."> 

<button type="submit" name="new"  class="btn btn-info btn-padding" data-toggle="tooltip" data-placement="bottom" title="New users"><i class="fa fa-plus"></i></button>  

<button type="button" class="btn btn-info btn-padding" data-toggle="tooltip" data-placement="bottom" title="Export"><i class="fa  fa-upload"></i></button>

<button type="button" class="btn btn-info btn-padding" data-toggle="tooltip" data-placement="bottom" title="Import"><i class="fa  fa-download"></i></button>


<button type="submit"   id="delete" name="delete"  class="btn btn-info btn-padding enabled" data-toggle="tooltip" data-placement="bottom" title="Delete user" disabled><i class="fa fa-times" ></i></button>

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
    <th>Username</th>
    <th>Name</th>
    <th>Email</th>
    <th>Role</th>
     <th></th>

   
    
</tr>

</thead>
<tbody>

<?php

 

 foreach ($Lists as $key => $db) {


      $id = $db['id'];
      echo "<tr>";
      echo "<th><input type='checkbox' name='checkbox[]' class='checked' value='$id '></th>";
      echo "<th>". $db['username'] ."</th>";
      echo "<th>". $db['fname'] ." ". $db['lname'] ."</th>";
      echo "<th>".$db['email']."</th>";
      echo "<th>".$db['role']."</th>";
      echo "<th><a href='users.php?page=profile&id=$id;'>View</a></th>";
      echo "<th><a href='users.php?page=edit&id=$id'>Edit</a></th>";          
      echo "</tr>";

    
 }


?>
</tbody>
</table>


                  </div>
                </div>
  <nav aria-label="Page navigation" class="pull-right">
  <ul class="pagination">
  

   <?php
    
    $users->pagination();

    ?> 

  </ul>
</nav>

              </div>
            </div>
</form>