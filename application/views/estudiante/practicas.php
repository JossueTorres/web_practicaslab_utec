<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2 class="fuentetitulo">CONSULTA PRACTICAS <small>HORARIOS</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <div class="row">
              <div class="col-md-3 col-xs-12">
                EDIFICIO:<br>
                <select name="Edificios" class="form-control">
                  <option value="" selected>Benito Juarez
                  <option value="">Francisco Morazan
                </select>
              </div>
              <div class="col-md-3 col-xs-12">
                LABORATORIO:<br>
                <select name="Laboratorios" class="form-control">
                  <option value="" selected>Laboratorio 03
                  <option value="">Laboratorio 10
                </select>
              </div>
              <div class="col-md-3 col-xs-12">
                FECHA:<br>
                <input type="date" class="form-control" name="fecha" placeholder="dd/MM/yyyy">
              </div>
              <div class="col-md-3 col-xs-12">
                HORA:<br>
                <input type="text" class="form-control" name="hora" placeholder="00:00 ">
              </div>
              <!--<div class="col-md-12 col-sm-12 col-xs-12">
               
                
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-edificio" ><span class="fa fa-plus"></span> Agregar Edificio</button> 
              
              </div>-->
            </div>
            <div class="row">
              <br>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <button class="btn btn-primary" type="button"><span class="fa fa-search"></span> Consultar</button>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="table-responsive">
                  <table class="table table-striped table-hover" id="tabla">

                    <thead>
                      <tr>
                        <th>LABORATORIO</th>
                        <th>EDIFICIO</th>
                        <th>FECHA</th>
                        <th>HORA</th>
                        <th>CUPO</th>
                        <th>MAPA</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td>LAB-03</td>
                        <td>BJ</td>
                        <td>22/04/2019</td>
                        <td> 10:00 - 12:00</td>
                        <td>20</td>
                        <td>
                          <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#modal-ubicacion"><span class="fa fa-map"></span></button>
                        </td>
                      </tr>
                      <tr>
                        <td>LAB-10</td>
                        <td>BJ</td>
                        <td>22/04/2019</td>
                        <td>13:00 - 15:00</td>
                        <td>20</td>
                        <td>
                          <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#modal-ubicacion"><span class="fa fa-map"></span></button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- /page content -->


<!-- modal form -->
<div class="modal fade" id="modal-ubicacion">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">UBICACION LABORATORIO</h4>
      </div>
      <div class="modal-body">
        <img src="#">
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <div class="form-group col-md-12 col-sm-12 col-xs-12">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
        </div>
        <br />
        <br />
      </div>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->