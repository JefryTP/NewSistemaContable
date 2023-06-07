<?php
include('../../conexion.php');
?>
<div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Panel Facturas</h1>
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
                                        <th scope="col">Cliente</th>
                                        <th scope="col">Trabajador</th>
                                        <th scope="col">fecha</th>
                                        <th scope="col">Monto</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $sql = "SELECT b.*, t.Nombre AS nombre_trabajador 
                                    FROM boleta b 
                                    INNER JOIN trabajador t ON b.ID_trabajador = t.ID_trabajador";
                                    $result = mysqli_query($conexion, $sql);

                                    while ($mostrar = mysqli_fetch_array($result)) {
                                    ?>

                                        <tr>

                                            <td><?php echo $mostrar['ID_boleta'] ?></td>
                                            <td><?php if (isset($mostrar['Nom_cliente'])) {
                                                    echo $mostrar['Nom_cliente'];
                                                } else {
                                                    echo "----------";
                                                } ?></td>
                                            <td><?php echo $mostrar['nombre_trabajador'] ?></td>
                                            <td><?php echo $mostrar['Fecha'] ?></td>
                                            <td>S/.<?php echo $mostrar['Monto'] ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn_editar" data-id="<?php echo $mostrar['ID_boleta']; ?>"><i class="far fa-edit"></i></button>
                                                    <!--Codigo para separar los botones class="... ml-2"-->
                                                    <button type="button" class="btn btn-danger btn_eliminar" data-id="<?php echo $mostrar['ID_boleta']; ?>"><i class="fas fa-trash-alt"></i></button>
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
                                        <th scope="col">Cliente</th>
                                        <th scope="col">Trabajador</th>
                                        <th scope="col">fecha</th>
                                        <th scope="col">Monto</th>
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
                    url: '../Controllers/eliminar_admin.php',
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