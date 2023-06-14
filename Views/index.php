<?php
session_start();
include('../conexion.php');


if (!isset($_SESSION['estado'])) {
  header('Location: ../Login/index.php');
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Vida y Salud</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../Plantilla/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../Plantilla/AdminLTE-3.2.0/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../Plantilla/AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../Plantilla/AdminLTE-3.2.0/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../Plantilla/AdminLTE-3.2.0/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../Plantilla/AdminLTE-3.2.0/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../Plantilla/AdminLTE-3.2.0/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../Plantilla/AdminLTE-3.2.0/plugins/summernote/summernote-bs4.min.css">
  <style>
    .ocultar-btn-incremento::-webkit-inner-spin-button,
    .ocultar-btn-incremento::-webkit-outer-spin-button {
      -webkit-appearance: none;
      appearance: none;
      margin: 0;
    }

    .nav-item {
      user-select: none;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="../Plantilla/AdminLTE-3.2.0/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">

          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>

        <!-- Messages Dropdown Menu -->

        <!-- Notifications Dropdown Menu -->

        <!-- Full screen-->
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-th-large"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-xs dropdown-menu-right">
            <a href="../Controllers/cerrar_sesion.php" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> Salir
            </a>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->


      <!-- Sidebar -->
      <div class="sidebar" style="user-select: none;">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
          <div class="image">
            <?php if ($_SESSION['nombre_rol'] == "Administrador") {
            ?> <img src="../Plantilla/AdminLTE-3.2.0/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> <?php
                                                                                                                                } else {
                                                                                                                                  ?> <img src="../Plantilla/AdminLTE-3.2.0/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> <?php
                                                                                                                                                                                                                                                      }
                                                                                                                                                                                                                                                        ?>

          </div>
          <div class="info align-self-center ml-3">
            <a href="#" class="d-block text-primary font-weight-bold disable-link" style="pointer-events: none;
  cursor: default;"><?php
                    echo $_SESSION['nombre'] . ' ' . $_SESSION['apellido'];
                    ?></a>
            <span class="text-muted"><?php echo $_SESSION['nombre_rol'] ?></span>

          </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <!--li class="nav-item">
              <a onclick="cargar_contenido('contenido_principal','usuario/vista_panel_venta.php')" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Panel de Venta
                </p>
              </a>
            </li-->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Medicamentos
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a onclick="cargar_contenido('contenido_principal','usuario/vista_medicina_agregar.php')" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Agregar Medicamento</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a onclick="cargar_contenido('contenido_principal','usuario/vista_medicina_gestion.php')" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Gestionar Medicamento</p>
                  </a>
                </li>
              </ul>
            </li>
            <?php if ($_SESSION['nombre_rol'] == "Administrador") {
            ?>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>
                    Administradores
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a onclick="cargar_contenido('contenido_principal','usuario/vista_admin_agregar.php')" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Agregar Administrador</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a onclick="cargar_contenido('contenido_principal','usuario/vista_admin_gestion.php')" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Gestionar Administrador</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php }  ?>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Proveedores
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a onclick="cargar_contenido('contenido_principal','usuario/vista_proveedor_agregar.php')" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Agregar Proveedor</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a onclick="cargar_contenido('contenido_principal','usuario/vista_proveedor_gestion.php')" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Gestionar Proveedor</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link" style="user-select: none;">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Transaccion
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a onclick="cargar_contenido('contenido_principal','usuario/vista_categoria_agregar.php')" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Agregar Categoria</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a onclick="cargar_contenido('contenido_principal','usuario/vista_categoria_gestion.php')" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Gestionar Categoria</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link" style="user-select: none;">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Caja
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a onclick="cargar_contenido('contenido_principal','usuario/vista_categoria_agregar.php')" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Agregar Categoria</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a onclick="cargar_contenido('contenido_principal','usuario/vista_caja_gestion.php')" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Gestionar Categoria</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link" style="user-select: none;">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Historial
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a onclick="cargar_contenido('contenido_principal','usuario/vista_categoria_agregar.php')" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Agregar Categoria</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a onclick="cargar_contenido('contenido_principal','usuario/vista_categoria_gestion.php')" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Gestionar Categoria</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <!-- /.content-header -->
      <!-- Main content -->
      <section class="content">
        <div class="row justify-content-center" id="contenido_principal">
          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                  <!-- jquery validation -->
                  <div>
                    <?php echo $_SESSION['nombre'] . ' ' . $_SESSION['apellido']. ' ' . $_SESSION['dni']. ' ' . $_SESSION['correo']. ' ' . $_SESSION['contraseña']. ' ' . $_SESSION['ID_rol']. ' ' . $_SESSION['estado']. ' ' . $_SESSION['nombre_rol'];?>
                  </div>
                  <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->

                <!--/.col (right) -->
              </div>
              <!-- /.row -->
            </div><!-- /.container-fluid -->
          </section>
          <!--div class="col-md-12">
          </!--div-->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../Plantilla/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../Plantilla/AdminLTE-3.2.0/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    function cargar_contenido(contenedor, contenido) {
      $("#" + contenedor).load(contenido);
    }
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    $('#btn_registrar').click(function() {
      var dni = $('#dni').val();
      var estado = $('#estado').val();
      var nombre = $('#nombre').val();
      var apellido = $('#apellido').val();
      var correo = $('#correo').val();
      var contraseña = $('#contraseña').val();

      var url = '../php_action/agregar_admin.php'

      // Expresiones regulares para las validaciones
      var regexDNI = /^\d{8}$/;
      var regexNombreApellido = /^[a-zA-Z\s]+$/;
      var regexCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      var regexContraseña = /^.{8,}$/;

      // Validación del DNI
      if (!regexDNI.test(dni)) {
        $('#dni').val('');
        Swal.fire("Ingrese un DNI válido de 8 dígitos", "", "error");
        $('#dni').focus();
        return;
      }

      // Validación del nombre
      if (!regexNombreApellido.test(nombre)) {
        $('#nombre').val('');
        Swal.fire("Ingrese un nombre válido", "", "error");
        $('#nombre').focus();
        return;
      }

      // Validación del apellido
      if (!regexNombreApellido.test(apellido)) {
        $('#apellido').val('');
        Swal.fire("Ingrese un apellido válido", "", "error");
        $('#apellido').focus();
        return;
      }

      // Validación del correo
      if (!regexCorreo.test(correo)) {
        $('#correo').val('');
        Swal.fire("Ingrese un correo electrónico válido", "", "error");
        $('#correo').focus();
        return;
      }

      // Validación de la contraseña
      if (!regexContraseña.test(contraseña)) {
        Swal.fire("La contraseña debe tener al menos 8 caracteres", "", "error");
        $('#contraseña').focus();
        return;
      }

      $.post(url, {
        dni: dni,
        estado: estado,
        nombre: nombre,
        apellido: apellido,
        correo: correo,
        contraseña: contraseña
      }, function(datos) {
        var respuesta = JSON.parse(datos);
        if (respuesta.error === 1) {
          Swal.fire(respuesta.mensaje, "", "error");
        } else {
          Swal.fire(respuesta.mensaje, "", "success");
          $('#dni').val('');
          $('#estado').prop('selectedIndex', 0);
          $('#nombre').val('');
          $('#apellido').val('');
          $('#correo').val('');
          $('#contraseña').val('');
        }

      });
    });
  </script>
  <!-- Bootstrap 4 -->
  <script src="../Plantilla/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="../Plantilla/AdminLTE-3.2.0/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="../Plantilla/AdminLTE-3.2.0/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="../Plantilla/AdminLTE-3.2.0/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="../Plantilla/AdminLTE-3.2.0/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="../Plantilla/AdminLTE-3.2.0/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="../Plantilla/AdminLTE-3.2.0/plugins/moment/moment.min.js"></script>
  <script src="../Plantilla/AdminLTE-3.2.0/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="../Plantilla/AdminLTE-3.2.0/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="../Plantilla/AdminLTE-3.2.0/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../Plantilla/AdminLTE-3.2.0/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../Plantilla/AdminLTE-3.2.0/dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <!--script src="../Plantilla/AdminLTE-3.2.0/dist/js/demo.js"></!--script-->
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="../Plantilla/AdminLTE-3.2.0/dist/js/pages/dashboard.js"></script>

</body>

</html>