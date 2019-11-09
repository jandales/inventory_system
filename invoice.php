<?php include 'views/inc/head.php' ?>
<?php include 'views/inc/navigation.php' ?>

<div class="page-title">

			<div class="title_left">
					<?php display_message() ?>
			<h3>Sale Invoice</h3>
			</div>
<?php
	if(isset($_GET['page'])){
		$page =$_GET['page'];
	}else{
		$page ="";
	}

	switch ($page) {
		case 'add':
			include 'views/Invoice/invoice_add.php';
		break;

		case 'edit':
			include 'views/Invoice/products_edit.php';
		break;

		case 'item':
			include 'views/Invoice/order_sale_items.php';
		break;

		case 'search':
			include 'views/Invoice/orders_search.php';
		break;

		case 'pay':
			include 'views/Invoice/orders_payment.php';
		break;
		
		default:
			include 'views/Invoice/invoice.php';
		break;
	}

?>     

        
<?php include 'views/inc/footer.php' ?>