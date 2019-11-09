<?php

function fetch_invoice()
{

      global $connect;
      global $totalpage;
      global $page;

     $query_count =query("SELECT * FROM invoice");
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
     $query = query("SELECT * FROM invoice  $limit ");
     $count = count_result($query);


     if($count == 0){
        echo "<tr>";
        echo "<th colspan='7' style='text-align:center;'>No invoice in the database</th>";
        echo "</tr>";
     }else{
      while($db = fetch_array($query)){
      $id = $db['invoice_number'];
      $cu_id = $db['customer_id'];


      $customer = query("SELECT * FROM customers WHERE customer_id = '{$cu_id}' ");
        while ($cu =fetch_array($customer)) {
        $fname =$cu['fname'];
         $lname =$cu['lname'];
         $customer_id = $cu['customer_id'];
         $name = $fname ." ". $lname;
 
     }

                                 
      echo "<tr>";
      echo "<th><input type='checkbox' name='checkbox[]' class='checked' value='".$db['invoice_number']."'></th>";
      echo "<th><a href='invoice.php?page=item&id=".$db['invoice_number']."'>". $db['invoice_number'] . "</a></th>";
      echo "<th><a href='customers.php?page=profile&id=".$customer_id."' >". $name . "</a></th>";
      echo "<th><a class='balance'>". $db['balance'] ."</a></th>";
      echo "<th>". $db['invoice_date']."</th>";
      echo "<th><a href='orders.php?delete=".$db['invoice_number']."'>Delete<a></th>"; 
      echo "</tr>";


      }


     }



}


function invoice_pager(){
  global $totalpage;
  global $page;
  
   if($totalpage > 1){

      $i = "";
    if ($page > 1) {
          $i =  $page - 1;
      echo "<li><a href='invoice.php?page={$i}' ><i class='fa fa-caret-left'></i></a></li><li>";
    }else{
        echo "<li><a href=''><i class='fa fa-caret-left'></i></a></li><li>";

    }

    for($i = 1; $i <= $totalpage; $i++){

      if($i == $page){

        echo "<a href='invoice.php?page={$i}' class='active_link'>$i</a></li><li>";
      }else{
        echo "<a href='invoice.php?page={$i}'>$i</a></li><li>";
      }

    }
    
    if ($page < $totalpage){
      $i =  $page + 1;
    echo "<a href='invoice.php?page={$i}' ><i  class='fa fa-caret-right'></i></a></li>";
    }else{
    echo "<a class='disabled'><i  class='fa fa-caret-right'></i></a></li>";
    }


    }
}