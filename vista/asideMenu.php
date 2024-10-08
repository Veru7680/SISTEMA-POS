<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->


    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

      <li class="nav-item nav-link">
        <span class="badge badge-danger" id="comunSiat"> DESCONECTADO</span>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="inicio" class="brand-link">
      <img src="assest/dist/img/Logo_POS.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Sistema </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assest/dist/img/user_default.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block" id="usuarioLogin"><?php echo $_SESSION["login"]?></a>
          <input type="hidden" id="idUsuario" value="<?php echo $_SESSION["idUsuario"]?>">
        </div>
      </div>

    

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="" class="nav-link ">
              <i class="nav-icon fas fa-user"></i>
              <p>
              USUARIOS
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            
              <li class="nav-item">
                <a href="VUsuario" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>LISTA DE USUARIOS</p>
                </a>
              </li>
            </ul>
          </li>




          <li class="nav-item menu-open">
            <a href="#" class="nav-link ">
              <i class="fas fa-users nav-icon"></i>
              <p>
              CLIENTE
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            
              <li class="nav-item">
                <a href="VCliente" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>LISTA DE CLIENTE</p>
                </a>
              </li>

            </ul>
          </li>


          <li class="nav-item menu-open">
            <a href="#" class="nav-link ">
              <i class="fas fa-cube nav-icon"></i>
              <p>
              PRODUCTO
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            
              <li class="nav-item">
              <a href="VProducto" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>LISTA DE PRODUCTO</p>
              </a>
              </li>

              <li class="nav-item">
              <a href=" SinCatalogos" class="nav-link">
              <i class="fas fa-book nav-icon"></i>
              <p>SINCRONIZACION CATALOGO</p>
              </a>
              </li>

            </ul>
          </li>



          <li class="nav-item menu-open">
            <a href="#" class="nav-link ">
              <i class="fas fa-shopping-cart nav-icon"></i>
              <p>
              VENTAS
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            
              <li class="nav-item">
                <a href="FormVenta" class="nav-link">
                  <i class="fas fa-file-invoice nav-icon"></i>
                  <p>EMITIR FACTURA</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="VFactura" class="nav-link">
                  <i class="fas fa-file-invoice nav-icon"></i>
                  <p>LISTAR FACTURAS</p>
                </a>
              </li>

            </ul>
          </li>


          <li class="nav-item">
            <a href="salir" class="nav-link">
            <i class="fas fa-power-off nav-icon"></i>
            <p>SALIR</p>
            </a>
          </li>



          
       
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  </body>
</html>