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
                            <form action="<?php echo base_url('Laboratorios'); ?>" method="POST">
                                <div class="col-sm-3 col-xs-12">
                                    <label>Nombre</label>
                                    <input type="text" name="txtNomFil" id="txtNomFil" class="form-control" placeholder="Nombre">
                                </div>
                                <div class="col-sm-2 col-xs-12">
                                <label>Acrónimo</label>
                                    <input type="text" name="txtAcrFil" id="txtAcrFil" class="form-control" placeholder="Acrónimo">
                                </div>
                                <div class="col-sm-3 col-xs-12">
                                <label>Edificio</label>
                                    <select name="ddlEdfFil" id="ddlEdfFil" class="form-control ddlEdfFil">
                                        <option value="">(Todos)</option>
                                        <?php if (!empty($lst2)) {
                                            foreach ($lst2 as $edf) { ?>
                                                <option value="<?php echo $edf->edf_codigo ?>"><?php echo $edf->edf_nombre ?></option>
                                            <?php }
                                    }  ?>
                                    </select>
                                </div>
                                <div class="col-sm-2 col-xs-12">
                                <label>Estado</label>
                                    <select name="ddlEstFil" id="ddlEstFil" class="form-control ddlEstFil">
                                        <option value="">(Todos)</option>
                                        <option value="A">Habilitado</option>
                                        <option value="I">Deshabilitado</option>
                                    </select>
                                </div>
                                <div class="col-sm-2 col-xs-12">
                                    <br>
                                    <button type="submit" class="btn btn-success">Buscar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-laboratorio"><span class="fa fa-plus"></span> Agregar Laboratorio</button>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <form id='frm_del_laboratorio' name="frm_del_laboratorio" action="<?php echo base_url('Laboratorios/Borrar'); ?>" method="POST">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover" id="tabla">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>NOMBRE</th>
                                                    <th>ACRÓNIMO</th>
                                                    <th># FILAS</th>
                                                    <th># COLUMNAS</th>
                                                    <th>ESTADO</th>
                                                    <th style="text-align:center; ">
                                                        ACCIONES
                                                    </th>
                                                    <th style="text-align:center; "> 
                                                        <button class="btn btn-danger btn-xs" onclick="return confimar('borrar');">BORRAR</button>
                                                        <input type="checkbox" name="todo" id="todo" class="checkbox" />
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($lst1)) {
                                                    foreach ($lst1 as $lb) { ?>
                                                        <tr>
                                                            <td><?php echo $lb->lab_codigo; ?></td>
                                                            <td><?php echo $lb->lab_nombre; ?></td>
                                                            <td><?php echo $lb->lab_acronimo; ?></td>
                                                            <td><?php echo $lb->lab_filas; ?></td>
                                                            <td><?php echo $lb->lab_columnas; ?></td>
                                                            <td><label class="label <?php if ($lb->lab_estado == 'A') echo 'label-success';
                                                                                    else echo 'label-danger'; ?>"><?php if ($lb->lab_estado == 'A') echo 'Habilitado';
                                                                                                                            else echo 'Deshabilitado'; ?></label></td>
                                                            <td style="text-align:center; ">
                                                                <!-- <button class="btn btn-sm btn-info" codigo="<?php echo $lb->lab_codigo; ?>" type="button"><span class="fa fa-eye"></span></button> -->
                                                                <a name="btnEditar" id="btnEditar" class="btn btn-info btn-xs" onclick="javascript: edit('<?php echo $lb->lab_codigo ?>','<?php echo $lb->lab_codedf ?>','<?php echo $lb->lab_nombre ?>','<?php echo $lb->lab_acronimo ?>','<?php echo $lb->lab_filas ?>','<?php echo $lb->lab_columnas ?>','<?php echo $lb->lab_latitud ?>','<?php echo $lb->lab_longitud ?>','<?php echo $lb->lab_estado ?>');" title="Editar Laboratorio"><i class="fa fa-edit"></i></a>
                                                                <a name="btnCrear" id="btnCrear" class="btn btn-info btn-xs" onclick="javascript: crear('<?php echo $lb->lab_codigo ?>','<?php echo $lb->lab_filas ?>','<?php echo $lb->lab_columnas ?>','<?php echo $lb->lab_acronimo ?>');" title="Crear o actualizar máquinas del Laboratorio"><i class="fa fa-desktop"></i>&nbsp;<i class="fa fa-refresh"></i></a>
                                                            </td>
                                                            <td style="text-align:center; ">
                                                                <input type="checkbox" name="chkBorrar[]" class="checkbox" value="<?php echo $lb->lab_codigo; ?>" />
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
                <!-- page content -->
                <!-- /page content -->
            </div>
        </div>
    </div>

</div>
<!-- modal form -->
<div class="modal fade" id="modal-laboratorio">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">LABORATORIO</h4>
            </div>
            <div class="modal-body">
                <form id='frm_laboratorio' name="frm_laboratorio" action="<?php echo base_url('Laboratorios/Guardar'); ?>" method="POST">
                    <input type="text" name="codlab" id="codlab" class="codlab hidden" value="0">
                    <div class="form-row">
                        <div class="form-group col-md-8 col-sm-12 col-xs-12">
                            <label>Edificio</label>
                            <select name="ddlEdf" id="ddlEdf" class="form-control ddlEdf" required="">
                                <option value="">(Seleccione Uno)</option>
                                <?php if (!empty($lst2)) {
                                    foreach ($lst2 as $edf) { ?>
                                        <option value="<?php echo $edf->edf_codigo ?>"><?php echo $edf->edf_nombre ?></option>
                                    <?php }
                            }  ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre</label>
                            <input type="text" id="txtNom" name="txtNom" class="form-control col-md-7 col-xs-12 txtNom" placeholder="Ingrese el Nombre" required="" maxlength="249">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <label>Acrónimo</label>
                            <input type="text" id="txtAcr" name="txtAcr" class="form-control col-md-7 col-xs-12 txtAcr" placeholder="Ingresar Acrónimo" required="" maxlength="9">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <label>Filas</label>
                            <input type="number" id="txtFil" name="txtFil" class="form-control col-md-7 col-xs-12 txtFil" placeholder="# de Filas" required="" max="10000" min="1">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <label>Columnas</label>
                            <input type="number" id="txtCol" name="txtCol" class="form-control col-md-7 col-xs-12 txtCol" placeholder="# de Columnas" required="" max="10000" min="1">
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
                            <h5>Coordenadas&nbsp;<small>(Opcionales)</small></h5>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <label>Latitud</label>
                            <input type="number" id="txtLat" name="txtLat" class="form-control col-md-7 col-xs-12 txtLat" placeholder="Coordenada 1" max="90" min="-90">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <label>Longitud</label>
                            <input type="number" id="txtLon" name="txtLon" class="form-control col-md-7 col-xs-12 txtLon" placeholder="Coordenada 2" max="180" min="-180">
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

<!-- modal form -->
<div class="modal fade" id="modal-maq">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">CREAR MÁQUINAS</h4>
            </div>
            <div class="modal-body">
                <form id='frm_maquinas' name="frm_maquinas" action="<?php echo base_url('Laboratorios/crearMaquinas'); ?>" method="POST">
                    <input type="text" name="lblLab" id="lblLab" class="hidden lblLab">
                    <input type="text" name="lblFil" id="lblFil" class="hidden lblFil">
                    <input type="text" name="lblCol" id="lblCol" class="hidden lblCol">
                    <input type="text" name="lblAcr" id="lblAcr" class="hidden lblAcr">
                    <div class="form-row">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <p>SE CREARÁN <label name="fil" id="fil" class="lblFil"></label>&nbsp;FILAS Y <label name="col" id="col" class="lblCol">&nbsp;</label>&nbsp;COLUMNAS PARA LA MAQUETA DEL LABORATORIO CON ACRÓNIMO&nbsp;<label name="acr" id="acr" class="lblAcr"></p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <input type="submit" name="btnConfirmar" id="btnConfirmar" value="Confirmar" class="btn btn-primary btnConfirmar">
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

<script>
    function mostrarModal() {
        $("#modal-laboratorio").modal('show');
    };
    function mostrarModalMaq() {
        $("#modal-maq").modal('show');
    };

    function cleanFields() {
        $('.codedf').attr("value", "0");
        $('.txtNom').val('');
        $('.txtAcr').val('');
        $('.ddlEst').val("A");
    };

    function edit(c, e, n, a, f, col, lat, lon, est) {
        $('.codlab').attr("value", c);
        $('.ddlEdf').val(e);
        $('.txtNom').val(n);
        $('.txtAcr').val(a);
        $('.txtFil').val(f);
        $('.txtCol').val(col);
        $('.txtLat').val(lat);
        $('.txtLon').val(lon);
        $('.ddlEst').val(est);
        mostrarModal();
    };

    function crear(l, f, c, a) {
        $('.lblLab').text(l).val(l);
        $('.lblFil').text(f).val(f);
        $('.lblCol').text(c).val(c);
        $('.lblAcr').text(a).val(a);
        mostrarModalMaq();
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