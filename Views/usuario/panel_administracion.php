<?php
include('../../conexion.php');
?>

<!-- Content Wrapper. Contains page content -->
<div>
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="content-header">
                    <div class="container-fluid">
                        <h1 class="titulo">Panel Administracion</h1>
                    </div><!-- /.container-fluid -->
                </section>
            </div>
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="btn">
                                <button type="button" class="btn btn-primary btn_agregar mr-2">Agregar</button>
                                <button type="button" class="btn btn-success ml-2" id="btn_descargar">Descargar Excel</button>
                            </div>
                            <table id="myTable" class="table table-bordered table-striped display">
                                <thead>
                                    <tr>
                                        <th scope="col">DNI</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellido</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col">Contraseña</th>
                                        <th scope="col">Cargo</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php


                                    $sql = "SELECT u.*, r.nombre AS nombre_rol FROM usuario u 
                                    INNER JOIN rol r ON u.ID_rol = r.ID_rol";
                                    $result = mysqli_query($conexion, $sql);

                                    while ($mostrar = mysqli_fetch_array($result)) {
                                    ?>

                                        <tr>

                                            <td><?php echo $mostrar['dni'] ?></td>
                                            <td><?php echo $mostrar['nombre'] ?></td>
                                            <td><?php echo $mostrar['apellido'] ?></td>
                                            <td><?php echo $mostrar['correo'] ?></td>
                                            <td><?php echo $mostrar['contraseña'] ?></td>
                                            <td><?php echo $mostrar['nombre_rol'] ?></td>
                                            <td><?php if ($mostrar['estado'] == 0) {
                                                ?> <button type="button" class="btn btn-secondary btn-disabled" style="pointer-events: none;">Inactivo</button><?php
                                                                                                                                                            } else {
                                                                                                                                                                ?> <button type="button" class="btn btn-success btn-disabled" style="pointer-events: none;">Activo</button><?php
                                                                                                                                                                                                                                                                        }  ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn_editar" data-dni="<?php echo $mostrar['dni']; ?>" data-nombre="<?php echo $mostrar['nombre']; ?>" data-apellido="<?php echo $mostrar['apellido']; ?>" data-correo="<?php echo $mostrar['correo']; ?>" data-contraseña="<?php echo $mostrar['contraseña']; ?>" data-estado="<?php echo $mostrar['estado']; ?>" data-cargo="<?php echo $mostrar['nombre_rol']; ?>"><i class="far fa-edit"></i></button>
                                                    <!--Codigo para separar los botones class="... ml-2"-->
                                                    <button type="button" class="btn btn-danger btn_eliminar" data-dni="<?php echo $mostrar['dni']; ?>"><i class="fas fa-trash-alt"></i></button>
                                                </div>
                                            </td>
                                        </tr>


                                    <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>

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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('btn_descargar').addEventListener('click', function() {
        // Obtener el contenido de la tabla
        var table = document.getElementById('myTable');

        // Crear un libro de Excel
        var workbook = XLSX.utils.book_new();

        // Crear una hoja de Excel y convertir la tabla en un objeto de datos
        var worksheet = XLSX.utils.table_to_sheet(table);

        // Añadir la hoja al libro
        XLSX.utils.book_append_sheet(workbook, worksheet, 'Datos');

        // Generar un archivo binario a partir del libro
        var excelBuffer = XLSX.write(workbook, {
            bookType: 'xlsx',
            type: 'array'
        });

        // Convertir el archivo binario a Blob
        var blob = new Blob([excelBuffer], {
            type: 'application/octet-stream'
        });

        // Crear un enlace de descarga y establecer el archivo Blob
        var link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = 'administracion.xlsx';

        // Simular el clic en el enlace para iniciar la descarga
        link.click();
    });
</script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
<script>
    $('.btn_agregar').click(function() {
        var id = $(this).data('id');
        var nombre = $(this).data('nombre');
        var apellido = $(this).data('apellido');
        var correo = $(this).data('correo');
        var dni = $(this).data('dni');
        var contraseña = $(this).data('contraseña');
        var estado = $(this).data('estado');
        var opciones = `
        <option value="1" selected>Activo</option>`;
        var cargo = $(this).data('cargo');
        if (cargo == 1) {
            var opciones2 = `
        <option value="1" selected>Trabajador</option>
        <option value="2">Administrador</option>`;
        } else {
            var opciones2 = `
        <option value="1">Trabajador</option>
        <option value="2" selected>Administrador</option>`;
        }
        Swal.fire({
            title: 'Agregar Administrador',
            html: `
        <form id="agregar-admin">
            <div class="form-group">
                <div class="row">
                    <div class="col-md">
                        <label for="dni">DNI:</label>
                        <input type="number" class="form-control ocultar-btn-incremento" name="dni" required>
                    </div>
                    <div class="col-md">
                        <label for="estado">Estado:</label>
                        <select class="form-control" name="estado" readonly>
                            ${opciones}
                        </select>
                    </div>
                    <div class="col-md">
                        <label for="cargo">Cargo:</label>
                        <select class="form-control" name="cargo" required>
                            ${opciones2}
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" required>
                    </div>
                    <div class="col-md">
                        <label for="apellido">Apellido:</label>
                        <input type="text" class="form-control" name="apellido" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <label for="correo">Correo:</label>
                        <input type="email" class="form-control" name="correo" required>
                    </div>
                    <div class="col-md">
                        <label for="contraseña">Contraseña:</label>
                        <input type="text" class="form-control" name="contraseña" required>
                    </div>
                </div>
                <input type="hidden" name="id" value="${id}">
            </div>
        </form>`,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aplicar'
        }).then((result) => {
            if (result.isConfirmed) {
                var datos = $('#agregar-admin').serialize();
                var url = "../Controllers/Agregar/agregar_admin.php";

                var regexTEXTO = /^[a-zA-ZáÁéÉíÍóÓúÚüÜñÑ\s]+$/;

                if (!regexTEXTO.test(nombre)) {
                    Swal.fire("Ingrese un nombre válido", "", "error");
                    return;
                }
                if (!regexTEXTO.test(apellido)) {
                    Swal.fire("Ingrese un apellido válido", "", "error");
                    return;
                }

                $.post(url, datos, function(respuesta) {

                    if (datos.error === 1) {
                        Swal.fire(respuesta.mensaje, "", "error");

                    } else {
                        Swal.fire(respuesta.mensaje, "", "success");
                    }
                });
            }
        });
    });
    $('.btn_editar').click(function() {
        var id = $(this).data('id');
        var nombre = $(this).data('nombre');
        var apellido = $(this).data('apellido');
        var correo = $(this).data('correo');
        var dni = $(this).data('dni');
        var contraseña = $(this).data('contraseña');
        var estado = $(this).data('estado');
        if (estado == 1) {
            var opciones = `
        <option value="0">Inactivo</option>
        <option value="1" selected>Activo</option>`;
        } else {
            var opciones = `
        <option value="0" selected>Inactivo</option>
        <option value="1">Activo</option>`;
        }
        var cargo = $(this).data('cargo');
        if (cargo == 1) {
            var opciones2 = `
        <option value="1" selected>Administrador</option>
        <option value="2">Administrador</option>`;
        } else {
            var opciones2 = `
        <option value="1">Trabajador</option>
        <option value="2" selected>Administrador</option>`;
        }
        Swal.fire({
            title: 'Actualizar Registro',
            html: `
        <form id="update-admin">
            <div class="form-group">
                <div class="row">
                    <div class="col-md">
                        <label for="dni">DNI:</label>
                        <input type="number" class="form-control ocultar-btn-incremento" name="dni" value="${dni}" readonly>
                    </div>
                    <div class="col-md">
                        <label for="estado">Estado:</label>
                        <select class="form-control" name="estado" required>
                            ${opciones}
                        </select>
                    </div>
                    <div class="col-md">
                        <label for="cargo">Cargo:</label>
                        <select class="form-control" name="cargo" required>
                            ${opciones2}
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" value="${nombre}" required>
                    </div>
                    <div class="col-md">
                        <label for="apellido">Apellido:</label>
                        <input type="text" class="form-control" name="apellido" value="${apellido}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <label for="correo">Correo:</label>
                        <input type="email" class="form-control" name="correo" value="${correo}" required>
                    </div>
                    <div class="col-md">
                        <label for="contraseña">Contraseña:</label>
                        <input type="text" class="form-control" name="contraseña" value="${contraseña}" required>
                    </div>
                </div>
                <input type="hidden" name="id" value="${id}">
            </div>
        </form>`,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aplicar'
        }).then((result) => {
            if (result.isConfirmed) {
                var datos = $('#update-admin').serialize();
                var url = "../Controllers/Actualizar/update_admin.php";

                var regexTEXTO = /^[a-zA-ZáÁéÉíÍóÓúÚüÜñÑ\s]+$/;
                var regexCORREO = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                var regexCORREO = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                var regexCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                if (!regexTEXTO.test(nombre)) {
                    Swal.fire("Ingrese un nombre válido", "", "error");
                    return;
                }
                if (!regexTEXTO.test(apellido)) {
                    Swal.fire("Ingrese un apellido válido", "", "error");
                    return;
                }
                if (!regexCORREO.test(correo)) {
                    Swal.fire("Ingrese un correo válido", "", "error");
                    return;
                }

                $.post(url, datos, function(respuesta) {

                    if (datos.error === 1) {
                        Swal.fire(respuesta.mensaje, "", "error");

                    } else {
                        Swal.fire(respuesta.mensaje, "", "success");
                    }
                });
            }
        });
    });
    $('.btn_eliminar').click(function() {
        var fila = $(this).closest('tr'); // Obtener la fila padre del botón de eliminar
        var dniadmin = $(this).data('dni');
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
                    url: '../Controllers/Eliminar/eliminar_admin.php',
                    type: 'POST',
                    data: {
                        dni: dniadmin
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