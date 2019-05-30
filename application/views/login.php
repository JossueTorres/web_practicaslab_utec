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

</head>

<body>
  <center>
    <div class="MainCont">
      <h1 class="Titulo">Practicas</h1>
      <div class="panel panel-primary">
        <form action="<?php echo base_url(); ?>Auth/login" method="post" class="" data-type-form="login" autocomplete="off">
          <div class="panel-header">
            <h4 class="onH">Iniciar Sesion</h4>
          </div>
          <div class="panel-body">
            <input name='txtUsr' id='txtUsr' type="text" placeholder="Usuario" class="form-control" /><br>
            <input name='txtPass' id='txtPass' type="password" placeholder="Contraseña" class="form-control" />
          </div>
          <div class="panel-footer">
            <button role="button" type="submit" class="btn">Ingresar</button>
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
</body>

</html>

<!-- TODO: El form de login es de hacerlo responsive, esto es a nivel front-end  -->