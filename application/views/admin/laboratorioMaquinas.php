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

  .enabledPC {
    background-color: #E5D7D7;
    color: #fff;
    border-radius: 5px;
    max-width: 100px;
    max-height: 100px;
  }
</style>

<div class="right_col" role="main">
  <h2>Administrar <?php  foreach ($lista2 as $resp) {
    foreach ($lista2 as $resp) {
     echo $resp;
    } }?></h2>
  <div class="">
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
                <?php 
                foreach ($lista1 as $resp) {
                if (!empty($resp)) {
                    $cont = 1;
                    $filaActual = 0;
                    foreach ($resp as $maq) {
                      if ($cont == 1) {
                        $filaActual = $maq->maq_fila;
                        echo '<tr>';
                      }
                      if ($filaActual == $maq->maq_fila) { } else {
                        echo '</tr><tr>';
                        $filaActual = $maq->maq_fila;
                      }
                      echo '<td>';
                      if ($maq->maq_estado_maquina == "A") {
                        echo '<div class="MAQ onPC" estado="A" alias="'. $maq->maq_alias .'" codlab="' . $maq->maq_codlab . '" codfil="' . $maq->maq_fila . '" codcol="' . $maq->maq_columna . '"> '; 
                        ?>
                          <div class="ImagenMaq"> <img src="https://pngimage.net/wp-content/uploads/2018/06/icone-informatique-png-1.png" alt="" width="40" height="40"></div>
                          <div class="ImagenPasio hidden"><img src="https://image.flaticon.com/icons/png/512/32/32523.png" alt="" width="40" height="40"></div>
                          <h4><label>_</label></h4>
                  </div>
                  </td>
                  <?php $cont++;
                } else { 
                  echo '<div class="MAQ enabledPC" estado="I" alias="'. $maq->maq_alias .'" codlab="' . $maq->maq_codlab . '" codfil="' . $maq->maq_fila . '" codcol="' . $maq->maq_columna . '">';  
                         ?> <div class="ImagenMaq hidden"> <img src="https://pngimage.net/wp-content/uploads/2018/06/icone-informatique-png-1.png" alt="" width="40" height="40"></div>
                          <div class="ImagenPasio "><img src="https://image.flaticon.com/icons/png/512/32/32523.png" alt="" width="40" height="40"></div>
                          <h4><label>_</label></h4>
                  </div>
                  </td>
                <?php
              
            }
          }
        } } ?>
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

  $(".MAQ").click(function() {
    //alert("click");
    var codlab = $(this).attr("codlab");
    var codfil = $(this).attr("codfil");
    var codcol = $(this).attr("codcol");
    //alert(codcol);
    var estado = $(this).attr("estado");
    $(this).removeClass("onPC");
    $(this).removeClass("enabledPC");

    if (estado == "A") {
      $(this).addClass("enabledPC");
      $(".ImagenMaq ", this).addClass("hidden");
      $(".ImagenPasio ", this).removeClass("hidden");
      $("label ", this).text("_");
      $(this).attr("estado", "I");
      numerarMaquinas();
    } else {
      $(".ImagenMaq ", this).removeClass("hidden");
      $(".ImagenPasio ", this).addClass("hidden");
      $(this).addClass("onPC");
      $(this).attr("estado", "A");
      numerarMaquinas();
    }
    CambiarEstadoMaquina(codlab, codfil, codcol, $(this).attr("estado"));
  });
  numerarMaquinas();
 function numerarMaquinas(){
   var cont = 1;
$(".onPC").each(function(){
  $("label ", this).text( $(this).attr("alias") +"-"+cont);
  cont ++;
});
 };


  function CambiarEstadoMaquina(lab, fil, col, est) {
    var urlbase = "<?php echo URLWS2; ?>";
    $.ajax({
        type: 'POST',
        url: urlbase + 'CambiarEstadoMaquina.php?lab=' + lab + '&fil=' + fil + '&col=' + col + '&est=' + est,
        dataType: 'json'
      })
      .done(function(data) {
        //alert("Cambio estado!!!");
      })
      .fail(function() {
        alert("Error al Actualizar Registro!!!");
      });

  };
</script>
<!-- /page content -->