﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Schronisko Admin</title>
  <!-- BOOTSTRAP STYLES-->
  <!-- <link href="assets/css/bootstrap.css" rel="stylesheet" /> -->
  <!-- FONTAWESOME STYLES-->
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <!-- CUSTOM STYLES-->
  <link href="assets/css/custom.css" rel="stylesheet" />
  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

  <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">
  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/style.css">

  <style>
    .fa:hover {
      color: greenyellow;
    }
  </style>
</head>

<body>

  <div class="wrap">
    <div class="container">
      <div class="row">
        <div class="col-md-6 d-flex justify-content-md-end">
          <div class="social-media">
            <p class="mb-0 d-flex">
              <!-- login -->
              <a href="#" class="d-flex align-items-center justify-content-center"></a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar" style="z-index:1;">
    <div class="container">
      <a class="navbar-brand" href="#"><span class="flaticon-pawprint-1 mr-2"></span>Panel Admina</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fa fa-bars"></span> Menu
      </button>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="admin.php" class="nav-link" style="z-index: -10;">Witaj Adminie!</a></li>
        </ul>
      </div>
    </div>
  </nav>
  </div>

  <!-- /. NAV SIDE  -->
  <div id="page-wrapper">
    <div id="page-inner">
      <div class="row">
        <div class="col-lg-12">
          <h2>ADMIN DASHBOARD</h2>
        </div>
      </div>
      <!-- /. ROW  -->
      <hr />
      <div class="row">
        <div class="col-lg-12 ">
          <div class="alert alert-info">
            <strong>Witaj Adminie! </strong>
          </div>

        </div>
      </div>
      <!-- /. ROW  -->
      <div class="row text-center pad-top">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
          <div class="div-square">
            <a href="index.html">
              <i class="fa fa-desktop fa-5x"></i>
              <h4 style="font-size: 20px">Strona główna</h4>
            </a>
          </div>


        </div>

        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
          <div class="div-square">
            <a href="dodajzwierze.php">
              <i class="fa fa-plus fa-5x"></i>
              <h4 style="font-size: 20px">Dodaj zwierzę</h4>
            </a>
          </div>


        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
          <div class="div-square">
            <a href="zaadoptuj.php">
              <i class="fa fa-heart-o fa-5x"></i>
              <h4 style="font-size: 20px">Zaadoptuj</h4>
            </a>
          </div>


        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
          <div class="div-square">
            <a href="usunzwierze.php">
              <i class="fa fa-times fa-5x"></i>
              <h4 style="font-size: 20px">Usuń Zwierzę</h4>
            </a>
          </div>


        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
          <div class="div-square">
            <a href="przegladaj.php">
              <i class="fa fa-search fa-5x"></i>
              <h4 style="font-size: 20px">Przeglądaj</h4>
            </a>
          </div>


        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
          <div class="div-square">
            <a href="adopcje.php">
              <i class="fa fa-list-ul fa-5x"></i>
              <h4 style="font-size: 20px">Adopcje</h4>
            </a>
          </div>

          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
          <div class="div-square">
            <a href="logout.php">
              <i class="fa fa-sign-out fa-5x"></i>
              <h4 style="font-size: 20px">Logout</h4>
            </a>
          </div>
        </div>

          <!-- /. ROW  -->

          <!-- /. ROW  -->
        </div>
        <!-- /. PAGE INNER  -->
      </div>
      <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- <div class="footer">
      
    
            <div class="row">
                <div class="col-lg-12" >
                    &copy;  2014 yourdomain.com | Design by: <a href="http://binarytheme.com" style="color:#fff;" target="_blank">www.binarytheme.com</a>
                </div>
            </div>
        </div> -->


    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.timepicker.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>

</body>

</html>