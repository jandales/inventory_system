
<?php

require_once('./config/config.php');


if(!isset($_SESSION['role'])){
       header("Location: login.php");
}else{
     if($_SESSION['role'] !== "Administrator"){
        header("Location: login.php ");
    }
}




?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Inventory System | </title>

    <!-- Bootstrap -->
    <link href="./app/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="./app/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="./app/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="./app/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="./app/build/css/custom.css" rel="stylesheet">
      <!-- Custom Theme Style -->
    <link href="./app/build/css/custom1.css" rel="stylesheet">
 
     <link href="./app/vendors/select2/dist/css/select2.min.css" rel="stylesheet">

    


  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span>Inventory System</span></a>
            </div>

            <div class="clearfix"></div>



    