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

    $(".MAQ").click(function() {
      //alert("click");
      var codlab = $(this).attr("codlab");
      var codfil = $(this).attr("codfil");
      var codcol = $(this).attr("codcol");

      $("#txtcodmaq_lab").val(codlab);
      $("#txtcodmaq_fil").val(codfil);
      $("#txtcodmaq_col").val(codcol);


      var estado = $(this).attr("estado");
      $(this).removeClass("offPC");
      $(this).removeClass("onPC");
      $(this).removeClass("enabledPC");
      console.log($("#ckb_maq_no_dis").prop("checked"))
      if ($("#ckb_maq_no_dis").prop("checked")) {
        $(this).addClass("enabledPC");
        $(this).attr("estado", "I");

      } else {
        if (estado == "D") {
          $(this).addClass("offPC");
          $(this).attr("estado", "O");
        } else {

          $(this).addClass("onPC");
          $(this).attr("estado", "D");
        }
      }
      $("#txtmaqEstado").val($(this).attr("estado"));
    });
    $(".btn_buscar_lab_mapa").click(function(e) {
      //e.preventDefault();
      var cod = $(".ddl_buscar_lab_mapa").val();
      //alert(cod);
      setCookie("labBuscar", cod)
      ///$(this).unbind('submit').submit();
    });
    //alert(getCookie("labBuscar"));

    function setCookie(cname, cvalue) {
      document.cookie = cname + "=" + cvalue;
    }
    var co_LabBuscar = getCookie("labBuscar");
    if (co_LabBuscar == "") {
      co_LabBuscar = 1
    };

    $(".ddl_buscar_lab_mapa").val(co_LabBuscar);
    $("#Nombre_lab").text("Administrar " + $(".ddl_buscar_lab_mapa option:selected").text())

    function getCookie(cname) {
      var name = cname + "=";
      var decodedCookie = decodeURIComponent(document.cookie);
      var ca = decodedCookie.split(';');
      for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
          c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
        }
      }
      return "";
    }

    $(".btnOJOlab").click(function() {
      var cod = $(this).attr("codigo");
      $(".ddl_buscar_lab_mapa").val(cod);
      $(".btn_buscar_lab_mapa").click();
    });
  });
</script>


<script src="<?php echo base_url(); ?>assets/build/js/custom.min.js"></script>
</body>

</html>