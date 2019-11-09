<?php

function fetch_orders(){
	global $connect;
  global $totalpage;
	global $page;



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
     $query = query("SELECT * FROM sale_orders  $limit ");
     $count = count_result($query);


     if($count == 0){
        echo "<tr>";
        echo "<th colspan='7' style='text-align:center;'>No Orders in the database</th>";
        echo "</tr>";
     }else{
      while($db = fetch_array($query)){
      $id = $db['order_id'];
      $cu_id = $db['customer'];


        $customer = query("SELECT * FROM customers WHERE customer_id = '{$cu_id}' ");
        while ($cu =fetch_array($customer)) {
        $fname =$cu['fname'];
         $lname =$cu['lname'];
         $customer_id = $cu['customer_id'];
         $name = $fname ." ". $lname;
 
     }

                                 
   

     }

}

function insert_orders(){
   global $connect;
   global $ro_id;
   $query_order =query("INSERT INTO sale_orders(order_id,customer,quantity,amount,po_number,date_order,due_date,taxable,status,subtotal,balance) VALUES ('".$ro_id."','".$_POST['customer_name']."','".$_POST['quantity']."','".$_POST['amount']."','".$_POST['po_number']."','".$_POST['dateorder']."','".$_POST['due_date']."','".$_POST['taxable']."','open','".$_POST['subtotal']."','".$_POST['amount']."')");
}

function insert_payment(){
     global $connect;
     global $ro_id;
     $query_payemnt =query("INSERT INTO customer_payment(order_id,customer_name,amount_due,payment_method, check_no, date_payment,employee) VALUES ('".$ro_id."','".$_POST['customer_name']. "','".$_POST['amount_due']."','".$_POST['method']."','N/A','".$_POST['dateorder']."','".$_SESSION['username']."')");
}

function insert_paymentw_check(){
     global $connect;
     global $ro_id;
   $query_payemnt =query("INSERT INTO customer_payment(order_id,customer_name,amount_due,payment_method, check_no, date_payment,employee) VALUES ('".$ro_id."','".$_POST['customer_name']. "','".$_POST['amount_due']."','".$_POST['method']."','".$_POST['checknumber']."','".$_POST['dateorder']."','".$_SESSION['username']."')");
}

function orders_pager(){
  global $totalpage;
  global $page;
  
   if($totalpage > 1){

      $i = "";
    if ($page > 1) {
          $i =  $page - 1;
      echo "<li><a href='orders.php?page={$i}' ><i class='fa fa-caret-left'></i></a></li><li>";
    }else{
        echo "<li><a href=''><i class='fa fa-caret-left'></i></a></li><li>";

    }


    for($i = 1; $i <= $totalpage; $i++){
      if($i == $page){

        echo "<a href='orderss.php?page={$i}' class='active_link'>$i</a></li><li>";
      }else{
        echo "<a href='orders.php?page={$i}'>$i</a></li><li>";
      }

    }
    if ($page < $totalpage){
      $i =  $page + 1;
    echo "<a href='orders.php?page={$i}' ><i  class='fa fa-caret-right'></i></a></li>";
    }else{
    echo "<a class='disabled'><i  class='fa fa-caret-right'></i></a></li>";
    }


    }
}

?>