<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
              <h2 class="fuentetitulo">ASIGNAR LABORATORIOS <small>LISTADO</small></h2>
              <div class="clearfix"></div>
          </div>
          <div class="x_content">
            
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
               
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-asignarLab" ><span class="fa fa-plus"></span> Asignar Laboratorio</button> 
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
                      <th>RESPONSABLE</th>
                      <th>LABORATORIO</th>                      
                      <th>EDIFICIO</th>
                      <th>MAQUINAS</th>
                      <th><div class="botonesList">ACCIONES</div></th>
                    </tr>
                  </thead>
              
                    <tbody>          
                        <tr>
                            <td>1</td>
                            <td>FRANCISO MORAZA</td>
                            <td>LABORATORIO 1</td>                            
                            <td>FRANCISO MORAZAN</td>
                            <td>60</td>                            
                            <td>
                            <div class="botonesList">
                  
                              <button class="btn btn-sm btn-warning" type="button" data-toggle="modal" data-target="#modal-asignarLab" ><span class="fa fa-pencil"></span></button> 
                              <button class="btn btn-sm btn-danger" type="button"><span class="fa fa-remove"></span></button> 
                            </div>              
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>MARIA JULIA REYES</td>
                            <td>LABORATORIO 2</td>
                            <td>FRANCISCO MORAZAN</td>
                            <td>60</td>
                            <td>
                            <div class="botonesList">
                  
                              <button class="btn btn-sm btn-warning" type="button" data-toggle="modal" data-target="#modal-asignarLab" ><span class="fa fa-pencil"></span></button> 
                              <button class="btn btn-sm btn-danger" type="button"><span class="fa fa-remove"></span></button> 
                            </div>              
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>LEONARDO MARTINEZ PEREZ</td>
                            <td>LABORATORIO REDES</td>
                            <td>FRANCISCO MORAZAN</td>
                            <td>40</td>
                            <td>
                            <div class="botonesList">
                  
                              <button class="btn btn-sm btn-warning" type="button" data-toggle="modal" data-target="#modal-asignarLab" ><span class="fa fa-pencil"></span></button> 
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
        <div class="modal fade" id="modal-asignarLab">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">ASIGNAR LABORATORIOS CICLO 01-2019</h4>
                </div>
                <div class="modal-body">            
                <form name="frm" action="" method="POST">
                      <div class="form-row">

                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                          <label >Encargado</label>
                          <select name="txtEncargado" id="txtEncargado" class="form-control" required>
                          <option value="">Seleccionar...</option> 
                          <option value="">MARCO ANTONIO SOLIS</option>
                          <option value="">MARIA JULIA REYES</option>
                          </select>              
                        </div>

                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                          <label >Laboratorio</label>
                          <select name="txtLaboratorio" id="txtLaboratorio" class="form-control" required>
                          <option value="">Seleccionar...</option> 
                          <option value="">LABORATORIO 1, FM</option>
                          <option value="">LABORATORIO 2, FM</option>
                          <option value="">LABORATORIO REDES, FM</option>
                          </select>              
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
    <!-- /.modal TODO:-->


