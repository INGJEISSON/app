

<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              
         <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
             ADMINISTRACIÓN
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <?php 
              // echo "valor de: ".$_SESSION['id'];
              if( $_SESSION['tipouser'] ==1){
               ?>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="g_usuarios.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gestión de usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="g_plantillas.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gestión de plantillas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="g_resultados.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gestión de resultados</p>
                </a>
              </li>

              <?php 
                      // echo "valor de: ".$_SESSION['id'];
               }else{
               ?>

              <li class="nav-item">
                <a href="estu.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mis examenes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="mis_resultados.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mis resultados</p>
                </a>
              </li>
              <?php 
               }
              ?>
              <li class="nav-item">
                <a href="logout.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Salir del sistema</p>
                </a>
              </li>

            </ul>
            
            
          </li>
        
         
        </ul>
      </nav>