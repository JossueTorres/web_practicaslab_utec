
<!-- /page content -->


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
                      <th>Acronimo</th>
                      <th>Filas</th>
                      <th>Columnas</th>
                      <th>ESTADO</th>
                      <th><div class="botonesList">ACCIONES</div></th>
                    </tr>
                  </thead>
              
                    <tbody>        
                      <?php if (!empty($Lista2)) {
                        foreach ($Lista2 as $item) {
                          foreach ($item as $lb) { ?>
                            <tr>
                            <td><?php echo $lb->lab_codigo; ?></td>
                            <td><?php echo $lb->lab_nombre; ?></td>
                            <td><?php echo $lb->lab_acronimo; ?></td>
                            <td><?php echo $lb->lab_filas; ?></td>
                            <td><?php echo $lb->lab_columnas; ?></td>
                            <td>Activo</td>
                            <td>
                             <button class="btnOJOlab btn btn-sm btn-info" codigo="<?php echo $lb->lab_codigo; ?>" type="button"><span class="fa fa-eye"></span></button>                                          
                            </td> </tr>
              <?php }
          }
        }  ?>  
                            
                           
                       
                        
                    </tbody>
                </table>
            </div>
              </div>

            </div>

          </div>
        </div>
  
  






<!-- page content -->

<!-- /page content -->






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


<!-- page content -->
<style>
  .onPC {
    background-color: #A1F378;
    color: #fff;
    border-radius: 5px;
    cursor: pointer;
  }

  .offPC {
    background-color: #E99F9F;
    color: #fff;
    border-radius: 5px;
    cursor: pointer;
  }

  .enabledPC {
    background-color: #E5D7D7;
    color: #fff;
    border-radius: 5px;
  }
</style>

<div class="" role="main">
  <div class="">
    <form class="hidden" action="<?php echo base_url('c_admin/ControlLaboratorio/index'); ?>" method="POST">
      <div class="col-md-4 col-sm-12">
        <select name="txtcodlab" id="txtcodlab" class="form-control ddl_buscar_lab_mapa">
          <?php if (!empty($Lista2)) {
            foreach ($Lista2 as $item) {
              foreach ($item as $lb) { ?>
                <option value="<?php echo $lb->lab_codigo; ?>"><?php echo $lb->lab_nombre; ?></option>
              <?php }
          }
        }  ?>
        </select>
      </div>
      <div class="col-md-4">
        <button type="submit" class="btn btn-success btn_buscar_lab_mapa">Buscar</button>
      </div>
      <div class="col-md-4">
        
        <label><input type="checkbox" class=" form-control" id="ckb_maq_no_dis"/>Colocar Maquinas No disponibles</label>
      </div>
    </form>
    <!-- form oculto para cambiar el estado de la maquina -->
    <form class=" hidden" action="<?php echo base_url('c_admin/ControlLaboratorio/CambioEstadoMaquina'); ?>" method="POST">
      <div class="col-md-4 col-sm-12">
      <input name="txtcodmaq_lab" type="text" id="txtcodmaq_lab" class="form-control">
      <input name="txtcodmaq_fil" type="text" id="txtcodmaq_fil" class="form-control">
      <input name="txtcodmaq_col" type="text" id="txtcodmaq_col" class="form-control">
      <input name="txtmaqEstado" type="text" id="txtmaqEstado" class="form-control">
      </div>
      <div class="col-md-4">
        <button type="submit" class="btn btn-success btn_Cambiar_Estado_Reserva_Maquina">Buscar</button>
      </div>
     
    </form>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2 id="Nombre_lab" class="fuentetitulo"></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content" style="text-align: center;">
            <table class=" table-responsive table-striped table">
              <tbody>
                <?php if (!empty($Lista1)) {
                  foreach ($Lista1 as $resp) {
                    $cont = 1;
                    $filaActual = 0;
                    foreach ($resp as $maq) {
                      ?>
                      <!-- <tr> 
                        <td>codlab: <?php echo $maq->maq_codlab; ?></td>
                        <td>fila:  <?php echo $maq->maq_fila; ?></td>
                        <td>columna: <?php echo $maq->maq_columna; ?></td>
                        <td>maq estado: <?php echo $maq->maq_estado_maquina; ?></td>
                        <td>res estado: <?php echo $maq->maq_estado_reserva; ?></td>
                        <td>alias: <?php echo $maq->maq_alias; ?></td>
                      </tr>-->
                      
                      <?php
                      if($cont == 1){
                        $filaActual = $maq->maq_fila;
                        echo '<tr>';
                      }
                      if($filaActual == $maq->maq_fila){
                        
                      }else{
                        echo '</tr><tr>';
                        $filaActual = $maq->maq_fila;
                      }
                      echo '<td>';
                        if ($maq->maq_estado_maquina == "I") {
                          echo '<div class="MAQ enabledPC" estado="I" codlab="'.$maq->maq_codlab.'" codfil="'.$maq->maq_fila.'" codcol="'.$maq->maq_columna.'">';
                        } else {
                          echo '<div class="MAQ onPC" estado="D"  codlab="'.$maq->maq_codlab.'" codfil="'.$maq->maq_fila.'" codcol="'.$maq->maq_columna.'">';
                        }
                        ?>

                        <center>
                          <div class=""> <img src="https://pngimage.net/wp-content/uploads/2018/06/icone-informatique-png-1.png" alt="" width="40" height="40"></div>
                        </center>
                        <center>
                          <h4><label href="#">PC-<?php echo $cont; ?></label></h4>
                        </center>
                      </td>
                        <?php $cont++;
                      
                  }
                }
              }  ?>
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