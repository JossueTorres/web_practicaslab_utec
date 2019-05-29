<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
              <h2 class="fuentetitulo">CICLOS <small>LISTADO</small></h2>
              <div class="clearfix"></div>
          </div>
          <div class="x_content">
            
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
               
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-ciclo" ><span class="fa fa-plus"></span> Agregar Ciclo</button> 
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-hover"  id="tabla" >

                  <thead>
                    <tr>
                      <th>#</th>
                      <th>CODIGO</th>
                      <th>CICLO</th>
                      <th>FECHA INICIO</th>
                      <th>FECHA FIN</th>
                      <th>ESTADO</th>
                      <th><div class="botonesList">ACCIONES</div></th>
                    </tr>
                  </thead>
              
                    <tbody>          
                        <tr>
                            <td>1</td>
                            <td>001</td>
                            <td>01-2019</td>
                            <td>20/01/2019</td>
                            <td>10/06/2019</td>
                            <td>ACTIVO</td>
                            <td>
                            <div class="botonesList">
                  
                              <button class="btn btn-sm btn-warning" type="button" data-toggle="modal" data-target="#modal-ciclo" ><span class="fa fa-pencil"></span></button> 
                              <button class="btn btn-sm btn-danger" type="button"><span class="fa fa-remove"></span></button> 
                            </div>              
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>002</td>
                            <td>02-2019</td>
                            <td>20/08/2019</td>
                            <td>10/12/2019</td>
                            <td>INACTIVO</td>
                            <td>
                            <div class="botonesList">
                  
                              <button class="btn btn-sm btn-warning" type="button" data-toggle="modal" data-target="#modal-ciclo" ><span class="fa fa-pencil"></span></button> 
                              <button class="btn btn-sm btn-danger" type="button"><span class="fa fa-remove"></span></button> 
                            </div>              
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
        <div class="modal fade" id="modal-ciclo">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">FORMULARIO DE CICLO</h4>
                </div>
                <div class="modal-body">            
                <form name="frm" action="" method="POST">
                      <div class="form-row">

                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                          <label>Codigo</label>
                          <input type="text" class="form-control col-md-7 col-xs-12" name="codigo" placeholder="Ingresar Codigo" required="">
                        </div>

                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                          <label>Ciclo</label>
                          <input type="text" class="form-control col-md-7 col-xs-12" name="ciclo" placeholder="Ingresar ciclo" required="">
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                          <label>Fecha inicio</label>
                          <input type="date" class="form-control col-md-7 col-xs-12" name="fecha inicio" placeholder="Ingresar fecha inicio" required="">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                          <label>Fecha fin</label>
                          <input type="date" class="form-control col-md-7 col-xs-12" name="fecha fin" placeholder="Ingresar fecha fin" required="">
                        </div>
                      </div>
                      

                      <div class="form-row">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                          <label>Estado </label><br/>
                          <label>
                            <input type="checkbox" class="js-switch" checked name="estado" /> Activo
                          </label>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <div class="ln_solid"></div>
                        </div>
                      </div>

                      <div class="form-row">
                          <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                           
                            
                          </div>
                      </div>
                    </form>                                     
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


