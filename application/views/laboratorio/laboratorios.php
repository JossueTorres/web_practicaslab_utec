<!-- page content -->
<style>
.onPC{
  background-color: #A1F378;
  color:#fff;
  border-radius:5px;
  cursor:pointer;
}
.offPC{
  background-color: #E99F9F;
  color:#fff;
  border-radius:5px;
  cursor:pointer;
}
.enabledPC{
  background-color: #E5D7D7;
  color:#fff;
  border-radius:5px;
}
</style>
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
              <h2 class="fuentetitulo">CONTROL LABORATORIO 1</h2>
              <div class="clearfix"></div>
          </div>
          <div class="x_content" style="text-align: center;">
            <center>
        <?php $n=1; ?>
          <?php foreach(range(1,8) as $i):?>
            <?php foreach(range(1,5) as $x):?>
              <div class="form-row">
                      <div class="form-group col-md-1 col-sm-1 col-xs-1">
                        <div class="MAQ onPC" estado="1">
                          <center><div class=""> <img src="https://pngimage.net/wp-content/uploads/2018/06/icone-informatique-png-1.png" alt="" width="40" height="40"></div></center>                
                          <center><h4><label href="#">PCz-<?php echo $n++;?></label></h4></center>
                        </div>
                      </div>              
              </div>
             <?php endforeach;?>
             <div class="form-row">
                      <div class="form-group col-md-1 col-sm-1 col-xs-1">
                        <div class="">
                          <center><div class=""> <img src="" alt="" width="10" height="10"></div>             
               
                        </div>
                      </div>              
              </div>
             <?php foreach(range(1,5) as $x):?>
              <div class="form-row">
                      <div class="form-group col-md-1 col-sm-1 col-xs-1">
                        <div class="MAQ offPC" estado="0">
                          <center><div class=""> <img src="https://pngimage.net/wp-content/uploads/2018/06/icone-informatique-png-1.png" alt="" width="40" height="40"></div></center>                
                          <center><h4><label href="#">PC-<?php echo $n++;?></label></h4></center>
                        </div>
                      </div>              
              </div>
             <?php endforeach;?>
             <div class="form-row">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        </div>
                      </div>
          <?php endforeach;?>
            </center>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>

</script>
<!-- /page content -->


      

