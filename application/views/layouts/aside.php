   <?php
    $usrtipo =  $this->session->userdata("usrtipo");
    ?>

   <!-- sidebar menu -->

   <!-- menu estudiante -->
   <?php if ($usrtipo == 4) : ?>
     <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
       <div class="menu_section">
         <ul class="nav side-menu">
           <li><a href="<?php echo base_url('Alumno/Inicio'); ?>"><i class="fa fa-home"></i> Inicio</a></li>
           <li><a href="<?php echo base_url(); ?>c_estudiante/practica"><i class="fa fa-home"></i> Practicas</a></li>
           <li><a href="<?php echo base_url(); ?>Dashboard"><i class="fa fa-home"></i> Cerrar Sesión</a></li>

         </ul>
       </div>
     </div>
   <?php elseif ($usrtipo == 2) : ?>
     <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
       <div class="menu_section">
         <ul class="nav side-menu">
           <li><a href="<?php echo base_url('Lab/Inicio'); ?>"><i class="fa fa-home"></i> Inicio</a></li>
           <li><a href="<?php echo base_url(); ?>c_laboratorio/ControlLaboratorio"><i class="fa fa-desktop"></i> Control Laboratorio</a></li>
           </li>
           <li><a href="<?php echo base_url('Practicas'); ?>"><i class="fa fa-calendar"></i> Programar Practica</a></li>
           <li><a href="<?php echo base_url(); ?>c_laboratorio/Informe"><i class="fa fa-file"></i> Informes</a></li>
           <li><a href="<?php echo base_url(); ?>"><i class="fa fa-sign-out"></i> Cerrar Sesion</a></li>
         </ul>
       </div>
     </div>
   <?php elseif ($usrtipo == 1) : ?>
     <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
       <div class="menu_section">
         <ul class="nav side-menu">
           <li><a href="<?php echo base_url('Admin/Inicio'); ?>"><i class="fa fa-home"></i> Inicio</a></li>
           <li><a href="<?php echo base_url('Edificios'); ?>"><i class="fa fa-building-o"></i> Edificios</a></li>
           <li><a href="<?php echo base_url('Laboratorios'); ?>"><i class="fa fa-desktop"></i> Laboratorios</a></li>
           <li><a href="<?php echo base_url(); ?>c_admin/EncargadoLaboratorio"><i class="fa fa-home"></i> Encargados</a></li>
           <li><a href="<?php echo base_url(); ?>c_admin/Inicio"><i class="fa fa-home"></i> Mi Perfil</a></li>

           <li><a href="<?php echo base_url(); ?>Dashboard"><i class="fa fa-home"></i> Cerrar Sesion</a></li>
         </ul>
       </div>
     </div>
   <?php endif; ?>
   <!-- sidebar menu -->
   </div>
   </div>