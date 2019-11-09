<?php include '../inc/db.php' ?>
<?php include '../inc/function.php' ?>
<?php



 $query = "SELECT * FROM payment";
 $result = mysqli_query($connect, $query);
 $count =mysqli_num_rows($result);


if($count == null)
{
   $id =  "0001";
}
else
{
  $max_id =  $count + 1;
  $id ="000". $max_id;
}


 $query_order =query("INSERT INTO sale_orders(refenrce_no,person_id,amount,date_payment,methodcheck_no,type) VALUES ("'id'");



























