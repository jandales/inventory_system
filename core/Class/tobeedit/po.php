<?php

function get_PO(){
global $connect;
global $totalpage;

 $query_count ="SELECT * FROM  purchase_order ";
     $result_count = mysqli_query($connect, $query_count);
     $pagecount = mysqli_num_rows($result_count);
     
     $query = "SELECT * FROM settings WHERE setting_name = 'page' ";
     $setting_result = mysqli_query($connect, $query);

     while ($value = mysqli_fetch_assoc($setting_result)) {
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

$query = "SELECT * FROM purchase_order $limit ";
$query_result = mysqli_query($connect, $query);
$count = mysqli_num_rows($query_result);

$PO_list ="";
 echo  '<table class="table table-hover table-no-border">';

 echo  "<thead>";
 echo  "<tr>";
 echo  '<th width="1%;"><input type="checkbox" class="checkbox" id ="selectall"></th>';
 echo  '<th>PO number</th>';
 echo  '<th>Supplier</th>';
 echo  '<th>Status</th>';
 echo '<th>Amount</th>';
 echo  '<th>Date Issue</th>';
 echo  '<th>Due date</th>';
 echo  "<th>Action</th>";
 echo  '</tr>';
 echo  '</thead>';
 echo  '<tbody>';



  



if($count == 0){
        echo  "<tr>";
        echo  "<th colspan='8' style='text-align:center;'><h4>No purchase order</h4></th>";
        echo  "</tr>";
}else{
      while($db = mysqli_fetch_assoc($query_result)){
    
       $supplier_id = $db['supplier'];
        $status = $db['status'];
      $query_sup = "SELECT * FROM suppliers WHERE supplier_id = '{$supplier_id}' ";
      $result = mysqli_query($connect, $query_sup);

      while($cat = mysqli_fetch_assoc($result)){
         $sup_name = $cat['campany'];
      }
     
                             
       echo  "<tr>";
       echo  "<th><input type='checkbox' name='checkbox[]' class='checked' value='".$db['po_id']."'></th>";
       echo  "<th><a href='Purchaseorder.php?page=item&po_id=".$db['po_id']."'>".$db['po_id']."</a></th>";
       echo  "<th><a>$sup_name</a></th>";
       

    
       if($status  == 'Recieved')
       {
        echo  "<th style='color:#9C27B0;'>$status</th>";
      }elseif($status  == 'Void')
       {
        echo  "<th style='color:red;'>$status </th>";
       }else{
         echo  "<th style='color:green;'>$status </th>";
       }
      
       echo  "<th>".$db['amount']."</th>";
       echo  "<th>".$db['date_issued']."</th>";
       echo  "<th>".$db['due_date']."</th>";
       echo  "<th> <a href='Purchaseorder.php?delete=".$db['po_id']."'>Delete</a></th>";
     	 echo  "</tr>";
      }


     }



 echo   '</tbody>';
 echo  '</table>';  
    
    
   
   





}






















?>