<?php
include('../../conexion.php');
?>
<style>

</style>
<!-- Content Wrapper. Contains page content -->
<div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Panel Administrador</h1>
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
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellido</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col">DNI</th>
                                        <th scope="col">Contraseña</th>
                                        <th scope="col">Cargo</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $sql = "SELECT * FROM trabajador";
                                    $result = mysqli_query($conexion, $sql);

                                    while ($mostrar = mysqli_fetch_array($result)) {
                                    ?>

                                        <tr>

                                            <td><?php echo $mostrar['ID_trabajador'] ?></td>
                                            <td><?php echo $mostrar['Nombre'] ?></td>
                                            <td><?php echo $mostrar['Apellido'] ?></td>
                                            <td><?php echo $mostrar['Correo'] ?></td>
                                            <td><?php echo $mostrar['DNI'] ?></td>
                                            <td><?php echo $mostrar['Contraseña'] ?></td>
                                            <td><?php if ($mostrar['Permiso'] == 0) {
                                                    echo "Usuario";
                                                } else {
                                                    echo "Administrador";
                                                }  ?></td>
                                            <td><?php if ($mostrar['Estado'] == 0) {
                                                ?> <button type="button" class="btn btn-secondary btn-disabled" style="pointer-events: none;">Inactivo</button><?php
                                                                                                                                                            } else {
                                                                                                                                                                ?> <button type="button" class="btn btn-success btn-disabled" style="pointer-events: none;">Activo</button><?php
                                                                                                                                                                                                                                                                        }  ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn_editar" data-id="<?php echo $mostrar['ID_trabajador']; ?>"data-nombre="<?php echo $mostrar['Nombre']; ?>" data-apellido="<?php echo $mostrar['Apellido']; ?>" data-correo="<?php echo $mostrar['Correo']; ?>" data-dni="<?php echo $mostrar['DNI']; ?>" data-contraseña="<?php echo $mostrar['Contraseña']; ?>"  data-estado="<?php echo $mostrar['Estado']; ?>" data-permiso="<?php echo $mostrar['Permiso']; ?>"><i class="far fa-edit"></i></button>
                                                    <!--Codigo para separar los botones class="... ml-2"-->
                                                    <button type="button" class="btn btn-danger btn_eliminar" data-id="<?php echo $mostrar['ID_trabajador']; ?>"><i class="fas fa-trash-alt"></i></button>
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
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellido</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col">DNI</th>
                                        <th scope="col">Contraseña</th>
                                        <th scope="col">Cargo</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col"></th>
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
    var permiso = $(this).data('permiso');
    if (permiso == 1) {
        var opciones2 = `
        <option value="0">Farmaceutico</option>
        <option value="1" selected>Administrador</option>`;
    } else {
        var opciones2 = `
        <option value="0" selected>Farmaceutico</option>
        <option value="1">Administrador</option>`;
    }
    Swal.fire({
        title: 'Actualizar Registro',
        html: `
        <form id="update-admin">
            <div class="form-group">
                <div class="row">
                    <div class="col-md">
                        <label for="dni">DNI:</label>
                        <input type="number" class="form-control ocultar-btn-incremento" name="dni" value="${dni}" required>
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
                        <label for="contrasena">Contraseña:</label>
                        <input type="text" class="form-control" name="contrasena" value="${contraseña}" required>
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

            if (!regexTEXTO.test(dni)) {
                Swal.fire("Ingrese un nombre válido", "", "error");
                return;
            }
            if (!regexTEXTO.test(descripcion)) {
                Swal.fire("Ingrese una descripción válida", "", "error");
                return;
            }
            if (!regexTEXTO.test(descripcion)) {
                Swal.fire("Ingrese una descripción válida", "", "error");
                return;
            }
            if (!regexTEXTO.test(descripcion)) {
                Swal.fire("Ingrese una descripción válida", "", "error");
                return;
            }
            if (!regexTEXTO.test(descripcion)) {
                Swal.fire("Ingrese una descripción válida", "", "error");
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
                    url: '../Controllers/Eliminar/eliminar_admin.php',
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
<!-- /.content-wrapper -->

<!-- Page specific script -->