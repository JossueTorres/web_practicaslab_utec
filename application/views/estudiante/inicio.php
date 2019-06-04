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
                    <div id="Contenedor-maquinas" class="row top_tiles">

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
          $('#Contenedor-maquinas').on('click', '.fa-map', function() {
            var lat = $(this).attr("latitud");
            var lon = $(this).attr("longitud");
            $("#modmap").empty();
            var latlon = lat + "," + lon;
            var urlmap = "https://maps.google.com/maps?q=" + latlon;
            urlmap += "&hl=es;z=14&amp;output=embed";
            //console.log($(this));
            var html = "";
            html += ' <iframe width="100%" height="300px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="' + urlmap + '">';
            html += '</iframe>';
            html += '<br />';
            html += '<small>';
            html += '<a href="' + urlmap + '" style="color:#0000FF;text-align:left" target="_blank">';
            html += 'Ver Mapa Completo';
            html += '</small>';
            $("#modmap").append(html);
            $("#modal-map").modal('show');
          });
          setInterval(CambiarCantidadMaquinas, 3000);

          GetMaquinasDisponibles();
          var cont = 60;
          function cambio_maquinas(lab,cant){
            $('#Contenedor-maquinas .count').each(function(){
                var cod = ($(this).attr("codigo"));
                if(cod == lab){
                  $(this).text(cant);
                }
            });
            
            //cont ++;

           // $('#Contenedor-maquinas .count').text(cont);
           // console.log($('#Contenedor-maquinas .count'));
          }; 
          function GetMaquinasDisponibles() {
            $("#Contenedor-maquinas").empty();
            var urlbase = "<?php echo URLWS2; ?>";
            $.ajax({
                type: 'GET',
                url: urlbase + 'GetMaquinasDisponibles.php',
                dataType: 'json'
              })
              .done(function(data) {
                data.maquinas.forEach(function(maquinas, index) {
                  var content = ' ';

                  content += '<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">';
                  content += '<div class="tile-stats">';
                  content += '<div class="icon"><i class="fa fa-desktop"></i></div>';
                  content += '<div codigo="'+ maquinas.lab_codigo +'" class="count">' + maquinas.Maquinas + '</div>';
                  content += '<center>';
                  content += '<h4>Maquinas Disponibles</h4>';
                  content += '</center>';
                  content += '<p>';
                  content += '<h3> <a class="small-box-footer">' + maquinas.lab_nombre;
                  content += '&nbsp&nbsp<i style="cursor:pointer;" latitud="' + maquinas.lab_latitud + '" longitud="' + maquinas.lab_longitud + '" class="fa fa-map"></i></a></h3>';
                  content += '</p>';
                  content += '</div>';
                  content += '</div>';

                  $("#Contenedor-maquinas").append(content);

                });

              })
              .fail(function() {
                console.log("Fallo!");
              });
          };

          function CambiarCantidadMaquinas() {
            var urlbase = "<?php echo URLWS2; ?>";
            $.ajax({
                type: 'GET',
                url: urlbase + 'GetMaquinasDisponibles.php',
                dataType: 'json'
              })
              .done(function(data) {
                data.maquinas.forEach(function(maquinas, index) {
                  cambio_maquinas(maquinas.lab_codigo,maquinas.Maquinas);
                });

              })
              .fail(function() {
                console.log("Fallo!");
              });
          };


        </script>