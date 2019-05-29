<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
              <h2 class="fuentetitulo">USUARIOS <small>LISTADO</small></h2>
              <div class="clearfix"></div>
          </div>
          <div class="x_content">
            
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
               
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-usuario" ><span class="fa fa-plus"></span> Agregar Usuario</button> 
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
                      <th>Nombres</th>
                      <th>APELLIDOS</th>
                      <th>CORREO</th>
                      <th>SEXO</th>                    
                      <th><div class="botonesList">ACCIONES</div></th>
                    </tr>
                  </thead>
              
                    <tbody>          
                        <tr>
                            <td>1</td>
                            <td>Jorge Alberto</td>
                            <td>Acevedo</td>
                            <td>jorge.acevedo@mail.utec.edu.sv</td>
                            <td>MASCULINO</td>
    
                            
                            <td>
                            <div class="botonesList">
                  
                              <button class="btn btn-sm btn-warning" type="button" data-toggle="modal" data-target="#modal-usuario-editar" ><span class="fa fa-pencil"></span></button> 
                              <button class="btn btn-sm btn-info" type="button"><span class="fa fa-key"></span></button> 
                              <button class="btn btn-sm btn-danger" type="button"><span class="fa fa-remove"></span></button> 
                            </div>              
                            </td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>Carlos Alberto</td>
                            <td>Sanchez</td>
                            <td>carlos.sanchez@mail.utec.edu.sv</td>
                            <td>MASCULINO</td>
            
                            
                            <td>
                            <div class="botonesList">
                  
                              <button class="btn btn-sm btn-warning" type="button" data-toggle="modal" data-target="#modal-usuario-editar" ><span class="fa fa-pencil"></span></button> 
                              <button class="btn btn-sm btn-info" type="button"><span class="fa fa-key"></span></button> 
                              <button class="btn btn-sm btn-danger" type="button"><span class="fa fa-remove"></span></button> 
                            </div>              
                            </td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td>Jorge Alonso</td>
                            <td>Rodriguez</td>
                            <td>jorge.rodriguez@mail.utec.edu.sv</td>
                            <td>MASCULINO</td>                   
                            <td>
                            <div class="botonesList">
                  
                              <button class="btn btn-sm btn-warning" type="button" data-toggle="modal" data-target="#modal-usuario-editar" ><span class="fa fa-pencil"></span></button>  
                              <button class="btn btn-sm btn-info" type="button"><span class="fa fa-key"></span></button> 
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
        <div class="modal fade" id="modal-usuario">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">FORMULARIO DE USUARIO</h4>
                </div>
                <div class="modal-body">            
                <form name="frm" action="" method="POST">
                      <div class="form-row">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                          <label>Nombres</label>
                          <input type="text" class="form-control col-md-7 col-xs-12" name="nombre" placeholder="Ingresar Nombre" required="">
                        </div>

                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                          <label>Apellidos</label>
                          <input type="text" class="form-control col-md-7 col-xs-12" name="apellidos" placeholder="Ingresar Apellidos" required="">
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                          <label>Correo</label>
                          <input type="text" class="form-control col-md-7 col-xs-12" name="correo" placeholder="Ingresar Correo" required="">
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                          <label>Fecha de Nacimiento</label><br>
                          <input type="date" class="form-control col-md-7 col-xs-12" name="txtFechaNacimiento" placeholder="Ingresar Fecha Nacimiento" required="">
                          
                        </div>
                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                          <label>Sexo</label><br>
                          <select class="form-control" name="sexo">
                                <option value="bj">Seleccione Sexo</option>
                                <option value="bj">FEMENINO</option>
                                <option value="fm">MASCULINO</option>
                              
                            </select>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                          <label>DUI</label>
                          <input type="text" class="form-control col-md-7 col-xs-12" name="telefono" placeholder="Ingresar DUI" required="">
                        </div>
                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                          <label>Celular</label>
                          <input type="text" class="form-control col-md-7 col-xs-12" name="celular" placeholder="Ingresar Celular" required="">
                        </div>
                      </div>
                      <div class="form-row">
                      <div class="form-group col-md-12 col-sm-12 col-xs-12">
                      
                      <label>Fotografía</label>
                          <input name="foto" class="form-control col-md-6 col-xs-12" accept="image/*" type="file" capturar/>
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

        <!-- modal form -->
        <div class="modal fade" id="modal-usuario-editar">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">FORMULARIO DE USUARIO</h4>
                </div>
                <div class="modal-body">            
                <form name="frm" action="" method="POST">
                      <div class="form-row">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                          <label>Nombres</label>
                          <input type="text" class="form-control col-md-7 col-xs-12" name="nombre" placeholder="Ingresar Nombre" required="">
                        </div>

                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                          <label>Apellidos</label>
                          <input type="text" class="form-control col-md-7 col-xs-12" name="apellidos" placeholder="Ingresar Apellidos" required="">
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                          <label>Correo</label>
                          <input type="text" class="form-control col-md-7 col-xs-12" name="correo" placeholder="Ingresar Correo" required="">
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                          <label>Fecha de Nacimiento</label><br>
                          <input type="date" class="form-control col-md-7 col-xs-12" name="txtFechaNacimiento" placeholder="Ingresar Fecha Nacimiento" required="">
                          
                        </div>
                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                          <label>Sexo</label><br>
                          <select class="form-control" name="sexo">
                                <option value="bj">Seleccione Sexo</option>
                                <option value="bj">FEMENINO</option>
                                <option value="fm">MASCULINO</option>
                              
                            </select>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                          <label>DUI</label>
                          <input type="text" class="form-control col-md-7 col-xs-12" name="telefono" placeholder="Ingresar DUI" required="">
                        </div>
                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                          <label>Celular</label>
                          <input type="text" class="form-control col-md-7 col-xs-12" name="celular" placeholder="Ingresar Celular" required="">
                        </div>
                      </div>
                      <div class="form-row">
                      <div class="form-group col-md-12 col-sm-12 col-xs-12">
                      
                      <label>Fotografía</label>
                          <input name="foto" class="form-control col-md-6 col-xs-12" accept="image/*" type="file" capturar/>
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

