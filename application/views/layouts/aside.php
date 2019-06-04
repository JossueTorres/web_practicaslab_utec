   <?php
    $usrtipo =  $this->session->userdata("usrtipo");
    ?>

   <!-- sidebar menu -->

   <!-- menu estudiante -->
   <?php if ($usrtipo == 'estudiante') : ?>
     <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
       <div class="menu_section">
         <ul class="nav side-menu">
           <li><a href="<?php echo base_url('Alumno/Inicio'); ?>"><i class="fa fa-calendar"></i>&nbsp;Practicas</a></li>
           <li><a href="<?php echo base_url('Logout'); ?>"><i class="fa fa-sign-out"></i>&nbsp;Cerrar Sesión</a></li>
         </ul>
       </div>
     </div>
   <?php elseif ($usrtipo == 'encargado') : ?>
     <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
       <div class="menu_section">
         <ul class="nav side-menu">
           <li><a href="<?php echo base_url('Lab/Inicio'); ?>"><i class="fa fa-home"></i>&nbsp;Inicio</a></li>
           <li><a href="<?php echo base_url('Lab/MiLaboratorio'); ?>"><i class="fa fa-desktop"></i>&nbsp;Mi Laboratorio</a></li>
           </li>
           <li><a href="<?php echo base_url('Lab/Practicas'); ?>"><i class="fa fa-calendar"></i>&nbsp;Programar Práctica</a></li>
           <!-- <li><a href="<?php echo base_url(); ?>c_laboratorio/Informe"><i class="fa fa-file"></i>&nbsp;Informes</a></li> -->
           <li><a href="<?php echo base_url('Logout'); ?>"><i class="fa fa-sign-out"></i>&nbsp;Cerrar Sesión</a></li>
         </ul>
       </div>
     </div>
   <?php elseif ($usrtipo == 'admin') : ?>
     <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
       <div class="menu_section">
         <ul class="nav side-menu">
           <li><a href="<?php echo base_url('Admin/Inicio'); ?>"><i class="fa fa-home"></i>&nbsp;Inicio</a></li>
           <li><a href="<?php echo base_url('Admin/Edificios'); ?>"><i class="fa fa-building-o"></i>&nbsp;Edificios</a></li>
           <li><a href="<?php echo base_url('Admin/Laboratorios'); ?>"><i class="fa fa-desktop"></i>&nbsp;Laboratorios</a></li>
           <li><a href="<?php echo base_url(); ?>c_admin/EncargadoLaboratorio"><i class="fa fa-user"></i>&nbsp;Encargados</a></li>
           <!-- <li><a href="<?php echo base_url(); ?>c_admin/Inicio"><i class="fa fa-home"></i>&nbsp;Mi Perfil</a></li> -->

           <li><a href="<?php echo base_url('Logout'); ?>"><i class="fa fa-sign-out"></i>&nbsp;Cerrar Sesión</a></li>
         </ul>
       </div>
     </div>
   <?php endif; ?>
   <!-- sidebar menu -->
   </div>
   </div>