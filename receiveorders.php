<?php include 'views/inc/head.php' ?>
<?php include 'views/inc/navigation.php' ?>

<div class="page-title">

			<div class="title_left">
					<?php display_message() ?>
				<div class="alert alert-success recieve_alert">
				<a href="#" class="close recieve_alert" data-dismiss="alert" aria-label="close">&times;</a><span>Order Recieved!!!</span>
				</div>
			<h3>Recieving</h3>
			</div>
<?php
	if(isset($_GET['page'])){
		$page =$_GET['page'];
	}else{
		$page ="";
	}

	switch ($page) {
		case 'add':
			include 'views/Recieving/receiveorder_add.php';
		break;

		case 'edit':
			include 'views/Recieving/receiveorder_edit.php';
		break;

		case 'item':
			include 'views/Recieving/receiveorders_item.php';
		break;

		case 'payment':
			include 'views/Recieving/receiveorders_payment.php';
		break;

		case 'search':
			include 'views/Recieving/receiveorders_search.php';
		break;
		
		default:
			include 'views/Recieving/receiveorders.php';
		break;
	}

?>     

        
<?php include 'views/inc/footer.php' ?>