        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3 class="fuentetitulo">INICIO</h3>
              </div>


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
                          <div class="count">5</div>
                          <center>
                            <h4>Maquinas Disponibles</h4>
                          </center>
                          <p>
                            <h3> <a class="small-box-footer">Laboratorio 10  
                              <i style="cursor:pointer;" latitud="13.700353" longitud="-89.201844" class="fa fa-map"></i></a></h3>
                          </p>

                        </div>
                      </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">

                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-desktop"></i></div>
                          <div class="count">10</div>
                          <center>
                            <h4>Maquinas Disponibles</h4>
                          </center>
                          <p>
                            <h3> <a class="small-box-footer">Laboratorio 3  
                              <i style="cursor:pointer;" latitud="13.700478" longitud="-89.201578" class="fa fa-map"></i></a></h3>
                          </p>

                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- modal form -->
        <div class="modal fade" id="modal-map">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubicacion del Laboratorio</h4>
              </div>
              <div id="modmap" class="modal-body">
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <script>
          $(".fa-map").click(function() {
            var lat = $(this).attr("latitud");
            var lon = $(this).attr("longitud");
            $("#modmap").empty();
            var latlon =lat+","+lon;
            var urlmap = "https://maps.google.com/maps?q="+latlon;
            urlmap += "&hl=es;z=14&amp;output=embed";
            var html= "";
        html +=' <iframe width="100%" height="300px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'+ urlmap+'">';
        html +='</iframe>';
        html +='<br />';
        html +='<small>';
        html +='<a href="'+ urlmap +'" style="color:#0000FF;text-align:left" target="_blank">';
        html +='Ver Mapa Completo';
        html +='</small>';
        $("#modmap").append(html);
        $("#modal-map").modal('show');
        });
        </script>