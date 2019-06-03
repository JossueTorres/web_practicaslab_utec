<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Iniciar Sesión</title>

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/sweetAlert/sweetalert.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/css/style.css">

  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>assets/template/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/template/sweetAlert/sweetalert.js"></script>

  <style>
    .MainCont {
      height: auto;
      width: 90%;
      max-width: 300px;
      margin-top: 50px;
    }

    body {
      background-color: #5D0A28;
    }

    .Titulo {
      color: #fff;
      margin-bottom: 20px;
      transform: scale(1.5);
      font-weight: bold;
    }

    .Titulo:hover {
      transform: scale(1.6);
      cursor: pointer;

    }

    .onH:hover {
      transform: scale(1.1);
      cursor: pointer;
    }
  </style>
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
      apiKey: "AIzaSyB4JQ_A4o6sfVloiwG42t8xB_BwFgm3dXI",
    authDomain: "applab-9034b.firebaseapp.com",
    databaseURL: "https://applab-9034b.firebaseio.com",
    projectId: "applab-9034b",
    storageBucket: "applab-9034b.appspot.com",
    messagingSenderId: "998271382901",
    appId: "1:998271382901:web:b64304d5e40c14aa"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
  </script>
</head>

<body>
  <center>
    <div class="MainCont">
      <h1 class="Titulo">Practicas</h1>
      <div class="panel panel-primary">
        <form action="<?php echo base_url('Auth/login2'); ?>" method="post" class="" data-type-form="login" autocomplete="off">
          <div class="panel-header">
            <h4 class="onH">Iniciar Sesion</h4>
          </div>
          <div class="panel-body">
            <input name='txtUsr' id='txtUsr' type="text" placeholder="Usuario" class="form-control txtUsr" /><br>
            <input name='txtPass' id='txtPass' type="password" placeholder="Contraseña" class="form-control txtPass" />
          </div>
          <div class="panel-footer">
            <button role="button" type="submit" class="hidden btn btnSingIn">Ingresar</button>
            <label class="btn btnSingInDet">Ingresar</label>
          </div>
        </form>
      </div>
    </div>
  </center>
  <!-- <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="form-row">
        <div class="login-form ">
          <form action="<?php echo base_url(); ?>Auth/login" method="post" class="" data-type-form="login" autocomplete="off">
            <div class="or-seperator"><i></i></div>
            <div class="form-row">
              <div class="form-group col-md-12 col-sm-12 col-xs-12">
                <label>estudiante -admin -lab</label>
                <input type="text" name="usuario" class="form-control" placeholder="usuario">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group">
                <button type="submit" class="btn btn-primary login-btn btn-block">Ingresar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div> -->
  <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/template/bootstrap/dist/js/bootstrap.min.js"></script> -->

  <script>
    var clickeado = false;

    function toggleSignIn() {
      if (firebase.auth().currentUser) {
        // [START signout]
        firebase.auth().signOut();
        // [END signout]
      }
      var email = $(".txtUsr").val();
      var password = $(".txtPass").val();
      if (email.length < 4) {
        alert('Ingrese un Correo.');
        return false;
      }
      if (password.length < 4) {
        alert('Ingrese una contraseña.');
        return false;
      }
      // Sign in with email and pass.
      // [START authwithemail]
      firebase.auth().signInWithEmailAndPassword(email, password).then(function() {

        //aqui 
        var user = firebase.auth().currentUser;

        //id que vas a pasar a php
        var  uid = user.uid;
        
          if (user) 
            console.log("ok", uid);
          else 
            console.log("no");
          


        // alert("Logeado");
        // return true;
        $(".btnSingIn").click();
      }).catch(function(error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;
        // [START_EXCLUDE]
        if (errorCode === 'auth/wrong-password') {
          alert('Contraseña Incorrecta.');
        } else if('auth/user-not-found'){
          alert("El usuario no existe");
        } else {
          alert(errorCode + '\n' + errorMessage);
        }
        // alert(error + '\n'+ 'No se Ingresó');
        return false;
        // alert(false);
        // [END_EXCLUDE]
      });
    }
    $(function() {
      $(".btnSingInDet").click(function(e) {
        clickeado = true;
        toggleSignIn();
      });
      $(".btnSingIn").click(function(e) {
        // alert(clickeado);
        if (clickeado) {
          // $(this).unbind('submit').submit();
        } else {
          e.preventDefault();
        }
      });
    });
  </script>
</body>

</html>

<!-- TODO: El form de login es de hacerlo responsive, esto es a nivel front-end  -->