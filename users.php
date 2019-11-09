<?php include 'views/inc/head.php' ?>
<?php include 'views/inc/navigation.php' ?>

<div class="page-title">

			<div class="title_left">
				
			<h3>Users</h3>
			</div>
<?php
	if(isset($_GET['page'])){
		$page =$_GET['page'];
	}else{
		$page ="";
	}

	switch ($page) {
		case 'add':
			include 'views/Users/users_add.php';
		break;

		case 'edit':
			include 'views/users/users_edit.php';
		break;

		case 'profile':
			include 'views/Users/users_profile.php';
		break;

		case 'profile_edit':
			include 'views/Users/profile_edit.php';
		break;

		case 'search':
			include 'views/Users/users_search.php';
		break;
		
		default:
			include 'views/Users/users.php';
		break;
	}

?>     

        
<?php include 'views/inc/footer.php' ?>