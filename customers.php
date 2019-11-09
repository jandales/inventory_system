<?php include 'views/inc/head.php' ?>
<?php include 'views/inc/navigation.php' ?>

<div class="page-title">

			<div class="title_left">
					<?php display_message() ?>
			<h3>Customers</h3>
			</div>
<?php

	



	if(isset($_GET['page'])){
		$page =$_GET['page'];
	}else{
		$page ="";
	}

	switch ($page) {
		case 'add':
			include 'views/Customers/customers_add.php';
		break;

		case 'edit':
			include 'views/Customers/customers_edit.php';
		break;

		case 'profile':
			include 'views/Customers/customers_profile.php';
		break;

		case 'search':
			include 'views/Customers/customers_search.php';
		break;
		
		default:
			include 'views/Customers/customers.php';
		break;
	}

?>     

        
<?php include 'views/inc/footer.php' ?>