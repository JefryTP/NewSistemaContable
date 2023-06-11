<?php
include('../conexion.php');

session_start();
if (!isset($_SESSION['DNI'])) {
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
            <?php if ($_SESSION['Permiso'] == 1) {
            ?> <img src="../Plantilla/AdminLTE-3.2.0/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> <?php
                                                                                                                                } else {
                                                                                                                                  ?> <img src="../Plantilla/AdminLTE-3.2.0/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> <?php
                                                                                                                                                                                                                                                      }
                                                                                                                                                                                                                                                        ?>

          </div>
          <div class="info align-self-center ml-3">
            <a href="#" class="d-block text-primary font-weight-bold disable-link" style="pointer-events: none;
  cursor: default;"><?php
                    echo $_SESSION['Nombre'] . ' ' . $_SESSION['Apellido'];
                    ?></a>
            <span class="text-muted"><?php if ($_SESSION['Permiso'] == 1) {
                                      ?>Administrador<?php
                                                } else {
                                                  ?>Farmaceutico<?php
                                                              } ?></span>

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
            <?php if ($_SESSION['Permiso'] == 1) {
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
                  Categoria
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
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Panel Medicamento</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Proveedor</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Categoria</th>
                                        <th scope="col">Marca</th>
                                        <th scope="col">Precio Unitario</th>
                                        <th scope="col">Precio x Caja</th>
                                        <th scope="col">Unidad x Caja</th>
                                        <th scope="col">Stock</th>
                                        <th scope="col">Estado</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    ///$sql = "SELECT * FROM medicina";


                                    $sql = "SELECT m.*, p.Nombre AS nombre_proveedor, c.Nombre AS nombre_categoria 
        FROM medicina m 
        INNER JOIN proveedor p ON m.ID_proveedor = p.ID_proveedor 
        INNER JOIN categoria c ON m.ID_categoria = c.ID_categoria";
                                    $result = mysqli_query($conexion, $sql);
                                    while ($mostrar = mysqli_fetch_array($result)) {
                                    ?>

                                        <tr>

                                            <td><?php echo $mostrar['ID_medicina'] ?></td>
                                            <td><?php echo $mostrar['nombre_proveedor'] ?></td>
                                            <td><?php echo $mostrar['Nombre'] ?></td>
                                            <td><?php echo $mostrar['nombre_categoria'] ?></td>
                                            <td><?php echo $mostrar['Marca'] ?></td>
                                            <td>S/.<?php echo $mostrar['Precio_uni'] ?></td>
                                            <td>S/.<?php echo $mostrar['Precio_caja'] ?></td>
                                            <td><?php echo $mostrar['Unidad_caja'] ?></td>
                                            <td><?php echo $mostrar['Stock'] ?></td>
                                            <td><?php if ($mostrar['Estado'] == 0) {
                                                ?> <button type="button" class="btn btn-secondary btn-disabled" style="pointer-events: none;">Inactivo</button><?php
                                                                                                                                                            } else {
                                                                                                                                                                ?> <button type="button" class="btn btn-success btn-disabled" style="pointer-events: none;">Activo</button><?php
                                                                                                                                                                                                                                                                        }  ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn_editar" data-id="<?php echo $mostrar['ID_medicina']; ?>" data-estado="<?php echo $mostrar['Estado']; ?>"><i class="far fa-edit"></i></button>
                                                    <!--Codigo para separar los botones class="... ml-2"-->
                                                    <button type="button" class="btn btn-danger btn_eliminar" data-id="<?php echo $mostrar['ID_medicina']; ?>"><i class="fas fa-trash-alt"></i></button>
                                                </div>
                                            </td>
                                        </tr>


                                    <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Proveedor</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Categoria</th>
                                        <th scope="col">Marca</th>
                                        <th scope="col">Precio Unitario</th>
                                        <th scope="col">Precio x Caja</th>
                                        <th scope="col">Unidad x Caja</th>
                                        <th scope="col">Stock</th>
                                        <th scope="col">Estado</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
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
    $('.btn_editar').click(function() {
        var id = $(this).data('id');
        var estado = $(this).data('estado');
        var permiso = $(this).data('permiso');
        // Hacer una solicitud Ajax para obtener el formulario de edición
        $.ajax({
            url: '../Controllers/editar_admin.php',
            type: 'POST',
            data: {
                id: id,
                permiso: permiso,
                estado: estado
            },
            success: function(response) {
                var data = JSON.parse(response)
                var form = data.form
                // Mostrar SweetAlert2 con el formulario de edición
                Swal.fire({
                    title: 'Editar Registro',
                    html: form,
                    showCancelButton: true,
                    showConfirmButton: false
                });
            },
            error: function() {
                Swal.fire('Error', 'Ocurrió un error al obtener el formulario de edición', 'error');
            }
        });
    });
    $('.btn_eliminar').click(function() {
        var fila = $(this).closest('tr'); // Obtener la fila padre del botón de eliminar
        var idTrabajador = $(this).data('id');
        // Confirmar la eliminación utilizando SweetAlert
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Esta acción no se puede deshacer.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'

        }).then((result) => {
            if (result.isConfirmed) {
                // Enviar solicitud AJAX para eliminar el registro
                $.ajax({
                    url: '../Controllers/Eliminar/eliminar_medicina.php',
                    type: 'POST',
                    data: {
                        id: idTrabajador
                    },
                    success: function(response) {
                        // Mostrar mensaje de éxito
                        Swal.fire('Eliminado', 'El registro ha sido eliminado correctamente.', 'success');
                        // Eliminar la fila de la tabla
                        fila.remove();
                    },
                    error: function() {
                        // Mostrar mensaje de error en caso de fallo en la solicitud AJAX
                        Swal.fire('Error', 'No se pudo eliminar el registro.', 'error');
                    }
                });
            }
        });
    });
</script>
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