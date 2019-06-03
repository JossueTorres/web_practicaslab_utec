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

<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>assets/template/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- JQuery UI -->
<script src="<?php echo base_url(); ?>assets/template/jquery-ui-1.9.2/js/jquery-ui-1.9.2.custom.min.js"></script>
<!-- Wickedpicker -->
<script src="<?php echo base_url(); ?>assets/template/wickedpicker/dist/wickedpicker.min.js"></script>
<!-- Wickedpicker -->
<!-- <script src="<?php echo base_url(); ?>assets/template/timepicker/jquery.timepicker.js"></script> -->
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/template/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?php echo base_url(); ?>assets/template/nprogress/nprogress.js"></script>
<!-- bootstrap-progressbar -->
<!-- <script src="<?php echo base_url(); ?>assets/template/bootstrap-progressbar/bootstrap-progressbar.min.js"></script> -->
<!-- iCheck -->
<script src="<?php echo base_url(); ?>assets/template/iCheck/icheck.min.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?php echo base_url(); ?>assets/template/moment/Moment.js"></script>
<script src="<?php echo base_url(); ?>assets/template/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-datetimepicker -->
<script src="<?php echo base_url(); ?>assets/template/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<!-- Switchery -->
<script src="<?php echo base_url(); ?>assets/template/switchery/dist/switchery.min.js"></script>
<!-- bootstrap-wysiwyg -->
<!-- <script src="<?php echo base_url(); ?>assets/template/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script> -->
<!-- <script src="<?php echo base_url(); ?>assets/template/jquery.hotkeys/jquery.hotkeys.js"></script> -->
<script src="<?php echo base_url(); ?>assets/template/google-code-prettify/src/prettify.js"></script>
<!-- jQuery Tags Input -->
<!-- <script src="<?php echo base_url(); ?>assets/template/jquery.tagsinput/src/jquery.tagsinput.js"></script> -->
<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/template/select2/dist/js/select2.full.min.js"></script>
<!-- Parsley -->
<!-- <script src="<?php echo base_url(); ?>assets/template/parsleyjs/dist/parsley.min.js"></script> -->
<!-- Autosize -->
<!-- <script src="<?php echo base_url(); ?>assets/template/autosize/dist/autosize.min.js"></script> -->
<!-- jQuery autocomplete -->
<!-- <script src="<?php echo base_url(); ?>assets/template/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script> -->
<!-- starrr -->
<script src="<?php echo base_url(); ?>assets/template/starrr/dist/starrr.js"></script>
<!-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script> -->

<script src="<?php echo base_url(); ?>assets/template/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/datatables/dataTables.bootstrap.min.js"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script> -->
<script src="<?php echo base_url(); ?>assets/template/sweetAlert/sweetalert.js"></script>

<!-- Custom Theme Scripts -->
<script>
  function singOut() {
    if (!confirm("¿Está seguro que desea cerrar la sesión?")) {
      return false;
    } else {
      firebase.auth().signOut().then(function() {
        // Sign-out successful.
        // alert("Saliendo...");
      }).catch(function(error) {
        alert("Error");
        // An error happened.
      });
      return true;
    }
  }
  $(document).ready(function() {

    window.history.pushState(null, "", window.location.href);
    window.onpopstate = function() {
      window.history.pushState(null, "", window.location.href);
    };

    $('#frm_edificio').on("submit", function(event) {
      if ($('.form-control-statictxtNom').val() == "") {
        event.preventDefault();
        alert("El campo nombre es requerido");
      } else if ($('.txtAcr').val() == "") {
        event.preventDefault();
        alert("El campo acrónimo es requerido");
      }
    });
  });
</script>


<script src="<?php echo base_url(); ?>assets/build/js/custom.min.js"></script>
</body>

</html>