<?php
include('../../conexion.php');
?>
<div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Panel Caja</h1>
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
                                        <th scope="col">Fecha y Hora</th>
                                        <th scope="col">Titulo</th>
                                        <th scope="col">Tipo</th>
                                        <th scope="col">Monto</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $sql = "SELECT t1.dni, t1.titulo, t1.descripcion, t1.fecha, t2.nombre, t1.monto FROM transaccion t1 INNER JOIN tipo t2 ON t1.ID_tipo = t2.ID_tipo";
                                    $result = mysqli_query($conexion, $sql);

                                    while ($mostrar = mysqli_fetch_array($result)) {
                                    ?>

                                        <tr>

                                            <td><?php echo $mostrar['dni'] ?></td>
                                            <td><?php echo $mostrar['titulo'] ?></td>
                                            <td><?php echo $mostrar['descripcion'] ?></td>
                                            <td><?php echo $mostrar['fecha'] ?></td>
                                            <td><?php echo $mostrar['nombre'] ?></td>
                                            <td><?php echo $mostrar['monto'] ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn_editar" data-dni="<?php echo $mostrar['dni']; ?>" data-titulo="<?php echo $mostrar['titulo']; ?>" data-descripcion="<?php echo $mostrar['descripcion']; ?>" data-fecha="<?php echo $mostrar['fecha']; ?>" data-nombre="<?php echo $mostrar['nombre']; ?>" data-monto="<?php echo $mostrar['monto']; ?>"><i class="far fa-edit"></i></button>
                                                    <!--Codigo para separar los botones class="... ml-2"-->
                                                    <button type="button" class="btn btn-danger btn_eliminar" data-id="<?php echo $mostrar['dni']; ?>"><i class="fas fa-trash-alt"></i></button>
                                                </div>
                                            </td>
                                        </tr>


                                    <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="col">Cliente</th>
                                        <th scope="col">Titulo</th>
                                        <th scope="col">Descripcion</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Tipo</th>
                                        <th scope="col">Monto</th>
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
                <input type="hidden" name="id" value="${id}">
            </div>
        </form>`,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aplicar'
    }).then((result) => {
        if (result.isConfirmed) {
            var datos = $('#update-categoria').serialize();
            var url = "../Controllers/Actualizar/update_categoria.php";

            var regexTEXTO = /^[a-zA-ZáÁéÉíÍóÓúÚüÜñÑ\s]+$/;

            if (!regexTEXTO.test(nombre)) {
                Swal.fire("Ingrese un nombre válido", "", "error");
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