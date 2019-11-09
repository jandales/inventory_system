<?php include 'views/inc/head.php' ?>
<?php include 'views/inc/navigation.php' ?>

<div class="page-title">

			<div class="title_left">
					<?php display_message() ?>
			<h3>Products</h3>
			</div>
<?php
	if(isset($_GET['page'])){
		$page =$_GET['page'];
	}else{
		$page ="";
	}

	switch ($page) {
		case 'add':
			include 'views/Products/products_add.php';
		break;

		case 'edit':
			include 'views/Products/products_edit.php';
		break;

		case 'inventory':
			include 'views/Products/inventory.php';
		break;

		case 'search':
			include 'views/Products/products_search.php';
		break;
		
		default:
			include 'views/Products/products.php';
		break;
	}

?>     

        
<?php include 'inc/footer.php' ?>