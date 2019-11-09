<?php include '../inc/db.php' ?>
<?php


        $item ="";
		$query = "SELECT * FROM sale_orders WHERE status = 'close' ";
        $query_result = mysqli_query($connect, $query);
        $count = mysqli_num_rows($query_result);
        
        $item .='<table class="table table-hover table-no-border">';
        $item .='<thead>';
        $item .='<tr>';
        $item .='<th>Order Number</th>';
        $item .='<th>Amount</th>';
        $item .='<th>Action</th>';
        $item .='</tr>';
        $item .='</thead>';

        while($db = mysqli_fetch_assoc($query_result))

        {
        $item .='<tbody>';
        $item .='<tr>';
        $item .='<th>'. $db['order_id'] .'</th>';
        $item .='<th>'. $db['amount'] .'</th>';
        $item .='<th><a href="">Select</a></th>';
        $item .='</tr>';
        $item .='</tbody>';
        	
     	}


         echo $item;
	



?>