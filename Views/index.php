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
            
          <li class="nav-item">
              <a onclick="cargar_contenido('contenido_principal','usuario/panel_transaccion.php')" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Caja
                </p>
              </a>
            </li>
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
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="../Plantilla/AdminLTE-3.2.0/dist/js/pages/dashboard.js"></script>
  <script>
    function cargar_contenido(contenedor, contenido) {
      $("#" + contenedor).load(contenido);
    }
    $.widget.bridge('uibutton', $.ui.button)
  </script>
<script>
    $('#btn_agregar').click(function() {
        var fecha = moment().format('YYYY-MM-DD HH:mm:ss');
        var dni = $('#dniInput').val();
        var ruc = $('#rucInput').val();
        var titulo = $('#tituloInput').val();
        var descripcion = $('#descriInput').val();
        var tipo = $('#tipoInput').val();
        var monto = $('#montoInput').val();

        var url = '../Controllers/crear_transaccion.php'

        // Expresiones regulares para las validaciones

        var regexDescripcion = /^[a-zA-Z0-9\s.,\-áéíóúÁÉÍÓÚñÑ]+$/;
        var regexTEXTO = /^[a-zA-ZáÁéÉíÍóÓúÚüÜñÑ\s]+$/;
        var regexDECIMAL = /^\d+(?:\.\d{0,2})?$/;


        // Validación del apellido
        if (!regexTEXTO.test(titulo)) {
            $('#tituloInput').addClass("is-invalid");
            $('#tituloInput').focus();
            Swal.fire("Invalido", "", "error");
            return;
        } else {
            $('#tituloInput').removeClass("is-invalid");
        }

        // Validación del correo
        if (!regexDescripcion.test(descripcion)) {
            $('#descriInput').addClass("is-invalid");
            $('#descriInput').focus();
            Swal.fire("Invalido", "", "error");
            return;
        } else {
            $('#descriInput').removeClass("is-invalid");
        }


        if (!regexDECIMAL.test(monto)) {
            $('#montoInput').addClass("is-invalid");
            $('#montoInput').focus();
            Swal.fire("Invalido", "", "error");
            return;
        } else {
            $('#montoInput').removeClass("is-invalid");
        }

        $.post(url, {
            dni: dni,
            ruc: ruc,
            titulo: titulo,
            descripcion: descripcion,
            tipo: tipo,
            monto: monto,
            fecha: fecha
        }, function(datos) {
            var respuesta = JSON.parse(datos);
            
            if (respuesta.error === 1) {
                Swal.fire(respuesta.mensaje, "", "error");
            } else {
                Swal.fire(respuesta.mensaje, "", "success");
                $('#tituloInput').removeClass("is-invalid");
                $('#descriInput').removeClass("is-invalid");
                $('#montoInput').removeClass("is-invalid");
                $('#rucInput').prop('selectedIndex', 0);
                $('#tituloInput').val('');
                $('#descriInput').val('');
                $('#tipoInput').prop('selectedIndex', 0);
                $('#montoInput').val('');
                $('#fechaInput').val('');
            }

        });
    });
</script>
  <script>
    $(document).ready(function() {
      // Obtener la fecha actual
      function actualizarFecha() {
        var fechaActual = new Date();
        var dia = fechaActual.getDate();
        var mes = fechaActual.getMonth() + 1;
        var anio = fechaActual.getFullYear();
        var hora = fechaActual.getHours();
        var minutos = fechaActual.getMinutes();

        // Formatear la fecha y hora
        var fechaFormateada = dia + '/' + mes + '/' + anio + ' ' + hora + ':' + minutos;

        // Asignar el valor formateado al campo de entrada
        document.getElementById('fechaInput').value = fechaFormateada;
      }

      // Actualizar la fecha cada segundo (1000 milisegundos)
      setInterval(actualizarFecha, 1000);

      // Iniciar la actualización de la fecha
      actualizarFecha();
    });
  </script>
</body>

</html>