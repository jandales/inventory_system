<?php require_once('config/config.php'); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Inventory System|Login </title>

    <!-- Bootstrap -->
    <link href="app/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="app/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="app/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="app/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="app/build/css/custom.css" rel="stylesheet">
  </head>

  <body class="login">
   
    
      <div class="login_wrapper">
  
        <div class="">
          <section class="login_content">
           
              <h1>Inventory System</h1>
              <form action="./core/Request/login.php" method="post"> 
                <div class="form-horizontal">

                      <div class="col-md-12 form-group has-feedback">
                        <input type="username" class="form-control has-feedback-left" id="username" name="username"  placeholder="Username or Email">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

                   

                      <div class="col-md-12 form-group has-feedback">
                        <input type="password" class="form-control has-feedback-left" name="password" placeholder="Password">
                        <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
                      </div>

                    
                      <div class="form-group">
                        <div class="col-md-12 col-sm12 col-xs-12">
                          <button type="submit" name="login" class="btn btn-success">Login to continue</button>
                        </div>
                      </div>

                    </div>
                 </form>


          
           
          </section>
        </div>

   
      </div>
   <!-- jQuery -->
    <script src="app/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="app/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="app/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="app/vendors/nprogress/nprogress.js"></script>
    <!-- jQuery custom content scroller -->
    <script src="app/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="app/build/js/custom.min.js"></script>

     <!-- Custom Theme Scripts -->
    <script src="app/build/js/functions.js"></script>
  </body>
</html>
