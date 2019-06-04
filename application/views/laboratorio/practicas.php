<style>
.onCelda{
  background: #A1F378;
  height: auto;
  width: auto;
  text-align:center;
  color:#000;
}
.onCelda:hover{
  cursor: pointer;
}
.offCelda{
  background: #E99F9F;
  height: auto;
  width: auto;
  text-align:center;
  color:#000;
}
.offCelda:hover{
  cursor: pointer;
}
.disCelda{
  background: #fafafa;
  height: auto;
  width: auto;
  text-align:center;
}
</style>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2 class="fuentetitulo">PRÁCTICAS LIBRES PARA&nbsp;<?php echo strtoupper($this->session->userdata("usrlabnom")); ?><small>LISTADO</small></h2>
            <div class="clearfix"></div>
          </div>
          <!-- <div class="x_content">
            <div class="row">
              <form action="<?php echo base_url('Practicas'); ?>" method="POST">
                <div class="col-sm-3 col-xs-12">
                  <label>Laboratorio</label>
                  <select name="ddlLabFil" id="ddlLabFil" class="form-control ddlLabFil">
                    <option value="">(Todos)</option>
                    <?php if (!empty($lst3)) {
                      foreach ($lst3 as $lab) { ?>
                                                                    <option value="<?php echo $lab->lab_codigo ?>"><?php echo $lab->lab_nombre ?></option>
                                            <?php }
                                        }  ?>
                  </select>
                </div>
                <div class="col-xs-3">
                  <br>
                  <button type="submit" class="btn btn-success">Buscar</button>
                </div>
              </form>
            </div>
          </div> -->
          <div class="x_content">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <button type="button" class="btn btn-primary" onclick="javascript: cleanFields();mostrarModal();"><span class="fa fa-plus"></span>&nbsp;Agregar Práctica</button>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <form id='frm_del_practica' name="frmdel" action="<?php echo base_url('Lab/Practicas/Borrar'); ?>" method="POST">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover" id="tabla">
                      <thead>
                        <tr>
                          <!-- <th>LAB</th> -->
                          <th>FECHA</th>
                          <th>HORA</th>
                          <th>L</th>
                          <th>M</th>
                          <th>X</th>
                          <th>J</th>
                          <th>V</th>
                          <th>S</th>
                          <th>D</th>
                          <th>ACCIONES</th>
                          <th style="text-align:center;">
                            <div class="center-block"><input type="checkbox" name="todo" id="todo" class="checkbox" />&nbsp;<button type="submit" class="btn btn-danger btn-xs pull-right" onclick="return confimar('borrar');"><label class="fa fa-trash"></label></button></div>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if (!empty($resp)) {
                          foreach ($resp as $cop) {
                            $fini = preg_split("/\ /", $cop->cop_fecha_hora_inicia)[0];
                            $hini = preg_split("/\ /", $cop->cop_fecha_hora_inicia)[1];
                            $ffin = preg_split("/\ /", $cop->cop_fecha_hora_fin)[0];
                            $hfin = preg_split("/\ /", $cop->cop_fecha_hora_fin)[1]; ?>
                            <tr>
                              <!-- <td><?php echo $cop->cop_codlab; ?></td> -->
                              <td><b>DESDE:</b>&nbsp;<?php echo $fini; ?><br>
                                <b>HASTA:</b>&nbsp;<?php echo $ffin; ?></td>
                              <td><b>DESDE:</b>&nbsp;<?php echo $hini; ?><br>
                                <b>HASTA:</b>&nbsp;<?php echo $hfin; ?></td>
                              <td><label class="fa <?php if ($cop->cop_lunes == 2) echo "fa-check bg-green";
                                                    else echo "fa-square red"; ?>"></label></td>
                              <td><label class="fa <?php if ($cop->cop_martes == 2) echo "fa-check bg-green";
                                                    else echo "fa-square red"; ?>"></label></td>
                              <td><label class="fa <?php if ($cop->cop_miercoles == 2) echo "fa-check bg-green";
                                                    else echo "fa-square red"; ?>"></label></td>
                              <td><label class="fa <?php if ($cop->cop_jueves == 2) echo "fa-check bg-green";
                                                    else echo "fa-square red"; ?>"></label></td>
                              <td><label class="fa <?php if ($cop->cop_viernes == 2) echo "fa-check bg-green";
                                                    else echo "fa-square red"; ?>"></label></td>
                              <td><label class="fa <?php if ($cop->cop_sabado == 2) echo "fa-check bg-green";
                                                    else echo "fa-square red"; ?>"></label></td>
                              <td><label class="fa <?php if ($cop->cop_domingo == 2) echo "fa-check bg-green";
                                                    else echo "fa-square red"; ?>"></label></td>
                              <td class="text-center">
                                <a name="btnEditar" id="btnEditar" class="btn btn-info btn-xs" onclick="javascript: edit('<?php echo $cop->cop_codigo ?>','<?php echo $fini ?>','<?php echo $ffin ?>','<?php echo $hini ?>','<?php echo $hfin ?>','<?php echo $cop->cop_lunes; ?>','<?php echo $cop->cop_martes; ?>','<?php echo $cop->cop_miercoles; ?>','<?php echo $cop->cop_jueves; ?>','<?php echo $cop->cop_viernes; ?>','<?php echo $cop->cop_sabado; ?>','<?php echo $cop->cop_domingo; ?>');"><i class="fa fa-edit"></i></a>
                                <a name="btnListado" id="btnListado" ffin="<?php echo $ffin; ?>" fini="<?php echo $fini; ?>" lun="<?php echo $cop->cop_lunes; ?>" mar="<?php echo $cop->cop_martes; ?>" mie="<?php echo $cop->cop_miercoles; ?>" jue="<?php echo $cop->cop_jueves; ?>" vie="<?php echo $cop->cop_viernes; ?>" sab="<?php echo $cop->cop_sabado; ?>" dom="<?php echo $cop->cop_domingo; ?>" class="btn btn-info btn-xs btnListado"><i class="fa fa-list"></i></a>
                              </td>
                              <td style="text-align:center;">
                                <input type="checkbox" name="chkBorrar[]" class="checkbox" value="<?php echo $cop->cop_codigo; ?>" />
                              </td>
                            </tr>
                          <?php }
                      }  ?>
                      </tbody>
                    </table>
                  </div>
                </form>
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
<div class="modal fade" id="modal-edificio">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">DATOS DE LA PRÁCTICA</h4>
      </div>
      <div class="modal-body">
        <form id='frm_practica' name="frm" action="<?php echo base_url('Lab/Practicas/Guardar'); ?>" method="POST">
          <input type="text" name="codcop" id="codcop" class="codcop hidden" value="0">
          <input type="text" name="ddlLab" id="ddlLab" class="ddlLab hidden" value="<?php echo $this->session->userdata('usrlab') ?>">
          <!-- <div class="form-row">
            <div class="form-group col-md-8 col-sm-8 col-xs-12">
              <label>Laboratorio</label><br />
              <label>
                <select name="ddlLab" id="ddlLab" class="form-control ddlLab" required="">
                  <option value="">(Seleccione Uno)</option>
                  <?php if (!empty($lst2)) {
                    foreach ($lst2 as $edf) { ?>
                                                                  <option value="<?php echo $edf->edf_codigo ?>"><?php echo $edf->edf_nombre ?></option>
                                          <?php }
                                      }  ?>
                </select>
              </label>
            </div>
          </div> -->
          <div class="form-row">
            <div class="form-group col-md-6 col-sm-6 col-xs-12">
              <label>Fecha Inicia</label>
              <input type="text" id="txtFini" name="txtFini" class="form-control col-md-7 col-xs-12 txtFini txtDatePicker" placeholder="Fecha inicia" required="">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6 col-sm-6 col-xs-12">
              <label>Hora Inicia</label>
              <input type="time" id="txtHini" name="txtHini" class="form-control col-md-7 col-xs-12 txtHini  " placeholder="Hora inicia" required="">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6 col-sm-6 col-xs-12">
              <label>Fecha Termina</label>
              <input type="text" id="txtFfin" name="txtFfin" class="form-control col-md-7 col-xs-12 txtFfin txtDatePicker" placeholder="Fecha fin" required="">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6 col-sm-6 col-xs-12">
              <label>Hora Termina</label>
              <input type="time" id="txtHfin" name="txtHfin" class="form-control col-md-7 col-xs-12 txtHfin " placeholder="Hora fin" required="">
            </div>
          </div>
          <div class="form-row center-block">
            <div class="form-group col-md-12 col-sm-12 col-xs-12">
              <label>Días Afectos </label><br />
              <table style="width:100%;">
                <thead>
                  <tr>
                    <th>L</th>
                    <th>M</th>
                    <th>X</th>
                    <th>J</th>
                    <th>V</th>
                    <th>S</th>
                    <th>D</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><input type="checkbox" name="chkD[]" id="chkD1" class="chkD chkD1" value="1"></td>
                    <td><input type="checkbox" name="chkD[]" id="chkD2" class="chkD chkD2" value="2"></td>
                    <td><input type="checkbox" name="chkD[]" id="chkD3" class="chkD chkD3" value="3"></td>
                    <td><input type="checkbox" name="chkD[]" id="chkD4" class="chkD chkD4" value="4"></td>
                    <td><input type="checkbox" name="chkD[]" id="chkD5" class="chkD chkD5" value="5"></td>
                    <td><input type="checkbox" name="chkD[]" id="chkD6" class="chkD chkD6" value="6"></td>
                    <td><input type="checkbox" name="chkD[]" id="chkD7" class="chkD chkD7" value="7"></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12 col-sm-12 col-xs-12">
              <div class="ln_solid"></div>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12 col-sm-12 col-xs-12">
              <input type="submit" onclick="javascript: return validarCampos();" name="btnGuardar" id="btnGuardar" value="Guardar" class="btn btn-primary btnGuardar">
              <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button> -->
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

<div class="modal fade" id="modal-listado">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">DETALLE DE LA RESERVA</h4>
      </div>
      <div class="modal-body">
            <table class=" table table-striped">
                  <thead>
                    <tr>
                      <th style="text-align:center;">LUN</th>
                      <th style="text-align:center;">MAR</th>
                      <th style="text-align:center;">MIE</th>
                      <th style="text-align:center;">JUE</th>
                      <th style="text-align:center;">VIE</th>
                      <th style="text-align:center;">SAB</th>
                      <th style="text-align:center;">DOM</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="disCelda"><div></div></td>
                      <td class="onCelda"><div>02-12 <br> 2019</div></td>
                      <td class="disCelda"><div>03-12 <br> 2019</div></td>
                      <td class="disCelda"><div>04-12 <br> 2019</div></td>
                      <td class="disCelda"><div>05-12 <br> 2019</div></td>
                      <td class="onCelda"><div>06-12 <br> 2019</div></td>
                      <td class="onCelda"><div>07-12 <br> 2019</div></td>
                    </tr>

                  </tbody>
            </table>
      </div>
    </div>
  </div>
</div>

<script src="http://momentjs.com/downloads/moment.min.js"></script>
<script>
   function mostrarModal() {
     $("#modal-edificio").modal('show');
  };
//   $(".btnListado").click( function() {
//     var fi = $(this).attr("fini");
//     var ff = $(this).attr("ffin");
//     console.log(ff + "  "+fi);
//     var Fecha_inicio = $.datepicker.formatDate('yy-dd-mm',new Date(fi));
//     var Fecha_fin = $.datepicker.formatDate('yy-dd-mm',new Date(ff));
//     var Dia_Inicia = new Date(Fecha_inicio).getDate(); 
//     var lunes = $(this).attr("lun");
//     var martes = $(this).attr("mar");
//     var miercoles = $(this).attr("mie");
//     var jueves = $(this).attr("jue");
//     var viernes = $(this).attr("vie");
//     var sabado = $(this).attr("sab");
//     var domingo = $(this).attr("dom");
//     //alert(Fecha_inicio.diff(Fecha_fin, 'days'));
//    var  c_Fecha_inicio    = new Date(Fecha_inicio);
//    var  c_Fecha_fin    = new Date(Fecha_fin);
//   // Dia_Inicia =new Date(Dia_Inicia);
// var day_as_milliseconds = 86400000;
// var diff = c_Fecha_fin - c_Fecha_inicio;
// var Diferencia_dias = diff / day_as_milliseconds;
// var html = "";
// for (let i = 1; i <= Diferencia_dias; i++) {
//   const element = array[i];
  
// }


// console.log(Dia_Inicia);
// console.log(Fecha_fin + "  "+Fecha_inicio);
// console.log(Diferencia_dias );



//     $("#modal-listado").modal('show');
//   });

  function cleanFields() {
    $('.codcop').attr("value", "0");
    $('.codlab').val("<?php echo $this->session->userdata('usrlab') ?>");
    $('.txtFini').val(moment().format('DD-MM-YYYY'));
    $('.txtHini').val(moment().format('HH:mm'));
    $('.txtFfin').val(moment().format('DD-MM-YYYY'));
    $('.txtHfin').val(moment().add(1, 'hours').format('HH:mm'));
    $(".chkD1").prop('checked', false);
    $(".chkD2").prop('checked', false);
    $(".chkD3").prop('checked', false);
    $(".chkD4").prop('checked', false);
    $(".chkD5").prop('checked', false);
    $(".chkD6").prop('checked', false);
    $(".chkD7").prop('checked', false);
  };

  function edit(c, fi, ff, hi, hf, l, m, x, j, v, s, d) {
    cleanFields();
    $('.codcop').attr("value", c);
    $('.codlab').val("<?php echo $this->session->userdata('usrlab') ?>");
    $('.txtFini').val(fi);
    $('.txtHini').val(hi);
    $('.txtFfin').val(ff);
    $('.txtHfin').val(hf);
    if (parseFloat(l) == 2) {
      $(".chkD1").prop('checked', true);
    }
    if (parseFloat(m) == 2) {
      $(".chkD2").prop('checked', true);
    }
    if (parseFloat(x) == 2) {
      $(".chkD3").prop('checked', true);
    }
    if (parseFloat(j) == 2) {
      $(".chkD4").prop('checked', true);
    }
    if (parseFloat(v) == 2) {
      $(".chkD5").prop('checked', true);
    }
    if (parseFloat(s) == 2) {
      $(".chkD6").prop('checked', true);
    }
    if (parseFloat(d) == 2) {
      $(".chkD7").prop('checked', true);
    }
    mostrarModal();
  };

  function validaFecha() {
    var fistr = $(".txtFini").val();
    var ffstr = $(".txtFfin").val();
    if (moment(fistr, 'DD-MM-YYYY', true).isValid()) {
      if (moment(ffstr, 'DD-MM-YYYY', true).isValid()) {
        var fini = moment(fistr, 'DD-MM-YYYY');
        var ffin = moment(ffstr, 'DD-MM-YYYY');
        var today = moment(moment().format('DD-MM-YYYY'), 'DD-MM-YYYY');
        if (fini >= today) {
          if (ffin < fini) {
            // alert("La fecha final no puede ser menor a la fecha inicial");
            swal({
              title: 'Fecha Inválida',
              text: 'La fecha final no puede ser menor a la fecha inicial',
              type: 'warning'
            });
            return false;
          } else {
            return true;
          }
        } else {
          swal({
            title: 'Fecha Inválida',
            text: 'La fecha inicial debe ser mayor o igual al día de hoy',
            type: 'warning'
          });
          return false;
        }
      } else {
        // alert("Formato de fecha inválido");
        swal({
          title: 'Fecha Inválida',
          text: 'Formato de fecha inválido',
          type: 'warning'
        });
        return false;
      }
    } else {
      // alert("Formato de fecha inválido");
      swal({
        title: 'Fecha Inválida',
        text: 'Formato de fecha inválido',
        type: 'warning'
      });
      return false;
    }
  };

  function validarHora() {
    var histr = $(".txtHini").val();
    var hfstr = $(".txtHfin").val();
    if (moment(histr, 'HH:mm').isValid()) {
      if (moment(hfstr, 'HH:mm').isValid()) {
        var hini = moment(histr, 'HH:mm');
        var hfin = moment(hfstr, 'HH:mm');
        if (hfin <= hini) {
          // alert("La hora final no puede ser menor o igual a la hora inicial");
          swal({
            title: 'Hora Inválida',
            text: 'La hora final no puede ser menor o igual a la hora inicial',
            type: 'warning'
          });
          return false;
        } else {
          return true;
        }
      } else {
        // alert("Formato de fecha inválido");
        swal({
          title: 'Hora Inválida',
          text: 'Formato de hora inválido',
          type: 'warning'
        });
        return false;
      }
    } else {
      swal({
        title: 'Hora Inválida',
        text: 'Formato de hora inválido',
        type: 'warning'
      });
      return false;
    }
  }

  function validarCampos() {
    if (validaFecha() && validarHora() && validarCheckbox()) return true;
    else return false;
  }

  function confimar(text) {
    return confirm("¿Esta seguro que desea: " + text + " los registros seleccionados?");
  };

  function validarCheckbox() {
    var marcados = 0;
    $(".chkD:checked").each(function() {
      marcados += 1;
    });
    //alert(marcados);
    if (marcados > 0) {
      // alert('Valido' + marcados);      
      return true;
    } else {
      // alert('Inválido' + marcados);
      swal({
        title: 'Sin día Seleccionado',
        text: 'Debe seleccionar al menos un día para la práctica',
        type: 'warning'
      });
      return false;
    }
  }

  function crearListado(fi, hi, ff, hf, l, m, x, j, v, s, d) {
    var fini = moment(fi, 'DD-MM-YYYY');
    var ffin = moment(ff, 'DD-MM-YYYY');
    // for (var d = new Date(2012, 0, 1); d <= now; d.setDate(d.getDate() + 1)) {
    //   alert(d);
    // }
    // for (var d = new Date(fini); d <= new Date(ffin); d.setDate(d.getDate() + 1)) {
    //   alert(d.getDate());
    // }
  }

  $(document).ready(function() {

    crearListado('03-06-2019', '10-06-2019');

    $('.txtDatePicker').datepicker({
      dateFormat: 'dd-mm-yy'
    });

    $('#tabla').DataTable({
      "language": {
        "lengthMenu": "Mostrar _MENU_ registros por pagina",
        "zeroRecords": "No se encontraron resultados en su busqueda",
        "searchPlaceholder": "Buscar registros",
        "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
        "infoEmpty": "No existen registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "search": "Buscar:",
        "paginate": {
          "first": "Primero",
          "last": "Último",
          "next": "Siguiente",
          "previous": "Anterior"
        },
      }
    });

    $('#todo').on('click', function() {
      if (this.checked) {
        $('.checkbox').each(function() {
          this.checked = true;
        });
      } else {
        $('.checkbox').each(function() {
          this.checked = false;
        });
      }
    });

    $('.checkbox').on('click', function() {
      if ($('.checkbox:checked').length == $('.checkbox').length) {
        $('#todo').prop('checked', true);
      } else {
        $('#todo').prop('checked', false);
      }
    });
  });
</script>