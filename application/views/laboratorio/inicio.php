        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3 class="fuentetitulo">INICIO</h3>
              </div>

              <?php if (!empty($resp)) {
                    $Uso = 0;
                    $Dis = 0;
                    $Res = 0;
                    foreach ($resp as $maq) {
                        if ($maq->maq_estado_maquina == "A") {
                          if ($maq->maq_estado_reserva == "I") {
                            $Res ++;
                          }
                          if ($maq->maq_estado_reserva == "D") {
                            $Dis ++;
                          }
                          if ($maq->maq_estado_reserva == "O") {
                            $Uso ++;
                          }
                        }
                    }
                  }
                      ?>
                      
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <div class="row top_tiles">
                    
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-desktop"></i></div>
                  <div class="count"><?php echo $Uso; ?></div>
                  <h4>&nbsp&nbsp Maquinas en Uso</h4>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-desktop"></i></div>
                  <div class="count"><?php echo $Dis; ?></div>
                  <h4>&nbsp&nbsp Maquinas Disponibles</h4>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-desktop"></i></div>
                  <div class="count"><?php echo $Res; ?></div>
                  <h4>&nbsp&nbsp Maquinas Reservadas</h4>
                </div>
              </div>
      </diV>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- TODO: 
                  Interfaz de inicio: 
                 +Agregar un listado de laboratorios o las practicas disponibles por dia 
                 +Falta implementar alertas
                 -->
    