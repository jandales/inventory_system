<?php include 'views/inc/head.php' ?>
<?php include 'views/inc/navigation.php' ?>

<div class="page-title">

			<div class="title_left">
					<?php display_message() ?>
			<h3>Sale Orders</h3>
			</div>
<?php
	if(isset($_GET['page'])){
		$page =$_GET['page'];
	}else{
		$page ="";
	}

	switch ($page) {
		case 'add':
			include 'views/Orders/order_sale.php';
		break;

		case 'edit':
			include 'views/Orders/products_edit.php';
		break;

		case 'item':
			include 'views/Orders/order_sale_items.php';
		break;

		case 'search':
			include 'views/Orders/orders_search.php';
		break;

		case 'pay':
			include 'views/Orders/order_payment.php';
		break;
		
		default:
			include 'views/Orders/orders.php';
		break;
	}

?>     

        
<?php include 'views/inc/footer.php' ?>