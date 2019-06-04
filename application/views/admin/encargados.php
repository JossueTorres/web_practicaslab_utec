<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2 class="fuentetitulo">ENCARGADOS <small>LISTADO (FIREBASE DATABASE)</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <button class="btn btn-primary" type="button" onclick="javascript: cleanFields();mostrarModal();"><span class="fa fa-plus"></span> Agregar Encargado</button>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="table-responsive">
                  <table class="table table-striped table-hover" id="tabla">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>NOMBRE</th>
                        <th>CORREO</th>
                        <th>ROL</th>
                        <th>CODLAB</th>
                        <th>
                          ACCIONES
                        </th>
                        <th style="text-align:center;">
                          <div class="center-block"><input type="checkbox" name="todo" id="todo" class="checkbox" />&nbsp;<button class="btn btn-danger btn-xs pull-right" title="Eliminar Registros" onclick="return confimar('borrar');"><label class="fa fa-trash"></label></button></div>
                        </th>
                      </tr>
                    </thead>
                    <tbody id="tbodyUser">
                      <!-- <tr>
                        <td>1</td>
                        <td>Jorge Alonso</td>
                        <td>jorge.rodriguez@mail.utec.edu.sv</td>
                        <td>ROL</td>
                        <td>LAB1(quemado)</td>
                        <td style="text-align:center;">
                          <a name="btnEditar" id="btnEditar" title="Editar Registros" class="btn btn-info btn-xs" onclick="javascript: edit('');"><i class="fa fa-edit"></i></a>
                        </td>
                        <td style="text-align:center;">
                          <input type="checkbox" name="chkBorrar[]" class="checkbox" value="0" />
                        </td>
                      </tr> -->
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
<div class="modal fade" id="modal-encargado">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">ENCARGADO</h4>
      </div>
      <div class="modal-body">
        <form name="frm_usuarios" action="" method="POST">
          <div class="form-row">
            <div class="form-group col-md-12 col-sm-12 col-xs-12">
              <label>Nombre</label>
              <input type="text" class="form-control col-md-7 col-xs-12 txtNom" name="txtNom" id="txtNom" placeholder="Ingrese su Nombre" required="">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6 col-sm-12 col-xs-12">
              <label>Correo</label>
              <input type="email" class="form-control col-md-7 col-xs-12 txtCor" name="txtCor" id="txtCor" placeholder="Ingrese su Correo" required="">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6 col-sm-12 col-xs-12">
              <label>Rol</label><br>
              <select class="form-control ddlRol" name="ddlRol" id="ddlRol" required="">
                <option value="">(Seleccione Uno)</option>
                <option value="admin">ADMINISTRADOR</option>
                <option value="encargado">ENCARGADO</option>
                <option value="estudiante">ALUMNO</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12 col-sm-12 col-xs-12">
              <div class="ln_solid"></div>
            </div>
          </div>
          <div class="divLab">
            <div class="form-row">
              <div class="form-group col-md-6 col-sm-12 col-xs-12">
                <label>Laboratorio</label><br>
                <select class="form-control ddlLab" name="ddlLab" name="ddlLab" id="ddlLab" required="">
                  <option value="">(Seleccione Uno)</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12 col-sm-12 col-xs-12">
                <div class="ln_solid"></div>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12 col-sm-12 col-xs-12">
              <button type="submit" class="btn btn-primary">Guardar</button>
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
    $("#modal-encargado").modal('show');
  };

  function cleanFields() {
    $('.divLab').show();
    // $('.codedf').attr("value", "0");
    $('.txtNom').val("");
    $('.txtCor').val("");
    $('.ddlRol').val('');
    $('.ddlLab').val('');
  };

  function edit(n, c, r, l) {
    // $('.codedf').attr("value", c);
    $('.divLab').show();
    if (r != 'encargado') {
      $('.divLab').hide();
    }
    $('.txtNom').val(n);
    $('.txtCor').val(c);
    $('.ddlRol').val(r);
    $('.ddlLab').val('');
    mostrarModal();
  };

  function confimar(text) {
    return confirm("¿Esta seguro que desea: " + text + " los registros seleccionados?");
  };

  $(document).ready(function() {
    // listaUsuarios();
    $('#tabla').DataTable({
      "ajax": {
        "url": "https://applab-9034b.firebaseio.com/Usuarios.json",
        "type": "GET",
        "dataSrc": function(json) {
          var return_data = new Array();
          var con = 1;
          $.each(json, function(k, v) {
            var n = v['nombres'];
            var c = v['correo'];
            var r = v['rol'];
            var l = v['codlab'];
            if (r != 'encargado') {
              l = 'No aplica'
            }
            var a = "<a name='btnEditar' id='btnEditar' title='Editar Registros' class='btn btn-info btn-xs btnEditar' onclick='javascript: edit(\"" + n + "\",\"" + c + "\",\"" + r + "\",\"" + l + "\");'><i class='fa fa-edit'></i></a>";
            var b = "<input type='checkbox' name='chkBorrar[]' class='checkbox' value='" + c + "' />";
            return_data.push({
              'num': con,
              'nombres': n,
              'correo': c,
              'rol': r,
              'codlab': l,
              'accion': a,
              'borrar': b,
            })
            con++;
          });
          return return_data;
        }
      },
      "columns": [{
          'data': 'num'
        },
        {
          'data': 'nombres'
        },
        {
          'data': 'correo'
        },
        {
          'data': 'rol'
        },
        {
          'data': 'codlab'
        },
        {
          'data': 'accion'
        },
        {
          'data': 'borrar'
        },
      ]
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