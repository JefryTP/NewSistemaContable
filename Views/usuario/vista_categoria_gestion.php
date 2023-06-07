<?php
include('../../conexion.php');
?>
<div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Panel Categoria</h1>
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
                                        <th scope="col">Descripcion</th>
                                        <th scope="col">Estado</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $sql = "SELECT * FROM categoria";
                                    $result = mysqli_query($conexion, $sql);

                                    while ($mostrar = mysqli_fetch_array($result)) {
                                    ?>

                                        <tr>

                                            <td><?php echo $mostrar['ID_categoria'] ?></td>
                                            <td><?php echo $mostrar['Nombre'] ?></td>
                                            <td><?php echo $mostrar['Descripcion'] ?></td>
                                            <td><?php if ($mostrar['Estado'] == 0) {
                                                ?> <button type="button" class="btn btn-secondary btn-disabled" style="pointer-events: none;">Inactivo</button><?php
                                                                                                                                                            } else {
                                                                                                                                                                ?> <button type="button" class="btn btn-success btn-disabled" style="pointer-events: none;">Activo</button><?php
                                                                                                                                                                                                                                                                        }  ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn_editar" data-id="<?php echo $mostrar['ID_categoria']; ?>" data-nombre="<?php echo $mostrar['Nombre']; ?>" data-descripcion="<?php echo $mostrar['Descripcion']; ?>" data-estado="<?php echo $mostrar['Estado']; ?>"><i class="far fa-edit"></i></button>
                                                    <!--Codigo para separar los botones class="... ml-2"-->
                                                    <button type="button" class="btn btn-danger btn_eliminar" data-id="<?php echo $mostrar['ID_categoria']; ?>"><i class="fas fa-trash-alt"></i></button>
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
                                        <th scope="col">Descripcion</th>
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
    var nombre = $(this).data('nombre');
    var descripcion = $(this).data('descripcion');
    Swal.fire({
        title: 'Actualizar Registro',
        html: `
        <form id="update-categoria">
            <div class="form-group">
                <div class="row">
                    <div class="col-md">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" value="${nombre}" required>
                    </div>
                    <div class="col-md">
                        <label for="nombre">Estado:</label>
                        <select class="form-control" name="estado" required>
                            ${opciones}
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <label for="descripcion">Descripción:</label>
                        <textarea class="form-control" name="descripcion" rows="4" required>${descripcion}</textarea>
                    </div>
                </div>
                <input type="hidden" name="id" value="${id}"> <!-- Agrega este campo oculto con el ID -->
            </div>
        </form>`,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aplicar'
    }).then((result) => {
        if (result.isConfirmed) {

            const datos = document.querySelector("#update-categoria");
            const datos_actualizados = new FormData(datos);
            var url = "../Controllers/Actualizar/update_categoria.php";

            fetch(url, {
                method: 'POST',
                body: datos_actualizados
            })
            .then(response => response.json()) 
            .then(data => {
                if (data.error === 0) {
                    Swal.fire('Éxito', 'Los cambios han sido guardados.', 'success');
                    // Actualizar los valores en la tabla o realizar cualquier acción adicional
                } else {
                    Swal.fire('Error', 'No se pudo guardar los cambios.', 'error');
                }
            })
            .catch(error => {
                console.log('Error:', error);
                Swal.fire('Error', 'No se pudo guardar los cambios.', 'error');
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
                    url: '../Controllers/Eliminar/eliminar_categoria.php',
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