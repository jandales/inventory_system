<?php include 'views/inc/head.php' ?>
// <?php include 'views/inc/navigation.php' ?>

<div class="page-title">

			<div class="title_left">
				
			<h3>App Configuration</h3>
			</div>
<?php
	if(isset($_GET['page'])){
		$page =$_GET['page'];
	}else{
		$page ="";
	}

	switch ($page) {
		
		
		default:
			include 'views/setting.php';
		break;
	}

?>     

        
<?php include 'views/inc/footer.php' ?>