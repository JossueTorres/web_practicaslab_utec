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
                          <div class="center-block"><input type="checkbox" name="todo" id="todo" class="checkbox" />&nbsp;<button class="btn btn-danger btn-xs pull-right btnBorrar" title="Eliminar Registros" onclick="return confimar('borrar');"><label class="fa fa-trash"></label></button></div>
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
          <input type="text" name="txtKey" id="txtKey" class="hidden txtKey" value="">
          <div class="form-row">
            <div class="form-group col-md-6 col-sm-12 col-xs-12">
              <label>Nombre</label>
              <input type="text" class="form-control col-md-7 col-xs-12 txtNom" name="txtNom" id="txtNom" placeholder="Ingrese su Nombre" required="">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6 col-sm-12 col-xs-12">
              <label>Contraseña</label>
              <input type="password" minlength="6" class="form-control col-md-7 col-xs-12 txtPass" name="txtPass" id="txtPass" placeholder="Ingrese su Contraseña" required="">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6 col-sm-12 col-xs-12">
              <label>Correo</label>
              <input type="email" minlength="6" class="form-control col-md-7 col-xs-12 txtCor" name="txtCor" id="txtCor" placeholder="Ingrese su Correo" required="">
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
                  <?php if (!empty($resp)) {
                    foreach ($resp as $lab) { ?>
                      <option value="<?php echo $lab->lab_codigo ?>"><?php echo $lab->lab_nombre ?></option>
                    <?php }
                }  ?>
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
              <button type="submit" class="btn btn-primary btnGuardarDatos">Guardar</button>
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
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/6.1.0/firebase-app.js"></script>
<!-- Add additional services that you want to use -->
<script src="https://www.gstatic.com/firebasejs/6.1.0/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/6.1.0/firebase-database.js"></script>
<script>
  var nextkey = 0;
  // Your web app's Firebase configuration
  var firebaseConfig = {
    // apiKey: "AIzaSyBpHUZPHz4Vzm_tazZjBVxcHI_U5NfyvHA",
    // authDomain: "practicas-df991.firebaseapp.com",
    // databaseURL: "https://practicas-df991.firebaseio.com",
    // projectId: "practicas-df991",
    // storageBucket: "practicas-df991.appspot.com",
    // messagingSenderId: "1057359215817",
    // appId: "1:1057359215817:web:e14cde41471629df"
    //Alexis
    apiKey: "AIzaSyB4JQ_A4o6sfVloiwG42t8xB_BwFgm3dXI",
    authDomain: "applab-9034b.firebaseapp.com",
    databaseURL: "https://applab-9034b.firebaseio.com",
    projectId: "applab-9034b",
    storageBucket: "applab-9034b.appspot.com",
    messagingSenderId: "998271382901",
    appId: "1:998271382901:web:b64304d5e40c14aa"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  var database = firebase.database();
  database.ref('Usuarios').on('child_added', function(data) {
    // add_data_table(data.val().username, data.val().profile_picture, data.val().email, data.key);
    // listar();
    var lastkey = data.key;
    if(lastkey != "NaN"){
      nextkey = parseInt(lastkey) + 1;
    }      
  });
  database.ref('Usuarios').on('child_changed', function(data) {
    // update_data_table(data.val().username, data.val().profile_picture, data.val().email, data.key)
    // listar();
  });
  database.ref('Usuarios').on('child_removed', function(data) {
    // remove_data_table(data.key)
    // listar();
  });

  // function add_data_table(name, pic, email, key) {
  //   $("#card-list").append('<div class="column is-3" id="' + key + '"><div class="card"><div class="card-image"><figure class="image is-4by3"><img src="' + pic + '"></figure></div><div class="card-content"><div class="media"><div class="media-content"><p class="title is-4">' + name + '</p><p class="subtitle is-6">@' + email + '</p></div></div></div><footer class="card-footer"><a href="#" data-key="' + key + '" class="card-footer-item btnEdit">Edit</a><a href="#" class="card-footer-item btnRemove"  data-key="' + key + '">Remove</a></footer></div></div>');
  // }

  // function update_data_table(name, pic, email, key) {
  //   $("#card-list #" + key).html('<div class="card"><div class="card-image"><figure class="image is-4by3"><img src="' + pic + '"></figure></div><div class="card-content"><div class="media"><div class="media-content"><p class="title is-4">' + name + '</p><p class="subtitle is-6">@' + email + '</p></div></div></div><footer class="card-footer"><a href="#" class="card-footer-item btnEdit"  data-key="' + key + '">Edit</a><a  data-key="' + key + '" href="#" class="card-footer-item btnRemove">Remove</a></footer></div>');
  // }

  // function remove_data_table(key) {
  //   $("#card-list #" + key).remove();
  // }

  function new_data(n, c, r, l, key) {
    database.ref('Usuarios/' + key).set({
      nombres: n,
      correo: c,
      codlab: l,
      rol: r
    });
  }

  // function createUser(email, password) {

  // }

  function update_data(n, c, r, l, key) {
    database.ref('Usuarios/' + key).update({
      nombres: n,
      correo: c,
      codlab: l,
      rol: r
    });
  }

  function listar() {
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
            var a = "<a name='btnEditar' id='btnEditar' title='Editar Registros' class='btn btn-info btn-xs btnEditar' onclick='javascript: edit(\"" + n + "\",\"" + c + "\",\"" + r + "\",\"" + l + "\",\"" + k + "\");'><i class='fa fa-edit'></i></a>";
            var b = "<input type='checkbox' name='chkBorrar[]' class='checkbox chkBorrar' value='" + k + "' />";
            if (r != 'encargado') {
              l = 'No aplica'
              if (r == 'admin') {
                r = 'Administrador'
              }
              if (r == 'estudiante') {
                r = 'Alumno'
              }
            } else {
              r = 'Encargado'
            }
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
  }

  function mostrarModal() {
    $("#modal-encargado").modal('show');
  };

  function cleanFields() {

    $('.divLab').hide();
    // $('.codedf').attr("value", "0");
    $('.txtKey').val("");
    $('.txtNom').val("");
    $('.txtPass').val("").removeAttr("disabled");
    $('.txtCor').val("");
    $('.ddlRol').val('');
    $('.ddlLab').val('');
  };

  function edit(n, c, r, l, k) {
    // $('.codedf').attr("value", c);
    $('.divLab').show();
    if (r != 'encargado') {
      $('.divLab').hide();
      $('.ddlLab').val('');
    } else {
      $('.ddlLab').val(l);
    }
    $('.txtKey').attr('value', k);
    $('.txtNom').val(n);
    $('.txtPass').val("").attr("disabled", "disabled");
    $('.txtCor').val(c);
    $('.ddlRol').val(r);
    mostrarModal();
  };

  function confimar(text) {
    return confirm("¿Esta seguro que desea: " + text + " los registros seleccionados?");
  };

  $(document).ready(function() {

    $('.ddlRol').change(function() {
      if ($(this).val() != 'encargado') {
        $('.divLab').hide();
      } else {
        $('.divLab').show();
      }
    });

    // listaUsuarios();
    listar();

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

    $(".btnGuardarDatos").click(function(e) {
      e.preventDefault();
      var k = $('.txtKey').val();
      var n = $('.txtNom').val();
      var p = $('.txtPass').val();
      var c = $('.txtCor').val();
      var r = $('.ddlRol').val();
      var l = $('.ddlLab').val();
      if (r != "encargado") {
        l = 0;
      }
      if (k.length > 2) {
        update_data(n, c, r, l, k);
        location.reload();
      } else {
        firebase.auth().createUserWithEmailAndPassword(c, p).then(function() {

          database.ref('Usuarios').once("value").then(function(snapshot) {
            if (snapshot.numChildren() == 0) {
              nextkey = 1;
            }
            new_data(n, c, r, l, nextkey);
            location.reload();
          });
        }).catch(function(error) {
          // Handle Errors here.          
          var errorCode = error.code;
          var errorMessage = error.message;
          alert(errorCode + "\n"+ errorMessage);
          // ...
        });
      }
    });
    $(".btnBorrar").click(function() {
      event.preventDefault();
      $(".chkBorrar:checked").each(function() {
        // alert($(this).val());
        key = $(this).val();
        database.ref('Usuarios/' + key).remove();
        location.reload();
      })
    });

  });
</script>