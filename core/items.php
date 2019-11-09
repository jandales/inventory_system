<?php include '../inc/db.php' ?>
<?php


	    $item="";
		$query = "SELECT * FROM products";
        $query_result = mysqli_query($connect, $query);
        $count = mysqli_num_rows($query_result);
        $item .= "<option></option>";
        while($db = mysqli_fetch_assoc($query_result))

        {
        	
        	$item .= "<option value =". $db['item_id'] .">". $db['item_name'] ."</option>";
     	}
         echo $item;
	



?>