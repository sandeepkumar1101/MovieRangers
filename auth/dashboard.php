<?php
include 'partials/_dbconnect.php';
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header('location: login.php');
    exit;
}

$login = false;
if(isset($_SESSION['loggedin'])){
  $login = true;
}

?>



<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Dashboard</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon -->
        
       

        <!-- Google Fonts -->
        <link href="assets/css/css.css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet">

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

		<!-- Fontawesome Icon -->
        <link rel="stylesheet" href="assets/css/assets/font-awesome.min.css">

	
       

        <!-- Owl Slider -->
        <link rel="stylesheet" href="assets/css/assets/owl.carousel.min.css">

        <!-- Custom Style -->
        <link rel="stylesheet" href="assets/css/assets/normalize.css">
        <link rel="stylesheet" href="assets/css/style.css">
      <style>
          body{
            background-color: rgba(var(--bs-light-rgb), var(--bs-bg-opacity)) !important;
          }
      </style>

    </head>
    <body>

     <?php include '../free/partials/_nav.php'
     ?>

        <!-- Breadcrumb Area -->
        <!-- <section class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb-box text-center">
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item"><a href="assets/">Home</a></li>
                                <li class="list-inline-item"><span>||</span> Account Detail</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- End Breadcrumb Area -->

        <!-- Track Order -->
        <section class="tr-order">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tr-box">
                            <form action="#">
                                <h5>Account Detail</h5>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>USERNAME</label>
                                        <?php $username = $_SESSION['username']; 
                                           echo '<p style="padding:10px;">'.$username.'</p>'
                                           ?>

                                    </div>
                                    <div class="col-md-12">
                                        <label>PASSWORD</label>
                                        <p style="padding:10px;">........</p>
                                    </div>
                                    <div class="col-md-12">
                                        <label>Subscription status</label>
                                        <?php $sub = $_SESSION['is_subcribed'] ;
                                          if($sub==1){
                                          
                                          echo '<p style="padding:10px;">1 Month plan</p>';
                                        }else{
                                            echo '<p style="padding:10px;">You are not <a style="color:blue;font-size:2vw;" href="subscribe.php">Subscribed</a> </p>';
                                        }
                                          ?>
                                    </div>
                                    <div class="col-md-12">
                                        <button style="margin-top:20px;" type="button" name="button">Change Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Track Order -->


        <!-- jQuery JS -->
        <script src="assets/js/assets/vendor/jquery-1.12.4.min.js"></script>

        <!-- Bootstrap -->
        <script src="assets/js/assets/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <!-- Owl Slider -->
        <script src="assets/js/assets/owl.carousel.min.js"></script>

   

    </body>
</html>
