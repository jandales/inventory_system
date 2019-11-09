 <?php 


if(isset($_POST['btnsearch'])){

    $input = $_POST['search'];

  

    $customers = new Customers();



   $Lists = $customers->search($input);


  }



  if(isset($_POST['close'])){
    header("Location: customers.php");
  }
  if(isset($_POST['new'])){
    header("Location: customers.php?page=add");
  }

 if(isset($_POST['checkbox'])){

   action_customers();
   }

 ?>






<form method="post" action="customers.php?page=search">
    <div class="title_right">
          <div class="col-md-7 col-sm-7 col-xs-12 form-group pull-right top_search">
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
                    <h2>List of Customers <small class="count"><?php echo $Lists->num_rows ?></small> </h2>


 <div class="form-inline">

<div class="form-group pull-right">

<div class="btn-group" role="group" aria-label="..."> 

<button type="submit" name="new"  class="btn btn-info btn-padding" data-toggle="tooltip" data-placement="bottom" title="New customer"><i class="fa fa-plus"></i></button>  

<button type="button" class="btn btn-info btn-padding" data-toggle="tooltip" data-placement="bottom" title="Export"><i class="fa  fa-upload"></i></button>

<button type="button" class="btn btn-info btn-padding" data-toggle="tooltip" data-placement="bottom" title="Import"><i class="fa  fa-download"></i></button>

<button type="submit"   name="profile" class="btn btn-info btn-padding enabled" data-toggle="tooltip" data-placement="bottom" title="View Profile" disabled><i class="fa  fa-users"></i></button>

<button type="submit"  name="edit"  class="btn btn-info btn-padding enabled" data-toggle="tooltip" data-placement="bottom" title="Edit customer" disabled ><i class="fa fa-edit"></i></button>

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
    <th>CUSTOMER ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Balance</th>
    <th></th>

   
    
</tr>

</thead>
<tbody>

<?php


 

    foreach ($Lists as $key => $db) {
         
          $id = $db['id']; 
                               
          echo "<tr>";
          echo "<th><input type='checkbox' name='checkbox[]' class='checked' value='$id'></th>";
          echo "<th>" . $db['customer_id'] . "</th>";
          echo "<th><a href='customers.php?page=profile&id=". $db['customer_id'] ."'>". $db['fname'] ." ". $db['lname'] ."</a></th>";
          echo "<th>" . $db['email'] . "</th>";
          echo "<th>". $db['phone'] ."</th>";
          echo '<th><a class="balance">₱0.00</a></th>';
          echo "<th><ul class='table-action'>
                      <li><a class='pay'>Pay<a></li>
                      <li><a href='customers.php?page=edit&id=$id'>Edit<a></li>
                    </ul></th>";      
          echo "</tr>";

    }


     




?>
</tbody>
</table>


                  </div>
                </div>


              </div>
            </div>
</form>

