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
              <form action="<?php echo base_url('c_admin/Edificio'); ?>" method="POST">
                <div class="col-xs-3">
                  <input type="text" name="txtNomFil" id="txtNomFil" class="form-control" placeholder="Nombre">
                </div>
                <div class="col-xs-3">
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
                          <th>
                            <div class="center-block"><input type="checkbox" name="todo" id="todo" class="checkbox" />&nbsp;<button class="btn btn-danger btn-xs"  onclick="return confimar('borrar');">BORRAR</button></div>
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
                              <td><label class="fa <?php if($cop->cop_lunes == 2) echo "fa-check"; else echo "fa-square"; ?>"></label></td>
                              <td><label class="fa <?php if($cop->cop_martes == 2) echo "fa-check"; else echo "fa-square"; ?>"></label></td>
                              <td><label class="fa <?php if($cop->cop_miercoles == 2) echo "fa-check"; else echo "fa-square"; ?>"></label></td>
                              <td><label class="fa <?php if($cop->cop_jueves == 2) echo "fa-check"; else echo "fa-square"; ?>"></label></td>
                              <td><label class="fa <?php if($cop->cop_viernes == 2) echo "fa-check"; else echo "fa-square"; ?>"></label></td>
                              <td><label class="fa <?php if($cop->cop_sabado == 2) echo "fa-check"; else echo "fa-square"; ?>"></label></td>
                              <td><label class="fa <?php if($cop->cop_domingo == 2) echo "fa-check"; else echo "fa-square"; ?>"></label></td>                              
                              <td class="text-center">
                                <a name="btnEditar" id="btnEditar" class="btn btn-info btn-xs" onclick="javascript: edit('<?php echo $cop->cop_codigo ?>','<?php echo $cop->cop_codlab ?>','<?php echo $cop->cop_fecha_hora_inicia ?>','<?php echo $cop->cop_fecha_hora_fin ?>');">Modificar</a>
                              </td>
                              <td>
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
        <h4 class="modal-title">EDIFICIO</h4>
      </div>
      <div class="modal-body">
        <form id='frm_edificio' name="frm" action="<?php echo base_url('Edificios/Guardar'); ?>" method="POST">
          <input type="text" name="codedf" id="codedf" class="codedf hidden" value="0">
          <div class="form-row">
            <div class="form-group col-md-6 col-sm-6 col-xs-12">
              <label>Nombre</label>
              <input type="text" id="txtNom" name="txtNom" class="form-control col-md-7 col-xs-12 txtNom" placeholder="Ingrese el Nombre" required="">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6 col-sm-6 col-xs-12">
              <label>Acrónimo</label>
              <input type="text" id="txtAcr" name="txtAcr" class="form-control col-md-7 col-xs-12 txtAcr" placeholder="Ingresar Acrónimo" required="">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6 col-sm-6 col-xs-12">
              <label>Estado </label><br />
              <label>                
                <select name="ddlEst" id="ddlEst" class="form-control ddlEst">
                  <option value="A">Habilitado</option>
                  <option value="I">Deshabilitado</option>
                </select>
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
              <input type="submit" name="btnGuardar" id="btnGuardar" value="Guardar" class="btn btn-primary btnGuardar">
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
    $('.codedf').attr("value", "0");
    $('.txtNom').val('');
    $('.txtAcr').val('');
    $('.ddlEst').val("A");
  };

  function edit(c, n, a, e) {
    $('.codedf').attr("value", c);
    $('.txtNom').val(n);
    $('.txtAcr').val(a);
    $('.ddlEst').val(e);
    mostrarModal();
  };

  function confimar(text) {
		return confirm("¿Esta seguro que desea: " + text + " los registros seleccionados?");
	};

  $(document).ready(function() {

    // $('.checkbox').on('click', function() {
    //   if ($('.checkbox:checked').length == $('.checkbox').length) {
    //     $('#todo').prop('checked', true);
    //   } else {
    //     $('#todo').prop('checked', false);
    //   }
    // });

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