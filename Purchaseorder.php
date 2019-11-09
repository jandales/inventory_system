<?php include 'views/inc/head.php' ?>
<?php include 'views/inc/navigation.php' ?>

<div class="page-title">

			<div class="title_left">
					<?php display_message() ?>
			<h3>Purchase Order</h3>
			</div>
<?php
	if(isset($_GET['page'])){
		$page =$_GET['page'];
	}else{
		$page ="";
	}

	switch ($page) {
		case 'add':
			include 'views/form/purchase/purchase_add.php';
		break;

		case 'edit':
			include 'views/form/purchase/purchase_edit.php';
		break;

		case 'item':
			include 'views/form/purchase/purchase_item.php';
		break;

		case 'search':
			include 'views/form/purchase/purchaseorder_search.php';
		break;
		
		default:
			include 'views/form/purchase/purchaseorder.php';
		break;
	}

?>     

        
<?php include 'views/inc/footer.php' ?>