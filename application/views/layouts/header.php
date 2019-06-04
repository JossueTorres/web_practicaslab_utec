<!DOCTYPE html>
<html lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Practicas de Laboratorio</title>


  <!-- Bootstrap -->
  <link href="<?php echo base_url(); ?>assets/template/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap -->
  <link href="<?php echo base_url(); ?>assets/template/jquery-ui-1.9.2/css/ui-darkness/jquery-ui-1.9.2.custom.min.css" rel="stylesheet">
  <!-- Bootstrap -->
  <link href="<?php echo base_url(); ?>assets/template/wickedpicker/dist/wickedpicker.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?php echo base_url(); ?>assets/template/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?php echo base_url(); ?>assets/template/nprogress/nprogress.css" rel="stylesheet">


  <!-- iCheck -->
  <link href="<?php echo base_url(); ?>assets/template/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- bootstrap-wysiwyg -->
  <link href="<?php echo base_url(); ?>assets/template/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
  <!-- Select2 -->
  <link href="<?php echo base_url(); ?>assets/template/select2/dist/css/select2.min.css" rel="stylesheet">
  <!-- Switchery -->
  <link href="<?php echo base_url(); ?>assets/template/switchery/dist/switchery.min.css" rel="stylesheet">
  <!-- starrr -->
  <link href="<?php echo base_url(); ?>assets/template/starrr/dist/starrr.css" rel="stylesheet">
  <!-- bootstrap-daterangepicker -->
  <link href="<?php echo base_url(); ?>assets/template/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">


  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/sweetAlert/sweetalert.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/datatables/dataTables.bootstrap.min.css">



  <!-- Style Personalizado -->
  <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
  <style>
    .botonesList {
      float: right;
    }
  </style>
  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>assets/template/jquery/dist/jquery.min.js"></script>

  <!-- The core Firebase JS SDK is always required and must be listed first -->
  <script src="https://www.gstatic.com/firebasejs/6.1.0/firebase-app.js"></script>
  <!-- Add additional services that you want to use -->
  <script src="https://www.gstatic.com/firebasejs/6.1.0/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/6.1.0/firebase-database.js"></script>

  <!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#config-web-app -->

  <script>
    // Your web app's Firebase configuration
    var firebaseConfig = {
      apiKey: "AIzaSyBpHUZPHz4Vzm_tazZjBVxcHI_U5NfyvHA",
      authDomain: "practicas-df991.firebaseapp.com",
      databaseURL: "https://practicas-df991.firebaseio.com",
      projectId: "practicas-df991",
      storageBucket: "practicas-df991.appspot.com",
      messagingSenderId: "1057359215817",
      appId: "1:1057359215817:web:e14cde41471629df"

      //Alexis
      // apiKey: "AIzaSyBpHUZPHz4Vzm_tazZjBVxcHI_U5NfyvHA",
      // authDomain: "practicas-df991.firebaseapp.com",
      // databaseURL: "https://practicas-df991.firebaseio.com",
      // projectId: "practicas-df991",
      // storageBucket: "practicas-df991.appspot.com",
      // messagingSenderId: "1057359215817",
      // appId: "1:1057359215817:web:e14cde41471629df"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
  </script>
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="Inicio" class="site_title"><i class="fa fa-shopping-bag "></i> <span>PRACTICAS</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="<?php echo base_url() ?>assets/template/dist/img/user.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span><b>Bienvenido</b></span>
              <h2><?php echo $this->session->userdata("usrnombre") ?></h2>
            </div>
            <div class="clearfix"></div>
          </div>
          <!-- /menu profile quick info -->

          <br />