<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2 class="fuentetitulo">PRÁCTICAS LIBRES <small>LISTADO</small></h2>
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
                <form id='frm_del_edificio' name="frmdel" action="<?php echo base_url('Edificios/Borrar'); ?>" method="POST">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover" id="tabla">
                      <thead>
                        <tr>
                          <th>LAB</th>
                          <th>FECHA INICIA</th>
                          <th>FECHA TERMINA</th>
                          <th>L</th>
                          <th>M</th>
                          <th>X</th>
                          <th>J</th>
                          <th>V</th>
                          <th>S</th>
                          <th>D</th>
                          <th>ACCIONES</th>
                          <th style="text-align:center;">
                            <div class="center-block"><input type="checkbox" name="todo" id="todo" class="checkbox" />&nbsp;<button class="btn btn-danger btn-xs pull-right" onclick="return confimar('borrar');"><label class="fa fa-trash"></label></button></div>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if (!empty($resp)) {
                          foreach ($resp as $cop) { ?>
                            <tr>
                              <td><?php echo $cop->cop_codlab; ?></td>
                              <td><?php echo $cop->cop_fecha_hora_inicia; ?></td>
                              <td><?php echo $cop->cop_fecha_hora_fin; ?></td>
                              <td><label class="fa <?php if ($cop->cop_lunes == 2) echo "fa-check";
                                                    else echo "fa-square"; ?>"></label></td>
                              <td><label class="fa <?php if ($cop->cop_martes == 2) echo "fa-check";
                                                    else echo "fa-square"; ?>"></label></td>
                              <td><label class="fa <?php if ($cop->cop_miercoles == 2) echo "fa-check";
                                                    else echo "fa-square"; ?>"></label></td>
                              <td><label class="fa <?php if ($cop->cop_jueves == 2) echo "fa-check";
                                                    else echo "fa-square"; ?>"></label></td>
                              <td><label class="fa <?php if ($cop->cop_viernes == 2) echo "fa-check";
                                                    else echo "fa-square"; ?>"></label></td>
                              <td><label class="fa <?php if ($cop->cop_sabado == 2) echo "fa-check";
                                                    else echo "fa-square"; ?>"></label></td>
                              <td><label class="fa <?php if ($cop->cop_domingo == 2) echo "fa-check";
                                                    else echo "fa-square"; ?>"></label></td>
                              <td class="text-center">
                                <a name="btnEditar" id="btnEditar" class="btn btn-info btn-xs" onclick="javascript: edit('<?php echo $cop->cop_codigo ?>','<?php echo $cop->cop_codlab ?>','<?php echo $cop->cop_fecha_hora_inicia ?>','<?php echo $cop->cop_fecha_hora_fin ?>');">Modificar</a>
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
        <form id='frm_edificio' name="frm" action="<?php echo base_url('Practicas/Guardar'); ?>" method="POST">
          <input type="text" name="codcop" id="codcop" class="codcop hidden" value="0">
          <input type="ddlLab" name="ddlLab" id="ddlLab" class="ddlLab hidden" value="<?php echo $this->session->userdata('usrlab') ?>">
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
                    <td><input type="checkbox" name="chkD" id="chkD" class="chkD"></td>
                    <td><input type="checkbox" name="chkD" id="chkD" class="chkD"></td>
                    <td><input type="checkbox" name="chkD" id="chkD" class="chkD"></td>
                    <td><input type="checkbox" name="chkD" id="chkD" class="chkD"></td>
                    <td><input type="checkbox" name="chkD" id="chkD" class="chkD"></td>
                    <td><input type="checkbox" name="chkD" id="chkD" class="chkD"></td>
                    <td><input type="checkbox" name="chkD" id="chkD" class="chkD"></td>
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
              <input type="button" onclick="javascript: return validarCampos();" name="btnGuardar" id="btnGuardar" value="Guardar" class="btn btn-primary btnGuardar">
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
<script>
  function mostrarModal() {
    $("#modal-edificio").modal('show');
  };

  function cleanFields() {
    $('.codcop').attr("value", "0");
    $('.txtNom').val('');
    $('.txtAcr').val('');
    $('.ddlEst').val("A");
  };

  function edit(c, n, a, e) {
    $('.codcop').attr("value", c);
    $('.txtNom').val(n);
    $('.txtAcr').val(a);
    $('.ddlEst').val(e);
    mostrarModal();
  };

  function validaFecha() {
    var fistr = $(".txtFini").val();
    var ffstr = $(".txtFfin").val();
    if (moment(fistr, 'DD-MM-YYYY', true).isValid()) {
      if (moment(ffstr, 'DD-MM-YYYY', true).isValid()) {
        var fini = moment(fistr, 'DD-MM-YYYY');
        var ffin = moment(ffstr, 'DD-MM-YYYY');
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

  $(document).ready(function() {

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