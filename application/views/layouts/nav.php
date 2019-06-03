        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url() ?>assets/template/dist/img/user.png" alt=""><?php echo $this->session->userdata("usrnombre") ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;">&nbsp;Perfil</a></li>
                    <!-- <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Configuraciones</span>
                      </a>
                    </li> -->
                    <!-- <li><a href="javascript:;">Ayuda</a></li> -->
                    <li><a onclick="javascript: return singOut();" href="<?php echo base_url('Logout'); ?>"><i class="fa fa-sign-out pull-right"></i>&nbsp;Cerrar Sesión</a></li>
                  </ul>
                </li>
                <!-- <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">1</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo base_url() ?>assets/template/dist/img/user.png" alt="Profile Image" /></span>
                        <span>
                          <span>Hector Bonilla</span>
                          <span class="time">Hace 1 minuto</span>
                        </span>
                        <span class="message">
                          Se ha iniciado session
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>Ver todas las alertas</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li> -->
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->