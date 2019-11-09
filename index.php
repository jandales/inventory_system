<?php include 'views/inc/head.php' ?>
<?php include 'views/inc/navigation.php' ?>

                 <div class="page-title">
              <div class="title_left">
                <h3>Dashboard</h3>
              </div>

          
            </div>

               <div class="clearfix"></div>

<?php
  
  $dashboard =  new Dashboard();

  $data = $dashboard->index();
  

?>






            <div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-caret-"></i></div>
                  <div class="count"><?php echo $data['products'] ?></div>
                  <h3>Items</h3>
                 
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-hdd"></i></div>
                  <div class="count"><?php echo $data['invoice'] ?></div>
                  <h3>Sales</h3>
                
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-hdd"></i></div>
                  <div class="count"><?php echo $data['sales_order'] ?></div>
                  <h3>Order</h3>
                
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-user"></i></div>
                  <div class="count"><?php echo $data['customers'] ?></div>
                  <h3>Customer</h3>
                
                </div>
              </div>
            </div>
            </br>


    


      
        
<?php include 'views/inc/footer.php' ?>