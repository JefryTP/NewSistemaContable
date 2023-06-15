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
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

  
  <link rel="stylesheet" href="../Plantilla/AdminLTE-3.2.0/estilos_propio.css">
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

</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="../Plantilla/AdminLTE-3.2.0/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
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
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <div class="sidebar" style="user-select: none;">
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
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <?php if ($_SESSION['nombre_rol'] == "Administrador") {
            ?>
              <li class="nav-item">
                <a onclick="cargar_contenido('contenido_principal','usuario/panel_administracion.php')" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Administracion
                  </p>
                </a>
              </li>
            <?php }  ?>
            <li class="nav-item">
              <a onclick="cargar_contenido('contenido_principal','usuario/panel_cliente.php')" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Cliente
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a onclick="cargar_contenido('contenido_principal','usuario/panel_transaccion.php')" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Transaccion
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a onclick="cargar_contenido('contenido_principal','usuario/panel_caja.php')" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Caja
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a onclick="cargar_contenido('contenido_principal','usuario/panel_historial.php')" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Historial
                </p>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
    <div class="content-wrapper">

      <!-- Content Header (Page header) -->

      <!-- /.content-header -->
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid" id="contenido_principal">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>150</h3>

                  <p>New Orders</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>53<sup style="font-size: 20px">%</sup></h3>

                  <p>Bounce Rate</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>44</h3>

                  <p>User Registrations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->

            <!-- ./col -->
          </div>

      </section>
      <!-- /.Left col -->
      <!-- right col (We are only adding the ID to make the widgets sortable)-->

      <!-- right col -->
    </div>
    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../Plantilla/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../Plantilla/AdminLTE-3.2.0/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

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