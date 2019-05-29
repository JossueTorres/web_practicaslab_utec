
        <!-- footer content -->
        <footer>
          <div class="pull-right">
           Desarrollado 2019 <a href=""></a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
 

    
    <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/template/jquery/dist/jquery.min.js"></script> 
    <!-- Bootstrap -->
    <script src="<?php echo base_url();?>assets/template/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url();?>assets/template/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url();?>assets/template/nprogress/nprogress.js"></script>

    <!-- bootstrap-datetimepicker -->
      <script src="<?php echo base_url();?>assets/template/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url();?>assets/template/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url();?>assets/template/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url();?>assets/template/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url();?>assets/template/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="<?php echo base_url();?>assets/template/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="<?php echo base_url();?>assets/template/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="<?php echo base_url();?>assets/template/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="<?php echo base_url();?>assets/template/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="<?php echo base_url();?>assets/template/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url();?>assets/template/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="<?php echo base_url();?>assets/template/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="<?php echo base_url();?>assets/template/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="<?php echo base_url();?>assets/template/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="<?php echo base_url();?>assets/template/starrr/dist/starrr.js"></script>


    <!-- SweetAlert -->   

  <!-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script> -->

  <script src="<?php echo base_url(); ?>assets/template/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/template/datatables/dataTables.bootstrap.min.js"></script>

  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script> -->
  <script src="<?php echo base_url(); ?>assets/template/sweetAlert/sweetalert.js"></script>
 <!-- Custom Theme Scripts -->
 <script>
	$(document).ready(function(){
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

  });
  </script>


<script>  

$('#frm_edificio').on("submit", function(event){  
  event.preventDefault();  
  if($('#txtCodigo').val() == "")    
    alert("Facultad es requerida");  
  
  else if($('#txtNombre').val() == "")   
    alert("Escuela es requerida");  
  
  else if($('#txtAcronimo').val() == "") 
    alert("Codigo de seminario es requerido"); 
  
 
else  
{  
  $.ajax({  
    url:"<?php echo base_url();?>apis/admin/Edificio_api/insertEdificio",  
    method:"POST",  
    data:$('#frm_edificio').serialize(),  
    beforeSend:function(){  
      $('#guardar').val("Guardando...");  
     }, 

     success:function(data){  
      $('#frm_edificio')[0].reset(); 
   
      $('#modal-edificio').modal('hide'); 
      // $('#tabla_seminario').html(data); 
   
    }  
  });  
}  
});



</script>


<script src="<?php echo base_url();?>assets/build/js/custom.min.js"></script>
  </body>
</html>
