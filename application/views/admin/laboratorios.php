<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
              <h2 class="fuentetitulo">LABORATORIOS <small>LISTADO</small></h2>
              <div class="clearfix"></div>
          </div>
          <div class="x_content">
            
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
               
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-laboratorio" ><span class="fa fa-plus"></span> Agregar Laboratorio</button> 
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
                      <th>LABORATORIO</th>
                      <th>EDIFICIO</th>
                      <th>NIVEL</th>
                      <th>MAQUINAS</th>
                      <th>ESTADO</th>
                      <th><div class="botonesList">ACCIONES</div></th>
                    </tr>
                  </thead>
              
                    <tbody>          
                        <tr>
                            <td>1</td>
                            <td>1</td>
                            <td>Francisco Morazan</td>
                            <td>5</td>
                            <td>80</td>
                            <td>ACTIVO</td>
                            <td>
                            <div class="botonesList">
                  
                              <button class="btn btn-sm btn-warning" type="button" data-toggle="modal" data-target="#modal-laboratorio" ><span class="fa fa-pencil"></span></button> 
                              <button class="btn btn-sm btn-danger" type="button"><span class="fa fa-remove"></span></button> 
                              <button class="btn btn-sm btn-info" type="button"><span class="fa fa-eye"></span></button> 
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
        <div class="modal fade" id="modal-laboratorio">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">FORMULARIO DE LABORATORIO</h4>
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
                          <label>Laboratorio</label>
                          <input type="number" class="form-control col-md-7 col-xs-12" name="laboratorio" placeholder="Ingresar laboratorio" required="">
                            
                        </div>
                      </div>


                      <div class="form-row">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                          <label>Edificio</label>
                          <select class="form-control" name="edificio">
                                <option value="bj">Seleccionar ...</option>
                                <option value="bj">Benito Juarez</option>
                                <option value="fm">francisco morazan</option>
                                <option value="sb">simon bolivar</option>
                            </select>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                          <label>Nivel</label>
                          <input type="number" class="form-control col-md-7 col-xs-12" name="nivel" placeholder="Ingresar nivel" required="">
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                          <label>Maquinas(total)</label>
                          <input type="number" class="form-control col-md-7 col-xs-12" name="maquinas" placeholder="Ingresar total de maquinas" required="">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                          <label>Latitud (Ubicacion en Mapa)</label>
                          <input type="text" class="form-control col-md-7 col-xs-12" name="maquinas" placeholder="Ingresar Latitud" required="">
                        </div>
                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                          <label>Longitud (Ubicacion en Mapa)</label>
                          <input type="text" class="form-control col-md-7 col-xs-12" name="maquinas" placeholder="Ingresar Longitud" required="">
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                       
                          <center><label style="color:#5d0a28 ;"> MATRIZ DE LABORATORIO </label></center>
                        </div>
                        
                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                          <label>Filas</label>
                          <input type="number" class="form-control col-md-7 col-xs-12" name="maquinas" placeholder="Ingresar Numero de Filas" required="">
                        </div>

                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                          <label>Columnas</label>
                          <input type="number" class="form-control col-md-7 col-xs-12" name="maquinas" placeholder="Ingresar Numero de Columnas" required="">
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


