<!-- page content -->
<style>
  .onPC {
    background-color: #A1F378;
    color: #fff;
    border-radius: 5px;
    cursor: pointer;
    max-width: 100px;
	max-height: 100px;
  }

  .offPC {
    background-color: #E99F9F;
    color: #fff;
    border-radius: 5px;
    cursor: pointer;
    max-width: 100px;
	max-height: 100px;
  }

  .enabledPC {
    background-color: #E5D7D7;
    color: #fff;
    border-radius: 5px;
    max-width: 100px;
	max-height: 100px;
  }
</style>

<div class="right_col" role="main">
  <div class="">
    <form action="<?php echo base_url('c_laboratorio/ControlLaboratorio/index'); ?>" method="POST">
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
    <form class=" hidden" action="<?php echo base_url('c_laboratorio/ControlLaboratorio/CambioEstadoMaquina'); ?>" method="POST">
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
                      if ($maq->maq_estado_maquina == "A") {
                        if ($maq->maq_estado_reserva == "I") {
                          echo '<div class="MAQ enabledPC" estado="I" codlab="'.$maq->maq_codlab.'" codfil="'.$maq->maq_fila.'" codcol="'.$maq->maq_columna.'">';
                        } elseif ($maq->maq_estado_reserva == "O") {
                          echo '<div class="MAQ offPC" estado="O"  codlab="'.$maq->maq_codlab.'" codfil="'.$maq->maq_fila.'" codcol="'.$maq->maq_columna.'">';
                        }else{
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
                      } else { ?>
                        <div class="form-row">
                          <div class="form-group col-md-1 col-sm-1 col-xs-1">
                            <div class="">
                              <center>
                                <div class=""> <img src="" alt="" width="100px" height="10px"></div>

                            </div>
                          </div>
                        </div>
                      </td>
                      <?php
                    }
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
<script>

</script>
<!-- /page content -->