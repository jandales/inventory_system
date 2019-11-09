<?php include 'views/inc/head.php' ?>

<?php include 'views/inc/navigation.php' ?>

<div class="page-title">

			<div class="title_left">
					<?php display_message() ?>
			<h3>Suppliers</h3>
			</div>
<?php

	if(isset($_GET['page'])){
		$page =$_GET['page'];
	}else{
		$page ="";
	}

	switch ($page) {
		case 'add':
			include 'views/Suppliers/suppliers_add.php';
		break;

		case 'edit':
			include 'views/Suppliers/suppliers_edit.php';
		break;

		case 'profile':
			include 'views/Suppliers/suppliers_profile.php';
		break;

		case 'search':
			include 'views/Suppliers/suppliers_search.php';
		break;


		case 'export':
			include 'views/Suppliers/export.php';
		break;
		
		default:
			include 'views/Suppliers/suppliers.php';
		break;
	}

?>     

        
<?php include 'views/inc/footer.php' ?>